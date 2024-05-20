-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 06:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_no` int(9) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_desc` text NOT NULL,
  `article_by` int(9) NOT NULL,
  `posted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_no`, `article_title`, `article_desc`, `article_by`, `posted`) VALUES
(1, 'computer', 'A computer is a machine that can store and process information. Most computers rely on a binary system, which uses two variables, 0 and 1, to complete tasks such as storing data, calculating algorithms, and displaying information. Computers come in many different shapes and sizes, from handheld smartphones to supercomputers weighing more than 300 tons.', 4, '2022-03-18 17:21:20'),
(2, 'pubg', 'PUBG: Battlegrounds (previously known as PlayerUnknown\'s Battlegrounds, or simply PUBG)[1] is an online multiplayer battle royale game developed and published by PUBG Corporation (current PUBG Studios), a subsidiary of Bluehole (current Krafton). The game is based on previous mods that were created by Brendan \"PlayerUnknown\" Greene for other games, inspired by the 2000 Japanese film Battle Royale, and expanded into a standalone game under Greene\'s creative direction. In the game, up to one hundred players parachute onto an island and scavenge for weapons and equipment to kill others while avoiding getting killed themselves. The available safe area of the game\'s map decreases in size over time, directing surviving players into tighter areas to force encounters. The last player or team standing wins the round.', 5, '2022-03-22 09:51:51'),
(4, 'Free Fire', 'Garena Free Fire, also known as Free Fire, is a battle royale game, developed by 111dots Studio and published by Garena for Android and iOS. It became the most downloaded mobile game globally in 2019. In August 2021, Free Fire set a record with over 150 million daily active users globally.', 5, '2022-03-22 09:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorie_id` int(9) NOT NULL,
  `categorie_name` varchar(255) NOT NULL,
  `categorie_description` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorie_id`, `categorie_name`, `categorie_description`, `created`) VALUES
(1, 'PHP', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.', '2022-03-06 11:39:24'),
(2, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2022-03-06 11:40:10'),
(3, 'Python', 'Python is a high-level general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Its language constructs and object-oriented approach aim to help programmers write clear, logical code for small- and large-scale projects.', '2022-03-06 20:43:00'),
(4, 'JavaScript', 'JavaScript, often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. Over 97% of websites use JavaScript on the client side for web page behavior, often incorporating third-party libraries.', '2022-03-06 20:43:59'),
(5, 'C++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\".', '2022-03-06 20:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(9) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(9) NOT NULL,
  `comment_by` int(9) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'ans by hello', 1, 4, '2022-03-11 19:46:02'),
(2, '123546879', 1, 4, '2022-03-12 09:17:43'),
(3, '&lt;p&gt;heloo&lt;/p&gt;', 1, 4, '2022-03-12 09:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(9) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `message` text NOT NULL,
  `timestemp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `timestemp`) VALUES
(1, 'chirag', 'jagani', 'cj@gmail.com', 1234567891, 'hiiii', '2022-03-21 20:50:06'),
(2, 'raj', 'goavni', 'jaganichirag23@gmail.com', 123456789, 'Hello i am tester', '2022-03-21 20:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(9) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(9) NOT NULL,
  `thread_user_id` int(9) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'how to install php', 'help!', 1, 4, '2022-03-22 09:33:14'),
(2, 'how to install java', 'help!', 2, 4, '2022-03-22 09:35:37'),
(3, 'help!', 'how to install c++?', 5, 4, '2022-03-22 09:36:04'),
(4, 'help!', 'how to install js?', 4, 4, '2022-03-22 09:36:22'),
(5, 'install to php', 'adb', 1, 5, '2022-03-22 09:58:20'),
(6, 'install ab php', 'rh', 1, 5, '2022-03-22 09:59:24'),
(7, 'which php?', 'this is ', 1, 5, '2022-03-22 10:00:54'),
(8, 'which java?', 'this is', 2, 5, '2022-03-22 10:01:08'),
(9, 'which py?', 'this is', 3, 5, '2022-03-22 10:01:28'),
(10, 'howto php?', 'php\r\n', 1, 5, '2022-03-22 10:04:20'),
(11, 'howto java', 'java', 2, 5, '2022-03-22 10:04:35'),
(12, 'howto py?', 'py', 3, 5, '2022-03-22 10:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(9) NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestemp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_name`, `user_email`, `user_pass`, `timestemp`) VALUES
(1, 'DC', 'dc@gmail.com', '$2y$10$t3T4BqabiQbbGP1NOn5v2eC.rMuzp5uYsyLxv2xvTiCyGEeqs4Vkq', '2022-03-11 19:17:37'),
(2, 'ab', 'TRY@gamil.com', '$2y$10$nZJZVieJfvKtz7QKn.iLLuHAkYBWmh4U6UceQaq3U2Hx2epdgWhI6', '2022-03-11 19:35:57'),
(3, 'abc', 'ushanz@gmail.com', '$2y$10$wnIZjAYH7l.1pm18LtT6n.rlu4sAT7PMHF.ZPpnDEO.mLyEwyYPlO', '2022-03-11 19:36:13'),
(4, 'hello', 'abc@gmail.com', '$2y$10$bTaHdEAq6l3r.7hE8z72vesoqb/kVtnaL9rSrdGtcqYlo2KIt9w5K', '2022-03-11 19:39:34'),
(5, 'rahul', 'rahul@gmail.com', '$2y$10$n86/iNR1eOA/4ci9hsvZqO4N9BFp.P2tfmmnckZ.b1D4GWxcE31ua', '2022-03-22 09:41:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_no`),
  ADD UNIQUE KEY `article_title` (`article_title`);
ALTER TABLE `articles` ADD FULLTEXT KEY `article_title_2` (`article_title`,`article_desc`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title_2` (`thread_desc`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title_3` (`thread_desc`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_desc` (`thread_desc`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title_4` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_no` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorie_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
