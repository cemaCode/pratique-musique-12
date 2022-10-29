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


	public function searchOffres($niveau, $rubrique, $localisation, $motCle)
	{

		$reqBase = "SELECT * FROM offres  WHERE nomRubrique = '$rubrique' AND niveau = '$niveau'  ";
		if (isset($motCle)) {
			$reqBase = $reqBase . "AND nomOffre LIKE '%{$motCle}%' AND description LIKE '%{$motCle}%' ;";
		}
		if ($result = $this->_mysqli->query($reqBase)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);

			$dump = array_unique($dump, SORT_REGULAR);

			$result->free_result();
		}
		return $dump;
	}

	public function communeToInsee($codePostal, $commune)
	{
		$codeInsee = "99999";
		$req = "SELECT codeInsee FROM communes WHERE codepostal='" . $codePostal . "' and nomCommune='" . $commune . "';";
		if ($result = $this->_mysqli->query($req)) {
			$codeInsee = $result->fetch_row();
			$result->free_result();
		}
		return $codeInsee[0];
	}


	public function getCodePostalFromInsee($codeInsee)
	{
		$codePostal = "99999";
		$req = "SELECT codepostal FROM communes WHERE codeInsee='" . $codeInsee . "';";
		if ($result = $this->_mysqli->query($req)) {
			$codePostal = $result->fetch_row();
			$result->free_result();
		}
		return $codePostal[0];
	}


	public function getCommuneFromInsee($codeInsee)
	{
		$commune = "XXXXXX";
		$req = "SELECT nomCommune FROM communes WHERE codeInsee='" . $codeInsee . "';";
		if ($result = $this->_mysqli->query($req)) {
			$commune = $result->fetch_row();
			$result->free_result();
		}
		return $commune[0];
	}

	public function addStructure($nomStructure, $contact, $tel, $website, $adresse, $codePostal, $nomCommune, $mail = NULL)
	{
		$codeInsee = $this->communeToInsee($codePostal, $nomCommune);
		// TODO : Variable cleaning and verification of inputs 
		$req = "INSERT INTO `STRUCTURES` (`nomStructure`, `tel`, `siteInternet`, `adresse`, `contact`, `codeInsee`,`mail`)";
		$req_values = " VALUES ('" . $nomStructure . "','" . $tel . "','" . $website . "','" . $adresse . "','" . $contact . "','" . $codeInsee . "',";
		$null_mail = $mail == null ? "NULL" : "'" . $mail . "'";
		$req_values  = $req_values . $null_mail . ");";
		$req = $req . $req_values;
		if ($result = $this->_mysqli->query($req)) {
			echo "Structure: " . $nomStructure . " ajouté avc succès.";
		} else {
			echo "Error: impossible d'ajotuer la structure";
		}
	}


	public function getCommunes(){
		$req = 'SELECT nomCommune,codePostal FROM communes';
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);
			$result->free_result();
		}
		return $dump;
	}

	public function getStructUsers(){
		$req = "SELECT mail FROM utilisateurs WHERE nomRole='Structure';";
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);
			$result->free_result();
		}
		return $dump;
	}

	public function __destruct()
	{
		$this->_mysqli->close();
	}
}
