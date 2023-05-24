<?php 
    class ImportController extends BaseController {
        private $importModel;
        private $limit;
        private $func;
        private $productModel;
        private $supplisherModel;
        private $importDetailModel;
        public function __construct() {
            
            $this->loadModel('ImportModel');
            $this->importModel = new ImportModel;
            $this->loadMyHepler('customerFunction');
            $this->func = new customerFunction;
            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
            $this->loadModel('ImportDetailModel');
            $this->importDetailModel = new ImportDetailModel;
            
            $this->loadModel('SupplisherModel');
            $this->supplisherModel = new SupplisherModel;
            $this->limit = 5;
        }
        public function index() {

            $this->func->paginationFun($this->limit, 'importModel', 'admin.index', 'import', 'import/index');

        }
        public function pagination() {   

            $this->func->paginationFun($this->limit, 'importModel', 'admin/import/loadTable', 'import', '');

        }

        public function add() {
            if(isset($_SESSION['productTemp'])) {
                unset($_SESSION['productTemp']);
            }
            $import= $this->importModel->getAll();
            $product = $this->productModel->getAll();
            $supplisher = $this->supplisherModel->getAll();

            return $this->view('admin.index',[
                'page'  => 'import/formAddImport',
                'product' => $product,
                'supplisher'   =>  $supplisher
            ]);
        }
        public function addImportTemp() {
            if(!isset($_SESSION['productTemp'])) {
                $_SESSION['productTemp'] = [];
            }
            $check = true;
            if(isset($_SESSION['productTemp'])) {
                $product = $_SESSION['productTemp'];
                foreach( $product as $key => $val) {
                    if($key == $_POST['MaSP']) {
                        $_SESSION['productTemp'][$key]['SoLuong'] += $_POST['Mount'];
                        $_SESSION['productTemp'][$key]['DonGia'] = $_POST['Price'];
                        $check = false;
                        break;
                    } 
                }
            }
            $condition = [
                'column'    => 'MaSP',
                'value'     =>  $_POST['MaSP']
            ];

            $product = $this->productModel->findById($condition);

            $data = [ 
                "MaSP"  => $_POST['MaSP'],
               
                "TenSp" => $product['TenSp'],
        
                "DonGia"    => $_POST['Price'],      
                
                "SoLuong"  =>$_POST['Mount']   
            ];
            if($check == true) {
                $_SESSION['productTemp'] += [ $_POST['MaSP'] => $data];
            }
            return $this->view('admin.import.addTempImportDetail',[
                'productTemp'   => $_SESSION['productTemp'],
            ]);
        }
        public function show() {

            // điều kiện
            $condition = [
                'column'    => 'MaPN',
                'value'     =>  $_POST['id']
            ];
            $import = $this->importModel->findById($condition);

            $supplisher = $this->supplisherModel->getAll();
            
            $productTemp = $this->importDetailModel->getByImportID($_POST['id']);
            foreach($productTemp as $key => $value) {
                //Lấy sản phẩm
                $condition = [
                    'column'    => 'MaSP',
                    'value'     =>  $productTemp[$key]['MaSP']
                ];
                $product = $this->productModel->findById($condition);
                $productTemp[$key] += ['TenSp' => $product['TenSp']];
            }
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            return $this->view('admin.index',[
                'page' => 'import/show',
                'import' => $import,
                'pageCurrent' =>$pageCurrent,
                'supplisher' => $supplisher,
                'productTemp' => $productTemp
            ]);
        }
        public function update()
        {
            $condition = [
                'column'    => 'MaPN',
                'value'     =>  $_POST['MaPN']
            ];
           
            $Date = $_POST['Date'];
            $status = isset($_POST['status']) ?  $_POST['status'] : 0;
            $MaNCC = $_POST['MaNCC'];
            $data = [
                    "NgayNhap" => $Date,
                    "TinhTrang" => $status,
                    "MaNCC" =>$MaNCC
                    ];
            $this->importModel->updateData($data, $condition);   // update phiếu nhập

            $importDetailArr = $this->importDetailModel->getByImportID($_POST['MaPN']);
            //Nhập hàng vào bảng sách
            foreach($importDetailArr as $key => $value) {
                    // if status = 1 imported 
                    $conditionP = [
                        'column'    => 'MaSP',
                        'value'     =>  $value['MaSP']
                    ];
                    $product = $this->productModel->findById($conditionP);
                    if($status) {
                        $Mount = $product['SoLuong'] + $value['SoLuong'];
                        $data = [
                            "SoLuong"   => $Mount,
                        ];
                        $this->productModel->updateData($data, $conditionP);
                    }
                    $importDetailArr[$key] += ['TenSp' => $product['TenSp']];
            }
            $supplisher = $this->supplisherModel->getAll();
            $import = $this->importModel->findById($condition);
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            return $this->view('admin.index',[
                'page' => 'import/show',
                'import' => $import,
                'pageCurrent' =>$pageCurrent,
                'supplisher' => $supplisher,
                'productTemp' => $importDetailArr
            ]);
         }



        public function showDetail() {
            $condition = [
                'column'    => 'MaPN',
                'value'     =>  $_POST['id'][0]
            ];
            $import = $this->importModel->findById($condition);

            $supplisher = $this->supplisherModel->findById(['column'=> 'MaNCC', 'value' =>  $import['MaNCC']]);
            
            $productTemp = $this->importDetailModel->getByImportID($_POST['id'][0]);
            foreach($productTemp as $key => $value) {
                //Lấy sản phẩm
                $condition = [
                    'column'    => 'MaSP',
                    'value'     =>  $productTemp[$key]['MaSP']
                ];
                $product = $this->productModel->findById($condition);
                $productTemp[$key] += ['TenSp' => $product['TenSp']];
            }

            return $this->view('admin/import/showDetail',[
                'import' => $import,
                'supplisher' => $supplisher,
                'productTemp' => $productTemp
            ]);
        }
        
        public function store() {


            // Không có phiếu nhập chi tiết trả về
            if(!isset($_SESSION['productTemp'])) {
                $product = $this->productModel->getAll();
                $supplisher = $this->supplisherModel->getAll();
                $message = isset($_SESSION['productTemp']) ? "Thêm thành công" : "Thêm Thất bại";
                return $this->view('admin.index',[
                    'page'      => 'import/formAddImport',
                    'message'   => $message,
                    'product' => $product,
                    'supplisher'   =>  $supplisher
                ]);
            }

            // Nếu có
            $total = 0;
            if(isset($_SESSION['productTemp'])){
                $importDetailArr = $_SESSION['productTemp'];
                foreach($importDetailArr as $key => $value) {
                    $total += $value['DonGia']*$value['SoLuong'];
                }
            }
            
            $Date = $_POST['Date'];
            $status = isset($_POST['status']) ?  $_POST['status'] : 0;
            $MaNCC = $_POST['MaNCC'];
            $data = [
                    "NgayNhap" => $Date,
                    "TinhTrang" => $status,
                    "TongTien"  => $total,
                    "MaNCC" =>$MaNCC
                    ];

            $result = $this->importModel->store($data);

            // mã cuối cùng mới thêm vào
            $lastIDImport =  $this->importModel->getAll(['MaPN'], 1, ['column' => 'MaPN', 'by'=>'desc']);
            // Lấy mã IDPN mới thêm vào
            $importID = $lastIDImport[0]['MaPN'];
            
           
            //Thêm chi tiết phiếu nhập
            if(isset($_SESSION['productTemp'])){
                $importDetailArr = $_SESSION['productTemp'];
                foreach($importDetailArr as $key => $value) {
                    $data = [
                        "MaPN"  => $importID,
                        "MaSP" => $value['MaSP'],
                        "DonGia" => $value['DonGia'],
                        "SoLuong"  => $value['SoLuong']
                        ];
                        $result = $this->importDetailModel->store($data);

                    // if status = 1 imported 
                    if($status) {
                        $condition = [
                            'column'    => 'MaSP',
                            'value'     =>  $key
                        ];
                        $product = $this->productModel->findById($condition);
                        $Mount = $product['SoLuong'] + $value['SoLuong'];
                        $data = [
                            "SoLuong"   => $Mount,
                        ];
                        $this->productModel->updateData($data, $condition);
                    }
                }
            }
            $message = $result ? "Thêm thành công" : "Thêm Thất bại";
            $product = $this->productModel->getAll();
            $supplisher = $this->supplisherModel->getAll();

            return $this->view('admin.index',[
                'page'      => 'import/formAddImport',
                'result' => $result,
                'message'   => $message,
                'product' => $product,
                'supplisher'   =>  $supplisher
            ]);
        }
        public function updateDetailImport()
        {
            $supplisher = $this->supplisherModel->getAll();
            // update chi tiêt
            $data = [
                'DonGia' => $_POST['price'],
                'SoLuong'   => $_POST['mount']
            ];  
            $condition = "MaPN ={$_POST['MaPN']} and MaSP = {$_POST['MaSP']}";
            $this->importDetailModel->updateData($data, $condition);
            

            // update tổng tiền
            $condition = [
                'column'    => 'MaPN',
                'value'     =>  $_POST['MaPN']
            ];
            $import = $this->importModel->findById($condition);
            $total = 0;
            $productTemp = $this->importDetailModel->getByImportID($_POST['MaPN']);
            // lẤy các sp nèm trong phiếu nhập
            foreach($productTemp as $key => $value) {
                //Lấy sản phẩm
                $conditionP = [
                    'column'    => 'MaSP',
                    'value'     =>  $productTemp[$key]['MaSP']
                ];
                $product = $this->productModel->findById($conditionP);
                $productTemp[$key] += ['TenSp' => $product['TenSp']];
                $total += $value['DonGia']*$value['SoLuong'];
            }
            $data = [
                'TongTien' => $total
            ];  
            $this->importModel->updateData($data, $condition);
            $import = $this->importModel->findById($condition);
            $pageCurrent  = isset($_POST['page'])  ?  $_POST['page'] : 1;

            return $this->view('admin.index',[
                'page' => 'import/show',
                'import' => $import,
                'pageCurrent' =>$pageCurrent,
                'supplisher' => $supplisher,
                'productTemp' => $productTemp
            ]);
        }

        public function showFormImportDetail() { 

            // lấy phiếu nhập chi tiết
            $condition = [
                'column'    => 'MaPN',
                'value'     =>  $_POST['MaPN']
            ];
            $import = $this->importModel->findById($condition);

            $importDetail = $this->importDetailModel->getByIDPI($_POST['MaPN'],  $_POST['MaSP'][0]);
            return $this->view('admin.import.formEditDetailImport',[
                'productTemp' => $importDetail[0],
                'import'    => $import
            ]);
        }

    }
?>