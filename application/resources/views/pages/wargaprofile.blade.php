@extends('layouts.master')

@section('title')
  <title>Detail Profil Pelapor</title>
  <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Detail Profil Pelapor
    <small>Berikut adalah profil pelapor terdaftar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li class="active">Profil Warga</li>
  </ol>
@stop

@section('content')
  <section class="content">

    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->
        @foreach($data['getdatawarga'] as $key)
        <div class="box box-primary">
          <div class="box-body box-profile" style="height:265px;">
            <img class="profile-user-img img-responsive img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}" alt="User profile picture">
            <h3 class="profile-username text-center">{{$key->nama}}</h3>
            <p class="text-muted text-center">Warga Kabupaten Tangerang</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Jumlah Laporan Pengaduan</b> <span class="pull-right badge bg-green">
                    @if(Auth::user()->level=="0")
                        {{$data['getdatajumlahpengaduanall']}}
                    @elseif(Auth::user()->level=="2")
                        {{$data['getdatajumlahpengaduan']}}
                    @endif
                </span>
              </li>
              <li class="list-group-item">
                <b>Jumlah Login</b> <span class="pull-right badge bg-maroon">{{$key->login_counter}}</span>
              </li>
            </ul>
          </div><!-- /.box-body -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i>  No. KTP</strong>
            <p class="text-muted">
              {{$key->noktp}}
            </p>

            <hr style="margin-top:2px;margin-bottom:8px;">

            <strong><i class="fa fa-phone-square margin-r-5"></i> No. Telp</strong>
            <p class="text-muted">{{$key->notelp}}</p>
            <hr style="margin-top:2px;margin-bottom:8px;">
            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
            <p class="text-muted">{{$key->email}}</p>
            <hr style="margin-top:2px;margin-bottom:8px;">

            <strong>
              @if($key->jeniskelamin=="P")
                <i class="fa fa-female margin-r-5"></i> Jenis Kelamin
                <p class="text-muted">Wanita</p>
              @elseif($key->jeniskelamin=="L")
                <i class="fa fa-male margin-r-5"></i> Jenis Kelamin
                <p class="text-muted">Pria</p>
              @endif
              <hr style="margin-top:2px;margin-bottom:8px;">
            </strong>


            <strong><i class="fa fa-home margin-r-5"></i> Alamat</strong>
            <p class="text-muted">{{$key->alamat}}</p>

            {{-- <hr style="margin-top:2px;margin-bottom:8px;">
            <button type="button" class="btn btn-flat bg-purple btn-xs pull-right" name="button">
              <i class="fa fa-edit"></i>&nbsp;&nbsp;
              Ubah Profil Saya
            </button> --}}
          </div><!-- /.box-body -->
        </div><!-- /.box -->
        @endforeach
      </div><!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            @if(Auth::user()->level=="0")
                {{-- <li class="active"><a href="#activity1" data-toggle="tab">Data Pengaduan Belum Ditanggapi</a></li> --}}
                <li class="active"><a href="#activity2" data-toggle="tab">Data Pengaduan Warga</a></li>
            @elseif(Auth::user()->level=="2")
              @foreach($data['getdataskpd'] as $getskpd)
                {{-- <li class="active"><a href="#activity1" data-toggle="tab">Data Pengaduan Belum Ditanggapi SKPD {{$getskpd->nama_skpd}}</a></li> --}}
                <li class="active"><a href="#activity2" data-toggle="tab">Data Pengaduan Untuk SKPD {{$getskpd->nama_skpd}}</a></li>
              @endforeach
            @endif

            {{-- <li><a href="#settings" data-toggle="tab">Ubah Profil</a></li> --}}
          </ul>
          @if(Auth::user()->level=="0")
            <div class="tab-content">
              <div class="active tab-pane" id="activity2">
                @if($data['getdatapengaduansudahtanggapall']->isEmpty())
                  <tr>
                    <td colspan="5" class="text-muted" style="text-align:center;"><i>Data Pengaduan tidak tersedia.</i></td>
                  </tr>
                @elseif(isset($data['getdatapengaduansudahtanggapall']))
                  @foreach($data['getdatapengaduansudahtanggapall'] as $getdatapengaduanall)
                  <div class="post">
                    <div class="user-block">
                      <span class='username' style="margin-left:0px;">
                        {{$getdatapengaduanall->judul_pengaduan}}
                      </span>
                      <span class='description' style="margin-left:0px;">
                        SKPD : {{$getdatapengaduanall->nama_skpd}} &nbsp;&nbsp;||&nbsp;&nbsp; Topik Pengaduan : {{$getdatapengaduanall->nama_topik}} &nbsp;&nbsp;||&nbsp;&nbsp; {{$getdatapengaduanall->created_pengaduan}}
                      </span>
                      <span class='description' style="margin-left:0px; padding-top:3px;">
                        @if($getdatapengaduanall->flag_tanggap==1)
                          <span class="label bg-green"><i class="fa fa-check"></i> &nbsp;Telah ditanggapi</span>
                        @else
                          <span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Belum ditanggapi</span>
                        @endif
                      </span>
                    </div><!-- /.user-block -->
                    <p>
                      {{$getdatapengaduanall->isi_pengaduan}}
                    </p>
                    @if($getdatapengaduanall->flag_tanggap==1)
                      <div class='box-footer box-comments' style="border:1px solid #00a65a;">
                        <div style="padding-bottom:5px;">
                          <b>Tanggapan</b>
                        </div>
                        <div class='box-comment'>
                          <!-- User image -->
                          <img class='img-circle img-sm' src='{{asset('dist/img/logokabtangerang.png')}}' alt='user image'>
                          <div class='comment-text'>
                            <span class="username">
                                {{$getdatapengaduanall->nama}}
                              <span class='text-muted pull-right'>{{$getdatapengaduanall->created_tanggapan}}</span>
                            </span><!-- /.username -->
                            {{$getdatapengaduanall->tanggapan}}

                          </div><!-- /.comment-text -->
                        </div><!-- /.box-comment -->
                      </div><!-- /.box-footer -->
                    @endif
                  </div><!-- /.post -->
                  @endforeach
                @endif
                <div class="box-footer">
                  <div class="pagination pagination-sm no-margin pull-right">
                    {{ $data['getdatapengaduansudahtanggapall']->links() }}
                  </div>
                </div>
              </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
          @elseif(Auth::user()->level=="2")
            <div class="tab-content">
              <div class="active tab-pane" id="activity2">
                @if($data['getdatapengaduansudahtanggap']->isEmpty())
                  <tr>
                    <td colspan="5" class="text-muted" style="text-align:center;"><i>Data Pengaduan tidak tersedia.</i></td>
                  </tr>
                @elseif(isset($data['getdatapengaduansudahtanggap']))
                  @foreach($data['getdatapengaduansudahtanggap'] as $getdatapengaduan)
                  <div class="post">
                    <div class="user-block">
                      <span class='username' style="margin-left:0px;">
                        {{$getdatapengaduan->judul_pengaduan}}
                      </span>
                      <span class='description' style="margin-left:0px;">
                        Topik Pengaduan : {{$getdatapengaduan->nama_topik}} &nbsp;&nbsp;||&nbsp;&nbsp; {{$getdatapengaduan->created_pengaduan}}
                      </span>
                      <span class='description' style="margin-left:0px; padding-top:3px;">
                        @if($getdatapengaduan->flag_tanggap==1)
                          <span class="label bg-green"><i class="fa fa-check"></i> &nbsp;Telah ditanggapi</span>
                        @else
                          <span class="label bg-red"><i class="fa fa-close"></i> &nbsp;Belum ditanggapi</span>
                        @endif
                      </span>
                    </div><!-- /.user-block -->
                    <p>
                      {{$getdatapengaduan->isi_pengaduan}}
                    </p>
                    @if($getdatapengaduan->flag_tanggap==1)
                      <div class='box-footer box-comments' style="border:1px solid #00a65a;">
                        <div style="padding-bottom:5px;">
                          <b>Tanggapan</b>
                        </div>
                        <div class='box-comment'>
                          <!-- User image -->
                          <img class='img-circle img-sm' src='{{asset('dist/img/logokabtangerang.png')}}' alt='user image'>
                          <div class='comment-text'>
                            <span class="username">
                                {{$getdatapengaduan->nama}}
                              <span class='text-muted pull-right'>{{$getdatapengaduan->created_tanggapan}}</span>
                            </span><!-- /.username -->
                            {{$getdatapengaduan->tanggapan}}

                          </div><!-- /.comment-text -->
                        </div><!-- /.box-comment -->
                      </div><!-- /.box-footer -->
                    @endif
                  </div><!-- /.post -->
                  @endforeach
                @endif
                <div class="box-footer">
                  <div class="pagination pagination-sm no-margin pull-right">
                    {{ $data['getdatapengaduansudahtanggap']->links() }}
                  </div>
                </div>
              </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
          @endif
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col -->
    </div><!-- /.row -->

  </section><!-- /.content -->


  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
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
