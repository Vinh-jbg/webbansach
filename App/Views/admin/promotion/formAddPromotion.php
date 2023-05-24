

<?php
    include_once('./Views/admin/includes/notification.php');
?>
<form action="./index.php" method="POST" enctype="multipart/form-data" id="promotion_form">

<div class="modal-body">

        <div class="form-group">
            <label> Tên CTKM </label>
            <input type="text" name="name" class="form-control" rules="required"  placeholder="Tên CTKM" value="">
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label> Phần trăm khuyến mãi </label>
            <input type="text" name="percent" class="form-control" rules="required" placeholder="Phần trăm CTKM" value="">
            <span class="errMassage"></span>
        </div>
        <div  class="form-group">
         <label for="myDate2">Từ </label>
         <input type="date" id="myDate2" class="form-control col-md-6"
             min="2018-05-01" max="2050-12-31" value="" rules="required"  name="startDate">
             <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label for="myDate2">Đến </label>
            <input type="date" id="myDate3" class="form-control col-md-6"
            min="2018-05-01" max="2050-12-31" value="" rules="required"  name="endDate">
            <span class="errMassage"></span>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" value="1" name="status" type="checkbox" id="flexSwitchCheckChecked">
            <label class="form-check-label" for="flexSwitchCheckChecked">Kích hoạt CTKM</label>
        </div>

    <input type="text" hidden name="controller" value="promotion">
    <input type="text" hidden name="action" value="store">
</div>
<div class="modal-footer">
    <a class="btn btn-dark" href="?controller=promotion&action=index" role="button">Back</a>
    <button type="submit" name="add-btn" class="btn btn-primary add-btn">Add</button>
</div>
</form>
