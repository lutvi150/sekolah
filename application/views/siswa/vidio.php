
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Gallery Vidio </h3>
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
                    <h2>List Vidio Tersedia</h2>
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
                    <div class="alert alert-warning" role="alert">
                      <h4 class="alert-heading"><i class="fa fa-info"></i> Info</h4>
                      <p></p>
                      <p class="mb-0">Untuk Memutar vidio, silahkan klik 2x pada vidio yang di inginkan</p>
                    </div>
                    <div class="row">
<!-- this for information about vidio -->
                      <p></p>
<?php foreach ($vidio as $field):?>
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                              <video controls>
                                  <source src="<?php echo base_url();?>vidio/<?php echo $field['link']?>" type="video/mp4">
                                </video>
                          </div>
                          <div class="caption">
                            <p><?php echo $field['judul']?></p>
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