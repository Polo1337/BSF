<?php
require_once "Classes/Database.php";
require_once "boot.php";


$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);



if (isset($_POST['bouton'])){
    $pseudo_user = empty($_POST['pseudo_user']) ? null : $_POST['pseudo_user'];
    $nom_user = empty($_POST['nom_user']) ? null : $_POST['nom_user'];
    $prenom_user = empty($_POST['prenom_user']) ? null : $_POST['prenom_user'];
    $email_user= empty($_POST['email_user']) ? null : $_POST['email_user'];
    $password_user = empty($_POST['password_user']) ? null : $_POST['password_user'];
    
    if ($pseudo_user === null || $nom_user === null || $prenom_user === null || $email_user === null || $password_user === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {
        $inscription = $db->prepareAndExecute("INSERT INTO utilisateur (Email, mot_de_passe, Prenom, Nom, Pseudo) 
        VALUES (:Email, :mot_de_passe, :Prenom, :Nom, :Pseudo)",
        [':Email' => $email_user,
        ':mot_de_passe' => password_hash($password_user, PASSWORD_DEFAULT ),
        ':Prenom' => $prenom_user,
        ':Nom'=>$nom_user,
        ':Pseudo'=>$prenom_user]) ;
        header('Location: /poo_connexion/connexion.php');
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
    <link rel="stylesheet" href="css/footer.css">
      <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<form class="bg-white rounded px-8 pt-6 pb-8 mb-4" action="inscription.php" method="POST">


<label class="block text-gray-700 text-dm font-bold mb-2"><b>Pseudo d'utilisateur</b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="text" name="pseudo_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Nom d'utilisateur</b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="text" name="nom_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Prenom d'utilisateur</b></label>
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="text" name="prenom_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Email d'utilisateur</b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="email" name="email_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Mot de passe</b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "   type="password" placeholder="Mot de passe" name="password_user" required>
<br>

<div class="bouton">
<button class=" m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="bouton" class="btn btn-primary mb-2">s'inscrire</button>
</div>
<?php if(isset($erreur)){
    echo "<p>$erreur</p>";
}
?>
</form>
<?php include "footer.php";?>
 <script src="https://kit.fontawesome.com/22fcc891fe.js" crossorigin="anonymous"></script>
</body>
</html>