-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2023 at 07:19 AM
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
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `AdminID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `MobileNo` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `LoginPassword` varchar(100) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `class_shift` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `Diet`
--

CREATE TABLE `Diet` (
  `diet_id` int(11) NOT NULL,
  `morning_diet` varchar(255) DEFAULT NULL,
  `morning_workout` varchar(255) DEFAULT NULL,
  `afternoon_diet` varchar(255) DEFAULT NULL,
  `evening_diet` varchar(255) DEFAULT NULL,
  `evening_workout` varchar(255) DEFAULT NULL,
  `diet_type` enum('Veg','Non-Veg') DEFAULT NULL,
  `goal` enum('Bulk','Cut') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `joinedclass`
--

CREATE TABLE `joinedclass` (
  `MemberID` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `MemberPasswordReset`
--

CREATE TABLE `MemberPasswordReset` (
  `MemberID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `Members`
--

CREATE TABLE `Members` (
  `MemberID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Sex` enum('Male','Female') NOT NULL,
  `MobileNo` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `MembershipType` varchar(50) NOT NULL,
  `Dob` date NOT NULL,
  `Age` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `ExpiryDate` date NOT NULL,
  `LoginPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `PaymentID` int(11) NOT NULL,
  `AmountPaid` int(11) NOT NULL,
  `PaymentDate` date NOT NULL,
  `MemberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `SignUP`
--

CREATE TABLE `SignUP` (
  `SignUpID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `MobileNo` varchar(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MembershipType` varchar(50) NOT NULL,
  `Sex` enum('Male','Female') NOT NULL,
  `Age` int(11) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `TrainerPasswordReset`
--

CREATE TABLE `TrainerPasswordReset` (
  `TrainerID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `Trainers`
--

CREATE TABLE `Trainers` (
  `TrainerID` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Sex` enum('Male','Female') NOT NULL,
  `Shift` varchar(20) NOT NULL,
  `MobileNo` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Dob` date NOT NULL,
  `Age` int(11) NOT NULL,
  `LoginPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `Diet`
--
ALTER TABLE `Diet`
  ADD PRIMARY KEY (`diet_id`);

--
-- Indexes for table `joinedclass`
--
ALTER TABLE `joinedclass`
  ADD KEY `memberid` (`MemberID`),
  ADD KEY `classid` (`class_id`);

--
-- Indexes for table `MemberPasswordReset`
--
ALTER TABLE `MemberPasswordReset`
  ADD KEY `MemberID` (`MemberID`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `Members`
--
ALTER TABLE `Members`
  ADD PRIMARY KEY (`MemberID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Email_2` (`Email`),
  ADD UNIQUE KEY `Email_3` (`Email`),
  ADD UNIQUE KEY `Email_4` (`Email`),
  ADD UNIQUE KEY `Email_5` (`Email`),
  ADD UNIQUE KEY `Email_6` (`Email`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `memberid` (`MemberID`);

--
-- Indexes for table `SignUP`
--
ALTER TABLE `SignUP`
  ADD PRIMARY KEY (`SignUpID`);

--
-- Indexes for table `TrainerPasswordReset`
--
ALTER TABLE `TrainerPasswordReset`
  ADD KEY `TrainerID` (`TrainerID`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `Trainers`
--
ALTER TABLE `Trainers`
  ADD PRIMARY KEY (`TrainerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Diet`
--
ALTER TABLE `Diet`
  MODIFY `diet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `joinedclass`
--
ALTER TABLE `joinedclass`
  AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `MemberPasswordReset`
--
ALTER TABLE `MemberPasswordReset`
  AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Members`
--
ALTER TABLE `Members`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `SignUP`
--
ALTER TABLE `SignUP`
  MODIFY `SignUpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `TrainerPasswordReset`
--
ALTER TABLE `TrainerPasswordReset`
  AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Trainers`
--
ALTER TABLE `Trainers`
  MODIFY `TrainerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `joinedclass`
--
ALTER TABLE `joinedclass`
  ADD CONSTRAINT `joinedclass_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `Members` (`MemberID`),
  ADD CONSTRAINT `joinedclass_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`);

--
-- Constraints for table `MemberPasswordReset`
--
ALTER TABLE `MemberPasswordReset`
  ADD CONSTRAINT `MemberPasswordReset_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `Members` (`MemberID`) ON DELETE CASCADE;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `Members` (`MemberID`);

--
-- Constraints for table `TrainerPasswordReset`
--
ALTER TABLE `TrainerPasswordReset`
  ADD CONSTRAINT `TrainerPasswordReset_ibfk_1` FOREIGN KEY (`TrainerID`) REFERENCES `Trainers` (`TrainerID`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
