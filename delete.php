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

  $stmt = $connection->prepare("DELETE FROM users WHERE id = ?");

  $stmt->bind_param("i", $id);
  $stmt->execute(); 

  $stmt->close();
  $connection->close();
