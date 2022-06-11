-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2020 at 02:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tshu2_dmit2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `characterslab`
--

CREATE TABLE `characterslab` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `characterslab`
--

INSERT INTO `characterslab` (`first_name`, `last_name`, `age`, `occupation`, `description`, `id`) VALUES
('Spongebob', 'Squarepants', 34, 'Fry Cook at Krusty Crab', 'Spongebob Squarepants is the main character of Spongebob Squarepants.', 1),
('Gary', 'The Snail', 24, 'Pet', 'He is Spongebob\'s pet Snail.', 5),
('Patrick', 'Star', 35, 'Unemployed', 'Spongebob\'s best friend.', 6),
('Squidward', 'Tentacles', 47, 'Cashier at Krusty Krab', 'Squidward is Spongebob\'s co-worker & neighbor.', 9),
('Eugene', 'Krabs', 77, 'Founder & Owner of Krusty Krab', 'Mr. Krabs as he is more commonly known as is the founder & owner of Krusty Krab and he is Spongebob\'s boss.', 10),
('Sandy', 'Cheeks', 33, 'Scientist', 'Sandy is a scientist and one of Spongebob\'s friends.', 11),
('Sheldon', 'Plankton', 59, 'Owner of The Chum Bucket', 'Sheldon is the main antagonist of Spongebob and rival of Mr. Krabs.', 12),
('Poppy', 'Puff', 62, 'Teacher', 'Mrs. Puff is Spongebob\'s teacher at Boating School.', 13),
('Pearl', 'Krabs', 16, 'Student', 'Pearl is the Daughter of Mr. Krabs and the future owner of Krusty Krab.', 14),
('Karen', 'Plankton', 40, 'Co-Owner of The Chum Bucket', 'Karen is the wife of Sheldon Plankton and the Co-Owner of The Chum Bucket.', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characterslab`
--
ALTER TABLE `characterslab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characterslab`
--
ALTER TABLE `characterslab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
