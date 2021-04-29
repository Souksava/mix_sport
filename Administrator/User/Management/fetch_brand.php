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
           $page = ($page*15)-15;
           $rank = (($page*15)-15) / 15 + 1;
        }
  }
  else{
    $page = 0;
 }
 if(isset($_POST["query"]))
{
   $highlight = $_POST['query'];
   $obj->select_brand_limit("%".$_POST['query']."%",$page);
}
else
{
   $obj->select_brand_limit("%%",$page);
}

if(mysqli_num_rows($resultbrand_limit) > 0)
{
 $output .= '
  <div class="table-responsive">
  <table class="table-bordered" style="width: 100%;text-align: center;">
    <tr style="font-size: 18px;">
        <th style="width: 120px;">ເຄື່ອງມື</th>
        <th>ລຳດັບ</th>
        <th>ລະຫັດ</th>
        <th>ຍີ່ຫໍ້</th>
    </tr>
 ';
 $no_ =  $rank;
 while($row = mysqli_fetch_array($resultbrand_limit))
 {
$no_ += 1;
  $output .= '
    <tr>
        <td>
        <input class="form-check-input" type="checkbox" name="id2[]" value="'.$row["brand_id"].'" id="flexCheckDefault'.$row["brand_id"].'">
        &nbsp; &nbsp;
        <a href="#" data-toggle="modal" data-target="#exampleModalupdate"
            class="fa fa-pen toolcolor btnUpdate"></a>&nbsp; &nbsp;
        <a href="#" data-toggle="modal" data-target="#exampleModaldel"
            class="fa fa-trash toolcolor btn_Delete"></a>
    </td>
    <td>'.$no_.'</td>
    <td>'.$row["brand_id"].'</td>
    <td>'.$row["brand_name"].'</td>
    </tr>
  ';
 }
 mysqli_free_result($resultbrand_limit);  
 mysqli_next_result($conn);
 $output .='
   </table>
</div>
 ';
 echo $output;
 if(isset($_POST["query"]))
 {
    $obj->select_brand("%".$_POST['query']."%");
 }
 else
 {
    $obj->select_brand("%%");
 }

 $count = mysqli_num_rows($resultbrand);
 mysqli_free_result($resultbrand);  
 mysqli_next_result($conn);
 $a = ceil($count/15);
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
$('.btn_Delete').on('click', function() {
    $('#exampleModaldel').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
         return $(this).text();
      }).get();

      console.log(data);

      $('#id').val(data[2]);
   });
   $('.btnUpdate').on('click', function() {
        $('#exampleModalupdate').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data);
        $('#brand_id').val(data[2]);
        $('#brand_name2').val(data[3]);
    });
</script>