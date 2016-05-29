<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    Click this link to activate your account in SIMPADU:
    <a href="{{ URL::to('register/verify/' . $activation_code) }}">
      {{ URL::to('register/verify/' . $activation_code) }}
    </a>
  </body>
</html>
