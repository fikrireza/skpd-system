<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SKPD Pengaduan Online | Kabupaten Tangerang</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/custom9tins.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue-light hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="{{asset('images/logologinkabtangerang.png')}}" alt="SPD" />
        &nbsp;&nbsp;<b>Simpedu Online</b>
      </div>


      <div class="login-box-body">
        <p class="login-box-msg">Mohon set password anda.</p>
        <form action="{{ route('setpassword') }}" method="post">
          {!! csrf_field() !!}
          <div class="form-group has-feedback">
            <input name="email" type="text" class="form-control" placeholder="Email" value="{{ $email }}" readonly="true">
            <input name="verifytoken" type="hidden" class="form-control" placeholder="Email" value="{{ $verifytoken }}" readonly="true">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if($errors->has('password'))
              <span class="help-block">
                <i>* {{ $errors->first('password') }}</i>
              </span>
            @endif
          </div>
          <div class="form-group {{$errors->has('password_confirmation') ? 'has-error' : ''}}">
            <input name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password">
            @if($errors->has('password_confirmation'))
              <span class="help-block">
                <i>* {{ $errors->first('password_confirmation') }}</i>
              </span>
            @endif
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">

            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-success btn-block btn-flat">Set Password Saya</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
