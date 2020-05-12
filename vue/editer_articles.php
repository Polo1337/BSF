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
        <form method="POST" enctype="multipart/form-data">
          
<label class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>Nom </b></label>
<input class="block appearance-none w-48 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline m-4 " type="text" value="<?= e($article->nom_article) ?>" name="nom_article" required> <br>

<label class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>text article</b></label>
<textarea type="text" name="texte_article" ><?= e($article->texte_article) ?></textarea>

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