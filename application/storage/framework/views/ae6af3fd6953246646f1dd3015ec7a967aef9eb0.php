<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU | Beranda</title>
    <?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/customcss.css')); ?>" media="screen" title="no title" charset="utf-8">
  </head>

  <body class="hold-transition skin-black-light layout-top-nav">
    <div class="wrapper">

      <?php echo $__env->make('includes.navbarwarga', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <!-- Full Width Column -->
      <div class="content-wrapper custombackground">
        <div class="container">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-9">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ajukan Keluhan Anda</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Kategori Pelaporan</label>
                      <select class="form-control">
                        <option>-- Pilih Kategori --</option>
                        <option>Kesehatan</option>
                        <option>Perhubungan</option>
                        <option>Kependudukan</option>
                        <option>Pekerjaan Umum</option>
                        <option>Ketenagakerjaan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tuliskan Judul Laporan Anda</label>
                      <input type="text" name="name" class="form-control" placeholder="Judul Pengaduan">
                    </div>
                    <div class="form-group">
                      <label>Tuliskan Laporan Anda</label>
                      <textarea class="form-control" rows="5" placeholder="Apa Laporan Anda...?"></textarea>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputFile">Dokumen Pendukung</label>
                          <input type="file" id="exampleInputFile">
                          <p class="help-block">Dokumen yang akan dilampirkan</p>
                        </div>
                      </div><!-- /.col-lg-6 -->
                      <div class="col-lg-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> Anonim <sub><font color="red">Identitas Anda Tidak Akan Ditampilkan</font></sub>
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> Laporan Rahasia <sub><font color="red">Laporan Anda Akan Kami Rahasiakan Terhadap Publik </font></sub>
                          </label>
                        </div>
                      </div><!-- /.col-lg-6 -->
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
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
                        <img class="img-circle img-bordered-sm" src="<?php echo e(asset('/dist/img/user1-128x128.jpg')); ?>" alt="user image">
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
                        <a href="<?php echo e(url('detail/pengaduan-warga')); ?>">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo e(asset('/dist/img/user7-128x128.jpg')); ?>" alt="user image">
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
                        <a href="<?php echo e(url('detail/pengaduan-warga')); ?>">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo e(asset('/dist/img/user6-128x128.jpg')); ?>" alt="user image">
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
                        <a href="<?php echo e(url('detail/pengaduan-warga')); ?>">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="perhubungan">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo e(asset('/dist/img/user4-128x128.jpg')); ?>" alt="user image">
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
                        <a href="<?php echo e(url('detail/pengaduan-warga')); ?>">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo e(asset('/dist/img/user5-128x128.jpg')); ?>" alt="user image">
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
                        <a href="<?php echo e(url('detail/pengaduan-warga')); ?>">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo e(asset('/dist/img/user8-128x128.jpg')); ?>" alt="user image">
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
                        <a href="<?php echo e(url('detail/pengaduan-warga')); ?>">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="pendidikan">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo e(asset('/dist/img/user4-128x128.jpg')); ?>" alt="user image">
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
                        <a href="<?php echo e(url('detail/pengaduan-warga')); ?>">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo e(asset('/dist/img/user5-128x128.jpg')); ?>" alt="user image">
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
                        <a href="<?php echo e(url('detail/pengaduan-warga')); ?>">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo e(asset('/dist/img/user8-128x128.jpg')); ?>" alt="user image">
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
                        <a href="<?php echo e(url('detail/pengaduan-warga')); ?>">[Selengkapnya]</a>
                      </p>
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div>

            <div class="col-md-3">
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-body box-profile" style="height:225px;">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo e(asset('/dist/img/user2-160x160.jpg')); ?>" alt="User profile picture">
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
                <div class="box-body" style="margin-top:10px;">
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
            </div><!-- /.col -->
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
    <script src="<?php echo e(asset('/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo e(asset('/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo e(asset('/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('/plugins/fastclick/fastclick.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('/dist/js/app.min.js')); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo e(asset('/dist/js/demo.js')); ?>"></script>
  </body>
</html>
