<?php
require_once 'boot.php';

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$articleTable = new ArticlesTable($db);
$categorieTable = new CategorieTable($db);
$categorie_articles = $categorieTable->recupTouteCategorie();


if (isset($_POST['bouton'])){
    $nom_article = empty($_POST['nom_article']) ? null : $_POST['nom_article'];
    $texte_article= empty($_POST['texte_article']) ? null : $_POST['texte_article'];
    $categorie= empty($_POST['select_categorie']) ? null : $_POST['select_categorie'];
   
    if ($nom_article === null  || $texte_article === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {
       $articlenum = $articleTable->articlenum();
        $ID_articlenum = $db->lastInsertId();
        $article = new Article();
        $article->nom_article = $nom_article;
        $article->texte_article = $texte_article;
        $article->id_user = $_SESSION['ID'];
        $article->id_articlenum = $ID_articlenum;
        $article->id_categorie = $categorie;
        $articleTable->insertArticles($article);
        
        $ID = $db->lastInsertId();

        $articleTable->datecreation($ID);
                
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
                    header('location: insertion_articles.php');
                    die;
                }
                if($image === false){
                    unlink($chemin);
                    $_SESSION['flash'] = "Erreur de conversion d'image";
                    header('location: insertion_articles.php');
                    die;
                }
                $return_image = imagescale($image,350);
                if($_FILES['image_article']['type'] === 'image/jpeg'){
                    imagejpeg($return_image,$chemin);
                }elseif($_FILES['image_article']['type'] === 'image/png'){
                    imagepng($return_image,$chemin);
                }
               
             $articleTable->insertPhoto($ID,$_FILES['image_article']['name']);
                   
            }else{  
                $erreur = "un problème de téléchargement est survenu !!";
            }
        }
        header('location: insertion_articles.php');
        die;
    }
}
require 'vue/insertion_articles.php';
