<?php

include '../database/config.php';

if (isset($_POST['login'])) {
    
  $email = $_POST['email'];
  $password = $_POST['password'];

  try {
    $user->Login($email, $password);
    
  } catch (PDOException $e) {
    echo $e;
  }

}


?>