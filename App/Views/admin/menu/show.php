<?php
    include_once('./Views/admin/includes/notification.php');
?>
<form action="./index.php" method="POST">
    <div class="modal-body">
            <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
            <input type="text" hidden name="controller" value="menu">
            <input type="text" hidden name="action" value="index">
            <button type="submit" name="registerbtn" class="btn btn-dark">Back To List</button>
            <!-- <a class="btn btn-dark" href="?controller=publisher&action=index" role="button">Back</a> -->
    </div>
</form>
<form action="./index.php" method="POST" enctype="multipart/form-data" id="menu_form_show">

    <div class="modal-body">

        <div class="form-group">
            <label> Tên danh mục </label>
            <input type="text" name="name" class="form-control" rules="required" placeholder="Tên danh mục" value="<?php echo $data['menu']['TenDM']?>">
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label> Ảnh bìa danh mục </label>
            <input type="file" name="img" class="form-control" placeholder="Ảnh bìa danh mục" value="<?php echo $data['menu']['img']?>">
            <span class="errMassage"></span>
        </div>
        <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
        <input type="text" hidden name="controller" value="menu">
        <input type="text" hidden name="action" value="update">
        <input type="text" hidden name="id" value="<?php echo $data['menu']['MaDM']?>">
    </div>
    <div class="modal-footer">
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
    </div>
</form>