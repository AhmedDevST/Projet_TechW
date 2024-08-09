<?php
    require_once("Class_Produit.php");
    require_once("Class_commande.php");
    require_once("Class_LnCommande.php");
    require_once("Class_PDF.php");
    require_once("DAO.php");
?>
<?php
 class gestionCom{
    

    static function Validation($Pro){

        $listValide=array();
         $i=0;
        while($i<sizeof($Pro)){
          if( $Pro[$i]=='on'){     ///if check
             $i++;     $IdPro=$Pro[$i];
             $produit=Produit::get_produit($IdPro);  
             $i++;     $Qun=$Pro[$i];
              if($produit->Quns>=$Qun){
                 $listValide[]=$IdPro;   
                 $listValide[]=$Qun;   
               }  
             $i++;
          }else $i+=2;
        }
       return $listValide;
    }

   static function add_commande($array,$numeroCom){

            $i=0;
            while($i<sizeof($array)){
                    $ref=$array[$i]; $i++; $quntite=$array[$i];
                    $comLn=new LnCommande($ref,$numeroCom,$quntite);
                    $comLn->ajouter_LnCom();
                    $produit=Produit::get_produit($ref);  
                    $Qun=$produit->Quns-$quntite;
                    Produit::update_Qun($ref,$Qun);  
                    $i++;
                }
   }
  
    static function update_commande($Ancienne,$idCom){
        $i=0;
        while($i<sizeof($Ancienne)){
        
            if($Ancienne[$i]=='on'){  ///if check
                $i++;    $IdPro=$Ancienne[$i];
                $produit=Produit::get_produit($IdPro); 
                $LnC=LnCommande::getLnCom($idCom,$IdPro);
                $i++;  $Qun=$Ancienne[$i];
                $qvalide=$Qun-$LnC->Qun; //combien de quntite ajouter 
                if($produit->Quns>=($qvalide)){
                    LnCommande::update_Qun($idCom,$IdPro,$Qun);
                    Produit::update_Qun($IdPro,($produit->Quns-$qvalide));
                }  
            $i++;
            }else{
                $IdPro=$Ancienne[$i];
                $produit=Produit::get_produit($IdPro); 
                $LnC=LnCommande::getLnCom($idCom,$IdPro);
                $i++;  $Qun=$Ancienne[$i];
                LnCommande::supprimerLn($idCom,$IdPro);
                Produit::update_Qun($IdPro,$produit->Quns+$LnC->Qun);
                $i++;
            }
        }
    }

      static function listFActure($id){
        $con=new DAO();
        return $con->listPFacture($id);
     }

     static function NBArticle($id){
        $con=new DAO();
        return $con->NbArticle($id);
     }

     static function prixt($id){
        $con=new DAO();
        return $con-> PrixTotal($id);
     }

    static function print($idc,$com,$cli){
        $list=gestionCom::listFActure($idc);
        $nbA=gestionCom::NBArticle($idc);
        $prixt=gestionCom::prixt($idc);
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->CorpsChapitre($idc,$com->date,$cli,$list,$nbA,$prixt);
        $file = time().'.pdf';
        $pdf->output($file,'D');
        return true;
    }
}
 ?>