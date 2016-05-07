@extends('layouts.master')

@section('title')
  <title>Seluruh Data Pendaftar</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Daftar Pelapor
    <small>Berikut adalah data warga kabupaten tangerang yang telah terdaftar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li class="active">Lihat Profil Seluruh Identitas Pelapor</li>
  </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Seluruh Identitas Pelapor</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabelpengaduan" class="table table-hover">
            <thead>
              <tr class="bg-blue">
                <th>#</th>
                <th>Nama Pelapor</th>
                <th>Jumlah Aduan</th>
                <th>Tanggal Terdaftar</th>
                <th>Terakhir Login</th>
                <th>Status Akun</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Bambang Pamungkis</td>
                <td><span class="badge bg-blue">6</span></td>
                <td>24 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Amanda Satyarini</td>
                <td><span class="badge bg-blue">9</span></td>
                <td>25 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Tidak Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Brenda Marsalia</td>
                <td><span class="badge bg-blue">5</span></td>
                <td>26 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Bambang Pamungkis</td>
                <td><span class="badge bg-blue">8</span></td>
                <td>24 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td>Amanda Satyarini</td>
                <td><span class="badge bg-blue">12</span></td>
                <td>25 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Tidak Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td>Brenda Marsalia</td>
                <td><span class="badge bg-blue">6</span></td>
                <td>26 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>7</td>
                <td>Bambang Pamungkis</td>
                <td><span class="badge bg-blue">3</span></td>
                <td>24 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>8</td>
                <td>Amanda Satyarini</td>
                <td><span class="badge bg-blue">9</span></td>
                <td>25 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Tidak Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Brenda Marsalia</td>
                <td><span class="badge bg-blue">1</span></td>
                <td>26 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Tidak Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>10</td>
                <td>Bambang Pamungkis</td>
                <td><span class="badge bg-blue">2</span></td>
                <td>24 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>11</td>
                <td>Amanda Satyarini</td>
                <td><span class="badge bg-blue">5</span></td>
                <td>25 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Tidak Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
                </td>
              </tr>
              <tr>
                <td>12</td>
                <td>Brenda Marsalia</td>
                <td><span class="badge bg-blue">45</span></td>
                <td>26 April 2016</td>
                <td>24 April 2016</td>
                <td><span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Aktif</span></td>
                <td>
                  <a href="{{url('wargaprofile')}}" class="btn btn-xs btn-success">Lihat Profil</a>
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
