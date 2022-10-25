<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
class dbController
{

	private $_server = 'localhost'; // Nom serveur
	private	$_user = 'root'; // User MySQL 
	private	$_password = ''; // MdP MySQL
	private	$_database = 'pratique-musique-12'; // Nom base de données 
	private $_mysqli;


	// Constructeur 
	public function __construct()
	{
		//Connexion à la base de données 
		$this->_mysqli = new mysqli($this->_server, $this->_user, $this->_password, $this->_database);

		// Check connection
		if ($this->_mysqli->connect_errno) {
			echo 'Erreur de connection /!\ : ' . $this->_mysqli->error;
			exit();
		}
	}

	// Ajouter un instrument dans la table 'Intruments"
	public function addInstrument($nomInstrument)
	{
		$req = "INSERT INTO `instruments` (`nomInstrument`) VALUES ('" . $nomInstrument . "')";
		if ($result = $this->_mysqli->query($req)) {
			echo "Instrument: " . $nomInstrument . " ajouté avc succès.";
		} else {
			echo "Error: impossible d'ajotuer l'instrument";
		}
	}

	// Récupèrer une colonne de la table Rubriques
	public function getRubriques()
	{
		$req = 'SELECT nomRubrique FROM rubriques';
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);
			$result->free_result();
		}
		return $dump;
	}

	// Réupère tous les instruments en ordre alphabetique
	public function getInstruments()
	{
		$req = 'SELECT nomInstrument FROM instruments ORDER BY nomInstrument';
		if ($result = $this->_mysqli->query($req)) {
			$dump  = $result->fetch_all(MYSQLI_ASSOC);
			$result->free_result();
		}
		return $dump;
	}

	// Récupère tableau avec les structures (et leurs données) 
	public function getStructures()
	{
		$req = 'SELECT * FROM structures';
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);

			$result->free_result();
		}
		return $dump;
	}


	// Récupère un tableau de Structure par une Rubrique ( sans doublons )

	public function getStructureByRubrique($nomRubrique)
	{
		$req = "SELECT nomStructure, structures.contact, tel, siteInternet, adresse, codeInsee FROM structures INNER JOIN offres ON structures.contact = offres.contact INNER JOIN rubriques ON rubriques.nomRubrique = offres.nomRubrique WHERE rubriques.nomRubrique = '{$nomRubrique}';  ";
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);
			$dump = array_unique($dump, SORT_REGULAR);
			$result->free_result();
		}
		return $dump;
	}


	// Récupère un tableau de Structures par un Instrument ( sans doublons )

	public function getStructureByInstrument($nomInstrument)
	{
		$req = "SELECT * FROM structures  INNER JOIN offres  ON structures.contact = offres.contact INNER JOIN instruments ON instruments.nomInstrument = offres.nomInstrument WHERE instruments.nomInstrument = '{$nomInstrument}';  ";
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);

			$dump = array_unique($dump, SORT_REGULAR);

			$result->free_result();
		}
		return $dump;
	}

	// Verfie si l'utilisateur exite ( BOOL )
	private function existsUser($user_mail)
	{
		$exists = false;
		$req = "SELECT mail from utilisateurs where mail='$user_mail'";
		if ($result = $this->_mysqli->query($req)) {
			if ($result->num_rows != 0) {
				$exists = true;
			}
		}
		return $exists;
	}


	//Methode pour verifier le login ( retourne un BOOL )
	public function checkLogin($mail, $passwd)
	{
		$isLoginValid = false;
		$req = "SELECT * from utilisateurs where mail='$mail' and motDePasse='$passwd'";
		if ($result = $this->_mysqli->query($req)) {
			if ($result->num_rows != 0) {
				$isLoginValid = true;
				$this->isAdmin($mail);
				// echo "<script>alert('Connexion reussie. ')</script>";
			} else {
				$user_check = $this->existsUser($mail);
				if ($user_check == false) {
					echo "<script>alert('Adresse mail non reconnue. ')</script>";
				} else {
					echo "<script>alert('Mot de passe incorrecte.')</script>";
				}
			}
		}
		echo ($isLoginValid);
		return $isLoginValid;
	}

	public function cleanInput($input)
	{
		return ($this->_mysqli->real_escape_string($input));
	}


	// Methode pour verifier si le user connecté est admin ou pas 
	private function isAdmin($mail)
	{
		$req = "SELECT * from utilisateurs where mail='$mail' and nomRole='Administrateur'";
		if ($result = $this->_mysqli->query($req)) {
			if ($result->num_rows != 0) {
				$isAdmin = true;
				$_SESSION['admin'] = true;
			}
		}
	}

	// REcupère un tableau d'offres par une rubrique 

	public function getOffresByRubrique($nomRubrique)
	{
		$req = "SELECT * FROM offres  WHERE nomRubrique = '{$nomRubrique}';  ";
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);

			$dump = array_unique($dump, SORT_REGULAR);

			$result->free_result();
		}
		return $dump;
	}


	public function __destruct()
	{
		$this->_mysqli->close();
	}
}
