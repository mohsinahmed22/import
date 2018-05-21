-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 02:11 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `importhub_form_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brandname` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brandname`, `img`, `url`) VALUES
(11, 'Zara', '1460811175.jpg', 'https://www.zara.com/uk/'),
(13, 'Sports Direct', 'noimage.png', 'https://www.sportsdirect.com/'),
(14, 'H&M', '1450863941.jpg', 'http://www2.hm.com/en_gb'),
(15, 'Gucci', '1488063368.jpg', 'https://www.gucci.com/uk/en_gb');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` text,
  `customer_type` varchar(255) DEFAULT 'Guest'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone`, `mobile`, `address`, `customer_type`) VALUES
(26, '', '', '', '', '', '', 'Guest'),
(27, 'Tahreem', 'Quershi', 'T@gmail.com', '02136637829', '923313644820', 'C117 block J north nazimbad', 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `request_total_amount` float(8,2) DEFAULT NULL,
  `request_total_qty` int(11) DEFAULT NULL,
  `request_total_shipping_amount` float(8,2) DEFAULT NULL,
  `request_total_product_amount` float(8,2) DEFAULT NULL,
  `request_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `request_status` varchar(255) DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `customer_id`, `request_total_amount`, `request_total_qty`, `request_total_shipping_amount`, `request_total_product_amount`, `request_date`, `request_status`) VALUES
(16, 26, 1932.00, 5, 1495.00, 437.00, '2018-05-19 12:08:44', 'Processing'),
(17, 27, 1995.00, 5, 1495.00, 500.00, '2018-05-19 12:16:49', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `requested_items`
--

CREATE TABLE `requested_items` (
  `id` int(11) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `req_item_url` varchar(255) DEFAULT NULL,
  `req_item_qty` int(11) DEFAULT NULL,
  `req_item_price` float(8,2) DEFAULT NULL,
  `req_item_total` float(8,2) DEFAULT NULL,
  `shipping_cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requested_items`
--

INSERT INTO `requested_items` (`id`, `request_id`, `customer_id`, `brand_id`, `shipping_id`, `req_item_url`, `req_item_qty`, `req_item_price`, `req_item_total`, `shipping_cost`) VALUES
(5, 15, 25, 11, 299, 'http://www2.hm.com/en_gb', 1, 300.00, 300.00, NULL),
(6, 16, 26, 11, 299, 'https://www.toolmarts.com', 2, 100.00, 200.00, NULL),
(7, 16, 26, 13, 299, 'http://www2.hm.com/en_gb', 3, 79.00, 237.00, NULL),
(8, 17, 27, 11, 299, 'https://www.toolmarts.com', 3, 100.00, 300.00, NULL),
(9, 17, 27, 13, 299, 'https://www.toolmarts.com', 2, 100.00, 200.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(255) DEFAULT NULL,
  `setting_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `shipping_entity_name` varchar(255) DEFAULT NULL,
  `shipping_entity_cost` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `shipping_entity_name`, `shipping_entity_cost`) VALUES
(4, 'Shirt / Trouser', '299'),
(5, 'Shoes', '999'),
(6, 'Jacket / Coat', '999'),
(7, 'Cosmetics/Medicine', '999'),
(8, 'Handbags', '999'),
(9, 'Watches/ Sunglasses', '999'),
(10, 'Small Electronics (No Phones & Tablets)', '999'),
(11, 'Undergarments / Accessoires', '999'),
(12, 'Accessories /Misc Items', '999');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_active` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `role`, `address`, `is_active`) VALUES
(1, 'mohsin', 'test', 'Mohsin', 'Ahmed', 'designer@toolmarts.com', 1, 'admin', NULL, 1),
(2, 'shahrukh', 'aaa', 'aaa', 'Ahmed1111111111111', 'ahmed.mohsin98@gmail.com', 92, 'administrator', 'asdasdasdas', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requested_items`
--
ALTER TABLE `requested_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `requested_items`
--
ALTER TABLE `requested_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
