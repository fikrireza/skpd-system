@extends('layouts.master')

@section('title')
  <title>Histori Pengaduan - SIMPEDU</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('breadcrumb')
  <h1>Slider dan Quotes</h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
  </ol>
@stop

@section('content')
{{-- <!-- START DURATION TIME ALERT --> --}}
<script>
  window.setTimeout(function() {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
  }, 5000);
</script>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Data Slider</h4>
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

{{-- <!-- END DURATION TIME ALERT --> --}}
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
  <form class="form-horizontal" method="post" action="{{ url('admin/slider') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Tambah Gambar Slider</h3>
          </div>
          <div class="box-body">
            <div class="col-md-14 {{ $errors->has('url_gambar') ? 'has-error' : '' }}">
              <label class="control-label">Pilih Gambar Slider</label>
              <input type="file" name="url_gambar" accept=".jpg, .png, .bmp">
              <font color="red"><small>*Ukuran Gambar 900px X 500px</small></font>
              @if($errors->has('url_gambar'))
                <span class="help-block">
                  <strong>{{ $errors->first('url_gambar')}}
                  </strong>
                </span>
              @endif
              <input type="hidden" name="id_users" value="{{ auth()->user()->id}}">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right btn-sm btn-flat">Simpan</button>
          </div>
        </div>
      </div>
  </form>
  {{-- <!-- END FORM--> --}}

  {{-- <!-- START TABLE--> --}}
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="box-title">
          Gambar Slider
        </div>
      </div>
      <div class="box-body no-padding">
        <table class="table table-hover">
          <tr class="bg-yellow">
            <th style="width:10px;">No</th>
            <th>Gambar</th>
            <th>User</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          <?php $no = 1;?>
          @foreach($sliders as $slider)
          <tr>
            <td>{{ $no++ }}</td>
            <td><img src="{{ asset('/images/'.$slider->url_gambar) }}" width="200px"></td>
            <td>{{ $slider->nama }}</td>
            <td>
                @if($slider->flag_slider == 1)
                  <span class="label bg-primary">
                    Aktif
                  </span>
                @elseif($slider->flag_slider == 0)
                  <span class="label bg-red">
                    Tidak Aktif
                  </span>
                @endif
            </td>
            <td>
              @if($slider->flag_slider == 1)
                <span data-toggle="tooltip" title="Tidak Aktifkan">
                  <a href="{{ url('/admin/slider', $slider->id) }}" class="btn btn-default bg-marron btn-flat btn-xs"><i class="fa fa-ban"></i></a>
                </span>
              @elseif($slider->flag_slider == 0)
                <span data-toggle="tooltip" title="Aktifkan">
                  <a href="{{ url('/admin/slider', $slider->id) }}" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-check"></i></a>
                </span>
              @endif
              <span data-toggle="tooltip" title="Hapus">
                <a href="#" data-value="{{ $slider->id }}" class="btn btn-danger bg-marron btn-flat btn-xs hapus" data-toggle="modal" data-target="#myModal"><i class="fa fa-close"></i></a>
              </span>
            </td>
          <tr>
          @endforeach
        </table>
      </div>
      <div class="box-footer">
        <div class="pagination pagination-sm no-margin pull-right">

        </div>
      </div>
    </div>
  </div>
  {{-- <!-- START TABLE--> --}}
</div>


<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/plugins/knob/jquery.knob.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>

<script>
  $(function(){
    $('a.hapus').click(function(){
      var a = $(this).data('value');
      $('#sethapus').attr('href', "{{ url('/') }}/admin/deleteslider/"+a);
    });
  });
</script>
@stop
