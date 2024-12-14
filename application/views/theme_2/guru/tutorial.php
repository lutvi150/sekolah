<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Tutorial Aplikasi</h3>
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
						<h2>Tutorial</small></h2>
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
						<?php if ($this->session->userdata('level')=='guru'):?>
							<a href="#" class="btn btn-success btn-sm add-materi"><i class="fa fa-plus"></i> Tambah Tutorial</a>
							<?php endif;?>
						</p>

						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th style="width: 20px">Nomor</th>
									<th>Judul</th>
									<th style="width: 20px;">Lampiran</th>
									<?php if ($this->session->userdata('level')=='guru'):?>
									<th style="width: 20px">Aksi</th>
									<?php endif; ?>
								</tr>
							</thead>
							<tbody>
							<?php $no=1; foreach ($tutorial as $key => $value):?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$value['title']?></td>
									<td>
									<a href="#" data-id="<?=$value['id_tutorial']?>"  class="label label-success show-attachement" onclick="showAttachement('<?=$value['file']?>')" > PDF</a></td>

									<?php if ($this->session->userdata('level')=='guru'):?>
									<td>
									
									<a href="#" class="btn btn-danger btn-sm delete-tutorial" data-id="<?=$value['id_tutorial']?>"><i class="fa fa-trash"></i></a>
									<!-- <a href="#" class="btn btn-warning btn-sm edit-tutorial" data-id="<?=$value['id_tutorial']?>" ><i class="fa fa-edit"></i></a> -->
									</td>
									<?php endif;?>
								</tr>
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
<!-- upload document -->
<div class="modal fade" id="add-materi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload Tutorial</h5>

			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>c_guru/store_tutorial" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label for="">Judul</label>
						<input type="text" name="judul" id="judul" required class="form-control" placeholder=""
							aria-describedby="helpId">
						<small id="helpId" class="text-muted"></small>
					</div>
					<div class="form-group">
						<label for="">File</label>
						<input type="file" name="document" id="" required class="form-control" placeholder=""
							aria-describedby="helpId">
						<small id="helpId" class="text-muted read">File yang di izinkan hanya PDF</small>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal priview fiel -->
<div class="modal fade" id="model-priview" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title title-materi"></h5>
					
			</div>
			<div class="modal-body">
			<object id="show-file" style="width: 100%;height:500px"  type="application/pdf">
			<p>Your web rowser doesn't have a PDF plugin.
  Instead you can <a class="link-pdf" >click here to
 <label for="" class="label label-success">download</label> the PDF file.</a></p></object>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal delete tutorial -->
<div class="modal fade" id="modal-delete-tutorial" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
		<form action="<?=base_url()?>c_guru/delete_tutorial" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Hapus Tutorial</h5>
			</div>
			<div class="modal-body">Yakin akan hapus tutorial ini ?
			<input type="text" hidden name="id_tutorial" id="id_tutorial">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<button type="submit" class="btn btn-primary">Ya</button>
			</div>
		</form>
		</div>
	</div>
</div>
<script>
	$(".add-materi").click(function (e) {
		e.preventDefault();
		$("#add-materi").modal("show");
	});
	// $(".show-attachement").click(function (e) { 
	// 	e.preventDefault();
	// 	let file=$(this).data('file');
	// 	$("#show-file").attr('src','<?=base_url()?>upload/pdf/'+file);
	// 	$("#model-priview").modal('show');
	// });
	function showAttachement(file) { 
		$("#show-file").attr('data','<?=base_url()?>upload/pdf/'+file);
		$(".link-pdf").attr('href','<?=base_url()?>upload/pdf/'+file)
		$("#model-priview").modal('show');
	 }
	$(".delete-tutorial").click(function (e) { 
		e.preventDefault();
		let id=$(this).data('id');
		$("#id_tutorial").val(id);
		$("#modal-delete-tutorial").modal("show");
	});
</script>
