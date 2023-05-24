<div class="cart">
        
        <div class="wrap">
            <div class="cart-header">
                <div class="cart-logo">
                    <span>vina<span>book</span>.com
                    </span>
                </div>
            </div>
            <div class="address-container">
                <div class="address-header">
                    <div class="line-address"></div>
                    <div class="address-header-item">
                        <div class="address-num active">
                            1
                        </div>
                        <span>Địa chỉ</span>
                    </div>
                    <div class="address-header-item">
                        <div id="address-num-2" class="address-num">
                            2
                        </div>
                        <span>Hình thức thanh toán</span>
                    </div>
                    <div class="address-header-item">
                        <div id="address-num-3" class="address-num">
                            3
                        </div>
                        <span>Xác nhận đặt hàng</span>
                    </div>

                </div>
                <div class="serviec-body">
                    <div class="body-top">
                        <span class="title">Địa chỉ giao hàng</span>
                        <div class="body">
                            <div class="body-container">
                                    <!-- <div class="body-container-top">
                                        <button id="showformedit">sửa</button>
                                    </div> -->
                                    <div class="address-body">
                                        <div class="address">
                                            <?php 
                                                if(count($data['address-infor']) < 2) {
                                                    include_once("./Views/frontend/payment/formAddress.php");
                                                } else {
                                             include_once("./Views/frontend/payment/infoAddress.php");
                                             }?>
                                        </div>
                                       
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart-btn">
                <div class="cart-btn-body">
                    <button class="btn btn-back disiable">Quay lại</button>
                    <button class="btn btn-continue normal" <?php if(isset($data['emtyInfoA'])) {
                        if(!$data['emtyInfoA']) echo "disabled";
                    }?> id="<?php echo $data['nextPage']?>">Tiếp tục</button>
                </div>
            </div>
        </div>
        <div class="br">
            
        </div>
    </div>