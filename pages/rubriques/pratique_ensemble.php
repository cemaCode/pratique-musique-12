<?php
include('../head.php')
?>

<body>
<?php
include('../header.php');
?>

<h2>Pratique d'ensemble</h2>
<section>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/pratique-musique-12/testing/dbController.php");
    $db = new dbController();
    
    $structures = $db->getStructureByRubrique($db->cleanInput("Pratique d'ensemble"));
    $GLOBALS['structures'] = $stuctures;
    $GLOBALS['currentRubrique'] = $db->cleanInput("Pratique d'ensemble");

    include ('../affichageStructures.php');
    ?>
</section>

<?php
include('../footer.php');
?>
</body>
</html>