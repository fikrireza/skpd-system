<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU | Profil</title>
    @include('includes.head')
  </head>

  <body class="hold-transition skin-blue-light layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="{{ url('/')}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                  <img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                  <img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
                  &nbsp;&nbsp;<b>SIMPEDU</b>
                </span>
              </a>
            </div>

            <!-- Menu Kiri -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="#">Laporan Saya <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Daftar Laporan</a></li>
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                </div>
              </form>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!-- The user image in the navbar-->
                      <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- The user image in the menu -->
                      <li class="user-header">
                        <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                        <p>
                          Alexander Pierce
                          <small>Bergabung Sejak 5-Mei-2016</small>
                        </p>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="{{ url('profil') }}" class="btn btn-default btn-flat">Profil</a>
                        </div>
                        <div class="pull-right">
                          <a href="#" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-9">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Alexander Pierce</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="box-body">
                        <div class="widget-user-image">
                          <img class="img-square" src="{{ asset('/dist/img/avatar04.png') }}" alt="User Avatar">
                        </div><!-- /.widget-user-image -->
                        <h5 class="widget-user-desc" align="center">Bergabung 5-Mei-2016</h5>
                      </div>
                      <div class="box-footer">
                        <button type="file" class="btn">Pilih Foto</button>
                      </div><!-- /.box-footer -->
                    </div>
                    <div class="col-md-9">
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-user"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="Nama" value="Alexander Pierce">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">No. KTP</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-credit-card"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="No. KTP" value="3277387748930002">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" value="30/03/1988">
                              </div><!-- /.input group -->
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">No. Telepon</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="No. Telp" value="021-778728678">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-envelope"></i>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" value="alexander@mail.com">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Pria
                                  </label>
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option1">Wanita
                                  </label>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" placeholder="Alamat" rows="5">Jl. Kemuning Barat Tengah Utara Selatan No. 1234</textarea>
                            </div>
                          </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <button type="submit" class="btn btn-info pull-right">Ubah Data</button>
                        </div><!-- /.box-footer -->
                      </form>

                    </div>
                  </div><!-- row -->
                  </form>
                </div><!-- box form -->
              </div><!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Laporan Anda</span>
                    <span class="info-box-number">10</span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Telah Ditanggapi</span>
                    <span class="info-box-number">2</span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div>

              <div class="col-md-3">
                  <!-- About Me Box -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Laporan Terbaru</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>  Pendidikan</strong>
                    <p class="text-muted">
                      B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Geografi</strong>
                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Kependudukan</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->
            </div><!-- /.row -->

          </section><!-- /.content -->
        </div>
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
