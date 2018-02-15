-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 04:47 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caps_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `acct_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `date`, `username`, `password`, `email`, `firstname`, `middlename`, `lastname`, `image`, `acct_status`) VALUES
(1, 1517742303, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com', 'admin', 'admin', 'admin', '3.jpg', 'activate'),
(2, 1517790694, 'none', '81dc9bdb52d04dc20036dbd8313ed055', 'none@gmail.com', 'none', 'none', 'none', '2.jpg', 'activate'),
(3, 1517793707, 'asd', '81dc9bdb52d04dc20036dbd8313ed055', 'asd@gmail.com', 'asd', 'asd', 'asd', '', 'activate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `acct_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `date`, `student_id`, `password`, `email`, `firstname`, `middlename`, `lastname`, `image`, `contact`, `acct_status`) VALUES
(1, 1517757977, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'student@gmail.com', 'student', 'student', 'student', '5.jpg', '1234', 'activate'),
(2, 1517791073, '000', '7815696ecbf1c96e6894b779456d330e', 'none@gmail.com', 'none', 'none', 'none', '', '12131', 'activate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `teacher_code` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `acct_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id`, `date`, `teacher_code`, `password`, `email`, `firstname`, `middlename`, `lastname`, `image`, `contact`, `acct_status`) VALUES
(1, 1517756085, 'teacher', '81dc9bdb52d04dc20036dbd8313ed055', 'teacher@gmail.com', 'teacher', 'teacher', 'teacher', '3.jpg', '1234', 'activate'),
(2, 1517791054, 'none', '5fa72358f0b4fb4f2c5d7de8c9a41846', 'none@gmail.com', 'none', 'none', 'none', '2.jpg', '1231', 'activate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
