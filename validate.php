<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=messaging','root','');
} catch (Exception $e) {
    die('Erreur:'.$e->getMessage().$e->getLine());

}
if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password'])) {
    // Si les données envoyées ne sont pas vides et existent
    extract($_POST);
    $pseudo = htmlspecialchars(trim($pseudo));
    $password = htmlspecialchars(trim($password));

    $q = $db->prepare("INSERT INTO users (id, pseudo, password, actived, avatar, created_at) VALUES ('', :pseudo, :password, :actived, :avatar, NOW())");
    $q->execute([
        'pseudo' => $pseudo,
        'password' => sha1($password),
        'actived' => 0,
        'avatar' => ''
    ]);
    echo 'Données enregistrées';
}
