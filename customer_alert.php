<?php 
  include ('Administrator/oop/obj.php');
  $obj->customer_alert_bill($_POST["query"]);
  echo $alert;
?>