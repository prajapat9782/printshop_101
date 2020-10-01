-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 10:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `print`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `aff_login`
--

CREATE TABLE `aff_login` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `paid` float NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aff_login`
--

INSERT INTO `aff_login` (`id`, `name`, `username`, `password`, `email`, `mobile`, `paid`, `status`, `created`) VALUES
(1, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'nir@gmail.com', '', 0, '1', '2020-10-01 08:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `off` int(10) NOT NULL,
  `tag` text NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `off`, `tag`, `status`, `created`) VALUES
(1, 'mugs', 'mugs.jpg', 75, 'Exclusive Item', '1', '2020-09-07 06:47:50'),
(2, 'Photo Frame', 'photoFrame3.jpg', 50, 'New Arrivals', '1', '2020-09-07 06:47:50'),
(3, 'Calender', 'calendar.jpg', 40, '40% OFF', '1', '2020-09-07 06:47:50'),
(4, 'Keychain', 'photoFrame3.jpg', 30, 'New Collection', '1', '2020-09-07 06:47:50'),
(5, 'Cushion', 'photoFrame2.jpg', 45, 'New Collection', '1', '2020-09-07 06:47:50'),
(6, 'new category', 'Premium.jpg', 0, 'Exclusive', '0', '2020-09-10 07:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(9) NOT NULL,
  `bill_name` varchar(50) NOT NULL,
  `bill_email` varchar(50) NOT NULL,
  `bill_contact` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_statue` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `payment_statue` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `razor_pay_order_id` varchar(255) NOT NULL,
  `razor_pay_payment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `bill_name`, `bill_email`, `bill_contact`, `address`, `city`, `state`, `zipcode`, `order_amount`, `order_statue`, `payment_type`, `payment_statue`, `created`, `razor_pay_order_id`, `razor_pay_payment_id`) VALUES
(1, 1, 'VIBHASHISH DAS', 'VIBHASHISHDAS@GMAIL.COM', '8890214306', 'BRAHAMPURI ROAD', 'Jaipur', 'RAJASTHAN', 302002, 1796, '7', 'cod', 'success', '2020-09-25 07:36:35', '', ''),
(4, 1, 'rahul', 'rahul@gamil.com', '9859674581', 'bajaj nagar jaipur', 'JAIPUR', 'RAJASTHAN', 302004, 1045, '2', 'on', 'success', '2020-09-25 07:39:05', 'order_FhBQA5hYn1gltO', 'pay_FhBQQmowCRsu9f'),
(5, 1, 'das babu', 'das@gmail.com', '7878144256', 'bhamashah technuhub', 'Jaipur', 'RAJASTHAN', 302004, 897, '1', 'on', 'success', '2020-09-25 12:06:41', 'order_FhFyqfsMrSIzMO', 'pay_FhFz5faNIs4ohA');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(9) NOT NULL,
  `product_id` int(9) NOT NULL,
  `qty` int(9) NOT NULL,
  `sub_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `sub_total`) VALUES
(1, 1, 2, 2, 1200),
(2, 1, 7, 4, 596),
(3, 4, 6, 2, 598),
(4, 4, 3, 3, 447),
(5, 5, 10, 3, 897);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `sn` int(11) NOT NULL,
  `staus_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`sn`, `staus_name`) VALUES
(1, 'Pending'),
(2, 'Confirm'),
(3, 'In Process'),
(4, 'Picked'),
(5, 'Out For Delivery'),
(6, 'Cancel'),
(7, 'Delivered'),
(8, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cid` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `hollsell_price` float NOT NULL,
  `shot_desc` varchar(255) NOT NULL,
  `long_desc` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cid`, `name`, `image`, `price`, `sell_price`, `hollsell_price`, `shot_desc`, `long_desc`, `created`, `status`) VALUES
(2, 1, 'Frind Mug', 'mug.jpg', 200, 600, 0, '      when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(3, 1, 'Mug with logo', 'mug.jpg', 200, 149, 0, '      when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(6, 1, 'another products', 'mug4.jpg', 500, 299, 0, ' when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(7, 1, 'Mug with cycle', 'mug2.jpg', 200, 149, 0, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(8, 2, 'Photo frame 1', 'mug.jpg', 400, 279, 0, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(9, 2, 'Photo frame 2', 'mug.jpg', 200, 99, 0, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(10, 2, 'Photo frame', 'mug4.jpg', 500, 299, 0, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(11, 2, 'Photo frame', 'mug2.jpg', 200, 149, 0, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(12, 1, 'New Mugs', 'mug4.jpg', 1000, 685, 0, 'A mug is a type of cup typically used for drinking hot drinks, such as coffee, hot chocolate, or tea. Mugs usually have handles and hold a larger amount of fluid than other types of cup', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(13, 1, 'MUg 101', 'mug4.jpg', 850, 621, 0, 'A mug is a type of cup typically used for drinking hot drinks, such as coffee, hot chocolate, or tea. Mugs usually have handles and hold a larger amount of fluid than other types of cup', '', '2020-09-18 07:07:32', '1');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(9) NOT NULL,
  `review` text NOT NULL,
  `review_rating` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(255) NOT NULL,
  `house` text NOT NULL,
  `colony` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `landmark` text NOT NULL,
  `zipcode` int(8) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `mobile`, `password`, `image`, `house`, `colony`, `city`, `state`, `landmark`, `zipcode`, `address`, `status`, `created`) VALUES
(1, 'vishal', 'prajapat', 'vishal@gmail.com', '9898989898', '123456', 'user/vishal.jpg', 'house no 5', 'shiv colony', 'jaipur', 'rajasthan', 'kendriya vidhalaya no 3', 302004, 'house no 5, shiv colony, jaipur 302004,rajasthan', 1, '2020-09-08 06:07:28'),
(2, 'VIBHASHISH', 'DAS', 'VIBHASHISHDAS@GMAIL.COM', '8890214306', '123456', '', '', '', '', '', '', 0, '', 0, '2020-09-14 04:41:24'),
(3, 'VIBHASHISH', 'DAS', 'vishalajljsfdlj@gmail.com', '8890214306', '7894561234659', '', '', '', '', '', '', 0, '', 0, '2020-09-17 07:00:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aff_login`
--
ALTER TABLE `aff_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aff_login`
--
ALTER TABLE `aff_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
