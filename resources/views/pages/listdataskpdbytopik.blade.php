@extends('layouts.master')

@section('title')
  <title>Lihat Seluruh SKPD</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Lihat Seluruh SKPD Berdasarkan Topik Pengaduan
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
  </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Seluruh Data SKPD Terkait</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabelpengaduan" class="table table-hover">
            <thead>
              <tr class="bg-green">
                <th>No</th>
                <th>Kode SKPD</th>
                <th>Nama SKPD</th>
                <th>Status SKPD</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td>SKPD001</td>
                <td>SPKD Kesehatan</td>
                <td><span class="pull-center badge bg-green">Aktif</span></td>
                <td>24 April 2016</td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <tr>
                <td>2.</td>
                <td>SKPD002</td>
                <td>SPKD Perhubungan</td>
                <td><span class="pull-center badge">Tidak Aktif</span></td>
                <td>24 Januari 2016</td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->

  </div>   <!-- /.row -->


  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>

  <script>
    $(function () {
      $("#tabelpengaduan").DataTable();
    });
  </script>
@stop
