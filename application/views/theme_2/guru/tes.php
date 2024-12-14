<!doctype html>
<html lang="en">
  <head>
    <title>Tree Diagram | Bootstrap 4</title>
    <meta charset="utf-8">
	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>asset/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url();?>asset/stiff-chart/stiff-chart.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/stiff-chart/costume.css">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="chart">
                  <div class="stiff-chart-inner text-white">
                    <div class="stiff-chart-level" data-level="01">
                      <div class="stiff-main-parent">
                        <ul>
                          <li data-parent="a">
                            <div class="the-chart p-2 bg-info">
                                <p>Parent A</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="stiff-chart-level level-second" data-level="02">
                      <div class="stiff-child" data-child-from="a">
                        <ul>
                          <li data-parent="a1">
                            <div class="the-chart p-2 child-of-a">
                                <p>Child A1</p>
                            </div>
                          </li>
                          <li data-parent="a2">
                            <div class="the-chart p-2 child-of-a">
                                <p>Child A2</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="stiff-chart-level level-third" data-level="03">
                      <div class="stiff-child" data-child-from="a1">
                        <ul>
                          <li data-parent="a1-1">
                            <div class="the-chart p-2 child-of-a1">
                                <p>Child A1-1</p>
                            </div>
                          </li>
                          <li data-parent="a1-2">
                            <div class="the-chart p-2 child-of-a1">
                                <p>Child A1-2</p>
                            </div>
                          </li>
                          <li data-parent="a1-3">
                            <div class="the-chart p-2 child-of-a1">
                                <p>Child A1-3</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="stiff-chart-level level-third" data-level="04">
                      <div class="stiff-child" data-child-from="a2">
                        <ul>
                          <li data-parent="a2-1">
                            <div class="the-chart p-2 child-of-a2">
                                <p>Child A2-1</p>
                            </div>
                          </li>
                          <li data-parent="a2-2">
                            <div class="the-chart p-2 child-of-a2">
                                <p>Child A2-2</p>
                            </div>
                          </li>
                          <li data-parent="a2-3">
                            <div class="the-chart p-2 child-of-a2">
                                <p>Child A2-3</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="stiff-chart-level level-fourth" data-level="04">
                      <div class="stiff-child" data-child-from="a1-1">
                        <ul>
                          <li data-parent="a05">
                            <div class="the-chart p-2 child-of-a1-1">
                                <p>Child A1-1-1</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2 child-of-a1-1">
                                <p>Child A1-1-2</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2 child-of-a1-1">
                                <p>Child A1-1-3</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2 child-of-a1-1">
                                <p>Child A1-1-4</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2 child-of-a1-1">
                                <p>Child A1-1-5</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="stiff-chart-level level-fourth" data-level="04">
                      <div class="stiff-child" data-child-from="a1-2">
                        <ul>
                          <li data-parent="a05">
                            <div class="the-chart p-2">
                                <p>Child A1-2-1</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A1-2-2</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A1-2-3</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A1-2-4</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A1-2-5</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="stiff-chart-level level-fourth" data-level="04">
                      <div class="stiff-child" data-child-from="a1-3">
                        <ul>
                          <li data-parent="a05">
                            <div class="the-chart p-2">
                                <p>Child A1-3-1</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A1-3-2</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A1-3-3</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A1-3-4</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A1-3-5</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="stiff-chart-level level-fourth" data-level="04">
                      <div class="stiff-child" data-child-from="a2-1">
                        <ul>
                          <li data-parent="a05">
                            <div class="the-chart p-2">
                                <p>Child A2-1-1</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-1-2</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-1-3</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-1-4</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-1-5</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="stiff-chart-level level-fourth" data-level="04">
                      <div class="stiff-child" data-child-from="a2-2">
                        <ul>
                          <li data-parent="a05">
                            <div class="the-chart p-2">
                                <p>Child A2-2-1</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-2-2</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-2-3</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-2-4</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-2-5</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="stiff-chart-level level-fourth" data-level="04">
                      <div class="stiff-child" data-child-from="a2-3">
                        <ul>
                          <li data-parent="a05">
                            <div class="the-chart p-2">
                                <p>Child A2-3-1</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-3-2</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-3-3</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-3-4</p>
                            </div>
                          </li>
                          <li data-parent="a06">
                            <div class="the-chart p-2">
                                <p>Child A2-3-5</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </body>
  
    <!-- jQuery -->
    <script src="<?php echo base_url();?>asset/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url();?>asset/stiff-chart/stiff-chart.js"></script>
  <script>
  $(document).ready(function() {
  $('#chart').stiffChart();
});</script>
</html>