<!-- 
// $start = 0;
// $menu = $this->menuModel->getAll();
// $totalPage = ceil(count($menu)/$this->limit);

// if(isset($_POST['page'])) {
//     $start = ($_POST['page'] - 1)*$this->limit;
//     $menu = $this->menuModel->getAll(['*'], [$start, $this->limit]);
// } else {
//     $menu = $this->menuModel->getAll(['*'], [$start, $this->limit]);
// }

// return $this->view('admin/menu/loadTable',[
//     'menu' => $menu,
//     'pageTitle'  => 'menu',
//     'totalPage' => $totalPage
// ]); -->

<!-- // $start = 0;
// $menu = $this->menuModel->getAll();
// $totalPage = ceil(count($menu)/$this->limit);

// if(isset($_REQUEST['page'])) {
//     $start = ($_REQUEST['page'] - 1)*$this->limit;
//     $menu = $this->menuModel->getAll(['*'], [$start, $this->limit]);
// } else {
//     $menu = $this->menuModel->getAll(['*'], [$start, $this->limit]);
// }
// return $this->view('admin.index',[
//     'menu' => $menu,
//     'pageTitle' => 'menu',
//     'page'  => 'menu/index',
//     'totalPage' => $totalPage
// ]);
// limit , model, pageMain, title, page -->
<!-- 
// if(!file_exists($dir)){ 
//     mkdir($dir);
//     move_uploaded_file($_FILES['img']['tmp_name'],$dir."/".$_FILES['img']['name']);
// } -->