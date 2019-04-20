-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2019 at 01:47 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `askme`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(40) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `lang` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `user_name`, `userid`, `url`, `lang`, `time`) VALUES
(1, 1, 'Tamilarasan', 'tamil205054@gmail.com', 'github.com/tamil205054/guvikcode/new/master.py', 'python', '2019-04-19 08:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `contect`
--

DROP TABLE IF EXISTS `contect`;
CREATE TABLE IF NOT EXISTS `contect` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `githup` varchar(30) NOT NULL,
  `whatsapp` varchar(10) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedlin` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contect`
--

INSERT INTO `contect` (`cid`, `username`, `githup`, `whatsapp`, `facebook`, `twitter`, `linkedlin`, `instagram`) VALUES
(1, 'balajidon8344@gmail.com', '', '', '', '', '', ''),
(2, 'tamil205054@gmail.com', '', '9080357318', '', '', '  ', ''),
(3, 'cdeepakkumar.dk11@gmail.com', '', '9080200177', '', '', '  ', '');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `registerno` varchar(30) NOT NULL,
  `collegename` varchar(300) NOT NULL,
  `degree` varchar(30) NOT NULL,
  `department` varchar(100) NOT NULL,
  `language` varchar(300) NOT NULL,
  `skills` varchar(120) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`eid`, `username`, `registerno`, `collegename`, `degree`, `department`, `language`, `skills`) VALUES
(1, 'tamil205054@gmail.com', '730916205054', 'Excel Engineerinng College', 'B.Tech', 'Information Technology', 'tamil,english', 'java'),
(2, 'balajidon8344@gmail.com', '', '', '', '', '', ''),
(3, 'cdeepakkumar.dk11@gmail.com', '730916205011', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

DROP TABLE IF EXISTS `personal_details`;
CREATE TABLE IF NOT EXISTS `personal_details` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`pid`, `username`, `gender`, `state`) VALUES
(1, 'balajidon8344@gmail.com', 'male', 'Tamil Nadu'),
(2, 'tamil205054@gmail.com', 'male', 'tamil nadu'),
(3, 'cdeepakkumar.dk11@gmail.com', 'male', 'Tamil Nadu'),
(4, 'ranjithdon03@gmail.com', 'male', 'Tamil Nadu');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `userid` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answer_count` int(40) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `userid`, `time`, `answer_count`) VALUES
(1, ' Check whether a number is positive or negative or zero.', 'tamil205054@gmail.com', '2019-04-19 05:36:10', 1),
(2, 'Check whether a number is even or odd. \nIf the input is not valid print invalid.', 'tamil205054@gmail.com', '2019-04-19 05:36:53', 0),
(3, 'Check whether a character is vowel or consonant.\nPrint invalid if the input is invalid.', 'tamil205054@gmail.com', '2019-04-19 05:37:25', 0),
(4, 'Check whether a character is an alphabet or not. (Print \'Alphabet\' or \'No\').', 'tamil205054@gmail.com', '2019-04-19 05:40:40', 0),
(5, 'Find the largest number among three numbers entered by user.', 'tamil205054@gmail.com', '2019-04-19 05:41:41', 0),
(6, 'Check whether the year is a leap year or not.', 'tamil205054@gmail.com', '2019-04-19 05:45:18', 0),
(7, 'Write a program to print \'Hello\' word N times given N.', 'tamil205054@gmail.com', '2019-04-19 05:46:49', 0),
(8, 'Calculate sum of natural numbers upto N.', 'tamil205054@gmail.com', '2019-04-19 05:47:35', 0),
(9, 'Given 2 numbers N,K and an array of N integers, find the sum of the first \'K\' integers.', 'tamil205054@gmail.com', '2019-04-19 05:48:44', 0),
(10, 'Count number of digits of an integer.', 'tamil205054@gmail.com', '2019-04-19 05:49:12', 0),
(11, 'calculate the power of a number N with given exponent(k) ', 'cdeepakkumar.dk11@gmail.com', '2019-04-19 06:41:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) NOT NULL,
  `first` varchar(200) NOT NULL,
  `last` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `user`, `first`, `last`, `pass`, `city`, `phone`) VALUES
(1, 'tamil205054@gmail.com', 'tamilarasan', 'nallairusun', '205054', 'salem', '9080357318'),
(2, 'cdeepakkumar.dk11@gmail.com', 'deepak', 'kumar', '12345', 'Bhavani', '9080200177'),
(3, 'balajidon8344@gmail.com', 'balaji', 'v', '12345', 'thirupur', '9087652301'),
(4, 'ranjithdon03@gmail.com', 'ranjith', 'kumar', '205054', 'erode', '9876543210');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
