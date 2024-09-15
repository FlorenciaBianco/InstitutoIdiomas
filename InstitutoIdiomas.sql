-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2024 at 04:59 PM
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
-- Database: `InstitutoIdiomas`
--

-- --------------------------------------------------------

--
-- Table structure for table `Idioma`
--

CREATE TABLE `Idioma` (
  `id_idioma` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `modulos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Profesor`
--

CREATE TABLE `Profesor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_idioma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Idioma`
--
ALTER TABLE `Idioma`
  ADD PRIMARY KEY (`id_idioma`);

--
-- Indexes for table `Profesor`
--
ALTER TABLE `Profesor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_idioma` (`id_idioma`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Idioma`
--
ALTER TABLE `Idioma`
  MODIFY `id_idioma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Profesor`
--
ALTER TABLE `Profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Profesor`
--
ALTER TABLE `Profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`id_idioma`) REFERENCES `Idioma` (`id_idioma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
