<div class="app-containt-top">
            <div class="wrap">
                <div class="app-containt-top-category">
                    <ul class="category-list">
                        <?php
                        if(isset($data['menus'])) {
                        foreach($data['menus'] as $key => $val) {
                            ?>
                            <li class="category-item">
                            <a href="" class="link-level-0">
                            <?php
                                echo $val['TenDM'];
                            ?>
                            </a>
                            <i class="fas fa-chevron-right"></i>
                            <div class="sub-menu-content" style="background: url(./public/img/menu/<?php echo $val['img'] ?>) white no-repeat bottom right;">
                                <div class="sub-menu-wrap">
                                    <div class="sub-category">
                                        <h3>Danh mục sách</h3>
                                        <ul class="sub-category-list">
                                            <?php
                                           foreach($data['categorys'][$key] as $k => $value) {
                                            ?>
                                            <li class="sub-categor-item">
                                            <a href="?MaTL=<?php echo $value['MaTL']?>&name=home&action=search"><?php echo $value['TenTheLoai'] ?></a>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                        <?php
                                        ?>
                                    </div>
                                    <div class="sub-author">
                                        <h3>Tác Giả</h3>
                                        <ul class="sub-author-list">
                                        <?php
                                           foreach($data['authors'][$key] as $k => $value) {
                                            ?>
                                            <li class="sub-author-item">
                                                <a href=""><?php echo $value['TenTG'] ?></a>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="sub-publisher">
                                        <h3>Nhà phát hành</h3>
                                        <ul class="sub-publisher-list">
                                        <?php
                                           foreach($data['publlisher'][$key] as $k => $value) {
                                            ?>
                                            <li class="sub-publisher-item">
                                            <a href=""><?php echo $value['TenNXB'] ?></a>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                            <?php
                        }
                        }
                        ?>
                    </ul>
                </div>
                <div class="app-containt-top-banner">
                    <div class="all-banner">
                            <div class="banner-top">
                                <div class="big-banner">
                                    <img src="./public/img/bannerImg/big-banner.jpg" alt="">
                                </div>
                                <div class="smail-banner">
                                    <div class="smail-banner-item ">
                                        <img src="./public/img/bannerImg/5.jpg" alt="">
                                    </div>
                                    <div class="smail-banner-item ">
                                        <img src="./public/img/bannerImg/3.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="banner-bottom">
                                <div class="smail-banner-item ">
                                    <img src="./public/img/bannerImg/1.jpg" alt="">
                                </div>
                                <div class="smail-banner-item ">
                                    <img src="./public/img/bannerImg/2.jpg" alt="">
                                </div>
                                <div class="smail-banner-item ">
                                    <img src="./public/img/bannerImg/4.jpg" alt="">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>