-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2024 at 10:47 AM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmkco1775850_39q1hp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accueilabouts`
--


-- --------------------------------------------------------

--
-- Table structure for table `equipes`
--

CREATE TABLE `equipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imagetitle` varchar(255) DEFAULT NULL,
  `nom_prenom` varchar(255) DEFAULT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  `accueiltemoin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipes`
--

INSERT INTO `equipes` (`id`, `section`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `nom_prenom`, `fonction`, `accueiltemoin_id`, `created_at`, `updated_at`) VALUES
(1, 'NOTRE EQUIPE', 'EQUIPE JMK', '<blockquote>Je sors de ce séminaire de formation avec une idée claire sur l’itinéraire technique et les protocoles à respecter pour réussir Cacao Trace, un cacao Durableau chocolat plus Goûteux de notre partenaire Puratos. Je suis rassuré en tant que coordinatrice de zone, mes encadreurs pourront désormais accompagner avec efficacité nos producteurs.</blockquote>', NULL, NULL, 'M18rwnS4afXDLVT8o6B5rzL9rAlZaY-metaY2Vtb2ktbXlhby5mdy5wbmc=-.png', 'cemoi-myao.fw', 'Yao Nicoas', 'Coordinateur Régional - CEMOI', 1, '2024-05-20 13:05:25', '2024-05-20 13:14:18'),
(2, 'NOTRE EQUIPE', 'EQUIPE DE JMK', '<blockquote>Je sors de ce séminaire de formation avec une idée claire sur l’itinéraire technique et les protocoles à respecter pour réussir Cacao Trace, un cacao Durableau chocolat plus Goûteux de notre partenaire Puratos. Je suis rassuré en tant que coordinatrice de zone, mes encadreurs pourront désormais accompagner avec efficacité nos producteurs.”</blockquote>', NULL, NULL, '0lnvWWGESlRwR0igcepTp3ToXGAhrk-metaYmxhbmRpbmUuZncucG5n-.png', 'blandine', 'Blandine N\'guessan', 'Coordinatrice de zone - Zamacom Daloa', 1, '2024-05-20 13:13:14', '2024-05-20 13:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE `formations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imagetitle` varchar(255) DEFAULT NULL,
  `typeformation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accueilformation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`id`, `title`, `text`, `boutontitre`, `boutonlien`, `image`, `imagetitle`, `typeformation_id`, `accueilformation_id`, `created_at`, `updated_at`) VALUES
(1, 'Formation des pépiniéristes CEMOI', '<p>&nbsp;Vingt-huit (28) pépiniéristes de la région de la NAWA dans le sud-ouest de la Côte d\'Ivoire engagé dans le...</p>', 'Voir plus', '/formationpepiniere.html', 'JkLQggjElDoOtX9hLNwAbvrgUTjmDh-metaZm9ybWF0aW9uLXphbWFjb20uZncucG5n-.png', 'formation zamacom', 1, 1, '2024-05-20 10:35:59', '2024-05-20 10:35:59'),
(2, 'Formation Cacao Trace - SOCA2PD', '<p>&nbsp;Agriculture durable, sécurité alimentaire, transformation et distribution de colis alimentaires e ...</p>', 'Lire plus', '/formationcacaotrace.html', '6Ba8wsmNbYf68Ahoy0vtV8fh40gHbj-metaY2FjYW8tZT1jc3AuZncucG5n-.png', 'Soca2pd', 2, 1, '2024-05-20 10:38:43', '2024-05-20 10:38:43'),
(3, 'Formation Cacao Trace - ECOM', '<p>&nbsp;Engagé dans le programme de durabilité CacaoTrace de Chocolatier Belge Puratos, Jmk Consulting dans ...</p>', 'Lire plus', '/formationcacaotrace.html', 'dA5VjHrqQxPQGB36p3y8HxohgLeazS-metaZm9ybWF0aW9uLWRpdm8uZncucG5n-.png', 'Formation divo', 3, 1, '2024-05-20 10:40:50', '2024-05-20 10:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `lienfooters`
--

CREATE TABLE `lienfooters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `lien_page` varchar(255) DEFAULT NULL,
  `descript` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienfooters`
--

INSERT INTO `lienfooters` (`id`, `titre`, `lien_page`, `descript`, `created_at`, `updated_at`) VALUES
(1, 'À propos', '/a-propos.html', '<p>À propos</p>', '2024-05-20 13:21:06', '2024-05-20 13:21:06'),
(2, 'Négoce', '/services-detail-negoce.html', '<p><a href=\"http://test_filament_jmk.test/services-detail-negoce.html\">Négoce</a></p>', '2024-05-20 13:26:35', '2024-05-20 13:26:35'),
(3, 'Contacts', '/contact.html', '<p><a href=\"http://test_filament_jmk.test/contact.html\">Contacts</a></p>', '2024-05-20 13:27:32', '2024-05-20 13:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagetitle` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `descript` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `imagetitle`, `image`, `descript`, `created_at`, `updated_at`) VALUES
(1, 'Advans', 'hIDb3zm4A3i3PGilYiRMYdPZY6iQSr-metaQWR2YW5zLmpwZw==-.jpg', NULL, '2024-05-20 08:09:56', '2024-05-20 08:09:56'),
(2, 'Agritera', 'TmbC3eDJfKUwXgKJHwaE3ipQSL6Bks-metaQWdyaXRlcmEucG5n-.png', NULL, '2024-05-20 08:12:06', '2024-05-20 08:12:06'),
(3, 'Cargill', '8BPchGUJtvbKTPY3sscwAp54qdfXxh-metaQ2FyZ2lsbC1sb2dvLnBuZw==-.png', NULL, '2024-05-20 08:14:23', '2024-05-20 08:14:23'),
(4, 'CCB', 'WT7uyiAdh97Za9kZPv7UxyGgkryjeu-metaQ0NCLmpwZw==-.jpg', NULL, '2024-05-20 08:15:11', '2024-05-20 08:15:11'),
(5, 'Cemoi', 'oAx4czU17P6DeZNabaYPOUqAzG1SPC-metaY2Vtb2kuanBn-.jpg', NULL, '2024-05-20 08:16:09', '2024-05-20 08:16:09'),
(6, 'Ecakoog', 'dCuyYVbxstoaoNhkLAzSEl4KXbYgOU-metaZWNha29vZy5qcGc=-.jpg', NULL, '2024-05-20 08:17:55', '2024-05-20 08:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_site` varchar(255) NOT NULL,
  `logo_site` varchar(255) NOT NULL,
  `contact_site` varchar(255) DEFAULT NULL,
  `email_site` varchar(255) DEFAULT NULL,
  `defaut_lang` varchar(255) DEFAULT 'fr',
  `position_site` varchar(255) DEFAULT NULL,
  `list_social` text DEFAULT NULL,
  `lien_contact` varchar(255) DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `soustitle` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `boutontitre` varchar(255) DEFAULT NULL,
  `boutonlien` varchar(255) DEFAULT NULL,
  `icone` varchar(255) DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `icone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typeformations`
--

INSERT INTO `typeformations` (`id`, `title`, `text`, `icone`, `created_at`, `updated_at`) VALUES
(1, 'Formation', '<p>Toutes activités de formation</p>', 'flaticon-strategy', '2024-05-20 09:52:09', '2024-05-20 09:54:09'),
(2, 'Agro-Foresterie', '<p>Toutes activités de agro-foresterie&nbsp;</p>', 'flaticon-strategy', '2024-05-20 09:52:09', '2024-05-20 10:14:15'),
(3, 'Accompagnement', '<p>Toutes activités de accompagnement&nbsp;</p>', 'flaticon-strategy', '2024-05-20 09:52:09', '2024-05-20 10:14:49'),
(4, 'Etude', '<p>Toutes activités d etude</p>', 'flaticon-strategy', '2024-05-20 09:52:09', '2024-05-20 10:15:22'),
(5, 'AGR', '<p>Toutes activités de AGR</p>', 'flaticon-strategy', '2024-05-20 09:52:09', '2024-05-20 10:16:20');

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
-- Indexes for table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipes_accueiltemoin_id_foreign` (`accueiltemoin_id`);

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formations_typeformation_id_foreign` (`typeformation_id`),
  ADD KEY `formations_accueilformation_id_foreign` (`accueilformation_id`);

--
-- Indexes for table `lienfooters`
--
ALTER TABLE `lienfooters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accueilabouts`
--
ALTER TABLE `accueilabouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilactus`
--
ALTER TABLE `accueilactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilclientitems`
--
ALTER TABLE `accueilclientitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `accueilclients`
--
ALTER TABLE `accueilclients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilformations`
--
ALTER TABLE `accueilformations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilmanageritems`
--
ALTER TABLE `accueilmanageritems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `accueilmanagers`
--
ALTER TABLE `accueilmanagers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilserviceitems`
--
ALTER TABLE `accueilserviceitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `accueilservices`
--
ALTER TABLE `accueilservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueiltemoins`
--
ALTER TABLE `accueiltemoins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accueilvideos`
--
ALTER TABLE `accueilvideos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lienfooters`
--
ALTER TABLE `lienfooters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `typeformations`
--
ALTER TABLE `typeformations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
