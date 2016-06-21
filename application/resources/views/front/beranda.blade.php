@extends('front.template')

@section('title')
  <title>SIMPEDU</title>
@stop

@section('content')

  @if(Session::has('ubahprofile'))
  <div class="col-md-12">
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
        <p>{{ Session::get('ubahprofile') }}</p>
      </div>
  </div>
  @endif

  <div class="col-md-9">
    @include('front.form')

  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
    @foreach($skpdonly as $skpd)
      <li class=""><a href="#{{$skpd->nama_skpd}}" data-toggle="tab" aria-expanded="false">{{ $skpd->nama_skpd }}</a></li>
    @endforeach
    </ul>
    <div class="tab-content">
      @foreach($skpdonly as $tabskpd)
      <div class="tab-pane" id="{{$tabskpd->nama_skpd}}">
        @foreach($AllTopiks as $skpd)
          @foreach($skpd as $topik)
          @if($topik->nama_skpd === $tabskpd->nama_skpd)
          <div class="post">
            <div class="user-block">
              @if($topik->url_photo == null || $topik->flag_anonim == 1)
                <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
              @else
                <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$topik->url_photo) }}" alt="{{$topik->nama}}">
              @endif
              <span class="username">
                <span>@if($topik->flag_anonim == 1)
                  Tanpa Nama
                @elseif($topik->flag_anonim == 0)
                  {{$topik->nama}}
                @endif</span>
              </span>
              <span class="description">{{ $topik->nama_topik}} - {{ \Carbon\Carbon::parse($topik->created_at)->format('d-M-y H:i')}}</span>
            </div><!-- /.user-block -->
            <p><b>{{ $topik->judul_pengaduan }}</b></p>
            <p>{{ $topik->isi_pengaduan }}</p>
            <ul class="list-inline">
              @if($topik->flag_verifikasi == 1)
                <li><a href="#" class="link-black text-sm"><span class="label bg-green"><span class="glyphicon glyphicon-ok"></span> &nbsp;Ter-Verifikasi</span></a></li>
              @elseif($topik->flag_mutasi == 1)
                <li><a href="#" class="link-black text-sm"><span class="label bg-yellow"><span class="glyphicon glyphicon-repeat"></span> &nbsp;Dialihkan</span></a></li>
              @elseif($topik->flag_tanggap == 0)
                <li><a class="link-black text-sm"><span class="label bg-red"><span class="glyphicon glyphicon-remove"></span> Belum Ditanggapi</span></a></li>
              @endif
              @if($topik->warga_id == Auth::user()->id)
              <li class="pull-right"><a href="{{ url('pengaduansaya/detail', $topik->slug) }}"><button type="submit" class="btn btn-xs">Selengkapnya</button></a></li>
              @else
              <li class="pull-right"><a href="{{ url('pengaduan/detail', $topik->slug) }}"><button type="submit" class="btn btn-xs">Selengkapnya</button></a></li>
              @endif
            </ul>
          </div>
          @endif
        @endforeach
      @endforeach
      </div>
      @endforeach
    </div><!-- /.tab-content -->
  </div><!-- /.nav-tabs-custom -->
</div>

@include('front.sidebar1')
@stop
