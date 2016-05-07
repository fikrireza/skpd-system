<!-- GET CONTENT LAYOUT -->
@extends('layouts.master')

<!-- START CONDITION SECTION TITLE-->
@section('title')
    <title>Tambah Data SKPD</title>
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@stop
<!-- END CONDITION SECTION TITLE-->

@section('breadcrumb')
  <h1>
      Control Panel <small>Kelola Data Akun SKPD</small>
  </h1>
  <ol class="breadcrumb">
    <li>
        <a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Halaman Utama</a>
    </li>
  </ol>
@stop

@section('content')

<!-- START DURATION TIME ALERT -->
<script>
  window.setTimeout(function() {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
  }, 2000);
</script>
<!-- END DURATION TIME ALERT -->

  <!-- START MODAL TO ALERT DELETE-->
  <div class="modal modal-warning fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Akun SKPD</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin untuk menghapus data ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
          <a href="{{url('managementakun')}}" class="btn btn btn-outline" id="set">Ya, saya yakin.</a>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL TO ALERT DELETE-->

  <!-- START MESSAGE -->
  <div class="col-md-12">
    @if(Session::has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
        <p>{{ Session::get('message') }}</p>
      </div>
    @endif
  </div>
  <!-- END MESSAGE -->

  <div class="row">
    <!-- START FORM-->
    <form class="form-horizontal" method="post" action="#">
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Formulir Tambah Akun SKPD</h3>
            </div>
            <div class="box-body">
              <div class="col-md-14 {{ $errors->has('status') ? 'has-error' : '' }}">
                <label class="control-label">SKPD</label>
                <select class="form-control" name="status">
                  <option value="">-- Pilih Satu --</option>
                </select>
              </div>
              <div class="col-md-14 {{ $errors->has('username') ? 'has-error' : '' }}">
                <label class="control-label">Username</label>
                <input type="text" name="namaskpd" class="form-control" placeholder="Username">
              </div>
              <div class="col-md-14 {{ $errors->has('password') ? 'has-error' : '' }}">
                <label class="control-label">password</label>
                <input type="password" name="namaskpd" class="form-control" placeholder="Password">
              </div>
              <div class="col-md-14 {{ $errors->has('password') ? 'has-error' : '' }}">
                <label class="control-label">Konfirmasi password</label>
                <input type="text" name="namaskpd" class="form-control" placeholder="Konfirmasi Password">
              </div>
              <div class="col-md-14 {{ $errors->has('level') ? 'has-error' : '' }}">
                <label class="control-label">Level</label>
                <select class="form-control" name="level">
                  <option value="">-- Pilih Satu --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
              <div class="col-md-14 {{ $errors->has('merokok') ? 'has-error' : '' }}">
                <label class="control-label">Akun Akan Diaktifkan ?</label>
                <div class="form-group">
                  &nbsp;&nbsp;&nbsp;
                  <label>
                    <input type="radio" name="aktif" class="minimal" value="Ya">
                  </label>
                  &nbsp;
                  <label>Ya</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                    <input type="radio" name="aktif" class="minimal" value="Tidak">
                  </label>
                  &nbsp;
                  <label>Tidak</label>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="reset" class="btn btn-default btn-sm btn-flat">Reset Formulir</button>
              <button type="submit" class="btn btn-success pull-right btn-sm btn-flat">Simpan</button>
            </div>
          </div>
        </div>
    </form>
    <!-- END FORM-->
    <!-- START TABLE-->
    <div class="col-md-8">
      <div class="box box-success">
        <div class="box-header with-border">
          <div class="box-title">
            Seluruh Data Akun SKPD
          </div>
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
          </div><!-- /.box-tools -->
        </div>
        <div class="box-body no-padding">
          <table class="table table-hover">
            <tr class="bg-green">
              <th style="width:10px;">No</th>
              <th>Nama SKPD</th>
              <th>Level</th>
              <th>Status Akun Aktif ?</th>
              <th>Aksi</th>
            </tr>
            <tr>
              <td>1.</td>
              <td>SKPD001 - SPKD Kesehatan</td>
              <td>3</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>

            <tr>
              <td>2.</td>
              <td>SKPD002 - SPKD Pendidikan</td>
              <td>4</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>3.</td>
              <td>SKPD003 - SPKD Perhubungan</td>
              <td>1</td>
              <td><span class="pull-center badge">Tidak Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>4.</td>
              <td>SKPD004 - SPKD Keuangan</td>
              <td>1</td>
              <td><span class="pull-center badge">Tidak Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>5.</td>
              <td>SKPD005 - SPKD Perdagangan</td>
              <td>3</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>6.</td>
              <td>SKPD006 - SPKD Pertanian</td>
              <td>3</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>7.</td>
              <td>SKPD007 - SPKD Perindustrian</td>
              <td>4</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>8.</td>
              <td>SKPD008 - SPKD Sosial</td>
              <td>4</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>9.</td>
              <td>SKPD009 - SPKD Kebudayaan</td>
              <td>2</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>10.</td>
              <td>SKPD0010 - SPKD Teknologi</td>
              <td>4</td>
              <td><span class="pull-center badge">Tidak Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
          </table>
        </div>
        <div class="box-footer">
          <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- START TABLE-->
  </div>
  <!-- END FORM -->



  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>

  <!-- iCheck -->
  <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>

  <script type="text/javascript">
    $(function(){
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-green',
        radioClass: 'iradio_minimal-green'
      });
    });
  </script>

  <script type="text/javascript">
    $(function(){
      $('a.hapus').click(function(){
        var a = $(this).data('value');
        // $('#set').attr('href', "{{ url('/') }}/masterbahasaasing/delete/"+a);
      });
    });
  </script>
@stop
