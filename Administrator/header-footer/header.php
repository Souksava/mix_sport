<?php
   session_start();
   if($_SESSION['mixsport_ses_status_id'] == 1){
        $stt = 1;
   }
   if($_SESSION['mixsport_ses_status_id'] == 2){
    $stt = 2;
    }
    if($_SESSION['mixsport_ses_id'] == ''){
        unset($_SESSION['mixsport_ses_id']);
        unset($_SESSION['emp_id']);
        unset($_SESSION['email']);
        unset($_SESSION['emp_name']);
        unset($_SESSION['img_path']);
        unset($_SESSION['mixsport_ses_status_id']);
        echo"<meta http-equiv='refresh' content='1;URL=$path'>";        
    }
    else if($_SESSION['mixsport_ses_status_id'] != $stt){
        unset($_SESSION['mixsport_ses_id']);
        unset($_SESSION['emp_id']);
        unset($_SESSION['email']);
        unset($_SESSION['emp_name']);
        unset($_SESSION['img_path']);
        unset($_SESSION['mixsport_ses_status_id']);
        echo"<meta http-equiv='refresh' content='1;URL=$path'>";
    }
    // else if($_SESSION['mixsport_ses_status_id'] != $stt && $permission != 1){
    //     unset($_SESSION['mixsport_ses_id']);
    //     unset($_SESSION['emp_id']);
    //     unset($_SESSION['email']);
    //     unset($_SESSION['emp_name']);
    //     unset($_SESSION['img_path']);
    //     unset($_SESSION['mixsport_ses_status_id']);
    //     echo"<meta http-equiv='refresh' content='1;URL=$path'>";
    // }
    else{

        }
                    
      ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo $path; ?>icon/logo.jpg">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tcususdominus Bbootstrap 4 -->
    <!-- <link rel="stylesheet"
        href="<?php echo $path ?>plugins/tcususdominus-bootstrap-4/css/tcususdominus-bootstrap-4.min.css"> -->
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/alt/pageload.css">

    <link rel="stylesheet" href="<?php echo $path ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/alt/style.css">
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/alt/datepicker.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="<?php echo $path ?>dist/js/sweetalert.min.js"></script>
</head>
<?php
        include (''.$path.'oop/obj.php');
        if(isset($_POST['pro_id_order'])){
            $obj->cookie_order(trim($_POST['pro_id_order']),trim($_POST['qty']),trim($_POST['price']));
        }
        if(isset($_POST['btnClear'])){
            $obj->clear_order();
        }
        if(isset($_POST['cookie_pro_id'])){
            $obj->del_order(trim($_POST['cookie_pro_id']));
        }
        if(isset($_POST['order_id'])){
            $obj->save_order(trim($_POST['order_id']),$_SESSION["emp_id"],trim($_POST['sup_id']));
        }
        if(isset($_POST['pro_id_import'])){
            $obj->cookie_import(trim($_POST['pro_id_import']),trim($_POST['qty']),trim($_POST['price']),trim($_POST['remark']));
        }
        if(isset($_POST['btnClear_import'])){
            $obj->clear_import();
        }
        if(isset($_POST['cookie_pro_id_import'])){
            $obj->del_import(trim($_POST['cookie_pro_id_import']));
        }
        if(isset($_POST['sup_id_import'])){
            $obj->save_import(trim($_POST['order_id_import']),$_SESSION["emp_id"],trim($_POST['sup_id_import']),trim($_POST['import_no']));
        }
        if(isset($_POST["btnAdd_sell"])){
            $obj->cookie_sell(trim($_POST["pro_id_sell"]),trim($_POST["qty_sell"]));
        }
        if(isset($_GET["listsell"])){
            $obj->del_sell(trim($_GET["listsell"]));
        }
        if(isset($_POST["sell_id"])){
            $obj->save_sell(trim($_POST["sell_id"]),$_SESSION["emp_id"],"1","1","?????????????????????","?????????????????????",trim($_FILES["img"]["name"]),trim($_POST["getmoney"]));
        }
        
    ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light font14">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link"><?php echo $title; ?></a>
                </li>
            </ul>
            <!-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" name="search" id="search"
                        placeholder="??????????????????" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->

            <?php
                if($title == "?????????????????????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "????????????????????????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "???????????????????????????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "????????????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "??????????????????????????????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "??????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "????????????????????????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "??????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "????????????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "???????????????????????????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "???????????????????????????????????????"){
                    echo'
                        <div class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="search" id="search"
                                    placeholder="??????????????????" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if($title == "???????????????????????????????????????"){
                    echo'
                    <ul class="navbar-nav">
                        <li class="nav-item d-none d-sm-inline-block">
                            <a class="nav-link qtyalert" href="#">????????????????????????????????????</a>
                        </li>
                    </ul>
                    ';
                }
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-danger navbar-badge" id="alert"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">???????????????????????????</span>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo $links ?>Service/Confirm">
                            <div id="result_list" style="overflow-y: scroll;height:120px;font-size: 14px;"></div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo $links ?>Service/Confirm" class="dropdown-item dropdown-footer">???????????????????????????????????????????????????</a>
                    </div>
                </li>
            </ul> &nbsp; &nbsp; &nbsp;
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 font14">
            <!-- Brand Logo -->
            <a href="<?php echo $links ?>Main" class="brand-link">
                <img src="<?php echo $path ?>icon/logo.jpg" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">MIX SPORT</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo $path ?>image/image.jpeg" class="img-circle elevation-2" alt="">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">User</a>
                    </div>
                </div>
                <?php
                    if($stt == 1){  
                ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    ????????????????????????????????????????????????
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Employee" class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    ??????????????????
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportsell" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportorder" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportpay" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>???????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportrevenue" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportcustomer" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportsupplier" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reserv" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    ?????????????????????????????????
                                </p>
                            </a>
                        </li>
                        </li>
                    </ul>
                </nav>
                <?php
                }
                if($stt == 2){
                ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    ????????????????????????????????????????????????
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Employee" class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Category" class="nav-link">
                                        <i class="fas fa-network-wired nav-icon"></i>
                                        <p>?????????????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Unit" class="nav-link">
                                        <i class="far fas fa-boxes nav-icon"></i>
                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Brand" class="nav-link">
                                        <i class="far fas fa-copyright nav-icon"></i>
                                        <p>????????????????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Size" class="nav-link">
                                        <i class="far fas fa-pencil-ruler nav-icon"></i>
                                        <p>?????????????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Product" class="nav-link">
                                        <i class="fab fa-product-hunt nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Supplier" class="nav-link">
                                        <i class="far fas fa-users nav-icon"></i>
                                        <p>????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Customer" class="nav-link">
                                        <i class="far fas fa-users nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Rate" class="nav-link">
                                        <i class="far fas fa-euro-sign nav-icon"></i>
                                        <p>????????????????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Account" class="nav-link">
                                        <i class="far fas fa-file-invoice-dollar nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="" class="nav-link">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>
                                    ????????????????????? ????????? ???????????????????????????????????????
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Order/Order" class="nav-link">
                                        <i class="fas fa-shopping-cart nav-icon"></i>
                                        <p>???????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Order/Import" class="nav-link">
                                        <i class="fas fa-truck nav-icon"></i>
                                        <p>???????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Order/Broken" class="nav-link">
                                        <i class="fas fa-cubes nav-icon"></i>
                                        <p>???????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="" class="nav-link">
                                <i class="fas fa-store nav-icon"></i>
                                <p>
                                    ?????????????????????
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Service/Confirm" class="nav-link">
                                        <i class="fas fa-vote-yea nav-icon"></i>
                                        <p>????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Service/Sell" class="nav-link">
                                        <i class="fas fa-vote-yea nav-icon"></i>
                                        <p>????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    ??????????????????
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportsell" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportorder" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportpay" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>???????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportrevenue" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportcustomer" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reportsupplier" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Report/Reserv" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>??????????????????????????????????????????????????????????????????</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    ?????????????????????????????????
                                </p>
                            </a>
                        </li>
                        </li>
                    </ul>
                </nav>
                <?php
                }
                ?>
            </div>
        </aside>

        <form action="#" method="POST" id="formLogout">
            <div class="modal fade font14" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">??????????????????</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" align="center">
                            ?????????????????????????????????????????????????????????????????? ????????? ????????? ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">?????????????????????</button>
                            <button type="submit" name="btnLogout" class="btn btn-outline-danger">?????????????????????????????????</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
            if(isset($_POST['btnLogout'])){
                $obj->logout();
            }
        ?>
        <div class="main-footer">