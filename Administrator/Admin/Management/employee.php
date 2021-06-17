<?php
  $title = "ພະນັກງານ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<!-- del one -->
<form action="Employee" method="POST" id="form_delete_one">
    <div class="modal fade" id="exampleModaldel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <P align="center">ທ່ານຕ້ອງການລົບຂໍ້ມູນຫຼືບໍ່</P>
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnDelete" id="btnDelete" class="btn btn-outline-danger" onclick="">
                        ລົບຂໍ້ມູນ
                        <span class="" id="load_delete"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End del one -->
<!-- Update -->
<form action="Employee" method="POST" id="form_update" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" align="left">
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຊື່</label>
                            <input type="hidden" name="emp_id" id="emp_id">
                            <input type="text" name="emp_name2" id="emp_name2" placeholder="ຊື່" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ນາມສະກຸນ</label>
                            <input type="text" name="surname2" id="surname2" placeholder="ນາມສະກຸນ"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເພດ</label>
                            <select name="gender2" id="gender2">
                                <option value="">ເລືອກເພດ</option>
                                <option value="ຍິງ">ຍິງ</option>
                                <option value="ຊາຍ">ຊາຍ</option>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເບີໂທລະສັບ</label>
                            <input type="text" name="tel2" id="tel2" placeholder="ເບີໂທລະສັບ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ທີ່ຢູ່ປັດຈຸບັນ</label>
                            <textarea name="address2" id="address2" cols="5" rows="3"
                                placeholder="ທີ່ຢູ່ປັດຈຸບັນ"></textarea>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ອີເມວ</label>
                            <input type="text" name="email2" id="email2" placeholder="ອີເມວ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ລະຫັດຜ່ານ</label>
                            <input type="password" name="pass2" id="pass2" placeholder="ລະຫັດຜ່ານ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ສະຖານະຜູ້ໃຊ້ລະບົບ</label>
                            <select name="status2" id="status2">
                                <option>ເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ</option>
                                <?php
                                $sql_status2 = mysqli_query($conn,"select * from emp_status;");
                                foreach($sql_status2 as $row_status2){
                            ?>
                                <option value="<?php echo $row_status2["status"] ?>">
                                    <?php echo $row_status2["status_name"] ?>
                                </option>
                                <?php
                                }
                            ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຮູບພາບສິນຄ້າ</label>
                            <input type="file" name="profile2" id="profile2" onchange="loadFile2(event)"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <img src="../../image/camera.jpg" id="output2" width="100%" height="250">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-outline-success" onclick="">
                        ແກ້ໄຂ
                        <span class="" id="load_update"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Update -->
<!-- Add -->

<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="Employee" id="form_save" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" align="left">
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຊື່</label>
                            <input type="text" name="emp_name_save" id="emp_name_save" placeholder="ຊື່"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ນາມສະກຸນ</label>
                            <input type="text" name="surname" id="surname" placeholder="ນາມສະກຸນ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເພດ</label>
                            <select name="gender" id="gender">
                                <option value="">ເລືອກເພດ</option>
                                <option value="ຍິງ">ຍິງ</option>
                                <option value="ຊາຍ">ຊາຍ</option>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເບີໂທລະສັບ</label>
                            <input type="text" name="tel" id="tel" placeholder="ເບີໂທລະສັບ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ທີ່ຢູ່ປັດຈຸບັນ</label>
                            <textarea name="address" id="address" cols="5" rows="3"
                                placeholder="ທີ່ຢູ່ປັດຈຸບັນ"></textarea>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ອີເມວ</label>
                            <input type="text" name="email" id="email" placeholder="ອີເມວ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ລະຫັດຜ່ານ</label>
                            <input type="password" name="pass" id="pass" placeholder="ລະຫັດຜ່ານ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ສະຖານະຜູ້ໃຊ້ລະບົບ</label>
                            <select name="status" id="status">
                                <option value="">ເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ</option>
                                <?php
                                $sql_status = mysqli_query($conn,"select * from emp_status;");
                                foreach($sql_status as $row_status){
                            ?>
                                <option value="<?php echo $row_status["status"] ?>">
                                    <?php echo $row_status["status_name"] ?>
                                </option>
                                <?php
                                }
                            ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຮູບພາບສິນຄ້າ</label>
                            <input type="file" name="profile" id="profile" onchange="loadFile(event)">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <img src="../../image/camera.jpg" id="output" width="100%" height="250">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="Save" id="btnSave" class="btn btn-outline-primary" onclick="">
                        ບັນທຶກ
                        <span class="" id="load_save"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- End Add -->


<div class="row">
    <div class="col-xs-12 col-sm-6">
        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModaldelete"><i
                class="fas fa-trash"></i> ລົບຂໍ້ມູນ</button>
    </div>
    <div class="col-xs-12 col-sm-6" align="right">
        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalAdd"><i
                class="fas fa-plus-circle"></i> ເພີ່ມຂໍ້ມູນ</button>
    </div>
</div><br>
<form action="Employee" method="POST" id="form_delete many">
    <div id="result_data" class="result_data">
        <?php
            include ($path."header-footer/loading.php");
        ?>
    </div>

    <div class="modal fade" id="exampleModaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <P align="center">ທ່ານຕ້ອງການລົບຂໍ້ມູນຫຼືບໍ່</P>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnDelete_many" id="btnDelete_many" class="btn btn-outline-danger"
                        onclick="">
                        ລົບຂໍ້ມູນ
                        <span class="" id="load_save"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
    include ("../../header-footer/footer.php");
    if(isset($_POST['emp_name_save'])){
        $obj->insert_employee(trim($_POST['emp_name_save']),trim($_POST['emp_surname']),trim($_POST['gender']),trim($_POST['tel']),trim($_POST['address']),trim($_POST['email']),trim($_POST['pass']),trim($_POST['status']),$_FILES['profile']['name']);
      }
      if(isset($_POST['emp_id'])){
        $obj->update_employee(trim($_POST['emp_id']),trim($_POST['emp_name2']),trim($_POST['emp_surname2']),trim($_POST['gender2']),trim($_POST['tel2']),trim($_POST['address2']),trim($_POST['email2']),trim($_POST['pass2']),trim($_POST['status2']),$_FILES['profile2']['name']);
      }
      if(isset($_POST["id"])){
        $obj->del_employee($_POST["id"]);
    }
      if(isset($_POST["btnDelete_many"])){
        $logic = 0;
            if(isset($_POST["emp_id_delete_many"])){
                foreach($_POST["emp_id_delete_many"] as $checkid){
                    $check_order = mysqli_query($conn,"select * from orders where emp_id='$checkid';");
                    $check_import = mysqli_query($conn,"select * from orders where emp_id='$checkid';");
                    $check_selldetail = mysqli_query($conn,"select * from sell where emp_id='$checkid';");
                    if(mysqli_num_rows($check_order) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='Employee?Checkdelete=true&&orders=$checkid'';";
                        echo"</script>";
                        break;
                    }
                    if(mysqli_num_rows($check_import) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='Employee?Checkdelete=true&&imports=$checkid'';";
                        echo"</script>";
                        break;
                    }
                    if(mysqli_num_rows($check_selldetail) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='Employee?Checkdelete=true&&sells=$checkid'';";
                        echo"</script>";
                        break;
                    }
                }
                if($logic == 0){
                    $delete = 0;
                    foreach($_POST["emp_id_delete_many"] as $id){
                        $get_img = mysqli_query($conn,"select profile from employee where emp_id='$id'");
                        $data = mysqli_fetch_array($get_img, MYSQLI_ASSOC);
                        $path2 = $path.'image/'.$data['profile'];
                        if(file_exists($path2) && !empty($data['profile'])){
                            unlink($path2);        
                        }
                        $delete_many = mysqli_query($conn,"call del_employee('$id')");
                        if(!$delete_many){
                            $delete = 1;
                            echo"<script>";
                            echo"window.location.href='Employee?del=fail';";
                            echo"</script>";
                        }
                        mysqli_free_result($delete_many);  
                        mysqli_next_result($conn);
                    }
                    if($delete == 0){
                        echo"<script>";
                        echo"window.location.href='Employee?del2=success';";
                        echo"</script>";
                    }
                    
                }
            }
            else{
                echo"<script>";
                echo"window.location.href='Employee?Checkbox=null';";
                echo"</script>";
            }
    }

    if(isset($_GET["order"])=="has"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວການສັ່ງຊື້ແລ້ວ !", "error");
        </script>';
      }  
      if(isset($_GET["import"])=="has"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວການນຳເຂົ້າສິນຄ້າແລ້ວ !", "error");
        </script>';
      }  
      if(isset($_GET["sell"])=="has"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວການຂາຍສິນຄ້າແລ້ວ !", "error");
        </script>';
      } 
      if(isset($_GET["Checkdelete"])=="true" && isset($_GET["orders"])){
        $msg = $_GET["orders"];
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກພະນັກລະຫັດ: '.$msg.' ນີ້ມີຢູ່ໃນຕາຕະລາງການສັ່ງຊື້ແລ້ວ ", "error");
        </script>';
      }   
      if(isset($_GET["Checkdelete"])=="true" && isset($_GET["imports"])){
        $msg = $_GET["imports"];
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດພະນັກງານ: '.$msg.' ນີ້ມີຢູ່ໃນຕາຕະລາງການນຳເຂົ້າສິນຄ້າແລ້ວ ", "error");
        </script>';
      }   
      if(isset($_GET["Checkdelete"])=="true" && isset($_GET["sells"])){
        $msg = $_GET["sells"];
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດພະນັກງານ: '.$msg.' ນີ້ມີຢູ່ໃນຕາຕະລາງການຂາຍສິນຄ້າແລ້ວ ", "error");
        </script>';
      }   
      if(isset($_GET['mp'])=='same'){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້ເນື່ອງຈາກອີເມວນີ້ມີແລ້ວ ກະລຸນາໃສ່ອີເມວອື່ນ !!", "info");
        </script>';
      }



      if(isset($_GET['email'])=='same'){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກອີເມວພະນັກງານນີ້ມີແລ້ວ ກະລຸນາໃສ່ອີເມວອື່ນ !!", "info");
        </script>';
      }
      // check if pass if exist
      if(isset($_GET['pass'])=='same'){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດຜ່ານພະນັກງານນີ້ມີແລ້ວ ກະລຸນາໃສ່ລະຫັດຜ່ານອື່ນ !!", "info");
        </script>';
      }
      if(isset($_GET["Checkbox"])=="null"){
        echo'<script type="text/javascript">
        swal("", "ກະລຸນາເລືອກລາຍການກ່ອນ !", "info");
        </script>';
      }  
      if(isset($_GET["save"])=="fail"){
        echo'<script type="text/javascript">
        swal("", "ບັນທຶກຂໍ້ມູນຜິດພາດ !", "error");
        </script>';
      }  
      if(isset($_GET["save2"])=="success"){
        echo'<script type="text/javascript">
        swal("", "ບັນທຶກຂໍ້ມູນສຳເລັດ !", "success");
        </script>';
      }  
      if(isset($_GET["update"])=="fail"){
        echo'<script type="text/javascript">
        swal("", "ແກ້ໄຂຂໍ້ມູນຜິດພາດ !", "error");
        </script>';
      }  
      if(isset($_GET["update2"])=="success"){
        echo'<script type="text/javascript">
        swal("", "ແກ້ໄຂຂໍ້ມູນສຳເລັດ !", "success");
        </script>';
      }  
      if(isset($_GET["del"])=="fail"){
        echo'<script type="text/javascript">
        swal("", "ລົບຂໍ້ມູນຜິດພາດ !", "error");
        </script>';
      }  
      if(isset($_GET["del2"])=="success"){
        echo'<script type="text/javascript">
        swal("", "ລົບຂໍ້ມູນສຳເລັດ !", "success");
        </script>';
      }  
      if(isset($_GET["employeeid"])=="reservation"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື້ອງຈາກລະຫັດພະນັກງານຄົນໄດ້ສະຫງວນໄວ້ !", "info");
        </script>';
      }  
  ?>
<script>
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
var loadFile2 = function(event) {
    var output2 = document.getElementById('output2');
    output2.src = URL.createObjectURL(event.target.files[0]);
    output2.onload = function() {
        URL.revokeObjectURL(output2.src) // free memory
    }
};
</script>
<script>
$(document).ready(function() {
    load_data("%%", "0");

    function load_data(query, page) {
        $.ajax({
            url: "fetch_employee.php",
            method: "POST",
            data: {
                query: query,
                page: page
            },
            success: function(data) {
                $("#result_data").html(data);
            }
        });
    }
    $('#search').keyup(function() {
        var page = "0";
        var search = $('#search').val();
        if (search != '') {
            load_data(search, page);
        } else {
            load_data('%%', page);
        }
    });
    $(document).on("click", ".page-links_table", function() {
        var page = this.id;
        var search = $('#search').val();
        if (search != "") {
            load_data(search, page);
        } else {
            load_data("%%", page);
        }
    });
});
</script>

<script type="text/javascript">
const myform = document.getElementById('form_save');
const emp_name = document.getElementById('emp_name_save');
const email = document.getElementById('email');
const gender = document.getElementById('gender');
const tel = document.getElementById('tel');
const pass = document.getElementById('pass');
const status = document.getElementById('status');
const load_save = document.getElementById("load_save");
const btnLoad_save = document.getElementById("btnSave");

myform.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    const emailValue = email.value.trim();
    const emp_nameValue = emp_name.value.trim();
    const genderValue = gender.value.trim();
    const telValue = tel.value.trim();
    const passValue = pass.value.trim();
    const statusValue = status.value.trim();
    if (emp_nameValue === '') {
        setErrorFor(emp_name, 'ກະລຸນາປ້ອນຊື່ພະນັກງານ');
    } else {
        setSuccessFor(emp_name);
    }
    if (genderValue === '') {
        setErrorFor(gender, 'ກະລຸນາເລືອກເພດ');
    } else {
        setSuccessFor(gender);
    }
    if (emailValue === '') {
        setErrorFor(email, 'ກະລຸນາປ້ອນທີ່ຢູ່ອີເມວ')
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'ຮູບແບບອີເມວບໍ່ຖືກຕ້ອງ')
    } else {
        setSuccessFor(email);
    }
    if (telValue === '') {
        setErrorFor(tel, 'ກະລຸນາປ້ອນເບີໂທລະສັບ');
    } else {
        setSuccessFor(tel);
    }
    if (passValue === '') {
        setErrorFor(pass, 'ກະລຸນາປ້ອນລະຫັດຜ່ານ');
    } else {
        setSuccessFor(pass);
    }
    if (statusValue === '') {
        setErrorFor(status, 'ກະລຸນາເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ');
    } else {
        setSuccessFor(status);
    }
    if (emp_nameValue !== '' && genderValue !== '' && telValue !== '' && passValue !== '' &&
        statusValue !== '' && emailValue !== '') {
        setloading(load_save, btnLoad_save);
        document.getElementById("form_save").action = "Employee";
        document.getElementById("form_save").submit();
    }
}


const myform_form_delete_one = document.getElementById("form_delete_one");
const id = document.getElementById("id");
const load_delete = document.getElementById("load_delete");
const btnDelete = document.getElementById("btnDelete");
myform_form_delete_one.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_delete_one();
});

function checkInputs_form_delete_one() {
    setloading(load_delete, btnDelete);
    document.getElementById("form_delete_one").action = "Employee";
    document.getElementById("form_delete_one").submit();
}




const form_update = document.getElementById('form_update');
const emp_id = document.getElementById('emp_id');
const emp_name2 = document.getElementById('emp_name2');
const email2 = document.getElementById('email2');
const gender2 = document.getElementById('gender2');
const tel2 = document.getElementById('tel2');
const pass2 = document.getElementById('pass2');
const status2 = document.getElementById('status2');
const load_update = document.getElementById("load_update");
const btnUpdate = document.getElementById("btnUpdate");

form_update.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_update();
});

function checkInputs_form_update() {
    const email2Value = email2.value.trim();
    const emp_name2Value = emp_name2.value.trim();
    const gender2Value = gender2.value.trim();
    const tel2Value = tel2.value.trim();
    const pass2Value = pass2.value.trim();
    const status2Value = status2.value.trim();
    if (emp_name2Value === '') {
        setErrorFor(emp_name2, 'ກະລຸນາປ້ອນຊື່ພະນັກງານ');
    } else {
        setSuccessFor(emp_name2);
    }
    if (gender2Value === '') {
        setErrorFor(gender2, 'ກະລຸນາເລືອກເພດ');
    } else {
        setSuccessFor(gender2);
    }
    if (email2Value === '') {
        setErrorFor(email2, 'ກະລຸນາປ້ອນທີ່ຢູ່ອີເມວ')
    } else if (!isEmail(email2Value)) {
        setErrorFor(email2, 'ຮູບແບບອີເມວບໍ່ຖືກຕ້ອງ')
    } else {
        setSuccessFor(email2);
    }
    if (tel2Value === '') {
        setErrorFor(tel2, 'ກະລຸນາປ້ອນເບີໂທລະສັບ');
    } else {
        setSuccessFor(tel2);
    }
    if (pass2Value === '') {
        setErrorFor(pass2, 'ກະລຸນາປ້ອນລະຫັດຜ່ານ');
    } else {
        setSuccessFor(pass2);
    }
    if (status2Value === '') {
        setErrorFor(status2, 'ກະລຸນາເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ');
    } else {
        setSuccessFor(status2);
    }
    if (emp_name2Value !== '' && gender2Value !== '' && tel2Value !== '' && pass2Value !== '' &&
        status2Value !== '' && email2Value !== '') {
        setloading(load_update, btnUpdate);
        document.getElementById("form_update").action = "Employee";
        document.getElementById("form_update").submit();
    }
}
</script>