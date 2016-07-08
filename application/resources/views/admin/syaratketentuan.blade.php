@extends('layouts.master')

@section('title')
  <title>Slider - SIMPEDU</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('breadcrumb')
  <h1>Syarat & Ketentuan SIMPEDU</h1>
  <ol class="breadcrumb">
    <li class=""><a href="{{ url('/dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
  </ol>
@stop

@section('content')
{{-- <!-- START DURATION TIME ALERT --> --}}
<script>
  window.setTimeout(function() {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
  }, 4000);
</script>
@if($syarat != null)
<div class="modal fade" id="myModalEdit" role="dialog">
  <div class="modal-dialog" style="width:500px;">
    <form class="form-horizontal" action="{{ url('admin/syaratketentuan/update') }}" method="post">
      {!! csrf_field() !!}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Syarat & Ketentuan SIMPEDU</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-14 {{ $errors->has('isi_syarat') ? 'has-error' : '' }}">
            <label class="control-label">Isikan Syarat & Ketentuan Simpedu</label>
            <textarea class="textarea" rows="5" name="isi_syarat" placeholder="Isi Syarat & Ketentuan SIMPEDU...?" style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('isi_syarat')}}</textarea>
            <input type="hidden" name="id" value="{{ $syarat->id}}">
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
  @if($syarat == null)
  <form class="form-horizontal" method="post" action="{{ url('admin/syaratketentuan') }}">
    {{ csrf_field() }}
      <div class="col-md-4">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Syarat & Ketentuan</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="col-md-14 {{ $errors->has('isi_syarat') ? 'has-error' : '' }}">
              <label class="control-label">Isikan Syarat & Ketentuan Simpedu</label>
              <textarea class="textarea" rows="5" name="isi_syarat" placeholder="Isi Syarat & Ketentuan SIMPEDU...?" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('isi_syarat')}}</textarea>
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
  @if($syarat != null)
  <div class="col-md-8">
    <div class="box box-solid">
      <div class="box-header with-border">
        <img src="{{asset('images/logokabtangerang.png')}}">
        <h3 class="box-title">&nbsp;&nbsp;&nbsp;Syarat & Ketentuan SIMPEDU</h3>
      </div>
      <div class="box-body clearfix">
        <blockquote class="pull-left">
          {!! $syarat->isi_syarat !!}
        </blockquote>
      </div>
      <div class="box box-footer">
        <span data-toggle="tooltip" title="Edit">
          <a href="" class="btn btn-warning btn-flat btn-xs edit" data-toggle="modal" data-target="#myModalEdit" data-value="{{ $syarat->id }}"><i class="fa fa-edit"></i> Ubah Syarat & Ketentuan SIMPEDU</a>
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
