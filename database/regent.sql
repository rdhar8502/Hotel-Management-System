-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 05:27 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regent`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `check_in` varchar(100) DEFAULT NULL,
  `check_out` varchar(100) NOT NULL,
  `total_price` int(10) NOT NULL,
  `remaining_price` int(10) NOT NULL,
  `payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `room_id`, `booking_date`, `check_in`, `check_out`, `total_price`, `remaining_price`, `payment_status`) VALUES
(1, 1, 5, '2017-11-13 05:45:17', '13-11-2017', '15-11-2017', 3000, 0, 1),
(2, 2, 2, '2017-11-13 05:46:04', '13-11-2017', '16-11-2017', 6000, 0, 1),
(3, 3, 2, '2017-11-11 06:49:19', '11-11-2017', '14-11-2017', 6000, 0, 1),
(4, 4, 7, '2017-11-09 06:50:24', '11-11-2017', '15-11-2017', 10000, 10000, 0),
(5, 5, 13, '2017-11-17 06:59:10', '17-11-2017', '20-11-2017', 12000, 0, 1),
(6, 6, 18, '2019-05-17 13:21:11', '17-05-2019', '20-05-2019', 6000, 1500, 0),
(7, 7, 2, '2019-05-17 13:35:52', '17-05-2019', '21-05-2019', 15000, 0, 1),
(8, 8, 2, '2019-05-17 13:39:10', '24-05-2019', '28-05-2019', 15000, 15000, 0),
(9, 9, 9, '2019-05-17 13:40:36', '30-05-2019', '01-06-2019', 3000, 3000, 0),
(10, 10, 11, '2019-05-17 14:43:50', '23-05-2019', '29-05-2019', 52500, 52500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complainant_name` varchar(100) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `complaint` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resolve_status` tinyint(1) NOT NULL,
  `resolve_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `budget` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `complainant_name`, `complaint_type`, `complaint`, `created_at`, `resolve_status`, `resolve_date`, `budget`) VALUES
(1, 'Ravi Kumar Patel', 'Room Windows', 'Room Windows', '2017-11-13 06:51:24', 1, '2017-11-15 06:51:58', 1000),
(2, 'Uday Kumar', 'Light', 'Light', '2017-11-13 06:51:44', 1, '2017-11-18 07:06:02', 10000),
(3, 'Rajeev Kumar Singh', 'Water', 'Water Crisis on Bathroom', '2017-11-17 07:01:17', 1, '2017-11-18 07:01:52', 1500),
(4, 'Aniket Raj', 'Water', 'Water in boooooo', '2017-11-18 07:05:49', 1, '2019-05-17 09:41:04', 2000),
(5, 'Sourav Ganguly', 'Light', 'My room Light is disturbing!', '2019-05-17 15:00:13', 0, '2019-05-17 15:00:13', NULL),
(6, 'Kunal Khemu', 'Bed', 'Bed is Small', '2019-05-17 15:08:26', 1, '2019-05-17 15:09:08', 10000),
(7, 'Rahul Dhar', 'TV', 'Cable TV is not working!', '2019-05-18 03:26:04', 0, '2019-05-18 03:26:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_card_type_id` int(10) NOT NULL,
  `id_card_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `contact_no`, `email`, `id_card_type_id`, `id_card_no`, `address`) VALUES
(1, 'Ravi Kumar Patel', 8775566122, 'Rb@iiitvadodara.ac.in', 2, 'ABS/98564351', 'Ahmedabad'),
(2, 'Aniket Raj', 9887778878, '201452042@iiitvadodara.ac.in', 1, '422510099122', 'Ahmedabad'),
(3, 'Sunny Leone', 9887665441, 'leone123@gmail.com', 1, '422510099122', 'Punjub'),
(4, 'Uday  Kumar', 9888755544, '201452018@iiitvadoara.ac.in', 3, 'BJP2019NDA', 'Gujarat'),
(5, 'Prem Chand Saini', 9887554425, 'premchandsaini779@gmail.com', 1, '422510099122', 'Ahmedabad'),
(6, 'Rahul Dhar', 9875397872, 'rdhar8502@gmail.com', 1, '123987345287', 'Kolkata'),
(7, 'Kunal Panday', 9239786534, 'kunal@gmail.com', 1, '123456689876', 'Mumbai'),
(8, 'Sourav Ganguly', 6280426537, 'ganguly1997@gmail.com', 3, 'GA6J565DG1', 'Kolkata'),
(9, 'Kunal Khemu', 9200456740, 'khemu.kunal@gmail.com', 1, '123456789087', 'Pune'),
(10, 'Raj Kumar Rao', 9875386754, 'raj.rao@gmail.com', 3, 'GAB9876ASE', 'Karnatak');

-- --------------------------------------------------------

--
-- Table structure for table `emp_history`
--

CREATE TABLE `emp_history` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `from_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `to_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_history`
--

INSERT INTO `emp_history` (`id`, `emp_id`, `shift_id`, `from_date`, `to_date`, `created_at`) VALUES
(1, 1, 1, '2017-11-13 05:39:06', '2017-11-15 02:22:26', '2017-11-13 05:39:06'),
(2, 2, 3, '2017-11-13 05:39:39', '2017-11-15 02:22:43', '2017-11-13 05:39:39'),
(3, 3, 1, '2017-11-13 05:40:18', '2017-11-15 02:22:49', '2017-11-13 05:40:18'),
(4, 4, 1, '2017-11-13 05:40:56', '2017-11-15 02:22:35', '2017-11-13 05:40:56'),
(5, 5, 1, '2017-11-13 05:41:31', NULL, '2017-11-13 05:41:31'),
(6, 6, 3, '2017-11-13 05:42:03', NULL, '2017-11-13 05:42:03'),
(7, 7, 4, '2017-11-13 05:42:35', '2017-11-18 02:35:02', '2017-11-13 05:42:35'),
(8, 8, 3, '2017-11-13 05:43:13', '2017-11-18 02:32:26', '2017-11-13 05:43:13'),
(9, 9, 2, '2017-11-13 05:43:49', NULL, '2017-11-13 05:43:49'),
(10, 10, 1, '2017-11-13 06:30:45', '2017-11-18 02:34:28', '2017-11-13 06:30:45'),
(11, 1, 2, '2017-11-15 06:52:26', '2017-11-17 02:23:05', '2017-11-15 06:52:26'),
(12, 4, 3, '2017-11-15 06:52:35', NULL, '2017-11-15 06:52:35'),
(13, 2, 3, '2017-11-15 06:52:43', NULL, '2017-11-15 06:52:43'),
(14, 3, 3, '2017-11-15 06:52:49', NULL, '2017-11-15 06:52:49'),
(15, 1, 3, '2017-11-17 06:53:05', '2019-05-17 08:18:30', '2017-11-17 06:53:05'),
(16, 8, 1, '2017-11-18 07:02:26', NULL, '2017-11-18 07:02:26'),
(17, 11, 2, '2017-11-18 07:04:03', NULL, '2017-11-18 07:04:03'),
(18, 10, 2, '2017-11-18 07:04:28', NULL, '2017-11-18 07:04:28'),
(19, 7, 2, '2017-11-18 07:05:02', NULL, '2017-11-18 07:05:02'),
(20, 12, 1, '2019-05-14 13:02:37', NULL, '2019-05-14 13:02:37'),
(21, 1, 1, '2019-05-17 11:48:30', NULL, '2019-05-17 11:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback_name` varchar(50) NOT NULL,
  `feedback_contact` varchar(10) NOT NULL,
  `feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_name`, `feedback_contact`, `feedback`) VALUES
(1, 'Rahul Dhar', '9875397872', 'What a stunning website.'),
(2, 'Sourav Ganguly', '9876543421', 'Customer service are good.'),
(3, 'Raj Kumar Rao', '9051345654', 'Good interior!!!');

-- --------------------------------------------------------

--
-- Table structure for table `id_card_type`
--

CREATE TABLE `id_card_type` (
  `id_card_type_id` int(10) NOT NULL,
  `id_card_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_card_type`
--

INSERT INTO `id_card_type` (`id_card_type_id`, `id_card_type`) VALUES
(1, 'Aadhar Card'),
(2, 'Voter Id Card'),
(3, 'Pan Card'),
(4, 'Driving License');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `check_in_status` tinyint(1) NOT NULL,
  `check_out_status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type_id`, `room_no`, `status`, `check_in_status`, `check_out_status`, `deleteStatus`) VALUES
(2, 4, 'A-102', 1, 0, 1, 0),
(5, 1, 'B-101', NULL, 0, 1, 0),
(6, 2, 'B-102', NULL, 0, 0, 0),
(7, 3, 'B-103', 1, 0, 0, 0),
(8, 4, 'B-104', NULL, 0, 0, 0),
(9, 1, 'C-101', 1, 0, 0, 0),
(10, 2, 'C-102', NULL, 0, 0, 0),
(11, 3, 'C-103', 1, 0, 0, 0),
(12, 4, 'C-104', NULL, 0, 0, 0),
(13, 4, 'D-101', NULL, 0, 0, 0),
(18, 2, 'A-101', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(10) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `room_image` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `max_person` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type`, `room_image`, `price`, `max_person`) VALUES
(1, 'Single', 'image/single.jpg', 3000, 1),
(2, 'Double', 'image/82074854.jpg', 5000, 2),
(3, 'Triple', 'image/double-featured.jpg', 7500, 3),
(4, 'Family', 'image/3.jpg', 9000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(10) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `shift_timing` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift`, `shift_timing`) VALUES
(1, 'Morning', '4:00 AM - 10:00 AM'),
(2, 'Day', '10:00 AM - 4:00PM'),
(3, 'Evening', '4:00 PM - 10:00 PM'),
(4, 'Night', '10:00PM - 4:00AM');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `staff_type_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `id_card_type` int(11) NOT NULL,
  `id_card_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`emp_id`, `emp_name`, `staff_type_id`, `shift_id`, `id_card_type`, `id_card_no`, `address`, `contact_no`, `salary`, `joining_date`, `updated_at`) VALUES
(1, 'Prem Chand', 2, 1, 1, '422510099122', 'Jaipur, Rajasthan', 987554425, 10000, '0000-00-00 00:00:00', '2019-05-17 11:48:49'),
(2, 'Anjali Kumari', 3, 3, 1, '422510099122', 'Jaipur, Rajasthan', 976543211, 10000, '0000-00-00 00:00:00', '2017-11-13 05:44:10'),
(3, 'Ajit Kumar Jain', 2, 3, 1, '422510099122', 'Ap #897-1459 Quam Avenue', 976543111, 10000, '2017-11-13 05:40:18', '2017-11-15 06:52:49'),
(4, 'Deepak Goyal', 2, 3, 2, '0', 'Ap #897-1459 Quam Avenue', 987654321, 100000, '2017-11-13 05:40:55', '2017-11-15 06:52:35'),
(5, 'Sharad Patel', 4, 1, 1, '12345341212', 'Ap #897-1459 Quam Avenue', 9876543212, 10000, '2017-11-13 05:41:31', '2017-11-13 05:41:31'),
(6, 'Vijay Anand', 3, 3, 3, '0', 'Ap #897-1459 Quam Avenue', 1234567890, 100000, '2017-11-13 05:42:03', '2017-11-13 05:42:03'),
(7, 'Lalit  Kumar', 2, 2, 1, '422510099122', 'Ap #897-1459 Quam Avenue', 12322332231, 100000, '2017-11-13 05:42:35', '2017-11-18 07:05:02'),
(8, 'Rajeev Kumar Singh', 1, 1, 4, '0', 'Ap #897-1459 Quam Avenue', 976543456, 10000, '2017-11-13 05:43:13', '2017-11-18 07:02:26'),
(9, 'Himanshu  Soni', 3, 2, 4, '0', 'Ap #897-1459 Quam Avenue', 98765432123, 100000, '2017-11-13 05:43:49', '2017-11-13 05:43:49'),
(10, 'Sandeep Merutha', 5, 2, 1, '422510099122', 'Ap #897-1459 Quam Avenue', 9887665534, 1000, '2017-11-13 06:30:45', '2017-11-18 07:04:28'),
(11, 'Aniket Raj', 3, 2, 1, '0', 'Ap #897-1459 Quam Avenue', 9887556655, 10000, '2017-11-18 07:04:03', '2017-11-18 07:04:03'),
(12, 'Koushik Bashak', 1, 1, 2, 'ABS/12345678', 'Kolkata', 7044780346, 70000, '2019-05-14 13:02:37', '2019-05-14 13:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE `staff_type` (
  `staff_type_id` int(10) NOT NULL,
  `staff_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`staff_type_id`, `staff_type`) VALUES
(1, 'Manager'),
(2, 'Cleaning'),
(3, 'Reception'),
(4, 'Cook'),
(5, 'Waiter');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `user_type`, `password`, `created_at`) VALUES
(1, 'Rahul Dhar', 'rdhar8502', 'rdhar8502@gmail.com', 'user', '1234', '2017-11-12 10:04:03'),
(2, 'Admin', 'admin1234', 'admin@admin.com', 'admin', 'admin', '2019-05-17 10:41:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id_type` (`id_card_type_id`);

--
-- Indexes for table `emp_history`
--
ALTER TABLE `emp_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_card_type`
--
ALTER TABLE `id_card_type`
  ADD PRIMARY KEY (`id_card_type_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `id_card_type` (`id_card_type`),
  ADD KEY `shift_id` (`shift_id`),
  ADD KEY `staff_type_id` (`staff_type_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`staff_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emp_history`
--
ALTER TABLE `emp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `id_card_type`
--
ALTER TABLE `id_card_type`
  MODIFY `id_card_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
