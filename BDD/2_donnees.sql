INSERT INTO `ROLES` (`nomRole`) VALUES
	('Administrateur'),
	('Structure');


INSERT INTO `UTILISATEURS` (`mail`, `motDePasse`, `nomRole`) VALUES
	('elmolghc@3il.fr', 'chaker', 'Administrateur'),
	('lefrancl@3il.fr', 'lisa', 'Administrateur'),
	('admin@leclub.fr', 'leclub', 'Structure'),
	('contact@mjc_bozouls.fr', 'mjc', 'Structure');


INSERT INTO `STRUCTURES` (`nomStructure`, `tel`, `siteInternet`, `adresse`, `contact`, `codeInsee`, `mail`) VALUES
	('Le Club', '0565428868', 'www.leclubrodez.fr', '37 Av. Tarayre', 'contact@leclub.fr', '12202', 'admin@leclub.fr'),
	('MJC de Rodez', '056567113', 'www.mjcrodez.fr', '1 Rue Saint-Cyrice', 'contact@mjcrodez.fr', '12202', NULL),
	('Structure de LISA', '0606060606', 'www.site.fr', '2 rue du maréchal ', 'lisa@contact.fr', '12202', NULL),
	('MJC Bozouls', '0565429668', 'www.mjc_bozouls.fr', '2, place de la mairie', 'contact@mjc_bozouls.fr', '12033', NULL),
	('Centre éducatif', '0565749668', 'centre_edu.fr', '3, avenue de Paraire', 'contact@centre_edu.fr', '12033', NULL),
	('MJC Onet-le-Château', '0565771600', 'www.mjc-onet.com', '26, Bd des Capucines', 'mjc@onet-le-chateau.fr', '12176', NULL);
	

INSERT INTO `RUBRIQUES` (`nomRubrique`) VALUES
	('Accompagnement '),
	('Diffusion'),
	('Enseignements'),
	('Éveil musical'),
	('Pratique d\'ensemble');

INSERT INTO `NIVEAUX` (`niveau`) VALUES
	('Confirmé'),
	('Débutant'),
	('Intermédiaire'),
	('Pro'),
	('Semi Pro'),
	('Tous');


INSERT INTO `INSTRUMENTS` (`nomInstrument`) VALUES
	('Accordeon'),
	('Flûte'),
	('Guitare'),
	('Harpe'),
	('Piano'),
	('Tambour'),
	('Violon');



INSERT INTO `offres` (`idOffre`, `nomOffre`, `description`, `photo1`, `photo2`, `photo3`, `nomRubrique`, `niveau`, `contact`, `nomInstrument`) VALUES
	('1', 'Cours de flute', 'Cours de flute traversière pour tous niveaux.', NULL, NULL, NULL, 'Enseignements', 'Tous', 'contact@mjcrodez.fr', 'Flûte'),
	('2', 'Cours de piano', 'Cours de piano traversière pour tous niveaux.', NULL, NULL, NULL, 'Enseignements', 'Débutant', 'contact@mjcrodez.fr', 'Piano'),
	('3', 'Diffusion', 'jsp ce que c\'est', NULL, NULL, NULL, 'Diffusion', 'Tous', 'lisa@contact.fr', NULL),
	('4', 'Éveil musical 1', 'Éveil musical 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada tempor tincidunt. Praesent quis ipsum magna. Sed venenatis augue et dolor sodales finibus. Nulla facilisis, felis sit amet porttitor commodo, ipsum lorem consectetur tellus, non commodo orci eros non ex. Donec a ligula euismod, congue sapien ut, venenatis risus. Nam tristique dictum enim. Sed suscipit, ex eu scelerisque accumsan, sem.', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Éveil musical', 'Tous', 'mjc@onet-le-chateau.fr', NULL),
	('5', 'Éveil musical 2', 'Éveil musical 2 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada tempor tincidunt. Praesent quis ipsum magna. Sed venenatis augue et dolor sodales finibus. Nulla facilisis, felis sit amet porttitor commodo, ipsum lorem consectetur tellus, non commodo orci eros non ex. Donec a ligula euismod, congue sapien ut, venenatis risus. Nam tristique dictum enim. Sed suscipit, ex eu scelerisque accumsan, sem.', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Éveil musical', 'Tous', 'lisa@contact.fr', NULL),
	('6', 'Éveil musical 3', 'Éveil musical 3 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada tempor tincidunt. Praesent quis ipsum magna. Sed venenatis augue et dolor sodales finibus. Nulla facilisis, felis sit amet porttitor commodo, ipsum lorem consectetur tellus, non commodo orci eros non ex. Donec a ligula euismod, congue sapien ut, venenatis risus. Nam tristique dictum enim. Sed suscipit, ex eu scelerisque accumsan, sem.', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Éveil musical', 'Tous', 'contact@mjc_bozouls.fr', NULL),
	('7', 'Éveil musical 4', 'Éveil musical 4 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada tempor tincidunt. Praesent quis ipsum magna. Sed venenatis augue et dolor sodales finibus. Nulla facilisis, felis sit amet porttitor commodo, ipsum lorem consectetur tellus, non commodo orci eros non ex. Donec a ligula euismod, congue sapien ut, venenatis risus. Nam tristique dictum enim. Sed suscipit, ex eu scelerisque accumsan, sem.', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Éveil musical', 'Tous', 'contact@centre_edu.fr', NULL),
	('8', 'Éveil musical 5', 'Éveil musical 5 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada tempor tincidunt. Praesent quis ipsum magna. Sed venenatis augue et dolor sodales finibus. Nulla facilisis, felis sit amet porttitor commodo, ipsum lorem consectetur tellus, non commodo orci eros non ex. Donec a ligula euismod, congue sapien ut, venenatis risus. Nam tristique dictum enim. Sed suscipit, ex eu scelerisque accumsan, sem.', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Éveil musical', 'Tous', 'mjc@onet-le-chateau.fr', NULL);


