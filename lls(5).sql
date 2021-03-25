-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 02:50 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(9) NOT NULL,
  `admin_contact` varchar(9) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_pass`) VALUES
(1, 'Digvijay', '043573209', 'jaygogagatton@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `agreement`
--

CREATE TABLE `agreement` (
  `Agg_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `Health_Safety` tinyint(1) NOT NULL,
  `Fair_work` tinyint(1) NOT NULL,
  `Hygiene_Rule` tinyint(1) NOT NULL,
  `Company_aggreement` tinyint(1) NOT NULL,
  `Piecework_aggreement` tinyint(1) NOT NULL,
  `important_consideration` tinyint(1) NOT NULL,
  `Agg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agreement`
--

INSERT INTO `agreement` (`Agg_id`, `emp_id`, `Health_Safety`, `Fair_work`, `Hygiene_Rule`, `Company_aggreement`, `Piecework_aggreement`, `important_consideration`, `Agg_date`) VALUES
(1, 10, 1, 0, 0, 0, 1, 0, '2021-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `Bd_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `Account_name` varchar(35) NOT NULL,
  `BSB` int(6) NOT NULL,
  `Account_number` int(15) NOT NULL,
  `Australian_citizen` varchar(1) NOT NULL,
  `Method_pay` varchar(6) NOT NULL,
  `pay_period` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`Bd_id`, `emp_id`, `Account_name`, `BSB`, `Account_number`, `Australian_citizen`, `Method_pay`, `pay_period`) VALUES
(3, 10, 'utsav', 232876, 98650986, 'N', 'friday', 'weekly'),
(4, 11, 'dad', 2345, 2345345, 'N', 'friday', 'weekly');

-- --------------------------------------------------------

--
-- Table structure for table `emp_job_record`
--

CREATE TABLE `emp_job_record` (
  `record_id` int(11) NOT NULL,
  `job_date` date NOT NULL,
  `job_info` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `total_time` int(11) DEFAULT NULL,
  `total_pay` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `event_name` varchar(9) NOT NULL,
  `event_date` date NOT NULL,
  `event_desc` text NOT NULL,
  `participate_num` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_register`
--

CREATE TABLE `event_register` (
  `eve_reg_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `food_type` varchar(9) NOT NULL,
  `participate` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_info`
--

CREATE TABLE `job_info` (
  `job_info` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `pay_base` varchar(7) NOT NULL,
  `job_location` varchar(9) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `farm_name` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal information`
--

CREATE TABLE `personal information` (
  `PI_id` int(4) NOT NULL,
  `emp_id` int(4) NOT NULL,
  `commencement_date` date DEFAULT NULL,
  `Gender` varchar(5) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Suburb` varchar(9) DEFAULT NULL,
  `State` varchar(9) DEFAULT NULL,
  `Postcode` int(4) DEFAULT NULL,
  `TFN` int(9) DEFAULT NULL,
  `Date_of_employment` date DEFAULT NULL,
  `job` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal information`
--

INSERT INTO `personal information` (`PI_id`, `emp_id`, `commencement_date`, `Gender`, `DOB`, `Address`, `Suburb`, `State`, `Postcode`, `TFN`, `Date_of_employment`, `job`) VALUES
(20, 10, '2021-03-10', 'Male', '1992-02-06', '12 ROGERS DRIVE', 'gat', 'QLD', 3232, 234346897, '0000-00-00', ''),
(21, 11, '2021-03-03', 'Male', '2021-03-05', '23', 'asdf', 'QLD', 4343, 12342, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `emp_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `approval` varchar(10) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`emp_id`, `fname`, `lname`, `email`, `mobile`, `password`, `approval`, `reg_date`) VALUES
(10, 'utsav', 'patel', 'utsavptest@gmail.com', '0432469656', '$2y$10$XyVMs2N4Z1TsIzHC92OefOGxF3C4FEvYO50/b4fGT8yjLS3Yzb7G6', 'pending', '2021-03-01'),
(11, 'ketan', 'patel', 'ketantest@gmail.com', '0432469656', '$2y$10$4oqZp1UzDEtb6OgAEqaIm.jDh7Lyqs/V.1Fqa4NveanZBC7LO.z6S', 'pending', '2021-03-03'),
(12, 'amit', 'patel', 'amittest@gmail.com', '0432469656', '$2y$10$NJIQsrjjTcFGJk5loHYsxOTk1o/NHYtXRgOBKsvExJrKYsQUhN99u', 'pending', '2021-03-13'),
(13, 'digv', 'digv', 'jaygogagatton@gmail.com', '0435732093', '$2y$10$Sjm978EyBBkoqqYZj4cDduyBSqBwrmSIcS2lz5noIAHMRFF.ppknO', 'admin', '2021-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `super_info`
--

CREATE TABLE `super_info` (
  `sup_member_num` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `fund_name` varchar(20) DEFAULT NULL,
  `policy_number` int(5) DEFAULT NULL,
  `emp_id_number` int(15) DEFAULT NULL,
  `fund_abn` int(17) DEFAULT NULL,
  `fund_address` varchar(20) DEFAULT NULL,
  `suburb` varchar(15) DEFAULT NULL,
  `state` varchar(9) DEFAULT NULL,
  `postcode` int(4) DEFAULT NULL,
  `fund_phone` int(9) DEFAULT NULL,
  `unique_super_id` int(25) DEFAULT NULL,
  `account_name` varchar(25) DEFAULT NULL,
  `member` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_info`
--

INSERT INTO `super_info` (`sup_member_num`, `emp_id`, `fund_name`, `policy_number`, `emp_id_number`, `fund_abn`, `fund_address`, `suburb`, `state`, `postcode`, `fund_phone`, `unique_super_id`, `account_name`, `member`) VALUES
(3453535, 11, 'tgeg', 453453, 35345, 345345, 'edg', 'dfg', 'ghdg', 3434, 35353423, 345345, 'edgfd', 0),
(2147483647, 10, 'sunsuper', 23467897, 2147483647, 1237896, '12 rogers drive', 'gatton', 'qld', 4343, 43269656, 34566752, 'utsav Patel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visa_info`
--

CREATE TABLE `visa_info` (
  `v_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `Australian_citizen` varchar(3) NOT NULL,
  `Australian_PR` varchar(3) NOT NULL,
  `Passport_num` varchar(12) NOT NULL,
  `Country_issue` varchar(10) NOT NULL,
  `Working_visa` varchar(3) DEFAULT NULL,
  `visa_type` varchar(7) DEFAULT NULL,
  `sub_class` varchar(6) DEFAULT NULL,
  `visa_grant_number` varchar(15) DEFAULT NULL,
  `Expiry_date` date DEFAULT NULL,
  `Course_duration` varchar(10) DEFAULT NULL,
  `Hours_of_work` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visa_info`
--

INSERT INTO `visa_info` (`v_id`, `emp_id`, `Australian_citizen`, `Australian_PR`, `Passport_num`, `Country_issue`, `Working_visa`, `visa_type`, `sub_class`, `visa_grant_number`, `Expiry_date`, `Course_duration`, `Hours_of_work`) VALUES
(3, 10, 'No', 'No', 's12343445', 'india', 'Yes', 'student', '500', 'fr5649674', '2021-04-10', '2 year', '20'),
(4, 11, 'No', 'No', 's345234', 'india', 'Yes', 'student', '500', 'fr3746h474', '2021-03-27', '2', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `agreement`
--
ALTER TABLE `agreement`
  ADD PRIMARY KEY (`Agg_id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`Bd_id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `emp_job_record`
--
ALTER TABLE `emp_job_record`
  ADD PRIMARY KEY (`record_id`),
  ADD UNIQUE KEY `job_info` (`job_info`,`emp_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `event_register`
--
ALTER TABLE `event_register`
  ADD PRIMARY KEY (`eve_reg_id`),
  ADD UNIQUE KEY `event_reg` (`event_id`,`admin_id`,`emp_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `job_info`
--
ALTER TABLE `job_info`
  ADD PRIMARY KEY (`job_info`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `personal information`
--
ALTER TABLE `personal information`
  ADD PRIMARY KEY (`PI_id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `super_info`
--
ALTER TABLE `super_info`
  ADD PRIMARY KEY (`sup_member_num`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `visa_info`
--
ALTER TABLE `visa_info`
  ADD PRIMARY KEY (`v_id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `Bd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_job_record`
--
ALTER TABLE `emp_job_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_register`
--
ALTER TABLE `event_register`
  MODIFY `eve_reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_info`
--
ALTER TABLE `job_info`
  MODIFY `job_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal information`
--
ALTER TABLE `personal information`
  MODIFY `PI_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `visa_info`
--
ALTER TABLE `visa_info`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agreement`
--
ALTER TABLE `agreement`
  ADD CONSTRAINT `agreement_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `register` (`emp_id`) ON DELETE NO ACTION;

--
-- Constraints for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD CONSTRAINT `bank_details_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `register` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emp_job_record`
--
ALTER TABLE `emp_job_record`
  ADD CONSTRAINT `emp_job_record_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `register` (`emp_id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `event_register`
--
ALTER TABLE `event_register`
  ADD CONSTRAINT `event_register_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `register` (`emp_id`),
  ADD CONSTRAINT `event_register_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `job_info`
--
ALTER TABLE `job_info`
  ADD CONSTRAINT `job_info_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `personal information`
--
ALTER TABLE `personal information`
  ADD CONSTRAINT `personal information_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `register` (`emp_id`);

--
-- Constraints for table `super_info`
--
ALTER TABLE `super_info`
  ADD CONSTRAINT `super_info_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `register` (`emp_id`);

--
-- Constraints for table `visa_info`
--
ALTER TABLE `visa_info`
  ADD CONSTRAINT `visa_info_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `register` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
