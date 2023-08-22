-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 07:44 AM
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
-- Database: `scholar-in`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Sex` enum('Male','Female') NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `AddressProvince` varchar(255) NOT NULL,
  `AddressCity` varchar(255) NOT NULL,
  `CurrentEducationalLevel` enum('Elementary','Junior High School','Senior High School','College') NOT NULL,
  `Course` varchar(255) DEFAULT NULL,
  `YearLevel` int(11) DEFAULT NULL,
  `Grade` varchar(10) DEFAULT NULL,
  `FamilyAnnualIncome` varchar(255) DEFAULT NULL,
  `Citizenship` varchar(255) DEFAULT NULL,
  `About` text DEFAULT NULL,
  `ProfileImage` varchar(255) DEFAULT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`UserID`, `FullName`, `Sex`, `DateOfBirth`, `Email`, `PhoneNumber`, `AddressProvince`, `AddressCity`, `CurrentEducationalLevel`, `Course`, `YearLevel`, `Grade`, `FamilyAnnualIncome`, `Citizenship`, `About`, `ProfileImage`, `Username`, `Password`) VALUES
(1, 'Clyde Cutimar', 'Male', '2000-01-01', 'clydecutimar2@gmail.com', '09123456789', 'Agusan Del Norte', 'Magallanes', 'College', 'BS Information Technology', 3, '1.46', '100000', 'Filipino', 'dasdasdasda', 'profile_images/Cutimar, Clyde B..jpg', 'clydeclyde', '$2y$10$RWatHSbKY5f7UkDcwg7rf.bxS2D8SUAly4ImBnM5qC9zaXZVCtb02'),
(2, 'Jane Doe', 'Female', '2000-01-14', 'janedoe@example.com', '09789456123', 'Agusan Del Norte', 'Magallanes', 'College', 'BS Information Technology', 1, '1.46', '100000', 'Filipino', 'dasdasd dsadas dasda', 'profile_images/Cutimar, Clyde B..jpg', 'janedoe', '$2y$10$ARtHrbuSAmoj0khKcMUnC.i9w6GVIUmjsjTjv3JrjEGVuugJmNhLS'),
(3, 'Qwe Qwe', 'Female', '2001-07-07', 'qwe@qwe.com', '09258147369', 'Agusan del Norte', 'Magallanes', 'College', 'BS Information Technology', 3, '1.46', '100000', 'Filipino', 'dasdasdasdasdasdasdasd dasd as dasdas', 'profile_images/PhilHealth ID-CUTIMAR.jpg', 'qweqwe', '$2y$10$XJmqRg.mfkG77ODbcdV97OmvaZQI6A.Wxcw9aocezczbFGVt0oCYS'),
(4, 'Asd Asd', 'Male', '2000-01-01', 'asdasd@dmaskld.das', '09789456123', 'Agusan del Norte', 'Magallanes', 'College', 'BS Information Technology', 1, '1.46', '100000', 'Filipino', 'dasdas', 'profile_images/IMG_0657.JPG', 'asdasd', '$2y$10$x46bDv55BLI3imvwD0G7A.qeEnBIWyMHuk0UKzLy/yCBrrb1C10QG'),
(5, 'Yeah Yeah', 'Male', '2002-02-01', 'yeahyeah@das.das', '09362514789', 'Agusan del Norte', 'Magallanes', 'Senior High School', 'STEM', 2, '98', '100000', 'Filipino', 'dadasdasdas dassda das', 'profile_images/college students(1).jpg', 'yeahyeah', '$2y$10$vwvQp8FoZPp5QJj.07u.K.Wa4TY8Sdbsmu1XFszP8AN7AwIUGF.2K'),
(6, 'We We', 'Female', '2003-03-01', 'wewe@dnhasjk.das', '09123456789', 'Agusan del Norte', 'Magallanes', 'College', 'BS Information Technology', 1, '1.46', '100000', 'Filipino', 'dasdas dasdasd asdasd a', 'profile_images/college students.jpg', 'wewe', '$2y$10$qMkOnhXdqiYH/nweJ4L7WeD/WW7xQRDpcl88Gv3f2VrKlnLLT.wBC'),
(7, 'Qw Qw', 'Female', '2001-01-01', 'qwqw@qw.qw', '09321654987', 'Agusan del Norte', 'Magallanes', 'College', 'BS Information Technology', 1, '1.46', '100000', 'Filipino', 'qw qw qw', 'profile_images/scholarship.jpg', 'qwqw', '$2y$10$4L5/Z7hT2wQUjogAB19zxO2ZI.wuMZUcDjPIehAJtI34BBqLlnLke'),
(8, 'Hi Hello', 'Female', '2004-01-01', 'hihello@djas.das', '09789123456', 'Agusan del Norte', 'Magallanes', 'College', 'BS Information Technology', 2, '1.46', '100000', 'Filipino', 'dghasgdas dash dasbvhd asdhj', 'profile_images/Clyde_Cutimar_A_high-quality_4K_image_of_a_woman_wearing_the_Et_73af061e-63c9-4e8d-bfb2-aad5c619171b.png', 'hihello', '$2y$10$HNSD8Sxrv4KB07TZLbns/uo6/siRmt21w5GQi1Z1XmY3PIffd13my');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `prioritize_course` text NOT NULL,
  `grade` varchar(50) NOT NULL,
  `duration_start` date NOT NULL,
  `duration_end` date NOT NULL,
  `benefits` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`id`, `name`, `location`, `prioritize_course`, `grade`, `duration_start`, `duration_end`, `benefits`, `image`, `about`, `sponsor`, `user_name`) VALUES
(1, 'S&T Undergraduate Scholarships', 'Caraga', '0000-00-00', 'N/A', '2023-08-16', '2023-09-16', 'dhua djaiso dsaio', 'adas.png', 'dadasdas', 'DOST Caraga', 'Father Saturnino Urios University'),
(2, 'DOST JLSS', 'Caraga', '0000-00-00', 'N/A', '2023-08-16', '2023-09-16', '40k', 'Clyde_Cutimar_A_high-quality_4K_image_of_a_woman_wearing_the_Et_73af061e-63c9-4e8d-bfb2-aad5c619171b.png', 'dasdasda', 'DOST Caraga', 'Father Saturnino Urios University'),
(3, 'sample', 'sample', '0000-00-00', '90', '2023-08-16', '2023-09-16', 'sample', 'ethereal fox emblem design.jpg', 'sample', 'sada', ''),
(4, 'dsadas', 'dasdas', '0000-00-00', 'dsada', '2023-08-16', '2023-09-16', 'das', 'Proof of Payment-CUTIMAR.jpg', 'das', 'das', ''),
(5, 'samda', 'dasdasd', '0000-00-00', 'ads', '2023-08-16', '2023-09-16', 'das', '1st Proof of Payment-CUTIMAR.jpg', 'dada', 'dasda', 'fsuu'),
(6, 'dasda', 'dasdas', '0000-00-00', 'das', '2023-08-16', '2023-09-16', 'dasda', 'professional.jpg', 'dasda', 'dasdas', ''),
(7, 'dasda', 'dada', '0000-00-00', 'dasda', '2023-08-16', '2023-08-18', 'dasda', 'sub-professional.jpg', 'dasda', 'das', 'fsuu'),
(8, 'dasdas', 'dasdasd', '0000-00-00', 'dasdasda', '2023-08-16', '2023-08-16', 'dasda', 'contacts.JPG', 'dasda', 'dada', ''),
(9, 'dasda', 'dasdas', '0000-00-00', 'dasdas', '2023-08-16', '2023-08-30', 'dasda', 'sub-professional.jpg', 'dasda', 'dasda', 'fsuu'),
(10, 'da', 'das', '0000-00-00', 'dsa', '2023-08-17', '2023-08-31', 'da', 'sub-professional.jpg', 'das', 'das', 'fsuu'),
(11, 'deasdas', 'das', '0000-00-00', 'das', '2023-08-16', '2023-09-09', 'da', 'professional.jpg', 'das', 'das', 'fsuu'),
(12, 'dsa', 'dsa', 'das', 'das', '2023-08-16', '2023-09-08', 'das', 'professional.jpg', 'das', 'dsa', 'fsuu'),
(13, 'Student Assistant', 'Caraga', 'Any Courses', '96', '2023-08-16', '2023-09-01', '40k Monthly', '1 Shizune.png', 'Student assistance in FSUU.', 'FSUU', 'fsuu'),
(14, 'dasdas', 'dsadasdas', 'dasdasdas', 'dasdas', '2023-08-17', '2023-08-24', 'dasdasd', '13 Illumi Zoldyck.png', 'das', 'dasda', '');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id`, `name`, `email_address`, `phone_number`, `address`, `profile_image`, `username`, `password`) VALUES
(3, 'Father Saturnino Urios University', 'grant@urios.edu.ph', '09512504812', 'San Francisco Street, Butuan City', 'profile_images_sponsor/Father_Saturnino_Urios_University_logo.png', 'fsuu', '$2y$10$pWe4B1MXKkTv6Gwo8.SwaepG9fHr5egMhp8aL1YrxXPChKTz.gAKS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scholarship`
--
ALTER TABLE `scholarship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
