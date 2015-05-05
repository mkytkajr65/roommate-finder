-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 05, 2015 at 06:23 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `value`, `preference_rating`) VALUES
(1, 444023, 1, 0, 1),
(2, 444023, 3, 0, NULL),
(3, 444023, 4, 0, 1),
(4, 444023, 5, 0, NULL),
(5, 444023, 6, 0, 1),
(6, 444023, 7, 1, NULL),
(7, 444023, 11, 0, NULL),
(8, 444023, 12, 0, NULL),
(9, 444023, 13, 0, NULL),
(10, 444023, 8, 0, 1),
(11, 444023, 9, 0, NULL),
(12, 444023, 10, 0, 1),
(13, 444023, 14, 0, NULL),
(14, 444023, 15, 0, NULL),
(15, 444023, 16, 0, NULL),
(16, 444023, 17, 0, NULL),
(17, 452071, 1, 0, 1),
(18, 452071, 3, 0, NULL),
(19, 452071, 4, 0, 1),
(20, 452071, 5, 0, NULL),
(21, 452071, 6, 0, 1),
(22, 452071, 7, 0, NULL),
(23, 452071, 8, 0, 1),
(24, 452071, 9, 0, NULL),
(25, 452071, 10, 0, 1),
(26, 452071, 11, 0, NULL),
(27, 452071, 12, 0, NULL),
(28, 452071, 13, 0, NULL),
(29, 452071, 14, 0, NULL),
(30, 452071, 15, 0, NULL),
(31, 452071, 16, 0, NULL),
(32, 452071, 17, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `question_id` int(11) NOT NULL,
  `value_index` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `question_id`, `value_index`) VALUES
(1, 'Light', 5, 1),
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
(81, 'Soft Rock/Pop', 18, 8),
(82, 'EDM', 18, 9);

-- --------------------------------------------------------

--
-- Table structure for table `public_answer`
--

CREATE TABLE IF NOT EXISTS `public_answer` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `public_answer`
--

INSERT INTO `public_answer` (`id`, `user_id`, `value`) VALUES
(1, 444023, 1),
(2, 452071, 1);

-- --------------------------------------------------------

--
-- Table structure for table `public_question`
--

CREATE TABLE IF NOT EXISTS `public_question` (
`id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `public_question`
--

INSERT INTO `public_question` (`id`, `question`) VALUES
(1, 'Are you willing to share your answers to these questions with other students?');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `tab_id`, `type_id`) VALUES
(1, 'Do you have a medical condition that would necessitate a special housing assignment?', 1, 2),
(3, 'Do you smoke?', 1, 1),
(4, 'Can you live with someone who smokes?', 1, 2),
(5, 'What kind of sleeper are you?', 2, 3),
(6, 'Do you prefer to sleep with the lights on?', 2, 2),
(7, 'I plan on going to sleep at:', 2, 3),
(8, 'Do you prefer to study in your room?', 3, 2),
(9, 'I prefer to study', 3, 3),
(10, 'Do you need absolute quiet when you study?', 3, 2),
(11, 'I prefer my room:', 4, 3),
(12, 'I tend to keep my room and belongings:', 4, 3),
(13, 'Cable TV:', 4, 3),
(14, 'How often do you need alone time?', 5, 3),
(15, 'How comfortable are you sharing your belongings?', 5, 3),
(16, 'How do you react when something is bothering you?', 5, 3),
(17, 'I prefer a roommate with:', 6, 3),
(18, 'My music tastes:', 6, 4);

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
  `password` varchar(64) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `account_type` varchar(20) NOT NULL COMMENT 'if administrative account, account_type = admin',
  `email` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `public` tinyint(4) NOT NULL DEFAULT '1',
  `gender` int(11) NOT NULL COMMENT '0 = female 1 = male',
  `status` smallint(6) NOT NULL COMMENT '0 = new student, 1 = current student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `first_name`, `last_name`, `account_type`, `email`, `facebook`, `public`, `gender`, `status`) VALUES
(444023, 'grover', 'Michael', 'Kytka', 'admin', 'kytkama1@gcc.edu', '', 1, 1, 0),
(452071, 'grover', 'Zach', 'Nafziger', '', 'zn@gcc.edu', 'https://www.facebook.com/PittNomad?fref=ts', 1, 1, 0);

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
-- Indexes for table `public_answer`
--
ALTER TABLE `public_answer`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `public_question`
--
ALTER TABLE `public_question`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `public_answer`
--
ALTER TABLE `public_answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `public_question`
--
ALTER TABLE `public_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
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
-- Constraints for table `public_answer`
--
ALTER TABLE `public_answer`
ADD CONSTRAINT `FK_public_answer_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `FK_questions_question_types_type_id` FOREIGN KEY (`type_id`) REFERENCES `question_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_questions_tabs_tab_id` FOREIGN KEY (`tab_id`) REFERENCES `tabs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
