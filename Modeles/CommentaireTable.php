<?php 
require_once "boot.php";
class CommentaireTable
{
    protected $db; 
    
    
    
    public function __construct($db)
    {
        $this->db = $db;
       
    }

      public function ajoutCommentaire($commentaire)
    {
          $insert_commentaire = $this->db->prepareAndExecute("INSERT INTO T_Commentaire (id_articlenum,contenu_commentaire,id_user,id_numcommentaire) VALUES (:id_articlenum,:contenu_commentaire,:id_user,:id_numcommentaire)",[
                ':id_articlenum' => $commentaire->id_articlenum,
                ':contenu_commentaire'=>$commentaire->contenu_commentaire,
                'id_user'=> $commentaire->id_user,
                'id_numcommentaire' => $commentaire->id_numcommentaire]);
    }

    public function recupTousCommentaire()
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM T_Commentaire",[]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $commentaire)
        {
            $tab[$commentaire['id_commentaire']]  = $this->createCommentaire($commentaire);
            
        }
         return $tab;
    }

      public function recupCommentairesArticle($ID)
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM T_Commentaire WHERE id_articlenum = :ID",[':ID' => $ID]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $commentaire)
        {
            $tab[$commentaire['id_commentaire']]  = $this->createCommentaire($commentaire);
            
        }
         return $tab;
    }


    protected function createCommentaire($tableau)
    {
         $commentaire = new Commentaire();
         $commentaire->id_commentaire = $tableau['id_commentaire'];
        $commentaire->contenu_commentaire = $tableau['contenu_commentaire'];
        $commentaire->date_commentaire = $tableau['date_commentaire'];
        $commentaire->id_user = $tableau['id_user'];
        $commentaire->id_numcommentaire = $tableau['id_numcommentaire'];
        $commentaire->id_articlenum = $tableau['id_articlenum'];
        return $commentaire;
    }

      public function deleteCommentaire($ID)
    {
    $delete =$this->db->prepareAndExecute("DELETE FROM T_Commentaire WHERE id_commentaire = :ID LIMIT 1",[':ID' => $ID]);
    }

    public function numcommentaire()
    {
         $id_numcommentaire =  $this->db->prepareAndExecute("INSERT INTO T_numcommentaire (id_numcommentaire) VALUES (:id_numcommentaire)",[':id_numcommentaire' => null]);

         return $id_numcommentaire;
    }
    
    public function datecreation($id_commentaire)
    {
        
         $this->db->prepareAndExecute("UPDATE T_Commentaire SET date_commentaire = NOW() WHERE id_commentaire = :id_commentaire",[':id_commentaire' => $id_commentaire]);
    }

}