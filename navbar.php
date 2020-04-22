    <nav class="bg-blue-500 px-4 pt-2 py-3 shadow-md flex justify-center hover-article ">
        <?php if(isset($_SESSION["Pseudo"])): ?>
   <span class="no-underline text-grey-dark text-white border-b-2 border-transparent uppercase tracking-wide font-bold py-2 mr-8 hover-article">Bonjour <?php echo $_SESSION["Pseudo"];?></span>

        <a class="no-underline text-grey-dark text-white border-b-2 border-transparent uppercase tracking-wide font-bold py-2 mr-8 hover-article " href="logout.php">déconnexion</a>

        <?php if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]):?>

        <a class="no-underline text-grey-dark text-white border-b-2 border-transparent uppercase tracking-wide font-bold py-2 mr-8 hover-article " href="admin.php">Admin</a>
        <?php endif?>
    </li>
    
    <?php else:?>
   <a href="#inscription" class="no-underline text-grey-dark text-white border-b-2 border-transparent uppercase tracking-wide font-bold py-2 mr-8 hover-article" >S'inscrire </a>
    <a href="#connexion" class="no-underline text-grey-dark text-white border-b-2 border-transparent uppercase tracking-wide font-bold py-2 mr-8 hover-article" >Se connecter</a>
    <?php endif?>
         <a class="no-underline text-grey-dark text-white border-b-2 border-transparent uppercase tracking-wide font-bold  py-2 mr-8 hover-article" href="index.php">
            Accueil
        </a>
        <a class="no-underline text-grey-dark text-white border-b-2 border-transparent uppercase tracking-wide font-bold  py-2 mr-8 hover-article" href="#">
            Archives
        </a>
        <div class="dropdown  relative">
    <button class="no-underline text-grey-dark text-white border-b-2 border-transparent uppercase tracking-wide font-bold py-2 mr-8 hover-article">
      <span class="mr-1">Les Tops</span>
    </button>
    <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
      <li class=""><a class="rounded-t bg-white hover:bg-blue-200 py-2 px-4 block whitespace-no-wrap" href="#">One</a></li>
      <li class=""><a class="bg-white hover:bg-blue-200 py-2 px-2 block whitespace-no-wrap" href="#">Two</a></li>
      <li class=""><a class="rounded-b bg-white hover:bg-blue-200 py-2 px-2 block whitespace-no-wrap" href="#">Three is the magic number</a></li>
    </ul>
 
        <a href="#contact" class="no-underline text-grey-dark text-white border-b-2 border-transparent uppercase tracking-wide font-bold  py-2 mr-8 hover-article" href="contact.php">
            Contact
        </a>
   
</nav>
<nav class="bg-white px-8 pt-2 py-3 shadow-md">
    <div class="-mb-px flex justify-center">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <img class="h-12" src="img/BSF" alt="" style="border-style: none">
        </div>
    </nav>
    <nav class="bg-red-700 px-8 pt-2 py-1 shadow-md">
        <div class="-mb-px flex justify-center ">
            <div class="  flex items-center text-white hover  mr-6">
                <div class=" text-center  mr-4">
                    <a  href="#">
                        <i class="fas fa-atom text-2xl">
                        <p class=" text-base hover  p-1">Science</p>
                        </i>
                    </a>
                </div>
                <div class=" text-center  mr-4">
                    <a  href="#">
                        <i class="fas fa-tv  text-2xl">
                        <p class=" text-base  hover p-1">télévision</p>
                        </i>
                    </a>
                </div>
                <div class=" text-center mr-4">
                    <a  href="#">
                        <i class=" fas fa-journal-whills text-2xl ">
                        <p class=" text-base  hover p-1">Religion</p>
                        </i>
                    </a>
                </div>
                <div class=" text-center mr-4">
                    <a  href="#">
                        <i class="fas fa-football-ball text-2xl ">
                        <p class=" text-base  hover p-1">Sport</p>
                        </i>
                    </a>
                </div>
                <div class=" text-center mr-4">
                    <a href="#">
                        <i class="fas fa-caravan text-2xl ">
                        <p class=" text-base  hover p-1">Camping</p>
                        </i>
                    </a>
                </div>
                <div class=" text-center  mr-4">
                    <a  href="#">
                        <i class=" fas fa-cloud-sun text-2xl ">
                        <p class=" text-base hover p-1">Meteo/climat</p>
                        </i>
                    </a>
                </div>
        </nav>
    <?php include 'contact_modal.php';
  include 'connexion_modal.php';
  include 'inscription_modal.php';
  ?>