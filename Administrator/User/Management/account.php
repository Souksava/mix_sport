<?php
  $title = "ບັນຊີ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<!-- del one -->
<form action="Account" method="POST" id="form_Delete">
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
                    <input type="hidden" id="id" name="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btn_delete_acc" id="btn_delete_acc" class="btn btn-outline-danger" onclick="">
                        ລົບຂໍ້ມູນ
                        <span class="" id="load_delete_acc"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End del one -->
<!-- Update -->
<form action="Account" method="POST" id="form_update" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" align="left">
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຊື່ບັນຊີ</label>
                            <input type="text" name="acc_name2" id="acc_name2" placeholder="ຊື່ບັນຊີ"
                                class="form-control">
                            <input type="hidden" name="bank2" id="bank2" placeholder="" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເລກທີບັນຊີ</label>
                            <input type="text" name="acc_no2" id="acc_no2" placeholder="ເລກທີບັນຊີ"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>QR Code</label>
                            <input type="file" name="qrcode2" id="qrcode2" onchange="loadFile2(event)">
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
                    <button type="submit" name="btn_update_acc" id="btn_update_acc" class="btn btn-outline-success" onclick="">
                        ແກ້ໄຂ
                        <span class="" id="load_update_acc"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Update -->
<!-- Add -->
<form action="Account" method="POST" id="form_Save" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                            <label>ຊື່ທະນາຄານ</label>
                            <input type="text" name="bank" id="bank" placeholder="ຊື່ທະນາຄານ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຊື່ບັນຊີ</label>
                            <input type="text" name="acc_name" id="acc_name" placeholder="ຊື່ບັນຊີ"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເລກທີບັນຊີ</label>
                            <input type="text" name="acc_no" id="acc_no" placeholder="ເລກທີບັນຊີ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>QR Code</label>
                            <input type="file" name="qrcode" id="qrcode" onchange="loadFile(event)">
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
                    <button type="submit" name="btn_save_acc" id="btn_save_acc" class="btn btn-outline-primary"
                        onclick="">
                        ເພີ່ມຂໍ້ມູນ
                        <span class="" id="load_save_acc"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Add -->
<div class="row">
    <div class="col-xs-12 col-sm-6" align="left">
        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalAdd"><i
                class="fas fa-plus-circle"></i> ເພີ່ມຂໍ້ມູນ</button>
    </div>
</div><br>
<div class="row">
    <div class="table-responsive">
        <table class="table-bordered" style="width: 100%;text-align: center;">
            <tr style="font-size: 18px;">
                <th style="width: 120px;">ເຄື່ອງມື</th>
                <th>ຊື່ທະນາຄານ</th>
                <th>ຊື່ບັນຊີ</th>
                <th>ເລກທີບັນຊີ</th>
                <th>QR Code</th>
            </tr>
            <?php
                $obj->select_acc();
                foreach($result_acc as $row){
            ?>
            <tr>
                <td>
                    <a href="#" data-toggle="modal" data-target="#exampleModalupdate"
                        class="fa fa-pen toolcolor btnUpdateCompany"></a>&nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#exampleModaldel"
                        class="fa fa-trash toolcolor btnDelete_com"></a>
                </td>
                <td><?php echo $row["bank"] ?></td>
                <td><?php echo $row["account_name"] ?></td>
                <td><?php echo $row["account_no"] ?></td>
                <td style="display: none;"><?php echo $row["qr_code"] ?></td>
                <?php 
                    if($row["qr_code"] == ""){
                ?>
                <td>
                    <img src="<?php echo $path ?>icon/logo.jpg" class="img-circle elevation-2" alt="" width="55px">
                </td>
                <?php
                    }
                    else{
                ?>
                <td>
                    <img src="<?php echo $path ?>image/<?php echo $row["qr_code"] ?>" class="img-circle elevation-2"
                        alt="" width="55px">
                </td>
                <?php    
                    }
                ?>
            </tr>
            <?php
                }
                mysqli_free_result($result_acc);  
                mysqli_next_result($conn);
            ?>
        </table>
    </div>
</div>
<?php
    if(isset($_POST["bank"])){
        $obj->insert_acc($_POST["bank"],$_POST["acc_name"],$_POST["acc_no"],$_FILES["qrcode"]["name"]);
    }
    if(isset($_POST["bank2"])){
        $obj->update_acc($_POST["bank2"],$_POST["acc_name2"],$_POST["acc_no2"],$_FILES["qrcode2"]["name"]);
    }
    if(isset($_POST["id"])){
        $obj->del_acc(trim($_POST["id"]));
    }
    if(isset($_GET["bank"])=="same"){
        echo'<script type="text/javascript">
        swal("", "ຊື່ທະນາຄານນີ້ມີຢູ່ແລ້ວ ກະລຸນາໃສ່ຊື່ທີ່ແຕກຕ່າງ !", "info");
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
    include ("../../header-footer/footer.php");
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
const myform_form_Save = document.getElementById("form_Save");
const bank = document.getElementById("bank");
const acc_name = document.getElementById("acc_name");
const acc_no = document.getElementById("acc_no");
const load_save_acc = document.getElementById("load_save_acc");
const btn_save_acc = document.getElementById("btn_save_acc");
myform_form_Save.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Save();
});

function checkInputs_form_Save() {
    const bankValue = bank.value.trim();
    const acc_nameValue = acc_name.value.trim();
    const acc_noValue = acc_no.value.trim();
    if (bankValue === "") {
        setErrorFor(bank, 'ກະລຸນາປ້ອນຊື່ທະນາຄານ');
    } else {
        setSuccessFor(bank);
    }
    if (acc_nameValue === "") {
        setErrorFor(acc_name, 'ກະລຸນາປ້ອນຊື່ບັນຊີ');
    } else {
        setSuccessFor(acc_name);
    }
    if (acc_noValue === "") {
        setErrorFor(acc_no, 'ກະລຸນາປ້ອນເລກທີບັນຊີ');
    } else {
        setSuccessFor(acc_no);
    }
    if (bankValue !== "" && acc_nameValue !== "" && acc_noValue !== "") {
        setloading(load_save_acc, btn_save_acc);
        document.getElementById("form_Save").action = "Account";
        document.getElementById("form_Save").submit();
    }
}

const myform_form_update = document.getElementById("form_update");
const bank2 = document.getElementById("bank2");
const acc_name2 = document.getElementById("acc_name2");
const acc_no2 = document.getElementById("acc_no2");
const load_update_acc = document.getElementById("load_update_acc");
const btn_update_acc = document.getElementById("btn_update_acc");
myform_form_update.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_update();
});

function checkInputs_form_update() {
    const bank2Value = bank2.value.trim();
    const acc_name2Value = acc_name2.value.trim();
    const acc_no2Value = acc_no2.value.trim();
    if (bank2Value === "") {
        setErrorFor(bank2, 'ກະລຸນາປ້ອນຊື່ທະນາຄານ');
    } else {
        setSuccessFor(bank2);
    }
    if (acc_name2Value === "") {
        setErrorFor(acc_name2, 'ກະລຸນາປ້ອນຊື່ບັນຊີ');
    } else {
        setSuccessFor(acc_name2);
    }
    if (acc_no2Value === "") {
        setErrorFor(acc_no2, 'ກະລຸນາປ້ອນເລກທີບັນຊີ');
    } else {
        setSuccessFor(acc_no2);
    }
    if (bank2Value !== "" && acc_name2Value !== "" && acc_no2Value !== "") {
        setloading(load_update_acc, btn_update_acc);
        document.getElementById("form_update").action = "Account";
        document.getElementById("form_update").submit();
    }
}

const myform_form_Delete = document.getElementById("form_Delete");
const id = document.getElementById("id");
const load_Delete = document.getElementById("load_delete_acc");
const btnDelete_load = document.getElementById("btn_delete_acc");
myform_form_Delete.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Delete();
});

function checkInputs_form_Delete() {
    setloading(load_Delete, btnDelete_load);
    document.getElementById("form_Delete").action = "Account";
    document.getElementById("form_Delete").submit();
}
</script>

<script>
$('.btnDelete_com').on('click', function() {
    $('#exampleModaldel').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#id').val(data[1]);
});
$('.btnUpdateCompany').on('click', function() {
    $('#exampleModalupdate').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#bank2').val(data[1]);
    $('#acc_name2').val(data[2]);
    $('#acc_no2').val(data[3]);
    if (data[4] === '') {
        document.getElementById("output2").src = ('../../image/camera.jpg');
    } else {
        document.getElementById("output2").src = ('../../image/' + data[4]);
    }
});
</script>