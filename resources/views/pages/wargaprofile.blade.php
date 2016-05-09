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

            <strong><i class="fa fa-phone-square margin-r-5"></i> No. Telp</strong>
            <p class="text-muted">081289087875</p>

            <hr style="margin-top:2px;margin-bottom:8px;">

            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
            <p class="text-muted">amanda@gmail.com</p>

            <hr style="margin-top:2px;margin-bottom:8px;">

            <strong><i class="fa fa-female margin-r-5"></i> Jenis Kelamin</strong>
            <p class="text-muted">Wanita</p>

            <hr style="margin-top:2px;margin-bottom:8px;">


            <strong><i class="fa fa-home margin-r-5"></i> Alamat</strong>
            <p class="text-muted">Jalan Perumahan NEO Bintaro Blok I/2 Jakarta Selatan</p>

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
            <li class="active"><a href="#activity" data-toggle="tab">Data Pengaduan SKPD Kesehatan</a></li>
            {{-- <li><a href="#settings" data-toggle="tab">Ubah Profil</a></li> --}}
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <span class='username' style="margin-left:0px;">
                    Obat yg sebelumnya dicover BPJS menjadi harus bayar
                  </span>
                  <span class='description' style="margin-left:0px;">
                    Kategori Pelayanan Obat - 24 April 2016
                  </span>
                  <span class='description' style="margin-left:0px; padding-top:3px;">
                    <span class="label bg-red">Belum ditanggapi</span>
                  </span>
                </div><!-- /.user-block -->
                <p>
                  Saya sedang dirawat di rs santosa central kebon jati - bandung. hari ini sabtu, 7 mei 2016 saya diberi copy resep yg harus ditebus di farmasi sebesar 117rb berupa lasix 2ampul. padahal dengan keluhan yg sama sebelumnya dengan obat yg sama tidak ada biaya apapun. saya kecewa sebagai pengguna bpjs kelas 1 non pbi, ditempatkan di ruang kelas 3 karena penuh. masih juga diminta bayar obat yg sebelumnya tidak dipungut biaya apapun. iuran naik tapi fasilitas menurun. harap segera ditindaklanjuti. trims
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
                    Aktifasi pendaftaran BPJS Kesehatan
                  </span>
                  <span class='description' style="margin-left:0px;">
                    Kategori BPJS Kesehatan - 24 April 2016
                  </span>
                  <span class='description' style="margin-left:0px; padding-top:3px;">
                    <span class="label bg-green">Telah ditanggapi</span>
                  </span>
                </div><!-- /.user-block -->
                <p>
                  Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double? (saya sudah coba refres-f5 beberapa kali tetapi data aktivasi tetap tidak muncul. mohon informasinya no registrasi : bpjs-0000016816961 terima kasih banyak.
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
                        Administrator SKPD Kesehatan
                        <span class='text-muted pull-right'>25 April 2016</span>
                      </span><!-- /.username -->
                      Terima kasih atas keluhan yang disampaikan dan dengan ini kami sampaikan permohonan maaf atas ketidaknyamanan yang di alami Menjawab pertanyaan Bapak dapat kami sarankan agar peserta mencoba melakukan kembali pendaftaran online untuk anak Bapak dengan menggunakan nomor registrasi Bapak Stefanus dengan klik registrasi anggota keluarga dan masukan nomor registrasi Bapak stefanus setelah 1x24 jam dari pendaftaran sebelumnya. JIka peserta masih mendapatkan kendala dalam pendaftaran online, peserta dapat mendaftar di kantor cabang atau mendaftar di Bank BNI, BRI dan Mandiri Untuk informasi selanjutnya dapat menghubungi Call Centre BPJS Kesehatan di 500 400 Demikian informasi yang dapat kami sampaikan. Semoga Bapak beserta keluarga selalu dalam keadaan sehat. Terima kasih telah mengunjungi website BPJS Kesehatan. Salam BPJS Kesehatan
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
