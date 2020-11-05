<?php

/*
 * 
 * 
 * Auteur Antoine LAUTRETTE
 * 
 * Etudiant en BTS SIO option SLAM
 * 
 * linkedin : https://www.linkedin.com/in/antoine-lautrette-057749197/
 * GitHub : https://github.com/ALautrette
 */

//$visiteurs = $pdo->getIdNomPrenomVisiteurs();
$visiteurs = $pdo->getVisiteursAValider();
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch ($action) {
    case 'afficheRecherche':

        $idVisiteur = filter_input(INPUT_POST, 'idVi', FILTER_SANITIZE_STRING);
        $mois = filter_input(INPUT_POST, 'selectDate', FILTER_SANITIZE_STRING);
        $_SESSION['current'] = array(
            'id' => $idVisiteur,
            'mois' => $mois,
        );

        $dates = $pdo->getMoisFichesAValider($idVisiteur);
        $montantTotal = $pdo->getMontantTotal($idVisiteur, $mois);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
        include 'vues/v_validationFicheFrais.php';
        include 'vues/blocks/v_ficheFraisForfaitAValider.php';
        include 'vues/blocks/v_ficheFraisHorsForfaitAValider.php';
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
    case 'suspendreFrais':
        $mois = $_SESSION['current']['mois'];
        $idVisiteur = $_SESSION['current']['id'];
        $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);
        $pdo->suspendreFraisHorsForfait($idFrais);
        $dates = $pdo->getMoisFichesAValider($idVisiteur);
        $montantTotal = $pdo->getMontantTotal($idVisiteur, $mois);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
        include 'vues/v_validationFicheFrais.php';
        include 'vues/blocks/v_ficheFraisForfaitAValider.php';
        include 'vues/blocks/v_ficheFraisHorsForfaitAValider.php';
        include 'vues/blocks/v_totalRemboursement.php';
        break;

    case 'corrigerFrais':
        try {
            $etp = filter_input(INPUT_POST, 'ETP', FILTER_SANITIZE_STRING);
            $km = filter_input(INPUT_POST, 'KM', FILTER_SANITIZE_STRING);
            $nui = filter_input(INPUT_POST, 'NUI', FILTER_SANITIZE_STRING);
            $rep = filter_input(INPUT_POST, 'REP', FILTER_SANITIZE_STRING);
            $lesFrais = array(
                'ETP' => $etp,
                'KM' => $km,
                'NUI' => $nui,
                'REP' => $rep,
            );
            $mois = $_SESSION['current']['mois'];
            $idVisiteur = $_SESSION['current']['id'];
            if (lesQteFraisValides($lesFrais)) {
                $pdo->majFraisForfait($idVisiteur, $mois, $lesFrais);
                ajouterSucces("Fiche mise à jour avec succès");
                include 'vues/v_succes.php';
            } else {
                ajouterErreur('Les valeurs des frais doivent être numériques');
                include 'vues/v_erreurs.php';
            }
            
            
        } catch (Exception $ex) {
            ajouterErreur("Erreur lors de correction");
            include 'vues/v_erreurs.php';
        }
}



