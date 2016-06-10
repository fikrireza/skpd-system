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
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Seluruh Identitas Pelapor</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabelpengaduan" class="table table-hover">
            <thead>
              <tr class="bg-green">
                <th>#</th>
                <th>Nama Pelapor</th>
                <th>Tanggal Terdaftar</th>
                <th>Terakhir Login</th>
                <th>Jumlah Aduan</th>
                <th>Jumlah Login</th>
                <th>Status Akun</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $pageget = 1; ?>
              @foreach($getdatawarga as $key)
                <tr>
                  <td>{{ $pageget }}</td>
                  <td>{{ $key->nama }}</td>
                  <td>{{ $key->created_at }}</td>
                  <td>{{ $key->updated_at }}</td>
                  <td><span class="badge bg-blue">{{ $key->login_counter }}</span></td>
                  <td><span class="badge bg-maroon">{{ $key->login_counter }}</span></td>
                  <td>
                  @if($key->flag_user==0)
                    <span class="label bg-red"><i class="fa fa-remove"></i> &nbsp;Tidak Aktif</span>
                  @elseif($key->flag_user==1)
                    <span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Aktif</span>
                  @endif</td>
                  <td>
                    <a href="{{url('wargaprofile', $key->id)}}" class="btn btn-xs btn-success">Lihat Profil</a>
                  </td>
                </tr>
                <?php $pageget++; ?>
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
