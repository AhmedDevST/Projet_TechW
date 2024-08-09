<?php 
    require_once("DAO.php");
 class Dasbord{
     


    static function NbComday($num){
        $con=new DAO();
        return $con->Comday($num);
    }
   
    static function NbProduitDay($num){
        $con=new DAO();
        return $con->Proday($num);
    }

    static function NbAchatDay($num){
        $con=new DAO();
        return $con->Achday($num);
    }
    static function ProduitAchatDay($num){
        $con=new DAO();
        return $con->ProAchday($num);
    }

    static function TopProductVent(){
        $con=new DAO();
        return $con->TopProduct();
    }

    static function TopCat(){
        $con=new DAO();
        return $con->TopCat();
    }
   static function PhotoCat($id){
        $con=new DAO();
        return $con->PhotoCat($id);
   }
    static function NbCommande(){
        $con=new DAO();
        return $con->CountComm();
    }

    static function NbCli(){
        $con=new DAO();
        return $con->CountCli();
    }

    static function  CountStock(){
        $con=new DAO();
        return $con-> CountStock();
    }
   
    static function CountAch(){
        $con=new DAO();
        return $con->CountAch();
    }

    static function TopClient(){
        $con=new DAO();
        return $con->TopCli();
    }

    static function TopCommande(){
        $con=new DAO();
        return $con->TopCom();
    }
    static function TopAch(){
        $con=new DAO();
        return $con->TopAch();
    }
 }


?>