<?php
  $title = "ຜູ້ສະໜອງ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<!-- del one -->
<form action="Supplier" method="POST" id="form_Delete">
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
                <button type="submit" name="btnDelete_load" id="btnDelete_load" class="btn btn-outline-danger" onclick="">
                    ລົບຂໍ້ມູນ
                    <span class="" id="load_Delete"></span>
                </button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- End del one -->
<!-- Update -->
<form action="Supplier" method="POST" id="form_update">
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
                        <label>ຊື່ບໍລິສັດ</label>
                        <input type="text" name="company2" id="company2" placeholder="ຊື່ບໍລິສັດ" class="form-control">
                        <input type="hidden" name="sup_id" id="sup_id">
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
                        <label>ເບີແຟັກ</label>
                        <input type="text" name="fax2" id="fax2" placeholder="ເບີແຟັກ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ທີຕັ້ງບໍລິສັດ</label>
                        <textarea name="address2" id="address2" cols="5" rows="3"
                            placeholder="ທີຕັ້ງບໍລິສັດ"></textarea>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                <button type="submit" name="btn_update_supplier" id="btn_update_supplier" class="btn btn-outline-success" onclick="">
                    ແກ້ໄຂ
                    <span class="" id="load_update_supllier"></span>
                </button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- End Update -->
<!-- Add -->
<form action="Supllier" method="POST" id="form_Save">
<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <label>ຊື່ບໍລິສັດ</label>
                        <input type="text" name="company" id="company" placeholder="ຊື່ບໍລິສັດ" class="form-control">
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
                        <label>ເບີແຟັກ</label>
                        <input type="text" name="fax" id="fax" placeholder="ເບີແຟັກ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ທີຕັ້ງບໍລິສັດ</label>
                        <textarea name="address" id="address" cols="5" rows="3" placeholder="ທີຕັ້ງບໍລິສັດ"></textarea>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                <button type="submit" name="btn_save_supplier" id="btn_save_supplier" class="btn btn-outline-primary"
                    onclick="">
                    ເພີ່ມຂໍ້ມູນ
                    <span class="" id="load_save_supllier"></span>
                </button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- End Add -->
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModaldelete_many"><i
                class="fas fa-trash"></i> ລົບຂໍ້ມູນ</button>
    </div>
    <div class="col-xs-12 col-sm-6" align="right">
        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalAdd"><i
                class="fas fa-plus-circle"></i> ເພີ່ມຂໍ້ມູນ</button>
    </div>
</div><br>
<form action="Supplier" id="form_delete_manay" method="POST">
    <div id="result_data" class="result_data">
        <?php
            include ($path."header-footer/loading.php");
        ?>
    </div>
    <div class="modal fade" id="exampleModaldelete_many" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <button type="submit" name="btnDelete_many" id="btnDelete_many" class="btn btn-outline-danger">
                        ລົບຂໍ້ມູນ
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
    if(isset($_POST["company"])){
        $obj->insert_supplier(trim($_POST["company"]),$_POST["tel"],$_POST["fax"],$_POST["address"],$_POST["email"]);
    }
    if(isset($_POST["id"])){
        $obj->del_supplier(trim($_POST["id"]));
    }
    if(isset($_POST["sup_id"])){
        $obj->update_supplier(($_POST["sup_id"]),trim($_POST["company2"]),$_POST["tel2"],$_POST["fax2"],$_POST["address2"],$_POST["email2"]);
    }
    if(isset($_POST["btnDelete_many"])){
        $logic = 0;
            if(isset($_POST["id2"])){
                foreach($_POST["id2"] as $checkid){
                    $check_order = mysqli_query($conn,"select * from orders where sup_id='$checkid'");
                    $check_import = mysqli_query($conn,"select * from import where sup_id='$checkid'");
                    if(mysqli_num_rows($check_order) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='Supplier?Checkdelete=true&&orders=$checkid'';";
                        echo"</script>";
                        break;
                    }
                    if(mysqli_num_rows($check_import) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='Supplier?Checkdelete=true&&imports=$checkid'';";
                        echo"</script>";
                        break;
                    }
                }
                if($logic == 0){
                    $delete = 0;
                    foreach($_POST["id2"] as $id){
                        $delete_many = mysqli_query($conn,"call del_supplier($id)");
                        if(!$delete_many){
                            $delete = 1;
                            echo"<script>";
                            echo"window.location.href='Supplier?del=fail';";
                            echo"</script>";
                        }
                        mysqli_free_result($delete_many);  
                        mysqli_next_result($conn);
                    }
                    if($delete == 0){
                        echo"<script>";
                        echo"window.location.href='Supplier?del2=success';";
                        echo"</script>";
                    }
                    
                }
            }
            else{
                echo"<script>";
                echo"window.location.href='Supplier?Checkbox=null';";
                echo"</script>";
            }
    }
    if(isset($_GET["Checkdelete"])=="true" && isset($_GET["imports"])){
        $msg = $_GET["imports"];
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດຜູ້ສະໜອງ: '.$msg.' ນີ້ມີຢູ່ໃນຕາຕະລາງການນຳເຂົ້າສິນຄ້າແລ້ວ ", "error");
        </script>';
      }   
      if(isset($_GET["Checkdelete"])=="true" && isset($_GET["orders"])){
        $msg = $_GET["sells"];
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດຜູ້ສະໜອງ: '.$msg.' ນີ້ມີຢູ່ໃນຕາຕະລາງການສັ່ງຊື້ສິນຄ້າແລ້ວ ", "error");
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
      if(isset($_GET["name"])=="same"){
        echo'<script type="text/javascript">
        swal("", "ຊື່ບໍລິສັດນີ້ມີຢູ່ແລ້ວ ກະລຸນາໃສ່ຊື່ບໍລິສັດທີ່ແຕກຕ່າງ !", "info");
        </script>';
      }  
      if(isset($_GET["order"])=="has"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກລະຫັດຜູ້ສະໜອງນີ້ໄດ້ເຄື່ອນໄຫວໃນຕາຕະລາງສັ່ງຊື້ສິນຄ້າແລ້ວ !", "error");
        </script>';
      }  
      if(isset($_GET["import"])=="has"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກລະຫັດຜູ້ສະໜອງນີ້ໄດ້ເຄື່ອນໄຫວໃນຕາຕະລາງນຳເຂົ້າສິນຄ້າແລ້ວ  !", "error");
        </script>';
      }  
    include ("../../header-footer/footer.php");
  ?>
<script>
const myform_form_Save = document.getElementById("form_Save");
const company = document.getElementById("company");
const tel = document.getElementById("tel");
const fax = document.getElementById("fax");
const address = document.getElementById("address");
const email = document.getElementById("email");
const load_save_supllier = document.getElementById("load_save_supllier");
const btn_save_supplier = document.getElementById("btn_save_supplier");
myform_form_Save.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Save();
});

function checkInputs_form_Save() {
    const companyValue = company.value.trim();
    const telValue = tel.value.trim();
    const emailValue = email.value.trim();
    if (companyValue === "") {
        setErrorFor(company, 'ກະລຸນາປ້ອນລະຫັດສິນຄ້າ');
    } else {
        setSuccessFor(company);
    }
    if (telValue === "") {
        setErrorFor(tel, 'ກະລຸນາປ້ອນຊື່ສິນຄ້າ');
    } else {
        setSuccessFor(tel);
    }
    if (emailValue === "") {
        setErrorFor(email, 'ກະລຸນາປ້ອນອີເມວ');
    } else if(!isEmail(emailValue)){
      setErrorFor(email, 'ຮູບແບບອີເມວບໍ່ຖືກຕ້ອງ')
    }
    if (companyValue !== "" && telValue !== ""  && emailValue !== "" && isEmail(emailValue) === true) {
        setloading(load_save_supllier, btn_save_supplier);
        document.getElementById("form_Save").action = "Supplier";
        document.getElementById("form_Save").submit();
    }
}

const myform_form_Delete = document.getElementById("form_Delete");
const id = document.getElementById("id");
const load_Delete = document.getElementById("load_Delete");
const btnDelete_load = document.getElementById("btnDelete_load");
myform_form_Delete.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Delete();
});

function checkInputs_form_Delete() {
    setloading(load_Delete, btnDelete_load);
    document.getElementById("form_Delete").action = "Supplier";
    document.getElementById("form_Delete").submit();
}


const myform_update_Save = document.getElementById("form_update");
const company2 = document.getElementById("company2");
const tel2 = document.getElementById("tel2");
const fax2 = document.getElementById("fax2");
const address2 = document.getElementById("address2");
const email2 = document.getElementById("email2");
const load_update_supllier = document.getElementById("load_update_supllier");
const btn_update_supplier = document.getElementById("btn_update_supplier");
myform_update_Save.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_update();
});

function checkInputs_form_update() {
    const company2Value = company2.value.trim();
    const tel2Value = tel2.value.trim();
    const email2Value = email2.value.trim();
    if (company2Value === "") {
        setErrorFor(company2, 'ກະລຸນາປ້ອນລະຫັດສິນຄ້າ');
    } else {
        setSuccessFor(company2);
    }
    if (tel2Value === "") {
        setErrorFor(tel2, 'ກະລຸນາປ້ອນຊື່ສິນຄ້າ');
    } else {
        setSuccessFor(tel2);
    }
    if (email2Value === "") {
        setErrorFor(email2, 'ກະລຸນາປ້ອນອີເມວ');
    } else if(!isEmail(email2Value)){
      setErrorFor(email2, 'ຮູບແບບອີເມວບໍ່ຖືກຕ້ອງ')
    }
    if (company2Value !== "" && tel2Value !== ""  && email2Value !== "" && isEmail(email2Value) === true) {
        setloading(load_update_supllier, btn_update_supplier);
        document.getElementById("form_update").action = "Supplier";
        document.getElementById("form_update").submit();
    }
}
</script>

<script>
$(document).ready(function() {
    load_data("%%", "0");

    function load_data(query, page) {
        $.ajax({
            url: "fetch_supplier.php",
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
