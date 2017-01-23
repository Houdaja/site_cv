-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Janvier 2017 à 19:25
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_competences`
--

CREATE TABLE `t_competences` (
  `id_competence` int(11) NOT NULL,
  `competence` text,
  `niveau` int(3) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_competences`
--

INSERT INTO `t_competences` (`id_competence`, `competence`, `niveau`, `utilisateur_id`) VALUES
(9, 'CSS', 80, 1),
(10, 'HTML', 80, 1),
(13, 'Javascript', 10, 1),
(15, 'Boostrap', 80, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

CREATE TABLE `t_experiences` (
  `id_experience` int(11) NOT NULL,
  `titre_e` text NOT NULL,
  `sous_titre_e` text,
  `dates_e` text,
  `description_e` text NOT NULL,
  `img_e` varchar(255) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_experiences`
--

INSERT INTO `t_experiences` (`id_experience`, `titre_e`, `sous_titre_e`, `dates_e`, `description_e`, `img_e`, `utilisateur_id`) VALUES
(19, 'Gestionnaire du personnel', 'SACEM', '10/2010 - 06/2011 ', '<p>Mise en place des instances repr&eacute;sentatives du personnel</p>\r\n\r\n<p>Gestion de fonds mutualis&eacute;s de formation</p>\r\n\r\n<p>Gestion administrative RH</p>\r\n', 'sacem.jpg', 0),
(20, 'Intégrateur & Developpeur Web', 'LePoleS', 'Depuis  07/2016', '<p>Connaissance des r&egrave;gles et normes applicables sur le web</p>\r\n\r\n<p>Connaissances informatiques</p>\r\n', 'lepoles.jpg', 0),
(23, 'Assistante technique', 'Association Famille et Santé', '04/2013 - 10/2014', '<p>Rencontre avec le client (&eacute;valuation de la situation, &eacute;laboration du plan d&rsquo;aide personnalis&eacute;.)</p>\r\n\r\n<p>Gestion des planning salari&eacute;s et clients</p>\r\n\r\n<p>Facturations Clients et caisses (retraites, sociales..)</p>\r\n\r\n<p>Assurer la gestion et le suivi administratif de dossiers techniques (projet, mission, d&eacute;marche qualit&eacute; ...)</p>\r\n\r\n<p>Coordination des agents</p>\r\n\r\n<p>Pr&eacute;paration de la paie, transmission des &eacute;l&eacute;ments tous les mois.</p>\r\n\r\n<p>Gestion des absences, des visites m&eacute;dicales</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'fs.jpg', 0),
(24, 'Assistante manager', 'SACEM', '09/2009 - 08/2010', '<p>Sensibiliser et former les personnels &agrave; la d&eacute;marche qualit&eacute;</p>\r\n\r\n<p>Gestion des agendas, des d&eacute;placements, des notes de frais</p>\r\n\r\n<p>Proc&eacute;der &agrave; l&#39;indexation, au classement et &agrave; l&#39;archivage de documents</p>\r\n', 'sacem.jpg', 0),
(25, 'Assistante Manager', 'ADMG, Conseil & expertise', '09/2008 - 07/2009', '<p>Traitement des enqu&ecirc;tes, questionnaires, statistiques relatifs au personnel</p>\r\n\r\n<p>Dispositifs d&#39;assurance-qualit&eacute; D&eacute;veloppement de l&rsquo;image de service - actions correctives</p>\r\n', 'admg.png', 0),
(26, 'Hôtesse d''accueil', 'AGF, Banque', '05/2008 - 08/2008', '<p>Accueil physique et t&eacute;l&eacute;phonique</p>\r\n', 'agf.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_formations`
--

CREATE TABLE `t_formations` (
  `id_formation` int(11) NOT NULL,
  `titre_f` varchar(45) NOT NULL,
  `sous_titre_f` varchar(45) NOT NULL,
  `dates_f` varchar(45) NOT NULL,
  `description_f` text,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_formations`
--

INSERT INTO `t_formations` (`id_formation`, `titre_f`, `sous_titre_f`, `dates_f`, `description_f`, `utilisateur_id`) VALUES
(1, 'Intégrateur développeur web', 'WebForce 3', '09/2016 - 02/2017', '', 0),
(2, 'Mettre une démarche qualité', 'UNA ', '2014', '', 0),
(3, 'Maladie d''Alzheimer et trouble apparentés', 'PHOENIX', '2014', '', 0),
(4, 'DEESARH', 'IFSAIG', '2011', '<p>Dipl&ocirc;me Europ&eacute;en Sup&eacute;rieur d&#39;Assistant en Ressource Humaine<br />\r\n<em>En alternance</em></p>\r\n', 0),
(5, 'BAC STT ACA', 'Eugénie-Cotton', '2006', '<p>Action communication administrative</p>\r\n', 0),
(6, 'BTS Assistante Manager', 'IFSAIG', '2008 - 2010', '<p><em>1&egrave;re et 2&egrave;me ann&eacute;e alternance </em></p>\r\n', 1),
(7, 'Capacité en droit', 'Université Paris 3 Jussieu', '2007', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_loisir`
--

CREATE TABLE `t_loisir` (
  `id_loisir` int(11) NOT NULL,
  `loisir` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_portfolio`
--

CREATE TABLE `t_portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `nom_img` varchar(50) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_realisations`
--

CREATE TABLE `t_realisations` (
  `id_realisation` int(11) NOT NULL,
  `titre_r` varchar(45) NOT NULL,
  `sous_titre_r` varchar(45) NOT NULL,
  `dates_r` varchar(45) NOT NULL,
  `description_r` varchar(45) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_titres`
--

CREATE TABLE `t_titres` (
  `id_titres` int(11) NOT NULL,
  `titre_01` varchar(50) NOT NULL,
  `titre_02` varchar(50) NOT NULL,
  `titre_03` varchar(50) NOT NULL,
  `titre_04` varchar(50) NOT NULL,
  `titre_05` varchar(50) NOT NULL,
  `titre_06` varchar(50) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_titre_cv`
--

CREATE TABLE `t_titre_cv` (
  `id_titre_cv` smallint(6) NOT NULL,
  `titre_cv` text NOT NULL,
  `accroche` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `id_utilisateur` smallint(5) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL COMMENT 'varchar car 0 n''est pas un entier',
  `mdp` varchar(13) NOT NULL,
  `pseudo` varchar(13) NOT NULL,
  `avatar` varchar(13) NOT NULL,
  `age` smallint(5) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` enum('Femme','Homme') NOT NULL,
  `etat_civil` enum('M.','Mme') NOT NULL,
  `statut_marital` varchar(13) NOT NULL,
  `adresse` text NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(25) NOT NULL,
  `note` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`id_utilisateur`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date_naissance`, `sexe`, `etat_civil`, `statut_marital`, `adresse`, `code_postal`, `ville`, `pays`, `note`) VALUES
(1, 'Houda', 'Jaadar', 'houda.jaadar@lepoles.com', '06 23 46 15 74', 'bismilah2017', 'houdaja', '', 30, '1986-01-09', 'Femme', 'Mme', 'Célibataire', '24 rue Maurice Ravel', '92390', 'Villeneuve La Garenne', 'France', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_competences`
--
ALTER TABLE `t_competences`
  ADD PRIMARY KEY (`id_competence`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `t_formations`
--
ALTER TABLE `t_formations`
  ADD PRIMARY KEY (`id_formation`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `t_loisir`
--
ALTER TABLE `t_loisir`
  ADD PRIMARY KEY (`id_loisir`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `t_portfolio`
--
ALTER TABLE `t_portfolio`
  ADD PRIMARY KEY (`id_portfolio`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  ADD PRIMARY KEY (`id_realisation`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `t_titres`
--
ALTER TABLE `t_titres`
  ADD PRIMARY KEY (`id_titres`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  ADD PRIMARY KEY (`id_titre_cv`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_competences`
--
ALTER TABLE `t_competences`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `t_formations`
--
ALTER TABLE `t_formations`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `t_portfolio`
--
ALTER TABLE `t_portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  MODIFY `id_realisation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_titres`
--
ALTER TABLE `t_titres`
  MODIFY `id_titres` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `id_utilisateur` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
