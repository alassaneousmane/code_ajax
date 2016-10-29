<?php
session_start();
require("includes/init.php");
include('filters/guest_filter.php');

//require('includes/constants.php');
//Si le formualaire a été soumis
if(isset($_POST['submit'])){
    //Si tous les champs sont remplis
    if(not_empty(['login','password'])) {
        $errors = [];//Tableau contenant l'ensemble des erreurs
        extract($_POST);
        $q = $db->prepare("SELECT id, pseudo, avatar, password  FROM users
             WHERE (pseudo = :login)
             AND password = :password AND  actived ='1'");
        $q->execute([
            'login' => $login,
            'password' => sha1($password)
        ]);
        $userHasBeenFound = $q->rowCount(); 
        if ($userHasBeenFound) {
            $user = $q->fetch(PDO::FETCH_OBJ);
            //Creattion de session utilisateur, il est vient de s'authentfier
            $_SESSION['user_id'] = $user->id;
            $_SESSION['avatar'] = $user->avatar;
            $_SESSION['pseudo'] = $user->pseudo;

            /*
               * On va verifier si l'utilsateur a coché le chekbox. S'il l'a coché $_POST['remember_me'] sera à on
               */
            if(isset($_POST['remember_me']) && $_POST['remember_me'] === 'on') {
                // Donc il veut garder sa session active
                remember_me($user->id);
            }
            redirect_intent_or('tchat.php?id='.$user->id);
        } else {
        
            save_input_data();
        }
    }    if(empty($login) || strlen($login) < 6){
                        $errors['login'] = "Le champ login a des problèmes!";
                    }

         if(empty($password)){
              $errors['password'] = "Mot de passe incorrect!";
                 
}
}

else {
    clear_input_data();
}

?>








<?php require('Views/login.view.php'); ?>