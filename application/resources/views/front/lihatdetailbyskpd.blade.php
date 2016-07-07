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
      <!-- Full Width Column -->

      <div class="content-wrapper custombackground">
        <div class="container">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
                  <li class="active">Detail Pengaduan SKPD</li>
                </ol>
              </div>
            </div>

            <div class="row">
              <div class="col-md-9">
                <div class="box box-primary" style="min-height:800px">
                  <div class="box-header with-border">
                    <h3 class="box-title">{{ $cekSlug->nama_skpd}}</h3>
                  </div>
                  <div class="box-body">
                    @foreach($allpengaduan as $pengaduan)
                    <div class="post">
                      <div class="user-block">
                        @if($pengaduan->url_photo == null || $pengaduan->flag_anonim == 1)
                          <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                        @else
                          <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$pengaduan->url_photo) }}" alt="{{$pengaduan->nama}}">
                        @endif
                        <span class="username">
                          <span>@if($pengaduan->flag_anonim == 1)
                            Tanpa Nama
                          @elseif($pengaduan->flag_anonim == 0)
                            {{$pengaduan->nama}}
                          @endif</span>
                        </span>
                        <span class="description">{{ $pengaduan->nama_skpd}} - {{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d-M-y H:i')}}</span>
                      </div><!-- /.user-block -->
                      <p><b>{{ $pengaduan->judul_pengaduan }}</b></p>
                      <p>{!! $pengaduan->isi_pengaduan !!}</p>

                      <div class="timeline-body">
                      @foreach($dokumentall as $dok)
                        @if($pengaduan->id === $dok->pengaduan_id)
                          {{-- <a href="{{ asset('\..\documents').'/'.$dok->url_dokumen}}" download="{{$dok->url_dokumen}}" class="link-black text-sm"> --}}
                            @if (strpos($dok->url_dokumen, '.pdf'))
                              <img width="3%" src="{{ asset('dist\img\pdf.png') }}" alt="..." class="margin">
                            @elseif(strpos($dok->url_dokumen, '.png'))
                              <img width="3%" src="{{ asset('dist\img\png.png') }}" alt="..." class="margin">
                            @elseif(strpos($dok->url_dokumen, '.jpg'))
                              <img width="3%" src="{{ asset('dist\img\jpg.png') }}" alt="..." class="margin">
                            @elseif(strpos($dok->url_dokumen, '.docx'))
                              <img width="3%" src="{{ asset('dist\img\doc.png') }}" alt="..." class="margin">
                            @elseif(strpos($dok->url_dokumen, '.xlsx'))
                              <img width="3%" src="{{ asset('dist\img\doc.png') }}" alt="..." class="margin">
                            @endif
                          {{-- </a> --}}
                        @endif
                      @endforeach
                      </div>

                      @if($tanggapan->isEmpty())

                      @else
                        <div class='box-footer box-comments' style="border:1px solid #00a65a;">
                          <div style="padding-bottom:5px;">
                            <b>Tanggapan SKPD</b>
                          </div>
                          @foreach($tanggapan as $tanggap)
                          <div class='box-comment'>
                            @if($tanggap->url_photo == null)
                              <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                            @else
                              <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$tanggap->url_photo) }}">
                            @endif
                            <div class='comment-text'>
                              <span class="username">
                                {{ $tanggap->id_userskpd }}
                                <span class='text-muted pull-right'>{{ \Carbon\Carbon::parse($tanggap->created_at)->format('d-M-y H:i')}}</span>
                              </span>
                              {{ $tanggap->tanggapan }}
                            </div>
                          </div>
                          @endforeach
                        </div>
                      @endif
                      </br>
                      <ul class="list-inline">
                        @if($pengaduan->flag_verifikasi == 1)
                          <li><a href="#" class="link-black text-sm"><span class="label bg-green"><span class="glyphicon glyphicon-ok"></span> &nbsp;Ter-Verifikasi</span></a></li>
                        @elseif($pengaduan->flag_mutasi == 1)
                          <li><a href="#" class="link-black text-sm"><span class="label bg-yellow"><span class="glyphicon glyphicon-repeat"></span> &nbsp;Dialihkan</span></a></li>
                        @elseif($pengaduan->flag_tanggap == 0)
                          <li><a class="link-black text-sm"><span class="label bg-red"><span class="glyphicon glyphicon-remove"></span> Belum Ditanggapi</span></a></li>
                        @endif
                      </ul>
                    </div>
                    @endforeach
                  </div>
                  <div class="box-footer">

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

              <div class="col-md-3">
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

              <div class="col-md-3">
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

              <div class="col-md-3">
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

            </div><!-- /.row -->

          </section><!-- /.content -->
        </div>
      </div>
    </div>
    <footer class="main-footer">
      <div class="container">
        @include('includes.footer')
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
