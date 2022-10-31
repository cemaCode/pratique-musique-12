<?php
include('head.php')
?>

<body>
    <?php
    include('header.php');
    ?>

    <h2>Structures</h2>
    <section>

        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");
        $db = new dbController();

        $structures = $db->getStructures();
        $GLOBALS['structures'] = $structures;

        foreach ($structures as $structure) {
        ?>

            <div class="structure">
                <div class="img_container">
                    <img class="img_offre" src="/pratique-musique-12/images/placeholder.png" alt="image structure">
                </div>
                <div class="content">
                    <h3><?php echo $structure['nomStructure']; ?></h3>
                    <p class="siteInternet"><?php echo $structure['siteInternet']; ?></p>
                    <p class="adresse"><?php echo $structure['adresse']; ?></p>
                    <p class="code_postal"><?php echo $db->getCodePostalFromInsee($structure['codeInsee']); ?></p>
                    <p class="ville"><?php echo $db->getCommuneFromInsee($structure['codeInsee']); ?></p>
                    <p class="tel"><?php echo $structure['tel']; ?></p>
                    <p class="contact"><?php echo $structure['contact']; ?></p>

                </div>
            </div>
        <?php } ?>
    </section>

    <?php
    include('footer.php');
    ?>
</body>

</html>