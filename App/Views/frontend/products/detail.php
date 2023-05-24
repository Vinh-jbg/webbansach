<?php 
    if(isset($data['notification'])) {
        include_once("./Views/frontend/carts/cartNotification.php");
    }
?>
<div class="product-detail-containt">
            <div class="wrap">
                <div class="product-detail">
                    <div class="product-detail-header">
                        <a href="" class="home">Trang chủ</a>
                        <i class="fas fa-chevron-right"></i>
                        <!-- <a href="" class="product-portfolio">Trang chủ</a>
                        <i class="fas fa-chevron-right"></i> -->
                        <a href="" class="product-category"><?php echo $data['category']['TenTheLoai']?></a>
                        <i class="fas fa-chevron-right"></i>
                        <a href="" class="product-name"><?php echo $data['products']['TenSp']?></a>
                    </div>
                    <div class="product-detail-body">
                        <div class="prdouct-img">
                            <div class="product-main">
                                <img src="./public/img/icon_xemtruoc_2x.png" class="see-first" alt="">
                                <img src="./public/img/product/<?php echo $data['products']['MaTl']?>/<?php echo $data['products']['img'] ?>" alt="">
                            </div>
                            <div class="product-add">
                                <ul>
                                    <li><img src="./img/001.jpg" alt=""></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-info-top">
                                <div class="product-info-name">
                                    <span><?php echo $data['products']['TenSp']?></span>
                                </div>
                                <div class="product-info-maker">
                                    <span class="product-info-author">
                                        Tác giả: <a class="link"> <?php echo $data['author']['TenTG']?></a>
                                    </span>
                                    <span class="product-info-author">
                                        Nhà xuất bản: <a class="not-link"><?php echo $data['publisher']['TenNXB']?></a>
                                    </span>
                                    <span class="product-info-author">
                                        Nhà phát hành: <a class="link"><?php echo $data['publisher']['TenNXB']?></a>
                                    </span>
                                </div>
                                <div class="product-info-decription">
                                    <span>
                                    <?php echo $data['products']['MoTa']?>
                                    </span>
                                    <a href="">Xem thêm</a>
                                </div>
                            </div>
                            <div class="product-info-bottom">
                                <h3 class="service">
                                    Thông tin kèm theo
                                </h3>
                                <div class="service-contain">
                                    <div class="service-group">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Có dịch vụ bọc sách plastic cao cấp cho sách này <a href="">Chi tiết</a></span>
                                        
                                    </div>
                                    <div class="service-group">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Miễn phí giao hàng toàn quốc cho Đơn hàng từ 250.000đ (Áp dụng từ 1/2/2015.<a href="">Xem chi tiết >>)</a> </span>                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-price-total">
                            <div class="product-price-containt">
                                <div class="header-info-receipt">
                                    <span>Thông tin thanh toán</span> 
                                </div>
                                <div class="prices-info">
                                    <div class="price-group">
                                        <span >Giá bìa</span>
                                        <span class="underline"><?php echo $data['products']['Dongia']?> <span class="undertext">đ</span> </span>
                                    </div>
                                    <div class="price-group ">
                                        <span>Giá bán</span>
                                        <span class="colorRed"><?php echo $data['khuyenmai']?> <span class="undertext">đ</span> </span>
                                    </div>
                                    <div class="price-group">
                                        <span>Tiết kiệm</span>
                                        <span class="color"><?php echo $data['save']?><span class="undertext">đ</span>(<?php echo $data['salePercent'] ?>%)</span>
                                    </div>
                                    <div class="price-group">
                                        <span>Chất lượng sách</span>
                                        <span  class="color">Loại A<span>(?)</span></span>
                                    </div>
                                </div>
                                <div class="btn-check ">
                                    <div class="requirement color">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Đặt theo yêu cầu</span>
                                    </div>
                                    <p>Sách này sẽ được Vinabook.com lấy từ NXB khi quý khách đặt mua. Thời gian gởi hàng từ 5-10 ngày làm việc.</p>
                                    
                                    <a href="?controller=cart&action=loadDetailProduct&idsach=<?php echo $data['products']['MaSP']?>" class="btn btn-buy">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>Mua ngay</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-detail-bottom">

                    </div>
                </div>
            </div>
        </div>
        <?php
        ?>