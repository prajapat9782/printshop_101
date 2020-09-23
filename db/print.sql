-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 07:58 AM
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
(2, 'Photo Frame', 'photoFrame3.jpg', 50, 'New Arrivals', '0', '2020-09-07 06:47:50'),
(3, 'Calender', 'calendar.jpg', 40, '40% OFF', '0', '2020-09-07 06:47:50'),
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
(2, 1, 'VIBHASHISH DAS', 'VIBHASHISHDAS@GMAIL.COM', '8890214306', 'BRAHAMPURI ROAD', 'Jaipur', 'RAJASTHAN', 302002, 1192, 'pending', 'cod', 'success', '2020-09-16 07:02:30', '', ''),
(3, 1, 'VIBHASHISH DAS', 'VIBHASHISHDAS@GMAIL.COM', '8890214306', 'BRAHAMPURI ROAD', 'Jaipur', 'RAJASTHAN', 302002, 1192, 'pending', 'cod', 'success', '2020-09-16 07:03:18', '', ''),
(4, 1, 'VIBHASHISH DAS', 'VIBHASHISHDAS@GMAIL.COM', '8890214306', 'BRAHAMPURI ROAD', 'Jaipur', 'RAJASTHAN', 302002, 1192, 'pending', 'cod', 'success', '2020-09-16 07:11:23', '', ''),
(5, 3, 'VIBHASHISH DAS', 'VIBHASHISHDAS@GMAIL.COM', '8890214306', 'BRAHAMPURI ROAD', 'Jaipur', 'RAJASTHAN', 302002, 596, 'pending', 'cod', 'success', '2020-09-17 07:00:30', '', ''),
(8, 1, 'VIBHASHISH DAS', 'VIBHASHISHDAS@GMAIL.COM', '8890214306', 'BRAHAMPURI ROAD', 'Jaipur', 'RAJASTHAN', 302002, 298, 'pending', 'on', 'pending', '2020-09-21 08:54:18', '', ''),
(13, 1, 'rahul', 'rahul@gamil.com', '9859674581', 'bajaj nagar jaipur ', 'JAIPUR', 'RAJASTHAN', 302004, 897, 'pending', 'on', 'pending', '2020-09-21 09:11:25', '', ''),
(14, 1, 'das babu', 'das@gmail.com', '7878144256', 'bhamashah technuhub', 'Jaipur', 'RAJASTHAN', 302004, 149, 'pending', 'on', 'pending', '2020-09-21 09:13:14', '', ''),
(15, 1, 'rahul', 'rahul@gamil.com', '9859674581', 'bajaj nagar jaipur', 'JAIPUR', 'RAJASTHAN', 302004, 149, 'pending', 'on', 'pending', '2020-09-22 07:07:42', '', ''),
(16, 1, 'rahul', 'rahul@gamil.com', '9859674581', 'bajaj nagar jaipur', 'JAIPUR', 'RAJASTHAN', 302004, 149, 'pending', 'on', 'pending', '2020-09-22 07:09:06', '', ''),
(17, 1, 'rahul', 'rahul@gamil.com', '9859674581', 'bajaj nagar jaipur', 'JAIPUR', 'RAJASTHAN', 302004, 149, 'pending', 'on', 'pending', '2020-09-22 07:11:35', '', ''),
(18, 1, 'mr mehta', 'das@gmail.com', '7878144256', 'bhamashah technuhub', 'Jaipur', 'RAJASTHAN', 302004, 298, 'pending', 'on', 'pending', '2020-09-22 07:16:11', '', ''),
(19, 1, 'mr mehta', 'das@gmail.com', '7878144256', 'bhamashah technuhub', 'Jaipur', 'RAJASTHAN', 302004, 1495, 'pending', 'on', 'pending', '2020-09-22 07:48:26', '', ''),
(20, 1, 'rahul', 'rahul@gamil.com', '9859674581', 'bajaj nagar jaipur', 'JAIPUR', 'RAJASTHAN', 302004, 447, 'pending', 'on', 'pending', '2020-09-22 07:50:37', 'order_Fg00xo53JO5NFL', ''),
(21, 1, 'das babu', 'das@gmail.com', '7878144256', 'bhamashah technuhub', 'Jaipur', 'RAJASTHAN', 302004, 594, 'pending', 'on', 'pending', '2020-09-22 07:54:42', 'order_Fg05HKuAsGCcfB', ''),
(22, 1, 'rahulsafasf', 'rahul@gamil.com', '9859674581', 'bajaj nagar jaipur', 'JAIPUR', 'RAJASTHAN', 302004, 447, 'pending', 'on', 'pending', '2020-09-22 08:27:41', 'order_Fg0e88bVLc3FO9', ''),
(23, 1, 'rahulsafasf', 'rahul@gamil.com', '9859674581', 'bajaj nagar jaipur', 'JAIPUR', 'RAJASTHAN', 302004, 600, 'pending', 'on', 'pending', '2020-09-22 09:35:53', 'order_Fg1o9rH8t1S1ll', ''),
(24, 1, 'das babu', 'das@gmail.com', '7878144256', 'bhamashah technuhub', 'Jaipur', 'RAJASTHAN', 302004, 1800, 'pending', 'on', 'pending', '2020-09-22 09:41:04', 'order_Fg1teOKJEUDYPr', ''),
(25, 1, 'das babu', 'das@gmail.com', '7878144256', 'bhamashah technuhub', 'Jaipur', 'RAJASTHAN', 302004, 1200, 'pending', 'on', 'pending', '2020-09-22 09:45:49', 'order_Fg1yfcN4GnjWuk', ''),
(26, 1, 'das babu', 'das@gmail.com', '7878144256', 'bhamashah technuhub', 'Jaipur', 'RAJASTHAN', 302004, 596, 'pending', 'on', 'pending', '2020-09-22 09:58:25', 'order_Fg2ByPHyj5XG7r', ''),
(27, 1, 'mr mehta', 'das@gmail.com', '7878144256', 'bhamashah technuhub', 'Jaipur', 'RAJASTHAN', 302004, 600, 'pending', 'on', 'success', '2020-09-22 09:59:07', 'order_Fg2CiRSgrBFAEG', 'pay_Fg2CvV8XGYlMrT'),
(28, 1, 'vishllsjdfajo', 'sdlfsmjf@gmail.com', '659964646465', 'dg slfjdjf j', 'j ljld;gj;j', ' jdljg', 300200, 749, 'pending', 'on', 'success', '2020-09-22 10:16:47', 'order_Fg2VMwFfzDiVFP', 'pay_Fg2VWfzUpHzNT1');

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
(1, 2, 7, 5, 745),
(2, 2, 3, 3, 447),
(3, 3, 7, 5, 745),
(4, 3, 3, 3, 447),
(5, 4, 7, 5, 745),
(6, 4, 3, 3, 447),
(7, 5, 7, 4, 596),
(8, 6, 2, 1, 149),
(9, 6, 6, 1, 299),
(10, 7, 3, 1, 149),
(11, 7, 6, 1, 299),
(12, 8, 11, 2, 298),
(13, 13, 10, 3, 897),
(14, 14, 7, 1, 149),
(15, 17, 2, 1, 149),
(16, 18, 3, 2, 298),
(17, 19, 6, 5, 1495),
(18, 20, 7, 1, 149),
(19, 20, 2, 2, 298),
(20, 21, 9, 6, 594),
(21, 22, 2, 3, 447),
(22, 23, 2, 1, 600),
(23, 24, 2, 3, 1800),
(24, 25, 2, 2, 1200),
(25, 26, 3, 4, 596),
(26, 27, 2, 1, 600),
(27, 28, 3, 1, 149),
(28, 28, 2, 1, 600);

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
  `shot_desc` varchar(255) NOT NULL,
  `long_desc` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cid`, `name`, `image`, `price`, `sell_price`, `shot_desc`, `long_desc`, `created`, `status`) VALUES
(2, 1, 'Frind Mug', 'mug.jpg', 200, 600, '      when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(3, 1, 'Mug with logo', 'mug.jpg', 200, 149, '      when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(6, 1, 'another products', 'mug4.jpg', 500, 299, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(7, 1, 'Mug with cycle', 'mug2.jpg', 200, 149, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(8, 2, 'Photo frame 1', 'mug.jpg', 400, 279, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(9, 2, 'Photo frame 2', 'mug.jpg', 200, 99, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(10, 2, 'Photo frame', 'mug4.jpg', 500, 299, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(11, 2, 'Photo frame', 'mug2.jpg', 200, 149, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(12, 1, 'New Mugs', 'mug4.jpg', 1000, 685, 'A mug is a type of cup typically used for drinking hot drinks, such as coffee, hot chocolate, or tea. Mugs usually have handles and hold a larger amount of fluid than other types of cup', ' when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2020-09-03 07:47:27', '1'),
(13, 1, 'MUg 101', 'mug4.jpg', 850, 621, 'A mug is a type of cup typically used for drinking hot drinks, such as coffee, hot chocolate, or tea. Mugs usually have handles and hold a larger amount of fluid than other types of cup', '', '2020-09-18 07:07:32', '1');

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
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
