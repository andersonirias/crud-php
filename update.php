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
  
  $name  = $connection->real_escape_string("Teste 3");
  $phone = $connection->real_escape_string("(31) 3211-7777");
  $email = $connection->real_escape_string("teste@teste.com");
  $id = intval(3);

  $stmt = $connection->prepare("UPDATE people set name = ?, phone = ?, email = ? WHERE id = ?");

  $stmt->bind_param("sssi", $name, $phone, $email, $id);
  $stmt->execute();

  if ($stmt->error)
    print_r($stmt->error); 

  $stmt->close();
  $connection->close();

?>
