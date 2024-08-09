<?php 
  require_once("DAO.php");
   class Four extends  Personne{
   
    function __construct($id,$n,$te,$em,$ad,$ph,$r){
      parent::__construct($id,$n,$te,$em,$ad,$ph,$r);
    }

    static function slecte($id){
      $con=new DAO();
      return $con->list_selectFour($id);
   }

    static function affich(){
        $con=new DAO();
        return $con->list_four();
    }
 }

?>