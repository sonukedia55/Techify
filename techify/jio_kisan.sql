-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2018 at 01:10 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE DATABASE jio_kisan;
USE DATABASE jio_kisan;
--
-- Database: `jio_kisan`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_answers`
--

CREATE TABLE IF NOT EXISTS `forum_answers` (
  `answer_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upvote_count` int(11) NOT NULL,
  `downvote_count` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_answers`
--

INSERT INTO `forum_answers` (`answer_id`, `forum_id`, `answer`, `upvote_count`, `downvote_count`) VALUES
(1, 1, 'In agriculture, a harrow is an implement for breaking up and smoothing out the surface of the soil. In this way it is distinct in its effect from the plough, which is used for deeper tillage. Harrowing is often carried out on fields to follow the rough finish left by plowing operations', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `forum_questions`
--

CREATE TABLE IF NOT EXISTS `forum_questions` (
  `forum_id` int(11) NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `questions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_questions`
--

INSERT INTO `forum_questions` (`forum_id`, `user_id`, `questions`) VALUES
(1, '1', 'What is a Harrow?');

-- --------------------------------------------------------

--
-- Table structure for table `give_on_rent`
--

CREATE TABLE IF NOT EXISTS `give_on_rent` (
  `rent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_pic_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` int(11) NOT NULL,
  `lat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `taker_id` int(11) NOT NULL,
  `fro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upto` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `give_on_rent`
--

INSERT INTO `give_on_rent` (`rent_id`, `user_id`, `user_name`, `machine_name`, `machine_pic_url`, `rent`, `lat`, `lng`, `taker_id`, `fro`, `upto`) VALUES
(1, 1, '1 month old', 'Wheat Harvestor', '', 1200, '19.1309142', '72.916038', 1, '2019-01-10', '2019-01-20'),
(2, 1, '', 'Thresher', '', 900, '19.1309142', '72.916038', 1, '2019-02-01', '2019-02-10'),
(3, 1, 'Sharpe Tool', 'Harrow', '', 600, '19.1309142', '72.916038', 1, '2019-02-01', '2019-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `uid`, `message`) VALUES
(1, 2, 'Christopher Doering reported in todayâ€™s Des Moines Register that, â€œFarmers in Iowa and across the Corn Belt struggling to reach profitability this year got some good news from the U.S. Department of Agriculture on Tuesday.'),
(2, 2, 'India''s agriculture is statistically the widest economic sector, which forms the basis of largest employment source and a major section of the overall social expansion. For high agricultural productivity the agriculture practices need to be implemented which could be only performed by proper agriculture/crop monitoring. For this purpose Satellite Based Agriculture Information System (SBAIS) has been developed.');

-- --------------------------------------------------------

--
-- Table structure for table `questions_tag`
--

CREATE TABLE IF NOT EXISTS `questions_tag` (
  `forum_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) NOT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upvoters`
--

CREATE TABLE IF NOT EXISTS `upvoters` (
  `voters_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upvoters`
--

INSERT INTO `upvoters` (`voters_id`, `answer_id`, `user_id`, `vote`) VALUES
(1, 1, 1, 1),
(2, 0, 0, 1),
(3, 1, 1, 0),
(4, 1, 1, 0),
(5, 1, 1, 0),
(6, 1, 1, 0),
(7, 1, 1, 0),
(8, 1, 1, 0),
(9, 1, 1, 0),
(10, 1, 1, 0),
(11, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `phone_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `phone_number`, `user_name`, `district_name`) VALUES
(1, '9781702079', 'Amit', 'churu'),
(2, '9090909090', 'Sonu', 'kfshdgffs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum_answers`
--
ALTER TABLE `forum_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `forum_questions`
--
ALTER TABLE `forum_questions`
  ADD PRIMARY KEY (`forum_id`);

--
-- Indexes for table `give_on_rent`
--
ALTER TABLE `give_on_rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `upvoters`
--
ALTER TABLE `upvoters`
  ADD PRIMARY KEY (`voters_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum_answers`
--
ALTER TABLE `forum_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_questions`
--
ALTER TABLE `forum_questions`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `give_on_rent`
--
ALTER TABLE `give_on_rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upvoters`
--
ALTER TABLE `upvoters`
  MODIFY `voters_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
