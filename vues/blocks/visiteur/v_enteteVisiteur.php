<?php
/*
 * 
 * 
 * Auteur Valentin CHARLES
 * 
 * Etudiant en BTS SIO option SLAM
 * 
 * linkedin : https://www.linkedin.com/in/antoine-lautrette-057749197/
 * GitHub : https://github.com/ALautrette
 */
?>
<div class="header">
    <div class="row vertical-align">
        <div class="col-md-4">
            <h1>
                <img src="./images/logo.jpg" class="img-responsive" 
                     alt="Laboratoire Galaxy-Swiss Bourdin" 
                     title="Laboratoire Galaxy-Swiss Bourdin">
            </h1>
        </div>
        <div class="col-md-8">
            <ul class="nav nav-pills pull-right" role="tablist">
                <li <?php if (!$uc || $uc == 'accueil') { ?>class="active" <?php } ?>>
                    <a href="index.php">
                        <span class="glyphicon glyphicon-home"></span>
                        Accueil
                    </a>
                </li>
                <li <?php if ($uc == 'gererFrais') { ?>class="active"<?php } ?>>
                    <a href="index.php?uc=gererFrais&action=saisirFrais">
                        <span class="glyphicon glyphicon-pencil"></span>
                        Renseigner la fiche de frais
                    </a>
                </li>
                <li <?php if ($uc == 'etatFrais') { ?>class="active"<?php } ?>>
                    <a href="index.php?uc=etatFrais&action=selectionnerMois">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        Afficher mes fiches de frais
                    </a>
                </li>
                <li 
                    <?php if ($uc == 'deconnexion') { ?>class="active"<?php } ?>>
                    <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                        <span class="glyphicon glyphicon-log-out"></span>
                        Déconnexion
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

