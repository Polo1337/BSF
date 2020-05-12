<?php

require_once "boot.php";
require_once "securite.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);
$articleTable = new ArticlesTable($db);
$categorieTable = new CategorieTable($db);
$categorie_articles = $categorieTable->recupTouteCategorie();
$article = $articleTable->recupParId($_GET['ID']);
$ID = $_GET['ID'];
$id_articlenum = $article->id_articlenum;
$numero_article = $article->numero_article;


if (isset($_POST['bouton'])){
    $nom_article = empty($_POST['nom_article']) ? null : $_POST['nom_article'];
    $texte_article= empty($_POST['texte_article']) ? null : $_POST['texte_article'];
    $categorie= empty($_POST['select_categorie']) ? null : $_POST['select_categorie'];
   
    if ($nom_article === null  || $texte_article === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {
        
        $article->id_article = $article->id_article;
        $article->nom_article = $nom_article;
        $article->texte_article = $texte_article;
        $article->id_user = $_SESSION['ID'];
        $article->numero_article = $numero_article;
        $article->id_articlenum = $id_articlenum;
        $article->id_categorie = $categorie;
        $articleTable->updateArticle($article);
        
        $ID = $db->lastInsertId();

        $articleTable->datecreation($_GET['ID']);
                
        if (isset($_FILES['image_article']) && $_FILES['image_article']['error'] === UPLOAD_ERR_OK)
        {  
            if ($_FILES['image_article']['size'] <= 250000)
            {  
                $chemin =  'photoarticles/' . $_FILES['image_article']['name'];
                move_uploaded_file($_FILES['image_article']['tmp_name'], 'photoarticles/' . $_FILES['image_article']['name']);
                if($_FILES['image_article']['type'] === 'image/jpeg'){
                    $image = @imagecreatefromjpeg($chemin);
                }elseif($_FILES['image_article']['type'] === 'image/png'){
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
                if($_FILES['image_article']['type'] === 'image/jpeg'){
                    imagejpeg($return_image,$chemin);
                }elseif($_FILES['image_article']['type'] === 'image/png'){
                    imagepng($return_image,$chemin);
                }
               
             $articleTable->insertPhoto($_GET['ID'],$_FILES['image_article']['name']);
                   
            }else{  
                $erreur = "un problème de téléchargement est survenu !!";
            }
        }
         $_SESSION['flash'] = "Modification effectuer";
            header('Location: editer_articles.php?ID='.$_GET['ID']);
        die;
    }
}
require 'vue/editer_articles.php';