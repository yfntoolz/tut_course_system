-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 07:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_user`
--

CREATE TABLE `active_user` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `active_user`
--

INSERT INTO `active_user` (`id`, `email`) VALUES
(10, 'lu@gm.co');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(80) NOT NULL,
  `aps` int(2) NOT NULL,
  `english` int(1) NOT NULL,
  `maths` int(1) NOT NULL,
  `physics` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `aps`, `english`, `maths`, `physics`) VALUES
(1, 'Computer Science', 24, 4, 4, 4),
(2, 'Computer Science (Expended)', 20, 3, 3, 3),
(3, 'INFORMATION TECHNOLOGY (NDIT12) - NQF Level 6', 18, 3, 4, 0),
(4, 'INFORMATION TECHNOLOGY (Extended) (NDITF1) - NQF Level 6', 18, 3, 3, 0),
(5, 'BUSINESS APPLICATIONS (IT) (NDIB12) - NQF Level 6', 18, 3, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `course_id`, `student_email`, `ranking`) VALUES
(1, 1, 'lu@gm.co', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `highest_qualification` varchar(100) NOT NULL,
  `aps_score` int(2) NOT NULL,
  `english` int(3) NOT NULL,
  `maths` int(3) NOT NULL,
  `physics` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `email`, `password`, `highest_qualification`, `aps_score`, `english`, `maths`, `physics`) VALUES
(1, 'Thulani', 'Nkabini', 'thulani.nkabini@live.com', '123', 'NSC', 34, 3, 5, 4),
(2, 'Thulani', 'Nkabini', 'thulani.nkabini@live.com', '12', 'NSC', 34, 3, 5, 4),
(3, 'Thulani', 'Nkabini', 'thulani.nkabini@live.com', '12', 'NSC', 34, 3, 5, 4),
(4, 'Thulani', 'Nkabini', 'thulani.nkabini@live.com', '12', 'NSC', 34, 3, 5, 4),
(5, 'Thulani', 'Nkabini', 'thulani.nkabini@live.com', '12', 'NSC', 34, 3, 5, 4),
(6, 'Thulani', 'Nkabini', 'thulani.nkabini@live.com', '12', 'Select Highest Qualification', 12, 3, 3, 4),
(7, 'Toolz', 'Nkabs', 'toolz@gmail.com', '12', 'Select Highest Qualification', 28, 7, 5, 4),
(8, 'lothar', 'mohlala', 'thulani.nkabini@live.com', '123', 'Select Highest Qualification', 24, 5, 4, 5),
(9, 'loth', 'moh', 'l2@g.co', '123', 'Select Highest Qualification', 25, 5, 4, 5),
(10, 'fff', 'ggg', 'asdf@ggmm.co', '123', 'National Senior Certificate', 25, 5, 4, 5),
(11, 'fff', 'ggg', 'asdf@ggmm.co', '123', 'National Senior Certificate', 25, 5, 4, 5),
(12, 'future', 'mask', 'future1@gmail.com', '123456', 'National N Certificate', 34, 4, 5, 5),
(15, 'Thulani', 'Goat', 't@hotmial.com', '12', 'Select Highest Qualification', 25, 4, 4, 4),
(16, 'Toolz', 'Mean', 't@tmail.com', '12', 'Select Highest Qualification', 23, 4, 4, 4),
(17, 'Lex', 'Luther', 'lex@cq.co.za', '159', 'National Senior Certificate', 34, 5, 4, 5),
(18, 'lex 2', 'luther', 'lexluther@gmail.com', '1234', 'Select Highest Qualification', 28, 4, 4, 4),
(19, 'luther', 'lex', 'lutherlex@gmail.com', '12345', 'National Certificate (Vocation', 29, 4, 4, 4),
(20, 'lady', 'london', 'ladylondon@gmail.com', '12345', 'National Senior Certificate', 28, 5, 4, 5),
(21, 'den', 'den', 'luuu@gmail.com', '12345', 'National Senior Certificate', 29, 4, 4, 4),
(22, 'luuuu', 'luuuu', 'lu@gm.co', '12345', 'National Certificate (Vocation', 29, 5, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_user`
--
ALTER TABLE `active_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_user`
--
ALTER TABLE `active_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
