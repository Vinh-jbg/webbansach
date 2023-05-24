<?php

    class ProductController extends BaseController{

        private $categoryModel;
        private $authorModel;
        private $publisherModel;
        private $promotionModel;
        private $menuModel;
        private $limit;
        private $func;
        private $upLoad;
        private $productModel;
        public function __construct() {
            
           $this->loadAllModel();
        }
        public function loadAllModel() {

            $this->limit = 5;

            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;

            $this->loadMyHepler('uploadFile');
            $this->upload = new uploadFile;

            $this->loadModel('PromotionModel');
            $this->promotionModel = new PromotionModel;

            $this->loadModel('CategoryModel');
            $this->categoryModel = new CategoryModel;

            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
            
            $this->loadModel('AuthorModel');
            $this->authorModel = new AuthorModel;

            $this->loadModel('PublisherModel');
            $this->publisherModel = new PublisherModel;

            $this->loadModel('MenuModel');
            $this->menuModel = new MenuModel;
        }

        public function index() {

            $this->func->paginationFun($this->limit, 'productModel', 'admin.index', 'product', 'product/index');

        }
        public function pagination() {   

            $this->func->paginationFun($this->limit, 'productModel', 'admin/product/loadTable', 'product', '');

        }

        public function selectForMenu() {   
            $menu = $this->menuModel->getAll(['MaDM'], 1);

            $idMenu = isset($_POST['idSelect']) ? $_POST['idSelect'] : $menu[0]['MaDM'] ;

            $category = $this->categoryModel->getByMenuId($idMenu);
            $author = $this->authorModel->getByMenuId($idMenu);
            $publisher = $this->publisherModel->getByMenuId($idMenu);
            $promotion = $this->promotionModel->getAll();
            
            return $this->view('admin.product.select',[
                'category' => $category,
                'author' => $author,
                'promotion' => $promotion,
                'publisher' => $publisher,
            ]);

        }


        public function add() {
            $category = $this->categoryModel->getAll();
            $author = $this->authorModel->getAll();
            $publisher = $this->publisherModel->getAll();
            $promotion = $this->promotionModel->getAll();
            $menu = $this->menuModel->getAll();
            return $this->view('admin.index',[
                'page'  => 'product/formAddProduct',
                'category' => $category,
                'author' => $author,
                'publisher' => $publisher,
                'promotion' => $promotion,
                'menu'  => $menu
            ]);
        }

        
        public function show() {

            
            $promotion = $this->promotionModel->getAll();
            $menu = $this->menuModel->getAll();
            $condition = [
                'column'    => 'MaSP',
                'value'     =>  $_POST['id']
            ];

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $product = $this->productModel->findById($condition);

            $conditionCategory = [
                'column'    => 'MaTL',
                'value'     =>  $product['MaTl']
            ];

            $category = $this->categoryModel->findById($conditionCategory); //lấy mã danh mục

            $idMenu = $category['MaDM'];

            $category = $this->categoryModel->getByMenuId($idMenu);
            $author = $this->authorModel->getByMenuId($idMenu);
            $publisher = $this->publisherModel->getByMenuId($idMenu);

            return $this->view('admin.index',[
                'page' => 'product/show',
                'product' => $product,
                'pageCurrent' =>$pageCurrent,
                'category' => $category,
                'author' => $author,
                'publisher' => $publisher,
                'promotion' => $promotion,
                'menu'  =>$menu
            ]);
        }

       
        public function store() {
            
            $dir ="./public/img/product";
            $isUpload = $this->upload->savefile($dir, $_FILES['img']['tmp_name'], $_FILES['img']['name'],  $_POST['MaTL']);
            if($isUpload) {
                
                $status = isset($_POST['status']) ?  $_POST['status'] : 0;
                $statusPromotion = isset($_POST['statusPromotion']) ?  $_POST['statusPromotion'] : 0;
                $mount = isset($_POST['mount']) ?  $_POST['mount'] : 0;
                $data = [
                    "TenSp" => $_POST['name'],
                    "img"   => $_FILES['img']['name'],
                    "SoLuong"   => $mount,
                    "DonGia"    => $_POST['price'],
                    "MoTa"  => $_POST['des'],
                    "TTKM"  => $statusPromotion,
                    "TTSach"    =>  $status,
                    "MaKM"  =>  $_POST['MaKM'],
                    "MaTl"  => $_POST['MaTL'],
                    "MaTg"  => $_POST['MaTG'],
                    "MaNXB" => $_POST['MaNXB']
                ];
    
                $result = $this->productModel->store($data);

                $product = $this->productModel->getAll();
    
                $message = $result ? "Thêm thành công" : "Thêm Thất bại";

                $menu = $this->menuModel->getAll();
                return $this->view('admin.index',[
                    'page'      => 'product/formAddProduct',
                    'product'      => $product,
                    'result' => $result,
                    'message'   => $message,
                    'menu'  =>$menu
                ]);
            }


        }
        
        public function update() {

            $img = "";

            $condition = [
                'column'    => 'MaSP',
                'value'     =>  $_POST['id']
            ];

            $product = $this->productModel->findById($condition);

            //Xử lý hình ảnh
            if($_FILES['img']['name'] == ""){

                 $img  = $product['img'];

             } else {
                $dir ="./public/img/product";
                $isUpload = $this->upload->savefile($dir, $_FILES['img']['tmp_name'], $_FILES['img']['name'],  $_POST['MaTL']);

                if($isUpload) {
                    $img = $_FILES['img']['name'];
                }
            }
            
            $status = isset($_POST['status']) ?  $_POST['status'] : 0;
            $statusPromotion = isset($_POST['statusPromotion']) ?  $_POST['statusPromotion'] : 0;
            $mount = $product['SoLuong'];


            $data = [
                "TenSp" => $_POST['name'],
                "img"   => $img,
                "SoLuong"   => $mount,
                "DonGia"    => $_POST['price'],
                "MoTa"  => $_POST['des'],
                "TTKM"  => $statusPromotion,
                "TTSach"    =>  $status,
                "MaKM"  =>  $_POST['MaKM'],
                "MaTl"  => $_POST['MaTL'],
                "MaTg"  => $_POST['MaTG'],
                "MaNXB" => $_POST['MaNXB']
            ];

            $result = $this->productModel->updateData($data, $condition);

            $message = $result ? "Sửa thành công" : "Sửa Thất bại";

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $product = $this->productModel->findById($condition);
            $conditionCategory = [
                'column'    => 'MaTL',
                'value'     =>  $product['MaTl']
            ];

            $category = $this->categoryModel->findById($conditionCategory); //lấy mã danh mục

            $idMenu = $category['MaDM'];

            $category = $this->categoryModel->getByMenuId($idMenu);
            $author = $this->authorModel->getByMenuId($idMenu);
            $publisher = $this->publisherModel->getByMenuId($idMenu);
            $promotion = $this->promotionModel->getAll();
            $menu = $this->menuModel->getAll();
            return $this->view('admin.index',[
                'page'      => 'product/show',
                'result'    => $result,
                'product'   =>  $product,
                'message'   => $message,
                'pageCurrent'   => $pageCurrent,
                'category' => $category,
                'author' => $author,
                'publisher' => $publisher,
                'promotion' => $promotion,
                'menu'  =>$menu
            ]);
        }

        public function delete() { 
           
            $condition = [
                'column'    => 'MaSP',
                'value'     =>  $_POST['id']
            ];

            $product = $this->productModel->getAll();
            $totalPage = ceil(count($product)/$this->limit);
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;
            $message = "Xóa thành công";
            $start = ($pageCurrent - 1)*$this->limit;
            $message = "Xóa thành công";
            $result  = $this->productModel->deleteCheckForeignKey(['chitietphieunhap','chitiethoadon'], $_POST['id'], "MaSP");
            if($result == false) {
                $message = "Sản phẩm đang tồn tại ở bảng khác không thể xóa được vui lòng không xóa";
                return $this->view('admin.index',[
                    'result'    => $result,
                    'page'      => 'product/index',
                    'product'      => $product,
                    'totalPage' => $totalPage,
                    'pageTitle'  => 'product',
                    'pageCurrent'   => $pageCurrent,
                    'message'   => $message
                ]);
            }
            $result = $this->productModel->deleteData($condition);
            $product = $this->productModel->getAll(['*'], [$start, $this->limit]);

            return $this->view('admin.index',[
                'result'    => $result,
                'page'      => 'product/index',
                'product'      => $product,
                'totalPage' => $totalPage,
                'pageTitle'  => 'product',
                'pageCurrent'   => $pageCurrent,
                'message'   => $message
            ]);
        }
      
    }
?>