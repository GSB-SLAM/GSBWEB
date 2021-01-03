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
        //Pour descendre le curseur de 50 unités
        $this->Ln(50);
    }

    function Content($idVisiteur, $nomVisiteur, $mois, $lesFraisHorsForfait, $lesFraisForfait, $lesInfosFicheFrais)
    {
        // Epaisseur du cadre
        $this->SetLineWidth(0.2);

        $this->SetFont('Times', 'B', 13.5);

        //Titre

        //Couleur du texte en bleu
        $this->SetTextColor(31, 73, 125);
        $this->Cell(0, 10, 'REMBOURSEMENT DE FRAIS ENGAGES', 1, 1, 'C');
        $this->SetFont('Times', '', 11);

        //Ligne Visiteur

        //Couleur du texte en noir
        $this->SetTextColor(0, 0, 0);

        $marge = 10;

        //Pour créer un décalage par rapport à la marge
        //'L' pour la bordure sur la gauche
        $this->Cell($marge, 20, '', 'L');
        $this->Cell(50, 20, 'Visiteur');
        $this->Cell(50, 20, $idVisiteur);
        //'R' pour la bordure sur la droite
        $this->Cell(0, 20, $nomVisiteur, 'R');

        //Passage à la ligne 
        $this->ln(15);

        //Ligne Mois
        $this->Cell($marge, 5);
        $this->Cell(50, 5, 'Mois');
        $this->Cell(50, 5, $mois);

        //Saut de 1 ligne
        $this->ln(5);

        $this->Cell(0, 10, '', 'LR');

        //Saut de 2 lignes
        $this->Ln(10);

        //Tableau frais forfaitisés

        $largeurLigne = $this->w - 40;
        $largeurColonne = $largeurLigne / 4;

        //Ligne des titres
        //Marge
        $this->Cell($marge, 0);

        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);

        //Ligne au dessus du tableau
        $this->Cell($largeurLigne, 0, '', 'B');

        //Passage en Italique et en gras
        $this->SetFont('Times', 'BI', 11);
        //Couleur du texte en bleu
        $this->SetTextColor(31, 73, 125);


        $this->Ln(0);

        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);

        //Marge
        $this->Cell($marge, 10, '', 'L');
        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);
        $this->Cell($largeurColonne + 10, 10, 'Frais Forfaitaires', 'L', 0, 'C');
        $this->Cell($largeurColonne, 10, 'Quantite', 0, 0, 'C');
        $this->Cell($largeurColonne, 10, 'Montant unitaire', 0, 0, 'C');
        $this->Cell($largeurColonne - 10, 10, 'Total', 'R', 0, 'C');
        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        $this->Cell(0, 10, '', 'R');

        $this->Ln(10);

        //Ligne en dessous des titres

        //Marge
        $this->Cell($marge, 0);

        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);

        $this->Cell($largeurLigne, 0, '', 'T');

        $this->Ln(0);

        $this->SetFont('Times', '', 11);
        //Couleur du texte en noir
        $this->SetTextColor(0, 0, 0);

        foreach ($lesFraisForfait as $frais) {
            $libelle = $frais['libelle'];
            $quantite = $frais['quantite'];
            $montant = $frais['montant'];
            $total = valeurToMontant((int)$quantite * (float)$montant);

            //Passage de la couleur des traits en noir
            $this->SetDrawColor(0, 0, 0);

            //Marge
            $this->Cell($marge, 10, '', 'L');

            //Passage de la couleur des traits en bleu
            $this->SetDrawColor(31, 73, 125);

            $this->Cell($largeurColonne + 10, 10, $libelle, 'L');
            $this->Cell($largeurColonne, 10, $quantite, 'L', 0, 'R');
            $this->Cell($largeurColonne, 10, $montant, 'L', 0, 'R');
            $this->Cell($largeurColonne - 10, 10, $total, 'LR', 0, 'R');

            //Passage de la couleur des traits en noir
            $this->SetDrawColor(0, 0, 0);
            $this->Cell(0, 10, '', 'R');

            //Saut de ligne
            $this->Ln(10);

            //Passage de la couleur des traits en bleu
            $this->SetDrawColor(31, 73, 125);

            //Marge
            $this->Cell($marge, 0);

            //Ligne inférieur
            $this->Cell($largeurLigne, 0, '', 'T');

            $this->Ln(0);
        }
        //Création d'un espace

        //Passage à la ligne
        $this->ln(0);
        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        $this->Cell($marge, 10, '', 'L');
        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);
        $this->Cell($largeurLigne, 10, '', 'LR');
        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        //Marge
        $this->Cell(0, 10, '', 'R');


        //Saut de 2 lignes
        $this->Ln(10);

        //Passage en Italique et en gras
        $this->SetFont('Times', 'BI', 11);
        //Couleur du texte en bleu
        $this->SetTextColor(31, 73, 125);

        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        //Marge
        $this->Cell($marge, 10, '', 'L');
        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);
        $this->Cell($largeurLigne, 10, 'Autres Frais', 'LR', 0, 'C');
        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        //Marge
        $this->Cell(0, 10, '', 'R');

        //Saut de 2 lignes
        $this->Ln(10);

        //Début du tableau des frais hors forfaits

        //Marge
        $this->Cell($marge, 0);

        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);

        //Ligne au dessus du tableau
        $this->Cell($largeurLigne, 0, '', 'B');

        //Passage en Italique et en gras
        $this->SetFont('Times', 'BI', 11);
        //Couleur du texte en bleu
        $this->SetTextColor(31, 73, 125);


        $this->Ln(0);

        $largeurColonne = $largeurLigne / 3;

        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        //Marge
        $this->Cell($marge, 10, '', 'L');
        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);
        $this->Cell($largeurColonne, 10, 'Date', 'L', 0, 'C');
        $this->Cell($largeurColonne + 10, 10, 'Libelle', 0, 0, 'C');
        $this->Cell($largeurColonne - 10, 10, 'Montant', 'R', 0, 'C');
        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        $this->Cell(0, 10, '', 'R');

        $this->Ln(10);

        //Ligne en dessous des titres

        //Marge
        $this->Cell($marge, 0);

        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);

        $this->Cell($largeurLigne, 0, '', 'T');

        $this->Ln(0);

        $this->SetFont('Times', '', 11);
        //Couleur du texte en noir
        $this->SetTextColor(0, 0, 0);

        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
            $montant = $unFraisHorsForfait['montant'];

            //Passage de la couleur des traits en noir
            $this->SetDrawColor(0, 0, 0);
            //Marge
            $this->Cell($marge, 10, '', 'L');
            //Passage de la couleur des traits en bleu
            $this->SetDrawColor(31, 73, 125);
            $this->Cell($largeurColonne, 10, $date, 'L');
            $this->Cell($largeurColonne + 10, 10, $libelle, 'L');
            $this->Cell($largeurColonne - 10, 10, $montant, 'LR', 0, 'R');
            //Passage de la couleur des traits en noir
            $this->SetDrawColor(0, 0, 0);
            $this->Cell(0, 10, '', 'R');

            $this->Ln(10);

            //Ligne en dessous des titres

            //Marge
            $this->Cell($marge, 0);

            //Passage de la couleur des traits en bleu
            $this->SetDrawColor(31, 73, 125);

            $this->Cell($largeurLigne, 0, '', 'T');

            $this->Ln(0);
        }
        //Création d'un espace

        //Passage à la ligne
        $this->ln(0);
        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        $this->Cell(0, 10, '', 'LR');

        //Saut de 2 lignes
        $this->Ln(10);

        //Tableau Total

        $largeurColonne = $largeurLigne / 4;
        //Trait supérieur

        //Marge
        $this->Cell(20 + $largeurColonne * 2);
        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);
        $this->Cell(($largeurColonne * 2) - 10, 0, '', 'B');
        //Passage à la ligne
        $this->ln(0);

        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        $this->Cell(20 + $largeurColonne * 2, 10, '', 'L');
        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);
        $this->Cell($largeurColonne, 10, 'TOTAL ' . $mois, 'L');
        $this->Cell($largeurColonne - 10, 10, $lesInfosFicheFrais['montantValide'], 'LR', 0, 'R');
        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        $this->Cell(0, 10, '', 'R');

        //Création d'un espace

        //Saut de 2 lignes
        $this->ln(10);
        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        $this->Cell(0, 10, '', 'LR');

        //Passage à la ligne
        $this->Ln(0);
        //Trait inférieur

        //Marge
        $this->Cell(20 + $largeurColonne * 2);
        //Passage de la couleur des traits en bleu
        $this->SetDrawColor(31, 73, 125);
        $this->Cell(($largeurColonne * 2) - 10, 0, '', 'T');

        //Saut de 2 lignes
        $this->Ln(10);

        //Fermeture du tableau

        //Passage de la couleur des traits en noir
        $this->SetDrawColor(0, 0, 0);
        $this->Cell(0, 0, '', 'T');

        //Saut de 4 lignes
        $this->Ln(20);

        $this->SetFont('Times', '', 12);
        //Marge
        $this->Cell(20 + $largeurColonne * 2, 5);
        $this->Cell(0, 5, 'Fait à Paris, le ' .  $mois);

        //Saut de 2 lignes
        $this->Ln(10);

        //Marge
        $this->Cell(20 + $largeurColonne * 2, 5);
        $this->Cell(0, 5, 'Vu l\'agent comptable');

        //Saut de 2 lignes
        $this->Ln(10);
        //Marge
        $this->Cell(20 + $largeurColonne * 2);
        //Génère une erreur
        //$this->Image('images/signatureComptable.png');
    }
}

$pdf = new PdfGsb();
$pdf->AddPage();
$pdf->Content($idVisiteur, $nomVisiteur, $leMois, $lesFraisHorsForfait, $lesFraisForfait, $lesInfosFicheFrais);
$pdf->Output('F', 'fpdf/pdf/' . $name);
