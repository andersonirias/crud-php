<?php
  
  $server = "localhost";
  $user = "root";
  $password = "irias";
  $db = "examples";

  $connection = new mysqli($server, $user, $password, $db);

  if ($connection->connect_error) {

    print_r($connection->connect_error);
    exit();

  }

  $id = intval(3);

  $stmt = $connection->prepare("DELETE FROM people WHERE id = ?");

  $stmt->bind_param("i", $id);
  $stmt->execute();

  if ($stmt->error)
    print_r($stmt->error);

  $stmt->close();
  $connection->close();
