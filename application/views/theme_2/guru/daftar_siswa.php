<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3 id="nama_ujian">Siswa Yang Terdaftar</h3>
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
						<h2>Siswa Yang Terdaftar</small></h2>
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
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th style="width: 20px">Nomor</th>
									<!-- <th style="width: 20px">NIS</th> -->
									<th>Nama</th>
									<th style="width: 20px">Tanggal Resgistrasi</th>
									<th style="width: 20px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								 foreach ($data_siswa as $field):?>
								<tr>
									<td><?php echo $no++;?></td>
									<!-- <td><?php echo $field['nis'];?></td> -->
									<td><?php echo $field['nama'];?></td>
									<td><?php echo $field['tgl_registrasi']?></td>
									<td>
										<a href="#" id="" class="btn btn-info btn-xs btn_detail" data="<?= $field['id_user'];?>">Detail</a>
										<a id="" class="btn btn-danger btn-xs item_edit"
											href="<?php echo base_url();?>index.php/c_guru/hapus_siswa/<?=$field['id_user']?>"><i
												class="fa fa-trash"></i> Hapus</a>
									</td>
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

<!-- Modal for view nilai -->
<div class="modal fade" id="view_detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title">List Hasil Ujian
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h2>

			</div>
			<div class="modal-body">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_content">
							<ul class="list-unstyled timeline">
								<li>
									<div id="detail_ujian" class="block">
										
									</div>
								</li>
							</ul>

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<!-- /page content -->
