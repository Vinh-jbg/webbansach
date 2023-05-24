
<form action="./index.php" method="POST" enctype="multipart/form-data">
<div class="modal-body">
        <div  class="form-group">
         <label for="myDate2">Từ </label>
         <input type="date" id="myDate2" class="form-control col-md-6"
             min="2018-05-01" max="2050-12-31" value="<?php echo $data['import']['NgayNhap']?>"disabled name="Date">
        </div>
        <div class="form-group">
            <label> Nhà cung cấp </label>
            <input id="supplisher" type="text"disabled name="supplisher" class="form-control" placeholder="Nhà cung cấp" value="<?php echo $data['supplisher']['TenNCC']?>" >
        </div>
        <div class="form-group">
            <label>Tổng tiền</label>
            <input type="number" id="price"disabled name="price" class="form-control" placeholder="Đơn giá sách" value="<?php echo $data['import']['TongTien']?>" >
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" value="1"disabled name="status" type="checkbox" id="flexSwitchCheckChecked"<?php if($data['import']['TinhTrang']==1) {
                echo 'checked';
            } ?>>
            <label class="form-check-label" for="flexSwitchCheckChecked">Đã nhập</label>
        </div>

    <input type="text" hidden name="controller" value="import">
    <input type="text" hidden name="action" value="store">
</div>
<div class="modal-footer d-flex justify-content-between">
    <div>
        <a class="btn btn-dark" href="?controller=import&action=index" role="button">Back To list</a>
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
    </tr>
  </thead>
  <tbody id="loadImportDetail">
     
  <?php
    if(isset($data['productTemp'])) {
    foreach ($data['productTemp'] as $key => $value) {
      ?>
    <tr>
      <td id="ID">  <?php echo $value['MaSP']?> </td>
      <td>  <?php echo $value['TenSp']?></td>
      <td><?php echo $value['DonGia']?></td>
      <td><?php echo $value['SoLuong']?></td>
    </tr>
    <?php
    }
}
    ?>

    </tbody>
</table>