-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 09:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `achats`
--

CREATE TABLE `achats` (
  `Num_Ach` int(11) NOT NULL,
  `Date_Ach` date NOT NULL,
  `Id_four` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `approvis`
--

CREATE TABLE `approvis` (
  `Id_Ach` int(11) NOT NULL,
  `Id_Pro` int(11) NOT NULL,
  `Qun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `Id_cat` int(11) NOT NULL,
  `NomCat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `Id_com` int(11) NOT NULL,
  `Date_com` date NOT NULL,
  `Id_cli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ln_commande`
--

CREATE TABLE `ln_commande` (
  `Id_pro` int(11) NOT NULL,
  `Num_com` int(11) NOT NULL,
  `Quntite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `Id_per` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `tele` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `Ref` int(100) NOT NULL,
  `lib` varchar(100) NOT NULL,
  `PrixU` double DEFAULT NULL,
  `PrixV` double DEFAULT NULL,
  `PrixA` double DEFAULT NULL,
  `Quns` int(11) DEFAULT NULL,
  `Photo` varchar(50) NOT NULL,
  `Cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `Id_Ticket` int(11) NOT NULL,
  `Id_Pro` int(11) DEFAULT NULL,
  `Qun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tiket_vue`
-- (See below for the actual view)
--
CREATE TABLE `tiket_vue` (
`Id_Pro` int(11)
,`lib` varchar(100)
,`somme` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_user`, `login`, `password`, `Role`) VALUES
(1, 'admin', '0000', 1),
(2, 'caisser', '1234', 2);

-- --------------------------------------------------------

--
-- Structure for view `tiket_vue`
--
DROP TABLE IF EXISTS `tiket_vue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tiket_vue`  AS SELECT `ticket`.`Id_Pro` AS `Id_Pro`, `produit`.`lib` AS `lib`, sum(`ticket`.`Qun`) AS `somme` FROM (`ticket` join `produit`) WHERE `ticket`.`Id_Pro` = `produit`.`Ref` GROUP BY `ticket`.`Id_Pro``Id_Pro`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`Num_Ach`),
  ADD KEY `fk_foour` (`Id_four`);

--
-- Indexes for table `approvis`
--
ALTER TABLE `approvis`
  ADD PRIMARY KEY (`Id_Ach`,`Id_Pro`),
  ADD KEY `fk_ProAch` (`Id_Pro`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Id_cat`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`Id_com`),
  ADD KEY `fk_cli` (`Id_cli`);

--
-- Indexes for table `ln_commande`
--
ALTER TABLE `ln_commande`
  ADD PRIMARY KEY (`Id_pro`,`Num_com`),
  ADD KEY `fk_com` (`Num_com`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`Id_per`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`Ref`),
  ADD KEY `Cat` (`Cat`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`Id_Ticket`),
  ADD KEY `Id_Pro` (`Id_Pro`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achats`
--
ALTER TABLE `achats`
  MODIFY `Num_Ach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `Id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `Id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `Id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `Ref` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `Id_Ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achats`
--
ALTER TABLE `achats`
  ADD CONSTRAINT `fk_foour` FOREIGN KEY (`Id_four`) REFERENCES `personne` (`Id_per`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `approvis`
--
ALTER TABLE `approvis`
  ADD CONSTRAINT `fk_AchtAch` FOREIGN KEY (`Id_Ach`) REFERENCES `achats` (`Num_Ach`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ProAch` FOREIGN KEY (`Id_Pro`) REFERENCES `produit` (`Ref`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_cli` FOREIGN KEY (`Id_cli`) REFERENCES `personne` (`Id_per`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ln_commande`
--
ALTER TABLE `ln_commande`
  ADD CONSTRAINT `fk_Pro` FOREIGN KEY (`Id_pro`) REFERENCES `produit` (`Ref`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Prod` FOREIGN KEY (`Id_pro`) REFERENCES `produit` (`Ref`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_com` FOREIGN KEY (`Num_com`) REFERENCES `commande` (`Id_com`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`Cat`) REFERENCES `categorie` (`Id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`Id_Pro`) REFERENCES `produit` (`Ref`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
