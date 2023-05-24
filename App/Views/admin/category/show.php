<?php
    include_once('./Views/admin/includes/notification.php');
?>
<form action="./index.php" method="POST">
    <div class="modal-body">
            <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
            <input type="text" hidden name="controller" value="category">
            <input type="text" hidden name="action" value="index">
            <button type="submit" name="registerbtn" class="btn btn-dark">Back To List</button>
            <!-- <a class="btn btn-dark" href="?controller=publisher&action=index" role="button">Back</a> -->
    </div>
</form>
<form action="./index.php" method="POST" enctype="multipart/form-data" id="category_form_show">

    <div class="modal-body">

        <div class="form-group">
            <label> Tên thể loại </label>
            <input type="text" name="name" class="form-control" rules="required" placeholder="Tên thể loại" value="<?php echo $data['category']['TenTheLoai']?>">
            <span class="errMassage"></span>

        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Danh sách danh mục</label>
            <select name="MaDM"  class="form-control" rules="required" id="exampleFormControlSelect1">
                <?php foreach($data['menu'] as $key => $value) {?>
                <option value="<?php echo $value['MaDM'] ?>"    <?php if($data['category']['MaDM'] == $value['MaDM'])
                    echo "selected";
                ?>><?php echo $value['TenDM'] ?></option>
                <?php }?>
            </select>
            <span class="errMassage"></span>

    </div>
        <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
        <input type="text" hidden name="controller" value="category">
        <input type="text" hidden name="action" value="update">
        <input type="text" hidden name="id" value="<?php echo $data['category']['MaTL']?>">
    </div>
    <div class="modal-footer">
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
    </div>
</form>