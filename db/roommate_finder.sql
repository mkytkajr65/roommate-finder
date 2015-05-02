-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 02, 2015 at 09:45 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=559 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `value`, `preference_rating`) VALUES
(4, 1, 1, 0, 1),
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
(26, 2, 1, 1, 2),
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
(70, 4, 8, 1, 1),
(71, 4, 9, 2, NULL),
(72, 4, 10, 0, 1),
(73, 4, 1, 0, 1),
(75, 4, 3, 0, NULL),
(76, 4, 4, 0, 5),
(77, 3, 5, 2, NULL),
(78, 3, 6, 0, 3),
(79, 3, 7, 1, NULL),
(80, 3, 1, 0, 1),
(82, 3, 3, 0, NULL),
(83, 3, 4, 1, 1),
(84, 3, 11, 0, NULL),
(85, 3, 12, 1, NULL),
(86, 3, 13, 2, NULL),
(87, 3, 8, 1, 1),
(88, 3, 9, 0, NULL),
(89, 3, 10, 0, 2),
(90, 3, 17, 0, NULL),
(93, 3, 14, 1, NULL),
(94, 3, 15, 1, NULL),
(95, 3, 16, 1, NULL),
(113, 3, 18, 0, NULL),
(114, 3, 18, 5, NULL),
(115, 3, 18, 6, NULL),
(116, 3, 18, 7, NULL),
(132, 5, 5, 1, NULL),
(133, 5, 6, 0, 4),
(134, 5, 7, 3, NULL),
(135, 5, 8, 0, 5),
(136, 5, 9, 1, NULL),
(137, 5, 10, 0, 1),
(138, 5, 1, 0, 1),
(140, 5, 3, 1, NULL),
(141, 5, 4, 1, 1),
(142, 5, 11, 0, NULL),
(143, 5, 12, 2, NULL),
(144, 5, 13, 2, NULL),
(145, 5, 14, 2, NULL),
(146, 5, 15, 1, NULL),
(147, 5, 16, 1, NULL),
(148, 5, 17, 0, NULL),
(153, 6, 8, 0, 5),
(154, 6, 9, 2, NULL),
(155, 6, 10, 0, 1),
(156, 6, 5, 1, NULL),
(157, 6, 6, 0, 2),
(158, 6, 7, 3, NULL),
(159, 6, 1, 0, 5),
(161, 6, 3, 1, NULL),
(162, 6, 4, 1, 3),
(163, 6, 11, 1, NULL),
(164, 6, 12, 1, NULL),
(165, 6, 13, 2, NULL),
(166, 6, 17, 0, NULL),
(169, 6, 14, 2, NULL),
(170, 6, 15, 2, NULL),
(171, 6, 16, 0, NULL),
(172, 6, 18, 5, NULL),
(173, 7, 1, 0, 1),
(175, 7, 3, 0, NULL),
(176, 7, 4, 1, 1),
(177, 7, 8, 1, 4),
(178, 7, 9, 1, NULL),
(179, 7, 10, 0, 1),
(180, 7, 11, 0, NULL),
(181, 7, 12, 1, NULL),
(182, 7, 13, 3, NULL),
(183, 7, 5, 1, NULL),
(184, 7, 6, 0, 1),
(185, 7, 7, 4, NULL),
(186, 7, 14, 0, NULL),
(187, 7, 15, 1, NULL),
(188, 7, 16, 0, NULL),
(189, 7, 17, 0, NULL),
(190, 7, 18, 0, NULL),
(191, 7, 18, 1, NULL),
(192, 7, 18, 3, NULL),
(193, 7, 18, 6, NULL),
(196, 8, 1, 0, 1),
(198, 8, 3, 0, NULL),
(199, 8, 4, 1, 1),
(200, 8, 5, 2, NULL),
(201, 8, 6, 0, 1),
(202, 8, 7, 2, NULL),
(203, 8, 8, 0, 1),
(204, 8, 9, 0, NULL),
(205, 8, 10, 0, 1),
(206, 8, 11, 1, NULL),
(207, 8, 12, 1, NULL),
(208, 8, 13, 2, NULL),
(209, 8, 14, 2, NULL),
(210, 8, 15, 1, NULL),
(211, 8, 16, 0, NULL),
(212, 8, 17, 0, NULL),
(216, 8, 18, 5, NULL),
(525, 2, 18, 0, NULL),
(526, 2, 18, 1, NULL),
(527, 2, 18, 2, NULL),
(528, 2, 18, 4, NULL),
(529, 2, 18, 5, NULL),
(530, 2, 18, 6, NULL),
(531, 2, 18, 7, NULL),
(532, 5, 18, 0, NULL),
(533, 5, 18, 6, NULL),
(534, 9, 1, 0, 1),
(535, 9, 3, 0, NULL),
(536, 9, 4, 0, 3),
(537, 9, 5, 1, NULL),
(538, 9, 6, 0, 5),
(539, 9, 7, 3, NULL),
(540, 9, 8, 0, 2),
(541, 9, 9, 1, NULL),
(542, 9, 10, 1, 5),
(543, 9, 11, 1, NULL),
(544, 9, 12, 0, NULL),
(545, 9, 13, 2, NULL),
(546, 9, 14, 1, NULL),
(547, 9, 15, 1, NULL),
(548, 9, 16, 0, NULL),
(549, 9, 17, 0, NULL),
(552, 9, 18, 0, NULL),
(553, 9, 18, 1, NULL),
(554, 9, 18, 2, NULL),
(555, 9, 18, 4, NULL),
(556, 9, 18, 5, NULL),
(557, 9, 18, 6, NULL),
(558, 9, 18, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
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
-- Table structure for table `public_answer`
--

CREATE TABLE `public_answer` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `public_answer`
--

INSERT INTO `public_answer` (`id`, `user_id`, `value`) VALUES
(1, 1, 1),
(3, 2, 1),
(4, 3, 1),
(5, 4, 1),
(6, 5, 0),
(7, 6, 1),
(8, 7, 1),
(9, 8, 1),
(10, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `public_question`
--

CREATE TABLE `public_question` (
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

CREATE TABLE `questions` (
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
(18, 'My music tastes: ', 6, 4);

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
  `email` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL DEFAULT 'https://www.facebook.com/yourusername',
  `public` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `picture`, `password`, `first_name`, `last_name`, `account_type`, `email`, `facebook`, `public`) VALUES
(1, 'dummy.jpg', 'grover', 'Michael', 'Curtis', 'admin', 'michaelcurtis@gmail.com', '', 1),
(2, 'dummy.jpg', 'grover', 'Michael', 'Kytka', 'admin', 'michaelkytka@gmail.com', '', 1),
(3, 'dummy.jpg', 'grover', 'Zach', 'Nafziger', 'admin', 'yourmom@gmail.com', 'https://www.facebook.com/znafziger', 1),
(4, 'dummy.jpg', 'grover', 'Josh', 'Walton', 'admin', 'joshwalton@gmail.com', '', 1),
(5, 'dummy.jpg', 'grover', 'Tyler', 'Depew', '', 'tylerdepew@gmail.com', 'https://www.facebook.com', 1),
(6, 'dummy.jpg', 'grover', 'Sean', 'Oriordan', '', 'seanoriordan@gmail.com', 'https://www.facebook.com', 1),
(7, 'dummy.jpg', 'grover', 'Ryan', 'Duran', '', 'ryanduran@gmail.com', 'https://www.facebook.com', 1),
(8, 'dummy.jpg', 'grover', 'James', 'Payne', '', 'jamespayne@gmail.com', 'https://www.facebook.com', 1),
(9, 'dummy.jpg', 'grover', 'Michael', 'Kitkat', '', 'kytka@gmail.com', 'https://www.facebook.com', 1);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=559;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `public_answer`
--
ALTER TABLE `public_answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
