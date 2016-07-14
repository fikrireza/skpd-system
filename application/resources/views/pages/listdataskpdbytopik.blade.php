@extends('layouts.master')

@section('title')
  <title>Lihat Seluruh SKPD</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Lihat Seluruh SKPD Berdasarkan Pengaduan
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
  </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Seluruh Data SKPD Terkait</h3>
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              Download <span class="caret"></span>
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ URL::to('admin/listdataskpdbytopik/pdf') }}">PDF</a></li>
              <li><a href="{{ URL::to('admin/listdataskpdbytopik/xlsx') }}">Excel</a></li>
            </ul>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabelpengaduan" class="table table-hover">
            <thead>
              <tr class="bg-yellow">
                <th>No</th>
                <th>Kode SKPD</th>
                <th>Nama SKPD</th>
                <th>Jumlah Topik Aduan</th>
                <th>Status SKPD</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach($getskpd as $key)
                <tr>
                  <td>{{ $no }}.</td>
                  <td>{{ $key->kode_skpd }}</td>
                  <td>{{ $key->nama_skpd }}</td>
                  <td><span class="pull-center badge bg-maroon">{{ $key->jumlahpengaduan }}</span></td>
                  <td>
                    @if($key->flag_skpd=="1")
                      <span class="pull-center badge bg-green">Aktif</span>
                    @else
                      <span class="pull-center badge bg-grey">Tidak Aktif</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{url('topikbyskpd/').'/'.$key->id}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='Lihat Data SKPD'><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
                <?php $no++; ?>
              @endforeach
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
