<?php
  $title = "ສັ່ງຊື້ສິນຄ້າ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<style>
.click:hover{
    cursor: pointer;
}
</style>
<div style="width: 100%;">
    <b>ລາຍການສິນຄ້າ</b>&nbsp <img src="<?php echo $path ?>icon/hidemenu.ico" width="10px">
</div>
<div class="row">
    <div class="col-md-7">
        <div class="table-responsive">
            <table class="table font12" style="width: 1000px;">
                <tr>
                    <th style="width: 50px;">ລຳດັບ</th>
                    <th style="width: 60px;">ສິນຄ້າ</th>
                    <th style="width: 120px;">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 150px;">ຊື່ສິນຄ້າ</th>
                    <th style="width: 80px;">ຈຳນວນ</th>
                    <th style="width: 100px;">ເງື່ອນໄຂສັ່ງຊື້</th>
                </tr>
                <tr class="result click" data-toggle="modal" data-target="#exampleModalUpdate">
                    <td>1</td>
                    <td>
                        <img src="../../image/product.jpeg" class="img-circle elevation-2" alt="" width="55px">
                    </td>
                    <td>105052100001</td>
                    <td>
                        ເສືອຍືດ Polo ສະກ໋ອດ M
                    </td>
                    <td>5 ຜືນ</td>
                    <td>10 ຜືນ</td>
                </tr>
            </table>
        </div>

    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h5 align="center" class="card-title"></h5>
                <p class="card-text">
                <form action="form" id="form_save" method="POST">
                    <div>
                        ເລກທີໃບສັ່ງຊື້: 1
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-control2">
                                <select name="cus_id" id="cus_id" class="selectcenter">
                                    <option value="" disabled selected>--- ຜູ້ສະໜອງ ---</option>
                                </select>
                                <i class="fas fa-check-circle "></i>
                                <i class="fas fa-exclamation-circle "></i>
                                <small class="">Error message</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div align="center-right">
                                <button type="button" name="btnAdd" class="btn btn-outline-success btn-block"
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
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">ຍົກເລີກ</button>
                                                <button type="submit" name="Save" id="btnSave"
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
                            <tr>
                                <td>1</td>
                                <td>
                                    <img src="../../image/product.jpeg" class="img-circle elevation-2" alt=""
                                        width="35px">
                                </td>
                                <td>105052100001</td>
                                <td>ເສືອຍືດ Polo ສະກ໋ອດ M</td>
                                <td>1 ຜືນ</td>
                                <td>25,000</td>
                                <td>25,000</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#exampleModalDelete"
                                        class="fa fa-trash toolcolor btnDelete_com"></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12" align="right">
                        <br>
                        <h5 style="color: #CE3131;">ມູນຄ່າ 25,000 LAK</h5>
                        <input type="hidden" name="amount" id="amount" value="">
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>

<form action="form" id="formClear" method="POST" enctype="multipart/form-data">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="clear_form" class="btn btn-outline-danger">ລ້າງລາຍການ</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- modal form delete -->
<form action="form" id="formDelete" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnDelete_form" id="btnDelete" class="btn btn-outline-danger">
                        ລົບ
                        <span class="" id="load_delete"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- modal form add -->
<form action="form" id="formUpdate" method="POST" enctype="multipart/form-data">
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
                            <input type="hidden" name="form_add" id="form_add">
                            <label>ຮູບສິນຄ້າ</label>
                            <div class="col-md-12 col-sm-6 form-control2">
                                <img src="../../image/product.jpeg" id="output2" width="100%" height="250">
                            </div>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຈຳນວນ</label>
                            <input type="hidden" name="code" id="code">
                            <input type="number" min="1" name="qty" id="qty" placeholder="ຈຳນວນ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ລາຄາ</label>
                            <input type="number" min="1" name="qty" id="qty" placeholder="ລາຄາ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnUpdate" id="btnAdd" class="btn btn-outline-success" onclick="">ເພີ່ມ
                        <span class="" id="load_add"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
    include ("../../header-footer/footer.php");
  ?>