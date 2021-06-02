<?php
  $title = "ສິນຄ້າຊ່ຳຫຼຸດ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<!-- del one -->
<form action="Broke" id="form_delete" method="POST">
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
                    <P align="center">ທ່ານຕ້ອງການລົບຂໍ້ມູນ ຫຼື ບໍ່</P>
                    <input type="hidden" name="id_broke" id="id_broke">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btn_Delete" id="btn_Delete" class="btn btn-outline-danger" onclick="">
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
<form action="Broke" id="form_update" method="POST">
    <div class="modal fade" id="btnUpdateProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <input type="hidden" id="broke_id" name="broke_id">
                            <label>ຈຳນວນ</label>
                            <input type="number" name="qty2" id="qty2" placeholder="ຈຳນວນ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ໝາຍເຫດ</label>
                            <input type="text" name="remark2" id="remark2" placeholder="ໝາຍເຫດ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btn_load_update" id="btn_load_update" class="btn btn-outline-success"
                        onclick="">
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
<form action="Broke" id="form_Save" method="POST">
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
                            <label>ລະຫັດສິນຄ້າ</label>
                            <input type="text" name="pro_id_broke" id="pro_id_broke" placeholder="ລະຫັດສິນຄ້າ"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຈຳນວນ</label>
                            <input type="number" name="qty" id="qty" placeholder="ຈຳນວນ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ໝາຍເຫດ</label>
                            <input type="text" name="remark" id="remark" placeholder="ໝາຍເຫດ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btn_load_save" id="btn_load_save" class="btn btn-outline-primary"
                        onclick="">
                        ເພີ່ມຂໍ້ມູນ
                        <span class="" id="load_save"></span>
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
<form action="Broke" id="form_delete_manay" method="POST">
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
    include ("../../header-footer/footer.php");
    if(isset($_POST["pro_id_broke"])){
        $obj->insert_broke(trim($_POST["pro_id_broke"]),trim($_POST["qty"]),trim($_POST["remark"]));
    }
    if(isset($_POST["broke_id"])){
        $obj->update_broke(trim($_POST["broke_id"]),trim($_POST["qty2"]),trim($_POST["remark2"]));
    }
    if(isset($_POST["id_broke"])){
        $obj->del_broke(trim($_POST["id_broke"]));
    }
    if(isset($_POST["btnDelete_many"])){
        $logic = 0;
            if(isset($_POST["id2"])){
                    $delete = 0;
                    foreach($_POST["id2"] as $id){
                        $delete_many = mysqli_query($conn,"call del_broke('$id')");
                        if(!$delete_many){
                            $delete = 1;
                            echo"<script>";
                            echo"window.location.href='Broke?del=fail';";
                            echo"</script>";
                        }
                        mysqli_free_result($delete_many);  
                        mysqli_next_result($conn);
                    }
                    if($delete == 0){
                        echo"<script>";
                        echo"window.location.href='Broke?del2=success';";
                        echo"</script>";
                    }
                    
                
            }
            else{
                echo"<script>";
                echo"window.location.href='Broke?Checkbox=null';";
                echo"</script>";
            }
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
    if(isset($_GET["Checkbox"])=="null"){
        echo'<script type="text/javascript">
        swal("", "ກະລຸນາເລືອກລາຍການກ່ອນ !", "info");
        </script>';
      }  
    if(isset($_GET['product'])=='null'){
        echo'<script type="text/javascript">
        swal("", "ລະຫັດສິນຄ້າບໍ່ຖືກຕ້ອງ", "info");
        </script>';
      }
      if(isset($_GET['save'])=='fail'){
        echo'<script type="text/javascript">
        swal("", "ບັນທຶກຂໍ້ມູນບໍ່ສຳເລັດ", "error");
        </script>';
      }
      if(isset($_GET['save2'])=='success'){
        echo'<script type="text/javascript">
        swal("", "ບັນທຶກຂໍ້ມູນສຳເລັດ", "success");
        </script>';
      }
  ?>
<script>
$(document).ready(function() {
    load_data("%%", "0");

    function load_data(query, page) {
        $.ajax({
            url: "fetch_broke.php",
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
<script>
const myform_form_Save = document.getElementById("form_Save");
const pro_id = document.getElementById("pro_id_broke");
const qty = document.getElementById("qty");
const remark = document.getElementById("remark");
const load_save = document.getElementById("load_save");
const btn_load_save = document.getElementById("btn_load_save");
myform_form_Save.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Save();
});

function checkInputs_form_Save() {
    const pro_idValue = pro_id.value.trim();
    const qtyValue = qty.value.trim();
    const remarkValue = remark.value.trim();
    if (pro_idValue === "") {
        setErrorFor(pro_id, 'ກະລຸນາປ້ອນລະຫັດສິນຄ້າ');
    } else {
        setSuccessFor(pro_id);
    }
    if (qtyValue === "") {
        setErrorFor(qty, 'ກະລຸນາປ້ອນຈຳນວນ');
    } else {
        setSuccessFor(qty);
    }
    if (remarkValue === "") {
        setErrorFor(remark, 'ກະລຸນາປ້ອນ Remark');
    } else {
        setSuccessFor(remark);
    }
    if (pro_idValue !== "" && qtyValue !== "" && remarkValue !== "") {
        setloading(load_save, btn_load_save);
        document.getElementById("form_Save").action = "Broke";
        document.getElementById("form_Save").submit();
    }
}


const myform_form_update = document.getElementById("form_update");
const broke_id = document.getElementById("broke_id");
const qty2 = document.getElementById("qty2");
const remark2 = document.getElementById("remark2");
const load_update = document.getElementById("load_update");
const btn_load_update = document.getElementById("btn_load_update");
myform_form_update.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_update();
});

function checkInputs_form_update() {
    const broke_idValue = broke_id.value.trim();
    const qty2Value = qty2.value.trim();
    const remark2Value = remark2.value.trim();
    if (qty2Value === "") {
        setErrorFor(qty2, 'ກະລຸນາປ້ອນຈຳນວນ');
    } else {
        setSuccessFor(qty2);
    }
    if (remark2Value === "") {
        setErrorFor(remark2, 'ກະລຸນາປ້ອນ Remark');
    } else {
        setSuccessFor(remark);
    }
    if (qty2Value !== "" && remark2Value !== "") {
        setloading(load_update, btn_load_update);
        document.getElementById("form_update").action = "Broke";
        document.getElementById("form_update").submit();
    }
}




const myform_form_delete = document.getElementById("form_delete");
const id = document.getElementById("id_broke");
const load_delete = document.getElementById("load_delete");
const btn_Delete = document.getElementById("btn_Delete");
myform_form_delete.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_delete();
});

function checkInputs_form_delete() {
        setloading(load_delete, btn_Delete);
        document.getElementById("form_delete").action = "Broke";
        document.getElementById("form_delete").submit();
    
}
</script>