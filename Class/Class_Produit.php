<?php
require_once("DAO.php");
   class Produit{
      private $ref;
      private $lib;
      private $prixU;
      private $prixV;
      private $prixA;
      private $Quns;
      private $photo;
      private $cat;

      function __construct($r,$l,$pu,$pv,$pa,$q,$img,$c){
        $this->ref=$r;  $this->lib=$l; 
        $this->prixU=$pu;  $this->prixV=$pv;  $this->prixA=$pa;
        $this->Quns=$q; $this->cat=$c; $this->photo=$img;
      }

      function __get($p){
        switch($p){
            case 'ref': return $this->ref; break;
            case 'lib': return $this->lib; break;
            case 'Quns': return $this->Quns; break;
            case 'prixU': return $this->prixU; break;
            case 'prixV': return $this->prixV; break;
            case 'prixA': return $this->prixA; break;
            case 'photo': return $this->photo; break;
            case 'cat': return $this->cat; break;
        }
     }

     function add_pro(){
        $con=new DAO();
       if($con->ajouterPro($this)) return true ;
       return false;
     }
     
     static function get_produit($id){
      $con=new DAO();
      return $con-> get_Produit($id);
     }

     static function serach_Pro($id){
      $con=new DAO();
      return $con->search_Produit($id);
     }
     
     function update_pro(){
      $con=new DAO();
      if($con->modifier_Pro($this)) return true ;
      return false;
     }
     
     static function UpdatePhoto($ref,$ph){
         $con=new DAO();
         if($con->modifier_Photo($ref,$ph)) return true ;
         return false;
     }
     static function update_Qun($ref,$Q){
        $con=new DAO();
        if($con->modifier_Quntite($ref,$Q)) return true ;
        return false;
     }
     
      static function delete_Pro($id){
        $con=new DAO();
        if($con->delete_Produit($id)) return true ;
        return false;
      }
      
     static function ListPCat($id){
      $con=new DAO();
      return $con-> List_ProCat($id);
     }

     static function afficher_pro(){
      $con=new DAO();
      return $con-> List_Produit();
     }

     static function getMaxId(){
        $con=new DAO();
        return $con-> MaxId();
     }
   }



?>