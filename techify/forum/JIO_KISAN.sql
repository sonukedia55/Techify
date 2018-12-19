-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2018 at 02:19 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `JIO_KISAN`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_answers`
--

CREATE TABLE `forum_answers` (
  `answer_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upvote_count` int(11) NOT NULL,
  `downvote_count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_answers`
--

INSERT INTO `forum_answers` (`answer_id`, `forum_id`, `answer`, `upvote_count`, `downvote_count`) VALUES
(1, 1, 'lul', 13, 7),
(2, 2, 'haha', 1, 1),
(3, 1, 'xsacxsac', 6, 6),
(4, 1, 'answer is this', 0, 1),
(5, 1, 'bhbjbdqxo', 0, 0),
(6, 1, 'nxshauxbajsa', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum_questions`
--

CREATE TABLE `forum_questions` (
  `forum_id` int(11) NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `questions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_questions`
--

INSERT INTO `forum_questions` (`forum_id`, `user_id`, `questions`, `time`) VALUES
(1, '1', 'asdgff', '2018-12-19 01:35:08'),
(2, '2', 'hffgdg', '2018-12-19 01:35:08'),
(3, '1', 'abxsagcaysjaxasc?', '2018-12-19 07:35:00'),
(5, '1', 'dasdewedecd', '2018-12-19 07:35:33'),
(7, '1', 'ques?', '2018-12-19 07:37:40'),
(8, '1', 'dad', '2018-12-19 07:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `give_on_rent`
--

CREATE TABLE `give_on_rent` (
  `rent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_pic_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `taker_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions_tag`
--

CREATE TABLE `questions_tag` (
  `forum_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upvoters`
--

CREATE TABLE `upvoters` (
  `voters_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upvoters`
--

INSERT INTO `upvoters` (`voters_id`, `answer_id`, `user_id`, `vote`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2),
(3, 3, 1, 2),
(4, 2, 1, 1),
(5, 4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `phone_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `phone_number`, `user_name`, `district_name`) VALUES
(1, '9781702079', 'Amit', 'churu'),
(2, '9781702080', 'Sonu', 'kfshdgffs');

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
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `forum_questions`
--
ALTER TABLE `forum_questions`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `give_on_rent`
--
ALTER TABLE `give_on_rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upvoters`
--
ALTER TABLE `upvoters`
  MODIFY `voters_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
