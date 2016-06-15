@extends('front.template')

@section('title')
  <title>SIMPEDU | Pengaduan Saya</title>
@stop

@section('content')

  @if(Session::has('pengaduan'))
  <div class="col-md-12">
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
        <p>{{ Session::get('pengaduan') }}</p>
      </div>
  </div>
  @endif

  <div class="col-md-9">
    @include('front.form')

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Pengaduan Anda</h3>
      </div>
      <div class="box-body">
        @if($pengaduans == '')
          <div class="">Anda Belum Punya Histori</div>
        @else
          @foreach($pengaduans as $pengaduan)
          <div class="post">
            <div class="user-block">
              <span class="username" style="margin-left:0px;">
                {{ $pengaduan->judul_pengaduan }}
              </span>
              <span class="description" style="margin-left:0px;">
                {{ $pengaduan->nama_skpd}} - {{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d-M-y H:i')}}
              </span>
            </div><!-- /.user-block -->
            <p>
              {{ $pengaduan->isi_pengaduan}}
            </p>
            <div class="timeline-body">
            @foreach($dokumentall as $dok)
              @if($pengaduan->id === $dok->pengaduan_id)
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
            </div>
            <ul class="list-inline">
              @if($pengaduan->flag_verifikasi == 1)
                <li><a href="#" class="link-black text-sm"><span class="label bg-green"><span class="glyphicon glyphicon-ok"></span> &nbsp;Ter-Verifikasi</span></a></li>
              @elseif($pengaduan->flag_mutasi == 1)
                <li><a href="#" class="link-black text-sm"><span class="label bg-yellow"><span class="glyphicon glyphicon-repeat"></span> &nbsp;Dialihkan</span></a></li>
              @elseif($pengaduan->flag_tanggap == 0)
                <li><a class="link-black text-sm"><span class="label bg-red"><span class="glyphicon glyphicon-remove"></span> Belum Ditanggapi</span></a></li>
              @endif
              <li class="pull-right"><a href="{{ url('pengaduan/detail', $pengaduan->slug) }}"><button type="submit" class="btn btn-xs">Selengkapnya</button></a></li>
            </ul>
          </div><!-- /.post -->
          @endforeach
        @endif
      </div>
    </div>
  </div>

  @include('front.sidebar1')
@stop
