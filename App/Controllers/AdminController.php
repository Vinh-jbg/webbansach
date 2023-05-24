<?php
    class AdminController extends BaseController {
        
        private $menuModel;
        private $categoryModel;
        private $productModel;
        private $authorModel;
        private $billDetailModel;
        private $billModel;
        private $importModel;

        public function __construct() {
            $this->loadAllModel();
        }

        public function loadAllModel() {
            $this->loadModel('MenuModel');
            $this->menuModel = new MenuModel;

            $this->loadModel('ImportModel');
            $this->importModel = new ImportModel;

            $this->loadModel('BillModel');
            $this->billModel = new BillModel;

            $this->loadModel('CategoryModel');
            $this->categoryModel = new CategoryModel;

            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
            
            $this->loadModel('AuthorModel');
            $this->authorModel = new AuthorModel;

            $this->loadModel('PublisherModel');
            $this->publisherModel = new PublisherModel;

            $this->loadModel('BillDetailModel');
            $this->billDetailModel = new BillDetailModel;
            

        }
    
        public function index() {
            
            $arrMenu =  $this->menuModel->getAll();
            $arrAuthor = $this->authorModel->getAll();
            $arrPublisher = $this->publisherModel->getAll();
            $arrCategory = $this->categoryModel->getAll($select = ['*'], $limit = 6, $orderBys = []);
            // $arrProductselling = ?; Danh sách bán chạy
            $mainPage = 'admin.index';
            $contentPage = 'statistical/index';

            return $this->view($mainPage,[
                    "menus"        => $arrMenu,
                    "categoryMain" => $arrCategory,
                    "authors"      => $arrAuthor,
                    "publlisher"   => $arrPublisher,
                    "page"         => $contentPage
                ]);
        }
        public function statisticalForTime()
        {
            $result = "Lọc thành công";
            if(isset($_POST['Date'])) {
                $startDate = $_POST['Date'];
                 $endDate = $_POST['Date'];
            } else {
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                if($_POST['startDate'] > $_POST['endDate']) {
                    $result = "Vui lòng nhập từ ngày nhỏ hơn đến lớn hơn";
                } else {
                    $result = "Lọc thành công";
                }
            }
            $arrCategory = $this->categoryModel->getAll();
            $arrProduct = $this->productModel->getAll();
            $arrProductCustomer = [];
            $arrBill = $this->billModel->staticticalForTime($startDate, $endDate);
            $arrBillDetail = [];
            foreach($arrBill as $key => $value) {
                $billDetail = $this->billDetailModel->getByBillID($arrBill[$key]['MaHD']);
                foreach($billDetail as $k => $val) {
                    array_push($arrBillDetail, $billDetail[$k]);
                }
            }
            foreach($arrBillDetail as $key => $value) {
                
                if(!isset($arrProductCustomer[$arrBillDetail[$key]['MaSP']])) {
                    $condition = [
                        'column'    => 'MaSP',
                        'value'     => $arrBillDetail[$key]['MaSP']
                    ];
                     $product = $this->productModel->findById($condition);
                    $arrProductCustomer[$arrBillDetail[$key]['MaSP']] = [ "DonGia" => $arrBillDetail[$key]['DonGia'],
                     "SoLuong" => $arrBillDetail[$key]['SoLuong'],
                     "TenSp" => $product['TenSp']
                     ] ;
                    
                } else {
                    $arrProductCustomer[$arrBillDetail[$key]['MaSP']]['DonGia'] += $arrBillDetail[$key]['DonGia'];
                    $arrProductCustomer[$arrBillDetail[$key]['MaSP']]['SoLuong'] +=  $arrBillDetail[$key]['SoLuong'];
                }
            }
            

            $message = $result;
            $mainPage = 'admin.index';
            $contentPage = 'statistical/statisticalIndex';

            if(isset($_POST['Date'])) { 
                return $this->view($mainPage,[
                    "categoryMain" => $arrCategory,
                    "page"         => $contentPage,
                    "product"   => $arrProduct,
                    "arrProductCustomer" => $arrProductCustomer,
                    "Date" => $startDate,
                    "result"    => $result,
                    "message"   => $message

                ]);
            }
            return $this->view($mainPage,[
                    "categoryMain" => $arrCategory,
                    "page"         => $contentPage,
                    "product"   => $arrProduct,
                    "arrProductCustomer" => $arrProductCustomer,
                    "startDate" => $startDate,
                    "endDate" => $endDate,
                    "result"    => $result,
                    "message"   => $message

                ]);
        }
        public function statistical()
        {
            $arrMenu =  $this->menuModel->getAll();
            $arrAuthor = $this->authorModel->getAll();
            $arrPublisher = $this->publisherModel->getAll();
            $arrCategory = $this->categoryModel->getAll();
            $arrProduct = $this->productModel->getAll();
            $arrProductCustomer = [];
            $arrBillDetail = $this->billDetailModel->getAll();

            if(isset($_POST['idSelect']) && $_POST['idSelect']!=-1){
                $condition = [
                    'column'    => 'MaTL',
                    'value'     => $_POST['idSelect']
                ];
                $arrProduct = $this->productModel->getByCategoryId($_POST['idSelect'], 100);
                foreach($arrBillDetail as $key => $value) {
                    $billCheck = $this->billModel->findById(['column'=>'MaHD', 'value' => $arrBillDetail[$key]['MaHD']]);
                    if(!is_null($billCheck)) {
                        if($billCheck['TinhTrang'] != 3) 
                            continue;
                    }
                    if(is_null($billCheck)) {
                            continue;
                    }
                    if(!isset($arrProductCustomer[$arrBillDetail[$key]['MaSP']])) {
                        $condition = [
                            'column'    => 'MaSP',
                            'value'     => $arrBillDetail[$key]['MaSP']
                        ];
                         $product = $this->productModel->findById($condition);
                        $arrProductCustomer[$arrBillDetail[$key]['MaSP']] = [ "DonGia" => $arrBillDetail[$key]['DonGia'],
                         "SoLuong" => $arrBillDetail[$key]['SoLuong'],
                         "TenSp" => $product['TenSp'],
                         "MaSP" => $product['MaSP']
                         ] ;
                        //  echo($arrBillDetail[$key]['SoLuong']."key".$arrBillDetail[$key]['MaSP']);
                        
                    } else {
                        // $arrProductCustomer[$arrBillDetail[$key]['MaSP']]['DonGia'] += $arrBillDetail[$key]['DonGia'];
                        $arrProductCustomer[$arrBillDetail[$key]['MaSP']]['SoLuong'] +=  $arrBillDetail[$key]['SoLuong'];
                        // echo($arrBillDetail[$key]['MaHD']."key".$arrBillDetail[$key]['MaSP']);
                    }
                }
          
                foreach($arrProductCustomer as $key => $value) {
                    $check = false;
                    foreach($arrProduct as $k => $val) {
                        if($arrProductCustomer[$key]['MaSP'] == $arrProduct[$k]['MaSP']) {
                            $check = true;
                        }
                    }
                    if($check == false ){
                        unset($arrProductCustomer[$key]);
                    }
                }
           
                $mainPage = 'admin.statistical.loadTable';
              
    
                return $this->view($mainPage,[
                        "menus"        => $arrMenu,
                        "categoryMain" => $arrCategory,
                        "authors"      => $arrAuthor,
                        "publlisher"   => $arrPublisher,
                        "arrProductCustomer" => $arrProductCustomer
                    ]);
            }
            if(isset($_POST['idSelect']) && $_POST['idSelect']==-1){
                
                foreach($arrBillDetail as $key => $value) {
                    $billCheck = $this->billModel->findById(['column'=>'MaHD', 'value' => $arrBillDetail[$key]['MaHD']]);
                    if(!is_null($billCheck)) {
                        if($billCheck['TinhTrang'] != 3) 
                            continue;
                    }
                    if(is_null($billCheck)) {
                        continue;
                    }
                    if(!isset($arrProductCustomer[$arrBillDetail[$key]['MaSP']])) {
                        $condition = [
                            'column'    => 'MaSP',
                            'value'     => $arrBillDetail[$key]['MaSP']
                        ];
                         $product = $this->productModel->findById($condition);
                        $arrProductCustomer[$arrBillDetail[$key]['MaSP']] = [ "DonGia" => $arrBillDetail[$key]['DonGia'],
                         "SoLuong" => $arrBillDetail[$key]['SoLuong'],
                         "TenSp" => $product['TenSp'],
                         "MaSP" => $product['MaSP']
                         ] ;
                        
                    } else {
                        // $arrProductCustomer[$arrBillDetail[$key]['MaSP']]['DonGia'] += $arrBillDetail[$key]['DonGia'];
                        $arrProductCustomer[$arrBillDetail[$key]['MaSP']]['SoLuong'] +=  $arrBillDetail[$key]['SoLuong'];
                    }
                }
           
                $mainPage = 'admin.statistical.loadTable';
                return $this->view($mainPage,[
                        "menus"        => $arrMenu,
                        "categoryMain" => $arrCategory,
                        "authors"      => $arrAuthor,
                        "publlisher"   => $arrPublisher,
                        "arrProductCustomer" => $arrProductCustomer
                    ]);
            }

            foreach($arrBillDetail as $key => $value) {
                $billCheck = $this->billModel->findById(['column'=>'MaHD', 'value' => $arrBillDetail[$key]['MaHD']]);
                if(!is_null($billCheck)) {
                    if($billCheck['TinhTrang'] != 3) 
                        continue;
                }
                if(is_null($billCheck)) {
                    continue;
                 }
                if(!isset($arrProductCustomer[$arrBillDetail[$key]['MaSP']])) {
                    $condition = [
                        'column'    => 'MaSP',
                        'value'     => $arrBillDetail[$key]['MaSP']
                    ];
                     $product = $this->productModel->findById($condition);
                    $arrProductCustomer[$arrBillDetail[$key]['MaSP']] = [ "DonGia" => $arrBillDetail[$key]['DonGia'],
                     "SoLuong" => $arrBillDetail[$key]['SoLuong'],
                     "TenSp" => $product['TenSp'],
                     "MaSP" => $product['MaSP']
                     ] ;
                } else {
                    $arrProductCustomer[$arrBillDetail[$key]['MaSP']]['SoLuong'] +=  $arrBillDetail[$key]['SoLuong'];
                }
            }
            $mainPage = 'admin.index';
            $contentPage = 'statistical/statisticalIndex';

            return $this->view($mainPage,[
                    "menus"        => $arrMenu,
                    "categoryMain" => $arrCategory,
                    "authors"      => $arrAuthor,
                    "publlisher"   => $arrPublisher,
                    "page"         => $contentPage,
                    "arrProductCustomer" => $arrProductCustomer
                ]);
        }

        public function revenueStatistical()
        {
            $result = "Lọc thành công";
           
           if(isset($_POST['startDate'])) {
                if($_POST['startDate'] > $_POST['endDate']) {
                    $result = "Vui lòng nhập từ ngày nhỏ hơn đến lớn hơn";
                } else {
                    $result = "Lọc thành công";
                }
               $startDate = $_POST['startDate'];
               $endDate = $_POST['endDate'];
               $arrBill = $this->billModel->staticticalForTime($startDate, $endDate);
               $arrImport = $this->importModel->staticticalForTime($startDate, $endDate);
           } else {
            $arrBill = $this->billModel->staticticalForTime();
            $arrImport = $this->importModel->staticticalForTime();
           }
            $arrMenu =  $this->menuModel->getAll();
            $arrAuthor = $this->authorModel->getAll();
            $arrPublisher = $this->publisherModel->getAll();
            $arrCategory = $this->categoryModel->getAll($select = ['*'], $limit = 6, $orderBys = []);
            // $arrProductselling = ?; Danh sách bán chạy
            $message = $result;
            $mainPage = 'admin.index';
            $contentPage = 'statistical/revenueStatistical';

            return $this->view($mainPage,[
                    "menus"        => $arrMenu,
                    "categoryMain" => $arrCategory,
                    "authors"      => $arrAuthor,
                    "publlisher"   => $arrPublisher,
                    "page"         => $contentPage,
                    "bill" => $arrBill,
                    "import"    => $arrImport,
                    "result"    => $result,
                    "message"   => $message
                ]);
        }
    }
?>