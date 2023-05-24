<?php
    class HomeController extends BaseController {
        
        private $menuModel;
        private $categoryModel;
        private $productModel;
        private $authorModel;
        private $promotionModel;
        private $func;
        
        public function __construct() {
            $this->loadAllModel();
        }

        public function loadAllModel() {

            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;

            $this->loadModel('MenuModel');
            $this->menuModel = new MenuModel;

            $this->loadModel('CategoryModel');
            $this->categoryModel = new CategoryModel;

            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
                        
            $this->loadModel('PromotionModel');
            $this->promotionModel = new PromotionModel;
            
            $this->loadModel('AuthorModel');
            $this->authorModel = new AuthorModel;

            $this->loadModel('PublisherModel');
            $this->publisherModel = new PublisherModel;
        }

        public function loadMenu() {
            return $this->menuModel->getAll();
        }

        public function loadForMenu($model) {
            $arrMenu = $this->loadMenu(); 
            $arr = [];
            foreach($arrMenu as $key => $val) {
                array_push($arr, $this->$model->getByMenuId($val['MaDM']));
            } 
            return $arr;
        }

        public function loadProductForCategory() {
            $arrCategory = $this->categoryModel->getAll(); 
            $arr = [];
            foreach($arrCategory as $key => $val) {
                //Lấy sản phẩm theo thể loại
                $arrProduct = $this->productModel->getByCategoryId($val['MaTL']);

                $arrProductNew = [];
                //Lấy chi tiết sản phẩm 

                foreach ($arrProduct as $k => $item) {
                    $author = $this->authorModel->findById(['column'    => 'MaTG','value' => $item['MaTg']]);
                    $sale = $this->promotionModel->findById(['column' => 'MaKM','value'  => $item['MaKM']]);
                    $authorName = $author['TenTG'];
                    $salePercent = $sale['PhanTram'];
                    $discount = round($item['Dongia'] * ((100 - $sale['PhanTram'])/100), -3);
                    $discount = $this->func->currency_format($discount);
                    // $discount = $this->dicountModel->findById($item['MaKM']);
                    $arrProductDetail = [
                        'MaSP'      => $item['MaSP'],
                        'TenSP'     => $item['TenSp'],
                        'Dongia'    => $this->func->currency_format($item['Dongia']),
                        'SoLuong'   => $item['SoLuong'],
                        'TenTG'     => $authorName,
                        'img'       => $item['img'],
                        'MoTa'      => $item['MoTa'],
                        'KhuyenMai' => $salePercent,
                        'discount'  => $discount
                        //customer
                    ];
                  
                    array_push($arrProductNew, $arrProductDetail);
                }
                array_push($arr, $arrProductNew);
                // array_push($arr, $this->productModel->getByCategoryId($val['MaTL']));
            } 
            return $arr;
        }

        public function index() {
            $arrMenu =  $this->loadMenu();
            $arrAuthor = $this->loadForMenu('authorModel');
            $arrCategoryForMenu = $this->loadForMenu('categoryModel');
            $arrPublisher = $this->loadForMenu('publisherModel');
            $arrProduct = $this->loadProductForCategory();
            $arrCategory = $this->categoryModel->getAll($select = ['*'], $limit = 4, $orderBys = []);
            // $arrProductselling = ?; Danh sách bán chạy
            $mainPage = 'frontend.masterLayout';
            $contentPage = 'home/index.php';

            // $dataNew += ['pageNew' => 'form/login.php'];
            $dataNew = [
                "menus"        => $arrMenu,
                "categorys"    => $arrCategoryForMenu,
                "categoryMain" => $arrCategory,
                "authors"      => $arrAuthor,
                "publlisher"   => $arrPublisher,
                "products"     => $arrProduct,
                "page"         => $contentPage,
            ];
            //Nếu có đăng nhập trả về thêm userInfor
            if(isset($_SESSION['data'])) {
                if(isset($_SESSION['data']['userInfo'])) {
                    
                    $dataNew += ["userInfo"     => $_SESSION['data']['userInfo']];
                    return $this->view($mainPage, $dataNew);

                } else return $this->view($mainPage, $dataNew);
                //Nếu không đăng nhập trả về mới

            }
            return $this->view($mainPage, $dataNew);
            
            
        }

        public function loadDetailProduct() {
            // $id;
            if(isset($_GET['idsach'])) {
                $id = $_GET['idsach'];
            }
            $condition = [
                'column'    => 'MaSP',
                'value'     => $id
            ];

            $arrProduct = $this->productModel->findById($condition);
            $condition = [
                'column'    => 'MaTL',
                'value'     => $arrProduct['MaTl']
            ];
            $category = $this->categoryModel->findById($condition);

            $condition = [
                'column'    => 'MaTG',
                'value'     => $arrProduct['MaTg']
            ];
            $author = $this->authorModel->findById($condition);

            $condition = [
                'column'    => 'MaNXB',
                'value'     => $arrProduct['MaNXB']
            ];
            $publisher = $this->publisherModel->findById($condition);

            $sale = $this->promotionModel->findById(['column' => 'MaKM','value'  => $arrProduct['MaKM']]);

            $salePercent = $sale['PhanTram'];
            $discount = round($arrProduct['Dongia'] * ((100 - $salePercent)/100), -3);
            $discount = $this->func->currency_format($discount);

            $save = round($arrProduct['Dongia'] * (($salePercent)/100), -3);
            $save = $this->func->currency_format($save);
            $mainPage = 'frontend.masterLayout';
            $contentPage = 'products/detail.php';
            if(isset($_SESSION['data']['userInfo'])) {
                $dataNew = [
               
                    "products"     => $arrProduct,
                    "page"         => $contentPage,
                    "category"  => $category,
                    "author"    => $author,
                    "publisher" => $publisher,
                    "khuyenmai" => $discount,
                    "save"  => $save,
                    "salePercent" => $salePercent,
                    "userInfo" => $_SESSION['data']['userInfo']
                ];
            } else {
                $dataNew = [
               
                    "products"     => $arrProduct,
                    "page"         => $contentPage,
                    "category"  => $category,
                    "author"    => $author,
                    "publisher" => $publisher,
                    "khuyenmai" => $discount,
                    "save"  => $save,
                    "salePercent" => $salePercent,
                ];
            }
            
            return $this->view($mainPage, $dataNew);

            
        }

        public function search() {
            $arrMenu =  $this->loadMenu();
            $arrAuthor = $this->loadForMenu('authorModel');
            $arrCategoryForMenu = $this->loadForMenu('categoryModel');
            $arrPublisher = $this->loadForMenu('publisherModel');
            if(isset($_POST['values'])) {

                if($_POST['values'] == "") {
    
                    $arrProduct = $this->productModel->getAll();
                } else {
                    $arrProduct = $this->productModel->searchByName($_POST['values']);
                }
            } else {
                $arrProduct = $this->productModel->getByCategoryId($_GET['MaTL'], 20);
            }
            $arr = [];
            $arrProductNew = [];
            //Lấy chi tiết sản phẩm 

            foreach ($arrProduct as $k => $item) {
                $author = $this->authorModel->findById(['column'    => 'MaTg','value' => $item['MaTg']]);
                $sale = $this->promotionModel->findById(['column' => 'MaKM','value'  => $item['MaKM']]);
                $authorName = $author['TenTG'];
                $salePercent = $sale['PhanTram'];
                $discount = round($item['Dongia'] * ((100 - $sale['PhanTram'])/100), -3);
                $discount = $this->func->currency_format($discount);
                // $discount = $this->dicountModel->findById($item['MaKM']);
                $arrProductDetail = [
                    'MaSP'      => $item['MaSP'],
                    'TenSP'     => $item['TenSp'],
                    'DonGia'    => $item['Dongia'],
                    'SoLuong'   => $item['SoLuong'],
                    'TenTG'     => $authorName,
                    'img'       => $item['img'],
                    'MoTa'      => $item['MoTa'],
                    'KhuyenMai' => $salePercent,
                    'MaTL'      => $item['MaTl'],
                    'discount'  => $discount
                    //customer
                ];
              
                array_push($arrProductNew, $arrProductDetail);
            }
            array_push($arr, $arrProductNew);

            $arrCategory = $this->categoryModel->getAll($select = ['*'], $limit = 15, $orderBys = []);
            // $arrProductselling = ?; Danh sách bán chạy
            $mainPage = 'frontend.masterLayout';
            $contentPage = 'home/search.php';

            // $dataNew += ['pageNew' => 'form/login.php'];
            $dataNew = [
                "menus"        => $arrMenu,
                "categorys"    => $arrCategoryForMenu,
                "categoryMain" => $arrCategory,
                "authors"      => $arrAuthor,
                "publlisher"   => $arrPublisher,
                "products"     => $arrProductNew,
                "page"         => $contentPage,
            ];
            //Nếu có đăng nhập trả về thêm userInfor
            if(isset($_SESSION['data'])) {
                if(isset($_SESSION['data']['userInfo'])) {
                    
                    $dataNew += ["userInfo"     => $_SESSION['data']['userInfo']];
                    return $this->view($mainPage, $dataNew);

                } else return $this->view($mainPage, $dataNew);
                //Nếu không đăng nhập trả về mới

            }
            return $this->view($mainPage, $dataNew);
            
            
        }

    }
?>
















<!-- // if(isset($_SESSION['data'])){
//     if(isset($_SESSION['data']['pageNew'])) {
//         if($_SESSION['data']['pageNew']!="form/login.php") {
//             return $this->view($mainPage,[
//                 "menus"        => $arrMenu,
//                 "categorys"    => $arrCategoryForMenu,
//                 "categoryMain" => $arrCategory,
//                 "authors"      => $arrAuthor,
//                 "publlisher"   => $arrPublisher,
//                 "products"     => $arrProduct,
//                 "page"         => $contentPage,
//             ]);
//         }
//       }
// } -->
