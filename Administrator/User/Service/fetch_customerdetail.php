
<?php
    if(isset($_POST["query"])){
        $sell_iddetail = $_POST["query"];
      include ('../../oop/obj.php');
      $customerdetail = mysqli_query($conn,"call customerdetail('$sell_iddetail');");
      if(mysqli_num_rows($customerdetail) > 0){
        $rowdetail = mysqli_fetch_array($customerdetail,MYSQLI_ASSOC);
?>
<div class="card">
    <div class="card-header">
        ລາຍລະອຽດລູກຄ້າ
    </div>
    <div class="card-body">
        <div align="center">
            <?php 
                if($rowdetail["img_path"] == ""){
                    $rowdetail["img_path"] = "image.jpeg";
                }
            ?>
            <a href="../../image/<?php echo $rowdetail["img_path"] ?>">
                <img src="../../image/<?php echo $rowdetail["img_path"] ?>" class="img-circle elevation-2" alt="" width="120px" />
            </a>
        </div>
        <div>
            <p>
                ປະເພດການຈ່າຍ: <?php echo $rowdetail["type_pay"] ?> <br>
                ເບີໂທລະສັບ: <?php echo $rowdetail["tel"] ?><br>
                What's App: <?php echo $rowdetail["whatsapp"] ?>
            </p>
            <p>
               <h3>ສະຖານທີຈັດສົ່ງ</h3> 
               <?php echo $rowdetail["address"] ?>
            </p>
        </div>
    </div>
</div>
<?php
      }
    }
?>