<?php

/*
 * Mise en place de middleware pour protéger l'accès à certaines pages
 * Uniquement aux visiteurs ou aux comptables
 * 
 * Auteur Antoine LAUTRETTE
 * 
 * Etudiant en BTS SIO option SLAM
 * 
 * linkedin : https://www.linkedin.com/in/antoine-lautrette-057749197/
 * GitHub : https://github.com/ALautrette
 */

/**
 * Fonction permettant de vérifier que l'utilisateur appartient bien au type
 * passé en paramettre, si c'est le cas retourne true sinon retourne faux
 * et affiche une erreur
 * 
 * @param string $type type/status que doit avoir l'utilisateur pour accéder à la page
 * @return boolean
 */
function middleware($type) {
    if ($_SESSION['type'] != $type) {
        ajouterErreur(
                "La page à laquelle vous essayez d'accéder est réservée aux "
                . $type . "s"
        );
        include "vues/v_erreurs.php";
        return false;
    } else {
        return true;
    }
}
