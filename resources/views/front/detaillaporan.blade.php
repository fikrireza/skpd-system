<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU | Pengaduan Pemadaman Listrik</title>
    @include('includes.head')
    <link rel="stylesheet" href="{{asset('dist/css/customcss.css')}}" media="screen" title="no title" charset="utf-8">
  </head>

  <body class="hold-transition skin-black-light layout-top-nav">
    <div class="wrapper">

      @include('includes.navbarwarga')
      <!-- Full Width Column -->
      <div class="content-wrapper custombackground">
        <div class="container">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Pengaduan Anda</h3>
                </div>
                <div class="box-body">

                  <div class="post">
                    <div class="user-block">
                      <span class="username" style="margin-left:0px;">
                        Pengaduan Pemadaman Listrik
                      </span>
                      <span class="description" style="margin-left:0px;">
                        Kategori Pelayanan - 24 April 2016
                      </span>
                    </div><!-- /.user-block -->
                    <p>
                      Yth SKPD Kesehatan.
                    </p>
                    <p>
                      Saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double? (saya sudah coba refres-f5 beberapa kali tetapi data aktivasi tetap tidak muncul. mohon informasinya no registrasi : BPJS-0000016816961.
                    </p>
                    <div class='box-footer box-comments' style="border:1px solid #00a65a;">
                      <div style="padding-bottom:5px;">
                        <b>Tanggapan</b>
                      </div>
                      <div class='box-comment'>
                        <!-- User image -->
                        <img class='img-circle img-sm' src='{{asset('dist/img/user3-128x128.jpg')}}' alt='user image'>
                        <div class='comment-text'>
                          <span class="username">
                            Administrator SKPD Kesehatan
                            <span class='text-muted pull-right'>25 April 2016</span>
                          </span><!-- /.username -->
                          Terima kasih atas keluhan yang disampaikan dan dengan ini kami sampaikan permohonan maaf atas ketidaknyamanan yang di alami Menjawab pertanyaan Bapak dapat kami sarankan agar peserta mencoba melakukan kembali pendaftaran online untuk anak Bapak dengan menggunakan nomor registrasi Bapak Stefanus dengan klik registrasi anggota keluarga dan masukan nomor registrasi Bapak stefanus setelah 1x24 jam dari pendaftaran sebelumnya. JIka peserta masih mendapatkan kendala dalam pendaftaran online, peserta dapat mendaftar di kantor cabang atau mendaftar di Bank BNI, BRI dan Mandiri Untuk informasi selanjutnya dapat menghubungi Call Centre BPJS Kesehatan di 500 400 Demikian informasi yang dapat kami sampaikan. Semoga Bapak beserta keluarga selalu dalam keadaan sehat. Terima kasih telah mengunjungi website BPJS Kesehatan. Salam BPJS Kesehatan
                        </div><!-- /.comment-text -->
                      </div><!-- /.box-comment -->
                    </div><!-- /.box-footer -->
                    </br>
                    <ul class="list-inline">
                      <li><a href="#" class="link-black text-sm"><span class="label bg-yellow"><span class=" glyphicon glyphicon-repeat"></span>  Di-Alihkan</span></a></li>
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
                  <div class="post">
                    <div class="user-block">
                      <span class="username" style="margin-left:0px;">
                        Pengaduan Pelayanan BPJS Kesehatan
                      </span>
                      <span class="description" style="margin-left:0px;">
                        Kategori Pelayanan - 24 April 2016
                      </span>
                    </div><!-- /.user-block -->
                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore the hate as they create awesome
                      tools to help create filler text for everyone from bacon lovers
                      to Charlie Sheen fans.
                    </p>
                    <ul class="list-inline">
                      <li><a href="#" class="link-black text-sm"><span class="label bg-green"><span class="glyphicon glyphicon-ok"></span> &nbsp;Ter-Verifikasi</span></a></li>
                      <li class="pull-right"><button type="submit" class="btn btn-xs">Selengkapnya</button></li>
                    </ul>
                  </div><!-- /.post -->
                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      <span class="username" style="margin-left:0px;">
                        Pengaduan Jalan Rusak
                      </span>
                      <span class="description" style="margin-left:0px;">
                        Kategori Pelayanan - 24 April 2016
                      </span>
                    </div><!-- /.user-block -->
                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore the hate as they create awesome
                      tools to help create filler text for everyone from bacon lovers
                      to Charlie Sheen fans.
                    </p>
                    <ul class="list-inline">
                      <li><a class="link-black text-sm"><span class="label bg-red"><span class="glyphicon glyphicon-remove"></span> Belum Ditanggapi</span></a></li>
                      <li class="pull-right"><button type="submit" class="btn btn-xs">Selengkapnya</button></li>
                    </ul>
                  </div><!-- /.post -->
                </div>
              </div>

              </div>

              <!-- Kanan -->
              <div class="col-md-3">
                <div class="box box-primary">
                  <div class="box-body box-profile" style="height:225px;">
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('/dist/img/user2-160x160.jpg')}}" alt="User profile picture">
                    <h3 class="profile-username text-center">Dwi Handika Putro</h3>
                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>Pengaduan Anda</b> <span class="pull-right badge bg-green">10</span>
                      </li>
                      <li class="list-group-item">
                        <b>Telah Ditanggapi</b> <span class="pull-right badge bg-green">2</span>
                      </li>
                    </ul>
                  </div><!-- /.box-body -->
                  <div class="box-body" style="margin-top:10px">
                    <strong><i class="fa fa-book margin-r-5"></i>  No. KTP</strong>
                    <p class="text-muted">
                      32760621129010001
                    </p>

                    <hr style="margin-top:2px;margin-bottom:8px;">
                    <strong><i class="fa fa-map-marker margin-r-5"></i> No. Telp</strong>
                    <p class="text-muted">081289087875</p>

                    <hr style="margin-top:2px;margin-bottom:8px;">

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>
                    <p class="text-muted">alexamder@gmail.com</p>

                    <hr style="margin-top:2px;margin-bottom:8px;">

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Jenis Kelamin</strong>
                    <p class="text-muted">Pria</p>

                    <hr style="margin-top:2px;margin-bottom:8px;">

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Pengaduan Terbaru</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>  Pendidikan</strong>
                    <p>
                      <div class="">
                        <a href="" class="text-muted">
                          Biaya sekolah terlalu mahal
                        </a>
                      </div>
                      <div class="">
                        <a href="" class="text-muted">
                          Buku paket tidak tersedia di sekolah
                        </a>
                      </div>
                      <div class="">
                        <a href="" class="text-muted">
                          Guru sering datang terlambat
                        </a>
                      </div>
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Jalan</strong>
                    <p>
                      <div class="">
                        <a href="" class="text-muted">
                          Jalan talagasari banyak lubang
                        </a>
                      </div>
                      <div class="">
                        <a href="" class="text-muted">
                          Mohon rambu jalan diperjelas
                        </a>
                      </div>
                      <div class="">
                        <a href="" class="text-muted">
                          Marka jalan tidak terlihat di tol balaraja
                        </a>
                      </div>
                    </p>

                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div>
            </div><!-- /.row -->

          </section><!-- /.content -->
        </div>
      </div>
    </div>
    <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright © 20162017 <a href="http://9tins.com">9Tins Project</a>.</strong> All rights reserved.
      </div><!-- /.container -->
    </footer>
  </div>


  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <!-- bootstrap time picker -->
  <script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
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
