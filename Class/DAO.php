<?php
    require_once("Class_Produit.php");
    require_once("Class_cat.php");
    require_once("Class_personne.php");
    require_once("Class_commande.php");
    require_once("Class_LnCommande.php");
    require_once("Class_Achat.php"); 
    require_once("Class_Aprov.php"); 
    require_once("Class_Ticket.php"); 
?>
<?php
 class DAO{   
  static function  ConPDO(){
        return new PDO('mysql:host=localhost;dbname=gestion_stock',"root","");
    } 


//produit
   
  function  ajouterPro($p){
        try{
            $con=$this->ConPDO();
            $res=$con->prepare("INSERT into produit values(NULL,?,?,?,?,?,?,?);");
            $res->execute(array($p->lib,$p->prixU,$p->prixV,$p->prixA,$p->Quns,$p->photo,$p->cat));
            if($res) return true;
        }catch(Exception $e){
             return false;
        }
  }

  function  modifier_Pro($p){
     try{
        $con=$this->ConPDO();
        $res=$con->prepare("UPDATE produit set lib=?,PrixU=?,PrixV=?,PrixA=?,Quns=?,Cat=? where Ref=?;");
        $res->execute(array($p->lib,$p->prixU,$p->prixV,$p->prixA,$p->Quns,$p->cat,$p->ref));
        if($res) return true;
    }catch(Exception $e){
         return false;
    }
  }
   function modifier_Photo($id,$ph){
        try{
          $con=$this->ConPDO();
          $res=$con->prepare("UPDATE produit set Photo=? where Ref=?;");
          $res->execute(array($ph,$id));
          if($res) return true;
      }catch(Exception $e){
          return false;
      }
   }
  function modifier_Quntite($ref,$q){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("UPDATE produit set Quns=? where Ref=?;");
        $res->execute(array($q,$ref));
        if($res) return true;
        }catch(Exception $e){
            return false;
        }
  }
  
  function get_Produit($id){
        try{
          $con=$this->ConPDO();
          $res=$con->query("SELECT * FROM produit where Ref='$id';");
           if($row=$res->fetch()) return new Produit($row['Ref'],$row['lib'],$row['PrixU'],$row['PrixV'],$row['PrixA'],$row['Quns'],$row['Photo'],$row['Cat']);
          return false;
          }  catch(Exception $e){
        echo "erruer";
        } 
  }
  
  function MaxId(){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT max(Ref) as max FROM produit ;");
        $row=$res->fetch();
         return  $row['max'];
        }  catch(Exception $e){
      echo "erruer";
      } 
  }

  function delete_Produit($id){
     try{
         $con=$this->ConPDO();
         $res=$con->prepare("DELETE from produit where Ref=?;");
         $res->execute(array($id));
         if($res) return true;
        }catch(Exception $e){
            return false;
        } 
  }

  function search_Produit($id){
        try{
          $con=$this->ConPDO();
          $res=$con->query("SELECT * FROM produit ,categorie WHERE Cat=Id_cat and Ref='$id';");
          $ls=array();
          while($row=$res->fetch()){
            $ls[]=new Produit($row['Ref'],$row['lib'],$row['PrixU'],$row['PrixV'],$row['PrixA'],$row['Quns'],$row['Photo'],$row['NomCat']);
      }  
      return $ls;
        }catch(Exception $e){
          echo "erruer";
        } 
  }

  function List_ProCat($id){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT * FROM produit  WHERE Cat='$id';");
      $ls=array();
      while($row=$res->fetch()){
         $ls[]=new Produit($row['Ref'],$row['lib'],$row['PrixU'],$row['PrixV'],$row['PrixA'],$row['Quns'],$row['Photo'],$row['Cat']);
   }  
   return $ls;
      }catch(Exception $e){
        echo "erruer";
      } 
 }

  function List_Produit(){
     try{
       $con=$this->ConPDO();
       $res=$con->query("SELECT * FROM produit ,categorie WHERE Cat=Id_cat;");
       $ls=array();
       while($row=$res->fetch()){
          $ls[]=new Produit($row['Ref'],$row['lib'],$row['PrixU'],$row['PrixV'],$row['PrixA'],$row['Quns'],$row['Photo'],$row['NomCat']);
     }  
    return $ls;
      }catch(Exception $e){
        echo "erruer";
      } 
  }


//categorie
  function add_cat($cat){
    try{
        $con=$this->ConPDO();
        $res=$con->prepare("INSERT into categorie values(NULL,?);");
        $res->execute(array($cat->nom));
        if($res) return true;
        }catch(Exception $e){
          return false;
        }
  }

   function update_cat($cat){
    try{
      $con=$this->ConPDO();
      $res=$con->prepare("UPDATE categorie  set Id_cat=?,NomCat=? where Id_cat=?;");
      $res->execute(array($cat->id,$cat->nom,$cat->id));
      if($res) return true;
      }catch(Exception $e){
          return false;
      }
   }

  function delete_cat($id){
    try{
      $con=$this->ConPDO();
      $res=$con->prepare("DELETE from categorie where Id_cat=?;");
      $res->execute(array($id));
      if($res) return true;
      }catch(Exception $e){
        return false;
      }
  }

  function  get_Cat($id){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT * FROM categorie WHERE  Id_cat='$id';");
       $row=$res->fetch();
    return new Cat($row['Id_cat'],$row['NomCat']);
      }  catch(Exception $e){
      echo "erruer";
       } 
    }
   
    function select_Cat($id){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT * from categorie where Id_cat!='$id';");
        $ls=array();
        while($row=$res->fetch()){
            $ls[]=new Cat($row['Id_cat'],$row['NomCat']); 
        }
      return $ls;
    }catch(Exception $e){
       echo "erruer";
   } 
  }

  function List_Cat(){
     try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT * from categorie;");
        $ls=array();
        while($row=$res->fetch()){
            $ls[]=new Cat($row['Id_cat'],$row['NomCat']); 
        }
      return $ls;
        }catch(Exception $e){
          echo "erruer";
      } 
  }


//personne
 
  function add_personne($per){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("INSERT into personne values(NULL,?,?,?,?,?,?);");
        $res->execute(array($per->nom,$per->tele,$per->email,$per->adresse,$per->photo,$per->role));
        if($res) return true;
          }catch(Exception $e){
            return false;
        }
  }

  function update_personne($per){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("UPDATE personne set Id_per=?, Nom=?,tele=?,Email=?,Adresse=?,Role=? where Id_per=? ;");
        $res->execute(array($per->id,$per->nom,$per->tele,$per->email,$per->adresse,$per->role,$per->id));
        if($res) return true;
        }catch(Exception $e){
          return false;
      }
  }
      
  function Modifier_img ($id,$ph){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("UPDATE personne set Photo=? where Id_per=?;");
        $res->execute(array($ph,$id));
        if($res) return true;
     }catch(Exception $e){
        return false;
     }
    }
  function getMax(){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT max(Id_per) as max FROM personne ;");
        $row=$res->fetch();
        return  $row['max'];
        }  catch(Exception $e){
      echo "erruer";
      } 
  }
  function delete_personne($id){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("DELETE from personne where Id_per=?;");
        $res->execute(array($id));
        if($res) return true;
        }catch(Exception $e){
          return false;
         }
  }

  function get_per($id){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT * FROM personne WHERE  Id_per='$id';");
         $row=$res->fetch();
      return new Personne($row['Id_per'],$row['Nom'],$row['tele'],$row['Email'],$row['Adresse'],$row['Photo'],$row['Role']);
        }  catch(Exception $e){
        echo "erruer";
       } 
  }

  // function list_personne(){
  //     try{
  //       $con=$this->ConPDO();
  //       $res=$con->query("SELECT * from personne;");
  //       $ls=array();
  //       while($row=$res->fetch()){
  //          if( $row['Role']==1){
  //             $roleDes="Fournisseur";
  //         }else  $roleDes="Client"; 
  //           $ls[]=new Personne($row['Id_per'],$row['Nom'],$row['tele'],$row['Email'],$row['Adresse'],$roleDes); 
  //       }
  //         return $ls;
  //       }catch(Exception $e){
  //         echo "erruer";
  //     }
  // }


//client
     
  function list_clients(){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT * from personne where Role=2;");
        $ls=array();
        while($row=$res->fetch()){
            $ls[]=new Personne($row['Id_per'],$row['Nom'],$row['tele'],$row['Email'],$row['Adresse'],$row['Photo'],$row['Role']); 
        }
      return $ls;
          }catch(Exception $e){
            echo "erruer";
        }
  }

  function list_selectCli($id){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT * from personne where Id_per!='$id' and Role=2;");
        $ls=array();
        while($row=$res->fetch()){
            $ls[]=new Personne($row['Id_per'],$row['Nom'],$row['tele'],$row['Email'],$row['Adresse'],$row['Photo'],$row['Role']); 
        }
      return $ls;
        }catch(Exception $e){
          echo "erruer";
      } 
  }


//fouurnisseures
   
  function list_four(){
        try{
          $con=$this->ConPDO();
          $res=$con->query("SELECT * from personne where Role=1;");
          $ls=array();
          while($row=$res->fetch()){
              $ls[]=new Personne($row['Id_per'],$row['Nom'],$row['tele'],$row['Email'],$row['Adresse'],$row['Photo'],$row['Role']); 
          }
        return $ls;
      }catch(Exception $e){
         echo "erruer";
     }
 }

  function list_selectFour($id){
        try{
          $con=$this->ConPDO();
          $res=$con->query("SELECT * from personne where Id_per!='$id' and Role=1;");
          $ls=array();
          while($row=$res->fetch()){
              $ls[]=new Personne($row['Id_per'],$row['Nom'],$row['tele'],$row['Email'],$row['Adresse'],$row['Photo'],$row['Role']); 
          }
        return $ls;
      }catch(Exception $e){
        echo "erruer";
      } 
  }
      


//commande


  function add_com($com){
    try{
      $con=$this->ConPDO();
      $res=$con->prepare("INSERT into commande values(NULL,?,?);");
      $res->execute(array($com->date,$com->cli));
      if($res) return true;
    }catch(Exception $e){
      return false;
     }
  }

  function update_com($com){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("UPDATE commande set Date_com=?,Id_cli=? where Id_com=?;");
        $res->execute(array($com->date,$com->cli,$com->idCom));
        if($res) return true;
      }catch(Exception $e){
          return false;
      }
  }

  function getCommande($id){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT * FROM commande WHERE  Id_com='$id';");
        $row=$res->fetch();
      return new Commande($row['Id_com'],$row['Date_com'],$row['Id_cli']);
        }  catch(Exception $e){
        echo "erruer";
        } 
  }

  function delete_Commande($id){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("DELETE from commande where Id_com=?;");
        $res->execute(array($id));
        if($res) return true;
      }catch(Exception $e){
        return false;
      }
  }

  function List_Commande(){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT * from commande,personne where Id_cli=Id_per order by Id_com desc;");
      $ls=array();
      while($row=$res->fetch()){
          $ls[]=new Commande($row['Id_com'],$row['Date_com'],$row['Nom']); 
      }
        return $ls;
      }catch(Exception $e){
        echo "erruer";
    }
  }

  function getMaxCom(){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT max(Id_com) as num  FROM commande;");
       $row=$res->fetch();
       return $row['num'];
      }  catch(Exception $e){
      echo "erruer";
    } 
  }

//getion de commande
   function listPFacture($id){
      try{
        $ls=array();
        $con=$this->ConPDO();
        $res=$con->query("SELECT Ref,lib,PrixU,Quntite,(Quntite*PrixU) as prix  from Ln_commande,produit where Id_pro=Ref and Num_com='$id' order by prix;");
        while($row=$res->fetch()){
          $ls[]=array($row['Ref'],$row['lib'],$row['PrixU'],$row['Quntite'],$row['prix']); 
      }
      return $ls;
        }catch(Exception $e){
          echo "erruer";
      }
   }

   function  NbArticle($id){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT sum(Quntite) as somme  from Ln_commande where Num_com='$id' ;");
        $row=$res->fetch();
        return $row['somme'];
        }catch(Exception $e){
          echo "erruer";
      }
   }
   
   function  PrixTotal($id){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT sum(Quntite*PrixU) as somme  from Ln_commande,produit where Id_pro=Ref and  Num_com='$id';");
        $row=$res->fetch();
        return $row['somme'];
        }catch(Exception $e){
          echo "erruer";
      }
 }
//ligne de commande
 
  function add_LnCom($ln){
    try{
      $con=$this->ConPDO();
      $res=$con->prepare("INSERT into Ln_commande values(?,?,?);");
      $res->execute(array($ln->pro,$ln->com,$ln->Qun));
      if($res) return true;
    }catch(Exception $e){
      return false;
    }
  }

  function delete_LnCommande($idc,$idp){
        try{
          $con=$this->ConPDO();
          $res=$con->prepare("DELETE from Ln_commande where Id_pro=? and Num_com=?;");
          $res->execute(array($idp,$idc));
          if($res) return true;
      }catch(Exception $e){
        return false;
        } 
  }


  function  modifier_Qun($idc,$idp,$q){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("UPDATE Ln_commande set Quntite=? where Id_pro=? and Num_com=?;");
        $res->execute(array($q,$idp,$idc));
        if($res) return true;
    }catch(Exception $e){
        return false;
    }
  }

  function get_LnCom($idc,$idp){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT * FROM Ln_commande WHERE  Id_pro='$idp' and Num_com='$idc';");
        $row=$res->fetch();
      return new LnCommande($row['Id_pro'],$row['Num_com'],$row['Quntite']);
    }  catch(Exception $e){
       return NULL;
    } 
  }

  function List_LnCommande($id){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT * from Ln_commande where Num_com='$id' order by Quntite ;");
      $ls=array();
      while($row=$res->fetch()){
          $ls[]=new LnCommande($row['Id_pro'],$row['Num_com'],$row['Quntite']); 
      }
        return $ls;
      }catch(Exception $e){
        echo "erruer";
     }
   }



// Achats
  
  
  function add_Achat($Ach){
    try{
      $con=$this->ConPDO();
      $res=$con->prepare("INSERT into achats values(NULL,?,?);");
      $res->execute(array($Ach->Date,$Ach->idfour));
      if($res) return true;
      }catch(Exception $e){
        return false;
      }
  }

  function update_Achat($a){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("UPDATE achats set Date_Ach=?,Id_four=? where Num_Ach=?;");
        $res->execute(array($a->Date,$a->idfour,$a->id));
        if($res) return true;
    }catch(Exception $e){
        return false;
    }
  }

  function supprimer_Achat($id){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("DELETE from achats where Num_Ach=?;");
        $res->execute(array($id));
        if($res) return true;
    }catch(Exception $e){
      return false;
      } 
 }

  function get_Ach($id){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT * FROM achats WHERE  Num_Ach='$id';");
        $row=$res->fetch();
      return new Achat($row['Num_Ach'],$row['Date_Ach'],$row['Id_four']);
        }  catch(Exception $e){
        echo "erruer";
        } 
  }

  function getMaxAch(){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT max(Num_Ach) as num  FROM achats;");
      $row=$res->fetch();
       return $row['num'];
      }  catch(Exception $e){
      echo "erruer";
        } 
  }
  
  function List_Achat(){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT * from achats,personne where Id_four=Id_per order by Num_Ach desc;");
      $ls=array();
      while($row=$res->fetch()){
          $ls[]=new Achat($row['Num_Ach'],$row['Date_Ach'],$row['Nom']); 
      }
      return $ls;
      }catch(Exception $e){
        echo "erreur";}
  }


// approvisiement 
  

  function  add_approvis($App){
      try{
        $con=$this->ConPDO();
        $res=$con->prepare("INSERT into approvis values(?,?,?);");
        $res->execute(array($App->idAch,$App->idPro,$App->Qun));
        if($res) return true;
     }catch(Exception $e){
      return false;
    }
  }

  function modifier_QunApp($ida,$idp,$q){
        try{
          $con=$this->ConPDO();
          $res=$con->prepare("UPDATE approvis set Qun=? where Id_Pro=? and Id_Ach=?;");
          $res->execute(array($q,$idp,$ida));
          if($res) return true;
      }catch(Exception $e){
          return false;
      }
  }

  function delete_Approvis($ida,$idp){
        try{
          $con=$this->ConPDO();
          $res=$con->prepare("DELETE from approvis where Id_pro=? and Id_Ach=?;");
          $res->execute(array($idp,$ida));
          if($res) return true;
      }catch(Exception $e){
        return false;
        } 
  }

  function get_Approv($idA,$idP){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT * FROM approvis WHERE  Id_Ach='$idA' and Id_Pro='$idP';");
      $row=$res->fetch();
    return new Approvis($row['Id_Ach'],$row['Id_Pro'],$row['Qun']);
      }  catch(Exception $e){
      echo "erruer";
      } 
  }

  function List_Approv($id){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT * from approvis where Id_Ach='$id';");
      $ls=array();
      while($row=$res->fetch()){
          $ls[]=new Approvis($row['Id_Ach'],$row['Id_Pro'],$row['Qun']); 
      }
    return $ls;
      }catch(Exception $e){
        echo "erreur";
        }
  }


//ticket
 
  function  ajouterTicket($t){
    try{
      $con=$this->ConPDO();
      $res=$con->prepare("INSERT into ticket values(NULL,?,?);");
      $res->execute(array($t->idPro,$t->Qun));
      if($res) return true;
    }catch(Exception $e){
      return false;
      }
  }
   

  function List_Ticket(){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT * from tiket_vue ; ");
      $ls=array();
      while($row=$res->fetch()){
         $ls[]=new Ticket($row['Id_Pro'],$row['lib'],$row['somme']);
   }  
   return $ls;
    }catch(Exception $e){
      echo "erruer";
    } 
  }

  function CalculerM(){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT sum(somme*PrixU) as moy FROM  tiket_vue,produit  where Id_Pro=Ref; ");
      $ls=array();
      if($row=$res->fetch()) return $row['moy'];
      return NULL;  
    }catch(Exception $e){
      echo "erruer";
    } 
  }

//user
  function get_User($u,$p){
     try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT * FROM User where login='$u' and password='$p';");
       if($row=$res->fetch()) return new User($row['Id_user'],$row['login'],$row['password'],$row['Role']);
       return NULL;
      }  catch(Exception $e){
    echo "erruer";
    } 
  }

//DAsbord
  
    function Comday($num){
        try{
          $con=$this->ConPDO();
          $res=$con->query("SELECT count(Id_com) as Nbcom FROM commande WHERE datediff(Date_com,now())='$num';");
          $row=$res->fetch();
          return $row['Nbcom'];
          }  catch(Exception $e){
          echo "erruer";
          } 
    }

    function Proday($num){
      try{
          $con=$this->ConPDO();
          $res=$con->query("SELECT COUNT(ln_commande.Id_pro) as NbPro FROM commande,ln_commande WHERE Id_com=ln_commande.Num_com and datediff(Date_com,now())='$num';");
          $row=$res->fetch();
          return $row['NbPro'];
        }  catch(Exception $e){
           echo "erruer";
        } 
  }

  function Achday($num){
    try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT count(Num_Ach) as NbAch FROM achats WHERE datediff(Date_Ach,now())='$num';");
        $row=$res->fetch();
        return $row['NbAch'];
      }  catch(Exception $e){
         echo "erruer";
      } 
  }

  function ProAchday($num){
    try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT COUNT(approvis.Id_Pro) as NbPro FROM achats,approvis WHERE achats.Num_Ach=Id_Ach and datediff(achats.Date_Ach,now())='$num';");
        $row=$res->fetch();
        return $row['NbPro'];
      }  catch(Exception $e){
         echo "erruer";
      } 
  }

  function TopProduct(){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT  count(Id_pro) as nb,lib,SUM(Quntite) as somme FROM ln_commande,produit WHERE  Ref=Id_pro GROUP BY Id_pro ORDER by nb desc;");
      $ls=array();
      $i=0;
      while(($row=$res->fetch()) && ($i<5)){
          $ls[]=new LnCommande($row['lib'],$row['nb'],$row['somme']);
          $i++; 
      }  
      return $ls; 
      }catch(Exception $e){
        echo "erruer";
     }
  }

   function TopCat(){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT  count(Id_pro) as nb,NomCat,Id_cat  FROM ln_commande,categorie,produit WHERE  Ref=Id_pro and cat=Id_cat GROUP BY Id_pro ORDER by nb desc;");
        if($res->rowCount()!=0){
            $row=$res->fetch();
            return new Cat($row['Id_cat'],$row['NomCat']);
        }
           return new Cat(0,"aucun");
        }catch(Exception $e){
          echo "erruer";
      }
   }

   function PhotoCat($id){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT  Photo FROM  produit WHERE cat='$id' ;");
        $ls=array();
        while($row=$res->fetch()){
           $ls[]=new Produit(0,0,0,0,0,0,$row['Photo'],0);
      }  
       return $ls;
        }catch(Exception $e){
          echo "erruer";
      }
   }
    function CountComm(){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT  count(Id_com) as nb  FROM  commande;");
        $row=$res->fetch();
            return $row['nb'];
        }catch(Exception $e){
          echo "erruer";
      }
    }
    function  CountCli(){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT  count(Id_per) as nb  FROM  personne where Role=2;");
        $row=$res->fetch();
            return $row['nb'];
        }catch(Exception $e){
          echo "erruer";
      }
    }

    function CountAch(){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT  count(Num_Ach) as nb  FROM  achats;");
        $row=$res->fetch();
            return $row['nb'];
        }catch(Exception $e){
          echo "erruer";
      }
    }

    function CountStock(){
      try{
        $con=$this->ConPDO();
        $res=$con->query("SELECT  sum(Quns) as nb  FROM  produit;");
        $row=$res->fetch();
            return $row['nb'];
        }catch(Exception $e){
          echo "erruer";
      }
    }
   
   function TopCli(){
        try{
          $con=$this->ConPDO();
          $res=$con->query("SELECT  count(Id_cli) as nb,Nom,Email,Photo FROM commande,personne WHERE  Id_per=Id_cli and Role=2 GROUP BY Id_cli ORDER by nb desc;");
          $ls=array();
          $i=0;
          while(($row=$res->fetch()) && ($i<5)){
            $ls[]=new Personne(0,$row['Nom'],0,$row['Email'],$row['nb'],$row['Photo'],0); 
            $i++; 
          }  
          return $ls; 
          }catch(Exception $e){
            echo "erruer";
        }
   }

   function TopCom(){
        try{
          $con=$this->ConPDO();
          $res=$con->query("SELECT  Ln_commande.Num_com,sum(Quntite) as nb ,Date_com  FROM Ln_commande,commande where Num_com=Id_com GROUP BY Ln_commande.Num_com ORDER by nb desc;");
          if($res->rowCount()!=0){
             $row=$res->fetch();
            return new Commande($row['Num_com'],$row['Date_com'],$row['nb']);
          }
            return new Commande("aucun","aucun","aucun");
          }catch(Exception $e){
            echo "erruer";
        }
   }
   function TopAch(){
    try{
      $con=$this->ConPDO();
      $res=$con->query("SELECT Id_Ach,sum(Qun) as nb ,Date_Ach  FROM achats,approvis WHERE  Num_Ach=Id_Ach GROUP BY Id_Ach ORDER by nb desc;");
      if($res->rowCount()!=0){
      $row=$res->fetch();
      return new Achat($row['Id_Ach'],$row['Date_Ach'],$row['nb']);
      }
      return new Achat("aucun","aucun","aucun");;
      }catch(Exception $e){
        echo "erruer";
    }
  }
 
   

}


