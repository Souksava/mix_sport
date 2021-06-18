<?php
  session_start();
?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="<?php echo $path ?>Administrator/icon/logo.jpg" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title><?php echo $title; ?></title>
    <!-- Fonts-->
    <link
        href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/ps-icon/style.css">
    <!-- CSS Library-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="<?php echo $path ?>plugins/revolution/css/navigation.css">
    <link rel="stylesheet" href="<?php echo $path ?>Administrator/plugins/fontawesome-free/css/all.min.css">
    <script src="Administrator/dist/js/sweetalert.min.js"></script>
    <!-- Custom-->
    <link rel="stylesheet" href="<?php echo $path ?>css/style.css">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->

</head>
<?php
    include (''.$path.'Administrator/oop/obj.php');
    if(isset($_POST["btnAddCart"])){
      $obj->cookie_cart(trim($_POST["pro_id"]),trim($_POST["qty"]));
    }
    if(isset($_GET["productid"])){
      $obj->del_cart(trim($_GET["productid"]));
    }
    if(isset($_GET["logout"])){
        $obj->customer_logout();
      }
      if(isset($_POST["btnCustomer_order"])){
        $obj->custoemr_order($_POST["sell_id"],"7",$_SESSION["cus_id"],"2",$_POST["payment"],"ອອນລາຍ",$_FILES["img_path"]["name"],$_POST["remark"],trim($_POST["whatsapp"]),trim($_POST["tel"]),$_POST["address"]);
      }

  ?>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading">
    <div class="header--sidebar"></div>
    <header class="header">
        <div class="header__top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                        <p>ບ້ານ ຫ້ວຍຫົງ ເມືອງ ຈັນທະບູລີ ນະຄອນຫຼວງວຽງຈັນ - Tel: 020 7877 7784</p>
                    </div>
                    <?php
                        if(isset($_SESSION["cus_id"])){
                    ?>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="header__actions"><a href="index?logout=true">ອອກຈາກລະບົບ</a>
                        </div>
                    </div>
                    <?php
                        }
                        else{
                    ?>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="header__actions"><a href="Signin">ເຂົ້າສູ່ລະບົບ & ລົງທະບຽນ</a>
                        </div>
                    </div>
                    <?php
                        }
                    ?>

                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="container-fluid">
                <div class="navigation__column left">
                    <div class="header__logo"><a class="ps-logo" href="index"><img src="Administrator/icon/logo.jpg"
                                class="brand-image img-circle elevation-3" style="width: 65px;" alt=""></a></div>
                </div>
                <div class="navigation__column center">
                    <ul class="main-menu menu">
                        <li class="menu-item menu-item-has-children dropdown"><a href="index">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="menu-item menu-item-has-children has-mega-menu"><a href="Products">ສິນຄ້າ</a>
                        </li>
                        <li class="menu-item menu-item-has-children dropdown"><a href="contact-us.html">ກ່ຽວກັບເຮົາ</a>
                        <li class="menu-item menu-item-has-children dropdown"><a href="Contact-us">ຕິດຕໍ່ເຮົາ</a>
                        </li>
                    </ul>
                </div>
                <div class="navigation__column right">
                    <?php 
              if($title == "ສິນຄ້າ"){
                ?>
                    <form class="ps-search--header" action="do_action" method="post">
                        <input class="form-control" id="search" type="text" placeholder="Search Product…">
                        <button><i class="ps-icon-search"></i></button>
                    </form>
                    <?php
              }
            ?>
                    <?php 
                    if($title != "ກະຕ່າສິນຄ້າ"){
                      $amount_cart = 0;
                      $obj->select_cart_cookie();

                      ?>
                    <div class="ps-cart"><a class="ps-cart__toggle" href="#"><span><i id="showQtycart"></i></span><i
                                class="ps-icon-shopping-cart"></i></a>
                        <div class="ps-cart__listing">
                            <div class="ps-cart__content">
                                <?php
                                    if(isset($_COOKIE['list_cart'])){
                                    $cart_data2 = $cart_data;
                                    $no2_ = 0;
                                    foreach($cart_data2 as $row2){
                                    $no2_ += 1;
                                    $amount_cart += $row2["qty"] * $row2["price"];
                                    $total2 = 0;
                                    $total2 += $row2["qty"] * $row2["price"];
                                ?>
                                <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="Cart"></a>
                                        <?php
                                            if($row2["img"] == ""){
                                              $row2["img"] == "logo.jpg";
                                            }
                                        ?>
                                        <img src="Administrator/image/<?php echo $row2["img"] ?>" alt="">
                                    </div>
                                    <div class="ps-cart-item__content"><a class="ps-cart-item__title"
                                            href="Cart"><?php echo $row2["cate_name"] ?>
                                            <?php echo $row2["brand_name"] ?> <?php echo $row2["pro_name"] ?></a>
                                        <p><span>ຈຳນວນ:<i><?php echo $row2["qty"] ?></i></span><span>ລວມ:<i><?php echo number_format($row2["price"]) ?></i></span>
                                        </p>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="ps-cart__total">
                                <p>ຈຳນວນທັງໝົດ:<span id="atycart"><?php echo $no2_ ?></span></p>
                                <p>ມູນຄ່າລວມ:<span><?php echo number_format($total2,2) ?> ກີບ</span></p>
                            </div>
                            <div class="ps-cart__footer"><a class="ps-btn" href="Cart">ໄປທີ່ກະຕ່າ<i
                                        class="ps-icon-arrow-left"></i></a></div>
                            <?php 
                            }
                            else{
                                echo'
                                <div align="center">
                                    <hr size="1" style="width: 90%;"/>
                                        ຍັງບໍ່ມີຂໍ້ມູນ
                                    <hr size="1" style="width: 90%;"/>
                                </div>
                            ';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                      }
                      else{
                          if(isset($_SESSION["cus_id"])){
                        ?>
                    <div class="ps-cart"><a class="ps-cart__toggle" href="Bill"><span><i id="showbill"></i></span>
                    <i class="fas fa-file-invoice"></i></a>
                        <div class="ps-cart__listing">
                            <div class="ps-cart__content">
                                <div class="ps-cart-item">
                                    <div id="result_bill"></div>

                                </div>
                            </div>
                            <div class="ps-cart__footer"><a class="ps-btn" href="Bill">ໄປທີບິນ<i
                                        class="ps-icon-arrow-left"></i></a></div>
                        </div>
                    </div>
                    <?php
                          }
                      }
                    ?>
                    <div class="menu-toggle"><span></span></div>
                </div>
            </div>
        </nav>
    </header>
    <div class="header-services">
        <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000"
            data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1"
            data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
            data-owl-mousedrag="on">
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong>ບໍລິການຈັດສົ່ງຟຣີ</strong>:
                ຮ້ານມິກສະປອດບໍລິການ</p>
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong>ບໍລິການຈັດສົ່ງຟຣີ</strong>:
                ຮ້ານມິກສະປອດບໍລິການ</p>
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong>ບໍລິການຈັດສົ່ງຟຣີ</strong>:
                ຮ້ານມິກສະປອດບໍລິການ</p>
        </div>
    </div>
    <main class="ps-main">