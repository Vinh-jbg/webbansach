<?php
     class UserController extends BaseController {
        private $userModel;
        private $billModel;
        private $func;
        private $limit;

        public function __construct() {
            
            $this->loadModel('UserModel');
            $this->userModel = new UserModel;

            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;
            
            $this->loadModel('BillModel');
            $this->billModel = new BillModel;

            $this->limit = 10;
        }
        public function login()
        {   
            
            $dataNew = $_SESSION['data'];

            $dataNew += ['pageNew' => 'form/login.php'];

            if( isset($dataNew['userInfo'])) {

                unset($dataNew['pageNew']);
            }
            $mainPage = 'frontend.masterLayout';

            return $this->view($mainPage, $dataNew);
        }
        public function checkLogin() {
            $check  = false;

            unset($_SESSION['data']['pageNew']);
            $dataNew = $_SESSION['data'];
                if(isset($_POST['email']) && isset($_POST['password']))
                {
                    $name = $_POST['email'];
                    $pass = $_POST['password'];

                    $userInfo = $this->userModel->checkLogin($name, $pass);
                    if(!empty($userInfo)) {
                        $dataNew['userInfo'] = $userInfo[0];
                        if(isset($dataNew['result'])) {
                            $dataNew['result'] = "Đăng nhập thành công";
                            $dataNew['typeMessage'] = "success";
                        } else {
                            $dataNew += ['result' => "Đăng nhập thành công"];
                            $dataNew += ['typeMessage' => "success"];
                        }
                        if($userInfo[0]['Quyen'] == 1) {

                            header("location:./index.php?controller=admin&action=index");
                        }


                    } else {
                        $errString = "Mật khẩu hoặc tài khoản không đúng";
                        if(isset($dataNew['result'])) {
                            $dataNew['result'] = $errString;
                            $dataNew['typeMessage'] = "error";
                        } else {
                            $dataNew += ['result' => $errString];
                            $dataNew['typeMessage'] = "error";
                        }
                    }
                   
                    $mainPage = 'frontend.masterLayout';
                    return $this->view($mainPage, $dataNew);

                }

        }


        public function register() {

            unset($_SESSION['data']['page']);
            unset($_SESSION['data']['pageNew']);
            unset($_SESSION['data']['result']);

            $dataNew = $_SESSION['data'];
            $dataNew += ['page' => 'form/register.php'];
            $mainPage = 'frontend.masterLayout';

            return $this->view($mainPage, $dataNew);
            
        }


        public function checkRegister() {

            $reult = false; 
            $errString = "Lỗi đăng ký";
            if(isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['date']) 
             && isset($_POST['password'])  && isset($_POST['gender']))
            {

                $check = true;

                $columns = [
                    'Email', 'MatKhau'
                ];
                $arrUserOlds = $this->userModel->getAll($columns);

                foreach($arrUserOlds as $key => $value) {
                    if($value['Email'] == $_POST['email']) {
                        $check = false;
                        break;
                    }
                    if($value['Email'] == $_POST['email'] && $value['MatKhau'] == md5($_POST['password'])) {
                        $check = false;
                        break;
                    }
                }
                if($check) {
                    $data = [
                        'TenKH' => $_POST['name'],
                        'NgaySinh' => $_POST['date'],
                        'GioiTinh'  => $_POST['gender'],
                        'MatKhau'   =>  md5($_POST['password']),
                        'Email'     => $_POST['email'],
                        'Quyen'     => 0
                    ];
                    $reult = $this->userModel->store($data);

                }
                else {
                    $errString = "Lỗi tên đăng nhập đã tồn tại";
                    
                    unset($_SESSION['data']['page']);
                    unset($_SESSION['data']['pageNew']);

                    $dataNew = $_SESSION['data'];
                    if(isset($dataNew['result'])) {
                        $dataNew['result'] = $errString;
                        $dataNew['typeMessage'] = "error";
                    } else {
                        $dataNew += ['result' => $errString];
                        $dataNew['typeMessage'] = "error";
                    }
                    
                    $dataNew += ['page' => 'form/register.php'];
                    $mainPage = 'frontend.masterLayout';

                    return $this->view($mainPage, $dataNew);
                }
                

                $userInfo = $this->userModel->checkLogin($_POST['email'], $_POST['password']);
                unset($_SESSION['data']['pageNew']);
                unset($_SESSION['data']['page']);

                $dataNew = $_SESSION['data'];
                $dataNew += ['userInfo' => $userInfo[0]];
                $dataNew += ['page' => 'home/index.php'];

                if(isset($dataNew['result'])) {
                    $dataNew['result'] = "Đăng ký thành công";
                    $dataNew['typeMessage'] = "success";
                } else {
                    $dataNew += ['result' => "Đăng ký thành công"];
                    $dataNew['typeMessage'] = "success";
                }
                $mainPage = 'frontend.masterLayout';
                return $this->view($mainPage, $dataNew);
                
                
            } else {
                $errString = "Lỗi để trống dữ liệu";
                $dataNew = $_SESSION['data'];
                $dataNew += ['page' => 'home/index.php'];

                if(isset($dataNew['result'])) {
                    $dataNew['result'] = $errString;
                    $dataNew['typeMessage'] = "error";
                } else {
                    $dataNew += ['result' => $errString];
                    $dataNew['typeMessage'] = "error";
                }
                $mainPage = 'frontend.masterLayout';
                return $this->view($mainPage, $dataNew);
            }
        }

        public function update()
        {
            if(isset($_POST['option'])) {
              $arrInfo = explode(', ', implode(', ', $_SESSION['data']['address-infor']));
              $arrInfoItem = (explode(' ', $arrInfo[0]));
              unset($arrInfo[0]);
              $arrInfo = array_merge($arrInfoItem, $arrInfo);
              $dataNew = $_SESSION['data'];
              $dataNew["arr-info"] = $arrInfo;
              $mainPage = 'frontend.payment.formAddress';
              return $this->view($mainPage, $dataNew);
            }
             $arrInfo = [$_POST['Wards'], $_POST['district'], $_POST['province'], $_POST['nation'],  $_POST['phone']];

              $stringInfor = "{$_POST['hosueNumber']} {$_POST['houseName']} {$_POST['way']}, ";
              $stringInfor .= implode(', ', $arrInfo);
              
            $condition = [
                'column'    => 'MaKH',
                'value'     =>  $_POST['id']
            ];
              $this->userModel->updateData(["ThongTinGiaoHang" => $stringInfor], $condition);
              $user = $this->userModel->findById($condition);
              $arrInfor = explode(",", $user['ThongTinGiaoHang']);
              $dataNew['emtyInfoA'] = true;
              if(empty($dataNew['userInfo']['ThongTinGiaoHang'])) {
                $dataNew['emtyInfoA'] = false;
              }        
              $dataNew = $_SESSION['data'];
              $mainPage = 'frontend.payment.infoAddress';
              $dataNew["address-infor"] = $arrInfor;
              return $this->view($mainPage, $dataNew);
        }


        public function logout()
        {   
            unset($_SESSION['data']['userInfo']);
            unset($_SESSION['data']['pageNew']);
            unset($_SESSION['data']['page']);
            $_SESSION['data']['result'] = "Đăng nhập để mua nhiều sách hơn";
            $_SESSION['data']['typeMessage'] = "error";
            $dataNew = $_SESSION['data'];
            $dataNew += ['page' => 'home/index.php'];
            $mainPage = 'frontend.masterLayout';
            return $this->view($mainPage, $dataNew);
        }

        public function showInfo()
        {
            
            $mainPage = 'frontend.masterLayout';
            unset($_SESSION['data']['page']);
            $dataNew = $_SESSION['data'];
            $dataNew +=[
                'page' => 'info/infoUser.php'
            ];
            return $this->view($mainPage, $dataNew);
        }

        public function showBill()
        {
            $mainPage = 'frontend.masterLayout';
            unset($_SESSION['data']['page']);
            if(isset($_SESSION['result'])) {
                unset($_SESSION['result']);
            }
            $dataNew = $_SESSION['data'];
            $bill = $this->billModel->getByIDUser($dataNew['userInfo']['MaKH']);
            $dataNew +=[
                'page' => 'info/bill.php'
            ];
            $dataNew +=[
                'bill' => $bill
            ];
            return $this->view($mainPage, $dataNew);
        }

        public function index() {

            $this->func->paginationFun($this->limit, 'userModel', 'admin.index', 'user', 'user/index');

        }
        public function pagination() {   

            $this->func->paginationFun($this->limit, 'userModel', 'admin/user/loadTable', 'user', '');

        }
    }
