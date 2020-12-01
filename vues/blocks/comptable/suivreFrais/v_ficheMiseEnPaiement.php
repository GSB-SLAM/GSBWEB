<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ficheMiseenPaiement
 *
 * @author charles.valentin
 */
?>
<div class="alert alert-success">
    <p>
    La fiche de <?php echo $nom['nom'] . " " . $nom['prenom']?> du
        <?php echo dateBDVersAffichage($mois)?> a été mise en paiement avec succès !
    </p>
    <p>
        <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.
    </p>
</div>
<?php
header("Refresh: 5;URL=index.php");

