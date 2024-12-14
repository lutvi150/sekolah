<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Daftar Pustaka Dan Referensi </h3>
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
						<h2>Daftar Pustaka</small></h2>
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
						<div id="" class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-info"></i> Informasi !</h4>
							<li>Klik Referensi Untuk Beralih Ke link atau URL Referensi</li>
							<li>
								Referensi dengan tanda "<i class="fa fa-check green" aria-hidden="true"></i>" di
								belakang berarti memiliki link akses ke internet
							</li>
							<li>
								Referensi dengan tanda "<i class="fa fa-ban red" aria-hidden="true"></i>" di
								belakang berarti tidak memiliki link akses ke internet
							</li>
						</div>
						<p class="text-muted font-13 m-b-30">
							
						</p>

						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th style="width: 20px">Nomor</th>
									<th>Referensi</th>
									<th style="width: 20px">Tanggal Ditambahkan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								 foreach ($pustaka as $field):?>
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php if ($field['url']=='Kosong'):?>
										<?php echo $field['alamat'];?><i class="fa fa-ban red"></i>
										<?php else :?>
										<a href="<?php echo $field['url'];?>" target="_blank" ><?php echo $field['alamat']?><i class="fa fa-check green"></i></a>
										<?php endif;?>
									</td>
									<td><?php echo $field['tgl_input'];?></td>
								</tr>
								<?php endforeach;?>
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

<!-- Modal Tambah Pustaka -->
<div class="modal fade" id="tambah_pustaka" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambahkan Pustaka</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url();?>index.php/c_guru/simpan_pustaka" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Judul Pustaka</label>
						<input type="text" name="alamat" id="" class="form-control" placeholder=""
							aria-describedby="helpId">
						<small id="helpId" class="text-muted"></small>
					</div>
					<div class="form-group">
						<label for="">URL atau Link di Internet</label>
						<input type="text" name="link" id="" class="form-control" placeholder=""
							aria-describedby="helpId">
						<small id="helpId" class="text-muted red">Tambahkan URL/ Link dari referensi jika ada</small>
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
<?php foreach ($pustaka as $value):?>
<!-- Modal edit Pustaka -->
<div class="modal fade" id="edit_pustaka_<?php echo $value['id_pustaka']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambahkan Pustaka</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url();?>index.php/c_guru/simpan_pustaka_edit/<?php echo $value['id_pustaka'];?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Judul Pustaka</label>
						<input type="text" name="alamat" value="<?php echo $value['alamat'];?>" id="" class="form-control" placeholder=""
							aria-describedby="helpId">
						<small id="helpId" class="text-muted"></small>
					</div>
					<div class="form-group">
						<label for="">URL atau Link di Internet</label>
						<input type="text" name="link" value="<?php echo $value['url'];?>" id="" class="form-control" placeholder=""
							aria-describedby="helpId">
						<small id="helpId" class="text-muted red">Tambahkan URL/ Link dari referensi jika ada</small>
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
<?php endforeach;?>

