<?php 
try {
		  $db = new PDO('mysql:host=localhost;dbname=messaging','root','');
		    $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
		  
		} catch (Exception $e) {
		  die('Error in '.$e->getMessage());
		}
		$table = "Oussou";
		$table1="Fiber";
		$table= $table.'_'.$table1;
		$requete = $db->query("CREATE TABLE $table (name VARCHAR(40), size ENUM('x-small', 'small', 'medium', 'large', 'x-large'))");
extract(filter_input_array(INPUT_POST));
$fichier = $_FILES["userfile"]["name"]; // Nom du fichier
if($fichier){
	//
	$fp = fopen($_FILES["userfile"]["tmp_name"], 'r');
}
else {
	?>
	<p align="center">-Importation échouée-</p>
	<p align="center"><b>Désolé, vous n'avez pas spécifier le chemin valide </b></p>
	<?php
	exit();
}
$cpt = 0;

 ?>
 <p align="center">-Importation réussie-</p>
 <?php
 while(!feof($fp)) {
 	$ligne = fgets($fp, 4096);
 	$liste = explode(';', $ligne);
 	$table = filter_input(INPUT_POST, 'userfile');

 	$liste[0] = (isset($liste[0])) ? $liste[0] : Null;
 	$liste[1] = (isset($liste[1])) ? $liste[1] : Null;
 	$liste[2] = (isset($liste[2])) ? $liste[2] : Null;
 	$liste[3] = (isset($liste[3])) ? $liste[3] : Null;
 	$liste[4] = (isset($liste[4])) ? $liste[4] : Null;
 	$liste[5] = (isset($liste[5])) ? $liste[5] : Null;
 	$liste[6] = (isset($liste[6])) ? $liste[6] : Null;
 	$liste[7] = (isset($liste[7])) ? $liste[7] : Null;
 	$liste[8] = (isset($liste[8])) ? $liste[8] : Null;
 	$liste[9] = (isset($liste[9])) ? $liste[9] : Null;
 	
 	$champs1 = $liste[0];
 	$champs2 = $liste[1];
 	$champs3 = $liste[2];
 	$champs4 = $liste[3];
 	$champs5 = $liste[4];
 	$champs6 = $liste[5];
 	$champs7 = $liste[6];
 	$champs8 = $liste[7];
 	$champs9 = $liste[8];
 	$champs10 = $liste[9];
 	if($champs1 != '') {
 		$cpt++;
 		
		$q = $db->query("INSERT INTO management(id, raison_sociale, dirigeant, adresse,	code_postal, ville, telephone, email, code_naf, libelle_naf, raison_professionnelle) VALUES('', '$champs1', '$champs2', '$champs3', '$champs4', '$champs5', '$champs6', '$champs7', '$champs8', '$champs9', '$champs10' )");
 	} else { echo 'INSERTION FAILDED<br/>';}

 }
 fclose($fp);

 ?>
 <?= $cpt; ?>