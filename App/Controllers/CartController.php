<?php
    class CartController extends BaseController{

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

        public function loadDetailProduct() {

            $id = 0 ;
            if(isset($_GET['idsach'])) {
                $id = $_GET['idsach'];
            }
            $condition = [
                'column'    => 'MaSP',
                'value'     => $id
            ];

            $arrProduct = $this->productModel->findById($condition);

            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
                if($arrProduct['SoLuong'] <= 0) {
                    $arrProduct['SoLuong'] = 0;
                } else {

                    $arrProduct['SoLuong'] = 1;
                }
                $_SESSION['cart'][$id] = $arrProduct;
            } else {

                if($arrProduct['SoLuong'] <= 0) {
                    $arrProduct['SoLuong'] = 0;
                } else {

                    $arrProduct['SoLuong'] = 1;
                }
                if(isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['SoLuong'] += $arrProduct['SoLuong'];
                } else {
                    $arrProduct['SoLuong'] = $arrProduct['SoLuong'];
                    $_SESSION['cart'][$id] = $arrProduct;
                }
            }
            $total_products = 0;
            $total_prices = 0;
            foreach($_SESSION['cart'] as $key => $val) {
                $total_products += $_SESSION['cart'][$key]['SoLuong'];
                
                $sale = $this->promotionModel->findById(['column' => 'MaKM','value'  =>  $_SESSION['cart'][$key]['MaKM']]);

                $salePercent = $sale['PhanTram'];
                $discount = round( $_SESSION['cart'][$key]['Dongia'] * ((100 - $salePercent)/100), -3) *  $_SESSION['cart'][$key]['SoLuong'];
                $_SESSION['cart'][$key]['khuyenmai'] =  round( $_SESSION['cart'][$key]['Dongia'] * ((100 - $salePercent)/100), -3);
                $total_prices += $discount;

            }
            // unset($_SESSION['cart']);
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
            $dataNew = [
               
                "products"     => $arrProduct,
                "page"         => $contentPage,
                "category"  => $category,
                "author"    => $author,
                "publisher" => $publisher,
                "khuyenmai" => $discount,
                "save"  => $save,
                "salePercent" => $salePercent,
                "notification"  => 1,
                "soluongsp" => $total_products,
                "tongtien"  => $total_prices,
                "userInfo" => $_SESSION['data']['userInfo']
            ];
            return $this->view($mainPage, $dataNew);

            
        }

        public function index()
        {
            $dataNew = $_SESSION['data'];
            
            
            $dataNew['page'] = 'carts/index.php';
            
            $mainPage = 'frontend.masterLayout';
            return $this->view($mainPage, $dataNew);
        }

        public function update()
        {
            $message = "";   
            if(isset($_POST['option'])) {
                if($_POST['option'] == "des") {
                    if( $_SESSION['cart'][$_POST['MaSP']]['SoLuong'] > 0) {
                        $_SESSION['cart'][$_POST['MaSP']]['SoLuong'] -= 1;
                    }
                } else {
                    $condition = [
                        'column'    => 'MaSP',
                        'value'     => $_POST['MaSP']
                    ];
        
                    $arrProduct = $this->productModel->findById($condition);
                    if($_SESSION['cart'][$_POST['MaSP']]['SoLuong'] >= $arrProduct['SoLuong']) {
                        $message = "Sản phẩm không đủ";
                    } else {
                        
                        $_SESSION['cart'][$_POST['MaSP']]['SoLuong'] += 1;
                    }
                }
            }

            $mainPage = 'frontend.carts.cart-form';
            

            // result 
            return $this->view($mainPage, [
                "message" => $message
            ]);
        }

        public function delete()
        {
            if(!isset($_POST['option'])) {

                if(isset($_POST['MaSP'])) {
                    unset($_SESSION['cart'][$_POST['MaSP']]);
                    $mainPage = 'frontend.blocks.cart-block';
                    return $this->view($mainPage, []);
                }
            } else {
                if(isset($_POST['MaSP'])) {
                    unset($_SESSION['cart'][$_POST['MaSP']]);
                    $mainPage = 'frontend.carts.cart-form';
                    return $this->view($mainPage, []);
                }
            }
        }

      
    }
?>