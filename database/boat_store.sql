-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 04, 2023 at 01:05 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boat_store`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `boats`
--

CREATE TABLE `boats` (
  `id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `production_year` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `length` decimal(10,2) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `width` decimal(10,2) NOT NULL,
  `category` enum('engine_boat','rowing_boat','sailing_boat') NOT NULL,
  `engine` varchar(100) NOT NULL,
  `fuel_type` enum('electric','diesel','gas','other') NOT NULL,
  `horse_power` int(11) NOT NULL,
  `main_img_path` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boats`
--

INSERT INTO `boats` (`id`, `model`, `production_year`, `price`, `length`, `height`, `width`, `category`, `engine`, `fuel_type`, `horse_power`, `main_img_path`, `description`) VALUES
(1, 'Regal 2450', 0, 115000, 11.00, 2.00, 4.00, 'engine_boat', 'super mega silnik', 'electric', 200, './images/rand_boat.png', '2023 Pischel Ribline 8.5 GTO Cabin Nighthawk\r\n8.5 GTO Cabin Nighthawk\r\n\r\n(inkl. Motoren FL200 XB EFI & F200 XB EFI, je 147,1 KW/ 200 PS)\r\n\r\nAuf Wunsch weitere Motorisierung lieferbar.\r\n\r\nVerkürzte Lieferzeit, Boot ist in der Fertigung!\r\n\r\nWir haben äußersten Wert auf die Funktionalität gelegt und trotzdem den Spagat geschafft das Design in seiner kompromisslosen Form nicht verändern zu müssen. Somit stehen Design und Funktionalität in Harmonie. Der GFK-Bug beherbergt die Standard-Ankerwinde ohne dem Innenraum Länge zu nehmen. Breite Durchgänge neben der Steuerkonsole gewährleisten ein Maximum an Trittsicherheit auch bei rauer See. Doppelte Heavy Duty Fenderleisten schützen den handgefertigten Schlauchkörper.\r\n\r\nDie Badeplattformen des Pischel Ribline 8.5 GTO Cabin sorgen für maximale Bewegungssicherheit bei Heckliegern in der Marin, genauso wie der bugseitige Tritt, der mit maximaler Trittfläche ausgeführt wurde. Unter dem Fahrersitz befindet sich die Pantry mit Waschbecken, den ca. 85L fassendem Kompressor Kühlschrank und den optionalen Gasherd. Die Duscharmatur befindet sich bei der Badeplattform. Die Sitzbank des Fahrers lässt sich mit zwei Handgriffen zu einem Leaningpost verwandeln. Die Außenpolster sind mit wasserdichten Multi-PU Schaumkernen versehen. Das bewirkt einen erhöhten Sitzkomfort auch bei längeren Etappen. Auf Kundenwunsch wird das Pischel Ribline 8.5 GTO Cabin optional mit T Top oder Geräteträger und bei Bedarf mit Sonnensegel versehen. In der Nighthawk Edition dominieren (siehe Bilder) die Farbe Schwarz und Grafitgrau. (Standardfarbe weiß). Die Edition verfügt über handgefertigte Silvertex Lakritz-Black Strukturpolster und Rosch Teil-Deck in Black. Das Pischel Ribline 8.5 GTO Cabin besticht nicht nur durch seine äußeren Werte. Dieser martialisch anmutende Offshore Bolide wurde mit außerordentlichen Rauwasser Genen versehen. Sein patentiertes Super Deep V sucht seines Gleichen. Bei unseren Testfahrten rund um Sardinien, waren auch Sturm (*) mit hohen Wellen kein Hindernis. Es fuhr jederzeit sicher, zügig und komfortabel. Der 425 L Treibstofftank sorgt für eine außerordentlich hohe Reichweite.\r\n\r\nDie Kabine wird individuell nach Kundenwunsch gestaltet. Hier zu sehen, die offene Lounge Version mit integriertem WC unter der Steuerbord Sitzfläche. Die große Liegefläche hat einen wesentlichen Vorteil in dieser Klasse. Sie ist von beiden Seiten zu nutzen, da Sie horizontal ausgelegt ist. Das heißt einer bequemen Nacht zu zweit steht nichts im Wege. Eine indirekte LED Ambient Beleuchtung mit Fernbedienung gehört zum Standard.\r\n\r\nNur hochwertigste und feinste Polsterstoffe aus dem Yacht Bau haben wir für die Wandpanel und Sitzmöbel Polsterung ausgewählt.\r\n\r\nUnter der Polsterliege befinden sich zwei große Stauboxen. Bordnetzkontrolle und die Radiobedienung befindet sich im Eingangsbereich innerhalb der Kabine. Optional liefern wir einen Toilettenraum mit Tür auf Steuerbord. Der Loungedivan entfällt dabei. Durch das serienmäßige Zusatzkissen lässt sich die Liegeverlängerung des Loungedivan zu einer ebenen Sitzfläche umwandeln. (*Nicht bildlich dargestellt).\r\n\r\n•••TECHNISCHE SPEZIFIKATIONEN:\r\n\r\nRibline 8.5 GTO CABIN\r\n\"NIGHTHAWK\"\r\nDeep V Composite Rumpf,\r\nOrca Hypalon Bootshaut, Antirutsch Top Schlauch,\r\n2 GTO Fenderleisten\r\nJe 2 Bugseitige Griffschlaufen auf dem Schlauch neben der\r\nPolsterliege\r\nKonsolen Haltereelingen Scheibe, Sportlenkrad,\r\nNiedergang in die Kabine\r\nLiege innerhalb der Kabine, teils bepolsterte Seitenwände\r\nLoungedivan innerhalb der Kabine\r\nLED Ambientebeleuchtung am Kabinenkopf\r\ninkl. Toilettenvorbereitung, Deckenled\r\nTwin Leaningpost mit fix montiertem Polster\r\nPantry mit Waschbecken und Pultled und 2x Plichtled, 12v\r\nSteckdose\r\nSitzgruppe achtern mit Teaktisch\r\nPolsterliege Bugseits\r\nGFK Ankerdavit Bug mit Inox Rolle & festen Belegklampen,\r\nGFK Tritte achtern & festen Belegklampen\r\nEinbautank 455 L aus Edelstahl , Tankgeber,\r\nDusche mit 70L Wassertank\r\nGFK Badeplattformen mit Teleskopbadeleiter\r\n1 große Lenzpumpe achtern,\r\nTurbomax Kompressor,\r\nMit Motor:\r\n\r\n2x\r\n\r\nFL200 FETX EFI\r\n\r\nF(L) 200 XB EFI, 147,1 KW/ 200 PS\r\n\r\nAuf Wunsch mit weiteren Details & gegen Aufpreis lieferbar! Wir beraten Sie dazu gerne persönlich. Nehmen Sie Kontakt zu uns auf.'),
(2, 'OPEN - Celestic S21', 0, 99000, 5.92, 1.90, 2.49, 'engine_boat', 'niesuper silnik', 'gas', 20, './images/ryan.png', ''),
(3, 'Riomar (NL) tender 690', 2021, 106265, 6.40, 1.20, 2.20, 'engine_boat', 'Suzuki', 'gas', 10, './images/riomar (6).jpg', '2021 Riomar (NL) tender 690\r\nNeu neu neu RIOMAR 690 Tender neu neu neu Neu das Riomar 690 Tender das boot mit den “versteckten” aussenborder. Das boot hat ein schöne hohen Rückenlehne, und ein große Sonnendeck vorne wie hinten. Das boot hat vorne eine chemie Toilette und links und rechts große staufacher. Hinten haben sie eine große badeplatform. Das boot hat eine 8 personen Zulassung. Das boot können sie Ausstatten bis Max 60 ps. Man kan ein Kühlschrank und Waschbecken einbauen. Verschiedene bootsfarben / Polster möglich. Gerne machen wir ihnen komplett Angebote. Auf: Riomar-boats. Com können sie ein bootconfig machen.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `boats_components`
--

CREATE TABLE `boats_components` (
  `boat_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `componets_catgories`
--

CREATE TABLE `componets_catgories` (
  `component_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

CREATE TABLE `images` (
  `boat_id` int(11) NOT NULL,
  `file_path` varchar(150) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`boat_id`, `file_path`, `id`) VALUES
(1, '../images/rand_boat.png', 1),
(2, '../images/ryan.png', 2),
(1, '../images/ryan.png', 3),
(3, '../images/riomar (1).jpg', 7),
(3, '../images/riomar (2).jpg', 8),
(3, '../images/riomar (3).jpg', 9),
(3, '../images/riomar (6).jpg', 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `boat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders_components`
--

CREATE TABLE `orders_components` (
  `order_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(25) NOT NULL,
  `permission` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permission`) VALUES
(1, 'dundon@gmail.com', 'password', 1),
(2, 'dundon2@gmail.com', 'password', 0),
(3, 'sus@gmail.com', 'password', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `boats`
--
ALTER TABLE `boats`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `boats_components`
--
ALTER TABLE `boats_components`
  ADD KEY `bc_boats` (`boat_id`),
  ADD KEY `bc_components` (`component_id`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `componets_catgories`
--
ALTER TABLE `componets_catgories`
  ADD KEY `cc_categories` (`category_id`),
  ADD KEY `cc_components` (`component_id`);

--
-- Indeksy dla tabeli `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_boat` (`boat_id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user` (`user_id`),
  ADD KEY `order_boats` (`boat_id`);

--
-- Indeksy dla tabeli `orders_components`
--
ALTER TABLE `orders_components`
  ADD KEY `oc_orders` (`order_id`),
  ADD KEY `oc_components` (`component_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boats`
--
ALTER TABLE `boats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boats_components`
--
ALTER TABLE `boats_components`
  ADD CONSTRAINT `bc_boats` FOREIGN KEY (`boat_id`) REFERENCES `boats` (`id`),
  ADD CONSTRAINT `bc_components` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`);

--
-- Constraints for table `componets_catgories`
--
ALTER TABLE `componets_catgories`
  ADD CONSTRAINT `cc_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `cc_components` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `image_boat` FOREIGN KEY (`boat_id`) REFERENCES `boats` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_boats` FOREIGN KEY (`boat_id`) REFERENCES `boats` (`id`),
  ADD CONSTRAINT `orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_components`
--
ALTER TABLE `orders_components`
  ADD CONSTRAINT `oc_components` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `oc_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
