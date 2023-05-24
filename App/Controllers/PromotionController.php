<?php
     class PromotionController extends BaseController {
        private $promotionModel;
        private $func;
        private $limit;


        public function __construct() {
            
            $this->loadModel('PromotionModel');
            $this->promotionModel = new PromotionModel;
            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;
            $this->limit = 5;
        }

        public function index() {
            $this->func->paginationFun($this->limit, 'PromotionModel', 'admin.index', 'promotion', 'promotion/index');
        }

        public function pagination() {   

            $this->func->paginationFun($this->limit, 'PromotionModel', 'admin/promotion/loadTable', 'promotion', '');

        }

        public function add() {
            $promotion= $this->promotionModel->getAll();

            return $this->view('admin.index',[
                'page'  => 'promotion/formAddPromotion',
            ]);
        }

        
        public function show() {

            // điều kiện
            $condition = [
                'column'    => 'MaKM',
                'value'     =>  $_POST['id']
            ];

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $promotion = $this->promotionModel->findById($condition);

            return $this->view('admin.index',[
                'page' => 'promotion/show',
                'promotion' => $promotion,
                'pageCurrent' =>$pageCurrent,
            ]);
        }


        public function store() {
            
            $name = $_POST['name'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $percent = $_POST['percent'];

    
            $status = isset($_POST['status']) ?  $_POST['status'] : 0;

            $data = [
                    "TenCTKM" => $name, 
                    "NgayBatDau" => $startDate,
                    "NgayKetThuc" => $endDate,
                    "TinhTrang" => $status,
                    "PhanTram"  => $percent
                    ];

            $result = $this->promotionModel->store($data);

            $message = $result ? "Thêm thành công" : "Thêm Thất bại";
            

            return $this->view('admin.index',[
                'page'      => 'promotion/formAddPromotion',
                'result' => $result,
                'message'   => $message,
            ]);
        }


        public function update() {

            $condition = [
                'column'    => 'MaKM',
                'value'     =>  $_POST['id']
            ];

            $name = $_POST['name'];
            $idKM = $_POST['id'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $percent = $_POST['percent'];

            $status = isset($_POST['status']) ?  $_POST['status'] : 0;

            $data = [
                    "TenCTKM" => "$name", 
                    "MaKM"   => "$idKM" , 
                    "NgayBatDau" => "$startDate",
                    "NgayKetThuc" => "$endDate",
                    "TinhTrang" => "$status",
                    "PhanTram"  => "$percent"
                    ];

            $result = $this->promotionModel->updateData($data, $condition);

            $promotion = $this->promotionModel->findById($condition);

            $message = $result ? "Sửa thành công" : "Sửa Thất bại";

            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            return $this->view('admin.index',[
                'page'      => 'promotion/show',
                'result'    => $result,
                'promotion'   =>  $promotion,
                'message'   => $message,
                'pageCurrent'   => $pageCurrent
            ]);
        }

        public function delete() { 
            $condition = [
                'column'    => 'MaKM',
                'value'     =>  $_POST['id']
            ];

            $promotion = $this->promotionModel->getAll();

            $totalPage = ceil(count($promotion)/$this->limit);
            
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            $start = ($pageCurrent - 1)*$this->limit;
            $message = "Xóa thành công";
            $promotion = $this->promotionModel->getAll(['*'], [$start, $this->limit]);
            $result  = $this->promotionModel->deleteCheckForeignKey(['sach'], $_POST['id'], "MaKM");
            if($result == false) {
                $message = "Mã khuyến mãi đang tồn tại ở bảng khác không thể xóa được vui lòng không xóa";
                return $this->view('admin.index',[
                    'result'    => $result,
                    'page'      => 'promotion/index',
                    'promotion'      => $promotion,
                    'totalPage' => $totalPage,
                    'pageTitle'  => 'promotion',
                    'pageCurrent'   => $pageCurrent,
                    'message'   =>$message
                ]);
            }
            $result = $this->promotionModel->deleteData($condition);
            $promotion = $this->promotionModel->getAll(['*'], [$start, $this->limit]);

            return $this->view('admin.index',[
                'result'    => $result,
                'page'      => 'promotion/index',
                'promotion'      => $promotion,
                'totalPage' => $totalPage,
                'pageTitle'  => 'promotion',
                'pageCurrent'   => $pageCurrent,
                'message'   => $message
            ]);
        }

        

    }

?>