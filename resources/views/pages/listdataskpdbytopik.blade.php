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
                <th>Jumlah Pengaduan</th>
                <th>Jumlah Aduan Terproses</th>
                <th>Status SKPD</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td>SKPD001</td>
                <td>SPKD Kesehatan</td>
                <td><span class="pull-center badge bg-maroon">30</span></td>
                <td><span class="pull-center badge bg-red">20 %</span></td>
                <td><span class="pull-center badge bg-green">Aktif</span></td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <tr>
                <td>2.</td>
                <td>SKPD002</td>
                <td>SPKD Pendidikan</td>
                <td><span class="pull-center badge bg-maroon">6</span></td>
                <td><span class="pull-center badge bg-red">5 %</span></td>
                <td><span class="pull-center badge">Tidak Aktif</span></td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <tr>
                <td>3.</td>
                <td>SKPD003</td>
                <td>SPKD Perhubungan</td>
                <td><span class="pull-center badge bg-maroon">34</span></td>
                <td><span class="pull-center badge bg-yellow">45 %</span></td>
                <td><span class="pull-center badge">Tidak Aktif</span></td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <tr>
                <td>4.</td>
                <td>SKPD004</td>
                <td>SPKD Keuangan</td>
                <td><span class="pull-center badge bg-maroon">42</span></td>
                <td><span class="pull-center badge bg-blue">67 %</span></td>
                <td><span class="pull-center badge">Tidak Aktif</span></td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <tr>
                <td>5.</td>
                <td>SKPD005</td>
                <td>SPKD Perdagangan</td>
                <td><span class="pull-center badge bg-maroon">21</span></td>
                <td><span class="pull-center badge bg-yellow">34 %</span></td>
                <td><span class="pull-center badge">Tidak Aktif</span></td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <tr>
                <td>6.</td>
                <td>SKPD006</td>
                <td>SPKD Pertanian</td>
                <td><span class="pull-center badge bg-maroon">89</span></td>
                <td><span class="pull-center badge bg-yellow">34 %</span></td>
                <td><span class="pull-center badge bg-green">Aktif</span></td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <tr>
                <td>7.</td>
                <td>SKPD007</td>
                <td>SPKD Perindustrian</td>
                <td><span class="pull-center badge bg-maroon">45</span></td>
                <td><span class="pull-center badge bg-yellow">23 %</span></td>
                <td><span class="pull-center badge bg-green">Aktif</span></td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <tr>
                <td>8.</td>
                <td>SKPD008</td>
                <td>SPKD Sosial</td>
                <td><span class="pull-center badge bg-maroon">4</span></td>
                <td><span class="pull-center badge bg-green">98 %</span></td>
                <td><span class="pull-center badge">Tidak Aktif</span></td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <tr>
                <td>9.</td>
                <td>SKPD009</td>
                <td>SPKD Kebudayaan</td>
                <td><span class="pull-center badge bg-maroon">48</span></td>
                <td><span class="pull-center badge bg-red">18 %</span></td>
                <td><span class="pull-center badge">Tidak Aktif</span></td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <tr>
                <td>10.</td>
                <td>SKPD0010</td>
                <td>SPKD Teknologi</td>
                <td><span class="pull-center badge bg-maroon">53</span></td>
                <td><span class="pull-center badge bg-blue">50 %</span</td>
                <td><span class="pull-center badge">Tidak Aktif</span></td>
                <td>
                  <a href="{{url('topikbyskpd')}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='View Data'><i class="fa fa-eye"></i></a>
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
