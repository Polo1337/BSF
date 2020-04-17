<?php

require "boot.php";
$dbh = new PDO($config["dsn"], $config["utilisateur"], $config["mdp"]);


if (isset($_POST['bouton'])){
    $pseudo_user = empty($_POST['pseudo_user']) ? null : $_POST['pseudo_user'];
    $password_user = empty($_POST['password_user']) ? null : $_POST['password_user'];
    
    if ($pseudo_user === null || $password_user === null) {
        echo 'Veuillez remplir tous les champs';
    }else {
        $requeteprepare = $dbh->prepare ("SELECT * FROM utilisateur WHERE  Pseudo = :Pseudo") ;
        $requeteprepare->execute(array(':Pseudo' => $pseudo_user));
        $utilisateur = $requeteprepare->fetch(PDO::FETCH_ASSOC);
        if($utilisateur === false){
            $erreur =  "login et / ou mot de passe incorrect";
        }
        
        if(!password_verify($password_user, $utilisateur["mot_de_passe"] ?? '')) {
            $erreur =  "login et / ou mot de passe incorrect";
        }
        
        if( $erreur === null){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            session_regenerate_id();
            $_SESSION["ID"] = $utilisateur["ID_utilisateur"];
            $_SESSION["Pseudo"] = $utilisateur["Pseudo"];
            if($utilisateur["Admin"] === "1"){
                $_SESSION['is_admin'] = true;
            }else{
                $_SESSION['is_admin'] = false;
            }
            header('Location: /allosimplon/index.php');
            exit();
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/footer.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
<?php include 'navbar.php';?>

<form class="m-4">
  <div class="form-group w-64">
    <label for="email">Email</label>
    <input type="email" class="form-control">
  </div>
  <div class="form-group w-64">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php  include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/22fcc891fe.js" crossorigin="anonymous"></script>
</body>
</html>