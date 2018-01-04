<?php

  $server = "localhost";
  $user = "root";
  $password = "";
  $db = "examples";

  $connection = new mysqli($server, $user, $password, $db);

  if ($connection->connect_error) {
    
    print_r($connection->connect_error);
    exit();

  }

  $name  = $connection->real_escape_string("Name");
  $email = $connection->real_escape_string("email@email.com");
  $phone = $connection->real_escape_string("(31) 3333-3333");

  $stmt = $connection->prepare("INSERT INTO people (name, email, phone) VALUES (?, ?, ?)");

  $stmt->bind_param("sss", $name, $email, $phone);
  $stmt->execute(); 

  if ($stmt->error)
    print_r($stmt->error);

  $stmt->close();
  $connection->close();

?>
