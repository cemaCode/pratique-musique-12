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
    $stuctures = $db->getStructureByRubrique('Eveil ');
    $GLOBALS['structures'] = $stuctures;

    include ('../affichageStructures.php');

    ?>

<!---->
<!--    <div class="offre">-->
<!--        <img class="img_offre" src="img1" alt="#">-->
<!--        <img class="img_offre" src="img2" alt="#">-->
<!--        <img class="img_offre" src="img3" alt="#">-->
<!--        <h3>Nom offre</h3>-->
<!--        <p class="instrument">Nom instrument</p>-->
<!--        <p class="description_offre">description_offre</p>-->
<!--        <p class="niveau">Niveau</p>-->
<!--        <p class="structure">Structure</p>-->
<!--        onclick : afficher adresse structure-->
<!--    </div>-->



</section>

<?php
require_once('../footer.php');
?>
</body>
</html>