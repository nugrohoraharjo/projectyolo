-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 02:27 AM
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
-- Database: `yolodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`id`, `filename`, `time`) VALUES
(10, 'notsafecapture_Tuesday_December_212021_18_41_22_022316.jpg', '2021-12-21 11:41:22'),
(13, 'notsafecapture_Tuesday_December_212021_18_43_03_815466.jpg', '2021-12-21 11:43:03'),
(14, 'notsafecapture_Tuesday_December_212021_18_44_39_699610.jpg', '2021-12-21 11:44:39'),
(74, 'notsafecapture_Tuesday_January_112022_16_06_49_987980.jpg', '2022-01-11 09:06:50'),
(82, 'notsafecapture_Tuesday_January_112022_18_58_51_372931.jpg', '2022-01-11 11:58:51'),
(90, 'notsafecapture_Tuesday_January_112022_19_18_38_918395.jpg', '2022-01-11 12:18:38'),
(91, 'notsafecapture_Tuesday_January_112022_19_37_19_693035.jpg', '2022-01-11 12:37:19'),
(92, 'notsafecapture_Tuesday_January_112022_19_37_38_663037.jpg', '2022-01-11 12:37:38'),
(93, 'notsafecapture_Tuesday_January_112022_19_37_52_458928.jpg', '2022-01-11 12:37:52'),
(94, 'notsafecapture_Tuesday_January_112022_19_51_41_590883.jpg', '2022-01-11 12:51:41'),
(95, 'notsafecapture_Tuesday_January_112022_20_02_31_360920.jpg', '2022-01-11 13:02:31'),
(97, 'notsafecapture_Tuesday_January_112022_20_03_18_390512.jpg', '2022-01-11 13:03:18'),
(99, 'notsafecapture_Thursday_January_202022_08_02_10_324352.jpg', '2022-01-20 01:02:10'),
(100, 'notsafecapture_Thursday_January_202022_08_02_29_591761.jpg', '2022-01-20 01:02:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
