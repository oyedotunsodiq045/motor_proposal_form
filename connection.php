<?php
  // DB Params
  $host = 'localhost';
  $db_name = 'motor_proposal_form';
  $username = 'root';
  $password = 'i#30L^w@';

  try { 
    $conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo 'Connection Error: ' . $e->getMessage();
  }

?>