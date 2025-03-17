-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 12:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puericulture`
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `personal_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Middle_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`personal_id`, `users_id`, `first_name`, `Last_name`, `Middle_name`, `email`, `user_profile`) VALUES
(1, 1, 'de', 'e', 'e', '2@gmail.com', '67d3f088ce25c-pueri-logo.png'),
(2, 3, 'a', 'a', 'a', '2sdasd@gmail.com', '67d449e27990e-pueri-logo.png'),
(3, 4, 'kalokohan', 'kalokohan123', 'kaolokohan321', 'kalokohan@gmail.com', '67d4e742deb2f-lol.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_role`, `created_at`) VALUES
(1, 'a', '$2y$10$NYFxqVRT/.OorPIAFy6guu3SJnzVzOgBsp9.tzljGySS0qQYAdG32', 'employee', '2025-03-14 17:02:01'),
(2, 'puericulture', '$2y$10$xfkH5QgdkbqzIHvwNBSqi.wvi2JO/TDlJHRe79yWZHFa7FLFr2Bkm', 'super_admin', '2025-03-14 17:07:47'),
(3, 'marcojean', '$2y$10$qORjzkrKpspDk6bXuNlWlO9WhfYMRaPjhDEIFdbRvaxA9y1uesy6y', 'employee', '2025-03-14 23:23:14'),
(4, 'kalokohan', '$2y$10$FLNP0zC1usllxyyUuflnlOJkiT5b9qCWI7PgZpbdTqd9cBCpqV4y.', 'employee', '2025-03-15 10:34:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`personal_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD CONSTRAINT `personal_information_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
