-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 05:50 PM
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
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `uid` int(5) NOT NULL,
  `favlist` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

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
  `rdate` date NOT NULL,
  `lang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songinfo`
--

INSERT INTO `songinfo` (`sid`, `scode`, `sname`, `artist`, `duration`, `rdate`, `lang`) VALUES
(0, 'BH01', 'Chai Ghata', 'Pamela Jain', '00:00:00', '2020-07-07', 'Hindi'),
(1, 'BH02', 'Door Nagari', 'Pamela Jain', '00:00:00', '2020-07-07', 'Hindi'),
(2, 'BH03', 'Kana ne', 'Pamela Jain', '00:00:00', '2020-07-07', 'Hindi'),
(3, 'BH04', 'Sona Ne Lage Kya Thi Kaat-1', 'Pamela Jain & other', '00:00:00', '2020-07-07', 'Gujarati'),
(4, 'BH05', 'Sona Ne Lage Kya Thi Kaat-2', 'Pamela Jain & other', '00:00:00', '2020-07-07', 'Gujarati'),
(5, 'DA01', 'Baby', 'Justin Bieber', '00:00:00', '2020-07-07', 'English'),
(6, 'DA02', 'Cheeze Badi', 'Udit Narayan', '00:00:00', '2020-07-07', 'Hindi'),
(7, 'DA03', 'High Heels', 'Meet Bros, Jaz Dhami & Yo Yo Honeysinh', '00:00:00', '2020-07-07', 'Hindi'),
(8, 'DA04', 'Kukkad', 'Shahid Mallya', '00:00:00', '2020-07-07', 'Punjabi'),
(9, 'ED01', '24K Magic', 'Bruno Mars', '00:00:00', '2020-07-07', 'English'),
(10, 'ED02', 'Echame La Culpa', 'Luis Fonsi & Demi Lovato', '00:00:00', '2020-07-07', 'Spanish'),
(11, 'ED03', 'Proxy', 'Martin Garrix', '00:00:00', '2020-07-07', 'English'),
(12, 'EN01', 'Common Denominator', 'Justin Bieber', '00:00:00', '2020-07-07', 'English'),
(13, 'EN02', 'Despacito', 'Luis Fonsi', '00:00:00', '2020-07-07', 'Spanish'),
(14, 'EN03', 'Get Used To It', 'Justin Bieber', '00:00:00', '2020-07-07', 'English'),
(15, 'EN04', 'Sorry', 'Justin Bieber', '00:00:00', '2020-07-07', 'English'),
(16, 'EN05', 'Stuck In The Moment', 'Justin Bieber', '00:00:00', '2020-07-07', 'English'),
(17, 'PT01', 'Chaar Botal Vodka', 'Yo Yo Honeysinh', '00:00:00', '2020-07-07', 'Hindi'),
(18, 'PT02', 'G Phaad Ke', 'Divya Kumar', '00:00:00', '2020-07-07', 'Hindi'),
(19, 'PT03', 'Kar Gayi Chull', 'Badshah, Amaal Mallik, Fazilpuria, Sukri', '00:00:00', '2020-07-07', 'Hindi'),
(20, 'PT04', 'Tamma Tamma Again', 'Bappi Lahri, Amaal Mallik, Fazilpuria', '00:00:00', '2020-07-07', 'Hindi'),
(21, 'PT05', 'Vele', 'Shekhar Ravjivani', '00:00:00', '2020-07-07', 'Punjabi'),
(22, 'RM01', 'Koi Tumsa Nahin', 'Sonu Nigam & Shreya Ghosal', '00:00:00', '2020-07-07', 'Hindi'),
(23, 'RM02', 'Meherbaan', 'Ash King, Shilpa Rao & Shekhar Ravjiani', '00:00:00', '2020-07-07', 'Hindi'),
(24, 'RM03', 'Aise Na Mujhe Tum Dekho', 'Ash King', '00:00:00', '2020-07-07', 'Hindi'),
(25, 'RM04', 'Main Hoon Hero Tera', 'Salman Khan', '00:00:00', '2020-07-07', 'Hindi'),
(26, 'RM05', 'Panchhi Bole', 'M. M. Keeravani & Palak Muchhal', '00:00:00', '2020-07-07', 'Hindi');

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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
