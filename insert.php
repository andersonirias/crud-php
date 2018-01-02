<?php

  $server = "localhost";
  $user = "root";
  $password = "irias";
  $db = "exemplos";

  $connection = new mysqli($server, $user, $password, $db);

  if ($connection->connect_error)
    exit();

  $stmt = $connection->prepare("INSERT INTO users (name, email, phone, userpassword) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $phone, $userpassword);

  function nameValidate($name = null) {

    $regularExpression = "/^[A-Za-z áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]+$/";

    if (preg_match($regularExpression, $name))
      $result = true;
    else
      $result = false;

    return $result;

  }
  
  function emailValidate($email = null) {
    
    $regularExpression = "/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+.([a-zA-Z]{2,4})$/";

    if (preg_match($regularExpression, $email))
      $result = true;
    else
      $result = false;

    return $result;
    
  }

  function phoneValidate($phone = null) {

    $regularExpression = "/^\([0-9]{2}\) [0-9]{4}-[0-9]{4}$/";

    if (preg_match($regularExpression, $phone))
      $result = true;
    else
      $result = false;

    return $result;

  }

  function encryptPassword($password = null) {

    return crypt ( $password, '$2a$' . '08' . '$' . 'Cf1f11ePArKlBJomM0F6aJ' . '$' );

  }

  $name  = $connection->real_escape_string("Teste 3");
  $email = $connection->real_escape_string("teste3@teste.com");
  $phone = $connection->real_escape_string("(31) 3211-7777");
  $userpassword = encryptPassword( $connection->real_escape_string("Macarraonachapa") );
    
  if (nameValidate($name) == false || emailValidate($email) == false || phoneValidate($phone) == false)
    exit ();

  $stmt->execute(); 

  $stmt->close();
  $connection->close();
