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

<div class="alert alert-danger" role="alert">
    <p>La page à laquelle vous avez essayé d'accéder est réservée aux 
        <?php
        if ($_SESSION['type'] == "comptable") {
            echo "Visiteurs";
        } else{
            echo "Comptables";
        }
        ?></p>
</div>