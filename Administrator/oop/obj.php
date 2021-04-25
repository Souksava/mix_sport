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
    //
   
}
$obj = new obj();
?>