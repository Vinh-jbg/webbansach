

<?php
    include_once('./Views/admin/includes/notification.php');
?>
<form action="./index.php" method="POST" enctype="multipart/form-data" id="product_form">

<div class="modal-body">

<div class="form-group">
            <label> Tên sách </label>
            <input type="text" name="name" class="form-control" rules="required" placeholder="Tên sách" value="">
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label> Ảnh</label>
            <input type="file" name="img" class="form-control" rules="required" placeholder="Ảnh" value="">
            <span class="errMassage"></span>
        </div>

        <div class="form-group">
            <label> Số lượng sách </label>
            <input type="text" name="mount" class="form-control" rules="required" placeholder="Số lượng sách" value="0" disabled>
        </div>
        <div class="form-group">
            <label> Đơn giá sách </label>
            <input type="number" name="price" class="form-control" rules="required" placeholder="Tên sách" value="">
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mô tả sách</label>
            <textarea class="form-control" rules="required" name="des"  id="exampleFormControlTextarea1" rows="3"></textarea>
            <span class="errMassage"></span>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" name="statusPromotion" value="1" type="checkbox" id="flexSwitchCheckChecked" >
            <label class="form-check-label" for="flexSwitchCheckChecked">Kích hoạt CTKM</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" name="status" value="1" type="checkbox" id="flexSwitchCheckChecked">
            <label class="form-check-label" for="flexSwitchCheckChecked">Kích hoạt tình trạng sách</label>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Danh sách danh mục</label>
            <select name="MaDM"  class="form-control" rules="required" id="selectMenu">
                <?php foreach($data['menu'] as $key => $value) {?>
                <option value="<?php echo $value['MaDM'] ?>" > 
                
                <?php echo $value['TenDM'] ?></option>
                <?php }?>
            </select>
            <span class="errMassage"></span>

        </div>
        <div id="selectGroup">
            <?php include_once('./Views/admin/product/select.php')?>
        </div>
       
    <input type="text" hidden name="controller" value="product">
    <input type="text" hidden name="action" value="store">
</div>
<div class="modal-footer">
    <a class="btn btn-dark" href="?controller=product&action=index" role="button">Back</a>
    <button type="submit" name="add-btn" class="btn btn-primary add-btn">Add</button>
</div>
</form>
