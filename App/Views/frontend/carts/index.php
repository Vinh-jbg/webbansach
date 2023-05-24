<div class="cart">
    <div class="wrap">
        <div class="cart-header">
            <div class="cart-logo">
                <span>vina<span>book</span>.com
                </span>
            </div>
        </div>
        <div class="cart-body">
            <div class="cart-body-header">
                <span>Giỏ hàng</span>
            </div>
                        <?php
                         if(isset($_SESSION['cart'])) { 
                            ?>
            <div class="cart-body-contain">
                <div class="cart-body-left">
                    <form action="" id="cart">
                        <div class="form-header">
                            <span>Sản phẩm</span>
                        </div> 
                        <div class="product-list">
                            <?php include_once("./Views/frontend/carts/cart-form.php")?>
                        </div>
                    </form>
                </div>
                <div class="cart-body-right">
                    <div class="receipt-contain">
                        <div class="receipt-header">
                            Tóm tắt đơn hàng
                        </div>
                        <div class="receipt-detail">
                            <div class="product-num group-re">
                                <span>Sản phẩm</span>
                                <span><?php echo $count?></span>
                            </div>
                            <div class="product-tran group-re">
                                <span>Phí vận chuyển</span>
                                <span>Miễn phí</span>
                            </div>
                            <div class="product-tt group-re">
                                <span>Tạm tính</span>
                                <span><?php echo $total?> <span class="undertext">đ</span></span>
                            </div>
                        </div>
                        <div class="re-total">
                            <span>Tổng cộng</span>
                            <span><?php echo $total?> <span class="undertext">đ</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="cart-btn">
            <div class="cart-btn-body">
                <button class="btn btn-back disiable"><a style="text-decoration: none; color: #fff"href="?controller=home&action=index">Quay lại</a></button>
                <a href="?controller=order&action=confirmAddrress" class="btn btn-continue normal" id="next-address">Thanh toán</a>
            </div>
        </div>
    </div>
    <div class="br">
        
    </div>
</div>