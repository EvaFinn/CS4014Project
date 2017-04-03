-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 01:16 PM
-- Server version: 5.7.14
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
-- Table structure for table `banned_users`
--

CREATE TABLE `banned_users` (
  `banned_id` int(8) NOT NULL,
  `banned_email` varchar(64) NOT NULL,
  `banned_reason` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `claimed_tasks`
--

CREATE TABLE `claimed_tasks` (
  `task_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_tasks`
--

CREATE TABLE `deleted_tasks` (
  `task_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flagged_task`
--

CREATE TABLE `flagged_task` (
  `task_id` int(4) NOT NULL,
  `pending _review` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `post_review_status` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(4) NOT NULL,
  `tag_name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(4) NOT NULL,
  `task_title` varchar(64) NOT NULL,
  `task_type` varchar(16) NOT NULL,
  `task_description` varchar(240) NOT NULL,
  `task_pages` int(6) NOT NULL,
  `task_words` int(10) NOT NULL,
  `task_format` varchar(6) NOT NULL,
  `claimed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `flagged` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `complete` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `cancelled` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `failed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `claimed_by` datetime NOT NULL,
  `submit_by` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `task_feed`
--

CREATE TABLE `task_feed` (
  `ul_id` int(8) NOT NULL,
  `favourite_tag_1_id` int(4) NOT NULL,
  `favourite_tag_2_id` int(4) NOT NULL,
  `favourite_tag_3_id` int(4) NOT NULL,
  `favourite_tag_4_id` int(11) NOT NULL,
  `subscribed_tasks_id` int(4) NOT NULL,
  `task_discipline` varchar(24) NOT NULL,
  `most_recent_viewed_task_id_1` int(4) NOT NULL,
  `most_recent_viewed_task_id_2` int(4) NOT NULL,
  `most_recent_viewed_task_id_3` int(4) NOT NULL,
  `most_recent_viewed_task_id_4` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `task_tag`
--

CREATE TABLE `task_tag` (
  `tag_id` int(4) NOT NULL,
  `task_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unverified_user`
--

CREATE TABLE `unverified_user` (
  `ul_id` int(8) NOT NULL,
  `password` varchar(60) NOT NULL,
  `ul_email` varchar(36) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(26) NOT NULL,
  `field` varchar(26) NOT NULL,
  `reputation` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_moderator` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_banned` tinyint(1) UNSIGNED DEFAULT '0',
  `has_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `verification_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores all user information for quicker queries';

--
-- Dumping data for table `unverified_user`
--

INSERT INTO `unverified_user` (`ul_id`, `password`, `ul_email`, `first_name`, `last_name`, `field`, `reputation`, `is_moderator`, `is_banned`, `has_deleted`, `verification_code`) VALUES
(15189082, '', '', '', '', '', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE `user_task` (
  `ul_id` int(8) NOT NULL,
  `task_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `verified_user`
--

CREATE TABLE `verified_user` (
  `ul_id` int(8) NOT NULL,
  `password` varchar(60) NOT NULL,
  `ul_email` varchar(36) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(26) NOT NULL,
  `field` varchar(26) NOT NULL,
  `reputation` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_moderator` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_banned` tinyint(1) UNSIGNED DEFAULT '0',
  `has_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores all user information for quicker queries';

--
-- Dumping data for table `verified_user`
--

INSERT INTO `verified_user` (`ul_id`, `password`, `ul_email`, `first_name`, `last_name`, `field`, `reputation`, `is_moderator`, `is_banned`, `has_deleted`) VALUES
(15189082, '', '', '', '', '', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banned_users`
--
ALTER TABLE `banned_users`
  ADD PRIMARY KEY (`banned_id`),
  ADD UNIQUE KEY `banned_email` (`banned_email`);

--
-- Indexes for table `claimed_tasks`
--
ALTER TABLE `claimed_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `deleted_tasks`
--
ALTER TABLE `deleted_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `flagged_task`
--
ALTER TABLE `flagged_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `tag_name` (`tag_name`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_feed`
--
ALTER TABLE `task_feed`
  ADD PRIMARY KEY (`ul_id`),
  ADD UNIQUE KEY `subscribed_tasks_id` (`subscribed_tasks_id`),
  ADD UNIQUE KEY `most_recent_viewed_task_id_1` (`most_recent_viewed_task_id_1`),
  ADD UNIQUE KEY `most_recent_viewed_task_id_2` (`most_recent_viewed_task_id_2`),
  ADD UNIQUE KEY `most_recent_viewed_task_id_3` (`most_recent_viewed_task_id_3`),
  ADD UNIQUE KEY `most_recent_viewed_task_id_4` (`most_recent_viewed_task_id_4`),
  ADD KEY `favourite_tag_1_id` (`favourite_tag_1_id`),
  ADD KEY `favourite_tag_2_id` (`favourite_tag_2_id`),
  ADD KEY `favourite_tag_3_id` (`favourite_tag_3_id`),
  ADD KEY `favourite_tag_4_id` (`favourite_tag_4_id`);

--
-- Indexes for table `task_tag`
--
ALTER TABLE `task_tag`
  ADD PRIMARY KEY (`tag_id`,`task_id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `unverified_user`
--
ALTER TABLE `unverified_user`
  ADD PRIMARY KEY (`ul_id`),
  ADD UNIQUE KEY `ul_email` (`ul_email`),
  ADD KEY `ul_id` (`ul_id`);

--
-- Indexes for table `user_task`
--
ALTER TABLE `user_task`
  ADD PRIMARY KEY (`ul_id`,`task_id`),
  ADD KEY `ul_id` (`ul_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `verified_user`
--
ALTER TABLE `verified_user`
  ADD PRIMARY KEY (`ul_id`),
  ADD UNIQUE KEY `ul_email` (`ul_email`),
  ADD KEY `ul_id` (`ul_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `banned_users`
--
ALTER TABLE `banned_users`
  ADD CONSTRAINT `banned_users_ibfk_1` FOREIGN KEY (`banned_id`) REFERENCES `verified_user` (`ul_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `banned_users_ibfk_2` FOREIGN KEY (`banned_email`) REFERENCES `verified_user` (`ul_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `claimed_tasks`
--
ALTER TABLE `claimed_tasks`
  ADD CONSTRAINT `claimed_tasks_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deleted_tasks`
--
ALTER TABLE `deleted_tasks`
  ADD CONSTRAINT `deleted_tasks_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flagged_task`
--
ALTER TABLE `flagged_task`
  ADD CONSTRAINT `flagged_task_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_feed`
--
ALTER TABLE `task_feed`
  ADD CONSTRAINT `task_feed_ibfk_1` FOREIGN KEY (`ul_id`) REFERENCES `verified_user` (`ul_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_feed_ibfk_2` FOREIGN KEY (`favourite_tag_1_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_feed_ibfk_3` FOREIGN KEY (`favourite_tag_2_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_feed_ibfk_4` FOREIGN KEY (`favourite_tag_3_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_feed_ibfk_5` FOREIGN KEY (`favourite_tag_4_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_feed_ibfk_6` FOREIGN KEY (`most_recent_viewed_task_id_1`) REFERENCES `task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_feed_ibfk_7` FOREIGN KEY (`most_recent_viewed_task_id_2`) REFERENCES `task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_feed_ibfk_8` FOREIGN KEY (`most_recent_viewed_task_id_3`) REFERENCES `task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_feed_ibfk_9` FOREIGN KEY (`most_recent_viewed_task_id_4`) REFERENCES `task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_tag`
--
ALTER TABLE `task_tag`
  ADD CONSTRAINT `task_tag_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_tag_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_task`
--
ALTER TABLE `user_task`
  ADD CONSTRAINT `user_task_ibfk_1` FOREIGN KEY (`ul_id`) REFERENCES `verified_user` (`ul_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_task_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
