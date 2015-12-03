-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2015 at 05:40 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `blogid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  `title` varchar(256) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`blogid`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blogid`, `username`, `content`, `date`, `published`, `title`, `file`) VALUES
(4, 'gaotangshen@gmail.com', 'Kobe Bryant retired.', '2015-12-03 03:58:03', 1, 'Kobe Bryant retired.', '1449111483download.jpg'),
(5, 'gaotang@charged.fm', 'SAN BERNARDINO, CALIF. â€” As many as three attackers opened fire on a holiday party for county employees Wednesday, killing at least 14 people in the deadliest mass shooting in the United States since the Sandy Hook Elementary School massacre three years ago this month.\r\n\r\nHours after the shooting, law enforcement officials said two attackers â€” a man and a woman â€” had been killed and a third suspect had been detained after fleeing from police.\r\n\r\nThe motive for the shooting remained unclear throughout the evening, but law enforcement officials said they could not rule out terrorism. The FBI has determined that one of the attackers worked at the Inland Regional Center, where the shooting occurred, according to a U.S. law enforcement official.\r\n\r\nâ€œOne of the big questions that will come up repeatedly is â€˜Is this terrorism?â€™â€‰â€ said David Bowdich, assistant director in charge of the FBIâ€™s Los Angeles field office. â€œAnd I am still not willing to say we know that for sure. We are definitely making some movements that it is a possibility .â€‰.â€‰. but we donâ€™t know that yet and weâ€™re not willing to go down that road yet.â€\r\n\r\nThe attack spawned a tense, confusing and terrifying day in Southern California as the attackers, dressed in what police called tactical gear, fled the scene in a black Ford Expedition and eluded capture for hours.', '2015-12-03 05:10:04', 1, 'Gunmen slay 14 in Calif. in deadliest mass shooting since Sandy Hook', '14491158042015-12-02T212856Z_01_TOR466_RTRIDSP_3_CALIFORNIA-SHOOTING-1321.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username_2` (`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `status`) VALUES
(6, 'gaotangshen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(18, 'gaotang@charged.fm', '827ccb0eea8a706c4c34a16891f84e7b', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
