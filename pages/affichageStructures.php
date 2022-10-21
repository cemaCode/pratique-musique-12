<?php
    if (isset($GLOBALS['structures'])) {
        $stuctures = $GLOBALS['structures'];
        foreach ($stuctures as $structure) {
            ?>
            <div class="structure">
                <h3><?php echo $structure['nomStructure']; ?></h3>
                <p class="contact"><?php echo $structure['contact']; ?></p>
                <p class="tel"><?php echo $structure['tel']; ?></p>
                <p class="siteInternet"><?php echo $structure['siteInternet']; ?></p>
                <p class="adresse"><?php echo $structure['adresse']; ?></p>
                <a id="voir-offres" href="offres.php?strucutre=<?php echo $structure['nomStructure']; ?>"> Voir Offres de la
                    structure </a>
                <!--        onclick : afficher adresse structure-->
            </div>
            <?php
        }
    } else {
        header('Location: /pratique-musique-12/index.php');
        exit;
    }
?>