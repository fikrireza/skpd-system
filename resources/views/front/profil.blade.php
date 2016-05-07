<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU | Profil</title>
    @include('includes.head')
  </head>

  <body class="hold-transition skin-blue-light layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="{{ url('/')}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                  <img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                  <img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
                  &nbsp;&nbsp;<b>SIMPEDU</b>
                </span>
              </a>
            </div>

            <!-- Menu Kiri -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="#">Laporan Saya <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Daftar Laporan</a></li>
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                </div>
              </form>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!-- The user image in the navbar-->
                      <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- The user image in the menu -->
                      <li class="user-header">
                        <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                        <p>
                          Alexander Pierce
                          <small>Member since Nov. 2015</small>
                        </p>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="{{ url('profil') }}" class="btn btn-default btn-flat">Profil</a>
                        </div>
                        <div class="pull-right">
                          <a href="#" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                  <div class="box-body box-profile" style="height:225px;">
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('dist/img/user2-160x160.jpg')}}" alt="User profile picture">
                    <h3 class="profile-username text-center">Anton</h3>
                    <p class="text-muted text-center">5 - Mei - 2016</p>

                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>Jumlah Tanggapan Pengaduan</b> <span class="pull-right badge bg-red">2</span>
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

                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->
              <div class="col-md-9">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li id="tabHistoriTanggapan" class="active"><a href="#activity" data-toggle="tab">Histori Tanggapan</a></li>
                    <li id="tabUbahProfile"><a href="#settings" data-toggle="tab">Ubah Profil</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- Post -->
                      <div class="post" style="color:#333;">
                        <table class="table">
                          <tr class="bg-green">
                            <th>No. Pengaduan</th>
                            <th>Judul Pengaduan</th>
                            <th>Nama Pelapor</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Tanggal Tanggapan</th>
                            <th style="width: 40px">Aksi</th>
                          </tr>
                          <tr>
                            <td>123123123</td>
                            <td>Pembenahan Identitas Penerima Kartu KIS</td>
                            <td>Amanda Satyarini</td>
                            <td>24 April 2016</td>
                            <td>25 April 2016</td>
                            <td><a href="{{url('detailpengaduan')}}" class="label bg-green">Lihat</a></td>
                          </tr>
                          <tr>
                            <td>234234234</td>
                            <td>Perbaikan Data Kartu KIS</td>
                            <td>Galang Dharmiko</td>
                            <td>24 April 2016</td>
                            <td>25 April 2016</td>
                            <td><a href="{{url('detailpengaduan')}}" class="label bg-green">Lihat</a></td>
                          </tr>
                          <tr>
                            <td>345345345</td>
                            <td>Pelayanan Medis Non Obat</td>
                            <td>Pardamean Ronaldo</td>
                            <td>24 April 2016</td>
                            <td>25 April 2016</td>
                            <td><a href="{{url('detailpengaduan')}}" class="label bg-green">Lihat</a></td>
                          </tr>
                          <tr>
                            <td>456456456</td>
                            <td>Informasi Mengenai Iuran BPJS</td>
                            <td>Ademira</td>
                            <td>24 April 2016</td>
                            <td>25 April 2016</td>
                            <td><a href="{{url('detailpengaduan')}}" class="label bg-green">Lihat</a></td>
                          </tr>
                          <tr>
                            <td>123123123</td>
                            <td>Pembenahan Identitas Penerima Kartu KIS</td>
                            <td>Amanda Satyarini</td>
                            <td>24 April 2016</td>
                            <td>25 April 2016</td>
                            <td><a href="{{url('detailpengaduan')}}" class="label bg-green">Lihat</a></td>
                          </tr>
                          <tr>
                            <td>234234234</td>
                            <td>Perbaikan Data Kartu KIS</td>
                            <td>Galang Dharmiko</td>
                            <td>24 April 2016</td>
                            <td>25 April 2016</td>
                            <td><a href="{{url('detailpengaduan')}}" class="label bg-green">Lihat</a></td>
                          </tr>
                          <tr>
                            <td>345345345</td>
                            <td>Pelayanan Medis Non Obat</td>
                            <td>Pardamean Ronaldo</td>
                            <td>24 April 2016</td>
                            <td>25 April 2016</td>
                            <td><a href="{{url('detailpengaduan')}}" class="label bg-green">Lihat</a></td>
                          </tr>
                          <tr>
                            <td>456456456</td>
                            <td>Informasi Mengenai Iuran BPJS</td>
                            <td>Ademira</td>
                            <td>24 April 2016</td>
                            <td>25 April 2016</td>
                            <td><a href="{{url('detailpengaduan')}}" class="label bg-green">Lihat</a></td>
                          </tr>
                        </table>
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

                    <div class="tab-pane" id="settings">
                      <form class="form-horizontal">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Nama</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">No. KTP</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="No. KTP">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">No. Telepon</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="No. Telp">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Jenis Kelamin</label>
                          <div class="col-sm-9" style="margin-left:30px; padding-left:0px; margin-top:5px; height:30px;">
                            <div class="form-group">
                              <label>
                                <input type="radio" name="jk" class="minimal form-control">
                              </label>
                              &nbsp;
                              <label>Pria</label>
                              &nbsp;&nbsp;
                              <label>
                                <input type="radio" name="jk" class="minimal form-control">
                              </label>
                              &nbsp;
                              <label>Wanita</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Alamat</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Alamat" rows="5"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <div>
                              <label>
                                <input type="checkbox" class="minimal">
                                &nbsp;
                                Saya menjamin data yang saya masukkan adalah benar.</a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                          </div>
                        </div>
                      </form>
                    </div><!-- /.tab-pane -->
                  </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </section><!-- /.content -->
        </div>
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
