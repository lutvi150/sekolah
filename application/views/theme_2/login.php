<!DOCTYPE html>
<html lang="en" id="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>gambar/gambar_web/favicon-96x96.png" type="image/x-icon">
	<title><?=$this->config->item('school')?></title>
	<!-- Custom CSS -->
	<link href="<?=base_url()?>asset/theme_2/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
	.red {
		color: red;
	}

</style>

<body>
	<div class="main-wrapper">
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<div class="preloader">
			<div class="lds-ripple">
				<div class="lds-pos"></div>
				<div class="lds-pos"></div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Login box.scss -->
		<!-- ============================================================== -->
		<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
			style="background:url('<?=base_url();?>gambar/gambar_web/auth-bg.jpg') no-repeat center center;">
			<div class="auth-box row">
				<!-- <div class="col-lg-7 col-md-5 modal-bg-img"
					style="background-image: url('<?=base_url();?>gambar/gambar_web/auth-login.jpg');with:100%;">
				</div>
				 -->
				 <!-- <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/ed/SMA_Negeri_2_Padang_Panjang.jpg');" ></div> -->
				 				 <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url('<?=base_url('gambar/gambar_web/t4OqqkDgDlMpYzuLe2JRWyUWvtOYFbfYYOJUz3oy.jpg');?>');" ></div>
				<div class="col-lg-5 col-md-7 bg-white">
					<div class="p-3">
						<div class="text-center">
							<img src="<?=base_url();?>gambar/gambar_web/sman15takengon.png" style="width: 30%;"
								alt="wrapkit">
						</div>
						<h2 class="mt-3 text-center header-login">Login</h2>
						<p class="text-center"><?=$this->config->item('nama_aplikasi')?></p>

						<div id="message_error" hidden class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Maaf !</h4>
							<p class="text-error"></p>
						</div>
						<div id="message_success" hidden class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Success !</h4>
							<p class="text-success"></p>
						</div>
						<form id="wage" class="mt-4">
							<div class="row  login-form">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="uname">Username</label>
										<input class="form-control" name="username" id="uname" type="text"
											placeholder="Login dengan Email anda">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="pwd">Password</label>
										<input class="form-control" id="pwd" name="password" type="password"
											placeholder="Password Anda">
									</div>
								</div>
								<div class="col-lg-12 text-center">
									<div class="show-loading" hidden>
										<div class="spinner-border" role="status">

										</div>
										<span class="">Login Proses mohon tunggu...</span>
									</div>
										<button type="button" class="btn btn-block btn-dark button-login"
											onclick="processLogin()">Login</button>
									<button class="btn btn-block btn-dark">
										<img width="20px" style="margin-bottom:3px; margin-right:5px"
											alt="Google sign-in"
											src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
										Login with Google
									</button>
								</div>
								<div class="col-lg-12 text-center mt-5">
									Belum Punya Account ? <a href="#" class="text-danger show-register"
										onclick="showRegister()">Klik Disini</a>
									<br>
									Lupa Password ? <a href="#" class="text-danger" onclick="showResetPassword()">Klik
										disini</a>
								</div>
							</div>
							<div class="row reset-password-form" hidden>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="uname">Email</label>
										<input class="form-control" id="uname" type="text"
											placeholder="Gunakan Email Terdaftar">
									</div>
								</div>
								<div class="col-lg-12 text-center">
									<button type="button" class="btn btn-block btn-dark">Reset Password</button>

								</div>
								<div class="col-lg-12 text-center mt-5">
									Ingin Login ? <a href="#" class="text-danger" onclick="showLogin()">Klik disini</a>
								</div>
							</div>
							<!-- show register -->
							<div class="row  register-form" hidden>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="uname">Username</label>
										<input class="form-control" name="username" id="runame" type="text"
											placeholder="Login dengan Email anda">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="uname">Nama</label>
										<input class="form-control" name="username" id="nama" type="text"
											placeholder="Gunakan Nama Anda">
									</div>
								</div>

								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="pwd">Password</label>
										<input class="form-control" id="rpwd" onkeyup="checkPwd()" name="rpassword"
											type="password" placeholder="Password Anda">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="pwd">Ulangi Password</label>
										<input class="form-control" id="trypwd" name="trypassword" onkeyup="checkPwd()"
											type="password" placeholder="Password Anda">
										<span class="red error-password"></span>
									</div>
								</div>

								<div class="col-lg-12 text-center">
									<button type="button" onclick="processRegister()" hidden
										class="btn btn-block btn-dark btn-register">Daftar</button>

									<button class="btn btn-block btn-dark">
										<img width="20px" style="margin-bottom:3px; margin-right:5px"
											alt="Google sign-in"
											src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
										Register with Google
									</button>
								</div>
								<div class="col-lg-12 text-center mt-5">
									Ingin Login ? <a href="#" class="text-danger" onclick="showLogin()">Klik disini</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- Login box.scss -->
		<!-- ============================================================== -->
	</div>

</body>
<script src="<?php echo base_url();?>asset/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>asset/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
	function hideAlert(prom) {
		window.setTimeout(function () {
			$(prom).fadeTo(1000, 0).slideUp(500, function () {
				$(this).hide();
			});
		}, 6000);
	}

	$('#btnlogin').on('click', function () {
		$('#login').modal('show');
	});
	$('#sudah').on('click', function () {
		$('#verifikasi_login').submit();
	});
	$('#btntutorial').click(function (e) {
		$('#tutorial').modal('show');
	});
	$(".preloader ").fadeOut();
	$(document).ready(function () {
		showLogin();
	});

	function showResetPassword() {
		$('.header-login').text('Reset Password');
		$('.login-form').hide();
		$('.register-form').hide();
		$('.reset-password-form').removeAttr('hidden style');
	}

	function showLogin() {
		$('.header-login').text('Login');
		$('.reset-password-form').hide();
		$('.register-form').hide();
		$('.login-form').removeAttr('hidden style');
	}

	function showRegister() {
		$('.header-login').text('Daftar Account Baru');
		$('.reset-password-form').hide();
		$('.login-form').hide();
		$('.register-form').removeAttr('hidden style');
	}
function make_(){
		$.ajax(
			{

			}
		)
}
	function processLogin() {
		$(".show-loading").removeAttr('hidden style');
		$(".button-login").hide();
		$('#message_error').hide();
		let data = {
			username: $('#uname').val(),
			password: $('#pwd').val(),
		}
		$.ajax({
			type: "POSt",
			url: "<?=base_url();?>ApiController/verifikasi_login",
			data: data,
			dataType: "JSON",
			success: function (response) {
				if (response.msg == 'Login Success') {
					// console.log('success');
					$(".show-loading").hide();
					$(".button-login").removeAttr('hidden style');
					window.location.href = "<?=base_url()?>";
				} else if (response.msg == 'Login Failed') {
					$(".show-loading").hide();
					$(".button-login").removeAttr('hidden style');
					$('.text-error').text('Maaf Username atau Password yang anda gunakan salah');
					$('#message_error').removeAttr('hidden style');
					hideAlert('#message_error');
				}
			}
		});
	}

	function processRegister() {
		$("#message_error").hide();
		$("#message_success").hide();
		let data = {
			username: $('#runame').val(),
			password: $('#rpwd').val(),
			ulangi_password: $('#trypwd').val(),
			nama: $('#nama').val(),
		}
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>ApiController/daftar_baru",
			data: data,
			dataType: "JSON",
			success: function (response) {
				if (response.msg == 'Register Success') {
					$(".text-success").text(
						"Pendaftaran berhasil di lakukan, silahkan di lanjutkan untuk login");
					$("#message_success").removeAttr('hidden style');
					$("input").val("");
					hideAlert('#message_success');
				} else if (response.msg == 'Username Already') {
					$('.text-error').text('Maaf Email Yang anda gunakan sudah terdaftar');
					$('#message_error').removeAttr('hidden style');
					hideAlert('#message_error');
				} else if (response.msg == 'Username Not Same') {
					$('.text-error').text('Maaf Password Tidak Sama');
					$('#message_error').removeAttr('hidden style');
					hideAlert('#message_error');
				}
			}
		});
	}

	function checkPwd() {
		let rpwd = $("#rpwd").val();
		let trypwd = $("#trypwd").val();
		if (rpwd !== trypwd) {
			$(".btn-register").attr("hidden", "true");
			$(".error-password").text('Password Tidak Sama');
		} else {
			$(".error-password").text('');
			$(".btn-register").removeAttr('hidden style');
		}
	}
	var wage = document.getElementById("wage");
	wage.addEventListener("keydown", function (e) {
		if (e.code === "Enter") { //checks whether the pressed key is "Enter"
			processLogin();
		}
	});

</script>

</html>
