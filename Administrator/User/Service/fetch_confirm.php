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
           $page = ($page*100)-100;
           $rank = (($page*100)-100) / 100 + 1;
        }
  }
  else{
    $page = 0;
 }
 if(isset($_POST["page"]))
{
   $obj->web_order_limit(trim($page));
}
else
{
   $obj->web_order_limit($page);
}
$amount = 0;
if(mysqli_num_rows($result_web_order_limit) > 0)
{
 $output .= '
  <div class="table-responsive">
  <table class="table-bordered" style="width: 1500px;text-align: center;" id="tblemplyee">
    <tr style="font-size: 18px;">
        <th>ລຳດັບ</th>
        <th>ເລກທີບິນ</th>
        <th>ພະນັກງານ</th>
        <th>ລູກຄ້າ</th>
        <th>ມູນຄ່າລວມ</th>
        <th>ສະຖານະ</th>
        <th>ການຈ່າຍ</th>
        <th>ປະເພດຂາຍ</th>
        <th>ຮັບເງິນມາ</th>
        <th>ພາບລິບການໂອນ</th>
        <th>ເວລາ</th>
        <th>ໝາຍເຫດ </th>
    </tr>
 ';
 $no_ =  $rank;
 while($row = mysqli_fetch_array($result_web_order_limit))
 {
$amount = $amount + $row["amount"];
$no_ += 1;
if($row["seen1"] == 0){
   $output .= '
   <tr class="btn_fetch" style="background-color: #F5F4F4;">
     <td>'.$no_.'</td>
     <td>'.$row["sell_id"].'</td>
     <td>'.$row["emp_name"].'</td>
     <td>'.$row["cus_name"].'</td>
     <td>'.number_format($row["amount"],2).'</td>
     <td>'.$row["stt_name"].'</td>
     <td>'.$row["type_pay"].'</td>
     <td>'.$row["sell_type"].'</td>
     <td>'.$row["getmoney"].'</td>
     ';
     if($row["img_path"] == ""){
        $row["img_path"] = "image.jpeg";
     }
     $output .='
     <td>
        <img src="../../image/'.$row["img_path"].'" class="img-circle elevation-2" alt="" width="55px" />
     </td>
     <td>'.$row["timestamp"].'</td>
     <td>'.$row["remark"].'</td>
   </tr>
 ';
}
else{
   $output .= '
   <tr class="btn_fetch">
     <td>'.$no_.'</td>
     <td>'.$row["sell_id"].'</td>
     <td>'.$row["emp_name"].'</td>
     <td>'.$row["cus_name"].'</td>
     <td>'.number_format($row["amount"],2).'</td>
     <td>'.$row["stt_name"].'</td>
     <td>'.$row["type_pay"].'</td>
     <td>'.$row["sell_type"].'</td>
     <td>'.$row["getmoney"].'</td>
     ';
     if($row["img_path"] == ""){
        $row["img_path"] = "image.jpeg";
     }
     $output .='
     <td>
        <img src="../../image/'.$row["img_path"].'" class="img-circle elevation-2" alt="" width="55px" />
     </td>
     <td>'.$row["timestamp"].'</td>
     <td>'.$row["remark"].'</td>
   </tr>
 ';
}

 }
 mysqli_free_result($result_web_order_limit);  
 mysqli_next_result($conn);
 $output .='
   </table>
</div>
 ';
 echo $output;
 if(isset($_POST["date"]))
{
   $obj->web_order();
}
 else
 {
    $obj->web_order();
 }

 $count = mysqli_num_rows($result_web_order);
 mysqli_free_result($result_web_order);  
 mysqli_next_result($conn);
 $a = ceil($count/100);
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
<script>
   $('.btn_fetch').on('click',function(){
      $('#exampleModalfetch').modal('show');
      $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[1]);
   });
</script>