
<form action="./index.php" method="POST" enctype="multipart/form-data" id="bill_form_show">
<div class="modal-body">
        <div  class="form-group">
         <label for="myDate2">Từ </label>
         <input type="date" id="myDate2" class="form-control col-md-6"
             min="2018-05-01" max="2050-12-31" value="<?php echo $data['bill']['NgayTao']?>" rules="required" name="Date">
        <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label> Khách hàng </label>
            <input id="user" type="text" disabled name="user" class="form-control" placeholder="Nhà cung cấp" value="<?php echo $data['user']['TenKH']?>" >
        </div>
        <div class="form-group">
            <label>Tổng tiền</label>
            <input type="number" id="price" disabled name="price" class="form-control"  placeholder="Đơn giá sách" value="<?php echo $data['bill']['TongTien']?>" >
        </div> 
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tình trạng</label>
            <select name="status" id="status"  class="form-control" id="exampleFormControlSelect1">
                
                <option value="0"<?php if($data['bill']['TinhTrang'] == 0 ){ echo "selected";} ?>>Đang chờ xử lý</option>
                <option value="1" <?php if($data['bill']['TinhTrang'] == 1 ){ echo "selected";} ?>>Đã xử lý</option>                
                <option value="2"<?php if($data['bill']['TinhTrang'] == 2 ){ echo "selected";} ?>>Đang giao</option>                
                <option value="3"<?php if($data['bill']['TinhTrang'] == 3 ){ echo "selected";} ?>>Đã giao</option>                
            </select>
        </div>
        <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
        <input type="text" hidden name="controller" value="bill">
        <input type="text" hidden name="action" value="update">
        <input type="text" hidden name="MaHD" value="<?php echo $data['bill']['MaHD']?>">

</div>
<div class="modal-footer d-flex justify-content-between">
    <div>
        <a class="btn btn-dark" href="?controller=bill&action=index" role="button">Back To list</a>
    </div>
    <div class="modal-footer">
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
    </div>
</div>
</form>


<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Mã sách </th>
      <th>Tên sách</th>
      <th>Đơn giá</th>
      <th>Số lượng</th>
      <th>EDIT </th>
      <th>DELETE </th>
    </tr>
  </thead>
  <tbody id="loadBillDetail">
     <?php require_once("./Views/admin/bill/formDetailBill.php")?>
    </tbody>
</table>