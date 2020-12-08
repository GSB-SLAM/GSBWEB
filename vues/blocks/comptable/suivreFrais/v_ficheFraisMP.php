<?php
/*
 * 
 * 
 * Auteur Valentin CHARLES
 * 
 * Etudiant en BTS SIO option SLAM
 * 
 * linkedin : https://www.linkedin.com/in/valentin-charles-9264531b7/
 * GitHub : https://github.com/ValentinCharles83
 */
?>
<?php
/**
 * Vue État de Frais
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
?>
<hr>
<div class="panel panel-info borderorange row">
    <div class="panel-heading borderorange orange ">Fiche de frais du
        <?php echo dateBDVersAffichage($mois) ?> : </div>
    <div class="panel-body">
        <strong><u>Etat</u> :</strong> <?php echo $leStatut ?>
         le <?php echo dateAnglaisVersFrancais($dateModif) ?> <br>
        <strong><u>Montant validé</u> :</strong> <?php echo $montantTotal ?>€
    </div>
</div>
<hr>
<div class="panel panel-info borderorange row">
    <div class="panel-heading borderorange orange">Eléments forfaitisés</div>
    <table class="table table-bordered table-responsive">
        <tr>
            <?php
            foreach ($lesFraisForfait as $unFraisForfait) {
                $libelle = $unFraisForfait['libelle'];
                ?>
                <th> <?php echo htmlspecialchars($libelle) ?></th>
                <?php
            }
            ?>
        </tr>
        <tr>
            <?php
            foreach ($lesFraisForfait as $unFraisForfait) {
                $quantite = $unFraisForfait['quantite'];
                ?>
                <td class="qteForfait"><?php echo $quantite ?> </td>
                <?php
            }
            ?>
        </tr>
    </table>
</div>
<hr>
<div class="panel panel-info borderorange row">
    <div class="panel-heading borderorange orange">Descriptif des éléments hors forfait</div>
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>                
        </tr>
        <?php
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
            $montant = $unFraisHorsForfait['montant'];
            
            ?>
            <tr <?php if(estRefuse($libelle)){ echo "class='fraisRefuse'";}?>>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<div class="row">
</div>
<?php
if ($leStatut == "Validée") { ?>
    <div class="row centrer">
        <a class="btn btn-success btn-valider" type="button" href="index.php?uc=suivreFrais&
           action=miseEnPaiementFiche" id="btnMettre-en-Paiement" 
           onclick="return confirm('Voulez-vous vraiment mettre en paiement cette\n\
         fiche?');">Mettre en Paiement</a>
    </div>
<?php } ?>
                    



