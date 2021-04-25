<?php
  $title = "ຂາຍສິນຄ້າ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<div class="container-fluid font12">
    <div class="row">
        <div class="col-md-8">
            <form action="sale.php" id="form1" method="POST">
                <div class="input-group">
                    <input type="text" name="pro_id" placeholder="ລະຫັດສິນຄ້າ" class="form-control" autofocus>
                    <input type="number" min="0" name="qty" placeholder="ຈຳນວນ" class="form-control">
                    <div class="input-group-prepend">
                        <button type="submit" name="btnAdd" class="btn btn-outline-primary">ເພີ່ມລາຍການ</button>
                    </div>
                </div>
            </form>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <a href="board_sell.php" target="_blank">ລາຍການສິນຄ້າ</a>
                </div>
                <div class="col-xs-12 col-sm-6" align="right">
                    ເລກທີບິນ: 00001
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" style="width: 780px;">
                    <tr>
                        <th style="width: 57px;" scope="col">ສິນຄ້າ</th>
                        <th style="width: 120px;" scope="col">ຊື່ສິນຄ້າ</th>
                        <th style="width: 60px;" scope="col">ຈຳນວນ</th>
                        <th style="width: 80px;" scope="col">ລາຄາ</th>
                        <th style="width: 100px;" scope="col">ລວມ</th>
                        <th style="width: 35px;"></th>
                    </tr>
                    <tr>
                        <td scope="row">
                            <img src="../../image/product.jpeg" class="img-circle elevation-2" alt="" width="55px">
                        </td>
                        <td>
                            ເສືອຍືດ Polo ສະກ໋ອດ M
                        </td>
                        <td>
                            5 ຜືນ
                        </td>
                        <td>
                            <h6 style="color: #CE3131;">ລາຄາ 50,000 ກີບ</h6>
                        </td>
                        <td>
                            <h6 style="color: #CE3131;">250,000 ກີບ</h6>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#exampleModaldel"
                                class="fa fa-trash toolcolor btnDelete_com"></a>
                        </td>
                    </tr>
                </table>
                <hr size="3" align="center" width="100%">
            </div>
        </div>
        <div class="col-lg-3 font12">
            <div class="row row-cols-1 row-cols-md-1">
                <div class="col mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 align="center" class="card-title"></h5>
                            <p class="card-text">
                            <form action="sale2.php" id="form1" method="POST">
                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        <button type="button" name="btnSale" name="btncontinue" data-toggle="modal"
                                            data-target="#exampleModalSell" class="btn btn-outline-success">
                                            ດຳເນີນການຂາຍ
                                        </button><br>
                                        <div class="modal fade" id="exampleModalSell" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">ປິດການຂາຍສິນຄ້າ
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" align="left">
                                                            <div class="col-md-12 form-control2">
                                                                <label for="">ຈຳນວນຮັບເງິນມາ</label>
                                                                <input type="text" placeholder="ຈຳນວນຮັບເງິນມາ"
                                                                    value="" value="">
                                                            </div>
                                                            <div class="col-md-12 form-control2">
                                                                <label for="">ມູນຄ່າທັງໝົດ</label>
                                                                <input type="text" placeholder="ມູນຄ່າທັງໝົດ"
                                                                    value="250,000 ກີບ" value="">
                                                            </div>
                                                            <div class="col-md-12 form-control2">
                                                                <label for="">ເງິນທອນກີບ</label>
                                                                <input type="text" placeholder="ເງິນທອນກີບ"
                                                                 value="50,000 LAK">
                                                            </div>
                                                            <div class="col-md-12 form-control2">
                                                                <label for="">ບາດ</label>
                                                                <input type="text" placeholder="ບາດ"
                                                                    value="200 THB">
                                                            </div>
                                                            <div class="col-md-12 form-control2">
                                                                <label for="">ໂດລ້າ</label>
                                                                <input type="text" placeholder="ໂດລ້າ"
                                                                 value="5 USD">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-dismiss="modal">ຍົກເລີກ</button>
                                                        <button type="submit" name="Com_Update" id="Com_Update"
                                                            class="btn btn-outline-success" onclick="">
                                                            ປິດການຂາຍ
                                                            <span class="" id="load_save"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr size="3" align="center" width="100%">
                                    <div class="col-md-12">
                                        ຍອມລວມ (ລວມພາສີມູນຄ່າເພີ່ມ)
                                        <h5 style="color: #CE3131;">250,000 ກີບ</h5>
                                        <h5 style="color: #7E7C7C;">1,000 THB</h5>
                                        <h5 style="color: #7E7C7C;">30 USD</h5>
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
<?php
    include ("../../header-footer/footer.php");
  ?>