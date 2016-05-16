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
                  <img src="{{asset('images/new-logo2.png')}}" alt="SPD" />
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                  <img src="{{asset('images/new-logo2.png')}}" alt="SPD" />
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
                        <img src="{{asset('images/slider3.jpg')}}" alt="First slide">
                        <div class="carousel-caption">
                          Judul : Cara Pengaduan
                        </div>
                      </div>
                      <div class="item next left">
                        <img src="{{asset('images/slider3.jpg')}}" alt="Second slide">
                        <div class="carousel-caption">
                          Judul : Cara Pengaduan
                        </div>
                      </div>
                      <div class="item">
                        <img src="{{asset('images/slider3.jpg')}}" alt="Third slide">
                        <div class="carousel-caption">
                          Judul : Cara Pengaduan
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
            <div class="col-md-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <img src="{{asset('images/logokabtangerang.png')}}">
                  <h3 class="box-title">&nbsp;&nbsp;&nbsp;Tentang SIMPEDU</h3>
                </div><!-- /.box-header -->
                <div class="box-body clearfix">
                  <blockquote class="pull-left">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <small>Pemerintah Kabupaten Tangerang</small>
                  </blockquote>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>

          <div class="row">
            <section class="col-lg-3">
              <!-- Populer Pertama -->
              <div class="box box-primary">
                <div class="box-header with-border">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="{{asset('images/one.gif')}}" alt="user image">
                  <span class="username">
                      <h4>Kependudukan</h4>
                  </span>
                </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user4-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Amanda Satyarini</a>
                        <span class="product-description">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca pada saat Pendaftaran online bagaimana? Mohon informasinya, terima kasih.
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Dudy</a>
                        <span class="product-description">
                          Tentang pembuatan ktp nih....
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Bayu</a>
                        <span class="product-description">
                          Tolong diinformasikan tentang....
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="uppercase">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- Akhir Popular Pertama -->

            <!-- Populer Kedua -->
            <section class="col-lg-3">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/two.gif')}}" alt="user image">
                    <span class="username">
                        <h4>Kesehatan</h4>
                    </span>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Contoh</a>
                        <span class="product-description">
                          Ini hanya sebagai contoh...
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Contoh</a>
                        <span class="product-description">
                          Ini hanya sebagai contoh...
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Contoh</a>
                        <span class="product-description">
                          Ini hanya sebagai contoh...
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="uppercase">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>

            <!-- Populer Ketiga -->
            <section class="col-lg-3">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/three.gif')}}" alt="user image">
                    <span class="username">
                        <h4>Ketenagakerjaan</h4>
                    </span>
                  </div>
                </div>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Parjo</a>
                        <span class="product-description">
                          Biaya upah pekerja sini...
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Prita</a>
                        <span class="product-description">
                          Upah minimum daerah sini....
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Tarjo</a>
                        <span class="product-description">
                          Para buruh ini semakin...
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="uppercase">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>

            <!-- Populer Keempat -->
            <section class="col-lg-3">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/four.gif')}}" alt="user image">
                    <span class="username">
                        <h4>Pendidikan</h4>
                    </span>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Silvi</a>
                        <span class="product-description">
                          Honor Guru Lepas
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Budi Karno</a>
                        <span class="product-description">
                          Ruangan Kelas Sekolah sini
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Anonymous</a>
                        <span class="product-description">
                          Tolong diperhatikan anak....
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="uppercase">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- Populer 4 Habis -->

            <!-- Populer KeLima -->
            <section class="col-lg-3">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/five.gif')}}" alt="user image">
                    <span class="username">
                        <h4>Jalan</h4>
                    </span>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user3-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Clara Lupita</a>
                        <span class="product-description">
                          Kepada Yth. Pemerintah Provinsi DKI Jakarta. Jalan di sebelah Untar (JL. Taman S Parman Blok C) jalannya sudah rusak parah dan kalau hujan sudah pasti tergenang. Sudah hampir setahun kondisinya begini dan kian hari makin parah. Mohon bantuannya untuk diperbaiki. Terima kasih.
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user2-160x160.jpg">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Bambang Pamungkis</a>
                        <span class="product-description">
                          Saya ingin melaporkan bahwa kini penjualan satwa liar (dilindungi) tidak hanya terjadi di pinggir jalan saja, namun makin merambah dalam bentuk media sosial yang sangat sulit untuk dideteksi. Mohon responnya. Tks.
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="uppercase">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- Populer 5 Habis -->

            <!-- Populer KeEnam -->
            <section class="col-lg-3">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/harapan.png')}}" alt="user image">
                    <span class="username">
                        <h4>Perizinan</h4>
                    </span>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Contoh</a>
                        <span class="product-description">
                          Ini hanya sebagai contoh...
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Contoh</a>
                        <span class="product-description">
                          Ini hanya sebagai contoh...
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="uppercase">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- Populer 6 Habis -->

            <!-- Populer KeTujuh -->
            <section class="col-lg-3">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/harapan.png')}}" alt="user image">
                    <span class="username">
                        <h4>Perdagangan</h4>
                    </span>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Contoh</a>
                        <span class="product-description">
                          Ini hanya sebagai contoh...
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif">
                      </div>
                      <div class="product-info">
                        <a href="" class="product-title">Contoh</a>
                        <span class="product-description">
                          Ini hanya sebagai contoh...
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="uppercase">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- Populer 7 Habis -->

          </div><!-- /.row -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
          </div>
          <strong>Copyright © 2016 - 2017 <a href="http://9tins.com">Pemerintahan Kabupaten Tangerang</a>.</strong> All rights reserved.
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
