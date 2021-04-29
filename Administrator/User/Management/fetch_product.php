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
 if(isset($_POST["query"]))
{
   $highlight = $_POST['query'];
   $obj->select_product_limit("%".$_POST['query']."%",$page);
}
else
{
   $obj->select_product_limit("%%",$page);
}

if(mysqli_num_rows($resultproduct_limit) > 0)
{
 $output .= '
  <div class="table-responsive">
  <table class="table-bordered" style="width: 1500px;text-align: center;">
    <tr style="font-size: 18px;">
        <th style="width: 120px;">ເຄື່ອງມື</th>
        <th style="width: 90px;">ລຳດັບ</th>
        <th style="width: 150px;">ລະຫັດສິນຄ້າ</th>
        <th style="width: 180px;">ສິນຄ້າ</th>
        <th style="width: 120px;">ຈຳນວນ</th>
        <th style="width: 150px;">ລາຄາ</th>
        <th style="width: 180px;">ເງື່ອນໄຂການສັ່ງຊື້</th>
        <th style="width: 90px;">ຮູບພາບ</th>
    </tr>
 ';
 $no_ =  $rank;
 while($row = mysqli_fetch_array($resultproduct_limit))
 {
$no_ += 1;
  $output .= '
    <tr>
        <td>
        <input type="checkbox" name="id2[]" value="'.$row["pro_id"].'" id="flexCheckDefault">
        &nbsp; &nbsp;
        <a href="#" data-toggle="modal" data-target="#btnUpdateProduct"
            class="fa fa-pen toolcolor btnUpdateProduct"></a>&nbsp; &nbsp;
        <a href="#" data-toggle="modal" data-target="#exampleModaldel"
            class="fa fa-trash toolcolor btnDelete_com"></a>
        </td>
        <td>'.$no_.'</td>
        <td>'.$row["pro_id"].'</td>
        <td style="display: none;">'.$row["pro_name"].'</td>
        <td style="display: none;">'.$row["cate_id"].'</td>
        <td style="display: none;">'.$row["brand_id"].'</td>
        <td style="display: none;">'.$row["size_id"].'</td>
        <td style="display: none;">'.$row["unit_id"].'</td>
        <td style="display: none;">'.$row["qty"].'</td>
        <td style="display: none;">'.$row["qty_alert"].'</td>
        <td style="display: none;">'.$row["img"].'</td>
        <td>
            '.$row["cate_name"].' '.$row["brand_name"].' '.$row["pro_name"].' '.$row["size_name"].'
        </td>
        <td>'.$row["qty"].' '.$row["unit_name"].'</td>
        <td>'.number_format($row["price"],2).'</td>
        <td>'.$row["qty_alert"].' '.$row["unit_name"].'</td>
        ';
        if($row["img"] == ""){
            $row["img"] = "image.jpeg";
        }
        $output .='
        <td>
            <img src="../../image/'.$row["img"].'" class="img-circle elevation-2" alt="" width="55px">
        </td>
        <td style="display: none;">'.$row["price"].'</td>
    </tr>
  ';
 }
 mysqli_free_result($resultproduct_limit);  
 mysqli_next_result($conn);
 $output .='
   </table>
</div>
 ';
 echo $output;
 if(isset($_POST["query"]))
 {
    $obj->select_product("%".$_POST['query']."%");
 }
 else
 {
    $obj->select_product("%%");
 }

 $count = mysqli_num_rows($resultproduct);
 mysqli_free_result($resultproduct);  
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
                      <a href="#" class="btn btn-success page-links_table id="'.$next.'" value="'.$next.'" style="color: white!important;width: 90px;" href="#">ໜ້າຖັດໄປ</a>
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
<script type="text/javascript">
var highlight = "<?php echo $_POST['query']; ?>";
$('.result_data').highlight([highlight]);
    $('.btnUpdateProduct').on('click', function() {
        $('#btnUpdateProduct').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#pro_id2').val(data[2]);
        $('#pro_name2').val(data[3]);
        $('#cate_id2').val(data[4]);
        $('#brand_id2').val(data[5]);
        $('#size_id2').val(data[6]);
        $('#unit_id2').val(data[7]);
        $('#qty2').val(data[8]);
        $('#qty_alert2').val(data[9]);
        if(data[10] === ''){
            document.getElementById("output2").src = ('../../image/camera.jpg');
        }
        else{
            document.getElementById("output2").src = ('../../image/'+data[10]);
        }
        $('#price2').val(data[16]);
    });
    $('.btnDelete_com').on('click', function() {
        $('#exampleModaldel').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[2]);
    });
</script>