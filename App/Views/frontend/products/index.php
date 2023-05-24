<div class="app-containt-body">
    <div class="wrap">
        <div class="app-containt-body-left">
            <div class="advertisement-item background-color-banner">
                <h3>Sách mới hay</h3>
                <div class="advertisement-containt">
                    <div class="advertisement-img">
                        <img src="./public/img/news.jpg" alt="">
                    </div>
                    <div class="advertisement-body">
                        <div class="advertisement-top">
                            <h4 class="advertisement-body-header">
                                <a href="">Tin Tức Kiến Tạo - Constructive News</a>
                            </h4>
                            <span>
                                Ulrik Haagerup
                            </span>
                        </div>
                        <div class="advertisement-bottom">
                            <div class="prices">
                                <span class="promotion-percentage">
                                    -14%
                                </span>
                                <span class="cost">
                                    90.000 <span class="undertext">đ</span>
                                </span>
                                <span class="promotion-price">
                                    77.000 <span class="undertext">đ</span>
                                </span>
                            </div>
                            <div class="btn-price">
                                <a class="order-btn" href="">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            foreach($data['categoryMain'] as $key => $value) {
            ?>
            <div class="product-containt">
                <h3><?php echo $value['TenTheLoai']?></h3>
                <div class="product-list">
                <?php
                foreach($data['products'][$key] as $k => $val) {
                    ?>
                    <div class="product-item">
                        <div class="product-item-top">
                            <div class="product-item-img">
                                <a  href="?controller=home&action=loadDetailProduct&idsach=<?php echo $val['MaSP']?>">
                                <img src="./public/img/product/<?php echo $value['MaTL']?>/<?php echo $val['img']?>" alt="">
                             </a>
                            </div>
                            <div class="product-item-decription">
                                <div class="product-item-header">
                                    <a class="product-item-name">
                                    <?php echo $val['TenSP']?>
                                    </a>
                                    <span class="product-item-author">
                                    <?php echo $val['TenTG']?>
                                    </span>
                                </div>
                                <div class="product-item-des-detail">
                                <?php echo $val['MoTa']?>
                                </div>
                            </div>
                        </div>
                        <div class="product-item-bottom">
                            <div class="product-bottom-wrap">
                                <div class="pricres">
                                    <div class="btn-price"> 
                                    <?php echo "-".$val['KhuyenMai']."%"?>
                                    
                                    </div>
                                    
                                    <div class="prices-detail">
                                        <span class="prices-cost"> <?php echo $val['Dongia']?><span class="undertext">đ</span></span>
                                        <span class="promotion-price">
                                        <?php echo $val['discount']."<span class='undertext'>đ</span>"?>
                                         
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                    ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="app-containt-body-right">
            <?php
            foreach($data['categoryMain'] as $key => $value) {
            ?>
            <div class="product-list-mainbox">
                <h3 class="product-list-title">
                    <?php echo $value['TenTheLoai']?>
                </h3>
                <div class="list-product-vertical">
                    <?php
                    foreach($data['products'][$key] as $k => $val) {
                    ?>
                    <div class="product-item-v">
                        <div class="product-item-content">
                            <div class="product-item-v-img">
                                <img src="./public/img/product/<?php echo $value['MaTL']?>/<?php echo $val['img']?>"  alt="">
                            </div>
                            <div class="product-item-v-body">
                                <div class="product-name">
                                     <?php echo $val['TenSP']?>
                                </div>
                                <div class="product-author">
                                     <?php echo $val['TenTG']?>
                                </div>
                                <div class="product-item-prices">
                                    <div class="price-cost">
                                        <span><?php echo $val['Dongia']?> <span class="undertext">đ</span></span>
                                    </div>
                                    <div class="prices-promotion">
                                        <span><?php echo $val['discount']?> <span class="undertext">đ</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>