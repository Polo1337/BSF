<?php 
require_once "boot.php";

class ArticlesTable
{
    protected $db; 
    
    
    
    public function __construct($db)
    {
        $this->db = $db;
       
    }
    
     public  function recupParId($id_article)
    {
         $requete = $this->db->prepareAndExecute('SELECT * FROM T_Article WHERE id_article = :id_article',[':id_article' => $id_article]);
        $tableau = $requete->fetch();
        if($tableau === false){
            return null;
        }
        return $this->createArticles($tableau);
    }

    public function recupParNomArticles($nom_article)
    {
         $requete = $this->db->prepareAndExecute('SELECT * FROM T_Article WHERE nom_article = :nom_article',[':nom_article' => $nom_article]);
        $tableau = $requete->fetch();
        if($tableau === false){
            return null;
        }
        return $this->createArticles($tableau);
    }

    public function updateArticle($articles)
    {
       $inscription = $this->db->prepareAndExecute("UPDATE `T_Article` SET  `nom_article`=:nom_article,`texte_article`=:texte_article,`dateparution_article`=:dateparution_article,`publie_article`=:publie_article,`id_user`=:id_user,`id_articlenum`=:id_articlenum,`id_categorie`=:id_categorie 
            WHERE id_article = :ID",
            [':ID' =>$articles->id_article,
        ':nom_article' => $articles->nom_article,
        ':texte_article'=>$articles->texte_article,
        ':id_user'=>$articles->id_user,
        ':id_categorie' => $articles->id_categorie,
        ':id_articlenum' => $articles->id_articlenum,
        ':publie_article' => 0,
        ':dateparution_article' => 0
        ]) ;
    }

    public function recupTousArticles()
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM T_Article",[]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $articles)
        {
            $tab[$articles['id_article']]  = $this->createArticles($articles);
            
        }
         return $tab;
    }
      public function recupTousPublier()
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM T_Article WHERE publie_article = :publie_article",['publie_article' => 1]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $articles)
        {
            $tab[$articles['id_article']]  = $this->createArticles($articles);
            
        }
         return $tab;
    }

     public function recupPaspublier()
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM T_Article WHERE publie_article = :publie_article",['publie_article' => 0]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $articles)
        {
            $tab[$articles['id_article']]  = $this->createArticles($articles);
            
        }
         return $tab;
    }

    public function articlenum()
    {
         $id_articlenum =  $this->db->prepareAndExecute("INSERT INTO T_articlenum (id_articlenum) VALUES (:id_articlenum)",[':id_articlenum' => null]);

         return $id_articlenum;
    }

   
    public function insertArticles($articles) 
    {

       $inscription = $this->db->prepareAndExecute("INSERT INTO T_Article (nom_article,texte_article,id_user,id_categorie,id_articlenum,publie_article,dateparution_article) 
        VALUES (:nom_article,:texte_article,:id_user,:id_categorie,:id_articlenum,:publie_article,:dateparution_article)",
        [':nom_article' => $articles->nom_article,
        ':texte_article'=>$articles->texte_article,
        ':id_user'=>$articles->id_user,
        ':id_categorie' => $articles->id_categorie,
        ':id_articlenum' => $articles->id_articlenum,
        ':publie_article' => 0,
        ':dateparution_article' => 0
        ]) ;
        
    }

    public function datecreation($id_article)
    {
        
         $this->db->prepareAndExecute("UPDATE T_Article SET datecreation_article = NOW() WHERE id_article = :id_article",[':id_article' => $id_article]);
    }

    public function insertPhoto($ID,$image_article)
    {
         $requete = $this->db->prepareAndExecute("UPDATE T_Article SET image_article = :image_article WHERE id_article = :ID ",[':ID' => $ID, ':image_article' => $image_article]);
    }

    public function createArticles($tableau)
    {
        $articles = new Article();
        $articles->id_article = $tableau['id_article'];
        $articles->nom_article = $tableau['nom_article'];
        $articles->datecreation_article = $tableau['datecreation_article'];
        $articles->image_article = $tableau['image_article'];
        $articles->texte_article = $tableau['texte_article'];
        $articles->dateparution_article = $tableau['dateparution_article'];
        $articles->id_user = $tableau['id_user'];
        $articles->id_articlenum = $tableau['id_articlenum'];
        $articles->id_categorie = $tableau['id_categorie'];
        return $articles;
         
    }

      public function deleteArticle($ID)
    {
    $delete =$this->db->prepareAndExecute("DELETE FROM T_Article WHERE id_article = :ID LIMIT 1",[':ID' => $ID]);
    }

    public function publierArticle($id_article)
    {
        $this->db->prepareAndExecute("UPDATE T_Article SET publie_article = 1 WHERE id_article = :id_article ",[':id_article' => $id_article]);
        
    }

     public function dateparution($id_article)
    {
        
         $this->db->prepareAndExecute("UPDATE T_Article SET dateparution_article = NOW() WHERE id_article = :id_article",[':id_article' => $id_article]);
    }

    public function despublierArticle($id_article)
    {
          $this->db->prepareAndExecute("UPDATE T_Article SET publie_article = 0 WHERE id_article = :id_article ",[':id_article' => $id_article]);
    }

  
   
}