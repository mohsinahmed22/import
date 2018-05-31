-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2018 at 06:52 AM
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
  `url` varchar(255) DEFAULT NULL,
  `standard_charges` float(8,2) DEFAULT '0.00',
  `pcs_limit` int(11) DEFAULT '2',
  `vat_charges` float(8,2) DEFAULT '0.00',
  `region_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brandname`, `img`, `url`, `standard_charges`, `pcs_limit`, `vat_charges`, `region_name`) VALUES
(11, 'Zara', '1460811175.jpg', 'https://www.zara.com/uk/', 640.00, 2, 8.30, 'UK'),
(13, 'Sports Direct', 'noimage.png', 'https://www.sportsdirect.com/', 640.00, 2, 8.30, 'UK'),
(14, 'H&M', '1450863941.jpg', 'http://www2.hm.com/en_gb', 640.00, 2, 8.30, 'US'),
(15, 'Gucci', '1488063368.jpg', 'https://www.gucci.com/uk/en_gb', 640.00, 2, 8.30, 'UK'),
(16, 'Armani', '1488063686.jpg', 'https://www.armani.com/gb/armanicom', 640.00, 2, 8.30, 'UK');

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

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `region_code` varchar(255) DEFAULT NULL,
  `region_cur` varchar(255) DEFAULT NULL,
  `region_cur_symbol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `region_name`, `region_code`, `region_cur`, `region_cur_symbol`) VALUES
(1, 'USA', 'US', 'USD', '$'),
(2, 'Canada', 'CA', 'CAD', '$'),
(3, 'Pakistan', 'PK', 'PKR', 'Rs.'),
(4, 'United Kingdom', 'UK', 'GBP', 'Â£');

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

-- --------------------------------------------------------

--
-- Table structure for table `requested_items`
--

CREATE TABLE `requested_items` (
  `id` int(11) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `brandname` varchar(255) DEFAULT NULL,
  `shipping_entity_cost` varchar(255) DEFAULT NULL,
  `req_item_url` varchar(255) DEFAULT NULL,
  `req_item_qty` int(11) DEFAULT NULL,
  `req_item_price` float(8,2) DEFAULT NULL,
  `req_item_total` float(8,2) DEFAULT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `req_item_description` text,
  `req_item_color` varchar(255) DEFAULT NULL,
  `req_item_size` varchar(255) DEFAULT NULL,
  `standard_charges` float(8,2) DEFAULT NULL,
  `vat_charges` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(255) DEFAULT NULL,
  `setting_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_name`, `setting_value`) VALUES
(1, 'store_name', 'ImportHub.pk'),
(2, 'store_phone', '923313644820'),
(3, 'store_email', 'contact@mohsin-ahmed.com'),
(4, 'store_url', 'https://www.mohsin-ahmed.com');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `shipping_entity_name` varchar(255) DEFAULT NULL,
  `shipping_entity_cost` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `shipping_entity_name`, `shipping_entity_cost`) VALUES
(4, 'Shirt / Trouser', 299.00),
(5, 'Shoes', 999.00),
(6, 'Jacket / Coat', 999.00),
(7, 'Cosmetics/Medicine', 999.00),
(8, 'Handbags', 999.00),
(9, 'Watches/ Sunglasses', 999.00),
(10, 'Small Electronics (No Phones & Tablets)', 999.00),
(11, 'Undergarments / Accessoires', 999.00),
(12, 'Accessories /Misc Items', 999.00);

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
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `requested_items`
--
ALTER TABLE `requested_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
