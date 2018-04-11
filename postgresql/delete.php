<?php

  $connection = pg_connect("host=localhost port=5432 dbname=examples user=postgres password= ") or die('connection failed');

  pg_send_prepare($connection, "delete_database", 'DELETE FROM people WHERE id = $1');

  $resultprepare = pg_get_result($connection);

  if (pg_last_error())
    die(pg_last_error());

  $id = 1;

  pg_send_execute(
    $connection,
    "delete_database", 
    [$id]
  );

  $resultexecute = pg_get_result($connection);

  if (pg_last_error())
    die(pg_last_error());

  $result = pg_fetch_assoc($resultexecute);

  pg_close($connection);

?>
