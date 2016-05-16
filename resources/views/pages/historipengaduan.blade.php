@extends('layouts.master')

@section('title')
  <title>Histori Pengaduan - SKPD Pengaduan Online</title>
  <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
@stop

@section('breadcrumb')
  <h1>
      Histori Pengaduan
    <small>Data Statistik</small>
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
  </ol>
@stop

@section('content')


  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-8 connectedSortable">
      <div class="box box-warning">
         <div class="box-header with-border">
           <h3 class="box-title"><i class="fa fa-area-chart"></i> Jumlah Pengaduan Warga Setiap Tahun</h3>

           <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
             </button>
             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
           </div>
         </div>
         <div class="box-body chart-responsive">
           <div class="chart" id="pengaduan-warga-tahun" style="height: 365px;"></div>
         </div>
         <!-- /.box-body -->
       </div>
    </section>
    <div class="col-md-4">
      <div class="small-box bg-purple">
        <div class="inner">
          <h3>1217</h3>
          <p>Jumlah Pengaduan</p>
        </div>
        <div class="icon">
          <i class="ion ion-speakerphone"></i>
        </div>
        <a href="{{url('listhistoripengaduanall')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>1044</h3>
          <p>Sudah Ditanggapi</p>
        </div>
        <div class="icon">
          <i class="fa fa-smile-o"></i>
        </div>
        <a href="{{url('listhistoripengaduanall')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <div class="small-box bg-red">
        <div class="inner">
          <h3>173</h3>
          <p>Belum Ditanggapi</p>
        </div>
        <div class="icon">
          <i class="fa fa-meh-o"></i>
        </div>
        <a href="{{url('listhistoripengaduanall')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div><!-- /.row (main row) -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-6 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="box box-warning">
         <div class="box-header with-border">
           <h3 class="box-title"><i class="fa fa-area-chart"></i> Jumlah Pengaduan Per SKPD (Belum Ditanggapi)</h3>

           <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
             </button>
             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
           </div>
         </div>
         <div class="box-body chart-responsive">
           <div class="chart tab-pane active" id="pengaduan-warga-SKPD-Belum-Ditanggapi" style="position: relative; height: 300px;"></div>
         </div>
         <!-- /.box-body -->
       </div>
    </section>
    <section class="col-lg-6 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="box box-warning">
         <div class="box-header with-border">
           <h3 class="box-title"><i class="fa fa-area-chart"></i> Jumlah Pengaduan Per SKPD (Sudah Ditanggapi)</h3>

           <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
             </button>
             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
           </div>
         </div>
         <div class="box-body chart-responsive">
           <div class="chart tab-pane active" id="pengaduan-warga-SKPD-Sudah-Ditanggapi" style="position: relative; height: 300px;"></div>
         </div>
         <!-- /.box-body -->
       </div>
    </section>
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
  <script src="{{ asset('dist/js/pages/historipengaduan.js') }}"></script>
@stop
