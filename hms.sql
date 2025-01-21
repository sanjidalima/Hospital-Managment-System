-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 06:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile`) VALUES
(1, 'admin', '12345678', ''),
(5, 'lima', '012345678', 'OIP (7).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `appointment_date` varchar(100) NOT NULL,
  `symptoms` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_booked` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `firstname`, `surname`, `gender`, `phone`, `appointment_date`, `symptoms`, `status`, `date_booked`) VALUES
(4, 'y', 'z', 'male', '01745658795', '2025-01-10', 'fever', 'Pending', '2025-01-07 14:23:34'),
(5, 'y', 'z', 'female', '12345', '2025-01-01', 'fever', 'Pending', '2025-01-07 15:59:56'),
(6, 'y', 'z', 'female', '12345', '2025-08-07', 'l', 'Discharge', '2025-01-11 20:55:50'),
(7, 'Sanjida', 'Lima', 'female', '01745658795', '2025-01-09', 'fever', 'Discharge', '2025-01-13 23:13:51'),
(8, 'Sanjida', 'Lima', 'female', '01745658795', '2025-01-07', 'fgg', 'Pending', '2025-01-15 20:54:00'),
(9, 'Sanjida', 'Lima', 'female', '01745658795', '2024-02-08', 'abcd', 'Discharge', '2025-01-15 22:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `date_reg` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `firstname`, `surname`, `username`, `email`, `gender`, `phone`, `country`, `password`, `salary`, `date_reg`, `status`, `profile`) VALUES
(1, 'a', 'b', 'k', 'h@gmai.com', 'Male', '1234567', 'Bangladesh', '12345678', '20000', '2024-12-26 00:07:42', 'Approved', 'about.webp'),
(2, 'a', 'b', 'k', 'h@gmai.com', 'Male', '123456789', 'Africa', '12345678', '0', '2024-12-26 00:14:59', 'Rejected', 'about.webp'),
(3, 'a', 'b', 'k', 'h@gmai.com', 'Male', '01745658795', 'Bangladesh', '98765432', '0', '2024-12-26 00:19:58', 'Rejected', 'about.webp'),
(4, 'a', 'b', 'k', 'h@gmai.com', 'Male', '2345678', 'Africa', '98765432', '0', '2024-12-26 00:22:23', 'Rejected', 'about.webp'),
(5, 'a', 'b', 'k', 'a@gmail.com', 'Female', '12345678', 'Japan', '12345678', '0', '2024-12-26 00:48:22', 'Approved', 'about.webp'),
(6, 'd', 'e', 'f', 't@gmail.com', 'Female', '12345678', 'India', '12345678', '2000', '2024-12-26 23:47:33', 'Approved', 'about.webp'),
(7, 'c', 'b', 'n', 'd@gmail.com', 'Male', '34567768', 'Italy', '09876543', '0', '2024-12-29 22:07:26', 'Approved', 'about.webp'),
(8, 'a', 'b', 'k', 'c@gmail.com', 'Female', '123456789', 'USA', '12345678', '0', '2025-01-02 19:03:08', 'Approved', 'about.webp'),
(9, 'f', 'j', 'a', 's@gmail.com', 'Male', '1234567', 'China', '12345678', '2000', '2025-01-05 20:23:29', 'Rejected', 'doctor.jpg'),
(10, 'a', 's', 'd', 'd@gmail.com', 'Female', '23456', 'USA', '12345678', '0', '2025-01-07 21:58:15', 'Rejected', 'doctor.jpg'),
(11, 'q', 'w', 'n', 'e@gmail.com', 'Male', '765432', 'India', '09876543', '0', '2025-01-07 22:12:08', 'Approved', 'about.webp'),
(12, 'Dr.Kobir', 'khan', 'kobir', 'kobir@gmail.com', 'Male', '01745798756', 'Bangladesh', '09876543', '20000', '2025-01-13 22:21:30', 'Approved', '1737005557_IMG_20250114_202552.jpg'),
(13, 'Ikbal', 'Ahmed', 'iqbal', 'ikbal@gmail.com', 'Male', '01710445953', 'Bangladesh', '12345678', '0', '2025-01-15 19:22:41', 'Approved', '1737003056_about.webp'),
(14, 'korim', 'Uddin', 'Korim', 'korim@gmail.com', 'Female', '4567890', 'USA', '12345678', '0', '2025-01-15 20:58:12', 'Pending', 'doctor.jpg'),
(15, 'helal', 'uddin', 'helal', 'helal@gmail.com', 'Male', '65756', 'India', '12345678', '0', '2025-01-15 21:23:54', 'Approved', '1737005103_about.webp');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `patient` varchar(100) NOT NULL,
  `date_dischage` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `doctor`, `patient`, `date_dischage`, `amount_paid`, `description`) VALUES
(4, 'kobir', 'Sanjida', '2025-01-13 23:15:44', '1200', 'dfghj'),
(5, 'kobir', 'Sanjida', '2025-01-15 23:03:13', '50000', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_reg` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `username`, `firstname`, `surname`, `email`, `phone`, `gender`, `location`, `password`, `date_reg`, `profile`) VALUES
(8, 'n', 'y', 'z', 'h@gmai.com', '12345', 'female', 'sylhet', '$2y$10$qHuVkjkmjiWeD8LG/kwg0uU1s4KY8WaXWonvAmDNmo/RfQhYid.uy', '2025-01-07 15:14:57', 'patient.jpeg'),
(9, 'o', 'y', 't', 'h@gmai.com', '12345', 'female', 'syl', '$2y$10$EXBLWgIk7MREbjnOOULHneqfqPyqIsLvpUvzbcAnjsXOeMs5oRRCO', '2025-01-07 19:55:11', 'patient.jpg'),
(10, 'p', 'x', 'c', 'h@gmai.com', '01731574567', 'female', 'sylhet', '$2y$10$pqCh/7oL6f2W8BWRVUG9S.SAcYx7QfaziLjfyQqSvQjFOhxzEEvvm', '2025-01-07 19:57:02', 'patient.jpg'),
(11, 'Mr.Sofiq', 'miah', 'sofiq', 'sofiq@gmail.com', '0180908976', 'male', 'sylhet', '$2y$10$1lYpk11j1VSBJYh78U7uwu1oxXJJwUm2cTAvfITljbF3PZ9xd9clq', '2025-01-13 22:44:11', 'patient.jpg'),
(12, 'sanjida', 'Sanjida', 'Lima', 'lima@gmail.com', '01745658795', 'female', 'sylhet', '$2y$10$hyGbYOH.5n4dqeM9eTUyteFDZ.yaj.rpIYho02DX.igcFNcgHGMMe', '2025-01-13 22:47:00', 'IMG_20250114_202358.jpg'),
(13, 'l', 'Sanjida', 'Lima', 'lima@gmail.com', '01745658795', 'female', 'sylhet', '$2y$10$ZSV4xqcb0IOY6sZsesPpOO4MwEoJHUn3XaJreu6hsy.zcy.uIVBDC', '2025-01-13 22:54:02', 'IMG_20250114_202358.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date_send` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `title`, `message`, `username`, `date_send`) VALUES
(1, 'hi', 'hi', 'k', '2024-12-23 21:12:50'),
(2, 'u', 'u', 'k', '2024-12-23 21:13:03'),
(5, 'y', 'y', 'k', '2025-01-06 19:16:40'),
(6, 'hello', 'hello', 'lima', '2025-01-13 23:13:33'),
(7, 'abc', 'abc', 'l', '2025-01-15 22:57:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
