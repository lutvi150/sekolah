<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Siswa Yang Terdaftar</h3>
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
						<p class="text-muted font-13 m-b-30">
							<a href="#" data-toggle="modal" data-target="#tambah_user" 
								class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Tambah User</a>
							
						</p>

						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nomor</th>
									<th>NIS/NIP</th>
									<th>Nama</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								 foreach ($data_siswa as $field):?>
								<tr>
                                    <td><?php echo $no++;?></td>
									<td><?php echo $field['nis'];?></td>
									<td><?php echo $field['nama'];?></td>
									<td><?php echo $field['kelas']?></td>
                                    <td>
										<a href="" class="btn btn-info btn-xs">Detail</a>
                                        <a class="btn btn-warning btn-xs" href="<?php echo base_url();?>index.php/c_guru/edit_materi"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>index.php/c_guru/hapus_materi"><i class="fa fa-trash"></i> Hapus</a>
                                        <a href="btn btn-info btn-xs"><i class="fa fa-refresh"></i> Riset Password</a>
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

<!-- /page content -->

<!-- Modal tambah user -->
<div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>