<?php 
require "connexion_sql.php";

//Requete
$q = $db->query('SELECT COUNT(*) not_seen FROM users');
$r = $q->fetch(PDO::FETCH_OBJ);
echo $r->not_seen;
 ?>