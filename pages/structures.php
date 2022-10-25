<?php
    include('head.php')
?>

<body>
    <?php
    include('header.php');
    ?>

    <h2>Structures</h2>
    <section>

<?php 
 require_once($_SERVER['DOCUMENT_ROOT']."/pratique-musique-12/testing/dbController.php");
 $db = new dbController();
 
 $structures = $db->getStructures();
 $GLOBALS['structures'] = $structures;
 // TODO: gerer les boutons affichage des offres 
 include ('affichageStructures.php'); 
 ?>

    </section>

    <?php
    include('footer.php');
    ?>
</body>
</html>