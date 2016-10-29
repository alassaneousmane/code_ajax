<?php
session_start();
require("Database/database.php");
if(isset($_POST['message']) && !empty($_POST['message']) && isset($_POST['destinationID'])) {
$q = $db->prepare('INSERT INTO imessaging(destinationID, sourceID, content, seen, created_at) VALUES(?, ?, ?, ?, NOW())');
$q->execute([$_POST['destinationID'], $_SESSION['user_id'], $_POST['message'], '0']);
echo 'Ok';

} else {
	
}


?>
