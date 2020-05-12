<?php 
require_once "boot.php";
$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$usertable = new UserTable($db);
$utilisateur = $usertable->recupParId($_SESSION['ID']);


if (isset($_POST['bouton'])){
        $nom = empty($_POST['nom_user']) ? null : $_POST['nom_user'];
        $prenom = empty($_POST['prenom_user']) ? null : $_POST['prenom_user'];
        $pseudo= empty($_POST['pseudo_user']) ? null : $_POST['pseudo_user'];
        $email = empty($_POST['mail_user']) ? null : $_POST['mail_user'];
        $mdp = empty($_POST['password_user']) ? null : $_POST['password_user'];

        $utilisateur->id_user = $_SESSION['ID'];
        $utilisateur->nom_user = $nom;
        $utilisateur->prenom_user =  $prenom;
        $utilisateur->password_user =  $mdp;
        $utilisateur->pseudo_user = $pseudo;
        $utilisateur->mail_user = $email;
        $usertable->updateUser($utilisateur);

        if (isset($_FILES['avatar_user']) && $_FILES['avatar_user']['error'] === UPLOAD_ERR_OK)
        {  
            if ($_FILES['avatar_user']['size'] <= 250000)
            {  
                $chemin =  'avatar/' . $_FILES['avatar_user']['name'];
                move_uploaded_file($_FILES['avatar_user']['tmp_name'], 'avatar/' . $_FILES['avatar_user']['name']);
                if($_FILES['avatar_user']['type'] === 'image/jpeg'){
                    $image = @imagecreatefromjpeg($chemin);
                }elseif($_FILES['avatar_user']['type'] === 'image/png'){
                    $image = @imagecreatefrompng($chemin);
                }else {
                    unlink($chemin);
                    $_SESSION['flash'] = " Pas le bon format d'image, format accepter jpeg,png";
                    header('location: editer_articles.php?ID='.$_GET['ID']);
                    die;
                }
                if($image === false){
                    unlink($chemin);
                    $_SESSION['flash'] = "Erreur de conversion d'image";
                    header('location: editer_articles.php?ID='.$_GET['ID']);
                    die;
                }
                $return_image = imagescale($image,350);
                if($_FILES['avatar_user']['type'] === 'image/jpeg'){
                    imagejpeg($return_image,$chemin);
                }elseif($_FILES['avatar_user']['type'] === 'image/png'){
                    imagepng($return_image,$chemin);
                }
               
             $usertable->insertPhoto($_GET['ID'],$_FILES['avatar_user']['name']);
                   
            }else{  
                $erreur = "un problème de téléchargement est survenu !!";
            }
        }
        $_SESSION['flash'] = "Modification effectuer";
            header('Location: editer_utilisateur.php?ID='.$_GET['ID']);
            die;
}
require 'vue/editer_utilisateur.php';