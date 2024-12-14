
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Gallery Video </h3>
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
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List Video Tersedia</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                    <button class="btn btn-info" data-toggle="modal" data-target="#upload_vidio"><i class="fa fa-upload"></i> Upload Video Baru </button>
                    <div class="alert alert-warning" role="alert">
                      <h4 class="alert-heading"><i class="fa fa-info"></i> Info</h4>
                      <p></p>
                      <p class="mb-0">Untuk Memutar video, silahkan klik 2x pada video yang di inginkan</p>
                    </div>
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
                    <div class="row">
<!-- this for information about vidio -->
                      <p></p>
<?php foreach ($vidio as $field):?>
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                              <!-- <video controls>
                                  <source src="<?php echo $field['link']?>" type="video/mp4">
																	
                                </video> -->
																<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/uBaU-n77B2Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
																<?=$field['link']?>
                          </div>
                          <div class="caption">
                            <p><?php echo $field['judul']?></p>
														<button type="button" data-id="<?=$field['kd_vidio']?>" class="btn btn-danger btn-sm delete-vidio"><i class="fa fa-trash"></i></button>
                          </div>
                        </div>
												
                      </div>
<?php endforeach;?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<!-- modal upload vidio -->
<div class="modal fade" id="upload_vidio" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<form action="<?=base_url()?>c_guru/save_vidio" method="post">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Vidio  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></h5>
        
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Nama Vidio</label>
          <input type="text" name="judul" id="" required class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Masukkan Nama Vidio yang Akan di Upload</small>
        </div>
        <div class="form-group">
          <label for="">File</label>
          <!-- <input type="file" name="" id="" class="form-control" placeholder="" aria-describedby="helpId"> -->
					<textarea type="text" class="form-control" required name="link" cols="20" rows="5"></textarea>
          <small id="helpId" class="text-muted">Link dari vidio</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
		</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelDeleteVidio" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form action="<?=base_url() ?>c_guru/vidio_delete" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Delete Vidio</h5>
			</div>
			<div class="modal-body">
				Yakin akan hapus vidio ini ?
				<input type="text" class="kode_vidio" name="kode_vidio" >
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<button type="submit" class="btn btn-primary">Ya</button>
			</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(".delete-vidio").click(function (e) { 
		e.preventDefault();
		let id=$(this).attr('data-id');
		$(".kode_vidio").val(id);
		$(".kode_vidio").attr("hidden",true);
		$("#modelDeleteVidio").modal("show");
	});
</script>
