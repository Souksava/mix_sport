<?php
  $title = "ສິນຄ້າ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<!-- del one -->
<form action="Product" method="POST" id="form_Delete">
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
<form action="" method="POST" id="form_Update" enctype="multipart/form-data">
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
                            <input type="text" name="pro_name2" id="pro_name2" placeholder="ຊື່ສິນຄ້າ"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ປະເພດສິນຄ້າ</label>
                            <select name="cate_id2" id="cate_id2">
                                <option value="">ເລືອກປະເພດສິນຄ້າ</option>
                                <?php
                                $category = mysqli_query($conn,"call select_category('%%')");
                                foreach($category as $row_cate){
                            ?>
                                <option value="<?php echo $row_cate["cate_id"] ?>"><?php echo $row_cate["cate_name"] ?>
                                </option>
                                <?php
                                }
                                mysqli_free_result($category);  
                                mysqli_next_result($conn);
                            ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຍີ່ຫໍ້</label>
                            <select name="brand_id2" id="brand_id2">
                                <option value="">ເລືອກຍີ່ຫໍ້</option>
                                <?php
                                $brand = mysqli_query($conn,"call select_brand('%%')");
                                foreach($brand as $row_brand){
                            ?>
                                <option value="<?php echo $row_brand["brand_id"] ?>">
                                    <?php echo $row_brand["brand_name"] ?></option>
                                <?php
                                }
                                mysqli_free_result($brand);  
                                mysqli_next_result($conn);
                            ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຈຳນວນ</label>
                            <input type="number" name="qty2" id="qty2" min="0" placeholder="ຈຳນວນ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ລາຄາ</label>
                            <input type="number" name="price2" id="price2" min="0" placeholder="ລາຄາ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຫົວໜ່ວຍສິນຄ້າ</label>
                            <select name="unit_id2" id="unit_id2">
                                <option value="">ເລືອກຫົວໜ່ວຍສິນຄ້າ</option>
                                <?php
                                $unit = mysqli_query($conn,"call select_unit('%%')");
                                foreach($unit as $row_unit){
                            ?>
                                <option value="<?php echo $row_unit["unit_id"] ?>"><?php echo $row_unit["unit_name"] ?>
                                </option>
                                <?php
                                }
                                mysqli_free_result($unit);  
                                mysqli_next_result($conn);
                            ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຂະໜາດ</label>
                            <select name="size_id2" id="size_id2">
                                <option value="">ເລືອກຂະໜາດ</option>
                                <?php
                                $size = mysqli_query($conn,"call select_size('%%')");
                                foreach($size as $row_size){
                            ?>
                                <option value="<?php echo $row_size["size_id"] ?>"><?php echo $row_size["size_name"] ?>
                                </option>
                                <?php
                                }
                                mysqli_free_result($size);  
                                mysqli_next_result($conn);
                            ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເງື່ອນໄຂການສັ່ງຊື້</label>
                            <input type="text" name="qty_alert2" id="qty_alert2" placeholder="ເງື່ອນໄຂການສັ່ງຊື້"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຮູບພາບສິນຄ້າ</label>
                            <input type="file" name="img2" id="img2" onchange="loadFile2(event)"
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
<form action="" method="POST" id="form_Save" enctype="multipart/form-data">
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
                            <input type="text" name="pro_name" id="pro_name" placeholder="ຊື່ສິນຄ້າ"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ປະເພດສິນຄ້າ</label>
                            <select name="cate_id" id="cate_id">
                                <option value="">ເລືອກປະເພດສິນຄ້າ</option>
                                <?php
                                $category2 = mysqli_query($conn,"call select_category('%%')");
                                foreach($category2 as $row_cate2){
                            ?>
                                <option value="<?php echo $row_cate2["cate_id"] ?>">
                                    <?php echo $row_cate2["cate_name"] ?></option>
                                <?php
                                }
                                mysqli_free_result($category2);  
                                mysqli_next_result($conn);
                            ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຍີ່ຫໍ້</label>
                            <select name="brand_id" id="brand_id">
                                <option value="">ເລືອກຍີ່ຫໍ້</option>
                                <?php
                                $brand2 = mysqli_query($conn,"call select_brand('%%')");
                                foreach($brand2 as $row_brand2){
                            ?>
                                <option value="<?php echo $row_brand2["brand_id"] ?>">
                                    <?php echo $row_brand2["brand_name"] ?></option>
                                <?php
                                }
                                mysqli_free_result($brand2);  
                                mysqli_next_result($conn);
                            ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຈຳນວນ</label>
                            <input type="number" name="qty" id="qty" min="0" placeholder="ຈຳນວນ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ລາຄາ</label>
                            <input type="number" name="price" id="price" min="0" placeholder="ລາຄາ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຫົວໜ່ວຍສິນຄ້າ</label>
                            <select name="unit_id" id="unit_id">
                                <option value="">ເລືອກຫົວໜ່ວຍສິນຄ້າ</option>
                                <?php
                                $unit2 = mysqli_query($conn,"call select_unit('%%')");
                                foreach($unit2 as $row_unit2){
                            ?>
                                <option value="<?php echo $row_unit2["unit_id"] ?>">
                                    <?php echo $row_unit2["unit_name"] ?></option>
                                <?php
                                }
                                mysqli_free_result($unit2);  
                                mysqli_next_result($conn);
                            ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຂະໜາດ</label>
                            <select name="size_id" id="size_id">
                                <option value="">ເລືອກຂະໜາດ</option>
                                <?php
                                $size2 = mysqli_query($conn,"call select_size('%%')");
                                foreach($size2 as $row_size2){
                            ?>
                                <option value="<?php echo $row_size2["size_id"] ?>">
                                    <?php echo $row_size2["size_name"] ?></option>
                                <?php
                                }
                                mysqli_free_result($size2);  
                                mysqli_next_result($conn);
                            ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ເງື່ອນໄຂການສັ່ງຊື້</label>
                            <input type="text" name="qty_alert" id="qty_alert" placeholder="ເງື່ອນໄຂການສັ່ງຊື້"
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຮູບພາບສິນຄ້າ</label>
                            <input type="file" name="img" id="img" onchange="loadFile(event)"
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
        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModaldelete_many"><i
                class="fas fa-trash"></i> ລົບຂໍ້ມູນ</button>
    </div>
    <div class="col-xs-12 col-sm-6" align="right">
        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalAdd"><i
                class="fas fa-plus-circle"></i> ເພີ່ມຂໍ້ມູນ</button>
    </div>
</div><br>
<form action="Product" id="form_delete_manay" method="POST">
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
    if(isset($_POST["pro_id"])){
        $obj->insert_product(trim($_POST["pro_id"]),trim($_POST["pro_name"]),trim($_POST["qty"]),trim($_POST["price"]),trim($_POST["cate_id"]),trim($_POST["unit_id"]),trim($_POST["brand_id"]),trim($_POST["size_id"]),trim($_POST["qty_alert"]),trim($_FILES["img"]["name"]));
    }
    if(isset($_POST["pro_id2"])){
        $obj->update_product(trim($_POST["pro_id2"]),trim($_POST["pro_name2"]),trim($_POST["qty2"]),trim($_POST["price2"]),trim($_POST["cate_id2"]),trim($_POST["unit_id2"]),trim($_POST["brand_id2"]),trim($_POST["size_id2"]),trim($_POST["qty_alert2"]),trim($_FILES["img2"]["name"]));
    }
    if(isset($_POST["id"])){
        $obj->del_product($_POST["id"]);
    }
    if(isset($_POST["btnDelete_many"])){
        $logic = 0;
            if(isset($_POST["id2"])){
                foreach($_POST["id2"] as $checkid){
                    $check_order = mysqli_query($conn,"select * from orderdetail where pro_id='$id'");
                    $check_import = mysqli_query($conn,"select * from import where pro_id='$id'");
                    $check_selldetail = mysqli_query($conn,"select * from selldetail where pro_id='$id'");
                    if(mysqli_num_rows($check_order) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='Product?Checkdelete=true&&orders=$checkid'';";
                        echo"</script>";
                        break;
                    }
                    if(mysqli_num_rows($check_import) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='Product?Checkdelete=true&&imports=$checkid'';";
                        echo"</script>";
                        break;
                    }
                    if(mysqli_num_rows($check_selldetail) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='Product?Checkdelete=true&&sells=$checkid'';";
                        echo"</script>";
                        break;
                    }
                }
                if($logic == 0){
                    $delete = 0;
                    foreach($_POST["id2"] as $id){
                        $get_img = mysqli_query($conn,"select img from product where pro_id='$id'");
                        $data = mysqli_fetch_array($get_img, MYSQLI_ASSOC);
                        $path2 = $path.'image/'.$data['img'];
                        if(file_exists($path2) && !empty($data['img'])){
                            unlink($path2);        
                        }
                        $delete_many = mysqli_query($conn,"call del_product($id)");
                        if(!$delete_many){
                            $delete = 1;
                            echo"<script>";
                            echo"window.location.href='Product?del=fail';";
                            echo"</script>";
                        }
                        mysqli_free_result($delete_many);  
                        mysqli_next_result($conn);
                    }
                    if($delete == 0){
                        echo"<script>";
                        echo"window.location.href='Product?del2=success';";
                        echo"</script>";
                    }
                    
                }
            }
            else{
                echo"<script>";
                echo"window.location.href='Product?Checkbox=null';";
                echo"</script>";
            }
    }
    if(isset($_GET["Checkbox"])=="null"){
        echo'<script type="text/javascript">
        swal("", "ກະລຸນາເລືອກລາຍການກ່ອນ !", "info");
        </script>';
      }  
    if(isset($_GET["proid"])=="same"){
        echo'<script type="text/javascript">
        swal("", "ລະຫັດສິນຄ້ານີ້ມີຢູ່ແລ້ວ ກະລຸນາປ້ອນລະຫັດສິນຄ້າທີ່ແຕກຕ່າງ !", "info");
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
      if(isset($_GET["order"])=="has"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງລະຫັດສິນຄ້ານີ້ໄດ້ເຄື່ອນໄຫວການສັ່ງຊື້ແລ້ວ !", "error");
        </script>';
      }  
      if(isset($_GET["import"])=="has"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງລະຫັດສິນຄ້ານີ້ໄດ້ເຄື່ອນໄຫວການນຳເຂົ້າສິນຄ້າແລ້ວ !", "error");
        </script>';
      }  
      if(isset($_GET["sell"])=="has"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງລະຫັດສິນຄ້ານີ້ໄດ້ເຄື່ອນໄຫວການຂາຍສິນຄ້າແລ້ວ !", "error");
        </script>';
      } 
      if(isset($_GET["Checkdelete"])=="true" && isset($_GET["orders"])){
        $msg = $_GET["orders"];
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດສິນຄ້າ: '.$msg.' ນີ້ມີຢູ່ໃນຕາຕະລາງການສັ່ງຊື້ແລ້ວ ", "error");
        </script>';
      }   
      if(isset($_GET["Checkdelete"])=="true" && isset($_GET["imports"])){
        $msg = $_GET["imports"];
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດສິນຄ້າ: '.$msg.' ນີ້ມີຢູ່ໃນຕາຕະລາງການນຳເຂົ້າສິນຄ້າແລ້ວ ", "error");
        </script>';
      }   
      if(isset($_GET["Checkdelete"])=="true" && isset($_GET["sells"])){
        $msg = $_GET["sells"];
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດສິນຄ້າ: '.$msg.' ນີ້ມີຢູ່ໃນຕາຕະລາງການຂາຍສິນຄ້າແລ້ວ ", "error");
        </script>';
      }   
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
$(document).ready(function() {
    load_data("%%", "0");

    function load_data(query, page) {
        $.ajax({
            url: "fetch_product.php",
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
const pro_id = document.getElementById("pro_id");
const pro_name = document.getElementById("pro_name");
const brand_id = document.getElementById("brand_id");
const qty = document.getElementById("qty");
const price = document.getElementById("price");
const unit_id = document.getElementById("unit_id");
const size_id = document.getElementById("size_id");
const qty_alert = document.getElementById("qty_alert");
const cate_id = document.getElementById("cate_id");
const load_save = document.getElementById("load_save");
const btnSave_load = document.getElementById("btnSave_load");
myform_form_Save.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Save();
});

function checkInputs_form_Save() {
    const pro_idValue = pro_id.value.trim();
    const pro_nameValue = pro_name.value.trim();
    const brand_idValue = brand_id.value.trim();
    const qtyValue = qty.value.trim();
    const priceValue = price.value.trim();
    const unit_idValue = unit_id.value.trim();
    const size_idValue = size_id.value.trim();
    const qty_alertValue = qty_alert.value.trim();
    const cate_idValue = cate_id.value.trim();
    if (pro_idValue === "") {
        setErrorFor(pro_id, 'ກະລຸນາປ້ອນລະຫັດສິນຄ້າ');
    } else {
        setSuccessFor(pro_id);
    }
    if (pro_nameValue === "") {
        setErrorFor(pro_name, 'ກະລຸນາປ້ອນຊື່ສິນຄ້າ');
    } else {
        setSuccessFor(pro_name);
    }
    if (brand_idValue === "") {
        setErrorFor(brand_id, 'ກະລຸນາເລືອກຍີ່ຫໍ້ສິນຄ້າ');
    } else {
        setSuccessFor(brand_id);
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
    if (unit_idValue === "") {
        setErrorFor(unit_id, 'ກະລຸນາເລືອກຫົວໜ່ວຍສິນຄ້າ');
    } else {
        setSuccessFor(unit_id);
    }
    if (size_idValue === "") {
        setErrorFor(size_id, 'ກະລຸນາເລືອກຂະໜາດສິນຄ້າ');
    } else {
        setSuccessFor(size_id);
    }
    if (qty_alertValue === "") {
        setErrorFor(qty_alert, 'ກະລຸນາປ້ອນເງື່ອນໄຂການສັ່ງຊື້');
    } else {
        setSuccessFor(qty_alert);
    }
    if (cate_idValue === "") {
        setErrorFor(cate_id, 'ກະລຸນາເລືອກປະເພດສິນຄ້າ');
    } else {
        setSuccessFor(cate_id);
    }
    if (pro_idValue !== "" && pro_nameValue !== "" && brand_idValue !== "" && qtyValue !== "" && priceValue !== "" && unit_idValue !== "" && size_idValue !== "" && qty_alertValue !== "" && cate_idValue !== "") {
        setloading(load_save, btnSave_load);
        document.getElementById("form_Save").action = "Product";
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
    document.getElementById("form_Delete").action = "Product";
    document.getElementById("form_Delete").submit();
}




const myform_form_Update = document.getElementById("form_Update");
const pro_id2 = document.getElementById("pro_id2");
const pro_name2 = document.getElementById("pro_name2");
const brand_id2 = document.getElementById("brand_id2");
const qty2 = document.getElementById("qty2");
const price2 = document.getElementById("price2");
const unit_id2 = document.getElementById("unit_id2");
const size_id2 = document.getElementById("size_id2");
const qty_alert2 = document.getElementById("qty_alert2");
const cate_id2 = document.getElementById("cate_id2");
const load_Update = document.getElementById("load_Update");
const btnUpdate_load = document.getElementById("btnUpdate_load");
myform_form_Update.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs_form_Update();
});

function checkInputs_form_Update() {
    const pro_id2Value = pro_id2.value.trim();
    const pro_name2Value = pro_name2.value.trim();
    const brand_id2Value = brand_id2.value.trim();
    const qty2Value = qty2.value.trim();
    const price2Value = price2.value.trim();
    const unit_id2Value = unit_id2.value.trim();
    const size_id2Value = size_id2.value.trim();
    const qty_alert2Value = qty_alert2.value.trim();
    const cate_id2Value = cate_id2.value.trim();
    if (pro_id2Value === "") {
        setErrorFor(pro_id2, 'ກະລຸນາປ້ອນລະຫັດສິນຄ້າ');
    } else {
        setSuccessFor(pro_id2);
    }
    if (pro_name2Value === "") {
        setErrorFor(pro_name2, 'ກະລຸນາປ້ອນຊື່ສິນຄ້າ');
    } else {
        setSuccessFor(pro_name2);
    }
    if (brand_id2Value === "") {
        setErrorFor(brand_id2, 'ກະລຸນາເລືອກຍີ່ຫໍ້ສິນຄ້າ');
    } else {
        setSuccessFor(brand_id2);
    }
    if (qty2Value === "") {
        setErrorFor(qty2, 'ກະລຸນາປ້ອນຈຳນວນ');
    } else {
        setSuccessFor(qty2);
    }
    if (price2Value === "") {
        setErrorFor(price2, 'ກະລຸນາປ້ອນລາຄາ');
    } else {
        setSuccessFor(price2);
    }
    if (unit_id2Value === "") {
        setErrorFor(unit_id2, 'ກະລຸນາເລືອກຫົວໜ່ວຍສິນຄ້າ');
    } else {
        setSuccessFor(unit_id2);
    }
    if (size_id2Value === "") {
        setErrorFor(size_id2, 'ກະລຸນາເລືອກຂະໜາດສິນຄ້າ');
    } else {
        setSuccessFor(size_id2);
    }
    if (qty_alert2Value === "") {
        setErrorFor(qty_alert2, 'ກະລຸນາປ້ອນເງື່ອນໄຂການສັ່ງຊື້');
    } else {
        setSuccessFor(qty_alert2);
    }
    if (cate_id2Value === "") {
        setErrorFor(cate_id2, 'ກະລຸນາເລືອກປະເພດສິນຄ້າ');
    } else {
        setSuccessFor(cate_id2);
    }
    if (pro_id2Value !== "" && pro_name2Value !== "" && brand_id2Value !== "" && qty2Value !== "" && price2Value !== "" && unit_id2Value !== "" && size_id2Value !== "" && qty_alert2Value !== "" && cate_id2Value !== "") {
        setloading(load_Update, btnUpdate_load);
        document.getElementById("form_Update").action = "Product";
        document.getElementById("form_Update").submit();
    }
}
</script>