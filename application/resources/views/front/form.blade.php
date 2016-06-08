<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ajukan Keluhan Anda</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form" action="{{ url('beranda')}}" method="POST" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label>Kategori Pelaporan</label>
        {!! Form::select('topik', $topiks, null, ['class' => 'form-control','placeholder' => '-- Pilih Kategori --']) !!}
        {{-- <select class="form-control" name="topik">
          <option>-- Pilih Kategori --</option>
          @foreach($topiks as $topik)
            <option value="{{$topik->id}}">{{$topik->nama_topik}}</option>
          @endforeach
        </select> --}}
      </div>
      <div class="form-group">
        <label>Tuliskan Judul Laporan Anda</label>
        <input type="text" name="judul" class="form-control" placeholder="Judul Pengaduan">
      </div>
      <div class="form-group">
        <label>Tuliskan Laporan Anda</label>
        <textarea class="form-control" rows="5" name="isi" placeholder="Apa Laporan Anda...?"></textarea>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="exampleInputFile">Dokumen Pendukung</label>
            <input type="file" id="exampleInputFile" name="dokumen[]" accept=".jpg, .png, .bmp, .docx, .doc, .xls, .xlsx">
            <p class="help-block">Dokumen yang akan dilampirkan</p>
          </div>
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-6">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="anonim"> Anonim <sub><font color="red">Identitas Anda Tidak Akan Ditampilkan</font></sub>
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="rahasia"> Laporan Rahasia <sub><font color="red">Laporan Anda Akan Kami Rahasiakan Terhadap Publik </font></sub>
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
