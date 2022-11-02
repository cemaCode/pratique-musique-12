<!DOCTYPE html>
<html lang="fr">

<?php
include ('../head.php');
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
        $groupe = [];
        $initiale = '';


        // foreach pour initialiser le tableau à 2 dimensions
        foreach ($instruments as $instrument){
            $initiale = $instrument['nomInstrument'][0];
            $initiale = strtoupper($initiale);
            $groupe[$initiale]=[];
        }


        // foreach pour remplir le tableau à 2dim
        foreach ($instruments as $instrument){
            $initiale = $instrument['nomInstrument'][0];
            $initiale = strtoupper($initiale);
            array_push($groupe[$initiale],$instrument['nomInstrument']);
        }



        foreach ($groupe as $initiale => $instruments) {
            echo "<div class='container_by_letter'>";
            echo "<h3>" . $initiale. "</h3>";
            echo "<ul>";
            foreach ($instruments as $instrument){
                $url = $_SERVER['REQUEST_URI'] . "?nomInstrument=" . $instrument;
                echo "<li><a href=" . $url . "  >" . $instrument . "</a></li>";
            }
            echo "</ul>";
            echo "</div>";
        }

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