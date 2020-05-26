<?php
  // DB Params
  $host = 'localhost';
  $db_name = 'motor_proposal_form';
  $username = 'root';
  $password = 'i#30L^w@';

  try { 
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo 'Connection Error: ' . $e->getMessage();
  }

?>