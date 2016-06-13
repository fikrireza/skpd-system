@extends('layouts.master')

@section('title')
  @if(isset($data['binddatamutasi']))
      <title>Tanggapi Pengaduan Mutasi</title>
  @else
      <title>Tanggapi Pengaduan</title>
  @endif
@stop

@section('breadcrumb')
  <h1>
    @if(isset($data['binddatamutasi']))
        Tanggapi Pengaduan Mutasi
    @else
        Tanggapi Pengaduan
    @endif
    <small>Jawab Laporan Warga</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    @if(isset($data['binddatamutasi']))
        <li class="active">Tanggapi Pengaduan Mutasi</li>
    @else
        <li class="active">Tanggapi Pengaduan</li>
    @endif
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
    <div class="col-md-5">
      <!-- Horizontal Form -->
      <div class="box box-widget">
        <div class='box-header with-border'>
          <div class='user-block'>
            <img class='img-circle' src='{{asset('dist/img/user1-128x128.jpg')}}' alt='user image'>
            <span class='username'><a href="#">
              @if(isset($data['binddatapengaduan']))
                {{$data['binddatapengaduan']->user->nama}}
              @elseif(isset($data['binddatamutasi']))
                  {{$data['binddatapengaduanmutasi']->user->nama}}
              @else
                Nama Pengaduan
              @endif
            </a></span>
            <span class='description'>
              @if(isset($data['binddatapengaduan']))
                {{$data['binddatapengaduan']->created_at}}
              @elseif(isset($data['binddatamutasi']))
                  {{$data['binddatapengaduanmutasi']->created_at}}
              @else
                Tanggal Pengaduan
              @endif
              |
              @if(isset($data['binddatapengaduan']))
                {{$data['binddatapengaduan']->topik->nama_topik}}
              @elseif(isset($data['binddatamutasi']))
                  {{$data['binddatapengaduanmutasi']->topik->nama_topik}}
              @else
                Topik Pengaduan
              @endif
           </span>
          </div><!-- /.user-block -->
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class='box-body'>
          <!-- post text -->
          <p>
            @if(isset($data['binddatapengaduan']))
              {{$data['binddatapengaduan']->judul_pengaduan}}
            @elseif(isset($data['binddatamutasi']))
                {{$data['binddatapengaduanmutasi']->judul_pengaduan}}
            @else
              Judul Pengaduan
            @endif
          </p>
          <p style="text-align:justify">
            @if(isset($data['binddatapengaduan']))
              {{$data['binddatapengaduan']->isi_pengaduan}}
            @elseif(isset($data['binddatamutasi']))
                {{$data['binddatapengaduanmutasi']->isi_pengaduan}}
            @else
              Isi Pengaduan
            @endif
          </p>
          <!-- Attachment -->
          <div class="attachment-block clearfix">
            <b>Data Pendukung</b><br>
            <i class="text-muted">gambar.jpg</i>
            <div class="pull-right">
              <button class="btn btn-default btn-sm btn-flat">Download Data Pendukung</button>
            </div>
          </div><!-- /.attachment-block -->

        </div><!-- /.box-body -->
        <div class="box-footer">
          @if(isset($data['binddatapengaduan']))
            {!! Form::model($data['binddatapengaduan'], ['route' => ['tanggap.update', $data['binddatapengaduan']->id], 'method' => "patch", 'class'=>'form-horizontal']) !!}
          @elseif(isset($data['binddatamutasi']))
              <form class="form-horizontal" method="post" action="{{url('tanggap')}}">
          @else
            <form class="form-horizontal" method="post" action="#">
          @endif
            {!! csrf_field() !!}
            <img class="img-responsive img-circle img-sm" src="{{asset('dist/img/logokabtangerang.png')}}" alt="alt text">
            <!-- .img-push is used to add margin to elements next to floating images -->
            <div class="img-push">
              <input
                @if(isset($data['binddatapengaduan']))
                  value="{{$data['binddatapengaduan']->id}}"
                @elseif(isset($data['binddatamutasi']))
                  value="{{$data['binddatamutasi']->id_pengaduan}}"
                @endif
                type="hidden" name="id" class="form-control" readonly="true"
                @if(!$errors->has('id'))
                 value="{{ old('id') }}"
                @endif
              >
              <br>
              @if(isset($data['binddatamutasi']))
                <h4><span class="label bg-green">Data Mutasi dari SKPD
                    @foreach($data['getmutasi'] as $key)
                      {{$key->nama_skpd}}</span></h4>
                    @endforeach
                <textarea name="tanggapanmutasi" readonly="true" class="form-control" rows="5" cols="40" style="border:1px solid #00a65a;margin-top:5px;">{{$data['binddatamutasi']->pesan_mutasi}}</textarea>
              @endif
              <br>
                <textarea name="tanggapan" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini.."
                @if($errors->has('tanggapan'))
                 style="border:1px solid #DD4B39;margin-top:5px;"
                @endif>
                </textarea>
              {{-- @else
                <textarea name="tanggapan" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini..">  {{$data['binddatatanggapan']->tanggapan}}</textarea> --}}
                @if($errors->has('tanggapan'))
                 <span class="help-block">
                   <strong>{{ $errors->first('tanggapan')}}
                   </strong>
                 </span>
                @endif
            <div class="footer pull-right" style="padding-top:5px;">
                @if(isset($data['binddatapengaduan']))
                    <button class="btn btn-primary btn-sm btn-flat">Kirim Tanggapan</button>
                @elseif(isset($data['binddatamutasi']))
                   <button class="btn btn-primary btn-sm btn-flat">Kirim Tanggapan</button>
                @else
                    <button class="btn btn-primary btn-sm btn-flat" disabled="true">Kirim Tanggapan</button>
                @endif
              </div>
            </div>
          </form>
        </div><!-- /.box-footer -->
      </div><!-- /.box -->
    </div><!--/.col -->

    <div class="col-md-7">
      <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          @if(isset($data['binddatapengaduanmutasi']))
            <li><a href="#tab_1" data-toggle="tab">Data Belum Ditanggapi&nbsp;&nbsp; <span class="pull-right badge bg-blue">{{$data['getdatapengaduan']->count('nama')}}</a></li>
            <li class="active"><a href="#tab_2" data-toggle="tab">Data Mutasi&nbsp;&nbsp; <span class="pull-right badge bg-blue">{{$data['getmutasi']->count('nama')}}</a></li>
          @else
            <li class="active"><a href="#tab_1" data-toggle="tab">
              Data Belum Ditanggapi&nbsp;&nbsp; <span class="pull-right badge bg-blue">{{$data['getdatapengaduan']->count('nama')}}</span></a></li>
            <li><a href="#tab_2" data-toggle="tab">Data Mutasi&nbsp;&nbsp; <span class="pull-right badge bg-blue">{{$data['getmutasi']->count('nama')}}</a></li>
          @endif
        </ul>
        <div class="tab-content">
          @if(isset($data['binddatapengaduanmutasi']))
            <div class="tab-pane" id="tab_1">
          @else
            <div class="tab-pane active" id="tab_1">
          @endif
              <div class="box-body no-padding">
                <table class="table">
                  <tr class="bg-green">
                    <th style="width:10px;">#</th>
                    <th>Pelapor</th>
                    <th>Kategori</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Aksi</th>
                  </tr>
                  <?php
                    $no;
                    if($data['getdatapengaduan']->currentPage()==1)
                      $no = 1;
                    else
                      $no = (($data['getdatapengaduan']->currentPage() - 1) * $data['getdatapengaduan']->perPage())+1;
                    ?>
                  @if($data['getdatapengaduan']->isEmpty())
                    <tr>
                      <td colspan="5" class="text-muted" style="text-align:center;"><i>Data Pengaduan tidak tersedia.</i></td>
                    </tr>
                  @elseif(isset($data['getdatapengaduan']))
                    @foreach($data['getdatapengaduan'] as $key)
                      <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $key->nama }}</td>
                        <td>{{ $key->nama_topik }}</td>
                        <td>{{ $key->created_at }}</td>
                        <td>
                          @if($key->flag_tanggap==0)
                            <a class="btn btn-xs btn-warning" href="{{ route('tanggap.edit', $key->id) }}"><i class="fa fa-exclamation-triangle"></i> &nbsp;Lihat Pengaduan</a></td>
                          @endif
                      </tr>
                      <?php $no++; ?>
                    @endforeach
                  @endif
                </table>
              </div>
              <div class="box-footer">
                <div class="pagination pagination-sm no-margin pull-right">
                  {{ $data['getdatapengaduan']->links() }}
                </div>
              </div>
          </div>
          <!-- /.tab-pane -->
          @if(isset($data['binddatapengaduanmutasi']))
            <div class="tab-pane active" id="tab_2">
          @else
            <div class="tab-pane" id="tab_2">
          @endif
            <div class="box-body no-padding">
              <table class="table">
                <tr class="bg-green">
                  <th style="width:10px;">#</th>
                  <th>Pelapor</th>
                  <th>Kategori</th>
                  <th>Tanggal Mutasi</th>
                  <th>SKPD Mutasi</th>
                  <th>Aksi</th>
                </tr>
                <?php
                  $no;
                  if($data['getmutasi']->currentPage()==1)
                    $no = 1;
                  else
                    $no = (($data['getmutasi']->currentPage() - 1) * $data['getmutasi']->perPage())+1;
                  ?>
                @if($data['getmutasi']->isEmpty())
                  <tr>
                    <td colspan="5" class="text-muted" style="text-align:center;"><i>Data Mutasi tidak tersedia.</i></td>
                  </tr>
                @elseif(isset($data['getmutasi']))
                  @foreach($data['getmutasi'] as $key)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $key->nama }}</td>
                      <td>{{ $key->nama_topik }}</td>
                      <td>{{ $key->created_at }}</td>
                      <td>{{ $key->nama_skpd }}</td>
                      <td>
                        @if($key->flag_tanggap==0)
                          <a class="btn btn-xs btn-warning" href="{{ route('tanggap.show', $key->id) }}"><i class="fa fa-exclamation-triangle"></i> &nbsp;Lihat Mutasi</a></td>
                        @endif
                    </tr>
                    <?php $no++; ?>
                  @endforeach
                @endif
              </table>
            </div>
            <div class="box-footer">
              <div class="pagination pagination-sm no-margin pull-right">
                {{ $data['getmutasi']->links() }}
              </div>
            </div>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- nav-tabs-custom -->
    </div>

    <div class="col-md-7">

    </div>
  </div>   <!-- /.row -->


  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>

  <script type="text/javascript">
    $(function(){
      $('a.hapus').click(function(){
        var a = $(this).data('value');
        $('#set').attr('href', "{{ url('/') }}/masterjabatan/hapusjabatan/"+a);
      });
    });
  </script>
 <script>
   window.setTimeout(function() {
     $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove();
     });
   }, 2000);
 </script>
@stop
