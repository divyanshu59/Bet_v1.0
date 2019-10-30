-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 09:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betting`
--

-- --------------------------------------------------------

--
-- Table structure for table `1v1`
--

CREATE TABLE `1v1` (
  `id` int(11) NOT NULL,
  `sportid` int(11) NOT NULL,
  `sportname` varchar(1100) NOT NULL,
  `teamA` varchar(1100) NOT NULL,
  `teamB` varchar(1100) NOT NULL,
  `percentage` int(11) NOT NULL,
  `totalentry` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `totalCollected` int(11) NOT NULL,
  `winteam` varchar(1100) NOT NULL,
  `winteamid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1v1`
--

INSERT INTO `1v1` (`id`, `sportid`, `sportname`, `teamA`, `teamB`, `percentage`, `totalentry`, `time`, `totalCollected`, `winteam`, `winteamid`, `status`) VALUES
(1, 1, 'Football', 'TeamS8', 'TeamC', 10, 3, '2019-10-29 16:03:00', 650, 'TeamS8', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `1v1bet`
--

CREATE TABLE `1v1bet` (
  `id` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `username` varchar(1100) NOT NULL,
  `tossid` int(11) NOT NULL,
  `team` varchar(1100) NOT NULL,
  `amount` int(11) NOT NULL,
  `anoutwin` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1v1bet`
--

INSERT INTO `1v1bet` (`id`, `roomid`, `username`, `tossid`, `team`, `amount`, `anoutwin`, `status`) VALUES
(5, 26545, 'DivyanshuSah856', 1, 'TeamS8', 200, 220, 0);

-- --------------------------------------------------------

--
-- Table structure for table `2v2`
--

CREATE TABLE `2v2` (
  `id` int(11) NOT NULL,
  `sportid` int(11) NOT NULL,
  `sportname` varchar(1100) NOT NULL,
  `teamA` varchar(1100) NOT NULL,
  `teamB` varchar(1100) NOT NULL,
  `percentage` int(11) NOT NULL,
  `totalentry` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `totalCollected` int(11) NOT NULL,
  `winteam` varchar(1100) NOT NULL,
  `winteamid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2v2`
--

INSERT INTO `2v2` (`id`, `sportid`, `sportname`, `teamA`, `teamB`, `percentage`, `totalentry`, `time`, `totalCollected`, `winteam`, `winteamid`, `status`) VALUES
(1, 1, 'Football', 'TeamS8', 'TeamC', 57, 2, '2019-10-29 12:23:00', 800, 'TeamC', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `2v2bet`
--

CREATE TABLE `2v2bet` (
  `id` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `username` varchar(1100) NOT NULL,
  `tossid` int(11) NOT NULL,
  `team` varchar(1100) NOT NULL,
  `amount` int(11) NOT NULL,
  `anoutwin` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2v2bet`
--

INSERT INTO `2v2bet` (`id`, `roomid`, `username`, `tossid`, `team`, `amount`, `anoutwin`, `status`) VALUES
(3, 14324, 'DivyanshuSah856', 1, 'TeamC', 400, 628, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(1100) NOT NULL,
  `password` varchar(1100) NOT NULL,
  `name` varchar(1100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `status`) VALUES
(1, 'admin@bilwg.com', 'qwerty', 'Divyanshu Sah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `multiplayer`
--

CREATE TABLE `multiplayer` (
  `id` int(11) NOT NULL,
  `sportid` int(11) NOT NULL,
  `sportname` varchar(1100) NOT NULL,
  `teamA` varchar(1100) NOT NULL,
  `teamB` varchar(1100) NOT NULL,
  `percentage` int(11) NOT NULL,
  `totalentry` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `totalCollected` int(11) NOT NULL,
  `winteam` varchar(1100) NOT NULL,
  `winteamid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multiplayer`
--

INSERT INTO `multiplayer` (`id`, `sportid`, `sportname`, `teamA`, `teamB`, `percentage`, `totalentry`, `time`, `totalCollected`, `winteam`, `winteamid`, `status`) VALUES
(1, 1, 'Football', 'TeamC', 'TeamS8', 40, 1, '2019-10-30 14:32:00', 10, 'TeamC', 0, 0),
(2, 1, 'Football', 'TeamC', 'TeamS8', 40, 0, '2019-10-30 14:32:00', 0, '', 0, 1),
(3, 1, 'Football', 'TeamC', 'TeamC', 40, 0, '2019-10-31 14:03:00', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `multiplayerbet`
--

CREATE TABLE `multiplayerbet` (
  `id` int(11) NOT NULL,
  `username` varchar(1100) NOT NULL,
  `tossid` int(11) NOT NULL,
  `team` varchar(1100) NOT NULL,
  `amount` int(11) NOT NULL,
  `anoutwin` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multiplayerbet`
--

INSERT INTO `multiplayerbet` (`id`, `username`, `tossid`, `team`, `amount`, `anoutwin`, `status`) VALUES
(2, 'DivyanshuSah856', 1, 'TeamC', 10, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `bettype` int(11) NOT NULL,
  `totalperson` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `personuname` varchar(1100) NOT NULL,
  `amount` int(11) NOT NULL,
  `joined` int(11) NOT NULL,
  `team` varchar(1100) NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `bettype`, `totalperson`, `gameid`, `personuname`, `amount`, `joined`, `team`, `percentage`, `status`) VALUES
(14324, 2, 4, 1, 'DivyanshuSah856,DivyanshuSah856,DivyanshuSah856,DivyanshuSah856', 400, 4, 'TeamC', 57, 1),
(26545, 1, 2, 1, 'DivyanshuSah856,DivyanshuSah856', 200, 2, 'TeamS8', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id` int(11) NOT NULL,
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id`, `text`) VALUES
(1, '<h2>Rules And Regulation Page</h2>');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `sportid` int(11) NOT NULL,
  `sportname` varchar(1100) NOT NULL,
  `teamA` varchar(1100) NOT NULL,
  `teamB` varchar(1100) NOT NULL,
  `percentage` int(11) NOT NULL,
  `totalentry` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `totalCollected` int(11) NOT NULL,
  `winteam` varchar(1100) NOT NULL,
  `winteamid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `sportid`, `sportname`, `teamA`, `teamB`, `percentage`, `totalentry`, `time`, `totalCollected`, `winteam`, `winteamid`, `status`) VALUES
(1, 1, 'Football', 'TeamS8', 'TeamC', 2, 0, '2019-10-29 12:35:00', 0, '', 0, 1),
(2, 1, 'Football', 'TeamS8', 'TeamC', 40, 2, '2019-10-30 00:34:00', 155, 'TeamC', 0, 0),
(3, 1, 'Football', 'TeamC', 'TeamS8', 12, 0, '2019-10-30 14:13:00', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scorebet`
--

CREATE TABLE `scorebet` (
  `id` int(11) NOT NULL,
  `username` varchar(1100) NOT NULL,
  `tossid` int(11) NOT NULL,
  `team` varchar(1100) NOT NULL,
  `score` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `anoutwin` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scorebet`
--

INSERT INTO `scorebet` (`id`, `username`, `tossid`, `team`, `score`, `amount`, `anoutwin`, `status`) VALUES
(8, 'DivyanshuSah856', 2, 'TeamC', 324, 100, 140, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `name` varchar(1100) NOT NULL,
  `type` varchar(1100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `name`, `type`, `status`) VALUES
(1, 'Football', 'TEAM', 1),
(2, 'Tennis', 'TEAM', 1),
(3, 'divyan', 'TEAM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(1100) NOT NULL,
  `sportid` varchar(1100) NOT NULL,
  `sportname` varchar(1100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `sportid`, `sportname`, `status`) VALUES
(1, 'TeamS8', '1', 'Football', 1),
(2, 'TeamC', '1', 'Football', 1),
(4, 'divyananshu', '3', 'divyan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `toss`
--

CREATE TABLE `toss` (
  `id` int(11) NOT NULL,
  `sportid` int(11) NOT NULL,
  `sportname` varchar(1100) NOT NULL,
  `teamA` varchar(1100) NOT NULL,
  `teamB` varchar(1100) NOT NULL,
  `percentage` int(11) NOT NULL,
  `totalentry` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `totalCollected` int(11) NOT NULL,
  `winteam` varchar(1100) NOT NULL,
  `winteamid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toss`
--

INSERT INTO `toss` (`id`, `sportid`, `sportname`, `teamA`, `teamB`, `percentage`, `totalentry`, `time`, `totalCollected`, `winteam`, `winteamid`, `status`) VALUES
(1, 1, 'Football', 'TeamS8', 'TeamC', 50, 2, '2019-11-20 00:00:00', 1400, 'TeamS8', 0, 0),
(2, 1, 'Football', 'TeamC', 'TeamS8', 10, 0, '2019-10-29 12:00:00', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tossbet`
--

CREATE TABLE `tossbet` (
  `id` int(11) NOT NULL,
  `username` varchar(1100) NOT NULL,
  `tossid` int(11) NOT NULL,
  `team` varchar(1100) NOT NULL,
  `amount` int(11) NOT NULL,
  `anoutwin` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tossbet`
--

INSERT INTO `tossbet` (`id`, `username`, `tossid`, `team`, `amount`, `anoutwin`, `status`) VALUES
(3, 'DivyanshuSah856', 1, 'TeamS8', 1200, 1800, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(1100) NOT NULL,
  `username` varchar(1100) NOT NULL,
  `email` varchar(1100) NOT NULL,
  `password` varchar(1100) NOT NULL,
  `phone` varchar(1100) NOT NULL,
  `credits` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `phone`, `credits`, `status`) VALUES
(1, 'divyananshu', 'DivyanshuSah856', 'divyanshu.14@gmail.com', 'qwerty', '9410335478', 440, 1),
(2, 'fgdfgd', 'fgdfgd16975', '', 'qwerty', '', 3423, 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `username` varchar(1100) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `username`, `amount`, `time`, `status`) VALUES
(1, 'DivyanshuSah856', 100, '2019-10-30 01:12:25', -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1v1`
--
ALTER TABLE `1v1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `1v1bet`
--
ALTER TABLE `1v1bet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2v2`
--
ALTER TABLE `2v2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2v2bet`
--
ALTER TABLE `2v2bet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiplayer`
--
ALTER TABLE `multiplayer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiplayerbet`
--
ALTER TABLE `multiplayerbet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scorebet`
--
ALTER TABLE `scorebet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toss`
--
ALTER TABLE `toss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tossbet`
--
ALTER TABLE `tossbet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1v1`
--
ALTER TABLE `1v1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `1v1bet`
--
ALTER TABLE `1v1bet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `2v2`
--
ALTER TABLE `2v2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `2v2bet`
--
ALTER TABLE `2v2bet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `multiplayer`
--
ALTER TABLE `multiplayer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `multiplayerbet`
--
ALTER TABLE `multiplayerbet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89919;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scorebet`
--
ALTER TABLE `scorebet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `toss`
--
ALTER TABLE `toss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tossbet`
--
ALTER TABLE `tossbet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
