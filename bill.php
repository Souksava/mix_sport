<?php 
  $title = "ລາຍການໃບບິນ";
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

                <table class="table ps-cart__table">
                    <thead>
                        <tr>
                            <th>ເລກທີບິນ</th>
                            <th>ມູນຄ່າ</th>
                            <th>ປະເພດຈ່າຍ</th>
                            <th>ສະຖານະ</th>
                            <th>ວັນທີ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <a class="ps-product__preview" href="Administrator/image/bill.png">
                                    <img class="mr-15" src="Administrator/image/bill.png" alt="" style="width: 75px;height: 75px;">
                                    ເລກທີບິນ: 000001
                                </a>
                            </td>
                            <td>200,000 ກີບ</td>
                            <td>ເງິນສົດ</td>
                            <td>ສັ່ງຊື້ສຳເລັດ</td>
                            <td>
                                16/06/2021
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">

                    </div>
                    <div class="ps-cart__total">
                        <h3>ມູນຄ່າທັງໝົດ:  &nbsp; &nbsp; <span>0 </span></h3>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>
<?php 
  include ('header-footer/footer.php');
?>