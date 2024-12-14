<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SMAN 1 SUNGAYANG</title>
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>gambar/gambar_web/favicon-96x96.png" type="image/x-icon">
	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>asset/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url();?>asset/fontawesome-free-5.10.0-web/css/fontawesome.min.css">
	<!-- NProgress -->
	<link href="<?php echo base_url();?>asset/nprogress/nprogress.css" rel="stylesheet">
	<!-- color picker -->
	<link href="<?php echo base_url();?>asset/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"
		rel="stylesheet">
	<!-- bootstrap-datetimepicker -->
	<link href="<?php echo base_url();?>asset/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css"
		rel="stylesheet">
	<!-- Datatables -->
	<link href="<?php echo base_url();?>asset/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>asset/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>asset/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
		rel="stylesheet">
	<link href="<?php echo base_url();?>asset/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
		rel="stylesheet">
	<link href="<?php echo base_url();?>asset/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
		rel="stylesheet">
	<!-- color picker -->
	<link href="<?php echo base_url();?>asset/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"
		rel="stylesheet">
	<!-- tree maping -->
	<link rel="stylesheet" href="<?php echo base_url();?>asset/stiff-chart/costume.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/stiff-chart/stiff-chart.css">
	<!-- Custom Theme Style -->
	<link href="<?php echo base_url();?>asset/build/css/custom.min.css" rel="stylesheet">
	<!-- costume tambahan -->
	<link rel="stylesheet" href="<?= base_url();?>asset/costume/costume.css">
	
    <!-- jQuery -->
    <script src="<?php echo base_url();?>asset/jquery/dist/jquery.min.js"></script>
</head>
<style>
	/* menu sebelah kiri */
	.nav.side-menu>li>a,
	.nav.child_menu>li>a {
		color: <?=$text_menu;
		?>;
		font-weight: 500
	}

	.left_col {
		background: <?=$warna_menu;
		?>;
	}

	body {
		color: <?=$warna_text;
		?>;
		background: #2A3F54;
		font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
		font-size: 13px;
		font-weight: 400;
		line-height: 1.471;
	}

	.x_panel {
		width: 100%;
		padding: 10px 17px;
		display: inline-block;
		background: <?=$warna_background;
		?>;
		border: 1px solid #E6E9ED;
		-webkit-column-break-inside: avoid;
		-moz-column-break-inside: avoid;
		column-break-inside: avoid;
		opacity: 1;
		transition: all .2s ease;
	}

	.gambar_pengembang {
		width: 200px;
		height: 200px;
		border-radius: 50%;
	}

</style>

<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()',1000);" class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">


					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="<?php echo base_url();?>gambar/gambar_user/icon-admin.png" alt="..."
								class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Selamat Datang,</span>
							<h2><?php echo $this->session->userdata('nama');?></h2>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu</h3>
							<ul class="nav side-menu">
								<li><a href="<?php echo base_url();?>index.php/c_siswa"><i class="fa fa-home"></i>
										Beranda</a>
								</li>
								<!-- <li><a href="<?php echo base_url();?>index.php/c_siswa/profile"><i class="fa fa-user"></i> Profil </a>
								</li> -->
								<li><a><i class="fa fa-edit"></i> Daftar Materi <span
											class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="<?php echo base_url();?>index.php/c_siswa/ki_kd">
												<i class="fa fa-tag"></i>KI dan KD
											</a>
										</li>
										<li><a href="<?php echo base_url();?>index.php/c_siswa/materi">
												<i class="fa fa-pencil"></i>Materi
											</a>
										</li>
										<li><a href="<?php echo base_url();?>index.php/c_siswa/maping"><i
													class="fa fa-cube"></i> Maping Materi</a></li>

									</ul>
								</li>
								</li>
								<li><a href="<?php echo base_url();?>index.php/c_siswa/vidio"><i
											class="fa fa-video-camera"></i>
										Animasi/ Video </a>
								</li>
								<li><a href="<?php echo base_url();?>index.php/c_siswa/evaluasi"><i
											class="fa fa-bar-chart-o"></i>
										Evaluasi </a>
								</li>
								<li><a href="<?php echo base_url();?>index.php/c_siswa/pustaka"><i
											class="fa fa-book"></i> Daftar Pustaka
										dan Sumber Materi
									</a>
								</li>
								<li><a data-toggle="modal" data-target='#tentang_aplikasi' href="#"><i
											class="fa fa-info"></i> Tentang Pengembang
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>
			<!-- Modal logout doa -->
			<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form action="<?= base_url();?>controller/logout" method="post">
							<div class="modal-header">
								<h5 class="modal-title">Silahkan Baca Doa Sesudah Belajar Dulu</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<img class="col-md-12 col-sm-12 col-xs-12"
												src="<?= base_url();?>gambar/gambar_user/doa_setelah_belajar.png" alt=""
												srcset="">
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
								<button type="submit" class="btn btn-primary">Sudah</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false">
									<img src="<?php echo base_url();?>gambar/gambar_user/icon-admin.png"
										alt=""><?php echo $this->session->userdata('nama');?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<!-- <li><a href="<?php echo base_url();?>index.php/c_siswa/profile"> Profile</a></li> -->
									<li><a href="<?php echo base_url();?>index.php/c_siswa/ubah_password"> Ubah
											Password</a></li>
											<li><a href="#" class="bantuan" data-toggle="modal" data-target="#bantuan">Bantuan</a></li>
									<li><a href="<?php echo base_url();?>index.php/c_siswa/setting">Seting Tampilan</a>
									</li>
									<li><a href="#" data-toggle="modal" data-target="#logout"><i
												class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>

							<li role="presentation" class="dropdown">
								<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
									aria-expanded="false">
									<i class="fa fa-envelope-o"></i>
									<span class="badge bg-green">6</span>
								</a>
								<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
									<li>
										<a>
											<span class="image"><img
													src="<?php echo base_url();?>gambar/gambar_user/icon-admin.png"
													alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img
													src="<?php echo base_url();?>gambar/gambar_user/icon-admin.png"
													alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img
													src="<?php echo base_url();?>gambar/gambar_user/icon-admin.png"
													alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img
													src="<?php echo base_url();?>gambar/gambar_user/icon-admin.png"
													alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li>
										<div class="text-center">
											<a>
												<strong>See All Alerts</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="bantuan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Bantuan<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button></h5>
								
						</div>
						<div class="modal-body">
							<center>Untuk bantuan dan kendala aplikasi anda dapat menghubungi kami di </center><br>
							<a href="https://bit.ly/2uXDHBb" target="_blank"><i class="fa fa-phone green"></i> WA:0822-8539-4454(klik untuk informasi lebih lanjut)</a>
							<br>
							<i class="fa fa-envelope"></i> Email:Harryilhamihaser@gmail.com

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="modalhelp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Kontak Informasi dan Laporan Bug Aplikasi<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button></h5>
							
						</div>
						<div class="modal-body">
								<div class="form-group">
								  <label for="" class="col-md-3 col-sm-3 col-xs-12">Nomor HP/ WA</label>
								  <label for="" class="col-md-9 col-sm-9 col-xs-12">: 0822 8539 8454</label>
								</div>
								<div class="form-group">
									<label for="" class="col-md-3 col-sm-3 col-xs-12">Email</label>
									<label for="" class="col-md-9 col-sm-9 col-xs-12">: Harryilhamihaser@mail.com</label>
								  </div>
								  <div class="form-group">
									<label for="" class="col-md-3 col-sm-3 col-xs-12">Alamat</label>
									<label for="" class="col-md-9 col-sm-9 col-xs-12">: Aur malintang, padang pariaman, Sumbar</label>
								  </div>					
						
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal tentang aplikasi -->
			<div class="modal fade" id="tentang_aplikasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Tentang Aplikasi</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Developer :</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<label for="" class="control-label col-md-9 col-sm-9 col-xs-12">Harry ilhami
											haser</label>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Data Diri </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<label for="" class="control-label col-md-9 col-sm-3 col-xs-12">mahasiswa fisika
											yang sedang menyelesaikan semester akhir dijurusan fisika fakultas tarbiyah,
											IAIN Batusangkar</label>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<img class="gambar_pengembang"
											src="<?php echo base_url();?>gambar/gambar_web/130520190449552016-09-25-11-08-10-214.jpg"
											alt="">
									</div>
								</div>

							</form>
						</div>
						<div class="modal-footer">

						</div>
					</div>
				</div>
			</div>
			<!-- /top navigation -->
