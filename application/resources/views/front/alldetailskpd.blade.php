<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU</title>
    @include('includes.head')
    <link rel="stylesheet" href="{{asset('dist/css/customcss.css')}}" media="screen" title="no title" charset="utf-8">
  </head>

  <body class="hold-transition skin-black-light layout-top-nav">
    <div class="wrapper">

      @include('includes.navbarumum')

      <div class="modal fade" id="modalSyarat" role="dialog">
        <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="box-title">Syarat & Ketentuan SIMPEDU</h3>
              </div>
              <div class="modal-body">
                @if($syarat != null)
                {!! $syarat->isi_syarat !!}
                @else
                Belum ada data
                @endif
              </div>
              <div class="modal-footer">
              </div>
            </div>
        </div>
      </div>

      <div class="content-wrapper custombackground">
        <div class="container">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
                  <li class="active">Daftar SKPD</li>
                </ol>
              </div>
            </div>

            <div class="row">
              <div class="col-md-9">
                <?php $warna = 1;
                ?>
                <div class="row">
                @foreach($dataskpd as $skpd)
                <div class="col-md-4">
                  <div class="box box-widget widget-user-2">
                    <?php $warna++; ?>
                    @if($warna % 2 == 0)
                    <div class="widget-user-header bg-blue">
                    @elseif($warna % 2 == 1)
                    <div class="widget-user-header bg-green">
                    @endif
                      <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('dist/img/Architecture_256.png')}}" alt="User Avatar">
                      </div>
                      <h3 class="widget-user-username">SKPD</h3>
                      <h5 class="widget-user-desc">{{ $skpd->nama_skpd }}</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a>Jumlah Topik Pengaduan<span class="pull-right badge bg-blue">{{ $skpd->jumlah_pengaduan }}</span></a></li>
                        {{-- <li><a>Belum Ditanggapi <span class="pull-right badge bg-red">30</span></a></li>
                        <li><a>Sudah Ditanggapi <span class="pull-right badge bg-green">24</span></a></li> --}}
                        <div class="box-footer text-center">
                          <a href="{{url('skpd/'.$skpd->slug)}}" class="label uppercase bg-blue">Lihat Semua</a>
                        </div>
                      </ul>
                    </div>
                  </div>
                </div>
                @endforeach
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
                        Lupa Password? <a href="{{ url('lupa_password') }}">Klik disini.</a><br>
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
                                  <input type="checkbox" required=""> Saya Setuju <a href="#" data-toggle="modal" data-target="#modalSyarat">Ketentuan</a>
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

              <div class="col-md-3">
                <!-- small box -->
                <div class="small-box bg-teal">
                  <div class="inner">
                    <h3>{{ $CountPengaduan }}</h3>
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
                    <h3>{{ $Persen }}<sup style="font-size: 20px">%</sup></h3>
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
                    <h3>{{ $UsersWarga }}</h3>
                    <p>Pengguna Terdaftar</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                  </div>
                </div>
              </div><!-- ./col -->

              <div class="col-md-3">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>{{ $Visitor }}</h3>
                    <p>Jumlah Pengunjung</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-eye"></i>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <footer class="main-footer">
      <div class="container">
        @include('includes.footer')
      </div>
    </footer>
  </div>


  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
