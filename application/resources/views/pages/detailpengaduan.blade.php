@extends('layouts.master')

@section('title')
  <title>Detail Pengaduan</title>
  <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Detail Pengaduan
    @if($binddatapengaduan->flag_tanggap==1)
      <small>Silahkan lihat pengaduan berikut</small>
    @else
      <small>Silahkan tanggapi pengaduan berikut</small>
    @endif
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="{{url('lihatpengaduan')}}">Lihat Seluruh Pengaduan</a></li>
    <li class="active">Detail Pengaduan</li>
  </ol>
@stop

@section('content')

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
                    <input value="{{$binddatapengaduan->id}}"
                      type="hidden" name="id" class="form-control" readonly="true">
                  </div>
                  <div class="form-group">
                    <label>
                      Pilih Topik :
                    </label>
                    <select class="form-control select2" name="id_topik" style="width: 100%;">
                      <option selected="selected"></option>
                      @foreach($gettopik as $key)
                        <option value="{{ $key->id }}">{{ $key->kode_topik }} - {{ $key->nama_topik }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>
                      Pesan Mutasi:
                    </label>
                    <textarea name="pesan_mutasi" class="form-control" rows="5" cols="40" placeholder="Tulis pesan anda di sini.."
                    ></textarea>
                  </div>

            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" id="set">Proses Mutasi Pengaduan</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  <div class="modal modal-default fade" id="myModalVerifikasi" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi Verifikasi Pengaduan</h4>
        </div>
        <div class="modal-body">
          Apakah anda yakin telah melakukan verifikasi terhadap pengaduan ini?
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
          <a href="{{url('detailpengaduan/verifikasi', $binddatapengaduan->id)}}" class="btn btn-primary" id="set">Ya, saya yakin.</a>
        </div>
      </div>

    </div>
  </div>

  <div class="row">

    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-widget">
        <div class='box-header with-border'>
          <div class='user-block'>
            <img class='img-circle' src='{{asset('dist/img/user1-128x128.jpg')}}' alt='user image'>
            <span class='username'><a href="#">{{$binddatapengaduan->user->nama}}</a></span>
            <span class='description'>{{$binddatapengaduan->created_at}} | {{$binddatapengaduan->topik->nama_topik}}</span>
          </div><!-- /.user-block -->
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class='box-body'>
          <!-- post text -->
          <p>{{$binddatapengaduan->judul_pengaduan}}</p>
          <p>{{$binddatapengaduan->isi_pengaduan}}</p>


          <!-- Attachment -->
          <div class="attachment-block clearfix">
            <b>Data Pendukung</b><br>
            <i class="text-muted">gambar.jpg</i>
            <div class="pull-right">
              {{-- button dibawah cuma buat user skpd cuuuy, akses admin ga bisa --}}
              @if(Auth::user()->level=="2")
                @if($binddatapengaduan->flag_verifikasi==1)
                  <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#myModalVerifikasi" disabled="true">Verifikasi Pengaduan</button>
                  <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#myModal" disabled="true">Mutasi Pengaduan Ini</button>
                @else
                  <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#myModalVerifikasi" >Verifikasi Pengaduan</button>
                  <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#myModal" >Mutasi Pengaduan Ini</button>
                @endif
              @endif

              {{-- button download, user skpd sama admin bisa pake --}}
              <button class="btn btn-default btn-sm btn-flat">Download Data Pendukung</button>
            </div>
          </div><!-- /.attachment-block -->

          {{-- kalo udah di tanggapi, maka muncul box dibawah nih. dan box menanggapi bakal ilang --}}
          @if($binddatapengaduan->flag_tanggap==1)
            <div class='box-footer box-comments' style="border:1px solid #00a65a;">
              <div style="padding-bottom:5px;">
                <b>Tanggapan</b>
              </div>
              <div class='box-comment'>
                <!-- User image -->
                <img class='img-circle img-sm' src='{{asset('dist/img/logokabtangerang.png')}}' alt='user image'>
                <div class='comment-text'>
                  <span class="username">
                      @foreach($tanggapanall as $gettanggapanall)
                        {{$gettanggapanall->nama}}
                        <span class='text-muted pull-right'>{{$gettanggapanall->created_tanggpan
                        }}</span>
                        </span><!-- /.username -->
                        {{$gettanggapanall->tanggapan}}
                      @endforeach
                </div><!-- /.comment-text -->
              </div><!-- /.box-comment -->
            </div>
          @endif

          {{-- kalo belum ditanggapi, untuk user skpd bisa langsung nanggapi pake box dibawah cuy. admin gak bisa nanggapin ya. --}}
          @if(Auth::user()->level=="2")
            @if($binddatapengaduan->flag_tanggap==0)
              <div class="box-footer">
                {!! Form::model($binddatapengaduan, ['route' => ['detailpengaduan.update', $binddatapengaduan->id], 'method' => "patch", 'class'=>'form-horizontal']) !!}
                  {{-- {!! Form::model($binddatapengaduan, ['route' => ['detailpengaduan.store', $binddatapengaduan->id], 'method' => "patch", 'class'=>'form-horizontal']) !!} --}}
                  {!! csrf_field() !!}
                  <img class="img-responsive img-circle img-sm" src="{{asset('dist/img/logokabtangerang.png')}}" alt="alt text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <input
                    @if(isset($binddatapengaduan))
                      value="{{$binddatapengaduan->id}}"
                    @endif
                    type="hidden" name="id" class="form-control" readonly="true"
                    @if(!$errors->has('id'))
                     value="{{ old('id') }}"
                    @endif
                  >
                  <div class="img-push">
                    <textarea name="tanggapan" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini.."
                    @if($errors->has('tanggapan'))
                     style="border:1px solid #DD4B39;margin-top:5px;"
                    @endif
                    ></textarea>
                    @if($errors->has('tanggapan'))
                     <span class="help-block">
                       <strong>{{ $errors->first('tanggapan')}}
                       </strong>
                     </span>
                    @endif
                    <div class="footer pull-right" style="padding-top:5px;">
                      <button class="btn btn-primary btn-sm btn-flat">Kirim Tanggapan</button>
                    </div>
                  </div>
                </form>
              </div><!-- /.box-footer -->
            @endif
          @endif


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
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
  <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".select2").select2();
    });
  </script>
@stop
