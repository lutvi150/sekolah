<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Daftar Pertanyaan</h3>
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
						<h2>Daftar Pertanyaan</small></h2>
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

							<h4>History Pertanyaan</h4>

							<!-- end of user messages -->
								<ul class="messages">
									<?php foreach ($question as $key => $value):?>
									<li>
										<img src="<?=base_url()?><?=$value['foto']?>" class="avatar" alt="Avatar">
										<div class="message_date">
											<h3 class="date text-info">
												<?=$value['create_at']['tanggal']?>/<?=$value['create_at']['tahun']?>
											</h3>
											<p class="month"><?=$value['create_at']['bulan']?></p>
											<!-- <h3 class="date text-info"></h3> -->
										</div>
										<div class="message_wrapper">
											<h4 class="heading"><?=$value['nama']?></h4> <?=$value['create_at']['jam']?>
											<blockquote class="message"><?=$value['question']?></blockquote>
											<br />
											<p class="url">
												<a href="#" class="label label-success add-answer"
													data-id="<?=$value['id_question']?>"><i class="fa fa-comment-o"></i>
													Jawab Pertanyaan</a>
												<!-- <a href="#" class="label label-success"><i class="fa fa-comments-0"></i> -->
												<!-- Lihat Jawaban</a> -->
											</p>

										</div>
										<ul class="message_wrapper">
											<?php foreach ($value['answer'] as $key => $value2):?>
											<li>
												<img src="<?=base_url()?><?=$value2['foto']?>" class="avatar"
													alt="Avatar">
												<div class="message_date">
													<h3 class="date text-info">
														<?=$value2['create_at']['tanggal']?>/<?=$value2['create_at']['tahun']?>
													</h3>
													<p class="month"><?=$value2['create_at']['bulan']?></p>
													<!-- <h3 class="date text-info"></h3> -->
												</div>
												<div class="message_wrapper">
													<h4 class="heading"><?=$value2['nama']?></h4>
													<?=$value2['create_at']['jam']?>
													<blockquote class="message"><?=$value2['question']?></blockquote>
													<br />
													<p class="url">
														<!-- <a href="#" class="label label-success"><i
																class="fa fa-comment-o"></i>
															Komentar</a>
														<a href="#" class="label label-success"><i
																class="fa fa-comments-0"></i>
															Lihat Jawaban</a> -->
													</p>

												</div>
											</li>
											<?php endforeach; ?>
										</ul>
									</li>
									<?php endforeach; ?>
								</ul>
								<!-- end of user messages -->


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /page content -->
<!-- Modal add  question -->
<div class="modal fade" id="modalAnswer" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="<?=base_url()?>c_guru/saveAnswer" method="post">
				<div class="modal-header">
					<h5 class="modal-title">Answer</h5>
				</div>
				<div class="modal-body">
					<input type="text" id="id_question" name="id_question" hidden>
					<textarea name="answer" class="form-control	" id="answer" cols="30" rows="10"></textarea>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-send"></i>Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- scrip -->

<script src="<?php echo base_url();?>asset/ckeditor/ckeditor.js"></script>
<script>
	$(".add-answer").click(function (e) {
		e.preventDefault();
		let id = $(this).attr('data-id');
		$("#id_question").val(id);
		$("#modalAnswer").modal('show');
	});
	CKEDITOR.replace('answer')

</script>
