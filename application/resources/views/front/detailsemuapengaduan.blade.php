@extends('front.template')

@section('title')
  <title>SIMPEDU | {{ $detail->judul_pengaduan}}</title>
@stop

@section('content')
<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Pengaduan</h3>
    </div>
    <div class="box-body">
      <div class="post">
        <div class="user-block">
          @if($detail->url_photo == null || $detail->flag_anonim == 1)
            <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
          @else
            <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$detail->url_photo) }}" alt="{{$detail->nama}}">
          @endif
          <span class='username'>{{ $detail->judul_pengaduan}}</span>
          <span class='description'>
            {{ $detail->nama_topik}} - {{ \Carbon\Carbon::parse($detail->created_at)->format('d-M-y')}}
          </span>
          <span class='description'>Pelapor : @if($detail->flag_anonim == 1)
            Tanpa Nama
          @elseif($detail->flag_anonim == 0)
            {{ $detail->nama }}
          @endif
          </span>
        </div>
        <p>{!! $detail->isi_pengaduan !!}</p>

        @if($tanggapan->isEmpty())

        @else
          <div class='box-footer box-comments' style="border:1px solid #00a65a;">
            <div style="padding-bottom:5px;">
              <b>Tanggapan</b>
            </div>
            @foreach($tanggapan as $tanggap)
            <div class='box-comment'>
              @if($tanggap->url_photo == null)
                <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
              @else
                <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$tanggap->url_photo) }}" alt="{{$tanggap->nama}}">
              @endif
              <div class='comment-text'>
                <span class="username">
                  {{ $tanggap->nama }} - Administrator
                  <span class='text-muted pull-right'>{{ \Carbon\Carbon::parse($tanggap->created_at)->format('d-M-y H:i')}}</span>
                </span>
                {{ $tanggap->tanggapan }}
              </div>
            </div>
            @endforeach
          </div>
        @endif
        <br/>
        <ul class="list-inline">
          @if($detail->flag_verifikasi == 1)
            <li><a href="#" class="link-black text-sm"><span class="label bg-green"><span class="glyphicon glyphicon-ok"></span> &nbsp;Ter-Verifikasi</span></a></li>
          @elseif($detail->flag_mutasi == 1)
            <li><a href="#" class="link-black text-sm"><span class="label bg-yellow"><span class="glyphicon glyphicon-repeat"></span> &nbsp;Dialihkan</span></a></li>
          @elseif($detail->flag_tanggap == 0)
            <li><a class="link-black text-sm"><span class="label bg-red"><span class="glyphicon glyphicon-remove"></span> Belum Ditanggapi</span></a></li>
          @endif
        </ul>
      </div>
    </div>
  </div>

  <div class="box-primary">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#kesehatan" data-toggle="tab" aria-expanded="true">Pengaduan Lain</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active">
          @foreach($listPengaduan as $list)
            @if($list->slug != $detail->slug)
          <div class="post">
            <div class="user-block">
              @if($list->url_photo == null || $list->flag_anonim == 1)
                <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
              @else
                <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$list->url_photo) }}" alt="{{$list->nama}}">
              @endif
              <span class='username'>{{ $list->judul_pengaduan}}</span>
              <span class="description">{{ $list->nama_skpd}} - {{ \Carbon\Carbon::parse($list->created_at)->format('d-M-y H:i')}}</span>
              <span class="description">Pelapor :
              @if($list->flag_anonim == 1)
                Tanpa Nama
              @elseif($list->flag_anonim == 0)
                {{$list->nama}}
              @endif
              </span>
            </div>
            <p>
              {!! $list->isi_pengaduan !!}
            </p>
            <ul class="list-inline">
              @if($list->flag_verifikasi == 1)
                <li><a href="#" class="link-black text-sm"><span class="label bg-green"><span class="glyphicon glyphicon-ok"></span> &nbsp;Ter-Verifikasi</span></a></li>
              @elseif($list->flag_mutasi == 1)
                <li><a href="#" class="link-black text-sm"><span class="label bg-yellow"><span class="glyphicon glyphicon-repeat"></span> &nbsp;Dialihkan</span></a></li>
              @elseif($list->flag_tanggap == 0)
                <li><a class="link-black text-sm"><span class="label bg-red"><span class="glyphicon glyphicon-remove"></span> Belum Ditanggapi</span></a></li>
              @endif
              <li class="pull-right"><a href="{{ url('semuapengaduan/detail', $list->slug) }}"><button type="submit" class="btn btn-xs">Selengkapnya</button></a></li>
            </ul>
          </div>
        @endif
        @endforeach
        </div>
      </div>
    </div>
  </div>

</div>

@include('front.sidebar1')

@stop
