<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Daftar Materi Yang Tersedia</h3>
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
						<h2>Daftar Materi</small></h2>
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
						<p class="text-muted font-13 m-b-30">
							<a href="<?php echo base_url();?>index.php/c_guru/tambah_soal"
								class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Tambah Soal Baru</a>
							<a class="btn btn-warning btn-sm"
								href="<?php echo base_url();?>dokumen_web/format_soal_download.xlsx"><i
									class="fa fa-download"></i> Dowload Format Soal</a>
							<a class="btn btn-primary btn-sm" href="#" data-toggle='modal'
								data-target='#modal_import_soal'><i class="fa fa-upload"></i> Import Format Soal</a>
							<a class="btn btn-primary btn-sm" href=""><i class="fa fa-print"></i> Cetak</a>
						</p>

						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive wrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th style="width: 20px">Nomor</th>
									<th>Soal</th>
									<th style="width: 20px">KD</th>
									<th style="width:30px">Analisa</th>
									<th style="width: 20px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								 foreach ($paket as $value):?>
								<tr>
									<td><?= $no++?></td>
									<td><?= $value['soal']?></td>
									<td>Hukum Newton</td>
									<td>
										Jumlah Soal Keluar: <a class="green"><?=$value['jml_soal']?></a> <br>
										Benar: <a href="#" class="green"><?= $value['jml_benar']?></a>, Salah: <a
											href="#" class="red"><?= $value['jml_salah']?></a> <br>
										Persentasi Benar :<?= $value['persentase']?>
									</td>
									<td>
										<a class="btn btn-warning btn-xs"
											href="<?php echo base_url();?>index.php/c_guru/edit_soal/<?= $value['id']?>"><i
												class="fa fa-edit"></i> Edit</a>
										<a class="btn btn-danger btn-xs" data-toggle="modal"
											data-target="#konfirmasi_hapus_<?= $value['id']?>" href="#"><i
												class="fa fa-trash"></i> Hapus</a>
									</td>
								</tr>
								<!-- konfirmasi hapus-->
								<div class="modal fade" id="konfirmasi_hapus_<?= $value['id']?>" tabindex="-1"
									role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form
												action="<?php echo base_url();?>index.php/c_guru/hapus_soal/<?= $value['id']?>"
												method="post">
												<div class="modal-header">
													<h5 class="modal-title">Konfirmasi Hapus Soal</h5>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													Yakin akan hapus soal ini ?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">Tidak</button>
													<button type="submit" class="btn btn-primary">Ya</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<?php endforeach; ?>

							</tbody>
							</tbody>
						</table>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /page content -->
<!-- Modal modal impor soal -->
<div class="modal fade" id="modal_import_soal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?php echo base_url();?>index.php/import/soal" method="post" enctype="multipart/form-data" >
				<div class="modal-header">
					<h5 class="modal-title">Masukkan File Soal Yang Akan di Import</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Pilih File </label>
						<input type="file" name="import_excel" id="" class="form-control" placeholder="" aria-describedby="helpId">
						<small id="helpId" class="text-muted red">File yang di upload harus sesui dengan format yang di sediakan sistem</small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
