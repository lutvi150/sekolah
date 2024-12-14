<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?=$this->config->item('school')?></title>
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>gambar/gambar_web/favicon-96x96.png" type="image/x-icon">
	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>asset/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url(); ?>asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url();?>asset/fontawesome-free-5.10.0-web/css/fontawesome.min.css">
	<!-- NProgress -->
	<link href="<?php echo base_url(); ?>asset/nprogress/nprogress.css" rel="stylesheet">
	<!-- color picker -->
	<link href="<?php echo base_url(); ?>asset/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"
		rel="stylesheet">
	<!-- bootstrap-datetimepicker -->
	<link href="<?php echo base_url(); ?>asset/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css"
		rel="stylesheet">
	<!-- Datatables -->
	<link href="<?php echo base_url(); ?>asset/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>asset/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>asset/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
		rel="stylesheet">
	<link href="<?php echo base_url(); ?>asset/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
		rel="stylesheet">
	<link href="<?php echo base_url(); ?>asset/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
		rel="stylesheet">
	<!-- color picker -->
	<link href="<?php echo base_url(); ?>asset/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"
		rel="stylesheet">
	<!-- tree maping -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/stiff-chart/costume.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/stiff-chart/stiff-chart.css">
	<!-- Custom Theme Style -->
	<link href="<?php echo base_url(); ?>asset/build/css/custom.min.css" rel="stylesheet">
	<!-- costume tambahan -->
	<link rel="stylesheet" href="<?=base_url();?>asset/costume/costume.css">
	<script src="<?php echo base_url(); ?>asset/jquery/dist/jquery.min.js"></script>
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
							<img src="<?php echo base_url(); ?>gambar/gambar_user/icon-admin.png" alt="..."
								class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Selamat Datang,</span>
							<h2><?php echo $this->session->userdata('nama'); ?></h2>
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
								<li><a href="<?php echo base_url(); ?>index.php/c_siswa"><i class="fa fa-home"></i>
										Beranda</a>
								</li>
								<!-- <li><a href="<?php echo base_url(); ?>index.php/c_siswa/profile"><i class="fa fa-user"></i> Profil </a>
								</li> -->
								<li><a><i class="fa fa-edit"></i> Daftar Materi <span
											class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="<?php echo base_url(); ?>index.php/c_siswa/ki_kd">
												<i class="fa fa-tag"></i>KI dan KD
											</a>
										</li>
										<li><a href="<?php echo base_url(); ?>index.php/c_siswa/materi">
												<i class="fa fa-pencil"></i>Materi
											</a>
										</li>
										<li><a href="<?php echo base_url(); ?>index.php/c_siswa/maping"><i
													class="fa fa-cube"></i> Peta Konsep</a></li>

									</ul>
								</li>
								</li>
								<li><a href="<?php echo base_url(); ?>index.php/c_siswa/vidio"><i
											class="fa fa-video-camera"></i>
										Animasi/ Video </a>
								</li>
								<li><a href="<?php echo base_url(); ?>index.php/c_siswa/evaluasi"><i
											class="fa fa-bar-chart-o"></i>
										Evaluasi </a>
								</li>
								<li><a href="<?php echo base_url(); ?>index.php/c_siswa/question"><i
											class="fa fa-hand-o-up"></i> Tanya Jawab
									</a>
								</li>
								<li><a href="<?=base_url()?>c_siswa/absen" class=""><i
											class="fa fa-calendar-o "></i> Absen
									</a>
								</li>
								<li><a href="<?=base_url()?>c_siswa/tutorial" class=""><i
											class="fa fa-bell-o "></i> Tutorial
									</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/c_siswa/pustaka"><i
											class="fa fa-book"></i> Daftar Pustaka
										dan Sumber Materi
									</a>
								</li>
								<li><a href="#" class="tentang_aplikasi"><i
											class="fa fa-info tentang_aplikasi"></i> Tentang Pengembang
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
						<form action="<?=base_url();?>controller/logout" method="post">
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
												src="<?=base_url();?>gambar/leni/2.jpeg" alt=""
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
									<img src="<?php echo base_url(); ?>gambar/gambar_user/icon-admin.png"
										alt=""><?php echo $this->session->userdata('nama'); ?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<!-- <li><a href="<?php echo base_url(); ?>index.php/c_siswa/profile"> Profile</a></li> -->
									<li><a href="<?php echo base_url(); ?>index.php/c_siswa/ubah_password"> Ubah
											Password</a></li>
											<li><a href="#" class="bantuan" data-toggle="modal" data-target="#bantuan">Bantuan</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/c_siswa/setting">Seting Tampilan</a>
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
													src="<?php echo base_url(); ?>gambar/gambar_user/icon-admin.png"
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
													src="<?php echo base_url(); ?>gambar/gambar_user/icon-admin.png"
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
													src="<?php echo base_url(); ?>gambar/gambar_user/icon-admin.png"
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
													src="<?php echo base_url(); ?>gambar/gambar_user/icon-admin.png"
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

			<!-- Modal support -->
			<?php $this->load->view('theme_2/support_view/modal_support');?>
			<!-- Modal tentang aplikasi -->
		<?php $this->load->view('theme_2/support_view/modal_about_aplication');?>

