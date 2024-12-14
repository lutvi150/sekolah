 <!-- page content -->
 <div class="right_col" role="main">
 	<div class="">
 		<div class="page-title">
 			<div class="title_left">
 				<h3>Kompetensi Inti & Kompetensi Dasar</h3>
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
 						<h2>Tujuan Pembelajaran</h2>
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
 						<?= $key['key']?>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-12 col-sm-12 col-xs-12">
 				<div class="x_panel">
 					<div class="x_title">
 						<h2>Kompetensi Inti(KI)</h2>
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
 						<table class="table table-hover">
 							<tbody>
                                 <?php foreach ($ki as $value):?>
 								<tr>
 									<th scope="row">
 										<h2><?= $value['isi'] ?></h2>
 									</th>
 									<td>
 										<blockquote>
 											<p><?= $value['isi2']?></p>
 										</blockquote>
 									</td>
                                 </tr>
<?php endforeach;?>
 							</tbody>
 						</table>

 					</div>
 				</div>
 			</div>
 			<div class="col-md-12 col-sm-12 col-xs-12">
 				<div class="x_panel">
 					<div class="x_title">
 						<h2>Kompetensi Dasar(KD)</h2>
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
 						<table class="table table-hover">
                             <thead>
                                 <th class="text-center"><h2>KD</h2></th>
                                 <th class="text-center"><h2>Indikator</h2></th>
                             </thead>
 							<tbody>
 								<tr>
 									<td style="width: 50px" scope="row">
									 <?php foreach ($kd as $value):?>
 										<h2><a href="#" data-toggle="modal"                                                                                                                                                                                                                                                                                                                                                                                                       ><?= $value['isi2'] ?></a></h2>
<?php endforeach; ?>
									 </td>
 									<td style="width: 50px">
										 <a href=""><?php foreach ($indikator as $value):?></a>
 										<blockquote>
 											<p><a href=""><?= $value['isi2']?></a></p>
										 </blockquote>
<?php endforeach;?>
 									</td>
 								</tr>
 							</tbody>
 						</table>

 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- /page content -->

 <!-- Modal  tambah Kompetensi Inti -->
 <div class="modal fade" id="add_ki" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<form action="<?php echo base_url();?>index.php/c_guru/simpan_ki" method="post">
 				<div class="modal-header">
 					<h5 class="modal-title">Tambah Kompetensi Inti</h5>
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 						<span aria-hidden="true">&times;</span>
 					</button>
 				</div>
 				<div class="modal-body">
 					<div class="form-group">
 						<label for="">Nomor Kompetensi Inti</label>
 						<input type="text" name="isi3" id="" class="form-control" placeholder=""
 							aria-describedby="helpId">
 						<small id="helpId" class="text-muted red">Format Penulisan Nomor ada "KI.1"</small>
 					</div>
 					<div class="form-group">
 						<label for="">Kompetensi Inti</label>
 						<textarea class="form-control" name="isi2" id="" cols="30" rows="10"></textarea>
 						<small id="helpId" class="text-muted red">Isi Kompetensi Inti di kolam di atas</small>
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
 <!-- Modal kompetensi dasar -->
 <div class="modal fade" id="add_kd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<form action="<?php echo base_url();?>index.php/c_guru/simpan_kd" method="post">
 				<div class="modal-header">
 					<h5 class="modal-title">Tambah Kompetensi Dasar</h5>
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 						<span aria-hidden="true">&times;</span>
 					</button>
 				</div>
 				<div class="modal-body">
 					<div class="form-group">
 						<label for="">Kompetensi Dasar</label>
 						<textarea class="form-control" name="isi2" id="" cols="30" rows="10"></textarea>
 						<small id="helpId" class="text-muted red">Isi Kompetensi Dasar di kolam di atas</small>
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
 <!-- Modal tambah indikator-->
 <div class="modal fade" id="add_indikator" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
 	aria-hidden="true">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<form action="<?php echo base_url();?>index.php/c_guru/simpan_indikator" method="post">
 				<div class="modal-header">
 					<h5 class="modal-title">Tambah Kompetensi Dasar</h5>
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 						<span aria-hidden="true">&times;</span>
 					</button>
 				</div>
 				<div class="modal-body">
 					<div class="form-group">
 						<label for="">Kompetensi Dasar</label>
 						<textarea class="form-control" name="isi2" id="" cols="30" rows="10"></textarea>
 						<small id="helpId" class="text-muted red">Isi indikator di kolam di atas</small>
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
