<?php
require_once('../head.php')
?>

<body>
<?php
require_once('../header.php');
?>

<h2>Eveil musical</h2>
<section>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");

    $db = new dbController();
    $GLOBALS['currentRubrique'] = 'Éveil';
    $stuctures = $db->getStructureByRubrique($GLOBALS['currentRubrique']);

    include ('../affichageStructures.php');

    ?>

</section>

<?php
require_once('../footer.php');
?>
</body>
</html>