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
							<a href="<?php echo base_url();?>index.php/c_guru/tambah_materi"
								class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Tambah Materi</a>
							<a href="#" class="btn btn-success btn-sm add-materi"><i class="fa fa-plus"></i> Tambah
								Document Materi</a>
						</p>

						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th style="width: 20px">Nomor</th>
									<th>Tema</th>
									<th style="width: 20px;">Type</th>
									<th style="width: 20px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no=1;
								foreach ($materi as $field):?>
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $field['tema']?>
									<?php if ($field['type']=='file'):?>
										<a class="btn btn-warning btn-xs priview-file" onclick="priviewFile('<?=$field['isi']?>')"
											href="#"><i
												class="fa fa-success "></i> (Klik untuk priview)</a>
										<?php endif;?></td>
									<td><?php if ($field['type']=='read'):?>
										<label for="" class="label label-success">Tulisan</label>
										<?php else: ?>
										<label for="" class="label label-info">Document</label>
										<?php endif; ?></td>
									<td>
										<?php if ($field['type']=='read'):?>
										<a class="btn btn-warning btn-xs"
											href="<?php echo base_url();?>index.php/c_guru/edit_materi/<?php echo $field['id_materi']?>"><i
												class="fa fa-edit"></i> Edit</a>
										<?php endif;?>
										<a class="btn btn-danger btn-xs"
											href="<?php echo base_url();?>index.php/c_guru/hapus_materi/<?php echo $field['id_materi']?>"><i
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

<!-- /page content -->
<!-- upload document -->
<div class="modal fade" id="add-materi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload Materi</h5>

			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>c_guru/upload_materi" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label for="">Tema</label>
						<input type="text" name="tema" id="tema" required class="form-control" placeholder=""
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
			<div class="show-materi" >
			<object id="show-file" style="width: 100%;height:500px"  type="application/pdf">
			<p>Your web rowser doesn't have a PDF plugin.
  Instead you can <a class="link-pdf" >click here to
 <label for="" class="label label-success">download</label> the PDF file.</a></p></object>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(".add-materi").click(function (e) {
		e.preventDefault();
		$("#add-materi").modal("show");
	});
	// $(".priview-file").click(function (e) { 
	// 	e.preventDefault();
	// 	let data=$(this).data('file');
	// 	$(".show-materi").html(`<embed style="width: 100%;height:500px" src="<?=base_url()?>upload/pdf/${data}" type="">`)
	// 	$("#model-priview").modal('show');
	// });
	function priviewFile(file) { 
		$("#show-file").attr('data','<?=base_url()?>upload/pdf/'+file);
		$(".link-pdf").attr('href','<?=base_url()?>upload/pdf/'+file)
		$("#model-priview").modal('show');
	 }

</script>
