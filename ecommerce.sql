-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2019 at 05:39 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin-register`
--

CREATE TABLE `admin-register` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `files` varchar(128) NOT NULL,
  `role` varchar(11) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin-register`
--

INSERT INTO `admin-register` (`id`, `first_name`, `last_name`, `email`, `password`, `files`, `role`) VALUES
(1, 'shuvo', 'khan', 'rafiqulislamsuvobd@gmail.com', '$2y$10$aSjzv5XoUp.oghLO.R1/C.mkKxp0d0foWvRcsUA4IQdBkW1NC3Bda', 'PPI_5c8f2ab770e2c4.835644641552886455.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(156) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `name`, `slug`, `active`) VALUES
(1, 'Mobile', 'mobile', 1),
(3, 'Laptop', 'laptop', 1),
(4, 'Clothes', 'clothes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `shipping_address` text,
  `total_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `payment_method` varchar(64) NOT NULL DEFAULT 'cod',
  `payment_details` text,
  `status` varchar(32) NOT NULL DEFAULT 'pending',
  `current_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `image`, `price`, `active`, `created_at`) VALUES
(1, 2, 'Lenovo', 'Lenovo', 'Lenovo', 'https://via.placeholder.com/348x225/09f', '50000', 1, '2019-03-31 09:07:44'),
(2, 3, 'T-shirt', 'tshirt', 'T-shirt', 'https://via.placeholder.com/348x225/09f', '60000', 1, '2019-03-31 09:15:12'),
(3, 4, 'iphone', 'iphone', 'iphone 7', 'https://via.placeholder.com/348x225/09f', '6000', 1, '2019-03-31 11:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `files` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `first_name`, `last_name`, `email`, `password`, `files`) VALUES
(1, 'shuvo', 'khan', 'cse.engr.shuvo@gmail.com', '$2y$10$Knj20td2cCdqCuQejqh/b.Ep.Av5.AsdlAet6xA2DYAgK1LqsCBkS', 'PPI_5c8cd95a90d748.240386821552734554.png'),
(2, 'shuvo', 'khan', 'cse.engr.shuvo@gmail.com', '$2y$10$IUiu09Sd5ToVVrZ6UGAQGuv.mT368fJznIOnRuC4VqfIHjIymVYX2', 'PPI_5c8cd9c2d437c2.918787351552734658.png'),
(3, 'moin', 'khan', 'cse.engr.shuvo@gmail.com', '$2y$10$BkYhn3oFLuyTY5Z4GUsaAu0lo.uz6SYHNgNzwZnfcHu9PgW3q8k3y', 'PPI_5c8f269b742718.396374751552885403.jpg'),
(4, 'maria', 'khan', 'maria@gmail.com', '$2y$10$oXk7BIzzvjEJQO9a4CLJVuv27Ty0Juuytj1mXDh3ZkTTY/7wdI8B2', 'PPI_5c9244b4caa258.658970211553089716.jpg'),
(5, 'juber', 'khan', 'jubu@gmail.com', '$2y$10$JPL1RtlE3lrv9Itt6recEuDR6xdtaeGxlncYJwHI./OAm9mK4MZ36', 'PPI_5c9270b026fc78.780555781553100976.jpg'),
(6, 'roni', 'ahmed', 'roni@gmail.com', '$2y$10$OHg5Qa1Spq4RcZUWsB3O4.0ahJtwvy0SgfkKvqLshIT1joAfxAn2q', 'PPI_5c95d89023ee30.539432741553324176.jpg'),
(7, 'sohel', 'khan', 'so@gmail.com', '$2y$10$Z7nCN.xQnXOpj6VlxqhTduAkBSFTBGztlQrJtMwz1Ek4I4KDETf8u', 'PPI_5c95e1c1ac3993.184674301553326529.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `username` varchar(65) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `address` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(16) DEFAULT 'user',
  `email_varification_token` varchar(96) NOT NULL,
  `email_varified_at` timestamp NULL DEFAULT NULL,
  `password_reset_token` varchar(96) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `country` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin-register`
--
ALTER TABLE `admin-register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin-register`
--
ALTER TABLE `admin-register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
