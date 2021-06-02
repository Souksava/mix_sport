<?php 
  $title = "ລາຍລະອຽດສິນຄ້າ";
  $path = "";
include ('header-footer/header.php');
$pro_id = $_GET["id"];
$result_product = mysqli_query($conn,"SELECT pro_id,pro_name,qty,price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,qty_alert,img FROM product p LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE pro_id = '$pro_id';");
$row_product = mysqli_fetch_array($result_product,MYSQLI_ASSOC);
?>
      <div class="test">
        <div class="container">
          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
          </div>
        </div>
      </div>
      <div class="ps-product--detail pt-60">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-10 col-md-12 col-lg-offset-1">
              <div class="ps-product__thumbnail">
                <div class="ps-product__preview">
                  <div class="ps-product__variants">
                    <div class="item"><img src="Administrator/image/<?php echo $row_product["img"] ?>" alt=""></div>
                  </div>
                </div>
                <div class="ps-product__image">
                  <div class="item"><img class="zoom" src="Administrator/image/<?php echo $row_product["img"] ?>" alt="" data-zoom-image="Administrator/image/<?php echo $row_product["img"] ?>"></div>
                </div>
              </div>
              <div class="ps-product__thumbnail--mobile">
                <div class="ps-product__main-img"><img src="Administrator/image/<?php echo $row_product["img"] ?>" alt=""></div>
                <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                  <img src="Administrator/image/<?php echo $row_product["img"] ?>" alt="">
                </div>
              </div>
              <div class="ps-product__info">
                <h1><?php echo $row_product["pro_name"] ?></h1>
                <p class="ps-product__category"><a href="#"> <?php echo $row_product["cate_name"] ?></a>,<a href="#"> <?php echo $row_product["brand_name"] ?></a></p>
                <h3 class="ps-product__price"><?php echo number_format($row_product["price"],2) ?> ກີບ</h3>
                <?php
                if($row_product["qty"] > 0){
                  echo' <h5 style="color: green;"><i class="fas fa-check"></i> ມີສິນຄ້າ</h5>';
                }
                else{
                  echo'<h5 style="color: red;"><i class="fas fa-times-circle"></i> ສິນຄ້າໝົດ</h5>';
                }
                ?>
                <div class="ps-product__block ps-product__size">
                  <h4>ຂະໜາດ: <?php echo $row_product["size_name"] ?></h4>
                 
                  <div class="form-group">
                    <input class="form-control" min="1" type="number" value="1">
                  </div>
                </div>
                <div class="ps-product__shopping"><a class="ps-btn mb-10" href="cart.html">ເພີ່ມໃສ່ກະຕາ<i class="ps-icon-next"></i></a>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="ສິນຄ້າໃກ້ຄຽງ">- ສິນຄ້າຄ້າຍຄືກັນ</h3>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                  </div>
            </div>
          </div>
          <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
              <!-- One item -->
              <?php
              $cate_id = $row_product["cate_id"];
              $result_category = mysqli_query($conn,"SELECT pro_id,pro_name,qty,price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,qty_alert,img FROM product p LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE p.cate_id = '$cate_id';");
              foreach($result_category as $row_category){
              ?>
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                    <img src="Administrator/image/<?php echo $row_category["img"] ?>" alt=""><a class="ps-shoe__overlay" href="Productdetail?id=<?php echo $row_category["pro_id"] ?>"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal"><img src="Administrator/image/<?php echo $row_category["img"] ?>" alt=""></div>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="Productdetail?id=<?php echo $row_category["pro_id"] ?>"><?php echo $row_category["pro_name"] ?></a>
                      <p class="ps-shoe__categories"><a href="#"><?php echo $row_category["cate_name"] ?></a>,<a href="#"> <?php echo $row_category["brand_name"] ?></a>,<a href="#"> <?php echo $row_category["size_name"] ?></a></p><span class="ps-shoe__price"> <?php echo number_format($row_category["price"],2) ?> ກີບ</span>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              }
              ?>
              <!-- End One item -->
            </div>
          </div>
        </div>
      </div>
      </div>
<?php 
  include ('header-footer/footer.php');
?>