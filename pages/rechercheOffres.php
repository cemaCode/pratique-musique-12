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
    <div class="img_container">
        <img loading="lazy" class="img_offre" src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo1']; ?>" alt="#">
    </div>
    <div class="content">
        <h3><?php echo $offre['nomOffre']; ?></h3>
        <p class="instrument"><?php echo $offre['nomInstrument']; ?></p>
        <p class="niveau"><?php echo $offre['niveau']; ?></p>
        <p class="description_offre"><?php echo $offre['description']; ?></p>
    </div>
</div>

<?php } ?>