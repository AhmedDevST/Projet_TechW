<?php 
require_once("DAO.php");
   class Commande{
    private $idCom;
    private $date;
    private $cli;

    function __construct($d,$n,$c){
        $this->idCom=$d;
        $this->date=$n;
        $this->cli=$c;
    }

    function __get($p){
        switch($p){
            case 'idCom': return $this->idCom; break;
            case 'date': return $this->date; break;
            case 'cli': return $this->cli; break;
        }
     }
     
    function ajouter_com(){
        $con=new DAO();
        if($con->add_com($this)) return true;
        return false;
    }
    static function getMax(){
        $con=new DAO();
        return $con->getMaxCom();
    }

    static function get_Com($id){
        $con=new DAO();
        return $con->getCommande($id);
    }
    
     function modifier_com(){
        $con=new DAO();
        if($con->update_com($this)) return true;
        return false;
    }

    static function delete_Com($id){
        $con=new DAO();
        if($con->delete_Commande($id)) return true ;
        return false;
    }
    
    static function  afficher(){
        $con=new DAO();
        return $con->List_Commande();
    }
   }


?>