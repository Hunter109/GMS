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
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`AdminID`, `FullName`, `MobileNo`, `Email`, `LoginPassword`, `Address`) VALUES
(5000, '4NONYMOUS', '+977 9826235532', 'utsavwagle123456789@gmail.com', '95b8488a45440bbe27fb234949fa7df6', 'Bharatpur-7'),
(5004, 'Lankey Hunter', '+977 9845623305', 'utsavwagle508@gmail.com', '95b8488a45440bbe27fb234949fa7df6', 'Bharatpur-7');

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `class_shift` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`class_id`, `class_name`, `class_shift`) VALUES
(1004, 'Yoga', 'Morning'),
(1005, 'Kick Boxing', 'Morning'),
(1006, 'Power Lifting', 'Evening'),
(1007, 'Group classes', 'Evening'),
(1008, 'Personal training', 'Morning'),
(1009, 'Online personal training', 'Day'),
(1010, 'Functional Fitness', 'Evening'),
(1011, 'Online Group Classes', 'Day'),
(1012, 'Zumba fitness', 'Morning');

-- --------------------------------------------------------

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
-- Dumping data for table `Diet`
--

INSERT INTO `Diet` (`diet_id`, `morning_diet`, `morning_workout`, `afternoon_diet`, `evening_diet`, `evening_workout`, `diet_type`, `goal`) VALUES
(106, 'Greek yogurt with berries', 'Running', 'Grilled turkey breast', 'Steamed asparagus', 'Pilates', 'Non-Veg', 'Cut'),
(107, 'Cottage cheese with pineapple', 'Cycling', 'Baked chicken with quinoa', 'Green beans', 'Stretching', 'Non-Veg', 'Cut'),
(108, 'High-protein shake', 'Weightlifting', 'Grilled chicken with rice', 'Broccoli with cheese sauce', 'Stretching', 'Non-Veg', 'Bulk'),
(109, 'Scrambled eggs with spinach', 'Strength training', 'Salmon and quinoa', 'Mixed vegetables', 'Yoga', 'Non-Veg', 'Bulk'),
(110, 'Oatmeal with fruits', 'Weightlifting', 'Tofu and vegetable stir-fry', 'Quinoa salad', 'Yoga', 'Veg', 'Bulk'),
(111, 'Greek yogurt with berries', 'Running', 'Mixed vegetable curry', 'Brown rice', 'Pilates', 'Veg', 'Bulk'),
(112, 'Cottage cheese with pineapple', 'Cycling', 'Salad with vinaigrette', 'Steamed broccoli', 'Stretching', 'Veg', 'Cut'),
(113, 'Avocado toast', 'HIIT workout', 'Zucchini noodles with pesto', 'Cauliflower rice', 'Yoga', 'Veg', 'Cut');

-- --------------------------------------------------------

--
-- Table structure for table `joinedclass`
--

CREATE TABLE `joinedclass` (
  `MemberID` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `joinedclass`
--

INSERT INTO `joinedclass` (`MemberID`, `class_id`) VALUES
(8040, 1004),
(8040, 1005),
(8040, 1006),
(8040, 1007),
(8040, 1008),
(8040, 1009),
(8040, 1010),
(8040, 1011),
(8040, 1012),
(8005, 1004),
(8005, 1006),
(8005, 1010),
(8005, 1012),
(8034, 1006),
(8034, 1007),
(8034, 1008),
(8034, 1009),
(8035, 1006),
(8035, 1005),
(8035, 1010),
(8035, 1012),
(8036, 1010),
(8036, 1009),
(8036, 1006),
(8036, 1005),
(8036, 1012),
(8036, 1008),
(8069, 1004),
(8069, 1005),
(8069, 1006),
(8069, 1007),
(8069, 1008),
(8069, 1009),
(8069, 1010),
(8069, 1011),
(8069, 1012);

-- --------------------------------------------------------

--
-- Table structure for table `MemberPasswordReset`
--

CREATE TABLE `MemberPasswordReset` (
  `MemberID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MemberPasswordReset`
--

INSERT INTO `MemberPasswordReset` (`MemberID`, `Email`) VALUES
(8034, 'poudelabhishek205@gmail.com'),
(8035, 'swaruptharu123@gamil.com'),
(8045, 'sachinsapkota1998@gmail.com'),
(8062, 'sirjanawagle2057@gmail.com'),
(8069, 'utsavwagle123456789@gmail.com'),
(8068, 'Arunthapa0903@gmail.com');

-- --------------------------------------------------------

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
-- Dumping data for table `Members`
--

INSERT INTO `Members` (`MemberID`, `FullName`, `Sex`, `MobileNo`, `Email`, `Address`, `MembershipType`, `Dob`, `Age`, `StartDate`, `ExpiryDate`, `LoginPassword`) VALUES
(8005, 'Saraj Dhakal', 'Male', '+977 9866115177', 'sarajdhakal@gmail.com', 'Bharatpur-15', 'Golden', '2003-06-02', 20, '2023-08-29', '2024-08-29', '3d8d65c7b0ed8b279ef4043643d1bab8'),
(8034, 'Abhishek Sharma', 'Male', '+977 9845814626', 'poudelabhishek205@gmail.com', 'Gaindakot-5', 'Silver', '2002-05-01', 21, '2023-09-22', '2024-03-22', '5a4b49d679983d1d64684b3e27a8f189'),
(8035, 'Swarup Tharu ', 'Male', '+977 9867065249', 'swaruptharu123@gamil.com', 'Bharatpur-3', 'Golden', '2001-11-18', 22, '2022-07-21', '2023-07-21', '96b34b717f30c2740140268b29360e5d'),
(8036, 'Soviyat Lamsal', 'Male', '+977 9863211735', 'Soviyat47@gmail.com', 'Gaidakot-1', 'Silver', '2002-07-05', 21, '2023-07-21', '2024-01-21', '9f44ea74356c6a6e9d638b0f4b6b55fa'),
(8037, 'Rajeev Paudel', 'Male', '+977 9869058801', 'rajeev11paudel@gmail.com', 'Bharatpur-9', 'Golden', '2001-12-17', 22, '2023-07-21', '2024-07-21', '36e7d035554f935e56afa8cc1366ebe5'),
(8038, 'Savin basnet ', 'Male', '+977 9745315848', 'Sabin123@gmail.com', 'Bharatpur-16', 'Platinum', '2001-12-14', 22, '2023-07-21', '2123-07-21', '61ca2f4c9074f2f2e6665827c110aefc'),
(8039, 'Sandesh Chaudhary', 'Male', '+977 9866116874', 'sandesh7485@gmail.com', 'Khairahani-10', 'Platinum', '2002-06-23', 21, '2023-07-22', '2123-07-22', '4e297c4f4ebc5f7e5f67c8487c8d5bbe'),
(8040, 'Sanket Subedi', 'Male', '+977 9845440004', 'sanketsubedi1000@gmail.com', 'Bharatpur-10', 'Silver', '2002-11-30', 21, '2023-03-10', '2023-06-10', '021db155bb0ebc5c3adb2975339bc647'),
(8041, 'Saurav Chaulagain', 'Male', '+977 9865203421', 'chaulagainsaurav987@gmail.com', 'Kalika-6', 'Silver', '2001-11-27', 22, '2023-07-22', '2024-01-22', '66355efa97cd3add66bd0f1b0426e6f2'),
(8042, 'Samar Bhattrai', 'Male', '+977 9827199966', 'samar7bhattarai@gmail.com', 'Bharatpur-21', 'Golden', '2002-12-15', 21, '2023-09-13', '2024-09-13', '41c9ea3ca67e0dd5828c99b04f3cf5f9'),
(8043, 'Gaurav Dulal', 'Male', '+977 9844234418', 'gaurav.dulal.50@gmail.com', 'Kalika-6', 'Golden', '2002-08-15', 21, '2023-09-13', '2024-09-13', 'a10590f6ee1ccedcaec2bde4b2a7aeef'),
(8044, 'Raj Gurung ', 'Male', '+977 9811930686', 'rajjgrg70@gmail.com', 'Ratnanagar-12', 'Silver', '2001-05-05', 22, '2023-05-13', '2023-08-13', 'fb0fc43b61b7796f9ff9a5d8e20b291e'),
(8045, 'Sachin Sapkota', 'Male', '+977 9865004533', 'sachinsapkota1998@gmail.com', 'Bharatpur-8', 'Platinum', '2002-12-19', 21, '2023-09-13', '2123-09-13', '8af70e05fe64de6805313d58f2856788'),
(8060, 'Nisha Rai', 'Female', '+977 9845054507', 'rainisha484@gmail.com', 'Bharatpur-10', 'Golden', '2003-07-18', 20, '2023-09-20', '2024-09-20', '0ed8df283fe31b306caa3e1a3d655182'),
(8061, 'Atithi Aryal', 'Male', '+977 9844614609', 'theacalaya@gmail.com', 'Bharatpur-11', 'Platinum', '2003-01-11', 20, '2023-09-20', '2123-09-20', 'eeab016ab7b71665234053ce2a269048'),
(8062, 'Sirjana Wagle', 'Female', '+977 9745358076', 'sirjanawagle2057@gmail.com', 'Bharatpur-7', 'Platinum', '2000-10-12', 23, '2023-09-20', '2123-09-20', 'ed5f0564a978a1e254bdeefecdc4164e'),
(8063, 'Renaisaance Poudel', 'Male', '+977 9863210059', 'renpoudel@gmail.com', 'Gaindakot-5', 'Golden', '2003-05-12', 20, '2023-09-20', '2024-09-20', 'c569843bc074de747e96343086e87ae4'),
(8068, 'Arun Thapa Magar', 'Male', '+977 9866432744', 'Arunthapa0903@gmail.com', 'Bharatpur-9', 'Golden', '2000-05-14', 23, '2023-09-24', '2024-09-24', '15fbed0db1646879db87fef9c52d18c4'),
(8069, 'utsav wagle', 'Male', '+977 9869896545', 'utsavwagle123456789@gmail.com', 'Bharatpur-7', 'Silver', '2003-11-21', 20, '2023-07-24', '2023-10-24', '4feeceffc2757746da153da83ba405dd');

-- --------------------------------------------------------

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
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`PaymentID`, `AmountPaid`, `PaymentDate`, `MemberID`) VALUES
(3000, 5000, '2023-09-24', 8005),
(3001, 3000, '2023-09-24', 8034),
(3002, 5000, '2023-09-24', 8035),
(3003, 3000, '2023-09-24', 8036),
(3004, 5000, '2023-09-24', 8037),
(3005, 10000, '2023-09-24', 8038),
(3006, 10000, '2023-09-24', 8039),
(3007, 3000, '2023-09-24', 8040),
(3008, 3000, '2023-09-24', 8041),
(3009, 5000, '2023-09-24', 8042),
(3010, 5000, '2023-09-24', 8043),
(3011, 3000, '2023-09-24', 8044),
(3012, 10000, '2023-09-24', 8045),
(3013, 5000, '2023-09-24', 8060),
(3014, 10000, '2023-09-24', 8061),
(3015, 10000, '2023-09-24', 8062),
(3016, 5000, '2023-09-24', 8063),
(3017, 5000, '2023-09-24', 8068),
(3018, 3000, '2023-09-24', 8069);

-- --------------------------------------------------------

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
-- Dumping data for table `SignUP`
--

INSERT INTO `SignUP` (`SignUpID`, `FullName`, `MobileNo`, `Address`, `Email`, `MembershipType`, `Sex`, `Age`, `DOB`) VALUES
(9025, 'Laxmi Wagle', '+977 9845673171', 'Bharatpur-7', 'laxmiwagle508@gmail.com', 'Silver', 'Female', 0, '2023-09-23'),
(9026, 'Deepak Kumar Wagle', '+977 9845623305', 'Bharatpur-7', 'deepakwagle001@gmail.com', 'Golden', 'Male', 48, '1975-02-11'),
(9027, 'Ashok Kumar', '+977 9866115176', 'Bharatpur-1', 'kshitizgupta138@gmail.com', 'Platinum', 'Male', 48, '1975-11-04'),
(9028, 'Meera Gupta', '+977 9869896544', 'Bharatpur-1', 'kshitizgupta385@gmail.com', 'Golden', 'Female', 43, '1980-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `TrainerPasswordReset`
--

CREATE TABLE `TrainerPasswordReset` (
  `TrainerID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `TrainerPasswordReset`
--

INSERT INTO `TrainerPasswordReset` (`TrainerID`, `Email`) VALUES
(6009, 'utsavwagle508@gmail.com'),
(6011, 'ishachttri@gmail.com'),
(6014, 'utsavwagle001@gmail.com');

-- --------------------------------------------------------

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
-- Dumping data for table `Trainers`
--

INSERT INTO `Trainers` (`TrainerID`, `FullName`, `Sex`, `Shift`, `MobileNo`, `Email`, `Address`, `Dob`, `Age`, `LoginPassword`) VALUES
(6009, 'utsav wagle', 'Male', 'Evening', '+977 9869896545', 'utsavwagle508@gmail.com', 'Bharatpur-7', '2003-11-21', 20, '4feeceffc2757746da153da83ba405dd'),
(6010, 'Kshitiz Gupta', 'Male', 'Evening', '+977 9866115154', 'kshitizgupta163@gmail.com', 'Bharatpur-1', '2004-01-29', 19, '24a4212e81b15cd416a65ea037930f4b'),
(6011, 'Isha Kandel', 'Female', 'Morning', '+977 9744359924', 'ishachttri@gmail.com', 'Gaindakot -12', '2004-10-17', 19, 'b395c80af09a891ab3422cf264076a0e'),
(6013, 'Dipen Raut', 'Male', 'Day', '+977 9845883164', 'Dipen2969@gmail.com', 'Bharatpur-3', '2002-11-27', 21, '94942f1172e4878c1cff4ab5d1e5b74c'),
(6014, '4nonymous Hunter', 'Male', 'Day', '+977 9826235532', 'utsavwagle001@gmail.com', 'Bharatpur-7', '2003-11-21', 20, '4feeceffc2757746da153da83ba405dd');

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
  ADD KEY `MemberID` (`MemberID`);

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
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Email_2` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5005;

--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `Diet`
--
ALTER TABLE `Diet`
  MODIFY `diet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `Members`
--
ALTER TABLE `Members`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8070;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3019;

--
-- AUTO_INCREMENT for table `SignUP`
--
ALTER TABLE `SignUP`
  MODIFY `SignUpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9029;

--
-- AUTO_INCREMENT for table `Trainers`
--
ALTER TABLE `Trainers`
  MODIFY `TrainerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6015;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `joinedclass`
--
ALTER TABLE `joinedclass`
  ADD CONSTRAINT `joinedclass_ibfk_1` FOREIGN KEY (`memberid`) REFERENCES `Members` (`MemberID`) ON DELETE CASCADE,
  ADD CONSTRAINT `joinedclass_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`) ON DELETE CASCADE;

--
-- Constraints for table `MemberPasswordReset`
--
ALTER TABLE `MemberPasswordReset`
  ADD CONSTRAINT `memberpasswordreset_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `Members` (`MemberID`) ON DELETE CASCADE,
  ADD CONSTRAINT `memberpasswordreset_ibfk_2` FOREIGN KEY (`Email`) REFERENCES `Members` (`Email`) ON UPDATE CASCADE;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `Members` (`MemberID`) ON DELETE CASCADE;

--
-- Constraints for table `TrainerPasswordReset`
--
ALTER TABLE `TrainerPasswordReset`
  ADD CONSTRAINT `trainerpasswordreset_ibfk_1` FOREIGN KEY (`TrainerID`) REFERENCES `Trainers` (`TrainerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `trainerpasswordreset_ibfk_2` FOREIGN KEY (`Email`) REFERENCES `Trainers` (`Email`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
