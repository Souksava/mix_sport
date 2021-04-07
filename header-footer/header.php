<?php
//    session_start();
//    if($_SESSION['ses_status_id'] == 1){
//         $stt = 1;
//    }
//    if($_SESSION['ses_status_id'] == 2){
//     $stt = 2;
//     }
//     if($_SESSION['ses_status_id'] == 3){
//         $stt = 3;
//     }
//     if($_SESSION['ses_status_id'] == 4){
//         $stt = 4;
    $stt = 2;
//     }
//     if($_SESSION['ses_seven_id'] == ''){
//         unset($_SESSION['ses_id']);
//         unset($_SESSION['email']);
//         unset($_SESSION['emp_name']);
//         unset($_SESSION['emp_id']);
//         unset($_SESSION['img_path']);
//         unset($_SESSION['ses_status_id']);
//         echo"<meta http-equiv='refresh' content='1;URL=$path'>";        
//     }
//     else if($_SESSION['ses_status_id'] != $stt){
//         unset($_SESSION['ses_id']);
//         unset($_SESSION['email']);
//         unset($_SESSION['emp_name']);
//         unset($_SESSION['emp_id']);
//         unset($_SESSION['img_path']);
//         unset($_SESSION['ses_status_id']);
//         echo"<meta http-equiv='refresh' content='1;URL=$path'>";
//     }
//     else{
//             include (''.$path.'oop/obj.php');
//             // Import
//             if(isset($_POST['stock'])){
//                 $obj->cookie_stock(trim($_POST['code']),trim($_POST['serial']),trim($_POST['qty']),trim($_POST['price']),trim($_POST['pro_no']),trim($_POST['dnv']),trim($_POST['imp_no']),trim($_POST['remark']));
//             }
//             if(isset($_POST['btnDelete_stock'])){
//                 $obj->del_stock(trim($_POST['id']));
//             }
//             if(isset($_POST['clear-stock'])){
//                 $obj->clear_stock();
//             }
//             if(isset($_POST['btnStock'])){
//                 $obj->save_stock(trim($_POST['sup_id']),trim($_POST['rate_id']),$_SESSION['emp_id']);
//             }
//             //End Import
//             // Check-Stock
//             if(isset($_POST['check_stock'])){
//                 $obj->cookie_check_stock(trim($_POST['code']),trim($_POST['serial']),trim($_POST['qty']),trim($_POST['remark']));
//             }
//             if(isset($_POST['btnDelete_Check_Stock'])){
//                 $obj->del_check_stock(trim($_POST['id']));
//             }
//             if(isset($_POST['clear_check_stock'])){
//                 $obj->clear_check_stock();
//             }
            
//             if(isset($_POST['btnCheck_stock'])){
//                 $obj->save_check_stock($_SESSION['emp_id'],$_POST['pro_addr']);
//             }
//             //End Check-Stock

//             //Spare-part
//             if(isset($_POST['add_spare'])){
//                 $obj->cookie_spare_part(trim($_POST['code']),trim($_POST['serialout']),trim($_POST['spare_part']),trim($_POST['pro_id']),trim($_POST['serialin']),trim($_POST['remark']));
//             }
//             if(isset($_POST['btnDelete_spare'])){
//                 $obj->del_spare_part(trim($_POST['id']));
//             }
//             if(isset($_POST['clear_spare'])){
//                 $obj->clear_spare_part();
//             }
//             if(isset($_POST['btnSave_spare'])){
//                 $obj->save_spare_part($_SESSION['emp_id']);
//             }
//             //ປ່ຽນອາໄຫຼ່ End Spare-Part
//             //ຟອມເບີກ
//             if(isset($_POST['add_distribute'])){
//                 $obj->cookie_distribute(trim($_POST['code']),trim($_POST['serial']),trim($_POST['qty']),trim($_POST['form_id']),trim($_POST['remark']));
//             }
//             if(isset($_POST['clear_distribute'])){
//                 $obj->clear_distribute();
//             }
//             if(isset($_POST['btnDelete_distribute'])){
//                 $obj->del_distribute(trim($_POST['id']));
//             }
//             if(isset($_POST['btnSave_distribute'])){
//                 $obj->save_distribute($_SESSION['emp_id']);
//             }
//             //ສິ້ນສຸດຟອມເບີກ
//             //ສິນຄ້າເບີກແລ້ວນຳກັບຄືນ
//             if(isset($_POST['add_putback'])){
//                 $obj->cookie_putback(trim($_POST['code']),trim($_POST['serial']),trim($_POST['qty']),trim($_POST['form_id']),trim($_POST['remark']));
//             }
//             if(isset($_POST['clear_putback'])){
//                 $obj->clear_putback();
//             }
//             if(isset($_POST['btnDelete_putback'])){
//                 $obj->del_putback(trim($_POST['id']));
//             }
//             if(isset($_POST['btnSave_putback'])){
//                 $obj->save_putback($_SESSION['emp_id']);
//             }
//             //ສິ້ນສຸດ
//                         //ສິນຄ້າເບີກແລ້ວນຳກັບຄືນ
//                         if(isset($_POST['form_add'])){
//                             $obj->cookie_form(trim($_POST['code']),trim($_POST['qty']));
//                         }
//                         if(isset($_POST['clear_form'])){
//                             $obj->clear_form();
//                         }
//                         if(isset($_POST['del_list_form_id'])){
//                             $obj->del_form(trim($_POST['del_list_form_id']));
//                         }
//                         if(isset($_POST['form_id'])){
//                             $mail_user_name = $_SESSION['emp_name'];
//                             $obj->save_form(trim($_POST['form_id']),$_SESSION['emp_id'],trim($_POST['cus_id']),trim($_POST['amount']),trim($_POST['packing']));
            
//                         }
//                         //ສິ້ນສຸດ
//                     }
                    
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
    <link rel="stylesheet" href="<?php echo $path ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/alt/style.css">

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

<body class="hold-transition sidebar-mini layout-fixed">

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
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" name="search" id="search"
                        placeholder="ຄົ້ນຫາ" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
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
                                    ຈັດການຂໍ້ມູນຫຼັກ
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Management/auther" class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>ຈັດການຂໍ້ມູນພະນັກງານ</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    ລາຍງານ
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-employee" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານການຂາຍສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-customer" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານການສັ່ງຊື້ສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-supplier" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານລາຍຈ່າຍ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-product" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານລາຍຮັບ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-stock" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານຂໍ້ມູນລູກຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-check-stock" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານຂໍ້ມູນຜູ້ສະໜອງ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-warehouse" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານການສັ່ງຈອງສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    ອອກຈາກລະບົບ
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
                                    ຈັດການຂໍ້ມູນຫຼັກ
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Category" class="nav-link">
                                        <i class="fas fa-network-wired nav-icon"></i>
                                        <p>ຈັດການຂໍ້ມູນປະເພດສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <a href="<?php echo $links ?>Management/Unit" class="nav-link">
                                        <i class="far fas fa-boxes nav-icon"></i>
                                        <p>ຈັດການຂໍ້ມູນຫົວໜ່ວຍສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Brand" class="nav-link">
                                        <i class="far fas fa-copyright nav-icon"></i>
                                        <p>ຈັດການຂໍ້ມູນຍີ່ຫໍ້ສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Size" class="nav-link">
                                        <i class="far fas fa-pencil-ruler nav-icon"></i>
                                        <p>ຈັດການຂໍ້ມູນຂະໜາດສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $links ?>Management/Product" class="nav-link">
                                        <i class="fab fa-product-hunt nav-icon"></i>
                                        <p>ຈັດການຂໍ້ມູນສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Management/employee" class="nav-link">
                                        <i class="far fas fa-users nav-icon"></i>
                                        <p>ຈັດການຂໍ້ມູນຜູ້ສະໜອງ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Management/employee" class="nav-link">
                                        <i class="far fas fa-users nav-icon"></i>
                                        <p>ຈັດການຂໍ້ມູນລູກຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Management/employee" class="nav-link">
                                        <i class="far fas fa-euro-sign nav-icon"></i>
                                        <p>ຈັດການຂໍ້ມູນອັດຕາແລກປ່ຽນ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Management/employee" class="nav-link">
                                        <i class="far fas fa-file-invoice-dollar nav-icon"></i>
                                        <p>ຈັດການຂໍ້ມູນເລກທີບັນຊີ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="" class="nav-link">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>
                                    ສັ່ງຊື້ ແລະ ນຳເຂົ້າສິນຄ້າ
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Form/accept" class="nav-link">
                                        <i class="fas fa-shopping-cart nav-icon"></i>
                                        <p>ສັ່ງຊື້ສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Form/accept" class="nav-link">
                                        <i class="fas fa-truck nav-icon"></i>
                                        <p>ນຳເຂົ້າສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Form/accept" class="nav-link">
                                        <i class="fas fa-cubes nav-icon"></i>
                                        <p>ສິນຄ້າຊຳ່ຫຼຸດ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="" class="nav-link">
                                <i class="fas fa-store nav-icon"></i>
                                <p>
                                    ບໍລິການ
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Form/accept" class="nav-link">
                                        <i class="fas fa-vote-yea nav-icon"></i>
                                        <p>ຢືນຢັນການສັ່ງຊື້</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Form/accept" class="nav-link">
                                        <i class="fab fa-amazon-pay nav-icon"></i>
                                        <p>ຊ່ຳລະການສັ່ງຊື້</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Form/accept" class="nav-link">
                                        <i class="fas fa-vote-yea nav-icon"></i>
                                        <p>ຂາຍສິນຄ້າໜ້າຮ້ານ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    ລາຍງານ
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-employee" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານການຂາຍສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-customer" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານການສັ່ງຊື້ສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-supplier" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານລາຍຈ່າຍ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-product" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານລາຍຮັບ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-stock" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານຂໍ້ມູນລູກຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-check-stock" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານຂໍ້ມູນຜູ້ສະໜອງ</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="'.$links.'Report/report-warehouse" class="nav-link">
                                        <i class="far fas fa-book nav-icon"></i>
                                        <p>ລາຍງານການສັ່ງຈອງສິນຄ້າ</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    ອອກຈາກລະບົບ
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
                            <h5 class="modal-title" id="exampleModalLabel">ຢຶນຢັນ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" align="center">
                            ທ່ານຕ້ອງການອອກຈາກລະບົບ ຫຼື ບໍ່ ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" name="btnLogout" class="btn btn-outline-danger">ອອກຈາກລະບົບ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
            // if(isset($_POST['btnLogout'])){
            //     $obj->logout();
            // }
        ?>
        <div class="main-footer">