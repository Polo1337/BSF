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
        <div class='articletotal'>
            <div class='article'>
                <div>
                    <img class="flex" src="photoarticles/.<?= $Article->image_article?>" alt="" />
                </div>
                <div class='articletitle'>
                    <p><?=$Article->nom_article?></p>
                </div>
                <div>
                    <div class='articlecontent'>
                        <p><?=$Article->texte_article?></p>
                    </div>
                    <div class='articlefoot'>
                        <ul>
                            <li><a href=''>Tag</a></li>
                            <li><a href=''>Tag</a></li>
                            <li><a href=''>Tag</a></li>
                        </ul>
                        <p><?=$Article->datecreation_article?></p>
                    </div>
                </div>
                <form action="" methode="POST">
                    <div>
                        <label for="message"> Ecrire un commentaire </label>
                        <textarea rows="5" cols="65" name="message" id="message" required></textarea>
                    </div>
                    <div>
                        <button name="ajout_commentaire" type="submit" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4">ajout commentaire</button>
                    </div>
                </form>
                <div class="comment">
                    <div class="user">
                          
                        <div><img class="profilepic" src="./img/blank.png"></div>
                        <div>Pseudo</div>
                        <div>date</div>
                    </div>
                    <div class="message"> Commentaire</div>
                    
                </div>
            </div>
            <div class="SNS">
                <div id="fb-root">
                    <div class="fb-page" data-href="https://www.facebook.com/BonSensFrancais" data-tabs="timeline"
                        data-width="350px" data-height="" data-small-header="false" data-adapt-container-width="true"
                        data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/BonSensFrancais" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/BonSensFrancais%22%3ELe Bon Sens Français"></a>
                        </blockquote>
                    </div>

                </div>
                <div>
                    <p>DERNIERS ARTICLES<p>
                </div>
                <div class='otherarticles'>
                    <div class='otherarticle'>
                        <div><img src='img/post01.jpg'>
                        </div>
                        <div>
                            <p>Titre de l'article</p>
                        </div>
                    </div>
                    <div class='otherarticle'>
                        <div><img src='img/post01.jpg'>
                        </div>
                        <div>
                            <p>Titre de l'article</p>
                        </div>
                    </div>
                    <div class='otherarticle'>
                        <div><img src='img/post01.jpg'>
                        </div>
                        <div>
                            <p>Titre de l'article</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php include 'footer.php'?>
        <script src="https://kit.fontawesome.com/22fcc891fe.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="js/nav.js"></script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0"></script>


    </body>

</html>