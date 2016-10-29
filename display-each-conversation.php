
<?php 
/*
	This page display all messages between two users
*/
require "Database/database.php";

if(isset($_POST['source']) && !empty($_POST['source']) && isset($_POST['destination']) && !empty($_POST['destination'])) {
	$source = htmlspecialchars(trim($_POST['source']));
	$destination = htmlspecialchars(trim($_POST['destination']));

	// Donc les champs sont bien valides les gars! 
	$q1 = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
	$q1->execute([$source]);
	$result1 = $q1->fetch(PDO::FETCH_OBJ);
	$idSource = $result1->id;//2
	$q1->closeCursor();
	$q2 = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
	$q2->execute([$destination]);
	$result2 = $q2->fetch(PDO::FETCH_OBJ);
	$idDestination = $result2->id;//1
	$get_destination_avatar = $db->prepare('SELECT avatar FROM users WHERE id= :id');
	$get_destination_avatar->execute([
		'id' => $idDestination
		]);
	$avatar_url = $get_destination_avatar->fetch(PDO::FETCH_OBJ);
	$q2->closeCursor();
	$width = "30px";
	$height = "36px";

		$data = $db->prepare('SELECT * FROM imessaging
								WHERE 
								sourceID = :idource AND destinationID = :idstination
								OR
								sourceID = :idestination AND destinationID= :idsource
                       
							');
		$data->execute([
			  
			  'idource' => $idSource,
			  'idstination' => $idDestination,
			  'idestination'=>$idDestination,
			  'idsource'=> $idSource

			]);
		while( $dataMessages = $data->fetch(PDO::FETCH_OBJ) ) {

			$classSpan = ($dataMessages->sourceID == $idSource) ? 'right' : 'left';
			$avatar = ($dataMessages->destinationID == $idSource) ? 
			'<img src="' . $avatar_url->avatar . '" alt="'.$avatar_url->avatar.'" width="'.$width.'" height="'.$height.'" class="circleo left" style="float: left; padding-right: 5px" />' : '';
				echo '
		
                                <li>'.$avatar.'
                                
                        <span class="'.$classSpan.'">'.$dataMessages->content.'</span>
                        <div class="clear"></div>
                               </li>        
                  
                
      
		';

		}
				
	
	
	
}

 ?>
