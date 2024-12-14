<div class="modal fade" id="bantuan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Bantuan<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>

			</div>
			<div class="modal-body modal-body-bantuan ">


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>
<script>
	let url="<?=base_url();?>";
	$(".bantuan").click(function (e) {
		$.ajax({
			type: "GET",
			url: url+"/ApiController/get_profil",
			dataType: "JSON",
			success: function (response) {
				let body=`<center>Untuk bantuan dan kendala aplikasi anda dapat menghubungi kami di </center><br>
				<a href="https://api.whatsapp.com/send?phone=${response.data.no_hp}" target="_blank"><i
						class="fa fa-phone green"></i> WA:${response.data.no_hp}(klik untuk informasi lebih lanjut)</a>
				<br>
				<i class="fa fa-envelope"></i> Email:${response.data.email}`;
				$(".modal-body-bantuan").html(body);
				$("#bantuan").modal("show");
			},error:function(){
				Swal.fire({
			icon: 'error',
			title: 'Error',
			text: 'Maaf sepertinya ada kendala !',
			timer: 1500,
		});
			}
		});
	});
</script>
