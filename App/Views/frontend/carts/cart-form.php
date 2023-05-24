<?php
    $total = 0;
    $count = 0;
    foreach($_SESSION['cart'] as $key => $val) {    
        $total += $_SESSION['cart'][$key]['SoLuong'] * $_SESSION['cart'][$key]['khuyenmai'];
        $count +=$_SESSION['cart'][$key]['SoLuong'];
        ?>
    <div class="group-item">
        <div class="product-left">
            <div class="prodcut-img"><img src="./public/img/product/<?php echo $_SESSION['cart'][$key]['MaTl']?>/<?php echo $_SESSION['cart'][$key]['img']?>" alt=""></div>
            <div class="product-decritption">
                <div class="produc-name">
                <?php echo $_SESSION['cart'][$key]['TenSp']?>
                </div>
                <div class="product-edit">
                    <input type="text" hidden name="idsach" value="<?php echo $_SESSION['cart'][$key]['MaSP']?>">
                    <div class="des btn-id">
                        -
                    </div>
                    <div class="input-num ">
                        <input type="text"  readonly class="btn-id" value="<?php echo $_SESSION['cart'][$key]['SoLuong']?>">
                    </div>
                    <div class="inc btn-id">
                        +
                    </div>
                </div>
            </div>
        </div>
        <div class="product-right">
             <input type="text" hidden name="idsach" value="<?php echo $_SESSION['cart'][$key]['MaSP']?>">

            <span> <?php echo $_SESSION['cart'][$key]['SoLuong']?> x <?php echo $_SESSION['cart'][$key]['khuyenmai']?><span class="undertext">đ</span> </span>
            <i class="fas fa-trash-alt"></i>
        </div>
    </div>
<?php }?>
