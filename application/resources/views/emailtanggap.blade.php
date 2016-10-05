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
      Pengaduan anda dengan judul <b>{{ $data[0]['judul'] }}</b> yang di laporkan via website SIMPEDU telah ditanggapi oleh pihak terkait.
      <br>Silahkan klik link berikut untuk melihat tanggapan pengaduan anda :<br><br>

      <a href="{{ URL::to('detail/pengaduan/' . $data[0]['slug']) }}">
        {{ URL::to('detail/pengaduan/' . $data[0]['slug']) }}
      </a>
    </p>

  </body>
</html>
