-- INSERT INTO `ROLES` (`nomRole`) VALUES
	-- ('Administrateur'),
	-- ('Structure');



-- INSERT INTO `UTILISATEURS` (`mail`, `motDePasse`, `nomRole`) VALUES
	-- ('elmolghc@3il.fr', 'chaker', 'Administrateur'),
	-- ('lefrancl@3il.fr', 'lisa', 'Administrateur');


-- INSERT INTO `CODEPOSTAL` (`codePostal`) VALUES
	-- ('12000'),
	-- ('12630'),
	-- ('12520'),
	-- ('12220'),
	-- ('12300'),
	-- ('12430'),
	-- ('12260'),
	-- ('12390'),
	-- ('12420'),
	-- ('12360'),
	-- ('12290'),
	-- ('12120'),
	-- ('12700'),
	-- ('12110'),
	-- ('12380'),
	-- ('12160'),
	-- ('12200'),
	-- ('12490'),
	-- ('12550'),
	-- ('12370'),
	-- ('12310'),
	-- ('12500'),
	-- ('12270'),
	-- ('12340'),
	-- ('12350'),
	-- ('12600'),
	-- ('12480'),
	-- ('12400'),
	-- ('12450'),
	-- ('12560'),
	-- ('12460'),
	-- ('12580'),
	-- ('12240'),
	-- ('12130'),
	-- ('12210'),
	-- ('12620'),
	-- ('12230'),
	-- ('12330'),
	-- ('12540'),
	-- ('12100'),
	-- ('12470'),
	-- ('12170'),
	-- ('12320'),
	-- ('12190'),
	-- ('12640'),
	-- ('12410'),
	-- ('12510'),
	-- ('12140'),
	-- ('12440'),
	-- ('12740'),
	-- ('12720'),
	-- ('12850'),
	-- ('12250'),
	-- ('12800'),
	-- ('12780'),
	-- ('12150');


-- INSERT INTO `COMMUNES` (`codeInsee`, `codePostal`, `nomCommune`) VALUES
	-- ('12202', '12000', 'Rodez'),
	-- ('12033', '12340', 'Bozouls');



-- INSERT INTO `STRUCTURES` (`nomStructure`, `tel`, `siteInternet`, `adresse`, `contact`, `codeInsee`) VALUES
	-- ('Le Club', '0565428868', 'leclubrodez.fr', '37 Av. Tarayre', 'contact@leclub.fr', '12202'),
	-- ('MJC de Rodez', '056567113', 'mjcrodez.fr', '1 Rue Saint-Cyrice', 'contac@mjcrodez.fr', '12202'),
	-- ('Structure de LISA', '0606060606', 'www.site.fr', '2 rue du maréchal ', 'lisa@contact.fr', '12202');

-- INSERT INTO `RUBRIQUES` (`nomRubrique`) VALUES
	-- ('Accompagnement '),
	-- ('Diffusion'),
	-- ('Enseignement'),
	-- ('Éveil musical'),
	-- ('Pratique d\'ensemble');

-- INSERT INTO `NIVEAUX` (`niveau`) VALUES
	-- ('Confirmé'),
	-- ('Débutant'),
	-- ('Intermédiaire'),
	-- ('Pro'),
	-- ('Semi Pro'),
	-- ('Tous');


-- INSERT INTO `INSTRUMENTS` (`nomInstrument`) VALUES
	-- ('Accordeon'),
	-- ('Flûte'),
	-- ('Guitare'),
	-- ('Harpe'),
	-- ('Piano'),
	-- ('Tambour'),
	-- ('Violon');


INSERT INTO `offres` (`idOffre`, `nomOffre`, `description`, `photo1`, `photo2`, `photo3`, `nomRubrique`, `niveau`, `contact`, `nomInstrument`) VALUES
	('1', 'Cours de flute', 'Cours de flute traversière pour tous niveaux.', NULL, NULL, NULL, 'Enseignement', 'Tous', 'contact@mjcrodez.fr', 'Flute'),
	('2', 'Cours de piano', 'Cours de piano traversière pour tous niveaux.', NULL, NULL, NULL, 'Enseignement', 'Débutant', 'contac@mjcrodez.fr', 'Piano'),
	('3', 'Diffusion', 'jsp ce que c\'est', NULL, NULL, NULL, 'Diffusion', NULL, 'lisa@contact.fr', NULL);

