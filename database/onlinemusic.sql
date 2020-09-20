-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2020 at 12:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinemusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(3) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `password`) VALUES
(1, '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `uid` int(5) NOT NULL,
  `favlist` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`uid`, `favlist`) VALUES
(1, 'RM05_PT01_EN02_DA02_'),
(2, 'RM05_ED01_ED02_ED03_');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `pid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `list` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`pid`, `uid`, `pname`, `list`) VALUES
(31, 1, 'first', 'RM05_');

-- --------------------------------------------------------

--
-- Table structure for table `songinfo`
--

CREATE TABLE `songinfo` (
  `sid` int(10) NOT NULL,
  `scode` varchar(4) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `duration` time NOT NULL,
  `year` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songinfo`
--

INSERT INTO `songinfo` (`sid`, `scode`, `sname`, `artist`, `duration`, `year`) VALUES
(0, 'BH01', 'Chai Ghata', 'NA', '00:05:04', 0),
(1, 'BH02', 'Door Nagari', 'Pamela Jain', '00:07:06', 0),
(2, 'BH03', 'Kana Ne', 'Pamela Jain', '00:09:02', 0),
(3, 'BH04', 'Sona Ne Lage Kya Thi Kaat-1', 'NA', '00:30:04', 0),
(4, 'BH05', 'Sona Ne Lage Kya Thi Kaat-2', 'NA', '00:30:06', 0),
(5, 'DA01', 'Baby', 'Justin Bieber', '00:04:13', 2010),
(6, 'DA02', 'Cheeze Badi', 'Udit Narayan , Neha Kakkar - PagalWorld.cool', '00:03:42', 2017),
(7, 'DA03', 'High Heels', 'Meet Bros Anjjan, Jaz Dhami & Aditi Singh Sharma', '00:03:32', 2016),
(8, 'DA04', 'Kukkad', 'Shahid Mallya', '00:04:22', 2012),
(9, 'ED01', '24K Magic', 'Bruno Mars [FazMusic.Net]', '00:03:46', 2016),
(10, 'ED02', 'Echame La Culpa', 'Luis Fonsi, Demi Lovato', '00:02:53', 2017),
(11, 'ED03', 'Proxy', 'Martin Garrix', '00:04:37', 2014),
(12, 'EN01', 'Common Denominator', 'Justin Bieber', '00:04:08', 2009),
(13, 'EN02', 'Despacito', 'NA', '00:03:47', 0),
(14, 'EN03', 'Get Used To It', 'NA', '00:03:58', 0),
(15, 'EN04', 'Sorry', 'Justin Bieber', '00:03:20', 2015),
(16, 'EN05', 'Stuck in the Moment', 'NA', '00:03:42', 0),
(17, 'PT01', 'Chaar Botal Vodka', 'Yo Yo Honey Singh', '00:03:45', 2014),
(18, 'PT02', 'G Phaad Ke', 'Divya Kumar (DesiTape.Com)', '00:03:13', 2015),
(19, 'PT03', 'Kar Gayi Chull', 'Badshah, Amaal Mallik, Fazilpuria, Sukriti Kakar, Neha Kakkar', '00:03:07', 2016),
(20, 'PT04', 'Tamma Tamma Again', 'Bappi Lahiri, Anuradha Paudwal, Badshah , Tanishk Bagchi', '00:03:19', 2017),
(21, 'PT05', 'Vele', 'Shekhar Ravjiani', '00:03:50', 2012),
(22, 'RM01', 'Aise Na Mujhe Tum Dekho', 'Ash King', '00:02:42', 2015),
(23, 'RM02', 'Koi Tumsa Nahin', 'NA', '00:05:32', 0),
(24, 'RM03', 'Main Hoon Hero Tera', 'Salman Khan [PagalWorld.com]', '00:04:44', 2015),
(25, 'RM04', 'Meherbaan', 'Ash King, Shilpa Rao & Shekhar Ravjiani', '00:05:07', 2014),
(26, 'RM05', 'Panchhi Bole', 'M. M. Keeravani, Palak Muchhal (PagalWorld.com)', '00:04:19', 2015),
(27, 'RM06', 'Sathiya Ye Tune Kya Kiya', 'S. P. Balasubrahmanyam, K. S. Chithra - K. S. Chitra', '00:05:12', 2012);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `verified`) VALUES
(1, 'darshan', 'e10adc3949ba59abbe56e057f20f883e', 'darshan250999@gmail.com', 1),
(2, 'ramesh', '0487cc982f7db39c51695026e4bdc692', 'Ramesh@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `songinfo`
--
ALTER TABLE `songinfo`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
