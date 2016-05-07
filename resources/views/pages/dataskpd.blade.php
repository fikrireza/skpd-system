<!-- GET CONTENT LAYOUT -->
@extends('layouts.master')

<!-- START CONDITION SECTION TITLE-->
@section('title')
    <title>Tambah Data SKPD</title>
@stop
<!-- END CONDITION SECTION TITLE-->

@section('breadcrumb')
  <h1>
      Master Data SKPD <small>Kelola Data SKPD</small>
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
          <h4 class="modal-title">Hapus Data SKPD</h4>
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
                <h3 class="box-title">Formulir Tambah Data SKPD</h3>
            </div>
            <div class="box-body">
              <div class="col-md-14 {{ $errors->has('kodeskpd') ? 'has-error' : '' }}">
                <label class="control-label">Kode SKPD</label>
                <input type="text" name="kodeskpd" class="form-control" placeholder="Kode SKPD">
              </div>
              <div class="col-md-14 {{ $errors->has('namaskpd') ? 'has-error' : '' }}">
                <label class="control-label">Nama SKPD</label>
                <input type="text" name="namaskpd" class="form-control" placeholder="Nama SKPD">
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
            Seluruh Data SKPD
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
              <th>Kode SKPD</th>
              <th>Nama SKPD</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            <tr>
              <td>1.</td>
              <td>SKPD001</td>
              <td>SPKD Kesehatan</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning btn-xs btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
                <a href="#" class="btn btn-info btn-xs btn-flat" data-toggle='tooltip' title='Non Aktifkan SKPD ?'><i class="fa fa-thumbs-o-up"></i></a>
              </td>
            </tr>
            <tr>
              <td>2.</td>
              <td>SKPD002</td>
              <td>SPKD Pendidikan</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning  btn-xs btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
                <a href="#" class="btn btn-info btn-xs btn-flat" data-toggle='tooltip' title='Non Aktifkan SKPD ?'><i class="fa fa-thumbs-o-up"></i></a>
              </td>
            </tr>
            <tr>
              <td>3.</td>
              <td>SKPD003</td>
              <td>SPKD Perhubungan</td>
              <td><span class="pull-center badge">Tidak Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning  btn-xs btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
                <a href="#" class="btn btn-info btn-xs btn-flat" data-toggle='tooltip' title='Non Aktifkan SKPD ?'><i class="fa fa-thumbs-o-up"></i></a>
              </td>
            </tr>
            <tr>
              <td>4.</td>
              <td>SKPD004</td>
              <td>SPKD Keuangan</td>
              <td><span class="pull-center badge">Tidak Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning  btn-xs btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
                <a href="#" class="btn btn-info btn-xs btn-flat" data-toggle='tooltip' title='Non Aktifkan SKPD ?'><i class="fa fa-thumbs-o-up"></i></a>
              </td>
            </tr>
            <tr>
              <td>5.</td>
              <td>SKPD005</td>
              <td>SPKD Perdagangan</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning  btn-xs btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
                <a href="#" class="btn btn-info btn-xs btn-flat" data-toggle='tooltip' title='Non Aktifkan SKPD ?'><i class="fa fa-thumbs-o-up"></i></a>
              </td>
            </tr>
            <tr>
              <td>6.</td>
              <td>SKPD006</td>
              <td>SPKD Pertanian</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning  btn-xs btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
                <a href="#" class="btn btn-info btn-xs btn-flat" data-toggle='tooltip' title='Non Aktifkan SKPD ?'><i class="fa fa-thumbs-o-up"></i></a>
              </td>
            </tr>
            <tr>
              <td>7.</td>
              <td>SKPD007</td>
              <td>SPKD Perindustrian</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning  btn-xs btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
                <a href="#" class="btn btn-info btn-xs btn-flat" data-toggle='tooltip' title='Non Aktifkan SKPD ?'><i class="fa fa-thumbs-o-up"></i></a>
              </td>
            </tr>
            <tr>
              <td>8.</td>
              <td>SKPD008</td>
              <td>SPKD Sosial</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning  btn-xs btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
                <a href="#" class="btn btn-info btn-xs btn-flat" data-toggle='tooltip' title='Non Aktifkan SKPD ?'><i class="fa fa-thumbs-o-up"></i></a>
              </td>
            </tr>
            <tr>
              <td>9.</td>
              <td>SKPD009</td>
              <td>SPKD Kebudayaan</td>
              <td><span class="pull-center badge bg-green">Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning  btn-xs btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
                <a href="#" class="btn btn-info btn-xs btn-flat" data-toggle='tooltip' title='Non Aktifkan SKPD ?'><i class="fa fa-thumbs-o-up"></i></a>
              </td>
            </tr>
            <tr>
              <td>10.</td>
              <td>SKPD0010</td>
              <td>SPKD Teknologi</td>
              <td><span class="pull-center badge">Tidak Aktif</span></td>
              <td>
                <a href="#" class="btn btn-warning  btn-xs btn-flat" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
                <a href="#" class="btn btn-info btn-xs btn-flat" data-toggle='tooltip' title='Non Aktifkan SKPD ?'><i class="fa fa-thumbs-o-up"></i></a>
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

  <script type="text/javascript">
    $(function(){
      $('a.hapus').click(function(){
        var a = $(this).data('value');
        // $('#set').attr('href', "{{ url('/') }}/masterbahasaasing/delete/"+a);
      });
    });
  </script>
@stop
