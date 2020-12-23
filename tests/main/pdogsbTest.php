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

echo('<hr><h3>Test GetPdoGsb</h3>');
$test++;
try {
    $pdo = PdoGsb::getPdoGsb();
    if (empty($pdo)) {
        echo('<p style="background: red">Echec</p>');
        $echec++;
    } else {
        echo('<p style="background: green">Succès</p>');
        $succes++;
    }
} catch (Exception $ex) {
    echo('<p style="background: red">Echec (Exception)</p>');
    $echec++;
}


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
    echo('<p style="background: red">Echec (Exception)</p>');
    $echec++;
}


echo '<h4>Test ... et ... hashé</h4>';





echo '<hr><h2>Résultats</h2>';
echo '<p style="background: cyan">' . $test . ' tests effectués</p>';
echo '<p style="background: green">' . $succes . ' succès</p>';
if($echec != 0){
    echo '<p style="background: red">' . $echec . ' échecs</p>';
}