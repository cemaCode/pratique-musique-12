
<h2>Rubriques</h2>
<section>

<?php 

require_once('dbController.php');

$db = new dbController();
$array_rubriques = $db->getRubriques();
foreach($array_rubriques as $rubrique)
{
        echo $rubrique['nomRubrique'] .'-  -  -  -  -';
}
echo "<br>";
$array_structures = $db->getStructureByRubrique("Diffusion");

foreach($array_structures as $structures){
foreach($structures as $cle => $valeur){
        echo "{$cle} => {$valeur} <br>";
        //print_r($array_stuctures);
}}

$db->checkLogin('elmolghc@3il.fr','chaker');

?>


</section>


</body>
</html>