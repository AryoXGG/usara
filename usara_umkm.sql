-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2025 at 04:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usara_umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `date`) VALUES
(11, 'joko', '278ea841c0d133059032b8a75320c3e0', 'joko123@gmail.com', '2024-12-31 17:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `o_id` int NOT NULL,
  `u_id` int NOT NULL,
  `nama_paket` varchar(255) DEFAULT NULL,
  `quantity` int NOT NULL,
  `harga` int DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT 'Belum Bayar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paket_digitalisasi`
--

CREATE TABLE `paket_digitalisasi` (
  `paket_id` int NOT NULL,
  `title` varchar(222) NOT NULL,
  `price` int NOT NULL,
  `description` text,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_digitalisasi`
--

INSERT INTO `paket_digitalisasi` (`paket_id`, `title`, `price`, `description`, `image`, `date`) VALUES
(63, 'Paket Starter', 50000, 'Cocok untuk UMKM pemula. Promosi di sosial media dan marketplace selama 7 hari', '6866094909bbe.jpg', '2025-07-03 04:38:33'),
(64, 'Paket Omnichannel', 100000, 'Pendampingan penuh 30 hari: branding, sosial media, katalog produk, iklan digital dasar.', '68660a15ac1e0.jpg', '2025-07-03 04:41:57'),
(65, 'Paket Ultimate', 500000, 'layanan profesional, iklan digital aktif, dan manajemen media sosial selama 30 hari.', '68660a8241f31.jpg', '2025-07-03 04:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int NOT NULL,
  `username` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_toko` varchar(255) DEFAULT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `shopee` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `followers_ig` int DEFAULT '0',
  `penjualan_total` int DEFAULT '0',
  `status_promosi` varchar(50) DEFAULT 'Belum Dimulai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `phone`, `password`, `status`, `date`, `nama_toko`, `ig`, `shopee`, `deskripsi`, `image`, `followers_ig`, `penjualan_total`, `status_promosi`) VALUES
(45, 'aryo', '081234567890', 'd9b542b2bec8892af8801b0e25fca6f2', 1, '2025-06-30 14:50:42', 'toko_aryo', 'aryo', 'aryo', 'ini adalah toko', 'images/produk/1751294132_Screenshot_2025-06-30_140654.png', 14500, 122, 'Belum Dimulai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `fk_user_order` (`u_id`);

--
-- Indexes for table `paket_digitalisasi`
--
ALTER TABLE `paket_digitalisasi`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `o_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `paket_digitalisasi`
--
ALTER TABLE `paket_digitalisasi`
  MODIFY `paket_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_user`
--
ALTER TABLE `order_user`
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
