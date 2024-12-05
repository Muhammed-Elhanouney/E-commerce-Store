-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 02:46 PM
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
-- Database: `plus`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `user_id`, `quantity`) VALUES
(1, 1, 1),
(6, 1, 1),
(7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Cloths'),
(2, 'Electronics'),
(3, 'Shose'),
(4, 'Watches');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img_id`, `image_name`) VALUES
(16, 1, 'fb31479c68311fd49c505de4cda2b5ee.jpg'),
(17, 2, 'bdc47106378555a49746ec5abb1c13cf.jpg'),
(18, 3, '752e31d94ee06710ade73f2504d2b030.jpg'),
(19, 4, 'fd2946861ad768db11713d1035f2aa87.jpg'),
(20, 5, 'd6387f1ddc889128d6778f3f377617d7.jpg'),
(21, 6, 'dba0acb83b6a99fe4d276525d6082525.jpg'),
(22, 7, 'ed56f6b3a534af84732b0b9e07d4da94.jpg'),
(23, 8, '49aea340fb1ab3872535a7445bf31e90.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `priv`
--

CREATE TABLE `priv` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `priv`
--

INSERT INTO `priv` (`id`, `name`) VALUES
(1, 'owner'),
(2, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `cat_id`, `added_at`) VALUES
(1, 't-shirt', 'new generation of t-shirt', '375', 1, '2024-11-10 20:23:34'),
(2, 'matrix-computer', 'new generation of computer', '2500', 2, '2024-11-10 21:04:30'),
(3, 'lenovo-computer', 'new generation of lenovo-computer', '3500', 2, '2024-11-10 21:05:30'),
(4, 'head phone', 'new generation of head phone', '777', 2, '2024-11-10 21:06:40'),
(5, 'smart', 'a new smart watch', '1450', 4, '2024-11-10 21:07:44'),
(6, 'jacket', 'new prof jacket', '1750', 1, '2024-11-10 21:08:22'),
(7, 'Nike Shose', 'new collection nike', '350', 3, '2024-11-10 21:22:21'),
(8, 'Iphone', 'new iphone 14 pro', '12500', 2, '2024-11-10 21:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `shop_users`
--

CREATE TABLE `shop_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `registared_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop_users`
--

INSERT INTO `shop_users` (`id`, `username`, `email`, `password`, `address`, `gender`, `registared_at`) VALUES
(1, 'muhammed', 'muhammed@mail.com', '123', 'tanta', 0, '2024-11-11 01:06:48'),
(2, 'ali', 'ali@mail.com', '123', 'Sint eveniet ea qui', 0, '2024-11-11 01:12:18'),
(3, 'fatma', 'fatma@mail.com', '123', 'Eius culpa ipsa ut ', 1, '2024-11-11 01:14:22'),
(4, 'gewocih', 'xufe@mailinator.com', '$2y$10$U3PSjhi.nAIQkLtzeTk/MOcqZSkXoSWFYn6alJTxULLMF/DEC43Du', 'Nisi accusantium exp', 1, '2024-11-11 01:32:14'),
(5, 'qetub', 'pyrok@mailinator.com', '$2y$10$TVcphHqOw/WnCzHIO.me1.KbQ3vEjw3C8H/qbi0HpJDQN5HAG6T4C', 'Labore autem amet l', 1, '2024-11-11 01:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `priv_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `gender`, `priv_id`, `time`) VALUES
(1, 'muhammeduhuhuh', 'muhammed@mail.com', '123', 'manosura', 0, 2, '2024-10-27 19:55:32'),
(2, 'mai', 'mai@mail.com', '123', 'tanta', 1, 2, '2024-10-27 19:55:32'),
(3, 'abdo', 'abdo@mail.com', '123', 'bhout', 0, 3, '2024-11-02 21:10:10'),
(4, 'fatma', 'fatma@mail.com', '123', 'alex', 1, 3, '2024-11-02 21:27:09'),
(5, 'ali', 'ali@mail.com', '123', 'tanta', 0, 3, '2024-11-08 12:34:02'),
(6, 'amr', 'amr@mail.com', 'Pa$$w0rd!', 'mtobas', 1, 2, '2024-11-08 12:37:59'),
(7, 'laassss', 'mar@mail.com', 'Pa$$w0rd!', 'dakahlia', 1, 3, '2024-11-08 12:38:11'),
(8, 'zoqydu', 'sajahoz@mailinator.com', 'Pa$$w0rd!', 'Laudantium quibusda', 1, 2, '2024-11-09 13:33:17'),
(9, 'laxubugisu', 'gufemosym@mailinator.com', '123', 'Molestiae iusto labo', 0, 2, '2024-11-12 14:00:26'),
(10, 'fawusikaba', 'jubuguniw@mailinator.com', '123', 'Culpa dicta ut itaq', 1, 3, '2024-11-13 19:02:37'),
(11, 'noqekepigy', 'hovabyv@mailinator.com', '123', 'Ducimus suscipit vo', 0, 2, '2024-11-14 17:38:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cart_ibfk_2` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `priv`
--
ALTER TABLE `priv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `shop_users`
--
ALTER TABLE `shop_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priv_id` (`priv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `priv`
--
ALTER TABLE `priv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shop_users`
--
ALTER TABLE `shop_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `shop_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`priv_id`) REFERENCES `priv` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
