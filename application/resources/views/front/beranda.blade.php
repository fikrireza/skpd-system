<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU | Beranda</title>
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
          <script>
            window.setTimeout(function() {
              $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove();
              });
            }, 2000);
          </script>

          <section class="content">
            <div class="row">
              @if(Session::has('ubahprofile'))
              <div class="col-md-12">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                    <p>{{ Session::get('ubahprofile') }}</p>
                  </div>
              </div>
              @endif
              @if(Session::has('pengaduan'))
              <div class="col-md-12">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                    <p>{{ Session::get('pengaduan') }}</p>
                  </div>
              </div>
              @endif

              <div class="col-md-9">
                @include('front.form')

              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#kesehatan" data-toggle="tab" aria-expanded="true">Kesehatan</a></li>
                  <li class=""><a href="#perhubungan" data-toggle="tab" aria-expanded="false">Perhubungan</a></li>
                  <li class=""><a href="#pendidikan" data-toggle="tab" aria-expanded="false">Pendidikan</a></li>
                  <li class=""><a href="#kependudukan" data-toggle="tab" aria-expaded="false">Kependudukan</a></li>
                  <li class=""><a href="#tenagakerja" data-toggle="tab" aria-expaded="false">Tenaga Kerja</a></li>
                  <li class=""><a href="#polkam" data-toggle="tab" aria-expaded="false">Politik dan Keamanan</a></li>
                  <li class=""><a href="#geografi" data-toggle="tab" aria-expaded="false">Geografi</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="kesehatan">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <span>Pelayanan BPJS semakin tidak memuaskan</span>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
                        Mohon perhatiannya. Terima Kasih.
                      </p>
                      <p>
                        <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <span>Mohon perhatikan kesehatan warga tangerang</span>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description"><span class="label bg-red">Belum ditanggapi</span> - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
                      <p>
                        <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user6-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <span>Penyelenggaraan imunisasi nasional di tangerang</span>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
                        Mohon perhatiannya. Terima Kasih.
                      </p>
                      <p>
                        <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="perhubungan">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user4-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <span>Contoh pengaduan warga</span>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
                        Mohon perhatiannya. Terima Kasih.
                      </p>
                      <p>
                        <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user5-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <span>Contoh pengaduan warga</span>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description"><span class="label bg-red">Belum ditanggapi</span> - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
                      <p>
                        <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user8-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <span>Contoh pengaduan warga</span>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
                        Mohon perhatiannya. Terima Kasih.
                      </p>
                      <p>
                        <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="pendidikan">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user4-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <span>Contoh pengaduan warga</span>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
                        Mohon perhatiannya. Terima Kasih.
                      </p>
                      <p>
                        <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user5-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <span>Contoh pengaduan warga</span>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description"><span class="label bg-red">Belum ditanggapi</span> - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
                      <p>
                        <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user8-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <span>Contoh pengaduan warga</span>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
                        Mohon perhatiannya. Terima Kasih.
                      </p>
                      <p>
                        <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div>

            @include('front.sidebar1')
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.container -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright © 20162017 <a href="http://9tins.com">9Tins Project</a>.</strong> All rights reserved.
      </div><!-- /.container -->
    </footer>
  </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/dist/js/demo.js') }}"></script>
  </body>
</html>
