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
session_start();

$succes = 0;
$echec = 0;
$test = 0;

//Début des tests de valeurtoMontant
echo ('<hr><h3>Test valeurToMontant</h3>');

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


//Début des tests de estConnecte
echo ('<hr><h3>Test estConnecte()</h3>');

echo ('<h4>Test avec $_SESSION[\'idVisiteur\'] assigné</h4>');
$_SESSION['idVisiteur'] = 'a131';
$valueExpected = true;
$value = estConnecte();
$test++;
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

echo ('<h4>Test avec $_SESSION[\'idVisiteur\'] vide</h4>');
unset($_SESSION['idVisiteur']);
$valueExpected = false;
$value = estConnecte();
$test++;
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}


echo ('<hr><h3>Test connecter($idVisiteur, $nom, $prenom, $type)</h3>');

$idVisiteur = 'a131';
$nom = 'Villechalane';
$prenom = 'Louis';
$type = 'visiteur';

$test++;

echo ('<h4>Test avec ' . $idVisiteur . ' ,' . $nom . ' ,' . $prenom . ' ,' . $type . '</h4>');
connecter($idVisiteur, $nom, $prenom, $type);
if (
    $idVisiteur == $_SESSION['idVisiteur']
    && $nom == $_SESSION['nom']
    && $prenom == $_SESSION['prenom']
    && $type == $_SESSION['type']
) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $idVisiteur . ', ' . $nom . ', ' . $prenom . ', ' . $type . ' attendu,'
        . $_SESSION['idVisiteur'] . ', ' . $_SESSION['nom'] . ', ' . $_SESSION['prenom'] . ', ' . $_SESSION['type'] . ' obtenu)</p>';
    $echec++;
}

$idVisiteur = 'c001';
$nom = 'Test';
$prenom = 'Jean';
$type = 'comptable';

$test++;

echo ('<h4>Test avec ' . $idVisiteur . ', ' . $nom . ', ' . $prenom . ', ' . $type . '</h4>');
connecter($idVisiteur, $nom, $prenom, $type);
if (
    $idVisiteur == $_SESSION['idVisiteur']
    && $nom == $_SESSION['nom']
    && $prenom == $_SESSION['prenom']
    && $type == $_SESSION['type']
) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $idVisiteur . ', ' . $nom . ', ' . $prenom . ', ' . $type . ' attendu,'
        . $_SESSION['idVisiteur'] . ', ' . $_SESSION['nom'] . ', ' . $_SESSION['prenom'] . ', ' . $_SESSION['type'] . ' obtenu)</p>';
    $echec++;
}

// Test deconnecter
echo '<hr><h2>Test deconnecter()</h2>';
$test++;
deconnecter();
if (!empty($_SESSION)) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec</p>';
    $echec++;
}

//Test de dateFrançaisVersAnglais
echo '<hr><h2>Test dateFrancaisVersAnglais($maDate)</h2>';

$valueTested = '10/12/2020';
$valueExpected = '2020-12-10';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = dateFrancaisVersAnglais($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

$valueTested = '02/08/1900';
$valueExpected = '1900-08-02';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = dateFrancaisVersAnglais($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}



//Test de la fonction dateBDVersAffichage
echo '<hr><h2>Test dateBDVersAffichage($date)</h2>';

$valueTested = '202012';
$valueExpected = '12/2020';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = dateBDVersAffichage($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

$valueTested = '199806';
$valueExpected = '06/1998';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = dateBDVersAffichage($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}


//Test de la fonction dateAnglaisVersFrancais
echo '<hr><h2>Test dateAnglaisVersFrancais($maDate)</h2>';

$valueTested = '2020-06-01';
$valueExpected = '01/06/2020';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = dateAnglaisVersFrancais($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

$valueTested = '1990-10-17';
$valueExpected = '17/10/1990';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = dateAnglaisVersFrancais($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}



//Test de la fonction getMois
echo '<hr><h2>Test getMois($date)</h2>';

$valueTested = '01/06/2020';
$valueExpected = '202006';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = getMois($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

$valueTested = '17/10/1990';
$valueExpected = '199010';
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = getMois($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}


//Test de la fonction estEntierPositif
echo '<hr><h2>Test estEntierPositif($valeur)</h2>';

$valueTested = 1;
$valueExpected = true;
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = estEntierPositif($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

$valueTested = 0;
$valueExpected = true;
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = estEntierPositif($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

$valueTested = -1;
$valueExpected = false;
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = estEntierPositif($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}


//Test de la fonction estTableauEntiers
echo '<hr><h2>Test estTableauEntiers($tabEntiers)</h2>';

$valueTested = [1, 2, 3, 0];
$valueExpected = true;
echo ('<h4>Test avec [1, 2, 3, 0]</h4>');
$test++;
$value = estTableauEntiers($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

$valueTested = [0, 0, 4, -1, 2];
$valueExpected = false;
echo ('<h4>Test avec [0, 0, 4, -1, 2] </h4>');
$test++;
$value = estTableauEntiers($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

//Test de la fonction estDateDepassee
echo '<hr><h2>Test estDateDepassee($dateTestee)</h2>';

$valueTested = '28/12/2019';
$valueExpected = true;
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = estDateDepassee($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

$valueTested = '28/12/2020';
$valueExpected = false;
echo ('<h4>Test avec ' . $valueTested . '</h4>');
$test++;
$value = estDateDepassee($valueTested);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}



echo '<hr><h2>Résultats</h2>';
echo '<p style="background: cyan">' . $test . ' tests effectués</p>';
echo '<p style="background: green">' . $succes . ' succès</p>';
if ($echec != 0) {
    echo '<p style="background: red">' . $echec . ' échecs</p>';
}
