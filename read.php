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

  $sql = "SELECT id, name, email, phone FROM people";
  $result = $connection->query($sql);

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
  
  $result->close();
  $connection->close();

?>
