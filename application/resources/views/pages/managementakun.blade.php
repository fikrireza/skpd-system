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
  }, 5000);
</script>
<!-- END DURATION TIME ALERT -->

<!-- START MODAL TO ALERT DELETE-->
  <div class="modal fade" id="myModalNonAktif" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Non-Aktifkan Akun SKPD</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin untuk non-aktifkan akun ini?</p>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger btn-flat" id="setnonaktif">Ya, saya yakin</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModalAktif" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Aktifkan Akun SKPD</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin untuk mengaktifkan akun ini?</p>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger btn-flat" id="setaktif">Ya, saya yakin</a>
        </div>
      </div>
    </div>
  </div>
<!-- END MODAL TO ALERT DELETE-->


  <div class="row">
    <!-- START MESSAGE -->
    <div class="col-md-12">
      @if(Session::has('message'))
        <div class="alert alert-success panjang">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
          <p>{{ Session::get('message') }}</p>
        </div>
      @endif
    </div>
    <!-- END MESSAGE -->
    <!-- START FORM-->
    <form class="form-horizontal" method="post" action="{{ url('managementakun/create') }}">
      {{ csrf_field() }}
        <div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Formulir Tambah Akun SKPD</h3>
            </div>
            <div class="box-body">
              <div class="col-md-14 {{ $errors->has('level') ? 'has-error' : '' }}">
                <label class="control-label">Level</label>
                <select class="form-control" name="level" id="leveluser">
                  <option value="">-- Pilih Satu --</option>
                  <option value="0">Administrator</option>
                  <option value="2">User SKPD</option>
                </select>
              </div>
              <div id="skpdoption" class="col-md-14 {{ $errors->has('status') ? 'has-error' : '' }}">
                <label class="control-label">SKPD</label>
                <select class="form-control" name="id_skpd">
                  <option value="">-- Pilih --</option>
                  @foreach($getskpd as $key)
                    <option value="{{ $key->id }}">{{ $key->kode_skpd }} - {{ $key->nama_skpd }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-14 {{ $errors->has('username') ? 'has-error' : '' }}">
                <label class="control-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
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
      <div class="box box-warning">
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
            <tr class="bg-yellow">
              <th style="width:10px;">No</th>
              <th>Email</th>
              <th>Level</th>
              <th>Nama SKPD</th>
              <th>Aktifasi</th>
              <th>Jumlah Login</th>
              <th>Aksi</th>
            </tr>
            @if($getakun->isEmpty())

            @else
              @foreach($getakun as $key)
                <tr>
                  <td>#</td>
                  <td>{{ $key->email }}</td>
                  <td>
                    @if($key->level==0)
                      {{ 'Administrator' }}
                    @elseif($key->level==2)
                      {{ 'User SKPD' }}
                    @endif
                  </td>
                  <td>
                    @if($key->id_skpd=="")
                      {{ '-' }}
                    @else
                      {{ $key->masterskpd->nama_skpd }}
                    @endif
                  </td>
                  <td>
                    @if($key->activated==0)
                      <span class="pull-center badge">Belum Aktifasi</span>
                    @elseif($key->activated==1)
                      <span class="pull-center badge bg-green">Sudah Aktifasi</span>
                    @endif
                  </td>
                  <td>
                    @if($key->login_counter!=0)
                      <span class="pull-center badge bg-maroon">{{ $key->login_counter }}</span>
                    @else
                      <span class="pull-center badge">{{ $key->login_counter }}</span>
                    @endif
                  </td>
                  <td>
                    <span data-toggle="tooltip" title="Edit Data">
                      <a href="" class="btn btn-warning btn-flat btn-xs" data-toggle="modal" data-target="#myModalEdit" data-value="#"><i class="fa fa-edit"></i></a>
                    </span>
                    <span data-toggle="tooltip" title="Hapus Data">
                      <a href="" class="btn btn-danger btn-flat btn-xs nonaktif" data-toggle="modal" data-target="#myModalNonAktif" data-value="{{ $key->id }}"><i class="fa fa-remove"></i></a>
                    </span>
                  </td>
                </tr>
              @endforeach
            @endif
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
      $('a.nonaktif').click(function(){
        var a = $(this).data('value');
        $('#setnonaktif').attr('href', "{{ url('/') }}/managementakun/nonaktif/"+a);
      });
      $('a.aktif').click(function(){
        var a = $(this).data('value');
        $('#setaktif').attr('href', "{{ url('/') }}/managementakun/aktif/"+a);
      });

      $('#skpdoption').hide();
      $('#leveluser').change(function(){
        if($(this).val() == '2') {
          $('#skpdoption').show();
        }
        else if($(this).val() == '0') {
          $('#skpdoption').hide();
        }
      });
    });
  </script>
@stop