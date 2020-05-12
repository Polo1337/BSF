    <nav class=" topnav " id="myTopnav">
        <?php if(isset($_SESSION["Pseudo"])): ?>
   <a class="text-white " >Bonjour <?php echo $_SESSION["Pseudo"];?></a>

        <a  href="logout.php">déconnexion</a>
         <a  href="compte_user.php">
            Compte
        </a>

        <?php if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]):?>

        <a  href="admin.php">Admin</a>
         <a  href="#">
            Archives
        </a>
        <?php endif?>
    
    <?php else:?>
   <a href="#inscription"  >S'inscrire </a>
    <a href="#connexion"  >Se connecter</a>
    <?php endif?>
         <a  href="index.php">
            Accueil
        </a>
        <a href="#contact"  href="contact.php">
            Contact
        </a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        &#9776;
    </a>
   
</nav>

<nav class="bg-white px-8 pt-2 py-3 shadow-md">
    <div class="-mb-px flex justify-center">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <img class="h-12" src="img/BSF" alt="" style="border-style: none">
        </div>
    </nav>
    <nav class="bg-red-700 px-8 pt-2 py-1 shadow-md cacher">
        <div class="-mb-px flex justify-center ">
            <div class="  flex items-center text-white hover  mr-6">
                <div class=" text-center  mr-4">
                    <a  href="#">
                        <i class="fas fa-atom text-2xl">
                        <p class=" text-base hover momo2  p-1">Science</p>
                        </i>
                    </a>
                </div>
                <div class=" text-center  mr-4">
                    <a  href="#">
                        <i class="fas fa-tv  text-2xl">
                        <p class=" text-base  hover momo2 p-1">télévision</p>
                        </i>
                    </a>
                </div>
                <div class=" text-center mr-4">
                    <a  href="#">
                        <i class=" fas fa-journal-whills text-2xl ">
                        <p class=" text-base  hover momo2 p-1">Religion</p>
                        </i>
                    </a>
                </div>
                <div class=" text-center mr-4">
                    <a  href="#">
                        <i class="fas fa-football-ball text-2xl ">
                        <p class=" text-base  hover momo2 p-1">Sport</p>
                        </i>
                    </a>
                </div>
                <div class=" text-center mr-4">
                    <a href="#">
                        <i class="fas fa-caravan text-2xl ">
                        <p class=" text-base  hover momo2 p-1">Camping</p>
                        </i>
                    </a>
                </div>
                <div class=" text-center  mr-4">
                    <a  href="#">
                        <i class=" fas fa-cloud-sun text-2xl ">
                        <p class=" text-base hover momo2 p-1">Meteo/climat</p>
                        </i>
                    </a>
                </div>
        </nav>
    <?php include 'contact_modal.php';
  include 'connexion_modal.php';
  include 'inscription_modal.php';
  ?>