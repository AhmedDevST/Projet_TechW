<?php 
require_once("DAO.php");
   class Approvis{
    private $idAch;
    private $idPro;
    private $Qun;

    function __construct($i,$n,$f){
        $this->idAch=$i;
        $this->idPro=$n;
        $this->Qun=$f;
    }

    function __get($p){
        switch($p){
            case 'idAch': return $this->idAch; break;
            case 'idPro': return $this->idPro; break;
            case 'Qun': return $this->Qun; break;
        }
     }
    function ajouter_approvis(){
        $con=new DAO();
        if($con->add_approvis($this)) return true;
        return false;
    }

    static function update_Qun($idA,$idP,$q){
        $con=new DAO();
        if($con->modifier_QunApp($idA,$idP,$q)) return true;
        return false;
    }

    static function supprimerApp($ida,$idp){
        $con=new DAO();
        return $con->delete_Approvis($ida,$idp);
    }

    static function getAppch($idA,$idP){
        $con=new DAO();
        return $con->get_Approv($idA,$idP);
    }
    static function afficher($id){
        $con=new DAO();
        return $con->List_Approv($id);
    }
   }


?>