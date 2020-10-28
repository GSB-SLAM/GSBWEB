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
<form class="form-inline" 
      action="index.php?uc=rechercheFiche&action=afficheRecherche" method="post">    
    <div class="form-group form-visit">
        <label for="idVi">Choisir le visiteur :</label>

        <select name="idVi" id="idVi" >
            <option value="none">Choisir</option>
            <?php
            foreach ($visiteurs as $visiteur) {
                echo "<option value='" . $visiteur['id']
                . "'>" . $visiteur['nom'] . " "
                . $visiteur['prenom'] . "</option>";
            }
            ?>
        </select>
    </div>  
    <div class="form-group form-visit" id="retour">
    </div>


    <div class="form-group">
        <button type="submit" id="btnRecherche" class="btn btn-primary mb-2 d-none">
            Rechercher
        </button>
    </div>


</form>

<script type="text/javascript" src="js/inputDatesAjax.js"></script>