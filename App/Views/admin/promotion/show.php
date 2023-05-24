<?php
    include_once('./Views/admin/includes/notification.php');
?>
<form action="./index.php" method="POST">
    <div class="modal-body">
            <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
            <input type="text" hidden name="controller" value="promotion">
            <input type="text" hidden name="action" value="index">
            <button type="submit" name="registerbtn" class="btn btn-dark">Back To List</button>
            <!-- <a class="btn btn-dark" href="?controller=publisher&action=index" role="button">Back</a> -->
    </div>
</form>

<form action="./index.php" method="POST" enctype="multipart/form-data" id="promotion_form_show">

    <div class="modal-body">

        <div class="form-group">
            <label> Tên CTKM </label>
            <input type="text" name="name" class="form-control" rules="required" placeholder="Tên CTKM" value="<?php echo $data['promotion']['TenCTKM']?>">
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label> Phần trăm khuyến mãi </label>
            <input type="text" name="percent" class="form-control" rules="required" placeholder="Tên CTKM" value="<?php echo $data['promotion']['PhanTram']?>">
            <span class="errMassage"></span>
        </div>
        <div  class="form-group">
         <label for="myDate2">Từ </label>
         <input type="date" id="myDate2" class="form-control col-md-6"
             min="2018-05-01" max="2050-12-31" value="<?php echo $data['promotion']['NgayBatDau']?>"  rules="required" name="startDate">
             <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label for="myDate2">Đến </label>
            <input type="date" id="myDate3" class="form-control col-md-6"
            min="2018-05-01" max="2050-12-31" value="<?php echo $data['promotion']['NgayKetThuc']?>" rules="required" name="endDate">
            <span class="errMassage"></span>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" name="status" value="1" type="checkbox" id="flexSwitchCheckChecked" <?php if($data['promotion']['TinhTrang']==1) {
                echo 'checked';
            } ?>>
            <label class="form-check-label" for="flexSwitchCheckChecked">Kích hoạt CTKM</label>
        </div>
        <!-- Group điều hướng  -->
        <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
        <input type="text" hidden name="controller" value="promotion">
        <input type="text" hidden name="action" value="update">
        <input type="text" hidden name="id" value="<?php echo $data['promotion']['MaKM']?>">
    </div>
    <div class="modal-footer">
        
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
    </div>
</form>