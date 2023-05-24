<?php
     class SupplisherController extends BaseController {
        private $supplisherModel;
        private $func;
        private $limit;

        public function __construct() {
            
            $this->loadModel('SupplisherModel');
            $this->supplisherModel = new SupplisherModel;
            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;
            $this->limit = 5;
        }

        public function index() {

            $this->func->paginationFun($this->limit, 'SupplisherModel', 'admin.index', 'supplisher', 'supplisher/index');
        }

        public function pagination() { 

            $this->func->paginationFun($this->limit, 'SupplisherModel', 'admin/supplisher/loadTable', 'supplisher','');

        }

        public function add() {
            $supplisher = $this->supplisherModel->getAll();
            return $this->view('admin.index',[
                'page'  => 'supplisher/formAddSupplisher',
                'supplisher'  => $supplisher
            ]);
        }

        
        public function show() {

            // điều kiện
            $condition = [
                'column'    => 'maNCC',
                'value'     =>  $_POST['id']
            ];

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;


            $supplisher = $this->supplisherModel->findById($condition);

            return $this->view('admin.index',[
                'page' => 'supplisher/show',
                'supplisher' => $supplisher,
                'pageCurrent' =>$pageCurrent,
            ]);
        }


        public function store() {
            
            $name = $_POST['name'];
            $data = ["TenNCC" => $name];

            $result = $this->supplisherModel->store($data);

            $message = $result ? "Thêm thành công" : "Thêm Thất bại";
            
            $supplisher = $this->supplisherModel->getAll();

            return $this->view('admin.index',[
                'page'      => 'supplisher/formAddSupplisher',
                'result' => $result,
                'message'   => $message,
                'supplisher'  => $supplisher    
            ]);
        }


        public function update() {

            $condition = [
                'column'    => 'MaNCC',
                'value'     =>  $_POST['id']
            ];

            $name = $_POST['name'];
            $id = $_POST['id'];

            $supplisher = $this->supplisherModel->findById($condition);

            
            
            $data = ["TenNCC" => $name];


            $result = $this->supplisherModel->updateData($data, $condition);

            $supplisher = $this->supplisherModel->findById($condition);

            $message = $result ? "Sửa thành công" : "Sửa Thất bại";

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            return $this->view('admin.index',[
                'page'      => 'supplisher/show',
                'result'    => $result,
                'supplisher'   =>  $supplisher,
                'message'   => $message,
                'pageCurrent'   => $pageCurrent
            ]);
        }

        public function delete() { 
            $condition = [
                'column'    => 'MaNCC',
                'value'     =>  $_POST['id']
            ];

            $supplisher = $this->supplisherModel->getAll();
            $totalPage = ceil(count($supplisher)/$this->limit);
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $start = ($pageCurrent - 1)*$this->limit;
            $supplisher = $this->supplisherModel->getAll(['*'], [$start, $this->limit]);
            $result  = $this->supplisherModel->deleteCheckForeignKey(['sach', 'phieunhap'], $_POST['id'], "MaNCC");
            $message = "Xóa thành công";
            if($result == false) {
                $message = "Nhà cung cấp đang tồn tại ở bảng khác không thể xóa được vui lòng không xóa"; 
                return $this->view('admin.index',[
                    'result'    => $result,
                    'page'      => 'supplisher/index',
                    'supplisher'      => $supplisher,
                    'totalPage' => $totalPage,
                    'pageTitle'  => 'supplisher',
                    'pageCurrent'   => $pageCurrent,
                    'message'   => $message
                ]);
            }
            $result = $this->supplisherModel->deleteData($condition);
            $supplisher = $this->supplisherModel->getAll(['*'], [$start, $this->limit]);
            return $this->view('admin.index',[
                'result'    => $result,
                'page'      => 'supplisher/index',
                'supplisher'      => $supplisher,
                'totalPage' => $totalPage,
                'pageTitle'  => 'supplisher',
                'pageCurrent'   => $pageCurrent,
                'message'   => $message
            ]);
        }

        

    }

?>