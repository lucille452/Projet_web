-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mai 2024 à 10:15
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `adresse_mail` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `adresse_mail`, `date_naissance`, `mot_de_passe`) VALUES
(1, 'admin', 'admin', 'admin@gamenexus.com', '2004-05-21', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(255) NOT NULL,
  `id_jeu` int(255) NOT NULL,
  `id_membre` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_membre` int(255) NOT NULL,
  `id_jeu` int(255) NOT NULL,
  `note` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `description`, `id_membre`, `id_jeu`, `note`) VALUES
(2, 'test2', 1, 1, 2),
(3, 'trop bien', 1, 2, 4),
(4, 'Dommage qu\'on ne puisse pas noter plus !', 1, 3, 5),
(5, 'test', 1, 1, 3),
(6, 'c\'ets cool', 4, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `quantité` int(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `code_activation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id`, `nom`, `description`, `quantité`, `prix`, `code_activation`) VALUES
(1, 'The Legend of Zelda: Breath of the Wild', '\"The Legend of Zelda: Breath of the Wild\" est un jeu vidéo d\'action-aventure développé et publié par Nintendo. Sorti en 2017 sur la console Nintendo Switch et la Wii U, il offre aux joueurs une expérience immersive dans un vaste monde ouvert. Dans ce jeu, les joueurs contrôlent Link, le protagoniste, alors qu\'il explore le royaume de Hyrule après un long sommeil. Le jeu se distingue par sa liberté d\'exploration, ses mécaniques de jeu innovantes, telles que la grimpe, la cuisine et la manipulation des éléments de l\'environnement, ainsi que ses énigmes et ses combats stimulants. \"Breath of the Wild\" est acclamé par la critique pour son design novateur et sa beauté visuelle, et il est largement considéré comme l\'un des meilleurs jeux de tous les temps.', 7, 51, '661755'),
(2, 'Red Dead Redemption 2', '\"Red Dead Redemption 2\" est un jeu vidéo d\'action-aventure développé et édité par Rockstar Games. Sorti en 2018 sur PlayStation 4, Xbox One et PC, il plonge les joueurs dans un monde ouvert immersif de l\'Ouest américain à la fin du XIXe siècle. Vous incarnez Arthur Morgan, un hors-la-loi membre du gang de Dutch van der Linde, et vous explorez des paysages vastes et variés tout en vivant une histoire intense mêlant trahison, loyauté et survie. Le jeu est salué pour son attention aux détails, sa narration captivante et son monde vivant, en faisant l\'un des jeux les plus acclamés de ces dernières années.', 19, 30, '869677'),
(3, 'Cyberpunk 2077', '\"Cyberpunk 2077\" est un jeu vidéo d\'action-RPG développé et publié par CD Projekt. Sorti en 2020, le jeu se déroule dans un futur dystopique où les joueurs incarnent V, un mercenaire à Night City, une mégalopole obsédée par le pouvoir, la technologie et la violence. Le jeu offre une grande liberté d\'exploration, des quêtes riches en choix moraux et un monde ouvert riche en détails. Malgré des attentes élevées, le jeu a été critiqué pour ses nombreux bugs et problèmes de performance lors de son lancement, mais il a depuis bénéficié de correctifs et de mises à jour.', 11, 61, '193962'),
(4, 'Minecraft', '\"Minecraft\" est un jeu de construction et d\'aventure emblématique développé par Mojang Studios. Sorti en 2011, il permet aux joueurs d\'explorer et de créer des mondes entièrement constitués de blocs dans un environnement en 3D généré de manière procédurale. Que ce soit en mode solo ou multijoueur, les joueurs peuvent exploiter des ressources, construire des structures, fabriquer des outils et affronter des créatures dans un monde infini. Son gameplay sandbox sans limites et sa communauté active en ont fait un phénomène mondial, où l\'imagination est la seule limite.', 17, 20, '632277'),
(5, 'Fortnite', '\"Fortnite\" est un jeu vidéo de type \"battle royale\" développé et publié par Epic Games. Lancé en 2017, il met en scène jusqu\'à 100 joueurs parachutés sur une île où ils s\'affrontent pour être le dernier survivant. Les joueurs peuvent collecter des armes, construire des structures et se défendre contre les autres participants, tout en évitant une tempête mortelle qui rétrécit progressivement la carte de jeu. Le jeu est également connu pour son mode \"Save the World\", un mode coopératif où les joueurs travaillent ensemble pour défendre des objets contre des vagues de monstres. \"Fortnite\" est devenu un phénomène mondial grâce à sa jouabilité addictive, ses mises à jour fréquentes et son style visuel distinctif.', 4, 15, '497249'),
(6, 'Call of Duty: Warzone', '\"Call of Duty: Warzone\" est un jeu vidéo de type \"battle royale\" développé par Infinity Ward et publié par Activision. Lancé en 2020 en tant que mode de jeu autonome dans le cadre du jeu \"Call of Duty: Modern Warfare\", il offre une expérience de jeu en ligne compétitive où jusqu\'à 150 joueurs s\'affrontent sur une carte massive pour être le dernier survivant. Les joueurs peuvent choisir parmi une variété de personnages et de classes, collecter des armes et des équipements, et coopérer en équipe pour obtenir la victoire. \"Warzone\" est également connu pour son mode \"Plunder\", où l\'objectif est de collecter le plus d\'argent possible en accomplissant des missions et en éliminant des ennemis.', 13, 20, '535733'),
(7, 'Animal Crossing: New Horizons', '\"Animal Crossing: New Horizons\" est un jeu vidéo de simulation de vie développé et édité par Nintendo. Sorti en 2020 sur la Nintendo Switch, il transporte les joueurs sur une île déserte où ils peuvent créer leur propre paradis tropical. En tant que maire virtuel, les joueurs peuvent personnaliser leur maison, aménager leur île, pêcher, attraper des insectes, cultiver des fruits et interagir avec des animaux anthropomorphes adorables qui peuplent l\'île. Le jeu se déroule en temps réel, avec des événements saisonniers et des mises à jour régulières, offrant ainsi une expérience relaxante et immersive pour les joueurs de tous âges.', 17, 42, '843758'),
(8, 'Grand Theft Auto V', '\"Grand Theft Auto V\" est un jeu vidéo d\'action-aventure en monde ouvert développé par Rockstar North et édité par Rockstar Games. Sorti en 2013 sur PlayStation 3 et Xbox 360, puis porté sur PlayStation 4, Xbox One et PC, le jeu se déroule dans la ville fictive de Los Santos, basée sur Los Angeles. Les joueurs suivent l\'histoire de trois criminels : Michael, Trevor et Franklin, alors qu\'ils planifient et exécutent une série de braquages audacieux. Le jeu offre une grande liberté d\'exploration, des missions variées, un monde ouvert dynamique et un mode multijoueur en ligne, \"GTA Online\", où les joueurs peuvent s\'engager dans des activités variées et collaborer avec d\'autres joueurs.', 16, 11, '901692'),
(9, 'Among Us', '\"Among Us\" est un jeu vidéo multijoueur en ligne développé par InnerSloth. Sorti en 2018, il met les joueurs dans la peau d\'équipages spatiaux qui doivent accomplir des tâches à bord de leur vaisseau, tout en essayant de démasquer les imposteurs parmi eux. Les imposteurs tentent de saboter les tâches et d\'éliminer les membres de l\'équipage sans être découverts. Les joueurs doivent discuter, argumenter et voter pour expulser les suspects. Le jeu est connu pour ses interactions sociales intenses, sa tension palpable et son gameplay addictif, en faisant un favori des streamers et des joueurs du monde entier.', 17, 5, '907385'),
(10, 'Overwatch 2', '\"Overwatch 2\" est un jeu de tir multijoueur en équipe développé et édité par Blizzard Entertainment, faisant suite au populaire \"Overwatch\". Prévu pour une sortie à venir, le jeu promet de continuer l\'héritage de son prédécesseur en offrant des affrontements dynamiques entre héros dans un univers futuriste. \"Overwatch 2\" introduira de nouveaux héros, cartes et modes de jeu, ainsi qu\'une campagne PvE coopérative pour les joueurs souhaitant explorer l\'histoire et les personnages de cet univers. Avec des graphismes améliorés et de nouvelles fonctionnalités, \"Overwatch 2\" vise à offrir une expérience encore plus immersive et palpitante que son prédécesseur.', 22, 16, '186963'),
(11, 'League of Legends', '\"League of Legends\" est un jeu vidéo de type MOBA (Arène de bataille en ligne multijoueur) développé et édité par Riot Games. Sorti en 2009, il oppose deux équipes de champions uniques dans des affrontements stratégiques pour détruire la base ennemie. Les joueurs choisissent parmi une grande variété de champions, chacun avec ses propres compétences et rôles, et coopèrent avec leur équipe pour conquérir des objectifs et vaincre leurs adversaires. \"League of Legends\" est l\'un des jeux les plus populaires au monde, avec une scène compétitive active, des mises à jour régulières et une communauté passionnée de millions de joueurs.', 16, 20, '459660'),
(12, 'Valorant', ' \"Valorant\" est un jeu vidéo de tir tactique en ligne développé et édité par Riot Games. Lancé en 2020, il oppose deux équipes de cinq joueurs dans des affrontements compétitifs où l\'objectif est de planter ou désamorcer un engin explosif. Les joueurs choisissent parmi un ensemble de personnages, appelés \"agents\", chacun ayant des compétences uniques qui peuvent influencer le cours de la partie. \"Valorant\" se distingue par son gameplay stratégique, ses mécaniques de tir précises et son système de vision limitée, qui met l\'accent sur la communication et la coordination entre les membres de l\'équipe.', 14, 10, '637073'),
(13, 'Assassin\'s Creed Valhalla', '\"Assassin\'s Creed Valhalla\" est un jeu vidéo d\'action-aventure développé et édité par Ubisoft. Sorti en 2020, il transporte les joueurs dans l\'ère des Vikings, où ils incarnent Eivor, un guerrier viking, dans sa quête pour établir un nouveau foyer en Angleterre. Le jeu offre un monde ouvert vaste et dynamique, des combats intenses, une exploration épique et une histoire riche en intrigue. Les joueurs peuvent personnaliser leur expérience de jeu en prenant des décisions qui auront un impact sur le monde qui les entoure. \"Assassin\'s Creed Valhalla\" est acclamé pour ses visuels magnifiques, son gameplay immersif et son immersion dans la culture viking, en faisant l\'un des meilleurs jeux de la franchise.', 23, 56, '605972'),
(14, 'Skyrim', '\"Skyrim\" est un jeu vidéo de rôle en monde ouvert développé par Bethesda Game Studios et publié par Bethesda Softworks. Sorti en 2011, il se déroule dans la province de Skyrim, un territoire nordique de l\'univers de fantasy de The Elder Scrolls. Les joueurs incarnent le Dovahkiin, un héros prophétique capable de maîtriser le pouvoir des dragons, et partent à l\'aventure dans un vaste monde rempli de quêtes, de donjons, de créatures fantastiques et de paysages magnifiques. Le jeu offre une liberté totale d\'exploration, de personnalisation de personnage et de développement de compétences, ainsi qu\'une histoire principale épique et des quêtes secondaires riches en détails.', 14, 38, '190466'),
(15, 'Doom Eternal', ' \"Doom Eternal\" est un jeu de tir à la première personne développé par id Software et édité par Bethesda Softworks. Sorti en 2020, il est la suite du célèbre jeu \"Doom\" de 2016. Les joueurs reprennent le rôle du Doom Slayer, un guerrier implacable chargé de combattre les forces démoniaques de l\'enfer qui envahissent la Terre. Le jeu offre un gameplay frénétique et intense, mettant l\'accent sur le combat rapide, la mobilité et la stratégie. Les joueurs affrontent une variété d\'ennemis démoniaques à travers une campagne épique, qui les emmène dans des environnements variés et exotiques, allant de bases humaines délabrées à des royaumes infernaux chaotiques.', 26, 13, '600842'),
(38, 'Rocket League', 'un jeu de voiture', 15, 21, '');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(255) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `adresse_mail` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `solde` int(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `adresse_mail`, `date_naissance`, `solde`, `mot_de_passe`) VALUES
(1, 'test4', 'test', 'sonexa5629@dpsols.com', '2024-04-01', 9, '123'),
(2, 'Marmande', 'Mélanie', 'mhcenac@gmail.com', '2004-05-09', 0, '1234'),
(3, 'Fauré', 'Léo', 'comparmesan@gmail.com', '2005-12-03', 20, '123');

-- --------------------------------------------------------

--
-- Structure de la table `tableau_de_bord`
--

CREATE TABLE `tableau_de_bord` (
  `id` int(255) NOT NULL,
  `ventes_totales` int(255) NOT NULL,
  `revenu_totaux` int(255) NOT NULL,
  `revenus_7jours` int(255) NOT NULL,
  `ventes_jour1` int(255) NOT NULL,
  `ventes_jour2` int(255) NOT NULL,
  `ventes_jour3` int(255) NOT NULL,
  `ventes_jour4` int(255) NOT NULL,
  `ventes_jour5` int(255) NOT NULL,
  `ventes_jour6` int(255) NOT NULL,
  `ventes_jour7` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tableau_de_bord`
--

INSERT INTO `tableau_de_bord` (`id`, `ventes_totales`, `revenu_totaux`, `revenus_7jours`, `ventes_jour1`, `ventes_jour2`, `ventes_jour3`, `ventes_jour4`, `ventes_jour5`, `ventes_jour6`, `ventes_jour7`) VALUES
(1, 36, 1622, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tableau_de_bord`
--
ALTER TABLE `tableau_de_bord`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tableau_de_bord`
--
ALTER TABLE `tableau_de_bord`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
