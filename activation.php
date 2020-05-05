<?php
require "boot.php"; 

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);
$userTable = new UserTable($db);

if(empty($_GET['pseudo_user']))
{
  $erreur = "Erreur Pseudo";
  die;
}
if(empty($_GET['token_user']))
{
  $erreur = "Erreur token";
  die;
}
$pseudo_user = $_GET['pseudo_user'];
$token_user = $_GET['token_user'];


$user = $userTable->recupParPseudo($pseudo_user);
if($user === null){
  $erreur = "User invalid";
  die;
}
if($user->etat_user == 1)
{
  echo "Votre compte est déjà actif !";
}
else 
{
 
  if($token_user == $user->token_user)    
  {

     $userTable->activationtoken($user->pseudo_user);
      
      echo "Votre compte a bien été activé !";
      echo "<a href='index.php'>Retour a la page de connexion</a>";
  }
  else 
  {
    echo "Erreur ! Votre compte ne peut être activé...";
  }
}

