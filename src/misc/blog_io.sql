-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 10, 2019 at 06:56 PM
-- Server version: 5.5.62
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_io`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `name`, `content`, `id_u`) VALUES
(5, 'Monuma Constant Jr. ', 'Jean Junior Constant Monuma, plus couramment appelé Monuma Constant Jr., né le 1er avril 1982 à Port-au-Prince, est un footballeur haïtien qui évolue au poste de milieu de terrain défensif.\r\n\r\nSon père, Monuma Constant, était lui aussi footballeur, ancien joueur du Violette AC1. ', 5),
(6, 'Humphrey Stafford, 1st Duke of Buckingham', 'Humphrey Stafford, 1st Duke of Buckingham (1402 – 10 July 1460) was an English nobleman and a military commander who fought for the Lancastrian King Henry VI during the Wars of the Roses, where he was killed at the Battle of Northampton. Through his mother he had royal blood as a great-grandson of King Edward III, and from his father, he inherited the earldom of Stafford. He joined the English campaign in France with King Henry V in 1420. Following the king\'s death two years later, he became a councillor for the nine-month-old King Henry VI. Stafford acted as a peacemaker during the 1430s, when Humphrey, Duke of Gloucester vied with Cardinal Beaufort for political supremacy. He took part in the eventual arrest of Gloucester in 1447. He was the King\'s bodyguard and chief negotiator during Jack Cade\'s Rebellion of 1450. In 1455 he fought for the King in the first battle of the Wars of the Roses, at St Albans, where they were both captured by the Yorkists. He spent the last years of his life attempting to mediate between the Yorkist and Lancastrian factions.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `level`) VALUES
(5, 'Théo', 'Huchard', 'theo.huchard@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 99),
(6, 'Frédéric', 'Sananes', 'fsananes@test.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 99),
(7, 'Jean', 'Dupont', 'jdp@test.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
(9, 'Elif', 'Cilingir', 'elif.cilingir061@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 99),
(10, 'Amrta Devy', 'Balasoupramaniane', 'balaamrta@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_u` (`id_u`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
