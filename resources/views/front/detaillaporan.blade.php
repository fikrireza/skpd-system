<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU | Pengaduan Pemadaman Listrik</title>
    @include('includes.head')
  </head>

  <body class="hold-transition skin-black-light layout-top-nav">
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
                <li class="active"><a href="{{ url('laporan') }}">Laporan Saya <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ url('semualaporan') }}">Daftar Laporan</a></li>
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
                          <small>Bergabung Sejak 5-Mei-2016</small>
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
              <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Laporan Anda</h3>
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
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p>
                      Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.
                    </p>
                    <p>
                      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                    </p>
                    <div class="timeline-body">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                    <div class="box-footer box-comments">
                      <div class="box-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="{{ asset('/dist/img/user3-128x128.jpg') }}" alt="user image">
                        <div class="comment-text">
                          <span class="username">
                            Administrator
                            <span class="text-muted pull-right">8:03 AM Today</span>
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
                            SKPD Penerangan
                            <span class="text-muted pull-right">10:03 AM Today</span>
                          </span><!-- /.username -->
                          The point of using Lorem Ipsum is that it has a more-or-less
                          normal distribution of letters, as opposed to using
                          'Content here, content here', making it look like readable English.
                        </div><!-- /.comment-text -->
                      </div><!-- /.box-comment -->
                    </div>
                    </br>
                    <ul class="list-inline">
                      <li><a href="#" class="link-black text-sm"><span class="glyphicon glyphicon-repeat"></span>  Di-Alihkan</a></li>
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
                    <h3 class="profile-username text-center">Alexander Pierce</h3>
                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>Pengaduan Anda</b> <span class="pull-right badge bg-green">10</span>
                      </li>
                      <li class="list-group-item">
                        <b>Telah Ditanggapi</b> <span class="pull-right badge bg-green">2</span>
                      </li>
                    </ul>
                  </div><!-- /.box-body -->
                  <div class="box-body">
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
                    <h3 class="box-title">Laporan Terbaru</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>  Pendidikan</strong>
                    <p class="text-muted">
                      B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Geografi</strong>
                    <p class="text-muted">Malibu, California</p>
                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Kependudukan</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Geografi</strong>
                    <p class="text-muted">Malibu, California</p>
                    <hr>
                    <strong><i class="fa fa-book margin-r-5"></i>  Pendidikan</strong>
                    <p class="text-muted">
                      B.S. in Computer Science from the University of Tennessee at Knoxville
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
