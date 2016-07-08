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
      @if(isset($data['binddatapengaduan']))
        @if($data['binddatapengaduan'])
          <div class="box box-widget">
            <div class='box-header with-border'>
              <div class='user-block'>
                  @if(isset($data['binddatapengaduan']))
                    @if($data['binddatapengaduan']->user->url_photo == null || $data['binddatapengaduan']->flag_anonim==1)
                      <img class="img-circle" src="{{ asset('/images/userdefault.png') }}" alt="user image">
                    @else
                      <img class="img-circle" src="{{ asset('/images/'.$data['binddatapengaduan']->user->url_photo) }}" alt="{{$data['binddatapengaduan']->user->nama}}">
                    @endif
                  @else
                      <img class="img-circle" src="{{ asset('/images/userdefault.png') }}" alt="user image">
                  @endif
                <span class='username'><a href="#">
                  @if(isset($data['binddatapengaduan']))
                    @if($data['binddatapengaduan']->flag_anonim==0)
                      {{$data['binddatapengaduan']->user->nama}}
                    @else
                      Nama Dirahasiakan
                    @endif
                  @endif
                </a></span>
                <span class='description'>
                  @if(isset($data['binddatapengaduan']))
                    {{ \Carbon\Carbon::parse($data['binddatapengaduan']->created_at)->format('d-M-y H:i:s')}}
                  @endif
                  |
                  @if(isset($data['binddatapengaduan']))
                    {{$data['binddatapengaduan']->topik->nama_topik}}
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
                  <b>{{$data['binddatapengaduan']->judul_pengaduan}}</b>
                @endif
              </p>
              <p style="text-align:justify">
                @if(isset($data['binddatapengaduan']))
                  <?php echo $data['binddatapengaduan']->isi_pengaduan ?>
                @endif
              </p>
              <!-- Attachment -->
              @if($data['getdokumen'] != null)
                @if(isset($data['binddatapengaduan']))
                  <div class="attachment-block clearfix">
                    <b>Data Pendukung</b><br>
                      {{-- <i class="text-muted">{{$data['getdokumen'][0]->url_dokumen}}</i>
                    <div class="pull-right">
                      <a href="{{ asset('\..\documents').'/'.$data['getdokumen'][0]->url_dokumen}}" download="{{$data['getdokumen'][0]->url_dokumen}}" class="btn btn-default btn-sm btn-flat">Download Data Pendukung</a>
                    </div> --}}
                    <p class="text-muted">
                      <a href="{{ asset('\..\documents').'/'.$data['getdokumen'][0]->url_dokumen}}" download="{{$data['getdokumen'][0]->url_dokumen}}" class="link-black text-sm">
                        @if (strpos($data['getdokumen'][0]->url_dokumen, '.pdf'))
                          <img width="5%" src="{{ asset('dist\img\pdf.png') }}" alt="..." class="margin">
                        @elseif(strpos($data['getdokumen'][0]->url_dokumen, '.png'))
                          <img width="5%" src="{{ asset('dist\img\png.png') }}" alt="..." class="margin">
                        @elseif(strpos($data['getdokumen'][0]->url_dokumen, '.jpg'))
                          <img width="5%" src="{{ asset('dist\img\jpg.png') }}" alt="..." class="margin">
                        @elseif(strpos($data['getdokumen'][0]->url_dokumen, '.docx'))
                          <img width="5%" src="{{ asset('dist\img\doc.png') }}" alt="..." class="margin">
                        @elseif(strpos($data['getdokumen'][0]->url_dokumen, '.xlsx'))
                          <img width="5%" src="{{ asset('dist\img\doc.png') }}" alt="..." class="margin">
                        @endif
                      </a>
                    </p>
                  </div><!-- /.attachment-block -->
                @endif
                @else
                <div class="attachment-block clearfix">
                  <b>Data Pendukung</b><br>
                  <p class="text-muted">
                    <i>Pengaduan ini tidak memiliki data pendukung.</i>
                  </p>
                </div>
              @endif
            </div><!-- /.box-body -->
            <div class="box-footer">
                {!! Form::model($data['binddatapengaduan'], ['route' => ['tanggap.update', $data['binddatapengaduan']->id], 'method' => "patch", 'class'=>'form-horizontal']) !!}
                  {!! csrf_field() !!}
                  <img class="img-responsive img-circle img-sm" src="{{asset('dist/img/logokabtangerang.png')}}" alt="alt text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <input
                    @if(isset($data['binddatapengaduan']))
                      value="{{$data['binddatapengaduan']->id}}"
                    @endif
                    type="hidden" name="id" class="form-control" readonly="true"
                    @if(!$errors->has('id'))
                      value="{{ old('id') }}"
                    @endif
                    >
                  <textarea name="tanggapan" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini.."
                  @if($errors->has('tanggapan'))
                    style="border:1px solid #DD4B39;margin-top:5px;"
                  @endif></textarea>
                  {{-- @else
                  <textarea name="tanggapan" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini..">  {{$data['binddatatanggapan']->tanggapan}}</textarea> --}}
                  @if($errors->has('tanggapan'))
                    <span class="help-block">
                      <strong>{{ $errors->first('tanggapan')}}
                      </strong>
                    </span>
                  @endif
                  <div class="footer pull-right" style="padding-top:5px;">
                      <button class="btn btn-success btn-sm btn-flat">Kirim Tanggapan</button>
                  </div>
                </div>
              </form>
            </div><!-- /.box-footer -->
          </div><!-- /.box -->
        @endif
      @elseif(isset($data['binddatamutasi']))
        @if($data['binddatapengaduanmutasi'])
          <div class="box box-widget">
            <div class='box-header with-border'>
              <div class='user-block'>
                  @if(isset($data['binddatapengaduanmutasi']))
                    @if($data['getdatamutasi'][0]->url_photo == null || $data['getdatamutasi'][0]->flag_anonim==1)
                      <img class="img-circle" src="{{ asset('/images/userdefault.png') }}" alt="user image">
                    @else
                      <img class="img-circle" src="{{ asset('/images/'.$data['getdatamutasi'][0]->url_photo) }}" alt="{{$data['getdatamutasi'][0]->nama}}">
                    @endif
                  @else
                      <img class="img-circle" src="{{ asset('/images/userdefault.png') }}" alt="user image">
                  @endif
                <span class='username'><a href="#">
                  @if(isset($data['binddatamutasi']))
                    @if($data['getdatamutasi'][0]->flag_anonim==0)
                      {{$data['getdatamutasi'][0]->nama}}
                    @else
                      Nama Dirahasiakan
                    @endif
                  @endif
                </a></span>
                <span class='description'>
                  @if(isset($data['binddatamutasi']))
                    {{ \Carbon\Carbon::parse($data['getdatamutasi'][0]->created_at)->format('d-M-y H:i:s')}}
                  @endif
                  |
                  @if(isset($data['binddatamutasi']))
                    {{$data['getdatamutasi'][0]->nama_topik}}
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
                @if(isset($data['binddatamutasi']))
                  <b>{{$data['getdatamutasi'][0]->judul_pengaduan}}</b>
                @endif
              </p>
              <p style="text-align:justify">
                @if(isset($data['binddatamutasi']))
                  <?php echo $data['getdatamutasi'][0]->isi_pengaduan?>
                @endif
              </p>
              <!-- Attachment -->
                @if(isset($data['binddatapengaduanmutasi']))
                  <div class="attachment-block clearfix">
                  <b>Data Pendukung</b><br>
                  <?php $cekDok="0"; ?>
                    @foreach($data['getdokumen'] as $dok)
                      @if($data['binddatamutasi']->id_pengaduan === $dok->pengaduan_id)
                          <?php $cekDok="1"; ?>
                        <a href="{{ asset('\..\documents').'/'.$dok->url_dokumen}}" download="{{$dok->url_dokumen}}" class="link-black text-sm">
                          @if (strpos($dok->url_dokumen, '.pdf'))
                            <img width="5%" src="{{ asset('dist\img\pdf.png') }}" alt="..." class="margin">
                          @elseif(strpos($dok->url_dokumen, '.png'))
                            <img width="5%" src="{{ asset('dist\img\png.png') }}" alt="..." class="margin">
                          @elseif(strpos($dok->url_dokumen, '.jpg'))
                            <img width="5%" src="{{ asset('dist\img\jpg.png') }}" alt="..." class="margin">
                          @elseif(strpos($dok->url_dokumen, '.docx'))
                            <img width="5%" src="{{ asset('dist\img\doc.png') }}" alt="..." class="margin">
                          @elseif(strpos($dok->url_dokumen, '.xlsx'))
                            <img width="5%" src="{{ asset('dist\img\doc.png') }}" alt="..." class="margin">
                          @endif
                        </a>
                        @endif
                    @endforeach
                    @if($cekDok=="0")
                      <p class="text-muted">
                        <i>Pengaduan ini tidak memiliki data pendukung.</i>
                      </p>
                    @endif
                  </div><!-- /.attachment-block -->
                @endif
            </div><!-- /.box-body -->
            <div class="box-footer">
              <form class="form-horizontal" method="post" action="{{url('tanggap')}}">
                  {!! csrf_field() !!}
                  <img class="img-responsive img-circle img-sm" src="{{asset('dist/img/logokabtangerang.png')}}" alt="alt text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <input
                    @if(isset($data['binddatamutasi']))
                      value="{{$data['binddatamutasi']->id_pengaduan}}"
                    @endif
                    type="hidden" name="id" class="form-control" readonly="true"
                    @if(!$errors->has('id'))
                      value="{{ old('id') }}"
                    @endif
                    >
                    @if(isset($data['binddatamutasi']))
                      {{-- <h4><span class="label bg-green">Data Mutasi dari SKPD
                      @foreach($data['getmutasi'] as $key)
                      {{$key->nama_skpd}}</span></h4>
                    @endforeach --}}
                    <textarea name="tanggapanmutasi" readonly="true" class="form-control" rows="5" cols="40" style="border:1px solid #00a65a;margin-top:5px;">{{$data['binddatamutasi']->pesan_mutasi}}</textarea>
                  @endif
                  <br>
                  <textarea name="tanggapan" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini.."
                  @if($errors->has('tanggapan'))
                    style="border:1px solid #DD4B39;margin-top:5px;"
                  @endif></textarea>
                  {{-- @else
                  <textarea name="tanggapan" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini..">  {{$data['binddatatanggapan']->tanggapan}}</textarea> --}}
                  @if($errors->has('tanggapan'))
                    <span class="help-block">
                      <strong>{{ $errors->first('tanggapan')}}
                      </strong>
                    </span>
                  @endif
                  <div class="footer pull-right" style="padding-top:5px;">
                    <button class="btn btn-success btn-sm btn-flat">Kirim Tanggapan</button>
                  </div>
                </div>
              </form>
            </div><!-- /.box-footer -->
          </div><!-- /.box -->
        @endif
      @else
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4>Informasi Untuk Anda</h4>
          <ul>
            <li>
              <p>Dengan menggunakan fitur ini, anda dapat menanggapi setiap pengaduan warga dengan tanpa melakukan verifikasi pengaduan terlebih dahulu.</p>
            </li>
            <li>
              <p>Jika anda hanya ingin melakukan verifikasi tanpa melakukan penanggapan, anda dapat menggunakan fitur verifikasi data pada menu <b>Lihat Semua Pengaduan >> Lihat Data Pengaduan >> Verifikasi Pengaduan.</b></p>
            </li>
            <li>
              <p>Jika anda mendapati pengaduan yang tidak sesuai dengan topik pengaduan anda, maka anda bisa menggunakan fitur mutasi pengaduan pada menu <b>Lihat Semua Pengaduan >> Lihat Data Pengaduan >> Mutasi Pengaduan.</b></p>
            </li>
            <li>
              <p>Untuk menanggapi pengaduan, silahkan lakukan binding data dengan cara klik tombol <b>Lihat Data Pengaduan</b> pada tabel disamping.</p>
            </li>
          </ul>
        </div>
      @endif
      <!-- Horizontal Form -->

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
                  <tr class="bg-yellow">
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
                        @if($key->flag_anonim==0)
                          <td>{{ $key->nama }}</td>
                        @elseif($key->flag_anonim==1)
                            <td>Nama Dirahasiakan</td>
                        @endif
                        <td>{{ $key->nama_topik }}</td>
                        <td>{{ \Carbon\Carbon::parse($key->created_at)->format('d-M-y H:i:s')}}</td>
                        <td>
                          @if($key->flag_tanggap==0)
                            <a class="btn btn-danger btn-xs btn-flat" data-toggle='tooltip' title='Tanggapi Data Pengaduan' href="{{ route('tanggap.edit', $key->id) }}"><i class="fa fa-exclamation-triangle"></i></a></td>
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
                <tr class="bg-yellow">
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
                      @if($key->flag_anonim==0)
                        <td>{{ $key->nama }}</td>
                      @elseif($key->flag_anonim==1)
                          <td>Nama Dirahasiakan</td>
                      @endif
                      <td>{{ $key->nama_topik }}</td>
                      <td>{{ \Carbon\Carbon::parse($key->created_at)->format('d-M-y H:i:s')}}</td>
                      <td>{{ $key->nama_skpd }}</td>
                      <td>
                        @if($key->flag_tanggap==0)
                          <a class="btn btn-danger btn-xs btn-flat" data-toggle='tooltip' title='Tanggapi Data Mutasi' href="{{ route('tanggap.show', $key->id) }}"><i class="fa fa-exclamation-triangle"></i></a></td>
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
