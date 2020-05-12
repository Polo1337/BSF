<?php 
require_once 'boot.php';

class CategorieTable 
{
     protected $db; 
    
    
    
    public function __construct($db)
    {
        $this->db = $db;
       
    }

     public function recupTouteCategorie()
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM T_categorie",[]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $categories)
        {
            $tab[$categories['id_categorie']]  = $this->createCategories($categories);
            
        }
         return $tab;
    }

     public function createCategories($tableau)
    {
        $categories = new Categorie();
        $categories->id_categorie = $tableau['id_categorie'];
        $categories->nom_categorie = $tableau['nom_categorie'];
        return $categories;
         
    }
}