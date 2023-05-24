<?php
     class MenuController extends BaseController {
        private $menuModel;
        private $limit;
        private $func;
        private $upLoad;
        public function __construct() {
            
            $this->loadModel('MenuModel');
            $this->menuModel = new MenuModel;
            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;
            $this->loadMyHepler('uploadFile');
            $this->upload = new uploadFile;
            $this->limit = 5;
        }

        public function index() {

            $this->func->paginationFun($this->limit, 'MenuModel', 'admin.index', 'menu', 'menu/index');

        }
        public function pagination() {   

            $this->func->paginationFun($this->limit, 'MenuModel', 'admin/menu/loadTable', 'menu', '');

        }


        public function add() {
             
            return $this->view('admin.index',[
                'page'  => 'menu/formAddMenu'
            ]);
        }

        
        public function show() {


            $condition = [
                'column'    => 'MaDM',
                'value'     =>  $_POST['id']
            ];

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $menu = $this->menuModel->findById($condition);

            return $this->view('admin.index',[
                'page' => 'menu/show',
                'menu' => $menu,
                'pageCurrent' =>$pageCurrent
            ]);
        }

        //$dir, tmpname, 
        public function store() {
            
            $dir ="./public/img/menu";
            $isUpload = $this->upload->savefile($dir, $_FILES['img']['tmp_name'], $_FILES['img']['name']);
            if($isUpload) {

                $data = [
                    "TenDM" => $_POST['name'],
                    "img"   => $_FILES['img']['name']
                ];
    
                $result = $this->menuModel->store($data);
                $menu = $this->menuModel->getAll();
    
                $message = $result ? "Thêm thành công" : "Thêm Thất bại";

                return $this->view('admin.index',[
                    'page'      => 'menu/formAddMenu',
                    'menu'      => $menu,
                    'result' => $result,
                    'message'   => $message
                ]);
            }


        }
        
        public function update() {

            $img = "";

            $condition = [
                'column'    => 'MaDM',
                'value'     =>  $_POST['id']
            ];

            $name = $_POST['name'];
            $id = $_POST['id'];

            $menu = $this->menuModel->findById($condition);

            //Xử lý hình ảnh
            if($_FILES['img']['name'] == ""){

                 $img  = $menu['img'];

             } else {
                $dir ="./public/img/menu";
                $isUpload = $this->upload->savefile($dir, $_FILES['img']['tmp_name'], $_FILES['img']['name']);

                if($isUpload) {
                    $img = $_FILES['img']['name'];
                }
            }
            
            $data = ["TenDM" => $name, "img"   => $img ];

            $result = $this->menuModel->updateData($data, $condition);

            $message = $result ? "Sửa thành công" : "Sửa Thất bại";

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;



            return $this->view('admin.index',[
                'page'      => 'menu/show',
                'result'    => $result,
                'menu'   =>  $menu,
                'message'   => $message,
                'pageCurrent'   => $pageCurrent
            ]);
        }



        public function delete() { 
           
            $condition = [
                'column'    => 'MaDM',
                'value'     =>  $_POST['id']
            ];

            $menu = $this->menuModel->getAll();
            $totalPage = ceil(count($menu)/$this->limit);
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $start = ($pageCurrent - 1)*$this->limit;
            $menu = $this->menuModel->getAll(['*'], [$start, $this->limit]);
            $message = "Xóa thành công";
            $result  = $this->menuModel->deleteCheckForeignKey(['tacgia', 'theloai', 'nxb'], $_POST['id'], "MaDM");
            if($result == false) {
                $message = "Danh mục đang tồn tại ở bảng khác không thể xóa được vui lòng không xóa";
                return $this->view('admin.index',[
                    'result'    => $result,
                    'page'      => 'menu/index',
                    'menu'      => $menu,
                    'totalPage' => $totalPage,
                    'pageTitle'  => 'menu',
                    'pageCurrent'   => $pageCurrent,
                    'message'   => $message
                ]);
            }

            $result = $this->menuModel->deleteData($condition);
            $menu = $this->menuModel->getAll(['*'], [$start, $this->limit]);
            return $this->view('admin.index',[
                'result'    => $result,
                'page'      => 'menu/index',
                'menu'      => $menu,
                'totalPage' => $totalPage,
                'pageTitle'  => 'menu',
                'pageCurrent'   => $pageCurrent,
                'message'   => $message
            ]);
        }


    }

?>

