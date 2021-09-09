-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Sep 2021 um 14:53
-- Server-Version: 10.4.20-MariaDB
-- PHP-Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fswd13_team4_project3_db`
--
CREATE DATABASE IF NOT EXISTS `fswd13_team4_project3_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd13_team4_project3_db`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`ID`, `name`) VALUES
(1, 'Tech'),
(2, 'Clothes');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cities`
--

CREATE TABLE `cities` (
  `ID` int(10) UNSIGNED NOT NULL,
  `fk_country` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `city_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `cities`
--

INSERT INTO `cities` (`ID`, `fk_country`, `name`, `zip`, `city_code`) VALUES
(1, 1, 'Vienna', '1010', 1),
(2, 1, 'Graz', '8010', 316),
(3, 1, 'Salzburg', '5020', 662),
(4, 13, 'Berlin', '10115', 30),
(5, 13, 'Cologne', '50667', 221),
(6, 13, 'Leipzig', '04103', 341),
(7, 9, 'Bern', '3001', 31),
(8, 9, 'Zurich', '8000', 43),
(9, 9, 'Geneva', '1201', 22);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `countries`
--

CREATE TABLE `countries` (
  `ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `area_code` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `countries`
--

INSERT INTO `countries` (`ID`, `name`, `area_code`) VALUES
(1, 'Austria', 43),
(9, 'Switzerland', 41),
(13, 'Germany', 49);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `invoice_cart`
--

CREATE TABLE `invoice_cart` (
  `ID` int(10) UNSIGNED NOT NULL,
  `fk_user` int(11) UNSIGNED DEFAULT NULL,
  `fk_product` int(11) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `discount` float DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `fk_seller` int(11) UNSIGNED NOT NULL,
  `hidden_field` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_in_category`
--

CREATE TABLE `product_in_category` (
  `ID` int(10) UNSIGNED NOT NULL,
  `fk_category` int(11) UNSIGNED DEFAULT NULL,
  `fk_product` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questions_asked`
--

CREATE TABLE `questions_asked` (
  `ID` int(10) UNSIGNED NOT NULL,
  `fk_user` int(11) UNSIGNED NOT NULL,
  `fk_product` int(11) UNSIGNED NOT NULL,
  `question` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `question_answered`
--

CREATE TABLE `question_answered` (
  `ID` int(10) UNSIGNED NOT NULL,
  `fk_question` int(11) UNSIGNED DEFAULT NULL,
  `fk_user` int(11) UNSIGNED DEFAULT NULL,
  `answer` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(10) UNSIGNED NOT NULL,
  `fk_user` int(11) UNSIGNED DEFAULT NULL,
  `fk_product` int(11) UNSIGNED DEFAULT NULL,
  `rating` decimal(4,2) NOT NULL,
  `review` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `fk_city` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','seller','delivery') NOT NULL DEFAULT 'user',
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `isBanned` tinyint(1) DEFAULT 0,
  `banned_from` int(11) DEFAULT NULL,
  `banned_until` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_to_countries` (`fk_country`);

--
-- Indizes für die Tabelle `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `invoice_cart`
--
ALTER TABLE `invoice_cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_user` (`fk_user`),
  ADD KEY `fk_product` (`fk_product`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_seller` (`fk_seller`);

--
-- Indizes für die Tabelle `product_in_category`
--
ALTER TABLE `product_in_category`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_category` (`fk_category`),
  ADD KEY `fk_product` (`fk_product`);

--
-- Indizes für die Tabelle `questions_asked`
--
ALTER TABLE `questions_asked`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_product` (`fk_product`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indizes für die Tabelle `question_answered`
--
ALTER TABLE `question_answered`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_question` (`fk_question`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indizes für die Tabelle `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_product` (`fk_product`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_city` (`fk_city`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `cities`
--
ALTER TABLE `cities`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `invoice_cart`
--
ALTER TABLE `invoice_cart`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `product_in_category`
--
ALTER TABLE `product_in_category`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `questions_asked`
--
ALTER TABLE `questions_asked`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `question_answered`
--
ALTER TABLE `question_answered`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `fk_to_countries` FOREIGN KEY (`fk_country`) REFERENCES `countries` (`ID`);

--
-- Constraints der Tabelle `invoice_cart`
--
ALTER TABLE `invoice_cart`
  ADD CONSTRAINT `invoice_cart_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `invoice_cart_ibfk_2` FOREIGN KEY (`fk_product`) REFERENCES `products` (`ID`);

--
-- Constraints der Tabelle `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`fk_seller`) REFERENCES `users` (`ID`);

--
-- Constraints der Tabelle `product_in_category`
--
ALTER TABLE `product_in_category`
  ADD CONSTRAINT `product_in_category_ibfk_1` FOREIGN KEY (`fk_category`) REFERENCES `categories` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_in_category_ibfk_2` FOREIGN KEY (`fk_product`) REFERENCES `products` (`ID`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `questions_asked`
--
ALTER TABLE `questions_asked`
  ADD CONSTRAINT `questions_asked_ibfk_1` FOREIGN KEY (`fk_product`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `questions_asked_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `users` (`ID`);

--
-- Constraints der Tabelle `question_answered`
--
ALTER TABLE `question_answered`
  ADD CONSTRAINT `question_answered_ibfk_1` FOREIGN KEY (`fk_question`) REFERENCES `questions_asked` (`ID`),
  ADD CONSTRAINT `question_answered_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `users` (`ID`);

--
-- Constraints der Tabelle `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`fk_product`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `users` (`ID`);

--
-- Constraints der Tabelle `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_city`) REFERENCES `cities` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
