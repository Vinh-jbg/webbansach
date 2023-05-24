<?php
     class CategoryController extends BaseController {
        private $categoryModel;
        private $func;
        private $limit;
        private $menuModel;

        public function __construct() {
            
            $this->loadModel('CategoryModel');
            $this->categoryModel = new CategoryModel;
            $this->loadModel('MenuModel');
            $this->menuModel = new MenuModel;
            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;
            $this->limit = 5;
        }

        public function index() {
            $this->func->paginationFun($this->limit, 'CategoryModel', 'admin.index', 'category', 'category/index');
        }

        public function pagination() {   

            $this->func->paginationFun($this->limit, 'CategoryModel', 'admin/category/loadTable', 'category', '');

        }

        public function add() {
            $menu = $this->menuModel->getAll();

            return $this->view('admin.index',[
                'page'  => 'category/formAddCategory',
                'menu'  => $menu,
            ]);
        }

        
        public function show() {

            // điều kiện
            $condition = [
                'column'    => 'matl',
                'value'     =>  $_POST['id']
            ];

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $category = $this->categoryModel->findById($condition);
            $menu = $this->menuModel->getAll();

            return $this->view('admin.index',[
                'page' => 'category/show',
                'category' => $category,
                'pageCurrent' =>$pageCurrent,
                'menu'  => $menu
            ]);
        }


        public function store() {
            
            $name = $_POST['name'];
            $idDM = $_POST['MaDM'];
            $data = ["TenTheLoai" => $name, "MaDM"   => $idDM ];

            $result = $this->categoryModel->store($data);

            $message = $result ? "Thêm thành công" : "Thêm Thất bại";
            
            $menu = $this->menuModel->getAll();

            return $this->view('admin.index',[
                'page'      => 'category/formAddCategory',
                'result' => $result,
                'message'   => $message,
                'menu'  => $menu    
            ]);
        }


        public function update() {

            $condition = [
                'column'    => 'MaTL',
                'value'     =>  $_POST['id']
            ];

            $name = $_POST['name'];
            $id = $_POST['id'];
            $idDM = $_POST['MaDM'];

            $category = $this->categoryModel->findById($condition);

            
            
            $data = ["TenTheLoai" => $name, "MaDM"   => $idDM ];


            $result = $this->categoryModel->updateData($data, $condition);

            $menu = $this->menuModel->getAll();

            $category = $this->categoryModel->findById($condition);
            $message = $result ? "Sửa thành công" : "Sửa Thất bại";

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            return $this->view('admin.index',[
                'page'      => 'category/show',
                'result'    => $result,
                'category'   =>  $category,
                'message'   => $message,
                'menu'  => $menu,
                'pageCurrent'   => $pageCurrent
            ]);
        }

        public function delete() { 
            $condition = [
                'column'    => 'matl',
                'value'     =>  $_POST['id']
            ];

            $category = $this->categoryModel->getAll();
            $totalPage = ceil(count($category)/$this->limit);
            
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $start = ($pageCurrent - 1)*$this->limit;

            $category = $this->categoryModel->getAll(['*'], [$start, $this->limit]);
            $result  = $this->menuModel->deleteCheckForeignKey(['sach'], $_POST['id'], "MaTl");
            $message = "Xóa thành công";

            if($result == false) {
                $message = "Thể loại đang tồn tại ở bảng khác không thể xóa được vui lòng không xóa";
                return $this->view('admin.index',[
                    'result'    => $result,
                    'page'      => 'category/index',
                    'category'      => $category,
                    'totalPage' => $totalPage,
                    'pageTitle'  => 'category',
                    'pageCurrent'   => $pageCurrent,
                    'message'   => $message
                ]);
            }
            $result = $this->categoryModel->deleteData($condition);
            $category = $this->categoryModel->getAll(['*'], [$start, $this->limit]);
            return $this->view('admin.index',[
                'result'    => $result,
                'page'      => 'category/index',
                'category'      => $category,
                'totalPage' => $totalPage,
                'pageTitle'  => 'category',
                'pageCurrent'   => $pageCurrent,
                'message'   => $message
            ]);
        }

        

    }

?>