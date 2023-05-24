

<div class="modal-cart">
        <div class="overlay-cart"></div>
        <div class="containt-product">
            <div class="form">
                <div class="header-form-cart">
                    <span>Sản phẩm đã được thêm vào giỏ</span>
                    <!-- <i id="close" >x</i> -->
                </div>
                <form  class="form-cart" action="">
                    <div class="form-group">
                        <div class="item-left">
                            <img src="./public/img/product/<?php echo $data['products']['MaTl']?>/<?php echo $data['products']['img']?>" alt="">
                            <span><?php echo $data['products']['TenSp']?></span>
                        </div>
                        <div class="item-right">
                            <span>1 x <?php echo $data['khuyenmai']?><span class="undertext">đ</span> </span>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="form-group">
                        <span>Bạn đang có <?php echo $data['soluongsp']?> sản phẩm trong giỏ hàng</span>
                        <span>Tổng tạm tính <?php echo $data['tongtien']?><span class="undertext">đ</span> </span>
                    </div>
                    <div class="btn">
                        <div class="btn-cancel">
                            <a href="?controller=home&action=loadDetailProduct&idsach=<?php echo $data['products']['MaSP']?>">Tiếp tục mua</a>
                        </div>
                        <div class="btn-payment btn btn-buy">
                            <a style="text-decoration: none; color: #fff" href="?controller=cart&action=index">Thanh toán</a>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>