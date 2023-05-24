<?php

    class  BillController extends BaseController{ 

        private $billModel;
        private $billDetailModel;
        private $productModel;
        private $userModel;
        private $func;

        public function __construct() {
            
            $this->loadModel('UserModel');
            $this->userModel = new UserModel;

            $this->loadModel('BillDetailModel');
            $this->billDetailModel = new BillDetailModel;
            
            $this->loadModel('BillModel');
            $this->billModel = new BillModel;

            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;

            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;

            $this->limit = 10;
        }
        public function store()
        {
            $total = 0;
            
            $Date = date("Y/m/d");
            foreach($_SESSION['cart'] as $key => $val) {
                $total += $_SESSION['cart'][$key]['SoLuong']* $_SESSION['cart'][$key]['khuyenmai'];
            }
            $data = [
                "NgayTao" => $Date,
                "TinhTrang" => 0,
                "TongTien"  => $total,
                "MaKH"  => $_SESSION['data']['userInfo']['MaKH']
                ];
                $result = $this->billModel->store($data);
                $arrBill = $this->billModel->getAll(['MaHD'], 1, ['column' => 'MaHD', 'by'=>'desc']);
                $id = $arrBill[0]['MaHD'];
                if($result) {
                    foreach($_SESSION['cart'] as $key => $val) {
                        if($_SESSION['cart'][$key]['SoLuong'] == 0) {
                            continue;
                        }

                        $condition = [
                            'column'    => 'MaSP',
                            'value'     =>  $key
                        ];
                        $product = $this->productModel->findById($condition);
                        if($product['SoLuong'] == 0) {
                            continue;
                        }
                        $Mount = $product['SoLuong'] - $_SESSION['cart'][$key]['SoLuong'];
                        $data = [
                            "SoLuong"   => $Mount,
                        ];
                        $this->productModel->updateData($data, $condition);


                        $data = [
                            "MaHD" => $id,
                            "MaSP" => $key,
                            "DonGia"  => $_SESSION['cart'][$key]['khuyenmai'],
                            "SoLuong"  => $_SESSION['cart'][$key]['SoLuong']
                            ];
                        $this->billDetailModel->store($data);
                    }
                    unset($_SESSION['cart']);
                    ///fix
                    echo "Đặt hàng thành công";
                } else {
                    echo "Đặt hàng thất bại";
                }

        }

        public function update()
        {
            $condition = [
                'column'    => 'MaHD',
                'value'     =>  $_POST['MaHD']
            ];
           
            $Date = $_POST['Date'];
            $status = isset($_POST['status']) ?  $_POST['status'] : 0;
            $data = [
                    "NgayTao" => $Date,
                    "TinhTrang" => $status,
                    ];
            $this->billModel->updateData($data, $condition);   // update phiếu nhập

            $billDetailArr = $this->billDetailModel->getByBillID($_POST['MaHD']);
            //Nhập hàng vào bảng sách
            foreach($billDetailArr as $key => $value) {
                    // if status = 1 imported 
                    $conditionP = [
                        'column'    => 'MaSP',
                        'value'     =>  $value['MaSP']
                    ];
                    $product = $this->productModel->findById($conditionP);
                    $billDetailArr[$key] += ['TenSp' => $product['TenSp']];
            }
            $bill = $this->billModel->findById($condition);
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;
            $user = $this->userModel->findById(['column'=> 'MaKH', 'value' =>  $bill['MaKH']]);
            return $this->view('admin.index',[
                'page' => 'bill/show',
                'bill' => $bill,
                'pageCurrent' =>$pageCurrent,
                'productTemp' => $billDetailArr,
                'user' => $user
            ]);
         }


        public function index() {

            $this->func->paginationFun($this->limit, 'billModel', 'admin.index', 'bill', 'bill/index');

        }
        public function pagination() {   

            $this->func->paginationFun($this->limit, 'billModel', 'admin/bill/loadTable', 'bill', '');

        }
        public function show() {

            // điều kiện
            $condition = [
                'column'    => 'MaHD',
                'value'     =>  $_POST['id']
            ];
            $bill = $this->billModel->findById($condition);

            $user = $this->userModel->findById(['column'=> 'MaKH', 'value' =>  $bill['MaKH']]);
            
            $productTemp = $this->billDetailModel->getByBillID($_POST['id']);
            foreach($productTemp as $key => $value) {
                //Lấy sản phẩm
                $condition = [
                    'column'    => 'MaSP',
                    'value'     =>  $productTemp[$key]['MaSP']
                ];
                $product = $this->productModel->findById($condition);
                $productTemp[$key] += ['TenSp' => $product['TenSp']];
            }
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            return $this->view('admin.index',[
                'page' => 'bill/show',
                'bill' => $bill,
                'pageCurrent' =>$pageCurrent,
                'user' => $user,
                'productTemp' => $productTemp
            ]);
        }
        public function showDetail()
        {
            $id = $_POST['id'][0];

            $condition = [
                'column'    => 'MaHD',
                'value'     =>  $id
            ];
            $bill = $this->billModel->findById($condition);

            $user = $this->userModel->findById(['column'=> 'MaKH', 'value' =>  $bill['MaKH']]);
            
            $productTemp = $this->billDetailModel->getByBillID($_POST['id'][0]);
            foreach($productTemp as $key => $value) {
                //Lấy sản phẩm
                $condition = [
                    'column'    => 'MaSP',
                    'value'     =>  $productTemp[$key]['MaSP']
                ];
                $product = $this->productModel->findById($condition);
                $productTemp[$key] += ['TenSp' => $product['TenSp']];
                $productTemp[$key] += ['img' => $product['img']];
                $productTemp[$key] += ['MaTl' => $product['MaTl']];
                $productTemp[$key] += ['TinhTrang' => $bill['TinhTrang']];

                $productTemp[$key] += ['MaHD' => $bill['MaHD']];
            }
            //show detail user
            if(isset($_POST['option'])) {
                return $this->view('frontend/info/bill-detail',[
                    'bill' => $bill,
                    'userInfo' => $user,
                    'productTemp' => $productTemp
                ]); 
            }

            return $this->view('admin/bill/showDetail',[
                'bill' => $bill,
                'user' => $user,
                'productTemp' => $productTemp
            ]);
        }

        public function showFormBillDetail()
        {
            $condition = [
                'column'    => 'MaHD',
                'value'     =>  $_POST['MaHD']
            ];
            $bill = $this->billModel->findById($condition);

            $billDetail = $this->billDetailModel->getByIDPB($_POST['MaHD'],  $_POST['MaSP'][0]);
            return $this->view('admin.bill.formEditDetailBill',[
                'productTemp' => $billDetail[0],
                'bill'    => $bill
            ]);
        }

        public function deleteDetailBillForUser()
        { 
            $idSP = $_POST['MaSP'];
            $idHD = $_POST['MaHD'];
            $Mount = $_POST['mount'];
            $condition = [
                'column'    => 'MaSP',
                'value'     =>  $_POST['MaSP']
            ];
            $product = $this->productModel->findById($condition);

            $billDetail = $this->billDetailModel->getByIDPB($_POST['MaHD'], $_POST['MaSP']);

            if($_POST['option'] == "delete") {

                    $Mount = $product['SoLuong'] + $Mount;
            }
            $condition = "MaHD ={$idHD} and MaSP = {$idSP}";
            $this->billDetailModel->deleteData($condition);

            $condition = [
                'column'    => 'MaSP',
                'value'     =>  $_POST['MaSP']
            ];
            $data = [
                "SoLuong"   => $Mount,
            ];
            $this->productModel->updateData($data, $condition);
            $condition = [
                'column'    => 'MaHD',
                'value'     =>  $_POST['MaHD']
            ];
            $bill = $this->billModel->findById($condition);
            $total = 0;
            $productTemp = $this->billDetailModel->getByBillID($_POST['MaHD']);
            if($bill[0]['TongTien'] == 0) {
                $this->billModel->deleteData($condition);
            }
            // lẤy các sp nèm trong phiếu nhập
            foreach($productTemp as $key => $value) {
                //Lấy sản phẩm
                $conditionP = [
                    'column'    => 'MaSP',
                    'value'     =>  $productTemp[$key]['MaSP']
                ];
                $product = $this->productModel->findById($conditionP);
                $productTemp[$key] += ['TenSp' => $product['TenSp']];
                $total += $value['DonGia']*$value['SoLuong'];
                $productTemp[$key] += ['img' => $product['img']];
                $productTemp[$key] += ['MaTl' => $product['MaTl']];
                $productTemp[$key] += ['TinhTrang' => $bill['TinhTrang']];
            }
            $data = [
                'TongTien' => $total
            ];  
            $this->billModel->updateData($data, $condition);
            $bill = $this->billModel->findById($condition);
            $condition = [
                'column'    => 'MaKH',
                'value'     =>  $bill['MaKH']
            ];
            $user = $this->userModel->findByID($condition);

            return $this->view('frontend.info.bill-detail',[
                'userInfo'  => $user,
                'productTemp' => $productTemp
            ]);

        }
        public function updateDetailBillForUser()
        { 
            $condition = [
                'column'    => 'MaSP',
                'value'     =>  $_POST['MaSP']
            ];
            $product = $this->productModel->findById($condition);

            $billDetail = $this->billDetailModel->getByIDPB($_POST['MaHD'], $_POST['MaSP']);

            if($_POST['option'] == "des") {
                 if($billDetail[0]['SoLuong'] > 0) {

                    $Mount = $product['SoLuong'] + 1;
                    $data = ['SoLuong'   => $billDetail[0]['SoLuong'] - 1];  
                } else {
                    $Mount = $product['SoLuong'];
                    $data = [ 'SoLuong'   => $billDetail[0]['SoLuong'] ];
                }
                
            } else {
                $Mount = $product['SoLuong'];
                if($product['SoLuong'] > 0) {
                    $Mount = $product['SoLuong'] - 1;
                    $data = [
                        'SoLuong'   => $billDetail[0]['SoLuong'] + 1
                    ];  
                }
            }

            $condition = "MaHD ={$_POST['MaHD']} and MaSP = {$_POST['MaSP']}";
            $this->billDetailModel->updateData($data, $condition);

            $condition = [
                'column'    => 'MaSP',
                'value'     =>  $_POST['MaSP']
            ];
            $data = [
                "SoLuong"   => $Mount,
            ];
            $this->productModel->updateData($data, $condition);
            $condition = [
                'column'    => 'MaHD',
                'value'     =>  $_POST['MaHD']
            ];
            $bill = $this->billModel->findById($condition);
            $total = 0;
            $productTemp = $this->billDetailModel->getByBillID($_POST['MaHD']);
            // lẤy các sp nèm trong phiếu nhập
            foreach($productTemp as $key => $value) {
                //Lấy sản phẩm
                $conditionP = [
                    'column'    => 'MaSP',
                    'value'     =>  $productTemp[$key]['MaSP']
                ];
                $product = $this->productModel->findById($conditionP);
                $productTemp[$key] += ['TenSp' => $product['TenSp']];
                $total += $value['DonGia']*$value['SoLuong'];
                $productTemp[$key] += ['img' => $product['img']];
                $productTemp[$key] += ['MaTl' => $product['MaTl']];
                $productTemp[$key] += ['TinhTrang' => $bill['TinhTrang']];
            }
            $data = [
                'TongTien' => $total
            ];  
            $this->billModel->updateData($data, $condition);
            $bill = $this->billModel->findById($condition);
            $condition = [
                'column'    => 'MaKH',
                'value'     =>  $bill['MaKH']
            ];
            $user = $this->userModel->findByID($condition);

            return $this->view('frontend.info.bill-detail',[
                'userInfo'  => $user,
                'productTemp' => $productTemp
            ]);

        }

        public function export() {
            $arr = $this->billModel->getAll();
            $this->func->export($arr);
        }
      
        public function updateDetailBill()
        {

            $condition = [
                'column'    => 'MaSP',
                'value'     =>  $_POST['MaSP']
            ];
            $product = $this->productModel->findById($condition);
            // số lượng trong kho đủ cung cấp
                 if($product['SoLuong'] > 0) {
                // update chi tiêt
                $data = [
                    'SoLuong'   => $_POST['mount']
                ];  
                
                $billDetail = $this->billDetailModel->getByIDPB($_POST['MaHD'], $_POST['MaSP']);
                if($billDetail[0]['SoLuong'] > $_POST['mount']) {
                    $Mount = $product['SoLuong'] + ($billDetail[0]['SoLuong'] - $_POST['mount']);
                } else if($billDetail[0]['SoLuong'] < $_POST['mount']){
                    $Mount = $product['SoLuong'] - ($_POST['mount'] - $billDetail[0]['SoLuong']);

                } else {
                    $Mount = $product['SoLuong'];

                }
                $condition = "MaHD ={$_POST['MaHD']} and MaSP = {$_POST['MaSP']}";
               

                $this->billDetailModel->updateData($data, $condition);

                $condition = [
                    'column'    => 'MaSP',
                    'value'     =>  $_POST['MaSP']
                ];
                $data = [
                    "SoLuong"   => $Mount,
                ];
                $this->productModel->updateData($data, $condition);

            }// update tổng tiền
            $condition = [
                'column'    => 'MaHD',
                'value'     =>  $_POST['MaHD']
            ];
            $bill = $this->billModel->findById($condition);
            $total = 0;
            $productTemp = $this->billDetailModel->getByBillID($_POST['MaHD']);
            // lẤy các sp nèm trong phiếu nhập
            foreach($productTemp as $key => $value) {
                //Lấy sản phẩm
                $conditionP = [
                    'column'    => 'MaSP',
                    'value'     =>  $productTemp[$key]['MaSP']
                ];
                $product = $this->productModel->findById($conditionP);
                $productTemp[$key] += ['TenSp' => $product['TenSp']];
                $total += $value['DonGia']*$value['SoLuong'];
            }
            $data = [
                'TongTien' => $total
            ];  
            $this->billModel->updateData($data, $condition);
            $bill = $this->billModel->findById($condition);
            $condition = [
                'column'    => 'MaKH',
                'value'     =>  $bill['MaKH']
            ];
            $user = $this->userModel->findByID($condition);
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            return $this->view('admin.index',[
                'page' => 'bill/show',
                'bill' => $bill,
                'user'  => $user,
                'pageCurrent' =>$pageCurrent,
                'productTemp' => $productTemp
            ]);
            }
            
    }
 ?>