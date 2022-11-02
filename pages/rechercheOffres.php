<!--<script type="text/javascript" src="/pratique-musique-12/pages/functions.js"></script>-->

<link rel="stylesheet" type="text/css" href="/pratique-musique-12/stylesheet/pages.css" media="screen"/>

<style>
    /* Three image containers (use 25% for four, and 50% for two, etc) */


    .offre {
        margin-left: 0px;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .content {
        width: 100%;
    }
    .column {
        float: left;
        padding: 5px;
    }

    .row {
        display: flex;
        width: 100%;
        position: relative;
        margin: 0px;
        padding: 10px;
        align-items: center;
        justify-content: space-evenly;
    }

    img{
        border-radius: 5px;
        justify-content: center;
        align-items: center;
        margin: 0px;
    }


</style>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");
$db = new dbController();


$niveau = $_GET['f_niveau'];
$rubrique = $_GET['f_rubrique'];
$motCle = $_GET['f_mot_cle'];
$localisation = '';
$offres = $db->searchOffres($niveau, $rubrique, $localisation, $motCle);

foreach ($offres as $offre) {
    ?>
<div class="offre">
    <div class="content">
        <h3><?php echo $offre['nomOffre']; ?></h3>
        <p class="instrument"><?php echo $offre['nomInstrument']; ?></p>
        <p class="niveau"><?php echo $offre['niveau']; ?></p>
        <p class="description_offre"><?php echo $offre['description']; ?></p>
    </div>
<br>
    <div class="row">
        <div class="column">
            <img loading="lazy" class="img_offre"
                 src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo1']; ?>">
        </div>
        <div class="column">
            <img loading="lazy" class="img_offre"
                 src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo2']; ?>">
        </div>
        <div class="column">
            <img loading="lazy" class="img_offre"
                 src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo3']; ?>">

        </div>
    </div>


</div>
<?php } ?>