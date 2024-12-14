        <!-- page content -->
        <div class="right_col" role="main">
        	<div class="">
        		<div class="page-title">
        			<div class="title_left">
        				<h3>Seting Tampilan</h3>
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
        			<!-- form color picker -->
        			<div class="col-md-6 col-sm-12 col-xs-12">
        				<div class="x_panel">
        					<div class="x_title">
        						<h2>Seting Tampilan dan Warna</h2>
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
								<?php if ($this->session->userdata('success')):?>
								<div id="message_success" class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-check"></i> Sukes !</h4>
									<?php echo $this->session->userdata('success');?>
								</div>
	<?php endif; ?>
        						<form action="<?php echo base_url();?>index.php/c_guru/simpan_seting" method="POST"
        							class="form-horizontal form-label-left">

        							<div class="form-group">
        								<label class="control-label col-md-5 col-sm-5 col-xs-12">Warna Text dan
        									Kalimat</label>
        								<div class="col-md-7 col-sm-7 col-xs-12">
        									<input type="text" name="warna_text" class="demo1 form-control"
        										value="<?php echo $warna_text;?>" />
        								</div>
        							</div>
        							<div class="form-group">
        								<label class="control-label col-md-5 col-sm-5 col-xs-12">Warna
        									Background</label>
        								<div class="col-md-7 col-sm-7 col-xs-12">
        									<input type="text" name="warna_background" class="demo1 form-control"
        										value="<?= $warna_background;?>" />
        								</div>
        							</div>
        							<div class="form-group">
        								<label class="control-label col-md-5 col-sm-5 col-xs-12">Warna Menu sebelah
        									Kiri</label>
        								<div class="col-md-7 col-sm-7 col-xs-12">
        									<input type="text" name="warna_menu" class="demo1 form-control"
        										value="<?= $warna_menu;?>" />
        								</div>
        							</div>
        							<div class="form-group">
        								<label class="control-label col-md-5 col-sm-5 col-xs-12">Warna Text menu
        									Kiri</label>
        								<div class="col-md-7 col-sm-7 col-xs-12">
        									<input type="text" name="text_menu" class="demo1 form-control"
        										value="<?= $text_menu;?>" />
        								</div>
        							</div>
        							<div class="ln_solid"></div>
        							<div class="form-group">
        								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
											<a class="btn btn-primary" href="<?php echo base_url();?>index.php/c_guru/seting_default">Seting Default</a>
        									<button type="submit" class="btn btn-success">Simpan</button>
        								</div>
        							</div>

        						</form>
        					</div>
        				</div>
        			</div>
        			<!-- /form color picker -->

        		</div>
        	</div>
        </div>
        <!-- /page content -->
