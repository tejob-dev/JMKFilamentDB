-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2024 at 06:28 PM
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
(17, 'TITRE 4 colonnes de titre et texte', '<div class=\"content-three\">\n    <div class=\"image-box\">\n        <h3>{titre}</h3>\n        <div class=\"row clearfix\">\n            {content}\n        </div>\n    </div>\n</div>;\n<div class=\"col-lg-6 col-md-6 col-sm-12 image-column\">\n	<div class=\"inner-box\">\n		<div class=\"single-item\"><h4>{titre2}</h4><br>{text2}</div>\n		<div class=\"single-item\"><h4>{titre3}</h4><br>{text3}</div>\n	</div>\n</div>', 'r0OaquU16nYK4UTUfpBmosWUAnRWuc-metaQ2FwdHVyZSBk4oCZw6ljcmFuXzEzLTYtMjAyNF8xNzA0OF9jam1rbmV3dmVyc2lvbi5jb20udGVzdC5qcGVn-.jpg', 'titre,titre2,text2,titre3,text3', '2024-06-13 17:23:00', '2024-06-13 17:23:00');

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
(12, 'TITRE ET QUATRE COLONNES DE TEXTE', '[\n {\n   titre: \"Pourquoi choisir JMK consulting Company?\",\n   titre2: \"Un savoir-faire adapté:\",\n   text2: \"Grâce au savoir-faire, nous informons et conseillons nos clients producteurs, tout au long du cycle de production sur les itinéraires culturaux.\",\n   titre3: \"Approvisionnement sur mesure:\",\n   text3: \"Nous veillons à respecter et à rappeler la réglementation ainsi que les bonnes pratiques agricoles et d’utilisation des produits d\'agrofournitures.\",\n},{\n   titre: \"Pourquoi choisir JMK consulting Company?\",\n   titre2: \"Un savoir-faire adapté:\",\n   text2: \"Grâce au savoir-faire, nous informons et conseillons nos clients producteurs, tout au long du cycle de production sur les itinéraires culturaux.\",\n   titre3: \"Approvisionnement sur mesure:\",\n   text3: \"Nous veillons à respecter et à rappeler la réglementation ainsi que les bonnes pratiques agricoles et d’utilisation des produits d\'agrofournitures.\",\n},\n]', 1, 14, 17, '2024-06-11 15:55:03', '2024-06-14 11:14:38');

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
(14, 'CORPS DE LA PAGE', '2024-06-11 15:42:48', '2024-06-11 15:42:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `composite_views`
--
ALTER TABLE `composite_views`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `composite_views`
--
ALTER TABLE `composite_views`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `content_views`
--
ALTER TABLE `content_views`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `content_view_types`
--
ALTER TABLE `content_view_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
