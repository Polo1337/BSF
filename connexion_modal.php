

    <div id="connexion" class="modal" style="opacity:0">
        <div class="content-modal">
          
          <form action="" method="POST">
       
        <div class="mb-4">
            <?php if($erreur != null){
                echo "<p>$erreur</p>";
            }
            ?>
            
            <label class="block text-gray-700 text-dm font-bold mb-2"><b>Pseudo utilisateur</b></label>
            <input class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " type="text" name="pseudo_user" required> <br>
            
            <label class="block text-gray-700 text-dm font-bold mb-2"><b>Mot de passe</b></label>
            <input class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " type="password" name="password_user" required><br>
            
            <div class="bouton ">
                <button class=" m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="login" class="btn btn-primary mb-2">connexion</button>
            </div>
            
            
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?> 
        </div>
    </form>

            <a href="#close" title="Fermer" class="close-modal"><i class="fas fa-times "></i></a>
        </div>
    </div>


    