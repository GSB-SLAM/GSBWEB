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
//<p style="background: green">Succès</p>
//<p style="background: red">Echec</p>
require_once '../../includes/fct.inc.php';

$succes = 0;
$echec = 0;
$test = 0;

echo('<hr><h3>Test valeurToMontant</h3>');

$valueTested = 54;
$valueExpected = '54.00';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
try {
    $value = valeurToMontant($valueTested);
    
    if ($value == $valueExpected) {
        echo '<p style="background: green">Succès</p>';
        $succes++;
    } else {
        echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
        $echec++;
    }
} catch (Exception $ex) {
    echo '<p style="background: red">Echec (Exception)</p>';
    $echec++;
}

$valueTested = 324.1;
$valueExpected = '324.10';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
try {
    $value = valeurToMontant($valueTested);
    
    if ($value == $valueExpected) {
        echo '<p style="background: green">Succès</p>';
        $succes++;
    } else {
        echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
        $echec++;
    }
} catch (Exception $ex) {
    echo '<p style="background: red">Echec (Exception)</p>';
    $echec++;
}

$valueTested = 802.89;
$valueExpected = '802.89';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
try {
    $value = valeurToMontant($valueTested);
    if ($value == $valueExpected) {
        echo '<p style="background: green">Succès</p>';
        $succes++;
    } else {
        echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
        $echec++;
    }
} catch (Exception $ex) {
    echo '<p style="background: red">Echec (Exception)</p>';
    $echec++;
}

$valueTested = 2.8989;
$valueExpected = '2.89';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
try {
    $value = valeurToMontant($valueTested);
    if ($value == $valueExpected) {
        echo '<p style="background: green">Succès</p>';
        $succes++;
    } else {
        echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
        $echec++;
    }
} catch (Exception $ex) {
    echo '<p style="background: red">Echec (Exception)</p>';
    $echec++;
}


echo '<hr><h2>Résultats</h2>';
echo '<p style="background: cyan">' . $test . ' tests effectués</p>';
echo '<p style="background: green">' . $succes . ' succès</p>';
if ($echec != 0) {
    echo '<p style="background: red">' . $echec . ' échecs</p>';
}