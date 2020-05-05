

    <div id="inscription" class="modal" style="opacity:0">
        <div class="content-modal">
          
           <form action="" method="POST">


<label class="block text-gray-700 text-dm font-bold mb-2"><b>Pseudo d'utilisateur</b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="text" name="pseudo_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Nom d'utilisateur</b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="text" name="nom_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Prenom d'utilisateur</b></label>
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="text" name="prenom_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Email d'utilisateur</b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="email" name="mail_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Ville </b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="text" name="ville_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>date de naissance </b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="date" name="birth_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Pays </b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="text" name="pays_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Adresse </b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "  type="text" name="adresse_user" required> <br>

<label class="block text-gray-700 text-dm font-bold mb-2"><b>Mot de passe</b></label >
<input  class="shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "   type="password" placeholder="Mot de passe" name="password_user" required>
<br>

<div class="bouton">
<button class=" m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="inscription" class="btn btn-primary mb-2">s'inscrire</button>
</div>
<?php if(isset($erreur)){
    echo "<p>$erreur</p>";
}
?>
</form>
            <a href="#close" title="Fermer" class="close-modal"><i class="fas fa-times "></i></a>
        </div>
    </div>


    