<?php
  $title = "ຢືນຢັນການສັ່ງຊື້";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
  ?>
  <!-- modal selldetail -->
<form action="Confirm" id="form_confirm" method="POST" target="_blank">
    <div class="modal fade" id="exampleModalfetch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ລາຍລະອຽດການສັ່ງຊື້</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div id="result_selldetail"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div id="result_customer"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnConfirm" id="btnConfirm" class="btn btn-outline-primary"
                        onclick="">
                        ຢືນຢັນການສັ່ງຊື້
                        <span class="" id="load_Delete"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="container-fluid font12">
    <div id="result" class="result"></div>
</div>
<?php
    if(isset($_POST["btnConfirm"])){
        $obj->confirm_order($_POST["id"]);
    }
    include ("../../header-footer/footer.php");
    if(isset($_GET['save'])=='fail'){
        echo'<script type="text/javascript">
        swal("", "ຢືນຢັນການສັ່ງຊື້ຜິດພາດ", "error");
        </script>';
      }
      if(isset($_GET['save2'])=='success'){
        echo'<script type="text/javascript">
        swal("", "ຢືນຢັນການສັ່ງຊື້ສຳເລັດ", "success");
        </script>';
      }
    ?>
<script>
function formatDate(date) {
    var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = "0" + month;
    if (day.length < 2)
        day = "0" + day;

    return [year, month, day].join("-");
}
</script>
<script>
$(document).ready(function() {
    load_data("0");

    function load_data(date1, date2, page) {
        $.ajax({
            url: "fetch_confirm.php",
            method: "POST",
            data: {
                date1: date1,
                date2: date2,
                page: page
            },
            success: function(data) {
                $("#result").html(data);
            }
        });
    }

    $(document).on('click', '.page-links_table', function() {
        var page = this.id;

        console.log(page);
        if (page != "") {
            load_data(page);
        } else {
            load_data(0);
        }
    });
    load_data_selldetail("");
    load_data_customerdetail("");


    function load_data_selldetail(query) {
        $.ajax({
            url: "fetch_confirmdetail.php",
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
                $("#result_selldetail").html(data);
            }
        });
    }
    function load_data_customerdetail(query) {
        $.ajax({
            url: "fetch_customerdetail.php",
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
                $("#result_customer").html(data);
            }
        });
    }
    $(document).on('click', '.btn_fetch', function() {
        var id = $("#id").val();
        if (id != "") {
            load_data_selldetail(id);
            load_data_customerdetail(id);
        } else {
            load_data_selldetail("");
            load_data_customerdetail("");
        }
    });

});
</script>