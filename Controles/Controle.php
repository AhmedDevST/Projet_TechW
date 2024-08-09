<?php
    require_once("../Class/Class_Produit.php");
    require_once("../Class/Class_cat.php");
    require_once("../Class/Class_personne.php");
    require_once("../Class/Class_commande.php");
    require_once("../Class/Class_LnCommande.php");
    require_once("../Class/Class_Achat.php"); 
    require_once("../Class/Class_Aprov.php");
    require_once("../Class/Class_Ticket.php"); 
    require_once("../Class/Class_Gestion_Commande.php"); 
    require_once("../Class/Class_Gestion_Achats.php"); 
?>

<?php //produit 
    // --ajouter
  if(isset($_POST['Ajouter_Pro'])){
      extract($_POST);
      $file=$_FILES["file"]["name"];
      $fileloc=$_FILES["file"]["tmp_name"];
      $ext = pathinfo($file, PATHINFO_EXTENSION);
      $file=(Produit::getMaxId()+1).$lib.".".$ext;
      $filestore="../imgs/" .$file;
        if(move_uploaded_file($fileloc,$filestore)){
             $p=new produit(0,$lib,$prixu,$prixu,$prixa,$Quns,$file,$cat); 
              if($p->add_pro()){
                header("location:../pages/Gestion_Pro.php?mess=1");
             }else header("location:../pages/Gestion_Pro.php?mess=2");
        }else  header("location:../pages/Gestion_Pro.php?mess=2");
     
  }
        // --modifier
  if(isset($_POST['Modifer_Pro'])){
      extract($_POST);

      if($_FILES["file"]["name"]!=""){
          $file=$_FILES["file"]["name"];
          $fileloc=$_FILES["file"]["tmp_name"];
          $ext = pathinfo($file, PATHINFO_EXTENSION);
          $file=$ref.$lib.".".$ext;
          $filestore="../imgs/" .$file;
          move_uploaded_file($fileloc,$filestore);
          Produit::UpdatePhoto($ref,$file);
       }

      $p=new produit($ref,$lib,$prixu,$prixu,$prixa,$Quns,$file,$cat); 
       if($p->update_pro()){
          header("location:../pages/Gestion_Pro.php?mess=1"); 
          }else header("location:../pages/Gestion_Pro.php?mess=2");     
  }
    

         // --supprimer
  if(isset($_GET['idpro'])){
        if(Produit::delete_Pro($_GET['idpro'])){
          header("location:../pages/Gestion_Pro.php?mess=1"); 
          }else header("location:../pages/Gestion_Pro.php?mess=2");     
    }
?>


<?php  //cat
   //ajouter cat
  if(isset($_POST['Ajouter_Cat'])){
      extract($_POST);
      $cat=new Cat(0,$nomcat); 
      if($cat->ajouter_cat()){
          header("location:../pages/Gestion_cat.php?mess=1");
      }else  header("location:../pages/Gestion_cat.php?mess=2");
  }
  //modifier cat
  if(isset($_POST['Modifier_Cat'])){
      extract($_POST);
      $cat=new Cat($idcat,$nomcat); 
      if($cat->modifier_cat()){
          header("location:../pages/Gestion_cat.php?mess=1");
      }else  header("location:../pages/Gestion_cat.php?mess=2");
   }
  //supprimer
  if(isset($_GET['idcat'])){
    if(Cat::supprimer_cat($_GET['idcat'])){
      header("location:../pages/Gestion_cat.php?mess=1");
  }else  header("location:../pages/Gestion_cat.php?mess=2");
  }
?>
 

<?php //personne 

  //ajouter 
   if(isset($_POST['Ajouter_Per'])){
     extract($_POST);
     $file=$_FILES["file"]["name"];
    $fileloc=$_FILES["file"]["tmp_name"];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $file=(Personne::getMaxId()+1).$nom.".".$ext;
    $filestore="../imgs/" .$file;
    if(move_uploaded_file($fileloc,$filestore)){
     $per=new Personne(0,$nom,$tel,$email,$Adresse,$file,$role); 
     if($per->enregistre_per()){
        if($role==1){
             header("location:../pages/List_Four.php?mess=1");
       }else header("location:../pages/List_Cli.php?mess=1");  
     } else  header("location:../pages/List_Cli.php?mess=2");
    }else  header("location:../pages/List_Cli.php?mess=2");
 
   }

   //modifier personne
  if(isset($_POST['Modifier_Per'])){
      extract($_POST);
      
      if($_FILES["file"]["name"]!=""){
        $file=$_FILES["file"]["name"];
        $fileloc=$_FILES["file"]["tmp_name"];
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $file=$id.$nom.".".$ext;
        $filestore="../imgs/" .$file;
        move_uploaded_file($fileloc,$filestore);
        Personne::UpdatePhoto($id,$file);
      }
    $per=new Personne($id,$nom,$tel,$email,$Adresse,$file,$role); 
    if($per->update_per()){
       if($role==1){
            header("location:../pages/List_Four.php?mess=1");
       }else header("location:../pages/List_Cli.php?mess=1");  
    }else  header("location:../pages/List_Cli.php?mess=2");
  }

   //supprimer personne
   if(isset($_GET['idper'])){
      if(Personne::supprimer_per($_GET['idper'])){
            header("location:../pages/List_Cli.php?mess=1");  
     }else  header("location:../pages/List_Cli.php?mess=2");
  }
?>

<?php //commande
   //ajouter
  if(isset($_POST['Ajouter_Commande'])){
    extract($_POST);
      
       $list=gestionCom::Validation($Pro);
       if(sizeof($list)!=0){
           $com=new Commande(0,$date,$IdCli);
           $com->ajouter_com();
           $idcom=Commande::getMax();
           gestionCom::add_commande($list,$idcom);
           $client=Personne::get_personne($IdCli);
           gestionCom::print($idcom,$com,$client);
       }else   header("location:../pages/Gestion_Commande.php");
  } 
 
  
   //modifier
   if(isset($_POST['Modifier_Commande']) || isset($_POST['Modifier_print__Commande'])){
    extract($_POST);
        $nbV=0;
      if(isset($Ancienne)){
         foreach($Ancienne as $val){
          if($val=='on') $nbV++;
        }
      }
        if(isset($Nouveau)){
          foreach($Nouveau as $val){
           if($val=='on') $nbV++;
         }
        }
        if($nbV!=0){
            gestionCom::update_commande($Ancienne,$idCom);
            if(isset($Nouveau)){
              $list=gestionCom::Validation($Nouveau);
              gestionCom::add_commande($list,$idCom);
            }
            $com=new Commande($idCom,$date,$IdCli);
            $com-> modifier_com(); 
            if(isset($_POST['Modifier_print__Commande']) && (isset($Ancienne) || isset($Nouveau)) ){
              $client=Personne::get_personne($IdCli);
              $t=gestionCom::print($idCom,$com,$client);
           }else  header("location:../pages/Gestion_Commande.php");
        }
  }
   //supprimer
  if(isset($_GET['idCom'])){
      $id=$_GET['idCom'];
      $list_LnCommande=LnCommande::afficher($id);
      if( Commande::delete_Com($_GET['idCom'])){
         foreach($list_LnCommande as $row){
          $ref=$row->pro;
          $produit=Produit::get_produit($ref);  
          $Qun=$row->Qun + $produit->Quns;
          Produit::update_Qun($ref,$Qun); 
       }
      }else  header("location:../pages/Gestion_commande.php?mess=2");
      header("location:../pages/Gestion_commande.php?mess=1");
  }
?>

<?php  //achat
  //ajouter
    if(isset($_POST['Ajouter_Achat'])){
      extract($_POST);

        $list=gestionAch::Validation($Ach);
        if(sizeof($list)!=0){
            $com=new Achat(0,$date,$IdFour);
             $com->ajouter_Achat();
            gestionAch::add_appro($list,Achat::getMax());
         }else   header("location:../pages/Gestion_Achats.php?mess=2");
        header("location:../pages/Gestion_Achats.php?mess=1");
 } 

   //modifier
    if(isset($_POST['Modifier_Achat'])){
      extract($_POST);
         $nbV=0;
         if(isset($Ancienne)){
            foreach($Ancienne as $val){
             if($val=='on') $nbV++;
           }
         }
           if(isset($Nouveau)){
             foreach($Nouveau as $val){
              if($val=='on') $nbV++;
            }
           }
            if($nbV!=0){
            gestionAch::update_achats($Ancienne,$idAch);
            if(isset($Nouveau)){
              $list=gestionAch::Validation($Nouveau);
              gestionAch::add_appro($list,$idAch);
            }
            $com=new Achat($idAch,$date,$IdFour);
            if($com->modifier_Achat()) header("location:../pages/Gestion_Achats.php?mess=1");
          }else  header("location:../pages/Gestion_Achats.php?mess=2");
         
        }
              
     
    

    //supprimer
   if(isset($_GET['idAch'])){
        $id=$_GET['idAch'];
        $list_approvis=approvis::afficher($id);
        if( Achat::delete_Ach($id)){
          foreach($list_approvis as $row){
            $ref=$row->idPro;
            $produit=Produit::get_produit($ref);  
            $Qun=$produit->Quns - $row->Qun ;
            Produit::update_Qun($ref,$Qun,$produit->prixU); 
        }
        }else  header("location:../pages/Gestion_Achats.php?mess=2");
        header("location:../pages/Gestion_Achats.php?mess=1");
   }


?>

<?php //ticket
    if(isset($_POST['Ajouter_Ticket'])) {
        extract($_POST);
      
        $t=new Ticket(0,$pro,$Qun); 
      if($t->add_Ticket()){
          header("location:../pages/Gestion_Caisse.php");
      }else  header("location:../pages/Gestion_Caisse.php");
    }
?>