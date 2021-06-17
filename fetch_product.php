<?php
    $rank=0;
  include ('Administrator/oop/obj.php');
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
 while($row = mysqli_fetch_array($resultproduct_limit))
 {
    $output .= '
    <div class="ps-product__column">
              <div class="ps-shoe mb-30">
                <div class="ps-shoe__thumbnail">
                  <img src="Administrator/image/'.$row["img"].'" style="width: 500px;height:300px;" alt=""><a class="ps-shoe__overlay" href="Productdetail?id='.$row["pro_id"].'"></a>
                </div>
                <div class="ps-shoe__content">
                  <div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal"><img src="Administrator/image/'.$row["img"].'" style="width:50px;height:50px;" alt=""></div>
                  </div>
                  <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">'.$row["pro_name"].'</a>
                    <p class="ps-shoe__categories"><a href="#">'.$row["cate_name"].'</a>,<a href="#"> '.$row["brand_name"].'</a>,<a href="#"> '.$row["size_name"].'</a></p>
                    <span class="ps-shoe__price">'.number_format($row["price"],2).'</span>
                  </div>
                </div>
              </div>
            </div>
            
    
    ';
 }
 mysqli_free_result($resultproduct_limit);  
 mysqli_next_result($conn);
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
       $output .= '   
       <div style="clear: both;"></div>  
            <div class="ps-product-action">
                <div class="ps-pagination">
                    <ul class="pagination">
                    <li><a href="#" class="page-links_table" id="'.$previous.'" value="'.$previous.'"><i class="fa fa-angle-left"></i></a></li>
     ';
    }
    else{
       $output .=' 
       <div style="clear: both;"></div>
            <div class="ps-product-action"><div class="ps-pagination">
                <ul class="pagination">
                     
                    ';
    }
 }
 else{
    $output .=' 
    <div style="clear: both;"></div>
        <div class="ps-product-action"><div class="ps-pagination">
            <ul class="pagination">
                       
             ';
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
       $output .= '
       <li class="active"><a href="#">'.$b.'</a></li>
       ';
    }
    else{
       $output .= '
       <li><a href="#" id="'.$b.'" class="page-links_table" value="'.$b.'">'.$b.'</a></li>
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
       $output .= '      
                        <li><a href="#" class="page-links_table" id="'.$next.'" value="'.$next.'"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
           </div>
';

    }
    else{
       $output .='
       
       ';
    }

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
<script type="text/javascript">

</script>