<?php
 
  $server = "localhost";
  $user = "root";
  $password = "";
  $db = "examples";

  $connection = new mysqli($server, $user, $password, $db);

  if ($connection->connect_error)
    die($connection->connect_error);

  $id = intval(1);

  $stmt = $connection->prepare("SELECT id, name, email, phone FROM people WHERE id = ?");

  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->bind_result($id, $name, $email, $phone);
  
  while ($stmt->fetch()) {

    print_r($id); 
    print_r($name); 
    print_r($email); 
    print_r($phone); 

  }
  
  $stmt->close();
  $connection->close();

?>
