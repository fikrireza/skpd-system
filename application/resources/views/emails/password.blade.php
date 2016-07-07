<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <p>
      Hai, {!! $nama !!}.
    </p>

    <p>
      Klik Link di Bawah Untuk Me-<i>Reset</i> Password Anda.
      <br>
      {!! link_to('password/reset/' . $token) !!}.<br>
			{{ $expire . config('auth.reminder.expire', 60) . $minutes}}.
      <br>
      Abaikan Email Ini Jika Anda Tidak Memerlukannya.
    </p>

  </body>
</html>
