-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2023 at 06:29 PM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devSGBD`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `sterilized` tinyint(1) NOT NULL,
  `birth_date` date NOT NULL,
  `chip_id` varchar(255) NOT NULL,
  `owner_id` int NOT NULL,
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `sex`, `sterilized`, `birth_date`, `chip_id`, `owner_id`, `parent_id`) VALUES
(1, 'Fifiiiii', 'M', 0, '2013-06-06', '3', 5, NULL),
(2, 'Rex', 'M', 0, '2011-07-07', '2345678901', 2, NULL),
(3, 'Minou', 'M', 1, '2012-08-08', '3456789012', 3, NULL),
(4, 'Belle', 'F', 0, '2013-09-09', '4567890123', 4, NULL),
(5, 'Spot', 'M', 1, '2014-10-10', '5678901234', 5, NULL),
(6, 'Lucky', 'M', 0, '2015-11-11', '6789012345', 1, NULL),
(7, 'Lady', 'F', 1, '2016-12-12', '7890123456', 2, NULL),
(9, 'Max', 'M', 0, '2015-07-07', '0000001', 1, NULL),
(10, 'Bella', 'F', 1, '2017-05-15', '0000002', 2, 1),
(11, 'Charlie', 'M', 0, '2018-11-11', '0000003', 1, 1),
(12, 'Lucy', 'F', 1, '2020-01-01', '0000004', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Italian'),
(2, 'Chinese');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`) VALUES
(1, 'Tagliatelles'),
(2, 'Creme epaisse'),
(6, 'Lardons'),
(12, 'Poivre'),
(13, 'Oeufs');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_recipe`
--

CREATE TABLE `ingredient_recipe` (
  `id` int NOT NULL,
  `ingredient_id` int NOT NULL,
  `recipe_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredient_recipe`
--

INSERT INTO `ingredient_recipe` (`id`, `ingredient_id`, `recipe_id`) VALUES
(25, 2, 4),
(26, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `first_name`, `last_name`, `birth_date`, `email`, `phone`) VALUES
(1, 'Jeanyy', 'yDupont', '1978-01-01', 'jeany.dupont@gmail.com', '0123456789'),
(2, 'Marie', 'Durand', '1980-02-02', 'marie.durand@gmail.com', '0234567891'),
(3, 'Pierre', 'Martin', '1990-03-03', 'pierre.martin@gmail.com', '0345678921'),
(4, 'Sophie', 'Bernard', '2000-04-04', 'sophie.bernard@gmail.com', '0456789231'),
(5, 'Luc', 'Lefevre', '1960-05-05', 'luc.lefevre@gmail.com', '0567892341');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `description`, `category_id`) VALUES
(4, 'Pates Carbo', 'Delicieux', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stays`
--

CREATE TABLE `stays` (
  `id` int NOT NULL,
  `reservation_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `animal_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stays`
--

INSERT INTO `stays` (`id`, `reservation_date`, `start_date`, `end_date`, `animal_id`) VALUES
(2, '2023-02-02', '2023-02-03', '2023-02-04', 2),
(3, '2023-03-03', '2023-03-04', '2023-03-05', 3),
(4, '2023-04-04', '2023-04-05', '2023-04-06', 4),
(5, '2023-05-05', '2023-05-06', '2023-05-07', 5),
(6, '2023-06-06', '2023-06-07', '2023-06-08', 6),
(7, '2023-08-08', '2023-08-09', '2023-08-10', 1),
(8, '2023-07-07', '2023-07-08', '2023-07-09', 7),
(9, '2023-06-24', '2024-07-01', '2024-07-06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_recipe`
--
ALTER TABLE `ingredient_recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient_id` (`ingredient_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `stays`
--
ALTER TABLE `stays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ingredient_recipe`
--
ALTER TABLE `ingredient_recipe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stays`
--
ALTER TABLE `stays`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `animals_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `animals` (`id`);

--
-- Constraints for table `ingredient_recipe`
--
ALTER TABLE `ingredient_recipe`
  ADD CONSTRAINT `ingredient_recipe.ingredient_id` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `ingredient_recipe.recipe_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes.category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `stays`
--
ALTER TABLE `stays`
  ADD CONSTRAINT `stays_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
