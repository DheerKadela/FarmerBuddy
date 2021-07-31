-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 12:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(32, 'Apple'),
(33, 'Banana'),
(34, 'tomato'),
(35, 'Cherry'),
(36, 'Banana');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(30) NOT NULL,
  `ip_ad` int(50) NOT NULL,
  `qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_ad`, `qty`) VALUES
(28, 1, 0),
(29, 1, 0),
(30, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(30) NOT NULL,
  `cat_tittle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_tittle`) VALUES
(93, 'Fruits'),
(94, 'Fruits'),
(95, 'Vegitables'),
(96, 'Fruits'),
(97, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `cost_id` int(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `mobile` int(13) NOT NULL,
  `address` varchar(200) NOT NULL,
  `cost_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`cost_id`, `email`, `country`, `city`, `password`, `name`, `mobile`, `address`, `cost_ip`) VALUES
(2, 'dheer@gmail.com', 'india', 'jaisalmer', '12345', 'dheer', 34567, 'fghjk', '1'),
(3, 'dheer@gmail.com', 'india', 'fghjk', 'dheer', 'dheeraj', 34567, 'ghjk', '1');

-- --------------------------------------------------------

--
-- Table structure for table `costumer_order`
--

CREATE TABLE `costumer_order` (
  `order_id` int(11) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `total_product` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer_order`
--

INSERT INTO `costumer_order` (`order_id`, `costumer_id`, `due_amount`, `invoice_number`, `total_product`, `order_date`, `order_status`) VALUES
(0, 7, 345, 0, 1, '2018-12-28 15:38:03', 'pendding'),
(0, 7, 345, 0, 1, '2018-12-28 15:40:05', 'pendding'),
(0, 7, 345, 0, 1, '2018-12-28 15:40:07', 'pendding'),
(0, 7, 690, 0, 2, '2018-12-28 15:42:12', 'pendding'),
(0, 7, 690, 0, 2, '2018-12-28 15:50:51', 'pendding'),
(0, 7, 690, 0, 2, '2018-12-29 05:26:29', 'pendding'),
(0, 7, 690, 0, 2, '2018-12-29 05:31:54', 'pendding'),
(0, 7, 690, 654, 2, '2018-12-30 04:39:07', 'pendding'),
(0, 7, 690, 873, 2, '2018-12-30 05:00:54', 'pendding'),
(0, 7, 690, 545, 2, '2018-12-30 05:04:59', 'pendding'),
(0, 7, 690, 526, 2, '2018-12-30 05:07:02', 'pendding'),
(0, 7, 690, 397, 2, '2018-12-30 05:22:51', 'pendding'),
(0, 7, 0, 648, 1, '2018-12-30 05:27:00', 'pendding'),
(0, 7, 345, 664, 1, '2018-12-30 05:32:18', 'pendding'),
(0, 7, 3456, 357, 1, '2018-12-30 05:34:02', 'pendding'),
(0, 7, 3456, 269, 2, '2018-12-30 05:35:41', 'pendding'),
(0, 7, 46024, 816, 2, '2018-12-30 07:51:59', 'pendding'),
(0, 7, 0, 193, 1, '2018-12-30 07:52:57', 'pendding'),
(0, 7, 3456, 918, 1, '2018-12-30 07:54:06', 'pendding'),
(0, 7, 3456, 427, 1, '2018-12-30 07:56:40', 'pendding'),
(0, 7, 0, 189, 1, '2018-12-30 07:58:28', 'pendding'),
(0, 7, 49135, 660, 2, '2018-12-30 09:11:09', 'pendding'),
(0, 7, 45679, 882, 1, '2019-01-02 08:38:29', 'pendding'),
(0, 7, 345, 669, 1, '2019-01-02 08:47:37', 'pendding');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `f_id` int(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `f_gamil` varchar(100) NOT NULL,
  `f_phone` varchar(13) NOT NULL,
  `f_password` varchar(100) NOT NULL,
  `f-contry` varchar(100) NOT NULL,
  `f_city` varchar(100) NOT NULL,
  `f_address` varchar(100) NOT NULL,
  `f_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`f_id`, `f_name`, `f_gamil`, `f_phone`, `f_password`, `f-contry`, `f_city`, `f_address`, `f_ip`) VALUES
(1, 'dheer', 'dheer@gmail.com', '34567890', 'dfg', 'vbnm', 'fghj', 'vbnm', '1'),
(2, 'dheeraj', 'dheerajram52@gmail.com', '345678', 'dheeer', 'dfghjk', 'rthjkl', 'dfghjk', '1'),
(3, 'dheeraj ', 'dheerkadela@gmail.com', '3456789', 'dheer', 'fghj', 'vhjkl', 'ghj', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pendding_order`
--

CREATE TABLE `pendding_order` (
  `costumer_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qtity` int(11) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendding_order`
--

INSERT INTO `pendding_order` (`costumer_id`, `invoice_number`, `product_id`, `qtity`, `order_status`) VALUES
(7, 397, 14, 2, 0),
(7, 648, 21, 1, 0),
(7, 664, 14, 1, 0),
(7, 357, 16, 1, 0),
(7, 269, 21, 2, 0),
(7, 816, 19, 2, 0),
(7, 193, 21, 1, 0),
(7, 918, 15, 1, 0),
(7, 427, 16, 1, 0),
(7, 189, 21, 1, 0),
(7, 660, 20, 2, 0),
(7, 882, 20, 1, 0),
(7, 669, 13, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` varchar(50) NOT NULL,
  `Product_img2` varchar(100) NOT NULL,
  `Product_img3` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `dec` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `Product_img2`, `Product_img3`, `product_price`, `dec`, `status`) VALUES
(27, 93, 32, '2019-05-17 08:17:18', 'Apple', 'apples-red-green-apple-62665.jpeg', 'pexels-photo-672101.jpeg', 'pexels-photo-347926.jpeg', 25, 'For Sale', 'Buddy'),
(28, 93, 33, '2019-05-17 08:17:18', 'Banana', 'banana-fruit-healthy-yellow-41957.jpeg', '', '', 26, 'Buddy', 'Buddt'),
(29, 95, 34, '2019-05-17 08:21:06', 'Tomato', 'pexels-photo-107524.jpeg', 'pexels-photo-1400171.jpeg', 'tomatoes-vegetables-red-delicious-68133.jpeg', 30, 'For Sale', 'Available'),
(30, 93, 35, '2019-05-17 09:40:02', 'Cherry', 'pexels-photo-165776.jpeg', 'paprika-vegetables-colorful-food-57426.jpeg', 'night-fruits-currants.jpg', 60, 'hello cherry', ''),
(31, 93, 33, '2019-05-20 16:12:43', 'Banana', 'banana-fruit-healthy-yellow-41957.jpeg', 'banana-fruit-healthy-yellow-41957.jpeg', 'banana-fruit-healthy-yellow-41957.jpeg', 30, 'For Sale', 'sale');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`cost_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `cost_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `f_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
