-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2024 at 09:56 PM
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
  `modulos` int(11) NOT NULL,
  `imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Idioma`
--

INSERT INTO `Idioma` (`id_idioma`, `nombre`, `descripcion`, `modulos`, `imagen`) VALUES
(1, 'Ingles', 'Tercer idioma del mundo ', 4, ''),
(2, 'Frances', 'Quinto idioma del mundo', 3, ''),
(3, 'Italiano', 'Vigesimo idioma del mundo', 3, ''),
(4, 'Aleman', 'Decimo idioma del mundo', 2, ''),
(5, 'chilenoo', 'asd', 1, ''),
(7, 'Hebreo', 'fbhfufbdhbfh', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `Profesor`
--

CREATE TABLE `Profesor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_idioma` int(11) NOT NULL,
  `imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Profesor`
--

INSERT INTO `Profesor` (`id`, `nombre`, `telefono`, `email`, `id_idioma`, `imagen`) VALUES
(1, 'Mateo', 123456, 'mateo@idiomas.com.ar', 1, ''),
(2, 'Florencia', 654321, 'florencia@idiomas.com.ar', 3, ''),
(9, 'Matias', 192837, 'matias@idiomas.com.ar', 1, ''),
(10, 'Milagros', 203948, 'milagros@idiomas.com', 2, ''),
(11, 'Lucia ', 223344, 'lucia@idiomas.com.ar', 4, ''),
(12, 'Martin', 114477, 'martin@idiomas.com.ar', 1, ''),
(13, 'pepe', 23232, 's@x.com', 5, ''),
(15, 'fdsfsd', 1213, 'dzds', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`) VALUES
(1, 'webadmin@web2.com', '$2y$10$1yrWhYguqF9Yj9G64T58.OD7OiBIpaSIn3eSH7KZubfJPXD2zJbRy');

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
  ADD KEY `id_idioma` (`id_idioma`) USING BTREE;

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Idioma`
--
ALTER TABLE `Idioma`
  MODIFY `id_idioma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Profesor`
--
ALTER TABLE `Profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
