-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2019 at 02:10 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neeham_twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `Follow`
--

CREATE TABLE `Follow` (
  `followID` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `following` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Liked`
--

CREATE TABLE `Liked` (
  `likeID` int(11) NOT NULL,
  `tweetID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tweet`
--

CREATE TABLE `Tweet` (
  `tweetID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tweet` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `lastLogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profilePicture` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `emailVerification` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Follow`
--
ALTER TABLE `Follow`
  ADD PRIMARY KEY (`followID`),
  ADD KEY `following` (`following`),
  ADD KEY `follower` (`follower`);

--
-- Indexes for table `Liked`
--
ALTER TABLE `Liked`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `tweetID` (`tweetID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Tweet`
--
ALTER TABLE `Tweet`
  ADD PRIMARY KEY (`tweetID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Follow`
--
ALTER TABLE `Follow`
  MODIFY `followID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `Liked`
--
ALTER TABLE `Liked`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT for table `Tweet`
--
ALTER TABLE `Tweet`
  MODIFY `tweetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Follow`
--
ALTER TABLE `Follow`
  ADD CONSTRAINT `Follow_ibfk_1` FOREIGN KEY (`follower`) REFERENCES `User` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Follow_ibfk_2` FOREIGN KEY (`following`) REFERENCES `User` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Liked`
--
ALTER TABLE `Liked`
  ADD CONSTRAINT `Liked_ibfk_1` FOREIGN KEY (`tweetID`) REFERENCES `Tweet` (`tweetID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Liked_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `Tweet`
--
ALTER TABLE `Tweet`
  ADD CONSTRAINT `Tweet_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
