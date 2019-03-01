-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 10:32 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betasoundz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends_relationship`
--

CREATE TABLE `friends_relationship` (
  `user_first_id` int(11) NOT NULL,
  `user_second_id` int(11) NOT NULL,
  `relationship_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends_relationship`
--

INSERT INTO `friends_relationship` (`user_first_id`, `user_second_id`, `relationship_status`) VALUES
(6, 7, 'pending_first_second'),
(6, 8, 'pending_second_first');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `author_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 7, 'The evolution of soundz.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ante orci, convallis quis vestibulum a, tristique quis purus. Ut porttitor arcu vel felis finibus, quis eleifend leo tincidunt. Aenean a leo pulvinar, dapibus nisi facilisis, interdum ex. Maecenas aliquet ante turpis, nec convallis velit aliquet ultricies. Cras eget nibh in nunc eleifend rutrum ac a odio. Duis ante sem, gravida hendrerit vehicula eu, cursus non augue. Aliquam ut nisi tincidunt sem vulputate sollicitudin.', '2019-02-24 10:24:49', '2019-02-24 10:24:49'),
(2, 6, 'Violence, Killing, Rigging and the Nigerian electoral process.', 'Duis malesuada nec justo sit amet sagittis. Aenean placerat iaculis maximus. Vestibulum metus augue, bibendum non est eget, finibus rhoncus purus. Proin nisi sem, iaculis vel metus quis, accumsan malesuada est. Morbi metus nunc, consectetur ac libero eu, lacinia efficitur nisl. Cras libero tortor, pellentesque non diam ut, aliquet imperdiet turpis. Etiam aliquet vel sapien et sollicitudin. Mauris imperdiet pharetra odio accumsan maximus.', '2019-02-24 10:24:49', '2019-02-24 10:24:49'),
(3, 8, 'What more to wait for but His arriavl?', 'Sed aliquet porttitor dolor, ac sollicitudin ipsum blandit sed. Sed eget pharetra risus. Sed a malesuada nulla. Donec tortor augue, tristique a eleifend a, tempor et arcu. Cras lacinia, est non sodales cursus, ipsum ante cursus nisi, id pellentesque nisl libero aliquam nunc. Donec laoreet molestie sapien, ullamcorper pretium dui rhoncus nec. Donec semper nunc enim, at malesuada purus pretium sed. Fusce accumsan felis convallis lacus bibendum rutrum. Maecenas maximus magna eu arcu venenatis, in ultricies magna egestas. Aliquam erat volutpat. Curabitur non odio tristique, scelerisque lacus elementum, efficitur enim. Integer ornare laoreet egestas. Praesent iaculis elementum augue nec feugiat.', '2019-02-24 10:24:49', '2019-02-24 10:24:49'),
(4, 8, 'The Aftermath', 'Donec convallis elementum metus. Curabitur non tristique ligula. In eu iaculis ipsum. Morbi eleifend molestie sapien eget interdum. Nullam non magna mauris. Vestibulum viverra leo a cursus tristique. Quisque at diam in massa luctus dignissim. Ut aliquam tempor turpis. Aliquam nec ultricies urna, nec vehicula quam. Nunc porttitor nulla ante, et vehicula nisl fermentum ac. Proin gravida aliquam dui, sed ultricies velit vehicula vel. Nunc rhoncus mauris ac sem suscipit porta. Fusce porta, velit et feugiat placerat, sem massa sodales turpis, vehicula sodales eros purus vitae sapien. Nunc enim est, tincidunt vel enim eu, malesuada laoreet nunc. Maecenas vel nisl tortor. Donec in nisl aliquet, interdum ligula in, dignissim purus.\r\n', '2019-02-24 16:26:44', '2019-02-24 16:26:44'),
(6, 6, 'user_data/posts/title/20190226133534.txt', 'user_data/posts/body/20190226133534.txt', '2019-02-26 12:35:34', '2019-02-26 12:35:34'),
(7, 6, 'user_data/posts/title/20190226133818.txt', 'user_data/posts/body/20190226133818.txt', '2019-02-26 12:38:18', '2019-02-26 12:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(3, 1),
(2, 2),
(1, 3),
(2, 3),
(3, 3),
(1, 4),
(2, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'poems'),
(2, 'poetry'),
(3, 'freewrite'),
(4, 'expressions');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `firstname`, `email`, `password`) VALUES
(6, 'Metsewa', 'Gulian', 'unix1gl@gmail.com', '$2y$10$0.KyNe44Rt7dHwOVbRgI0uGERCOmU0vSPCTwHvdknw3xPxQIoPsOm'),
(7, 'Dar', 'Sol', 'unix1gla@gmail.com', '$2y$10$E/oQ93.y5q9nEYDZ9HrII.tHS4ANIBV4uqzW3/2jD8/ikKg8nrCSO'),
(8, 'Wah', 'Freddy', 'franto@prekky.com', '$2y$10$a/F9/4EkeQdBGQyO2tXy1.XVZ8Fzpkzt3NvFvKJdU/g9lpfozG9wK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `friends_relationship`
--
ALTER TABLE `friends_relationship`
  ADD PRIMARY KEY (`user_first_id`,`user_second_id`),
  ADD KEY `user_second_id` (`user_second_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`tag_id`,`post_id`) USING BTREE,
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends_relationship`
--
ALTER TABLE `friends_relationship`
  ADD CONSTRAINT `friends_relationship_ibfk_1` FOREIGN KEY (`user_first_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friends_relationship_ibfk_2` FOREIGN KEY (`user_second_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `post_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
