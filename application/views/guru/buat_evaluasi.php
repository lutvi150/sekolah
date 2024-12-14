<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Evaluasi Untuk Semua User</h3>
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
						<h2>Evaluasi Untuk Semua User</small></h2>
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
							<a href="#" data-toggle="modal" data-target="#tambah_evaluasi"
								class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Tambah Evaluasi</a>
						</p>

						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive wrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center" style="width: 20px">Nomor</th>
									<th>Nama Evaluasi</th>
									<th class="text-center" style="width: 20px">Jumlah Soal</th>
									<th style="width:30px">Waktu</th>
									<th style="width: 150px">Status</th>
									<th style="width: 20px">Token</th>
									<th class="text-center" style="width: 100px">Masa Berlaku Soal</th>
									<th style="width: 100px">Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php if ($data_evaluasi=='Ada'):?>
								<?php
								$no=1;
								 foreach ($evaluasi as $value):?>
								<tr>
									<td><?= $no++?></td>
									<td><?= $value['nama_ujian']?></td>
									<td><?=$value['jumlah_soal']?></td>
									<td><?=$value['waktu']?> Menit</td>
									<td>
										Jumlah Siswa Mengikuti: <a class="green"><?=$value['jumlah_siswa']?></a> <br>
										Nilai tertinggi: <a href="#" class="green"><?=$value['nilai_tertinggi']?></a><br>
										<a href="<?= base_url();?>c_guru/detail_evaluasi/<?= $value['id']?>" id="detail_peserta" class="btn btn-info btn-xs">Detail Peserta</a>
										
									</td>
									<td><a href="#" class="btn btn-primary btn-xs"><?=$value['token']?></a></td>
									<td class="text-center">
										<?=$value['tgl_mulai'].'<br> Sampai <br> '.$value['terlambat']?></td>
									<td>
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
												action="<?php echo base_url();?>index.php/c_guru/hapus_evaluasi/<?= $value['id']?>"
												method="post">
												<div class="modal-header">
													<h5 class="modal-title">Konfirmasi Hapus Evaluasi</h5>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													Yakin akan hapus evaluasi ini ?
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
<?php else:?>
<tr>
	<td colspan="8" >Tidak Ada Data Yang Ditemukan</td>
</tr>
<?php endif; ?>

							</tbody>
				
							
						</table>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /page content -->
<!-- Modal tambah evaluasi -->
<div class="modal fade" id="tambah_evaluasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?php echo base_url();?>index.php/c_guru/simpan_evaluasi" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h2 class="modal-title">Tambah Evaluasi</h2>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning" role="alert">
						<h4 class="alert-heading"><i class="fa fa-info"></i> Petunjuk</h4>
						<p>
							<ul>
								<li><b class="red">Jumlah Soal</b>, harap masukkan jumlah soal sesuai kenginan anda</li>
								<li><b class="red">Waktu Evaluasi</b>, waktu yang di butuhkan untuk menyelesaikan semua
									soal evaluasi yang tersedia</li>
								<li><b class="red">Acak Soal</b>, apakah soal yang di tampilkan acak atau tidak</li>
							</ul>
						</p>
						<p class="mb-0"></p>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs 12">
							<div class="form-group row">
								<label for="" class="col-md-3 col-sm-3 col-xs-12">Nama Evaluasi</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<textarea name="nama_ujian" class="form-control" id="" cols="30"
										rows="2"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="jumlah_soal" class="col-md-3 col-sm-3 col-xs-12">Jumlah Soal</label>
								<div class="col-md-2 col-sm-2 col-xs-12">
									<input type="text" name="jumlah_soal" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-md-3 col-sm-3 col-xs-12">Masa Berlaku Soal</label>
								<div class="col-md-9 col-sm-2 col-xs-12">
									<label for="" class="col-md-2 col-sm-2 col-xs-12">Mulai dari </label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class='input-group date' id='myDatepicker2'>
											<input type='text' name="tgl_mulai" class="form-control" />
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class='input-group date' id='myDatepicker4'>
											<input type='text' name="jam_mulai" class="form-control" />
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-md-3 col-sm-3 col-xs-12"></label>
								<div class="col-md-9 col-sm-2 col-xs-12">
									<label for="" class="col-md-2 col-sm-2 col-xs-12">Sampai dengan </label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class='input-group date' id='myDatepicker3'>
											<input type='text' name="tgl_selesai" class="form-control" />
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class='input-group date' id='myDatepicker5'>
											<input type='text' name="jam_selesai" class="form-control" />
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-md-3 col-sm-3 col-xs-12">Waktu Evaluasi</label>
								<div class="col-md-2 col-sm-2 col-xs-12">
									<input type="text" name="waktu" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
								<label for="" class="col-md-7 col-sm-7 col-xs-12">Menit</label>
							</div>
							<div class="form-group row">
								<label for="" class="col-md-3 col-sm-3 col-xs-12">Acak Soal</label>
								<div class="col-md-9 col-sm-2 col-xs-12">
									<select name="jenis" class="form-control" id="">
										<option value="pilih">Pengacakan Soal</option>
										<option value="acak">Soal di Acak</option>
										<option value="">Soal di Urutkan</option>
									</select>
								</div>
							</div>
						</div>
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
