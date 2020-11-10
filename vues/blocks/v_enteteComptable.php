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
                <li <?php if (!$uc || $uc == 'accueil') { ?>class="active" <?php
                } ?>>
                    <a href="index.php" class="texteorange activeorange">
                        <span class="glyphicon glyphicon-home" class=></span>
                        Accueil
                    </a>
                </li>
                <li <?php if ($uc == 'validerFrais') { ?>class="active"<?php }
                ?>>
                    <a href="index.php?uc=validerFrais&action=rechercheFiche"
                       class="texteorange activeorange"> <!-- à modifier -->
                        <span class="glyphicon glyphicon-ok"></span>
                        Valider les fiches de frais
                    </a>
                </li>
                <li <?php if ($uc == 'suivreFrais') { ?>class="active"<?php }
                ?>>
                    <a href="index.php?uc=etatFrais&action=selectionnerMois" 
                       class="texteorange activeorange"> <!-- à modifier -->
                        <span class="glyphicon glyphicon-euro"></span>
                        Suivre le paiement des fiches de frais
                    </a>
                </li>
                <li 
                    <?php if ($uc == 'deconnexion') { ?>class="active"<?php }
                    ?>>
                    <a href="index.php?uc=deconnexion&action=demandeDeconnexion" 
                       class="texteorange activeorange">
                        <span class="glyphicon glyphicon-log-out"></span>
                        Déconnexion
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

