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

$visiteurs = $pdo->getVisiteursAValider();
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);


switch ($action) {
    case 'afficheRecherche':

        //traitement
        $idVisiteur = filter_input(INPUT_POST, 'idVi', FILTER_SANITIZE_STRING);
        $mois = filter_input(INPUT_POST, 'selectDate', FILTER_SANITIZE_STRING);
        $_SESSION['current'] = array(
            'id' => $idVisiteur,
            'mois' => $mois,
        );

        

        break;
    case 'dateAjax':
        //traitement
        $id = filter_input(INPUT_POST, 'idVi', FILTER_SANITIZE_STRING);
        $dates = $pdo->getMoisFichesAValider($id);
        include 'vues/blocks/comptable/v_inputDate.php';
        break;
    case 'rechercheFiche':
        //traitement
        unset($_SESSION['current']);
        if (empty($visiteurs)) {
            ajouterErreur("Il n'y a aucune fiche de frais à valider");
            include 'vues/v_erreurs.php';
        } else {
            include 'vues/blocks/comptable/v_validationFicheFrais.php';
        }

        break;
    case 'refuserFrais':
        //traitement
        $mois = $_SESSION['current']['mois'];
        $idVisiteur = $_SESSION['current']['id'];
        $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);
        $pdo->ajoutLibelleFraisHorsForfait($idFrais, 'REFUSE : ');

        

        break;

    case 'reporterFrais':

        //traitement
        $mois = $_SESSION['current']['mois'];
        $idVisiteur = $_SESSION['current']['id'];
        $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);
        $moisSuivant = getMoisSuivant($mois);
        if ($pdo->estPremierFraisMois($idVisiteur, $moisSuivant)) {
            $pdo->creeNouvellesLignesFrais($idVisiteur, $moisSuivant);
        }
        $pdo->reporterUnFraisHorsForfait($idFrais, $moisSuivant);

        ajouterSucces("Frais reporté avec succès");
        include 'vues/v_succes.php';
        break;

    case 'updateTotal':

        //traitement
        $mois = $_SESSION['current']['mois'];
        $idVisiteur = $_SESSION['current']['id'];
        $montantTotal = $pdo->getMontantTotal($idVisiteur, $mois);
        echo $montantTotal;

    case 'corrigerFrais':

        //traitement
        try {
            $etp = filter_input(INPUT_POST, 'ETP', FILTER_SANITIZE_STRING);
            $km = filter_input(INPUT_POST, 'KM', FILTER_SANITIZE_STRING);
            $nui = filter_input(INPUT_POST, 'NUI', FILTER_SANITIZE_STRING);
            $rep = filter_input(INPUT_POST, 'REP', FILTER_SANITIZE_STRING);
            $idVehicule = filter_input(INPUT_POST, 'IDV', FILTER_SANITIZE_STRING);
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
                $pdo->updateTypeVehicule($idVisiteur, $mois, $idVehicule);
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
        $pdo->validerFiche($idVisiteur, $mois);
        $nom = $pdo->getNomPrenomVisiteur($idVisiteur);
        include 'vues/blocks/comptable/validerFrais/v_ficheValidée.php';
}

//tableau contenant les cas pour lesquels je vais avoir besoin du même bout de code
$cases = array('afficheRecherche', 'reporterFrais', 'refuserFrais');

if (in_array($action, $cases)) {
    $dates = $pdo->getMoisFichesAValider($idVisiteur);
    $montantTotal = $pdo->getMontantTotal($idVisiteur, $mois);
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    $lesFraisForfait[1]['montant'] = $pdo->getMontantFraisKilometrique($idVisiteur, $mois);
    $leTypeVehicule = $pdo->getLeTypeVehicule($idVisiteur, $mois);
    $lesTypesVehicule = $pdo->getLesTypesVehicule();
    include 'vues/blocks/comptable/v_validationFicheFrais.php';
    include 'vues/blocks/comptable/validerFrais/v_ficheFraisForfaitAValider.php';
    include 'vues/blocks/comptable/validerFrais/v_ficheFraisHorsForfaitAValider.php';
    include 'vues/blocks/comptable/v_totalRemboursement.php';
    include 'vues/blocks/comptable/validerFrais/v_btnValiderFiche.php';
}

