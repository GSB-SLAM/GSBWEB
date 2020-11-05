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
<form method="post" 
      action="index.php?uc=rechercheFiche&action=afficheRecherche"
      class="form-inline">    
    <div class="form-group form-visit">
        <label for="idVi">Choisir le visiteur :</label>

        <select name="idVi" id="idVi" >  
            <option value="none">Choisir</option>
            <?php
            foreach ($visiteurs as $visiteur) {
                $selected = '';
                if(isset($_SESSION['current']) && $_SESSION['current']['id'] == $visiteur['id']){
                    $selected = "selected";
                }
                echo "<option value='" . $visiteur['id']
                . "'" . $selected . ">" . $visiteur['nom'] . " "
                . $visiteur['prenom'] . "</option>";
            }           
            ?>
        </select>
    </div>  
    <div class="form-group form-visit" id="retour">
        <?php
        if (isset($dates)) {
            include 'v_inputDate.php';
        }
        ?>
    </div>


    <div class="form-group">
        <button id="btnRecherche" 
                class="btn btnorange mb-2 d-none" disabled>
            Rechercher
        </button>
    </div>


</form>

