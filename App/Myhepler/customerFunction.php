<?php 
   
    class customerFunction extends BaseController{

        public function paginationFun($limit, $model, $pageMain, $title, $page) {

            $this->loadModel($model);
            $Model = new $model;
            $start = 0;
            $data = $Model->getAll();
            $totalPage = ceil(count($data)/$limit);
            $pageCurrent = 1;
            if(isset($_POST['page'])) {
                if($_POST['page'] < 1) {
                    $_POST['page'] = 1;
                } else if($_POST['page'] > $totalPage) {
                    $_POST['page'] = $totalPage;
                }
                $pageCurrent = $_POST['page'];
                $start = ($pageCurrent - 1)*$limit;
                $data = $Model->getAll(['*'], [$start, $limit]);
            } else {
                $data = $Model->getAll(['*'], [$start, $limit]);
            }
            if(empty($page)) {
                return $this->view($pageMain,[
                    "$title" => $data,
                    'pageTitle'  => "$title",
                    'totalPage' => $totalPage,
                    'pageCurrent'   => $pageCurrent
                ]);
            } else {
                return $this->view($pageMain,[
                    "$title" => $data,
                    'pageTitle'  => "$title",
                    'page'  => "$page",
                    'totalPage' => $totalPage,
                    'pageCurrent'   => $pageCurrent
                ]);
            }


        }

        public function checkAdmin() {
            if(isset($_SESSION['data']['page'])) {

                if(!isset($_SESSION['data']['userInfo'])){
                    
                    header("location:./index.php?controller=user&action=login");
                    
                } else {
                    if($_SESSION['data']['userInfo']['Quyen'] != 1) {
    
                        header("location:./index.php?controller=home&action=index");
                    }
                }
            } else {
                header("location:./index.php?controller=home&action=index");
            }
        }


        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.');
            }
        }

        public function export($arr) {
            include("./Core/SimpleXLSXGen.php");
            $newArr = [
                ['Mã hóa đơn', 'Mã khách hàng', 'Tổng tiền', 'Ngày tạo', 'Tinh trạng']
              ];
            
            $exportArr = array_merge($newArr, $arr);
            $xlsx = SimpleXLSXGen::fromArray($exportArr);
            $xlsx->downloadAs('bill.xlsx');
            
        }
    }
?>
