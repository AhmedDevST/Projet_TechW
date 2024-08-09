<?php 
   require_once("Class_Produit.php");
   require_once("Class_Achat.php"); 
   require_once("Class_Aprov.php");
?>

<?php 
 class gestionAch{

    static function Validation($Ach){

        $listValide=array();
        $i=0;
          while($i<sizeof($Ach)){
            if( $Ach[$i]=='on'){     ///if check
              $i++;     $IdPro=$Ach[$i];
              $i++;     $Qun=$Ach[$i];    $i++;
              $listValide[]=$IdPro;
              $listValide[]=$Qun;
              }else $i+=2;
          }
       return $listValide;
   }
  
    static function add_appro($array,$numeroAch){

        $i=0;
        while($i<sizeof($array)){
            $ref=$array[$i]; $i++; $quntite=$array[$i];
            $APPR=new Approvis($numeroAch,$ref,$quntite);
            $APPR->ajouter_approvis();
            $produit=Produit::get_produit($ref);  
            $nouvelleQ=$produit->Quns + $quntite;
            Produit::update_Qun($ref,$nouvelleQ); 
            $i++; 
        }
   }

   static function update_achats($Ancienne,$idAch){

        $i=0;
        while($i<sizeof($Ancienne)){
        
            if($Ancienne[$i]=='on'){  ///if check
                $i++;    $IdPro=$Ancienne[$i];
                $produit=Produit::get_produit($IdPro); 
                $App=Approvis::getAppch($idAch,$IdPro);
                $i++;  $Qun=$Ancienne[$i];
                $nouvelleQ=$produit->Quns +($Qun-$App->Qun);
                Approvis::update_Qun($idAch,$IdPro,$Qun);
                Produit::update_Qun($IdPro,$nouvelleQ);  
            $i++;
            }else{
                $IdPro=$Ancienne[$i];
                $produit=Produit::get_produit($IdPro); 
                $App=Approvis::getAppch($idAch,$IdPro);
                $i++;  $Qun=$Ancienne[$i];
                $nouvelleQ=$produit->Quns - $App->Qun;
                Approvis::supprimerApp($idAch,$IdPro);
                Produit::update_Qun($IdPro,$nouvelleQ); 
                $i++;
            }
        }
   }

}

?>