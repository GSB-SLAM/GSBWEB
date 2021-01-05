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
<div class="alert alert-success" role="alert">
    <?php
    foreach ($_REQUEST['succes'] as $succes) {
        echo '<p>' . htmlspecialchars($succes) . '</p>';
    }
    ?>
</div>