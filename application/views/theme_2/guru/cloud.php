<!-- page content -->
<link rel="stylesheet" href="<?=base_url();?>asset/costume/loading-two.css">
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Perpustakaan Dokumen</h3>
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
						<h2>Perpustakaan Dokumen</small></h2>
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
						</p>
						<div>
							<a href="#" class="btn btn-success btn-sm add-document"><i class="fa fa-plus"></i> Tambah
								Document</a>
							<table class="table table-bordered">
								<thead>
									<th>No.</th>
									<th>Nama Dokumen</th>
									<th>Tanggal Di tambahkan</th>
									<th>Url</th>
									<th>Menu</th>
								</thead>
								<tbody class="fill-body">
									<!-- <tr>
										<td>1</td>
										<td>Foto</td>
										<td>11 Juni 2021</td>
										<td>
											<a for="#" data-link="ini url"
												class="label label-success copy-data">Copy</a>
										</td>
										<td>
											<a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
										</td>
									</tr> -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /page content -->
<!-- modal upload document -->

<!-- Modal -->
<div class="modal fade" id="modelUpload" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload Document
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>
			</div>
			<div class="modal-body">
				<div class="show-loading" hidden>
					<div class="lds-ellipsis">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
				<form action="" id="saveData" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label for="">Nama Document</label>
						<input type="text" name="title" id="title" class="form-control" placeholder=""
							aria-describedby="helpId">
						<small id="helpId" class="text-muted red ename"></small>
					</div>
					<div class="form-group">
						<label for="">Document</label>
						<input type="file" name="document" id="document" class="form-control" placeholder=""
							aria-describedby="helpId">
						<small id="helpId" class="text-muted red edocument">Document yang di izinkan adalah JPG, PNG,
							PDF, GIF`</small>
					</div>
			</div>
			<div class="modal-footer footer-save-document">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="saveData()" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="copyAlert" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Success</h5>
					
			</div>
			<div class="modal-body">
			<p class="message-copy"></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- confirm delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Delete</h5>
			</div>
			<div class="modal-body">
			<input type="text" id="id_delete" hidden>Yakin akan hapus data ini
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="processDelete()">Save</button>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url();?>asset/form-master/dist/jquery.form.min.js"></script>
<script>
	$(".add-document").click(function (e) {
		e.preventDefault();
		$('#modelUpload').modal('show');
	});
	$(document).ready(function () {
		showData();
	});

	function copyToClipboard(element) {

        var $temp = $("<input>");
          $("body").append($temp);
          $temp.val(element).select();
          document.execCommand("copy");
          $temp.remove();
		  $('.message-copy').text(`Link berhasil di copy ke clipboard`);
		$('#copyAlert').modal('show');
	}

	function saveData() {
		$('#saveData').hide();
		$('.show-loading').removeAttr('hidden style');
		$('.ename').text('');
		$('.edocument').text('Document yang di izinkan adalah JPG, PNG, PDF, GIF')
		$("#saveData").ajaxForm({
			type: "POST",
			url: "<?=base_url()?>ApiTeacher/saveCloud",
			dataType: "JSON",
			success: function (response) {

				$('.show-loading').attr('hidden', 'true');
				$('#saveData').removeAttr('hidden style');
				if (response.msg == 'Validation Error') {
					$(".ename").text(response.content.title);
					$('.edocument').text(response.content.document);
				} else if (response.msg == "Upload Failed") {
					$('.edocument').text(response.content);
				} else {
					$('#modelUpload').modal('hide');
					showData();
				}
			}
		}).submit();
	}

	function showData() {
		$.ajax({
			type: "GET",
			url: "<?=base_url()?>ApiTeacher/getCloud",
			dataType: "JSON",
			success: function (response) {
				let fillBody = '';
				let no = 1;
				if (response.content !== null) {
					response.content.forEach(element => {
						fillBody += `<tr>
										<td>` + no++ + `</td>
										<td>` + element.title + `</td>
										<td>` + element.create_at + `</td>
										<td>
										<a for="#" onclick="copyToClipboard('<?=base_url()?>upload/document/`+element.document.file_name+`')" class="label label-success copy-data">Copy</a>
										</td>
										<td>
											<a href="#" class="btn btn-danger btn-sm" onclick="deleteData(`+element.id+`)"><i class="fa fa-trash"></i></a>
											<a href="#" class="btn btn-info btn-sm" onclick="showDdata(`+element.id+`)"><i class="fa fa-search"></i></a>
											
										</td>
									</tr>`;
					});
				} else {
					fillBody = `<tr><td colspan='5' class="text-center">Tidak Ada Data</td></tr>`;
				}

				$('.fill-body').html(fillBody);
			}
		});
	}
// show modal delet
function deleteData (prop) {
	$('#id_delete').val(prop);
	$("#modalDelete").modal('show');
  }
	// delete data
	function processDelete() {

		$.ajax({
			type: "POST",
			url: "<?=base_url()?>ApiTeacher/deleteCloud",
			data: {id:$('#id_delete').val()},
			dataType: "JSON",
			success: function (response) {
				if (response.msg=='Delete Success') {
					$("#modalDelete").modal('hide');
					showData();
				}
			}
		});
	  }

</script>
