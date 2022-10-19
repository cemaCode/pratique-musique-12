<?php
include('../head.php')
?>

<body>
    <?php
    include('../header.php');
    ?>

    <h2>Enseignements</h2>
    <section>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");

        $db = new dbController();
        if (!isset($_GET['nomInstrument'])) {
            $instruments = $db->getInstruments();
            echo "<h2><ul>";
            foreach ($instruments as $key =>   $value) {
                $nomInstrument = $value['nomInstrument'];
                $url  = $_SERVER['REQUEST_URI'] . "?nomInstrument=" . $nomInstrument;
                echo "<li><a href=" . $url . "  >" . $nomInstrument . "</a></li>";
            }
            echo "</ul></h2>";
        } else {
            $nomInstrument = $_GET['nomInstrument'];
            $structures = $db->getStructureByInstrument($nomInstrument);
            $GLOBALS['structures'] = $structures;
            echo "<h2>Voici les structures proposant l'instrument : {$nomInstrument}</h2>";
            include("../affichageStructures.php");

            // ICI ON POURRAIT AVOIR UNE PAGE PHP QUI PREND LA LISTE DES STRUCTURES PEU IMPORTE LA RUBRIQUE
            // CETTE PAGE POURRAIT ETRE UTILISEE POUR TOUTES LES RUBRIQUES AVEC UN STYLE EN CARDS
            // CF ARTSVIVANTS52.ORG/BASE-DE-DONNEES.HTML

        }

        ?>
    </section>

    <?php
    include('../footer.php');
    ?>
</body>

</html>