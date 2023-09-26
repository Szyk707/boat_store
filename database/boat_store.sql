-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 10:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `boats`
--

CREATE TABLE `boats` (
  `id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `length` decimal(10,2) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `width` decimal(10,2) NOT NULL,
  `category` varchar(35) NOT NULL,
  `engine` varchar(100) NOT NULL,
  `horse_power` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boats`
--

INSERT INTO `boats` (`id`, `model`, `price`, `length`, `height`, `width`, `category`, `engine`, `horse_power`) VALUES
(1, 'Regal 2450', 115000, 8.00, 2.00, 4.00, 'engine_boat', 'super mega silnik', 200),
(2, 'OPEN - Celestic S21', 99000, 5.92, 1.90, 2.49, 'engine_boat', 'niesuper silnik', 20);

-- --------------------------------------------------------

--
-- Table structure for table `boats_components`
--

CREATE TABLE `boats_components` (
  `boat_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `componets_catgories`
--

CREATE TABLE `componets_catgories` (
  `component_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `boat_id` int(11) NOT NULL,
  `file_path` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`boat_id`, `file_path`) VALUES
(1, './images/rand_boat.png'),
(2, './images/ryan.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `boat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_components`
--

CREATE TABLE `orders_components` (
  `order_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boats`
--
ALTER TABLE `boats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boats_components`
--
ALTER TABLE `boats_components`
  ADD KEY `bc_boats` (`boat_id`),
  ADD KEY `bc_components` (`component_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `componets_catgories`
--
ALTER TABLE `componets_catgories`
  ADD KEY `cc_categories` (`category_id`),
  ADD KEY `cc_components` (`component_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD KEY `image_boat` (`boat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user` (`user_id`),
  ADD KEY `order_boats` (`boat_id`);

--
-- Indexes for table `orders_components`
--
ALTER TABLE `orders_components`
  ADD KEY `oc_orders` (`order_id`),
  ADD KEY `oc_components` (`component_id`);

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
-- AUTO_INCREMENT for table `boats`
--
ALTER TABLE `boats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
