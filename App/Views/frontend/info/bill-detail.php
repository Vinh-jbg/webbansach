<?php
    $total = 0;
    $count = 0;
    foreach($data['productTemp'] as $key => $val) {    
        $total += $data['productTemp'][$key]['SoLuong'] * $data['productTemp'][$key]['DonGia'];
        $count +=$data['productTemp'][$key]['SoLuong'];
        ?>
    <div class="group-item">
        <div class="product-left">
            <div class="prodcut-img"><img style="width:100px; height:100px" src="./public/img/product/<?php echo $data['productTemp'][$key]['MaTl']?>/<?php echo $data['productTemp'][$key]['img']?>" alt=""></div>
            <div class="product-decritption">
                <div class="produc-name">
                <?php echo $data['productTemp'][$key]['TenSp'];
                 ?>
                </div>
                <div class="product-edit">
                    <input type="text" hidden name="idsach" value="<?php echo $data['productTemp'][$key]['MaSP']?>">
                    <input type="text" hidden class="MaHD" name="MaHD" value="<?php echo $data['productTemp'][$key]['MaHD']?>">
                    <input type="text" hidden class="mount" name="mount" value="<?php echo $data['productTemp'][$key]['SoLuong']?>">

                    <?php if($data['productTemp'][$key]['TinhTrang'] == 0) {?> 
                    <div class="des btn-id">
                        -
                    </div>
                    <?php }?>
                    <div class="input-num ">
                        <input type="text"  readonly class="btn-id mount" value="<?php echo $data['productTemp'][$key]['SoLuong']?>">
                    </div>
                    <?php if($data['productTemp'][$key]['TinhTrang'] == 0) {?> 
                    <div class="inc btn-id">
                        +
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="product-right">
             <input type="text" hidden name="idsach" value="<?php echo $data['productTemp'][$key]['MaSP']?>">
             <input type="text" hidden class="MaHD" name="MaHD" value="<?php echo $data['productTemp'][$key]['MaHD']?>">
            <input type="text" hidden class="mount" name="mount" value="<?php echo $data['productTemp'][$key]['SoLuong']?>">
            <span> <?php echo $data['productTemp'][$key]['SoLuong']?> x <?php echo $data['productTemp'][$key]['DonGia']?><span class="undertext">đ</span> </span>
            <?php if($data['productTemp'][$key]['TinhTrang'] == 0) {?>  <i class="fas fa-trash-alt"></i> <?php }?>
        </div>
    </div>
<?php }?>
