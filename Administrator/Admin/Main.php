<?php
  $title = "ໜ້າຫຼັກ";
  $path = "../";
  $links = "";
  $session_path = "../";

  include ("../header-footer/header.php");
?>


<div class="row">
<a href="<?php echo $links ?>Management/Employee" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນພະນັກງານ
        </div>
    </a>
    <a href="<?php echo $links ?>Report/Reportsell" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານການຂາຍສິນຄ້າ
        </div>
    </a>
    <a href="<?php echo $links ?>Report/Reportorder" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານການສັ່ງຊື້ສິນຄ້າ
        </div>
    </a>
    <a href="<?php echo $links ?>Report/Reportpay" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານລາຍຈ່າຍ
        </div>
    </a>
    <a href="<?php echo $links ?>Report/Reportrevenue" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານລາຍຮັບ
        </div>
    </a>
    <a href="<?php echo $links ?>Report/Reportcustomer" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານຂໍ້ມູນລູກຄ້າ
        </div>
    </a>
    <a href="<?php echo $links ?>Report/Reportsupplier" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານຂໍ້ມູນຜູ້ສະໜອງ
        </div>
    </a>
    <a href="<?php echo $links ?>Report/Reserv" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານການສັ່ງຈອງສິນຄ້າ
        </div>
    </a>
</div>

<?php
 include ("../header-footer/footer.php");
?>