<?php
class dbController{
	
	private $_server = 'localhost'; // Nom serveur
	private	$_user = 'root'; // User MySQL 
	private	$_password = ''; // MdP MySQL
	private	$_database = 'pratique-musique-12'; // Nom base de données 
	private $_mysqli;


	// Constructeur 
	public function __construct(){ 
		//Connexion à la base de données 
		$this->_mysqli = new mysqli($this->_server,$this->_user,$this->_password,$this->_database);

		// Check connection
		if ($this->_mysqli -> connect_errno) {
				echo 'Erreur de connection /!\ : '.$this->_mysqli -> error;
				exit();
		}
	}

	// Ajouter un instrument dans la table 'Intruments"
	public function addInstrument($nomInstrument)
	{
		$req = "INSERT INTO `instruments` (`nomInstrument`) VALUES ('" . $nomInstrument ."')";
		if ($result = $this->_mysqli -> query($req)) {
			echo "Instrument: ". $nomInstrument ." ajouté avc succès." ;
		  } else {
			echo "Error: impossible d'ajotuer l'instrument";
		  }
	}

	public function getRubriques(){
	// Récupèrer une colonne de la table Rubriques
		$req = 'SELECT nomRubrique FROM rubriques';
		if ($result = $this->_mysqli -> query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);
		/* 	while ($row = $result -> fetch_assoc()) {
				echo $row['nomRubrique'].'<br/>';
			} */
			  $result -> free_result();
			}
			return $dump;

	}

	// Réupère tous les instruments en ordre alphabetique
	public function getInstruments(){
		$req = 'SELECT nomInstrument FROM instruments ORDER BY nomInstrument' ;
		if ($result = $this->_mysqli -> query($req)) {
			$dump  = $result->fetch_all(MYSQLI_ASSOC);
  			/* while ($row = $result -> fetch_assoc()) {
    			echo '<div>'.$row['nomInstrument'].'</div>';
			}
			echo "RESULT : " . print_r($dump); */ 
			$result -> free_result();
		}
		return $dump;
	}

	// Récupère 
	public function getStructures(){
		$req = 'SELECT * FROM structures';
		if ($result = $this->_mysqli -> query($req)) {
			/* 
  			while ($row = $result -> fetch_assoc()) {
    			echo '<div>'.$row[$colonne].'</div>';
  			} */
			  $dump = $result->fetch_all(MYSQLI_ASSOC);

			  $result -> free_result();
			}
			return $dump;
	}

	public function getStructureByRubrique($nomRubrique){
		$req = "SELECT * FROM structures AS S INNER JOIN appartenir AS A ON S.mail = A.mail INNER JOIN rubriques AS R ON R.nomRubrique = A.nomRubrique WHERE R.nomRubrique = '$nomRubrique';  ";
		if ($result = $this->_mysqli -> query($req)) {
			/* 
  			while ($row = $result -> fetch_assoc()) {
    			echo '<div>'.$row[$colonne].'</div>';
  			} */
			  $dump = $result->fetch_all(MYSQLI_ASSOC);

			  $result -> free_result();
			}
			return $dump;
	}

	public function __destruct(){
		$this->_mysqli->close();
	}
	
}
?>