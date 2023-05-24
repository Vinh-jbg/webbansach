<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/main.css/register.css">
    <link rel="stylesheet" href="./public/css/main.css/service.css">
    <link rel="stylesheet" href="./public/css/main.css/detail.css">
    <link rel="stylesheet" href="./public/css/main.css/cart.css">
    <link rel="stylesheet" href="./public/css/main.css/bill.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/main.css/index.css">
</head>
<body>
    <?php
        if(isset($data['result'])) { ?>
            <div class="Notification <?php echo $data['typeMessage']?>" >
                    <span><?php echo $data['result']?></span>
            </div>
    <?php
        unset($data['result']);
        }
    ?> 
   <div class="app">
       <header>
           <div class="recommend">
                <div class="reconmend-wrap">
                    <div class="recommend-contend">
                        <i class="fas fa-shuttle-van recommend-contend-icon"></i>
                        <span class="recommend-contend-span">
                            Miễn phí giao hàng
                        </span>
                        <div class="recommend-decription">
                        </div>
                    </div>
                    <div class="recommend-contend">
                        <i class="fas fa-book recommend-contend-icon"></i>
                        <span class="recommend-contend-span">
                            80.000 tựa sách
                        </span>
                        <div class="recommend-decription">
                        </div>
                    </div>
                    <div class="recommend-contend">
                        <i class="fas fa-mobile-alt recommend-contend-icon"></i>
                        <span class="recommend-contend-span">
                            Vinabook Reader
                        </span>
                        <div class="recommend-decription">
                        </div>
                    </div>
                </div>
           </div>
           <div class="app-header">
            <div class="app-header-wrap">
                <div class="header-logo">
                    <a href="index.php">Vina<span>book</span>.com</a>
                </div>
                <div class="header-search">
                    <form action="index.php" class="header-form" method="POST">
                        <div class="group-input">
                            <input type="hidden" name="controller" value="home">
                            <input type="hidden" name="action" value="search">
                            <input type="text" name="values" placeholder="Tìm kiếm tựa sách, tác giả">
                            <i class="fas fa-search header-form-icon"></i>
                            <button class="header-form-btn">Tìm sách</button>
                        </div>
                    </form>
                </div>
                <div class="header-cart-icon">
                    <span class="number"><?php if(isset($_SESSION['cart']))echo count($_SESSION['cart']); else echo "0";?></span>
                    <label for="cart_list">
                        <i class="fas fa-cart-plus">
                            </i>
                        </label>
                        <input type="checkbox" hidden id="cart_list">
                        <div class="cart-list" id="cart">
                            <?php include_once("./Views/frontend/blocks/cart-block.php");?>
                            
                        </div>
                    </div>
                <?php
                    if(!isset($_SESSION['data']['userInfo'])) {
                        ?>
                <div class="header-link">
                    <a href="?controller=user&action=login" class="btn-login">Đăng nhập</a>
                    <a href="?controller=user&action=register">Đăng ký</a>
                </div>
                <?php
                } else {
                    $info = $_SESSION['data']['userInfo'];
                    ?>
                <div class="header-link">
                    <a  id="info-user" class="btn-login"> <?php echo $info['TenKH']?> </a>
                    <ul id="submenu-info">
                        <li><a class="submenu" href="?controller=user&action=showInfo">Thông tin cá nhân</a></li>
                        <li><a class="submenu" href="?controller=user&action=showBill">Đơn hàng</a></li>
                    </ul>
                    <a href="?controller=user&action=logout">Logout</a>
                </div>
                <?php 
                }
                ?>
            </div>
           </div>
       </header>
       <div class="app-title">
            <div class="wrap">
                <div class="app-title-list">
                    <i class="fas fa-bars"></i>
                    <span>Danh Mục Sách</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="app-title-list">
                    <div class="app-tile-contact">
                        <i class="fas fa-phone"></i>
                        <span><span class="text-1">Hotline</span>: 1900 6401</span>
                    </div>
                    <div class="app-tile-contact">
                        <i class="far fa-comments"></i>
                        <span>Hỗ trỡ trực tuyến</span>
                    </div>
                </div>
            </div>
        </div>

        