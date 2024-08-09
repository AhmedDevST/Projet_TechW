<?php
    require('../pdf/fpdf.php');
    require_once("Class_personne.php");
    require_once("Class_commande.php");
    require_once("Class_LnCommande.php");
?>

<?php
class PDF extends FPDF
{
// En-t�te
function Header()
{
	
	$titre="Facture";

	// Arial gras 15
	$this->SetFont('Arial','B',15);
	// Calcul de la largeur du titre et positionnement
	$w = $this->GetStringWidth($titre)+6;
	$this->SetX((210-$w)/2);
	// Couleurs du cadre, du fond et du texte
	$this->SetFillColor(200,220,255);
	$this->SetTextColor(0,0,50);
	// Epaisseur du cadre (1 mm)
	// Titre
    $this->Cell(40,9,"Facture",0,1,'C',true);
	// Saut de ligne
	$this->Ln(10);
}

// Pied de page
function Footer()
{
	// Positionnement � 1,5 cm du bas
	$this->SetY(-15);
	// Police Arial italique 8
	$this->SetFont('Arial','I',8);
	// Num�ro de page
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}


function CorpsChapitre($idc,$date,$cli,$list,$article,$prixt)
{

	// Police
	$this->SetFont('Times','',12);
	// Sortie du texte sur 6 cm de largeur
	$this->Ln(10);
	// Mention
    $this->SetFont('','I');
    $this->SetTextColor(20,29,50);
    $this->Cell(50,5,"NUMERO COMMANDE: ");
  
    $this->Cell(10,5, (string)$idc);
    $this->Ln(10);
    $this->Cell(40,5,"DATE:");
    $this->Cell(10,5,$date);
    $this->Ln(10);
	$this->Cell(40,5,"CODE CLIENT:");
    $this->Cell(10,5,$cli->id);
    $this->Ln(10);
    $this->Cell(40,5,"NOM:");
    $this->Cell(10,5,$cli->nom);
    $this->Ln(10);
    $this->Cell(40,5,"ADRESSE:");
    $this->Cell(10,5,$cli->adresse);
    $this->Ln(20);
    $header = array('Produit', 'Libelle', 'Prix unitaire', 'Quntite','prix');
    $this->BasicTable($header,$list);
	$this->Ln(20);
	$this->Cell(40,5,"Nombre des articls:");
    $this->Cell(10,5,$article);
	$this->Ln(10);
	$this->Cell(40,5,"Prix total:");
    $this->Cell(10,5,$prixt);

}

function BasicTable($header, $data)
{
	// En-t�te
	foreach($header as $col){
       $this->Cell(35,7,$col,1);
    }
		
	$this->Ln();
	// Donn�es
	foreach($data as $row)
	{
		foreach($row as $col) $this->Cell(35,6,$col,1);
		    $this->Ln();
	}
}
}

?>