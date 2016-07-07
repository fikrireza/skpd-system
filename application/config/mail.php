<?php

return [
  // -- USING MAILTRAP --
  // "driver" => "smtp",
  // "host" => "mailtrap.io",
  // "port" => 2525,
  // "from" => array(
  //     "address" => "no-reply@simpedu.tangerangkab.go.id",
  //     "name" => "SIMPEDU"
  // ),
  // "username" => "25e0d1541502f2",
  // "password" => "eff2ed75db9f80",
  // "sendmail" => "/usr/sbin/sendmail -bs",
  // "pretend" => false

  // -- USING SMTP2GO --
  'driver' => 'log',
  'host' => 'mail.smtp2go.com',
  'port' => 2525,
  'from' => array('address' => 'no-reply@simpedu.tangerangkab.go.id', 'name' => 'SIMPEDU'),
  'encryption' => 'tls',
  'username' => 'dudyali@gmail.com',
  'password' => 's3cur3',
  'sendmail' => '/usr/sbin/sendmail -bs',
  'pretend' => false,
];
