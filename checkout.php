<?php 
  $title = "ສັ່ງຊື້ສິນຄ້າ";
  $path = "";
  include ('header-footer/header.php');
  if(!isset($_SESSION["cus_id"])){
    echo"<script>";
    echo"window.location.href='Signin';";
    echo"</script>";
  }
?>
    <main class="ps-main">
      <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
          <form class="ps-checkout__form" action="Checkout" method="POST" enctype="multipart/form-data">
            <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__billing">
                      <h3>ລາຍອຽດການຊື້</h3>
                            <div class="form-group form-group--inline">
                              <label>ວ໋ອດແອັບ
                              </label>
                              <input type="hidden" name="sell_id" id="sell_id">
                              <input class="form-control" name="whatsapp" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>ເບີໂທລະສັບ<span>*</span>
                              </label>
                              <input class="form-control" name="tel" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>ສະຖານທີຈັດສົ່ງ<span>*</span>
                              </label>
                              <input class="form-control" name="address" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>ອັບໂຫຼດຟາຍໃບຢັ້ງຢືນການໂອນ
                              </label>
                              <input class="form-control" name="img_path" type="file">
                            </div>
                      <h3 class="mt-40"> ເງື່ອນໄຂອື່ນໆ</h3>
                      <div class="form-group form-group--inline textarea">
                        <label>ໝາຍເຫດ</label>
                        <textarea class="form-control" name="remark" rows="5" placeholder="ໝາຍເຫດ"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__order">
                      <header>
                        <h3>ລາຍການ</h3>
                      </header>
                      <div class="content">
                        <?php
                          if(isset($_COOKIE['list_cart'])){
                        ?>
                        <table class="table ps-checkout__products">
                          <thead>
                            <tr>
                              <th class="text-uppercase">ສິນຄ້າ</th>
                              <th class="text-uppercase">ລວມ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $total_checkout = 0;
                              $cart_data3 = $cart_data;
                              $totalrow = 0;
                              foreach($cart_data3 as $row3){
                                $total_checkout += $row3["qty"] * $row3["price"];
                                $totalrow = $row3["qty"] * $row3["price"];
                            ?>
                            <tr>
                            <td>
                                <?php echo $row3["cate_name"] ?> <?php echo $row3["brand_name"] ?>
                                <?php echo $row3["pro_name"] ?> <?php echo $row3["size_name"] ?>
                            </td>
                              <td><?php echo number_format($totalrow,2) ?></td>
                            </tr>
                            <?php
                              }
                            ?>
                            <tr>
                              <td>ຍອດລວມ</td>
                              <td><?php echo number_format($total_checkout,2); ?></td>
                            </tr>
                          </tbody>
                        </table>
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
                      </div>
                      <footer>
                        <h3>ປະເພດການຈ່າຍ</h3>
                        <div class="form-group cheque">
                          <div class="ps-radio">
                            <input class="form-control" type="radio" value="ເງິນໂອນ" id="rdo01" name="payment" checked>
                            <label for="rdo01">ໃບຢັ້ງຢືນການໂອນ</label><br>
                            <?php 
                                $obj->select_acc();
                                foreach($result_acc as $rowacc){
                                if($rowacc["qr_code"] == ""){

                                }
                                else{
                            ?>
                            <img src="Administrator/image/<?php echo $rowacc["qr_code"] ?>" alt="" style="width: 125px;height: 125px;">
                            <?php
                                }
                            ?>
                            <p><br>
                              ຊື່ບັນຊີ: <?php echo $rowacc["account_name"] ?><br>
                              ເລກທີບັນຊີ: <?php echo $rowacc["account_no"] ?><br>
                            </p>
                            <?php 
                                }
                                mysqli_free_result($result_acc);  
                                mysqli_next_result($conn);
                            ?>
                          </div>
                        </div>
                        <div class="form-group paypal">
                          <div class="ps-radio ps-radio--inline">
                            <input class="form-control" type="radio" value="ເງິນສົດ"  name="payment" id="rdo02">
                            <label for="rdo02">ເງິນສົດ</label>
                          </div>
                          <button type="submit" name="btnCustomer_order" class="ps-btn ps-btn--fullwidth">ສັ່ງຊື້ສິນຄ້າ<i class="ps-icon-next"></i></button>
                        </div>
                      </footer>
                    </div>
                  </div>
            </div>
          </form>
        </div>
      </div>
      </div>
    </main>

<?php 
      if(isset($_GET['tel'])=='null'){
        echo'<script type="text/javascript">
        swal("", "ກະລຸນາປ້ອນເບີໂທລະສັບຕິດຕໍ່", "info");
        </script>';
      }
      if(isset($_GET['address'])=='null'){
        echo'<script type="text/javascript">
        swal("", "ກະລຸນາປ້ອນສະຖາທີຈັດສົ່ງ", "info");
        </script>';
      }
      if(isset($_GET['save'])=='fail'){
        echo'<script type="text/javascript">
        swal("", "ສັ່ງຊື້ສິນຄ້າບໍ່ສຳເລັດ", "error");
        </script>';
      }
      if(isset($_GET['list'])=='null'){
        echo'<script type="text/javascript">
        swal("", "ລາຍການສິນຄ້າບໍ່ມີໃນກະຕ່າ", "info");
        </script>';
      }
      if(isset($_GET['stock'])=='over'){
        $msg = $_GET["msg"];
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດສັ່ງຊື້ສິນຄ້າໄດ້ ເນື່ອງສິນຄ້າຊື່: '.$msg.' ທີ່ທ່ານສັ່ງຊື້ເກີນຈຳນວນໃນສະຕ໋ອກ", "info");
        </script>';
      }

  include ('header-footer/footer.php');
?>
    <script>
loadorder();

function loadorder() {
    $.ajax({
        url: "Administrator/User/Service/sell_id.php",
        success: function(result) {
            $('#sell_id').val(result); //insert text of test.php into your div
            setTimeout(function() {
                loadorder(); //this will send request again and again;
            }, 2000);
        }
    });
}
</script>