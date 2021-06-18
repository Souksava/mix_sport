<?php
 include ('connect.php');
date_default_timezone_set("Asia/Bangkok");
$datenow = time();
$Date = date("Y-m-d",$datenow);
$Time = date("H:i:s",$datenow);
class obj{
    public $conn;
    public $search;
    public static function login($email,$pass){
        global $conn;
        // $password = "') or '1'='1';");//";
        session_start();
        $pass = md5($pass);
        $resultck = mysqli_query($conn, "call login('$email','$pass')");
        if($email == "")
        {
            echo"<script>";
            echo"window.location.href='Login?email=null';";
            echo"</script>";
        }
        else if($pass == "")
        {
            echo"<script>";
            echo"window.location.href='Login?pass=null';";
            echo"</script>";
        }
        else if(!mysqli_num_rows($resultck))
        {
            echo"<script>";
            echo"window.location.href='Login?login=false';";
            echo"</script>";
        }
        else 
        {
            if(mysqli_num_rows($resultck) <= 0){
                echo"<meta http-equiv-'refress' content='1;URL=/'>";
            }
            else{
               
                while($user = mysqli_fetch_array($resultck))
                {
                    if($user['status'] == 1)
                    {
                        $_SESSION['mixsport_ses_id'] = session_id();
                        $_SESSION['emp_id'] = $user['emp_id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['emp_name'] = $user['emp_name'];
                        $_SESSION['img_path'] = $user['profile'];
                        $_SESSION['mixsport_ses_status_id'] = 1;
                        echo"<meta http-equiv='refresh' content='1;URL=Admin/Main'>";
                    }
                    else if($user['status'] == 2)
                    {
                        $_SESSION['mixsport_ses_id'] = session_id();
                        $_SESSION['emp_id'] = $user['emp_id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['emp_name'] = $user['emp_name'];
                        $_SESSION['img_path'] = $user['profile'];
                        $_SESSION['mixsport_ses_status_id'] = 2;
                        echo"<meta http-equiv='refresh' content='1;URL=User/Main'>";
                    }
                    else
                    {
                        $_SESSION['mixsport_ses_id'] = session_id();
                        session_start();
                        unset($_SESSION['mixsport_ses_id']);
                        unset($_SESSION['emp_id']);
                        unset($_SESSION['email']);
                        unset($_SESSION['emp_name']);
                        unset($_SESSION['img_path']);
                        unset($_SESSION['mixsport_ses_status_id']);
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
        session_start();
        unset($_SESSION['mixsport_ses_id']);
        unset($_SESSION['emp_id']);
        unset($_SESSION['email']);
        unset($_SESSION['emp_name']);
        unset($_SESSION['img_path']);
        unset($_SESSION['mixsport_ses_status_id']);
        session_destroy();
        global $session_path;
        echo"<script>";
        echo"window.location.href='$session_path';";
        echo"</script>";
    }
    public static function customer_logout(){
        session_start();
        unset($_SESSION['mixsport_customer_ses_id']);
        unset($_SESSION['cus_id']);
        unset($_SESSION['cus_name']);
        unset($_SESSION['email']);
        session_destroy();
        echo"<script>";
        echo"window.location.href='index';";
        echo"</script>";
    }

    public static function customer_login($email,$pass){
        global $conn;
        // $password = "') or '1'='1';");//";
        session_start();
        $pass = md5($pass);
        $resultck = mysqli_query($conn, "call customer_login('$email','$pass')");
        if($email == "")
        {
            echo"<script>";
            echo"window.location.href='Signin?email=null';";
            echo"</script>";
        }
        else if($pass == "")
        {
            echo"<script>";
            echo"window.location.href='Signin?pass=null';";
            echo"</script>";
        }
        else if(!mysqli_num_rows($resultck))
        {
            echo"<script>";
            echo"window.location.href='Signin?login=false';";
            echo"</script>";
        }
        else 
        {
            if(mysqli_num_rows($resultck) <= 0){
                echo"<meta http-equiv-'refress' content='1;URL=/'>";
            }
            else{
               
                while($user = mysqli_fetch_array($resultck))
                {
                        // unset($_SESSION['mixsport_customer_ses_id']);
                        // unset($_SESSION['cus_id']);
                        // unset($_SESSION['cus_name']);
                        // unset($_SESSION['email']);
                        // session_destroy();
                        $_SESSION['mixsport_customer_ses_id'] = session_id();
                        $_SESSION['cus_id'] = $user['cus_id'];
                        $_SESSION['cus_name'] = $user['cus_name'];
                        $_SESSION['email'] = $user['email'];
                        echo"<meta http-equiv='refresh' content='1;URL=index'>";
                    

                }
            }
        }  
    }
    public static function customer_register($cus_name,$surname,$gender,$email,$pass){
        global $conn;
        session_start();
        $checkemail = mysqli_query($conn,"select * from customer where email='$email'");
        if($cus_name == ""){
            echo"<script>";
            echo"window.location.href='Signin?cusname=null';";
            echo"</script>";
        }
        else if($surname == ""){
            echo"<script>";
            echo"window.location.href='Signin?surname=null';";
            echo"</script>";
        }
        else if($gender == ""){
            echo"<script>";
            echo"window.location.href='Signin?gender=null';";
            echo"</script>";
        }
        else if($email == ""){
            echo"<script>";
            echo"window.location.href='Signin?email=null';";
            echo"</script>";
        }
        else if($pass == ""){
            echo"<script>";
            echo"window.location.href='Signin?pass=null';";
            echo"</script>";
        }
        else if(mysqli_num_rows($checkemail) > 0){
            echo"<script>";
            echo"window.location.href='Signin?email=same';";
            echo"</script>";
        }
        else{
            $result = mysqli_query($conn,"call customer_register('$cus_name','$surname','$gender','$email','$pass')");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Signin?register=fail';";
                echo"</script>";
            }
            else{
                $get_cus = mysqli_query($conn,"select * from customer where email='$email'");
                $row = mysqli_fetch_array($get_cus,MYSQLI_ASSOC);
                $_SESSION['mixsport_customer_ses_id'] = session_id();
                $_SESSION['cus_id'] = $row['cus_id'];
                $_SESSION['cus_name'] = $row['cus_name'];
                $_SESSION['email'] = $row['email'];
                echo"<script>";
                echo"window.location.href='Cart';";
                echo"</script>";
            }

        }

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
    public static function customer_alert_bill($cus_id){
        global $conn;
        global $alert;
        $alert = "";
        $result = mysqli_query($conn,"call customer_alert_bill('$cus_id');");
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $alert = $row['alert'];
        }
        else{
            $alert = "0";
        }
        mysqli_free_result($result);  
        mysqli_next_result($conn);
    }
    public static function save_sell($sell_id,$emp_id,$cus_id,$stt_id,$type_pay,$sell_type,$img,$getmoney){
        global $conn;
        global $path;
        if(isset($_COOKIE['list_sell'])){//ກວດສອບວ່າຄຸກກີ້ order ນັ້ນມີຄ່າຫຼືບໍ່
            $cookie_data_check_stokc = $_COOKIE['list_sell'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
            $cart_data_check_stock = json_decode($cookie_data_check_stokc, true);//Decode ຄ່າຄຸກກີ້ອອກມາໃຫ້ອ່ານຄ່າເປັນ Array ໄດ້ໃນຮູບແບບ json
            foreach($cart_data_check_stock as $check_stock){
                $check_pro_id = $check_stock['pro_id'];
                $check_pro_name = trim($check_stock['pro_name']);
                $check_qty = $check_stock['qty'];
                $check = mysqli_query($conn,"select * from product where pro_id='$check_pro_id'");
                $db_qty = mysqli_fetch_array($check,MYSQLI_ASSOC);
                if($check_qty > $db_qty['qty']){
                    echo"<script>";
                    echo"window.location.href='Sell?stock=over&&msg=$check_pro_name&&productid=$check_pro_id';";
                    echo"</script>";
                    $i = true;
                    break;        
                }
            }
            if($i == true){

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
        }
        else{
            echo"<script>";
            echo"window.location.href='Sell?list=null';";
            echo"</script>";
        }
    }
    public static function custoemr_order($sell_id,$emp_id,$cus_id,$stt_id,$type_pay,$sell_type,$img_path,$remark,$whatsapp,$tel,$address){
        global $conn;
        $path = "";
         if($tel == ""){
            echo"<script>";
            echo"window.location.href='Checkout?tel=null';";
            echo"</script>";
        }
        else if($address == ""){
            echo"<script>";
            echo"window.location.href='Checkout?address=null';";
            echo"</script>";
        }
        else{
            if(isset($_COOKIE["list_cart"])){
            $cookie_data_check_stokc = $_COOKIE['list_cart'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
            $cart_data_check_stock = json_decode($cookie_data_check_stokc, true);//Decode ຄ່າຄຸກກີ້ອອກມາໃຫ້ອ່ານຄ່າເປັນ Array ໄດ້ໃນຮູບແບບ json
            foreach($cart_data_check_stock as $check_stock){
                $check_pro_id = $check_stock['pro_id'];
                $check_pro_name = trim($check_stock['pro_name']);
                $check_qty = $check_stock['qty'];
                $check = mysqli_query($conn,"select * from product where pro_id='$check_pro_id'");
                $db_qty = mysqli_fetch_array($check,MYSQLI_ASSOC);
                if($check_qty > $db_qty['qty']){
                    echo"<script>";
                    echo"window.location.href='Checkout?stock=over&&msg=$check_pro_name';";
                    echo"</script>";
                    $i = true;
                    break;        
                }
            }
                if($i == true){

                }
                else{
                        if($img_path == ""){
                            $Pro_image = "";
                        }
                        else{
                            $ext = pathinfo(basename($_FILES['img_path']['name']), PATHINFO_EXTENSION);
                            $new_image_name = 'Mix_'.uniqid().".".$ext;
                            $image_path = $path.'Administrator/image/';
                            $upload_path = $image_path.$new_image_name;
                            move_uploaded_file($_FILES['img_path']['tmp_name'], $upload_path);
                            $Pro_image = $new_image_name;
                        }
                        $result = mysqli_query($conn,"insert into sell(sell_id,emp_id,cus_id,stt_id,type_pay,sell_type,img_path,remark,seen1,seen2) values('$sell_id','$emp_id','$cus_id','$stt_id','$type_pay','$sell_type','$Pro_image','$remark','0','0')");
                        // mysqli_free_result($result);  
                        // mysqli_next_result($conn);
                        if(!$result){
                            echo"<script>";
                            echo"window.location.href='Checkout?save=fail';";
                            echo"</script>";
                        }
                        else{
                            $cookie_data = $_COOKIE['list_cart'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
                            $cart_data = json_decode($cookie_data, true);//Decode ຄ່າຄຸກກີ້ອອກມາໃຫ້ອ່ານຄ່າເປັນ Array ໄດ້ໃນຮູບແບບ json
                            foreach($cart_data as $data){
                                $pro_id = $data['pro_id'];
                                $qty = $data['qty'];
                                $price = $data['price'];
                                $result2 = mysqli_query($conn,"insert into selldetail(pro_id,qty,price,sell_id) values('$pro_id','$qty','$price','$sell_id')");
                                $update_stokc = mysqli_query($conn,"update product set qty=qty-'$qty' where pro_id='$pro_id'");
                            }
                            if(!$result2){
                                echo"<script>";
                                echo"window.location.href='Checkout?save=fail';";
                                echo"</script>";
                            }
                            else{
                                $update_customer = mysqli_query($conn,"update customer set whatsapp='$whatsapp',tel='$tel',address='$address' where cus_id='$cus_id'");
                                setcookie("list_cart","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
                                echo"<script>";
                                echo"window.location.href='Cart?save=success';";
                                echo"</script>";
                            }
                        }
                    }
                }
                else{
                    echo"<script>";
                    echo"window.location.href='Checkout?list=null';";
                    echo"</script>";
                }

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
    public static function web_order_limit($page){
        global $conn;
        global $result_web_order_limit;
        $result_web_order_limit = mysqli_query($conn,"call web_order_limit('$page')");
    }
    public static function web_order(){
        global $conn;
        global $result_web_order;
        $result_web_order = mysqli_query($conn,"call web_order()");
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
    public static function report_reserv_limit($date1,$date2,$page){
        global $conn;
        global $result_report_reserv_limit;
        $result_report_reserv_limit = mysqli_query($conn,"call report_reserv_limit('$date1','$date2','$page')");
    }
    public static function report_reserv($date1,$date2){
        global $conn;
        global $result_reserv_sell;
        $result_reserv_sell = mysqli_query($conn,"call report_reserv('$date1','$date2')");
    }
    public static function report_revenue_limit($date1,$date2,$page){
        global $conn;
        global $result_revenue_limit;
        $result_revenue_limit = mysqli_query($conn,"call select_revenue_limit('$date1','$date2','$page')");
    }
    public static function report_revenue($date1,$date2){
        global $conn;
        global $result_revenue;
        $result_revenue = mysqli_query($conn,"call select_revenue('$date1','$date2')");
    }
    public static function report_pay_limit($date1,$date2,$page){
        global $conn;
        global $result_pay_limit;
        $result_pay_limit = mysqli_query($conn,"call report_pay_limit('$date1','$date2','$page')");
    }
    public static function report_pay($date1,$date2){
        global $conn;
        global $result_pay;
        $result_pay = mysqli_query($conn,"call report_pay('$date1','$date2')");
    }
    public static function select_employee_limit($search,$page){
        global $conn;
        global $result_employee_limit;
        $result_employee_limit = mysqli_query($conn,"call select_employee_limit('$search','$page')");
    }
    public static function select_employee($search){
        global $conn;
        global $result_employee;
        $result_employee = mysqli_query($conn,"call select_employee('$search')");
    }
    public static function insert_employee($name,$surname,$gender,$tel,$address,$email,$pass,$status,$img_path){//method ທີ່ໃຊ້ໃນການໃນການບັນທຶກຂໍ້ມູນພະນັກງານ
        global $conn;
        global $path;
        $check_email = mysqli_query($conn,"select * from employee where email='$email'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
        $check_pass = mysqli_query($conn,"select * from employee where pass='$pass'");//ກວດສອບວ່າລະຫັດນີ້ມີແລ້ວ ຫຼື ຍັງ
        if(mysqli_num_rows($check_email) > 0){
            echo"<script>";
            echo"window.location.href='Employee?email=same';";
            echo"</script>";
        }
        else if(mysqli_num_rows($check_pass) > 0){
            echo"<script>";
            echo"window.location.href='Employee?pass=same';";
            echo"</script>";
        }
        else{
            if($img_path == ""){//ກວດສອບຄ່າຟາຍຮູບມາວ່າເປັນຄ່າວ່າງ ຫຼື ບໍ່
                $Pro_image = '';
            }
            else{//ຖ້າຄ່າຟາຍຮູບບໍ່ເປັນຄ່າວ່າງໃຫ້ເຮັດວຽກໃນຈຸດນີ້
                $ext = pathinfo(basename($_FILES['profile']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'Mix_'.uniqid().".".$ext;
                $image_path = $path.'image/';
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['profile']['tmp_name'], $upload_path);
                $Pro_image = $new_image_name;
            }
            $result = mysqli_query($conn,"call insert_employee('$name','$surname','$gender','$tel','$address','$email','$pass','$status','$Pro_image')");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Employee?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Employee?save2=success';";
                echo"</script>";
            }
        }
    }
    public static function del_employee($id){
        global $conn;
        global $path;
        $check_order = mysqli_query($conn,"select * from orders where emp_id='$id';");
        $check_import = mysqli_query($conn,"select * from orders where emp_id='$id';");
        $check_selldetail = mysqli_query($conn,"select * from sell where emp_id='$id';");
        if(mysqli_num_rows($check_order) > 0){
            echo"<script>";
            echo"window.location.href='Employee?order=has';";
            echo"</script>";
        }
        else if(mysqli_num_rows($check_import) > 0){
            echo"<script>";
            echo"window.location.href='Employee?import=has';";
            echo"</script>";
        }
        else if(mysqli_num_rows($check_selldetail) > 0){
            echo"<script>";
            echo"window.location.href='Employee?sell=has';";
            echo"</script>";
        }
        else if($id == 7){
            echo"<script>";
            echo"window.location.href='Employee?employeeid=reservation';";
            echo"</script>";
        }
        else{
            $get_img = mysqli_query($conn,"select profile from employee where emp_id='$id'");
            $data = mysqli_fetch_array($get_img, MYSQLI_ASSOC);
            $path2 = $path.'image/'.$data['profile'];
            if(file_exists($path2) && !empty($data['profile'])){
                unlink($path2);        
            }
            $result = mysqli_query($conn,"call del_employee('$id');");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Employee?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Employee?del2=success';";
                echo"</script>";
            }
        }
    }
    public static function update_employee($emp_id,$name,$surname,$gender,$tel,$address,$email,$pass,$status,$img_path){
        global $conn;
        global $path;
        $flag = preg_match('/^[a-f0-9]{32}$/', $pass);
        if($flag){ // flag true means string is a valid md5 encrypation
            echo"";
        }else{
            $pass = md5($pass);
        }

        $resultmp = mysqli_query($conn,"select * from employee where emp_id='$emp_id'");//ດຶງຄ່າອີເມວ ແລະ ລະຫັດຜ່ານ ໂດຍໃຊ້ໄອດີພະນັກງານ
        $rowmp = mysqli_fetch_array($resultmp,MYSQLI_ASSOC);
        $get_img = mysqli_query($conn, "select profile from employee where emp_id='$emp_id'");
        $data = mysqli_fetch_array($get_img,MYSQLI_ASSOC);
        if($email == $rowmp['email'] && $pass == $rowmp['pass']){//ຖ້າອີເມວ ແລະ ລະຫັດຜ່ານທັງ 2 ຄືກັນກັບອີເມວ ແລະ ລະຫັດຜ່ານຂອງລະໄອດີພະນັກງານ ແມ່ນທຳການອັບເດດຂໍ້ມູນ
            if($img_path == ""){//ກວດສອບຄ່າຟາຍຮູບມາວ່າເປັນຄ່າວ່າງ ຫຼື ບໍ່
                $Pro_image = $data['profile'];
            }
            else{//ຖ້າຄ່າຟາຍຮູບບໍ່ເປັນຄ່າວ່າງໃຫ້ເຮັດວຽກໃນຈຸດນີ້
                $ext = pathinfo(basename($_FILES['profile2']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'Mix_'.uniqid().".".$ext;
                $image_path = $path.'image/';
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['profile2']['tmp_name'], $upload_path);
                $Pro_image = $new_image_name;
                // $path2 = __DIR__.DIRECTORY_SEPARATOR.$image_path.DIRECTORY_SEPARATOR.$data['img_path']; //cant find path
                $path2 = $image_path.$data['profile'];
                if(file_exists($path2) && !empty($data['profile'])){
                    unlink($path2);                  
                }
            }
            $result = mysqli_query($conn,"call update_employee('$emp_id','$name','$surname','$gender','$tel','$address','$email','$pass','$status','$Pro_image')");
            // $result = mysqli_query($conn,"update employee set emp_name='$name',emp_surname='$surname',gender='$gender',tel='$tel',address='$address',email='$email',pass='$pass',auther_id='$auther_id',stt_id='$sttid',img_path='$Pro_image' where emp_id ='$emp_id'");
            if(!$result){
                echo"<script>";
                echo"window.location.href='Employee?update=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Employee?update2=success';";
                echo"</script>";
            }
        }
        else{//ຖ້າວ່າອີເມວ ແລະ ລະຫັດຜ່ານ ບໍ່ຄືກັນກັບໄອດີພະນັກງານແມ່ນໃຫ້ເຮັດວຽກໃນຈຸດນີ້
            if($email != $rowmp['email'] || $pass != $rowmp['pass']){
                $check_email = mysqli_query($conn,"select * from employee where email='$email';");//ກວດສອບອີເມວທີ່ປ້ອນເຂົ້າມາວ່າມີບໍ່
                $check_pass = mysqli_query($conn,"select * from employee where pass='$pass';");//ກວດສອບລະຫັດຜ່ານທີ່ປ້ອນເຂົ້າມາວ່າມີບໍ່
                if(mysqli_num_rows($check_email) > 0){//ຖ້າອີມວທີ່ປ້ອນເຂົ້າມານັ້ນມີຄົນໃຊ້ແລ້ວໃຫ້ກວດລະຫັດເຂົ້າສູ່ລະບົບ
                    if(mysqli_num_rows($check_pass) > 0){//ຖ້າລະຫັດຜ່ານ ຫຼື ອີເມວຄືກັນກັບຄົນອື່ນແມ່ນໃຫ້ເຮັດວຽກໜ້ານີ້
                        echo"<script>";
                        echo"window.location.href='Employee?mp=same';";
                        echo"</script>";
                    }
                    else{//ຖ້າອີເມວຄືກັນ ແຕ່ລະຫັດຜ່ານແຕກຕ່າງໃຫ້ທຳການອັບເດດ
                        if($img_path == ""){//ກວດສອບຄ່າຟາຍຮູບມາວ່າເປັນຄ່າວ່າງ ຫຼື ບໍ່
                            $Pro_image = $data['profile'];
                        }
                        else{//ຖ້າຄ່າຟາຍຮູບບໍ່ເປັນຄ່າວ່າງໃຫ້ເຮັດວຽກໃນຈຸດນີ້
                            $ext = pathinfo(basename($_FILES['profile2']['name']), PATHINFO_EXTENSION);
                            $new_image_name = 'Mix_'.uniqid().".".$ext;
                            $image_path = $path.'image/';
                            $upload_path = $image_path.$new_image_name;
                            move_uploaded_file($_FILES['profile2']['tmp_name'], $upload_path);
                            $Pro_image = $new_image_name;
                            $path2 = $image_path.$data['profile'];
                            if(file_exists($path2) && !empty($data['profile'])){
                                unlink($path2);
                                
                            }
                        }
                        $result = mysqli_query($conn,"call update_employee('$emp_id','$name','$surname','$gender','$tel','$address','$email','$pass','$status','$Pro_image')");
                        if(!$result){
                            echo"<script>";
                            echo"window.location.href='Employee?update=fail';";
                            echo"</script>";
                        }
                        else{
                            echo"<script>";
                            echo"window.location.href='Employee?update2=success';";
                            echo"</script>";
                        }
                    }
                }
                else if(mysqli_num_rows($check_pass) > 0){//ຖ້າລະຫັດຜ່ານທີ່ປ້ອນເຂົ້າມານັ້ນມີຄົນໃຊ້ແລ້ວໃຫ້ກວດສອບອີເມວ
                    if(mysqli_num_rows($check_email) > 0){//ຖ້າອີເມວ ຫຼື ລະຫັດຜ່ານຄືກັນກັບຂອງຄົນອື່ນແມ່ນໃຫ້ເຮັດວຽກໜ້ານີ້
                        echo"<script>";
                        echo"window.location.href='Employee?mp=same';";
                        echo"</script>";
                    }
                    else{
                        if($img_path == ""){//ກວດສອບຄ່າຟາຍຮູບມາວ່າເປັນຄ່າວ່າງ ຫຼື ບໍ່
                            $Pro_image = $data['profile'];
                        }
                        else{//ຖ້າຄ່າຟາຍຮູບບໍ່ເປັນຄ່າວ່າງໃຫ້ເຮັດວຽກໃນຈຸດນີ້
                            $ext = pathinfo(basename($_FILES['profile2']['name']), PATHINFO_EXTENSION);
                            $new_image_name = 'Mix_'.uniqid().".".$ext;
                            $image_path = $path.'image/';
                            $upload_path = $image_path.$new_image_name;
                            move_uploaded_file($_FILES['profile2']['tmp_name'], $upload_path);
                            $Pro_image = $new_image_name;
                            $path2 = $image_path.$data['profile'];
                            if(file_exists($path2) && !empty($data['profile'])){
                                unlink($path2);
                                
                            }
                        }
                        $result = mysqli_query($conn,"call update_employee('$emp_id','$name','$surname','$gender','$tel','$address','$email','$pass','$status','$Pro_image')");
                        if(!$result){
                            echo"<script>";
                            echo"window.location.href='Employee?update=fail';";
                            echo"</script>";
                        }
                        else{
                            echo"<script>";
                            echo"window.location.href='Employee?update2=success';";
                            echo"</script>";
                        }
                    }
                }
                else{//ກໍລະນີທີ່ອີເມວ ແລະ ລະຫັດຜ່ານບໍ່ຄືໃຜເລີຍແມ່ນໃຫ້ເຮັດວຽກໃນຈຸດນີ້
                    if($img_path == ""){//ກວດສອບຄ່າຟາຍຮູບມາວ່າເປັນຄ່າວ່າງ ຫຼື ບໍ່
                        $Pro_image = $data['profile'];
                    }
                    else{//ຖ້າຄ່າຟາຍຮູບບໍ່ເປັນຄ່າວ່າງໃຫ້ເຮັດວຽກໃນຈຸດນີ້
                        $ext = pathinfo(basename($_FILES['profile2']['name']), PATHINFO_EXTENSION);
                        $new_image_name = 'Mix_'.uniqid().".".$ext;
                        $image_path = $path.'image/';
                        $upload_path = $image_path.$new_image_name;
                        move_uploaded_file($_FILES['profile2']['tmp_name'], $upload_path);
                        $Pro_image = $new_image_name;
                        $path2 = $image_path.$data['profile'];
                        if(file_exists($path2) && !empty($data['profile'])){
                            unlink($path2);
                            
                        }
                    }
                    $result = mysqli_query($conn,"call update_employee('$emp_id','$name','$surname','$gender','$tel','$address','$email','$pass','$status','$Pro_image')");
                    if(!$result){
                        echo"<script>";
                        echo"window.location.href='Employee?update=fail';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"window.location.href='Employee?update2=success';";
                        echo"</script>";
                    }
                }
            }
        }
    }
    // Cookie Cart
    public static function select_cart_cookie(){
        global $cart_data;
        if(isset($_COOKIE['list_cart'])){//ຕອນໂຫຼດກວດສອບວ່າຄຸກກີ້ມີຄ່າວ່າງຫຼືບໍ່
            $cookie_data = $_COOKIE['list_cart'];//ຕັ້ງຄຸກກີ້ໃຫ້ເປັນ string
            $cart_data = json_decode($cookie_data, true);// ຕັ້ງຄຸກກີ້ໃຫ້ເປັນຮູບແບບ json
        }
    }
    public static function cookie_cart($pro_id,$qty){
        global $conn;
        $check_product = mysqli_query($conn,"select * from product where pro_id='$pro_id';");
        if(mysqli_num_rows($check_product) > 0){
            if(isset($_COOKIE['list_cart'])){//ກວດສອບວ່າຄຸກກີ້ distribute_list ນັ້ນມີຄ່າຫຼືບໍ່
                $cookie_data = $_COOKIE['list_cart'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
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
                echo"window.location.href='Cart';";
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
                $price = $get_info['price'];
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
            setcookie('list_cart',$item_data,time() + (86400 * 30));//ຕັ້ງຄ່າເວລາຄຸກກີ້
            echo"<script>";
            echo"window.location.href='Cart';";
            echo"</script>";
        
        }
        else{
            echo"<script>";
            echo"window.location.href='Cart?product=null';";
            echo"</script>";
        }
            
        
    }
    public static function clear_cart(){
        setcookie("list_cart","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
        echo"<script>";
        echo"window.location.href='Cart';";
        echo"</script>";
    }
    public static function del_cart($pro_id){
        $cookie_data = $_COOKIE['list_cart'];//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນ String
        $cart_data = json_decode($cookie_data, true);//ຕັ້ງຄ່າຄຸກກີ້ໃຫ້ເປັນອາເລໃນຮູບແບບ json
        foreach($cart_data as $keys => $values){//ຊອກຫາຄ່າໄອດີຢູ່ໃນອາເລ
            if($cart_data[$keys]['pro_id'] == $pro_id){//ຖ້າໄອດີຕົງກັນໃຫ້ລົບຂໍ້ມູນ
                unset($cart_data[$keys]);//ລົບຂໍ້ມູນຢູ່ຄຸກກີ້ໝົດແຖວທີ່ມີໄອດີຕົງກັນ
                $item_data = json_encode($cart_data);//ໃຫ້ຈົບການສ້າງອາເລໃນຮູບແບບ json
                setcookie('list_cart',$item_data,time() + (86400 * 30));//ຕັ້ງເວລາຄຸກກີ້
                foreach($cart_data as $keys => $values){}
                if(!$cart_data[$keys]){
                    setcookie("list_cart","",time() - 3600);//ຕັ້ງຄ່າໃຫ້ຄຸກກີ້ໃຫ້ເປັນຄ່າວ່າງ
                }
                echo"<script>";
                echo"window.location.href='Cart';";
                echo"</script>";
            }
        }
    }
    public static function select_customer_bill($cus_id){
        global $conn;
        global $result_customer_bill;
        $result_customer_bill = mysqli_query($conn,"call select_customer_bill('$cus_id')");
    }
    public static function customer_bill($cus_id){
        global $conn;
        global $result_customer;
        $result_customer = mysqli_query($conn,"call customer_bill('$cus_id')");
    }
    public static function confirm_order($sell_id){
        global $conn;
        global $confirm_order;
        $confirm_order = mysqli_query($conn,"call confirm_order('$sell_id')");
        if(!$confirm_order){
            echo"<script>";
            echo"window.location.href='Confirm?save=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='Confirm?save2=success';";
            echo"</script>";
        }
    }

    //
}
$obj = new obj();
?>