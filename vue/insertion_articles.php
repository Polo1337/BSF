<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>
    <div>
      <div class="form">
        <form class="register-form" method="POST" action="" enctype="multipart/form-data">
          <?= $erreur ?>
          <input type="text" name="nom_article" placeholder="nom" />
          <textarea type="text" name="texte_article" placeholder="texte_article"> </textarea>
          <input type="hidden" name="size" value="250000" />
          <input type="file" name="image_article" size=20000000 />

          <select name="select_categorie" id="select_categorie">
            <?php foreach($categorie_articles as $categorie_article): ?>

            <option value="<?= $categorie_article->id_categorie ?>"><?= $categorie_article->nom_categorie?></option>
            <?php endforeach ?>
          </select>

          <button name="bouton">ajouter article</button>

          <a class="message" href="index.php">Retour a l'accueil</a>
        </form>
      </div>
    </div>
  </body>

</html>