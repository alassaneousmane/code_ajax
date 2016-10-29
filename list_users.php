<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=messaging','root','');
} catch (Exception $e) {
    die('Erreur:'.$e->getMessage().$e->getLine());

}
?>
<?php
$q = $db->query('SELECT * FROM users');


$list = null;
// On inscrit les messages nouveaux dans une variable
while($data = $q->fetch(PDO::FETCH_OBJ)) {
    $actived = ($data->actived == '1') ? '<i class="material-icons">done</i>' : '<i class="material-icons">call_missed</i>';
    $list .= '<tr>
                <td>'.$data->id.'</td>
                <td>'.$data->pseudo.'</td>
                <td>'.$data->password.'</td>
                <td>'.$actived.'</td>
                <td><img src="'.$data->avatar.'" alt="'.$data->pseudo.'" height="50" width="50" class="circle"/></td>
                <td>'.$data->created_at.'</td>
        </tr>';
}
echo $list; // On retourne les messages à notre script JS

?>
