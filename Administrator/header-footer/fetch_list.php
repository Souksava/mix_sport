<?php
include ('../oop/connect.php');
    $result = mysqli_query($conn,"call alert_list();");

if(mysqli_num_rows($result) > 0)
{
    foreach($result as $list){
?>
    <div class="dropdown-item">
        <i class="fas fa-envelope mr-2"></i>ເລກທີບິນ  <?php echo $list['sell_id'] ?> ລູກຄ້າ <?php echo $list['cus_name'] ?> <br>ສະຖານະຊື້ <?php echo $list['sell_type'] ?>
    </div>
    <div class="dropdown-divider"></div>
<?php
    }
}
else{
    echo '<br>
        <hr size="1" width="90%">
        <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
        <hr size="1" width="90%">
        ';
}
mysqli_free_result($result);  
mysqli_next_result($conn);
?>