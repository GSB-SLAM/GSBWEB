<?php

/*
 * 
 * 
 * Auteur Valentin CHARLES
 * 
 * Etudiant en BTS SIO option SLAM
 * 
 * linkedin : https://www.linkedin.com/in/valentin-charles-9264531b7/
 * GitHub : https://github.com/ValentinCharles83
 */

$visiteurs = $pdo->getVisiteursValidee();
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch ($action) {
    case 'afficheRecherche':
        $idVisiteur = filter_input(INPUT_POST, 'idVi', FILTER_SANITIZE_STRING);
        $mois = filter_input(INPUT_POST, 'selectDate', FILTER_SANITIZE_STRING);
        $_SESSION['current'] = array(
            'id' => $idVisiteur,
            'mois' => $mois,
        );
        $dates = $pdo->getMoisFichesValidees($idVisiteur);
        $montantTotal = $pdo->getMontantTotal($idVisiteur, $mois);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
        include 'vues/blocks/comptable/v_formulaireRechercheFiches.php';
        include 'vues/blocks/comptable/suivreFrais/v_ficheFraisMP.php';
        include 'vues/blocks/comptable/v_totalRemboursement.php';
        break;
    case 'dateAjax':
        $id = filter_input(INPUT_POST, 'idVi', FILTER_SANITIZE_STRING);
        $dates = $pdo->getMoisFichesValidees($id);
        include 'vues/blocks/comptable/v_inputDate.php';
        break;
    case 'rechercheFiche':
        unset($_SESSION['current']);
        include 'vues/blocks/comptable/v_formulaireRechercheFiches.php';
        break;
    case 'miseEnPaiementFiche':
        $idVisiteur = $_SESSION['current']['id'];
        $mois = $_SESSION['current']['mois'];
        $pdo->majEtatFicheFrais($idVisiteur, $mois,'MP');
        $nom->getNomPrenomVisiteur($idVisiteur);
        include 'vues/blocks/comptable/suivreFrais/v_ficheMiseEnPaiement';
        break;
}

