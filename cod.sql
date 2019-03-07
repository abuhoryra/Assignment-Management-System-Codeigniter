-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 08:33 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cod`
--

-- --------------------------------------------------------

--
-- Table structure for table `addteacher`
--

CREATE TABLE `addteacher` (
  `id` int(11) NOT NULL,
  `studentusername` varchar(30) NOT NULL,
  `teacherusername` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addteacher`
--

INSERT INTO `addteacher` (`id`, `studentusername`, `teacherusername`) VALUES
(1, 'pranto', 'zamil'),
(3, 'pranto', 'helal'),
(15, 'pranto', 'amin'),
(46, 'salman', 'zamil'),
(47, 'salman', 'amin'),
(48, 'salman', 'helal');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `student` varchar(300) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  `assignment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `student`, `teacher`, `assignment`) VALUES
(15, 'Shakib,pranto', 'zamil', 'Here is your assignment'),
(16, 'Shakib,pranto', 'zamil', 'dhhdjd'),
(17, 'Shakib,pranto', 'zamil', 'Math 361 chapter 3-> 1,2,3,4,5'),
(18, 'pranto', 'zamil', 'some assignment\r\n'),
(19, 'salman', 'zamil', 'Here is your assignment.');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `post` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `post`) VALUES
(1, 'pranto', 'hi'),
(2, 'pranto', 'yes'),
(3, 'Shakib', 'i am Shakib'),
(4, 'pranto', 'hmm'),
(5, 'pranto', 'hi'),
(6, 'pranto', 'hidshg'),
(7, 'salman', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `phone`, `dob`, `level`) VALUES
(1, 'Md. Abu Horyra', ' Pranto', 'pranto', 'mahpranto@outlook.com', 'pranto', 1629710423, '12-12-1996', 1),
(2, 'Shakib', 'Ahmed', 'Shakib', 'shakib@gmail.com', 'shakib', 1732543254, '17-10-1994', 1),
(3, 'Kamal', 'kamal', 'kamal', 'kamal@gmail.com', 'kamal', 1972389515, '13-09-1995', 1),
(4, 'Khan', 'Helal', 'helal', 'khanhelal@gmail.com', 'helal', 2147483647, '13-09-1995', 2),
(5, 'Hero', 'Alam', 'hero', 'heroalam@gmail.com', 'alam', 2147483647, '13-09-1995', 1),
(6, 'Zamil', 'Ahsan', 'zamil', 'zamil@gmail.com', 'zamil', 2147483647, '12-09-187', 2),
(8, 'Amin', 'Ahmed', 'amin', 'amin@gmail.com', 'amin', 2147483647, '12-12-1996', 2),
(9, 'Salman', 'Khan', 'salman', 'salman@outlook.com', 'salman', 2147483647, '12-09-1876', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addteacher`
--
ALTER TABLE `addteacher`
  ADD PRIMARY KEY (`studentusername`,`teacherusername`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addteacher`
--
ALTER TABLE `addteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
