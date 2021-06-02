<?php
  $title = "ສັ່ງຊື້ສິນຄ້າ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<style>
.click:hover {
    cursor: pointer;
}
</style>
<div style="width: 100%;">
    <b>ລາຍການສິນຄ້າ</b>&nbsp <img src="<?php echo $path ?>icon/hidemenu.ico" width="10px">
</div>
<div class="row">
    <div class="col-md-7">
        <div id="result_data" class="result_data">
            <?php
                include ($path."header-footer/loading.php");
            ?>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h5 align="center" class="card-title"></h5>
                <p class="card-text">
                <form action="form" id="form_save" method="POST">
                    <div>
                        ເລກທີໃບສັ່ງຊື້: <label class="order_id"></label>
                    </div>
                    <form action="Order" method="POST" id="form_save">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-control2">
                                    <select name="sup_id" id="sup_id" class="selectcenter">
                                        <option value="" disabled selected>--- ຜູ້ສະໜອງ ---</option>
                                    <?php
                                        $supplier = mysqli_query($conn,"call select_supplier('%%')");
                                        foreach($supplier as $row_supplier){
                                    ?>
                                        <option value="<?php echo $row_supplier["sup_id"] ?>">
                                            <?php echo $row_supplier["company"] ?>
                                        </option>
                                        <?php
                                        }
                                        mysqli_free_result($supplier);  
                                        mysqli_next_result($conn);
                                    ?>
                                    </select>
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div align="center-right">
                                    <button type="button" name="btnAdd" id="btn_order" class="btn btn-outline-success btn-block"
                                        data-toggle="modal" data-target="#exampleModal2"
                                        style="padding: 8px 0px 8px 0px">ສັ່ງຊື້</button>
                                    <div class="modal fade font14" id="exampleModal2" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">ຢຶນຢັນ</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body" align="center">
                                                    ທ່ານຕ້ອງການຈະບັນທຶກຂໍ້ມູນຟອມເຂົ້າໃນລະບົບ ຫຼື ບໍ່ ?
                                                    <input type="hidden" id="order_id" name="order_id">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-dismiss="modal">ຍົກເລີກ</button>
                                                    <button type="submit" name="Save" id="btnSave_load"
                                                        class="btn btn-outline-success" onclick="">
                                                        ບັນທຶກ
                                                        <span class="" id="load_save"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        $amount = 0;
                        $obj->select_order_cookie();
                        if(isset($_COOKIE['list_order'])){
                    ?>
                    <div class="table-responsive2" style="text-align: center;">
                        <table class="table font12" style="width: 750px">
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>ສິນຄ້າ</th>
                                <th>ລະຫັດສິນຄ້າ</th>
                                <th>ຊື່ສິນຄ້າ</th>
                                <th>ຈຳນວນ</th>
                                <th>ລາຄາ</th>
                                <th>ລວມ</th>
                                <th style="width: 75px;"><a href="#" data-toggle="modal"
                                        data-target="#exampleModalClear" class="clear">ລ້າງ</a></th>
                            </tr>
                            <?php
                                $no_ = 0;
                                foreach($cart_data as $row){
                                $amount += $row["qty"] * $row["price"];
                                $total = 0;
                                $total += $row["qty"] * $row["price"];
                            ?>
                            <tr>
                                <td><?php echo $no_ += 1; ?></td>
                                <?php
                                    if($row['img'] == ''){
                                    ?>
                                <td>
                                    <a href="<?php echo $path?>image/image.jpeg"><img
                                            src="<?php echo $path?>image/image.jpeg" alt=" class=" img-circle
                                            elevation-2 alt="" width="55px"></a>
                                </td>
                                <?php
                                    }
                                    else{
                                    ?>
                                <td>
                                    <a href="<?php echo $path?>image/<?php echo $row['img'] ?>"><img
                                            src="<?php echo $path?>image/<?php echo $row['img'] ?>" alt=""
                                            class="img-circle elevation-2" alt="" width="55px"></a>
                                </td>
                                <?php
                                    }
                                    ?>
                                <td><?php echo $row["pro_id"] ?></td>
                                <td><?php echo $row["cate_name"] ?> <?php echo $row["brand_name"] ?>
                                    <?php echo $row["pro_name"] ?> <?php echo $row["size_name"] ?></td>
                                <td><?php echo $row["qty"] ?> <?php echo $row["unit_name"] ?></td>
                                <td><?php echo number_format($row["price"],2) ?></td>
                                <td><?php echo number_format($total,2) ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#exampleModalDelete_cookie"
                                        class="fa fa-trash toolcolor btnDelete_cookie"></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                    <div class="col-md-12" align="right">
                        <br>
                        <h5 style="color: #CE3131;">ມູນຄ່າ: <?php echo number_format($amount,2) ?> LAK</h5>
                        <input type="hidden" name="amount" id="amount" value="">
                    </div>
                    <?php
                    }
                    else{
                        echo'
                        <div align="center">
                            <hr size="1" style="width: 90%;"/>
                                ຍັງບໍ່ມີຂໍ້ມູນ
                            <hr size="1" style="width: 90%;"/>
                        </div>
                    ';
                    }
                    ?>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>

<form action="Order" id="formClear" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalClear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ຢືນຢັນການລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" align="center">
                    ທ່ານຕ້ອງການລ້າງລາຍການ ຫຼື ບໍ່ ?
                    <input type="hidden" id="btnClear" name="btnClear">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnclear_form" id="btnclear_form" class="btn btn-outline-danger">ລ້າງລາຍການ <span class=""
                            id="load_Clear"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- modal form delete -->
<form action="form" id="formDelete_cookie_one" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalDelete_cookie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ຢືນຢັນການລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" align="center">
                    <input type="hidden" name="del_list_form_id" id="del_list_form_id">
                    ທ່ານຕ້ອງການລົບຂໍ້ມູນ ຫຼື ບໍ່ ?
                    <input type="hidden" id="cookie_pro_id" name="cookie_pro_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnDelete_cookie_one" id="btnDelete_cookie_one" class="btn btn-outline-danger">
                        ລົບ
                        <span class="" id="load_delete_cookie_one"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- modal form add -->
<form action="Order" id="Form_Add" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມລາຍການສັ່ງຊື້</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" align="left">
                        <div class="col-md-12 col-sm-6 form-control2">
                            <input type="hidden" name="pro_id_order" id="pro_id_order">
                            <label>ຮູບສິນຄ້າ</label>
                            <div class="col-md-12 col-sm-6 form-control2">
                                <img src="../../image/product.jpeg" id="output" width="100%" height="250">
                            </div>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຈຳນວນ</label>
                            <input type="number" min="0" name="qty" id="qty" placeholder="ຈຳນວນ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ລາຄາ</label>
                            <input type="number" min="0" name="price" id="price" placeholder="ລາຄາ"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-outline-success"
                        onclick="">ເພີ່ມ
                        <span class="" id="load_update"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
    include ("../../header-footer/footer.php");
    if(isset($_GET['list'])=='null'){
        echo'<script type="text/javascript">
        swal("", "ກະລຸນາເພີ່ມລາຍການສັ່ງຊື້ກ່ອນ", "info");
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
      if(isset($_GET['product'])=='null'){
        echo'<script type="text/javascript">
        swal("", "ລະຫັດສິນຄ້າບໍ່ຖືກຕ້ອງ", "info");
        </script>';
      }
  ?>
<script>
loadorder();

function loadorder() {
    $.ajax({
        url: "order_id.php",
        success: function(result) {
            $('#order_id').val(result); //insert text of test.php into your div
            $('.order_id').text(result); //insert text of test.php into your div
            setTimeout(function() {
                loadorder(); //this will send request again and again;
            }, 2000);
        }
    });
}
</script>
<script>
$(document).ready(function() {
    load_data("%%", "0");

    function load_data(query, page) {
        $.ajax({
            url: "fetch_order.php",
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

    function load_data_alert(page) {
        $.ajax({
            url: "fetch_order_alert.php",
            method: "POST",
            data: {
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
    $(document).on("click", ".qtyalert", function() {
        load_data_alert("0");
    });
    $(document).on("click", ".page-links_tables", function() {
        var page = this.id;
        load_data_alert(page);

    });
});
</script>
<script>
const myform_form_Save = document.getElementById("form_save");
const sup_id = document.getElementById("sup_id");
const load_save = document.getElementById("load_save");
const btnSave_load = document.getElementById("btnSave_load");
myform_form_Save.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Save();
});

function checkInputs_form_Save() {
    const sup_idValue = sup_id.value.trim();
    if (sup_idValue === "") {
        setErrorFor(sup_id, 'ກະລຸນາເລືອກຜູ້ສະໜອງ');
    } else {
        setSuccessFor(sup_id);
    }
    if (sup_idValue !== "") {
        setloading(load_save, btnSave_load);
        document.getElementById("form_save").action = "Order";
        document.getElementById("form_save").submit();
    }
}


const myform_form_add = document.getElementById("Form_Add");
const qty = document.getElementById("qty");
const price = document.getElementById("price");
const load_update = document.getElementById("load_update");
const btnUpdate = document.getElementById("btnUpdate");
myform_form_add.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_add();
});

function checkInputs_form_add() {
    const qtyValue = qty.value.trim();
    const priceValue = price.value.trim();
    if (qtyValue === "") {
        setErrorFor(qty, 'ກະລຸນາເລືອກຜູ້ສະໜອງ');
    } else {
        setSuccessFor(qty);
    }
    if (priceValue === "") {
        setErrorFor(price, 'ກະລຸນາເລືອກຜູ້ສະໜອງ');
    } else {
        setSuccessFor(price);
    }
    if (qtyValue !== "" && priceValue !== "") {
        setloading(load_update, btnUpdate);
        document.getElementById("Form_Add").action = "Order";
        document.getElementById("Form_Add").submit();
    }
}


const myform_formDelete_cookie_one = document.getElementById("formDelete_cookie_one");
const load_delete_cookie_one = document.getElementById("load_delete_cookie_one");
const btnDelete_cookie_one = document.getElementById("btnDelete_cookie_one");
myform_formDelete_cookie_one.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_formDelete_cookie_one();
});

function checkInputs_formDelete_cookie_one() {
        setloading(load_delete_cookie_one, btnDelete_cookie_one);
        document.getElementById("formDelete_cookie_one").action = "Order";
        document.getElementById("formDelete_cookie_one").submit();
}



const myform_formClear = document.getElementById("formClear");
const load_Clear = document.getElementById("load_Clear");
const btnclear_form = document.getElementById("btnclear_form");
myform_formClear.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_formClear();
});

function checkInputs_formClear() {
        setloading(load_Clear, btnclear_form);
        document.getElementById("formClear").action = "Order";
        document.getElementById("formClear").submit();
}
</script>
<script>
   $('.btnDelete_cookie').on('click', function() {
        $('#exampleModalDelete_cookie').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#cookie_pro_id').val(data[2]);
    });
</script>