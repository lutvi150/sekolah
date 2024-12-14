<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Tambah Materi</h3>
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
		<form action="<?php echo base_url();?>index.php/c_guru/simpan_edit_materi/<?php echo $id_materi;?>" method="post">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Isi<small></small></h2>
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
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Tema yang di bahas</label>
									<input type="text" name="tema" id="" class="form-control " placeholder="" value="<?php echo $tema;?>"
										aria-describedby="helpId">
									<small id="helpId" class="text-muted red">Isi Tema yang di bahas</small>
								</div>
							</div>
							<div class="col-md-6"></div>
							<div class="col-md-12">
								<div class="form-group">
									<label for=""></label>
									<textarea name="isi" id="isi" cols="30" rows="10"><?php echo $isi;?></textarea>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>Rangkuman<small></small></h2>
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
								<textarea name="rangkuman" id="rangkuman" cols="30" rows="10"><?php echo $rangkuman;?></textarea>
								<div class="ln_solid"></div>

								<div class="form-group">
									<button type="submit" class="btn btn-success "><i class="fa fa-save"></i>
										Simpan</button>
										<a href="<?=base_url()?>c_guru/materi" class="btn btn-info"><i class="fa fa-reply"></i> Kembali</a>
									<textarea name="descr" id="descr" style="display:none;"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
		</form>
	</div>
</div>
</div>

<!-- /page content -->
