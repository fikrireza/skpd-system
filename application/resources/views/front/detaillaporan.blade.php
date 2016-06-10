@extends('front.template')

@section('content')
              <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Pengaduan Anda</h3>
                </div>
                <div class="box-body">

                  <div class="post">
                    <div class="user-block">
                      <span class="username" style="margin-left:0px;">
                        {{ $detail->judul_pengaduan}}
                      </span>
                      <span class="description" style="margin-left:0px;">
                        Kategori Pelayanan - {{ \Carbon\Carbon::parse($detail->created_at)->format('d-M-y H:i')}}
                      </span>
                    </div><!-- /.user-block -->
                    <p>
                      {{ $detail->isi_pengaduan}}
                    </p>
                    @if($tanggapan === null)
                    <div class='box-footer box-comments' style="border:1px solid #00a65a;">
                      <div style="padding-bottom:5px;">
                        <b>Tanggapan</b>
                      </div>
                      @foreach($tanggapan as $tanggap)
                      <div class='box-comment'>
                        <!-- User image -->
                        <img class='img-circle img-sm' src='{{asset('dist/img/user3-128x128.jpg')}}' alt='user image'>
                        <div class='comment-text'>
                          <span class="username">
                            Administrator SKPD
                            <span class='text-muted pull-right'>{{ \Carbon\Carbon::parse($tanggap->created_at)->format('d-M-y H:i')}}</span>
                          </span><!-- /.username -->
                          {{ $tanggap->tanggapan }}
                        </div><!-- /.comment-text -->
                      </div><!-- /.box-comment -->
                      @endforeach
                    </div><!-- /.box-footer -->
                    @endif
                    </br>
                    <ul class="list-inline">
                      @if($detail->flag_verifikasi == 1)
                        <li><a href="#" class="link-black text-sm"><span class="label bg-green"><span class="glyphicon glyphicon-ok"></span> &nbsp;Ter-Verifikasi</span></a></li>
                      @elseif($detail->flag_mutasi == 1)
                        <li><a href="#" class="link-black text-sm"><span class="label bg-yellow"><span class="glyphicon glyphicon-repeat"></span> &nbsp;Dialihkan</span></a></li>
                      @elseif($detail->flag_tanggap == 0)
                        <li><a class="link-black text-sm"><span class="label bg-red"><span class="glyphicon glyphicon-remove"></span> Belum Ditanggapi</span></a></li>
                      @endif
                    </ul>
                  </div><!-- /.post -->
                </div>
              </div>

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pengaduan Anda Lainnya</h3>
                </div>
                <div class="box-body">
                  <!-- Post -->
                  @foreach($listPengaduan as $pengaduan)
                    @if(!$pengaduan->slug == $detail)
                      <div class="post">
                        <div class="user-block">
                          <span class="username" style="margin-left:0px;">
                            {{ $pengaduan->judul_pengaduan}}
                          </span>
                          <span class="description" style="margin-left:0px;">
                            Kategori Pelayanan - {{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d-M-y')}}
                          </span>
                        </div><!-- /.user-block -->
                        <p>
                          {{ $pengaduan->isi_pengaduan}}
                        </p>
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
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>

              </div>

              @include('front.sidebar1')

@stop

@section('script')
  {{-- icheck --}}
  <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>

  <script>
    $(function () {
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });
    });
  </script>
@stop
