-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 02:46 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kang_bangunan`
--

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `idPenjualan` int(11) NOT NULL,
  `kuantitas` varchar(45) DEFAULT NULL,
  `Product_idProduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idPenjualan`, `kuantitas`, `Product_idProduk`) VALUES
(1, '1', 1),
(2, '1', 1),
(3, '1', 1),
(4, '1', 1),
(5, '1', 1),
(6, '1', 1),
(7, '1', 1),
(8, '1', 2),
(9, '1', 3),
(10, '1', 6),
(11, '1', 1),
(12, '1', 1),
(13, '1', 2),
(14, '1', 3),
(15, '1', 2),
(16, '1', 1),
(17, '1', 3),
(18, '1', 6),
(19, '1', 6),
(20, '1', 6),
(21, '1', 3),
(22, '1', 2),
(23, '1', 1),
(24, '1', 1),
(25, '1', 2),
(26, '1', 3),
(27, '1', 6),
(28, '1', 3),
(29, '1', 2),
(30, '1', 1),
(31, '1', 3),
(32, '1', 6),
(33, '1', 2),
(34, '1', 3),
(35, '1', 6),
(36, '1', 1),
(37, '1', 2),
(38, '1', 3),
(39, '1', 6),
(40, '1', 3),
(41, '1', 2),
(42, '1', 1),
(43, '1', 1),
(44, '1', 1),
(45, '1', 1),
(46, '1', 1),
(47, '1', 1),
(48, '1', 1),
(49, '1', 1),
(50, '1', 1),
(51, '1', 1),
(52, '1', 1),
(53, '1', 1),
(54, '1', 1),
(55, '1', 1),
(56, '1', 1),
(57, '1', 1),
(58, '1', 1),
(59, '1', 1),
(60, '1', 1),
(61, '1', 1),
(62, '1', 1),
(63, '1', 1),
(64, '1', 1),
(65, '1', 1),
(66, '1', 1),
(67, '1', 1),
(68, '1', 1),
(69, '1', 1),
(70, '1', 1),
(71, '1', 1),
(72, '1', 2),
(73, '1', 2),
(74, '1', 2),
(75, '1', 2),
(76, '1', 3),
(77, '1', 6),
(78, '1', 6),
(79, '1', 6),
(80, '1', 6),
(81, '1', 6),
(82, '1', 6),
(83, '1', 6),
(84, '1', 6),
(85, '1', 6),
(86, '1', 6),
(87, '1', 6),
(88, '1', 6),
(89, '1', 6),
(90, '1', 6),
(91, '1', 6),
(92, '1', 6),
(93, '1', 3),
(94, '1', 3),
(95, '1', 3),
(96, '1', 3),
(97, '1', 3),
(98, '1', 1),
(99, '1', 1),
(100, '1', 2),
(101, '1', 3),
(102, '1', 2),
(103, '1', 1),
(104, '1', 2),
(105, '1', 3),
(106, '1', 2),
(107, '1', 1),
(108, '1', 2),
(109, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(45) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `HPP` varchar(45) DEFAULT NULL,
  `hargaJual` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `stok`, `HPP`, `hargaJual`) VALUES
(1, 'Semen Tiga Roda - Kokoh tak tertandingi', 943, '231000', '400000'),
(2, 'Pasir Urug Pondasi', 420, '50000', '60000'),
(3, 'Batako Premium', 471, '23100', '40000'),
(6, 'Batu Bata Merah', 572, '34000', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` varchar(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `email`, `password`) VALUES
('owner', 'owner@gmail.com', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idPenjualan`,`Product_idProduk`),
  ADD KEY `fk_Penjualan_Product_idx` (`Product_idProduk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `idPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_Penjualan_Product` FOREIGN KEY (`Product_idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
