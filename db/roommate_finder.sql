-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2015 at 05:44 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `roommate_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `preference_rating` int(11) DEFAULT NULL COMMENT 'numbers 1-5'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `value`, `preference_rating`) VALUES
(4, 1, 1, 0, 1),
(5, 1, 2, 1, NULL),
(6, 1, 3, 0, NULL),
(7, 1, 4, 1, 1),
(8, 1, 5, 2, NULL),
(9, 1, 6, 0, 3),
(10, 1, 7, 3, NULL),
(11, 1, 8, 0, 4),
(12, 1, 9, 1, NULL),
(13, 1, 10, 1, 5),
(14, 1, 11, 1, NULL),
(15, 1, 12, 1, NULL),
(16, 1, 13, 3, NULL),
(17, 1, 14, 1, NULL),
(18, 1, 15, 1, NULL),
(19, 1, 16, 0, NULL),
(20, 1, 17, 1, NULL),
(23, 1, 19, 1, NULL),
(24, 1, 20, 1, NULL),
(25, 1, 21, 1, NULL),
(26, 2, 1, 0, 1),
(27, 2, 2, 1, NULL),
(28, 2, 3, 0, NULL),
(29, 2, 4, 0, 5),
(30, 2, 5, 1, NULL),
(31, 2, 6, 0, 5),
(32, 2, 7, 3, NULL),
(33, 2, 8, 0, 1),
(34, 2, 9, 1, NULL),
(35, 2, 10, 1, 4),
(36, 2, 11, 1, NULL),
(37, 2, 12, 1, NULL),
(38, 2, 13, 2, NULL),
(39, 2, 14, 1, NULL),
(40, 2, 15, 1, NULL),
(41, 2, 16, 0, NULL),
(42, 2, 17, 0, NULL),
(43, 2, 19, 0, NULL),
(44, 2, 20, 0, NULL),
(45, 2, 18, 0, NULL),
(46, 2, 18, 1, NULL),
(47, 2, 18, 2, NULL),
(48, 2, 18, 4, NULL),
(49, 2, 18, 5, NULL),
(50, 2, 18, 6, NULL),
(51, 2, 18, 7, NULL),
(56, 1, 18, 1, NULL),
(57, 1, 18, 4, NULL),
(58, 4, 11, 1, NULL),
(59, 4, 12, 2, NULL),
(60, 4, 13, 2, NULL),
(61, 4, 14, 0, NULL),
(62, 4, 15, 1, NULL),
(63, 4, 16, 0, NULL),
(64, 4, 5, 2, NULL),
(65, 4, 6, 0, 5),
(66, 4, 7, 4, NULL),
(67, 4, 17, 0, NULL),
(68, 4, 19, 0, NULL),
(69, 4, 20, 1, NULL),
(70, 4, 8, 1, 1),
(71, 4, 9, 2, NULL),
(72, 4, 10, 0, 1),
(73, 4, 1, 0, 1),
(74, 4, 2, 1, NULL),
(75, 4, 3, 0, NULL),
(76, 4, 4, 0, 5),
(77, 3, 5, 2, NULL),
(78, 3, 6, 0, 3),
(79, 3, 7, 1, NULL),
(80, 3, 1, 0, 1),
(81, 3, 2, 1, NULL),
(82, 3, 3, 0, NULL),
(83, 3, 4, 1, 1),
(84, 3, 11, 0, NULL),
(85, 3, 12, 1, NULL),
(86, 3, 13, 2, NULL),
(87, 3, 8, 1, 1),
(88, 3, 9, 0, NULL),
(89, 3, 10, 0, 2),
(90, 3, 17, 0, NULL),
(91, 3, 19, 1, NULL),
(92, 3, 20, 0, NULL),
(93, 3, 14, 1, NULL),
(94, 3, 15, 1, NULL),
(95, 3, 16, 1, NULL),
(101, 3, 18, 0, NULL),
(102, 3, 18, 5, NULL),
(103, 3, 18, 6, NULL),
(104, 3, 18, 7, NULL),
(105, 3, 21, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `question_id` int(11) NOT NULL,
  `value_index` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `question_id`, `value_index`) VALUES
(1, 'Light', 5, 1),
(42, 'I''ve answered everything to the best of my ability', 21, 1),
(43, 'Medium', 5, 2),
(44, 'Heavy', 5, 3),
(45, 'Before 10 PM', 7, 1),
(46, '10-11PM', 7, 2),
(47, '11-12AM', 7, 3),
(48, '12-1AM', 7, 4),
(49, 'After 1AM', 7, 5),
(50, 'During the Day', 9, 1),
(51, 'In the Evening', 9, 2),
(52, 'Late at Night', 9, 3),
(53, 'Warmer', 11, 1),
(54, 'Colder', 11, 2),
(55, 'Always neat and Organized', 12, 1),
(56, 'Neat most of the time', 12, 2),
(57, 'Cluttered most of the time', 12, 3),
(58, 'Always messy and disorganized', 12, 4),
(59, 'I want TV in my room', 13, 1),
(60, 'I don''t want TV in my room', 13, 2),
(61, 'No preference, not interested in splitting costs', 13, 3),
(62, 'No preference, but willing to split costs', 13, 4),
(63, 'Often', 14, 1),
(64, 'Sometimes', 14, 2),
(65, 'Rarely', 14, 3),
(66, 'Never', 14, 4),
(67, 'I''m not comfortable sharing my belongings', 15, 1),
(68, 'I''m willing to share most things if asked first', 15, 2),
(69, 'I''m willing to share anything without restrictions', 15, 3),
(70, 'I like to talk about it', 16, 1),
(71, 'I tend to become quiet and withdrawn.', 16, 2),
(72, 'an active lifestyle', 17, 1),
(73, 'a quiet lifestyle', 17, 2),
(74, 'Alternative', 18, 1),
(75, 'Christian', 18, 2),
(76, 'Classical', 18, 3),
(77, 'Country', 18, 4),
(78, 'Hard/Metal', 18, 5),
(79, 'Rap/Hip Hop', 18, 6),
(80, 'Rock', 18, 7),
(81, 'Soft Rock/Pop', 18, 8);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `tab_id`, `type_id`, `public`) VALUES
(1, 'Do you have a medical condition that would necessitate a special housing assignment?', 1, 2, 1),
(2, 'Are you willing to share your answers to these questions with other students?', 1, 1, 1),
(3, 'Do you smoke?', 1, 1, 1),
(4, 'Can you live with someone who smokes?', 1, 2, 1),
(5, 'What kind of sleeper are you?', 2, 3, 1),
(6, 'Do you prefer to sleep with the lights on?', 2, 2, 1),
(7, 'I plan on going to sleep at:', 2, 3, 1),
(8, 'Do you prefer to study in your room?', 3, 2, 1),
(9, 'I prefer to study', 3, 3, 1),
(10, 'Do you need absolute quiet when you study?', 3, 2, 1),
(11, 'I prefer my room:', 4, 3, 1),
(12, 'I tend to keep my room and belongings:', 4, 3, 1),
(13, 'Cable TV:', 4, 3, 1),
(14, 'How often do you need alone time?', 5, 3, 1),
(15, 'How comfortable are you sharing your belongings?', 5, 3, 1),
(16, 'How do you react when something is bothering you?', 5, 3, 1),
(17, 'I prefer a roommate with:', 6, 3, 1),
(18, 'My music tastes: ', 6, 4, 1),
(19, 'Do you currently have a roommate?', 6, 1, 1),
(20, 'Are you willing to consider moving from your current room?', 6, 1, 1),
(21, 'Please read and check the box below.', 6, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE IF NOT EXISTS `question_types` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `question_types`
--

INSERT INTO `question_types` (`id`, `name`) VALUES
(1, 'yes/no'),
(2, 'yes/no with preference slider'),
(3, 'selection'),
(4, 'checkboxes');

-- --------------------------------------------------------

--
-- Table structure for table `tabs`
--

CREATE TABLE IF NOT EXISTS `tabs` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tabs`
--

INSERT INTO `tabs` (`id`, `name`) VALUES
(1, 'basics'),
(2, 'sleeping'),
(3, 'studying'),
(4, 'room'),
(5, 'personal'),
(6, 'lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `picture`, `password`, `first_name`, `last_name`, `account_type`, `email`) VALUES
(1, 'dummy.jpg', 'grover', 'Michael', 'Curtis', 'admin', 'michaelcurtis@gmail.com'),
(2, 'dummy.jpg', 'grover', 'Michael', 'Kytka', 'admin', 'michaelkytka@gmail.com'),
(3, 'dummy.jpg', 'grover', 'Zach', 'Nafziger', 'admin', 'yourmom@gmail.com'),
(4, 'dummy.jpg', 'grover', 'Josh', 'Walton', 'admin', 'joshwalton@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`,`question_id`), ADD KEY `question_id` (`question_id`), ADD KEY `value` (`value`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
 ADD PRIMARY KEY (`id`), ADD KEY `question_id` (`question_id`), ADD KEY `value_index` (`value_index`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`), ADD KEY `tab_id` (`tab_id`), ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `question_types`
--
ALTER TABLE `question_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabs`
--
ALTER TABLE `tabs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `question_types`
--
ALTER TABLE `question_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabs`
--
ALTER TABLE `tabs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
ADD CONSTRAINT `FK_answers_questions_question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_answers_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
ADD CONSTRAINT `FK_options_questions_question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `FK_questions_question_types_type_id` FOREIGN KEY (`type_id`) REFERENCES `question_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_questions_tabs_tab_id` FOREIGN KEY (`tab_id`) REFERENCES `tabs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
