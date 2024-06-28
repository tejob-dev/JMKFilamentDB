-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2024 at 11:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testjmkdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accueilabouts`
--

CREATE TABLE `accueilabouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `subservice` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imagetitle` varchar(255) DEFAULT NULL,
  `imagetextlist` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueilabouts`
--

INSERT INTO `accueilabouts` (`id`, `section`, `title`, `text`, `subservice`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `imagetextlist`, `created_at`, `updated_at`) VALUES
(1, 'JMK CONSULTING COMPANY', 'Une agriculture durable', '<p>Créateur de compétences, d’innovation et d’opportunités. Nous vous accompagnons dans votre développement stratégique au quotidien. Nous opérons dans les secteurs du négoce de matières premières, le conseil en développement des entreprises, le conseil en études et gestion des projets, l’incubation pour les organisations agricoles, l’import-export et le conseil en gestion comptable et financière…</p>', '<pre>&lt;li&gt;Formation et encadrement&lt;/li&gt;\n&lt;li&gt;Accompagnement de coopératives&lt;/li&gt;\n&lt;li&gt;Accompagnement communautaire&lt;/li&gt;</pre>', 'Voir plus', '/voirplus.html', 'OMRqoZ61ofY3WNoNfyDU1NYtsynyM0-metaYWNjdWVpbC1hZ3JvLmZ3LnBuZw==-.png', 'CERTIFIÉ En Agriculture', '<pre>&lt;div class=\"circle-box\"&gt;\n    &lt;span class=\"curved-circle\"&gt;Environnementt&lt;/span&gt;\n    &lt;span class=\"curved-circle-2\"&gt;Négoce&lt;/span&gt;\n    &lt;span class=\"curved-circle-3\"&gt;Gestion d\'entreprise&lt;/span&gt;\n    &lt;span class=\"curved-circle-4\"&gt;Incubation&lt;/span&gt;\n&lt;/div&gt;\n&lt;div class=\"dot-box\"&gt;\n    &lt;span class=\"dot dot-1\"&gt;&lt;/span&gt;\n    &lt;span class=\"dot dot-2\"&gt;&lt;/span&gt;\n    &lt;span class=\"dot dot-3\"&gt;&lt;/span&gt;\n    &lt;span class=\"dot dot-4\"&gt;&lt;/span&gt;\n&lt;/div&gt;</pre>', '2024-05-19 17:44:58', '2024-06-07 15:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `accueilactus`
--

CREATE TABLE `accueilactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imagetitle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueilactus`
--

INSERT INTO `accueilactus` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `created_at`, `updated_at`) VALUES
(1, 'JMK ACTUS', 'Nos dernières actus', NULL, NULL, NULL, NULL, NULL, '2024-05-20 11:44:47', '2024-05-20 11:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `accueilclientitems`
--

CREATE TABLE `accueilclientitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `icone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `accueilclient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueilclientitems`
--

INSERT INTO `accueilclientitems` (`id`, `title`, `text`, `boutontitre`, `boutonlien`, `icone`, `image`, `accueilclient_id`, `created_at`, `updated_at`) VALUES
(1, 'Cacao Trace - ECOM', '<p>&nbsp;Engagé dans le programme de durabilité CacaoTrace de Chocolatier Belge Puratos, Jmk Consulting dans...</p>', 'Lire plus', NULL, 'flaticon-searching', 'NnAeZWVxRwEX5RhS9TU0G8L0ClxObS-metaY2FjYW90cmFjZS53ZWJw-.webp', 1, '2024-05-20 08:47:48', '2024-05-20 09:26:33'),
(2, 'Pépiniéristes CEMOI', '<p>&nbsp;Vingt-huit (28) pépiniéristes de la région de la NAWA dans le sud-ouest de la Côte d\'Ivoire engagé dans le ...</p>', 'Lire plus', NULL, 'flaticon-searching', '2Oqk9Mob3Plw9GQpyoRu0j4rJ21Maz-metaY2Vtb2kuanBn-.jpg', 1, '2024-05-20 08:47:48', '2024-05-20 09:08:28'),
(3, 'Cacao Trace - SOCA2PD', '<p>&nbsp;Agriculture durable, sécurité alimentaire, transformation et distribution de colis alimentaires et ...</p>', 'Lire plus', NULL, 'flaticon-searching', 'NnAeZWVxRwEX5RhS9TU0G8L0ClxObS-metaY2FjYW90cmFjZS53ZWJw-.webp', 1, '2024-05-20 08:47:48', '2024-05-20 09:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `accueilclients`
--

CREATE TABLE `accueilclients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `imagetitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueilclients`
--

INSERT INTO `accueilclients` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `imagetitle`, `image`, `created_at`, `updated_at`) VALUES
(1, 'NOS CLIENTS', 'Des clients de confiances avec qui nous colaborons', NULL, NULL, NULL, NULL, NULL, '2024-05-20 08:34:51', '2024-05-20 08:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `accueilformations`
--

CREATE TABLE `accueilformations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `imagetitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueilformations`
--

INSERT INTO `accueilformations` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `imagetitle`, `image`, `created_at`, `updated_at`) VALUES
(1, 'NOUS CHOISIR POUR', 'La formation de vos agents', NULL, NULL, NULL, NULL, NULL, '2024-05-20 09:47:24', '2024-05-20 09:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `accueilmanageritems`
--

CREATE TABLE `accueilmanageritems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `icone` varchar(255) DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `accueilmanager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueilmanageritems`
--

INSERT INTO `accueilmanageritems` (`id`, `title`, `text`, `icone`, `boutontitre`, `boutonlien`, `accueilmanager_id`, `created_at`, `updated_at`) VALUES
(1, 'Formation Cacao Trace - ECOM', '<p>&nbsp;Engagé dans le programme de durabilité CacaoTrace de Chocolatier Belge Puratos.</p>', 'flaticon-customer-service', 'Savoir plus', '/formationcacaotrace.html', 1, '2024-05-20 07:02:54', '2024-05-20 07:58:33'),
(2, 'Formation des pépiniéristes', '<p>&nbsp;Vingt-huit (28) pépiniéristes de la région de la NAWA dans le sud-ouest de la Côte d\'Ivoire.</p>', 'flaticon-strategy', 'Savoir plus', '/formationcemoi.html', 1, '2024-05-20 07:07:12', '2024-05-20 08:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `accueilmanagers`
--

CREATE TABLE `accueilmanagers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imagetitle` varchar(255) DEFAULT NULL,
  `textentreprise` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueilmanagers`
--

INSERT INTO `accueilmanagers` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `textentreprise`, `created_at`, `updated_at`) VALUES
(1, 'MANAGER', 'Qui dirige <br> JMK Consulting Company <br> En toute circonstance', '<pre>Nous accompagnons durablement nos partenaires \n&lt;br&gt; dans les domaines d\'innovations se rapportant…</pre>', 'Savoir plus', '/manager.html', 'w4PUMYS9L4iPwCqfIFoD8K5MKzOreA-metaZ3Jvd3RoLTFfMS5wbmc=-.png', 'Photo du dirigeant', '<pre>&lt;h5&gt;Monthly Growth&lt;/h5&gt;\n&lt;div class=\"progress-inner\"&gt;\n    &lt;h5&gt;$48,560,25&lt;/h5&gt;\n    &lt;div class=\"bar\"&gt;\n        &lt;div class=\"bar-inner count-bar\" data-percent=\"60%\"&gt;&lt;/div&gt;\n        &lt;div class=\"count-text\"&gt;+18%&lt;/div&gt;\n    &lt;/div&gt;\n&lt;/div&gt;</pre>', '2024-05-20 06:57:01', '2024-05-20 08:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `accueilserviceitems`
--

CREATE TABLE `accueilserviceitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `subservice` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `accueilservice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueilserviceitems`
--

INSERT INTO `accueilserviceitems` (`id`, `title`, `text`, `subservice`, `boutontitre`, `boutonlien`, `accueilservice_id`, `created_at`, `updated_at`) VALUES
(1, 'Environnement et Développement durable', '<p>&nbsp;Les systèmes agroforestiers apportent un large éventail d’avantages écologiques, nous accompagnons durablement nos partenaires producteurs.&nbsp;</p>', NULL, 'Lire plus', '/services/environnement-et-developpement-durable.html', 1, '2024-05-19 19:20:44', '2024-06-19 08:47:20'),
(2, 'Accompagnement des organisations Agricoles', '<p>&nbsp;Nous formons et accompagnons les communautés rurales et les organisations agricoles à la professionnalisation.</p>', NULL, 'Lire plus', '/services/accompagnement-des-organisations-agricoles.html', 1, '2024-05-19 19:40:15', '2024-06-19 08:46:56'),
(3, 'Diagnostic et lutte contre le travail des enfants', '<p>&nbsp;Le travail des enfants regroupe l’ensemble des activités qui privent les enfants de leur enfance, de leur potentiel et de leur dignité, et nuisent à leur scolarité.</p>', NULL, 'Lire plus', '/services/diagnostic-et-lutte-contre-le-travail-des-enfants.html', 1, '2024-05-19 19:42:00', '2024-06-19 08:47:09'),
(9, 'Négoce de matière première', NULL, NULL, 'Lire Plus', '/services/services.html', 1, '2024-06-19 08:53:46', '2024-06-21 11:43:35'),
(10, 'Agriculture Intelligente & Innovante', NULL, NULL, 'Lire Plus', '/services/services.html', 1, '2024-06-19 08:54:36', '2024-06-21 11:43:47'),
(11, 'Développement des entreprises', NULL, NULL, 'Lire Plus', '/services/services.html', 1, '2024-06-19 08:54:53', '2024-06-21 11:44:04'),
(12, 'Etude et gestion de projets', NULL, NULL, 'Lire Plus', '/services/etude-et-gestion-de-projets.html', NULL, '2024-06-19 08:55:06', '2024-06-19 08:55:06'),
(13, 'Bâtiment et Travaux Publics', NULL, NULL, 'Lire Plus', '/services/batiment-et-travaux-publics.html', NULL, '2024-06-19 08:55:13', '2024-06-19 08:55:13'),
(14, 'Incubation des organisations agricoles', NULL, NULL, 'Lire Plus', '/services/incubation-des-organisations-agricoles.html', NULL, '2024-06-19 08:55:20', '2024-06-19 08:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `accueilservices`
--

CREATE TABLE `accueilservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `secton` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imagetitle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueilservices`
--

INSERT INTO `accueilservices` (`id`, `secton`, `title`, `text`, `boutonlien`, `image`, `imagetitle`, `created_at`, `updated_at`) VALUES
(1, 'NOTRE EXPERTISE', 'NOS SERVICES AUX ORGANISATIONS AGRICOLES', NULL, NULL, NULL, NULL, '2024-05-19 19:16:34', '2024-05-29 15:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `accueiltemoins`
--

CREATE TABLE `accueiltemoins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imagetitle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueiltemoins`
--

INSERT INTO `accueiltemoins` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `created_at`, `updated_at`) VALUES
(1, 'TÉMOIGNAGES', 'Que disent nos clients de nous ?', NULL, NULL, NULL, NULL, NULL, '2024-05-20 12:58:48', '2024-05-20 12:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `accueilvideos`
--

CREATE TABLE `accueilvideos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `videolien` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accueilvideos`
--

INSERT INTO `accueilvideos` (`id`, `section`, `title`, `text`, `image`, `videolien`, `created_at`, `updated_at`) VALUES
(1, 'VIDEO REALISTE', 'VIDEO JMK', NULL, 'jWN2vUIWUjDlRFELz3Vvc52i8mGBue-metadmlkZW8tYmcxLmpwZw==-.jpg', 'https://www.youtube.com/watch?v=nfP5N9Yc72A&t=28s', '2024-05-19 19:47:10', '2024-05-19 19:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `actualites`
--

CREATE TABLE `actualites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imagetitle` varchar(255) DEFAULT NULL,
  `dateactu` timestamp NULL DEFAULT NULL,
  `managernom` varchar(255) DEFAULT NULL,
  `typeformation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accueilactu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actualites`
--

INSERT INTO `actualites` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `dateactu`, `managernom`, `typeformation_id`, `accueilactu_id`, `created_at`, `updated_at`) VALUES
(1, 'Séminaire', 'Séminaire de formation sur l\'entrepreneuriat', '<p>&nbsp;Dans le but de mettre en place une stratégie de communication efficace afin d\'accompagner la coopérative UPRAD COOP CA à l\'export,&nbsp;</p>', 'Lire plus', '/lireplus.html', 'BUPZx74vcJ3IOHgdLqS0uFDHSz2ooQ-metaZGl2by1jZW1vaTEuZncucG5n-.png', 'accompagnement', '2024-04-17 22:00:00', 'Pacome KRA', NULL, 1, '2024-05-20 11:54:43', '2024-05-20 12:12:47'),
(2, 'Formation', 'Formation CacaoTrace des agents durabilité de ECOM', '<p>&nbsp;Dans le but de mettre en place une stratégie de communication efficace afin d\'accompagner la coopérative UPRAD COOP CA à l\'export,&nbsp;</p>', 'Lire plus', '/lireplus.html', '41nhntiyPqTdkSWOobZCVC4i16br3A-metaYWNjb21wYWduZW1lbnQtcGFjb21lLmZ3LnBuZw==-.png', 'accompagnement', '2024-03-13 23:00:00', 'Pacome KRA', NULL, 1, '2024-05-20 11:54:43', '2024-05-20 12:13:00'),
(3, 'Formation', 'Formation Sur le Processus de certification CACAOTRACE', NULL, 'Lire plus', '/lireplus.html', '69DUPXxQzoZjksPeoupU0ipddTSrhn-metaSU1HXzUzMzAuSlBH-.jpg', 'accompagnement', '2024-06-11 22:00:00', 'Pacome KRA', NULL, 1, '2024-05-20 11:54:43', '2024-05-20 12:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `composite_views`
--

CREATE TABLE `composite_views` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `composite_views`
--

INSERT INTO `composite_views` (`id`, `title`, `content`, `image`, `required`, `created_at`, `updated_at`) VALUES
(11, 'BANNIERE 1080', '<section class=\"page-title\">\n    <div class=\"bg-layer\" style=\"background-image: url({image});\"></div>\n    <div class=\"auto-container\">\n        <div class=\"content-box\">\n            <h1>{titre}</h1>\n            <ul class=\"bread-crumb clearfix\">\n                <li><a href=\"#\">{text}</a></li>\n                <li>{text2}</li>\n            </ul>\n        </div>\n    </div>\n</section>', '5ZcjuXMKPeHks6H1fkbGqpBsfJlLC8-metaQ2FwdHVyZSBk4oCZw6ljcmFuXzEzLTYtMjAyNF8xMTExNTZfY2pta25ld3ZlcnNpb24uY29tLnRlc3QuanBlZw==-.jpg', 'titre,text,text2,image', '2024-06-13 11:15:13', '2024-06-13 11:15:13'),
(12, 'TITRE TEXTE ET IMAGE', '<div class=\"content-one\">\n    <div class=\"text-box\">\n        <h2>{titre}</h2>\n        <p>{text}</p>\n        <br>\n        <figure class=\"image-box\"><img src=\"{image}\" alt=\"{titre}\"></figure>\n    </div>\n</div>', 'UQamqjplBSUinFEGNLhgdyD4d4BQGS-metaQ2FwdHVyZSBk4oCZw6ljcmFuXzEzLTYtMjAyNF8xNDE0MzBfdGVzdF9maWxhbWVudF9qbWsudGVzdC5qcGVn-.jpg', 'titre,text,image', '2024-06-13 14:15:40', '2024-06-13 14:15:40'),
(13, 'RUBRIQUE', '<div class=\"sidebar-widget category-widget\">\n    <ul class=\"category-list clearfix\">\n        {content}\n    </ul>\n</div>;\n<li><a href=\"{lien}\" class=\"current\"><span>{titre}</span><i class=\"flaticon-diagonal-arrow\"></i></a></li>', 'kXE9PovrZ6st7elsWUheFThElliQOM-metaQ2FwdHVyZSBk4oCZw6ljcmFuXzEzLTYtMjAyNF8xNjQ0NV9jam1rbmV3dmVyc2lvbi5jb20udGVzdC5qcGVn-.jpg', 'titre,lien', '2024-06-13 16:46:49', '2024-06-13 16:46:49'),
(14, 'DOCUMENT', '<div class=\"download-widget\">\n    <ul class=\"download-list clearfix\">\n        {content}\n    </ul>\n</div>;\n<li>\n	<div class=\"icon\"><i class=\"flaticon-download-pdf\"></i></div>\n	<h5>{titre}</h5>\n	<button type=\"button\" onclick=\"window.href=\'{lien}\'\"><i class=\"flaticon-download\"></i></button>\n</li>', 'OlWImWw2EJxVSwW8NF5S2q06Bs27iF-metaQ2FwdHVyZSBk4oCZw6ljcmFuXzEzLTYtMjAyNF8xNjUyNDVfY2pta25ld3ZlcnNpb24uY29tLnRlc3QuanBlZw==-.jpg', 'titre,lien', '2024-06-13 16:54:19', '2024-06-13 16:54:19'),
(15, 'BOITE DE CONTACT', '<div class=\"support-widget\">\n    <figure class=\"image-box\"><img src=\"{image}\" alt=\"{titre}\"></figure>\n    <h3>{titre}</h3>\n    <br>\n    <p>{text}</p>\n    <p>\n        </p><ul>\n            <li><i class=\"fa fa-phone\"></i>{numero}</li>\n            <li><a href=\"#\">- - - - - - - - - - - - - - - - - - - - - - - -</a></li>\n            <li><a href=\"mailto:{email}\">{email}</a></li>\n        </ul>\n    <p></p>\n</div>', 'QMmuvR2zHqv88lQFzACYhyfhEhMgN0-metaQ2FwdHVyZSBk4oCZw6ljcmFuXzEzLTYtMjAyNF8xNjU1MzlfY2pta25ld3ZlcnNpb24uY29tLnRlc3QuanBlZw==-.jpg', 'titre,text,image,numero,email', '2024-06-13 17:11:31', '2024-06-13 17:11:31'),
(16, 'TITRE TEXTE ET IMAGE', '<div class=\"content-one\">\n    <div class=\"text-box\">\n        <h2>{titre}</h2>\n        <p>{text}</p>\n        <br>\n        <figure class=\"image-box\"><img src=\"{image}\" alt=\"{titre}\"></figure>\n    </div>\n</div>', 'UqL9yWSuJ2SGbHsWAnVQvh0NrbypsF-metaQ2FwdHVyZSBk4oCZw6ljcmFuXzEzLTYtMjAyNF8xNjU2NTVfY2pta25ld3ZlcnNpb24uY29tLnRlc3QuanBlZw==-.jpg', 'titre,text,image', '2024-06-13 17:14:08', '2024-06-13 17:14:08'),
(17, 'TITRE 4 colonnes de titre et texte', '<div class=\"content-three\">\n    <div class=\"image-box\">\n        <h3>{titre}</h3>\n        <div class=\"row clearfix\">\n            {content}\n        </div>\n    </div>\n</div>;\n<div class=\"col-lg-6 col-md-6 col-sm-12 image-column\">\n	<div class=\"inner-box\">\n		<div class=\"single-item\"><h4>{titre2}</h4><br>{text2}</div>\n		<div class=\"single-item\"><h4>{titre3}</h4><br>{text3}</div>\n	</div>\n</div>', 'r0OaquU16nYK4UTUfpBmosWUAnRWuc-metaQ2FwdHVyZSBk4oCZw6ljcmFuXzEzLTYtMjAyNF8xNzA0OF9jam1rbmV3dmVyc2lvbi5jb20udGVzdC5qcGVn-.jpg', 'titre,titre2,text2,titre3,text3', '2024-06-13 17:23:00', '2024-06-13 17:23:00'),
(18, 'ENTETE PAGE', '<li class=\"dropdown\">\n	<div class=\"\">\n		<span class=\"{icone} icon\"></span>\n		<a href=\"{lien}\">{title}</a>\n	</div>\n	<ul>\n		{content}\n	</ul>\n</li>;\n<li><a href=\"{lien2}\">{title2}</a></li>', 'OpwV1yhi8BF9CGp4RPcw1nPYUtK8mS-metaQ2FwdHVyZSBk4oCZw6ljcmFuXzI2LTYtMjAyNF85MTY0NF90ZXN0X2ZpbGFtZW50X2ptay50ZXN0LmpwZWc=-.jpg', 'title,lien,liste;title2:lien2,icone', '2024-06-26 09:24:03', '2024-06-26 10:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `icone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutontitre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `text`, `icone`, `boutontitre`, `boutonlien`, `created_at`, `updated_at`) VALUES
(6, 'Contactez-nous', '<p>Notre équipe est heureuse de répondre à vos questions. Remplissez le formulaire et nous vous contacterons dès que possible.</p>', NULL, 'Page contact', '/contact.html', '2024-06-26 15:08:32', '2024-06-26 15:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact_data`
--

CREATE TABLE `contact_data` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_prenoms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sujet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lu_approuve` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_data`
--

INSERT INTO `contact_data` (`id`, `nom_prenoms`, `phone`, `email`, `sujet`, `service`, `message`, `lu_approuve`, `created_at`, `updated_at`) VALUES
(6, 'Junior Medard Vianney TCHIMOU', '0747687857', 'tchimouj66@gmail.com', 'TECKO', 'Diagnostic et lutte contre le travail des enfants', 'OK', 'on', '2024-06-26 15:17:50', '2024-06-26 15:17:50'),
(7, 'Junior Medard Vianney TCHIMOU', '0747687857', 'tchimouj66@gmail.com', 'TECKO', 'Négoce de matière première', 'Write', 'on', '2024-06-26 15:22:26', '2024-06-26 15:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `content_viewables`
--

CREATE TABLE `content_viewables` (
  `content_view_id` bigint UNSIGNED NOT NULL,
  `content_viewable_id` bigint UNSIGNED NOT NULL,
  `content_viewable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_viewables`
--

INSERT INTO `content_viewables` (`content_view_id`, `content_viewable_id`, `content_viewable_type`) VALUES
(6, 2, 'App\\Models\\Accueilserviceitem'),
(12, 2, 'App\\Models\\Accueilserviceitem'),
(7, 1, 'App\\Models\\Accueilclientitem'),
(8, 2, 'App\\Models\\Accueilserviceitem'),
(9, 2, 'App\\Models\\Accueilserviceitem'),
(10, 2, 'App\\Models\\Accueilserviceitem'),
(11, 2, 'App\\Models\\Accueilserviceitem'),
(8, 1, 'App\\Models\\Accueilserviceitem'),
(8, 4, 'App\\Models\\Accueilserviceitem'),
(8, 3, 'App\\Models\\Accueilserviceitem'),
(6, 6, 'App\\Models\\Accueilprojetitem');

-- --------------------------------------------------------

--
-- Table structure for table `content_views`
--

CREATE TABLE `content_views` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `content_view_type_id` bigint UNSIGNED NOT NULL,
  `composite_view_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_views`
--

INSERT INTO `content_views` (`id`, `title`, `content`, `priority`, `content_view_type_id`, `composite_view_id`, `created_at`, `updated_at`) VALUES
(6, 'BANNIERE 1080 SERVICES', '[\n {\n   titre: \"Accompagnement des organisations Agricoles\",\n   text: \"Services\",\n   text2: \"Accompagnement des organisations Agricoles\",\n   image: \"http://test_filament_jmk.test/storage/TNFVuEtKZQ4wtasLbN98rWeJYmBNYu-metaYmFuX25lZ29jZS5mdy5wbmc=-.png\",\n},\n]', 0, 11, 11, '2024-06-10 18:03:00', '2024-06-13 16:38:11'),
(7, 'BANNIERE 1080 CLIENTS', '[\n {\n   titre: \"Okay\",\n   text: \"\",\n   text2: \"\",\n   image: \"\",\n },\n]', 0, 11, 11, '2024-06-10 18:26:36', '2024-06-13 16:03:14'),
(8, 'RUBRIQUE SERVICE', '[\n {\n   titre: \"Environnement et Développement durable\",\n   lien: \"https://jmknew.jmkconsulting-ci.com/services/environnement-et-developpement-durable.html\",\n},{\n   titre: \"Accompagnement des organisations Agricoles\",\n   lien: \"https://jmknew.jmkconsulting-ci.com/services/accompagnement-des-organisations-agricoles.html\",\n},{\n   titre: \"Diagnostic et lutte contre le travail des enfants\",\n   lien: \"https://jmknew.jmkconsulting-ci.com/services/diagnostic-et-lutte-contre-le-travail-des-enfants.html\",\n},{\n   titre: \"Négoce de matière première\",\n   lien: \"https://jmknew.jmkconsulting-ci.com/services/negoce-de-matiere-premiere.html\",\n},{\n   titre: \"Agriculture Intelligente &amp; Innovante\",\n   lien: \"https://jmknew.jmkconsulting-ci.com/services/agriculture-intelligente-innovante.html\",\n},{\n   titre: \"Développement des entreprises\",\n   lien: \"https://jmknew.jmkconsulting-ci.com/services/developpement-des-entreprises.html\",\n},{\n   titre: \"Etude et gestion de projets\",\n   lien: \"https://jmknew.jmkconsulting-ci.com/services/etude-et-gestion-de-projets.html\",\n},{\n   titre: \"Bâtiment et Travaux Publics\",\n   lien: \"https://jmknew.jmkconsulting-ci.com/services/batiment-et-travaux-publics.html\",\n},{\n   titre: \"Incubation des organisations agricoles\",\n   lien: \"https://jmknew.jmkconsulting-ci.com/services/incubation-des-organisations-agricoles.html\",\n},\n]', 0, 13, 13, '2024-06-10 18:35:18', '2024-06-19 11:45:11'),
(9, 'LISTE DOCUMENT', '[\n {\n   titre: \"Rapport CDC\",\n   lien: \"http://test_filament_jmk.test/storage/NaEXP097acg9hOS223jwjm2QLpPmmk-metaT0ZGUkVfVEVDSE5JUVVFX0NEQy5wZGY=-.pdf\",\n},{\n   titre: \"Rapport CCB\",\n   lien: \"http://test_filament_jmk.test/storage/NaEXP097acg9hOS223jwjm2QLpPmmk-metaT0ZGUkVfVEVDSE5JUVVFX0NEQy5wZGY=-.pdf\",\n},\n]', 1, 13, 14, '2024-06-11 15:14:02', '2024-06-14 10:52:56'),
(10, 'BOITE DE CONTACT', '[\n {\n   titre: \"Avez-vous un Projet?\",\n   text: \"Nous vous fournissons toutes l\'aide nécessaire !<br>Contactez-nous\",\n   image: \"http://test_filament_jmk.test/storage/QkZIXSqSGFWeyoIasmeQGWtp7Eqxc1-metaaGVscC5mdy5wbmc=-.png\",\n   numero: \"+2250709095378\",\n   email: \"infos@jmkconsulting-ci.com\",\n},\n]', 2, 13, 15, '2024-06-11 15:27:03', '2024-06-14 10:55:46'),
(11, 'TITRE TEXTE ET IMAGE', '[\n {\n   titre: \"Négoce de matières premières\",\n   text: \"Nous appuyant sur notre connaissance approfondie des besoins spécifiques des producteurs de matières premières (cacao, café, cajou, coton) en Côte d’Ivoire et en Afrique de l’Ouest, JMK Consulting Consulting s’est fait connaître et se développe en tant que fournisseur majeur des grossistes locaux et internationaux. Nous travaillons avec le monde entier et conseillons en négoce de matières premières.\n<br>Par notre rôle de conseil et distribution, nous sommes à l\'écoute de nos clients, essentiellement des coopératives et des associations de producteurs de matières premières (cacao, café, cajou), afin de leur proposer des solutions pertinentes et adaptées à leur contexte.\",\n   image: \"http://test_filament_jmk.test/storage/qDJhqgwwOC34lZH93A15rFrRgOu26q-metaY29jb2EtaWNjb18wLmpwZw==-.jpg\",\n},\n]', 0, 14, 16, '2024-06-11 15:44:15', '2024-06-14 11:07:29'),
(12, 'TITRE ET QUATRE COLONNES DE TEXTE', '[\n {\n   titre: \"Pourquoi choisir JMK consulting Company?\",\n   titre2: \"Un savoir-faire adapté:\",\n   text2: \"Grâce au savoir-faire, nous informons et conseillons nos clients producteurs, tout au long du cycle de production sur les itinéraires culturaux.\",\n   titre3: \"Approvisionnement sur mesure:\",\n   text3: \"Nous veillons à respecter et à rappeler la réglementation ainsi que les bonnes pratiques agricoles et d’utilisation des produits d\'agrofournitures.\",\n},{\n   titre: \"Pourquoi choisir JMK consulting Company?\",\n   titre2: \"Un savoir-faire adapté:\",\n   text2: \"Grâce au savoir-faire, nous informons et conseillons nos clients producteurs, tout au long du cycle de production sur les itinéraires culturaux.\",\n   titre3: \"Approvisionnement sur mesure:\",\n   text3: \"Nous veillons à respecter et à rappeler la réglementation ainsi que les bonnes pratiques agricoles et d’utilisation des produits d\'agrofournitures.\",\n},\n]', 1, 14, 17, '2024-06-11 15:55:03', '2024-06-14 11:14:38'),
(13, 'ENTETE PAGE HTML CONTENU', '[\n {\n   title: \"Nous découvrir\",\n   lien: \"#\",\n   liste: [\n     { title2: \"Notre mission\", lien2: \"/notre-mission.html\"},\n     { title2: \"Notre vision\", lien2: \"/notre-vision.html\"},\n     { title2: \"Nos valeurs\", lien2: \"/nos-valeurs.html\"},\n     { title2: \"Notre equipe\", lien2: \"/notre-equipe.html\"},\n   ],\n   icone: \"ag-advans_globe\",\n},{\n   title: \"Notre métier\",\n   lien: \"#\",\n   liste: [\n     { title2: \"Nos services\", lien2: \"/nos-services.html\"},\n     { title2: \"Nos produits\", lien2: \"/nos-produits.html\"},\n     { title2: \"Notre impact\", lien2: \"/notre-impact.html\"},\n     { title2: \"Nos projets/activités\", lien2: \"/nos-projetsactivits.html\"},\n   ],\n   icone: \"ag-advans_profil\",\n},{\n   title: \"Carrière\",\n   lien: \"#\",\n   liste: [\n     { title2: \"Notre culture\", lien2: \"/notre-culture.html\"},\n     { title2: \"Nos opportunités\", lien2: \"/nos-opportunits.html\"},\n     { title2: \"Nous réjoindre\", lien2: \"/nous-rejoindre.html\"},\n   ],\n   icone: \"ag-advans_aboutus\",\n},{\n   title: \"Media\",\n   lien: \"#\",\n   liste: [\n     { title2: \"Actualités\", lien2: \"/actualites.html\"},\n     { title2: \"Publications\", lien2: \"/publications.html\"},\n     { title2: \"Photos\", lien2: \"/photos.html\"},\n     { title2: \"Vidéos\", lien2: \"/videos.html\"},\n   ],\n   icone: \"ag-advans_media\",\n},{\n   title: \"Consortium\",\n   lien: \"#\",\n   liste: [\n     { title2: \"JMK Consulting Caompany\", lien2: \"/jmk-consulting-caompany.html\"},\n     { title2: \"Génie Bio\", lien2: \"/genie-bio.html\"},\n     { title2: \"Sicadevd\", lien2: \"/sicadevd.html\"},\n   ],\n   icone: \"newicon newicon-farmer-1\",\n},{\n   title: \"Nos Projets\",\n   lien: \"/nos-projetsactivits.html\",\n   liste: [],\n   icone: \"newicon newicon-professions-and-jobs\",\n},\n]', 0, 15, 18, '2024-06-26 09:41:50', '2024-06-26 12:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `content_view_types`
--

CREATE TABLE `content_view_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_view_types`
--

INSERT INTO `content_view_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(11, 'BANNIERE 1080', '2024-06-10 17:49:27', '2024-06-10 17:49:27'),
(13, 'COMPOSANT DE BARRE LATERAL', '2024-06-11 15:13:15', '2024-06-11 15:13:15'),
(14, 'CORPS DE LA PAGE', '2024-06-11 15:42:48', '2024-06-11 15:42:48'),
(15, 'ENTETE PAGE HTMl', '2024-06-26 09:25:16', '2024-06-26 09:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `file`, `created_at`, `updated_at`) VALUES
(6, 'MANUEL PROCEDURE', 'SoQ72CV4iX8mIFM8H0bE3zuykWp5G1-metaMTkwNDIwMjQgLSAzMDA0MjAyNC5wZGY=-.pdf', '2024-06-10 16:46:25', '2024-06-10 16:46:25'),
(7, 'Rapport CDC', 'NaEXP097acg9hOS223jwjm2QLpPmmk-metaT0ZGUkVfVEVDSE5JUVVFX0NEQy5wZGY=-.pdf', '2024-06-12 14:05:36', '2024-06-12 14:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `equipes`
--

CREATE TABLE `equipes` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accueiltemoin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipes`
--

INSERT INTO `equipes` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `nom_prenom`, `fonction`, `accueiltemoin_id`, `created_at`, `updated_at`) VALUES
(1, 'NOTRE EQUIPE', 'EQUIPE JMK', '<blockquote>Je sors de ce séminaire de formation avec une idée claire sur l’itinéraire technique et les protocoles à respecter pour réussir Cacao Trace, un cacao Durableau chocolat plus Goûteux de notre partenaire Puratos. Je suis rassuré en tant que coordinatrice de zone, mes encadreurs pourront désormais accompagner avec efficacité nos producteurs.</blockquote>', NULL, NULL, 'M18rwnS4afXDLVT8o6B5rzL9rAlZaY-metaY2Vtb2ktbXlhby5mdy5wbmc=-.png', 'cemoi-myao.fw', 'Yao Nicoas', 'Coordinateur Régional - CEMOI', 1, '2024-05-20 15:05:25', '2024-05-20 15:14:18'),
(2, 'NOTRE EQUIPE', 'EQUIPE DE JMK', '<blockquote>Je sors de ce séminaire de formation avec une idée claire sur l’itinéraire technique et les protocoles à respecter pour réussir Cacao Trace, un cacao Durableau chocolat plus Goûteux de notre partenaire Puratos. Je suis rassuré en tant que coordinatrice de zone, mes encadreurs pourront désormais accompagner avec efficacité nos producteurs.”</blockquote>', NULL, NULL, '0lnvWWGESlRwR0igcepTp3ToXGAhrk-metaYmxhbmRpbmUuZncucG5n-.png', 'blandine', 'Blandine N\'guessan', 'Coordinatrice de zone - Zamacom Daloa', 1, '2024-05-20 15:13:14', '2024-05-20 15:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE `formations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeformation_id` bigint UNSIGNED DEFAULT NULL,
  `accueilformation_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`id`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `typeformation_id`, `accueilformation_id`, `created_at`, `updated_at`) VALUES
(1, 'Formation des pépiniéristes CEMOI', '<p>&nbsp;Vingt-huit (28) pépiniéristes de la région de la NAWA dans le sud-ouest de la Côte d\'Ivoire engagé dans le...</p>', 'Voir plus', '/formationpepiniere.html', 'JkLQggjElDoOtX9hLNwAbvrgUTjmDh-metaZm9ybWF0aW9uLXphbWFjb20uZncucG5n-.png', 'formation zamacom', 1, 1, '2024-05-20 12:35:59', '2024-05-20 12:35:59'),
(2, 'Formation Cacao Trace - SOCA2PD', '<p>&nbsp;Agriculture durable, sécurité alimentaire, transformation et distribution de colis alimentaires e ...</p>', 'Lire plus', '/formationcacaotrace.html', '6Ba8wsmNbYf68Ahoy0vtV8fh40gHbj-metaY2FjYW8tZT1jc3AuZncucG5n-.png', 'Soca2pd', 2, 1, '2024-05-20 12:38:43', '2024-05-20 12:38:43'),
(3, 'Formation Cacao Trace - ECOM', '<p>&nbsp;Engagé dans le programme de durabilité CacaoTrace de Chocolatier Belge Puratos, Jmk Consulting dans ...</p>', 'Lire plus', '/formations/formationcacaotrace.html', 'dA5VjHrqQxPQGB36p3y8HxohgLeazS-metaZm9ybWF0aW9uLWRpdm8uZncucG5n-.png', 'Formation divo', 3, 1, '2024-05-20 12:40:50', '2024-06-25 16:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `photo`, `created_at`, `updated_at`) VALUES
(6, 'MENU TAB A9', 'g1vLDD6mL3nwIn1jtyAK9dMw9RNc5L-metaMDEucG5n-.png', '2024-06-10 17:13:59', '2024-06-10 17:13:59'),
(7, 'Images bannières de la page services', 'TNFVuEtKZQ4wtasLbN98rWeJYmBNYu-metaYmFuX25lZ29jZS5mdy5wbmc=-.png', '2024-06-12 12:19:56', '2024-06-12 16:42:03'),
(8, 'Image de bloc contact', 'QkZIXSqSGFWeyoIasmeQGWtp7Eqxc1-metaaGVscC5mdy5wbmc=-.png', '2024-06-12 14:17:21', '2024-06-12 14:17:21'),
(9, 'Négoce de matières premières', 'qDJhqgwwOC34lZH93A15rFrRgOu26q-metaY29jb2EtaWNjb18wLmpwZw==-.jpg', '2024-06-12 16:29:09', '2024-06-12 16:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `lienfooters`
--

CREATE TABLE `lienfooters` (
  `id` bigint UNSIGNED NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien_page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descript` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienfooters`
--

INSERT INTO `lienfooters` (`id`, `titre`, `lien_page`, `descript`, `created_at`, `updated_at`) VALUES
(1, 'À propos', '/a-propos.html', '<p>À propos</p>', '2024-05-20 15:21:06', '2024-05-20 15:21:06'),
(2, 'Négoce', '/services-detail-negoce.html', '<p><a href=\"http://test_filament_jmk.test/services-detail-negoce.html\">Négoce</a></p>', '2024-05-20 15:26:35', '2024-05-20 15:26:35'),
(3, 'Contacts', '/contact.html', '<p><a href=\"http://test_filament_jmk.test/contact.html\">Contacts</a></p>', '2024-05-20 15:27:32', '2024-05-20 15:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_12_000001_create_accueilabouts_table', 1),
(6, '2024_05_12_000002_create_accueilactus_table', 1),
(7, '2024_05_12_000003_create_accueilclients_table', 1),
(8, '2024_05_12_000004_create_accueilclientitems_table', 1),
(9, '2024_05_12_000005_create_accueilformations_table', 1),
(10, '2024_05_12_000006_create_accueilmanagers_table', 1),
(11, '2024_05_12_000007_create_accueilmanageritems_table', 1),
(12, '2024_05_12_000008_create_accueilservices_table', 1),
(13, '2024_05_12_000009_create_accueilserviceitems_table', 1),
(14, '2024_05_12_000010_create_accueiltemoins_table', 1),
(15, '2024_05_12_000011_create_accueilvideos_table', 1),
(16, '2024_05_12_000012_create_actualites_table', 1),
(17, '2024_05_12_000013_create_equipes_table', 1),
(18, '2024_05_12_000014_create_formations_table', 1),
(19, '2024_05_12_000015_create_lienfooters_table', 1),
(20, '2024_05_12_000016_create_partners_table', 1),
(21, '2024_05_12_000017_create_settings_table', 1),
(22, '2024_05_12_000018_create_slides_table', 1),
(23, '2024_05_12_000019_create_typeformations_table', 1),
(24, '2024_05_12_009001_add_foreigns_to_accueilclientitems_table', 1),
(25, '2024_05_12_009002_add_foreigns_to_accueilmanageritems_table', 1),
(26, '2024_05_12_009003_add_foreigns_to_accueilserviceitems_table', 1),
(27, '2024_05_12_009004_add_foreigns_to_actualites_table', 1),
(28, '2024_05_12_009005_add_foreigns_to_equipes_table', 1),
(29, '2024_05_12_009006_add_foreigns_to_formations_table', 1),
(30, '2024_05_12_162314_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `imagetitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descript` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `imagetitle`, `image`, `descript`, `created_at`, `updated_at`) VALUES
(1, 'Advans', 'hIDb3zm4A3i3PGilYiRMYdPZY6iQSr-metaQWR2YW5zLmpwZw==-.jpg', NULL, '2024-05-20 10:09:56', '2024-05-20 10:09:56'),
(2, 'Agritera', 'TmbC3eDJfKUwXgKJHwaE3ipQSL6Bks-metaQWdyaXRlcmEucG5n-.png', NULL, '2024-05-20 10:12:06', '2024-05-20 10:12:06'),
(3, 'Cargill', '8BPchGUJtvbKTPY3sscwAp54qdfXxh-metaQ2FyZ2lsbC1sb2dvLnBuZw==-.png', NULL, '2024-05-20 10:14:23', '2024-05-20 10:14:23'),
(4, 'CCB', 'WT7uyiAdh97Za9kZPv7UxyGgkryjeu-metaQ0NCLmpwZw==-.jpg', NULL, '2024-05-20 10:15:11', '2024-05-20 10:15:11'),
(5, 'Cemoi', 'oAx4czU17P6DeZNabaYPOUqAzG1SPC-metaY2Vtb2kuanBn-.jpg', NULL, '2024-05-20 10:16:09', '2024-05-20 10:16:09'),
(6, 'Ecakoog', 'dCuyYVbxstoaoNhkLAzSEl4KXbYgOU-metaZWNha29vZy5qcGc=-.jpg', NULL, '2024-05-20 10:17:55', '2024-05-20 10:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list accueilabouts', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(2, 'view accueilabouts', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(3, 'create accueilabouts', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(4, 'update accueilabouts', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(5, 'delete accueilabouts', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(6, 'list accueilactus', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(7, 'view accueilactus', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(8, 'create accueilactus', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(9, 'update accueilactus', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(10, 'delete accueilactus', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(11, 'list accueilclients', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(12, 'view accueilclients', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(13, 'create accueilclients', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(14, 'update accueilclients', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(15, 'delete accueilclients', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(16, 'list accueilclientitems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(17, 'view accueilclientitems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(18, 'create accueilclientitems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(19, 'update accueilclientitems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(20, 'delete accueilclientitems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(21, 'list accueilformations', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(22, 'view accueilformations', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(23, 'create accueilformations', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(24, 'update accueilformations', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(25, 'delete accueilformations', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(26, 'list accueilmanagers', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(27, 'view accueilmanagers', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(28, 'create accueilmanagers', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(29, 'update accueilmanagers', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(30, 'delete accueilmanagers', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(31, 'list accueilmanageritems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(32, 'view accueilmanageritems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(33, 'create accueilmanageritems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(34, 'update accueilmanageritems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(35, 'delete accueilmanageritems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(36, 'list accueilservices', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(37, 'view accueilservices', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(38, 'create accueilservices', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(39, 'update accueilservices', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(40, 'delete accueilservices', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(41, 'list accueilserviceitems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(42, 'view accueilserviceitems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(43, 'create accueilserviceitems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(44, 'update accueilserviceitems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(45, 'delete accueilserviceitems', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(46, 'list accueiltemoins', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(47, 'view accueiltemoins', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(48, 'create accueiltemoins', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(49, 'update accueiltemoins', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(50, 'delete accueiltemoins', 'web', '2024-05-18 21:50:16', '2024-05-18 21:50:16'),
(51, 'list accueilvideos', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(52, 'view accueilvideos', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(53, 'create accueilvideos', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(54, 'update accueilvideos', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(55, 'delete accueilvideos', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(56, 'list actualites', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(57, 'view actualites', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(58, 'create actualites', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(59, 'update actualites', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(60, 'delete actualites', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(61, 'list equipes', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(62, 'view equipes', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(63, 'create equipes', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(64, 'update equipes', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(65, 'delete equipes', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(66, 'list formations', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(67, 'view formations', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(68, 'create formations', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(69, 'update formations', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(70, 'delete formations', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(71, 'list lienfooters', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(72, 'view lienfooters', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(73, 'create lienfooters', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(74, 'update lienfooters', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(75, 'delete lienfooters', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(76, 'list partners', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(77, 'view partners', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(78, 'create partners', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(79, 'update partners', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(80, 'delete partners', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(81, 'list settings', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(82, 'view settings', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(83, 'create settings', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(84, 'update settings', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(85, 'delete settings', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(86, 'list slides', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(87, 'view slides', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(88, 'create slides', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(89, 'update slides', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(90, 'delete slides', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(91, 'list typeformations', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(92, 'view typeformations', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(93, 'create typeformations', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(94, 'update typeformations', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(95, 'delete typeformations', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(96, 'list roles', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(97, 'view roles', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(98, 'create roles', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(99, 'update roles', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(100, 'delete roles', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(101, 'list permissions', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(102, 'view permissions', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(103, 'create permissions', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(104, 'update permissions', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(105, 'delete permissions', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(106, 'list users', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(107, 'view users', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(108, 'create users', 'web', '2024-05-18 21:50:18', '2024-05-18 21:50:18'),
(109, 'update users', 'web', '2024-05-18 21:50:19', '2024-05-18 21:50:19'),
(110, 'delete users', 'web', '2024-05-18 21:50:19', '2024-05-18 21:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(2, 'super-admin', 'web', '2024-05-18 21:50:19', '2024-05-18 21:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(87, 2),
(88, 2),
(89, 2),
(90, 2),
(91, 2),
(92, 2),
(93, 2),
(94, 2),
(95, 2),
(96, 2),
(97, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2),
(102, 2),
(103, 2),
(104, 2),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(109, 2),
(110, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defaut_lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'fr',
  `position_site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_social` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lien_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `nom_site`, `logo_site`, `contact_site`, `email_site`, `defaut_lang`, `position_site`, `list_social`, `lien_contact`, `created_at`, `updated_at`) VALUES
(6, 'JMK CONSULTING COMPANY', 'CDEISa7mQ6HSsLuDJFIUKJyvFmaCEn-metabG9nbzE3NXg0NS5wbmc=-.png', '+225 0709095378', 'infos@jmkconsulting-ci.com', 'fr', 'Abidjan - Cocody Angré 8eme Tranche (Carrefour prière)', '<pre>&lt;li&gt;&lt;a href=\"#\"&gt;&lt;i class=\"fa-brands fa-facebook\"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt;\n&lt;li&gt;&lt;a href=\"#\"&gt;&lt;i class=\"fa-brands fa-square-twitter\"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt;\n&lt;li&gt;&lt;a href=\"#\"&gt;&lt;i class=\"fab fa-linkedin\"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt;</pre>', '/contacts', '2024-05-19 03:06:03', '2024-06-10 07:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soustitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutontitre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `soustitle`, `image`, `boutontitre`, `boutonlien`, `icone`, `created_at`, `updated_at`) VALUES
(1, '<pre>Conseil en Négoce &lt;span&gt;des matières premières&lt;/span&gt;</pre>', '<p>Avec un si grand nombre de parties prenantes travaillant dansde la chaîne d\'approvisionnement nous gerons pour vous les risques associés à vos operation.</p>', 'IzhEOtLFTjRWrDtPMwtNrRVusMYTo4-metac2xpZGUtbmVnb2NlMS5qcGc=-.jpg', 'Lire Plus', '/services-detail-negoce.html', 'flaticon-star-1', '2024-05-19 03:03:18', '2024-06-05 09:13:42'),
(2, '<pre>Conseil en  développement&lt;span&gt;et gestion des entreprises.&lt;span&gt;</pre>', '<p>Nous accompagnons de manière élégante et durable des particuliers, des entrepreneurs et des entreprises dans de nombreux développements passionnants en Côte d’Ivoire et à destination de l’Afrique.&nbsp;</p>', 'glAHOKzXZBMtdVj7OIwL5bJySlYlXb-metac2xpZGUtZ2VzdGlvbi5qcGc=-.jpg', 'Lire Plus', '/services-detail-entreprise.html', NULL, '2024-05-28 10:28:57', '2024-06-05 09:20:48'),
(3, '<pre> Agriculture&lt;span&gt;Durable et innovante&lt;/span&gt;</pre>', '<p>Nous formons les agriculteurs et les associations agricoles à développer une agriculture adaptable aux conditions climatiques par une gestion rationnelle de l’eau et la mise en œuvre des meilleures pratiques agricoles.</p>', 'svzO3QhcBkPN4pibEdCcxjx4ksj6Ej-metaYWdyaS1pbnQtLXNsaWRlLnBuZw==-.png', 'Lire Plus', '/services-detail-agriculture.html', NULL, '2024-05-28 10:41:16', '2024-06-10 08:26:40'),
(5, '<pre>Import &amp; Export&lt;span&gt;de matières premières&lt;/span&gt;</pre>', '<p>&nbsp;Nous assurons les opérations techniques d’exportation des matières premières depuis l’approvisionnement, le conditionnement et la démarche d’exportation avec un système de traçabilité efficace.&nbsp;</p>', '8w1o1epTllV9dvAhahaQ4w034k1Fjw-metaZXBkZjR3YzYucG5n-.png', 'Lire Plus', '/service-detail-import.html', NULL, '2024-06-05 10:13:06', '2024-06-05 10:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `typeformations`
--

CREATE TABLE `typeformations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `icone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typeformations`
--

INSERT INTO `typeformations` (`id`, `title`, `text`, `icone`, `created_at`, `updated_at`) VALUES
(1, 'Formation', '<p>Toutes activités de formation</p>', 'flaticon-strategy', '2024-05-20 11:52:09', '2024-05-20 11:54:09'),
(2, 'Agro-Foresterie', '<p>Toutes activités de agro-foresterie&nbsp;</p>', 'flaticon-strategy', '2024-05-20 11:52:09', '2024-05-20 12:14:15'),
(3, 'Accompagnement', '<p>Toutes activités de accompagnement&nbsp;</p>', 'flaticon-strategy', '2024-05-20 11:52:09', '2024-05-20 12:14:49'),
(4, 'Etude', '<p>Toutes activités d etude</p>', 'flaticon-strategy', '2024-05-20 11:52:09', '2024-05-20 12:15:22'),
(5, 'AGR', '<p>Toutes activités de AGR</p>', 'flaticon-strategy', '2024-05-20 11:52:09', '2024-05-20 12:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'BROU ALBERT', 'admin@admin.com', '2024-05-18 21:50:16', '$2y$10$IEyru7R76F0xiIDEmf0aAuCqOVFNIkgDU6IAjzL.9gnMypx2ulTxy', '08HlF3zoxTIRaaXOcKWL2hMUyrL5SqZsz3S6T2Owbq89cj8VJFc76APGOVYI', 1, '2024-05-18 21:50:16', '2024-05-19 04:16:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accueilabouts`
--
ALTER TABLE `accueilabouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accueilactus`
--
ALTER TABLE `accueilactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accueilclientitems`
--
ALTER TABLE `accueilclientitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accueilclientitems_accueilclient_id_foreign` (`accueilclient_id`);

--
-- Indexes for table `accueilclients`
--
ALTER TABLE `accueilclients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accueilformations`
--
ALTER TABLE `accueilformations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accueilmanageritems`
--
ALTER TABLE `accueilmanageritems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accueilmanageritems_accueilmanager_id_foreign` (`accueilmanager_id`);

--
-- Indexes for table `accueilmanagers`
--
ALTER TABLE `accueilmanagers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accueilprojetitems`
--
ALTER TABLE `accueilprojetitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accueilserviceitems`
--
ALTER TABLE `accueilserviceitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accueilserviceitems_accueilservice_id_foreign` (`accueilservice_id`);

--
-- Indexes for table `accueilservices`
--
ALTER TABLE `accueilservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accueiltemoins`
--
ALTER TABLE `accueiltemoins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accueilvideos`
--
ALTER TABLE `accueilvideos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actualites_typeformation_id_foreign` (`typeformation_id`),
  ADD KEY `actualites_accueilactu_id_foreign` (`accueilactu_id`);

--
-- Indexes for table `composite_views`
--
ALTER TABLE `composite_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_data`
--
ALTER TABLE `contact_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_viewables`
--
ALTER TABLE `content_viewables`
  ADD KEY `content_viewables_content_viewable_id_index` (`content_viewable_id`),
  ADD KEY `content_viewables_content_viewable_type_index` (`content_viewable_type`),
  ADD KEY `content_viewables_content_view_id_foreign` (`content_view_id`);

--
-- Indexes for table `content_views`
--
ALTER TABLE `content_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_views_content_view_type_id_foreign` (`content_view_type_id`);

--
-- Indexes for table `content_view_types`
--
ALTER TABLE `content_view_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipes_accueiltemoin_id_foreign` (`accueiltemoin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formations_typeformation_id_foreign` (`typeformation_id`),
  ADD KEY `formations_accueilformation_id_foreign` (`accueilformation_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lienfooters`
--
ALTER TABLE `lienfooters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeformations`
--
ALTER TABLE `typeformations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accueilabouts`
--
ALTER TABLE `accueilabouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilactus`
--
ALTER TABLE `accueilactus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilclientitems`
--
ALTER TABLE `accueilclientitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `accueilclients`
--
ALTER TABLE `accueilclients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilformations`
--
ALTER TABLE `accueilformations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilmanageritems`
--
ALTER TABLE `accueilmanageritems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `accueilmanagers`
--
ALTER TABLE `accueilmanagers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilprojetitems`
--
ALTER TABLE `accueilprojetitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `accueilserviceitems`
--
ALTER TABLE `accueilserviceitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `accueilservices`
--
ALTER TABLE `accueilservices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueiltemoins`
--
ALTER TABLE `accueiltemoins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilvideos`
--
ALTER TABLE `accueilvideos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `composite_views`
--
ALTER TABLE `composite_views`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_data`
--
ALTER TABLE `contact_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `content_views`
--
ALTER TABLE `content_views`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `content_view_types`
--
ALTER TABLE `content_view_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lienfooters`
--
ALTER TABLE `lienfooters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `typeformations`
--
ALTER TABLE `typeformations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accueilclientitems`
--
ALTER TABLE `accueilclientitems`
  ADD CONSTRAINT `accueilclientitems_accueilclient_id_foreign` FOREIGN KEY (`accueilclient_id`) REFERENCES `accueilclients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `accueilmanageritems`
--
ALTER TABLE `accueilmanageritems`
  ADD CONSTRAINT `accueilmanageritems_accueilmanager_id_foreign` FOREIGN KEY (`accueilmanager_id`) REFERENCES `accueilmanagers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `accueilserviceitems`
--
ALTER TABLE `accueilserviceitems`
  ADD CONSTRAINT `accueilserviceitems_accueilservice_id_foreign` FOREIGN KEY (`accueilservice_id`) REFERENCES `accueilservices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `actualites`
--
ALTER TABLE `actualites`
  ADD CONSTRAINT `actualites_accueilactu_id_foreign` FOREIGN KEY (`accueilactu_id`) REFERENCES `accueilactus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actualites_typeformation_id_foreign` FOREIGN KEY (`typeformation_id`) REFERENCES `typeformations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content_viewables`
--
ALTER TABLE `content_viewables`
  ADD CONSTRAINT `content_viewables_content_view_id_foreign` FOREIGN KEY (`content_view_id`) REFERENCES `content_views` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content_views`
--
ALTER TABLE `content_views`
  ADD CONSTRAINT `content_views_content_view_type_id_foreign` FOREIGN KEY (`content_view_type_id`) REFERENCES `content_view_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipes`
--
ALTER TABLE `equipes`
  ADD CONSTRAINT `equipes_accueiltemoin_id_foreign` FOREIGN KEY (`accueiltemoin_id`) REFERENCES `accueiltemoins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_accueilformation_id_foreign` FOREIGN KEY (`accueilformation_id`) REFERENCES `accueilformations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formations_typeformation_id_foreign` FOREIGN KEY (`typeformation_id`) REFERENCES `typeformations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
