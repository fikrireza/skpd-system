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
        <select class="form-control select2" name="topik" style="width: 100%;">
          <option value="">-- Pilih Kategori --</option>
          @foreach($topiks as $isi)
            <optgroup label="{{ $isi->nama_skpd }}">
              @foreach($topikgroup as $isis)
                @if($isi->nama_skpd === $isis->nama_skpd)
                  <option value="{{ $isis->id}}">{{ $isis->nama_topik}}</option>
                @endif
              @endforeach
            </optgroup>
          @endforeach
        </select>
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
          <textarea class="textarea" rows="5" name="isi" placeholder="Apa Laporan Anda...?" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('isi')}}</textarea>
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
            {{-- <p class="help-block">Dokumen yang akan dilampirkan</p> --}}
            <p class="help-block" style="color:red">*Kapasitas Dokumen tidak lebih dari 20 MB</p>
          </div>
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-6">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="anonim" value="ya"> Anonim <sub><font color="red">*Identitas Anda Tidak Akan Ditampilkan</font></sub>
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="rahasia" value="ya"> Pengaduan Rahasia <sub><font color="red">*Pengaduan Anda Akan Kami Rahasiakan Terhadap Publik </font></sub>
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
  $(".select2").select2();
  </script>
  <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
  <script>
    $(function () {
      $(".textarea").wysihtml5({
        toolbar: {
          "font-styles": false, //Font styling, e.g. h1, h2, etc.
          "emphasis": false, //Italics, bold, etc.
          "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers.
          "html": true, //Button which allows you to edit the generated HTML.
          "link": false, //Button to insert a link.
          "image": false, //Button to insert an image.
          "color": true //Button to change color of font
       }
      });
    });
  </script>
@stop
