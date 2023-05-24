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
        <form action="./index.php" method="POST" enctype="multipart/form-data" id="statistical-two">
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
         <input type="text" hidden name="action" value="revenueStatistical">
        </form>
        
    <div id="table_statistical">

    <?php 
        include_once("./Views/admin/statistical/loadTableRevenueStatistical.php");
    ?>
    </div>    

    <h7 class="m-0 font-weight-bold text-primary">Tổng tiền:
        </h7>
    <h7 class="m-0 font-weight-bold text-danger"><?php echo number_format($total1 - $total2)?>đ
    </h7>
    </div>
    </div>
</div>