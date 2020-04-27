<?php require "boot.php";
 require "log.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
     <link rel="stylesheet" href="css/article.css">
    <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cheat.css">
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css" />
</head>
<body>
<?php include 'navbar.php' ?>
<?php include 'articlebody.php' ?>
<?php include 'footer.php' ?>

<script src="https://kit.fontawesome.com/22fcc891fe.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="js/nav.js"></script>
</body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0"></script>
</html>