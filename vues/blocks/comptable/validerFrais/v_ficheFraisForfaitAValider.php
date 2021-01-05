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
<hr>
<div class="row">
    <h2 class="texteorange">Valider la fiche de frais</h2>
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
                    $montant = $unFrais['montant'];
                    ?>
                    <div class="form-group">
                        <label for="<?php echo $idFrais ?>" class="fs-16"><?php echo $libelle ?></label>
                        <div class="flex">
                            <input type="text" id="<?php echo $idFrais ?>" 
                                   name="lesFrais[<?php echo $idFrais ?>]"
                                   size="10" maxlength="5" 
                                   value="<?php echo $quantite ?>" 
                                   class="form-control w-a mr-10">
                                   <?php if ($idFrais == 'KM') { ?>
                                <select name="idVehicule" id="idVehicule">
                                    <?php
                                    foreach ($lesTypesVehicule as $type) {
                                        $selected = '';
                                        if ($leTypeVehicule == $type['id']) {
                                            $selected = "selected";
                                        }
                                        echo "<option value='" . $type['id'] . "'"
                                        . $selected . ">" . $type['libelle'] . " "
                                        . "(" . $type['montant'] . " €/km)" . "</option>";
                                    }
                                    ?>
                                </select>
                            <?php } else { ?>
                                <span class="mt-7"><?= $montant ?> €/unité</span>
                            <?php } ?>
                        </div>
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