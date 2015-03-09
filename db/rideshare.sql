-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2015 at 05:20 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rideshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE IF NOT EXISTS `riders` (
  `tripid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `vehicletyp` varchar(20) NOT NULL,
  `days` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`tripid`, `userid`, `vehicle`, `vehicletyp`, `days`) VALUES
(40, 12, 'Santro', '4', 70),
(40, 13, 'Sumo', '4', 2),
(40, 14, 'Lunar', '4', 8),
(42, 13, 'Scooty', '2', 0),
(44, 12, 'Verna', '4', 136),
(45, 13, 'Verna', '4', 140);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
`tripid` int(11) NOT NULL,
  `source` varchar(200) NOT NULL,
  `slat` float(10,6) NOT NULL,
  `slong` float(10,6) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `dlat` float(10,6) NOT NULL,
  `dlong` float(10,6) NOT NULL,
  `time` time NOT NULL,
  `days` int(128) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`tripid`, `source`, `slat`, `slong`, `destination`, `dlat`, `dlong`, `time`, `days`, `userid`, `date`) VALUES
(40, 'HITEC City, Hyderabad, Telangana, India', 17.447412, 78.376228, 'Punjagutta, Hyderabad, Telangana, India', 17.426498, 78.451134, '12:30:00', 126, 12, NULL),
(42, 'HITEC City, Hyderabad, Telangana, India', 17.447412, 78.376228, 'Punjagutta, Hyderabad, Telangana, India', 17.426498, 78.451134, '04:02:00', 0, 13, '2015-07-03'),
(44, 'HITEC City, Hyderabad, Telangana, India', 17.447412, 78.376228, 'Punjagutta, Hyderabad, Telangana, India', 17.426498, 78.451134, '12:30:00', 136, 12, NULL),
(45, 'HITEC City, Hyderabad, Telangana, India', 17.447412, 78.376228, 'Punjagutta, Hyderabad, Telangana, India', 17.426498, 78.451134, '12:30:00', 140, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `password`, `email`, `phone`) VALUES
(12, 'Rahul Huilgol', '6512bd43d9caa6e02c990b0a82652dca', 'rahulhuilgol@gmail.com', '8011253353'),
(13, 'R', '6512bd43d9caa6e02c990b0a82652dca', 'h.rahul@iitg.ernet.in', '8011240322'),
(14, 'H', '6512bd43d9caa6e02c990b0a82652dca', 'h@m.com', '80112477575');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
 ADD PRIMARY KEY (`tripid`,`userid`), ADD KEY `tripid` (`tripid`), ADD KEY `userid` (`userid`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
 ADD PRIMARY KEY (`tripid`), ADD KEY `startbyfindex` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userid`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
MODIFY `tripid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `riders`
--
ALTER TABLE `riders`
ADD CONSTRAINT `riders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `riders_ibfk_2` FOREIGN KEY (`tripid`) REFERENCES `trips` (`tripid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
