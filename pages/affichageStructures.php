<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");
$db = new dbController();
$nomRubrique = "";
$offres = [];
if (isset($GLOBALS['currentRubrique'])) {
    $nomRubrique = $GLOBALS['currentRubrique'];
    $offres = $db->getOffresByRubrique($nomRubrique);

}

if (isset($GLOBALS['structures'])) {
$stuctures = $GLOBALS['structures'];
foreach ($stuctures

as $structure) {
?>



<div class="structure">
    <img class="img_offre" src="img1" alt="#">
    <div class="content">
        <h3><?php echo $structure['nomStructure']; ?></h3>
        <p class="siteInternet"><?php echo $structure['siteInternet']; ?></p>
        <p class="adresse"><?php echo $structure['adresse']; ?></p>
        <p class="code_postal">31300, </p>
        <p class="ville">RODEZ</p>
        <p class="tel"><?php echo $structure['tel']; ?></p>
        <p class="contact"><?php echo $structure['contact']; ?></p>
        <button onclick="toggleVisibility('<?php echo $structure['tel'] ?>')">Voir les offres «
            <i><?php echo $nomRubrique; ?></i> » de cette structure ⬎
        </button>

    </div>
</div>
<div id="<?php echo $structure['tel'] ?>" class="hide">
    <?php
    foreach ($offres as $offre) {
        if ($offre['contact'] == $structure['contact']) {
            ?>
            <div class="offre">
           <!--      <script>
                    var slideIndex = 1;
                    showDivs(slideIndex);
                </script> -->
                <!--                    <div id="test_taille"></div>-->
                <div class="img_container">

                    <img loading="lazy" class="img_offre"
                         src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo1']; ?>"
                         alt="#">
<!--                    <img class="img_offre"-->
<!--                         src="/pratique-musique-12/images/img_offres/--><?php //echo $offre['idOffre']; ?><!--/--><?php //echo $offre['photo2']; ?><!--"-->
<!--                         alt="#">-->
<!--                    <img class="img_offre"-->
<!--                         src="/pratique-musique-12/images/img_offres/--><?php //echo $offre['idOffre']; ?><!--/--><?php //echo $offre['photo3']; ?><!--"-->
<!--                         alt="#">-->

                </div>
                <div class="content">
                    <h3><?php echo $offre['nomOffre']; ?></h3>
                    <p class="instrument"><?php echo $offre['nomInstrument']; ?></p>
                    <p class="niveau"><?php echo $offre['niveau']; ?></p>
                    <p class="description_offre"><?php echo $offre['description']; ?></p>
                </div>
            </div>

            <?php
        }

    }
    echo "</div>";
    }
    } else {

        print_r($GLOBALS['currentRubrique']);
        print_r($GLOBALS['structures']);
//        header('Location: /pratique-musique-12/index.php');
        exit;
    }
    ?>



