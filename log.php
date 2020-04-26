<?php

require_once "boot.php";


$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);
$userTable = new UserTable($db);


if (isset($_POST['inscription'])){
    $pseudo_user = empty($_POST['pseudo_user']) ? null : $_POST['pseudo_user'];
    $nom_user = empty($_POST['nom_user']) ? null : $_POST['nom_user'];
    $prenom_user = empty($_POST['prenom_user']) ? null : $_POST['prenom_user'];
    $email_user= empty($_POST['email_user']) ? null : $_POST['email_user'];
    $password_user = empty($_POST['password_user']) ? null : $_POST['password_user'];
    
    if ($pseudo_user === null || $nom_user === null || $prenom_user === null || $email_user === null || $password_user === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {
         $user = new User();
        $user->nom = $nom_user;
        $user->prenom =  $prenom_user;
        $user->mot_de_passe =  $password_user;
        $user->pseudo = $pseudo_user;
        $user->email = $email_user;
        $userTable->insertUser($user);
          header('Location: https://lefevre.simplon-charleville.fr/BSF/#close');
        die;
    }
}
      

if (isset($_POST['login'])){
    $pseudo_user = empty($_POST['pseudo_user']) ? null : $_POST['pseudo_user'];
    $password_user = empty($_POST['password_user']) ? null : $_POST['password_user'];
    
    if ($pseudo_user === null || $password_user === null) {
        echo 'Veuillez remplir tous les champs';
    }else {
        
        
        // la fonction prépare et execute son dans la meme fonction, il suffit de la remplir de votre requete et de vos valeurs //
        
        $usertable = new UserTable($db);
        $utilisateur = $usertable->recupParPseudo($pseudo_user);
        if($utilisateur === null){
            $erreur =  "login et / ou mot de passe incorrect";
        }
        
        if(!password_verify($password_user, $utilisateur->mot_de_passe ?? '')) {
            $erreur =  "login et / ou mot de passe incorrect";
        }
        
        if( $erreur === null){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            session_regenerate_id();
            $_SESSION["ID"] = $utilisateur->ID_utilisateur;
            $_SESSION["Pseudo"] = $utilisateur->pseudo;
            if($utilisateur->admin === 1){
                $_SESSION['is_admin'] = true;
            }else{
                $_SESSION['is_admin'] = false;
            }
            header('Location: https://lefevre.simplon-charleville.fr/BSF/#close');
            exit();
        }
    }
}

if (isset($_POST['envoyer_mail'])){
    
    $nom = empty($_POST['nom_user']) ? null : $_POST['nom_user'];
    $prenom = empty($_POST['prenom_user']) ? null : $_POST['prenom_user'];
    $email = empty($_POST['email_user']) ? null : $_POST['email_user'];
    $messages = empty($_POST['user_message']) ? null : $_POST['user_message'];
    
    if ($nom === null || $prenom === null || $email === null || $messages === null) {
        echo 'Veuillez-remplir le champs';
    } else {
        $to = 'lefevre.gregoire19@gmail.com';
        $subject = 'Contact';
        $message = " $messages";
        $headers = "From: $nom $prenom <".$email.">  \r\n" ;
        "Reply-To: $email \r\n" ;
        
        mail($to, $subject, $message, $headers);
        $retour = "message envoyer";
    }
}
?> 