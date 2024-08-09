<?php 
require_once("DAO.php");
   class Achat{
    private $id;
    private $Date;
    private $idfour;

    function __construct($i,$n,$f){
        $this->id=$i;
        $this->Date=$n;
        $this->idfour=$f;
    }

    function __get($p){
        switch($p){
            case 'id': return $this->id; break;
            case 'Date': return $this->Date; break;
            case 'idfour': return $this->idfour; break;
        }
     }

    function ajouter_Achat(){
        $con=new DAO();
        if($con->add_Achat($this)) return true;
        return false;
    }

    function modifier_Achat(){
        $con=new DAO();
        if($con->update_Achat($this)) return true;
        return false;
    }
    
    static function delete_Ach($id){
        $con=new DAO();
        if($con->supprimer_Achat($id)) return true;
        return false;
    }

   static function  getMax(){
      $con=new DAO();
      return $con->getMaxAch();
   }
 
    static function getAchat($id){
        $con=new DAO();
        return $con->get_Ach($id);
    }
    static function  afficher(){
        $con=new DAO();
        return $con->List_Achat();
    }
   }


?>