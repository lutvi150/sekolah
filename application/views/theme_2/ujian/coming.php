<!DOCTYPE html>
<html lang="en">
<head>
	<title>Coming Soon 3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/css/main.css">
<!--===============================================================================================-->
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()',1000);">
	
	
	<div class="bg-img1 size1 flex-w flex-c-m p-t-55 p-b-55 p-l-15 p-r-15" style="background-image: url('<?php echo base_url();?>/asset/asset_coming/comingsoon_03/images/bg01.jpg');">
		<div class="wsize1 bor1 bg1 p-t-175 p-b-45 p-l-15 p-r-15 respon1">
			<div class="wrappic1">
				<h1>Harry Ilhami Haser</h1>
			</div>

			<p class="txt-center m1-txt1 p-t-33 p-b-68">
				Kalau mau Copy Aplikasi ini Izin dulu ke pemiliknya Harry Ilhami Haser
			</p>

			<div id="" class="wsize2 flex-w flex-c hsize1 cd100">
				
				<div class="flex-col-c-m size2 how-countdown">
						<span class="l1-txt1 p-b-9 hours" id="clock"></span>
						<span class="s1-txt1">Jam</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt1 p-b-9 minutes"></span>
					<span class="s1-txt1">Menit</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt1 p-b-9 seconds"></span>
					<span class="s1-txt1">Detik</span>
				</div>
			</div>

			<form class="flex-w flex-c-m contact100-form validate-form p-t-55">
				<div class="wrap-input100 validate-input where1" data-validate = "Email is required: ex@abc.xyz">
					<input class="s1-txt2 placeholder0 input100" type="text" name="email" placeholder="Masukkan Email">
					<span class="focus-input100"></span>
				</div>

				
				<button class="flex-c-m s1-txt3 size3 how-btn trans-04 where1">
					Kirim Pesan
				</button>
				
			</form>

			<p class="s1-txt4 txt-center p-t-10">
				Kami akan memeberikan lisensinya
			</p>
			<script>
				 function tampilkanwaktu() { //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
    		var waktu = new Date(); //membuat object date berdasarkan waktu saat 
    		var sh = waktu.getHours() +
    			""; //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
    		var sm = waktu.getMinutes() + ""; //memunculkan nilai detik    
    		var ss = waktu.getSeconds() +
    			""; //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
    			document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh);
        document.getElementById("minute").innerHTML = (sm.length == 1 ? "0" + sm : sm);
        document.getElementById("second").innerHTML =(ss.length == 1 ? "0" + ss : ss);
    	}
			</script>
		</div>
	</div>



	

<!--===============================================================================================-->	
	<script src="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/countdowntime/moment.min.js"></script>
	<script src="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: <?php echo $hari;?>,
			endtimeHours: 0,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/asset/asset_coming/comingsoon_03/js/main.js"></script>

</body>
</html>