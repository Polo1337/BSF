<?php 
require_once "boot.php";
class User
{
   
    public $id_user;
    public $nom_user;
    public $pseudo_user;
    public $password_user;
    public $prenom_user;
    public $mail_user;
    public $birth_user;
    public $adresse_user;
    public $etat_user = 0;
    public $pays_user;
    public $lastlog_user;
    public $token_user;
    public $avatar_user = 'blank.png';
    public $ville_user;
    public $raisonduban_user;
    public $id_type_user = 1;
    
    public function __construct()
    {
    }
   
    
}