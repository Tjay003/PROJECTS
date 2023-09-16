-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 10:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootleg`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `supply` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `supply`, `category`, `image`) VALUES
(9, 'George Brief Large', '180.00', '3', 'Brief / Mens / Bottom ', 'photo_2023-06-21_16-28-44.jpg'),
(10, 'Ladies Panty Extra 3XL', '300.00', '3', 'Panty / woman / Bottom', 'photo_2023-06-21_16-28-46.jpg'),
(11, 'Duster', '400.00', '1', 'duster / Woman / Overall', 'photo_2023-06-21_16-28-47.jpg'),
(12, 'Hanes Vneck Tshirt Medium', '200.00', '3', 'Tshirt / Mens / Top', 'photo_2023-06-21_16-28-48.jpg'),
(13, 'Volunteer Bag ', '150.00', '1', 'SlingBag / Bag / Unisex ', 'photo_2023-06-21_16-28-49.jpg'),
(14, 'PoloShirt White BlueCorner Small', '250.00', '2', 'PoloShirt / Mens / Top / Bluecorner', 'photo_2023-06-21_16-28-49 (2).jpg'),
(15, 'Knitted Blouse NoSleeves Freesize', '280.00', '1', 'Knitted / Woman / Top', 'photo_2023-06-21_16-28-50 (2).jpg'),
(16, 'UrbanPipe 36', '300.00', '5', 'Short / Mens / Bottom ', 'photo_2023-06-21_16-28-51.jpg'),
(17, 'Knitted Blouse NoSleeves Freesize Pink', '250.00', '1', 'Knitted / Woman / Top ', 'photo_2023-06-21_16-28-50.jpg'),
(19, 'Taslan White', '100.00', '1', 'Short / Unisex / Bottom', 'photo_2023-06-21_16-52-51.jpg'),
(20, 'Corduroy Short Brown Freesize', '250.00', '1', 'Corduroy / short / Bottom', 'photo_2023-06-21_16-52-42.jpg'),
(21, 'A', '250.00', '1', 'corduroy / short / Bottom', 'photo_2023-06-21_16-52-55.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
