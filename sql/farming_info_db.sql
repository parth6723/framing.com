-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 03:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farming_info_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$ukzrnW08VOyJkK7xdfj5TufVVPWurWbbC0quGrOsE9ua/lLtDHpNa', 'admin@gmail.com'),
(2, 'pratik', '$2y$10$VbucICIlFsFEo4aI6i7XLu03a7BSmY96zklwSziq2k/kUP7J73c.u', 'p@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user`, `product_name`, `product_price`, `img_path`, `created_at`) VALUES
(1, 'parth', 'Rice Seeds', '18.00', 'images/seeds2.jpg', '2024-09-12 11:05:46'),
(2, 'admin', 'Organic Wheat', '25.00', 'images/seeds1.jpg', '2024-09-12 11:28:23'),
(3, 'admin', 'Tomato Seeds', '15.00', 'images/seeds6.jpg', '2024-09-12 11:39:29'),
(4, 'admin', 'Hoe', '18.00', 'images/tools4.jpg', '2024-09-12 11:42:11'),
(5, 'admin', 'Organic Wheat', '25.00', 'images/seeds1.jpg', '2024-09-12 11:47:11'),
(6, 'admin', 'Organic Wheat', '25.00', 'images/seeds1.jpg', '2024-09-12 11:47:59'),
(7, 'admin', 'Organic Wheat', '25.00', 'images/seeds1.jpg', '2024-09-12 11:51:05'),
(8, 'admin', 'Organic Wheat', '25.00', 'images/seeds1.jpg', '2024-09-12 12:03:21'),
(9, 'admin', 'Organic Wheat', '25.00', 'images/seeds1.jpg', '2024-09-12 12:06:15'),
(10, 'admin', 'Organic Wheat', '25.00', 'images/seeds1.jpg', '2024-09-12 12:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Seeds'),
(2, 'Tools'),
(3, 'Fertilizers'),
(4, 'Machinery');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Accepted','Canceled') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `product_name`, `quantity`, `total_price`, `created_at`, `status`) VALUES
(1, 'parth', 'Tractor', 12, '60000.00', '2024-09-12 05:47:13', 'Canceled'),
(2, 'admin', 'Organic Wheat', 1, '25.00', '2024-09-12 06:42:35', 'Canceled'),
(3, 'admin', 'Hand Rake', 1, '12.00', '2024-09-12 06:43:13', 'Accepted'),
(4, 'admin', 'Rice Seeds', 1, '18.00', '2024-09-12 06:43:53', 'Accepted'),
(5, 'admin', 'Tractor', 1, '5000.00', '2024-09-12 06:46:40', 'Accepted'),
(6, 'parth', 'Organic Wheat', 1, '25.00', '2024-10-03 21:22:14', 'Pending'),
(7, 'admin', 'Organic Wheat', 1, '25.00', '2024-10-04 03:28:16', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `image`, `quantity_available`) VALUES
(1, 'Rice Seeds', '18.00', 1, 'images/seeds2.jpg', 100),
(2, 'Organic Wheat', '25.00', 1, 'images/seeds1.jpg', 50),
(3, 'Tomato Seeds', '15.00', 1, 'images/seeds6.jpg', 200),
(4, 'Hoe', '18.00', 2, 'images/tools4.jpg', 100),
(5, 'Hand Rake', '12.00', 2, 'images/tools1.jpg', 150),
(6, 'Tractor', '5000.00', 4, 'images/machinery1.jpg', 20),
(7, 'Organic Fertilizer', '30.00', 3, 'images/fertilizers1.jpg', 80),
(8, 'Pepper Seeds', '16.00', 1, 'images/seeds5.jpg', 150),
(9, 'Corn Seeds', '22.00', 1, 'images/seeds3.jpg', 70),
(10, 'Farming Tools Set', '45.00', 2, 'images/tools5.jpg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_text` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'parth', 'viramgamiparth@gmail.com', '$2y$10$e8QxmDIu2FxzrcLrJIxq6OT8XUtbdytU1.2sC7rmQZaLOwh884lTq', 'user'),
(2, 'admin', 'admin@gmail.com', '$2y$10$Ih7VezP7f4sSKNk7WOev3.VGCvoZfOy9XNug6xw5HmxEF3oY/rs3G', 'admin'),
(3, 'pratik', 'p@gmail.com', '$2y$10$VbucICIlFsFEo4aI6i7XLu03a7BSmY96zklwSziq2k/kUP7J73c.u', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
