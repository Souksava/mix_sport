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
   $obj->select_employee_limit("%".$_POST['query']."%",$page);
}
else
{
   $obj->select_employee_limit("%%",$page);
}

if(mysqli_num_rows($result_employee_limit) > 0)
{
 $output .= '
  <div class="table-responsive">
  <table class="table-bordered" style="width: 1900px;text-align: center;">
    <tr style="font-size: 18px;">
        <th style="width: 120px;">ເຄື່ອງມື</th>
        <th style="width: 70px;">ລຳດັບ</th>
        <th style="width: 150px;">ລະຫັດ</th>
        <th style="width: 250px;">ຊື່</th>
        <th style="width: 250px;">ນາມສະກຸນ</th>
        <th style="width: 180px;">ເພດ</th>
        <th style="width: 200px;">ເບີໂທລະສັບ</th>
        <th style="width: 250px;">ທີ່ຢ່</th>
        <th style="width: 250px;">ອີເມວ</th>
        <th style="width: 300px;">ລະຫັດຜ່ານ</th>
        <th style="width: 170px;">ສະຖານະຜູ້ໃຊ້ລະບົບ</th>
        <th style="width: 170px;">ຮູບພາບ</th>
    </tr>
 ';
 $no_ =  $rank;
 while($row = mysqli_fetch_array($result_employee_limit))
 {
$no_ += 1;
  $output .= '
    <tr>
        <td>
        <input type="checkbox" name="emp_id_delete_many[]" value="'.$row["emp_id"].'" id="flexCheckDefault">
        &nbsp; &nbsp;
        <a href="#" data-toggle="modal" data-target="#exampleModalupdate"
            class="fa fa-pen toolcolor btnUpdateProduct"></a>&nbsp; &nbsp;
        <a href="#" data-toggle="modal" data-target="#exampleModaldel"
            class="fa fa-trash toolcolor btnDelete_com"></a>
        </td>
        <td>'.$no_.'</td>
        <td>'.$row["emp_id"].'</td>
        <td>'.$row["emp_name"].'</td>
        <td>'.$row["emp_surname"].'</td>
        <td>'.$row["gender"].'</td>
        <td>'.$row["tel"].'</td>
        <td>'.$row["address"].'</td>
        <td>'.$row["email"].'</td>
        <td>'.$row["pass"].'</td>
        <td style="display: none;">'.$row["status"].'</td>
        <td>'.$row["status_name"].'</td>
        <td style="display: none;">'.$row["profile"].'</td>
        ';
        if($row["profile"] == ""){
            $row["profile"] = "image.jpeg";
        }
        $output .='
        <td>
            <img src="../../image/'.$row["profile"].'" class="img-circle elevation-2" alt="" width="55px">
        </td>
    </tr>
  ';
 }
 mysqli_free_result($result_employee_limit);  
 mysqli_next_result($conn);
 $output .='
   </table>
</div>
 ';
 echo $output;
 if(isset($_POST["query"]))
 {
    $obj->select_employee("%".$_POST['query']."%");
 }
 else
 {
    $obj->select_employee("%%");
 }

 $count = mysqli_num_rows($result_employee);
 mysqli_free_result($result_employee);  
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
        $('#exampleModalupdate').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#emp_id').val(data[2]);
        $('#emp_name2').val(data[3]);
        $('#surname2').val(data[4]);
        $('#gender2').val(data[5]);
        $('#tel2').val(data[6]);
        $('#address2').val(data[7]);
        $('#email2').val(data[8]);
        $('#pass2').val(data[9]);
        $('#status2').val(data[10]);
        if(data[10] === ''){
            document.getElementById("output2").src = ('../../image/image.jpeg');
        }
        else{
            document.getElementById("output2").src = ('../../image/'+data[12]);
        }
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