<?php
/**
 * Gestion de la connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) {
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    
    if($type == "comptable"){
        
        $comptable = $pdo->getInfosComptable($login, hash("sha256", $mdp));
        
        if (!is_array($comptable)) {
            ajouterErreur('Login ou mot de passe incorrect');
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } else {
            $id = $comptable['id'];
            $nom = $comptable['nom'];
            $prenom = $comptable['prenom'];
            connecter($id, $nom, $prenom, $type);
            header('Location: index.php');
        }
    } else if($type == "visiteur"){
        
        $visiteur = $pdo->getInfosVisiteur($login, hash("sha256", $mdp));
        
        if (!is_array($visiteur)) {
            ajouterErreur('Login ou mot de passe incorrect');
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } else {
            $id = $visiteur['id'];
            $nom = $visiteur['nom'];
            $prenom = $visiteur['prenom'];
            connecter($id, $nom, $prenom, $type);
            header('Location: index.php');
        }
    } else{
        ajouterErreur('Veuillez sélectionner Visiteur ou Comptable');
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
}
    
    
    break;
default:
    include 'vues/v_connexion.php';
    break;
}
