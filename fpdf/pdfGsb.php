<?php

require('fpdf.php');

class PdfGsb extends FPDF
{

    function Header()
    {
        // Logo
        //$this->Image('images/logo.jpg', 90, 25, 30);



        $width = ($this->w / 2) - 15;
        $this->Image('images/logo.jpg', $width, 25, 30);
        $this->Ln();
    }

    function Content($idVisiteur, $nomVisiteur, $mois, $lesFraisHorsForfait, $lesFraisForfait, $lesInfosFicheFrais)
    {
        // Epaisseur du cadre
        $this->SetLineWidth(0.2);
        $this->SetFont('Times', '', 13.5);
        //Titre
        $this->Cell(0, 10, 'REMBOURSEMENT DE FRAIS ENGAGES', 1, 1, 'C');
        $this->SetFont('Times', '', 11);

        //Ligne Visiteur
        //'L' pour la bordure sur la gauche
        $this->Cell(50, 20, 'Visiteur', 'L');
        $this->Cell(50, 20, $idVisiteur);
        //'R' pour la bordure sur la droite
        $this->Cell(0, 20, $nomVisiteur, 'R', 1);

        //Ligne Mois
        $this->Cell(50, 10, 'Mois', 'L');
        $this->Cell(0, 10, $mois, 'R', 1);
    }
}

$pdf = new PdfGsb();
$pdf->AddPage();
$pdf->Content($idVisiteur, $nomVisiteur, 'Decembre 2020', $lesFraisHorsForfait, $lesFraisForfait, $lesInfosFicheFrais);
$pdf->Output('F', 'fpdf/pdf/' . $name);
