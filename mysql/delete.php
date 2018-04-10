<?php
  
  $server = "localhost";
  $user = "root";
  $password = "";
  $db = "examples";

  $connection = new mysqli($server, $user, $password, $db);

  if ($connection->connect_error)
    die($connection->connect_error);

  $id = intval(1);

  $stmt = $connection->prepare("DELETE FROM people WHERE id = ?");

  $stmt->bind_param("i", $id);
  $stmt->execute();

  if ($stmt->error)
    print_r($stmt->error);

  $stmt->close();
  $connection->close();
