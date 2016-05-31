<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <p>
      Yth, Bapak/Ibu.
    </p>

    <p>
      Email anda telah didaftarkan sebagai <b>{{ $data[0]['akses'] }}</b> pada website SIMPEDU.
      <br>Silahkan klik link berikut untuk aktifasi :<br><br>

      <a href="{{ URL::to('register/verify/' . $data[0]['activation_code']) }}">
        {{ URL::to('register/verify/' . $data[0]['activation_code']) }}
      </a>
    </p>

  </body>
</html>
