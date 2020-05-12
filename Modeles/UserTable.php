<?php 
require_once "boot.php";

class UserTable
{
    protected $db; 
    
    
    
    public function __construct($db)
    {
        $this->db = $db;
       
    }
    
     public  function recupParId($ID)
    {
         $requete = $this->db->prepareAndExecute('SELECT * FROM T_User WHERE id_user = :id_user',[':id_user' => $ID]);
        $tableau = $requete->fetch();
        if($tableau === false){
            return null;
        }
        return $this->createUserFromDbResult($tableau);
    }

    public function recupParPseudo($pseudo_user)
    {
         $requete = $this->db->prepareAndExecute('SELECT * FROM T_User WHERE pseudo_user = :pseudo_user',[':pseudo_user' => $pseudo_user]);
        $tableau = $requete->fetch();
        if($tableau === false){
            return null;
        }
        return $this->createUserFromDbResult($tableau);
    }

    public function recupTousUtilisateur()
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM T_User",[]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $Users)
        {
            $tab[$Users['id_user']]  = $this->createUserFromDbResult($Users);
            
        }
         return $tab;
    }
    
    public function deleteUser($ID)
    {
    $delete =$this->db->prepareAndExecute("DELETE FROM T_User WHERE id_user = :ID LIMIT 1",[':ID' => $ID]);
    }
     public function insertUser($user)
    {
       $inscription = $this->db->prepareAndExecute("INSERT INTO T_User (mail_user, password_user, prenom_user, nom_user, pseudo_user,token_user,etat_user,id_type_user,ville_user,birth_user,adresse_user,pays_user,lastlog_user,avatar_user,raisonduban_user) 
        VALUES (:mail_user, :password_user, :prenom_user, :nom_user, :pseudo_user,:token_user,:etat_user,:id_type_user,:ville_user,:birth_user,:adresse_user,:pays_user,:lastlog_user,:avatar_user,:raisonduban_user)",
        [':mail_user' => $user->mail_user,
        ':password_user' => password_hash($user->password_user, PASSWORD_DEFAULT ),
        ':nom_user' => $user->nom_user,
        ':prenom_user'=>$user->prenom_user,
        ':pseudo_user'=>$user->pseudo_user,
        ':token_user'=> $user->token_user,
        ':etat_user'=>0,
        ':id_type_user'=>$user->id_type_user,
        ':ville_user' => $user->ville_user,
        ':birth_user' => $user->birth_user,
        ':adresse_user' => $user->adresse_user,
        ':pays_user' => $user->pays_user,
        ':lastlog_user' => 0,
        ':avatar_user' => $user->avatar_user,
        ':raisonduban_user' => 'Pas Ban'
        ]) ;
    }

    public function insertPhoto($ID,$avatar_user)
    {
         $requete = $this->db->prepareAndExecute("UPDATE T_User SET avatar_user = :avatar_user WHERE id_user = :ID ",[':ID' => $ID, ':avatar_user' => $avatar_user]);
    }

    public function updateUser($user)
    {
       $inscription = $this->db->prepareAndExecute("UPDATE T_User SET
            nom_user = :nom_user, 
            prenom_user = :prenom_user,
            pseudo_user = :pseudo_user,
            mail_user = :mail_user, 
            password_user = :password_user,
            id_type_user = :id_type_user
            WHERE id_user = :ID",
            [':ID' => $user->id_user,
                ':mail_user' => $user->mail_user,
        ':password_user' => password_hash($user->password_user, PASSWORD_DEFAULT ),
        ':prenom_user' => $user->prenom_user,
        ':nom_user'=>$user->nom_user,
        ':pseudo_user'=>$user->pseudo_user,
        ':id_type_user'=>$user->id_type_user] );
    }

    public function selectIdGrade($user)
    {
              $requete = $this->db->prepareAndExecute('SELECT * FROM T_User WHERE id_type_user = :id_type_user',[':id_type_user' => $user->id_type_user]);
             $requete->fetchAll();
           
    }

     public function activationtoken($pseudo_user)
    {
     
        $this->db->prepareAndExecute("UPDATE T_User SET etat_user = 1 WHERE pseudo_user = :pseudo_user ",[':pseudo_user' => $pseudo_user]);
      
     
    }
    
    public function dernierConnexion($pseudo_user)
    {
        
         $this->db->prepareAndExecute("UPDATE T_User SET lastlog_user = NOW() WHERE pseudo_user = :pseudo_user",[':pseudo_user' => $pseudo_user]);
    }
    
  

    protected function createUserFromDbResult($tableau)
    {
         $user = new User();
         //hydratation des valeurs //
        $user->id_user = $tableau['id_user'];
        $user->nom_user = $tableau['nom_user']; 
        $user->prenom_user = $tableau['prenom_user']; 
        $user->password_user = $tableau['password_user']; 
        $user->pseudo_user = $tableau['pseudo_user']; 
        $user->mail_user = $tableau['mail_user']; 
        $user->etat_user = $tableau['etat_user']; 
        $user->token_user = $tableau['token_user']; 
        $user->id_type_user = $tableau['id_type_user'];
        $user->ville_user = $tableau['ville_user']; 
        $user->birth_user = $tableau['birth_user']; 
        $user->adresse_user = $tableau['adresse_user'];
        $user->pays_user = $tableau['pays_user']; 
        $user->lastlog_user = $tableau['lastlog_user'];
        $user->avatar_user = $tableau['avatar_user']; 
        $user->raisonduban_user = $tableau['raisonduban_user'];
        return $user;
    }
}