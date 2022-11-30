<?php
require_once('../head.php')
?>

<body>
<?php
require_once('../header.php');
?>


<fieldset>
    <legend>Éveil musical</legend>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");

    $db = new dbController();

    $GLOBALS['currentRubrique'] = 'Éveil musical';
    $stuctures = $db->getStructureByRubrique($GLOBALS['currentRubrique']);
    $GLOBALS['structures'] = $stuctures;
    include ('../affichageStructures.php');

    ?>

</fieldset>

<?php
require_once('../footer.php');
?>
</body>
</html>