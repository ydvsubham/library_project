-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 07:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liberary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `author` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `isbn` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `type`, `status`, `price`, `isbn`) VALUES
(2, 'Lectures on Theoretical Physics', 'Arnold Sommerfeld', 'physics', 0, 299, '545456'),
(3, 'The Flying Circus of Physics', 'Jearle Walker', 'physics', 0, 259, '434343'),
(4, 'Design Patterns', 'Ralph Johnson', 'computer', 1, 599, '45465'),
(7, ' The Pilgrim’s Progress', 'John Bunyan', 'novel', 1, 499, '656565'),
(8, 'mega tech', 'S. Anderderson', 'Computer_Science', 1, 121, '123231'),
(9, 'Analog Electronics', 'L.K. MAHESWARI   M.M.S.ANAND', 'Electrical', 0, 499, '23467'),
(10, 'The Algorithmic Leader', 'mike walsh', 'Computer_Science', 1, 532, '12313'),
(11, 'Engineering Mathematics', 'B. S. Grewal', 'Maths', 1, 999, '231234'),
(12, 'PHP And MySql programming', 'P S Roy', 'Computer_Science', 1, 121, '222333'),
(13, 'Engineers Practical Databook', 'Jay Smith', 'Chemical', 1, 499, '323232'),
(14, 'The Hackers Playbook 2', 'Peter Kim', 'Novel', 1, 599, '432345'),
(15, 'The Fault in Our Stars', 'John Green', 'Maths', 1, 299, '234221'),
(16, 'Sons And Lovers', 'D. H. Lawrence', 'Computer_Science', 1, 599, '772615'),
(17, 'The Algorithmic Leader', 'Mike Waslh', 'Computer_Science', 1, 499, '43432'),
(18, 'Vlad The Impalar', 'M J Trow', 'Maths', 1, 499, '97982'),
(24, 'Hate to want You', 'Alisha Rai', 'Maths', 1, 199, '246734');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `u_id` varchar(256) NOT NULL,
  `book_no` int(11) NOT NULL,
  `reg_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `book_name` varchar(256) NOT NULL,
  `book_aurthor` varchar(256) NOT NULL,
  `return_status` int(11) NOT NULL,
  `isbn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `u_id`, `book_no`, `reg_date`, `return_date`, `book_name`, `book_aurthor`, `return_status`, `isbn`) VALUES
(1, 'ravan123', 2, NULL, NULL, 'Lectures on Theoretical Physics', 'Arnold Sommerfeld', 1, 545456),
(2, 'anuj123', 3, '2020-05-05', NULL, 'The Flying Circus of Physics', 'Jearle Walker', 1, 434343),
(3, 'shubham123', 4, '2020-05-05', NULL, 'Design Patterns', 'Ralph Johnson', 1, 45465),
(4, 'ravan123', 4, '2020-05-05', NULL, 'Design Patterns', 'Ralph Johnson', 0, 45465),
(7, 'ravan123', 8, '2020-05-05', '2020-05-05', 'mega tech', 'S. Anderderson', 0, 123231),
(8, 'dev123', 9, '2020-05-05', NULL, 'Analog Electronics', 'L.K. MAHESWARI   M.M.S.ANAND', 1, 23467);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pwd` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `name`, `user_id`, `email`, `pwd`, `status`) VALUES
(15, 'ravan', 'ravan123', 'ravan@gmail.com', '$2y$10$G4K5ZnLFAifXS9mSE.jldu0/d/5JsSSlCfc9XJODrHl8sxcGziEwy', 1),
(16, 'shubham', 'shubham123', 'sub@gmail.com', '$2y$10$5/XooeP39dGG6TRTqKXZb.0eIkAdO60z8.T7tHk4b9kk2lH3MsaEm', 1),
(17, 'anuj', 'anuj123', 'anuj123@gmail.com', '$2y$10$MfusZLvJBnlnfiUYCWSv7OFwATgWuXFae3wuEZQ3R85IjYId7JDYa', 1),
(18, 'devta', 'dev123', 'dev@gmail.com', '$2y$10$IGNS/YyuY08KgOg78NveyeEkJODDI86XkwgzqIQRImU0Kge9TVl.S', 1),
(19, 'admin', 'admin', 'admin@gamil.com', '$2y$10$F5RjJfFL8oU5kyufcCbWiOJUeBbimF/bAnXVCLVlvcd/I8k6Ksvwa', 1),
(20, 'ashu', 'ashu123', 'ashu@gmail.com', '$2y$10$kCm6hfmDvpOVOxQZwW3hBOdthXVbijn4omxVJEbY3r3WsDRLm005e', 1),
(21, 'shubham', 'shubham123', 'shubham@gmail.com', '$2y$10$FnlZpVrLdIXkNXNwMJIbkuQpKn7yI9X0zuqtg2sqzh/zI5y6tPuhG', 1),
(22, 'Shubham', '2018', 'abc@gmail.com', '$2y$10$k2uYBYK5IfJwYZKitHgAk.Jh0zSqHGBnbzo8d7fWjMdNpNNBbo9Jq', 1),
(23, 'devyadav', 'devydv', 'ash@dcj.com', '$2y$10$bAwgvzcgP9WYVbdnam9mOOlqAeGu0kAARegUINkF/FvBa/RAgaSrq', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
