<?php
require_once("DAO.php");
   class User{
      private $id;
      private $login;
      private $password;
      private $role;

      function __construct($i,$l,$p,$r){
         $this->id=$i; 
         $this->login=$l; 
         $this->password=$p; 
         $this->role=$r;  
      }
      function __get($u){
        switch($u){
            case 'id': return $this->id; break;
            case 'login': return $this->login; break;
            case 'password': return $this->password; break;
            case 'role': return $this->role; break;
        }
     }

     static function getUser($u,$p){
        $con=new DAO();
        return $con->get_User($u,$p);
     }

  
   }



?>