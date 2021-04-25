<?php
  $title = "ອັດຕາແລກປ່ຽນ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<!-- del one -->
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                <button type="submit" name="Com_Update" id="Com_Update" class="btn btn-outline-danger" onclick="">
                    ລົບຂໍ້ມູນ
                    <span class="" id="load_save"></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End del one -->
<!-- Update -->
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
                        <input type="text" name="buy2" id="buy2" placeholder="ເລດຊື້" class="form-control">
                        <input type="hidden" name="rate_id2" id="rate_id2">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ເລດຂາຍ</label>
                        <input type="text" name="sell2" id="sell2" placeholder="ເລດຂາຍ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                <button type="submit" name="Com_Update" id="Com_Update" class="btn btn-outline-success" onclick="">
                    ແກ້ໄຂ
                    <span class="" id="load_save"></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Update -->
<!-- Add -->
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
                        <input type="text" name="buy" id="buy" placeholder="ເລດຊື້" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ເລດຂາຍ</label>
                        <input type="text" name="sell" id="sell" placeholder="ເລດຂາຍ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                <button type="submit" name="Com_Update" id="Com_Update" class="btn btn-outline-primary" onclick="">
                    ເພີ່ມຂໍ້ມູນ
                    <span class="" id="load_save"></span>
                </button>
            </div>
        </div>
    </div>
</div>
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
            <tr>
                <td>
                    <a href="#" data-toggle="modal" data-target="#exampleModalupdate"
                        class="fa fa-pen toolcolor btnUpdateCompany"></a>&nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#exampleModaldel"
                        class="fa fa-trash toolcolor btnDelete_com"></a>
                </td>
                <td>LAK</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <td>
                    <a href="#" data-toggle="modal" data-target="#exampleModalupdate"
                        class="fa fa-pen toolcolor btnUpdateCompany"></a>&nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#exampleModaldel"
                        class="fa fa-trash toolcolor btnDelete_com"></a>
                </td>
                <td>THB</td>
                <td>300.00</td>
                <td>301.00</td>
            </tr>
            <tr>
                <td>
                    <a href="#" data-toggle="modal" data-target="#exampleModalupdate"
                        class="fa fa-pen toolcolor btnUpdateCompany"></a>&nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#exampleModaldel"
                        class="fa fa-trash toolcolor btnDelete_com"></a>
                </td>
                <td>USD</td>
                <td>10,000.00</td>
                <td>11,000.00</td>
            </tr>
        </table>
    </div>
</div>
<?php
    include ("../../header-footer/footer.php");
  ?>