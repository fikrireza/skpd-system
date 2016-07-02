@extends('layouts.master')

@section('title')
  <title>Dashboard - SKPD Pengaduan Online</title>
@stop

@section('breadcrumb')
  <h1>
    @if(Session::has('akses'))
      @if(Session::get('akses')=="administrator")
        Halaman Utama Administrator Utama
      @elseif(Session::get('akses')=="kesehatan")
        Halaman Utama Admin SKPD Kesehatan
      @elseif(Session::get('akses')=="pendidikan")
        Halaman Utama Admin SKPD Pendidikan
      @endif
    @endif
    <small>Data Statistik</small>
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
  </ol>
@stop

@section('content')

  <div class="row">
    <div class="col-md-12">
      @if(Session::has('firsttimelogin'))
        <div class="alert alert-success panjang">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Selamat Datang!</h4>
          <p>{{ Session::get('firsttimelogin') }}</p>
        </div>
      @endif
    </div>
    <div class="col-lg-4 col-md-4 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-teal">
        <div class="inner">
          <h3>
            @if(Auth::user()->level=="0")
              {{$getcountpengaduanall}}
            @elseif(Auth::user()->level=="2")
              {{$getcountpengaduan}}
            @endif
            </h3>
          <p>Jumlah Pengaduan</p>
        </div>
        <div class="icon">
          <i class="ion ion-speakerphone"></i>
        </div>
        <a
          @if(Session::has('akses'))
            @if(Session::get('akses')=="administrator")
              href="{{url('historipengaduan')}}"
            @else
              href="{{url('lihatpengaduan')}}"
            @endif
          @endif
         class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-md-4 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-purple">
        <div class="inner">
          <h3>
          @if(Auth::user()->level=="0")
            {{$getcountpengaduantelahditanggapiall}}
          @elseif(Auth::user()->level=="2")
            {{$getcountpengaduantelahditanggapi}}
          @endif
            <sup style="font-size: 20px"></sup></h3>
          <p>Pengaduan Telah Ditanggapi</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{url('lihatpengaduan')}}" class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-md-4 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-maroon">
        <div class="inner">
          <h3>{{$getcountuser}}</h3>
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
    <section class="col-lg-7 col-md-7 connectedSortable">
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
          @if(Auth::user()->level=="0")
            @foreach($getlihatpengaduanall as $key)
              <div class="item">
                @if($key->User->url_photo == null || $key->flag_anonim==1)
                  <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                @else
                  <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$key->User->url_photo) }}" alt="{{$key->User->nama}}">
                @endif
                <p class="message">
                  @if($key->flag_anonim==0)
                    <a href="{{url('wargaprofile/show', $key->User->id)}}" class="name">
                  @elseif($key->flag_anonim==1)
                    <a href="#" class="name">
                  @endif
                    <small class="text-muted pull-right">
                      <i class="fa fa-calendar"></i>
                      <?php
                        $date = $key->created_at;
                        $justdate = substr($date, 0, 10);
                        $explode = explode("-", $justdate);
                        echo $explode[2]."-".$explode[1]."-".$explode[0];
                      ?>
                        &nbsp;&nbsp;
                      <i class="fa fa-clock-o"></i>
                      <?php
                        $justtime = substr($date, 12);
                        echo $justtime;
                      ?>
                    </small>
                    @if($key->flag_anonim==0)
                      {{$key->User->nama}}
                    @elseif($key->flag_anonim==1)
                      Nama Dirahasiakan
                    @endif
                  </a>
                    {{$key->isi_pengaduan}}
                </p>
                <div class="attachment">
                  <b>Data Pendukung</b>
                  <p class="text-muted">
                    @foreach($getdokumen as $dok)
                        @if($key->id === $dok->pengaduan_id)
                          {{$dok->url_dokumen}}
                        @endif
                    @endforeach
                  </p>
                  <div class="pull-right">
                    @foreach($getdokumen as $dok)
                        @if($key->id === $dok->pengaduan_id)
                          <a href="{{ asset('\..\documents').'/'.$dok->url_dokumen}}" download="{{$dok->url_dokumen}}" class="btn btn-default btn-sm btn-flat">Download Data Pendukung</a>
                        @endif
                    @endforeach
                    @if(Session::has('akses'))
                      @if(Session::get('akses')=="administrator")
                        <a href="{{url('detailpengaduan')}}" class="btn btn-success btn-sm btn-flat">Lihat Pengaduan</a>
                      @else
                        <a href="{{url('detailpengaduan')}}" class="btn btn-success btn-sm btn-flat">Proses Pengaduan</a>
                      @endif
                    @endif
                  </div>
                </div><!-- /.attachment -->
              </div><!-- /.item -->
            @endforeach

          @elseif(Auth::user()->level=="2")
            @foreach($getlihatpengaduan as $key)
              <div class="item">
                @if($key->url_photo == null || $key->flag_anonim==1)
                  <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                @else
                  <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$key->url_photo) }}" alt="{{$key->nama}}">
                @endif
                <p class="message">
                    @if($key->flag_anonim==0)
                      <a href="{{url('wargaprofile/show', $key->iduser)}}" class="name">
                    @elseif($key->flag_anonim==1)
                      <a href="#" class="name">
                    @endif
                    <small class="text-muted pull-right">
                      <i class="fa fa-calendar"></i>
                      <?php
                        $date = $key->created_at;
                        $justdate = substr($date, 0, 10);
                        $explode = explode("-", $justdate);
                        echo $explode[2]."-".$explode[1]."-".$explode[0];
                      ?>
                        &nbsp;&nbsp;
                      <i class="fa fa-clock-o"></i>
                      <?php
                        $justtime = substr($date, 12);
                        echo $justtime;
                      ?>
                    </small>
                    @if($key->flag_anonim=="0")
                      {{$key->nama}}
                    @elseif($key->flag_anonim=="1")
                      Nama Dirahasiakan
                    @endif
                  </a>
                    {{$key->isi_pengaduan}}
                </p>
                <div class="attachment">
                  <b>Data Pendukung</b>
                  <p class="text-muted">'
                      @foreach($getdokumen as $dok)
                          @if($key->id === $dok->pengaduan_id)
                            {{$dok->url_dokumen}}
                          @endif
                      @endforeach
                  </p>
                  <div class="pull-right">
                    @foreach($getdokumen as $dok)
                        @if($key->id === $dok->pengaduan_id)
                          <a href="{{ asset('\..\documents').'/'.$dok->url_dokumen}}" download="{{$dok->url_dokumen}}" class="btn btn-default btn-sm btn-flat">Download Data Pendukung</a>
                        @endif
                    @endforeach
                    @if($key->flag_tanggap==0)
                      <a href="{{url('detailpengaduan/show', $key->id)}}" class="btn btn-warning btn-sm btn-flat">Belum ditanggapi</a>
                    @else
                      <a href="{{url('detailpengaduan/show', $key->id)}}" class="btn btn-success btn-sm btn-flat">Sudah ditanggapi</a>
                    @endif

                    @if(Session::has('akses'))
                      @if(Session::get('akses')=="administrator")
                        <a href="{{url('detailpengaduan')}}" class="btn btn-success btn-sm btn-flat">Lihat Pengaduan</a>
                      @else
                        <a href="{{url('detailpengaduan')}}" class="btn btn-success btn-sm btn-flat">Proses Pengaduan</a>
                      @endif
                    @endif
                  </div>
                </div><!-- /.attachment -->
              </div><!-- /.item -->
            @endforeach
          @endif

        </div><!-- /.chat -->
        <div class="box-footer">
          <a href="{{url('lihatpengaduan')}}" class="btn btn-primary pull-right"><i class="fa fa-eye"></i> &nbsp;&nbsp;Lihat Seluruh Pengaduan</a>
        </div>
      </div><!-- /.box (chat box) -->

    </section><!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 col-md-5 connectedSortable">
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
            <div class="col-md-6">
              <div class="chart-responsive">
                <canvas id="pieChart" height="150"></canvas>
              </div><!-- ./chart-responsive -->
            </div><!-- /.col -->
            <div class="col-md-6" style="padding-left:0px">
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
            @if($getmasterskpd->isEmpty())
              <tr>
                <td colspan="5" class="text-muted" style="text-align:center;"><i>Data SKPD tidak tersedia.</i></td>
              </tr>
            @elseif(isset($getmasterskpd))
            @foreach($getmasterskpd as $keyskpd)
              <li>
                <a href="{{url('pengaduanbytopik')}}">
                  {{$keyskpd->nama_skpd}}
                  <span class="pull-right text-red">
                    <b>{{$keyskpd->jumlahpengaduan}}</b>
                  </span>
                </a>
              </li>
            @endforeach
          @endif
          <div class="box-footer">
            <div class="pagination pagination-sm no-margin pull-right">
              {{ $getmasterskpd->links() }}
            </div>
          </div>
          </ul>
        </div><!-- /.footer -->
      </div><!-- /.box -->

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-user"></i> &nbsp;Identitas Pelapor</h3>
          <div class="box-tools pull-right">
            <span class="label label-warning">{{$recordusers}} Pendaftar Baru</span>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
          <ul class="users-list clearfix">
            @foreach($getuser as $key)
              <li>
                @if($key->url_photo == null)
                  <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}"  alt="User Avatar">
                @else
                  <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$key->url_photo) }}" alt="{{$key->nama}}">
                @endif
                <a class="users-list-name" href="{{url('wargaprofile/show', $key->id)}}">{{$key->nama}}</a>
                <span class="users-list-date">{{$key->tgl_lahir}}</span>
              </li>
            @endforeach
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

  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  {{-- <script src="{{ asset('/plugins/jQueryUI/jquery-ui.min.js') }}"></script> --}}
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
  {{-- @if(Session::has('akses'))
    @if(Session::get('akses')=="kesehatan")
      <script src="{{ asset('dist/js/pages/dashboardkesehatan.js') }}"></script>
    @elseif(Session::get('akses')=="pendidikan")
      <script src="{{ asset('dist/js/pages/dashboardpendidikan.js') }}"></script>
    @elseif(Session::get('akses')=="administrator")
      <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
    @endif
  @endif --}}
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('/dist/js/demo.js') }}"></script>
@stop
