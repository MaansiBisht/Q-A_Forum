-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2018 at 04:18 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qus_ans_forumdb`
--
CREATE DATABASE IF NOT EXISTS `qus_ans_forumdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `qus_ans_forumdb`;

-- --------------------------------------------------------

--
-- Table structure for table `qus_ans`
--

CREATE TABLE IF NOT EXISTS `qus_ans` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) DEFAULT NULL,
  `ans_desc` text NOT NULL,
  `ans_date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='this table keep all answers of qus_mst' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `qus_ans`
--

INSERT INTO `qus_ans` (`ans_id`, `q_id`, `ans_desc`, `ans_date_time`, `user_id`) VALUES
(3, 3, 'testing of asner of question id 3 as anup', '2018-07-14 07:36:27', 1),
(4, 5, 'as as ravi', '2018-07-14 07:37:20', 7),
(5, 3, 'salkdfjsadklalkj', '2018-07-14 07:49:16', 7);

-- --------------------------------------------------------

--
-- Table structure for table `qus_mst`
--

CREATE TABLE IF NOT EXISTS `qus_mst` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_title` varchar(250) DEFAULT NULL,
  `q_desc` text NOT NULL,
  `q_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `q_tags` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='this table keeps all ques' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `qus_mst`
--

INSERT INTO `qus_mst` (`q_id`, `q_title`, `q_desc`, `q_date_time`, `q_tags`, `user_id`) VALUES
(1, 'What is mysql?', 'Please tell me in detail about mysql', '2018-07-08 05:11:50', 'mysql, database , opensource database', 0),
(3, 'What is PHP?', 'tell me about php', '2018-07-08 05:13:35', 'php, server side scripting lang', 7),
(4, 'What is mysql?', 'asldkfj', '2018-07-14 04:48:02', 'lkjsdf', 0),
(5, 'asdkljfskl', 'lakjsdf', '2018-07-14 05:47:40', 'ljasdf', 7),
(6, 'asdkljfskl', 'lakjsdf', '2018-07-14 05:47:58', 'ljasdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `uname` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` varchar(15) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='this table will keep all users' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `uname`, `password`, `type`, `status`) VALUES
(1, 'Anup', 'admin', 'admin@123', 'admin', 1),
(5, 'anup', 'anup', 'admin@123', 'user', 0),
(6, 'anup', 'asdfj', '123', 'user', 0),
(7, 'ravi', 'ravi', 'ravi@123', 'user', 1),
(8, 'zysdf', 'lkajsdf', 'lkjasdf', 'user', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
