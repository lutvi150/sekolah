<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Ubah Password</h3>
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
			<form id="demo-form2" method="POST" action="<?php echo base_url();?>index.php/c_siswa/proses_ubah_password"
				data-parsley-validate class="form-horizontal form-label-left">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Form Ubah Password</h2>
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
							<br />
							<?php if ($this->session->flashdata('error')):?>
							<div id="pemberitahuan_success" class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-ban"></i> Maaf !</h4>
								<?php echo $this->session->flashdata('error');?>
							</div>
							<?php elseif ($this->session->flashdata('success')):?>
							<div id="pemberitahuan_error" class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses !</h4>
								<?php echo $this->session->flashdata('success');?>
							</div>
							<?php endif;?>


							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Password Lama
								</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="password"  id="password_lama" name="password_lama"
										 required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Password Baru
								</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="password" id="password_baru" name="password_baru" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Password Baru</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input id="ulang_password_baru" class="form-control col-md-7 col-xs-12" type="password"
										name="ulang_password_baru">
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
									<button class="btn btn-primary" type="button"><i
											class="fa fa-times"></i>Cancel</button>
									<button type="submit" class="btn btn-success"><i
											class="fa fa-save"></i>Ubah Password</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

</div>
</div>
<!-- /page content -->
