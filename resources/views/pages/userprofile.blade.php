@extends('layouts.master')

@section('title')
  <title>Data Pengaduan Berdasarkan Topik</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Seluruh Data Pengaduan
    <small>Pengaduan ditampilkan sesuai dengan topik pengaduan yang dipilih</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li class="active">Lihat Seluruh Pengaduan</li>
  </ol>
@stop

@section('content')
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}" alt="User profile picture">
            <h3 class="profile-username text-center">Amanda Satyarini</h3>
            <p class="text-muted text-center">Warga Kabupaten Tangerang</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Data Pengaduan</b> <a class="pull-right">1,322</a>
              </li>
            </ul>
          </div><!-- /.box-body -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-success">Coding</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Data Pengaduan</a></li>
            <li><a href="#settings" data-toggle="tab">Ubah Profil</a></li>
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
                    Pengaduan Pemadaman Listrik
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
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
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

  <script>
    $(function () {
      $("#tabelpengaduan").DataTable();
    });
  </script>
@stop
