<?php

  $connection = pg_connect("host=localhost port=5432 dbname=examples user=postgres password= ") or die('connection failed');

  pg_send_prepare($connection, "insert_database", 'INSERT INTO people (name, email, phone) VALUES ($1, $2, $3 )  RETURNING id');

  $resultprepare = pg_get_result($connection);

  if (pg_last_error())
    die(pg_last_error());

  pg_send_execute(
    $connection,
    "insert_database", 
    [
      'Name',
      'email@email.com.br',
      '(31) 3333-3333'
    ]
  );

  $resultexecute = pg_get_result($connection);

  if (pg_last_error())
    die(pg_last_error());

  $id = pg_fetch_assoc($resultexecute);

  print_r($id);

  pg_close($connection);

?>
