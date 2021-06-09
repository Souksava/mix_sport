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
  if(isset($_POST['page'])){
     $page = $_POST['page'];
     if($page == '' || $page == 0 || $page == 1){
        $page = 0;
        }
        else{
           $page = ($page*50)-50;
           $rank = (($page*50)-50) / 50 + 1;
        }
  }
  else{
    $page = 0;
 }
 if(isset($_POST["date1"]) || isset($_POST["date2"]))
{
   $obj->report_pay_limit(trim($_POST["date1"]),trim($_POST["date2"]),$page);
}
else
{
   $obj->report_pay_limit("","",$page);
}
$amount = 0;
if(mysqli_num_rows($result_pay_limit) > 0)
{
 $output .= '
  <div class="table-responsive">
  <table class="table-bordered" style="width: 2000px;text-align: center;" id="tblemplyee">
    <tr style="font-size: 18px;">
        <th style="width: 75px;">ລຳດັບ</th>
        <th style="width: 150px;">ເລກທີໃບສັ່ງຊື້</th>
        <th style="width: 175px;">ເລກທີ່ບິນນຳເຂົ້າ</th>
        <th style="width: 150px;">ພະນັກງານ</th>
        <th style="width: 450px;">ຜູ້ສະໜອງ</th>
        <th style="width: 190px;">ລະຫັດສິນຄ້າ</th>
        <th style="width: 350px;">ສິນຄ້າ</th>
        <th style="width: 120px;">ຈຳນວນ</th>
        <th style="width: 150px;">ລາຄາ</th>
        <th style="width: 180px;">ລວມ</th>
        <th style="width: 200px;">ໝາຍເຫດ </th>
        <th style="width: 200px;">ວັນທີ</th>
    </tr>
 ';
 $no_ =  $rank;
 while($row = mysqli_fetch_array($result_pay_limit))
 {
$amount = $amount + $row["total"];
$no_ += 1;
  $output .= '
    <tr class="btn_fetch">
      <td>'.$no_.'</td>
      <td>'.$row["order_id"].'</td>
      <td>'.$row["imp_bill"].'</td>
      <td>'.$row["emp_name"].'</td>
      <td>'.$row["company"].'</td>
      <td>'.$row["pro_id"].'</td>
      <td>'.$row["cate_name"].' '.$row["brand_name"].' '.$row["pro_name"].' '.$row["size_name"].'</td>
      <td>'.$row["qty"].' '.$row["unit_name"].'</td>
      <td>'.number_format($row["price"],2).'</td>
      <td>'.number_format($row["total"],2).'</td>
      <td>'.$row["remark"].'</td>
      <td>'.date("d/m/Y H:i:s",strtotime($row["timestamp"])).'</td>
    </tr>
  ';
 }
 mysqli_free_result($result_pay_limit);  
 mysqli_next_result($conn);
 $output .='
   </table>
</div>
 ';
 echo $output;
 if(isset($_POST["date1"]) || isset($_POST["date2"]))
{
   $obj->report_pay(trim($_POST["date1"]),trim($_POST["date2"]));
}
 else
 {
    $obj->report_pay("","");
 }

 $count = mysqli_num_rows($result_pay);
 mysqli_free_result($result_pay);  
 mysqli_next_result($conn);
 $a = ceil($count/50);
 if(isset($_POST['page'])){
    if($_POST['page'] > 1){
       $previous = $_POST['page'] - 1;
       echo '     
       <nav aria-label="..." class="table-responsive4">
          <ul class="pagination">
             <li class="page-item">
                <a href="#" class="btn btn-danger page-links_table" id="'.$previous.'" style="color: white!important;width: 70px;" value="'.$previous.'">ກັບຄືນ</a>
             </li>
     ';
    }
    else{
       echo' <nav aria-label="..." class="table-responsive4">
                <ul class="pagination">';
    }
 }
 else{
    echo' <nav aria-label="..." class="table-responsive4">
             <ul class="pagination">';
 }
 $i = 0;
 $page_next = 0;
 $page_next2 = 1;
 if(isset($_POST['page'])){
    $page_next = $_POST['page'];
    $page_next2 = $_POST['page'];
    if($_POST['page'] == 0 || $_POST['page'] == ''){
       $page_next2 = 1;
    }
 }
 for($b=1;$b<=$a;$b++){
    $i = $b;
    if($page_next2 == $b){
       echo '
       <li class="page-item active" aria-current="page">
          <span class="page-link">
          '.$b.'
          <span class="sr-only">(current)</span>
          </span>
       </li>
       ';
    }
    else{
       echo '
       <li class="page-item">
          <a href="#" id="'.$b.'" class="btn btn-danger page-link page-links_table" value="'.$b.'">'.$b.'</a>
       </li>
       ';
    }
 }
   if($page_next == 0){
      $page_next = 1;
   }
    if($page_next < $i){
       if($page_next == 0){
          $page_next += 1;
       }
       $next = $page_next + 1;
       echo '      

                   <li class="page-item">
                      <a href="#" class="btn btn-success page-links_table" id="'.$next.'" value="'.$next.'" style="color: white!important;width: 90px;" href="#">ໜ້າຖັດໄປ</a>
                   </li>
                </ul>
             </nav>
';

    }
    else{
       echo'';
    }
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
