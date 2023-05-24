<?php
    include_once('./Views/admin/includes/notification.php');
?>
<form action="./index.php" method="POST">
    <div class="modal-body">
            <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
            <input type="text" hidden name="controller" value="supplisher">
            <input type="text" hidden name="action" value="index">
            <button type="submit" name="registerbtn" class="btn btn-dark">Back To List</button>
            <!-- <a class="btn btn-dark" href="?controller=publisher&action=index" role="button">Back</a> -->
    </div>
</form>

<form action="./index.php" method="POST" enctype="multipart/form-data">

    <div class="modal-body">

        <div class="form-group">
            <label> Tên nhà xuất bản </label>
            <input type="text" name="name" class="form-control" placeholder="Tên nhà xuất bản" value="<?php echo $data['supplisher']['TenNCC']?>">
        </div>

        <!-- Group điều hướng  -->
        <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
        <input type="text" hidden name="controller" value="supplisher">
        <input type="text" hidden name="action" value="update">
        <input type="text" hidden name="id" value="<?php echo $data['supplisher']['MaNCC']?>">
    </div>
    <div class="modal-footer">
        
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
    </div>
</form>