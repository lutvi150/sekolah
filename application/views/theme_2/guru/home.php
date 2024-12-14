  <!-- page content -->
  <div class="right_col" role="main" >
    <div class="">
      <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
            <div class="count"><?php echo $total_materi;?></div>
            <h3>Total Materi Tersedia</h3>
            <p></p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-comments-o"></i></div>
            <div class="count"><?= $total_soal?></div>
            <h3>Jumlah Bank Soal</h3>
            <p></p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-users"></i></div>
            <div class="count"><?= $jumlah_siswa?></div>
            <h3>Jumlah Siswa</h3>
            <p></p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-trophy"></i></div>
            <div class="count"><?= $score_tertinggi[0]['nilai'] ?></div>
            <h3>Score Tertinggi</h3>
            <p></p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Hari
                  <?php
                  $hari = date('l');
                  /*$new = date('l, F d, Y', strtotime($Today));*/
                  if ($hari=="Sunday") {
                    echo "Minggu";
                  }elseif ($hari=="Monday") {
                    echo "Senin";
                  }elseif ($hari=="Tuesday") {
                    echo "Selasa";
                  }elseif ($hari=="Wednesday") {
                    echo "Rabu";
                  }elseif ($hari=="Thursday") {
                    echo("Kamis");
                  }elseif ($hari=="Friday") {
                    echo "Jum'at";
                  }elseif ($hari=="Saturday") {
                    echo "Sabtu";
                  }
                  ?>,
                  Tanggal
                  <?php
                  $tgl =date('d');
                  echo $tgl;
                  $bulan =date('F');
                  if ($bulan=="January") {
                    echo " Januari ";
                  }elseif ($bulan=="February") {
                    echo " Februari ";
                  }elseif ($bulan=="March") {
                    echo " Maret ";
                  }elseif ($bulan=="April") {
                    echo " April ";
                  }elseif ($bulan=="May") {
                    echo " Mei ";
                  }elseif ($bulan=="June") {
                    echo " Juni ";
                  }elseif ($bulan=="July") {
                    echo " Juli ";
                  }elseif ($bulan=="August") {
                    echo " Agustus ";
                  }elseif ($bulan=="September") {
                    echo " September ";
                  }elseif ($bulan=="October") {
                    echo " Oktober ";
                  }elseif ($bulan=="November") {
                    echo " November ";
                  }elseif ($bulan=="December") {
                    echo " Desember ";
                  }
                  $tahun=date('Y');
                  echo$tahun;
                  ?>  Jam:<h2 id='clock'></h2></h2>

             
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              
            <h2 style="color: blue" class="text-center bluee">Selamat Datang Guru Di <?=$this->config->item('nama_aplikasi')?> <?=$this->config->item('school')?>
              </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Materi Terbaru<small></small></h2>
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
              <?php for ($i=0; $i <=4 ; $i++):?>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month"><?php echo $materi[$i]['bulan'];?></p>
                  <p class="day"><?php echo $materi[$i]['tgl']?></p>
                </a>
                <div class="media-body">
                  <a class="title" href="#"><?php echo $materi[$i]['tema'];?></a>
                  <p><?php echo $materi[$i]['isi'];?>..... <a href="<?php echo base_url();?>index.php/c_guru/baca_materi/<?php echo $materi[$i]['id_materi'] ;?>">Lanjut Baca</a></p>
                </div>
              </article>
                <?php endfor; ?>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Top Score Evaluasi</h2>
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
              <ul class="list-unstyled top_profiles scroll-view">
                <li class="media event">
                  <a class="pull-left border-aero profile_thumb">
                    <i class="fa fa-user aero"></i>
                  </a>
                  <div class="media-body">
                    <a class="title" href="#">Nama :<?= $top_score[0]['nama'];?></a>
                    <p>Nilai: <strong><?= $top_score[0]['nilai'];?></strong> Jumlah Benar <Strong><?= $top_score[0]['jml_benar'];?></Strong></p>
                    <p>Nama Evaluasi:<strong><?=$top_score[0]['nama_ujian']?></strong></p>
                    <p>Jumlah Soal : <strong><?=$top_score[0]['jumlah_soal']?></strong></p>
                    <p>Waktu Pengerjaan : <strong><?=$top_score[0]['waktu']?> Menit</strong></p>
                    <p>
                      <small>Tanggal Mulai:<?= $top_score[0]['tgl_mulai'];?></small>
                      <small>Tanggal Selesai:<?= $top_score[0]['tgl_selesai'];?></small>
                    </p>
                  </div>
                </li>
                <li class="media event">
                  <a class="pull-left border-green profile_thumb">
                    <i class="fa fa-user green"></i>
                  </a>
                  <div class="media-body">
                      <a class="title" href="#">Nama :<?= $top_score[1]['nama'];?></a>
                      <p>Nilai: <strong><?= $top_score[1]['nilai'];?></strong> Jumlah Benar <Strong><?= $top_score[1]['jml_benar'];?></Strong></p>
                      <p>Nama Evaluasi:<strong><?=$top_score[1]['nama_ujian']?></strong></p>
                    <p>Jumlah Soal : <strong><?=$top_score[1]['jumlah_soal']?></strong></p>
                    <p>Waktu Pengerjaan : <strong><?=$top_score[1]['waktu']?> Menit</strong></p>
                      <p>
                        <small>Tanggal Mulai:<?= $top_score[1]['tgl_mulai'];?></small>
                        <small>Tanggal Selesai:<?= $top_score[1]['tgl_selesai'];?></small>
                      </p>
                  </div>
                </li>
                <li class="media event">
                  <a class="pull-left border-blue profile_thumb">
                    <i class="fa fa-user blue"></i>
                  </a>
                  <div class="media-body">
                      <a class="title" href="#">Nama :<?= $top_score[2]['nama'];?></a>
                      <p>Nilai: <strong><?= $top_score[2]['nilai'];?></strong> Jumlah Benar <Strong><?= $top_score[2]['jml_benar'];?></Strong></p>
                      <p>Nama Evaluasi:<strong><?=$top_score[2]['nama_ujian']?></strong></p>
                    <p>Jumlah Soal : <strong><?=$top_score[2]['jumlah_soal']?></strong></p>
                    <p>Waktu Pengerjaan : <strong><?=$top_score[2]['waktu']?> Menit</strong></p>
                      <p>
                        <small>Tanggal Mulai:<?= $top_score[2]['tgl_mulai'];?></small>
                        <small>Tanggal Selesai:<?= $top_score[2]['tgl_selesai'];?></small>
                      </p>
                  </div>
                </li>
                <li class="media event">
                  <a class="pull-left border-aero profile_thumb">
                    <i class="fa fa-user aero"></i>
                  </a>
                  <div class="media-body">
                      <a class="title" href="#">Nama :<?= $top_score[3]['nama'];?></a>
                      <p>Nilai: <strong><?= $top_score[3]['nilai'];?></strong> Jumlah Benar <Strong><?= $top_score[3]['jml_benar'];?></Strong></p>
                      <p>Nama Evaluasi:<strong><?=$top_score[3]['nama_ujian']?></strong></p>
                    <p>Jumlah Soal : <strong><?=$top_score[3]['jumlah_soal']?></strong></p>
                    <p>Waktu Pengerjaan : <strong><?=$top_score[3]['waktu']?> Menit</strong></p>
                      <p>
                        <small>Tanggal Mulai:<?= $top_score[3]['tgl_mulai'];?></small>
                        <small>Tanggal Selesai:<?= $top_score[3]['tgl_selesai'];?></small>
                      </p>
                  </div>
                </li>
                <li class="media event">
                  <a class="pull-left border-green profile_thumb">
                    <i class="fa fa-user green"></i>
                  </a>
                  <div class="media-body">
                      <a class="title" href="#">Nama :<?= $top_score[4]['nama'];?></a>
                      <p>Nilai: <strong><?= $top_score[4]['nilai'];?></strong> Jumlah Benar <Strong><?= $top_score[4]['jml_benar'];?></Strong></p>
                      <p>Nama Evaluasi:<strong><?=$top_score[4]['nama_ujian']?></strong></p>
                    <p>Jumlah Soal : <strong><?=$top_score[4]['jumlah_soal']?></strong></p>
                    <p>Waktu Pengerjaan : <strong><?=$top_score[4]['waktu']?> Menit</strong></p>
                      <p>
                        <small>Tanggal Mulai:<?= $top_score[4]['tgl_mulai'];?></small>
                        <small>Tanggal Selesai:<?= $top_score[4]['tgl_selesai'];?></small>
                      </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Vidio Terbaru</h2>
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
              <div class="col-md-12">
                <div class="thumbnail">
                  <div class="image view view-first">
                      <video controls>
                          <source src="/vidio/" type="video/mp4">
                        </video>
                  </div>
                  <div class="caption">
                    <p>Newton</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
	<!-- petunjuk belajar -->
	<!-- Button trigger modal -->
	
	<!-- Modal -->
	<div class="modal fade" id="petunjukBelajar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Petunjuk</h5>
				</div>
				<div class="modal-body">
				<div class="alert alert-danger" role="alert">
					<strong>Pemberitahuan</strong>
					<p>Mohon di baca petunjuk belajar</p>
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Selalu Tampilkan</button>
					<button class="btn btn-info hide-tutorial" data-dismiss="modal">Sembunyikan Petunjuk Belajar</button>
				</div>
			</div>
		</div>
	</div>
	<script>
	$(document).ready(function () {
		let tutorial=localStorage.getItem('tutorial');
		if (tutorial=='false') {
		$('#petunjukBelajar').modal('show');
		}
	});
	$(".hide-tutorial").click(function (e) { 
		e.preventDefault();
		localStorage.setItem('tutorial',true);
	});
	</script>
