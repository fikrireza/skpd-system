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
