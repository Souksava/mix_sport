<?php
  $title = "ອັດຕາແລກປ່ຽນ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<!-- del one -->
<form action="Rate" method="POST" id="form_Delete">
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
<form action="Rate" method="POST" id="form_update">
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
                            <label>ເລດຊື້</label>
                            <input type="text" min="0" name="buy2" id="buy2" placeholder="ເລດຊື້" class="form-control">
                            <input type="hidden" name="rate_id2" id="rate_id2">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເລດຂາຍ</label>
                            <input type="text" min="0" name="sell2" id="sell2" placeholder="ເລດຂາຍ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btn_update_rate" id="btn_update_rate" class="btn btn-outline-success" onclick="">
                        ແກ້ໄຂ
                        <span class="" id="load_update_rate"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Update -->
<!-- Add -->
<form action="Rate" method="POST" id="form_Save">
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
                            <label>ສະກຸນເງິນ</label>
                            <input type="text" name="rate_id" id="rate_id" placeholder="ສະກຸນເງິນ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເລດຊື້</label>
                            <input type="number" name="buy" id="buy" placeholder="ເລດຊື້" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເລດຂາຍ</label>
                            <input type="number" name="sell" id="sell" placeholder="ເລດຂາຍ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btn_save_rate" id="btn_save_rate" class="btn btn-outline-primary"
                        onclick="">
                        ເພີ່ມຂໍ້ມູນ
                        <span class="" id="load_save_rate"></span>
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
                <th>ສະກຸນເງິນ</th>
                <th>ຊື້</th>
                <th>ຂາຍ</th>
            </tr>
            <?php
                $obj->select_rate();
                foreach($result_rate as $row){
            ?>
            <tr>
                <td>
                    <a href="#" data-toggle="modal" data-target="#exampleModalupdate"
                        class="fa fa-pen toolcolor btnUpdateCompany"></a>&nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#exampleModaldel"
                        class="fa fa-trash toolcolor btnDelete_com"></a>
                </td>
                <td><?php echo $row["rate_id"] ?></td>
                <td><?php echo number_format($row["rate_buy"],2) ?></td>
                <td style="display: none;"><?php echo $row["rate_buy"] ?></td>
                <td><?php echo number_format($row["rate_sell"],2) ?></td>
                <td style="display: none;"><?php echo $row["rate_sell"] ?></td>
            </tr>
            <?php
                }
                mysqli_free_result($result_rate);  
                mysqli_next_result($conn);
            ?>
        </table>
    </div>
</div>
<?php
    if(isset($_POST["rate_id"])){
        $obj->insert_rate(trim($_POST["rate_id"]),$_POST["buy"],$_POST["sell"]);
    }
    if(isset($_POST["rate_id2"])){
        $obj->update_rate(trim($_POST["rate_id2"]),$_POST["buy2"],$_POST["sell2"]);
    }
    if(isset($_POST["id"])){
        $obj->del_rate(trim($_POST["id"]));
    }
    if(isset($_GET["rateid"])=="same"){
        echo'<script type="text/javascript">
        swal("", "ສະກຸນເງິນນີ້ມີຢູ່ແລ້ວ ກະລຸນາໃສ່ສະກຸນເງິນທີ່ແຕກຕ່າງ !", "info");
        </script>';
      }  
    if(isset($_GET["rate"])=="found"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກສະກຸນເງິນ THB ແລະ USD ສະຫງວນໄວ້ !", "error");
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
const myform_form_Save = document.getElementById("form_Save");
const rate_id = document.getElementById("rate_id");
const buy = document.getElementById("buy");
const sell = document.getElementById("sell");
const load_save_rate = document.getElementById("load_save_rate");
const btn_save_rate = document.getElementById("btn_save_rate");
myform_form_Save.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Save();
});

function checkInputs_form_Save() {
    const rate_idValue = rate_id.value.trim();
    const buyValue = buy.value.trim();
    const sellValue = sell.value.trim();
    if (rate_idValue === "") {
        setErrorFor(rate_id, 'ກະລຸນາປ້ອນສະກຸນເງິນ');
    } else {
        setSuccessFor(rate_id);
    }
    if (buyValue === "") {
        setErrorFor(buy, 'ກະລຸນາປ້ອນເລດຊື້');
    } else {
        setSuccessFor(buy);
    }
    if (sellValue === "") {
        setErrorFor(sell, 'ກະລຸນາປ້ອນເລດຂາຍ');
    } else {
        setSuccessFor(sell);
    }
    if (rate_idValue !== "" && buyValue !== "" && sellValue !== "") {
        setloading(load_save_rate, btn_save_rate);
        document.getElementById("form_Save").action = "Rate";
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
    document.getElementById("form_Delete").action = "Rate";
    document.getElementById("form_Delete").submit();
}


const myform_update_Save = document.getElementById("form_update");
const rate_id2 = document.getElementById("rate_id2");
const buy2 = document.getElementById("buy2");
const sell2 = document.getElementById("sell2");
const load_update_rate = document.getElementById("load_update_rate");
const btn_update_rate = document.getElementById("btn_update_rate");
myform_update_Save.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_update();
});

function checkInputs_form_update() {
    const rate_id2Value = rate_id2.value.trim();
    const buy2Value = buy2.value.trim();
    const sell2Value = sell2.value.trim();
    if (rate_id2Value === "") {
        setErrorFor(rate_id2, 'ກະລຸນາປ້ອນສະກຸນເງິນ');
    } else {
        setSuccessFor(rate_id2);
    }
    if (buy2Value === "") {
        setErrorFor(buy2, 'ກະລຸນາປ້ອນເລດຊື້');
    } else {
        setSuccessFor(buy2);
    }
    if (sell2Value === "") {
        setErrorFor(sell2, 'ກະລຸນາປ້ອນເລດຂາຍ');
    } else {
        setSuccessFor(sell2);
    }
    if (rate_id2Value !== "" && buy2Value !== "" && sell2Value !== "") {
        setloading(load_update_rate, btn_update_rate);
        document.getElementById("form_update").action = "Rate";
        document.getElementById("form_update").submit();
    }
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

    $('#rate_id2').val(data[1]);
    $('#buy2').val(data[3]);
    $('#sell2').val(data[5]);
});
</script>