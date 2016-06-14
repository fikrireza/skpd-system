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
          <h3 class="box-title">Seluruh Data Pengaduan Untuk SKPD Kesehatan</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabelpengaduan" class="table table-hover">
            <thead>
              <tr class="bg-green">
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
                  <td><a href="{{url('wargaprofile/show', $key->iduser)}}">{{ $key->nama }}</a></td>
                  <td>{{ $key->nama_topik }}</td>
                  <td>
                    <?php
                      $date = $key->created_at;
                      $justdate = substr($date, 0, 10);
                      $explode = explode("-", $justdate);
                      echo $explode[2]."-".$explode[1]."-".$explode[0];
                    ?>
                  </td>
                  <td>
                    <?php
                      $justtime = substr($date, 12);
                      echo $justtime;
                    ?>
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
                    <a href="{{url('detailpengaduan/show', $key->id)}}" class="btn btn-xs btn-success">Lihat</a>
                  </td>
                </tr>
                <?php $pageget++; ?>
              @endforeach
              @elseif(Auth::user()->level=="2")
              @foreach($data['getdatapengaduan'] as $key)
                <tr>
                  <td>{{ $pageget }}</td>
                  <td><a href="{{url('wargaprofile/show', $key->iduser)}}">{{ $key->nama }}</a></td>
                  <td>{{ $key->nama_topik }}</td>
                  <td>
                    <?php
                      $date = $key->created_at;
                      $justdate = substr($date, 0, 10);
                      $explode = explode("-", $justdate);
                      echo $explode[2]."-".$explode[1]."-".$explode[0];
                    ?>
                  </td>
                  <td>
                    <?php
                      $justtime = substr($date, 12);
                      echo $justtime;
                    ?>
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
                    <a href="{{url('detailpengaduan/show', $key->id)}}" class="btn btn-xs btn-success">Lihat</a>
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
