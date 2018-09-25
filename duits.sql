-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2018 at 11:55 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_duits`
--

-- --------------------------------------------------------

--
-- Table structure for table `broadcasts`
--

CREATE TABLE `broadcasts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `headline` varchar(500) CHARACTER SET utf8 NOT NULL,
  `body` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broadcasts`
--

INSERT INTO `broadcasts` (`id`, `created_at`, `updated_at`, `headline`, `body`) VALUES
(12, '2018-04-03 10:41:45', '2018-04-03 10:41:45', 'gfhghgfhf', 'fgsfdgfgs');

-- --------------------------------------------------------

--
-- Table structure for table `broadcasts_images`
--

CREATE TABLE `broadcasts_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `path` varchar(255) NOT NULL,
  `broadcast_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fb` varchar(500) DEFAULT NULL,
  `linked_in` varchar(500) DEFAULT NULL,
  `twitter` varchar(500) DEFAULT NULL,
  `g_plus` varchar(500) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'current',
  `committee_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `photo`, `name`, `designation`, `created_at`, `updated_at`, `fb`, `linked_in`, `twitter`, `g_plus`, `status`, `committee_type_id`) VALUES
(2, '1532793361human05.jpg', 'Member 2', 'Some Designation', '2018-07-28 09:56:01', '2018-07-28 09:56:01', 'https://www.facebook.com/groups/iitfamily/', NULL, 'https://www.facebook.com/groups/iitfamily/', 'https://www.facebook.com/groups/iitfamily/', 'Current', 2),
(3, '1532793361human05.jpg', 'Member 2', 'Some Designation', '2018-07-28 09:56:01', '2018-07-28 09:56:01', 'https://www.facebook.com/groups/iitfamily/', NULL, 'https://www.facebook.com/groups/iitfamily/', 'https://www.facebook.com/groups/iitfamily/', 'Current', 2),
(4, '1532793361human05.jpg', 'Member 2', 'Some Designation', '2018-07-28 09:56:01', '2018-07-28 09:56:01', 'https://www.facebook.com/groups/iitfamily/', NULL, 'https://www.facebook.com/groups/iitfamily/', 'https://www.facebook.com/groups/iitfamily/', 'Current', 2),
(5, '1532793361human05.jpg', 'Member 2', 'Some Designation', '2018-07-28 09:56:01', '2018-07-28 09:56:01', 'https://www.facebook.com/groups/iitfamily/', NULL, 'https://www.facebook.com/groups/iitfamily/', 'https://www.facebook.com/groups/iitfamily/', 'Current', 2);

-- --------------------------------------------------------

--
-- Table structure for table `committee_types`
--

CREATE TABLE `committee_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `serial` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee_types`
--

INSERT INTO `committee_types` (`id`, `created_at`, `updated_at`, `name`, `description`, `serial`) VALUES
(2, '2018-09-16 20:01:55', '2018-09-16 20:01:55', 'Current Committee', 'Magnis Modipsae Que Lib Voloratati Andigen Daepeditem Quiate Ut Reporemni Aut Labor. Laceaque Quiae Sitiorem Rest Non Restibusaes Es Tumquam Core Posae Volor Remped Modis Volor. Doloreiur Qui Commolu Ptatemp Dolupta Oreprerum Tibusam. Eumenis Et Consent Accullignis Dentibea Autem Inisita Posae Volor Conecus Resto Explabo.', 1),
(3, '2018-09-16 20:01:59', '2018-09-16 20:01:59', 'Founding Committee', 'Magnis Modipsae Que Lib Voloratati Andigen Daepeditem Quiate Ut Reporemni Aut Labor. Laceaque Quiae Sitiorem Rest Non Restibusaes Es Tumquam Core Posae Volor Remped Modis Volor. Doloreiur Qui Commolu Ptatemp Dolupta Oreprerum Tibusam. Eumenis Et Consent Accullignis Dentibea Autem Inisita Posae Volor Conecus Resto Explabo.', 0),
(4, '2018-09-16 12:58:45', '2018-09-16 12:58:45', '2nd Committee', 'Test Committee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `headline` varchar(500) NOT NULL,
  `body` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `created_at`, `updated_at`, `headline`, `body`, `date`) VALUES
(5, '2018-04-03 10:41:29', '2018-04-03 10:41:29', 'ffgfgfgf gdfgdfgd', 'fgdfgfgfg fgfgfgfgfg', '2018-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `events_images`
--

CREATE TABLE `events_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `path` varchar(100) NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `honors`
--

CREATE TABLE `honors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `duration` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `fb` varchar(500) DEFAULT NULL,
  `twitter` varchar(500) DEFAULT NULL,
  `linkedin` varchar(500) DEFAULT NULL,
  `rss` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `honors`
--

INSERT INTO `honors` (`id`, `name`, `photo`, `created_at`, `updated_at`, `duration`, `priority`, `fb`, `twitter`, `linkedin`, `rss`) VALUES
(1, 'Testy', '23.png1522173075png', '2018-03-27 11:51:16', '2018-03-31 12:07:04', '2012-2013', 4, 'https://web.facebook.com/?_rdc=1&_rdr', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `it_fest_5_covers`
--

CREATE TABLE `it_fest_5_covers` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `it_fest_5_covers`
--

INSERT INTO `it_fest_5_covers` (`id`, `title`, `image`) VALUES
(2, 'test image', '1537130752Full-View-TV-Live-with-EPG.png');

-- --------------------------------------------------------

--
-- Table structure for table `it_fest_5_guests`
--

CREATE TABLE `it_fest_5_guests` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `it_fest_5_guests`
--

INSERT INTO `it_fest_5_guests` (`id`, `name`, `designation`, `photo`) VALUES
(2, 'test guest', 'test des', '1537130529Oh My Friend (2011).png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` longtext CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `headline` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `created_at`, `updated_at`, `headline`, `body`, `photo`, `file`) VALUES
(4, '2018-04-03 10:40:52', '2018-04-03 10:40:52', 'ffffgdf', 'rtrtrtrtertrtertrtte rertertert', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `remember_token` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` varchar(255) NOT NULL DEFAULT 'Member',
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `status`) VALUES
(1, 'Mutasim', 'mutasim@gmail.com', NULL, '$2y$10$n1gVoy0L9RGePtwGe1KTGOqjT4G5LEl70LDy7bN5KGurM.uTA8zgq', 'mkD2f5wJxX79KOl6RrsaBWLkpRFdrczFQtt7oYXDxX8U1NPjBSxF6qi6Tyu1', '2018-03-31 05:39:00', '2018-03-31 11:55:16', 'Member', 'active'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$n1gVoy0L9RGePtwGe1KTGOqjT4G5LEl70LDy7bN5KGurM.uTA8zgq', 'nmvlDY1I3XlFP3KtCOU8SkLPMClfCtUbWUr4mWgqzmx0yOXNUjqb0jVYhkVB', '2018-03-31 12:35:26', '2018-04-04 19:22:13', 'Admin', 'active'),
(4, 'Any Product', 'mutasimfuad0520@gmail.com', NULL, '$2y$10$5nKgXgaZFSFSMGVom3vtF.l57m87qVn.fwxdTMtID.jfwAzTSzt0q', NULL, '2018-04-04 11:20:15', '2018-04-04 11:20:15', 'Member', 'active'),
(9, 'Mutasim Fuad', 'mightythor0520@gmail.com', NULL, '$2y$10$WExX9xGBhZ/pE3Xbhf3rmuaICYgzTdJCm4JtVvESznbV8DsycDUBa', NULL, '2018-04-04 12:33:07', '2018-04-04 13:22:43', 'Member', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `broadcasts`
--
ALTER TABLE `broadcasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broadcasts_images`
--
ALTER TABLE `broadcasts_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `broadcast_id` (`broadcast_id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_type_id` (`committee_type_id`);

--
-- Indexes for table `committee_types`
--
ALTER TABLE `committee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_images`
--
ALTER TABLE `events_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `honors`
--
ALTER TABLE `honors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_fest_5_covers`
--
ALTER TABLE `it_fest_5_covers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_fest_5_guests`
--
ALTER TABLE `it_fest_5_guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `broadcasts`
--
ALTER TABLE `broadcasts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `broadcasts_images`
--
ALTER TABLE `broadcasts_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `committee_types`
--
ALTER TABLE `committee_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events_images`
--
ALTER TABLE `events_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `honors`
--
ALTER TABLE `honors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `it_fest_5_covers`
--
ALTER TABLE `it_fest_5_covers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `it_fest_5_guests`
--
ALTER TABLE `it_fest_5_guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `broadcasts_images`
--
ALTER TABLE `broadcasts_images`
  ADD CONSTRAINT `cons_image_broadcast` FOREIGN KEY (`broadcast_id`) REFERENCES `broadcasts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `committees`
--
ALTER TABLE `committees`
  ADD CONSTRAINT `conf_com_type` FOREIGN KEY (`committee_type_id`) REFERENCES `committee_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events_images`
--
ALTER TABLE `events_images`
  ADD CONSTRAINT `cons_events_image` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
