-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2017 at 05:12 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openclassrooms_concevez_votre_site_web_avec_php_et_mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `espace_membres`
--

CREATE TABLE `espace_membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espace_membres`
--

INSERT INTO `espace_membres` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(1, 'babacar', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'ehbc221@gmail.com', '2017-04-29'),
(2, 'pengriffey', '799dc36e6ec173ae91d80f856e3fed9a29f074b5', 'pengriffey221@gmail.com', '2017-04-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `espace_membres`
--
ALTER TABLE `espace_membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `espace_membres`
--
ALTER TABLE `espace_membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
