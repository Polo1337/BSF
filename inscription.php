<?php

            $config = require "config.php";
    
            $dbh = new PDO($config["dsn"], $config["utilisateur"], $config["mdp"]);

             if (isset($_POST['bouton'])){
        $pseudo_user = empty($_POST['pseudo_user']) ? null : $_POST['pseudo_user'];
        $nom_user = empty($_POST['nom_user']) ? null : $_POST['nom_user'];
        $prenom_user = empty($_POST['prenom_user']) ? null : $_POST['prenom_user'];
        $email_user= empty($_POST['email_user']) ? null : $_POST['email_user'];
        $password_user = empty($_POST['password_user']) ? null : $_POST['password_user'];

        if ($pseudo_user === null || $nom_user === null || $prenom_user === null || $email_user === null || $password_user === null) {
            $erreur = 'Veuillez remplir tous les champs';
        }else {
            $inscription = $dbh->prepare ("INSERT INTO utilisateur (Email, mot_de_passe, Prenom, Nom, Pseudo) 
            VALUES (:Email, :mot_de_passe, :Prenom, :Nom, :Pseudo)") ;
            
            $inscription->bindValue(':Pseudo', $pseudo_user);
            $inscription->bindValue(':Email', $email_user);
            $inscription->bindValue(':mot_de_passe', password_hash($password_user, PASSWORD_DEFAULT ));
            $inscription->bindValue(':Prenom', $prenom_user);
            $inscription->bindValue(':Nom', $nom_user);
            
            $inscription->execute();
           header('Location: connexion.php');
           die;
        }
    }
            ?> 



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    
</head>

<body>

<?php 
include 'navbar.php'; ?>

<form class="m-5 ">
  <div class="form-col">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control w-64" >
    </div>
    <div class="form-group ">
      <label for="motdepasse">Password</label>
      <input type="password" class="form-control w-64" >
    </div>
  </div>
  <div class="form-group">
    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control w-64">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ville">Ville</label>
      <input type="text" class="form-control w-64" >
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>