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

            @if(Session::has('messageloginfailed'))
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Login Gagal!</h4>
                {{ Session::get('messageloginfailed') }}
              </div>
            @endif

            <div class="row">

              <div class="col-md-9">
                <div class="box box-solid">
                <div class="box-body">
                  <div id="myCarousel" class="carousel">
                  <div class="carousel-inner">
                    <?php $active = 1;?>
                    @foreach($sliders as $slider)
                      @if($active++ == 1)
                        <div class="active item"><img src="{{asset('images/'.$slider->url_gambar)}}" width="900" height="500"></div>
                      @endif
                        <div class="item"><img src="{{asset('images/'.$slider->url_gambar)}}" width="900" height="500"></div>
                    @endforeach
                  </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="fa fa-angle-left"></span></a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="fa fa-angle-right"></span></a>
                  </div>
                </div>
                </div>
              </div>

              <div class="col-md-3">
              @if(session('level') == 5)
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
                          </div>
                          <div class="social-auth-links text-center">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                          </div>
                        </div>
                      </form>
                      <a href="#">Lupa Password? Klik disini.</a><br>
                    </div>
                  </div>

                  <div class="tab-pane" id="daftar">
                    <div class="register-box-body">
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
                                <input type="checkbox" required=""> Saya Setuju <a href="#">Ketentuan</a>
                              </label>
                            </div>
                          </div>
                          <div class="social-auth-links text-center">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @elseif(session('level') == 1)
              <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-blue">
                  <div class="widget-user-image">
                    @if(auth()->user()->url_photo == null)
                      <img class="img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                    @else
                      <img class="img-circle" src="{{ asset('/images/'.auth()->user()->url_photo) }}" alt="{{ auth()->user()->nama}}">
                    @endif
                  </div>
                  <h3 class="widget-user-username">{{ auth()->user()->nama}}</h3>
                  <h5 class="widget-user-desc">Bergabung {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d-M-y')}}</h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a href="{{ url('beranda') }}"><b>Beranda</b></a></li>
                    <li><a href="{{ url('pengaduansaya') }}"><b>Pengaduan Saya</b></a></li>
                    <li><a href="{{ url('semuapengaduan') }}"><b>Daftar Pengaduan</b></a></li>
                    <li><a href="{{ url('profil') }}"><b>Profil</b></a></li>
                    <li><a href="{{ url('logout') }}"><b>Logout</b></a></li>
                  </ul>
                </div>
              </div>
              @endif
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
              <div class="small-box bg-teal">
                <div class="inner">
                  <h3>{{ $CountPengaduan }}</h3>
                  <p>Jumlah Pengaduan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-speakerphone"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>{{ $Persen }}<sup style="font-size: 20px">%</sup></h3>
                  <p>Pengaduan Terproses</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3>{{ $UsersWarga }}</h3>
                  <p>Pengguna Terdaftar</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-stalker"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>12378</h3>
                  <p>Jumlah Views</p>
                </div>
                <div class="icon">
                  <i class="ion ion-eye"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <img src="{{asset('images/logokabtangerang.png')}}">
                  <h3 class="box-title">&nbsp;&nbsp;&nbsp;Tentang SIMPEDU</h3>
                </div>
                <div class="box-body clearfix">
                  <blockquote class="pull-left">
                    <p style="font-size:15px;">
                      SIMPEDU (Sistem Informasi Pengaduan Terpadu) adalah sebuah sarana pengaduan untuk warga Kabupaten Tangerang berbasis website yang mudah diakses dan terpadu dengan 36 Satuan Kerja Pemerintah Daerah di Kabupaten Tangerang. SIMPEDU dikembangkan dalam rangka meningkatkan partisipasi masyarakat untuk pengawasan program dan kinerja pemerintah daerah dalam penyelenggaraan pembangunan dan pelayanan publik.
                    </p>
                    <small>Pemerintah Kabupaten Tangerang</small>
                  </blockquote>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <?php $batasskpd = 1; ?>
            @foreach($skpdonly as $tabskpd)
            <section class="col-lg-3 col-md-3 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="{{asset('images/stars.png')}}" alt="user image">
                  <span class="username">
                      <h4>{{ $tabskpd->nama_skpd }}</h4>
                  </span>
                </div>
                </div>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php $batasisi = 1; ?>
                    @foreach($AllTopiks as $skpd)
                    @foreach($skpd as $topik)
                    @if($topik->nama_skpd === $tabskpd->nama_skpd)
                    <li class="item">
                      <div class="product-img">
                        @if($topik->url_photo == null || $topik->flag_anonim == 1)
                          <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                        @else
                          <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$topik->url_photo) }}" alt="{{$topik->nama}}">
                        @endif
                      </div>
                      <div class="product-info">
                        <span class="product-title">@if($topik->flag_anonim == 1)
                          Tanpa Nama
                        @elseif($topik->flag_anonim == 0)
                          {{$topik->nama}}
                        @endif</span>
                        <span class="product-description-custom">
                        {{str_limit($topik->isi_pengaduan, 60)}}
                        </span>
                        <a href="{{url('detail/pengaduan/'.$topik->slug)}}">
                          [Selengkapnya]
                        </a>
                      </div>
                    </li>
                    <?php if($batasisi++ == 3) break;?>
                    @endif
                    @endforeach
                    @endforeach
                  </ul>
                </div>
                <div class="box-footer text-center">
                  <a href="{{url('semua/'.$tabskpd->slug)}}" class="label uppercase bg-blue">Lihat Semua</a>
                </div>
              </div>
            </section>
            <?php if($batasskpd++ == 7) break;?>
            @endforeach

            @if($batasskpd >= 7)
            <section class="col-lg-3 col-md-3 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('images/megaphone.png')}}" alt="user image">
                    <span class="username">
                        <h4>Pengaduan Lainnya</h4>
                    </span>
                  </div>
                </div>
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
                </div>
                <div class="box-footer text-center">
                  <a href="{{url('detail/semua-pengaduan-lainnya')}}" class="label uppercase bg-blue">Lihat Semua</a>
                </div>
              </div>
            </section>
            @endif
          </div>
          </section>
        </div>
      </div>
      <footer class="main-footer">
        <div class="container">
          @include('includes.footer')
        </div>
      </footer>
    </div>

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

    <script>
    $('.carousel').carousel({
      interval: 3500,
      pause: 'hover',
        wrap: true
    });
    </script>
  </body>
</html>
