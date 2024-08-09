<?php 
require_once("DAO.php");
   class LnCommande{
        private $pro;
        private $com;
        private $Qun;

    function __construct($i,$n,$q){
        $this->com=$n;
        $this->pro=$i;
        $this->Qun=$q;
    }
    
    function __get($p){
        switch($p){
            case 'pro': return $this->pro; break;
            case 'com': return $this->com; break;
            case 'Qun': return $this->Qun; break;
        }
     }

    function ajouter_LnCom(){
        $con=new DAO();
        if($con->add_LnCom($this)) return true;
        return false;
    }
    
    static function update_Qun($idc,$idp,$q){
        $con=new DAO();
        return $con->modifier_Qun($idc,$idp,$q);
    }

    static function  afficher($id){
        $con=new DAO();
        return $con->List_LnCommande($id);
    }

    static function getLnCom($idc,$idp){
        $con=new DAO();
        return $con->get_LnCom($idc,$idp);
    }

    static function  supprimerLn($idc,$idp){
        $con=new DAO();
        return $con->delete_LnCommande($idc,$idp);
    }
   
   }


?>