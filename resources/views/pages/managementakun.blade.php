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
  <div class="modal fade" id="myModal" role="dialog">
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
          <button type="reset" class="btn btn-primary pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger  btn-flat" id="set">Ya, saya yakin</button>
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
                <label class="control-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>
              <div class="col-md-14 {{ $errors->has('level') ? 'has-error' : '' }}">
                <label class="control-label">Level</label>
                <select class="form-control" name="level">
                  <option value="">-- Pilih Satu --</option>
                  <option value="admin">Administrator</option>
                  <option value="userskpd">User SKPD</option>
                </select>
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
              <th>Email</th>
              <th>Nama SKPD</th>
              <th>Level</th>
              <th>Status Akun Aktif ?</th>
              <th>Aksi</th>
            </tr>
            <tr>
              <td>1.</td>
              <td>SPKDKesehatan@gmail.com</td>
              <td>SKPD001 - SPKD Kesehatan</td>
              <td>Administrator</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>

            <tr>
              <td>2.</td>
              <td>SPKDPendidikan@gmail.com</td>
              <td>SKPD002 - SPKD Pendidikan</td>
              <td>User SKPD</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>3.</td>
              <td>SPKDPerhubungan@gmail.com</td>
              <td>SKPD003 - SPKD Perhubungan</td>
              <td>Administrator</td>
              <td><span class="pull-center badge">Tidak Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>4.</td>
              <td>SPKDKeuangan@gmail.com</td>
              <td>SKPD004 - SPKD Keuangan</td>
              <td>User SKPD</td>
              <td><span class="pull-center badge">Tidak Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>5.</td>
              <td>SPKDPerdagangan@gmail.com</td>
              <td>SKPD005 - SPKD Perdagangan</td>
              <td>Administrator</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>6.</td>
              <td>SPKDPertanian@gmail.com</td>
              <td>SKPD006 - SPKD Pertanian</td>
              <td>Administrator</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>7.</td>
              <td>SPKDPerindustrian@gmail.com</td>
              <td>SKPD007 - SPKD Perindustrian</td>
              <td>User SKPD</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>8.</td>
              <td>SPKDSosial@gmail.com</td>
              <td>SKPD008 - SPKD Sosial</td>
              <td>User SKPD</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>9.</td>
              <td>SPKDKebudayaan@gmail.com</td>
              <td>SKPD009 - SPKD Kebudayaan</td>
              <td>User SKPD</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>10.</td>
              <td>SPKDTeknologi@gmail.com</td>
              <td>SKPD0010 - SPKD Teknologi</td>
              <td>Administrator</td>
              <td><span class="pull-center badge">Tidak Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
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
