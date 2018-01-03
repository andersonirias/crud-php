<?php

  $server = "localhost";
  $user = "root";
  $password = "irias";
  $db = "examples";

  $connection = new mysqli($server, $user, $password, $db);

  if ($connection->connect_error)
    exit();

  $id = intval(3);

  $stmt = $connection->prepare("SELECT id, name, email, phone FROM people WHERE id = ?");

  $stmt->bind_param("i", $id);
  $result = $stmt->execute();

  if ($result == false) {

    print_r($connection->error);
    $connection->close();
    exit();

  }

  if ($result->num_rows > 0) {

    $data = [];

    while($row = $result->fetch_assoc()) {
      array_push($data,$row);
    }

  }

  print_r($data);

  $stmt->close();
  $connection->close();

?>
