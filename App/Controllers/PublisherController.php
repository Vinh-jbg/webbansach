<?php
     class PublisherController extends BaseController {
        private $publisherModel;
        private $func;
        private $limit;
        private $menuModel;

        public function __construct() {
            
            $this->loadModel('PublisherModel');
            $this->publisherModel = new PublisherModel;
            $this->loadModel('MenuModel');
            $this->menuModel = new MenuModel;
            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;
            $this->limit = 5;
        }

        public function index() {

            $this->func->paginationFun($this->limit, 'PublisherModel', 'admin.index', 'publisher', 'publisher/index');
        }

        public function pagination() { 

            $this->func->paginationFun($this->limit, 'PublisherModel', 'admin/publisher/loadTable', 'publisher','');

        }

        public function add() {
            $menu = $this->menuModel->getAll();
            return $this->view('admin.index',[
                'page'  => 'publisher/formAddPublisher',
                'menu'  => $menu
            ]);
        }

        
        public function show() {

            // điều kiện
            $condition = [
                'column'    => 'maNXB',
                'value'     =>  $_POST['id']
            ];

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;


            $publisher = $this->publisherModel->findById($condition);
            $menu = $this->menuModel->getAll();

            return $this->view('admin.index',[
                'page' => 'publisher/show',
                'publisher' => $publisher,
                'pageCurrent' =>$pageCurrent,
                'menu'  => $menu
            ]);
        }


        public function store() {
            
            $name = $_POST['name'];
            $idDM = $_POST['MaDM'];
            $data = ["TenNXB" => $name, "MaDM"   => $idDM ];

            $result = $this->publisherModel->store($data);

            $message = $result ? "Thêm thành công" : "Thêm Thất bại";
            
            $menu = $this->menuModel->getAll();

            return $this->view('admin.index',[
                'page'      => 'publisher/formAddPublisher',
                'result' => $result,
                'message'   => $message,
                'menu'  => $menu    
            ]);
        }


        public function update() {

            $condition = [
                'column'    => 'MaNXB',
                'value'     =>  $_POST['id']
            ];

            $name = $_POST['name'];
            $id = $_POST['id'];
            $idDM = $_POST['MaDM'];

            $publisher = $this->publisherModel->findById($condition);

            
            
            $data = ["TenNXB" => $name, "MaDM"   => $idDM ];


            $result = $this->publisherModel->updateData($data, $condition);

            $menu = $this->menuModel->getAll();

            $publisher = $this->publisherModel->findById($condition);

            $message = $result ? "Sửa thành công" : "Sửa Thất bại";

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            return $this->view('admin.index',[
                'page'      => 'publisher/show',
                'result'    => $result,
                'publisher'   =>  $publisher,
                'message'   => $message,
                'menu'  => $menu,
                'pageCurrent'   => $pageCurrent
            ]);
        }

        public function delete() { 
            $condition = [
                'column'    => 'MaNXB',
                'value'     =>  $_POST['id']
            ];

            $publisher = $this->publisherModel->getAll();
            $totalPage = ceil(count($publisher)/$this->limit);
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $start = ($pageCurrent - 1)*$this->limit;
            $publisher = $this->publisherModel->getAll(['*'], [$start, $this->limit]);
            $result  = $this->menuModel->deleteCheckForeignKey(['sach'], $_POST['id'], "MaNXB");
            $message = "Xóa thành công";
            if($result == false) {
                $message = "Mã khuyến mãi đang tồn tại ở bảng khác không thể xóa được vui lòng không xóa"; 
                return $this->view('admin.index',[
                    'result'    => $result,
                    'page'      => 'publisher/index',
                    'publisher'      => $publisher,
                    'totalPage' => $totalPage,
                    'pageTitle'  => 'publisher',
                    'pageCurrent'   => $pageCurrent,
                    'message'   => $message
                ]);
            }
            $result = $this->publisherModel->deleteData($condition);
            $publisher = $this->publisherModel->getAll(['*'], [$start, $this->limit]);
            return $this->view('admin.index',[
                'result'    => $result,
                'page'      => 'publisher/index',
                'publisher'      => $publisher,
                'totalPage' => $totalPage,
                'pageTitle'  => 'publisher',
                'pageCurrent'   => $pageCurrent,
                'message'   => $message
            ]);
        }

        

    }

?>