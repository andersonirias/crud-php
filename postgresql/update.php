<?php

  $connection = pg_connect("host=localhost port=5432 dbname=examples user=postgres password= ") or die('connection failed');

  pg_send_prepare($connection, "update_database", 'UPDATE people SET name = $1, email = $2, phone = $3 WHERE id = $4');

  $resultprepare = pg_get_result($connection);

  if (pg_last_error())
    die(pg_last_error());

  pg_send_execute(
    $connection,
    "update_database", 
    [
      'Name',
      'email@email.com.br',
      '(31) 3333-3333',
      1
    ]
  );

  $resultexecute = pg_get_result($connection);

  if (pg_last_error())
    die(pg_last_error());

  pg_close($connection);

?>
