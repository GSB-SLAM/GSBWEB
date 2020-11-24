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
        include 'vues/v_validationFicheFrais.php';
        include 'vues/blocks/v_ficheFraisForfaitMP.php';
        include 'vues/blocks/v_ficheFraisHorsForfaitMP.php';
        include 'vues/blocks/v_totalRemboursement.php';
        break;
    case 'dateAjax':
        $id = filter_input(INPUT_POST, 'idVi', FILTER_SANITIZE_STRING);
        $dates = $pdo->getMoisFichesAValider($id);
        include 'vues/blocks/v_inputDate.php';
        break;
    case 'rechercheFiche':
        unset($_SESSION['current']);
        include 'vues/v_validationFicheFrais.php';
        break;
    case 'MiseEnPaiementFiche':

        $idVisiteur = $_SESSION['current']['id'];
        $mois = $_SESSION['current']['mois'];
        $etat = $_SESSION['current']['etat'];
        $pdo->majEtatFicheFrais($idVisiteur, $mois, $etat);




        break;
    case 'Corriger':






        break;
}

