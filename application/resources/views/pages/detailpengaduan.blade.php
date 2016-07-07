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
              <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary btn-flat" id="set">Proses Mutasi Pengaduan</button>
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
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a href="{{url('detailpengaduan/verifikasi', $binddatapengaduan->id)}}" class="btn btn-primary btn-flat" id="set">Ya, saya yakin.</a>
        </div>
      </div>

    </div>
  </div>

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
      <div class="box box-widget">
        <div class='box-header with-border'>
          <div class='user-block'>
            @if($binddatapengaduan->user->url_photo == null || $binddatapengaduan->flag_anonim==1)
              <img class="img-circle" src="{{ asset('/images/userdefault.png') }}" alt="user image">
            @else
              <img class="img-circle" src="{{ asset('/images/'.$binddatapengaduan->user->url_photo) }}" alt="{{$binddatapengaduan->user->nama}}">
            @endif
            @if($binddatapengaduan->flag_anonim==0)
                <span class='username'><a href="#">{{$binddatapengaduan->user->nama}}</a></span>
            @else
              <span class='username'><a href="#">Nama Dirahasiakan</a></span>
            @endif
            <span class='description'>{{$binddatapengaduan->created_at}} | {{$binddatapengaduan->topik->nama_topik}}</span>
          </div><!-- /.user-block -->
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class='box-body'>
          <!-- post text -->
          {{-- judul pengaduan --}}
          <p><b style="font-size:15px;">{{$binddatapengaduan->judul_pengaduan}}</b></p>

          {{-- isi pengaduan --}}
          <?php echo $binddatapengaduan->isi_pengaduan;?>

          <!-- Attachment -->
          <div class="attachment-block clearfix">
            <b>Data Pendukung</b><br>
            @if($binddatapengaduan->flag_verifikasi==0)
            @endif
            <?php $cekdok="0"; ?>
            @foreach($getdokumen as $dok)
                <?php $cekdok="1"; ?>
                @if($binddatapengaduan->id === $dok->pengaduan_id)
                <a href="{{ asset('\..\documents').'/'.$dok->url_dokumen}}" download="{{$dok->url_dokumen}}" class="link-black text-sm">
                  @if (strpos($dok->url_dokumen, '.pdf'))
                    <img width="3%" src="{{ asset('dist\img\pdf.png') }}" alt="..." class="margin">
                  @elseif(strpos($dok->url_dokumen, '.png'))
                    <img width="3%" src="{{ asset('dist\img\png.png') }}" alt="..." class="margin">
                  @elseif(strpos($dok->url_dokumen, '.jpg'))
                    <img width="3%" src="{{ asset('dist\img\jpg.png') }}" alt="..." class="margin">
                  @elseif(strpos($dok->url_dokumen, '.docx'))
                    <img width="3%" src="{{ asset('dist\img\doc.png') }}" alt="..." class="margin">
                  @elseif(strpos($dok->url_dokumen, '.xlsx'))
                    <img width="3%" src="{{ asset('dist\img\doc.png') }}" alt="..." class="margin">
                  @endif
                </a>
              @endif
            @endforeach
            @if($cekdok=="0")
                Data tidak tersedia.
            @endif
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
              {{-- @foreach($getdokumen as $dok)
                  @if($binddatapengaduan->id === $dok->pengaduan_id)
                    <a href="{{ asset('\..\documents').'/'.$dok->url_dokumen}}" download="{{$dok->url_dokumen}}" class="btn btn-default btn-sm btn-flat">Download Data Pendukung</a>
                  @endif
              @endforeach --}}

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
                  <img class="img-circle img-sm" style="margin-bottom:10px;" src="{{asset('dist/img/logokabtangerang.png')}}" alt="alt text">
                  <span style="margin-left:10px;"><b>
                    @if(Auth::user()->nama!="")
                      {{ Auth::user()->nama }}
                    @else
                      {{ Auth::user()->email }}
                    @endif
                  </b></span>
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
  <script>
    window.setTimeout(function() {
      $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 2000);
  </script>
@stop
