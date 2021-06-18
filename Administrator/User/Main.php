<?php
  $title = "ໜ້າຫຼັກ";
  $path = "../";
  $links = "";
  $session_path = "../";
  include ("../header-footer/header.php");
?>


<div class="row">
    <a href="<?php echo $links ?>Management/Category" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນປະເພດສິນຄ້າ
        </div>
    </a>
    <a href="<?php echo $links ?>Management/Unit" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນຫົວໜ່ວຍສິນຄ້າ
        </div>
    </a>
    
    <a href="<?php echo $links ?>Management/Brand" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນຍີ່ຫໍ້ສິນຄ້າ
        </div>
    </a>
    
    <a href="<?php echo $links ?>Management/Product" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນສິນຄ້າ
        </div>
    </a>
    <a href="<?php echo $links ?>Management/Supplier" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນຜູ້ສະໜອງ
        </div>
    </a>
    <a href="<?php echo $links ?>Management/Customer" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນລູກຄ້າ
        </div>
    </a>
    <a href="?php echo $links ?>Management/Exchange" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນອັດຕາແລກປ່ຽນ
        </div>
    </a>
    <a href="<?php echo $links ?>Management/Account" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນເລກທີບັນຊີ
        </div>
    </a>
    <a href="<?php echo $links ?>Order/Order" class="m-a">
        <div class="btn btn-light mainlink">
            ສັ່ງຊື້ສິນຄ້າ
        </div>
    </a>
    <a href="<?php echo $links ?>Order/Import" class="m-a">
        <div class="btn btn-light mainlink">
            ນຳເຂົ້າສິນຄ້າ
        </div>
    </a>
    <a href="<?php echo $links ?>Order/Broken" class="m-a">
        <div class="btn btn-light mainlink">
            ສິນຄ້າຊຳ່ຫຼຸດ
        </div>
    </a>
    <a href="<?php echo $links ?>Service/Confirm" class="m-a">
        <div class="btn btn-light mainlink">
            ຢືນຢັນການສັ່ງຊື້
        </div>
    </a>

    <a href="<?php echo $links ?>Service/Sell" class="m-a">
        <div class="btn btn-light mainlink">
            ຂາຍສິນຄ້າໜ້າຮ້ານ
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