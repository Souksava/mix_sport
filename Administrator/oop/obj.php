<?php
 include ('connect.php');
date_default_timezone_set("Asia/Bangkok");
$datenow = time();
$Date = date("Y-m-d",$datenow);
$Time = date("H:i:s",$datenow);
class obj{
    public $conn;
    public $search;
    public static function login($email,$password){
        global $conn;
        // $password = "') or '1'='1';");//";
        session_start();
        $resultck = mysqli_query($conn, "select * from employee where email='$email' and binary pass=md5('$password')");
        if($email == "")
        {
            echo"<script>";
            echo"window.location.href='home?email=null';";
            echo"</script>";
        }
        else if($password == "")
        {
            echo"<script>";
            echo"window.location.href='home?pass=null';";
            echo"</script>";
        }
        else if(!mysqli_num_rows($resultck))
        {
            echo"<script>";
            echo"window.location.href='home?login=false';";
            echo"</script>";
        }
        else 
        {
            $resultget = mysqli_query($conn, "select * from employee where email='$email' and binary pass=md5('$password')"); 
            if(mysqli_num_rows($resultget) <= 0){
                echo"<meta http-equiv-'refress' content='1;URL=/'>";
            }
            else{
               
                while($user = mysqli_fetch_array($resultget))
                {
                    if($user['stt_id'] == 1)
                    {
                        $_SESSION['ses_seven_id'] = session_id();
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['emp_name'] = $user['emp_name'];
                        $_SESSION['emp_id'] = $user['emp_id'];
                        $_SESSION['img_path'] = $user['img_path'];
                        $_SESSION['ses_status_id'] = 1;
                        echo"<meta http-equiv='refresh' content='1;URL=Manager/Main'>";
                    }
                    else if($user['stt_id'] == 2)
                    {
                        $_SESSION['ses_seven_id'] = session_id();
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['emp_name'] = $user['emp_name'];
                        $_SESSION['emp_id'] = $user['emp_id'];
                        $_SESSION['img_path'] = $user['img_path'];
                        $_SESSION['ses_status_id'] = 2;
                        echo"<meta http-equiv='refresh' content='1;URL=User/Main'>";
                    }
                    else if($user['stt_id'] == 3)
                    {
                        $_SESSION['ses_seven_id'] = session_id();
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['emp_name'] = $user['emp_name'];
                        $_SESSION['emp_id'] = $user['emp_id'];
                        $_SESSION['img_path'] = $user['img_path'];
                        $_SESSION['ses_status_id'] = 3;
                        echo"<meta http-equiv='refresh' content='1;URL=User_Stock/Main'>";
                    }
                    else if($user['stt_id'] == 4)
                    {
                        $_SESSION['ses_seven_id'] = session_id();
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['emp_name'] = $user['emp_name'];
                        $_SESSION['emp_id'] = $user['emp_id'];
                        $_SESSION['img_path'] = $user['img_path'];
                        $_SESSION['ses_status_id'] = 4;
                        echo"<meta http-equiv='refresh' content='1;URL=Check_Stock/Main'>";
                    }
                    else
                    {
                        $_SESSION['ses_seven_id'] = session_id();
                        session_start();
                        unset($_SESSION['ses_seven_id']);
                        unset($_SESSION['email']);
                        unset($_SESSION['emp_name']);
                        unset($_SESSION['emp_id']);
                        unset($_SESSION['img_path']);
                        unset($_SESSION['ses_status_id']);
                        session_destroy();
                        echo"<script>";
                        echo"window.location.href='/?permission=found';";
                        echo"</script>";
                    }

                }
            }
        }  
    }
    public static function logout(){
        global $path;
        session_start();
        unset($_SESSION['ses_seven_id']);
        unset($_SESSION['email']);
        unset($_SESSION['emp_name']);
        unset($_SESSION['emp_id']);
        unset($_SESSION['img_path']);
        unset($_SESSION['ses_status_id']);
        session_destroy();
        echo"<script>";
        echo"window.location.href='$path';";
        echo"</script>";
    }
    //ປະເພດສິນຄ້າ
    public static function select_category($search){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultcategory;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultcategory = mysqli_query($conn,"call select_category('$search');"); 
    }
    public static function select_category_limit($search,$page){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultcategory_limit;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultcategory_limit = mysqli_query($conn,"call select_category_limit('$search','$page');"); 
    }
    public static function insert_category($cate_name){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $check = mysqli_query($conn,"select * from category where cate_name='$cate_name';");
        if(mysqli_num_rows($check) > 0){
            echo"<script>";
            echo"window.location.href='Category?name=same';";
            echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call insert_category('$cate_name');"); 
            if(!$result){
                echo"<script>";
                echo"window.location.href='Category?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Category?save2=success';";
                echo"</script>";
            }
        }
       
    }
    public static function update_category($cate_id,$cate_name){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $result = mysqli_query($conn,"call update_category('$cate_id','$cate_name');"); 
        if(!$result){
            echo"<script>";
            echo"window.location.href='Category?update=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Category?update2=success';";
            echo"</script>";
        }
    }
    public static function del_category($cate_id){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $check_product = mysqli_query($conn,"select * from product where cate_id='$cate_id'");
        if(mysqli_num_rows($check_product) > 0){     
                echo"<script>";
                echo"window.location.href='Category?category=product';";
                echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call del_category('$cate_id');"); 
            if(!$result){
                echo"<script>";
                echo"window.location.href='Category?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Category?del2=success';";
                echo"</script>";
            }
        }
    }
    //

    //ຍີ່ຫໍ້ສິນຄ້າ
    public static function select_brand($search){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultbrand;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultbrand = mysqli_query($conn,"call select_brand('$search');"); 
    }
    public static function select_brand_limit($search,$page){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultbrand_limit;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultbrand_limit = mysqli_query($conn,"call select_brand_limit('$search','$page');"); 
    }
    public static function insert_brand($brand_name){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $check = mysqli_query($conn,"select * from brand where brand_name='$brand_name'");
        if(mysqli_num_rows($check) > 0){
            echo"<script>";
            echo"window.location.href='Brand?name=same';";
            echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call insert_brand('$brand_name');"); 
            if(!$result){
                echo"<script>";
                echo"window.location.href='Brand?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Brand?save2=success';";
                echo"</script>";
            }
        }
      
    }
    public static function update_brand($brand_id,$brand_name){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $result = mysqli_query($conn,"call update_category('$brand_id','$brand_name');"); 
        if(!$result){
            echo"<script>";
            echo"window.location.href='Brand?update=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Brand?update2=success';";
            echo"</script>";
        }
    }
    public static function del_brand($brand_id){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $check_product = mysqli_query($conn,"select * from product where brand_id='$brand_id'");
        if(mysqli_num_rows($check_product) > 0){     
                echo"<script>";
                echo"window.location.href='Brand?brand=product';";
                echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call del_brand('$brand_id');"); 
            if(!$result){
                echo"<script>";
                echo"window.location.href='Brand?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Brand?del2=success';";
                echo"</script>";
            }
        }
    }
    //



    //ຫົວໜ່ວຍສິນຄ້າ
    public static function select_unit($search){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultunit;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultunit = mysqli_query($conn,"call select_unit('$search');"); 
    }
    public static function select_unit_limit($search,$page){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultunit_limit;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultunit_limit = mysqli_query($conn,"call select_unit_limit('$search','$page');"); 
    }
    public static function insert_unit($unit_name){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $check = mysqli_query($conn,"select * from unit where unit_name='$unit_name'");
        if(mysqli_num_rows($check) > 0){
            echo"<script>";
            echo"window.location.href='Unit?name=same';";
            echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call insert_unit('$unit_name');"); 
            if(!$result){
                echo"<script>";
                echo"window.location.href='Unit?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Unit?save2=success';";
                echo"</script>";
            }
        }
      
    }
    public static function update_unit($unit_id,$unit_name){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $result = mysqli_query($conn,"call update_unit('$unit_id','$unit_name');"); 
        if(!$result){
            echo"<script>";
            echo"window.location.href='Unit?update=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Unit?update2=success';";
            echo"</script>";
        }
    }
    public static function del_unit($unit_id){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $check_product = mysqli_query($conn,"select * from product where unit_id='$unit_id'");
        if(mysqli_num_rows($check_product) > 0){     
                echo"<script>";
                echo"window.location.href='Unit?brand=product';";
                echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call del_unit('$unit_id');"); 
            if(!$result){
                echo"<script>";
                echo"window.location.href='Unit?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Unit?del2=success';";
                echo"</script>";
            }
        }
    }



    public static function select_size($search){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultsize;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultsize = mysqli_query($conn,"call select_size('$search');"); 
    }
    public static function select_size_limit($search,$page){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultsize_limit;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultsize_limit = mysqli_query($conn,"call select_size_limit('$search','$page');"); 
    }
    public static function insert_size($size_name){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $check = mysqli_query($conn,"select * from size where size_name='$size_name'");
        if(mysqli_num_rows($check) > 0){
            echo"<script>";
            echo"window.location.href='Size?name=same';";
            echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call insert_size('$size_name');"); 
            if(!$result){
                echo"<script>";
                echo"window.location.href='Size?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Size?save2=success';";
                echo"</script>";
            }
        }
      
    }
    public static function update_size($size_id,$size_name){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $result = mysqli_query($conn,"call update_size('$size_id','$size_name');"); 
        if(!$result){
            echo"<script>";
            echo"window.location.href='Size?update=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Size?update2=success';";
            echo"</script>";
        }
    }
    public static function del_size($size_id){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $result;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $check_product = mysqli_query($conn,"select * from product where size_id='$size_id'");
        if(mysqli_num_rows($check_product) > 0){     
                echo"<script>";
                echo"window.location.href='Size?size=product';";
                echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call del_size('$size_id');"); 
            if(!$result){
                echo"<script>";
                echo"window.location.href='Size?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Size?del2=success';";
                echo"</script>";
            }
        }
    }
    //
    public static function select_product_limit($search,$page){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultproduct_limit;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultproduct_limit = mysqli_query($conn,"call select_product_limit('$search','$page');"); 
    }
    public static function select_product($search){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultproduct;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultproduct = mysqli_query($conn,"call select_product('$search');"); 
    }
    public static function select_check_product_limit($page){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultproduct_limit;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultproduct_limit = mysqli_query($conn,"call select_check_product_limit('$page');"); 
    }
    public static function select_check_product(){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultproduct;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultproduct = mysqli_query($conn,"call select_check_product();"); 
    }
    public static function insert_product($pro_id,$pro_name,$qty,$price,$cate_id,$unit_id,$brand_id,$size_id,$qty_alert,$img){
        global $conn;
        global $path;
        $check_pro_id = mysqli_query($conn,"select * from product where pro_id='$pro_id'");
        if(mysqli_num_rows($check_pro_id) > 0){
            echo"<script>";
            echo"window.location.href='Product?proid=same';";
            echo"</script>";
        }
        else{
            if($img == ""){
                $Pro_image = "";
            }
            else{
                $ext = pathinfo(basename($_FILES['img']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'Mix_'.uniqid().".".$ext;
                $image_path = $path.'image/';
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['img']['tmp_name'], $upload_path);
                $Pro_image = $new_image_name;
            }
            $result = mysqli_query($conn,"call insert_product('$pro_id','$pro_name','$qty','$price','$cate_id','$unit_id','$brand_id','$size_id','$qty_alert','$Pro_image')");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Product?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Product?save2=success';";
                echo"</script>";
            }
        }
    }
    public static function update_product($pro_id,$pro_name,$qty,$price,$cate_id,$unit_id,$brand_id,$size_id,$qty_alert,$img){
        global $conn;
        global $path;
        $get_img = mysqli_query($conn, "select img from product where pro_id='$pro_id'");//ດຶງຊື່ຟາຍຮູບພາບໂດຍໃຊ້ໄອດີ
        $data = mysqli_fetch_array($get_img, MYSQLI_ASSOC);
        if($img == ""){//ກວດສອບຄ່າຟາຍຮູບມາວ່າເປັນຄ່າວ່າງ ຫຼື ບໍ່
            $Pro_image = $data['img'];
        }
        else{//ຖ້າຄ່າຟາຍຮູບບໍ່ເປັນຄ່າວ່າງໃຫ້ເຮັດວຽກໃນຈຸດນີ້
            $ext = pathinfo(basename($_FILES['img2']['name']), PATHINFO_EXTENSION);
            $new_image_name = 'Mix_'.uniqid().".".$ext;
            $image_path = $path.'image/';
            $upload_path = $image_path.$new_image_name;
            move_uploaded_file($_FILES['img2']['tmp_name'], $upload_path);
            $Pro_image = $new_image_name;
            $path2 = $image_path.$data['img'];
            if(file_exists($path2) && !empty($data['img'])){
                unlink($path2);
                
            }
        }
        $result = mysqli_query($conn,"call update_product('$pro_id','$pro_name','$qty','$price','$cate_id','$unit_id','$brand_id','$size_id','$qty_alert','$Pro_image')");
        if(!$result){
            echo"<script>";
            echo"window.location.href='Product?update=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Product?update2=success';";
            echo"</script>";
        }
    }
    public static function del_product($id){
        global $conn;
        global $path;
        $check_order = mysqli_query($conn,"select * from orderdetail where pro_id='$id'");
        $check_import = mysqli_query($conn,"select * from import where pro_id='$id'");
        $check_selldetail = mysqli_query($conn,"select * from selldetail where pro_id='$id'");
        if(mysqli_num_rows($check_order) > 0){
            echo"<script>";
            echo"window.location.href='Product?order=has';";
            echo"</script>";
        }
        else if(mysqli_num_rows($check_import) > 0){
            echo"<script>";
            echo"window.location.href='Product?import=has';";
            echo"</script>";
        }
        else if(mysqli_num_rows($check_selldetail) > 0){
            echo"<script>";
            echo"window.location.href='Product?sell=has';";
            echo"</script>";
        }
        else{
            $get_img = mysqli_query($conn,"select img from product where pro_id='$id'");
            $data = mysqli_fetch_array($get_img, MYSQLI_ASSOC);
            $path2 = $path.'image/'.$data['img'];
            if(file_exists($path2) && !empty($data['img'])){
                unlink($path2);        
            }
            $result = mysqli_query($conn,"call del_product('$id');");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Product?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Product?del2=success';";
                echo"</script>";
            }
        }
    }
    public static function insert_supplier($company,$tel,$fax,$address,$email){
        global $conn;
        $check_name = mysqli_query($conn,"select * from supplier where company='$company'");
        if(mysqli_num_rows($check_name) > 0){
            echo"<script>";
            echo"window.location.href='Supplier?name=same';";
            echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call insert_supplier('$company','$tel','$fax','$address','$email')");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Supplier?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Supplier?save2=success';";
                echo"</script>";
            }
        }
    }
    public static function select_supplier($search){
        global $conn;
        global $result_supplier;
        $result_supplier = mysqli_query($conn,"call select_supplier('$search')");
    }
    public static function select_supplier_limit($search,$page){
        global $conn;
        global $result_supplier_limit;
        $result_supplier_limit = mysqli_query($conn,"call select_supplier_limit('$search','$page')");
    }
    public static function del_supplier($sup_id){
        global $conn;
        $check_order = mysqli_query($conn,"select * from orders where sup_id='$sup_id'");
        $check_import = mysqli_query($conn,"select * from import where sup_id='$sup_id'");
        if(mysqli_num_rows($check_order) > 0){
            echo"<script>";
            echo"window.location.href='Supplier?order=has';";
            echo"</script>";
        }
        else if(mysqli_num_rows($check_import) > 0){
            echo"<script>";
            echo"window.location.href='Supplier?import=has';";
            echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call del_supplier('$sup_id');");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Supplier?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Supplier?del2=success';";
                echo"</script>";
            }
        }
    }
   public static function update_supplier($sup_id,$company,$tel,$fax,$address,$email){
       global $conn;
       $result = mysqli_query($conn,"call update_supplier('$sup_id','$company','$tel','$fax','$address','$email')");
       if(!$result){
        echo"<script>";
        echo"window.location.href='Supplier?update=fail';";
        echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Supplier?update2=success';";
            echo"</script>";
        }
   }
   public static function select_customer($search){
    global $conn;
    global $result_customer;
    $result_customer = mysqli_query($conn,"call select_customer('$search')");
    }
    public static function select_customer_limit($search,$page){
        global $conn;
        global $result_customer_limit;
        $result_customer_limit = mysqli_query($conn,"call select_customer_limit('$search','$page')");
    }
    public static function select_rate(){
        global $conn;
        global $result_rate;
        $result_rate = mysqli_query($conn,"call select_rate()");
    }
    public static function insert_rate($rate_id,$rate_buy,$rate_sell){
        global $conn;
        $check_rate = mysqli_query($conn,"select * from rate where rate_id='$rate_id'");
        if(mysqli_num_rows($check_rate) > 0){
            echo"<script>";
            echo"window.location.href='Rate?rateid=same';";
            echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call insert_rate('$rate_id','$rate_buy','$rate_sell')");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Rate?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Rate?save2=success';";
                echo"</script>";
            }
        }
    }
    public static function update_rate($rate_id,$rate_buy,$rate_sell){
        global $conn;
        $result = mysqli_query($conn,"call update_rate('$rate_id','$rate_buy','$rate_sell')");
        if(!$result){
            echo"<script>";
            echo"window.location.href='Rate?update=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Rate?update2=success';";
            echo"</script>";
         }
    }
    public static function del_rate($rate_id){
        global $conn;
        if($rate_id == "THB" || $rate_id == "USD"){
            echo"<script>";
            echo"window.location.href='Rate?rate=found';";
            echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call del_rate('$rate_id')");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Rate?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Rate?del2=success';";
                echo"</script>";
            }
        }
    }
    public static function select_acc(){
        global $conn;
        global $result_acc;
        $result_acc = mysqli_query($conn,"call select_acc()");
    }
    public static function insert_acc($bank,$acc_name,$acc_no,$qr_code){
        global $conn;
        global $path;
       $check_bank = mysqli_query($conn,"select * from account where bank='$bank'");
       if(mysqli_num_rows($check_bank) > 0){
            echo"<script>";
            echo"window.location.href='Account?bank=same';";
            echo"</script>";
       }
       else{
            if($qr_code == ""){
                $Pro_image = "";
            }
            else{
                $ext = pathinfo(basename($_FILES['qrcode']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'Mix_'.uniqid().".".$ext;
                $image_path = $path.'image/';
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['qrcode']['tmp_name'], $upload_path);
                $Pro_image = $new_image_name;
            }
            $result = mysqli_query($conn,"call insert_acc('$bank','$acc_name','$acc_no','$Pro_image')");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Account?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Account?save2=success';";
                echo"</script>";
            }
       }
    }
    public static function update_acc($bank,$acc_name,$acc_no,$qr_code){
        global $conn;
        global $path;
        $get_img = mysqli_query($conn, "select qr_code from account where bank='$bank'");
        $data = mysqli_fetch_array($get_img, MYSQLI_ASSOC);
        if($qr_code == ""){//ກວດສອບຄ່າຟາຍຮູບມາວ່າເປັນຄ່າວ່າງ ຫຼື ບໍ່
            $Pro_image = $data['qr_code'];
        }
        else{//ຖ້າຄ່າຟາຍຮູບບໍ່ເປັນຄ່າວ່າງໃຫ້ເຮັດວຽກໃນຈຸດນີ້
            $ext = pathinfo(basename($_FILES['qrcode2']['name']), PATHINFO_EXTENSION);
            $new_image_name = 'Mix_'.uniqid().".".$ext;
            $image_path = $path.'image/';
            $upload_path = $image_path.$new_image_name;
            move_uploaded_file($_FILES['qrcode2']['tmp_name'], $upload_path);
            $Pro_image = $new_image_name;
            $path2 = $image_path.$data['qr_code'];
            if(file_exists($path2) && !empty($data['qr_code'])){
                unlink($path2);
                
            }
        }
        $result = mysqli_query($conn,"call update_acc('$bank','$acc_name','$acc_no','$Pro_image')");
        if(!$result){
            echo"<script>";
            echo"window.location.href='Account?update=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Account?update2=success';";
            echo"</script>";
        }
    }
    public static function del_acc($bank){
        global $conn;
        global $path;
        $get_img = mysqli_query($conn,"select qr_code from account where bank='$bank'");
        $data = mysqli_fetch_array($get_img, MYSQLI_ASSOC);
        $path2 = $path.'image/'.$data['qr_code'];
        if(file_exists($path2) && !empty($data['qr_code'])){
            unlink($path2);        
        }
        $result = mysqli_query($conn,"call del_acc('$bank')");
        if(!$result){
            echo"<script>";
            echo"window.location.href='Account?del=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Account?del2=success';";
            echo"</script>";
        }
    }
    public static function get_order(){
        global $conn;
        global $order;
        $order = "";
        $result_order = mysqli_query($conn,"call get_order();");
        if(mysqli_num_rows($result_order) > 0){
            $row_order = mysqli_fetch_array($result_order, MYSQLI_ASSOC);
            $order = (int)$row_order['order_id'] + 1;
            $order = sprintf("%06s",$order);
        }
        else{
            $order = "000001";
        }
        mysqli_free_result($result_order);  
        mysqli_next_result($conn);
    }
    public static function select_order_cookie(){
        global $cart_data;
        if(isset($_COOKIE['list_order'])){//ຕອນໂຫຼດກວດສອບວ່າຄຸກກີ້ມີຄ່າວ່າງຫຼືບໍ່
            $cookie_data = $_COOKIE['list_order'];//ຕັ້ງຄຸກກີ້ໃຫ້ເປັນ string
            $cart_data = json_decode($cookie_data, true);// ຕັ້ງຄຸກກີ້ໃຫ້ເປັນຮູບແບບ json
        }
    }
    public static function cookie_order($pro_id,$qty,$price){
        global $conn;
        $check_product = mysqli_query($conn,"select * from product where pro_id='$pro_id';");
        if(mysqli_num_rows($check_product) > 0){
            if(isset($_COOKIE['list_order'])){//ກວດສອບວ່າຄຸກກີ້ distribute_list ນັ້ນມີຄ່າຫຼືບໍ່
                $cookie_data = $_COOKIE['list_order'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
                $cart_data = json_decode($cookie_data, true);//Decode ຄ່າຄຸກກີ້ອອກມາໃຫ້ອ່ານຄ່າເປັນ Array ໄດ້ໃນຮູບແບບ json
            }
            else{
                $cart_data = array();//ຖ້າຄຸກກີ້ບໍ່ມີຄ່າຂໍ້ມູນແລ້ວຕັ້ງໂຕປ່ຽນໃຫ້ເປັນອາເລ
            }
            $item_id_list = array_column($cart_data,'pro_id');//ຕັ້ງຄ່າ serial ໃຫ້ມີຄ່າເທົ່າກັບ array $cart_data['code']
            if(in_array($pro_id,$item_id_list)){//ຖ້າວ່າໄອດີທີ່ປ້ອນມາທາງຄີບອດຕົງກັນກັບໄອດີທີ່ຢູ່ໃນ Array Cart_data ໃຫ້ເຮັດວຽກຈຸດນີ້
                foreach($cart_data as $keys => $values){//Loop ຂໍ້ມູນ cart_data ອອກມາເພື່ອຊອກຫາໄອດີທີ່ປ້ອນເຂົ້າມາກັບໄອດີທີ່ຢູ່ໃນ cart_data ທີ່ຕົງກັນ
                    if($cart_data[$keys]["pro_id"] == $pro_id){//ຖ້າຫາກວ່າຊອກຫາໄອດີທີຕົງກັນໄດ້ແລ້ວແມ່ນເຮັດວຽກດັ່ງນີ້
                        $cart_data[$keys]["qty"] = $cart_data[$keys]["qty"] + $qty;//ປັບໃຫ້ຈຳນວນຂອງ array cart_data ບວກໃຫ້ກັບຈຳນວນທີ່ປ້ອນເຂົ້າມາ
                    }
                }
                echo"<script>";
                echo"window.location.href='Order';";
                echo"</script>";
            }
            else{ // ຖ້າວ່າໄອດີບໍ່ຕົງກັນໃຫ້ເພີ່ມຂໍ້ມູນເຂົ້າໃນຄຸກກີ້
                $getin = mysqli_query($conn,"SELECT pro_id,pro_name,qty,price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,qty_alert,img FROM product p LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE pro_id = '$pro_id';");
                $get_info = mysqli_fetch_array($getin,MYSQLI_ASSOC);
                $pro_name = $get_info['pro_name'];
                $cate_name = $get_info['cate_name'];
                $unit_name = $get_info['unit_name'];
                $brand_name = $get_info['brand_name'];
                $size_name = $get_info['size_name'];
                $img = $get_info['img'];
                $item_array = [//ເພີ່ມຂໍ້ມູນທີ່ຮັບມາຈາກຄີບອດເຂົ້າໄວ້ໃນຕົວປ່ຽນອາເລ $item_array
                    "pro_id" => $pro_id,
                    "img" => $img,
                    "pro_name" => $pro_name,
                    "unit_name" => $unit_name,
                    "cate_name" => $cate_name,
                    "brand_name" => $brand_name,
                    "size_name" => $size_name,
                    "qty" => $qty,
                    "price" => $price
                ];
                $cart_data[] = $item_array;//ເພີ່ມຂໍ້ມູນຈາກ $item_array ເຂົ້າໄປໃນ $cart_data
            }
            $item_data ="";
            $item_data = json_encode($cart_data);//ປັບ item_data ໃຫ້ມັນສິ້ນສຸດການຮັບຂໍ້ມູນຈາກ $cart_data
            setcookie('list_order',$item_data,time() + (86400 * 30));//ຕັ້ງຄ່າເວລາຄຸກກີ້
            echo"<script>";
            echo"window.location.href='Order';";
            echo"</script>";
        
        }
        else{
            echo"<script>";
            echo"window.location.href='Order?product=null';";
            echo"</script>";
        }
            
        
    }
    public static function clear_order(){
        setcookie("list_order","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
        echo"<script>";
        echo"window.location.href='Order';";
        echo"</script>";
    }
    public static function del_order($pro_id){
        $cookie_data = $_COOKIE['list_order'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
        $cart_data = json_decode($cookie_data, true);//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນອາເລໃນຮູບແບບ json
        foreach($cart_data as $keys => $values){//ຊອກຫາຄ່າໄອດີຢູ່ໃນອາເລ
            if($cart_data[$keys]['pro_id'] == $pro_id){//ຖ້າໄອດີຕົງກັນໃຫ້ລົບຂໍ້ມູນ
                unset($cart_data[$keys]);//ລົບຂໍ້ມູນຢູ່ຄຸກກີ້ໝົດແຖວທີ່ມີໄອດີຕົງກັນ
                $item_data = json_encode($cart_data);//ໃຫ້ຈົບການສ້າງອາເລໃນຮູບແບບ json
                setcookie('list_order',$item_data,time() + (86400 * 30));//ຕັ້ງເວລາຄຸກກີ້
                foreach($cart_data as $keys => $values){}
                if(!$cart_data[$keys]){
                    setcookie("list_order","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
                }
                echo"<script>";
                echo"window.location.href='Order';";
                echo"</script>";
            }
        }
    }
    public static function save_order($order_id,$emp_id,$sup_id){
        global $conn;
        if(isset($_COOKIE['list_order'])){//ກວດສອບວ່າຄຸກກີ້ order ນັ້ນມີຄ່າຫຼືບໍ່
            $result = mysqli_query($conn,"call insert_order('$order_id','$emp_id','$sup_id')");
            // mysqli_free_result($result);  
            // mysqli_next_result($conn);
            if(!$result){
                echo"<script>";
                echo"window.location.href='Order?save=fail';";
                echo"</script>";
            }
            else{
                $cookie_data = $_COOKIE['list_order'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
                $cart_data = json_decode($cookie_data, true);//Decode ຄ່າຄຸກກີ້ອອກມາໃຫ້ອ່ານຄ່າເປັນ Array ໄດ້ໃນຮູບແບບ json
                foreach($cart_data as $data){
                    $pro_id = $data['pro_id'];
                    $qty = $data['qty'];
                    $price = $data['price'];
                    $result2 = mysqli_query($conn,"call insert_order_detail('$pro_id','$qty','$price','$order_id')");
                    // mysqli_free_result($result2);  
                    // mysqli_next_result($conn);
                }
                if(!$result2){
                    echo"<script>";
                    echo"window.location.href='Order?save=fail';";
                    echo"</script>";
                }
                else{
                    setcookie("list_order","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
                    echo"<script>";
                    echo"window.location.href='Order?save2=success';";
                    echo"</script>";
                }
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='Order?list=null';";
            echo"</script>";
        }
    }
    public static function cookie_import($pro_id,$qty,$price,$remark){
        global $conn;
        $check_product = mysqli_query($conn,"select * from product where pro_id='$pro_id';");
        if(mysqli_num_rows($check_product) > 0){
            if(isset($_COOKIE['list_import'])){//ກວດສອບວ່າຄຸກກີ້ distribute_list ນັ້ນມີຄ່າຫຼືບໍ່
                $cookie_data = $_COOKIE['list_import'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
                $cart_data = json_decode($cookie_data, true);//Decode ຄ່າຄຸກກີ້ອອກມາໃຫ້ອ່ານຄ່າເປັນ Array ໄດ້ໃນຮູບແບບ json
            }
            else{
                $cart_data = array();//ຖ້າຄຸກກີ້ບໍ່ມີຄ່າຂໍ້ມູນແລ້ວຕັ້ງໂຕປ່ຽນໃຫ້ເປັນອາເລ
            }
            $item_id_list = array_column($cart_data,'pro_id');//ຕັ້ງຄ່າ serial ໃຫ້ມີຄ່າເທົ່າກັບ array $cart_data['code']
            if(in_array($pro_id,$item_id_list)){//ຖ້າວ່າໄອດີທີ່ປ້ອນມາທາງຄີບອດຕົງກັນກັບໄອດີທີ່ຢູ່ໃນ Array Cart_data ໃຫ້ເຮັດວຽກຈຸດນີ້
                foreach($cart_data as $keys => $values){//Loop ຂໍ້ມູນ cart_data ອອກມາເພື່ອຊອກຫາໄອດີທີ່ປ້ອນເຂົ້າມາກັບໄອດີທີ່ຢູ່ໃນ cart_data ທີ່ຕົງກັນ
                    if($cart_data[$keys]["pro_id"] == $pro_id){//ຖ້າຫາກວ່າຊອກຫາໄອດີທີຕົງກັນໄດ້ແລ້ວແມ່ນເຮັດວຽກດັ່ງນີ້
                        $cart_data[$keys]["qty"] = $cart_data[$keys]["qty"] + $qty;//ປັບໃຫ້ຈຳນວນຂອງ array cart_data ບວກໃຫ້ກັບຈຳນວນທີ່ປ້ອນເຂົ້າມາ
                    }
                }
            }
            else{ // ຖ້າວ່າໄອດີບໍ່ຕົງກັນໃຫ້ເພີ່ມຂໍ້ມູນເຂົ້າໃນຄຸກກີ້
                $getin = mysqli_query($conn,"SELECT pro_id,pro_name,qty,price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,qty_alert,img FROM product p LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE pro_id = '$pro_id';");
                $get_info = mysqli_fetch_array($getin,MYSQLI_ASSOC);
                $pro_name = $get_info['pro_name'];
                $cate_name = $get_info['cate_name'];
                $unit_name = $get_info['unit_name'];
                $brand_name = $get_info['brand_name'];
                $size_name = $get_info['size_name'];
                $img = $get_info['img'];
                $item_array = [//ເພີ່ມຂໍ້ມູນທີ່ຮັບມາຈາກຄີບອດເຂົ້າໄວ້ໃນຕົວປ່ຽນອາເລ $item_array
                    "pro_id" => $pro_id,
                    "img" => $img,
                    "pro_name" => $pro_name,
                    "unit_name" => $unit_name,
                    "cate_name" => $cate_name,
                    "brand_name" => $brand_name,
                    "size_name" => $size_name,
                    "qty" => $qty,
                    "price" => $price,
                    "remark" => $remark
                ];
                $cart_data[] = $item_array;//ເພີ່ມຂໍ້ມູນຈາກ $item_array ເຂົ້າໄປໃນ $cart_data
            }
            $item_data ="";
            $item_data = json_encode($cart_data);//ປັບ item_data ໃຫ້ມັນສິ້ນສຸດການຮັບຂໍ້ມູນຈາກ $cart_data
            setcookie('list_import',$item_data,time() + (86400 * 30));//ຕັ້ງຄ່າເວລາຄຸກກີ້
            echo"<script>";
            echo"window.location.href='Import';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Import?product=null';";
            echo"</script>";
        }
 
    }
    public static function select_import_cookie(){
        global $cart_data;
        if(isset($_COOKIE['list_import'])){//ຕອນໂຫຼດກວດສອບວ່າຄຸກກີ້ມີຄ່າວ່າງຫຼືບໍ່
            $cookie_data = $_COOKIE['list_import'];//ຕັ້ງຄຸກກີ້ໃຫ້ເປັນ string
            $cart_data = json_decode($cookie_data, true);// ຕັ້ງຄຸກກີ້ໃຫ້ເປັນຮູບແບບ json
        }
    }
    public static function clear_import(){
        setcookie("list_import","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
        echo"<script>";
        echo"window.location.href='Import';";
        echo"</script>";
    }
    public static function del_import($pro_id){
        $cookie_data = $_COOKIE['list_import'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
        $cart_data = json_decode($cookie_data, true);//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນອາເລໃນຮູບແບບ json
        foreach($cart_data as $keys => $values){//ຊອກຫາຄ່າໄອດີຢູ່ໃນອາເລ
            if($cart_data[$keys]['pro_id'] == $pro_id){//ຖ້າໄອດີຕົງກັນໃຫ້ລົບຂໍ້ມູນ
                unset($cart_data[$keys]);//ລົບຂໍ້ມູນຢູ່ຄຸກກີ້ໝົດແຖວທີ່ມີໄອດີຕົງກັນ
                $item_data = json_encode($cart_data);//ໃຫ້ຈົບການສ້າງອາເລໃນຮູບແບບ json
                setcookie('list_import',$item_data,time() + (86400 * 30));//ຕັ້ງເວລາຄຸກກີ້
                foreach($cart_data as $keys => $values){}
                if(!$cart_data[$keys]){
                    setcookie("list_import","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
                }
                echo"<script>";
                echo"window.location.href='Import';";
                echo"</script>";
            }
        }
    }
    public static function save_import($order_id,$emp_id,$sup_id,$import_no){
        global $conn;
        $check_order = mysqli_query($conn,"select * from orders where order_id='$order_id'");
        if(mysqli_num_rows($check_order) > 0){
            if(isset($_COOKIE['list_import'])){//ກວດສອບວ່າຄຸກກີ້ order ນັ້ນມີຄ່າຫຼືບໍ່
                $cookie_data = $_COOKIE['list_import'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
                $cart_data = json_decode($cookie_data, true);//Decode ຄ່າຄຸກກີ້ອອກມາໃຫ້ອ່ານຄ່າເປັນ Array ໄດ້ໃນຮູບແບບ json
                foreach($cart_data as $data){
                    $pro_id = $data['pro_id'];
                    $qty = $data['qty'];
                    $price = $data['price'];
                    $remark = $data['remark'];
                    // (imp_bill,order_id,sup_id,emp_id,pro_id,qty,price,remark)
                    $result2 = mysqli_query($conn,"call insert_import('$import_no','$order_id','$sup_id','$emp_id','$pro_id','$qty','$price','$remark')");
                    mysqli_free_result($result2);  
                    mysqli_next_result($conn);
                    $update_product = mysqli_query($conn,"update product set qty=qty+'$qty' where pro_id='$pro_id'");
                }
                if(!$result2){
                    echo"<script>";
                    echo"window.location.href='Import?save=fail';";
                    echo"</script>";
                }
                else{
                    setcookie("list_import","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
                    echo"<script>";
                    echo"window.location.href='Import?save2=success';";
                    echo"</script>";
                }
            
        }
        else{
            echo"<script>";
            echo"window.location.href='Import?list=null';";
            echo"</script>";
        }
        }
        else{
            echo"<script>";
            echo"window.location.href='Import?order=wrong';";
            echo"</script>";
        }
        
    }
    public static function select_broke($search){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultbroke;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultbroke = mysqli_query($conn,"call select_broke('$search');"); 
    }
    public static function select_broke_limit($search,$page){
        // method ຂອງການດຶງຂໍ້ມູນຕຳແໜ່ງມາສະແດງ
        global $resultbroke_limit;//ຕັ້ງໂຕປ່ຽນຢູ່ພາຍໃນ class ເອົາໄປໃຊ້ນອກ class
        global $conn; //ດຶງຕົວປ່ຽນພາຍນອກ class ມາໃຊ້
        $resultbroke_limit = mysqli_query($conn,"call select_broke_limit('$search','$page');"); 
    }
    public static function insert_broke($pro_id,$qty,$remark){
        global $conn;
        $check_product = mysqli_query($conn,"select * from product where pro_id='$pro_id'");
        if(mysqli_num_rows($check_product) > 0){
            $row = mysqli_fetch_array($check_product,MYSQLI_ASSOC);
            $price = $row["price"];
            $result = mysqli_query($conn,"call insert_broke('$pro_id','$qty','$price','$remark');");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Broke?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Broke?save2=success';";
                echo"</script>";
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='Broke?product=null';";
            echo"</script>";
        }
    }
    public static function update_broke($broke_id,$qty,$remark){
        global $conn;
        $result = mysqli_query($conn,"call update_broke('$broke_id','$qty','$remark')");
        if(!$result){
            echo"<script>";
            echo"window.location.href='Broke?update=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Broke?update2=success';";
            echo"</script>";
        }
    }
    public static function del_broke($broke_id){
        global $conn;
        $result = mysqli_query($conn,"call del_broke('$broke_id')");
        if(!$result){
            echo"<script>";
            echo"window.location.href='Broke?del=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Broke?del2=success';";
            echo"</script>";
        }
    }
    public static function select_sell_cookie(){
        global $cart_data;
        if(isset($_COOKIE['list_sell'])){//ຕອນໂຫຼດກວດສອບວ່າຄຸກກີ້ມີຄ່າວ່າງຫຼືບໍ່
            $cookie_data = $_COOKIE['list_sell'];//ຕັ້ງຄຸກກີ້ໃຫ້ເປັນ string
            $cart_data = json_decode($cookie_data, true);// ຕັ້ງຄຸກກີ້ໃຫ້ເປັນຮູບແບບ json
        }
    }
    public static function cookie_sell($pro_id,$qty){
        global $conn;
        if($qty == ""){
            $qty = 1;
        }
        $check_product = mysqli_query($conn,"select * from product where pro_id='$pro_id';");
        if(mysqli_num_rows($check_product) > 0){
            if(isset($_COOKIE['list_sell'])){//ກວດສອບວ່າຄຸກກີ້ distribute_list ນັ້ນມີຄ່າຫຼືບໍ່
                $cookie_data = $_COOKIE['list_sell'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
                $cart_data = json_decode($cookie_data, true);//Decode ຄ່າຄຸກກີ້ອອກມາໃຫ້ອ່ານຄ່າເປັນ Array ໄດ້ໃນຮູບແບບ json
            }
            else{
                $cart_data = array();//ຖ້າຄຸກກີ້ບໍ່ມີຄ່າຂໍ້ມູນແລ້ວຕັ້ງໂຕປ່ຽນໃຫ້ເປັນອາເລ
            }
            $item_id_list = array_column($cart_data,'pro_id');//ຕັ້ງຄ່າ serial ໃຫ້ມີຄ່າເທົ່າກັບ array $cart_data['code']
            if(in_array($pro_id,$item_id_list)){//ຖ້າວ່າໄອດີທີ່ປ້ອນມາທາງຄີບອດຕົງກັນກັບໄອດີທີ່ຢູ່ໃນ Array Cart_data ໃຫ້ເຮັດວຽກຈຸດນີ້
                foreach($cart_data as $keys => $values){//Loop ຂໍ້ມູນ cart_data ອອກມາເພື່ອຊອກຫາໄອດີທີ່ປ້ອນເຂົ້າມາກັບໄອດີທີ່ຢູ່ໃນ cart_data ທີ່ຕົງກັນ
                    if($cart_data[$keys]["pro_id"] == $pro_id){//ຖ້າຫາກວ່າຊອກຫາໄອດີທີຕົງກັນໄດ້ແລ້ວແມ່ນເຮັດວຽກດັ່ງນີ້
                        $new_qty = $cart_data[$keys]["qty"] + $qty;//ປັບໃຫ້ຈຳນວນຂອງ array cart_data ບວກໃຫ້ກັບຈຳນວນທີ່ປ້ອນເຂົ້າມາ
                    }
                }
                $check_qty = mysqli_fetch_array($check_product,MYSQLI_ASSOC);
                if($check_qty["qty"] < $new_qty){
                    echo"<script>";
                    echo"window.location.href='Sell?stock=orver';";
                    echo"</script>";
                }
                else{
                    $item_id_list2 = array_column($cart_data,'pro_id');//
                    if(in_array($pro_id,$item_id_list2)){//ຖ້າວ່າໄອດີທີ່ປ້ອນມາທາງຄີບອດຕົງກັນກັບໄອດີທີ່ຢູ່ໃນ Array Cart_data ໃຫ້ເຮັດວຽກຈຸດນີ້
                        foreach($cart_data as $keys2 => $values2){//Loop ຂໍ້ມູນ cart_data ອອກມາເພື່ອຊອກຫາໄອດີທີ່ປ້ອນເຂົ້າມາກັບໄອດີທີ່ຢູ່ໃນ cart_data ທີ່ຕົງກັນ
                            if($cart_data[$keys2]["pro_id"] == $pro_id){//ຖ້າຫາກວ່າຊອກຫາໄອດີທີຕົງກັນໄດ້ແລ້ວແມ່ນເຮັດວຽກດັ່ງນີ້
                                $cart_data[$keys2]["qty"] = $cart_data[$keys2]["qty"] + $qty;//ປັບໃຫ້ຈຳນວນຂອງ array cart_data ບວກໃຫ້ກັບຈຳນວນທີ່ປ້ອນເຂົ້າມາ
                            }
                        }
                        echo"<script>";
                        echo"window.location.href='Sell';";
                        echo"</script>";
                    }
                }
            }

            else{ // ຖ້າວ່າໄອດີບໍ່ຕົງກັນໃຫ້ເພີ່ມຂໍ້ມູນເຂົ້າໃນຄຸກກີ້
                $getin = mysqli_query($conn,"SELECT pro_id,pro_name,qty,price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,qty_alert,img FROM product p LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE pro_id = '$pro_id';");
                $get_info = mysqli_fetch_array($getin,MYSQLI_ASSOC);
                $pro_name = $get_info['pro_name'];
                $price = $get_info['price'];
                $cate_name = $get_info['cate_name'];
                $unit_name = $get_info['unit_name'];
                $brand_name = $get_info['brand_name'];
                $size_name = $get_info['size_name'];
                $img = $get_info['img'];
                $item_array = [//ເພີ່ມຂໍ້ມູນທີ່ຮັບມາຈາກຄີບອດເຂົ້າໄວ້ໃນຕົວປ່ຽນອາເລ $item_array
                    "pro_id" => $pro_id,
                    "img" => $img,
                    "pro_name" => $pro_name,
                    "unit_name" => $unit_name,
                    "cate_name" => $cate_name,
                    "brand_name" => $brand_name,
                    "size_name" => $size_name,
                    "qty" => $qty,
                    "price" => $price
                ];
                $cart_data[] = $item_array;//ເພີ່ມຂໍ້ມູນຈາກ $item_array ເຂົ້າໄປໃນ $cart_data
            }
            $item_data ="";
            $item_data = json_encode($cart_data);//ປັບ item_data ໃຫ້ມັນສິ້ນສຸດການຮັບຂໍ້ມູນຈາກ $cart_data
            setcookie('list_sell',$item_data,time() + (86400 * 30));//ຕັ້ງຄ່າເວລາຄຸກກີ້
            echo"<script>";
            echo"window.location.href='Sell';";
            echo"</script>";
        
        }
        else{
            echo"<script>";
            echo"window.location.href='Sell?product=null';";
            echo"</script>";
        }
    }
    public static function del_sell($pro_id){
        $cookie_data = $_COOKIE['list_sell'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
        $cart_data = json_decode($cookie_data, true);//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນອາເລໃນຮູບແບບ json
        foreach($cart_data as $keys => $values){//ຊອກຫາຄ່າໄອດີຢູ່ໃນອາເລ
            if($cart_data[$keys]['pro_id'] == $pro_id){//ຖ້າໄອດີຕົງກັນໃຫ້ລົບຂໍ້ມູນ
                unset($cart_data[$keys]);//ລົບຂໍ້ມູນຢູ່ຄຸກກີ້ໝົດແຖວທີ່ມີໄອດີຕົງກັນ
                $item_data = json_encode($cart_data);//ໃຫ້ຈົບການສ້າງອາເລໃນຮູບແບບ json
                setcookie('list_sell',$item_data,time() + (86400 * 30));//ຕັ້ງເວລາຄຸກກີ້
                foreach($cart_data as $keys => $values){}
                if(!$cart_data[$keys]){
                    setcookie("list_sell","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
                }
                echo"<script>";
                echo"window.location.href='Sell';";
                echo"</script>";
            }
        }
    }
    public static function get_sell(){
        global $conn;
        global $sell;
        $sell = "";
        $result_sell = mysqli_query($conn,"call get_sell();");
        if(mysqli_num_rows($result_sell) > 0){
            $row_sell = mysqli_fetch_array($result_sell, MYSQLI_ASSOC);
            $sell = (int)$row_sell['sell_id'] + 1;
            $sell = sprintf("%06s",$sell);
        }
        else{
            $sell = "000001";
        }
        mysqli_free_result($result_sell);  
        mysqli_next_result($conn);
    }
    public static function save_sell($sell_id,$emp_id,$cus_id,$stt_id,$type_pay,$sell_type,$img,$getmoney){
        global $conn;
        global $path;
        if(isset($_COOKIE['list_sell'])){//ກວດສອບວ່າຄຸກກີ້ order ນັ້ນມີຄ່າຫຼືບໍ່
            if($img == ""){
                $Pro_image = "";
            }
            else{
                $ext = pathinfo(basename($_FILES['img']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'Mix_'.uniqid().".".$ext;
                $image_path = $path.'image/';
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['img']['tmp_name'], $upload_path);
                $Pro_image = $new_image_name;
            }
            if($getmoney == ""){
                $getmoney = 0;
            }
            $result = mysqli_query($conn,"call insert_sell('$sell_id','$emp_id','$cus_id','$stt_id','$type_pay','$sell_type','$Pro_image','1','1','$getmoney')");
            // mysqli_free_result($result);  
            // mysqli_next_result($conn);
            if(!$result){
                echo"<script>";
                echo"window.location.href='Sell?save=fail';";
                echo"</script>";
            }
            else{
                $cookie_data = $_COOKIE['list_sell'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
                $cart_data = json_decode($cookie_data, true);//Decode ຄ່າຄຸກກີ້ອອກມາໃຫ້ອ່ານຄ່າເປັນ Array ໄດ້ໃນຮູບແບບ json
                foreach($cart_data as $data){
                    $pro_id = $data['pro_id'];
                    $qty = $data['qty'];
                    $price = $data['price'];
                    $result2 = mysqli_query($conn,"call insert_selldetail('$pro_id','$qty','$price','$sell_id')");
                    mysqli_free_result($result2);  
                    mysqli_next_result($conn);
                    $update_stokc = mysqli_query($conn,"update product set qty=qty-'$qty' where pro_id='$pro_id'");
                }
                if(!$result2){
                    echo"<script>";
                    echo"window.location.href='Sell?save=fail';";
                    echo"</script>";
                }
                else{
                    setcookie("list_sell","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
                    echo"<script>";
                    echo"window.location.href='Bill?billno=$sell_id';";
                    echo"</script>";
                }
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='Sell?list=null';";
            echo"</script>";
        }
    }
    public static function bill($bill){
        global $conn;
        global $result_bill;
        $result_bill = mysqli_query($conn,"call select_bill('$bill')");
    }
    public static function billdetail($bill){
        global $conn;
        global $result_billdetail;
        $result_billdetail = mysqli_query($conn,"call select_billdetail('$bill')");
    }
    public static function report_sell_limit($date1,$date2,$page){
        global $conn;
        global $result_report_sell_limit;
        $result_report_sell_limit = mysqli_query($conn,"call report_sell_limit('$date1','$date2','$page')");
    }
    public static function report_sell($date1,$date2){
        global $conn;
        global $result_report_sell;
        $result_report_sell = mysqli_query($conn,"call report_sell('$date1','$date2')");
    }
    public static function report_order_limit($date1,$date2,$page){
        global $conn;
        global $result_report_order_limit;
        $result_report_order_limit = mysqli_query($conn,"call report_order_limit('$date1','$date2','$page')");
    }
    public static function report_order($date1,$date2){
        global $conn;
        global $result_report_order;
        $result_report_order = mysqli_query($conn,"call report_order('$date1','$date2')");
    }
    public static function bill_order($id){
        global $conn;
        global $result_bill_order;
        $result_bill_order = mysqli_query($conn,"call bill_order('$id')");
    }
    public static function report_orderdetail($id){
        global $conn;
        global $result_report_orderdetail;
        $result_report_orderdetail = mysqli_query($conn,"call report_orderdetail('$id')");
    }
}
$obj = new obj();
?>