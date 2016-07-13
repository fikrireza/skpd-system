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
              <li class="active">Lupa Password</li>
            </ol>
          </div>
        </div>
        @if(Session::has('sukses'))
          <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Informasi</h4>
            {{ Session::get('sukses') }}
          </div>
        @endif

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
      			<h2 class="intro-text text-center">Lupa Password</h2>
      			<hr>
      			<p>Jika Anda Lupa Password, Maka Isilah Alamat Email Dibawah Ini. Anda Akan Mendapatkan Pesan Dengan Instruksi Untuk Membuat Password Baru Anda.</p>
            <form action="{{ route('emailreset')}}" method="POST" role="form" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
              <label class="col-sm-3 control-label">Email Anda</label>
              <div class="col-sm-4">
              <input type="email" name="email" class="form-control" placeholder="Email Anda" value="{{old('email')}}">
              @if($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email')}}</strong>
                </span>
              @endif
              </div>
            </div>
      		</div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
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
