<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU | Lihat Semua Pengduan Lainnya</title>
    @include('includes.head')
    <link rel="stylesheet" href="{{asset('dist/css/customcss.css')}}" media="screen" title="no title" charset="utf-8">
  </head>

  <body class="hold-transition skin-black-light layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container heightcustom">
            <div class="navbar-header heightcustom" style="width:400px;">
              <a class="logo" style="margin-top:5px;width:400px;height:80px;">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                  <img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                  <div>
                    <div class="boxlogo-custom">
                      <img src="{{asset('images/logologinkabtangerang.png')}}" width="60px" alt="SPD" />
                    </div>
                    <div class="boxtitle-custom">
                      <div class="boxtitlehead-custom">
                        Simpedu
                      </div>
                      <div class="boxtitlebody-custom">
                        Sistem Informasi Pengaduan Terpadu Kabupaten Tangerang
                      </div>
                    </div>
                  </div>
                </span>
              </a>
            </div>
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->

      <div class="content-wrapper custombackground">
        <div class="container">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
                  <li class="active">Detail Pengaduan Lainnya</li>
                </ol>
              </div>
            </div>

            <div class="row">
              <div class="col-md-9">
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-primary">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Kependudukan</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">54</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">30</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">24</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-primary">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Kesehatan</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">81</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">50</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">31</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-primary">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Ketenagakerjaan</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">12</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">10</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">2</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-green">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Pendidikan</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">90</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">80</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">10</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-green">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Jalan</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">120</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">110</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">10</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-green">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Ketenagakerjaan</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">12</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">10</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">2</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>

                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-orange">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Perdangan</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">20</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">10</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">10</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-orange">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Pengaduan Listrik</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">40</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">30</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">10</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-orange">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Bangunan Rusak</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">3</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">1</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">2</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>

                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-orange">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Pelayanan Warga</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">45</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">34</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">11</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-orange">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Pariwisata</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">76</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">70</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">6</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-orange">
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">Kebudayaan</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">23</span></a></li>
                        <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">12</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">11</span></a></li>
                        <div class="box-footer text-center">
                          <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>

                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <ul class="pagination pagination-sm no-margin pull-center pull-bottom">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- Kanan -->
              <div class="col-md-3">
                <div class="nav-tabs-custom" style='max-height:467px'>
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                    <li><a href="#daftar" data-toggle="tab">Daftar</a></li>
                  </ul>
                    <div class="tab-content">
                      <div class="active tab-pane" id="login">
                        <div class="login-box-body">
                          <p class="login-box-msg"><img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
                          &nbsp;&nbsp;<b>SIMPEDU</b></p>
                          <p class="login-box-msg"><b>Login Pengguna</b></p>
                          <form action="{{ url('login') }}" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group has-feedback">
                              <input name="email" type="text" class="form-control" placeholder="Email">
                              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                              <input name="password" type="password" class="form-control" placeholder="Password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">
                              <div class="social-auth-links text-center">
                                <div class="checkbox icheck">
                                  <label>
                                    <input type="checkbox"> Ingat Saya
                                  </label>
                                </div>
                              </div><!-- /.col -->
                              <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                              </div><!-- /.col -->
                            </div>
                          </form>
                          <a href="#">Lupa Password? Klik disini.</a><br>

                        </div><!-- /.login-box-body -->
                      </div>
                      <div class="tab-pane" id="daftar">
                        <div class="register-box-body">
                          {{-- <p class="login-box-msg"><img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
                          &nbsp;&nbsp;<b>SIMPEDU</b></p> --}}
                          <p class="login-box-msg"><b>Daftar Pengguna Baru</b></p>
                          <form action="{{ url('register') }}" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group has-feedback">
                              <input name="nama" type="text" class="form-control" placeholder="Nama">
                              <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                              <input name="email" type="email" class="form-control" placeholder="Email">
                              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                              <input name="telp" type="text" class="form-control" placeholder="No. Telp">
                              <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                              <input name="password" type="password" class="form-control" placeholder="Password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                              <input name="kpassword" type="password" class="form-control" placeholder="Konfirmasi Password">
                              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            </div>
                            <div class="row">
                              <div class="social-auth-links text-center">
                                <div class="checkbox icheck">
                                  <label>
                                    <input type="checkbox"> Saya Setuju <a href="#">Ketentuan</a>
                                  </label>
                                </div>
                              </div><!-- /.col -->
                              <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                              </div><!-- /.col -->
                            </div>
                          </form>
                        </div>
                      </div>
                    </div><!-- /.box -->
                </div>
              </div>

              <div class="col-md-3">
                <!-- small box -->
                <div class="small-box bg-teal">
                  <div class="inner">
                    <h3>150</h3>
                    <p>Jumlah Pengaduan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-speakerphone"></i>
                  </div>
                  {{-- <a href="{{url('lihatpengaduan')}}" class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a> --}}
                </div>
              </div><!-- ./col -->

              <div class="col-md-3">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Pengaduan Terproses</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  {{-- <a href="{{url('lihatpengaduan')}}" class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a> --}}
                </div>
              </div><!-- ./col -->
              <div class="col-md-3">
                <!-- small box -->
                <div class="small-box bg-maroon">
                  <div class="inner">
                    <h3>44</h3>
                    <p>Pengguna Terdaftar</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                  </div>
                  {{-- <a href="{{url('datawarga')}}" class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a> --}}
                </div>
              </div><!-- ./col -->

              <div class="col-md-3">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>12378</h3>
                    <p>Jumlah Views</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-eye"></i>
                  </div>
                  {{-- <a href="{{url('datawarga')}}" class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a> --}}
                </div>
              </div><!-- ./col -->

            </div><!-- /.row -->

          </section><!-- /.content -->
        </div>
      </div>
    </div>
    <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright © 20162017 <a href="http://9tins.com">9Tins Project</a>.</strong> All rights reserved.
      </div><!-- /.container -->
    </footer>
  </div>


  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <!-- bootstrap time picker -->
  <script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
  {{-- icheck --}}
  <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>

  <script>
    $(function () {
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });
    });
  </script>
