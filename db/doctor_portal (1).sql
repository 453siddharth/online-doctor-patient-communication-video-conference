-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 07:10 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456', '2021-09-02 07:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `advices`
--

CREATE TABLE `advices` (
  `id` int(11) NOT NULL,
  `symptom` varchar(255) NOT NULL,
  `advice` longtext NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advices`
--

INSERT INTO `advices` (`id`, `symptom`, `advice`, `doctor`, `status`, `created_at`) VALUES
(2, 'Brain', 'Remove excess use of mobile phone from your daily routine', 'daman@gmail.com', 'Active', '2023-08-10 07:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `disease` longtext NOT NULL,
  `symptoms` longtext NOT NULL,
  `doctor_response` longtext NOT NULL,
  `meeting_link` longtext NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `doctor_id`, `disease`, `symptoms`, `doctor_response`, `meeting_link`, `status`, `created_at`) VALUES
(1, 'patient1@gmail.com', 'daman@gmail.com', 'Testing', 'demo symptom', '', '', 'Decline', '2021-09-09 07:33:06'),
(2, 'patient1@gmail.com', 'daman@gmail.com', 'fever', 'cold,cough,shivering', '', '', 'Approve', '2021-09-09 07:32:27'),
(3, 'janki@gmail.com', 'diksha@gmail.com', 'Brain Cancer', 'Cough, feever', '', '', 'Approve', '2023-03-20 04:42:22'),
(4, 'janki@gmail.com', 'diksha@gmail.com', '', '', '', '', 'pending', '2023-03-20 04:44:55'),
(5, 'patient1@gmail.com', 'daman@gmail.com', 'fever cold', 'fever cold', '', '', 'Approve', '2023-03-24 07:14:10'),
(6, 'patient1@gmail.com', 'daman@gmail.com', 'fever cold', 'demo', '', '', 'Approve', '2023-03-27 08:06:37'),
(7, 'user100@gmail.com', 'daman@gmail.com', 'fever cold', 'sneezing', '', '', 'Approve', '2023-08-10 04:08:52'),
(8, 'user100@gmail.com', 'daman@gmail.com', 's', 'sd', 'We will have a zoom meeting 11 august at 1 pm. Kindly join the link 5 minutes before meeting ', 'https://meet.google.com/ace-mfqa-qap', 'Approve', '2023-08-10 04:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `other_description` longtext NOT NULL,
  `experience` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `doctor_name`, `email`, `password`, `contact`, `qualification`, `specialization`, `other_description`, `experience`, `created_at`) VALUES
(1, 'Daman', 'daman@gmail.com', '123456', 7894561123, 'MBBS', 'Heart', 'This is for demo testing ', '5+ years', '2021-09-02 11:29:15'),
(4, 'Prativa', 'prativa@gmail.com', '123456', 8645286562, '  M tech', 'Brain', 'liuhgyfgtf', '+2', '2023-03-19 12:00:24'),
(5, 'priya', 'diksha@gmail.com', '123123', 4864512, ' Phd', 'Psytherepist', 'liuygt', '7+', '2023-03-19 12:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `password`, `gender`, `dob`, `contact`, `address`, `created_at`) VALUES
(1, 'p1', 'p1@gmail.com', '123456', 'male', '12-0-2021', 7894561230, 'Demo testing Address', '2021-09-02 11:30:29'),
(2, 'patient1', 'patient1@gmail.com', '123456', 'male', '2020-12-30', 7894561230, 'Jalandhar', '2021-09-03 08:43:45'),
(3, 'janki', 'janki@gmail.com', '123456', 'female', '0845-12-23', 186512, 'koiuy7t', '2023-03-19 12:14:33'),
(5, 'd', 'test@gmail.com', '123123', 'female', '2023-03-01', 84512486541, 'kjhujgyf', '2023-03-19 12:16:32'),
(8, 'user100', 'user100@gmail.com', '123456', 'male', '2000-08-16', 798798798765, 'JAlandhar', '2023-08-09 07:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `prescription_list` longtext NOT NULL,
  `other_description` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `appointment_id`, `prescription_list`, `other_description`, `created_at`) VALUES
(3, 2, 'demo testing ', 'no other point', '2021-09-09 07:47:34'),
(4, 3, 'helo', 'pcm', '2023-03-20 04:55:31'),
(5, 3, 'fever hndkd', 'gnfnfh', '2023-03-20 04:55:52'),
(6, 2, 'demo', 'demo', '2023-03-24 07:14:22'),
(7, 7, 'Paracetamol', 'avoid cold water', '2023-08-10 04:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `query` longtext NOT NULL,
  `doctor_reply` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `appointment_id`, `query`, `doctor_reply`, `created_at`) VALUES
(1, 2, 'Demo Comment ', 'hfhgsdjfn', '2021-09-09 07:59:00'),
(2, 3, 'lkjhgf', 'niceone', '2023-03-20 05:06:26'),
(3, 7, 'Slore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 'view_prescription', '2023-08-10 04:21:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `advices`
--
ALTER TABLE `advices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advices`
--
ALTER TABLE `advices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
