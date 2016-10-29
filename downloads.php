<?php include("Database/database.php");?>

<html>
<head>
<title>Download File From MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php


$query = $db->query('SELECT id, name FROM upload');
$count = $query->rowCount();
if($count == 0)
{
echo "Database is empty <br>";
}
else
{
while($data = $query->fetch(PDO::FETCH_OBJ))
{
?>
<a href="download.php?id=<?= $data->id;?>"><?= $data->name;?></a> <br>
<?php
}
}

?>
</body>
</html>
 


?>
