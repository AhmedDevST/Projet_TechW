<?php
require_once("DAO.php");
   class Ticket{
      private $idT;
      private $idPro;
      private $Qun;

      function __construct($r,$l,$pu){
        $this->idT=$r ; 
        $this->idPro=$l; 
        $this->Qun=$pu;
      }

      function __get($p){
        switch($p){
            case 'idT': return $this->idT; break;
            case 'idPro': return $this->idPro; break;
            case 'Qun': return $this->Qun; break;
        }
     }

     function add_Ticket(){
        $con=new DAO();
       if($con->ajouterTicket($this)) return true ;
       return false;
     }
     static function Calcl_Moy(){
        $con=new DAO();
        return $con->CalculerM();
     }
     static function afficher(){
      $con=new DAO();
      return $con->List_Ticket();
     }
   }



?>