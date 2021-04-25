<?php
  $title = "ຍີ່ຫໍ້ສິນຄ້າ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<!-- del one -->
<form action="Brand" id="form_Delete" method="POST">
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
                    <button type="submit" name="btnDelete_load" id="btnDelete_load" class="btn btn-outline-danger"
                        onclick="">
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
<form action="Brand" id="form_Update" method="POST">
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
                            <label>ຊື່ຍີ່ຫໍ້</label>
                            <input type="hidden" name="brand_id" id="brand_id">
                            <input type="text" name="brand_name2" id="brand_name2" placeholder="ຊື່ຍີ່ຫໍ້"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnUpdate_load" id="btnUpdate_load" class="btn btn-outline-success"
                        onclick="">
                        ແກ້ໄຂ
                        <span class="" id="load_Update"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Update -->
<!-- Add -->
<form action="Brand" id="form_Save" method="POST">
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
                            <label>ຊື່ຍີ່ຫໍ້</label>
                            <input type="text" name="brand_name" id="brand_name" placeholder="ຊື່ຍີ່ຫໍ້"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnSave_load" id="btnSave_load" class="btn btn-outline-primary"
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
        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModaldelete"><i
                class="fas fa-trash"></i> ລົບຂໍ້ມູນ</button>
    </div>
    <div class="col-xs-12 col-sm-6" align="right">
        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalAdd"><i
                class="fas fa-plus-circle"></i> ເພີ່ມຂໍ້ມູນ</button>
    </div>
</div><br>
<form action="Category" id="form_delete_manay" method="POST">
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
    if(isset($_POST["brand_name"])){
        $obj->insert_brand(trim($_POST["brand_name"]));
    }
    if(isset($_POST["brand_id"])){
        $obj->update_brand($_POST["brand_id"],trim($_POST["brand_name2"]));
    }
    if(isset($_POST["id"])){
        $obj->del_brand($_POST["id"]);
    }
    if(isset($_POST["btnDelete_many"])){
        $logic = 0;
            if(isset($_POST["id2"])){
                foreach($_POST["id2"] as $checkid){
                    $Check_Product = mysqli_query($conn,"call check_brand($checkid)");
                    if(mysqli_num_rows($Check_Product) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='Brand?Checkdelete=true&&idtable=$checkid';";
                        echo"</script>";
                        break;
                    }
                    mysqli_free_result($Check_Product);  
                    mysqli_next_result($conn);
                }
                if($logic == 0){
                    $delete = 0;
                    foreach($_POST["id2"] as $id){
                        $delete_many = mysqli_query($conn,"call del_brand($id)");
                        if(!$delete_many){
                            $delete = 1;
                            echo"<script>";
                            echo"window.location.href='Brand?del=fail';";
                            echo"</script>";
                        }
                        mysqli_free_result($delete_many);  
                        mysqli_next_result($conn);
                    }
                    if($delete == 0){
                        echo"<script>";
                        echo"window.location.href='Brand?del2=success';";
                        echo"</script>";
                    }
                    
                }
            }
            else{
                echo"<script>";
                echo"window.location.href='Brand?Checkbox=null';";
                echo"</script>";
            }
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
      if(isset($_GET["brand"])=="product"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກຍີ່ຫໍ້ສິນຄ້ານີ້ມີຢູ່ໃນສິນຄ້າແລ້ວ !", "error");
        </script>';
      }  
      if(isset($_GET["Checkbox"])=="null"){
        echo'<script type="text/javascript">
        swal("", "ກະລຸນາເລືອກລາຍການກ່ອນ !", "info");
        </script>';
      }  
      if(isset($_GET["Checkdelete"])=="true"){
        $msg = $_GET["idtable"];
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດຍີ່ຫໍ້ສິນຄ້າ: '.$msg.' ນີ້ມີຢູ່ໃນຕາຕະລາງສິນຄ້າແລ້ວ ", "error");
        </script>';
      }  
      if(isset($_GET["name"])=="same"){
        echo'<script type="text/javascript">
        swal("", "ຊື່ຍີ່ຫໍ້ສິນຄ້ານີ້ມີຢູ່ແລ້ວ ກະລຸນາປ້ອນຊື່ທີ່ແຕກຕ່າງ !", "info");
        </script>';
      }  
  ?>

<script>
const myform_form_Save = document.getElementById("form_Save");
const brand_name = document.getElementById("brand_name");
const load_save = document.getElementById("load_save");
const btnSave_load = document.getElementById("btnSave_load");
myform_form_Save.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Save();
});

function checkInputs_form_Save() {
    const brand_nameValue = brand_name.value.trim();
    if (brand_nameValue === "") {
        setErrorFor(brand_name, 'ກະລຸນາປ້ອນຊື່ປະເພດສິນຄ້າ');
    } else {
        setSuccessFor(brand_name);
    }
    if (brand_nameValue !== "") {
        setloading(load_save, btnSave_load);
        document.getElementById("form_Save").action = "Brand";
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
    document.getElementById("form_Delete").action = "Brand";
    document.getElementById("form_Delete").submit();
}
const myform_form_Update = document.getElementById("form_Update");
const brand_name2 = document.getElementById("brand_name2");
const load_Update = document.getElementById("load_Update");
const btnUpdate_load = document.getElementById("btnUpdate_load");
myform_form_Update.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Update();
});

function checkInputs_form_Update() {
    const brand_name2Value = brand_name2.value.trim();
    if (brand_name2Value === "") {
        setErrorFor(brand_name2, 'ກະລຸນາປ້ອນຊື່ປະເພດສິນຄ້າ');
    } else {
        setSuccessFor(brand_name2);
    }
    if (brand_name2Value !== "") {
        setloading(load_Update, btnUpdate_load);
        document.getElementById("form_Update").action = "Brand";
        document.getElementById("form_Update").submit();
    }
}
</script>
<script>
$(document).ready(function() {
    load_data("%%", "0");

    function load_data(query, page) {
        $.ajax({
            url: "fetch_brand.php",
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