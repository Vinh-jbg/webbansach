<?php
    include_once('./Views/admin/includes/notification.php');
?>
<form action="./index.php" method="POST">
    <div class="modal-body">
            <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
            <input type="text" hidden name="controller" value="product">
            <input type="text" hidden name="action" value="index">
            <button type="submit" name="registerbtn" class="btn btn-dark">Back To List</button>
            <!-- <a class="btn btn-dark" href="?controller=publisher&action=index" role="button">Back</a> -->
    </div>
</form>
<form action="./index.php" method="POST" enctype="multipart/form-data" id="product_form_show">

    <div class="modal-body">

        <div class="form-group">
            <label> Tên sách </label>
            <input type="text" name="name" class="form-control" rules="required" placeholder="Tên sách" value="<?php echo $data['product']['TenSp']?>">
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label> Ảnh</label>
            <input type="file" name="img" class="form-control" placeholder="Ảnh" value="<?php echo $data['product']['img']?>">
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label> Số lượng sách </label>
            <input type="text" name="mount" class="form-control" rules="required" disabled placeholder="Số lượng sách" value="<?php echo $data['product']['SoLuong']?>">
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label> Đơn giá sách </label>
            <input type="number" name="price" class="form-control" rules="required" placeholder="Tên sách" value="<?php echo $data['product']['Dongia']?>">
            <span class="errMassage"></span>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mô tả sách</label>
            <textarea class="form-control" rules="required" name="des"  id="exampleFormControlTextarea1" rows="3"><?php echo $data['product']['MoTa']?></textarea>
            <span class="errMassage"></span>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" name="statusPromotion" value="1" type="checkbox" id="flexSwitchCheckChecked" <?php if($data['product']['TTKM']==1) {
                echo 'checked';
            } ?>>
            <label class="form-check-label" for="flexSwitchCheckChecked">Kích hoạt CTKM</label>
            <span class="errMassage"></span>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" name="status" value="1" type="checkbox" id="flexSwitchCheckChecked" <?php if($data['product']['TTSach']==1) {
                echo 'checked';
            } ?>>
            <label class="form-check-label" for="flexSwitchCheckChecked">Kích hoạt tình trạng sách</label>
            <span class="errMassage"></span>
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
        <div class="form-group">
            <label for="exampleFormControlSelect1">Danh sách chương trình khuyến mãi</label>
            <select name="MaKM"  class="form-control" rules="required" id="exampleFormControlSelect1">
                <?php foreach($data['promotion'] as $key => $value) {?>
                <option value="<?php echo $value['MaKM'] ?>" <?php if($data['product']['MaKM'] == $value['MaKM'])
                    echo "selected";
                ?> > 
                
                <?php echo $value['TenCTKM'] ?></option>
                <?php }?>
            </select>
            <span class="errMassage"></span>
        </div>
        <input type="text"  hidden name="page" value="<?php echo $data['pageCurrent']?>">
        <input type="text" hidden name="controller" value="product">
        <input type="text" hidden name="action" value="update">
        <input type="text" hidden name="id" value="<?php echo $data['product']['MaSP']?>">
    </div>
    <div class="modal-footer">
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
    </div>
</form>