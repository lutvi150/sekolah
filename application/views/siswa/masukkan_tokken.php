<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Masukkan Token</h3>
			</div>
			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Masukkan Token</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
									aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a>
									</li>
									<li><a href="#">Settings 2</a>
									</li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?php if ($this->session->userdata('error')):?>
						<div id="message_error" class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Maaf !</h4>
							<?php echo $this->session->userdata('error');?>
						</div>
						<?php elseif ($this->session->userdata('success')):?>
						<div id="message_success" class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukes !</h4>
							<?php echo $this->session->userdata('success');?>
						</div>
						<?php endif;?>
						<input type="hidden" name="id_ujian" id="id_ujian" value="<?php echo $du['id']; ?>">
						<input type="hidden" name="_token" id="_token" value="<?php echo $du['token']; ?>">
						<input type="hidden" name="_tgl_sekarang" id="_tgl_sekarang"
							value="<?php echo date('Y-m-d H:i:s'); ?>">
						<input type="hidden" name="_tgl_mulai" id="_tgl_mulai" value="<?php echo $tgl_mulai; ?>">
						<input type="hidden" name="_terlambat" id="_terlambat" value="<?php echo $terlambat; ?>">
						<input type="hidden" name="_statuse" id="_statuse" value="<?php echo $du['statuse']; ?>">
						<table class="table table-bordered">
							<tr>
								<td width="">Nama</td>
								<td width="">lord</td>
							</tr>
							<tr>
								<td>NIM</td>
								<td>1550010081</td>
							</tr>
							<tr>
								<td>Nama Evaluasi</td>
								<td><?= $du['nama_ujian']?> /Token <a href="#" class="btn btn-danger btn-xs"><?=$du['token']?></a></td>
							</tr>
							<tr>
								<td>Jml Soal</td>
								<td><?= $du['jumlah_soal']?></td>
							</tr>
							<tr>
								<td>Waktu</td>
								<td><?= $du['waktu']?></td>
							</tr>
							<tr>
								<td>Token</td>
								<td><input type="text" name="token" id="token" required="true"
										class="form-control col-md-3"></td>
							</tr>
						</table>


					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2></small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
									aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a>
									</li>
									<li><a href="#">Settings 2</a>
									</li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="alert alert-info">
							Waktu boleh mengerjakan ujian adalah saat tombol "MULAI" berwarna hijau..!
						</div>
						<div id="btn_mulai">Ujian akan mulai dalam <div id="akan_mulai"></div>
						</div>

						<div class="btn btn-danger" id="waktu_" style="margin-top: 20px">
							Sisa waktu mengikuti ujian <br>
							<span id="waktu_akhir_ujian"></span>
						</div>

						<div id="waktu_game_over"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /page content -->
