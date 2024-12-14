<div class="modal fade" id="tentang_aplikasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tentang Pengembang <?=$this->session->userdata('level')?>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>
			</div>
			<form action="" method="post" id="about_dev">
				<div class="modal-body">
					<style>
						.dev-image {
							width: 200px;
							border-radius: 50px;
							box-shadow: black;
						}

					</style>
					<table class="table">
						<?php if ($this->session->userdata('level') == 'admin'): ?>
							<tbody>
							<tr>
								<td>Nama Lengkap</td>
								<td>
									<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
								</td>
							</tr>
							<tr>
								<td>Panggilan</td>
								<td>
									<input type="text" class="form-control" id="panggilan" name="panggilan">
								</td>
							</tr>
							<tr>
								<td>TTL</td>
								<td>
									<input type="text" class="form-control" id="ttl" name="ttl">
								</td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>
									<select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>No.Hp</td>
								<td><input type="text" class="form-control" id="no_hp" name="no_hp"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="text" class="form-control" id="email" name="email"></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>
									<textarea name="alamat" class="form-control" id="alamat" cols="30"
										rows="3"></textarea>
								</td>
							</tr>
						</tbody>

						<?php else: ?>
							<tbody>
							<tr>
								<td>Nama Lengkap</td>
								<td class="nama_lengkap"></td>
								<td rowspan="6"><img class="dev-image" src="<?=base_url();?>gambar/gambar_user/icon-admin.png" alt="">
								</td>
							</tr>
							<tr>
								<td>Panggilan</td>
								<td class="panggilan"></td>
							</tr>
							<tr>
								<td>TTL</td>
								<td class="ttl"></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td class="jenis_kelamin"></td>
							</tr>
							<tr>
								<td>No.Hp</td>
								<td class="no_hp"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td class="email"></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td class="alamat">
								</td>
							</tr>
						</tbody>
						<?php endif;?>
					</table>

				</div>
				<div class="modal-footer">
					<?php if ($this->session->userdata('level') == 'admin'): ?>
					<button type="button" class="btn btn-success save-data"><i class="fa fa-plus"></i> Simpan</button>
					<?php endif;?>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="alert-dev" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Maaf Menu Ini sedang perbaikan</h5>
			</div>
			<div class="modal-body">
				<img style="width: 100%;"
					src="<?=base_url()?>gambar/alert/error-maintenance-need-service_225067-126.jpg" alt="" srcset="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	alert_error = () => {
		Swal.fire({
			icon: 'error',
			title: 'Error',
			text: 'Maaf sepertinya ada kendala !',
			timer: 1500,
		});
	}
	let url = "<?=base_url();?>";
	$('.tentang_aplikasi').click(function (e) {
		console.log('his');
		$.ajax({
			type: "GET",
			url: url + "/ApiController/get_profil",
			dataType: "JSON",
			success: function (response) {
				$(".nama_lengkap").text(`: ${response.data.nama_lengkap}`);
				$(".panggilan").text(`: ${response.data.panggilan}`);
				$(".ttl").text(`: ${response.data.ttl}`);
				$(".panggilan").text(`: ${response.data.panggilan}`);
				let jenis_kelamin = response.data.jenis_kelamin == "P" ? "Perempuan" : "Laki-Laki";
				$(".jenis_kelamin").text(`: ${jenis_kelamin}`);
				$(".no_hp").text(`: ${response.data.no_hp}`);
				$(".email").text(`: ${response.data.email}`);
				$(".alamat").text(`: ${response.data.alamat}`);
				$("#nama_lengkap").val(`${response.data.nama_lengkap}`);
				$("#panggilan").val(`${response.data.panggilan}`);
				$("#ttl").val(`${response.data.ttl}`);
				$("#panggilan").val(`${response.data.panggilan}`);
				let select = response.data.jenis_kelamin == "P" ?
					`<option value="L">Laki-Laki</option><option value="P" selected>Perempuan</option>` :
					`<option selected value="L">Laki-Laki</option><option value="P">Perempuan</option>`;
				$("#jenis_kelamin").html(`${select}`);
				$("#no_hp").val(`${response.data.no_hp}`);
				$("#email").val(`${response.data.email}`);
				$("#alamat").val(`${response.data.alamat}`);
				$("#tentang_aplikasi").modal("show");
			},
			error: function () {
				alert_error();
			}
		});
		$("#tentang_aplikasi").modal("show");
	});
	$(".onproses").click(function (e) {
		e.preventDefault();
		$("#alert-dev").modal('show');
	});
	$('.save-data').click(function (e) {
		console.log('tes');
		$("#about_dev").ajaxForm({
			type: "POST",
			url: url + "/c_guru/store_profil",
			dataType: "JSON",
			success: function (response) {
				if (response.status == 'success') {
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Data Berhasil diperbarui',
						timer: 1500,
					});
				}

			},
			error: function (param) {
				alert_error();
			}
		}).submit();
	});

</script>
