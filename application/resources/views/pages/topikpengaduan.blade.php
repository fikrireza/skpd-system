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
  <div class="modal fade" id="myModalHapus" role="dialog">
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
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger  btn-flat" id="sethapus">Ya, saya yakin</a>
        </div>
      </div>
    </div>
  </div>
<!-- END MODAL TO ALERT DELETE-->

<!-- START MODAL TO ALERT DELETE-->
  <div class="modal fade" id="myModalEdit" role="dialog">
    <div class="modal-dialog" style="width:500px;">
      <form class="form-horizontal" action="{{ url('topikpengaduan/update') }}" method="post">
        {!! csrf_field() !!}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Data Topik Pengaduan</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-4 control-label">Kode Topik Aduan</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="kode_topik" id="kode_topik">
                <input type="hidden" class="form-control" name="id_topik" id="id_topik">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Nama Topik Aduan</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="nama_topik" id="nama_topik">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">SKPD</label>
              <div class="col-sm-7">
                <select class="form-control" name="id_skpd">
                  @foreach($getskpd as $key)
                    <option value="{{ $key->id }}" id="skpd{{$key->id}}">{{ $key->kode_skpd }} - {{ $key->nama_skpd }}</option>
                  @endforeach
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
    <form class="form-horizontal" method="post" action="#">
      {{ csrf_field() }}
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Formulir Tambah Data Topik Pengaduan</h3>
            </div>
            <div class="box-body">
              <div class="col-md-14 {{ $errors->has('kodepengaduan') ? 'has-error' : '' }}">
                <label class="control-label">Kode Topik Pengaduan</label>
                <input type="text" name="kodepengaduan" class="form-control" placeholder="Kode Topik Pengaduan"
                @if(!$errors->has('kodepengaduan'))
                  value="{{ old('kodepengaduan') }}"
                @endif
                >
                @if($errors->has('kodepengaduan'))
                  <span class="help-block">
                    <i>* {{$errors->first('kodepengaduan')}}</i>
                  </span>
                @endif
              </div>
              <div class="col-md-14 {{ $errors->has('namapengaduan') ? 'has-error' : '' }}">
                <label class="control-label">Nama Topik Pengaduan</label>
                <input type="text" name="namapengaduan" class="form-control" placeholder="Nama Topik Pengaduan"
                @if(!$errors->has('namapengaduan'))
                  value="{{ old('namapengaduan') }}"
                @endif
                >
                @if($errors->has('namapengaduan'))
                  <span class="help-block">
                    <i>* {{$errors->first('namapengaduan')}}</i>
                  </span>
                @endif
              </div>
              <div class="col-md-14 {{ $errors->has('idskpd') ? 'has-error' : '' }}">
                <label class="control-label">SKPD</label>
                <select class="form-control" name="idskpd">
                  <option value="-- Pilih --">-- Pilih --</option>
                  @foreach($getskpd as $key)
                    <option value="{{ $key->id }}">{{ $key->kode_skpd }} - {{ $key->nama_skpd }}</option>
                  @endforeach
                </select>
                @if($errors->has('idskpd'))
                  <span class="help-block">
                    <i>* {{$errors->first('idskpd')}}</i>
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
            Seluruh Data Topik Pengaduan
          </div>
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
          </div><!-- /.box-tools -->
        </div>
        <div class="box-body no-padding">
          <table class="table table-hover">
            <tr class="bg-yellow">
              <th style="width:10px;">#</th>
              <th>Kode Topik Pengaduan</th>
              <th>Nama Topik Pengaduan</th>
              <th>Nama SKPD</th>
              <th>Aksi</th>
            </tr>
            @if($gettopik->isEmpty())
              <tr>
                <td colspan="5" class="text-muted" style="text-align:center;"><i>Data topik pengaduan tidak tersedia.</i></td>
              </tr>
            @else
              <?php
                $no;
                if($gettopik->currentPage()==1)
                  $no = 1;
                else
                  $no = (($gettopik->currentPage() - 1) * $gettopik->perPage())+1;
              ?>
              @foreach($gettopik as $key)
                <tr>
                  <td>{{ $no }}.</td>
                  <td>{{ $key->kode_topik }}</td>
                  <td>{{ $key->nama_topik }}</td>
                  <td>{{ $key->masterskpd->nama_skpd }}</td>
                  <td>
                    <span data-toggle="tooltip" title="Ubah Data">
                      <a href="" data-value="{{ $key->id }}" class="btn btn-warning btn-flat btn-xs edit" data-toggle="modal" data-target="#myModalEdit"><i class="fa fa-edit"></i></a>
                    </span>
                    <span data-toggle="tooltip" title="Hapus Data">
                      <a href="" data-value="{{ $key->id }}" class="btn btn-danger btn-flat btn-xs hapus" data-toggle="modal" data-target="#myModalHapus" data-value="#"><i class="fa fa-remove"></i></a>
                    </span>
                  </td>
                </tr>
                <?php $no++; ?>
              @endforeach
            @endif
          </table>
        </div>
        <div class="box-footer">
          <div class="pull-right">
            {{ $gettopik->links() }}
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
      $('a.hapus').click(function(){
        var a = $(this).data('value');
        $('#sethapus').attr('href', "{{ url('/') }}/topikpengaduan/delete/"+a);
      });

      $('a.edit').click(function(){
        var a = $(this).data('value');
        $.ajax({
          url: "{{ url('/') }}/topikpengaduan/bind/"+a,
          dataType: 'json',
          success: function(data){
            //get
            var id = data.id;
            var kode_topik = data.kode_topik;
            var nama_topik = data.nama_topik;
            var id_skpd = data.id_skpd;

            // set
            $('#id_topik').attr('value', id);
            $('#kode_topik').attr('value', kode_topik);
            $('#nama_topik').attr('value', nama_topik);
            $('option#skpd'+id_skpd).attr('selected', true);
          }
        });
      })
    });
  </script>
@stop
