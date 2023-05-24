<?php
    include_once('./Views/admin/includes/notification.php');
?>
<form action="./index.php" method="POST" enctype="multipart/form-data" id="supplisher_form">

<div class="modal-body">

    <div class="form-group">
        <label> Tên nhà cung cấp</label>
        <input type="text" name="name" class="form-control" rules="required" placeholder="Tên nhà cung cấp" value="">
        <span class="errMassage"></span>
    </div>
    <input type="text" hidden name="controller" value="supplisher">
    <input type="text" hidden name="action" value="store">
</div>
<div class="modal-footer">
    <a class="btn btn-dark" href="?controller=supplisher&action=index" role="button">Back</a>
    <button type="submit" name="add-btn" class="btn btn-primary add-btn">Add</button>
</div>
</form>
