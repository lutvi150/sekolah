<!DOCTYPE html>
<html lang="en" id="">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMAN 1 SUNGAYANG</title>
	<link rel="shortcut icon" href="<?php echo base_url();?>gambar/gambar_web/favicon-96x96.png" type="image/x-icon">
	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>asset/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?php echo base_url();?>asset/nprogress/nprogress.css" rel="stylesheet">
	<!-- Animate.css -->
	<link href="<?php echo base_url();?>asset/animate.css/animate.min.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="<?php echo base_url();?>asset/build/css/custom.min.css" rel="stylesheet">
	<style>
		* {
			box-sizing: border-box;
		}

		html,
		body {
			background-color: rgb(223, 174, 174);
			color: rgb(255, 255, 255);
			margin: 0;
		}

		#myVideo {
			position: fixed;
			right: auto;
			bottom: auto;
			min-width: 100%;
			min-height: 100%;
		}

		.content {
			position: fixed;
			bottom: auto;
			background: rgba(0, 0, 0, 0.5);
			color: #f1f1f1;
			width: 100%;
			padding: 20px;
		}

		#myBtn {
			width: 200px;
			font-size: 18px;
			padding: 10px;
			border: none;
			background: #000;
			color: #fff;
			cursor: pointer;
		}

		#myBtn:hover {
			background: #ddd;
			color: black;
		}

		.fullscreen-bg {
			position: fixed;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			overflow: hidden;
			z-index: -100;
		}

		.black {
			color: #000;
		}

		.fullvidio {
			position: absolute;

		}

		.pdf_size {
			width: 570px;
			height: 500px;
		}

	</style>
</head>

<body>
	<div class="fullscreen-bg">
		<video class="fullvidio" autoplay loop id="myVideo">
			<source src="<?php echo base_url(); ?>gambar/gambar_web/XiaoYing_Video_1563686122060.mp4" type="video/mp4">
			Your browser does not support HTML5 video.
		</video>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>
		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form id="verifikasi_login" action="<?php echo base_url();?>index.php/controller/verifikasi_login"
						method="POST">
						<h1>Media Pembelajaran <br> Fisika</h1>
						<?php if ($this->session->userdata('error')):?>
						<div id="message_error" class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Maaf !</h4>
							<?php echo $this->session->userdata('error');?>
						</div>
						<?php elseif ($this->session->userdata('success')):?>
						<div id="message_success" class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Success !</h4>
							<?php echo $this->session->userdata('success');?>
						</div>
						<?php endif;?>
						<div>
							<input type="text" class="form-control" placeholder="Username" name="username"
								required="" />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Password" name="password"
								required="" />
						</div>
						<div>
							<button type="button" id="btnlogin" name="btnlogin" class="btn btn-default submit">Log
								in</button>
							<a class="reset_pass" href="#">Lupa password?</a>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">Barukah ?
								<a href="#signup" class="to_register"> Buat ID disini </a>
							</p>
							<a href="#" id="btntutorial" class="btn btn-success"><i class="fa fa-info"></i> Tutorial</a>
							<div class="clearfix"></div>
							<br />

							<div>
								<h1><i class="fa fa-graduation-cap"></i>SMAN 1 SUNGAYANG</h1>
								<p>©2019 All Rights Reserved. SMAN 1 SUNGAYANG</p>
							</div>
						</div>

					</form>
				</section>
			</div>
			<div id="register" class="animate form registration_form">
				<section class="login_content">
					<form method="POST" action="<?php echo base_url();?>index.php/controller/daftar_baru">
						<h1>Daftar Baru</h1>
						<div>
							<input type="text" class="form-control" placeholder="Nama Jelas" name="nama" required="" />
						</div>
						<div>
							<input type="text" class="form-control" placeholder="Username" name="username"
								required="" />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Password" name="password"
								required="" />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Ulangi Password"
								name="ulangi_password" required="" />
						</div>
						<div>
							<button type="submit" class="btn btn-default submit">Daftar</button>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">Sudah Terdafar ?
								<a href="#signin" class="to_register"> Log in </a>
							</p>

							<div class="clearfix"></div>
							<br />

							<div>
								<h1><i class="fa fa-graduation-cap"></i>SMAN 1 SUNGAYANG</h1>
								<p>©2019 All Rights Reserved. SMAN 1 SUNGAYANG</p>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
	<!-- Modal logout doa -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h2 class="modal-title black">Silahkan Baca Doa Akan Belajar Dulu <button type="button"
							class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button></h2>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<div class="col-md-12 col-sm-12">
								<img class="col-md-12 col-sm-12 col-xs-12"
									src="<?= base_url();?>gambar/gambar_user/doa_sebelum_belajar.png" alt="" srcset="">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
					<button type="button" id="sudah" class="btn btn-primary">Sudah</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="tutorial" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title black">Tutorial
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"></h2>
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<embed class="pdf_size" src="<?=base_url();?>gambar/gambar_web/tutorial.pdf" type="">
				</div>
				<div class="modal-footer">
					<a href="<?=base_url();?>gambar/gambar_web/tutorial.pdf" target="_blank" class="btn btn-success"><i
							class="fa fa-download"></i>Tutorial</a>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="<?php echo base_url();?>asset/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>asset/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
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
	$('#btnlogin').on('click', function () {
		$('#login').modal('show');
	});
	$('#sudah').on('click', function () {
		$('#verifikasi_login').submit();
	});
	$('#btntutorial').click(function (e) {
		$('#tutorial').modal('show');
	});

</script>

</html>
