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
    <div class="img_container">
        <img loading="lazy" class="img_offre" src="/pratique-musique-12/images/placeholder.png" alt="image structure">
    </div>
    <div class="content">
        <h3><?php echo $structure['nomStructure']; ?></h3>
        <p class="siteInternet">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                <path d="M24 44q-4.2 0-7.85-1.575Q12.5 40.85 9.8 38.15q-2.7-2.7-4.25-6.375Q4 28.1 4 23.9t1.55-7.825Q7.1 12.45 9.8 9.75t6.35-4.225Q19.8 4 24 4q4.2 0 7.85 1.525Q35.5 7.05 38.2 9.75q2.7 2.7 4.25 6.325Q44 19.7 44 23.9t-1.55 7.875Q40.9 35.45 38.2 38.15t-6.35 4.275Q28.2 44 24 44Zm0-2.9q1.75-1.8 2.925-4.125Q28.1 34.65 28.85 31.45H19.2q.7 3 1.875 5.4Q22.25 39.25 24 41.1Zm-4.25-.6q-1.25-1.9-2.15-4.1-.9-2.2-1.5-4.95H8.6Q10.5 35 13 37.025q2.5 2.025 6.75 3.475Zm8.55-.05q3.6-1.15 6.475-3.45 2.875-2.3 4.625-5.55h-7.45q-.65 2.7-1.525 4.9-.875 2.2-2.125 4.1Zm-20.7-12h7.95q-.15-1.35-.175-2.425-.025-1.075-.025-2.125 0-1.25.05-2.225.05-.975.2-2.175h-8q-.35 1.2-.475 2.15T7 23.9q0 1.3.125 2.325.125 1.025.475 2.225Zm11.05 0H29.4q.2-1.55.25-2.525.05-.975.05-2.025 0-1-.05-1.925T29.4 19.5H18.65q-.2 1.55-.25 2.475-.05.925-.05 1.925 0 1.05.05 2.025.05.975.25 2.525Zm13.75 0h8q.35-1.2.475-2.225Q41 25.2 41 23.9q0-1.3-.125-2.25T40.4 19.5h-7.95q.15 1.75.2 2.675.05.925.05 1.725 0 1.1-.075 2.075-.075.975-.225 2.475Zm-.5-11.95h7.5q-1.65-3.45-4.525-5.75Q32 8.45 28.25 7.5q1.25 1.85 2.125 4t1.525 5Zm-12.7 0h9.7q-.55-2.65-1.85-5.125T24 7q-1.6 1.35-2.7 3.55-1.1 2.2-2.1 5.95Zm-10.6 0h7.55q.55-2.7 1.4-4.825.85-2.125 2.15-4.125-3.75.95-6.55 3.2T8.6 16.5Z"/>
            </svg>
            <a href="<?php echo $structure['siteInternet']; ?>"
               target="_blank"><?php echo $structure['siteInternet']; ?></a></p>
        <p class="adresse">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                <path d="M24 23.5q1.45 0 2.475-1.025Q27.5 21.45 27.5 20q0-1.45-1.025-2.475Q25.45 16.5 24 16.5q-1.45 0-2.475 1.025Q20.5 18.55 20.5 20q0 1.45 1.025 2.475Q22.55 23.5 24 23.5Zm0 16.55q6.65-6.05 9.825-10.975Q37 24.15 37 20.4q0-5.9-3.775-9.65T24 7q-5.45 0-9.225 3.75Q11 14.5 11 20.4q0 3.75 3.25 8.675Q17.5 34 24 40.05ZM24 44q-8.05-6.85-12.025-12.725Q8 25.4 8 20.4q0-7.5 4.825-11.95Q17.65 4 24 4q6.35 0 11.175 4.45Q40 12.9 40 20.4q0 5-3.975 10.875T24 44Zm0-23.6Z"/>
            </svg>
            <a href="https://maps.google.com/maps?q=<?php echo $structure['adresse']; ?>+<?php echo $db->getCodePostalFromInsee($structure['codeInsee']); ?>+<?php echo $db->getCommuneFromInsee($structure['codeInsee']); ?>"
               target="_blank">
                <?php echo $structure['adresse']; ?><br>
                <?php echo $db->getCodePostalFromInsee($structure['codeInsee']); ?>,
                <?php echo $db->getCommuneFromInsee($structure['codeInsee']); ?>
            </a></p>
        <p class="tel">
            <svg xmlns="http://www.w3.org/2000/svg" id="tel_icon" viewBox="0 0 24 24" width="16" height="16">
                <path d="M13,1a1,1,0,0,1,1-1A10.011,10.011,0,0,1,24,10a1,1,0,0,1-2,0,8.009,8.009,0,0,0-8-8A1,1,0,0,1,13,1Zm1,5a4,4,0,0,1,4,4,1,1,0,0,0,2,0,6.006,6.006,0,0,0-6-6,1,1,0,0,0,0,2Zm9.093,10.739a3.1,3.1,0,0,1,0,4.378l-.91,1.049c-8.19,7.841-28.12-12.084-20.4-20.3l1.15-1A3.081,3.081,0,0,1,7.26.906c.031.031,1.884,2.438,1.884,2.438a3.1,3.1,0,0,1-.007,4.282L7.979,9.082a12.781,12.781,0,0,0,6.931,6.945l1.465-1.165a3.1,3.1,0,0,1,4.281-.006S23.062,16.708,23.093,16.739Zm-1.376,1.454s-2.393-1.841-2.424-1.872a1.1,1.1,0,0,0-1.549,0c-.027.028-2.044,1.635-2.044,1.635a1,1,0,0,1-.979.152A15.009,15.009,0,0,1,5.9,9.3a1,1,0,0,1,.145-1S7.652,6.282,7.679,6.256a1.1,1.1,0,0,0,0-1.549c-.031-.03-1.872-2.425-1.872-2.425a1.1,1.1,0,0,0-1.51.039l-1.15,1C-2.495,10.105,14.776,26.418,20.721,20.8l.911-1.05A1.121,1.121,0,0,0,21.717,18.193Z"/>
            </svg>
            <a href="tel:<?php echo $structure['tel']; ?>"><?php echo $structure['tel']; ?></a></p>
        <p class="contact">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                <path d="M24 44q-4.15 0-7.8-1.575-3.65-1.575-6.35-4.275-2.7-2.7-4.275-6.35Q4 28.15 4 24t1.575-7.8Q7.15 12.55 9.85 9.85q2.7-2.7 6.35-4.275Q19.85 4 24 4t7.8 1.575q3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24v2.65q0 2.8-1.975 4.725Q40.05 33.3 37.2 33.3q-1.8 0-3.4-.875-1.6-.875-2.45-2.475-1.3 1.7-3.25 2.525T24 33.3q-3.9 0-6.625-2.7T14.65 24q0-3.9 2.725-6.65Q20.1 14.6 24 14.6t6.625 2.75Q33.35 20.1 33.35 24v2.65q0 1.55 1.125 2.6T37.2 30.3q1.55 0 2.675-1.05Q41 28.2 41 26.65V24q0-7.1-4.95-12.05Q31.1 7 24 7q-7.1 0-12.05 4.95Q7 16.9 7 24q0 7.1 4.95 12.05Q16.9 41 24 41h10.7v3Zm0-13.7q2.65 0 4.5-1.825T30.35 24q0-2.7-1.85-4.55-1.85-1.85-4.5-1.85t-4.5 1.85Q17.65 21.3 17.65 24q0 2.65 1.85 4.475Q21.35 30.3 24 30.3Z"/>
            </svg>
            <a href="mailto:<?php echo $structure['contact']; ?>"><?php echo $structure['contact']; ?></a></p>
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