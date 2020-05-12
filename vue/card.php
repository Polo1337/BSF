<main class=" main flex flex-row max-w-screen-lg mx-auto ">

<section class="flex  flex-wrap news w-3/4  " style=" justify-content: center;">
<?php foreach($articles as $article):?>
    <article id="featured" class="text-center  ">
        <a href="article.php"><img class="flex" src="photoarticles/.<?= $article->image_article?>" alt="" /></a>
        <div class="momo ">
            <h1><?= $article->nom_article?></h1>
        </div>
        <p><?=$article->texte_article?></p>
        <a href="fiche_article.php?ID=<?=$article->id_article?>" class="readmore">Read more</a>
        <?php if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]):?>
        <a class="readmore"  href="editer_article.php?ID=<?=urlencode($article->id_article)?>">modifier</a>
        <?php endif?>
    </article>
    	<?php endforeach ?>
    </section>
    
    <div class="SNS  news m-4 ">
        <div id="fb-root ">
            <div class="fb-page " data-href="https://www.facebook.com/BonSensFrancais" data-tabs="timeline"
            data-width="350px" data-height="" data-small-header="false" data-adapt-container-width="true"
            data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/BonSensFrancais" class="fb-xfbml-parse-ignore"><a
                href="https://www.facebook.com/BonSensFrancais%22%3ELe Bon Sens Français"></a></blockquote>
            </div>
        </div>
        <br>
        <table class="table-auto text-sm sticky top-0 m-4  overflow-hidden ">
  <thead>
    <tr class="bg-blue-300">
      <th class=" py-2 border border-blue-500">Derniers articles</th>
    </tr>
  </thead>
  <tbody>
    
      <?php foreach($articles as $article):?>
      <tr class="bg-white">
      <td class="border  border-blue-500 text-center py-2"><?= $article->nom_article?></td>
     
    </tr>
  <?php endforeach ?>
  </tbody>
</table>
 <table class="table-auto text-sm sticky top-0 m-4  overflow-hidden ">
  <thead>
    <tr class="bg-blue-300">
      <th class=" py-2 border border-blue-500">Les plus vues</th>
      <th class=" py-2 border border-blue-500">Vues</th>
    </tr>
  </thead>
  <tbody>
     <?php foreach($articles as $article):?>
      <tr class="bg-white">
      <td class="border  border-blue-500 text-center py-2"><?= $article->nom_article?></td>
      <td class="border  border-blue-500 text-center py-2">9600</td>
     
    </tr>
  <?php endforeach ?>
  
  </tbody>
  
</table>
 <table class="table-auto text-sm sticky top-0 m-4  overflow-hidden ">
  <thead>
    <tr class="bg-blue-300">
      <th class=" py-2 border border-blue-500">Les plus commentés</th>
      <th class=" py-2 border border-blue-500">Commentaires</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($articles as $article):?>
      <tr class="bg-white">
      <td class="border  border-blue-500 text-center py-2"><?= $article->nom_article?></td>
      <td class="border  border-blue-500 text-center py-2  px-2">30</td>
     
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

    </div>
    </main>