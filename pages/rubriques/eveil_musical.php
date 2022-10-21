<?php
require_once('../head.php')
?>

<body>
<?php
require_once('../header.php');
?>

<h2>Éveil musical</h2>
<section>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");

    $db = new dbController();

    $GLOBALS['currentRubrique'] = 'Éveil musical';
    $stuctures = $db->getStructureByRubrique($GLOBALS['currentRubrique']);
    $GLOBALS['structures'] = $stuctures;

    include ('../affichageStructures.php');

    ?>

</section>

<?php
require_once('../footer.php');
?>
</body>
</html>