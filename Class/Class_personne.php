<?php 
  require_once("DAO.php");
   class Personne{
    protected $id;
    protected  $nom;
    protected  $adresse;
    protected  $tele;
    protected  $email;
    private $photo;
    protected  $role;

    function __construct($id,$n,$te,$em,$ad,$ph,$r){
      $this->id=$id;
      $this->nom=$n;
      $this->adresse=$ad;
      $this->tele=$te;
      $this->email=$em;
      $this->photo=$ph;
      $this->role=$r;
    }

 function __get($p){
    switch($p){
        case 'id': return $this->id; break;
        case 'role': return $this->role; break;
        case 'nom': return $this->nom; break;
        case 'adresse': return $this->adresse; break;
        case 'tele': return $this->tele; break;
        case 'photo': return $this->photo; break;
        case 'email': return $this->email; break;
    }
 }
    function enregistre_per(){
        $con=new DAO();
       if($con->add_personne($this))return true;
       return false;
    }  
    function update_per(){
        $con=new DAO();
        if($con->update_personne($this))return true;
        return false;
    }
    static function UpdatePhoto($id,$ph){
        $con=new DAO();
        if($con->Modifier_img($id,$ph))return true;
        return false;
    }
    static function getMaxId(){
        $con=new DAO();
        return $con->getMax();
    }
    static function supprimer_per($id){
        $con=new DAO();
        if($con->delete_personne($id))return true;
       return false;
    }
    static function get_personne($id){
        $con=new DAO();
        return $con->get_per($id);
    }
    
    static function affich(){
        $con=new DAO();
        return $con->list_personne();
    }
 }

?>