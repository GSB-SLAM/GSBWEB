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

function middlewareVisiteur() {
    if ($_SESSION['type'] == "visiteur") {
        return true;
    } else {
        include "vues/v_accesInterdit.php";
        return false;
    }
}

function middlewareComptable(){
    if ($_SESSION['type'] == "comptable") {
        return true;
    } else {
        include "vues/v_accesInterdit.php";
        return false;
    }
}
