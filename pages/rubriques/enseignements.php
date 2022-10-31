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
        echo "<ul>";
        foreach ($instruments as $key => $value) {
            $nomInstrument = $value['nomInstrument'];
            $url = $_SERVER['REQUEST_URI'] . "?nomInstrument=" . $nomInstrument;
            echo "<li><a href=" . $url . "  >" . $nomInstrument . "</a></li>";
        }
        echo "</ul>";
    } else {
        $nomInstrument = $_GET['nomInstrument'];
        $structures = $db->getStructureByInstrument($nomInstrument);
        $GLOBALS['currentRubrique'] = "Enseignements";
        $GLOBALS['structures'] = $structures;
        echo "<h2>Voici les structures proposant l'instrument : {$nomInstrument}</h2>";
        include("../affichageStructures.php");
    }

    ?>
</section>

<?php
include('../footer.php');
?>
</body>

</html>