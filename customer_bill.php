<?php
  include ('Administrator/oop/obj.php');
  $obj->select_customer_bill($_POST["query"]);
  if(mysqli_num_rows($result_customer_bill) > 0){
  foreach($result_customer_bill as $row_bill){
?>
<div class="ps-cart-item__thumbnail">
    <a href="Bill"></a>
    <img src="Administrator/image/bill.png" alt="">
</div>
<div class="ps-cart-item__content"><a class="ps-cart-item__title" href="Bill">ເລກທີບິນ: <?php echo $row_bill["sell_id"] ?>
        <span><i><?php echo $row_bill["stt_name"] ?></i></span></a>
    <p><span>ມູນຄ່າ:<i><?php echo number_format($row_bill["total"]) ?></i></span>
    </p>
</div>
<?php
  }
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
  mysqli_free_result($result_customer_bill);  
  mysqli_next_result($conn);
?>