<div class="app-containt-body" >
    <div class="wrap" style="height: 1200px; overflow:hidden; padding-top: 15px">
        <div class="app-containt-body-right" style="width: 30%; margin-left: 0px;">
            <?php
            foreach($data['categoryMain'] as $key => $value) {
            ?>
            <div class="product-list-mainbox" style="padding-bottom: 5px; font-size: 16px">
                <a href="?MaTL=<?php echo $value['MaTL']?>&name=home&action=search" style="text-decoration: none">
                <h3 class="product-list-title" id="category-search" style="margin-bottom: 0px; cursor: pointer;">
                    <?php echo $value['TenTheLoai']?>
                </h3>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="app-containt-body-left">
            <div class="product-containt">
                
                <div class="product-list">
                <?php
                foreach($data['products'] as $k => $val) {
                    ?>
                    <div class="product-item">
                        <div class="product-item-top">
                            <div class="product-item-img">
                                <a  href="?controller=home&action=loadDetailProduct&idsach=<?php echo $val['MaSP']?>">
                                <img src="./public/img/product/<?php echo $val['MaTL']?>/<?php echo $val['img']?>" alt="">
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
                                        <span class="prices-cost"> <?php echo $val['DonGia']?><span class="undertext">đ</span></span>
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
        </div>
    </div>
</div>