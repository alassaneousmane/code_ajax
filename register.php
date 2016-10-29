<?php
session_start();
require("includes/init.php");
include('filters/guest_filter.php');

$nomSite="CLUDIMA";
$nomURL="http://127.0.0.1/CLUDIMA_TEST/social_network/";
//require('includes/constants.php');
//Si le formualaire a été soumis
if(isset($_POST['register'])){
    //Si tous les champs sont remplis
    if(not_empty(['name','pseudo','email','password','password_confirm'])) {
        $errors=[];//Tableau contenant l'ensemble des erreurs. Et oui on peut declarer un array de cette manière aussi
        extract($_POST);
        if(mb_strlen($pseudo) < 3){
            $errors[]="Pseudo trop court !(Minimum 3 caractères)";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errors[]="Adresse email incorrecte";
        }
        if(mb_strlen($password) <6){
            $errors[]="Mot de passe trop court ! (Minimum 6 caractères)";
        } else {
            if($password != $password_confirm){
                $errors[]="Les deux mots de passe ne concordent pas !";
            }
        }
        if(is_already_in_use('pseudo',$pseudo,'users')) {
            $errors[]="Pseudo déjà utilisé!";
        }
        if(is_already_in_use('email',$email,'users')) {
            $errors[]="Email déjà utilisé!";
        }
        if(count($errors)==0){
           //Envoi d'un mail d'activation
            $to = $email;
            $subject = $nomSite."-Activation de compte !";
            $password = sha1($password);
            $token=sha1($pseudo.$email.$password);
            ob_start();//ob_start() garde vos informations en cache au lieu de les afficher
            require('templates/emails/activation.tmpl.php');
            $content = ob_get_clean();
            $headers ='MIME-Version: 1.0'."\r\n";
            $headers.='Content-type: text/html; charset="utf-8"'."\r\n";
            mail($to, $subject, $content, $headers);

            //Informer l'utilisateur pour qu'il verifie sa boite de reception
            //set_flash permet de definir un message qui va s'afficher une seule fois

            set_flash("Mail d'activation envoyé à l'adresse indiquée", 'bg-primary');
            $q=$db->prepare('INSERT INTO users (name, pseudo, email, password) VALUES (:name, :pseudo, :email, :password)');
            $q->execute([
                'name'=> $name,
                'pseudo'=> $pseudo,
                'email'=> $email,
                'password'=> $password
            ]);
            redirect('index.php');

        } else {
            save_input_data();

        }


    } else {
        $errors[]="Veuillez SVP remplir tous les champs";
        save_input_data();
    }



} else {
    clear_input_data();
}



?>









<?php
require('Views/register.view.php'); ?>
