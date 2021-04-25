<?php
  $title = "ພະນັກງານ";
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
                <input type="hidden" name="id" id="id">
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
                <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" align="left">
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຊື່</label>
                        <input type="text" name="emp_name2" id="emp_name2" placeholder="ຊື່" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ນາມສະກຸນ</label>
                        <input type="text" name="surname2" id="surname2" placeholder="ນາມສະກຸນ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ເພດ</label>
                        <select name="gender2" id="gender2">
                            <option value="">ເລືອກເພດ</option>
                            <option value="ຍິງ">ຍິງ</option>
                            <option value="ຊາຍ">ຊາຍ</option>
                        </select>
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
                        <label>ທີ່ຢູ່ປັດຈຸບັນ</label>
                        <textarea name="address2" id="address2" cols="5" rows="3" placeholder="ທີ່ຢູ່ປັດຈຸບັນ"></textarea>
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
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ລະຫັດຜ່ານ</label>
                        <input type="password" name="pass2" id="pass2" placeholder="ລະຫັດຜ່ານ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ສະຖານະຜູ້ໃຊ້ລະບົບ</label>
                        <select name="status2" id="status2">
                            <option value="">ເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ</option>
                            <option value="ເຈົ້າຂອງຮ້ານ">ເຈົ້າຂອງຮ້ານ</option>
                            <option value="ພະນັກງານຂາຍ">ພະນັກງານຂາຍ</option>
                        </select>
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
                        <label>ຊື່</label>
                        <input type="text" name="emp_name" id="emp_name" placeholder="ຊື່" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ນາມສະກຸນ</label>
                        <input type="text" name="surname" id="surname" placeholder="ນາມສະກຸນ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ເພດ</label>
                        <select name="gender" id="gender">
                            <option value="">ເລືອກເພດ</option>
                            <option value="ຍິງ">ຍິງ</option>
                            <option value="ຊາຍ">ຊາຍ</option>
                        </select>
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
                        <label>ທີ່ຢູ່ປັດຈຸບັນ</label>
                        <textarea name="address" id="address" cols="5" rows="3" placeholder="ທີ່ຢູ່ປັດຈຸບັນ"></textarea>
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
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ລະຫັດຜ່ານ</label>
                        <input type="password" name="pass" id="pass" placeholder="ລະຫັດຜ່ານ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ສະຖານະຜູ້ໃຊ້ລະບົບ</label>
                        <select name="status" id="status">
                            <option value="">ເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ</option>
                            <option value="ເຈົ້າຂອງຮ້ານ">ເຈົ້າຂອງຮ້ານ</option>
                            <option value="ພະນັກງານຂາຍ">ພະນັກງານຂາຍ</option>
                        </select>
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
<!-- End Add -->

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
                <button type="submit" name="Com_Update" id="Com_Update" class="btn btn-outline-danger" onclick="">
                    ລົບຂໍ້ມູນ
                    <span class="" id="load_save"></span>
                </button>
            </div>
        </div>
    </div>
</div>
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
<div class="row">
    <div class="table-responsive">
        <table class="table-bordered" style="width: 1700px;text-align: center;">
            <tr style="font-size: 18px;">
                <th style="width: 120px;">ເຄື່ອງມື</th>
                <th style="width: 70px;">ລຳດັບ</th>
                <th style="width: 150px;">ຊື່</th>
                <th style="width: 150px;">ນາມສະກຸນ</th>
                <th style="width: 180px;">ເພດ</th>
                <th style="width: 200px;">ເບີໂທລະສັບ</th>
                <th style="width: 250px;">ທີ່ຢ່</th>
                <th style="width: 150px;">ອີເມວ</th>
                <th style="width: 250px;">ລະຫັດຜ່ານ</th>
                <th style="width: 170px;">ສະຖານະຜູ້ໃຊ້ລະບົບ</th>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="sticker[]" value="" id="flexCheckDefault">
                    &nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#exampleModalupdate"
                        class="fa fa-pen toolcolor btnUpdateCompany"></a>&nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#exampleModaldel"
                        class="fa fa-trash toolcolor btnDelete_com"></a>
                </td>
                <td>1</td>
                <td>ທ້າວ ເປັບຊີ</td>
                <td>ສີອັກຄະສອນ</td>
                <td>ຊາຍ</td>
                <td>020 2352 2342</td>
                <td>ນະຄອນຫຼວງ</td>
                <td>ອີເມວ</td>
                <td>E322s324t292sfsg2452</td>
                <td style="display: none">2</td>
                <td>ພະນັກງານຂາຍ</td>
            </tr>
        </table>
    </div>
</div>
<?php
    include ("../../header-footer/footer.php");
  ?>