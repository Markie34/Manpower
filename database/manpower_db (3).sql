-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 11:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manpower_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `about`) VALUES
(1, '<p>A manpower agency, also known as a staffing agency or employment agency, is a specialized firm that assists organizations in finding qualified candidates to fill their job vacancies. </p><p>These agencies serve as intermediaries between employers and job seekers, helping to match the right talent with the right job opportunities. </p><p>Manpower agencies typically maintain a database of potential candidates with various skill sets and experience levels across different industries. They often use various recruitment methods such as advertising, networking, and referrals to attract candidates.</p><p><br></p><p><b>WE ARE HIRING!! EDRIANCO MANPOWER SERVICES</b></p><p><b><br></b> <b>Office Location:</b> 5 P.Deato, Balangkas, Polo, Valenzuela City</p><p><b> Email</b>: edriancoservices@gmail.com </p><p><b>Office Time: </b></p><p><b>Monday - Friday:</b> 8am to 5pm </p><p><b>Saturday</b>: 9am to 12noon</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant`
--

CREATE TABLE `tbl_applicant` (
  `id` int(11) NOT NULL,
  `job_id` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `resume` text NOT NULL,
  `status` text NOT NULL,
  `high_school` text NOT NULL,
  `high_school_year` text NOT NULL,
  `college` text NOT NULL,
  `college_year` text NOT NULL,
  `postgraduate` text NOT NULL,
  `postgraduate_year` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_applicant`
--

INSERT INTO `tbl_applicant` (`id`, `job_id`, `firstname`, `middlename`, `lastname`, `gender`, `email`, `contact`, `address`, `resume`, `status`, `high_school`, `high_school_year`, `college`, `college_year`, `postgraduate`, `postgraduate_year`) VALUES
(23, '3', 'mang ', 'kiko', 'kikoman', 'male', 'clarkhagane@gmail.com', '0991939293', '11th ave', 'resume/RobloxScreenShot20240219_143732190.png', 'Hired', '', '', '', '', '', ''),
(24, '1', 'asdasd', 'asdasd', 'asdasd', 'male', 'wanitopilaiz@gmail.com', '099123912931293', 'asdasd', 'resume/TIMELINE-PHIL-RF.pdf', 'Failed', '', '', '', '', '', ''),
(25, '3', 'asd', 'asd', 'asd', 'male', 'asd@gmail.com', 'asd', 'asd', 'resume/6624d8a431539_banner.jpg', 'Pending', 'asd', '2024-04-21', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant_skill`
--

CREATE TABLE `tbl_applicant_skill` (
  `id` int(11) NOT NULL,
  `job_id` text NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_applicant_skill`
--

INSERT INTO `tbl_applicant_skill` (`id`, `job_id`, `skill`) VALUES
(1, '25', 'asd'),
(2, '25', 'asddd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE `tbl_job` (
  `id` int(11) NOT NULL,
  `position` text NOT NULL,
  `availability` text NOT NULL,
  `salary` text NOT NULL,
  `job_type` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `date_created` date DEFAULT current_timestamp(),
  `account_id` text NOT NULL,
  `account_edited` text NOT NULL,
  `date_updated` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`id`, `position`, `availability`, `salary`, `job_type`, `description`, `status`, `date_created`, `account_id`, `account_edited`, `date_updated`) VALUES
(1, 'Web Developer', '12', '', '', '<p>lasdhljahsdkjhjkashdkjhaskjdhjkhajkshdjkhasd</p>', 'Active', '0000-00-00', '', '', ''),
(3, 'Machine Operator', '2', '1000-2000', 'Part-time', '<p><b><u>ASJDLKASJDKLJASkldkldsfhasdfljkasjkdfhkj;asdfasdf</u></b></p>', 'Active', '2024-04-21', '1', '', ''),
(6, 'asdasd', '1', '', '', 'asdasdasdasdasdas', 'Closed', '0000-00-00', '', '', ''),
(7, 'asdasdasdasd', '22', '', '', '<p>asdasdasdasd</p>', 'Closed', '0000-00-00', '', '', ''),
(8, 'asdasdasdqw4124124', '2', '', '', 'asdasd', 'Closed', '0000-00-00', '', '', ''),
(10, 'Machine Operator', '5', '', '', 'asdasdasd', 'Active', '0000-00-00', '', '', ''),
(11, 'wa', '10', '10-20', 'Part-time', 'asd', 'Active', '0000-00-00', '1', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_applicant_skill`
--
ALTER TABLE `tbl_applicant_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_applicant_skill`
--
ALTER TABLE `tbl_applicant_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
