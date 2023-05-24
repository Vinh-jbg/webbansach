

<?php
    include_once('./Views/admin/includes/notification.php');
?>
<form action="./index.php" method="POST" enctype="multipart/form-data" id="category_form">

<div class="modal-body">

    <div class="form-group">
        <label> Tên thể loại</label>
        <input type="text" name="name" class="form-control" rules="required" placeholder="Tên thể loại" value="">
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

    <input type="text" hidden name="controller" value="category">
    <input type="text" hidden name="action" value="store">
</div>
<div class="modal-footer">
    <a class="btn btn-dark" href="?controller=category&action=index" role="button">Back</a>
    <button type="submit" name="add-btn" class="btn btn-primary add-btn">Add</button>
</div>
</form>
