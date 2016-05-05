@extends('layouts.master')

@section('title')
  <title>Lihat Seluruh Pengaduan</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Lihat Seluruh Pengaduan
    <small>Pengaduan ditampilkan sesuai dengan SKPD terkait</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li class="active">Lihat Seluruh Pengaduan</li>
  </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Seluruh Data Pengaduan Untuk SKPD Terkait</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabelpengaduan" class="table table-hover">
            <thead>
              <tr class="bg-green">
                <th>#</th>
                <th>Pelapor</th>
                <th>Topik Aduan</th>
                <th>Tanggal</th>
                <th>Status Verifikasi</th>
                <th>Status Aduan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Bambang Pamungkis</td>
                <td>E-KTP &amp; KK</td>
                <td>24 April 2016</td>
                <td><span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span></td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Telah Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Amanda Satyarini</td>
                <td>Perizinan</td>
                <td>25 April 2016</td>
                <td><span class="label bg-yellow"><i class="fa fa-exclamation-triangle"></i> &nbsp;Belum Diverifikasi</span></td>
                <td><span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Belum Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Brenda Marsalia</td>
                <td>Pendidikan</td>
                <td>26 April 2016</td>
                <td><span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span></td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Telah Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Bambang Pamungkis</td>
                <td>E-KTP &amp; KK</td>
                <td>24 April 2016</td>
                <td><span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span></td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Telah Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td>Amanda Satyarini</td>
                <td>Perizinan</td>
                <td>25 April 2016</td>
                <td><span class="label bg-yellow"><i class="fa fa-exclamation-triangle"></i> &nbsp;Belum Diverifikasi</span></td>
                <td><span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Belum Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td>Brenda Marsalia</td>
                <td>Pendidikan</td>
                <td>26 April 2016</td>
                <td><span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span></td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Telah Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>7</td>
                <td>Bambang Pamungkis</td>
                <td>E-KTP &amp; KK</td>
                <td>24 April 2016</td>
                <td><span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span></td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Telah Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>8</td>
                <td>Amanda Satyarini</td>
                <td>Perizinan</td>
                <td>25 April 2016</td>
                <td><span class="label bg-yellow"><i class="fa fa-exclamation-triangle"></i> &nbsp;Belum Diverifikasi</span></td>
                <td><span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Belum Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Brenda Marsalia</td>
                <td>Pendidikan</td>
                <td>26 April 2016</td>
                <td><span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span></td>
                <td><span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Belum Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>10</td>
                <td>Bambang Pamungkis</td>
                <td>E-KTP &amp; KK</td>
                <td>24 April 2016</td>
                <td><span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span></td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Telah Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>11</td>
                <td>Amanda Satyarini</td>
                <td>Perizinan</td>
                <td>25 April 2016</td>
                <td><span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span></td>
                <td><span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Belum Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
                </td>
              </tr>
              <tr>
                <td>12</td>
                <td>Brenda Marsalia</td>
                <td>Pendidikan</td>
                <td>26 April 2016</td>
                <td><span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span></td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Telah Ditanggapi</span></td>
                <td>
                  <a href="{{url('detailpengaduan')}}" class="btn btn-xs btn-success">Lihat</a>
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
