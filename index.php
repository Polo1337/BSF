<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BSF</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css" />
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
  
</head>
<body style="background-color:#d8dcde;">
  <?php include 'navbar.php';
  include 'card.php';
  include 'footer.php';
  
  ?>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
  <script src="https://kit.fontawesome.com/22fcc891fe.js" crossorigin="anonymous"></script>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : 'your-app-id',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v6.0'
    });
  };
</script>
<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>
</html>