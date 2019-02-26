-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2019 at 08:47 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hts`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `a_id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `u_ID` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `sum` int(10) NOT NULL,
  `Nvotes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`a_id`, `file`, `text`, `pincode`, `u_ID`, `heading`, `rate`, `sum`, `Nvotes`) VALUES
(11, '5a1c9774ceec91.9177499315118232208476.png', '            ', '0', 0, '', 0, 0, 0),
(12, 'Walter-White-2.jpg', '            ASAasds', '246174', 0, '', 93, 14, 3),
(13, '2.jpg', '        testt4444', '246174', 0, '', 0, 0, 0),
(14, 'sewage_Treatment_plant.jpg', '            heelloo', '246174', 0, '', 0, 0, 0),
(15, '20190117_134709_0001.png', '            asafsfasf', '246174', 0, '', 100, 5, 1),
(16, '20190117_134709_0001.png', '            asafsfasf', '246174', 0, '', 0, 0, 0),
(17, 'Capture.JPG', '            ', '246149', 0, '', 0, 0, 0),
(18, 'Capture.JPG', '            ', '246149', 0, '', 0, 0, 0),
(19, 'Capture.JPG', '            ', '246149', 0, '', 0, 0, 0),
(20, 'Capture.JPG', '            ', '246149', 0, '', 0, 0, 0),
(21, 'Walter-White-2.jpg', '            hello', '123456', 20, '', 0, 0, 0),
(22, 'welcome.jpg', '            testignggggggg', '246174', 15, '', 70, 7, 2),
(23, '28471356_769195423279478_4766925190269672015_n.jpg', '            Hoii', '246174', 15, '', 0, 0, 0),
(24, '28471356_769195423279478_4766925190269672015_n.jpg', '            Hoii', '246174', 15, '', 0, 0, 0),
(25, '28471356_769195423279478_4766925190269672015_n.jpg', '            Hoii', '246174', 15, '', 0, 0, 0),
(26, '28471356_769195423279478_4766925190269672015_n.jpg', '            Hoii', '246174', 15, '', 0, 0, 0),
(27, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(28, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(29, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(30, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(31, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(32, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(33, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(34, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(35, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(36, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(37, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(38, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(39, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(40, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(41, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(42, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, '', 0, 0, 0),
(43, 'seminar-on-environmental-issues-air-pollution-and-controls-11-638.jpg', '            I am new to uttrakhand Dehradoon', '123456', 22, '', 0, 0, 0),
(44, 'welcome.jpg', '            Hello Everyone im new to this city', '123456', 20, 'New to dehradun', 100, 5, 1),
(45, 'welcome.jpg', '            Hello Everyone im new to this city', '123456', 20, 'New to dehradun', 0, 0, 0),
(46, 'welcome.jpg', '            Hello Everyone im new to this city', '123456', 20, 'New to dehradun', 0, 0, 0),
(47, '28471356_769195423279478_4766925190269672015_n.jpg', '            ', '246174', 15, 'Lack of cleanliness in Srinagar', 0, 0, 0),
(48, 'IMG_20180615_122622.jpg', '', '221001', 26, '', 0, 0, 0),
(49, '', '            Hello testing this feature', '246174', 27, 'Heading 1 testing', 0, 0, 0),
(50, '', '            Heading 222 testing', '246174', 27, 'Heading 2 testing ', 0, 0, 0),
(51, '', '            new2', '246174', 27, 'New 2', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `first_name`, `last_name`, `pin`, `email`) VALUES
(15, 'huhaa', 'Prabal', 'Dhasmana', '246174', 'prabald.007@gmail.com'),
(20, 'hts', '123', '123', '123456', 'h@gmail.com'),
(21, '123', 'Utkarsh', 'Kala', '246149', 'utkarsh.kala.9@gmail.com'),
(23, 'fasljflsajklfjas', 'ddsf', 'asf', '121323', 'dflalfal@gmail.com'),
(24, 'fasljflsajklfjas', 'afasffaa', 'affa', '12', 'dflalfal@gmail.com'),
(25, 'fasfadfad', 'jkjklj', 'dsfs', '246174', 'prabald.007@dfds.com'),
(26, 'ayushi', 'ayushi', 'lal', '221001', 'ayushilal989@gmail.com'),
(27, 'punit@123', 'Puneet', 'Bhatt', '246174', 'punit@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
