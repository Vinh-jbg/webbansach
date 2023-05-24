<?php
    include_once('./Views/admin/includes/notification.php');
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Doanh thu bán hàng
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive ">
        <h7 class="m-0 font-weight-bold text-primary">Thống kê theo khoảng thời gian
        </h7>
        <form action="./index.php" method="POST" enctype="multipart/form-data" id="statistical">
        <div class="modal-body">
            <div  class="form-group">
            <label for="myDate2">Từ </label>
            <input type="date" id="myDate2" class="form-control col-md-6"
                min="2018-05-01" max="2050-12-31" value="<?php if(isset($data['startDate'])) {echo $data['startDate'];}?>" rules="required"  name="startDate">
                <span class="errMassage"></span>
            </div>
            <div class="form-group">
                <label for="myDate2">Đến </label>
                <input type="date" id="myDate3" class="form-control col-md-6"
                min="2018-05-01" max="2050-12-31" value="<?php if(isset($data['endDate'])) {echo $data['endDate'];}?>" rules="required"  name="endDate">
                <span class="errMassage"></span>
            </div>
            <button type="submit" name="add-btn" class="btn btn-primary add-btn">Lọc</button>
        </div>
            <input type="text" hidden name="controller" value="admin">
         <input type="text" hidden name="action" value="statisticalForTime">
        </form>
        <h7 class="m-0 font-weight-bold text-primary">Thống kê theo Mốc </h7>
        <form action="./index.php" method="POST" enctype="multipart/form-data"  id="statistical-one">
            <div class="modal-body">
                <div  class="form-group">
                    <label for="myDate2">Từ </label>
                    <input type="date" id="myDate2" class="form-control col-md-6"
                        min="2018-05-01" max="2050-12-31" value="<?php if(isset($data['Date'])) {echo $data['Date'];}?>" rules="required"  name="Date">
                        <span class="errMassage"></span>
                </div>
                <input type="text" hidden name="controller" value="admin">
                <input type="text" hidden name="action" value="statisticalForTime">
                <button type="submit" name="add-btn" class="btn btn-primary add-btn">Lọc</button>
            </div>
        </form>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Danh sách thể loại</label>
            <select name="MaTL"  class="form-control" id="category_statistical">
                <option value="-1" >All</option>
                <?php foreach($data['categoryMain'] as $key => $value) {?>
                <option value="<?php echo $value['MaTL'] ?>" >
                <?php echo $value['TenTheLoai'] ?></option>
                <?php }?>
            </select>
        </div>
    <div id="table_statistical">

    <?php 
        include_once("./Views/admin/statistical/loadTable.php");
    ?>
    
    <h7 class="m-0 font-weight-bold text-primary">Tổng tiền:
        </h7>
    <h7 class="m-0 font-weight-bold text-danger"><?php echo number_format($total) ?>đ
    </h7>
    </div>
    </div>
</div>