<?php 
  $title = "ລາຍການໃບບິນ";
  $path = "";
include ('header-footer/header.php');
?>
<style>
img{
  border-radius: 50%;
}
tr{
    cursor: pointer;
}
.table-responsive th {
    position: sticky!important;
    top: 0!important;
    background-color: #03A0FA;
    color: white;
    border-top: 1px;
}
</style>
    <div class="modal fade" id="exampleModalfetch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div id="result_selldetail"></div>
                </div>
                <div class="modal-footer">
                    <button class="ps-btn mb-10" name="btnAddCart" type="button" data-dismiss="modal">ປິດ</button>
                    <!-- <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ປິດ</button> -->
                    <!-- <button type="button" name="btnDelete_load" id="btnDelete_load" class="btn btn-outline-primary"
                        onclick="">
                        ປິດ
                        <span class="" id="load_Delete"></span>
                    </button> -->
                </div>
            </div>
        </div>
    </div>
<main class="ps-main">
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing">
                <?php
                    if(isset($_SESSION["cus_id"])){
                    $obj->customer_bill($_SESSION["cus_id"]);
                    $amount = 0;
                    if(mysqli_num_rows($result_customer) > 0){
                ?>

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
                        <?php 
                        foreach($result_customer as $row){
                            $amount += $row["total"];
                        ?>
                        <tr class="btn_fetch" <?php if($row["seen2"] == "0"){echo 'style="background-color: #F5F4F4;"';} ?>>
                            <td style="display: none;"><?php echo $row["sell_id"] ?></td>
                            <td>
                                <a class="ps-product__preview" href="#">
                                    <img class="mr-15" src="Administrator/image/bill.png" alt="" style="width: 75px;height: 75px;">
                                    ເລກທີບິນ: <?php echo $row["sell_id"] ?>
                                </a>
                            </td>
                            <td><?php echo number_format($row["total"]) ?> ກີບ</td>
                            <td><?php echo $row["type_pay"] ?></td>
                            <td><?php echo $row["stt_name"] ?></td>
                            <td>
                            <?php echo date("d/m/Y H:i:s",strtotime($row["timestamp"])) ?>
                            </td>
                        </tr>
                        <?php
                        }
                        mysqli_free_result($result_customer);  
                        mysqli_next_result($conn);
                        ?>
                    </tbody>
                </table>
                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">

                    </div>
                    <div class="ps-cart__total">
                        <h3>ມູນຄ່າທັງໝົດ:  &nbsp; &nbsp; <span><?php echo number_format($amount,2) ?> </span></h3>
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
  include ('header-footer/footer.php');
?>
<script>
   $('.btn_fetch').on('click',function(){
      $('#exampleModalfetch').modal('show');
      $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
   });
</script>
<script>
$(document).ready(function() {
function load_data_selldetail(query) {
        $.ajax({
            url: "fetch_selldetail.php",
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
                $("#result_selldetail").html(data);
            }
        });
    }
    $(document).on('click', '.btn_fetch', function() {
        var id = $("#id").val();
        if (id != "") {
            load_data_selldetail(id);
        } else {
            load_data_selldetail("");
        }
    });
});
</script>
