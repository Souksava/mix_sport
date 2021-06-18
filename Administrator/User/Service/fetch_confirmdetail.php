<style>
    tr{
        cursor: pointer;
    }
</style>
<?php
    $rank=0;
  $path="../../";
  include (''.$path.'oop/obj.php');
  $output = '';


 if(isset($_POST["query"]))
{
   $update_status_sell = $_POST["query"];
   mysqli_query($conn,"update sell set seen1='2' where sell_id='$update_status_sell'");
   $obj->billdetail(trim($_POST["query"]));
}
else
{
   $obj->billdetail("");
}
$amount = 0;
if(mysqli_num_rows($result_billdetail) > 0)
{
 $output .= '
  <div class="table-responsive2">
  <table class="table-bordered" style="width: 700px;text-align: center;" style="font-size: 12px;">
    <tr>
        <th align="center" style="width: 15px;">#</th>
        <th align="center" style="width: 60px;">ສີນຄ້າ</th>
        <th align="center" style="width: 120px;">ຊື່ສິນຄ້າ</th>
        <th align="center" style="width: 30px;">ຈຳນວນ</th>
        <th align="center" style="width: 40px;">ລາຄາ</th>
        <th align="center" style="width: 50px;">ລວມ</th>
    </tr>
 ';
 $no_ =  $rank;
 while($row = mysqli_fetch_array($result_billdetail))
 {
$amount = $amount + $row["total"];
$no_ += 1;
  $output .= '
    <tr>
        <td align="center">'.$no_.'</td>
        ';
        if($row["img"] == ""){
           $row["img"] = "image.jpeg";
        }
        $output .='
        <td>
           <img src="../../image/'.$row["img"].'" class="img-circle elevation-2" alt="" width="55px" />
        </td>
        <td align="center">'.$row["cate_name"].' '.$row["brand_name"].' <br> '.$row["pro_name"].' '.$row["size_name"].'</td>
        <td align="center">'.$row["qty"].'</td>
        <td align="center">'.number_format($row["price"],2).'</td>
        <td align="center">'.number_format($row["total"],2).'</td>
    </tr>
  ';
 }
 mysqli_free_result($result_billdetail);  
 mysqli_next_result($conn);
 $output .='
   </table>
</div>
<h3 align="right">ມູນຄ່າລວມ: '.number_format($amount,2).'</h3>
 ';
 echo $output;
}
else
{
 echo '<br>
 <hr size="1" width="90%">
<p align="center">ບໍ່ມີຂໍ້ມູນ</p>
<hr size="1" width="90%">
 ';
}
?>
