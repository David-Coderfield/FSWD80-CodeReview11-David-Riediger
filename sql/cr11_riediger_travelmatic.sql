-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 08:54 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_riediger_travelmatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

CREATE TABLE `concerts` (
  `concert_id` int(10) UNSIGNED NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ticket` decimal(5,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`concert_id`, `location_id`, `date`, `time`, `ticket`) VALUES
(1, 5, '2018-11-15', '20:00:00', '58.50'),
(2, 6, '2019-12-09', '19:30:00', '47.80'),
(7, 24, '2025-03-26', '23:59:00', '123.46'),
(8, 28, '2019-11-23', '06:24:00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `address` varchar(70) NOT NULL,
  `image` varchar(100) NOT NULL,
  `www` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum molestias doloribus odio praesentium porro optio.',
  `lat` decimal(10,7) DEFAULT NULL,
  `lng` decimal(10,7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `address`, `image`, `www`, `description`, `lat`, `lng`) VALUES
(1, 'Karlskirche', 'Karlsplatz 1, 1010 Wien', 'church.jpg', 'https://www.wien.gv.at/umwelt/parks/anlagen/karlsplatz.html', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum molestias doloribus odio praesentium porro optimal.', NULL, NULL),
(2, 'Zoo Vienna', 'Maxingstraße 13b, 1130 Wien', 'zoo.jpg', 'https://www.zoovienna.at/', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum molestias doloribus odio praesentium porro optio.', NULL, NULL),
(3, 'Lemon Leaf Thai Restaurant', 'Kettenbrückengasse 19, 1050 Vienna', 'lemon.png', 'http://www.lemonleaf.at/', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum molestias doloribus odio praesentium porro optio.', NULL, NULL),
(4, 'SIXTA', 'Schönbrunner Straße 21,  1050 Wien', 'sixta.png', 'http://www.sixta-restaurant.at/', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum molestias doloribus odio praesentium porro optio.', NULL, NULL),
(5, 'Kris Kristofferson', 'Wiener Stadthalle, Halle F, Roland Rainer Platz 1, 1150 Wien', 'kris.jpg', 'http://kriskristofferson.com/', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', NULL, NULL),
(6, 'Lenny Kravitz', 'Wiener Stadthalle - Halle D, Roland Rainer Platz 1, 1150 Wien', 'lenny.jpg', 'http://www.lennykravitz.com/', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum molestias', NULL, NULL),
(23, 'Code Factory Central', 'Kettenbrückengasse 23/2/12 DG 1050 Wien', 'cf1.jpg', 'https://codefactory.wien/', 'Codem IP(sum) contor-fit: Coverit. Javus Scriptus, Structur Querus Lingus, Pre Processus. Hyper! Cascadus stylus...', NULL, NULL),
(24, 'Daft Punk', 'Somewhere 128, 1150, Vienna (not really)', 'daft.jpg', 'https://daftpunk.com/', 'Tribute to the best band ever!!!', NULL, NULL),
(25, '9er Straßenbahn', 'Beingasse/Schweglerstraße, Wien', '9.jpg', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'Waiting for godot... a rare sight.', NULL, NULL),
(26, 'Kent', 'Märzstraße 39, 1150 Wien', 'kent.jpg', 'https://www.kentrestaurant.at/', 'lorem foood', '48.1982700', '16.3290700'),
(27, 'Delete me', 'test test test', 'delete.jpg', 'index.php', 'You can delete me if you want', NULL, NULL),
(28, 'DJ Smile', 'Youtube, The World', 'djsmile.jpg', 'index.php', 'Jingle Bells, Jingle Bells', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `kitchen` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `location_id`, `kitchen`, `phone`) VALUES
(1, 3, 'Thai', '+43(1)5812308'),
(2, 4, 'Exclusive', '+43 1 58 528 56'),
(4, 26, 'Turkish', '+43(0)1 7898038'),
(5, 27, 'DEL-itious', '0699-DEL-ME-NOW');

-- --------------------------------------------------------

--
-- Table structure for table `sights`
--

CREATE TABLE `sights` (
  `sight_id` int(10) UNSIGNED NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sights`
--

INSERT INTO `sights` (`sight_id`, `location_id`, `type`) VALUES
(1, 1, 'Church'),
(2, 2, 'zoo'),
(8, 23, 'School'),
(9, 25, 'Public transpor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userAvatar` varchar(500) DEFAULT NULL,
  `registerDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `userAvatar`, `registerDate`, `role`) VALUES
(1, 'Admin', 'a@a.a', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', NULL, '2019-11-23 19:44:56', 'admin'),
(2, 'User', 'u@u.u', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', NULL, '2019-11-23 19:43:50', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`concert_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `sights`
--
ALTER TABLE `sights`
  ADD PRIMARY KEY (`sight_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concerts`
--
ALTER TABLE `concerts`
  MODIFY `concert_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sights`
--
ALTER TABLE `sights`
  MODIFY `sight_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concerts`
--
ALTER TABLE `concerts`
  ADD CONSTRAINT `concerts_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `sights`
--
ALTER TABLE `sights`
  ADD CONSTRAINT `sights_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
