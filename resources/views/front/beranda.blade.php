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
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
                    </div><!-- /.post -->
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="perhubungan">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user5-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">Pelapor</a>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
                      <div class="box-footer box-comments">
                        <div class="box-comment">
                          <!-- User image -->
                          <img class="img-circle img-sm" src="{{ asset('/dist/img/user3-128x128.jpg') }}" alt="user image">
                          <div class="comment-text">
                            <span class="username">
                              Administrator
                              <span class="text-muted pull-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.
                          </div><!-- /.comment-text -->
                        </div><!-- /.box-comment -->
                        <div class="box-comment">
                          <!-- User image -->
                          <img class="img-circle img-sm" src="{{ asset('/dist/img/user8-128x128.jpg') }}" alt="user image">
                          <div class="comment-text">
                            <span class="username">
                              SKPD Perhubungan
                              <span class="text-muted pull-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                            The point of using Lorem Ipsum is that it has a more-or-less
                            normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.
                          </div><!-- /.comment-text -->
                        </div><!-- /.box-comment -->
                      </div>
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="pendidikan">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user4-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
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
