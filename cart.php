<?php 
  $title = "ກະຕ່າສິນຄ້າ";
  $path = "";
include ('header-footer/header.php');
?>
<style>
img{
  border-radius: 50%;
}
</style>
<main class="ps-main">
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing">
                <?php
                  $amount = 0;
                  $obj->select_cart_cookie();
                  if(isset($_COOKIE['list_cart'])){
                ?>
                <table class="table ps-cart__table">
                    <thead>
                        <tr>
                            <th>ສິນຄ້າທັງໝົດ</th>
                            <th>ລາຄາ</th>
                            <th>ຈຳນວນ</th>
                            <th>ລວມ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no_ = 0;
                            foreach($cart_data as $row){
                            $amount += $row["qty"] * $row["price"];
                            $total = 0;
                            $total += $row["qty"] * $row["price"];
                          ?>
                        <tr>
                            <td>
                                <a class="ps-product__preview" href="Administrator/image/<?php echo $row["img"] ?>">
                                    <img class="mr-15" src="Administrator/image/<?php echo $row["img"] ?>" alt="" style="width: 75px;height: 75px;">
                                     <?php echo $row["cate_name"] ?>
                                    <?php echo $row["brand_name"] ?> <?php echo $row["pro_name"] ?>
                                    <?php echo $row["size_name"] ?>
                                </a>
                            </td>
                            <td> <?php echo number_format($row["price"],2) ?> ກີບ</td>
                            <td>
                              <?php echo $row["qty"] ?>
                            </td>
                            <td><?php echo number_format($total,2)?></td>
                            <td>
                                <a href="Cart?productid=<?php echo $row["pro_id"] ?>" class="ps-remove"></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">

                    </div>
                    <div class="ps-cart__total">
                        <h3>ຈຳນວນທັງໝົດ:  &nbsp; &nbsp; <span>  <?php echo number_format($amount,2) ?> </span></h3><a class="ps-btn"
                            href="Checkout">ດຳເນີນການສັ່ງຊື້<i class="ps-icon-next"></i></a>
                    </div>
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
            </div>
        </div>
    </div>

</main>
<?php 
      if(isset($_GET['product'])=='null'){
        echo'<script type="text/javascript">
        swal("", "ລະຫັດສິນຄ້າບໍ່ຖືກຕ້ອງ", "info");
        </script>';
      }
      if(isset($_GET['save'])=='success'){
        echo'<script type="text/javascript">
        swal("", "ສັ່ງຊື້ສິນຄ້າສຳເລັດ ກະລຸນາລໍຖ້າພະນັກງານຢືນຢັນການສັ່ງຊື້ສິນຄ້າ", "success");
        </script>';
      }
  include ('header-footer/footer.php');
?>