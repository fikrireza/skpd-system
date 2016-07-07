@extends('front.template')

@section('title')
  <title>SIMPEDU</title>
@stop

@section('content')

  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
      <?php $active = 1; ?>
      @foreach($skpdonly as $skpd)
        @if($active++ == 1)
        <li class="active"><a href="#{{$skpd->slug_skpd}}" data-toggle="tab" aria-expanded="false">{{ $skpd->nama_skpd }}</a></li>
        @else
        <li class=""><a href="#{{$skpd->slug_skpd}}" data-toggle="tab" aria-expanded="false">{{ $skpd->nama_skpd }}</a></li>
        @endif
      @endforeach
      </ul>
      <div class="tab-content">
        <?php $pane = 1; ?>
        @foreach($skpdonly as $tabskpd)
          @if($pane++ == 1)
            <div class="tab-pane active" id="{{$tabskpd->slug_skpd}}">
          @else
            <div class="tab-pane" id="{{$tabskpd->slug_skpd}}">
          @endif
          @foreach($AllTopiks as $skpd)
            @foreach($skpd as $topik)
            @if($topik->slug_skpd === $tabskpd->slug_skpd)
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
                <span class="description">{{ $topik->nama_skpd}} - {{ \Carbon\Carbon::parse($topik->created_at)->format('d-M-y H:i')}}</span>
              </div><!-- /.user-block -->
              <p><b>{{ $topik->judul_pengaduan }}</b></p>
              <p>{!! $topik->isi_pengaduan !!}</p>
              <ul class="list-inline">
                @if($topik->flag_verifikasi == 1)
                  <li><a href="#" class="link-black text-sm"><span class="label bg-green"><span class="glyphicon glyphicon-ok"></span> &nbsp;Ter-Verifikasi</span></a></li>
                @elseif($topik->flag_mutasi == 1)
                  <li><a href="#" class="link-black text-sm"><span class="label bg-yellow"><span class="glyphicon glyphicon-repeat"></span> &nbsp;Dialihkan</span></a></li>
                @elseif($topik->flag_tanggap == 0)
                  <li><a class="link-black text-sm"><span class="label bg-red"><span class="glyphicon glyphicon-remove"></span> Belum Ditanggapi</span></a></li>
                @endif
                {{-- @if($topik->warga_id == Auth::user()->id) --}}
                @if($topik->warga_id == Auth::user()->id)
                <li class="pull-right"><a href="{{ url('pengaduansaya/detail', $topik->slug) }}"><button type="submit" class="btn btn-xs">Selengkapnya</button></a></li>
                @else
                <li class="pull-right"><a href="{{ url('semuapengaduan/detail', $topik->slug) }}"><button type="submit" class="btn btn-xs">Selengkapnya</button></a></li>
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
