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
      @if(Session::has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
          <p>{{ Session::get('message') }}</p>
        </div>
      @endif
    </div>
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Seluruh Data Pengaduan</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabelpengaduan" class="table table-hover">
            <thead>
              <tr class="bg-yellow">
                <th>#</th>
                <th>Pelapor</th>
                <th>Topik Aduan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status Verifikasi</th>
                <th>Status Aduan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $pageget = 1; ?>
              @if(Auth::user()->level=="0")
                  @foreach($data['getdatapengaduanall'] as $key)
                <tr>
                  <td>{{ $pageget }}</td>
                  @if($key->flag_anonim==0)
                    <td><a href="{{url('wargaprofile/show', $key->iduser)}}">{{ $key->nama }}</a></td>
                  @elseif($key->flag_anonim==1)
                    <td><a href="#">Nama Dirahasiakan</a></td>
                  @endif
                  <td>{{ $key->nama_topik }}</td>
                  <td>
                    {{ \Carbon\Carbon::parse($key->created_at)->format('d-M-y')}}
                  </td>
                  <td>
                    {{ \Carbon\Carbon::parse($key->created_at)->format('H:i:s')}}
                  </td>
                  <td>
                    @if($key->flag_verifikasi==0)
                      <span class="label bg-yellow"><i class="fa fa-exclamation-triangle"></i> &nbsp;Belum Diverifikasi</span>
                    @elseif($key->flag_verifikasi==1)
                      <span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span>
                    @endif
                  </td>
                  <td>
                    @if($key->flag_tanggap==0)
                      <span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Belum Ditanggapi</span>
                    @elseif($key->flag_tanggap==1)
                      <span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Telah Ditanggapi</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{url('detailpengaduan/show', $key->id)}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='Lihat Data Pengaduan'><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
                <?php $pageget++; ?>
              @endforeach
              @elseif(Auth::user()->level=="2")
                @foreach($data['getdatapengaduan'] as $key)
                  <tr>
                    <td>{{ $pageget }}</td>
                    @if($key->flag_anonim==0)
                        <td><a href="{{url('wargaprofile/show', $key->iduser)}}">{{ $key->nama }}</a></td>
                    @elseif($key->flag_anonim==1)
                      <td><a href="#">Nama Dirahasiakan</a></td>
                    @endif
                    <td>{{ $key->nama_topik }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($key->created_at)->format('d-M-y')}}
                    </td>
                    <td>
                      {{ \Carbon\Carbon::parse($key->created_at)->format('H:i:s')}}
                    </td>
                    <td>
                      @if($key->flag_verifikasi==0)
                        <span class="label bg-yellow"><i class="fa fa-exclamation-triangle"></i> &nbsp;Belum Diverifikasi</span>
                      @elseif($key->flag_verifikasi==1)
                        <span class="label bg-teal"><i class="fa fa-check"></i> &nbsp;Telah Diverifikasi</span>
                      @endif
                    </td>
                    <td>
                      @if($key->flag_tanggap==0)
                        <span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Belum Ditanggapi</span>
                      @elseif($key->flag_tanggap==1)
                        <span class="label bg-primary"><i class="fa fa-check"></i> &nbsp;Telah Ditanggapi</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{url('detailpengaduan/show', $key->id)}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='Lihat Data Pengaduan'><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  <?php $pageget++; ?>
                @endforeach
              @endif
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
