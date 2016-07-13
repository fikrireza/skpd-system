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
  <div class="modal fade" id="myModalEdit" role="dialog">
    <div class="modal-dialog" style="width:500px;">
      <form class="form-horizontal" action="{{ url('dataskpd/update') }}" method="post">
        {!! csrf_field() !!}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Data SKPD</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-3 control-label">Kode SKPD</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="kodeskpd" id="kodeskpd">
                <input type="hidden" class="form-control" name="idskpd" id="idskpd">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nama SKPD</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="namaskpd" id="namaskpd">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Status</label>
              <div class="col-sm-8">
                <select class="form-control" name="flagskpd">
                  <option value="1" id="flagskpdaktif">Aktif</option>
                  <option value="0" id="flagskpdnonaktif">Tidak Aktif</option>
                </select>
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
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger  btn-flat" id="sethapus">Ya, saya yakin</a>
        </div>
      </div>
    </div>
  </div>
<!-- END MODAL TO ALERT DELETE-->

<!-- START MODAL TO ALERT DELETE-->
  <div class="modal fade" id="myModalAktif" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Aktif Data SKPD</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin untuk mengaktifkan data SKPD ini?</p>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger btn-flat" id="setaktif">Ya, saya yakin</a>
        </div>
      </div>
    </div>
  </div>
<!-- END MODAL TO ALERT DELETE-->

<!-- START MODAL TO ALERT NONAKTIF-->
  <div class="modal fade" id="myModalNonAktif" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Aktif Data SKPD</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin untuk me-nonaktifkan data SKPD ini?</p>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger btn-flat" id="setnonaktif">Ya, saya yakin</a>
        </div>
      </div>
    </div>
  </div>
<!-- END MODAL TO ALERT NONAKTIF-->


  <div class="row">
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

    <!-- START FORM-->
    <form class="form-horizontal" method="post" action="{{ route('dataskpd.store') }}">
      {!! csrf_field(); !!}
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Formulir Tambah Data SKPD</h3>
            </div>
            <div class="box-body">
              <div class="col-md-12 {{ $errors->has('kodeskpd') ? 'has-error' : '' }}">
                <label class="control-label">Kode SKPD</label>
                <input type="text" name="kodeskpd" class="form-control" placeholder="Kode SKPD"
                @if(!$errors->has('kodeskpd'))
                  value="{{ old('kodeskpd') }}"
                @endif
                >
                @if($errors->has('kodeskpd'))
                  <span class="help-block">
                    <i>* {{$errors->first('kodeskpd')}}</i>
                  </span>
                @endif
              </div>
              <div class="col-md-12 {{ $errors->has('namaskpd') ? 'has-error' : '' }}">
                <label class="control-label">Nama SKPD</label>
                <input type="text" name="namaskpd" class="form-control" placeholder="Nama SKPD"
                @if(!$errors->has('namaskpd'))
                  value="{{ old('namaskpd') }}"
                @endif
                >
                @if($errors->has('namaskpd'))
                  <span class="help-block">
                    <i>* {{$errors->first('namaskpd')}}</i>
                  </span>
                @endif
              </div>
              <div class="col-md-12">
                <label class="control-label">Status</label>
                <select class="form-control" name="flagskpd">
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
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
      <div class="box box-primary">
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
            <tr class="bg-yellow">
              <th style="width:10px;">No</th>
              <th>Kode SKPD</th>
              <th>Nama SKPD</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            <?php
              $no;
              if($getskpd->currentPage()==1)
                $no = 1;
              else
                $no = (($getskpd->currentPage() - 1) * $getskpd->perPage())+1;
            ?>
            @if($getskpd->isEmpty())
              <tr>
                <td colspan="5" class="text-muted" style="text-align:center;"><i>Data SKPD tidak tersedia.</i></td>
              </tr>
            @else
              @foreach($getskpd as $key)
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $key->kode_skpd }}</td>
                  <td>{{ $key->nama_skpd }}</td>
                  <td>
                    @if($key->flag_skpd==1)
                      <span class="pull-center badge bg-green">Aktif</span>
                    @else
                      <span class="pull-center badge">Tidak Aktif</span>
                    @endif
                  </td>
                  <td>
                    @if($key->flag_skpd==1)
                      <span data-toggle="tooltip" title="Tidak Aktifkan SKPD">
                        <a href="" data-value="{{ $key->id }}" class="btn btn-default btn-xs btn-flat nonaktif" data-toggle="modal" data-target="#myModalNonAktif" data-value="#"><i class="fa fa-ban"></i></a>
                      </span>
                    @else
                      <span data-toggle="tooltip" title="Aktifkan SKPD">
                        <a href="" data-value="{{ $key->id }}" class="btn btn-primary btn-xs btn-flat aktif" data-toggle="modal" data-target="#myModalAktif" data-value="#"><i class="fa fa-check-square-o"></i></a>
                      </span>
                    @endif
                    <span data-toggle="tooltip" title="Ubah Data">
                      <a href="" data-value="{{ $key->id }}" class="btn btn-warning btn-xs btn-flat edit" data-toggle="modal" data-target="#myModalEdit"><i class="fa fa-edit"></i></a>
                    </span>
                    <span data-toggle="tooltip" title="Hapus Data">
                      <a href="" data-value="{{ $key->id }}" class="btn btn-danger btn-xs btn-flat hapus" data-toggle="modal" data-target="#myModal"><i class="fa fa-remove"></i></a>
                    </span>
                  </td>
                </tr>
                <?php $no++; ?>
              @endforeach
            @endif
          </table>
        </div>
        <div class="box-footer">
          <div class="pagination pagination-sm no-margin pull-right">
            {{ $getskpd->links() }}
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

  <script type="text/javascript">
    $(function(){
      $('a.hapus').click(function(){
        var a = $(this).data('value');
        $('#sethapus').attr('href', "{{ url('/') }}/dataskpd/delete/"+a);
      });

      $('a.nonaktif').click(function(){
        var a = $(this).data('value');
        $('#setnonaktif').attr('href', "{{ url('/') }}/dataskpd/nonaktif/"+a);
      });

      $('a.aktif').click(function(){
        var a = $(this).data('value');
        $('#setaktif').attr('href', "{{ url('/') }}/dataskpd/aktif/"+a);
      });

      $('a.edit').click(function(){
        var a = $(this).data('value');
        $.ajax({
          url: "{{ url('/') }}/dataskpd/bind/"+a,
          dataType: 'json',
          success: function(data){
            //get
            var id = data.id;
            var kode_skpd = data.kode_skpd;
            var nama_skpd = data.nama_skpd;
            var flag_skpd = data.flag_skpd;

            // set
            $('#idskpd').attr('value', id);
            $('#kodeskpd').attr('value', kode_skpd);
            $('#namaskpd').attr('value', nama_skpd);
            if(flag_skpd==1) {
              $('#flagskpdaktif').attr('selected', true);
            }
            else {
              $('#flagskpdnonaktif').attr('selected', true);
            }
          }
        });
      });
    });
  </script>
@stop
