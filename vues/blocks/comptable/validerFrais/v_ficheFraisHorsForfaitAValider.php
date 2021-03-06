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
    <div class="panel panel-info borderorange">
        <div class="panel-heading borderorange orange fs-24">Descriptif des éléments hors forfait</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date fs-16">Date</th>
                    <th class="libelle fs-16">Libellé</th>  
                    <th class="montant fs-16">Montant</th>  
                    <th class="action">&nbsp;</th> 
                </tr>
            </thead>  
            <tbody>
                <?php
                foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                    $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                    $date = $unFraisHorsForfait['date'];
                    $montant = $unFraisHorsForfait['montant'];
                    $id = $unFraisHorsForfait['id'];
                    $refuse = estRefuse($libelle);
                    ?>           
                    <tr <?php if ($refuse) {
                    echo "class='fraisRefuse'";
                } ?>>
                        <td> <?php echo $date ?></td>
                        <td> <?php echo $libelle ?></td>
                        <td><?= $montant ?> €</td>
                        <td>
    <?php if (!$refuse) { ?>
                                <a class="btn btn-warning" 
                                   href="index.php?uc=validerFrais&action=reporterFrais&idFrais=<?php echo $id ?>" 
                                   onclick="return confirm('Voulez-vous vraiment reporter ce frais?');">
                                    Reporter
                                </a>
                                <a class="btn btn-danger" 
                                   href="index.php?uc=validerFrais&action=refuserFrais&idFrais=<?php echo $id ?>" 
                                   onclick="return confirm('Voulez-vous vraiment refuser ce frais?');">
                                    Refuser
                                </a>
                    <?php } ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>  
        </table>
    </div>
</div>
