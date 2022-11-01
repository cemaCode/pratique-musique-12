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

	public function getOffres()
	{

		$req = "SELECT * FROM offres ;";
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);
			$dump = array_unique($dump, SORT_REGULAR);
			$result->free_result();
		}
		return $dump;
	}


	// Récupère un tableau d'offres par une rubrique 
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

	public function getOffresByUser($mail)
	{
		$req = "SELECT * FROM offres  WHERE contact = '" . $mail . "';  ";
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
		$req = "SELECT motDePasse from utilisateurs where mail='$mail'";
		if ($result = $this->_mysqli->query($req)) {
			if ($result->num_rows != 0) {
				$hash = $result->fetch_all()[0][0];
				$check_passwd = password_verify($passwd, $hash);
				if ($check_passwd) {
					$isLoginValid = true;
					$this->isAdmin($mail);
				} else {
					echo "<script>alert('Mot de passe incorrect.')</script>";
				}
			} else {
				echo "<script>alert('Adresse mail non reconnue. ')</script>";
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
	private function isMailUsed($mail)
	{
		$isMailUsed = false;
		$req = "SELECT * from utilisateurs where mail='$mail'";
		if ($result = $this->_mysqli->query($req)) {
			if ($result->num_rows != 0) {
				$isMailUsed = true;
			}
		}
		return $isMailUsed;
	}

	private function instrumentExists($nomInstrument)
	{
		$instrumentExists = false;
		$req = "SELECT * from instruments where nomInstrument='" . $nomInstrument . "'";
		if ($result = $this->_mysqli->query($req)) {
			if ($result->num_rows != 0) {
				$instrumentExists = true;
			}
		}
		return $instrumentExists;
	}

	public function searchOffres($niveau, $rubrique, $localisation, $motCle)
	{
		$rubrique = $this->cleanInput($rubrique);
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



	public function getCommunes()
	{
		$req = 'SELECT * FROM communes';
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);
			$result->free_result();
		}
		return $dump;
	}

	public function getUsers()
	{
		$req = "SELECT * FROM utilisateurs";
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);
			$result->free_result();
		}
		return $dump;
	}
	public function getStructUsers()
	{
		$req = "SELECT mail FROM utilisateurs WHERE nomRole='Structure';";
		if ($result = $this->_mysqli->query($req)) {
			$dump = $result->fetch_all(MYSQLI_ASSOC);
			$result->free_result();
		}
		return $dump;
	}

	/* _-_-_-_-_-_-_- FONCTIONS D'AJOUT _-_-_-_-_-_-_- */

	public function addUser($mail, $passwd, $role)
	{
		if (!$this->isMailUsed($mail)) {

			$passwd  = $this->cleanInput($passwd);
			$passwd =  password_hash($passwd, PASSWORD_DEFAULT);
			$req = "INSERT INTO `utilisateurs` (`mail`,`motDePasse`,`nomRole`) VALUES ('" . $mail . "','" . $passwd . "','" . $role . "')";
			if ($result = $this->_mysqli->query($req)) {
				echo "Utilisateur: " . $mail . " ajouté avc succès.";
			} else {
				echo "Error: impossible d'ajotuer l'utilisateur";
			}
		} else {
			echo "Error: impossible d'ajotuer l'utilisateur, cette adresse mail est déjà utilisée";
		}
	}

	// Ajouter un instrument dans la table 'Intruments"
	public function addInstrument($nomInstrument)
	{
		$succes = false;
		if (!$this->instrumentExists($nomInstrument)) {
			$req = "INSERT INTO `instruments` (`nomInstrument`) VALUES ('" . $nomInstrument . "')";
			if ($result = $this->_mysqli->query($req)) {
				echo "Instrument: " . $nomInstrument . " ajouté avc succès.";
				$succes = true;
			} else {
				echo "Error: impossible d'ajotuer l'instrument";
			}
		} else {
			echo "Error: impossible d'ajotuer l'instrument $nomInstrument, l'instrument existe déjà";
		}
		return $succes;
	}

	// Ajouter une structure dans la table 'Structures"
	public function addStructure($nomStructure, $contact, $tel, $website, $adresse, $codeInsee, $mail = NULL)
	{
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



	public function addOffre()
	{
		// TODO 
	}

	public function modifyOffre()
	{
		// TODO
	}

	public function deleteOffre($idOffre)
	{
		$exists = false;
		$req = "SELECT * from offres where idOffre ='$idOffre'";
		if ($result = $this->_mysqli->query($req)) {
			if ($result->num_rows != 0) {
				$exists = true;
			}
		}
		if ($exists) {
			$req =  "DELETE FROM offres WHERE `offres`.`idOffre` = '" . $idOffre . "' ";
			$result = $this->_mysqli->query($req);
		}
		return $exists;
	}

	public function deleteInstrument($instrument)
	{
		$req =  "DELETE FROM instruments WHERE nomInstrument = '" . $instrument . "' ";
		$result = $this->_mysqli->query($req);
		return $result;
	}

	public function deleteUser($mail)
	{
		$exists = false;
		$req = "SELECT * FROM utilisateurs WHERE mail ='$mail'	";
		if ($result = $this->_mysqli->query($req)) {
			if ($result->num_rows != 0) {
				$exists = true;
			} else {
				echo "Utilisateur $mail n'existe pas. \n";
			}
		}
		if ($exists) {
			$req =  "DELETE FROM utilisateurs WHERE mail = '" . $mail . "' ";
			$result = $this->_mysqli->query($req);
		}

		if ($_SESSION['login'] == $mail) {
			session_destroy();
		}

		return $exists;
	}

	public function deleteStructure($contact)
	{
		$this->cleanInput($contact);
		$req =  "DELETE FROM structures WHERE contact = '" . $contact . "' ";
		$result = $this->_mysqli->query($req);

		return $result;
	}

	public function changeFrontPageText($text)
	{
		$chemin_fichier = $_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/texte_accueil";
		echo $text;
		file_put_contents($chemin_fichier, $text); //Mettre à jout chemin du fichier
	}

	public function __destruct()
	{
		$this->_mysqli->close();
	}
}
