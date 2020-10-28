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

$visiteurs = $pdo->getIdNomPrenomVisiteurs();
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch ($action) {
    case 'afficheRecherche':
        break;
    case 'dateAjax':
        $post = filter_var_array($_POST);
        $id = key($post);
        $dates = $pdo->getMoisFichesAValider($id);
        include 'vues/v_inputDate.php';
        break;
    case 'rechercheFiche':
        include 'vues/v_formulaireRechercheFiches.php';
}



