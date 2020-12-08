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
?>
<div class="alert alert-success">
    <p>
    La fiche de <?php echo $nom['nom'] . " " . $nom['prenom']?> du 
        <?php echo dateBDVersAffichage($mois)?> a été validée avec succès !
    </p>
    <p> 
        <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.
    </p>
</div>
<?php
header("Refresh: 5;URL=index.php");