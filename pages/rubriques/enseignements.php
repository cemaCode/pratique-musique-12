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
require_once($_SERVER['DOCUMENT_ROOT']."/pratique-musique-12/testing/dbController.php");

$db = new dbController();

$instruments = $db->getInstruments();
echo "<h2><ul>";
foreach ($instruments as $key =>   $value) {
    echo "<li><a href=".$_SERVER['REQUEST_URI']."?nomInstrument=".$value['nomInstrument'].">".$value['nomInstrument'] ."</a></li>";
}
echo "</ul></h2>";


?>
</section>

<?php
include('../footer.php');
?>
</body>
</html>