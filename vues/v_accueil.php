<?php
/**
 * Vue Accueil
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
<div id="accueil" class="<?php if($_SESSION["type"] == "comptable"){?> texteorange <?php }?>">
    <h2>
        Gestion des frais<small> -  
            <?php 
            echo $_SESSION["type"] . " : " .  $_SESSION['prenom'] . ' ' . $_SESSION['nom']
            ?></small>
    </h2>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary <?php if($_SESSION["type"] == "comptable"){?> borderorange <?php }?>">
            <div class="panel-heading <?php if($_SESSION["type"] == "comptable"){?> orange <?php }?>">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-bookmark"></span>
                    Navigation
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">                   
                    <div class="col-xs-12 col-md-12">
                        <?php
                    if($_SESSION["type"] == "visiteur"){
                        include 'blocks/v_navigationVisiteur.html';
                    } else if($_SESSION["type"] == "comptable"){
                        include 'blocks/v_navigationComptable.html';
                    }
                    ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>