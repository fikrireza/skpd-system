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
        <div class="box box-primary">
          <div class="box-body box-profile" style="height:225px;">
            <img class="profile-user-img img-responsive img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}" alt="User profile picture">
            <h3 class="profile-username text-center">Amanda Satyarini</h3>
            <p class="text-muted text-center">Warga Kabupaten Tangerang</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Jumlah Laporan Pengaduan</b> <span class="pull-right badge bg-green">2</span>
              </li>
            </ul>
          </div><!-- /.box-body -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i>  No. KTP</strong>
            <p class="text-muted">
              32760621129010001
            </p>

            <hr style="margin-top:2px;margin-bottom:8px;">

            <strong><i class="fa fa-map-marker margin-r-5"></i> No. Telp</strong>
            <p class="text-muted">081289087875</p>

            <hr style="margin-top:2px;margin-bottom:8px;">

            <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>
            <p class="text-muted">amanda@gmail.com</p>

            <hr style="margin-top:2px;margin-bottom:8px;">

            <strong><i class="fa fa-map-marker margin-r-5"></i> Jenis Kelamin</strong>
            <p class="text-muted">Wanita</p>

            <hr style="margin-top:2px;margin-bottom:8px;">


            <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>

            {{-- <hr style="margin-top:2px;margin-bottom:8px;">

            <button type="button" class="btn btn-flat bg-purple btn-xs pull-right" name="button">
              <i class="fa fa-edit"></i>&nbsp;&nbsp;
              Ubah Profil Saya
            </button> --}}
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Data Pengaduan</a></li>
            {{-- <li><a href="#settings" data-toggle="tab">Ubah Profil</a></li> --}}
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <span class='username' style="margin-left:0px;">
                    Pengaduan Pemadaman Listrik
                  </span>
                  <span class='description' style="margin-left:0px;">
                    Kategori Pelayanan - 24 April 2016
                  </span>
                  <span class='description' style="margin-left:0px; padding-top:3px;">
                    <span class="label bg-red">Belum ditanggapi</span>
                  </span>
                </div><!-- /.user-block -->
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore the hate as they create awesome
                  tools to help create filler text for everyone from bacon lovers
                  to Charlie Sheen fans.
                </p>

                <div class="attachment-block clearfix">
                  <b>Data Pendukung</b><br>
                  <i class="text-muted">gambar.jpg</i>
                  <div class="pull-right">
                    <button class="btn btn-default btn-sm btn-flat">Download Data Pendukung</button>
                  </div>
                </div><!-- /.attachment-block -->

              </div><!-- /.post -->

              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <span class='username' style="margin-left:0px;">
                    Pengaduan Pelayanan BPJS Kesehatan
                  </span>
                  <span class='description' style="margin-left:0px;">
                    Kategori Pelayanan - 24 April 2016
                  </span>
                  <span class='description' style="margin-left:0px; padding-top:3px;">
                    <span class="label bg-green">Telah ditanggapi</span>
                  </span>
                </div><!-- /.user-block -->
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore the hate as they create awesome
                  tools to help create filler text for everyone from bacon lovers
                  to Charlie Sheen fans.
                </p>

                <div class="attachment-block clearfix">
                  <b>Data Pendukung</b><br>
                  <i class="text-muted">gambar.jpg</i>
                  <div class="pull-right">
                    <button class="btn btn-default btn-sm btn-flat">Download Data Pendukung</button>
                  </div>
                </div><!-- /.attachment-block -->

                <div class='box-footer box-comments' style="border:1px solid #00a65a;">
                  <div style="padding-bottom:5px;">
                    <b>Tanggapan</b>
                  </div>
                  <div class='box-comment'>
                    <!-- User image -->
                    <img class='img-circle img-sm' src='{{asset('dist/img/user3-128x128.jpg')}}' alt='user image'>
                    <div class='comment-text'>
                      <span class="username">
                        Administrator SKPD Pelayanan Publik
                        <span class='text-muted pull-right'>25 April 2016</span>
                      </span><!-- /.username -->
                      It is a long established fact that a reader will be distracted
                      by the readable content of a page when looking at its layout.
                    </div><!-- /.comment-text -->
                  </div><!-- /.box-comment -->
                </div><!-- /.box-footer -->
              </div><!-- /.post -->

              <div class="clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>

            </div><!-- /.tab-pane -->

          </div><!-- /.tab-content -->
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
