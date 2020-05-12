<?php
require_once "boot.php";
 require "log.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$articleTable = new ArticlesTable($db);
$Article = $articleTable->recupParId($_GET['ID']);
$utilisateurTable = new UserTable($db);
$utilisateur = $utilisateurTable->recupTousUtilisateur();
$commentaireTable = new CommentaireTable($db);

if(isset($_POST['ajout_commentaire'])){
   
    $contenu_commentaire = empty($_POST['commentaire']) ? null : $_POST['commentaire'];
    
    if ($contenu_commentaire === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {
        $numcommentaire = $commentaireTable->numcommentaire();
        $commentaire = new Commentaire();
        $commentaire->contenu_commentaire = $contenu_commentaire;
        $commentaire->id_articlenum = $Article->id_articlenum;
        $commentaire->id_user = $_SESSION['ID'];
        $commentaire->$id_numcommentaire = $numcommentaire;
        $commentaireTable->ajoutCommentaire($commentaire);
        header('location: fiche_article.php?ID='.$_GET['ID']);
        die;
    }
}
 $ID = $db->lastInsertId();

$commentaireTable->datecreation($ID);

$commentaires = $commentaireTable->recupTousCommentaire();

if(isset($_POST['delete_commentaire'])){
  $commentaireTable->deleteCommentaire($_POST['delete_commentaire']);
    $_SESSION['flash'] = "Suppression effectuée";
        header('Location: fiche_article.php?ID='.$_GET['ID']);
        die;
}

require 'vue/fiche_article.php';