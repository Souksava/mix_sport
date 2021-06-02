<?php 
  $title = "ສິນຄ້າ";
  $path = "";
  include ('header-footer/header.php');
?>
    <main class="ps-main">
      <div class="ps-products-wrap pt-80 pb-80">
        <!-- Start Product List -->
        <div class="ps-products" data-mh="product-listing">
          <div class="ps-product-action">
          </div>
          <div class="ps-product__columns">
              <?php
              $i = 0;
              if($i == 0){
                ?>
                  <!-- Start Catalog -->
                <div class="ps-product__column">
                  <div class="ps-shoe mb-30">
                    <div class="ps-shoe__thumbnail">
                      <img src="images/shoe/1.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                    </div>
                    <div class="ps-shoe__content">
                      <div class="ps-shoe__variants">
                        <div class="ps-shoe__variant normal">
                          <img src="images/shoe/2.jpg" alt="">
                        </div>
                      </div>
                      <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                        <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price">
                          <del>£220</del> £ 120</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Catalog -->
                <?php
              }
              else{
                ?>
                <hr size="1" width="90%">
                <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
                <hr size="1" width="90%">
                <?php
              }
              ?>                                   
          </div>
          <div class="ps-product-action">
            <div class="ps-pagination">
              <ul class="pagination">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
            <!-- End Product list -->
        <div class="ps-sidebar" data-mh="product-listing">
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Category</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li class=""><a href="#">Life(521)</a></li>
                <li><a href="#">Running(76)</a></li>
                <li><a href="#">Baseball(21)</a></li>
                <li><a href="#">Football(105)</a></li>
                <li><a href="#">Soccer(108)</a></li>
                <li><a href="#">Trainning & game(47)</a></li>
                <li><a href="#">More</a></li>
              </ul>
            </div>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Radio</h3>
            </div>
            <div>
                <label style="cursor: pointer;" class="" id="id1">test1</label><br>
                <label style="cursor: pointer;" class="" id="id2">test2</label>
            </div>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Brand</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li class="current"><a href="product-listing.html">Nike(521)</a></li>
                <li><a href="product-listing.php">Adidas(76)</a></li>
                <li><a href="product-listing.php">Baseball(69)</a></li>
                <li><a href="product-listing.php">Gucci(36)</a></li>
                <li><a href="product-listing.php">Dior(108)</a></li>
                <li><a href="product-listing.php">B&G(108)</a></li>
                <li><a href="product-listing.php">Louis Vuiton(47)</a></li>
              </ul>
            </div>
          </aside>
        </div>
      </div>
            <div>
              <?php $test = "test"; ?>
              <label id="test"><?php echo $test ?></label>
            </div>
    </main>
    <?php 
  include ('header-footer/footer.php');
?>
<script>
$(document).ready(function() {
  $(document).on("click", "#id1", function() {
    const idcheck = $('#id1').text();
\

  });
  $(document).on("click", "#id2", function() {
    const idcheck = $('#id2').text();
    console.log(idcheck);
    $('#id2').addClass('btn btn-primary-outline');
  });
});
</script>