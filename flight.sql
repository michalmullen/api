-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2020 at 11:22 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text CHARACTER SET armscii8 NOT NULL,
  `price` int(11) NOT NULL,
  `order_amount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `title`, `image`, `description`, `price`, `order_amount`) VALUES
(7, 'Cranberry Bacon Chicken Salad', 'https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/web-salad-cranberry-bacon-bleu-18.jpg', 'Hand-seasoned, grilled chicken breast and pieces of bacon plus a generous helping of dried cranberries and savory bleu cheese crumbles on a bed of mixed greens with cucumber slices, and grape tomatoes.', 200, 0),
(8, 'Garden Fresco Salad', 'https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/salad-garden-fresco.jpg', 'Our Garden Fresco Salad features a bed of mixed greens plus hand-sliced cucumbers, grape tomatoes, shredded Wisconsin cheddar and zesty croutons.', 150, 0),
(9, 'Side Salad', 'https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/side-salad.jpg', 'Mixed greens with cucumber, tomato, croutons and a sprinkling of cheddar cheese.', 80, 0),
(10, 'Chicken Cashew Salad', 'https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/web-salad-chicken-cashew-18.jpg', 'Hand-seasoned, grilled chicken breast plus a generous helping of whole roasted cashews atop a bed of mixed greens. Plus crunchy cucumbers, grape tomatoes and shredded real Wisconsin cheddar.', 120, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, '[{\"day\":\"Monday\",\"id\":0,\"items\":[{\"id\":\"7\",\"title\":\"Cranberry Bacon Chicken Salad\",\"image\":\"https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/web-salad-cranberry-bacon-bleu-18.jpg\",\"description\":\"Hand-seasoned, grilled chicken breast and pieces of bacon plus a generous helping of dried cranberries and savory bleu cheese crumbles on a bed of mixed greens with cucumber slices, and grape tomatoes.\",\"price\":\"200\",\"order_amount\":\"0\"},{\"id\":\"9\",\"title\":\"Side Salad\",\"image\":\"https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/side-salad.jpg\",\"description\":\"Mixed greens with cucumber, tomato, croutons and a sprinkling of cheddar cheese.\",\"price\":\"80\",\"order_amount\":\"0\"}]},{\"day\":\"Tuesday\",\"id\":1,\"items\":[{\"id\":\"8\",\"title\":\"Garden Fresco Salad\",\"image\":\"https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/salad-garden-fresco.jpg\",\"description\":\"Our Garden Fresco Salad features a bed of mixed greens plus hand-sliced cucumbers, grape tomatoes, shredded Wisconsin cheddar and zesty croutons.\",\"price\":\"150\",\"order_amount\":\"0\"},{\"id\":\"10\",\"title\":\"Chicken Cashew Salad\",\"image\":\"https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/web-salad-chicken-cashew-18.jpg\",\"description\":\"Hand-seasoned, grilled chicken breast plus a generous helping of whole roasted cashews atop a bed of mixed greens. Plus crunchy cucumbers, grape tomatoes and shredded real Wisconsin cheddar.\",\"price\":\"120\",\"order_amount\":\"0\"}]},{\"day\":\"Wednesday\",\"id\":2,\"items\":[{\"id\":\"9\",\"title\":\"Side Salad\",\"image\":\"https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/side-salad.jpg\",\"description\":\"Mixed greens with cucumber, tomato, croutons and a sprinkling of cheddar cheese.\",\"price\":\"80\",\"order_amount\":\"0\"},{\"id\":\"10\",\"title\":\"Chicken Cashew Salad\",\"image\":\"https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/web-salad-chicken-cashew-18.jpg\",\"description\":\"Hand-seasoned, grilled chicken breast plus a generous helping of whole roasted cashews atop a bed of mixed greens. Plus crunchy cucumbers, grape tomatoes and shredded real Wisconsin cheddar.\",\"price\":\"120\",\"order_amount\":\"0\"}]},{\"day\":\"Thurday\",\"id\":3,\"items\":[{\"id\":\"7\",\"title\":\"Cranberry Bacon Chicken Salad\",\"image\":\"https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/web-salad-cranberry-bacon-bleu-18.jpg\",\"description\":\"Hand-seasoned, grilled chicken breast and pieces of bacon plus a generous helping of dried cranberries and savory bleu cheese crumbles on a bed of mixed greens with cucumber slices, and grape tomatoes.\",\"price\":\"200\",\"order_amount\":\"0\"},{\"id\":\"8\",\"title\":\"Garden Fresco Salad\",\"image\":\"https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/salad-garden-fresco.jpg\",\"description\":\"Our Garden Fresco Salad features a bed of mixed greens plus hand-sliced cucumbers, grape tomatoes, shredded Wisconsin cheddar and zesty croutons.\",\"price\":\"150\",\"order_amount\":\"0\"}]},{\"day\":\"Friday\",\"id\":4,\"items\":[{\"id\":\"10\",\"title\":\"Chicken Cashew Salad\",\"image\":\"https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/web-salad-chicken-cashew-18.jpg\",\"description\":\"Hand-seasoned, grilled chicken breast plus a generous helping of whole roasted cashews atop a bed of mixed greens. Plus crunchy cucumbers, grape tomatoes and shredded real Wisconsin cheddar.\",\"price\":\"120\",\"order_amount\":\"0\"},{\"id\":\"9\",\"title\":\"Side Salad\",\"image\":\"https://d36wnpk9e3wo84.cloudfront.net/menu-item-images/400/side-salad.jpg\",\"description\":\"Mixed greens with cucumber, tomato, croutons and a sprinkling of cheddar cheese.\",\"price\":\"80\",\"order_amount\":\"0\"}]}]');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `order` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `user_name`, `order`, `datetime`) VALUES
(6, 1, 'asdf', 'asdfasdf', '2020-01-14 15:37:32'),
(9, 1, 'Mitchell', '[{\"id\":\"6\",\"title\":\"Bacon Cheesburger\",\"image\":\"https://cdn.vuetifyjs.com/images/cards/road.jpg\",\"description\":\"gud food ya know\",\"price\":\"200\",\"order_amount\":\"1\"}]', '2020-01-15 12:58:42'),
(10, 7, 'Asdf', '[{\"id\":\"6\",\"title\":\"Bacon Cheesburger\",\"image\":\"https://cdn.vuetifyjs.com/images/cards/road.jpg\",\"description\":\"gud food ya know\",\"price\":\"200\",\"order_amount\":\"1\"}]', '2020-01-15 13:01:33'),
(11, 7, 'Asdf', '[{\"id\":\"6\",\"title\":\"Bacon Cheesburger\",\"image\":\"https://cdn.vuetifyjs.com/images/cards/road.jpg\",\"description\":\"gud food ya know\",\"price\":\"200\",\"order_amount\":\"1\"}]', '2020-01-15 13:01:53'),
(12, 7, 'Asdf', '[{\"id\":\"6\",\"title\":\"Bacon Cheesburger\",\"image\":\"https://cdn.vuetifyjs.com/images/cards/road.jpg\",\"description\":\"gud food ya know\",\"price\":\"200\",\"order_amount\":\"1\"}]', '2020-01-15 13:04:35'),
(13, 1, 'Mitchell', '[{\"id\":\"5\",\"title\":\"Cheeseburger\",\"image\":\"https://cdn.vuetifyjs.com/images/cards/road.jpg\",\"description\":\"easy cheesy\",\"price\":\"150\",\"order_amount\":1},{\"id\":\"4\",\"title\":\"Hamburger\",\"image\":\"https://cdn.vuetifyjs.com/images/cards/road.jpg\",\"description\":\"bun, fun, run\",\"price\":\"180\",\"order_amount\":1}]', '2020-01-15 14:41:06'),
(14, 1, 'Mitchell', '[{\"id\":\"5\",\"title\":\"Cheeseburger\",\"image\":\"https://cdn.vuetifyjs.com/images/cards/road.jpg\",\"description\":\"easy cheesy\",\"price\":\"150\",\"order_amount\":\"3\"}]', '2020-01-15 14:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `coins` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `admin`, `coins`) VALUES
(1, 'admin@admin.com', 'asdfasdf', 'Admin', 1, 120),
(7, 'asdf@asdf.com', 'asdfasdf', 'Asdf', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
