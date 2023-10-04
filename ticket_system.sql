-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 12:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `password`) VALUES
('hoppe28', '489ef9a1549d3325a8e27a3cdcbb6c31');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `phone`, `email`, `location`) VALUES
(1, 'Fred', 'Jones', '414-555-2341', 'fredjones@yahoo.com', 'Coolsville'),
(2, 'Norville', 'Rogers', '262-445-3498', 'shaggy123@gmail.com', 'Coolsville'),
(3, 'Josh', 'Nichols', '785-324-7894', 'joshyboi@gmail.com', 'San Diego'),
(4, 'Drake', 'Parker', '473-474-8993', 'drakeparker@hotmail.com', 'San Diego'),
(5, 'Ned', 'Bigby', '374-189-4878', 'bigbee@gmail.com', 'Santa Clarita'),
(6, 'Simon', 'Cook', '678-289-9981', 'pcookie@yahoo.com', 'Santa Clarita'),
(7, 'Cody', 'Martin', '273-474-2788', 'cmartin@gmail.com', 'Boston'),
(8, 'Zack', 'Martin', '373-589-9947', 'zmartin@gmail.com', 'Boston');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventNum` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `ticketNum` int(11) DEFAULT NULL,
  `adminID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventNum`, `type`, `timestamp`, `description`, `ticketNum`, `adminID`) VALUES
(1, 'Customer Email', '2023-04-14 17:41:38', 'Hello IT,\r\n\r\nI need help with my keyboard. It doesn\'t work.\r\n\r\nThanks, Fred', 1, 'hoppe28'),
(2, 'Email', '2023-04-14 17:44:30', 'Hello Fred,\r\n\r\nHave you tried unplugging it and plugging it back in?\r\n\r\nThanks,\r\nIT', 1, 'hoppe28'),
(3, 'Customer Call', '2023-04-14 18:01:48', 'Customer called about an issue they are having with connecting to the internet on their laptop.', 2, 'hoppe28'),
(4, 'Customer Email', '2023-04-21 04:48:13', 'Yes it just worked, I tried multiple times the other day but it did not work. Thanks, Fred', 1, 'hoppe28'),
(5, 'Resolution', '2023-04-21 04:49:56', 'Managed to work after power cycle', 1, 'hoppe28'),
(6, 'Call', '2023-04-21 04:52:25', 'Called them more about the issue collecting more information', 2, 'hoppe28'),
(7, 'Visit', '2023-04-21 05:08:07', 'Looked into the laptop, had to add the Mac Address to the network', 2, 'hoppe28'),
(8, 'Resolution', '2023-04-21 05:08:34', 'Managed to get it connected', 2, 'hoppe28'),
(9, 'Customer Email', '2023-04-21 05:13:07', 'Hello, my mouse has started to disconnect randomly throughout the day and I am unable to do work for a minute. Can you help me as soon as possible. From Simon', 4, 'hoppe28'),
(10, 'Appointment', '2023-04-21 05:31:19', 'Sunday 4:30pm', 4, 'hoppe28'),
(11, 'Customer Call', '2023-04-21 05:32:39', 'Called saying that they have been unable to get into their outlook email ever since the last os update', 5, 'hoppe28'),
(12, 'Customer Email', '2023-04-21 05:34:27', 'Hello the PC I am currently using has been stuck rebooting since Friday. Can you fix this quickly. Thanks, Drake', 7, 'hoppe28'),
(13, 'Email', '2023-04-21 05:35:18', 'Hello Drake, We can solve this, at what time are available for this?', 7, 'hoppe28'),
(14, 'Customer Email', '2023-04-21 05:36:24', 'I can do Monday to Friday, but I prefer if we do this tomorrow at 5:00pm', 7, 'hoppe28'),
(15, 'Email', '2023-04-21 05:36:45', 'Alright we will set that up', 7, 'hoppe28'),
(16, 'Appointment', '2023-04-21 05:37:11', 'Thursday 5:00pm', 7, 'hoppe28'),
(17, 'Customer Email', '2023-04-21 05:40:07', 'Hi yall, My MacBook Air has stopped working, can you help me out? I need it for my current assignment.', 12, 'hoppe28'),
(18, 'Email', '2023-04-21 05:40:51', 'Hello, we can help you with this, we can someone right away if you are available.', 12, 'hoppe28');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticketNum` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `deviceBrand` varchar(20) DEFAULT NULL,
  `deviceModel` varchar(25) DEFAULT NULL,
  `availability` varchar(50) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `adminID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketNum`, `status`, `category`, `description`, `deviceBrand`, `deviceModel`, `availability`, `customerID`, `adminID`) VALUES
(1, 'closed', 'keyboard', 'Keyboard isn\'t working', 'HP', 'N/A', 'Monday at 3', 1, 'hoppe28'),
(2, 'closed', 'computer', 'Laptop isn\'t connecting to the Wi-fi.', 'Microsoft', 'Surface Book 2', 'Wednesday at 7', 3, 'hoppe28'),
(3, 'closed', 'wifi', 'Unable to connect to the internet wired, only works wirelessly', 'HP', ' 15.6\" Chromebook - Intel', 'Sunday 5:00pm-7:00pm', 8, 'hoppe28'),
(4, 'open', 'mouse', 'Keeps disconnecting randomly throughout the day', 'Logitech', 'MX Master 3 Advanced Wire', 'Friday-Sunday from 4:00pm to 5:00pm', 6, 'hoppe28'),
(5, 'open', 'phone', 'Outlook has stopped working, unable to login because of this', 'Apple', 'IPhone 14', 'Tuesday 3:00pm-6:00pm', 7, 'hoppe28'),
(6, 'closed', 'computer', 'Unable to download software', 'Apple', 'MacBook Air (M1)', 'Monday 6:00pm', 3, 'hoppe28'),
(7, 'open', 'computer', 'Keeps rebooting', 'Dell', 'Inspiron 2', 'Monday - Friday 4:00pm - 7:00pm', 4, 'hoppe28'),
(8, 'closed', 'phone', 'Unable to update', 'Samsung', 'Flip', 'Friday from 2:00pm to 5:00pm', 5, 'hoppe28'),
(9, 'closed', 'keyboard', 'Cannot connect to computer', 'Logitech', 'K360 Wireless Keyboard', 'Tuesday 4:00pm-6:00pm', 4, 'hoppe28'),
(10, 'closed', 'phone', 'Has stopped allowing sign in to the website', 'Apple', 'IPhone 6', 'Monday 3:00pm', 3, 'hoppe28'),
(11, 'closed', 'wifi', 'Unable to connect to the internet', 'ASUS', 'ROG Zephyrus 14', 'Friday-Monday from 2:00pm to 5:00pm', 8, 'hoppe28'),
(12, 'open', 'computer', 'Has stopped powering on', 'Apple', 'MacBook Air', 'Monday - Friday 1:00pm - 4:00pm', 2, 'hoppe28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventNum`),
  ADD KEY `ticketNum` (`ticketNum`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketNum`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `adminID` (`adminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`ticketNum`) REFERENCES `ticket` (`ticketNum`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
