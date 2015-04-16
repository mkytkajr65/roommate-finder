-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 16, 2015 at 09:05 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `roommate_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `preference_rating` int(11) DEFAULT NULL COMMENT 'numbers 1-5'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `value`, `preference_rating`) VALUES
(1, 1, 4, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `question_id`) VALUES
(1, 'Light', 5),
(42, 'I''ve answered everything to the best of my ability', 21),
(43, 'Medium', 5),
(44, 'Heavy', 5),
(45, 'Before 10 PM', 7),
(46, '10-11PM', 7),
(47, '11-12AM', 7),
(48, '12-1AM', 7),
(49, 'After 1AM', 7),
(50, 'During the Day', 9),
(51, 'In the Evening', 9),
(52, 'Late at Night', 9),
(53, 'Warmer', 11),
(54, 'Colder', 11),
(55, 'Always neat and Organized', 12),
(56, 'Neat most of the time', 12),
(57, 'Cluttered most of the time', 12),
(58, 'Always messy and disorganized', 12),
(59, 'I want TV in my room', 13),
(60, 'I don''t want TV in my room', 13),
(61, 'No preference, not interested in splitting costs', 13),
(62, 'No preference, but willing to split costs', 13),
(63, 'Often', 14),
(64, 'Sometimes', 14),
(65, 'Rarely', 14),
(66, 'Never', 14),
(67, 'I''m not comfortable sharing my belongings', 15),
(68, 'I''m willing to share most things if asked first', 15),
(69, 'I''m willing to share anything without restrictions', 15),
(70, 'I like to talk about it', 16),
(71, 'I tend to become quiet and withdrawn.', 16),
(72, 'an active lifestyle', 17),
(73, 'a quiet lifestyle', 17),
(74, 'Alternative', 18),
(75, 'Christian', 18),
(76, 'Classical', 18),
(77, 'Country', 18),
(78, 'Hard/Metal', 18),
(79, 'Rap/Hip Hop', 18),
(80, 'Rock', 18),
(81, 'Soft Rock/Pop', 18);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
`id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `tab_id`, `type_id`) VALUES
(1, 'Do you have a medical condition that would necessitate a special housing assignment?', 1, 2),
(2, 'Are you willing to share your answers to these questions with other students?', 1, 1),
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
(18, 'My music tastes: ', 6, 4),
(19, 'Do you currently have a roommate?', 6, 1),
(20, 'Are you willing to consider moving from your current room?', 6, 1),
(21, 'Please read and check the box below.', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE `question_types` (
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

CREATE TABLE `tabs` (
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

CREATE TABLE `user` (
`id` int(11) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `picture`, `password`, `first_name`, `last_name`, `account_type`, `email`) VALUES
(1, 'dummy.jpg', 'grover', 'Michael', 'Curtis', 'admin', 'michaelcurtis@gmail.com');

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
 ADD PRIMARY KEY (`id`), ADD KEY `question_id` (`question_id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
