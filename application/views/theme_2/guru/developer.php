<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Developer Mode</h3>
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
						<h2>Setting Aplikasi</small></h2>
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

						</p>

						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nomor</th>
									<th>Nama Setingan</th>
									<th>Type</th>
									<th>Setting</th>
									<th>Aksi</th>
								</tr>

							</thead>
							<tbody>
								<?php foreach ($setting as $key => $value):?>
								<tr>
									<td><?=$key+1?></td>
									<td><?=$value->jenis_profil?></td>
									<td>
										<?php if($value->setting_type=="text"): ?>
										<span for="" class="label label-success">Text</span>
										<?php else:?>
										<span for="" class="label label-danger">File</span>
										<?php endif;?>
									</td>
									<td>
									<?php if($value->setting_type=="text"): ?>
										<?=$value->setting_profil;?>
										<?php else:?>
											<button class="btn btn-success btn-xs">Priview</button>
										<?php endif;?>
									</td>
									<td>
										<button class="btn btn-warning btn-xs edit-profil" data-jenis="<?=$value->jenis_profil?>" data-id="<?=$value->id_profil?>" data-profil="<?=$value->setting_profil?>" data-type="<?=$value->setting_type?>" ><i class="fa fa-edit"></i></button>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit-profil" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form-profil" method="post"></form>
			<div class="modal-header">
				<h5 class="modal-title">Edit Profil</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label for="" class="jenis"></label>
				  <input type="text" name="" id="profil" class="form-control" placeholder="" aria-describedby="helpId">
				  <!-- <small id="helpId" class="text-eror alet-text">Help text</small> -->
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary store-profil">Simpan</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(".edit-profil").click(function (e) {
		let id= $(this).data('id');
		let type=$(this).data('type');
		let profil=$(this).data('profil');
		let jenis=$(this).data('jenis');
		$(".jenis").text(jenis);
		let input_type=type=="text"?"text":"file";
		sessionStorage.setItem('type',type);
		sessionStorage.setItem('id',id);
		sessionStorage.setItem('profil',profil);
		$("#profil").removeAttr('type').attr('type',input_type);
		$("#edit-profil").modal('show');
	});
	$(".store-profil").click(function (e) { 
		$("#form-profil").ajax({
			type: "method",
			url: "url",
			data: "data",
			dataType: "dataType",
			success: function (response) {
				
			},error:function(){
				
			}
		}).submit();
		
	});
</script>
<!-- /page content -->
