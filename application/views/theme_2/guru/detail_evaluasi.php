<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Detail Peserta Evaluasi</h3>
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
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Evaluasi : <a href="#" class="red"><?= $nama_evaluasi?></a> </small></h2>
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
					

						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive wrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center" style="width: 20px">Nomor</th>
									<th>Nama Siswa</th>
									<th class="text-center" style="width: 20px">Nilai</th>
									<th style="width:100px">Jumlah Benar</th>
									<th style="width: 120px">Tanggal Mulai</th>
									<th style="width: 120px">Tanggal Selesai</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								 foreach ($data_peserta as $value):?>
								<tr>
									<td><?= $no++?></td>
									<td><?= $value['nama']?></td>
									<td><?=$value['nilai']?></td>
									<td><?=$value['jml_benar']?> Soal</td>
									<td><?=$value['tgl_mulai']?></td>
									<td><?=$value['tgl_selesai']?></td>
								</tr>
								<?php endforeach; ?>

							</tbody>
				
							
						</table>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /page content -->

