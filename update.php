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
  $phone = $connection->real_escape_string("(31) 3333-3333");
  $email = $connection->real_escape_string("email@email.com");
  $id = intval(1);

  $stmt = $connection->prepare("UPDATE people set name = ?, phone = ?, email = ? WHERE id = ?");

  $stmt->bind_param("sssi", $name, $phone, $email, $id);
  $stmt->execute();

  if ($stmt->error)
    print_r($stmt->error); 

  $stmt->close();
  $connection->close();

?>
