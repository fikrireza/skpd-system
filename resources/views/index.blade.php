<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU</title>
    @include('includes.head')
    <link rel="stylesheet" href="{{asset('dist/css/customcss.css')}}" media="screen" title="no title" charset="utf-8">
  </head>

  <body class="hold-transition skin-white layout-top-nav">
    <div class="wrapper">

      @include('includes.navbarumum')

      <!-- Full Width Column -->
      <div class="content-wrapper custombackground">
        <div class="container">
          <!-- Main content -->
          <section class="content">

            @if(Session::has('message'))
              <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Informasi</h4>
                {{ Session::get('message') }}
              </div>
            @endif

            <div class="row">

              <div class="col-md-9">
                <div class="box box-solid">
                <!-- <div class="box-header with-border">
                   <h3 class="box-title">Carousel</h3>
                </div> /.box-header -->
                <div class="box-body">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="item">
                        <img src="{{asset('images/slider2.png')}}" alt="First slide">
                        {{-- <div class="carousel-caption">
                          Judul : Cara Pengaduan
                        </div> --}}
                      </div>
                      <div class="item active left">
                        <img src="{{asset('images/slider3.png')}}" alt="Second slide">
                      </div>
                      <div class="item next left">
                        <img src="{{asset('images/tatacarapengaduan.png')}}" alt="Third slide">
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
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
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
            <div class="col-lg-3 col-md-6 col-xs-12">
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
            <div class="col-lg-3 col-md-6 col-xs-12">
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

            <div class="col-lg-3 col-md-6 col-xs-12">
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
                    <p style="font-size:15px;">
                      SIMPEDU (Sistem Informasi Pengaduan Terpadu) adalah sebuah sarana pengaduan untuk warga Kabupaten Tangerang berbasis website yang mudah diakses dan terpadu dengan 36 Satuan Kerja Pemerintah Daerah di Kabupaten Tangerang. SIMPEDU dikembangkan dalam rangka meningkatkan partisipasi masyarakat untuk pengawasan program dan kinerja pemerintah daerah dalam penyelenggaraan pembangunan dan pelayanan publik.
                    </p>
                    <small>Pemerintah Kabupaten Tangerang</small>
                  </blockquote>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>

          <div class="row">
            <section class="col-lg-3 col-md-3 col-xs-12">
              <!-- Populer Pertama -->
              <div class="box box-primary">
                <div class="box-header with-border">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="{{asset('images/stars.png')}}" alt="user image">
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
                        <span class="product-title">Amanda Satyarini</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="{{url('detail/pengaduan-warga')}}">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user5-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Bayu Widia</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="{{url('detail/pengaduan-warga')}}">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user1-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Dudy</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="{{url('detail/pengaduan-warga')}}">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{url('viewall/topik-aduan')}}" class="label uppercase bg-blue">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- Akhir Popular Pertama -->

            <!-- Populer Kedua -->
            <section class="col-lg-3 col-md-3 col-xs-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/stars.png')}}" alt="user image">
                    <span class="username">
                        <h4>Kesehatan</h4>
                    </span>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user6-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Anonymous</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user7-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Silviano</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user8-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Maryani</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="label uppercase bg-blue">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>

            <!-- Populer Ketiga -->
            <section class="col-lg-3 col-md-3 col-xs-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/stars.png')}}" alt="user image">
                    <span class="username">
                        <h4>Ketenagakerjaan</h4>
                    </span>
                  </div>
                </div>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user1-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Parjo</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user3-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Prita</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user4-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Tarjo</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="label uppercase bg-blue">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>

            <!-- Populer Keempat -->
            <section class="col-lg-3 col-md-3 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/stars.png')}}" alt="user image">
                    <span class="username">
                        <h4>Pendidikan</h4>
                    </span>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user5-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Silvi</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user6-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Budi Karno</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user7-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Anonymous</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="label uppercase bg-blue">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- Populer 4 Habis -->

            <!-- Populer KeLima -->
            <section class="col-lg-3 col-md-3 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/stars.png')}}" alt="user image">
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
                        <span href="" class="product-title">Clara Lupita</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user2-160x160.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Bambang Pamungkis</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user2-160x160.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Rosi Angky</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="label uppercase bg-blue">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- Populer 5 Habis -->

            <!-- Populer KeEnam -->
            <section class="col-lg-3 col-md-3 col-xs-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/stars.png')}}" alt="user image">
                    <span class="username">
                        <h4>Perizinan</h4>
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
                        <span href="" class="product-title">Contoh</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user5-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Contoh</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user6-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Contoh</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="label uppercase bg-blue">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- Populer 6 Habis -->

            <!-- Populer KeTujuh -->
            <section class="col-lg-3 col-md-3 col-xs-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/stars.png')}}" alt="user image">
                    <span class="username">
                        <h4>Perdagangan</h4>
                    </span>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user7-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Contoh</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user4-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Contoh</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/user8-128x128.jpg">
                      </div>
                      <div class="product-info">
                        <span href="" class="product-title">Contoh</span>
                        <span class="product-description-custom">
                          Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca ...
                        </span>
                        <a href="#">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="" class="label uppercase bg-blue">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- Populer 7 Habis -->

            <!-- List Tidak Populer -->
            <section class="col-lg-3 col-md-3 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/megaphone.png')}}" alt="user image">
                    <span class="username">
                        <h4>Pengaduan Lainnya</h4>
                    </span>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul class="nav nav-pills nav-stacked">
                      <li>
                        <a href="{{url('viewall/topik-aduan')}}">
                          Pengaduan Listrik
                        </a>
                      </li>
                      <li>
                        <a href="{{url('viewall/topik-aduan')}}">
                          Lalu Lintas
                        </a>
                      </li>
                      <li>
                        <a href="{{url('viewall/topik-aduan')}}">
                          Kerusakan Bangunan
                        </a>
                      </li>
                      <li>
                        <a href="{{url('viewall/topik-aduan')}}">
                          Pelayanan Administrasi
                        </a>
                      </li>
                      <li>
                        <a href="{{url('viewall/topik-aduan')}}">
                          Pariwisata
                        </a>
                      </li>
                      <li>
                        <a href="{{url('viewall/topik-aduan')}}">
                          Kebudayaan
                        </a>
                      </li>
                      <li>
                        <a href="{{url('viewall/topik-aduan')}}">
                          Perpajakan
                        </a>
                      </li>
                      <li>
                        <a href="{{url('viewall/topik-aduan')}}">
                          Transportasi Publik
                        </a>
                      </li>
                      <li>
                        <a href="{{url('viewall/topik-aduan')}}">
                          Lainnya
                        </a>
                      </li>
                    </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{url('detail/semua-pengaduan-lainnya')}}" class="label uppercase bg-blue">Lihat Semua</a>
                </div><!-- /.box-footer -->
              </div>
            </section>
            <!-- List tidak poluler -->

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
