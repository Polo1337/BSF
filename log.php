<?php

require_once "boot.php";


$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);
$userTable = new UserTable($db);


if (isset($_POST['inscription'])){
    $pseudo_user = empty($_POST['pseudo_user']) ? null : $_POST['pseudo_user'];
    $nom_user = empty($_POST['nom_user']) ? null : $_POST['nom_user'];
    $prenom_user = empty($_POST['prenom_user']) ? null : $_POST['prenom_user'];
    $mail_user= empty($_POST['mail_user']) ? null : $_POST['mail_user'];
    $password_user = empty($_POST['password_user']) ? null : $_POST['password_user'];
    $ville_user = empty($_POST['ville_user']) ? null : $_POST['ville_user'];
    $birth_user = empty($_POST['birth_user']) ? null : $_POST['birth_user'];
    $adresse_user = empty($_POST['adresse_user']) ? null : $_POST['adresse_user'];
    $pays_user = empty($_POST['pays_user']) ? null : $_POST['pays_user'];
    
   
        $token_user = md5(microtime(TRUE)*100000);

        $user = new User();
        $user->pseudo_user = $pseudo_user;
        $user->nom_user =  $nom_user;
        $user->prenom_user =  $prenom_user;
        $user->mail_user = $mail_user;
        $user->password_user = $password_user;
        $user->token_user = $token_user;
        $user->ville_user = $ville_user;
        $user->birth_user = $birth_user;
        $user->adresse_user = $adresse_user;
        $user->pays_user = $pays_user;
        $userTable->insertUser($user);

        $destinataire = $user->mail_user;
        $sujet = "Activer votre compte" ;
        $entete = "From: Contact@lefevre.simplon-charleville.fr" ;
        
        
        $message = 'Bienvenue sur Poo connexion,
        
        Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
        ou copier/coller dans votre navigateur Internet.
      http://lefevre.simplon-charleville.fr/BSF/activation.php?pseudo_user='.urlencode($user->pseudo_user).'&token_user='.urlencode($token_user).'
        
        
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';
        
        
        mail($destinataire, $sujet, $message, $entete) ;

      
        header('Location: index.php');
        die;   
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
        if(!password_verify($password_user, $utilisateur->password_user ?? '')) {
            $erreur =  "login et / ou mot de passe incorrect";
            
        }
        if( $erreur === null){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            session_regenerate_id();
            $_SESSION["ID"] = $utilisateur->id_user;
            $_SESSION["Pseudo"] = $utilisateur->pseudo_user;
            if($utilisateur->id_type_user === 3){
                $_SESSION['is_admin'] = true;
            }else{
                $_SESSION['is_admin'] = false;
            }
             if($utilisateur->id_type_user === 2){
                $_SESSION['is_moderateur'] = true;
            }else{
                $_SESSION['is_moderateur'] = false;
            }
          
            $userTable->dernierConnexion($pseudo_user);
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