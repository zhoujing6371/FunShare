-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 05:46 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment`, `user_id`, `photo_id`, `date_created`) VALUES
(1, 'It\'s very beautiful', 12, 1, '2018-04-21 10:39:09'),
(2, 'Fantastic!', 6, 2, '0000-00-00 00:00:00'),
(3, 'Where have you been?', 12, 1, '0000-00-00 00:00:00'),
(4, 'How are you?', 12, 1, '2018-04-22 09:08:09'),
(5, 'What a lake!', 12, 0, '2018-04-22 09:19:22'),
(6, 'What a lake!', 12, 0, '2018-04-22 09:20:51'),
(7, 'What a lake!', 12, 0, '2018-04-22 09:21:06'),
(8, 'What a lake!', 12, 0, '2018-04-22 09:22:13'),
(9, 'What a lake!', 12, 0, '2018-04-22 09:25:06'),
(10, 'What a lake!', 12, 2, '2018-04-22 09:25:42'),
(11, 'Hey, do you want to hang out sometime?', 12, 1, '2018-04-22 09:28:05'),
(12, 'Beautiful sunset!', 12, 9, '2018-04-22 09:38:14'),
(13, 'Beautiful sunset!', 12, 9, '2018-04-22 09:39:38'),
(14, 'Nice flower!', 12, 10, '2018-04-22 09:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `follow_id` int(11) NOT NULL,
  `followee` int(11) NOT NULL,
  `follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`follow_id`, `followee`, `follower`) VALUES
(1, 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `text` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caption` varchar(128) NOT NULL,
  `image_path` varchar(256) NOT NULL,
  `image_size` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_updated` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `user_id`, `caption`, `image_path`, `image_size`, `likes`, `date_created`, `date_updated`) VALUES
(1, 8, 'boat', 'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=468a8c18f5d811cf03c654b653b5089e&auto=format&fit=crop&w=500&q=60', 1, 8, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 8, 'lake', 'https://images.unsplash.com/photo-1428280047984-b1e0c0cfe2b7?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c2525cc22be373b860f01245acbc0b9e&auto=format&fit=crop&w=500&q=60', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(9, 8, 'arash-asghari-474458-unsplash.jpg', 'image/arash-asghari-474458-unsplash.jpg', 0, 3, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(10, 8, 'andrew-small-127196-unsplash.jpg', 'image/andrew-small-127196-unsplash.jpg', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(11, 8, 'donnie-rosie-533526-unsplash.jpg', 'image/donnie-rosie-533526-unsplash.jpg', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(12, 12, 'andrew-small-127196-unsplash.jpg', 'image/andrew-small-127196-unsplash.jpg', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(13, 12, 'brooke-lark-230140-unsplash.jpg', 'image/brooke-lark-230140-unsplash.jpg', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(24, 12, 'austin-neill-303600-unsplash.jpg', 'image/austin-neill-303600-unsplash.jpg', 0, 0, '2018-04-21 10:36:34.000000', '2018-04-21 10:36:34.000000'),
(25, 12, 'austin-neill-303600-unsplash.jpg', 'image/austin-neill-303600-unsplash.jpg', 0, 0, '2018-04-21 10:36:45.000000', '2018-04-21 10:36:45.000000'),
(26, 12, 'austin-neill-303600-unsplash.jpg', 'image/austin-neill-303600-unsplash.jpg', 0, 0, '2018-04-21 10:38:06.000000', '2018-04-21 10:38:06.000000'),
(27, 12, 'austin-neill-303600-unsplash.jpg', 'image/austin-neill-303600-unsplash.jpg', 0, 0, '2018-04-21 10:38:45.000000', '2018-04-21 10:38:45.000000'),
(28, 12, 'austin-neill-303600-unsplash.jpg', 'image/austin-neill-303600-unsplash.jpg', 0, 0, '2018-04-21 10:39:09.000000', '2018-04-21 10:39:09.000000'),
(30, 12, 'andrew-small-127196-unsplash.jpg', 'image/andrew-small-127196-unsplash.jpg', 0, 0, '2018-04-21 11:47:09.000000', '2018-04-21 11:47:09.000000'),
(31, 12, 'andrew-small-127196-unsplash.jpg', 'image/andrew-small-127196-unsplash.jpg', 0, 0, '2018-04-21 11:52:32.000000', '2018-04-21 11:52:32.000000'),
(32, 12, 'andrew-small-127196-unsplash.jpg', 'image/andrew-small-127196-unsplash.jpg', 0, 0, '2018-04-21 11:53:26.000000', '2018-04-21 11:53:26.000000'),
(33, 12, 'donnie-rosie-533526-unsplash.jpg', 'image/donnie-rosie-533526-unsplash.jpg', 0, 0, '2018-04-22 12:02:48.000000', '2018-04-22 12:02:48.000000'),
(34, 12, 'brooke-lark-230140-unsplash.jpg', 'image/brooke-lark-230140-unsplash.jpg', 0, 0, '2018-04-22 12:50:25.000000', '2018-04-22 12:50:25.000000'),
(35, 12, 'brooke-lark-230140-unsplash.jpg', 'image/brooke-lark-230140-unsplash.jpg', 0, 0, '2018-04-22 12:52:47.000000', '2018-04-22 12:52:47.000000'),
(36, 12, 'Milky Way Glowing at Night.mp4', 'image/Milky Way Glowing at Night.mp4', 0, 0, '2018-04-22 09:46:23.000000', '2018-04-22 09:46:23.000000');

-- --------------------------------------------------------

--
-- Table structure for table `photo_comment`
--

CREATE TABLE `photo_comment` (
  `photo_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `post_content` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `photo_id`, `post_content`, `date_created`) VALUES
(1, 28, 12, 'daaf', '2018-04-21 10:39:09'),
(2, 32, 12, 'daisy', '2018-04-21 11:53:26'),
(3, 33, 12, 'leaves', '2018-04-22 12:02:48'),
(4, 35, 12, 'dsasa', '2018-04-22 12:52:47'),
(5, 8, 1, 'How are you?', '2018-04-21 10:39:09'),
(6, 36, 12, 'My first Video.', '2018-04-22 09:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) CHARACTER SET utf8 NOT NULL,
  `comment_sender_name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`, `image`) VALUES
(1, 0, 'hi', 'ss', '2018-04-05 22:57:49', ''),
(2, 0, 'hello', 'a', '2018-04-05 22:58:12', ''),
(3, 0, 'funshare', 'Yang', '2018-04-05 23:07:04', ''),
(4, 0, 'piu~', 'you', '2018-04-05 23:07:31', ''),
(5, 0, 'e', 'ssss', '2018-04-05 23:08:23', ''),
(6, 0, 'jjjjjj', 'w', '2018-04-05 23:09:56', ''),
(7, 6, 'fsdfsf', 'dasddadsasd', '2018-04-05 23:15:17', ''),
(8, 7, '3', 'll', '2018-04-05 23:15:54', ''),
(9, 0, 'hi', 'c', '2018-04-06 03:55:36', ''),
(10, 9, 'hello', 'Yang', '2018-04-06 03:55:56', ''),
(11, 8, 'good afternoon', 'rose', '2018-04-08 22:36:44', ''),
(12, 9, 'good night', 'david', '2018-04-11 03:01:27', ''),
(13, 0, 'halo', 'zhang', '2018-04-11 03:55:23', ''),
(14, 13, 'hhhhhhh', 'y', '2018-04-11 03:55:35', ''),
(15, 0, 'yeah', 'lee', '2018-04-11 05:20:48', ''),
(16, 0, 'hi', 'lee', '2018-04-11 20:35:46', ''),
(17, 16, 'good afternonn', 'lily', '2018-04-11 20:36:00', ''),
(18, 16, 'haloha', 'zhou', '2018-04-13 00:56:30', ''),
(19, 0, 'HI', 'LUCY', '2018-04-13 01:26:16', ''),
(20, 19, 'HALO', 'LILY', '2018-04-13 01:26:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salted_password` varchar(128) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `profile_photo` varchar(128) NOT NULL,
  `label` varchar(128) NOT NULL,
  `private` tinyint(1) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_updated` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `salted_password`, `first_name`, `last_name`, `profile_photo`, `label`, `private`, `date_created`, `date_updated`) VALUES
(6, 'Tom', 'tom@gmail.com', '', '', '', '', '', 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(8, 'Yi', 'yi123@gmail.com', '', 'Yi', '', 'image/yi.jpg', '', 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(12, 'Test', 'test@gmail.com', '$2y$10$r0mECELG94a1TJ11qxW4UuqPgd4e1qNiyhQimuZsNkqpu3duU2doi', 'Test', '', 'image/flower.jpg', '', 0, '2018-04-15 08:56:58.000000', '2018-04-15 08:56:58.000000'),
(13, 'Kirsten', 'kirsten@gmail.com', '$2y$10$vj0LYjEKHzHl7HAOOKxPU.VnG2RTPcE6KmEYDaTx/GXmgsPOEw7H2', 'Kirsten', '', '', '', 0, '2018-04-15 09:02:19.000000', '2018-04-15 09:02:19.000000'),
(14, 'James', 'james@gmail.com', '$2y$10$dHm5lsDnB8/LthcCwmyf5uPUgR0f3/tvkBjqcbkFkVVt5zpnu.ngK', 'James', 'Smith', '', '', 0, '2018-04-15 09:07:03.000000', '2018-04-15 09:07:03.000000'),
(15, 'Yi', 'yi@gmail.com', '$2y$10$v8U2yR.kSESh/rxUIs6D9OMw68Vrh1eVGDsbN8cw.JX4sclBhed0.', 'Yi', '', '', '', 0, '2018-04-15 09:11:52.000000', '2018-04-15 09:11:52.000000'),
(16, 'William', 'william@gmail.com', '$2y$10$bNBZg66Ht9HlLUEv6ndW2uUow2CznJobZo3wo4pU4LA9d3dNAeN5.', 'William', 'Semper', '', '', 0, '2018-04-15 08:59:23.000000', '2018-04-15 08:59:23.000000'),
(17, '\'Test\'', '\'test@gmail.com\'', '$2y$10$EcUpZIB1vnZqFMtslTT8cuoU5yIA7io3JFgZf222Jv9wlwCN5Cj7S', '\'Test\'', '\'\'', '', '', 0, '2018-04-22 12:37:21.000000', '2018-04-22 12:37:21.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
