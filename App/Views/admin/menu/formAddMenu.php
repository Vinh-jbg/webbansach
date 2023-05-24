

<?php
    include_once('./Views/admin/includes/notification.php');
?>
<form action="./index.php" method="POST" enctype="multipart/form-data" id="menu_form">

<div class="modal-body">

    <div class="form-group">
        <label> Tên danh mục </label>
        <input type="text" name="name" class="form-control" rules="required" placeholder="Tên danh mục" value="">
        <span class="errMassage"></span>
    </div>
    <div class="form-group">
        <label> Ảnh bìa danh mục </label>
        <input type="file" name="img" class="form-control" rules="required" placeholder="Ảnh bìa danh mục" value="">
        <span class="errMassage"></span>
    </div>
    <input type="text" hidden name="controller" value="menu">
    <input type="text" hidden name="action" value="store">
</div>
<div class="modal-footer">
    <a class="btn btn-dark" href="?controller=menu&action=index" role="button">Back</a>
    <button type="submit" name="add-btn" class="btn btn-primary add-btn">Add</button>
</div>
</form>
