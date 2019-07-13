-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 01:16 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_concept`
--

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `ID` int(11) NOT NULL COMMENT 'ID SLOGA',
  `PRODUKT_ID` int(11) NOT NULL COMMENT 'ID PRODUKTA POSLANOG U KORPU',
  `NAZIV` varchar(255) NOT NULL COMMENT 'NAZIV PRODUKTA POSLANOG U KORPU',
  `USER` varchar(255) NOT NULL COMMENT 'USER KOJI JE POSLAO PRODUKTE U KORPU',
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`ID`, `PRODUKT_ID`, `NAZIV`, `USER`, `TIME`) VALUES
(124, 5, 'Livanjski sir osminka', 'logged_user', '2019-07-13 23:02:39'),
(128, 5, 'Livanjski sir osminka', 'logged_user', '2019-07-13 23:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `produkti`
--

CREATE TABLE `produkti` (
  `id` int(11) NOT NULL COMMENT 'id svakog produkta',
  `kategorija_id` int(11) NOT NULL,
  `naziv` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'naziv rpodukta',
  `slika` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'naziv slike podukta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela u kojoj se cuvaju svi produkti';

--
-- Dumping data for table `produkti`
--

INSERT INTO `produkti` (`id`, `kategorija_id`, `naziv`, `slika`) VALUES
(1, 1, 'Livanjski sir veliki kolut', 'image_1.jpg'),
(2, 1, 'Livanjski sir mali kolut', 'image_1.jpg'),
(3, 1, 'Livanjski sir polovinka', 'image_1.jpg'),
(4, 1, 'Livanjski sir cetvrtinka', 'image_1.jpg'),
(5, 1, 'Livanjski sir osminka', 'image_1.jpg'),
(6, 1, 'Livanjski sir 300 g', 'image_1.jpg'),
(7, 2, 'Livanjac veliki kolut', 'image_1.jpg'),
(8, 2, 'Livanjac mali kolut', 'image_1.jpg'),
(9, 2, 'Livanjac polovinka', 'image_1.jpg'),
(10, 2, 'Livanjac cetvrtinka', 'image_1.jpg'),
(11, 2, 'Livanjac osminka', 'image_1.jpg'),
(12, 2, 'Livanjac 300 g', 'image_1.jpg'),
(13, 3, 'Trapist veliki kolut', 'image_1.jpg'),
(14, 3, 'Trapist polovinka', 'image_1.jpg'),
(15, 3, 'Trapist cetvrtinka', 'image_1.jpg'),
(16, 3, 'Trapist osminka', 'image_1.jpg'),
(17, 3, 'Trapist 300 g', 'image_1.jpg'),
(18, 4, 'Koziji sir veliki kolut', 'image_1.jpg'),
(19, 4, 'Koziji sir mali kolut', 'image_1.jpg'),
(20, 4, 'Koziji sir polovinka', 'image_1.jpg'),
(21, 4, 'Koziji sir cetvrtinka', 'image_1.jpg'),
(22, 4, 'Koziji sir osminka', 'image_1.jpg'),
(23, 4, 'Koziji sir 300 g', 'image_1.jpg'),
(24, 4, 'Koziji sir mladi', 'image_1.jpg'),
(25, 4, 'Koziji sir meki', 'image_1.jpg'),
(26, 4, 'Koziji sir svjezi', 'image_1.jpg'),
(27, 5, 'Ovciji sir veliki kolut', 'image_1.jpg'),
(28, 5, 'Ovciji sir polovinka', 'image_1.jpg'),
(29, 5, 'Ovciji sir cetvrtinka', 'image_1.jpg'),
(30, 5, 'Ovciji sir osminka', 'image_1.jpg'),
(31, 5, 'Ovciji sir 300 g', 'image_1.jpg'),
(32, 6, 'Dalmatinski sir veliki kolut', 'image_1.jpg'),
(33, 6, 'Dalmatinski sir polovinka', 'image_1.jpg'),
(34, 6, 'Dalmatinski sir cetvrtinka', 'image_1.jpg'),
(35, 6, 'Dalmatinski sir osminka', 'image_1.jpg'),
(36, 6, 'Dalmatinski sir 300 g', 'image_1.jpg'),
(37, 7, 'Delminium veliki kolut', 'image_1.jpg'),
(38, 8, 'Svjezi sir 500 g', 'image_1.jpg'),
(39, 8, 'Svjezi sir 2 kg', 'image_1.jpg'),
(40, 8, 'Svjezi sir 5 kg', 'image_1.jpg'),
(41, 8, 'Svjezi sir sitni 400 g', 'image_1.jpg'),
(42, 8, 'Svjezi sir sitni 5 kg', 'image_1.jpg'),
(43, 9, 'Delmato 360 g', 'image_1.jpg'),
(44, 9, 'Delmato 750 g', 'image_1.jpg'),
(45, 9, 'Delmato 2150 g', 'image_1.jpg'),
(46, 9, 'Delmato sa zacinima 360 g', 'image_1.jpg'),
(47, 9, 'Delmato koziji 360 g', 'image_1.jpg'),
(48, 9, 'Delmato ovciji 360 g', 'image_1.jpg'),
(49, 10, 'Edamer 500 g', 'image_1.jpg'),
(50, 10, 'Edamer 1 kg', 'image_1.jpg'),
(51, 10, 'Edamer 3 kg', 'image_1.jpg'),
(52, 11, 'Gouda 500 g', 'image_1.jpg'),
(53, 11, 'Gouda 1 kg', 'image_1.jpg'),
(54, 11, 'Gouda 3 kg', 'image_1.jpg'),
(55, 12, 'Domaca livada 500 g', 'image_1.jpg'),
(56, 12, 'Domaca livada 1 kg', 'image_1.jpg'),
(57, 12, 'Domaca livada 3 kg', 'image_1.jpg'),
(58, 13, 'Domaci bijeli sir', 'image_1.jpg'),
(59, 14, 'Maslac', 'image_1.jpg'),
(60, 15, 'Sunce', 'image_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produkt_kategorije`
--

CREATE TABLE `produkt_kategorije` (
  `ID` int(11) NOT NULL,
  `NAZIV_KATEGORIJE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produkt_kategorije`
--

INSERT INTO `produkt_kategorije` (`ID`, `NAZIV_KATEGORIJE`) VALUES
(1, 'Livanjski sir'),
(2, 'Livanjac'),
(3, 'Trapist'),
(4, 'Koziji sir'),
(5, 'Ovciji sir'),
(6, 'Dalmatinski sir'),
(7, 'Delminium'),
(8, 'Svjezi sir'),
(9, 'Delmato'),
(10, 'Edamer'),
(11, 'Gouda'),
(12, 'Domaca livada'),
(13, 'Domaci bijeli sir'),
(14, 'Maslac'),
(15, 'Sunce');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `produkti`
--
ALTER TABLE `produkti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produkt_kategorije`
--
ALTER TABLE `produkt_kategorije`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID SLOGA', AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `produkti`
--
ALTER TABLE `produkti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id svakog produkta', AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `produkt_kategorije`
--
ALTER TABLE `produkt_kategorije`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
