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
<label for="selectDate">Mois :</label>
<select name="selectDate" id="selectDate">
    <?php
    if (empty($dates)) {
        echo "<option value='none'>Aucune fiche à valider</option>";        
    } else {
        foreach ($dates as $date) {
            echo "<option value='" . $date[mois] . "'>" . dateBDVersAffichage($date[mois])
            . "</option>";
        }
    }
    ?>
</select>