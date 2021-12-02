-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 10 Juin 2015 à 09:39
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lbnb`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE IF NOT EXISTS `amis` (
  `id_invitation` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_exp` varchar(100) NOT NULL,
  `pseudo_dest` varchar(100) NOT NULL,
  `date_invitation` datetime NOT NULL,
  `date_confirmation` datetime NOT NULL,
  `date_vue` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_invitation`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `amis`
--

INSERT INTO `amis` (`id_invitation`, `pseudo_exp`, `pseudo_dest`, `date_invitation`, `date_confirmation`, `date_vue`, `active`) VALUES
(3, 'cilbnb', 'dyos', '2015-03-30 03:01:45', '2015-03-30 03:18:17', '2015-03-30 03:39:59', 1),
(4, 'index', 'dyos', '2015-05-20 15:32:00', '2015-06-10 02:31:32', '2015-05-20 15:32:00', 1),
(5, 'index', 'cilbnb', '2015-05-20 15:32:12', '2015-05-20 15:32:12', '2015-05-20 15:32:12', 0);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(20) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `corps` text NOT NULL,
  `date` datetime NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id_article`, `pseudo`, `title`, `corps`, `date`, `avatar`) VALUES
(1, 'Club Informatique', 'Premiere publication officielle concernant le lancement du site web du lycee de NEW BELL', 'Depuis deja plus d''un an que nous travaillons sur ce projet pele mele qui jusqu''a present ne correspond pas totalement aux bases que nous nous etions fixe. Mais face a l''urgence de la chose autant attendu par l''administration que par la masse des eleves du lycee. Nous vous presentons d''une facon officielle le lancement des activites dans ce site. Veuillez vous inscrire sur le site pour beneficier de plus de privileges! \r\n\r\nL''equipe de la redaction.\r\nMerci!', '2015-03-30 03:46:25', 'baniere.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaire` int(20) NOT NULL AUTO_INCREMENT,
  `id_article` int(20) NOT NULL,
  `pseudo` varchar(250) NOT NULL,
  `corps` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE IF NOT EXISTS `conversations` (
  `id_conversation` int(10) NOT NULL AUTO_INCREMENT,
  `sujet_conversation` varchar(100) NOT NULL,
  PRIMARY KEY (`id_conversation`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `conversations`
--

INSERT INTO `conversations` (`id_conversation`, `sujet_conversation`) VALUES
(1, 'rien de bon');

-- --------------------------------------------------------

--
-- Structure de la table `conversations_membres`
--

CREATE TABLE IF NOT EXISTS `conversations_membres` (
  `id_conversation` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo_dest` varchar(100) NOT NULL,
  PRIMARY KEY (`id_conversation`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `conversations_membres`
--

INSERT INTO `conversations_membres` (`id_conversation`, `pseudo_dest`) VALUES
(1, 'cilbnb');

-- --------------------------------------------------------

--
-- Structure de la table `conversations_messages`
--

CREATE TABLE IF NOT EXISTS `conversations_messages` (
  `id_conversation` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo_exp` varchar(100) NOT NULL,
  `corps_message` text NOT NULL,
  `date_message` datetime NOT NULL,
  PRIMARY KEY (`id_conversation`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `conversations_messages`
--

INSERT INTO `conversations_messages` (`id_conversation`, `pseudo_exp`, `corps_message`, `date_message`) VALUES
(1, 'dyos', 'grrgrrr', '2015-03-30 03:38:59');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `nom` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sexe` varchar(6) NOT NULL,
  `situation` varchar(12) NOT NULL,
  `apropos` text NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `age` varchar(2) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `nom`, `password`, `email`, `sexe`, `situation`, `apropos`, `avatar`, `age`, `admin`) VALUES
(1, 'dyos', 'YOUTA OBBY SIDANE', '8a607a2453bfc16f181f840ec350ce5038aac569', 'dyos98@gmail.com', 'Homme', 'Autre', 'salut, je m''appelle dyos!!', '10885197_805117102894317_7468493712903086730_n.jpg', '17', 1),
(2, 'cilbnb', 'Club Informatique', 'a830a7f3b4b3c9eb27985efbec8ff6ed6d9638b5', 'cilbnb@lbnb.net', 'Club', 'Autre', 'Hello, nous sommes l''equipe du club inforrmatique!!', 'clubinfo.png', 'no', 1),
(3, 'index', 'L''index', 'e540cdd1328b2b21e29a95405c301b9313b7c346', 'admin@lbnb.net', 'Homme', 'Autre', 'lindex', 'clubs.png', '00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
