<form method="POST" action="./index.php"  enctype="multipart/form-data" id="detail_import_form">

<div class="modal-body">

        <div class="form-group">
            <label> Mã sách </label>
            <input id="name" type="text" disabled name="name" rules="required" class="form-control" placeholder="Số lượng sách" value="<?php echo $data['productTemp']['MaSP'] ?>" >
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label> Số lượng sách </label>
            <input id="mount" type="number" name="mount" rules="required|numberCheck" class="form-control" placeholder="Số lượng sách" value="<?php echo $data['productTemp']['SoLuong'] ?>" >
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label> Đơn giá sách</label>
            <input type="number" id="price" name="price" rules="required|numberCheck" class="form-control" placeholder="Đơn giá sách" value="<?php echo $data['productTemp']['DonGia'] ?>" >
            <span class="errMassage"></span>
        </div>
    <input type="text" hidden name="controller" value="import">
    <input type="text" hidden name="action" value="updateDetailImport">
    <input type="text" hidden name="MaPN" value="<?php echo $data['import']['MaPN']?>">
    <input type="text" hidden name="MaSP" value="<?php echo $data['productTemp']['MaSP']?>">

</div>
<div class="modal-footer d-flex justify-content-between">
    <div>
        <button type="submit" name="add-btn" class="btn btn-success add-btn">Save</button>
    </div>
</div>
</form>