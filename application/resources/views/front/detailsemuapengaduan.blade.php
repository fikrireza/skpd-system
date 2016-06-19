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
        </div><!-- /.user-block -->
        <p>{{ $detail->isi_pengaduan }}</p>

        @if($tanggapan->isEmpty())

        @else
          <div class='box-footer box-comments' style="border:1px solid #00a65a;">
            <div style="padding-bottom:5px;">
              <b>Tanggapan</b>
            </div>
            @foreach($tanggapan as $tanggap)
            <div class='box-comment'>
              <!-- User image -->
              @if($tanggap->url_photo == null)
                <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
              @else
                <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$tanggap->url_photo) }}" alt="{{$tanggap->nama}}">
              @endif
              <div class='comment-text'>
                <span class="username">
                  {{ $tanggap->nama }} - Administrator SKPD
                  <span class='text-muted pull-right'>{{ \Carbon\Carbon::parse($tanggap->created_at)->format('d-M-y H:i')}}</span>
                </span><!-- /.username -->
                {{ $tanggap->tanggapan }}
              </div><!-- /.comment-text -->
            </div><!-- /.box-comment -->
            @endforeach
          </div><!-- /.box-footer -->
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
        <li class="active"><a href="#kesehatan" data-toggle="tab" aria-expanded="true">Pengaduan Lain Tentang Kesehatan</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="kesehatan">
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user5-128x128.jpg') }}" alt="user image">
              <span class="username">
                <a href="#">Brenda Marsalia</a>
              </span>
              <span class="description"><span class="label bg-green">Telah Ditanggapi</span> - 7:30 PM today</span>
            </div>
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>
            <p>
              <a href="#">
                [Selengkapnya]
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@include('front.sidebar1')

@stop
