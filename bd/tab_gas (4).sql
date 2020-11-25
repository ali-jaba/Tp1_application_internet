-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2020 at 02:19 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tab_gas`
--

-- --------------------------------------------------------

--
-- Table structure for table `apropos`
--

CREATE TABLE `apropos` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(1, 'Arc-en-ciel.png', 'files/add/', '2020-10-20 00:44:18', '2020-10-20 00:44:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_prices`
--

CREATE TABLE `fuel_prices` (
  `id` int(11) NOT NULL,
  `ref_fuel_types_id` int(11) NOT NULL,
  `Fuel_Price_Date` date NOT NULL,
  `Unit_Buying_Price` int(11) NOT NULL,
  `Unit_Sales_Price` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'es_ES', 'RefFuelTypes', 10, 'Fuel_Type_Name', 'test esp'),
(2, 'es_ES', 'RefFuelTypes', 10, 'Fuel_Type_Description', 'teeeest esp'),
(3, 'fr_CA', 'RefFuelTypes', 10, 'Fuel_Type_Name', 'test fr'),
(4, 'fr_CA', 'RefFuelTypes', 10, 'Fuel_Type_Description', 'teeeest fr'),
(5, 'es_ES', 'Transactions', 7, 'Others_Details', 'test esp'),
(6, 'fr_CA', 'Transactions', 7, 'Others_Details', 'test fra'),
(9, 'en_CA', 'RefFuelTypes', 16, 'Fuel_Type_Name', 'dadfgsdfd'),
(10, 'en_CA', 'RefFuelTypes', 16, 'Fuel_Type_Description', 'sdfgsdfds'),
(11, 'es_ES', 'RefFuelTypes', 16, 'Fuel_Type_Name', 'zdfgsdfsf  esp'),
(12, 'es_ES', 'RefFuelTypes', 16, 'Fuel_Type_Description', 'sdfasdfadsfadsf  esp'),
(13, 'fr_CA', 'RefFuelTypes', 16, 'Fuel_Type_Name', 'zdfgsdfsf  fra'),
(14, 'fr_CA', 'RefFuelTypes', 16, 'Fuel_Type_Description', 'sdfasdfadsfadsf  fra'),
(15, 'en_CA', 'RefFuelTypes', 23, 'Fuel_Type_Name', 'test'),
(16, 'en_CA', 'RefFuelTypes', 23, 'Fuel_Type_Description', 'test'),
(19, 'en_CA', 'RefFuelTypes', 25, 'Fuel_Type_Name', 'test2'),
(20, 'en_CA', 'RefFuelTypes', 25, 'Fuel_Type_Description', 'test'),
(21, 'en_CA', 'RefFuelTypes', 26, 'Fuel_Type_Name', 'test'),
(22, 'en_CA', 'RefFuelTypes', 26, 'Fuel_Type_Description', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `lieu_gas`
--

CREATE TABLE `lieu_gas` (
  `id` int(11) NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lieu_gas`
--

INSERT INTO `lieu_gas` (`id`, `lieu`) VALUES
(18, 'liban'),
(19, 'chine');

-- --------------------------------------------------------

--
-- Table structure for table `nom_gas`
--

CREATE TABLE `nom_gas` (
  `id` int(11) NOT NULL,
  `lieu_id` int(11) NOT NULL,
  `prix_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nom_gas`
--

INSERT INTO `nom_gas` (`id`, `lieu_id`, `prix_id`, `nom`) VALUES
(1, 19, 1, 'Gasoline');

-- --------------------------------------------------------

--
-- Table structure for table `prix_gas`
--

CREATE TABLE `prix_gas` (
  `id` int(11) NOT NULL,
  `lieu_id` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prix_gas`
--

INSERT INTO `prix_gas` (`id`, `lieu_id`, `prix`) VALUES
(1, 19, 20);

-- --------------------------------------------------------

--
-- Table structure for table `ref_fuel_types`
--

CREATE TABLE `ref_fuel_types` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `NomGas_id` int(11) DEFAULT NULL,
  `Fuel_Type_Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Fuel_Type_Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `Unit_Buying_Price` int(11) NOT NULL,
  `Unit_Sales_Price` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref_fuel_types`
--

INSERT INTO `ref_fuel_types` (`id`, `user_id`, `NomGas_id`, `Fuel_Type_Name`, `slug`, `Fuel_Type_Description`, `Unit_Buying_Price`, `Unit_Sales_Price`, `created`, `modified`) VALUES
(25, 7, NULL, NULL, 'test', NULL, 10, 10, '2020-11-24 21:39:53', '2020-11-24 21:39:53'),
(26, 7, 1, NULL, 'test', NULL, 10, 10, '2020-11-25 02:13:12', '2020-11-25 02:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'administrateur', 'administrateur'),
(2, 'super-utilisateur', 'super-utilisateur'),
(3, 'maitre', 'maitre');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `ref_fuel_types_id` int(11) NOT NULL,
  `Transaction_Date` date NOT NULL,
  `Transaction_Amount` int(11) NOT NULL,
  `Others_Details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `password`, `created`, `modified`, `uuid`) VALUES
(2, 1, 'admin@admin.com', '$2y$10$55iNITk/mU2K52Aiwy2op.8dYoEII6W0LJZTSbzTrt3XcV77ftEW6', '2020-10-14 00:01:39', '2020-10-20 03:10:44', 'd1732d6a-afe0-4dde-a4dc-b59a94b2d8cc'),
(5, 1, 'ali123@ali.com', '$2y$10$HQxrl9dPWCOw3/r45p7uKe.gCIEd90FJWzbztvPKb3gWxP2Xmlexy', '2020-10-20 03:12:21', '2020-10-20 03:12:21', NULL),
(7, 1, 'ali.jabakhanji@hotmail.com', '$2y$10$QKMe4rON5snt3jLP4xhFWujVa8hvNA/7XeeQxejYSoB9yNkH/TtSK', '2020-10-20 03:19:36', '2020-10-20 03:19:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apropos`
--
ALTER TABLE `apropos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_prices`
--
ALTER TABLE `fuel_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fuel_Type_Code` (`ref_fuel_types_id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `lieu_gas`
--
ALTER TABLE `lieu_gas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nom_gas`
--
ALTER TABLE `nom_gas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom_gas_lieu` (`lieu_id`),
  ADD KEY `nom_gas_prix` (`prix_id`);

--
-- Indexes for table `prix_gas`
--
ALTER TABLE `prix_gas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prix_gas_lieu` (`lieu_id`);

--
-- Indexes for table `ref_fuel_types`
--
ALTER TABLE `ref_fuel_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NomGas_id` (`NomGas_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Fuel_Type_Code` (`ref_fuel_types_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apropos`
--
ALTER TABLE `apropos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fuel_prices`
--
ALTER TABLE `fuel_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lieu_gas`
--
ALTER TABLE `lieu_gas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nom_gas`
--
ALTER TABLE `nom_gas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `prix_gas`
--
ALTER TABLE `prix_gas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ref_fuel_types`
--
ALTER TABLE `ref_fuel_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fuel_prices`
--
ALTER TABLE `fuel_prices`
  ADD CONSTRAINT `fuel_prices_ibfk_1` FOREIGN KEY (`ref_fuel_types_id`) REFERENCES `ref_fuel_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nom_gas`
--
ALTER TABLE `nom_gas`
  ADD CONSTRAINT `nom_gas_lieu` FOREIGN KEY (`lieu_id`) REFERENCES `lieu_gas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nom_gas_prix` FOREIGN KEY (`prix_id`) REFERENCES `prix_gas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prix_gas`
--
ALTER TABLE `prix_gas`
  ADD CONSTRAINT `prix_gas_lieu` FOREIGN KEY (`lieu_id`) REFERENCES `lieu_gas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_fuel_types`
--
ALTER TABLE `ref_fuel_types`
  ADD CONSTRAINT `ref_fuel_types_NomGas` FOREIGN KEY (`NomGas_id`) REFERENCES `nom_gas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ref_fuel_types_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `Fk_Fuel_Type_Code` FOREIGN KEY (`ref_fuel_types_id`) REFERENCES `ref_fuel_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
