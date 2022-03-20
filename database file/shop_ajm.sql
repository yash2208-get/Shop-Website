-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 08:42 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_ajm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cagy`
--

CREATE TABLE `cagy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dis` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cagy`
--

INSERT INTO `cagy` (`id`, `name`, `dis`) VALUES
(1, 'Hair Care', 'Hair Care'),
(2, 'oral Care', ''),
(3, 'Dishwash', ''),
(4, 'OTC', '');

-- --------------------------------------------------------

--
-- Table structure for table `cont`
--

CREATE TABLE `cont` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cont` varchar(24) NOT NULL,
  `meg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cont`
--

INSERT INTO `cont` (`id`, `name`, `email`, `cont`, `meg`) VALUES
(1, 'yash', 'y@gmail.com', '741456', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE `prod` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `Qua` varchar(255) DEFAULT NULL,
  `Catag` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`id`, `name`, `price`, `stock`, `Qua`, `Catag`, `img`) VALUES
(10, 'Nykaa Naturals Hair Growth Combo', 678, 10, 'Kg', 1, 'upod/a9f4ab6nynykbc001421_1.jpg'),
(11, 'WOW Skin Science Onion Black Seed Oil Hair Care Kit (Shampoo + Hair Conditioner + Hair Oil)', 300, 12, 'Kg', 1, 'upod/3c8aa038904311902621_1.jpg'),
(12, 'Lotus Botanicals Red Onion Total Repair Hair Mask', 300, 13, 'Kg', 1, 'upod/16f877f0806360003312_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cont` varchar(24) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`id`, `name`, `email`, `cont`, `pass`) VALUES
(1, 'yash', 'yash@gmail.com', '741486428', 'y@@@@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cagy`
--
ALTER TABLE `cagy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cont`
--
ALTER TABLE `cont`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Catag` (`Catag`);

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cagy`
--
ALTER TABLE `cagy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cont`
--
ALTER TABLE `cont`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prod`
--
ALTER TABLE `prod`
  ADD CONSTRAINT `prod_ibfk_1` FOREIGN KEY (`Catag`) REFERENCES `cagy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
