@extends('front.template')

@section('title')
  <title>SIMPEDU | Profil</title>
@stop

@section('content')

  @if(Session::has('messagefilled'))
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-info"></i> Informasi</h4>
      {{ Session::get('messagefilled') }}
    </div>
  @endif
  <div class="col-md-9">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{$profiles->nama}}</h3>
      </div>
      <div class="row">
        <form class="form-horizontal" action="{{ url('profil')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input name="id" type="hidden" class="form-control" placeholder="Name" value="{{ $profiles->id }}">
        <div class="col-md-3">
          <div class="box-body">
            <div class="widget-user-image">
              @if($profiles->url_photo == null)
                <img class="img-square" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar" width="215" height="215">
              @else
                <img class="img-square" src="{{ asset('/images/'.$profiles->url_photo) }}" alt="{{$profiles->nama}}" width="215" height="215">
              @endif
            </div>
            <h5 class="widget-user-desc">Bergabung {{ \Carbon\Carbon::parse($profiles->created_at)->format('d-M-y')}}</h5>
          </div>
          <div class="box-footer">
            <input type="file" name="url_photo" id="url_photo" accept=".jpg, .bmp, .png"></input>
          </div>
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
                  </div>
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
                        <input type="radio" name="jeniskelamin" class="minimal" value="L" @if($profiles->jeniskelamin == "L")checked="checked"@endif>Pria
                      </label>
                      <label>
                        <input type="radio" name="jeniskelamin" class="minimal" value="P" @if($profiles->jeniskelamin == "P")checked="checked"@endif>Wanita
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
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">Ubah Data</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Ubah Password</h3>
      </div>

      <form class="form-horizontal" action="{{ route('ubahpassword') }}" method="post">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group {{ $errors->has('oldpass') ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Password Lama</label>
            <div class="col-sm-9">
              <input name="oldpass" type="password" class="form-control" placeholder="Password Lama" @if(!$errors->has('oldpass'))
                value="{{ old('oldpass') }}"@endif>
              <input name="id" type="hidden" class="form-control" value="{{ $profiles->id }}">
              @if($errors->has('oldpass'))
                <span class="help-block">
                  <strong>{{ $errors->first('oldpass') }}
                  </strong>
                </span>
              @endif
              @if(Session::has('erroroldpass'))
                <span class="help-block">
                  <strong>{{ Session::get('erroroldpass') }}
                  </strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('newpass') ? 'has-error' : '' }} ">
            <label class="col-sm-3 control-label">Password Baru</label>
            <div class="col-sm-9">
              <input name="newpass" type="password" class="form-control" placeholder="Password Baru Minimal 8 Karakter" @if(!$errors->has('newpass'))
                value="{{ old('newpass') }}"@endif>
              @if($errors->has('newpass'))
                <span class="help-block">
                  <strong>{{ $errors->first('newpass') }}
                  </strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('newpass_confirmation') ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Konfirmasi Password Baru</label>
            <div class="col-sm-9">
              <input name="newpass_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password Baru"
              @if(!$errors->has('newpass_confirmation'))
                value="{{ old('newpass_confirmation') }}"@endif>
              @if($errors->has('newpass_confirmation'))
                <span class="help-block">
                  <strong>{{ $errors->first('newpass_confirmation') }}
                  </strong>
                </span>
              @endif
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Ubah Password</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Laporan Anda</span>
        <span class="info-box-number">{{ $pengaduanWid }}</span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Telah Ditanggapi</span>
        <span class="info-box-number">{{ $tanggapWid }}</span>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Pengaduan Terbaru</h3>
      </div>
      <div class="box-body">
        <?php $batas = 0; ?>
        @foreach($skpdonly as $skpd1)
        <strong><i class="margin-r-5"></i>{{ $skpd1->nama_skpd }}</strong>
        <p>
        <?php $batas1 = 0; ?>
        @foreach($AllTopiks as $skpd)
        @foreach($skpd as $topik)
        @if($topik->slug_skpd === $skpd1->slug_skpd)
        <div class="">
          @if($topik->warga_id == Auth::user()->id)
          <a href="{{ url('pengaduansaya/detail', $topik->slug) }}" class="text-muted">{{ $topik->judul_pengaduan}}</a>
          @else
          <a href="{{ url('semuapengaduan/detail', $topik->slug) }}" class="text-muted">{{ $topik->judul_pengaduan}}</a>
          @endif
        </div>
        @endif
        @if($batas1++ == 2) @break @endif
        @endforeach
        @endforeach
        </p>
        @if($batas++ == 3) @break @endif
        <hr>
        @endforeach
      </div>
    </div>
  </div>
@stop

@section('script')
  <!-- iCheck 1.0.1 -->
  <script src="{{ asset('/plugins/iCheck/icheck.min.js') }}"></script>
  <script>
  $('input[type="radio"].minimal').iCheck({
          radioClass: 'iradio_minimal-blue'
  });
  </script>

  <script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('/plugins/datepicker/locales/bootstrap-datepicker.id.js') }}"></script>
  <script>
  $('#tgl_lahir').datepicker();
  </script>
@stop
