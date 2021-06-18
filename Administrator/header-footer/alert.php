<?php
include ('../oop/connect.php');
$acc_accept = "ຍັງບໍ່ອະນຸມັດ";
$result = mysqli_query($conn,"call alert_emp()");
$fetch = mysqli_fetch_array($result,MYSQLI_ASSOC);
echo $fetch['alert'];
mysqli_free_result($result);  
mysqli_next_result($conn);
?>
