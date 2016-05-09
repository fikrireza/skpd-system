<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU</title>
    @include('includes.head')
  </head>

  <body class="hold-transition skin-white layout-top-nav">
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
                <div class="box box-solid">
                <!-- <div class="box-header with-border">
                   <h3 class="box-title">Carousel</h3>
                </div> /.box-header -->
                <div class="box-body">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="item active left">
                        <img src="{{asset('images/slider1.jpg')}}" alt="First slide">
                        <div class="carousel-caption">
                          Judul : First Slide
                        </div>
                      </div>
                      <div class="item next left">
                        <img src="{{asset('images/slider2.jpg')}}" alt="Second slide">
                        <div class="carousel-caption">
                          Judul : Second Slide
                        </div>
                      </div>
                      <div class="item">
                        <img src="{{asset('images/slider3.jpg')}}" alt="Third slide">
                        <div class="carousel-caption">
                          Judul : Third Slide
                        </div>
                      </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="fa fa-angle-right"></span>
                    </a>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

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
                        <a href="#">Lupa Password</a><br>

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
          </div>

          <div class="row">
            <div class="col-lg-4 col-xs-12">
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
            <div class="col-lg-4 col-xs-12">
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
            <div class="col-lg-4 col-xs-12">
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
          </div>

          <div class="row">
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#kesehatan" data-toggle="tab" aria-expanded="true">Kesehatan</a></li>
                  <li class=""><a href="#perhubungan" data-toggle="tab" aria-expanded="false">Perhubungan</a></li>
                  <li class=""><a href="#pendidikan" data-toggle="tab" aria-expanded="false">Pendidikan</a></li>
                  <li class=""><a href="#kependudukan" data-toggle="tab" aria-expaded="false">Kependudukan</a></li>
                  <li class=""><a href="#tenagakerja" data-toggle="tab" aria-expaded="false">Tenaga Kerja</a></li>
                  <li class=""><a href="#polkam" data-toggle="tab" aria-expaded="false">Politik dan Keamanan</a></li>
                  <li class=""><a href="#geografi" data-toggle="tab" aria-expaded="false">Geografi</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="kesehatan">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                    </div><!-- /.post -->
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="perhubungan">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user5-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">Pelapor</a>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <div class="box-footer box-comments">
                        <div class="box-comment">
                          <!-- User image -->
                          <img class="img-circle img-sm" src="{{ asset('/dist/img/user3-128x128.jpg') }}" alt="user image">
                          <div class="comment-text">
                            <span class="username">
                              Administrator
                              <span class="text-muted pull-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.
                          </div><!-- /.comment-text -->
                        </div><!-- /.box-comment -->
                        <div class="box-comment">
                          <!-- User image -->
                          <img class="img-circle img-sm" src="{{ asset('/dist/img/user8-128x128.jpg') }}" alt="user image">
                          <div class="comment-text">
                            <span class="username">
                              SKPD Perhubungan
                              <span class="text-muted pull-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                            The point of using Lorem Ipsum is that it has a more-or-less
                            normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.
                          </div><!-- /.comment-text -->
                        </div><!-- /.box-comment -->
                      </div>
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="pendidikan">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user4-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div>

            <div class="col-md-3">
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
                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Geografi</strong>
                  <p class="text-muted">Malibu, California</p>
                  <hr>
                  <strong><i class="fa fa-book margin-r-5"></i>  Pendidikan</strong>
                  <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
          </div>
          <strong>Copyright © 20162017 <a href="http://9tins.com">9Tins Project</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/dist/js/demo.js') }}"></script>
  </body>
</html>
