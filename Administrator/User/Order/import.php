<?php
  $title = "ນຳເຂົ້າສິນຄ້າ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການສິນຄ້າ</b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="Import" id="form_add" method="POST" enctype="multipart/form-data">
            <a href="#" data-toggle="modal" data-target="#exampleModalemp">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalemp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ນຳເຂົ້າສິນຄ້າ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລະຫັດສິນຄ້າ</label>
                                    <input type="text" name="pro_id_import" id="pro_id_import" placeholder="ລະຫັດສິນຄ້າ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຈຳນວນ</label>
                                    <input type="number" min="0" name="qty" id="qty" class="form-control"
                                        placeholder="ຈຳນວນ">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລາຄາ</label>
                                    <input type="number" min="0" name="price" id="price" class="form-control"
                                        placeholder="ລາຄາ">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ໝາຍເຫດ</label>
                                    <input type="text" name="remark" id="remark" placeholder="ໝາຍເຫດ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" name="btnAdd" id="btnAdd" class="btn btn-outline-primary">ບັນທຶກ
                                <span class="" id="load_add"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="clearfix"></div><br>
<div class="container-fluid font12">
    <div class="row">
        <div class="col-md-8">
            <?php
                $amount = 0;
                $obj->select_import_cookie();
                if(isset($_COOKIE['list_import'])){
            ?>
            <div class="table-responsive">
                <table class="table-bordered" style="width: 1500px;text-align: center;">
                    <tr style="font-size: 18px;">
                        <th style="width: 50px;"><a href="#" data-toggle="modal" data-target="#exampleModalClear"
                                class="clear">ລ້າງ</a></th>
                        <th>ລຳດັບ</th>
                        <th>ສິນຄ້າ</th>
                        <th>ລະຫັດສິນຄ້າ</th>
                        <th>ຊື່ສິນຄ້າ</th>
                        <th>ຈຳນວນ</th>
                        <th>ລາຄາ</th>
                        <th>ລວມ</th>
                        <th>ໝາຍເຫດ</th>
                    </tr>
                    <?php
                        $no_ = 0;
                        foreach($cart_data as $row){
                        $amount += $row["qty"] * $row["price"];
                        $total = 0;
                        $total += $row["qty"] * $row["price"];
                    ?>
                    <tr>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#exampleModaldel"
                                class="fa fa-trash toolcolor btnDelete_cookie"></a>
                        </td>
                        <td><?php echo $no_ += 1; ?></td>
                        <?php
                                    if($row['img'] == ''){
                                    ?>
                        <td>
                            <a href="<?php echo $path?>image/image.jpeg"><img src="<?php echo $path?>image/image.jpeg"
                                    alt=" class=" img-circle elevation-2 alt="" width="55px"></a>
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
                        <td><?php echo $row["remark"] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
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
            <br>
            <!-- pagination -->
        </div>
        <div class="col-lg-3 font12">
            <div class="row row-cols-1 row-cols-md-1">
                <div class="col mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 align="center" class="card-title"></h5>
                            <p class="card-text">
                            <form action="Import" id="formSave" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        ຍອມລວມ <br>
                                        <h5 style="color: #CE3131;"> <?php echo number_format($amount,2) ?> ກີບ</h5>
                                    </div>
                                    <hr size="3" align="center" width="100%">
                                    <div class="col-md-12 form-control2">
                                        <label>ຜູ້ສະໜອງ</label>
                                        <select name="sup_id_import" id="sup_id_import" class="selectcenter">
                                            <option value="" disabled selected>--- ເລືອກຜູ້ສະໜອງ ---</option>
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
                                    <div class="col-md-12 form-control2">
                                        <label>ເລກທີໃບນຳເຂົ້າ</label>
                                        <input type="text" id="import_no" name="import_no" placeholder="ເລກທີໃບນຳເຂົ້າ">
                                        <i class="fas fa-check-circle "></i>
                                        <i class="fas fa-exclamation-circle "></i>
                                        <small class="">Error message</small>
                                    </div>
                                    <div class="col-md-12 form-control2">
                                        <label>ເລກທີໃບສັ່ງຊື້</label>
                                        <input type="text" id="order_id_import" name="order_id_import" placeholder="ເລກທີໃບສັ່ງຊື້">
                                        <i class="fas fa-check-circle "></i>
                                        <i class="fas fa-exclamation-circle "></i>
                                        <small class="">Error message</small>
                                    </div>
                                    <div class="col-md-12" align="center">
                                        <input type="hidden" name="btnStock" id="btnStock">
                                        <button type="button" name="btnAdd" class="btn btn-outline-success"
                                            data-toggle="modal" data-target="#exampleModal2">ບັນທຶກການນຳເຂົ້າ</button>
                                        <div class="modal fade font14" id="exampleModal2" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">ຢຶນຢັນ</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" align="center">
                                                        ທ່ານຕ້ອງການບັນທຶກການນຳເຂົ້າສິນຄ້າ ຫຼື ບໍ່ ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-dismiss="modal">ຍົກເລີກ</button>
                                                        <button type="submit" name="btnSave" id="btnSave"
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
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.content-wrapper -->
<br>

<!-- modal form delete -->
<form action="Import" id="formDelete_cookie_one" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModaldel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    ທ່ານຕ້ອງການລົບຂໍ້ມູນ ຫຼື ບໍ່ ?
                    <input type="hidden" id="cookie_pro_id_import" name="cookie_pro_id_import">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnDelete_cookie_one" id="btnDelete_cookie_one"
                        class="btn btn-outline-danger">
                        ລົບ
                        <span class="" id="load_delete_cookie_one"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="Import" id="formClear" method="POST" enctype="multipart/form-data">
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
                    <input type="hidden" id="btnClear_import" name="btnClear_import">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnclear_form" id="btnclear_form"
                        class="btn btn-outline-danger">ລ້າງລາຍການ <span class="" id="load_Clear"></span>
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
      if(isset($_GET['order'])=='wrong'){
        echo'<script type="text/javascript">
        swal("", "ເລກທີໃບສັ່ງຊື້ບໍ່ຖືກຕ້ອງ", "error");
        </script>';
      }
      if(isset($_GET['product'])=='null'){
        echo'<script type="text/javascript">
        swal("", "ລະຫັດສິນຄ້າບໍ່ຖືກຕ້ອງ", "info");
        </script>';
      }
  ?>
<script>
const myform_form_add = document.getElementById("form_add");
const pro_id = document.getElementById("pro_id_import");
const qty = document.getElementById("qty");
const price = document.getElementById("price");
const remark = document.getElementById("remark");
const load_add = document.getElementById("load_add");
const btnAdd = document.getElementById("btnAdd");
myform_form_add.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_add();
});

function checkInputs_form_add() {
    const pro_idValue = pro_id.value.trim();
    const qtyValue = qty.value.trim();
    const priceValue = price.value.trim();
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
    if (priceValue === "") {
        setErrorFor(price, 'ກະລຸນາປ້ອນລາຄາ');
    } else {
        setSuccessFor(price);
    }
    if (pro_idValue !== "" && qtyValue !== "" & priceValue !== "") {
        setloading(load_add, btnAdd);
        document.getElementById("form_add").action = "Import";
        document.getElementById("form_add").submit();
    }
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
    document.getElementById("formClear").action = "Import";
    document.getElementById("formClear").submit();
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
    document.getElementById("formDelete_cookie_one").action = "Import";
    document.getElementById("formDelete_cookie_one").submit();
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

    $('#cookie_pro_id_import').val(data[3]);
});


const myform_formSave = document.getElementById("formSave");
const sup_id_import = document.getElementById("sup_id_import");
const order_id = document.getElementById("order_id_import");
const import_no = document.getElementById("import_no");
const load_save = document.getElementById("load_save");
const btnSave = document.getElementById("btnSave");
myform_formSave.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_formSave();
});

function checkInputs_formSave() {
    const sup_id_importValue = sup_id_import.value.trim();
    const order_idValue = order_id.value.trim();
    const import_noValue = import_no.value.trim();
    if (sup_id_importValue === "") {
        setErrorFor(sup_id_import, 'ກະລຸນາເລືອກຜູ້ສະໜອງ');
    } else {
        setSuccessFor(sup_id_import);
    }
    if (order_idValue === "") {
        setErrorFor(order_id, 'ກະລຸນາປ້ອນເລກທີໃບສັ່ງຊື້');
    } else {
        setSuccessFor(order_id);
    }
    if (sup_id_importValue !== "" && order_idValue !== "") {
        setloading(load_save, btnSave);
        document.getElementById("formSave").action = "Import";
        document.getElementById("formSave").submit();
    }
}
</script>