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
foreach ($stuctures as $structure) {
?>


<div class="structure">
    <div class="img_container">
        <img loading="lazy" class="img_offre" src="/pratique-musique-12/images/placeholder.png" alt="image structure">
    </div>
    <div class="content">
        <h3><?php echo $structure['nomStructure']; ?></h3>
        <p class="siteInternet"><?php echo $structure['siteInternet']; ?></p>
        <p class="adresse"><?php echo $structure['adresse']; ?></p>
        <p class="code_postal"><?php echo $db->getCodePostalFromInsee($structure['codeInsee']); ?></p>
        <p class="ville"><?php echo $db->getCommuneFromInsee($structure['codeInsee']); ?></p>
        <p class="tel"><?php echo $structure['tel']; ?></p>
        <p class="contact"><?php echo $structure['contact']; ?></p>
        <button class="voir-offres" onclick="toggleVisibility('<?php echo $structure['tel'] ?>')">Voir les offres «
            <i><?php echo $nomRubrique; ?></i> » de cette structure ⬎
        </button>

    </div>
</div>
<div id="<?php echo $structure['tel'] ?>" class="hide">
    <?php
    $index = 0;
    $arraySlides = "";
    foreach ($offres as $offre) {
        if ($offre['contact'] == $structure['contact']) {
            ?>
            <div class="offre">
                <div class="slideshow_container">
                    <img loading="lazy" class="offre_<?php echo $index; ?>"
                         src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo1']; ?>">
                    <img loading="lazy" class="offre_<?php echo $index; ?>"
                         src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo2']; ?>">
                    <img loading="lazy" class="offre_<?php echo $index; ?>"
                         src="/pratique-musique-12/images/img_offres/<?php echo $offre['idOffre']; ?>/<?php echo $offre['photo3']; ?>">
                    <a class="prev" onclick="plusSlides(-1, <?php echo $index; ?>)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, <?php echo $index; ?>)">&#10095;</a>
                </div>
                <div class="content">
                    <h3><?php echo $offre['nomOffre']; ?></h3>
                    <?php
                        if (isset($offre['nomInstrument'])) {
                            echo "<p class='instrument'><b>Instrument :</b> " . $offre['nomInstrument'] . "</p>";
                        }
                    ?>
                    <p class="niveau"><b>Niveau :</b> <?php echo $offre['niveau']; ?></p>
                    <p class="description_offre"><b>Description :</b> <?php echo $offre['description']; ?></p>
                </div>
            </div>

            <?php
        }
        $arraySlides = $arraySlides . "offre_" . $index . ",";
        $index += 1;
    }
    $arraySlides = substr($arraySlides, 0, -1);
    echo "</div>";
    }
    } else {
        print_r($GLOBALS['currentRubrique']);
        print_r($GLOBALS['structures']);
        exit;
    }
    ?>
    <p id="arraySlides"><?php echo $arraySlides; ?></p>
        <script type="text/javascript" src="/pratique-musique-12/pages/functions.js"></script>