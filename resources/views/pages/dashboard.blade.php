@extends('layouts.master')

@section('title')
  <title>Dashboard - SKPD Pengaduan Online</title>
@stop

@section('breadcrumb')
  <h1>
    Halaman Utama Administrator SKPD
    <small>Data Statistik</small>
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
  </ol>
@stop

@section('content')

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
        <a href="{{url('lihatpengaduan')}}" class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
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
        <a href="{{url('lihatpengaduan')}}" class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
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
        <a href="{{url('datawarga')}}" class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a href="#revenue-chart" data-toggle="tab">Grafik</a></li>
          {{-- <li><a href="#sales-chart" data-toggle="tab">Donut</a></li> --}}
          <li class="pull-left header"><i class="fa fa-area-chart"></i> Jumlah Pengaduan Per Topik</li>
        </ul>
        <div class="tab-content no-padding">
          <!-- Morris chart - Sales -->
          <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
          {{-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div> --}}
        </div>
      </div><!-- /.nav-tabs-custom -->

      <!-- Chat box -->
      <div class="box box-primary">
        <div class="box-header">
          <i class="fa fa-exclamation"></i>
          <h3 class="box-title">Pengaduan Terbaru</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body chat" id="chat-box">
          <!-- chat item -->
          <div class="item">
            <img src="dist/img/user4-128x128.jpg" alt="user image" class="offline">
            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right">
                  <i class="fa fa-calendar"></i> 24 April 2016
                    &nbsp;&nbsp;
                  <i class="fa fa-clock-o"></i> 2:15
                </small>
                Amanda Satyarini
              </a>
              Yth. SKPD Kabupaten Tangerang terkait, Jika No. KK tidak terbaca pada saat Pendaftaran online bagaimana? Mohon informasinya, terima kasih.
            </p>
            <div class="attachment">
              <b>Data Pendukung</b>
              <p class="text-muted">
                gambar.jpg
              </p>
              <div class="pull-right">
                <a href="#" class="btn btn-default btn-sm btn-flat">Download Data Pendukung</a>
                @if(Session::has('akses'))
                  @if(Session::get('akses')=="userskpd")
                    <a href="{{url('detailpengaduan')}}" class="btn btn-success btn-sm btn-flat">Proses Pengaduan</a>
                  @else
                    <a href="{{url('detailpengaduan')}}" class="btn btn-success btn-sm btn-flat">Lihat Pengaduan</a>
                  @endif
                @endif
              </div>
            </div><!-- /.attachment -->
          </div><!-- /.item -->
          <!-- chat item -->
          <div class="item">
            <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">
            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right">
                  <i class="fa fa-calendar"></i> 24 April 2016
                    &nbsp;&nbsp;
                  <i class="fa fa-clock-o"></i> 2:15
                </small>
                Clara Lupita
              </a>
              Kepada Yth. Pemerintah Provinsi DKI Jakarta. Jalan di sebelah Untar (JL. Taman S Parman Blok C) jalannya sudah rusak parah dan kalau hujan sudah pasti tergenang. Sudah hampir setahun kondisinya begini dan kian hari makin parah. Mohon bantuannya untuk diperbaiki. Terima kasih.
            </p>
            <div class="attachment">
              <div class="pull-right">
                @if(Session::has('akses'))
                  @if(Session::get('akses')=="userskpd")
                    <a href="{{url('detailpengaduan')}}" class="btn btn-success btn-sm btn-flat">Proses Pengaduan</a>
                  @else
                    <a href="{{url('detailpengaduan')}}" class="btn btn-success btn-sm btn-flat">Lihat Pengaduan</a>
                  @endif
                @endif
              </div>
            </div><!-- /.attachment -->
          </div><!-- /.item -->
          <!-- chat item -->
          <div class="item">
            <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">
            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right">
                  <i class="fa fa-calendar"></i> 24 April 2016
                    &nbsp;&nbsp;
                  <i class="fa fa-clock-o"></i> 2:15
                </small>
                Bambang Pamungkis
              </a>
              Saya ingin melaporkan bahwa kini penjualan satwa liar (dilindungi) tidak hanya terjadi di pinggir jalan saja, namun makin merambah dalam bentuk media sosial yang sangat sulit untuk dideteksi. Mohon responnya. Tks.
            </p>
            <div class="attachment">
              <div class="pull-right">
                @if(Session::has('akses'))
                  @if(Session::get('akses')=="userskpd")
                    <a href="{{url('detailpengaduan')}}" class="btn btn-success btn-sm btn-flat">Proses Pengaduan</a>
                  @else
                    <a href="{{url('detailpengaduan')}}" class="btn btn-success btn-sm btn-flat">Lihat Pengaduan</a>
                  @endif
                @endif
              </div>
            </div><!-- /.attachment -->
          </div><!-- /.item -->
        </div><!-- /.chat -->
        <div class="box-footer">
          <a href="{{url('lihatpengaduan')}}" class="btn btn-primary pull-right"><i class="fa fa-eye"></i> &nbsp;&nbsp;Lihat Seluruh Pengaduan</a>
        </div>
      </div><!-- /.box (chat box) -->

    </section><!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-pie-chart"></i> Presentase Total Pengaduan</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart-responsive">
                <canvas id="pieChart" height="150"></canvas>
              </div><!-- ./chart-responsive -->
            </div><!-- /.col -->
            <div class="col-md-4">
              <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle-o text-red"></i> E-KTP &amp; KK</li>
                <li><i class="fa fa-circle-o text-green"></i> Lalu Lintas</li>
                <li><i class="fa fa-circle-o text-yellow"></i> Perizinan</li>
                <li><i class="fa fa-circle-o text-aqua"></i> Pendidikan</li>
                <li><i class="fa fa-circle-o text-light-blue"></i> Kesehatan</li>
                <li><i class="fa fa-circle-o text-gray"></i> Lainnya</li>
              </ul>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.box-body -->
        <div class="box-footer no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li>
              <a>
              <b>Jenis Pengaduan</b>
                <span class="pull-right">
                  <b>
                    Pengaduan Terproses
                  </b>
                </span>
              </a>
            </li>
            <li>
              <a href="{{url('pengaduanbytopik')}}">
                Pelayanan E-KTP &amp; KK
                <span class="pull-right text-red">
                  <b>12%</b>
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                Lalu Lintas
                <span class="pull-right text-green">
                  <b>87%</b>
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                Perizinan
                <span class="pull-right text-yellow">
                  <b>55%</b>
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                Pendidikan
                <span class="pull-right text-red">
                  <b>12%</b>
                </span>
              </a>
            </li>
            <li>
              <a href="{{url('pengaduanbytopik')}}">
                Kesehatan
                <span class="pull-right text-green">
                  <b>98%</b>
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                Lainnya
                <span class="pull-right text-yellow">
                  <b>57%</b>
                </span>
              </a>
            </li>

          </ul>
        </div><!-- /.footer -->
      </div><!-- /.box -->

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-user"></i> &nbsp;Identitas Pelapor</h3>
          <div class="box-tools pull-right">
            <span class="label label-warning">8 Pendaftar Baru</span>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
          <ul class="users-list clearfix">
            <li>
              <img src="dist/img/user4-128x128.jpg" alt="User Image">
              <a class="users-list-name" href="{{url('wargaprofile')}}">Amanda Satyarini</a>
              <span class="users-list-date">15 Jan</span>
            </li>
            <li>
              <img src="dist/img/user1-128x128.jpg" alt="User Image">
              <a class="users-list-name" href="{{url('wargaprofile')}}">Alexander Pierce</a>
              <span class="users-list-date">Today</span>
            </li>
            <li>
              <img src="dist/img/user8-128x128.jpg" alt="User Image">
              <a class="users-list-name" href="#">Norman</a>
              <span class="users-list-date">Yesterday</span>
            </li>
            <li>
              <img src="dist/img/user7-128x128.jpg" alt="User Image">
              <a class="users-list-name" href="#">Jane</a>
              <span class="users-list-date">12 Jan</span>
            </li>
            <li>
              <img src="dist/img/user6-128x128.jpg" alt="User Image">
              <a class="users-list-name" href="#">John</a>
              <span class="users-list-date">12 Jan</span>
            </li>
            <li>
              <img src="dist/img/user2-160x160.jpg" alt="User Image">
              <a class="users-list-name" href="#">Alexander</a>
              <span class="users-list-date">13 Jan</span>
            </li>
            <li>
              <img src="dist/img/user5-128x128.jpg" alt="User Image">
              <a class="users-list-name" href="#">Sarah</a>
              <span class="users-list-date">14 Jan</span>
            </li>
            <li>
              <img src="dist/img/user3-128x128.jpg" alt="User Image">
              <a class="users-list-name" href="#">Nadia</a>
              <span class="users-list-date">15 Jan</span>
            </li>
          </ul><!-- /.users-list -->
        </div><!-- /.box-body -->
        <div class="box-footer text-center">
          <a class="btn btn-primary" href="{{url('datawarga')}}">
            <i class="fa fa-eye"></i>&nbsp;&nbsp;Lihat Semua Identitas Pelapor
          </a>
        </div><!-- /.box-footer -->
      </div><!--/.box -->
    </section><!-- right col -->
  </div><!-- /.row (main row) -->

  <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- Morris.js charts -->
  <script src="{{ asset('/bootstrap/js/raphael-min.js') }}"></script>
  <script src="{{ asset('/plugins/morris/morris.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
  <!-- jvectormap -->
  <script src="{{ asset('/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ asset('/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('/plugins/knob/jquery.knob.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('/bootstrap/js/moment.min.js') }}"></script>
  <script src="{{ asset('/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- datepicker -->
  <script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
  <!-- Slimscroll -->
  <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
  {{-- Chart JS --}}
  <script src="{{asset('plugins/chartjs/Chart.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/app.min.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  {{-- <script src="{{ asset('/dist/js/pages/dashboard.js') }}"></script> --}}
  <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('/dist/js/demo.js') }}"></script>
@stop
