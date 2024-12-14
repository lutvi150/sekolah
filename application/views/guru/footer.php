    <!-- footer content -->
    <footer>
    	<div class="pull-right">
    		SMAN 1 SUNGAYANG
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
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>asset/moment/min/moment.min.js"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="<?php echo base_url();?>asset/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
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
    <script src="<?php echo base_url();?>asset/stiff-chart/stiff-chart.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>asset/build/js/custom.min.js"></script>
    <script>
      $('.btn_detail').click(function () {
        var id=$(this).attr('data');
        $('#detail_ujian').html('');
          $.ajax({
            type: "GET",
            url: "<?= base_url();?>c_guru/detail_siswa",
            data: {id:id},
            dataType: "JSON",
            success: function (response) {
              $.each(response, function (i, response) { 
                $('#detail_ujian').append(
                 `
										<div class="block_content">
											<h2 class="title">
												<a id="nama_ujian">`+response.nama_ujian+`</a>
											</h2>
											<div class="byline">
												<span>Jumlah Benar :</span><a class="green" id="jml_benar">`+response.jml_benar+`</a>
												<br>
												<span>Jumlah Nilai :</span><a class="green" id="nilai">`+response.nilai+`</a>
												<br>
												Tanggal Mulai Evaluasi: <a href="#" class="red" id="tgl_mulai">`+response.tgl_mulai+`</a> <br>
												Tanggal Selesai Evaluasi :<a href="#" class="red" id="tgl_selesai">`+response.tgl_selesai+`</a>
											</div>
											<p class="excerpt">

											</p>
										</div>`
                );

              });
              $('#view_detail').modal('show');
            }
          });
      });
    //     $('#detail_data').on('click',function (){

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
    	$(document).ready(function () {
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
    	CKEDITOR.replace('isi'),{
			
		};
    	CKEDITOR.replace('rangkuman');

    	function tampilkanwaktu() { //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    		var waktu = new Date(); //membuat object date berdasarkan waktu saat
    		var sh = waktu.getHours() +
    		""; //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya: sh.length //ambil nilai menit
    		var sm = waktu.getMinutes() + ""; //memunculkan nilai detik
    		var ss = waktu.getSeconds() +
    		""; //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit(0 - 9)
    		document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" +
    				sm : sm) + ":" +
    			(ss.length == 1 ? "0" + ss : ss);
    	}

    </script>
    </body>

    </html>
