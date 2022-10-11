<?php

session_start();

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
			$result -> free_result();
		}
		return $dump;
	}

	// Récupère tableau avec les structures (et leurs données) 
	public function getStructures(){
		$req = 'SELECT * FROM structures';
		if ($result = $this->_mysqli -> query($req)) {
			  $dump = $result->fetch_all(MYSQLI_ASSOC);

			  $result -> free_result();
			}
			return $dump;
	}

	// Récupère un tableau de Structure par une Rubrique
	public function getStructureByRubrique($nomRubrique){
		$req = "SELECT * FROM structures AS S INNER JOIN appartenir AS A ON S.mail = A.mail INNER JOIN rubriques AS R ON R.nomRubrique = A.nomRubrique WHERE R.nomRubrique = '$nomRubrique';  ";
		if ($result = $this->_mysqli -> query($req)) {
			  $dump = $result->fetch_all(MYSQLI_ASSOC);

			  $result -> free_result();
			}
			return $dump;
	}


	// Verfie si l'utilisateur exite ( BOOL )
	private function existsUser($user_mail){
		$exists = false;
		$req = "SELECT mail from utilisateurs where mail='$user_mail'";
		if ($result = $this->_mysqli -> query($req)) {
			if( $result->num_rows != 0 ){
				$exists = true;
			}}
		return $exists;
	}
	

	//Methode pour verifier le login ( retourne un BOOL )
	public function checkLogin($mail, $passwd)
	{
		$isLoginValid = false;
		$req = "SELECT * from utilisateurs where mail='$mail' and motDePasse='$passwd'";
		if ($result = $this->_mysqli -> query($req)) {
			if( $result->num_rows != 0 ){
				$isLoginValid = true;
				// echo "<script>alert('Connexion reussie. ')</script>";
			}else{
				$user_check = $this->existsUser($mail);
				if($user_check == false){
					echo "<script>alert('Adresse mail non reconnue. ')</script>";
				}
				else{
					echo "<script>alert('Mot de passe incorrecte.')</script>";
				}
			}
		}
		echo ($isLoginValid);
		return $isLoginValid;
	}

	public function cleanInput($input){
		return ($this->_mysqli ->real_escape_string($input));
	}


	public function __destruct(){
		$this->_mysqli->close();
	}
	
}
?>