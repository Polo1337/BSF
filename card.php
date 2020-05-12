<?php 
require_once "boot.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$articlesTable = new ArticlesTable($db);

$articles = $articlesTable->recupTousPublier();

$utilisateurTable = new UserTable($db);
$utilisateur = $utilisateurTable->recupTousUtilisateur();


require 'vue/card.php';