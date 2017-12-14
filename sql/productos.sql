-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2017 at 09:43 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `casaempenio`
--

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `marca` varchar(60) NOT NULL,
  `precio` float NOT NULL,
  `rutaImagen` varchar(60) NOT NULL,
  `categoria` varchar(60) NOT NULL,
  `reservado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `descripcion`, `marca`, `precio`, `rutaImagen`, `categoria`, `reservado`) VALUES
(1, 'Bocinas', 'Bocinas grandes', 'Velikka', 1500, 'http://localhost/empeniosoaxaca/images/a.jpg', 'Audio y Video', 0),
(2, 'Nintendo Wii', 'Version 3.0', 'Nintendo', 1700, 'http://localhost/empeniosoaxaca/images/b.jpg', 'Consolas', 0),
(3, 'iPhone X', 'x10', 'Apple', 4500, 'http://localhost/empeniosoaxaca/images/c.jpg', 'Celulares', 0),
(4, 'PS4', 'Slim', 'Sony', 5500, 'http://localhost/empeniosoaxaca/images/d.jpg', 'Consolas', 0),
(6, 'Laptop', 'Gamer', 'DELL', 5500, 'http://localhost/empeniosoaxaca/images/e.jpg', 'Computacion', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;