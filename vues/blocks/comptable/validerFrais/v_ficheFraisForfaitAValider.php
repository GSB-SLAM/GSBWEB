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
<div class="row">
    <h3>Eléments forfaitisés</h3>
    <div class = "col-md-4">
        <form method = "post"
              action = "index.php?uc=rechercheFiche&action=corrigerFrais"
              role = "form">
            <fieldset>
                <?php
                foreach ($lesFraisForfait as $unFrais) {
                    $idFrais = $unFrais['idfrais'];
                    $libelle = htmlspecialchars($unFrais['libelle']);
                    $quantite = $unFrais['quantite'];
                    ?>
                    <div class="form-group">
                        <label for="<?php echo $idFrais ?>"><?php echo $libelle ?></label>
                        <input type="text" id="<?php echo $idFrais ?>" 
                               name="lesFrais[<?php echo $idFrais ?>]"
                               size="10" maxlength="5" 
                               value="<?php echo $quantite ?>" 
                               class="form-control">
                    </div>
                    <?php
                }
                ?>
                <button class="btn btn-success" type="button" 
                        id="btnCorriger">Corriger</button>
                <button class="btn btn-danger" type="reset" 
                        id="btnReset">Réinitialiser</button>
            </fieldset>
        </form>
    </div>
</div>

<script type="text/javascript" src="js/validationFiches/correctionAjax.js"></script>