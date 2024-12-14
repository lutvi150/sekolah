   <!-- page content -->
   <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $rangkuman['tema'];?></h3>
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
                    <h2>Rangkuman</small></h2>
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

                    <div class="col-md-12 col-lg-12 col-sm-7">
                      <!-- blockquote -->
                      <blockquote>
                          <?php echo $rangkuman['rangkuman'];?>
                      </blockquote>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12">
                      <h4>Menu</h4>
                      <a href="<?php echo base_url();?>index.php/c_siswa/materi" class="label label-warning" ><i class="fa fa-reply"></i> Kembali ke daftar materi</a>
                      <a href="<?php echo base_url();?>index.php/c_siswa/baca_materi/<?php echo $rangkuman['id_materi']?>" class="label label-success"><i class="fa fa-book"></i> Materi</a>
                      <a href="" class="label label-info"><i class="fa fa-print"></i> Print</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->