@extends('layouts.master')

@section('title')
  <title>Histori Pengaduan - SKPD Pengaduan Online</title>
  <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
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
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Seluruh Data SKPD</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabeluser" class="table table-hover">
            <thead>
              <tr class="bg-yellow">
                <th>No</th>
                <th>SKPD</th>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Jumlah Pengaduan</th>
                <th>Sudah Ditanggapi</th>
                <th>Belum Ditanggapi</th>
                <th>Topik Pengaduan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              	<td>1.</td>
              	<td>SKPD Kesehatan</td>
              	<td>2010</td>
              	<td>Mei</td>
              	<td><span class="pull-center badge bg-purple">31</span></td>
              	<td><span class="pull-center badge bg-aqua">21</span></td>
              	<td><span class="pull-center badge bg-red">10</span></td>
              	<td><span class="pull-center badge bg-navy">5</span></td>
              </tr>
              <tr>
              	<td>2.</td>
              	<td>SPKD Pendidikan</td>
              	<td>2010</td>
              	<td>Mei</td>
              	<td><span class="pull-center badge bg-purple">51</span></td>
              	<td><span class="pull-center badge bg-aqua">31</span></td>
              	<td><span class="pull-center badge bg-red">20</span></td>
              	<td><span class="pull-center badge bg-navy">15</span></td>
              </tr><tr>
              	<td>3.</td>
              	<td>SKPD Perhubungan</td>
              	<td>2010</td>
              	<td>Mei</td>
              	<td><span class="pull-center badge bg-purple">3</span></td>
              	<td><span class="pull-center badge bg-aqua">3</span></td>
              	<td><span class="pull-center badge bg-red">0</span></td>
              	<td><span class="pull-center badge bg-navy">2</span></td>
              </tr>
              <tr>
              	<td>4.</td>
              	<td>SKPD Keuangan</td>
              	<td>2010</td>
              	<td>Mei</td>
              	<td><span class="pull-center badge bg-purple">24</span></td>
              	<td><span class="pull-center badge bg-aqua">19</span></td>
              	<td><span class="pull-center badge bg-red">5</span></td>
              	<td><span class="pull-center badge bg-navy">23</span></td>
              </tr>
              <tr>
              	<td>5.</td>
              	<td>SKPD Perdagangan</td>
              	<td>2010</td>
              	<td>Mei</td>
              	<td><span class="pull-center badge bg-purple">70</span></td>
              	<td><span class="pull-center badge bg-aqua">23</span></td>
              	<td><span class="pull-center badge bg-red">47</span></td>
              	<td><span class="pull-center badge bg-navy">9</span></td>
              </tr>
              <tr>
              	<td>6.</td>
              	<td>SKPD Pertanian</td>
              	<td>2010</td>
              	<td>Mei</td>
              	<td><span class="pull-center badge bg-purple">56</span></td>
              	<td><span class="pull-center badge bg-aqua">45</span></td>
              	<td><span class="pull-center badge bg-red">11</span></td>
              	<td><span class="pull-center badge bg-navy">34</span></td>
              </tr>
              <tr>
              	<td>7.</td>
              	<td>SKPD Perindustrian</td>
              	<td>2010</td>
              	<td>Mei</td>
              	<td><span class="pull-center badge bg-purple">67</span></td>
              	<td><span class="pull-center badge bg-aqua">34</span></td>
              	<td><span class="pull-center badge bg-red">33</span></td>
              	<td><span class="pull-center badge bg-navy">35</span></td>
              </tr>
              <tr>
              	<td>8.</td>
              	<td>SKPD Sosial</td>
              	<td>2010</td>
              	<td>Mei</td>
              	<td><span class="pull-center badge bg-purple">56</span></td>
              	<td><span class="pull-center badge bg-aqua">44</span></td>
              	<td><span class="pull-center badge bg-red">12</span></td>
              	<td><span class="pull-center badge bg-navy">6</span></td>
              </tr>
              <tr>
              	<td>9.</td>
              	<td>SKPD Kebudayaan</td>
              	<td>2010</td>
              	<td>Mei</td>
              	<td><span class="pull-center badge bg-purple">84</span></td>
              	<td><span class="pull-center badge bg-aqua">56</span></td>
              	<td><span class="pull-center badge bg-red">28</span></td>
              	<td><span class="pull-center badge bg-navy">35</span></td>
              </tr>
              <tr>
              	<td>10.</td>
              	<td>SKPD Teknologi</td>
              	<td>2010</td>
              	<td>Mei</td>
              	<td><span class="pull-center badge bg-purple">78</span></td>
              	<td><span class="pull-center badge bg-aqua">34</span></td>
              	<td><span class="pull-center badge bg-red">44</span></td>
              	<td><span class="pull-center badge bg-navy">56</span></td>
              </tr>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->

  </div>   <!-- /.row -->


  <!-- Bootstrap 3.3.5 -->
  <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

  <!-- Bootstrap 3.3.5 -->
  <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- Morris.js charts -->
  <script src="{{ asset('/bootstrap/js/raphael-min.js') }}"></script>
  <script src="{{ asset('/plugins/morris/morris.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('/plugins/knob/jquery.knob.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/app.min.js') }}"></script>

  <script src="{{ asset('dist/js/demo.js')}}"></script>
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <script>
    $(function () {
      $("#tabeluser").DataTable();
    });
  </script>
  <script src="{{ asset('dist/js/pages/historipengaduan.js') }}"></script>
@stop
