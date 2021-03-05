-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 02:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lls`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `emp_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`emp_id`, `fname`, `lname`, `email`, `mobile`, `password`) VALUES
(1, 'utsav', 'patel', 'utsavpatel030@gmail.com', '12121212', '123'),
(2, 'utsav', 'patel', 'utsav@gmal.com', '7878786767', '$2y$10$rM/GMil2kRdzc6kAe71jaOx'),
(3, 'utsav', 'patel', 'utsav@gmail.com', '7878786767', '$2y$10$OmBX.sytgobWWK9ucOD8J.s'),
(4, 'utsav', 'patel', 'utsavp550@gmail.com', '09090909', '$2y$10$YfGkthRDqR.mOHqXp4JIMO0'),
(6, 'utsav', 'patel', 'utsavp5550@gmail.com', '09090909', '$2y$10$TAHQAOJZIX7jKUYOC9vIWOqxsn7BSzj..nXDg8t9RZ9w8KuJZeXiC'),
(8, 'utsav', 'patel', 'utsavp5500@gmail.com', '90909090', '$2y$10$3Xp490MHVaBVaKqjXV5wE.0kujkKIzAPo19wVs4fkg/ASfqBlVize');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
