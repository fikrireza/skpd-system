<!-- GET CONTENT LAYOUT -->
@extends('layouts.master')

<!-- START CONDITION SECTION TITLE-->
@section('title')
    <title>Tambah Data Topik Pengaduan</title>
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@stop
<!-- END CONDITION SECTION TITLE-->
@section('breadcrumb')
  <h1>
      Master Data Topik Pengaduan <small>Kelola Data Topik Pengaduan</small>
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
          <h4 class="modal-title">Hapus Data Topik Pengaduan</h4>
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
                <h3 class="box-title">Formulir Tambah Data Topik Pengaduan</h3>
            </div>
            <div class="box-body">
              <div class="col-md-14 {{ $errors->has('bahasa') ? 'has-error' : '' }}">
                <label class="control-label">Kode Topik Pengaduan</label>
                <input type="text" name="kodepengaduan" class="form-control" placeholder="Kode Topik Pengaduan">
              </div>
              <div class="col-md-14 {{ $errors->has('bahasa') ? 'has-error' : '' }}">
                <label class="control-label">Nama Topik Pengaduan</label>
                <input type="text" name="namapengaduan" class="form-control" placeholder="Nama Topik Pengaduan">
              </div>
              <div class="col-md-14 {{ $errors->has('skpd') ? 'has-error' : '' }}">
                <label class="control-label">SKPD</label>
                <select class="form-control" name="skpd">
                  <option value="">-- Pilih Satu --</option>
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
            Seluruh Data Topik Pengaduan
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
              <th>Kode Topik Pengaduan</th>
              <th>Nama Topik Pengaduan</th>
              <th>Nama SKPD</th>
              {{-- <th>Wajib Proses</th> --}}
              <th>Aksi</th>
            </tr>
            <tr>
              <td>1.</td>
              <td>TPP001</td>
              <td>TOPIK Kesehatan</td>
              <td>SKPD Kesehatan</td>
              {{-- <td><span class="pull-center badge bg-green">Ya</span></td> --}}
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>2.</td>
              <td>TPP002</td>
              <td>TOPIK Pendidikan</td>
              <td>SPKD Pendidikan</td>
              {{-- <td><span class="pull-center badge">Tidak</span></td> --}}
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>3.</td>
              <td>TPP003</td>
              <td>TOPIK Perhubungan</td>
              <td>SPKD Perhubungan</td>
              {{-- <td><span class="pull-center badge">Tidak</span></td> --}}
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>4.</td>
              <td>TPP004</td>
              <td>TOPIK Keuangan</td>
              <td>SPKD Keuangan</td>
              {{-- <td><span class="pull-center badge">Tidak</span></td> --}}
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>5.</td>
              <td>TPP005</td>
              <td>TOPIK Perdagangan</td>
              <td>SPKD Perdagangan</td>
              {{-- <td><span class="pull-center badge bg-green">Ya</span></td> --}}
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>6.</td>
              <td>TPP006</td>
              <td>TOPIK Pertanian</td>
              <td>SPKD Pertanian</td>
              {{-- <td><span class="pull-center badge bg-green">Ya</span></td> --}}
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>7.</td>
              <td>TPP007</td>
              <td>TOPIK Perindustrian</td>
              <td>SPKD Perindustrian</td>
              {{-- <td><span class="pull-center badge bg-green">Ya</span></td> --}}
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>8.</td>
              <td>TPP008</td>
              <td>TOPIK Sosial</td>
              <td>SPKD Sosial</td>
              {{-- <td><span class="pull-center badge bg-green">Ya</span></td> --}}
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>9.</td>
              <td>TPP009</td>
              <td>TOPIK Kebudayaan</td>
              <td>SPKD Kebudayaan</td>
              {{-- <td><span class="pull-center badge bg-green">Ya</span></td> --}}
              <td>
                <a href="#" class="btn btn-warning btn-flat btn-xs" data-toggle='tooltip' title='Edit Data'><i class="fa fa-edit"></i></a>
                <span data-toggle="tooltip" title="Hapus Data">
                  <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-remove"></i></a>
                </span>
              </td>
            </tr>
            <tr>
              <td>10.</td>
              <td>TPP0010</td>
              <td>TOPIK Teknologi</td>
              <td>SPKD Teknologi</td>
              {{-- <td><span class="pull-center badge">Tidak</span></td> --}}
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
