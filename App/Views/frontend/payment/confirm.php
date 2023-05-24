<div class="body-top">
    <span class="title">Xác nhận đặt hàng</span>
    <div class="body">
        <div class="body-container">
                <div class="cofirm-body">
                    <div class="colum-1">
                        <h5>Sản phẩm</h5>
                        <div class="list-product">
                            <?php 
                            $total = 0;
                            $count = 0;
                            foreach($_SESSION['cart'] as $key => $val) {    
                                $total += $_SESSION['cart'][$key]['SoLuong'] * $_SESSION['cart'][$key]['khuyenmai'];
                                if($_SESSION['cart'][$key]['SoLuong'] == 0) continue;
                                $count +=$_SESSION['cart'][$key]['SoLuong'];
                                ?>
                            <div class="product-item">
                                <img src="./public/img/product/<?php echo $_SESSION['cart'][$key]['MaTl']?>/<?php echo $_SESSION['cart'][$key]['img']?>" width="50px" height="50px" alt="">
                                <span>  <?php echo $_SESSION['cart'][$key]['TenSp']?></span>
                                <span><?php echo $_SESSION['cart'][$key]['SoLuong']?> x <?php echo $_SESSION['cart'][$key]['khuyenmai']?></span>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="colum-1">
                        <h5>Địa chỉ giao hàng</h5>
                        <div class="address-infor">
                            <span><?php echo $data['userInfo']['TenKH']?></span>
                            <span><?php echo $data['address-infor'][0].", Phường "; echo $data['address-infor'][1].", Quận "; echo $data['address-infor'][2]?></span>
                            <span><?php echo "Thành phố ".$data['address-infor'][3].", Nước"; echo $data['address-infor'][4].",";?></span>
                            <span><?php echo "SĐT"."".$data['address-infor'][5].",";?></span>
                            <span>giao hàng tận nơi(<?php echo $data['address-infor'][3]?>)</span>

                        </div>
                        
                    </div>
                    <div class="colum-1">
                        <h5>Tóm tắt hóa đơn</h5>
                        <div class="bill-temp">
                            <div class="bill-item">
                                <span>Tổng tiền</span>
                                <span><?php echo $total?> <span class="undertext">đ</span></span>
                            </div>
                            <div class="bill-item">
                                <span>Mã giảm giá</span>
                                <span>0đ</span>
                            </div>
                            <div class="bill-item">
                                <span>Tạm tính</span>
                                <span><?php echo $total?> <span class="undertext">đ</span></span>
                            </div>
                            <hr>
                            <div class="bill-item">
                                <span>Tổng cộng</span>
                                <span><?php echo $total?><span class="undertext">đ</span></span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>