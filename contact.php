<?php

if (isset($_POST['bouton'])){
    
    $nom = empty($_POST['nom_user']) ? null : $_POST['nom_user'];
    $prenom = empty($_POST['prenom_user']) ? null : $_POST['prenom_user'];
    $email = empty($_POST['email_user']) ? null : $_POST['email_user'];
    $messages = empty($_POST['user_message']) ? null : $_POST['user_message'];
    
    if ($nom === null || $prenom === null || $email === null || $messages === null) {
        echo 'Veuillez-remplir le champs';
    } else {
        $to = 'lefevre@simplon-charleville.fr';
        $subject = 'Contact';
        $message = " $messages";
        $headers = "From: $nom $prenom <".$email.">  \r\n" ;
        "Reply-To: $email \r\n" ;
        
        mail($to, $subject, $message, $headers);
        $retour = "message envoyer";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/modal.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen, projection" type="text/css" id="css" href="<?php echo $url; ?>" />
</head>

<body>
 <div id="contact" class="modal" style="opacity:0">
        <div class="content-modal">
            <h2>Contactez-nous :</h2>
            <form action="">
                <div>
                    <label for="name">Nom: </label>
                    <input type="text" name="name" id="name" class="form-item" required value="<?php echo $name;?>">
                </div>
                <div>
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" class="form-item" required value="<?php echo $email;?>">
                </div>
                <div>
                    <label for="message">Message: </label>
                    <textarea name="message" id="message" class="form-item" required><?php echo $message;?></textarea>
                </div>
                <div>
                    <input type="submit" value="Envoyer" class="form-item submit">
                </div>
            </form>

</body>
</html>