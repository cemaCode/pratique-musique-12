<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");
$db = new dbController();
$nomRubrique = "";
$offres = [];
if (isset($GLOBALS['currentRubrique'])) {
    $nomRubrique = $GLOBALS['currentRubrique'];
    $offres = $db->getOffresByRubriques($nomRubrique);
}

if (isset($GLOBALS['structures'])) {
    $stuctures = $GLOBALS['structures'];

    foreach ($stuctures as $structure) {
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
                <p class="voir-offres"><a href="offres.php?structure=<?php echo $structure['nomStructure']; ?>">
                        Voir les offres d'éveil musical de cette structure </a></p>
            </div>
        </div>
        <?php
        foreach ($offres as $offre) {
            if ($offre['nomStructure'] == $structure['nomStructure']) {
                ?>
                <div class="offre">
                    <img class="img_offre" src="img1" alt="#">
                    <img class="img_offre" src="img2" alt="#">
                    <img class="img_offre" src="img3" alt="#">
                    <div class="content">
                        <h3>Nom offre</h3>
                        <p class="instrument">Nom instrument</p>
                        <p class="description_offre">description_offre</p>
                        <p class="niveau">Niveau</p>
                        <p class="structure">Structure</p>
                        onclick : afficher adresse structure
                    </div>
                </div>
                <?php
            }
        }
    } else {
        header('Location: /pratique-musique-12/index.php');
        exit;
}
?>