<?php
require "Database/database.php";
if(isset($_GET['id']))
{
// if id is set then get the file with the id from database


$id    = $_GET['id'];
$query = $db->prepare('SELECT name, type, size, content FROM upload WHERE id = ?');
$query->execute([$id]);

$data = $query->fetch();
echo $data['content'];
list($name, $type, $size, $content) = $data;

}

?>