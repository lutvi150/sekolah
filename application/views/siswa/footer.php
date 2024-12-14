    <!-- footer content -->
    <footer>
    
    	<div class="pull-right">
      <a href="<?php echo base_url(); ?>adm"><?php echo $this->config->item('nama_aplikasi')." ".$this->config->item('versi')."</a><br> Waktu Server: ".tjs(date('Y-m-d H:i:s'),"s")." - Waktu Database: ".tjs($this->waktu_sql,"s"); ?>.
    		<?=$this->config->item('school')?>
    	</div>
    	<div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>asset/jquery/dist/jquery.min.js"></script>
    <!-- pooper -->
    <script src="<?= base_url();?>asset/poperjs/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>asset/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>asset/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>asset/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>asset/moment/min/moment.min.js"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="<?php echo base_url();?>asset/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js">
    </script>
    <!-- Datatables -->
    <script src="<?php echo base_url();?>asset/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>asset/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asset/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>asset/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asset/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>asset/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="<?php echo base_url();?>asset/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js">
    </script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>asset/build/js/custom.min.js"></script>
    <!-- ajax aplikasi -->
 
    <script src="<?php echo base_url(); ?>___/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>___/plugin/datatables/dataTables.bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>___/plugin/jquery_zoom/jquery.zoom.min.js"></script>
    <script src="<?php echo base_url(); ?>___/plugin/countdown/jquery.countdownTimer.js"></script>
    <script type="text/javascript">
    	var base_url = "<?php echo base_url(); ?>";
    	var editor_style = "<?php echo $this->config->item('editor_style'); ?>";
    	var uri_js = "<?php echo $this->config->item('uri_js'); ?>";

    </script>
    <script src="<?php echo base_url(); ?>___/js/aplikasi.js?time=<?php echo time(); ?>"></script>
    
  <script src="<?php echo base_url();?>asset/stiff-chart/stiff-chart.js"></script>
    <script>
  $(document).ready(function() {
  $('#untuk_tooltip').tooltip('show');   
  $('#chart').stiffChart();
});
    	window.setTimeout(function () {
    		$("#message_success").fadeTo(1000, 0).slideUp(500, function () {
    			$(this).remove();
    		});
    	}, 6000);
    	window.setTimeout(function () {
    		$("#message_error").fadeTo(1000, 0).slideUp(500, function () {
    			$(this).remove();
    		});
    	}, 6000);
    	$('#myDatepicker2').datetimepicker({
    		format: 'YYYY-MM-DD'
    	});
    	$('#myDatepicker3').datetimepicker({
    		format: 'YYYY-MM-DD'
    	});
    	$('#myDatepicker4').datetimepicker({
    		format: 'hh:mm:s'
    	});
    	$('#myDatepicker5').datetimepicker({
    		format: 'hh:mm:s'
    	});
      $('#help').click(function () { 
        $('#modalhelp').modal('show');        
      });
    	function tampilkanwaktu() { //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
    		var waktu = new Date(); //membuat object date berdasarkan waktu saat 
    		var sh = waktu.getHours() +
    			""; //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
    		var sm = waktu.getMinutes() + ""; //memunculkan nilai detik    
    		var ss = waktu.getSeconds() +
    			""; //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
    		document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" +
    			sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
    	}
    </script>
    </body>

    </html>
