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

  <div class="modal fade" id="myModalHapus" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Akun SKPD</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin untuk menghapus akun ini?</p>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger btn-flat" id="sethapus">Ya, saya yakin</a>
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

  <div class="modal fade" id="myModalEdit" role="dialog">
    <div class="modal-dialog" style="width:500px;">
      <form class="form-horizontal" action="{{ url('managementakun/update') }}" method="post">
        {!! csrf_field() !!}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Akun SKPD</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-3 control-label">Level</label>
              <div class="col-sm-8">
                <input type="hidden" class="form-control" name="id_user" id="edit_id_user">
                <select class="form-control" name="level" id="edit_level">
                  <option value="">-- Pilih --</option>
                  <option value="0" id="leveladmin">Administrator</option>
                  <option value="2" id="levelskpd">User SKPD</option>
                </select>
              </div>
            </div>
            <div class="form-group" id="skpdedit">
              <label class="col-sm-3 control-label">SKPD</label>
              <div class="col-sm-8">
                <select class="form-control" name="id_skpd" id="edit_id_skpd">
                  <option value="" id="editskpd0">-- Pilih --</option>
                  @foreach($getskpd as $key)
                    <option value="{{ $key->id }}" id="editskpd{{ $key->id }}">{{ $key->kode_skpd }} - {{ $key->nama_skpd }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email SKPD</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="email_skpd" id="edit_email_skpd">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btn-flat">Simpan Perubahan</button>
          </div>
        </div>
    </form>
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
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Formulir Tambah Akun SKPD</h3>
            </div>
            <div class="box-body">
              <div class="col-md-14 {{ $errors->has('level') ? 'has-error' : '' }}">
                <label class="control-label">Level</label>
                <select class="form-control" name="level" id="leveluser">
                  <option value="-- Pilih --">-- Pilih --</option>
                  <option value="0" {{ old('level')=="0" ? 'selected' : '' }} >Administrator</option>
                  <option value="2" {{ old('level')=="2" ? 'selected' : '' }} >User SKPD</option>
                </select>
                @if($errors->has('level'))
                  <span class="help-block">
                    <i>* {{$errors->first('level')}}</i>
                  </span>
                @endif
              </div>
              <div id="skpdoption" class="col-md-14 {{ $errors->has('id_skpd') ? 'has-error' : '' }}">
                <label class="control-label">SKPD</label>
                <select class="form-control" name="id_skpd">
                  <option value="-- Pilih --">-- Pilih --</option>
                  @foreach($getskpd as $key)
                    <option value="{{ $key->id }}" {{ old('id_skpd')==$key->id ? 'selected' : '' }}>{{ $key->kode_skpd }} - {{ $key->nama_skpd }}</option>
                  @endforeach
                </select>
                @if($errors->has('id_skpd'))
                  <span class="help-block">
                    <i>* {{$errors->first('id_skpd')}}</i>
                  </span>
                @endif
              </div>
              <div class="col-md-14 {{ $errors->has('email') ? 'has-error' : '' }}">
                <label class="control-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email"
                @if($errors->has('email'))
                  value="{{ old('email') }}"
                @endif
                >
                @if($errors->has('email'))
                  <span class="help-block">
                    <i>* {{$errors->first('email')}}</i>
                  </span>
                @endif
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
      <div class="box box-primary">
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
              <th>Status Akun</th>
              <th>Aksi</th>
            </tr>
            @if($getakun->isEmpty())
              <tr>
                <td colspan="7" class="text-muted" style="text-align:center;">Akun SKPD belum tersedia.</td>
              </tr>
            @else
              <?php
                $no;
                if($getakun->currentPage()==1)
                  $no = 1;
                else
                  $no = (($getakun->currentPage() - 1) * $getakun->perPage())+1;
              ?>
              @foreach($getakun as $key)
                @if($key->email!=Auth::user()->email)
                  <tr>
                    <td>{{ $no }}.</td>
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
                      @if($key->flag_user!=0)
                        <span class="pull-center badge bg-blue">Aktif</span>
                      @else
                        <span class="pull-center badge">Tidak Aktif</span>
                      @endif
                    </td>
                    <td>
                      @if($key->flag_user!=0)
                        <span data-toggle="tooltip" title="Tidak Aktifkan Akun">
                          <a href="" class="btn btn-default btn-flat btn-xs nonaktif" data-toggle="modal" data-target="#myModalNonAktif" data-value="{{ $key->id }}"><i class="fa fa-ban"></i></a>
                        </span>
                      @else
                        <span data-toggle="tooltip" title="Aktifkan Akun">
                          <a href="" class="btn btn-primary btn-flat btn-xs aktif" data-toggle="modal" data-target="#myModalAktif" data-value="{{ $key->id }}"><i class="fa fa-check"></i></a>
                        </span>
                      @endif
                      <span data-toggle="tooltip" title="Ubah Akun">
                        <a href="" class="btn btn-warning btn-flat btn-xs edit" data-toggle="modal" data-target="#myModalEdit" data-value="{{ $key->id }}"><i class="fa fa-edit"></i></a>
                      </span>
                      <span data-toggle="tooltip" title="Delete Akun">
                        <a href="" class="btn btn-danger btn-flat btn-xs hapus" data-toggle="modal" data-target="#myModalHapus" data-value="{{ $key->id }}"><i class="fa fa-remove"></i></a>
                      </span>
                    </td>
                  </tr>
                  <?php $no++; ?>
                @endif
              @endforeach
            @endif
          </table>
        </div>
        <div class="box-footer">
          <div class="pagination pagination-sm no-margin pull-right">
            {{ $getakun->links() }}
          </div>
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

      $('a.hapus').click(function(){
        var a = $(this).data('value');
        $('#sethapus').attr('href', "{{ url('/') }}/managementakun/delete/"+a);
      });

      $('a.edit').click(function(){
        var a = $(this).data('value');
        $.ajax({
          url: "{{ url('/') }}/managementakun/bind/"+a,
          dataType: 'json',
          success: function(data){
            //get
            var id = data.id;
            var level = data.level;
            var id_skpd = data.id_skpd;
            var email = data.email;

            // set
            $('#edit_id_user').attr('value', id);
            $('#edit_email_skpd').attr('value', email);
            if(level==0) {
              $('#skpdedit').hide();
              $('#leveladmin').attr('selected', true);
              $('#editskpd0').attr('selected', true);
            }
            else if(level==2){
              $('#skpdedit').show();
              $('#levelskpd').attr('selected', true);
              $('#editskpd'+id_skpd).attr('selected', true);
            }
          }
        });
      });

      var leveluser = $('#leveluser').val();
      if(leveluser!=2) {
        $('#skpdoption').hide();
      }

      $('#leveluser').change(function(){
        if($(this).val() == '2') {
          $('#skpdoption').show();
        }
        else {
          $('#skpdoption').hide();
        }
      });

      $('#skpdedit').hide();
      $('#edit_level').change(function(){
        if($(this).val() == '2') {
          $('#skpdedit').show();
        }
        else {
          $('#skpdedit').hide();
        }
      });
    });
  </script>
@stop
