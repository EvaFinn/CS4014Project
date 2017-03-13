-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 05:07 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docdoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `banned_user`
--

CREATE TABLE `banned_user` (
  `banned_id` mediumint(12) NOT NULL,
  `banned_email` varchar(32) NOT NULL,
  `banned_reason` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `claimed_task`
--

CREATE TABLE `claimed_task` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `hidden_owner_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `claimed_task`
--

INSERT INTO `claimed_task` (`task_id`, `hidden_owner_id`) VALUES
(15189082, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flagged_task`
--

CREATE TABLE `flagged_task` (
  `task_id` mediumint(12) NOT NULL,
  `pending_review` tinyint(1) NOT NULL,
  `post_review_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flagged_task`
--

INSERT INTO `flagged_task` (`task_id`, `pending_review`, `post_review_status`) VALUES
(0, 1, 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `localisation`
--

CREATE TABLE `localisation` (
  `language` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE `log_in` (
  `ul_id` mediumint(8) UNSIGNED NOT NULL,
  `temp_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_in`
--

INSERT INTO `log_in` (`ul_id`, `temp_password`) VALUES
(15189082, 'Saturn10');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `tag_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`) VALUES
(1, 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `ul_id` mediumint(8) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `task_type` varchar(6) NOT NULL,
  `task_description` varchar(260) NOT NULL,
  `task_pages` mediumint(6) UNSIGNED NOT NULL,
  `task_words` int(10) NOT NULL,
  `task_format` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`ul_id`, `task_id`, `task_name`, `task_type`, `task_description`, `task_pages`, `task_words`, `task_format`) VALUES
(15189082, 1, 'Java Object Oriented Programming', 'Thesis', 'This is a thesis on the basis of coverin how to implement object oriented programing in java', 420, 25000, 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `task_dates`
--

CREATE TABLE `task_dates` (
  `task_id` mediumint(12) NOT NULL,
  `claimed_by_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `submit_by_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `task_feed`
--

CREATE TABLE `task_feed` (
  `user_id` mediumint(12) UNSIGNED NOT NULL,
  `favourite_tags` varchar(12) NOT NULL,
  `subscribed_tags` varchar(30) NOT NULL,
  `task_discipline` varchar(30) NOT NULL,
  `viewed_task` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `unclaimed` tinyint(1) DEFAULT NULL,
  `flagged` tinyint(1) DEFAULT NULL,
  `complete` tinyint(1) DEFAULT NULL,
  `cancelled` tinyint(1) DEFAULT NULL,
  `failed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`task_id`, `unclaimed`, `flagged`, `complete`, `cancelled`, `failed`) VALUES
(1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ul_id` mediumint(8) UNSIGNED NOT NULL,
  `ul_email` varchar(45) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `field` varchar(30) NOT NULL,
  `reputation` tinyint(3) DEFAULT NULL,
  `is_moderator` tinyint(1) DEFAULT NULL,
  `is_banned` tinyint(1) DEFAULT NULL,
  `has_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ul_id`, `ul_email`, `first_name`, `last_name`, `field`, `reputation`, `is_moderator`, `is_banned`, `has_deleted`) VALUES
(15189082, NULL, 'Daniel', 'Keeley', 'Computer Science', 5, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_tasks`
--

CREATE TABLE `user_tasks` (
  `task_id` int(10) UNSIGNED DEFAULT NULL,
  `claimant_email` varchar(45) DEFAULT NULL,
  `claimant_first_name` varchar(50) NOT NULL,
  `claimant_second_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tasks`
--

INSERT INTO `user_tasks` (`task_id`, `claimant_email`, `claimant_first_name`, `claimant_second_name`) VALUES
(0, '15189082@studentmail.ul.ie', 'Daniel', 'Keeley'),
(0, '15189082@studentmail.ul.ie', 'Daniel', 'Keeley');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banned_user`
--
ALTER TABLE `banned_user`
  ADD PRIMARY KEY (`banned_id`);

--
-- Indexes for table `claimed_task`
--
ALTER TABLE `claimed_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `flagged_task`
--
ALTER TABLE `flagged_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `log_in`
--
ALTER TABLE `log_in`
  ADD PRIMARY KEY (`ul_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_dates`
--
ALTER TABLE `task_dates`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_feed`
--
ALTER TABLE `task_feed`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ul_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
