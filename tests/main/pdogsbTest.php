<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../includes/class.pdogsb.inc.php';

echo('<hr>Test GetPdoGsb<br>');

$pdo = PdoGsb::getPdoGsb();
if (empty($pdo)) {
    echo('Erreur lors de l\'instanciation de PDO');
} else {
    echo('Instanciation de pdo réalisée avec succès');
}

echo '<hr>Test GetInfosVisiteur<br>';

echo ('<br>Test dandre et oppg5 hashé<br>');
$visiteur = $pdo->getInfosVisiteur('dandre', hash("sha256", 'oppg5'));
if($visiteur['id'] == 'a17' && $visiteur['nom'] == 'Andre' 
        && $visiteur['prenom'] == 'David'){
    echo 'Succès<br>';
} else{
    echo 'Echec<br>';
}

echo '<br>Test dandre et oppg5 hashé<br>';

