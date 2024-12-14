<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Absen</h3>
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
						<h2>Daftar Absen</small></h2>
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
					<div class="x_content"><?php if ($this->session->userdata('error')):?>
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
							<a href="#"  
								class="btn btn-info btn-sm add-attendance"><i class="fa fa-plus"></i> Buat Absen Baru</a>
							
						</p>

						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Kelas</th>
									<th>Tanggal Absen</th>
									<th>Guru</th>
									<th>Total Absen</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($attendance as $key => $value):?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$value['class_name']?></td>
								<td><?=$value['date_attendance']?></td>
								<td><?=$value['nama']?></td>
								<td>
								<i class="fa fa-users"></i><?=$value['count']?> Orang</td>
								<td>
								<a href="#" data-id="<?=$value['id_attendance']?>" class="btn btn-danger btn-sm delete-attendance"><i class="fa fa-trash"></i></a>
								<a href="#" data-id="<?=$value['id_attendance']?>" class="btn btn-warning btn-sm edit-attendance"><i class="fa fa-edit"></i></a>
								<a href="<?=base_url()?>c_guru/detail_attendance/<?=$value['id_attendance']?>" class="btn btn-info btn-sm"><i class="fa fa-search"></i>Detail</a></td>
							</tr>
							</tbody>
							<?php endforeach; ?>
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
			<form id="form-attendance" method="post">
            <div class="modal-header">
                <h5 class="modal-title title-add">Tambahkan Absen</h5>
                   
            </div>
            <div class="modal-body">
				<input type="text" hidden name="id_edit" id="id_edit">
				<div class="form-group">
				  <label for="">Nama Kelas</label>
				  <input type="text" name="class_name" id="class_name" required class="form-control" placeholder="" aria-describedby="helpId">
				  <small id="helpId" class="text-muted"></small>
				</div>
				<div class="form-group">
				  <label for="">Tanggal Absen</label>
				  <input type="text" name="date_attendance" required id="date_attendance" class="form-control date_attendance" placeholder="" aria-describedby="helpId">
				  <small id="helpId" class="text-muted"></small>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="subbmit" class="btn btn-primary">Simpan</button>
            </div>
		</form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-attendance" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form action="<?=base_url()?>c_guru/delete_absen" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Hapus</h5>
				
			</div>
			<div class="modal-body">
				<input type="text" hidden id="id-attendance" name="id">
				Yakin akan hapus  data absen ini ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<button type="subbmit" class="btn btn-primary">ya</button>
			</div></form>
		</div>
	</div>
</div>
<script>
	$(".delete-attendance").click(function (e) { 
		e.preventDefault();
		let id=$(this).attr('data-id');
		$("#id-attendance").val(id);
		$("#delete-attendance").modal("show");
	});
	$(".add-attendance").click(function (e) { 
		e.preventDefault();
		$(".title-add").text("Tambah Absen");
		$("#form-attendance").attr("action","<?=base_url()?>C_guru/absenMake/add");
		$("#tambah_user").modal("show");
	});
	$(".edit-attendance").click(function (e) { 
		e.preventDefault();
		let id=$(this).attr('data-id');
		$(".title-add").text("Edit Absen");
		$("#id_edit").val(id);
		$("#form-attendance").attr("action","<?=base_url()?>C_guru/absenMake/edit");
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>c_guru/edit_attendance",
			data: {id:id},
			dataType: "JSON",
			success: function (response) {
				$("#class_name").val(response.class_name);
				$(".date_attendance").val(response.date_attendance);
				$("#id_edit").val(response.id_attendance);
		$("#tambah_user").modal("show");
			}
		});
	});
</script>
