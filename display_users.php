<?php
session_start();
include("includes/functions.php");
try {
    $db = new PDO('mysql:host=localhost;dbname=messaging','root','');
} catch (Exception $e) {
    die('Erreur:'.$e->getMessage().$e->getLine());

}
?>
<?php
$not_seen_yet = '0';
$messages_unseen = [];
$source_message_pseudo = [];
$pseudo_sender = null;
//Récupère tous les messages non-lus de la personne connectée
$q = $db->prepare('SELECT * FROM imessaging WHERE seen = ? AND destinationID = ?');
$q->execute([
  $not_seen_yet,
  get_session('user_id')
  ]);
//Les messages qu'on lui a envoyés
while($data = $q->fetch(PDO::FETCH_OBJ)){
  $messages_unseen[] = $data;
  $query = $db->prepare('SELECT * FROM users WHERE id = ?');
       $query->execute([ 
        $data->sourceID
            ]);
       while($data_pseudo = $query->fetch(PDO::FETCH_OBJ)){
        $source_message_pseudo[] = $data_pseudo->pseudo;       
       }
  
}
$array_pseudo = array_unique($source_message_pseudo);
//$array_pseudo contient les pseudos des personnes ayant des messages non-lus

$q = $db->prepare('SELECT * FROM users WHERE pseudo != ?');
$q->execute([$_SESSION['pseudo']]);


$messages = null; //Initialize var $messages
$width = "50px";
$height = "50px";
$status="online";

// On inscrit les messages nouveaux dans une variable
while($data = $q->fetch(PDO::FETCH_OBJ)) {

	$seen = in_array($data->pseudo, $array_pseudo) ? '<span class="new-message" style="padding-left: 8px"></span>' : '';
	
	$url = "tchat.php?id=".$data->id;
    $messages .= '<div class="sidebar-name"><a href="#"  title="'.$data->pseudo.'"><img src="' . $data->avatar . '" alt="'.$data->avatar.'" width="'.$width.'" height="'.$height.'" class="circleo"  /><span>'.$data->pseudo.'</span><strong></strong><em> '.$seen.'</em></a></div>';
}
echo $messages; // On retourne les messages à notre script JS

?>

