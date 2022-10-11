<!-- <?php
include('../head.php')
?>
 -->
<body>
<!-- <?php
include('../header.php');
?> -->

<h2>Enseignements</h2>
<section>

<?php 

require_once('dbController.php');

$db = new dbController();
$array_instruments = $db->getInstruments() ; 

echo print_r(array_keys($array_instruments));
echo print_r($array_instruments['nomInstrument']);



?>
<form name="f_ajtInstrument" method="POST" >
Ajouter un instrument: <input type="text" placeholder="Nom instrument..." name="i_instrument" >
<input type="submit" name="submit" value="Ajouter">  
</form>
<?php
if(array_key_exists('i_instrument', $_POST)) {
        $db->addInstrument($_POST["i_instrument"]);
        // Gère la recharge de la page et evite de reexec l'ajout
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']); // Redirige vers la même page
         }
?>
</section>


</body>
</html>