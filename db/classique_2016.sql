-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2017 at 10:07 AM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `classique_2016`
--

-- --------------------------------------------------------

--
-- Table structure for table `c_babillard`
--

CREATE TABLE IF NOT EXISTS `c_babillard` (
  `babillard_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rank` int(10) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `image_fr` int(10) NOT NULL,
  `image_en` int(10) NOT NULL,
  `arg1_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arg1_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arg2_fr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arg2_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arg3_fr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arg3_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`babillard_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `c_babillard`
--

INSERT INTO `c_babillard` (`babillard_id`, `type`, `rank`, `visible`, `image_fr`, `image_en`, `arg1_fr`, `arg1_en`, `arg2_fr`, `arg2_en`, `arg3_fr`, `arg3_en`) VALUES
(26, 'img', 3, 1, 130, 130, '', '', '140', '140', '', ''),
(34, 'page', 9, 1, 122, 122, 'http://laclassiqueduquebec.com/gallery.php', 'http://laclassiqueduquebec.com/gallery.php', NULL, NULL, NULL, NULL),
(43, 'img', 1, 1, 147, 148, '', '', '151', '152', '', ''),
(30, 'youtube', 8, 1, 129, 129, 'dGd1mHbybpg', 'dGd1mHbybpg', NULL, NULL, NULL, NULL),
(31, 'img', 11, 1, 132, 132, '', '', '138', '138', '', ''),
(25, 'img', 3, 1, 126, 126, '', '', '135', '135', '', ''),
(24, 'youtube', 2, 1, 134, 134, 'STTabqzbHvM', 'STTabqzbHvM', NULL, NULL, NULL, NULL),
(27, 'img', 4, 1, 128, 128, '', '', '139', '139', '', ''),
(28, 'img', 5, 1, 124, 124, '', '', '136', '136', '', ''),
(29, 'url', 6, 1, 127, 127, 'https://ilovedanceshoes.com', 'https://ilovedanceshoes.com', NULL, NULL, NULL, NULL),
(32, 'img', 10, 1, 131, 131, '', '', '137', '137', '', ''),
(38, 'url', 7, 1, 141, 142, 'http://www.compmngr.com/laclass2017/laclass2017_ScoresheetsByPerson.htm', 'http://www.compmngr.com/laclass2017/laclass2017_ScoresheetsByPerson.htm', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `c_competitors`
--

CREATE TABLE IF NOT EXISTS `c_competitors` (
  `competitor_id` int(10) NOT NULL AUTO_INCREMENT,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `rank` int(10) NOT NULL DEFAULT '0',
  `pdf_fr` int(10) NOT NULL,
  `pdf_en` int(10) NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'comp',
  PRIMARY KEY (`competitor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `c_competitors`
--

INSERT INTO `c_competitors` (`competitor_id`, `name_fr`, `name_en`, `visible`, `rank`, `pdf_fr`, `pdf_en`, `section`) VALUES
(4, 'Liste des figures Ballroom', 'Ballroom Step list', 1, 2, 13, 13, 'other'),
(2, 'Liste des figures Latines', 'Latin Step list', 1, 1, 11, 12, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `c_gallery`
--

CREATE TABLE IF NOT EXISTS `c_gallery` (
  `gallery_id` int(10) NOT NULL AUTO_INCREMENT,
  `image_id` int(10) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `rank` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `c_gallery`
--

INSERT INTO `c_gallery` (`gallery_id`, `image_id`, `visible`, `rank`) VALUES
(1, 83, 1, 1),
(2, 84, 1, 2),
(3, 85, 1, 3),
(4, 86, 1, 4),
(5, 87, 1, 5),
(6, 88, 1, 6),
(7, 89, 1, 7),
(8, 90, 1, 8),
(34, 118, 1, 34),
(10, 92, 1, 10),
(11, 93, 1, 11),
(12, 94, 1, 12),
(13, 95, 1, 13),
(14, 96, 1, 14),
(15, 97, 1, 15),
(16, 98, 1, 16),
(17, 99, 1, 17),
(18, 100, 1, 18),
(19, 101, 1, 19),
(20, 102, 1, 20),
(21, 103, 1, 21),
(22, 104, 1, 22),
(23, 105, 1, 23),
(24, 106, 1, 24),
(25, 107, 1, 25),
(26, 108, 1, 26),
(27, 109, 1, 27),
(28, 110, 1, 28),
(29, 111, 1, 29),
(30, 112, 1, 30),
(31, 113, 1, 31),
(32, 114, 1, 32),
(33, 115, 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `c_images`
--

CREATE TABLE IF NOT EXISTS `c_images` (
  `image_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=153 ;

--
-- Dumping data for table `c_images`
--

INSERT INTO `c_images` (`image_id`, `name`, `url`, `language`, `logo`) VALUES
(27, 'Logo Accueil Large Francais F-bi', 'uploads/LaClassiquewebaccueilFbi.png', 'fr', 1),
(65, 'sponsor dance shoes', 'uploads/danceshoes.png', 'bi', 1),
(26, 'Logo Accueil Large English-bi', 'uploads/LaClassiquewebaccueilEbi.png', 'en', 1),
(28, 'Logo Accueil Mobile Anglais', 'uploads/ClassiqueLogo_VertmobileE.png', 'en', 1),
(29, 'Logo Accueil Mobile Francais', 'uploads/ClassiqueLogo_VertmobileF.png', 'fr', 1),
(30, 'logo classique menu complet', 'uploads/ClassiqueLogo_2018_menu.png', 'bi', 1),
(31, 'logo classique menu petit', 'uploads/nav-brand-xs.png', 'bi', 1),
(64, 'sponsor cdf', 'uploads/cdf.png', 'bi', 1),
(61, 'sponsor arthur murrau', 'uploads/arthurmurray.png', 'bi', 1),
(62, 'sponsor audi', 'uploads/audi.png', 'bi', 1),
(63, 'sponsor bobby and sally', 'uploads/bobby&sally.png', 'bi', 1),
(60, 'sponsor bonaventure', 'uploads/bonaventure.png', 'bi', 1),
(56, 'image background accueil', 'uploads/Backgroundwebmobile.jpg', 'bi', 0),
(59, 'sponsor aida dance', 'uploads/aidabw.png', 'bi', 1),
(66, 'sponsor dance with us', 'uploads/dancewithus.png', 'bi', 1),
(67, 'sponsor dancesport', 'uploads/dansesport.png', 'bi', 1),
(68, 'sponsor denis', 'uploads/deniselefebvre.png', 'bi', 1),
(69, 'sponsor WPA dance series', 'uploads/dsseries.png', 'bi', 1),
(70, 'sponsor dynasty', 'uploads/dynastie.png', 'bi', 1),
(71, 'sponsor evia', 'uploads/evia.png', 'bi', 1),
(72, 'sponsor HFT', 'uploads/htf.png', 'bi', 1),
(73, 'sponsor euroglam', 'uploads/logo-eg_360.png', 'bi', 1),
(74, 'sponsor muse', 'uploads/muse.png', 'bi', 1),
(75, 'sponsor ndc', 'uploads/ndc.png', 'bi', 1),
(76, 'sponsor ohio', 'uploads/ohio.png', 'bi', 1),
(77, 'sponsor parasuco', 'uploads/parasuco.png', 'bi', 1),
(78, 'sponsor porsche', 'uploads/porsche.png', 'bi', 1),
(79, 'sponsor stephanie', 'uploads/stephanie.png', 'bi', 1),
(80, 'sponsor 2720', 'uploads/studio2720.png', 'bi', 1),
(81, 'sponsor supadance', 'uploads/supadance.png', 'bi', 1),
(82, 'sponsor WDC', 'uploads/wdc.png', 'bi', 1),
(83, 'photo 1', 'uploads/1.jpg', 'bi', 0),
(84, 'photo 2', 'uploads/2.jpg', 'bi', 0),
(85, 'photo 3', 'uploads/3.jpg', 'bi', 0),
(86, 'photo 4', 'uploads/4.jpg', 'bi', 0),
(87, 'photo 5', 'uploads/5.jpg', 'bi', 0),
(88, 'photo 6', 'uploads/6.jpg', 'bi', 0),
(89, 'photo 7', 'uploads/7.jpg', 'bi', 0),
(90, 'photo 8', 'uploads/8.jpg', 'bi', 0),
(118, 'photo 9', 'uploads/9.jpg', 'bi', 0),
(92, 'photo 10', 'uploads/10.jpg', 'bi', 0),
(93, 'photo 11', 'uploads/11.jpg', 'bi', 0),
(94, 'photo 12', 'uploads/12.jpg', 'bi', 0),
(95, 'photo 13', 'uploads/13.jpg', 'bi', 0),
(96, 'photo 14', 'uploads/14.jpg', 'bi', 0),
(97, 'photo 15', 'uploads/15.jpg', 'bi', 0),
(98, 'photo 16', 'uploads/16.jpg', 'bi', 0),
(99, 'photo 17', 'uploads/17.jpg', 'bi', 0),
(100, 'photo 21', 'uploads/21.jpg', 'bi', 0),
(101, 'photo 22', 'uploads/22.jpg', 'bi', 0),
(102, 'photo 23', 'uploads/23.jpg', 'bi', 0),
(103, 'photo 25', 'uploads/25.jpg', 'bi', 0),
(104, 'photo 26', 'uploads/26.jpg', 'bi', 0),
(105, 'photo 27', 'uploads/27.jpg', 'bi', 0),
(106, 'photo 28', 'uploads/28.jpg', 'bi', 0),
(107, 'photo 29', 'uploads/29.jpg', 'bi', 0),
(108, 'photo 30', 'uploads/30.jpg', 'bi', 0),
(109, 'photo 31', 'uploads/31.jpg', 'bi', 0),
(110, 'photo 32', 'uploads/32.jpg', 'bi', 0),
(111, 'photo 33', 'uploads/33.jpg', 'bi', 0),
(112, 'photo 34', 'uploads/34.jpg', 'bi', 0),
(113, 'photo 36', 'uploads/36.jpg', 'bi', 0),
(114, 'photo 38', 'uploads/38.jpg', 'bi', 0),
(115, 'photo 39', 'uploads/39.jpg', 'bi', 0),
(116, 'Image de fond hotel', 'uploads/hotel-bona3.jpg', 'bi', 0),
(117, 'Hotel logo animÃ©', 'uploads/logo-hotel-bonaventure.png', 'bi', 1),
(119, 'ma face', 'uploads/lo.png', 'bi', 1),
(120, 'favicon 2018', 'uploads/icone Facebook 2018.jpg', 'bi', 0),
(121, 'Babillard blank', 'uploads/Babillard Blank 2018.jpg', 'bi', 0),
(122, 'Babillard Album', 'uploads/Album.jpg', 'bi', 0),
(124, 'Babillard Travel', 'uploads/Travel.jpg', 'bi', 0),
(125, 'Babillard Bonaventure', 'uploads/Bonaventure.jpg', 'bi', 0),
(126, 'Babillard Crystal', 'uploads/Chrystal.jpg', 'bi', 0),
(127, 'Babillard Danceshoes', 'uploads/Danceshoes.jpg', 'bi', 0),
(128, 'Babillard Dominion', 'uploads/Dominion.jpg', 'bi', 0),
(129, 'Babillard Lauzon', 'uploads/Lauzon.jpg', 'bi', 0),
(130, 'Babillard Parasuco', 'uploads/Parasuco.jpg', 'bi', 0),
(131, 'Babillard Showtime', 'uploads/Showtime.jpg', 'bi', 0),
(132, 'Babillard Video-Photos', 'uploads/Videophoto.jpg', 'bi', 0),
(134, 'Babillard Arthur Murray', 'uploads/arthur murray.jpg', 'bi', 0),
(135, 'Pub CroisiÃ¨re ', 'uploads/cc_evia_ballroom_fp_jan_ad_final_REV1.jpg', 'bi', 0),
(136, 'Pub Travel', 'uploads/gampub.jpg', 'bi', 0),
(137, 'Pub Showtime', 'uploads/LaClassique_Ad_November_2016_showtime.jpg', 'bi', 0),
(138, 'Pub Video-Photos', 'uploads/Photo.jpg', 'bi', 0),
(139, 'Pub Dominion', 'uploads/rbc_pub.jpg', 'bi', 0),
(140, 'Pub Parasuco', 'uploads/Parasuco18.jpg', 'bi', 0),
(141, 'Babillard RÃ©sultats FR', 'uploads/Babillard resultats.jpg', 'fr', 0),
(142, 'Babillard Results EN', 'uploads/BabillardResultsE.jpg', 'en', 0),
(147, 'Babillard Membre FR', 'uploads/Babillard 2018 FR.jpg', 'fr', 0),
(148, 'Babillard Membres ENG', 'uploads/Babillard 2018 ANG.jpg', 'en', 0),
(152, 'Image Membre ENG', 'uploads/Exclisive program web ENG.jpg', 'en', 0),
(151, 'Image Membre FR', 'uploads/Exclisive program web FR.jpg', 'fr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c_menus`
--

CREATE TABLE IF NOT EXISTS `c_menus` (
  `menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'event',
  `rank` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `c_menus`
--

INSERT INTO `c_menus` (`menu_id`, `name_fr`, `name_en`, `type`, `value_fr`, `value_en`, `visible`, `section`, `rank`) VALUES
(16, 'Emplacement', 'Map', 'url', 'https://www.google.ca/maps/place/Hotel+Bonaventure+Montr%C3%A9al/@45.4993335,-73.5671406,17z/data=!3m1!4b1!4m5!3m4!1s0x4cc91a5cea5f36fb:0x5c249de257b318c0!8m2!3d45.4993335!4d-73.5649466', 'https://www.google.ca/maps/place/Hotel+Bonaventure+Montr%C3%A9al/@45.4993335,-73.5671406,17z/data=!3m1!4b1!4m5!3m4!1s0x4cc91a5cea5f36fb:0x5c249de257b318c0!8m2!3d45.4993335!4d-73.5649466', 1, 'event', 2),
(26, 'HÃ´tel', 'Hotel', 'url', 'http://hotelbonaventure.com/fr/', 'http://hotelbonaventure.com/en/', 1, 'event', 1),
(19, 'Plan de la salle', 'Ballroom', 'img', '25', '25', 1, 'event', 3),
(20, 'Partenaires', 'Partner', 'pdf', '7', '7', 1, 'event', 4),
(21, 'Commanditaires', 'Sponsor', 'pdf', '8', '8', 1, 'event', 5),
(22, 'Kiosques', 'Vendors', 'pdf', '10', '10', 1, 'event', 6);

-- --------------------------------------------------------

--
-- Table structure for table `c_misc`
--

CREATE TABLE IF NOT EXISTS `c_misc` (
  `misc_id` int(10) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arg1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arg2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arg3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arg4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arg5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`misc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `c_misc`
--

INSERT INTO `c_misc` (`misc_id`, `label`, `arg1`, `arg2`, `arg3`, `arg4`, `arg5`) VALUES
(1, 'google_map_coords', '45.4993335', '-73.5649466', '', '', ''),
(2, 'countdown_date', 'february 15, 2018 08:00:00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `c_other`
--

CREATE TABLE IF NOT EXISTS `c_other` (
  `other_id` int(10) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`other_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `c_other`
--

INSERT INTO `c_other` (`other_id`, `label`, `value_fr`, `value_en`) VALUES
(1, 'cnn_bar', 'Inscrivez-vous en tant que membre maintenant sur le site web et risquez de gagner des privilÃ¨ges VIP Ã  La classique du QuÃ©bec 2018.', 'Subscribe as a member now on the web site and you may win VIP privileges at La classique du Quebec 2018'),
(2, 'main_logo_mobile', '29', '28'),
(3, 'main_logo_large', '27', '26'),
(4, 'home_youtube_video', 'fhR0zShLT5Y', 'OkMX6nlUpAA'),
(5, 'menu_bar_logo_mobile', '31', '31'),
(6, 'menu_bar_logo_large', '30', '30'),
(7, 'preloader_logo', '31', '31'),
(8, 'background_image_mobile', '56', '56'),
(9, 'background_video', '3', '3'),
(10, 'hotel_logo', '117', '117'),
(11, 'hotel_link', 'http://hotelbonaventure.com/fr/', 'http://hotelbonaventure.com/en'),
(12, 'background_hotel', '116', '116'),
(13, 'favicon_icon', '120', '120');

-- --------------------------------------------------------

--
-- Table structure for table `c_pdfs`
--

CREATE TABLE IF NOT EXISTS `c_pdfs` (
  `pdf_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pdf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `c_pdfs`
--

INSERT INTO `c_pdfs` (`pdf_id`, `name`, `url`, `language`) VALUES
(8, 'Commanditaires 2017', 'pdfs/0002017ClaSponsorsListDec11Corrected.pdf', 'bi'),
(7, 'Partenaires 2017', 'pdfs/0002017ClaPartenaires.pdf', 'bi'),
(10, 'Kiosques 2017', 'pdfs/2017vendors-min.pdf', 'bi'),
(11, 'Listes des figures latines francais', 'pdfs/0002017ClaStepListCDFLatinStepList.pdf', 'fr'),
(12, 'Listes des figures latines anglais', 'pdfs/0002017ClaStepListCDFLatinStepListEnglish.pdf', 'en'),
(13, 'Listes des figures ballroom', 'pdfs/0002017ClaStepListBallroomCDFStandardStepList.pdf', 'bi');

-- --------------------------------------------------------

--
-- Table structure for table `c_sponsors`
--

CREATE TABLE IF NOT EXISTS `c_sponsors` (
  `sponsor_id` int(10) NOT NULL AUTO_INCREMENT,
  `logo` int(10) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rank` int(10) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sponsor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `c_sponsors`
--

INSERT INTO `c_sponsors` (`sponsor_id`, `logo`, `url`, `rank`, `visible`) VALUES
(3, 59, 'https://www.crystal-clover.ca/', 1, 1),
(4, 60, 'http://hotelbonaventure.com/en', 2, 1),
(5, 61, 'mailto:info@arthurmurray.com', 3, 1),
(6, 77, 'http://www.parasuco.com/en-ca', 4, 1),
(7, 72, 'http://hftcommunications.com/fr/', 5, 1),
(8, 66, 'http://www.dancewithusottawa.com/', 6, 1),
(9, 76, 'http://www.ohiostarball.com/', 7, 1),
(10, 71, 'http://www.eviactive.com/', 8, 1),
(11, 80, 'http://www.studio2720.ca/', 9, 1),
(12, 68, ' ', 10, 1),
(13, 63, 'http://www.bobbyandsally.com/', 11, 1),
(14, 81, 'https://www.supadance.ca/en/', 12, 1),
(15, 79, 'mailto:pouliotstephanie@me.com', 13, 1),
(16, 78, 'https://www.lauzonporsche.com/', 14, 1),
(17, 62, 'http://www.lauzonaudi.com/', 15, 1),
(18, 70, 'https://www.yellowpages.ca/bus/Quebec/Saint-Hubert/Trophees-Dynastie/6441533.html', 16, 1),
(19, 67, 'http://www.dansesportmontreal.com/', 17, 1),
(20, 65, 'https://ilovedanceshoes.com/', 18, 1),
(21, 73, 'http://www.designsbygalina.com/', 19, 1),
(22, 74, 'https://www.musebyyuliya.com/', 20, 1),
(24, 69, 'http://www.dancesportseries.com/', 21, 1),
(25, 75, 'https://dancecouncil.ca/', 22, 1),
(26, 64, 'http://www.canadiandancesportfederation.ca/', 23, 1),
(27, 82, 'http://wdced.com/', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `c_subscriber`
--

CREATE TABLE IF NOT EXISTS `c_subscriber` (
  `subscriber_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`subscriber_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=167 ;

--
-- Dumping data for table `c_subscriber`
--

INSERT INTO `c_subscriber` (`subscriber_id`, `email`) VALUES
(30, ''),
(102, 'a.bartha@hotmail.com'),
(93, 'ac.vendettoli@videotron.ca'),
(155, 'afhumphrey@gmail.com'),
(94, 'alexandreroberge@videotron.ca'),
(42, 'alobasso@sympatico.ca'),
(149, 'Anthie@hotmail.com'),
(96, 'Barbara.jones@mcgill.ca'),
(143, 'belharbihamou@hotmail.com'),
(76, 'blng.monde@gmail.com'),
(138, 'brian@thecontinentaldanceclub.com'),
(36, 'Brigitt119@aol.com'),
(133, 'carlosdmateu@gmail.com'),
(161, 'Caroline.buche@gmail.com'),
(151, 'ccydonia@yahoo.ca'),
(158, 'chantabou@hotmail.com'),
(86, 'Chris@chrisleeandleandrosalon.com'),
(153, 'cmoistef99@gmail.com'),
(85, 'coupdepique@yahoo.com'),
(54, 'csimmons@burlingtonsocialclub.com'),
(115, 'danika.flood@hotmail.com'),
(73, 'Danraymond28@gmail.com'),
(117, 'debbie.zolondek@videotron.ca'),
(163, 'dejari15@hotmail.com'),
(139, 'djfireball@icloud.com'),
(125, 'drjcwalford@gmail.com'),
(136, 'ecoledl@videotron.ca'),
(46, 'Ecrisamado@gmail.com'),
(64, 'fr-girard@hotmail.com '),
(67, 'Francebouchard1@gmail.com'),
(68, 'Frm@bell.net'),
(70, 'greniersteve4@gmail.com'),
(88, 'gtollstam@gmail.com'),
(53, 'harley21@sympatico.ca'),
(132, 'Ian.bradley@mcgill.ca'),
(45, 'isakhno@msn.com'),
(84, 'jacqumarch@gmail.com'),
(80, 'jean@agencejb3.com'),
(78, 'jeangascon0@gmail.com'),
(99, 'joanbannerman@aol.com'),
(47, 'johanneff@hotmail.com'),
(166, 'john_murdoch@verizon.net'),
(148, 'judstar@iinet.net.au'),
(51, 'jvdancer2010@gmail.com'),
(128, 'karen.lynn.montreal@gmail.com'),
(74, 'katia.dsd@hotmail.com'),
(95, 'kjball78@hotmail.com'),
(55, 'La.shearer@hotmail.com'),
(146, 'laurel2195@gmail.com'),
(58, 'Ljanna@hotmail.com'),
(110, 'llpoon@hotmail.com'),
(107, 'lori.greco@me.com'),
(82, 'loufran53@hotmail.ca'),
(157, 'marknancy@hotmail.com'),
(91, 'meddylcsw@yahoo.com'),
(31, 'Melaniebussiere@outlook. Com'),
(97, 'meryem.pearson"gmail.com'),
(101, 'meryem.pearson@gmail.com'),
(154, 'mikewilliamson@videotron.qc.ca'),
(159, 'ml+laclassique@girard.io'),
(134, 'Mxbrunot@hotmail.com'),
(38, 'Natashajohnsonova@gmail.com'),
(33, 'natgen65@gmail.com'),
(37, 'Notlok@gmail.com'),
(119, 'orzhev@gmail.com'),
(63, 'pammie003@hotmail.com '),
(127, 'parentrachel@videotron ca'),
(87, 'Pozarin@verizon.net'),
(69, 'production_jm@hotmail.com'),
(131, 'Rainvillealain@hotmail.com'),
(27, 'rcbmontreal@hotmail.com'),
(124, 'Redfire13579@gmail.com'),
(162, 'Rene.daigneaut@gmail.com'),
(40, 'Rene@re-communications.com'),
(83, 'rochequipleure@yahoo.ca'),
(90, 'rosario.salvo.rs@gmail.com'),
(150, 'rossjohanne@videotron.ca'),
(28, 'stephanie_godin88@hotmail.com'),
(111, 'sylvainp_tnm@hotmail.com'),
(142, 'sylvie_noel@hotmail.ca'),
(105, 'sylviepelletier_@hotmail.com'),
(62, 'Takajmiyano@gmail.com'),
(120, 'tangokitten@hotmail.com'),
(106, 'tedwong88@hotmail.com'),
(59, 'thepannarales@yahoo.ca'),
(66, 'tomokomiyano@gmail.com'),
(50, 'trepanier_andre@yahoo.ca');

-- --------------------------------------------------------

--
-- Table structure for table `c_users`
--

CREATE TABLE IF NOT EXISTS `c_users` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visibility` int(4) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `c_users`
--

INSERT INTO `c_users` (`user_id`, `username`, `password`, `visibility`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2),
(2, 'manager', '1a8565a9dc72048ba03b4156be3e569f22771f23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c_videos`
--

CREATE TABLE IF NOT EXISTS `c_videos` (
  `video_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `c_videos`
--

INSERT INTO `c_videos` (`video_id`, `name`, `url`, `language`) VALUES
(3, 'VidÃ©o de fond accueil temporaire 2018', 'uploads/CDQ animation base.mp4', 'bi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
