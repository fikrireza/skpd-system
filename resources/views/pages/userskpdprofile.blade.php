@extends('layouts.master')

@section('title')
  <title>Profil Saya</title>
  <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Profile Saya
    <small>Halaman profil User SKPD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li class="active">Profil Saya</li>
  </ol>
@stop

@section('content')
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile" style="height:265px;">
            <img class="profile-user-img img-responsive img-circle" src="{{asset('dist/img/user2-160x160.jpg')}}" alt="User profile picture">
            <h3 class="profile-username text-center">Anton</h3>
            <p class="text-muted text-center">User SKPD</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Jumlah Tanggapan Pengaduan</b> <span class="pull-right badge bg-green">2</span>
              </li>
              <li class="list-group-item">
                <b>Jumlah Login</b> <span class="pull-right badge bg-maroon">32</span>
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
            <p class="text-muted">anton@gmail.com</p>

            <hr style="margin-top:2px;margin-bottom:8px;">

            <strong><i class="fa fa-map-marker margin-r-5"></i> Jenis Kelamin</strong>
            <p class="text-muted">Pria</p>

            <hr style="margin-top:2px;margin-bottom:8px;">


            <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>

          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            @if(Session::has('akses'))
              @if(Session::get('akses')!="administrator")
                <li id="tabHistoriTanggapan" class="active"><a href="#activity" data-toggle="tab">Histori Tanggapan</a></li>
                <li id="tabUbahProfile"><a href="#settings" data-toggle="tab">Ubah Profil</a></li>
              @else
                <li id="tabUbahProfile" class="active"><a href="#settings" data-toggle="tab">Ubah Profil</a></li>
              @endif
            @endif
          </ul>
          <div class="tab-content">
            @if(Session::has('akses'))
              @if(Session::get('akses')!="administrator")
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
              @else
                <div class="active tab-pane" id="settings">
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
              @endif
            @endif

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
