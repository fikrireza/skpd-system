@section('headScript')
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
@stop

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ajukan Keluhan Anda</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form" action="{{ route('sendpengaduan')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="warga_id" class="form-control" placeholder="Judul Pengaduan" value="{{auth()->user()->id}}">
    <div class="box-body">
      <div class="form-group{{ $errors->has('topik') ? 'has-error' : '' }}">
        <label>Kategori Pengaduan</label>
        {!! Form::select('topik', $topiks, null, ['class' => 'form-control select2', 'placeholder' => '-- Pilih Kategori --']) !!}
        @if($errors->has('topik'))
          <span class="help-block">
            <strong>{{$errors->first('topik')}}</strong>
          </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
        <label>Tuliskan Judul Pengaduan Anda</label>
        <input type="text" name="judul" class="form-control" placeholder="Judul Pengaduan" value="{{old('judul')}}">
        @if($errors->has('judul'))
          <span class="help-block">
            <strong>{{ $errors->first('judul')}}</strong>
          </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('isi') ? 'has-error' : '' }}">
        <label>Tuliskan Pengaduan Anda</label>
        <textarea class="form-control" rows="5" name="isi" placeholder="Apa Laporan Anda...?">{{ old('isi')}}</textarea>
        @if($errors->has('isi'))
          <span class="help-block">
            <strong>{{ $errors->first('isi')}}</strong>
          </span>
        @endif
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="exampleInputFile">Dokumen Pendukung</label>
            <input type="file" id="exampleInputFile" name="dokumen[]" multiple="multiple" accept=".jpg, .png, .bmp, .docx, .doc, .xls, .xlsx, .pdf">
            <p class="help-block">Dokumen yang akan dilampirkan</p>
          </div>
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-6">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="anonim" value="ya"> Anonim <sub><font color="black">Identitas Anda Tidak Akan Ditampilkan</font></sub>
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="rahasia" value="ya"> Pengaduan Rahasia <sub><font color="black">Pengaduan Anda Akan Kami Rahasiakan Terhadap Publik </font></sub>
            </label>
          </div>
        </div><!-- /.col-lg-6 -->
      </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

@section('script')
  <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".select2").select2();
    });
  </script>
@stop
