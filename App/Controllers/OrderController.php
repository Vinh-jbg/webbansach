<?php
    class OrderController extends BaseController{
        private $userModel;

        public function __construct() {
            
            $this->loadModel('UserModel');
            $this->userModel = new UserModel;
        }
        public function confirmAddrress()
        {
            if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
               echo "Giỏ hàng rỗng";
            } else {
                $total_products = 0;
                foreach($_SESSION['cart'] as $key => $value) {
                    $total_products += $_SESSION['cart'][$key]['SoLuong'];
                }
                if($total_products == 0) {
                    echo "Giỏ hàng rỗng";
                } else {
                    if(!isset($_SESSION['data']['userInfo'])) {
                        $dataNew = $_SESSION['data'];
                        $mainPage = 'frontend.masterLayout';

                        $contentPage = 'form/login.php';
                        $dataNew["pageNew"]  = $contentPage;
                        
                        return $this->view($mainPage, $dataNew);
                    } else {

                        $condition = [
                            'column'    => 'MaKH',
                            'value'     =>  $_SESSION['data']['userInfo']["MaKH"]
                        ];
                        $user = $this->userModel->findById($condition);
                        $arrInfor = explode(",", $user['ThongTinGiaoHang']);
                        $dataNew = $_SESSION['data'];

                        $dataNew["address-infor"] = $arrInfor;
                        
                        $mainPage = 'frontend.masterLayout';
                        $contentPage = 'payment/index.php';
                        $dataNew["page"]  = $contentPage;
                        $dataNew["nextPage"]  = "voucher";
                        $_SESSION['data'] = $dataNew;
                        return $this->view($mainPage, $dataNew);
                    }
                }
            }
        } 
      public function discountPage()
      {
        $dataNew = $_SESSION['data'];
        $mainPage = 'frontend.payment.pay';
        unset($dataNew["nextPage"]);
        
        
        $dataNew["nextPage"]  = "confirm";
        return $this->view($mainPage, $dataNew);
      }
      public function confirmPage()
      {
        $dataNew = $_SESSION['data'];
        $arrInfor = explode(",",  $dataNew['userInfo']['ThongTinGiaoHang']);
        $dataNew = $_SESSION['data'];
        $dataNew["address-infor"] = $arrInfor;
        $mainPage = 'frontend.payment.confirm';
        unset($dataNew["nextPage"]);
        $dataNew["nextPage"]  = "confirm";
        return $this->view($mainPage, $dataNew);
      }
    }
