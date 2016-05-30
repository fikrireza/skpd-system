<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <p>
      Hai, {{ $data[0]['nama'] }}.
    </p>

    <p>
      Terima kasih telah melakukan registrasi pada Sistem Informasi Pengaduan Terpadu Kabupaten Tangerang.
      <br>Silahkan klik link berikut untuk aktifasi link kamu :<br><br>

      <a href="{{ URL::to('register/verify/' . $data[0]['activation_code']) }}">
        {{ URL::to('register/verify/' . $data[0]['activation_code']) }}
      </a>
    </p>

  </body>
</html>
