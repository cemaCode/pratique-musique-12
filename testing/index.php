<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<title>Pratique-Musique-12</title>
	<link rel='stylesheet' type='text/css' href='style.css'/>
</head>
<body>
	<!-- include -->
	<?php
		require_once('dbController.php');
		$db = new dbController();
	?>
		<header>
			<h1>Pratique-Musique-12</h1>
		</header>
		<nav>
			<!-- Première partie menu -->
			<span id='first-menu-part'>
				<span>
					Éveil musical
				</span>
				<span id='enseignements'>
					<div>Enseignements</div>
					<div class = 'listeMenu'>
						<div>Guitare</div>
						<div>Banjo</div>
						<div>Accodéon</div>
						<div>Voix</div>
					</div>
				</span>
				<span>
					Pratique d'ensemble
				</span>
				<span>
					Accompagnement
				</span>
				<span>
					Diffusion
				</span>
			</span>
			<!-- Deuxieme partie menu -->
			<span id='second-menu-part'>
				<span>
					Structure
				</span>
				<span>
					Lieu
				</span>
			</span>
		</nav>


		<h2>MySQLi Classe</h2>
		<?php
			
			$db->getRubriques();
		?>
		<?php
			
			$db->getInstruments();
		?>
</body>
</html>