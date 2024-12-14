    <!-- footer content -->
    <footer>
    	<div class="pull-right">
		<?=$this->config->item('school')?>
    	</div>
    	<div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>asset/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>asset/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>asset/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>asset/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url();?>asset/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>asset/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asset/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>asset/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asset/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>asset/ckeditor/ckeditor.js"></script>
    
    <!-- <script src="<?php echo base_url();?>asset/ckeditor/samples/js/sample.js"></script> -->
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>asset/build/js/custom.min.js"></script>
  <script>
 CKEDITOR.replace('soal');
			CKEDITOR.replace('jawaban_a');
			CKEDITOR.replace('jawaban_b');
			CKEDITOR.replace('jawaban_c');
			CKEDITOR.replace('jawaban_d');
			CKEDITOR.replace('jawaban_e');
 initSample();
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
function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
    var waktu = new Date();            //membuat object date berdasarkan waktu saat 
    var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
    var sm = waktu.getMinutes() + "";  //memunculkan nilai detik    
    var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
}</script>
    </body>

    </html>
