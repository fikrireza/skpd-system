@extends('front.template')

@section('content')
  <div class="col-md-9">
    <div class="box box-info">

      <div class="box-header with-border">
        <h3 class="box-title">{{$profiles->nama}}</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <div class="row">
        <form class="form-horizontal" action="{{ url('profil')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input name="id" type="hidden" class="form-control" placeholder="Name" value="{{ $profiles->id }}">
        <div class="col-md-3">
          <div class="box-body">
            <div class="widget-user-image">
              @if($profiles->url_photo == null)
                <img class="img-square" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
              @else
                <img class="img-square" src="{{ asset('/images/'.$profiles->url_photo) }}" alt="{{$profiles->nama}}">
              @endif
            </div><!-- /.widget-user-image -->
            <h5 class="widget-user-desc" align="center">Bergabung {{ \Carbon\Carbon::parse($profiles->created_at)->format('d-M-y')}}</h5>
          </div>
          <div class="box-footer">
            <input type="file" name="url_photo" id="url_photo" accept=".jpg, .bmp, .png"></input>
          </div><!-- /.box-footer -->
        </div>
        <div class="col-md-9">
            <div class="box-body">
              <div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
                <label class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama" name="nama"
                    @if($profiles->nama == null )
                      value="{{ old('nama')}}"
                    @else
                      value="{{ $profiles->nama}}"
                    @endif
                    >
                  </div>
                </div>
                @if($errors->has('nama'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nama')}}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('noktp') ? 'has-error' : '' }}">
                <label class="col-sm-3 control-label">No. KTP</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-credit-card"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="No. KTP" name="noktp"
                    @if($profiles->noktp == null)
                      value="{{ old('noktp')}}"
                    @else
                      value="{{ $profiles->noktp}}"
                    @endif>
                    @if($errors->has('noktp'))
                      <span class="help-block">
                        <strong>{{ $errors->first('noktp')}}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group{{ $errors->has('tgl_lahir') ? 'has-error' : '' }}">
                <label class="col-sm-3 control-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" name="tgl_lahir" placeholder="yyyy-mm-dd" id="tgl_lahir" data-date-format="yyyy-mm-dd"
                    @if($profiles->tgl_lahir == null)
                      value="{{old('tgl_lahir')}}"
                    @else
                      value="{{ $profiles->tgl_lahir}}"
                    @endif>
                    @if($errors->has('tgl_lahir'))
                      <span class="help-block">
                        <strong>{{ $errors->first('tgl_lahir')}}</strong>
                      </span>
                    @endif
                  </div><!-- /.input group -->
                </div>
              </div>
              <div class="form-group{{ $errors->has('notelp') ? 'has-error' : '' }}">
                <label class="col-sm-3 control-label">No. Telepon</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control" name="notelp" placeholder="No. Telp"
                    @if($profiles->notelp == null)
                      value="{{ old('notelp') }}"
                    @else
                      value="{{ $profiles->notelp }}"
                    @endif>
                    @if($errors->has('notelp'))
                      <span class="help-block">
                        <strong>{{ $errors->first('notelp')}}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $profiles->email}}" disabled="">
                  </div>
                </div>
              </div>
              <div class="form-group{{ $errors->has('jeniskelamin')}}">
                <label class="col-sm-3 control-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label>
                        <input type="radio" name="jeniskelamin" id="optionsRadios1" value="Pria" checked="">Pria
                      </label>
                      <label>
                        <input type="radio" name="jeniskelamin" id="optionsRadios2" value="Wanita">Wanita
                      </label>
                    </div>
                    @if($errors->has('jeniskelamin'))
                      <span class="help-block">
                        <strong>{{ $errors->first('jeniskelamin')}}</strong>
                      </span>
                    @endif
                  </div>
              </div>
              <div class="form-group{{ $errors->has('alamat') ? 'has-error' : '' }}">
                <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-9">
                  <textarea class="form-control" placeholder="Alamat" rows="5" name="alamat">{{$profiles->alamat}}</textarea>
                  @if($errors->has('alamat'))
                    <span class="help-block">
                      <strong>{{ $errors->first('alamat')}}</strong>
                    </span>
                  @endif
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">Ubah Data</button>
            </div><!-- /.box-footer -->
          </div>
        </form>
      </div><!-- row -->
    </div><!-- box form -->
  </div><!-- /.col -->

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Laporan Anda</span>
        <span class="info-box-number">10</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Telah Ditanggapi</span>
        <span class="info-box-number">2</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div>

  <div class="col-md-3">
      <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Laporan Terbaru</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i>  Pendidikan</strong>
        <p class="text-muted">
          B.S. in Computer Science from the University of Tennessee at Knoxville
        </p>

        <hr>

        <strong><i class="fa fa-map-marker margin-r-5"></i> Geografi</strong>
        <p class="text-muted">Malibu, California</p>

        <hr>

        <strong><i class="fa fa-file-text-o margin-r-5"></i> Kependudukan</strong>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
@stop
