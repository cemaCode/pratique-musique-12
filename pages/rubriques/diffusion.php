<?php
require_once('../head.php')
?>

<body>
<?php
require_once('../header.php');
?>

<h2>Diffusion</h2>
<section>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT']."/pratique-musique-12/testing/dbController.php");
    $db = new dbController();
    
    $structures = $db->getStructureByRubrique('Diffusion');
    $GLOBALS['structures'] = $structures;
    $GLOBALS['currentRubrique'] = 'Diffusion';

    include ('../affichageStructures.php');
    ?>

</section>

<?php
require_once('../footer.php');
?>
</body>
</html>