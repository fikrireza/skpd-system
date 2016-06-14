@extends('front.template')

@section('title')
  <title>SIMPEDU | Sistem Pengaduan Tepadu</title>
@stop

@section('content')
              <div class="col-md-9">

                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Hasil Pencarian :
                    @foreach($kalimat as $kata)
                      {{ strtoupper($kata) }}
                    @endforeach</h3>
                  </div>
                  <div class="box-body">
                    <!-- Post -->
                  @if($searches == null)
                    <div class="post">
                      <div class="user-block">
                        <span class="username" style="margin-left:0px;">
                          Maaf Kata Kunci Yang Anda Cari Tidak Ada
                        </span>
                      </div>
                    </div>
                  @else
                    @foreach($searches as $search)
                        <div class="post">
                          <div class="user-block">
                            <span class="username" style="margin-left:0px;">
                              {{-- @foreach($kalimat as $kata)
                                {!! str_replace(strtolower($kata),'<font color="red"><b>'.strtoupper($kata).'</b></font>',strtolower($search->judul_pengaduan))!!}
                              @endforeach</h3> --}}
                              {{ $search->judul_pengaduan}}
                            </span>
                            <span class="description" style="margin-left:0px;">
                              Kategori Pelayanan - {{ \Carbon\Carbon::parse($search->created_at)->format('d-M-y')}}
                            </span>
                          </div><!-- /.user-block -->
                          <p>
                            {{ $search->isi_pengaduan}}
                          </p>
                          <ul class="list-inline">
                            @if($search->flag_verifikasi == 1)
                              <li><a href="#" class="link-black text-sm"><span class="label bg-green"><span class="glyphicon glyphicon-ok"></span> &nbsp;Ter-Verifikasi</span></a></li>
                            @elseif($search->flag_mutasi == 1)
                              <li><a href="#" class="link-black text-sm"><span class="label bg-yellow"><span class="glyphicon glyphicon-repeat"></span> &nbsp;Dialihkan</span></a></li>
                            @elseif($search->flag_tanggap == 0)
                              <li><a class="link-black text-sm"><span class="label bg-red"><span class="glyphicon glyphicon-remove"></span> Belum Ditanggapi</span></a></li>
                            @endif
                            @if($search->warga_id == auth()->user()->id)
                            <li class="pull-right"><a href="{{ url('pengaduan/detail', $search->slug) }}"><button type="submit" class="btn btn-xs">Selengkapnya</button></a></li>
                            @endif
                          </ul>
                        </div>
                    @endforeach
                  @endif
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
