<?php
include('../head.php')
?>

<body>
<?php
include('../header.php');
?>

<h2>Accompagnement</h2>
<section>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/pratique-musique-12/testing/dbController.php");
    $db = new dbController();
    
    $structures = $db->getStructureByRubrique('Accompagnement');

    $GLOBALS['structures'] = $stuctures;

    $GLOBALS['currentRubrique'] = 'Accompagnement';

    require_once ('../affichageStructures.php');
    ?>
</section>

<?php
include('../footer.php');
?>
</body>
</html>