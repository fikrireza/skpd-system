<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="{{asset('bootstrap/css/9tins.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">
</head>
<body>


<div class="container">
		<div class="left">
      <div class="login-box">
          <div class="login-logo">
            <img src="{{asset('images/logologinkabtangerang.png')}}" alt="SPD" />
            &nbsp;&nbsp;<b>Simpedu Online</b>
          </div>
        </div>
		</div>
		<div class="right">
      <div class="login-box-body border">
        <p class="login-box-msg">Silahkan lakukan proses login</p>
        <form action="{{ url('login') }}" method="post">
          {!! csrf_field() !!}
          <div class="form-group has-feedback">
            <input name="email" type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-success btn-block btn-flat">Log In</button>
            </div><!-- /.col -->
          </div>
        </form>
        <a href="#">Lupa password? Klik disini</a><br>
      </div><!-- /.login-box-body -->
		</div> <!--/ .right -->

	<div class="footer">
		<h4><strong>Copyright © 20162017 <a href="http://9tins.com">9Tins Project</a>.</strong> All rights reserved.</h4>
	</div>
</div>

</body>
</html>
