@extends('layouts.master')

@section('title')
  <title>Data Pengaduan Berdasarkan Topik</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Seluruh Data Pengaduan
    <small>Pengaduan ditampilkan sesuai dengan topik pengaduan yang dipilih</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li class="active">Lihat Seluruh Pengaduan</li>
  </ol>
@stop

<!-- Modal -->
<div class="modal modal-default fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mutasi Pengaduan Warga</h4>
      </div>
      {{-- {!! Form::model($binddatapengaduan, ['route' => ['detailpengaduan.mutasi', $binddatapengaduan->id], 'method' => "patch", 'class'=>'form-horizontal']) !!} --}}
        <form class="form-horizontal" action="{{ url('detailpengaduan/mutasi') }}" method="post" >
          {!! csrf_field() !!}
        <div>
          <div class="modal-body" style="margin-left:1%; margin-right:1%">
                <div class="form-group">
                  <label>
                    Pesan Mutasi:
                  </label>
                  <textarea name="pesan_mutasi" class="form-control" rows="5" cols="40" placeholder="Tulis pesan anda di sini.."
                  ></textarea>
                </div>

          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>

@section('content')
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-warning">
        <div class="box-header">
          @if(Auth::user()->level == "0")
            @foreach($data['getmasterskpd'] as $key)
              <h3 class="box-title">Seluruh Pengaduan dengan Jenis Pengaduan : {{ $key->nama_skpd }}</h3>
              @break;
            @endforeach
          @elseif(Auth::user()->level == "2")
            @foreach($data['getmasterskpdtopik'] as $key)
              <h3 class="box-title">Seluruh Pengaduan dengan Jenis Pengaduan : {{ $key->nama_topik }}</h3>
              @break;
            @endforeach
          @endif
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabelpengaduan" class="table table-hover">
            <thead>
              <tr class="bg-yellow">
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
              @if(Auth::user()->level == "0")
                <?php $pageget = 1; ?>
                @foreach($data['getmasterskpd'] as $key)
                  <tr>
                    <td>{{ $pageget }}</td>
                    @if($key->flag_anonim == 0)
                      <td>{{ $key->nama }}</td>
                    @else
                      <td>Nama Dirahasiakan</td>
                    @endif
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
                      <a href="{{url('detailpengaduan/show', $key->id_pengaduan)}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='Lihat Data Pengaduan'><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  <?php $pageget++; ?>
                @endforeach
              @elseif(Auth::user()->level == "2")
                <?php $pageget = 1; ?>
                @foreach($data['getmasterskpdtopik'] as $key)
                  <tr>
                    <td>{{ $pageget }}</td>
                    @if($key->flag_anonim == 0)
                      <td>{{ $key->nama }}</td>
                    @else
                      <td>Nama Dirahasiakan</td>
                    @endif
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
                      <a href="{{url('detailpengaduan/show', $key->id_pengaduan)}}" class="btn btn-primary btn-xs btn-flat" data-toggle='tooltip' title='Lihat Data Pengaduan'><i class="fa fa-eye"></i></a>
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
