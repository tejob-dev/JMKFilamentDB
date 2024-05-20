-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 20 mai 2024 à 21:52
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
-- Base de données : `testfilamentjmk`
--

-- --------------------------------------------------------

--
-- Structure de la table `accueilabouts`
--

CREATE TABLE `accueilabouts` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `subservice` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetextlist` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueilabouts`
--

INSERT INTO `accueilabouts` (`id`, `section`, `title`, `text`, `subservice`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `imagetextlist`, `created_at`, `updated_at`) VALUES
(1, 'JMK CONSULTING', 'Une agriculture durable', '<p>Créateur de compétences, d’innovation et d’opportunités. Nous vous accompagnons dans votre développement stratégique au quotidien. Nous opérons dans les secteurs du négoce de matières premières, le conseil en développement des entreprises, le conseil en études et gestion des projets, l’incubation pour les organisations agricoles, l’import-export et le conseil en gestion comptable et financière…</p>', '<pre>&lt;li&gt;Formation et encadrement&lt;/li&gt;\n&lt;li&gt;Accompagnement de coopératives&lt;/li&gt;\n&lt;li&gt;Accompagnement communautaire&lt;/li&gt;</pre>', 'Voir plus', '/voirplus.html', 'OMRqoZ61ofY3WNoNfyDU1NYtsynyM0-metaYWNjdWVpbC1hZ3JvLmZ3LnBuZw==-.png', 'CERTIFIÉ En Agriculture', '<pre>&lt;div class=\"circle-box\"&gt;\n    &lt;span class=\"curved-circle\"&gt;Environnementt&lt;/span&gt;\n    &lt;span class=\"curved-circle-2\"&gt;Négoce&lt;/span&gt;\n    &lt;span class=\"curved-circle-3\"&gt;Gestion d\'entreprise&lt;/span&gt;\n    &lt;span class=\"curved-circle-4\"&gt;Incubation&lt;/span&gt;\n&lt;/div&gt;\n&lt;div class=\"dot-box\"&gt;\n    &lt;span class=\"dot dot-1\"&gt;&lt;/span&gt;\n    &lt;span class=\"dot dot-2\"&gt;&lt;/span&gt;\n    &lt;span class=\"dot dot-3\"&gt;&lt;/span&gt;\n    &lt;span class=\"dot dot-4\"&gt;&lt;/span&gt;\n&lt;/div&gt;</pre>', '2024-05-19 19:44:58', '2024-05-19 21:02:31');

-- --------------------------------------------------------

--
-- Structure de la table `accueilactus`
--

CREATE TABLE `accueilactus` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueilactus`
--

INSERT INTO `accueilactus` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `created_at`, `updated_at`) VALUES
(1, 'JMK ACTUS', 'Nos dernières actus', NULL, NULL, NULL, NULL, NULL, '2024-05-20 13:44:47', '2024-05-20 13:44:47');

-- --------------------------------------------------------

--
-- Structure de la table `accueilclientitems`
--

CREATE TABLE `accueilclientitems` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accueilclient_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueilclientitems`
--

INSERT INTO `accueilclientitems` (`id`, `title`, `text`, `boutontitre`, `boutonlien`, `icone`, `image`, `accueilclient_id`, `created_at`, `updated_at`) VALUES
(1, 'Cacao Trace - ECOM', '<p>&nbsp;Engagé dans le programme de durabilité CacaoTrace de Chocolatier Belge Puratos, Jmk Consulting dans...</p>', 'Lire plus', NULL, 'flaticon-searching', 'NnAeZWVxRwEX5RhS9TU0G8L0ClxObS-metaY2FjYW90cmFjZS53ZWJw-.webp', 1, '2024-05-20 10:47:48', '2024-05-20 11:26:33'),
(2, 'Pépiniéristes CEMOI', '<p>&nbsp;Vingt-huit (28) pépiniéristes de la région de la NAWA dans le sud-ouest de la Côte d\'Ivoire engagé dans le ...</p>', 'Lire plus', NULL, 'flaticon-searching', '2Oqk9Mob3Plw9GQpyoRu0j4rJ21Maz-metaY2Vtb2kuanBn-.jpg', 1, '2024-05-20 10:47:48', '2024-05-20 11:08:28'),
(3, 'Cacao Trace - SOCA2PD', '<p>&nbsp;Agriculture durable, sécurité alimentaire, transformation et distribution de colis alimentaires et ...</p>', 'Lire plus', NULL, 'flaticon-searching', 'NnAeZWVxRwEX5RhS9TU0G8L0ClxObS-metaY2FjYW90cmFjZS53ZWJw-.webp', 1, '2024-05-20 10:47:48', '2024-05-20 11:26:13');

-- --------------------------------------------------------

--
-- Structure de la table `accueilclients`
--

CREATE TABLE `accueilclients` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueilclients`
--

INSERT INTO `accueilclients` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `imagetitle`, `image`, `created_at`, `updated_at`) VALUES
(1, 'NOS CLIENTS', 'Des clients de confiances avec qui nous colaborons', NULL, NULL, NULL, NULL, NULL, '2024-05-20 10:34:51', '2024-05-20 10:34:51');

-- --------------------------------------------------------

--
-- Structure de la table `accueilformations`
--

CREATE TABLE `accueilformations` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueilformations`
--

INSERT INTO `accueilformations` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `imagetitle`, `image`, `created_at`, `updated_at`) VALUES
(1, 'NOUS CHOISIR POUR', 'La formation de vos agents', NULL, NULL, NULL, NULL, NULL, '2024-05-20 11:47:24', '2024-05-20 11:47:24');

-- --------------------------------------------------------

--
-- Structure de la table `accueilmanageritems`
--

CREATE TABLE `accueilmanageritems` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `icone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accueilmanager_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueilmanageritems`
--

INSERT INTO `accueilmanageritems` (`id`, `title`, `text`, `icone`, `boutontitre`, `boutonlien`, `accueilmanager_id`, `created_at`, `updated_at`) VALUES
(1, 'Formation Cacao Trace - ECOM', '<p>&nbsp;Engagé dans le programme de durabilité CacaoTrace de Chocolatier Belge Puratos.</p>', 'flaticon-customer-service', 'Savoir plus', '/formationcacaotrace.html', 1, '2024-05-20 09:02:54', '2024-05-20 09:58:33'),
(2, 'Formation des pépiniéristes', '<p>&nbsp;Vingt-huit (28) pépiniéristes de la région de la NAWA dans le sud-ouest de la Côte d\'Ivoire.</p>', 'flaticon-strategy', 'Savoir plus', '/formationcemoi.html', 1, '2024-05-20 09:07:12', '2024-05-20 10:07:33');

-- --------------------------------------------------------

--
-- Structure de la table `accueilmanagers`
--

CREATE TABLE `accueilmanagers` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `textentreprise` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueilmanagers`
--

INSERT INTO `accueilmanagers` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `textentreprise`, `created_at`, `updated_at`) VALUES
(1, 'MANAGER', 'Qui dirige <br> JMK Consulting Company <br> En toute circonstance', '<pre>Nous accompagnons durablement nos partenaires \n&lt;br&gt; dans les domaines d\'innovations se rapportant…</pre>', 'Savoir plus', '/manager.html', 'w4PUMYS9L4iPwCqfIFoD8K5MKzOreA-metaZ3Jvd3RoLTFfMS5wbmc=-.png', 'Photo du dirigeant', '<pre>&lt;h5&gt;Monthly Growth&lt;/h5&gt;\n&lt;div class=\"progress-inner\"&gt;\n    &lt;h5&gt;$48,560,25&lt;/h5&gt;\n    &lt;div class=\"bar\"&gt;\n        &lt;div class=\"bar-inner count-bar\" data-percent=\"60%\"&gt;&lt;/div&gt;\n        &lt;div class=\"count-text\"&gt;+18%&lt;/div&gt;\n    &lt;/div&gt;\n&lt;/div&gt;</pre>', '2024-05-20 08:57:01', '2024-05-20 10:06:35');

-- --------------------------------------------------------

--
-- Structure de la table `accueilserviceitems`
--

CREATE TABLE `accueilserviceitems` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `subservice` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accueilservice_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueilserviceitems`
--

INSERT INTO `accueilserviceitems` (`id`, `title`, `text`, `subservice`, `boutontitre`, `boutonlien`, `accueilservice_id`, `created_at`, `updated_at`) VALUES
(1, 'Environnement et Développement durable', '<p>&nbsp;Les systèmes agroforestiers apportent un large éventail d’avantages écologiques, nous accompagnons durablement nos partenaires producteurs.&nbsp;</p>', NULL, 'Lire plus', '/environdevelopdurable.html', 1, '2024-05-19 21:20:44', '2024-05-19 21:20:44'),
(2, 'Accompagnement des organisations Agricoles', '<p>&nbsp;Nous formons et accompagnons les communautés rurales et les organisations agricoles à la professionnalisation.</p>', NULL, 'Lire plus', '/organisationsagricole.html', 1, '2024-05-19 21:40:15', '2024-05-19 21:40:15'),
(3, 'Diagnostic et lutte contre le travail des enfants', '<p>&nbsp;Le travail des enfants regroupe l’ensemble des activités qui privent les enfants de leur enfance, de leur potentiel et de leur dignité, et nuisent à leur scolarité.</p>', NULL, 'Lire plus', '/travaildesenfants.html', 1, '2024-05-19 21:42:00', '2024-05-19 21:42:00');

-- --------------------------------------------------------

--
-- Structure de la table `accueilservices`
--

CREATE TABLE `accueilservices` (
  `id` bigint UNSIGNED NOT NULL,
  `secton` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueilservices`
--

INSERT INTO `accueilservices` (`id`, `secton`, `title`, `text`, `boutonlien`, `image`, `imagetitle`, `created_at`, `updated_at`) VALUES
(1, 'Nos Services', 'SERVICES AUX ORGANISATIONS AGRICOLES', NULL, NULL, NULL, NULL, '2024-05-19 21:16:34', '2024-05-19 21:16:34');

-- --------------------------------------------------------

--
-- Structure de la table `accueiltemoins`
--

CREATE TABLE `accueiltemoins` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueiltemoins`
--

INSERT INTO `accueiltemoins` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `created_at`, `updated_at`) VALUES
(1, 'TÉMOIGNAGES', 'Que disent nos clients de nous ?', NULL, NULL, NULL, NULL, NULL, '2024-05-20 14:58:48', '2024-05-20 14:58:48');

-- --------------------------------------------------------

--
-- Structure de la table `accueilvideos`
--

CREATE TABLE `accueilvideos` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videolien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueilvideos`
--

INSERT INTO `accueilvideos` (`id`, `section`, `title`, `text`, `image`, `videolien`, `created_at`, `updated_at`) VALUES
(1, 'VIDEO REALISTE', 'VIDEO JMK', NULL, 'jWN2vUIWUjDlRFELz3Vvc52i8mGBue-metadmlkZW8tYmcxLmpwZw==-.jpg', 'https://www.youtube.com/watch?v=nfP5N9Yc72A&t=28s', '2024-05-19 21:47:10', '2024-05-19 21:47:10');

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateactu` timestamp NULL DEFAULT NULL,
  `managernom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeformation_id` bigint UNSIGNED DEFAULT NULL,
  `accueilactu_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `dateactu`, `managernom`, `typeformation_id`, `accueilactu_id`, `created_at`, `updated_at`) VALUES
(1, 'Séminaire', 'Séminaire de formation sur l\'entrepreneuriat', '<p>&nbsp;Dans le but de mettre en place une stratégie de communication efficace afin d\'accompagner la coopérative UPRAD COOP CA à l\'export,&nbsp;</p>', 'Lire plus', '/lireplus.html', 'BUPZx74vcJ3IOHgdLqS0uFDHSz2ooQ-metaZGl2by1jZW1vaTEuZncucG5n-.png', 'accompagnement', '2024-04-18 00:00:00', 'Pacome KRA', NULL, 1, '2024-05-20 13:54:43', '2024-05-20 14:12:47'),
(2, 'Formation', 'Formation CacaoTrace des agents durabilité de ECOM', '<p>&nbsp;Dans le but de mettre en place une stratégie de communication efficace afin d\'accompagner la coopérative UPRAD COOP CA à l\'export,&nbsp;</p>', 'Lire plus', '/lireplus.html', '41nhntiyPqTdkSWOobZCVC4i16br3A-metaYWNjb21wYWduZW1lbnQtcGFjb21lLmZ3LnBuZw==-.png', 'accompagnement', '2024-03-14 00:00:00', 'Pacome KRA', NULL, 1, '2024-05-20 13:54:43', '2024-05-20 14:13:00'),
(3, 'Formation', 'Formation Sur le Processus de certification CACAOTRACE', NULL, 'Lire plus', '/lireplus.html', '69DUPXxQzoZjksPeoupU0ipddTSrhn-metaSU1HXzUzMzAuSlBH-.jpg', 'accompagnement', '2024-06-12 00:00:00', 'Pacome KRA', NULL, 1, '2024-05-20 13:54:43', '2024-05-20 14:22:20');

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accueiltemoin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `nom_prenom`, `fonction`, `accueiltemoin_id`, `created_at`, `updated_at`) VALUES
(1, 'NOTRE EQUIPE', 'EQUIPE JMK', '<blockquote>Je sors de ce séminaire de formation avec une idée claire sur l’itinéraire technique et les protocoles à respecter pour réussir Cacao Trace, un cacao Durableau chocolat plus Goûteux de notre partenaire Puratos. Je suis rassuré en tant que coordinatrice de zone, mes encadreurs pourront désormais accompagner avec efficacité nos producteurs.</blockquote>', NULL, NULL, 'M18rwnS4afXDLVT8o6B5rzL9rAlZaY-metaY2Vtb2ktbXlhby5mdy5wbmc=-.png', 'cemoi-myao.fw', 'Yao Nicoas', 'Coordinateur Régional - CEMOI', 1, '2024-05-20 15:05:25', '2024-05-20 15:14:18'),
(2, 'NOTRE EQUIPE', 'EQUIPE DE JMK', '<blockquote>Je sors de ce séminaire de formation avec une idée claire sur l’itinéraire technique et les protocoles à respecter pour réussir Cacao Trace, un cacao Durableau chocolat plus Goûteux de notre partenaire Puratos. Je suis rassuré en tant que coordinatrice de zone, mes encadreurs pourront désormais accompagner avec efficacité nos producteurs.”</blockquote>', NULL, NULL, '0lnvWWGESlRwR0igcepTp3ToXGAhrk-metaYmxhbmRpbmUuZncucG5n-.png', 'blandine', 'Blandine N\'guessan', 'Coordinatrice de zone - Zamacom Daloa', 1, '2024-05-20 15:13:14', '2024-05-20 15:13:44');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeformation_id` bigint UNSIGNED DEFAULT NULL,
  `accueilformation_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `typeformation_id`, `accueilformation_id`, `created_at`, `updated_at`) VALUES
(1, 'Formation des pépiniéristes CEMOI', '<p>&nbsp;Vingt-huit (28) pépiniéristes de la région de la NAWA dans le sud-ouest de la Côte d\'Ivoire engagé dans le...</p>', 'Voir plus', '/formationpepiniere.html', 'JkLQggjElDoOtX9hLNwAbvrgUTjmDh-metaZm9ybWF0aW9uLXphbWFjb20uZncucG5n-.png', 'formation zamacom', 1, 1, '2024-05-20 12:35:59', '2024-05-20 12:35:59'),
(2, 'Formation Cacao Trace - SOCA2PD', '<p>&nbsp;Agriculture durable, sécurité alimentaire, transformation et distribution de colis alimentaires e ...</p>', 'Lire plus', '/formationcacaotrace.html', '6Ba8wsmNbYf68Ahoy0vtV8fh40gHbj-metaY2FjYW8tZT1jc3AuZncucG5n-.png', 'Soca2pd', 2, 1, '2024-05-20 12:38:43', '2024-05-20 12:38:43'),
(3, 'Formation Cacao Trace - ECOM', '<p>&nbsp;Engagé dans le programme de durabilité CacaoTrace de Chocolatier Belge Puratos, Jmk Consulting dans ...</p>', 'Lire plus', '/formationcacaotrace.html', 'dA5VjHrqQxPQGB36p3y8HxohgLeazS-metaZm9ybWF0aW9uLWRpdm8uZncucG5n-.png', 'Formation divo', 3, 1, '2024-05-20 12:40:50', '2024-05-20 12:40:50');

-- --------------------------------------------------------

--
-- Structure de la table `lienfooters`
--

CREATE TABLE `lienfooters` (
  `id` bigint UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descript` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lienfooters`
--

INSERT INTO `lienfooters` (`id`, `titre`, `lien_page`, `descript`, `created_at`, `updated_at`) VALUES
(1, 'À propos', '/a-propos.html', '<p>À propos</p>', '2024-05-20 15:21:06', '2024-05-20 15:21:06'),
(2, 'Négoce', '/services-detail-negoce.html', '<p><a href=\"http://test_filament_jmk.test/services-detail-negoce.html\">Négoce</a></p>', '2024-05-20 15:26:35', '2024-05-20 15:26:35'),
(3, 'Contacts', '/contact.html', '<p><a href=\"http://test_filament_jmk.test/contact.html\">Contacts</a></p>', '2024-05-20 15:27:32', '2024-05-20 15:27:32');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
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
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Structure de la table `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `imagetitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descript` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partners`
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
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
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
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2024-05-18 21:50:17', '2024-05-18 21:50:17'),
(2, 'super-admin', 'web', '2024-05-18 21:50:19', '2024-05-18 21:50:19');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
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
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defaut_lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'fr',
  `position_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_social` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lien_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `nom_site`, `logo_site`, `contact_site`, `email_site`, `defaut_lang`, `position_site`, `list_social`, `lien_contact`, `created_at`, `updated_at`) VALUES
(6, 'JMK CONSULTING COMPANY', 'CDEISa7mQ6HSsLuDJFIUKJyvFmaCEn-metabG9nbzE3NXg0NS5wbmc=-.png', '+225 0709095378', 'infos@jmkconsulting-ci.com', 'fr', 'Abidjan - Cocody Angré 8eme Tranche (Carrefour prière)', '<pre>&lt;li&gt;&lt;a href=\"#\"&gt;&lt;i class=\"fa-brands fa-facebook\"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt;\n&lt;li&gt;&lt;a href=\"#\"&gt;&lt;i class=\"fa-brands fa-square-twitter\"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt;\n&lt;li&gt;&lt;a href=\"#\"&gt;&lt;i class=\"fab fa-linkedin\"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt;\n&lt;li&gt;&lt;a href=\"#\"&gt;&lt;i class=\"fa-brands fa-pinterest-p\"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt;</pre>', '/contacts', '2024-05-19 05:06:03', '2024-05-19 05:08:01');

-- --------------------------------------------------------

--
-- Structure de la table `slides`
--

CREATE TABLE `slides` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soustitle` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slides`
--

INSERT INTO `slides` (`id`, `title`, `soustitle`, `image`, `boutontitre`, `boutonlien`, `icone`, `created_at`, `updated_at`) VALUES
(1, '<pre>Business &lt;span&gt;&amp;amp; Individual&lt;/span&gt;  Consulting!..</pre>', '<p>The moment, so blinded by desire, that they cannot foresee and trouble that are bound to ensue.</p>', 'xYPxc03vDIN9xYd8DKN1gtHfC4GWfA-metaQ29jb2FfZmFtX2JnMi5qcGc=-.jpg', 'GENIE BIO', '/geniebio', 'flaticon-star-1', '2024-05-19 05:03:18', '2024-05-19 14:37:47');

-- --------------------------------------------------------

--
-- Structure de la table `typeformations`
--

CREATE TABLE `typeformations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `icone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typeformations`
--

INSERT INTO `typeformations` (`id`, `title`, `text`, `icone`, `created_at`, `updated_at`) VALUES
(1, 'Formation', '<p>Toutes activités de formation</p>', 'flaticon-strategy', '2024-05-20 11:52:09', '2024-05-20 11:54:09'),
(2, 'Agro-Foresterie', '<p>Toutes activités de agro-foresterie&nbsp;</p>', 'flaticon-strategy', '2024-05-20 11:52:09', '2024-05-20 12:14:15'),
(3, 'Accompagnement', '<p>Toutes activités de accompagnement&nbsp;</p>', 'flaticon-strategy', '2024-05-20 11:52:09', '2024-05-20 12:14:49'),
(4, 'Etude', '<p>Toutes activités d etude</p>', 'flaticon-strategy', '2024-05-20 11:52:09', '2024-05-20 12:15:22'),
(5, 'AGR', '<p>Toutes activités de AGR</p>', 'flaticon-strategy', '2024-05-20 11:52:09', '2024-05-20 12:16:20');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'BROU ALBERT', 'admin@admin.com', '2024-05-18 21:50:16', '$2y$10$IEyru7R76F0xiIDEmf0aAuCqOVFNIkgDU6IAjzL.9gnMypx2ulTxy', 'FlP61ez0SwAbC0vhAQE21FGZNs0Nz49ArYS070oLupXHFXJdVjFORzW8vDN5', 1, '2024-05-18 21:50:16', '2024-05-19 04:16:50');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accueilabouts`
--
ALTER TABLE `accueilabouts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `accueilactus`
--
ALTER TABLE `accueilactus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `accueilclientitems`
--
ALTER TABLE `accueilclientitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accueilclientitems_accueilclient_id_foreign` (`accueilclient_id`);

--
-- Index pour la table `accueilclients`
--
ALTER TABLE `accueilclients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `accueilformations`
--
ALTER TABLE `accueilformations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `accueilmanageritems`
--
ALTER TABLE `accueilmanageritems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accueilmanageritems_accueilmanager_id_foreign` (`accueilmanager_id`);

--
-- Index pour la table `accueilmanagers`
--
ALTER TABLE `accueilmanagers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `accueilserviceitems`
--
ALTER TABLE `accueilserviceitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accueilserviceitems_accueilservice_id_foreign` (`accueilservice_id`);

--
-- Index pour la table `accueilservices`
--
ALTER TABLE `accueilservices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `accueiltemoins`
--
ALTER TABLE `accueiltemoins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `accueilvideos`
--
ALTER TABLE `accueilvideos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actualites_typeformation_id_foreign` (`typeformation_id`),
  ADD KEY `actualites_accueilactu_id_foreign` (`accueilactu_id`);

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipes_accueiltemoin_id_foreign` (`accueiltemoin_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formations_typeformation_id_foreign` (`typeformation_id`),
  ADD KEY `formations_accueilformation_id_foreign` (`accueilformation_id`);

--
-- Index pour la table `lienfooters`
--
ALTER TABLE `lienfooters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeformations`
--
ALTER TABLE `typeformations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accueilabouts`
--
ALTER TABLE `accueilabouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `accueilactus`
--
ALTER TABLE `accueilactus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `accueilclientitems`
--
ALTER TABLE `accueilclientitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `accueilclients`
--
ALTER TABLE `accueilclients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `accueilformations`
--
ALTER TABLE `accueilformations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `accueilmanageritems`
--
ALTER TABLE `accueilmanageritems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `accueilmanagers`
--
ALTER TABLE `accueilmanagers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `accueilserviceitems`
--
ALTER TABLE `accueilserviceitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `accueilservices`
--
ALTER TABLE `accueilservices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `accueiltemoins`
--
ALTER TABLE `accueiltemoins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `accueilvideos`
--
ALTER TABLE `accueilvideos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `lienfooters`
--
ALTER TABLE `lienfooters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `typeformations`
--
ALTER TABLE `typeformations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accueilclientitems`
--
ALTER TABLE `accueilclientitems`
  ADD CONSTRAINT `accueilclientitems_accueilclient_id_foreign` FOREIGN KEY (`accueilclient_id`) REFERENCES `accueilclients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `accueilmanageritems`
--
ALTER TABLE `accueilmanageritems`
  ADD CONSTRAINT `accueilmanageritems_accueilmanager_id_foreign` FOREIGN KEY (`accueilmanager_id`) REFERENCES `accueilmanagers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `accueilserviceitems`
--
ALTER TABLE `accueilserviceitems`
  ADD CONSTRAINT `accueilserviceitems_accueilservice_id_foreign` FOREIGN KEY (`accueilservice_id`) REFERENCES `accueilservices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD CONSTRAINT `actualites_accueilactu_id_foreign` FOREIGN KEY (`accueilactu_id`) REFERENCES `accueilactus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actualites_typeformation_id_foreign` FOREIGN KEY (`typeformation_id`) REFERENCES `typeformations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD CONSTRAINT `equipes_accueiltemoin_id_foreign` FOREIGN KEY (`accueiltemoin_id`) REFERENCES `accueiltemoins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_accueilformation_id_foreign` FOREIGN KEY (`accueilformation_id`) REFERENCES `accueilformations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formations_typeformation_id_foreign` FOREIGN KEY (`typeformation_id`) REFERENCES `typeformations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
