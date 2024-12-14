<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Tambah Soal</h3>
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
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Buat Soal</small></h2>
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
						<form class="form-horizontal" method="POST"
							action="<?php echo base_url();?>index.php/c_guru/simpan_soal_edit/<?=$soal['id']?>">
							<!-- <div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Guru</label>
								<div class="col-md-5 col-sm-9 col-xs-12">
									<input type="text" class="form-control" placeholder="Tambahkan Guru">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Materi</label>
								<div class="col-md-5 col-sm-9 col-xs-12">
									<input type="text" class="form-control" placeholder="Masukkan Nama Materi">
								</div>
							</div> -->
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Teks Soal </label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="file" class="form-control col-md-2 col-sm-2 col-xs-12">
								</div>
								<div class="col-md-7 col-sm-7 col-xs-12">
									<textarea name="soal" class="form-control col-md-2 col-sm-2 col-xs-12" id="soal"
										cols="30" rows="10"><?= $soal['soal']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Jawaban a </label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="file" class="form-control col-md-2 col-sm-2 col-xs-12">
								</div>
								<div class="col-md-7 col-sm-7 col-xs-12">
									<textarea name="jawaban_a" class="form-control col-md-2 col-sm-2 col-xs-12"
										id="jawaban_a" cols="30" rows="10"><?= $soal['opsi_a']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Jawaban b </label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="file" class="form-control col-md-2 col-sm-2 col-xs-12">
								</div>
								<div class="col-md-7 col-sm-7 col-xs-12">
									<textarea name="jawaban_b" class="form-control col-md-2 col-sm-2 col-xs-12"
										id="jawaban_b" cols="30" rows="10"><?= $soal['opsi_b']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Jawaban c </label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="file" class="form-control col-md-2 col-sm-2 col-xs-12">
								</div>
								<div class="col-md-7 col-sm-7 col-xs-12">
									<textarea name="jawaban_c" class="form-control col-md-2 col-sm-2 col-xs-12"
										id="jawaban_c" cols="30" rows="10"><?= $soal['opsi_c']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Jawaban d </label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="file" class="form-control col-md-2 col-sm-2 col-xs-12">
								</div>
								<div class="col-md-7 col-sm-7 col-xs-12">
									<textarea name="jawaban_d" class="form-control col-md-2 col-sm-2 col-xs-12"
										id="jawaban_d" cols="30" rows="10"><?= $soal['opsi_d']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Kunci Jawaban</label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<select name="kunci" id="" class="form-control">
										<option <?php if ($soal['jawaban']=='A') { echo'selected';} ?>value="A">A</option>
										<option <?php if ($soal['jawaban']=='B') { echo'selected';} ?> value="B">B</option>
										<option <?php if ($soal['jawaban']=='C') { echo'selected';} ?> value="C">C</option>
										<option <?php if ($soal['jawaban']=='D') { echo'selected';} ?> value="D">D</option>
									</select>
								</div>
								<label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Bobot Nilai Soal
								</label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="text" name="bobot" class="form-control col-md-6 col-sm-6 col-xs-12" value="<?= $soal['bobot']?>"
										id="">
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
									<button type="reset" class="btn btn-primary">Reset</button>
									<button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
										Simpan</button>
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
