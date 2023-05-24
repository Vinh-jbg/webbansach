
<form action="./index.php" method="POST" enctype="multipart/form-data" id="import_form_show">
<div class="modal-body">
        <div  class="form-group">
         <label for="myDate2">Từ </label>
         <input type="date" id="myDate2" class="form-control col-md-6"
             min="2018-05-01" max="2050-12-31" value="<?php echo $data['import']['NgayNhap']?>" rules="required" name="Date">
        <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Danh sách nhà cung cấp</label>
            <select name="MaNCC" id="MaNCC"  class="form-control" id="exampleFormControlSelect1">
                <?php foreach($data['supplisher'] as $key => $value) {?>
                <option value="<?php echo $value['MaNCC'] ?>" <?php if($value['MaNCC'] == $data['import']['MaNCC'] ) echo "selected";?>> 
                <?php echo $value['TenNCC'] ?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label>Tổng tiền</label>
            <input type="number" id="price" disabled name="price" class="form-control"  placeholder="Đơn giá sách" value="<?php echo $data['import']['TongTien']?>" >
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" value="1" name="status" type="checkbox" id="flexSwitchCheckChecked"<?php if($data['import']['TinhTrang']==1) {
                echo 'checked';
            } ?>>
            <label class="form-check-label" for="flexSwitchCheckChecked">Đã nhập</label>
        </div>

        <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
        <input type="text" hidden name="controller" value="import">
        <input type="text" hidden name="action" value="update">
        <input type="text" hidden name="MaPN" value="<?php echo $data['import']['MaPN']?>">

</div>
<div class="modal-footer d-flex justify-content-between">
    <div>
        <a class="btn btn-dark" href="?controller=import&action=index" role="button">Back To list</a>
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
  <tbody id="loadImportDetail">
     <?php require_once("./Views/admin/import/formDetailImport.php")?>
    </tbody>
</table>