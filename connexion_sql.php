<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=DATABASE_NAME','DATABASE_USER','DATABASE_PASSWORD');
    $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
  
} catch (Exception $e) {
  die('Error in '.$e->getMessage().' et la ligne '.$e->getLine());
}
 ?>
