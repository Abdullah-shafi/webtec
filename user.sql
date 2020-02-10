-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 08:38 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_catagory` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `first_name`, `last_name`, `user_name`, `u_catagory`, `email`, `password`, `address`) VALUES
(1, 'asa', 'aaa', 'abd', 'manager', 'aa@gmail.com', '$2y$10$U4nbskpPAh3PeX.uLJ7RveEZO8luJX.lkr4Lsv51n3Qnhu8dPPQ4S', 'aaa'),
(2, 'aaa', 'aaa', 'abda', 'user', 'abd@gmail.com', '$2y$10$yVrI7I8oUbOljYzwK6.81eJ7mKGFMr1YCUV8kzpeFj/fonYgYOSmS', 'dddd'),
(3, 'as', 'aa', 'abdullah', 'manager', 'acm@ccc', '$2y$10$web6m2urlclWFPOIu3Ct3ePvR6Odf/Df/uhTaxTBcbVqoE.gUDNbK', 'kuril'),
(4, 'aaa', 'aaa', 'abdulla', 'user', 'acm@cc', '$2y$10$nX3RFt9h4aezR1Kuy3U9/eT7SD1.dTr0UfJKpCbKGZu/6QEwhbpJy', 'dhaka'),
(5, 'shafi', 'sagor', 'ab0813', '', 'ass@gm', '$2y$10$Lp5HWtQqze1AIQQJybNQ7eCD1cKIOUU3zEe8AeH/q59oxEubvjlDm', 'kuril'),
(6, 'salman', 'sujon', 'salman sujon', '', 'salmanaiub99@gmail.com', '$2y$10$20SfoM3sltXhQffBk/2wvuDXl.SsciNg4SWpeN5.Rh3EgZk5IwJEG', 'dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `Id` (`Id`),
  ADD UNIQUE KEY `Id_2` (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
