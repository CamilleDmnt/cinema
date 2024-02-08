-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 07 fév. 2024 à 16:59
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created`, `modified`) VALUES
(1, 'Fantastique', '2024-02-02 11:55:19', '2024-02-02 11:55:19'),
(2, 'Aventure', '2024-02-02 11:55:19', '2024-02-02 11:55:19');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `duration` time NOT NULL,
  `release_date` datetime NOT NULL,
  `director` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `casting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `synopsis` text NOT NULL,
  `notePress` float NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `slug`, `duration`, `release_date`, `director`, `casting`, `synopsis`, `notePress`, `photo`, `created`, `modified`) VALUES
(1, 'Cruella', 'cruella', '01:55:00', '2021-06-23 00:00:00', ' Craig Gillespie', ' Emma Stone, Emma Thompson, Joel Fry', 'Londres, années 70, en plein mouvement punk rock. Escroc pleine de talent, Estella est résolue à se faire un nom dans le milieu de la mode. Elle se lie d’amitié avec deux jeunes vauriens qui apprécient ses compétences d’arnaqueuse et mène avec eux une existence criminelle dans les rues de Londres.', 6, '6e14fe14f4bfaca06950502e8a74fb40.jpg', NULL, NULL),
(2, 'Donjons & Dragons : L\'Honneur des voleurs', 'cars', '02:14:00', '2023-04-12 00:00:00', ' Jonathan Goldstein', ' Chris Pine, Michelle Rodriguez, Regé-Jean Page', 'Un voleur beau gosse et une bande d\'aventuriers improbables entreprennent un casse épique pour récupérer une relique perdue. Les choses tournent mal lorsqu\'ils s\'attirent les foudres des mauvaises personnes.\r\n\r\nDonjons & Dragons : L\'honneur des voleurs transpose sur grand écran l\'univers riche et l\'esprit ludique du légendaire jeu de rôle à travers une aventure hilarante et pleine d\'action.', 8, 'a1f8880560ad0520ef762965675d6f1a.jpg', NULL, NULL),
(3, 'Les Animaux fantastiques', 'les-animaux-fantastiques', '02:12:00', '2016-11-16 00:00:00', ' David Yates', ' Eddie Redmayne, Katherine Waterston, Dan Fogler', 'New York, 1926. Le monde des sorciers est en grand danger. Une force mystérieuse sème le chaos dans les rues de la ville : la communauté des sorciers risque désormais d\'être à la merci des Fidèles de Salem, groupuscule fanatique des Non-Maj’ (version américaine du \"Moldu\") déterminé à les anéantir. Quant au redoutable sorcier Gellert Grindelwald, après avoir fait des ravages en Europe, il a disparu… et demeure introuvable. Ignorant tout de ce conflit qui couve, Norbert Dragonneau débarque à New York au terme d\'un périple à travers le monde : il a répertorié un bestiaire extraordinaire de créatures fantastiques dont certaines sont dissimulées dans les recoins magiques de sa sacoche en cuir – en apparence – banale. Mais quand Jacob Kowalski, Non-Maj’ qui ne se doute de rien, libère accidentellement quelques créatures dans les rues de la ville, la catastrophe est imminente. Il s\'agit d\'une violation manifeste du Code International du Secret Magique dont se saisit l\'ancienne Auror Tina Goldstein pour récupérer son poste d\'enquêtrice. Et la situation s\'aggrave encore lorsque Percival Graves, énigmatique directeur de la Sécurité du MACUSA (Congrès Magique des États-Unis d\'Amérique), se met à soupçonner Norbert… et Tina. Norbert, Tina et sa sœur Queenie, accompagnés de leur nouvel ami Non-Maj’ Jacob, unissent leurs forces pour retrouver les créatures disséminées dans la nature avant qu\'il ne leur arrive malheur. Mais nos quatre héros involontaires, dorénavant considérés comme fugitifs, doivent surmonter des obstacles bien plus importants qu’ils n’ont jamais imaginé. Car ils s\'apprêtent à affronter des forces des ténèbres qui risquent bien de déclencher une guerre entre les Non-Maj’ et le monde des sorciers.', 3, '3ee60f6b4ec7abda77a10aa41ca7b0b1.jpg', NULL, NULL),
(4, 'Avatar', 'avatar', '02:13:00', '2009-12-07 00:00:00', ' James Cameron', ' Sam Worthington, Zoe Saldana, Sigourney Weaver', 'Malgré sa paralysie, Jake Sully, un ancien marine immobilisé dans un fauteuil roulant, est resté un combattant au plus profond de son être. Il est recruté pour se rendre à des années-lumière de la Terre, sur Pandora, où de puissants groupes industriels exploitent un minerai rarissime destiné à résoudre la crise énergétique sur Terre. Parce que l\'atmosphère de Pandora est toxique pour les humains, ceux-ci ont créé le Programme Avatar, qui permet à des \" pilotes \" humains de lier leur esprit à un avatar, un corps biologique commandé à distance, capable de survivre dans cette atmosphère létale. Ces avatars sont des hybrides créés génétiquement en croisant l\'ADN humain avec celui des Na\'vi, les autochtones de Pandora. Sous sa forme d\'avatar, Jake peut de nouveau marcher. On lui confie une mission d\'infiltration auprès des Na\'vi, devenus un obstacle trop conséquent à l\'exploitation du précieux minerai. Mais tout va changer lorsque Neytiri, une très belle Na\'vi, sauve la vie de Jake...', 9, 'e8e7a2ab4bbd0a540d21dc52da2a540f.jpg', NULL, NULL),
(6, 'Mon voisin Totoro', 'mon-voisin-totoro', '01:45:00', '1999-12-08 00:00:00', ' Hayao Miyazaki ', 'Chika Sakamoto, Noriko Hidaka, Shigesato Itoi', 'Deux petites filles, Mei et Satsuki, viennent s\'installer avec leur père dans une grande maison à la campagne afin de se rapprocher de l\'hôpital où séjourne leur mère. Elles vont découvrir l\'existence de leurs nouveaux voisins, invisible aux yeux des autres humains, des créatures merveilleuses, mais très discrètes : Grand Totoro, Moyen Totoro (Chū-Totoro) et Petit Totoro (Chibi-Totoro). Avec son ventre rebondi, Totoro est un être rare et fascinant, un esprit de la forêt... Il se nourrit de glands et de noix. Il peut voler, se déplacer en « Chat-Bus ». Il dort le jour, mais les nuits de pleine lune, il aime jouer avec des ocarinas magiques...', 8, '9d7f48f814f74ac03fcf85189bf83ec5.jpg', NULL, NULL),
(7, 'Harry Potter à l\'école des sorciers', 'harry-potter-a-l-ecole-des-sorciers', '02:23:00', '2001-12-05 00:00:00', ' Chris Columbus', '. Daniel Radcliffe, Rupert Grint, Emma Watson', 'Orphelin, Harry Potter a été recueilli à contrecœur par son oncle Vernon et sa tante Pétunia, aussi cruels que mesquins, qui n\'hésitent pas à le faire dormir dans le placard sous l\'escalier. Constamment maltraité, il doit en outre supporter les jérémiades de son cousin Dudley, garçon cupide et archi-gâté par ses parents. De leur côté, Vernon et Pétunia détestent leur neveu dont la présence leur rappelle sans cesse le tempérament \"imprévisible\" des parents du garçon et leur mort mystérieuse. À l\'approche de ses 11 ans, Harry ne s\'attend à rien de particulier – ni carte, ni cadeau, ni même un goûter d\'anniversaire. Et pourtant, c\'est à cette occasion qu\'il découvre qu\'il est le fils de deux puissants magiciens et qu\'il possède lui aussi d\'extraordinaires pouvoirs. Quand on lui propose d\'intégrer Poudlard, la prestigieuse école de sorcellerie, il trouve enfin le foyer et la famille qui lui ont toujours manqué… et s\'engage dans l\'aventure de sa vie.', 8, '3121534a54680876fbc01b9c16240fd1.jpg', NULL, NULL),
(8, 'Hunger Games: la Ballade du serpent et de l\'oiseau chanteur', 'hunger-games-la-ballade-du-serpent-et-de-l-oiseau-chanteur', '02:38:00', '2023-11-15 00:00:00', ' Francis Lawrence', 'Tom Blyth, Rachel Zegler, Peter Dinklage', 'Le jeune Coriolanus est le dernier espoir de sa lignée, la famille Snow autrefois riche et fière est aujourd’hui tombée en disgrâce dans un Capitole d\'après-guerre. À l’approche des 10ème HUNGER GAMES, il est assigné à contrecœur à être le mentor de Lucy Gray Baird, une tribut originaire du District 12, le plus pauvre et le plus méprisé de Panem. Le charme de Lucy Gray ayant captivé le public, Snow y voit l’opportunité de changer son destin, et va s’allier à elle pour faire pencher le sort en leur faveur. Luttant contre ses instincts, déchiré entre le bien et le mal, Snow se lance dans une course contre la montre pour survivre et découvrir s’il deviendra finalement un oiseau chanteur ou un serpent.', 6, '34802b8e57423d43a99ddb2d35c2ab51.jpg', NULL, NULL),
(9, 'Gueules noires', 'gueules-noires', '01:43:00', '2023-11-15 00:00:00', ' Mathieu Turi', ' Sam Worthington, Zoe Saldana, Sigourney Weaver', '1956, dans le nord de la France. Une bande de mineurs de fond se voit obligée de conduire un professeur faire des prélèvements à mille mètres sous terre. Après un éboulement qui les empêche de remonter, ils découvrent une crypte d’un autre temps, et réveillent sans le savoir quelque chose qui aurait dû rester endormi.', 6, '91f8f69d1e9f854006e160b5e1b368cc.jpg', NULL, NULL),
(24, 'La Petite sirène', 'la-petite-sirene', '02:16:00', '2023-05-20 00:00:00', 'Rob Marshall', ' Halle Bailey, Jonah Hauer-King, Melissa McCarthy', 'Les années 1830, dans les eaux d\'une île fictive des Caraïbes. Ariel, la benjamine des filles du roi Triton, est une jeune sirène belle et fougueuse dotée d’un tempérament d’aventurière. Rebelle dans l’âme, elle n’a de cesse d’être attirée par le monde qui existe par-delà les flots. Au détour de ses escapades à la surface, elle va tomber sous le charme du prince Eric. Alors qu\'il est interdit aux sirènes d\'interagir avec les humains, Ariel sent pourtant qu’elle doit suivre son cœur. Elle conclut alors un accord avec Ursula, la terrible sorcière des mers, qui lui octroie le pouvoir de vivre sur la terre ferme, mais sans se douter que ce pacte met sa vie - et la couronne de son père - en danger...', 5, 'b2046fcd995975e39dc2a324f090f8b1.jpg', '2024-02-02 09:28:20', '2024-02-02 09:28:20'),
(25, 'L\'Etrange Noël de M. Jack', 'letrange-noel-de-m-jack', '01:15:00', '1994-12-06 00:00:00', ' Tim Burton', 'Chris Sarandon, Danny Elfman, Catherine O\'Hara', 'Jack Skellington, roi des citrouilles et guide de Halloween-ville, s\'ennuie : depuis des siècles, il en a assez de préparer la même fête de Halloween qui revient chaque année, et il rêve de changement. C\'est alors qu\'il a l\'idée de s\'emparer de la fête de Noël...', 8, '6847270c3eeee6016f4f11dca23d3ec2.jpg', '2024-02-02 09:30:06', '2024-02-02 09:30:06'),
(26, 'Retour vers le futur', 'retour-vers-le-futur', '01:56:00', '1985-10-30 00:00:00', 'Robert Zemeckis ', ' Michael J. Fox, Christopher Lloyd, Lea Thompson', '1985. Le jeune Marty McFly mène une existence anonyme auprès de sa petite amie Jennifer, seulement troublée par sa famille en crise et un proviseur qui serait ravi de l\'expulser du lycée. Ami de l\'excentrique professeur Emmett Brown, il l\'accompagne un soir tester sa nouvelle expérience : le voyage dans le temps via une DeLorean modifiée. La démonstration tourne mal : des trafiquants d\'armes débarquent et assassinent le scientifique. Marty se réfugie dans la voiture et se retrouve transporté en 1955. Là, il empêche malgré lui la rencontre de ses parents, et doit tout faire pour les remettre ensemble, sous peine de ne pouvoir exister...', 8, '4aefaef5a5bc0779ed72228426e0a06e.jpg', '2024-02-02 09:32:20', '2024-02-02 09:32:20'),
(27, 'Tron l\'héritage', 'tron-lheritage', '02:16:00', '2011-02-09 00:00:00', ' Joseph Kosinski', 'Jeff Bridges, Garrett Hedlund, Olivia Wilde', 'Sam Flynn, 27 ans, est le fils expert en technologie de Kevin Flynn. Cherchant à percer le mystère de la disparition de son père, il se retrouve aspiré dans ce même monde de programmes redoutables et de jeux mortels où vit son père depuis 25 ans. Avec la fidèle confidente de Kevin, père et fils s\'engagent dans un voyage où la mort guette, à travers un cyber univers époustouflant visuellement, devenu plus avancé technologiquement et plus dangereux que jamais...', 6, '398efd903cef3fc0b5378a88ebf933e2.jpg', '2024-02-02 09:34:14', '2024-02-02 09:34:14'),
(28, 'vgbtyjnherberbhregerg', 'vgbtyjnherberbhregerg', '14:32:00', '2024-02-13 00:00:00', 'regb\"trgtrgr', 'rtgrthgtrg', 'rthythtrhrtg', 6, '3ee60f6b4ec7abda77a10aa41ca7b0b1.jpg', '2024-02-02 14:32:20', '2024-02-02 14:32:20'),
(30, 'titanic', 'titanic', '14:59:00', '2024-02-02 00:00:00', 'Rob Marshall', 'Chris Pine, Michelle Rodriguez, Regé-Jean Page', 'ezfdzefzefzefef', 6, 'b2046fcd995975e39dc2a324f090f8b1.jpg', '2024-02-02 14:59:27', '2024-02-02 14:59:27');

-- --------------------------------------------------------

--
-- Structure de la table `movie_categories`
--

CREATE TABLE `movie_categories` (
  `movie_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `movie_categories`
--

INSERT INTO `movie_categories` (`movie_id`, `category_id`) VALUES
(4, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `role_id`, `lastLogin`, `created`, `modified`) VALUES
('b91d1b27-ba96-11ee-b9f4-7cd30a826f63', 'camille@camille.fr', '$2y$10$42B/JjSzeVB8m7Vfd5qHOOYNBmpVnwGZxFyKWAek55evO1/fWpAJ2', 1, '2024-02-07 17:22:30', '2024-01-24 09:58:20', '2024-01-24 09:58:20'),
('cab308f6-b939-11ee-8d52-7cd30a826f63', 'gabi@gabi.fr', '$2y$10$4q/jB7SXWVaOkIt4TzkWletbEHR4mvVHzFW2lif5cZ5BHzJBRgpoe', 1, NULL, '2024-01-22 16:20:36', '2024-01-22 16:20:36');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movie_categories`
--
ALTER TABLE `movie_categories`
  ADD PRIMARY KEY (`movie_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movie_categories`
--
ALTER TABLE `movie_categories`
  ADD CONSTRAINT `movie_categories_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `movie_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
