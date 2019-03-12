-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2019 at 10:31 PM
-- Server version: 5.7.25-0ubuntu0.18.10.2
-- PHP Version: 7.2.15-0ubuntu0.18.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backendassignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `answered_questions`
--

CREATE TABLE `answered_questions` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `correct_answer`
--

CREATE TABLE `correct_answer` (
  `id` int(11) NOT NULL,
  `question_no` int(11) DEFAULT NULL,
  `correct_ans` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `correct_answer`
--

INSERT INTO `correct_answer` (`id`, `question_no`, `correct_ans`) VALUES
(1, 1, 1),
(2, 6, 10),
(3, 6, 11),
(4, 11, 32);

-- --------------------------------------------------------

--
-- Table structure for table `multiple_answer`
--

CREATE TABLE `multiple_answer` (
  `id` int(11) NOT NULL,
  `question_no` int(11) DEFAULT NULL,
  `multiple_answers` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multiple_answer`
--

INSERT INTO `multiple_answer` (`id`, `question_no`, `multiple_answers`) VALUES
(1, 1, 'yes'),
(2, 1, 'no'),
(3, 1, 'maybe'),
(4, 1, 'none of these'),
(9, 6, 'yes'),
(10, 6, 'no'),
(11, 6, 'maybe'),
(12, 6, 'maybe not'),
(13, 7, 'yes'),
(14, 7, 'no'),
(15, 7, 'maybe'),
(16, 7, 'not at all'),
(17, 8, 'yes'),
(18, 8, 'no'),
(19, 8, 'maybe'),
(20, 8, 'not at all'),
(21, 9, 'yes'),
(22, 9, 'no'),
(23, 9, 'maybe'),
(24, 9, 'not at all'),
(25, 10, 'yes'),
(26, 10, 'no'),
(27, 10, 'maybe'),
(28, 10, 'not at all'),
(29, 11, 'yes'),
(30, 11, 'no'),
(31, 11, 'maybe'),
(32, 11, 'not at all');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `uid`, `points`) VALUES
(1, 1, 0),
(2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `points` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `points`) VALUES
(1, 'are u a good person?', 5),
(6, 'are u a bad one?', 4),
(11, 'will i be able to complete my assignment on time?', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(511) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `mobile_num` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `enroll` varchar(10) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `username`, `gender`, `mobile_num`, `admin`, `enroll`, `branch`, `year`) VALUES
(1, 'asd', 'asdasdasd', 'asd@asd.com', 'asd', 'm', '9634542342', 0, '18121003', 'ch', '1'),
(2, 'Adrij Shikhar', 'adrij123', 'adrijshikhar85@gmail.com', 'adrijshikhar85', 'm', '8218058928', 1, '18121003', 'CH', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answered_questions`
--
ALTER TABLE `answered_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `correct_answer`
--
ALTER TABLE `correct_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiple_answer`
--
ALTER TABLE `multiple_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answered_questions`
--
ALTER TABLE `answered_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `correct_answer`
--
ALTER TABLE `correct_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `multiple_answer`
--
ALTER TABLE `multiple_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
