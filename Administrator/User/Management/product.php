<?php
  $title = "ສິນຄ້າ";
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
                <P align="center">ທ່ານຕ້ອງການລົບຂໍ້ມູນ ຫຼື ບໍ່</P>
                <input type="text" name="id" id="id">
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
<!-- End del one -->
<!-- Update -->
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
                        <label>ຊື່ສິນຄ້າ</label>
                        <input type="hidden" name="pro_id2" id="pro_id2">
                        <input type="text" name="pro_name2" id="pro_name2" placeholder="ຊື່ສິນຄ້າ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ປະເພດສິນຄ້າ</label>
                        <select name="cate_id2" id="cate_id2">
                            <option value="">ເລືອກປະເພດສິນຄ້າ</option>
                            <option value="1">ເສື້ອຍືດ</option>
                            <option value="2">ສົ້ງ</option>
                        </select>
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຍີ່ຫໍ້</label>
                        <select name="brand_id2" id="brand_id2">
                            <option value="">ເລືອກຍີ່ຫໍ້</option>
                            <option value="1">Polo</option>
                            <option value="2">Nike</option>
                        </select>
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຈຳນວນ</label>
                        <input type="text" name="qty2" id="qty2" placeholder="ຈຳນວນ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຫົວໜ່ວຍສິນຄ້າ</label>
                        <select name="unit_id2" id="unit_id2">
                            <option value="">ເລືອກຫົວໜ່ວຍສິນຄ້າ</option>
                            <option value="1">ຜືນ</option>
                            <option value="2">ໂຕ</option>
                        </select>
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຂະໜາດ</label>
                        <select name="size_id2" id="size_id2">
                            <option value="">ເລືອກຂະໜາດ</option>
                            <option value="1">S</option>
                            <option value="2">M</option>
                        </select>
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ເວລາຮັບປະກັນ</label>
                        <input type="text" name="varanty2" id="varanty2" placeholder="ເວລາຮັບປະກັນ"
                            class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຫົວໜ່ວຍເວລາ</label>
                        <input type="text" name="type2" id="type2" placeholder="ຫົວໜ່ວຍເວລາ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ເງື່ອນໄຂການສັ່ງຊື້</label>
                        <input type="text" name="qtyalert2" id="qtyalert2" placeholder="ເງື່ອນໄຂການສັ່ງຊື້"
                            class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຮູບພາບສິນຄ້າ</label>
                        <input type="file" name="img_path2" id="img_path2" onchange="loadFile2(event)"
                            class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <img src="../../image/camera.jpg" id="output2" width="100%" height="250">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                <button type="submit" name="btn_load_save" id="btn_load_save" class="btn btn-outline-success"
                    onclick="">
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
                        <label>ລະຫັດສິນຄ້າ</label>
                        <input type="text" name="pro_id" id="pro_id" placeholder="ລະຫັດສິນຄ້າ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຊື່ສິນຄ້າ</label>
                        <input type="text" name="pro_name" id="pro_name" placeholder="ຊື່ສິນຄ້າ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ປະເພດສິນຄ້າ</label>
                        <select name="cate_id" id="cate_id">
                            <option value="">ເລືອກປະເພດສິນຄ້າ</option>
                            <option value="1">ເສື້ອ</option>
                            <option value="2">ສົ້ງ</option>
                        </select>
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຍີ່ຫໍ້</label>
                        <select name="brand_id" id="brand_id">
                            <option value="">ເລືອກຍີ່ຫໍ້</option>
                            <option value="1">Polo</option>
                            <option value="2">Zara</option>
                        </select>
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຈຳນວນ</label>
                        <input type="text" name="qty" id="qty" placeholder="ຈຳນວນ" class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຫົວໜ່ວຍສິນຄ້າ</label>
                        <select name="unit_id" id="unit_id">
                            <option value="">ເລືອກຫົວໜ່ວຍສິນຄ້າ</option>
                            <option value="1">ຜືນ</option>
                            <option value="2">ໂຕ</option>
                        </select>
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຂະໜາດ</label>
                        <select name="size_id" id="size_id">
                            <option value="">ເລືອກຂະໜາດ</option>
                            <option value="1">S</option>
                            <option value="2">M</option>
                        </select>
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ເງື່ອນໄຂການສັ່ງຊື້</label>
                        <input type="text" name="qtyalert" id="qtyalert" placeholder="ເງື່ອນໄຂການສັ່ງຊື້"
                            class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <label>ຮູບພາບສິນຄ້າ</label>
                        <input type="file" name="img_path" id="img_path" onchange="loadFile(event)"
                            class="form-control">
                        <i class="fas fa-check-circle "></i>
                        <i class="fas fa-exclamation-circle "></i>
                        <small class="">Error message</small>
                    </div>
                    <div class="col-md-12 col-sm-6 form-control2">
                        <img src="../../image/camera.jpg" id="output" width="100%" height="250">
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
        <table class="table-bordered" style="width: 1500px;text-align: center;">
            <tr style="font-size: 18px;">
                <th style="width: 120px;">ເຄື່ອງມື</th>
                <th>ລຳດັບ</th>
                <th>ລະຫັດສິນຄ້າ</th>
                <th>ສິນຄ້າ</th>
                <th>ຈຳນວນ</th>
                <th>ລາຄາ</th>
                <th>ເງື່ອນໄຂການສັ່ງຊື້</th>
                <th>ຮູບພາບ</th>
            </tr>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox" name="sticker[]" value="" id="flexCheckDefault">
                    &nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#btnUpdateProduct"
                        class="fa fa-pen toolcolor btnUpdateProduct"></a>&nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#exampleModaldel"
                        class="fa fa-trash toolcolor btnDelete_com"></a>
                </td>
                <td>1</td>
                <td>105052100001</td>
                <td style="display: none;">ສະກ໋ອດ</td>
                <td style="display: none;">1</td>
                <td style="display: none;">1</td>
                <td style="display: none;">2</td>
                <td style="display: none;">1</td>
                <td style="display: none;">5</td>
                <td style="display: none;">10</td>
                <td style="display: none;">../../image/product.jpeg</td>
                <td>
                    ເສືອຍືດ Polo ສະກ໋ອດ M
                </td>
                <td>5 ຜືນ</td>
                <td>50,000</td>
                <td>10 ຜືນ</td>
                <td>
                    <img src="../../image/product.jpeg" class="img-circle elevation-2" alt="" width="55px">
                </td>
            </tr>
        </table>
    </div>
</div>
<?php
    include ("../../header-footer/footer.php");
  ?>
<script>
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
var loadFile2 = function(event) {
    var output2 = document.getElementById('output2');
    output2.src = URL.createObjectURL(event.target.files[0]);
    output2.onload = function() {
        URL.revokeObjectURL(output2.src) // free memory
    }
};
</script>
<script>
    $('.btnUpdateProduct').on('click', function() {
        $('#btnUpdateProduct').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#pro_id2').val(data[2]);
        $('#pro_name2').val(data[3]);
        $('#cate_id2').val(data[4]);
        $('#brand_id2').val(data[5]);
        $('#size_id2').val(data[6]);
        $('#unit_id2').val(data[7]);
        $('#qty2').val(data[8]);
        $('#qtyalert2').val(data[9]);
        if(data[10] === ''){
            document.getElementById("output2").src = ('../image/camera.jpg');
        }
        else{
            document.getElementById("output2").src = ('../image/'+data[10]);
        }
        $('#price2').val(data[13]);
    });

</script>