-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 09:12 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Fac_attend` tinyint(1) NOT NULL DEFAULT '0',
  `No_hols` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `Date`, `Fac_attend`, `No_hols`) VALUES
(3, '2018-10-25', 1, 0),
(4, '2018-10-25', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_tasks`
--

CREATE TABLE `faculty_tasks` (
  `id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Date` date NOT NULL,
  `Task` text,
  `Alloted_time` varchar(6) DEFAULT NULL,
  `Message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `for_hod`
--

CREATE TABLE `for_hod` (
  `id` int(11) NOT NULL,
  `Faculty_name` varchar(25) NOT NULL,
  `Date` date NOT NULL,
  `Free_slots` text NOT NULL,
  `Task` text,
  `Task_Time` varchar(6) DEFAULT NULL,
  `Message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `1st_Hour` text,
  `2nd_Hour` text,
  `3rd_Hour` text,
  `4th_Hour` text,
  `5th_Hour` text,
  `6th_Hour` text,
  `7th_Hour` text,
  `No_free_slots` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `Day`, `1st_Hour`, `2nd_Hour`, `3rd_Hour`, `4th_Hour`, `5th_Hour`, `6th_Hour`, `7th_Hour`, `No_free_slots`) VALUES
(3, 'Monday', 'DBMS', 'ML', 'ML', '', 'ACA', '', 'DBMS', 2),
(3, 'Tuesday', 'ACA', '', 'ML', '', '', 'ADA', 'DBMS', 3),
(3, 'Wednesday', 'DBMS', 'ML', '', 'NLP', 'ACA', '', 'DBMS', 2),
(3, 'Thursday', 'NLP', 'ML', 'ML', 'ADA', 'ACA', '', 'DBMS', 1),
(3, 'Friday', 'ACA', '', '', 'ADA', '', '', 'DBMS', 4),
(4, 'Monday', 'NLP', '', 'ML', '', '', 'ADA', 'OS', 3),
(4, 'Tuesday', 'ACA', 'ML', '', '', '', '', 'OS', 4),
(4, 'Wednesday', 'NLP', 'ACA', 'ML', 'ADA', '', '', 'DIP', 2),
(4, 'Thursday', 'DBMS', '', '', '', '', 'ADA', 'OS', 4),
(4, 'Friday', 'DBMS', 'DIP', 'ML', 'ADA', '', 'ADA', 'OS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `userType` varchar(15) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Phone_No` varchar(13) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `userType`, `Name`, `email`, `Phone_No`, `password`) VALUES
(3, 'Faculty', 'Girish', 'girish123@gmail.com', '97153751', 'girish@123'),
(4, 'Faculty', 'Anand', 'anand@hotmail.com', '87103623', 'hello123'),
(6, 'Faculty', 'pravali', 'pravalibhaskar28@gmail.com', '989160312', 'baldwanian'),
(7, 'Admin', 'Abhishek', 'abhishekbhaskar27@gmail.com', '9740201019', 'monitor_8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `faculty_tasks`
--
ALTER TABLE `faculty_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Alloted_time` (`Alloted_time`);

--
-- Indexes for table `for_hod`
--
ALTER TABLE `for_hod`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Task_Time` (`Task_Time`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `faculty_tasks`
--
ALTER TABLE `faculty_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `for_hod`
--
ALTER TABLE `for_hod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty_tasks`
--
ALTER TABLE `faculty_tasks`
  ADD CONSTRAINT `faculty_tasks_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_tasks_ibfk_2` FOREIGN KEY (`Alloted_time`) REFERENCES `for_hod` (`Task_Time`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `for_hod`
--
ALTER TABLE `for_hod`
  ADD CONSTRAINT `for_hod_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
