<?php

/**
 * Index du projet GSB
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
require_once 'includes/fct.inc.php';
require_once 'includes/class.pdogsb.inc.php';
require_once 'includes/middleware.inc.php';
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
$testAction = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$ajax = array(
    "dateAjax",
    "corrigerFrais",
    "updateTotal",
);
if (!in_array($testAction, $ajax)) {
    require 'vues/v_entete.php';
}
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
if ($uc && !$estConnecte) {
    $uc = 'connexion';
} elseif (empty($uc)) {
    $uc = 'accueil';
}
switch ($uc) {
    case 'connexion':
        include 'controleurs/c_connexion.php';
        break;
    case 'accueil':
        include 'controleurs/c_accueil.php';
        break;
    case 'gererFrais':
        if (middleware("visiteur")) {
            include 'controleurs/c_gererFrais.php';
        }
        break;
    case 'etatFrais':
        if (middleware("visiteur")) {
            include 'controleurs/c_etatFrais.php';
        }
        break;
    case 'validerFrais':
        if (middleware("comptable")) {
            include 'controleurs/c_validerFrais.php';
        }
        break;
    case 'suivreFrais':
        if (middleware("comptable")) {
            include 'controleurs/c_suivreFrais.php';
        }
        break;
    case 'deconnexion':
        include 'controleurs/c_deconnexion.php';
        break;
}
if (!in_array($testAction, $ajax)) {
    require 'vues/v_pied.php';
}