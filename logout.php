<?php
session_start();
require "Database/database.php";
$q = $db->prepare('DELETE FROM auth_tokens WHERE user_id= ?');
$q->execute([$_SESSION['user_id']]);
// Supprimer les cookies et detruire la session
setcookie('auth', '', time()-3600);
session_destroy();
$_SESSION = [];
header('Location: login.php');

?>