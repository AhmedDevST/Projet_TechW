<?php 
require_once("DAO.php");
   class Cat{
    private $id;
    private $nom;

    function __construct($i,$n){
        $this->id=$i;
        $this->nom=$n;
    }

    function __get($c){
        switch($c){
            case 'id': return $this->id; break;
            case 'nom': return $this->nom; break;
        }
     }
 
    function ajouter_cat(){
        $con=new DAO();
        if($con->add_cat($this)) return true;
        return false;
    }
    function modifier_cat(){
        $con=new DAO();
        if($con->update_cat($this)) return true;
        return false;
    }
    static function supprimer_cat($id){
        $con=new DAO();
        if($con->delete_cat($id)) return true;
        return false;
    }
    static function getCat($id){
        $con=new DAO();
        return $con->get_Cat($id);
    }
    static function select($id){
        $con=new DAO();
        return $con->select_Cat($id);
    }
    static function  afficher(){
        $con=new DAO();
        return $con->List_Cat();
    }
   }


?>