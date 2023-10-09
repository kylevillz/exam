-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 10:48 AM
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
-- Database: `fdci`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contactid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contactid`, `id`, `name`, `company`, `phone`, `email`) VALUES
(5, 1, 'test', '123432', '1234', 'test@gmail.com'),
(6, 1, 'Kyle Tablatin Villanueva', '1234', '1234', 'kylevillz6@gmail.com5555'),
(7, 1, 'test', '1234', '1234', 'test@gmail.com'),
(8, 1, 'test', '1234', '1234', 'test@gmail.com'),
(9, 1, 'test', '1234', '1234', 'test@gmail.com'),
(10, 1, 'test', '1234', '1234', 'test@gmail.com'),
(11, 1, 'test', '1234', '1234', 'test@gmail.com'),
(12, 1, 'test', '1234', '1234', 'test@gmail.com'),
(13, 1, 'test', '1234', '1234', 'test@gmail.com'),
(14, 1, 'test', '1234', '1234', 'test@gmail.com'),
(15, 1, 'test', '1234', '1234', 'test@gmail.com'),
(16, 1, 'test', '1234', '1234', 'test@gmail.com'),
(17, 1, 'test', '1234', '1234232', 'test@gmail.com'),
(18, 1, 'test', '1234', '1234', 'test@gmail.com'),
(19, 1, 'test', '1234', '1234', 'test@gmail.com'),
(20, 1, 'test', '1234', '1234', 'test@gmail.com'),
(21, 1, 'test', '1234', '1234', 'test@gmail.com'),
(22, 1, 'test', '1234', '1234', 'test@gmail.com'),
(23, 1, 'Kyle Tablatin Villanueva', '1234', '1234', 'kylevillz6@gmail.com5555');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `useremail`, `password`) VALUES
(1, 'test', 'kylevillz6@gmail.com', '$2y$10$swrrVEgTrRIi3Rx4mo4dG.2gwp7qUOMlBkOmbxHShautYz70fW18m'),
(2, 'Kyle Tablatin Villanueva', 'kylevillz26@gmail.com', '$2y$10$x9iAmFNMJJozrhvt6DDIm.4q2QAifWi6BfFgF00Z7EkyW0lyV6ofi'),
(3, 'Kyle Tablatin Villanueva', 'kylevillz6@gmail.com1234', '$2y$10$MTNKzRamrC4Jb9rXip3Jeut.LdzJ7qcdNz9d/41QFzK507zJYer0C'),
(4, 'test', 'test@gmail.com232', '$2y$10$oRWN599N5ggKQHR4/ZAE3emrg.Y1oTG1EMJjLIyyPuRIgogHP7p/K'),
(5, 'Kyle Tablatin Villanueva', 'kylevillz6@gmail.com2323', '$2y$10$h3lgdGc47Mqz62nrdZoUP.sksBYpzo699gx2LAYo9j5TWba8.QNbm'),
(6, 'Kyle Tablatin Villanueva', 'kylevillz6@gmail.com2323232323', '$2y$10$x8rc01/i.R0WJWRhd2.ie.Dy2pN8BFHhlsXfrvrbzWd3nHLVCeaXi'),
(7, 'Kyle Tablatin Villanueva', 'kylevillz6@gmail.com2222222222', '$2y$10$8MmPEHJubVXUzw/eoxguqOp6zZG13J/rlS4hfUDQ8alYaWnh0.URu'),
(8, 'Kyle Tablatin Villanueva', 'kylevillz6@gmail.com5555', '$2y$10$.3Kl02jOHh3S72dhp4gOzexrr6uhPuI2b8/6bvvPy0/7.5EzPZ4qK'),
(9, 'Kyle Tablatin Villanueva', 'kylevillz6@gmail.com23232323111111', '$2y$10$AIAJ8uMSczx.94JOvK60n.QB6cfcLJNzMDiGfxMCCinnkfgwed50m'),
(10, 'Kyle Tablatin Villanueva', 'kylevillz6@gmail.com232111111', '$2y$10$f60FB./rAdFrY5gvYAM.FOhNIiwwINYPZUOJmsvBTWqrR1WerP3V.'),
(11, 'Kyle Tablatin Villanueva', 'kylevillz6@gmail.com42323', '$2y$10$tMhnO0h6L7H5HwohH.KkI.4LCrMi5gWUCLwAwzaN2K70R7wRSt1bi'),
(12, 'Kyle Tablatin Villanueva', 'kylevillz6@gmail.com1123232', '$2y$10$OPBMh9EAGgBaaoJ8RNlXuOmseYVV4QkBiezylIXEImbqhOb8LY7z2'),
(13, 'Kyle Tablatin Villanueva', 'kylevillz6@gmail.com222222222222222222', '$2y$10$/knB8gyAWuWvhfGCRDmizOz8u5SRi1clMtsALkKDzxXdVfFc21z6G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contactid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
