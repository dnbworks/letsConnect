-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 09:25 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mismatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_category`
--

CREATE TABLE `mismatch_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mismatch_category`
--

INSERT INTO `mismatch_category` (`category_id`, `name`) VALUES
(1, 'Appearance'),
(2, 'Entertainment'),
(3, 'Food'),
(4, 'People'),
(5, 'Activities');

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_response`
--

CREATE TABLE `mismatch_response` (
  `response_id` int(11) NOT NULL,
  `response` varchar(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_topic`
--

CREATE TABLE `mismatch_topic` (
  `topic_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mismatch_topic`
--

INSERT INTO `mismatch_topic` (`topic_id`, `name`, `category_id`) VALUES
(1, 'Tattoos', 1),
(2, 'Gold chains', 1),
(3, 'Body piercing', 1),
(4, 'Cowboys boots', 1),
(5, 'Long hair', 1),
(6, 'Reality TV', 2),
(7, 'Professional wrestling', 2),
(8, 'Horror movies', 2),
(9, 'Easy listening music', 2),
(10, 'The opera', 2),
(11, 'Sushi', 3),
(12, 'Spam', 3),
(13, 'spicy food', 3),
(14, 'Peanut butter & banana sandwiches', 3),
(15, 'Martinis', 3),
(16, 'Howard Stern', 4),
(17, 'Barbara Sterisand', 4),
(18, 'Bill Gates', 4),
(19, 'Hugh Hefner', 4),
(20, 'Martha Stewart', 4),
(21, 'Yoga', 5),
(22, 'Weightlifting', 5),
(23, 'Cube puzzle', 5),
(24, 'Karaoke', 5),
(25, 'Hiking', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_users`
--

CREATE TABLE `mismatch_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `first_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `state` varchar(4) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mismatch_users`
--

INSERT INTO `mismatch_users` (`user_id`, `username`, `password`, `join_date`, `first_name`, `last_name`, `gender`, `birthdate`, `city`, `state`, `picture`) VALUES
(1, 'mickley@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2021-07-31 18:59:28', 'micky', 'peter', 'F', '1997-04-16', 'Tanay', 'NY', '1627757968google.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mismatch_category`
--
ALTER TABLE `mismatch_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `mismatch_response`
--
ALTER TABLE `mismatch_response`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `fk_mismatch_response_user_id` (`user_id`),
  ADD KEY `fk_mismatch_response_topic_id` (`topic_id`);

--
-- Indexes for table `mismatch_topic`
--
ALTER TABLE `mismatch_topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `fk_mismatch_topic_topic_id` (`category_id`);

--
-- Indexes for table `mismatch_users`
--
ALTER TABLE `mismatch_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mismatch_category`
--
ALTER TABLE `mismatch_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mismatch_response`
--
ALTER TABLE `mismatch_response`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mismatch_topic`
--
ALTER TABLE `mismatch_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mismatch_users`
--
ALTER TABLE `mismatch_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mismatch_response`
--
ALTER TABLE `mismatch_response`
  ADD CONSTRAINT `fk_mismatch_response_topic_id` FOREIGN KEY (`topic_id`) REFERENCES `mismatch_topic` (`topic_id`),
  ADD CONSTRAINT `fk_mismatch_response_user_id` FOREIGN KEY (`user_id`) REFERENCES `mismatch_users` (`user_id`);

--
-- Constraints for table `mismatch_topic`
--
ALTER TABLE `mismatch_topic`
  ADD CONSTRAINT `fk_mismatch_topic_topic_id` FOREIGN KEY (`category_id`) REFERENCES `mismatch_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
