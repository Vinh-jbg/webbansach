 <?php
    if(isset($_SESSION['cart'])) { 
    ?>
<div class="cart-body">
    <?php
    $total = 0;
    foreach($_SESSION['cart'] as $key => $val) {    
        $total += $_SESSION['cart'][$key]['SoLuong'] * $_SESSION['cart'][$key]['khuyenmai'];
        ?>
    <div class="cart-product-item">
        <div class="cart-product-img">
            <img src="./public/img/product/<?php echo $_SESSION['cart'][$key]['MaTl']?>/<?php echo $_SESSION['cart'][$key]['img']?>" alt="">
        </div>
        <div class="cart-product-detail">
            <span class="product-name"><?php echo $_SESSION['cart'][$key]['TenSp']?></span>
            <div class="cart-product-prices">
                <span class="span-1"><?php echo $_SESSION['cart'][$key]['SoLuong']?> x</span>
                <span><?php echo $_SESSION['cart'][$key]['khuyenmai']  ?> <span class="undertext">đ</span> </span>
                <span class="span-3" id="span-3">x</span>
                <input type="text" hidden id="MaSP" value="<?php echo  $_SESSION['cart'][$key]['MaSP']?>">
            </div>
        </div>
    </div>
    <?php }?>
    </div>
    <div class="cart-total">
        <div class="price-total">
            <span>Tổng cộng:</span>
            <span><?php echo $total?> <span class="undertext">đ</span></span>
        </div>
        <a class="cart-link" href="?controller=cart&action=index">Xem giỏ hàng</a>
    </div>
    <?php }?>