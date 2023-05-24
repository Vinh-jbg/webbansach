<?php
    include_once('./Views/admin/includes/notification.php');
?>

<form action="./index.php" method="POST" enctype="multipart/form-data" id="author_form">

<div class="modal-body">

    <div class="form-group">
        <label> Tên tác giả</label>
        <input type="text" name="name" rules="required" class="form-control" placeholder="Tên tác giả" value="">
        <span class="errMassage"></span>
    </div>
    <div class="form-group">
        <label> Ảnh tác giả</label>
        <input type="file" name="img" rules="required" class="form-control" placeholder="Ảnh bìa tác giả" value="">
        <span class="errMassage"></span>
    </div>
    <div class="form-group">
            <label for="exampleFormControlSelect1">Danh sách danh mục</label>
            <select name="MaDM"  rules="required" class="form-control" id="exampleFormControlSelect1">
                <?php foreach($data['menu'] as $key => $value) {?>
                <option value="<?php echo $value['MaDM'] ?>"> <?php echo $value['TenDM'] ?></option>
                <?php }?>
            </select>
            <span class="errMassage"></span>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả tác giả</label>
        <textarea class="form-control" name="des" rules="required" id="exampleFormControlTextarea1" rows="3"></textarea>
        <span class="errMassage"></span>
    </div>
    <input type="text" hidden name="controller" value="author">
    <input type="text" hidden name="action" value="store">
</div>
<div class="modal-footer">
    <a class="btn btn-dark" href="?controller=author&action=index" role="button">Back</a>
    <button type="submit" name="add-btn" class="btn btn-primary add-btn">Add</button>
</div>
</form>

