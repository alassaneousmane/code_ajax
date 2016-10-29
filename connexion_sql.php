<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=messaging','root','');
    $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
  
} catch (Exception $e) {
  die('Error in '.$e->getMessage());
}
 ?>