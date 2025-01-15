-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 05:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
USE `hms`;


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
(5, 'lima', '012345678', 'OIP (7).jpg'),
(6, 'sathee', 'sathee', 'OIP (7).jpg'),
(8, 'Tanjina', 'Tanjina', 'OIP (7).jpg'),
(10, 'Anika', '12345678', 'about.webp');

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
(1, 'a', 'b', 'c', 'h@gmai.com', 'Male', '1234567', 'Bangladesh', '12345678', '0', '2024-12-26 00:07:42', 'Pending', 'doctor.jpg'),
(2, 'a', 'b', 'c', 'h@gmai.com', 'Male', '123456789', 'Africa', '12345678', '0', '2024-12-26 00:14:59', 'Pending', 'doctor.jpg'),
(3, 'a', 'b', 'c', 'h@gmai.com', 'Male', '01745658795', 'Bangladesh', '98765432', '0', '2024-12-26 00:19:58', 'Pending', 'doctor.jpg'),
(4, 'a', 'b', 'c', 'h@gmai.com', 'Male', '2345678', 'Africa', '98765432', '0', '2024-12-26 00:22:23', 'Pending', 'doctor.jpg'),
(5, 'a', 'b', 'c', 'a@gmail.com', 'Female', '12345678', 'Japan', '12345678', '0', '2024-12-26 00:48:22', 'Pending', 'doctor.jpg'),
(6, 'd', 'e', 'f', 't@gmail.com', 'Female', '12345678', 'India', '12345678', '0', '2024-12-26 23:47:33', 'Pending', 'doctor.jpg'),
(7, 'c', 'b', 'n', 'd@gmail.com', 'Male', '34567768', 'Italy', '12345678', '0', '2024-12-29 22:07:26', 'Pending', 'doctor.jpg'),
(8, 'a', 'b', 'c', 'c@gmail.com', 'Female', '123456789', 'USA', '12345678', '0', '2025-01-02 19:03:08', 'Pending', 'doctor.jpg');

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
(1, '', '', '2025-01-03 19:19:31', '1200', 'fever');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
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

INSERT INTO `patient` (`id`, `username`, `email`, `phone`, `gender`, `location`, `password`, `date_reg`, `profile`) VALUES
(1, 'saanjidalima', 'h@gmai.com', '2345678', 'female', 'sylhet', '$2y$10$jEVuYTnNwQXcYMQhpwPNq.IqMwURf4NcnjtcsuDcxJbBX69zTiUeW', '2024-12-16 21:04:49', 'patient.jpg'),
(2, 'k', 'k@gmail.com', '01731574567', 'female', 'sylhet', '$2y$10$r3usLP5jjfGrSDOqh7CjnOpjmqqfXHmRD.HF/Paho4eCGqzCiG/WK', '2024-12-16 21:06:09', 'patient.jpg'),
(3, 'd', 'h@gmai.com', '01731574567', 'male', 'sylhet', '$2y$10$rOvkjc/KvoHUXEYvQSHU/.WfoVx0eSvQzLEHz2O.zSdMQrhQvpNrS', '2024-12-23 22:10:26', 'patient.jpg');

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
(2, 'u', 'u', 'k', '2024-12-23 21:13:03');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
