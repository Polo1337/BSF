<?php

require_once "boot.php";


$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);
$userTable = new UserTable($db);


if (isset($_POST['inscription'])){
    $pseudo = empty($_POST['pseudo']) ? null : $_POST['pseudo'];
    $nom = empty($_POST['nom']) ? null : $_POST['nom'];
    $prenom = empty($_POST['prenom']) ? null : $_POST['prenom'];
    $email= empty($_POST['email']) ? null : $_POST['email'];
    $mdp = empty($_POST['mdp']) ? null : $_POST['mdp'];
    
    if ($pseudo === null || $nom === null || $prenom === null || $email === null || $mdp === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {
        $token = md5(microtime(TRUE)*100000);

        $user = new User();
        $user->nom = $nom;
        $user->prenom =  $prenom;
        $user->mdp =  $mdp;
        $user->pseudo = $pseudo;
        $user->email = $email;
        $user->token = $token;
        $userTable->insertUser($user);

        $destinataire = $user->email;
        $sujet = "Activer votre compte" ;
        $entete = "From: Contact@lefevre.simplon-charleville.fr" ;
        
        
        $message = 'Bienvenue sur Poo connexion,
        
        Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
        ou copier/coller dans votre navigateur Internet.
      http://lefevre.simplon-charleville.fr/BSF/activation.php?pseudo='.urlencode($user->pseudo).'&token='.urlencode($token).'
        
        
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';
        
        
        mail($destinataire, $sujet, $message, $entete) ;

        header('Location: index.php');
        die;   
    }
}
      

if (isset($_POST['login'])){
    $pseudo = empty($_POST['pseudo_user']) ? null : $_POST['pseudo_user'];
    $mdp = empty($_POST['password_user']) ? null : $_POST['password_user'];
    
    if ($pseudo === null || $mdp === null) {
        echo 'Veuillez remplir tous les champs';
    }else {
        
        
        // la fonction prépare et execute son dans la meme fonction, il suffit de la remplir de votre requete et de vos valeurs //
        
        $usertable = new UserTable($db);
        $utilisateur = $usertable->recupParPseudo($pseudo);
        if($utilisateur === null){
            $erreur =  "login et / ou mot de passe incorrect";
        }
        if(!password_verify($mdp, $utilisateur->mdp ?? '')) {
            $erreur =  "login et / ou mot de passe incorrect";
            
        }
        if( $erreur === null){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            session_regenerate_id();
            $_SESSION["ID"] = $utilisateur->id_utilisateur;
            $_SESSION["Pseudo"] = $utilisateur->pseudo;
            if($utilisateur->id_grade === 3){
                $_SESSION['is_admin'] = true;
            }else{
                $_SESSION['is_admin'] = false;
            }
             if($utilisateur->id_grade === 2){
                $_SESSION['is_moderateur'] = true;
            }else{
                $_SESSION['is_moderateur'] = false;
            }
            header('Location: index.php');
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