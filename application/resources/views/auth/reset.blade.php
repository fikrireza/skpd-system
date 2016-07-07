<!DOCTYPE html>
<html>
<head>
  <title>SIMPEDU</title>
  @include('includes.head')
  <link rel="stylesheet" href="{{asset('dist/css/customcss.css')}}" media="screen" title="no title" charset="utf-8">
</head>

<body class="hold-transition skin-white layout-top-nav">
  <div class="wrapper">
  @include('includes.navbarumum')

  <div class="content-wrapper custombackground">
    <div class="container">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
              <li class="active">Reset Password</li>
            </ol>
          </div>
        </div>
        @if(Session::has('error'))
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Email Tidak Valid</h4>
            {{ Session::get('error') }}
          </div>
        @endif

      <div class="row">
      	<div class="box box-primary">
          <div class="box-body">
      			<hr>
      			<h2 class="intro-text text-center">Buat Password Baru</h2>
      			<hr>
            <p>
              Silahkan Isi Formulir Dibawah Ini.
            </p>
            </br>
            <form action="{{ route('passwordreset')}}" method="POST" role="form" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
              <label class="col-sm-3 control-label">Email Anda</label>
              <div class="col-sm-4">
              <input type="hidden" name="token" value="{{ $token }}" />
              <input type="email" name="email" class="form-control" placeholder="Email Anda" value="{{old('email')}}">
              @if($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email')}}</strong>
                </span>
              @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} ">
              <label class="col-sm-3 control-label">Password Baru</label>
              <div class="col-sm-4">
                <input name="password" type="password" class="form-control" placeholder="Password Baru Minimal 8 Karakter" @if(!$errors->has('password'))
                  value="{{ old('password') }}"@endif>
                @if($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}
                    </strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
              <label class="col-sm-3 control-label">Konfirmasi Password Baru</label>
              <div class="col-sm-4">
                <input name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password Baru"
                @if(!$errors->has('password_confirmation'))
                  value="{{ old('password_confirmation') }}"@endif>
                @if($errors->has('password_confirmation'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}
                    </strong>
                  </span>
                @endif
              </div>
            </div>
      		</div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          </form>
      	</div>
      </div>
      </div>
      </section>
    </div>
  </div>

  <footer class="main-footer">
    <div class="container">
      @include('includes.footer')
    </div>
  </footer>
  </div>

  <!-- jQuery 2.1.4 -->
  <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('/plugins/fastclick/fastclick.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('/dist/js/app.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('/dist/js/demo.js') }}"></script>
</body>
</html>
