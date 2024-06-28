-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2024 at 02:47 PM
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
-- Database: `testfilamentjmk`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `icone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutontitre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutonlien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `text`, `icone`, `boutontitre`, `boutonlien`, `created_at`, `updated_at`) VALUES
(1, 'Minima sint quia culpa quasi enim sint aperiam id et ut laudantium aut necessitatibus.', 'Aspernatur molestiae reiciendis aut. Soluta aut est aliquam consequatur illum consequatur. Nihil debitis reprehenderit perspiciatis nobis. Aut et sunt blanditiis voluptates quos molestias.', 'Eaque veniam nesciunt tempore odit quos. Ut reiciendis hic est dolorem consequatur. Porro tenetur voluptatibus hic molestias perferendis est consequatur.', 'A suscipit ad dignissimos. Molestiae velit aut dignissimos exercitationem optio sint eos et. Est aut corrupti esse excepturi illum. Molestiae aut hic enim nihil eaque. Placeat nemo voluptatem provident libero tempore omnis. Nihil rem est sapiente dolor.', 'Sequi molestiae et soluta magni vitae sapiente. Pariatur quia ad totam provident odio. At totam eum dolor tenetur recusandae doloribus.', '2024-06-26 14:40:34', '2024-06-26 14:40:34'),
(2, 'Et maxime dolorem enim ipsam consequatur saepe incidunt.', 'Deleniti vel voluptate et maiores eaque earum quisquam nulla. Nihil voluptatibus id sed modi voluptas laboriosam nobis cum. Aut ut saepe labore reprehenderit.', 'Voluptas accusamus molestiae vel qui ducimus. Sunt laborum consectetur nesciunt veritatis sint commodi. Modi et facilis aperiam quo sit. Est voluptate ea error enim.', 'Et ut est doloribus cumque ea nihil. Ab natus quis perferendis recusandae dicta distinctio distinctio. Minima voluptatem occaecati nisi sunt. Magni beatae quas nam et.', 'Quia pariatur non mollitia. Molestias sequi fuga ut qui dolor et sunt. Quod reiciendis eos natus distinctio et omnis corrupti. Eveniet et aut id ut vel corporis.', '2024-06-26 14:40:34', '2024-06-26 14:40:34'),
(3, 'Autem cum aspernatur nesciunt eveniet possimus provident unde.', 'Illo veritatis enim soluta qui saepe error. Aut vero voluptatum quisquam.', 'Sed sequi dicta at nostrum consequuntur unde nostrum. Quis est delectus odit voluptas. Iure illum ut sit eligendi expedita nesciunt. Perferendis voluptatem aspernatur sint dolor ea quas.', 'Fugit quasi hic aut consequatur voluptates. Ratione commodi ut optio dolores unde. Veniam ut quas hic nobis. Sunt quam quo possimus qui. Voluptas ab perspiciatis sed officiis sed error. Dignissimos eos doloribus tempora cumque.', 'Facilis harum molestias enim earum repellendus numquam nesciunt. Ratione optio rerum sapiente.', '2024-06-26 14:40:34', '2024-06-26 14:40:34'),
(4, 'Ut optio nihil reiciendis perferendis laboriosam temporibus quisquam modi rem.', 'Magnam tempora quod doloremque a cumque tempore molestias. Necessitatibus ipsum omnis quam aut dolorem expedita quo consequatur.', 'Possimus omnis aut aliquam aliquid optio cum quidem. Quas similique aliquam voluptas sequi perferendis. Ut dolorem officiis aut. Eveniet ea perspiciatis sint unde occaecati officiis.', 'Unde dolore recusandae placeat. Voluptatem sunt qui ab ut maxime. Aut deleniti explicabo fugit laboriosam aut. Commodi quae eum minima.', 'Libero laudantium asperiores qui. Recusandae enim quo illum porro. Iusto quis omnis dicta rerum aut eveniet iure aut. Illum accusantium placeat deserunt amet esse consequatur.', '2024-06-26 14:40:34', '2024-06-26 14:40:34'),
(5, 'Aliquam dolor corporis et officia labore non dicta eos.', 'Et dolor labore consequatur ut voluptates. Est voluptas qui nesciunt excepturi fuga maxime a. Ut cum et voluptates expedita neque.', 'Dolores quod adipisci quis voluptatem. Repellendus laborum quia perspiciatis nisi sit libero rerum. Enim illum ullam quia.', 'Minima omnis illum perferendis dolor. Fugit aliquid officia tenetur non. Eos molestias et maxime consequatur repellendus qui assumenda. At cumque iusto autem saepe delectus. Delectus totam assumenda numquam reiciendis doloremque in.', 'Voluptatem ipsum aut ut ex ratione aut laboriosam est. Adipisci ut quisquam neque corporis architecto. Pariatur enim ex est. Est nisi animi quia occaecati quis laboriosam tempora.', '2024-06-26 14:40:34', '2024-06-26 14:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `contact_data`
--

CREATE TABLE `contact_data` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_prenoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `lu_approuve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_data`
--

INSERT INTO `contact_data` (`id`, `nom_prenoms`, `phone`, `email`, `sujet`, `service`, `message`, `lu_approuve`, `created_at`, `updated_at`) VALUES
(1, 'Accusantium dolorem earum provident eum. Debitis voluptatem consequatur repellat voluptatem. In autem molestiae inventore incidunt debitis quo. Aut perferendis suscipit eveniet reiciendis qui consectetur porro.', '+1.480.913.2172', 'gcrona@bauch.com', 'Ad dignissimos ut sit delectus qui omnis necessitatibus. Sequi esse totam voluptate eos. Sunt quo eum sint suscipit officiis repellat.', 'Quae ratione non incidunt qui in modi rerum. Possimus a consequatur natus quidem. Possimus tempora vero sunt. Dolores autem facilis dolores cumque.', 'Quibusdam tempore amet tenetur quia voluptates omnis iusto impedit vero sapiente fugit quasi consequatur quaerat commodi quia et ullam repudiandae velit id.', 'Aut ut repellendus harum voluptate saepe quisquam voluptatem. Quasi eum qui in aliquid. Nihil non praesentium illo qui sapiente. Sit cum placeat tenetur aperiam.', '2024-06-26 14:40:34', '2024-06-26 14:40:34'),
(2, 'Ad consequatur neque eos est autem ratione. At quidem quis blanditiis qui consequatur enim dicta. Ab quos fuga architecto ut tenetur consequatur. Aut a dicta quasi.', '+1 (478) 822-5483', 'barrows.sherman@hotmail.com', 'Autem ab eum delectus. Magnam autem voluptatibus aspernatur ut. Vel voluptatem dolor ducimus asperiores. Velit eum consequatur dolores dolorum consequatur iure consequatur.', 'Quibusdam voluptatibus quia aut labore et. Aperiam et tenetur et eos et facilis excepturi. Fuga est ullam fuga.', 'Dolorum est magnam expedita corporis consequatur voluptas accusantium praesentium sit necessitatibus non labore adipisci velit non deleniti.', 'Tenetur saepe ad eius officiis nisi. Aut eos incidunt id corrupti. Est rerum aut culpa quasi quisquam omnis nisi. Vitae repudiandae distinctio possimus a eius.', '2024-06-26 14:40:34', '2024-06-26 14:40:34'),
(3, 'Expedita fugit omnis in. Omnis blanditiis est distinctio dignissimos autem. In nemo qui molestiae occaecati voluptatem. Qui ab nulla est veniam dicta error nulla quod.', '+1 (726) 418-1951', 'khill@balistreri.com', 'Voluptatem et magni nostrum enim qui. Officia sed maiores unde vitae odio ad. Rem illum odit eius quae aut. Et praesentium fugiat possimus facilis aperiam est ducimus.', 'Ut doloremque ut magnam dolorem. Est magnam commodi nulla sed voluptatem. Optio praesentium qui quo quae quo illo. Omnis quibusdam odio consectetur vitae. Unde minima consectetur repellendus. Illum qui fuga laboriosam optio consectetur.', 'Recusandae sit tempore tempore rerum voluptate id consequatur officiis ad nihil neque nam perspiciatis non illo.', 'Quae alias qui sunt molestiae velit fugiat. Illum laudantium numquam et quia. Amet quia molestiae consequatur a pariatur sunt qui.', '2024-06-26 14:40:34', '2024-06-26 14:40:34'),
(4, 'Voluptatibus reprehenderit fuga magnam iusto quo. Voluptas autem inventore in sint temporibus. Atque pariatur fuga et odio a maiores odit. Debitis ipsa voluptatibus accusantium.', '740.503.3842', 'brayan.williamson@schmitt.org', 'Enim enim non et quo adipisci. Eligendi architecto cumque nemo. Itaque officia in hic mollitia nihil vel explicabo. Sunt blanditiis laudantium vero voluptas. Totam reiciendis ipsum ab maxime.', 'Quis nihil cumque mollitia et. Voluptatum sint minus error quia. Quisquam ea id voluptas rem eveniet et beatae.', 'Provident explicabo sed ipsum quia et ut et vitae aliquam aspernatur sed voluptates qui iste quo consequatur nam velit enim est culpa impedit rerum.', 'Necessitatibus distinctio nesciunt ratione et voluptas voluptatibus. Eos explicabo expedita magni eos eum ut. Porro nihil nihil quisquam. Ut sed qui ipsum non eos qui quos possimus.', '2024-06-26 14:40:34', '2024-06-26 14:40:34'),
(5, 'Minus alias voluptas voluptas odio et tenetur nostrum. Ipsa fuga non voluptas qui perspiciatis veritatis repudiandae. Itaque ut velit nihil ut adipisci.', '1-503-828-9690', 'dolly52@yahoo.com', 'Deleniti non labore dicta et velit ut. Dolores recusandae et cumque quia natus et. Impedit autem explicabo necessitatibus deleniti ut accusamus tenetur eum. Eius ut quasi quia aut nobis soluta.', 'Ducimus dolorem dolorem maiores et reprehenderit magni. Id voluptatum qui magnam sint aut ut odio quam. Voluptate odit tenetur sunt iusto ullam fugit. Provident quae dolores a dolor quia sit quo.', 'Officiis voluptatem voluptas alias eveniet sint ut ipsam rerum in id dignissimos officiis.', 'Eum nam voluptates totam rem molestias rem. Repellat non aperiam quaerat aspernatur reprehenderit qui. Iusto officiis repellat accusantium maxime.', '2024-06-26 14:40:34', '2024-06-26 14:40:34');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_data`
--
ALTER TABLE `contact_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
