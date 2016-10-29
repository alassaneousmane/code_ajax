<?php 
require "Database/database.php";

if(isset($_GET['pseudo']) && !empty($_GET['pseudo'])) {
	$q =  $db->prepare('SELECT id FROM users WHERE pseudo = ?');
	$q->execute([$_GET['pseudo']]);
	$result = $q->fetch(PDO::FETCH_OBJ);
	$userHasBeenFound = $q->rowCount();	
	if($userHasBeenFound){
		echo (int) $result->id;
	}
} else {
	echo 'Donnees invalides';
}
 ?>
