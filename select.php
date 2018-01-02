<?php

  $server = "localhost";
  $user = "root";
  $password = "irias";
  $db = "exemplos";

  $id = 3;

  $connection = new mysqli($server, $user, $password, $db);

  if ($connection->connect_error)
    exit();

  $id = intval($id);

  $stmt = $connection->prepare("SELECT id, user, email, phone FROM users WHERE id = ?");

  $stmt->bind_param("i", $id);
  $result = $stmt->execute();

  if ($result->num_rows > 0) {

    $data = [];

    while($row = $result->fetch_assoc()) {
      array_push($data,$row);
    }

  }

  $stmt->close();
  $connection->close();

?>
