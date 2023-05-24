<?php
     class AuthorController extends BaseController {
        private $authorModel;
        private $limit;
        private $func;
        private $menuModel;
        private $upLoad;
        public function __construct() {
            
            $this->loadModel('AuthorModel');
            $this->authorModel = new AuthorModel;
            $this->loadModel('MenuModel');
            $this->menuModel = new MenuModel;
            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;
            $this->loadMyHepler('uploadFile');
            $this->upload = new uploadFile;
            $this->limit = 5;
        }

        public function index() {

            $this->func->paginationFun($this->limit, 'AuthorModel', 'admin.index', 'author', 'author/index');

        }
        public function pagination() {   

            $this->func->paginationFun($this->limit, 'AuthorModel', 'admin/author/loadTable', 'author', '');

        }


        public function add() {
             
            $menu = $this->menuModel->getAll();

            return $this->view('admin.index',[
                'page'  => 'author/formAddAuthor',
                'menu'  => $menu,
            ]);
        }

        
        public function show() {


            $condition = [
                'column'    => 'MaTG',
                'value'     =>  $_POST['id']
            ];

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $author = $this->authorModel->findById($condition);

            $menu = $this->menuModel->getAll();

            return $this->view('admin.index',[
                'page' => 'author/show',
                'author' => $author,
                'pageCurrent' =>$pageCurrent,
                'menu'  => $menu
            ]);
        }

        //$dir, tmpname, 
        public function store() {
            
            $dir ="./public/img/author";
            $isUpload = $this->upload->savefile($dir, $_FILES['img']['tmp_name'], $_FILES['img']['name']);
            if($isUpload) {

                $name = $_POST['name'];
                $idDM = $_POST['MaDM'];
                $des = $_POST['des'];
                $data = ["TenTG" => $name, "MaDM"   => $idDM, 'MoTa' => $des, 'img' =>   $_FILES['img']['name']];
    
                $result = $this->authorModel->store($data);
                $author = $this->authorModel->getAll();
    
                $message = $result ? "Thêm thành công" : "Thêm Thất bại";
                $menu = $this->menuModel->getAll();

                return $this->view('admin.index',[
                    'page'      => 'author/formAddAuthor',
                    'author'      => $author,
                    'result' => $result,
                    'message'   => $message,
                    'menu'  => $menu
                ]);
            }


        }
        
        public function update() {

            $img = "";

            $condition = [
                'column'    => 'MaTG',
                'value'     =>  $_POST['id']
            ];

            $name = $_POST['name'];
            $id = $_POST['id'];
            $idDM = $_POST['MaDM'];
            $des = $_POST['des'];
            $author = $this->authorModel->findById($condition);

            //Xử lý hình ảnh
            if($_FILES['img']['name'] == ""){

                 $img  = $author['img'];

             } else {
                $dir ="./public/img/author";
                $isUpload = $this->upload->savefile($dir, $_FILES['img']['tmp_name'], $_FILES['img']['name']);

                if($isUpload) {
                    $img = $_FILES['img']['name'];
                }
            }
            
            $data = ["TenTG" => $name, "MaDM"   => $idDM, 'MoTa' => $des, 'img' =>   $img];

            $result = $this->authorModel->updateData($data, $condition);

            $message = $result ? "Sửa thành công" : "Sửa Thất bại";

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $author = $this->authorModel->findById($condition);

            $menu = $this->menuModel->getAll();
            

            return $this->view('admin.index',[
                'page'      => 'author/show',
                'result'    => $result,
                'author'   =>  $author,
                'message'   => $message,
                'pageCurrent'   => $pageCurrent,
                'menu'  => $menu
            ]);
        }



        public function delete() { 
           
            $condition = [
                'column'    => 'MaTG',
                'value'     =>  $_POST['id']
            ];

            $author = $this->authorModel->getAll();
            $totalPage = ceil(count($author)/$this->limit);

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $start = ($pageCurrent - 1)*$this->limit;
            
            $author = $this->authorModel->getAll(['*'], [$start, $this->limit]);

            $result  = $this->menuModel->deleteCheckForeignKey(['sach'], $_POST['id'], "MaTg");
            $message = "Xóa thành công";

            if($result == false) {
                $message = "Tác giả đang tồn tại ở bảng khác không thể xóa được vui lòng không xóa";

                return $this->view('admin.index',[
                    'result'    => $result,
                    'page'      => 'author/index',
                    'author'      => $author,
                    'totalPage' => $totalPage,
                    'pageTitle'  => 'author',
                    'pageCurrent'   => $pageCurrent,
                    'message'   => $message
                ]);
            }

            $author = $this->authorModel->getAll(['*'], [$start, $this->limit]);
            $result = $this->authorModel->deleteData($condition);


            return $this->view('admin.index',[
                'result'    => $result,
                'page'      => 'author/index',
                'author'      => $author,
                'totalPage' => $totalPage,
                'pageTitle'  => 'author',
                'pageCurrent'   => $pageCurrent,
                'message'   => $message
            ]);
        }


    }

?>

