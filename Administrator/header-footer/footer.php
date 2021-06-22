<!-- Content Wrapper. Contains page content -->

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2020 </strong>
    All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php echo $path ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $path ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $path ?>dist/js/loading.js"></script>
<script src="<?php echo $path ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="<?php echo $path ?>plugins/bootstrap/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo $path ?>plugins/bootstrap/js/modernizr-2.6.2.min.js"></script> -->
<!-- ChartJS -->
<script src="<?php echo $path ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $path ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo $path ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo $path ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $path ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $path ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo $path ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tcususdominus Bootstrap 4 -->
<script src="<?php echo $path ?>plugins/tcususdominus-bootstrap-4/js/tcususdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $path ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $path ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $path ?>dist/js/adminlte.js"></script>
<script src="<?php echo $path ?>dist/js/style.js"></script>
<script src="<?php echo $path ?>dist/js/pageload.js"></script>
<script src="<?php echo $path ?>dist/js/jquery.highlight.js"></script>
<script src="<?php echo $path ?>dist/js/datepicker.js"></script>
<script src="<?php echo $path ?>dist/js/export.js"></script>
<script src="<?php echo $path ?>canvasjs.min.js"></script>
<script>
// loadorder2();

// function loadorder2() {
//     $.ajax({
//         url: "../header-footer/alert.php",
//         success: function(result) {
//             $('#alert').val(result); //insert text of test.php into your div
//             setTimeout(function() {
//                 loadorder2(); //this will send request again and again;
//             }, 2000);
//         }
//     });
// }
// loadorder3();

// function loadorder3() {
//     $.ajax({
//         url: "../header-footer/alert_list.php",
//         success: function(result) {
//             $('#alert').val(result); //insert text of test.php into your div
//             setTimeout(function() {
//                 loadorder3(); //this will send request again and again;
//             }, 2000);
//         }
//     });
// }
</script>
<script type="text/javascript">
<?php
if($stt == 2){
?>
    function loadDocalert() {
            setInterval(function(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("alert").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "<?php echo $path ?>header-footer/alert.php", true);
                xhttp.send();
            },1000);
        }
        loadDocalert(); 
<?php
}
if($stt == 2){
?>
  function loadDocalert2() {
            setInterval(function(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result_list").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "<?php echo $path ?>header-footer/fetch_list.php", true);
                xhttp.send();
            },1000);
        }
        loadDocalert2(); 
<?php
}
?>
       
</script>
</body>

</html>