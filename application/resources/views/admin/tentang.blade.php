@extends('layouts.master')

@section('title')
  <title>Slider - SIMPEDU</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('breadcrumb')
  <h1>Tentang SIMPEDU</h1>
  <ol class="breadcrumb">
    <li class=""><a href="{{ url('/dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li class="active">Tentang Simpedu</li>
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
@if($tentang != null)
<div class="modal fade" id="myModalEdit" role="dialog">
  <div class="modal-dialog" style="width:700px;">
    <form class="form-horizontal" action="{{ url('admin/tentang/update') }}" method="post">
      {!! csrf_field() !!}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Tentang SIMPEDU</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-14 {{ $errors->has('isi_tentang') ? 'has-error' : '' }}">
            <label class="control-label" style="margin-bottom:10px;">Isikan Tentang Simpedu :</label>
            <textarea class="textarea" rows="5" name="isi_tentang" placeholder="isi dengan deskripsi singkat dari website SIMPEDU" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('isi_tentang')}}</textarea>
            <input type="hidden" name="id" value="{{ $tentang->id}}">
            <input type="hidden" name="id_users" value="{{ auth()->user()->id}}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
        </div>
      </div>
  </form>
  </div>
</div>
@endif
{{-- <!-- END DURATION TIME ALERT --> --}}
<div class="row">
  {{-- <!-- START MESSAGE --> --}}
  <div class="col-md-12">
    @if(Session::has('simpan'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
        <p>{{ Session::get('simpan') }}</p>
      </div>
    @endif
  </div>
  {{-- <!-- END MESSAGE --> --}}
  {{-- <!-- START FORM--> --}}
  @if($tentang == null)
  <form class="form-horizontal" method="post" action="{{ url('admin/tentang') }}">
    {{ csrf_field() }}
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Edit Deskripsi Simpedu</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="col-md-14 {{ $errors->has('isi_tentang') ? 'has-error' : '' }}">
              <label class="control-label" style="margin-bottom:10px;">Isikan Tentang Simpedu :</label>
              <textarea class="textarea" rows="5" name="isi_tentang" placeholder="isi dengan deskripsi singkat dari website SIMPEDU" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('isi_tentang')}}</textarea>
              <input type="hidden" name="id_users" value="{{ auth()->user()->id}}">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right btn-sm btn-flat">Simpan</button>
          </div>
        </div>
      </div>
  </form>
  @endif
  {{-- <!-- END FORM--> --}}

  {{-- <!-- START TABLE--> --}}
  @if($tentang != null)
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <img src="{{asset('images/logokabtangerang.png')}}">
        <h3 class="box-title">&nbsp;&nbsp;&nbsp;Tentang SIMPEDU</h3>
      </div>
      <div class="box-body clearfix">
        <blockquote class="pull-left">
          {!! $tentang->isi_tentang !!}
        </blockquote>
      </div>
      <div class="box box-footer">
        <span data-toggle="tooltip" title="Edit">
          <a href="" class="btn btn-warning btn-flat btn-xs edit" data-toggle="modal" data-target="#myModalEdit" data-value="{{ $tentang->id }}"><i class="fa fa-edit"></i> Ubah Tentang Simpedu</a>
        </span>
      </div>
    </div>
  </div>
  @endif
  {{-- <!-- START TABLE--> --}}
</div>

<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('/plugins/knob/jquery.knob.js') }}"></script>
<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
<script src="{{ asset('dist/js/app.min.js') }}"></script>

<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    $(".textarea").wysihtml5({
      toolbar: {
        "font-styles": true, //Font styling, e.g. h1, h2, etc.
        "emphasis": true, //Italics, bold, etc.
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.
        "html": false, //Button which allows you to edit the generated HTML.
        "link": false, //Button to insert a link.
        "image": false, //Button to insert an image.
        "color": false, //Button to change color of font
        "blockquote" : false
     }
    });
  });
</script>
@stop
