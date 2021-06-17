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
          <div class="ps-product__columns" id="result">

          </div>
            <!-- <div class="ps-pagination">
              <ul class="pagination">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div> -->
          </div>
      
            <!-- End Product list -->
        <div class="ps-sidebar" data-mh="product-listing">
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Category</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <?php 
                  $result_category = mysqli_query($conn,"call select_category_limit('%%','0');");
                  foreach($result_category as $row_category){
                ?>
                <li><a href="#" class="<?php echo $row_category["cate_name"] ?>"><?php echo $row_category["cate_name"] ?></a></li>
                <?php 
                  }
                  mysqli_free_result($result_category);  
                  mysqli_next_result($conn);
                ?>
                <li></li>
              </ul>
            </div>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Brand</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
              <?php 
                  $result_brand = mysqli_query($conn,"call select_brand_limit('%%','0');");
                  foreach($result_brand as $row_brand){
                ?>
                <li><a href="#" class="<?php echo $row_brand["brand_name"] ?>"><?php echo $row_brand["brand_name"] ?></a></li>
                <?php 
                  }
                  mysqli_free_result($result_brand);  
                  mysqli_next_result($conn);
                ?>
                <li></li>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </main>
    <?php 
  include ('header-footer/footer.php');
?>
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
                $("#result").html(data);
            }
        });
    }
    <?php 
        $result_category2 = mysqli_query($conn,"call select_category_limit('%%','0');");
        foreach($result_category2 as $row_category2){
    ?>
    $('.<?php echo $row_category2["cate_name"] ?>').click(function() {
        var page = "0";
        var search = $('.<?php echo $row_category2["cate_name"] ?>').text();
        $('#search').val(search);
        if (search != '') {
            load_data(search, page);
        } else {
            load_data('%%', page);
        }
    });
    <?php
          }
        mysqli_free_result($result_category2);  
        mysqli_next_result($conn);
    ?>


     <?php 
          $result_brand2 = mysqli_query($conn,"call select_brand_limit('%%','0');");
          foreach($result_brand2 as $row_brand2){
    ?>
    $('.<?php echo $row_brand2["brand_name"] ?>').click(function() {
        var page = "0";
        var search = $('.<?php echo $row_brand2["brand_name"] ?>').text();
         $('#search').val(search);
        if (search != '') {
            load_data(search, page);
        } else {
            load_data('%%', page);
        }
    });
    <?php
          }
        mysqli_free_result($result_brand2);  
        mysqli_next_result($conn);
    ?>
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