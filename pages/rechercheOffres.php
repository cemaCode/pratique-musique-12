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
    <script type="text/javascript" src="/pratique-musique-12/pages/functions.js"></script>

            <div class="offre">
                <div class="slideshow_container">


                    <img loading="lazy" class="offre_<?php echo $index; ?>"
                         src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo1']; ?>"
                         alt="#">
                    <img loading="lazy" class="offre_<?php echo $index; ?>"
                         src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo2']; ?>"
                         alt="#">
                    <img loading="lazy" class="offre_<?php echo $index; ?>"
                         src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo3']; ?>"
                         alt="#">
                    <a class="prev" onclick="plusSlides(-1, <?php echo $index; ?>)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, <?php echo $index; ?>)">&#10095;</a>
                </div>
                <div class="content">
                    <h3><?php echo $offre['nomOffre']; ?></h3>
                    <p class="instrument"><?php echo $offre['nomInstrument']; ?></p>
                    <p class="niveau"><?php echo $offre['niveau']; ?></p>
                    <p class="description_offre"><?php echo $offre['description']; ?></p>
                </div>
            </div>
</div>

<?php } ?>