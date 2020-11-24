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
        include 'vues/blocks/comptable/v_validationFicheFrais.php';
        include 'vues/blocks/comptable/validerFrais/v_ficheFraisForfaitAValider.php';
        include 'vues/blocks/comptable/validerFrais/v_ficheFraisHorsForfaitAValider.php';
        include 'vues/blocks/comptable/v_totalRemboursement.php';
        include 'vues/blocks/comptable/validerFrais/v_btnValiderFiche.php';
        break;
    case 'dateAjax':
        $id = filter_input(INPUT_POST, 'idVi', FILTER_SANITIZE_STRING);
        $dates = $pdo->getMoisFichesAValider($id);
        include 'vues/blocks/comptable/v_inputDate.php';
        break;
    case 'rechercheFiche':
        unset($_SESSION['current']);
        include 'vues/blocks/comptable/v_validationFicheFrais.php';
        break;
    case 'refuserFrais':
        $mois = $_SESSION['current']['mois'];
        $idVisiteur = $_SESSION['current']['id'];
        $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);
        $pdo->ajoutLibelleFraisHorsForfait($idFrais, 'REFUSE ');
        $dates = $pdo->getMoisFichesAValider($idVisiteur);
        $montantTotal = $pdo->getMontantTotal($idVisiteur, $mois);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
        include 'vues/blocks/validerFrais/v_validationFicheFrais.php';
        include 'vues/blocks/comptable/validerFrais/v_ficheFraisForfaitAValider.php';
        include 'vues/blocks/comptable/validerFrais/v_ficheFraisHorsForfaitAValider.php';
        include 'vues/blocks/comptable/v_totalRemboursement.php';
        include 'vues/blocks/comptable/validerFrais/v_btnValiderFiche.php';
        break;

    case 'reporterFrais':
        $mois = $_SESSION['current']['mois'];
        $idVisiteur = $_SESSION['current']['id'];
        $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);
        $pdo->ajoutLibelleFraisHorsForfait($idFrais, 'REPORTE ');
        $dates = $pdo->getMoisFichesAValider($idVisiteur);
        $montantTotal = $pdo->getMontantTotal($idVisiteur, $mois);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
        include 'vues/blocks/validerFrais/v_validationFicheFrais.php';
        include 'vues/blocks/comptable/validerFrais/v_ficheFraisForfaitAValider.php';
        include 'vues/blocks/comptable/validerFrais/v_ficheFraisHorsForfaitAValider.php';
        include 'vues/blocks/comptable/v_totalRemboursement.php';
        include 'vues/blocks/comptable/validerFrais/v_btnValiderFiche.php';
        break;

    case 'updateTotal':
        $mois = $_SESSION['current']['mois'];
        $idVisiteur = $_SESSION['current']['id'];
        $montantTotal = $pdo->getMontantTotal($idVisiteur, $mois);
        echo $montantTotal;

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
                $montantTotal = $pdo->getMontantTotal($idVisiteur, $mois);
                echo $montantTotal;
            } else {
                echo "ErrNum";
            }
        } catch (Exception $ex) {
            echo "ErrCor";
        }
        break;

    case 'validerFiche':
        $mois = $_SESSION['current']['mois'];
        $idVisiteur = $_SESSION['current']['id'];
        var_dump($mois, $idVisiteur);
        $pdo->validerFiche($idVisiteur, $mois);
        //Ajouter la vue ou redirection
}



