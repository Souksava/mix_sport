<?php
//  session_start();
//  unset($_SESSION['mixsport_customer_ses_id']);
//  unset($_SESSION['cus_id']);
//  unset($_SESSION['cus_name']);
//  unset($_SESSION['email']);
//  session_destroy();
  include ('Administrator/oop/obj.php');
  if(isset($_POST['btnLogin'])){
    $obj->customer_login($_POST['email'],$_POST['pass']);
  }
  if(isset($_POST['btnRegister'])){
    $obj->customer_register($_POST['cus_name'],$_POST['surname'],$_POST['gender'],$_POST['email'],$_POST['pass']);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="icon/logo.jpg">
  <title>Mix Sport</title>
  <link href="Administrator/icon/logo.jpg" rel="icon">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="Administrator/fontawesome/css/all.css">
  <script src="Administrator/dist/js/sweetalert.min.js"></script>
  <style>
  button{
    width: 150px;
    height: 49px;
    border: none;
    outline: none;
    border-radius: 49px;
    cursor: pointer;
    background-color: #5995fd;
    color: #fff;
    text-transform: uppercase;
    font-weight: 600;
    margin: 10px 0;
    transition: .5s;
}
  </style>
</head>

<body>
    <div class="container">
      <div class="forms-container">
          <div class="signin-signup">
              <form action="Signin" method="POST" id="formLogin" class="sign-in-form">
                <img src="Administrator/icon/logo.jpg" alt="" width="100px" style="border-radius: 50%;"><br>
                <h2 class="title">ເຂົ້າສູ່ລະບົບ</h2>
                  <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="ອີເມວຜູ້ໃຊ້">
                  </div>
                  <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="pass" placeholder="ລະຫັດຜ່ານ">
                  </div>
                  <!-- <input type="submit" class="btn solid" value="ເຂົ້າສູ່ລະບົບ"> -->
                  <button type="submit" name="btnLogin" class="solid">ເຂົ້າສູ່ລະບົບ</button>

                  <p class="social-text"><a href="index" style="text-decoration: none;color: black;">ກັບໄປໜ້າຫຼັກ</a></p>
                  
              </form>

              <form action="Signin" method="POST" id="formRegister" class="sign-up-form">
                <h2 class="title">ລົງທະບຽນ</h2>
                  <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="cus_name" placeholder="ຊື່">
                  </div>
                  <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="surname" placeholder="ນາມສະກຸນ">
                  </div>
                  <div class="input-field">
                    <i class="fas fa-briefcase"></i>
                    <select name="gender" id="" style="font-family: 'Noto Sans Lao';">
                      <option value="">ເລືອກເພດ</option>
                      <option value="ຍິງ">ຍິງ</option>
                      <option value="ຊາຍ">ຊາຍ</option>
                    </select>
                  </div>
                  <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="Email" name="email" placeholder="ອີເມວຜູ້ໃຊ້">
                  </div>
                  <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="pass" placeholder="ລະຫັດເຂົ້າໃຊ້ລະບົບ">
                  </div>
                  <input type="submit" name="btnRegister" class="btn solid" value="ລົງທະບຽນ">
              </form>
          </div>
      </div>
      <div class="panels-container">
            <div class="panel left-panel">
              <div class="content">
                <h3>ລົງທະບຽນໃໝ່ ?</h3>
                <p>ຖ້າຫາກທ່ານຍັງບໍ່ມີອີເມວເພື່ອເຂົ້າໃຊ້ລະບົບທ່ານສາມາດເຂົ້າໄປລົງທະບຽນເພື່ອຍື່ນຂໍສິດເຂົ້າໃຊ້ລະບົບໄດ້ທາງຂ້າງລຸ່ມນີ້</p>
                <button class="btn transparent" id="sign-up-btn">ໄປໜ້າລົງທະບຽນ</button>
              </div>

              <img src="Administrator/image/printer.svg" class="image" alt="">
            </div>
            <div class="panel right-panel">
              <div class="content">
                <h3>ທ່ານຕ້ອງການເຂົ້າສູ່ລະບົບບໍ່ ?</h3>
                <p>ຖ້າຫາກທ່ານຕ້ອງການເຂົ້າສູ່ລະບົບດ້ວຍອີເມວຜູ້ໃຊ້ທີ່ມີຢູ່ແລ້ວທ່ານສາມາດໄປທີ່ໜ້າເຂົ້າສູ່ລະບົບໂດຍການກົດປຸ່ມຂ້າງລຸ່ມນີ້</p>
                <button class="btn transparent" id="sign-in-btn">ໄປໜ້າເຂົ້າສູ່ລະບົບ</button>
              </div>

              <img src="Administrator/image/register.svg" class="image" alt="">
            </div>
      </div>
    </div>
    <?php
    if(isset($_GET['email'])=='null'){
      echo'<script type="text/javascript">
      swal("", "ກະລຸນາປ້ອນອີເມວ !", "info");
      </script>';
    }
    if(isset($_GET['pass'])=='null'){
      echo'<script type="text/javascript">
      swal("", "ກະລຸນາປ້ອນລະຫັດຜ່ານ !", "info");
      </script>';
    }
    if(isset($_GET['login'])=='false'){
      echo'<script type="text/javascript">
      swal("", "ອີເມວ ຫຼື ລະຫັດຜ່ານຂອງທ່ານບໍ່ຖືກຕ້ອງ!", "error");
      </script>';
    }
    if(isset($_GET['email'])=='same'){
      echo'<script type="text/javascript">
      swal("", "ອີເມວນີ້ມີຢູ່ແລ້ວ!", "info");
      </script>';
    }
    if(isset($_GET['register'])=='fail'){
      echo'<script type="text/javascript">
      swal("", "ລົງທະບຽນຜິດພາດ!", "error");
      </script>';
    }
    if(isset($_GET['cusname'])=='null'){
      echo'<script type="text/javascript">
      swal("", "ກະລຸນາປ້ອນຊື່!", "info");
      </script>';
    }
    if(isset($_GET['surname'])=='null'){
      echo'<script type="text/javascript">
      swal("", "ກະລຸນາປ້ອນນາມສະກຸນ!", "info");
      </script>';
    }
    if(isset($_GET['gender'])=='null'){
      echo'<script type="text/javascript">
      swal("", "ກະລຸນາເລືອກເພດ!", "info");
      </script>';
    }
    if(isset($_GET['email'])=='null'){
      echo'<script type="text/javascript">
      swal("", "ກະລຸນາປ້ອນອີເມວ!", "info");
      </script>';
    }
    if(isset($_GET['pass'])=='null'){
      echo'<script type="text/javascript">
      swal("", "ກະລຸນາປ້ອນລະຫັດ!", "info");
      </script>';
    }
    ?>
    <script src="js/app.js"></script>
</body>
</html>