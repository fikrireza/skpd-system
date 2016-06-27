@extends('layouts.master')

@section('title')
  <title>Histori Pengaduan - SIMPEDU</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
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
    <section class="col-lg-8 col-md-8 connectedSortable">
      <div class="box box-warning">
         <div class="box-header with-border">
           <h3 class="box-title"><i class="fa fa-area-chart"></i> Jumlah Pengaduan Warga</h3>
         </div>
         <div class="box-body chart-responsive">
           <div class="chart" id="pengaduan-warga-bulan" style="height: 365px;"></div>
           <ul class="nav nav-pills tahun">
            <li class="active"><a href="#" year='semua'>Semua</a></li>
            <li class="#"><a href="#" year='2016'>2016</a></li>
            <li><a href="#" year='2017'>2017</a></li>
          </ul>
         </div>
         <!-- /.box-body -->
       </div>
    </section>
    <div class="col-md-4 col-md-4">
      <div class="small-box bg-purple">
        <div class="inner">
          <h3>{{ $pengaduan }}</h3>
          <p>Jumlah Pengaduan</p>
        </div>
        <div class="icon">
          <i class="ion ion-speakerphone"></i>
        </div>
        <div class="small-box-footer"></div>
      </div>
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $ditanggapi}}</h3>
          <p>Sudah Ditanggapi</p>
        </div>
        <div class="icon">
          <i class="fa fa-smile-o"></i>
        </div>
        <div class="small-box-footer"></div>
      </div>
      <div class="small-box bg-red">
        <div class="inner">
          <h3> {{ $blmtanggapi}}</h3>
          <p>Belum Ditanggapi</p>
        </div>
        <div class="icon">
          <i class="fa fa-meh-o"></i>
        </div>
        <div class="small-box-footer"></div>
      </div>
    </div>
  </div><!-- /.row (main row) -->


  <!-- Bootstrap 3.3.5 -->
  <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('/plugins/knob/jquery.knob.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/app.min.js') }}"></script>

  <!-- Morris.js charts -->
  <script src="{{ asset('bootstrap/js/raphael-min.js')}}"></script>
  <script src="{{ asset('plugins/morris/morris.min.js')}}"></script>

  <script src="{{ asset('dist/js/demo.js')}}"></script>
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

  <script>
    $(function () {
      $("#tabeluser").DataTable();
    });
  </script>

  <script>
  $(function() {
    function requestData(years, chart){
      $.ajax({
        type: "GET",
        url: "{{url('admin/historipengaduan/charts/api')}}", //url get ajax
        data: { years: years }
      })
      .done(function( data ) {
        chart.setData(JSON.parse(data));
      })
      .fail(function() {
        alert( "error parsing" );
      });
    }
    var chart = Morris.Bar({
      element: 'pengaduan-warga-bulan',
      data: [0,0,0],
      xkey: 'filters',
      ykeys: ['jumlah_pengaduan', 'jumlah_tanggap', 'jumlah_blm_tanggap'],
      labels: ['Pengaduan', 'Sudah Dianggapi', 'Belum Ditanggapi'],
      barColors: ["#605ca8", "#00c0ef", "#dd4b39"],
    });

    requestData('semua', chart);
    $('ul.tahun a').click(function(e){
      e.preventDefault();

      var el = $(this);
      years = el.attr('year');

      requestData(years, chart);

      el.parent().addClass('active');
      el.parent().siblings().removeClass('active');
    })
  });
  </script>
@stop
