<?php
 
  $server = "localhost";
  $user = "root";
  $password = "irias";
  $db = "exemplos";

  $connection = new mysqli($server, $user, $password, $db);

  if ($connection->connect_error)
    die($connection->connect_error);

  $sql = "SELECT id, name, email, phone FROM users";
  $result = $connection->query($sql);

  if ($result->num_rows > 0) {

    $data = [];

    while($row = $result->fetch_assoc()) {
      array_push($data,$row);
    }

  } 

  $connection->close();

?>
