<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!--<p style="background: green">Succès</p>
<p style="background: red">Echec</p>-->
<?php
require_once '../../includes/class.pdogsb.inc.php';
$succes = 0;
$echec = 0;
$test = 0;

echo ('<hr><h3>Test GetPdoGsb</h3>');
$test++;
try {
    $pdo = PdoGsb::getPdoGsb();
    if (empty($pdo)) {
        echo ('<p style="background: red">Echec</p>');
        $echec++;
    } else {
        echo ('<p style="background: green">Succès</p>');
        $succes++;
    }
} catch (Exception $ex) {
    echo ('<p style="background: red">Echec (Exception)</p>');
    $echec++;
}

//Test getInfosVisiteur
echo '<hr><h3>Test GetInfosVisiteur</h3>';

echo ('<h4>Test dandre et oppg5 hashé</h4>');
$test++;
$visiteur = $pdo->getInfosVisiteur('dandre', hash("sha256", 'oppg5'));
try {
    if ($visiteur['id'] == 'a17' && $visiteur['nom'] == 'Andre' && $visiteur['prenom'] == 'David') {
        echo '<p style="background: green">Succès</p>';
        $succes++;
    } else {
        echo '<p style="background: red">Echec</p>';
        $echec++;
    }
} catch (Exception $ex) {
    echo ('<p style="background: red">Echec (Exception)</p>');
    $echec++;
}

$login = 'cbedos';
$mdp = 'gmhxd';
$valueExpected = array(
    'id' => 'a55',
    'nom' => 'Bedos',
    'prenom' => 'Christian',
);
echo '<h4>Test ' . $login . ' et ' . $mdp . ' hashé</h4>';
$test++;
$value = $pdo->getInfosVisiteur($login, hash("sha256", $mdp));
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}


//Test getInfosComptable
echo '<hr><h3>Test getInfosComptable($login, $mdp)</h3>';

$login = 'jean';
$mdp = 'test';
$valueExpected = array(
    'id' => 'c001',
    'nom' => 'Test',
    'prenom' => 'Jean',
);
echo '<h4>Test ' . $login . ' et ' . $mdp . ' hashé</h4>';
$test++;
$value = $pdo->getInfosComptable($login, hash("sha256", $mdp));
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}


//Test getMoisFichesAValider
echo '<hr><h3>Test getMoisFichesAValider($idVisiteur)</h3>';

$idVisiteur = 'f4';
$valueExpected = array();
echo '<h4>Test avec ' . $idVisiteur . '</h4>';
$test++;
$value = $pdo->getMoisFichesAValider($idVisiteur);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

$idVisiteur = 'a17';
$valueExpected = array(
    array(
        'mois' => '202011',
    ),
);
echo '<h4>Test avec ' . $idVisiteur . '</h4>';
$test++;
$value = $pdo->getMoisFichesAValider($idVisiteur);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}

$idVisiteur = 'd51';
$valueExpected = array(
    array(
        'mois' => '202009',
    ),
    array(
        'mois' => '202010',
    ),
    array(
        'mois' => '202011'
    )
);
echo '<h4>Test avec ' . $idVisiteur . '</h4>';
$test++;
$value = $pdo->getMoisFichesAValider($idVisiteur);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}


//Test getMoisFichesValideesEtMiseEnPaiement
echo '<hr><h3>Test getMoisFichesValideesEtMiseEnPaiement($idVisiteur)</h3>';

$idVisiteur = 'd51';
$valueExpected = array(
    array(
        'mois' => '201909',
    ),
    array(
        'mois' => '201910',
    ),
    array(
        'mois' => '201911'
    ),
    array(
        'mois' => '201912',
    ),
    array(
        'mois' => '202001',
    ),
    array(
        'mois' => '202002'
    ),
    array(
        'mois' => '202003',
    ),
    array(
        'mois' => '202004',
    ),
    array(
        'mois' => '202005'
    ),
    array(
        'mois' => '202006',
    ),
    array(
        'mois' => '202007',
    ),
    array(
        'mois' => '202008'
    )
);
echo '<h4>Test avec ' . $idVisiteur . '</h4>';
$test++;
$value = $pdo->getMoisFichesValideesEtMiseEnPaiement($idVisiteur);
if ($value == $valueExpected) {
    echo '<p style="background: green">Succès</p>';
    $succes++;
} else {
    echo '<p style="background: red">Echec (' . $valueExpected . ' attendu,' . $value . ' obtenu)</p>';
    $echec++;
}


$idVisiteur = 'f4';
$valueExpected = array(
    array(
        'mois' => '201909',
    ),
    array(
        'mois' => '201910',
    ),
    array(
        'mois' => '201911'
    ),
    array(
        'mois' => '201912',
    ),
    array(
        'mois' => '202001',
    ),
    array(
        'mois' => '202002'
    ),
    array(
        'mois' => '202003',
    ),
    array(
        'mois' => '202004',
    ),
    array(
        'mois' => '202005'
    ),
    array(
        'mois' => '202006',
    ),
    array(
        'mois' => '202007',
    ),
    array(
        'mois' => '202008'
    ),
    array(
        'mois' => '202009',
    ),
    array(
        'mois' => '202010'
    )
);
echo '<h4>Test avec ' . $idVisiteur . '</h4>';
$test++;
$value = $pdo->getMoisFichesValideesEtMiseEnPaiement($idVisiteur);
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
