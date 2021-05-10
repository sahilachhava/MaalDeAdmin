-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2021 at 08:05 AM
-- Server version: 5.6.42-84.2
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activeme_maalde`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `admin_id` int(3) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_phone` varchar(15) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`admin_id`, `admin_name`, `admin_phone`, `admin_pass`) VALUES
(1, 'K Vijay Kumar', '9011111111', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `category_details`
--

CREATE TABLE `category_details` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_shortcode` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_details`
--

INSERT INTO `category_details` (`category_id`, `category_name`, `category_shortcode`) VALUES
(1, 'Patiyala', 'P'),
(2, 'Suit', 'S'),
(3, 'Ghaghra', 'G'),
(4, 'Lengha', 'L'),
(5, 'Net', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_firmname` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_address` varchar(200) DEFAULT NULL,
  `customer_pass` varchar(50) NOT NULL,
  `customer_active` int(1) NOT NULL DEFAULT '0',
  `customer_cart` int(10) DEFAULT '0',
  `customer_isonline` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `customer_firmname`, `customer_phone`, `customer_address`, `customer_pass`, `customer_active`, `customer_cart`, `customer_isonline`) VALUES
(1, 'Vihar Contractor', 'GLS ', '8866725957', 'Law Garden, Ellisbridge', '12345', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dropbox_details`
--

CREATE TABLE `dropbox_details` (
  `dropbox_id` int(5) NOT NULL,
  `dropbox_filename` varchar(50) NOT NULL,
  `dropbox_fileurl` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_details`
--

CREATE TABLE `image_details` (
  `image_id` int(10) NOT NULL,
  `image_path` varchar(150) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `admin_id` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_details`
--

INSERT INTO `image_details` (`image_id`, `image_path`, `product_id`, `admin_id`) VALUES
(1, 'http://maalde.activemedia.in/dress_images/1/1.jpg', '1', 'K Vijay Kumar'),
(2, 'http://maalde.activemedia.in/dress_images/2/1.jpg', '2', 'K Vijay Kumar'),
(3, 'http://maalde.activemedia.in/dress_images/3/1.jpg', '3', 'K Vijay Kumar'),
(4, 'http://maalde.activemedia.in/dress_images/4/1.jpg', '4', 'K Vijay Kumar'),
(5, 'http://maalde.activemedia.in/dress_images/5/1.jpg', '5', 'K Vijay Kumar'),
(6, 'http://maalde.activemedia.in/dress_images/6/1.jpg', '6', 'K Vijay Kumar'),
(7, 'http://maalde.activemedia.in/dress_images/7/1.jpg', '7', 'K Vijay Kumar'),
(8, 'http://maalde.activemedia.in/dress_images/8/1.jpg', '8', 'K Vijay Kumar'),
(9, 'http://maalde.activemedia.in/dress_images/9/1.jpg', '9', 'K Vijay Kumar'),
(10, 'http://maalde.activemedia.in/dress_images/10/1.jpg', '10', 'K Vijay Kumar'),
(11, 'http://maalde.activemedia.in/dress_images/1/2.jpg', '1', 'K Vijay Kumar'),
(12, 'http://maalde.activemedia.in/dress_images/2/2.jpg', '2', 'K Vijay Kumar'),
(13, 'http://maalde.activemedia.in/dress_images/1/3.jpg', '1', 'K Vijay Kumar'),
(14, 'http://maalde.activemedia.in/dress_images/1/4.jpg', '1', 'K Vijay Kumar'),
(15, 'http://maalde.activemedia.in/dress_images/1/5.jpg', '1', 'K Vijay Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

CREATE TABLE `item_details` (
  `item_id` int(11) NOT NULL,
  `design_no` int(11) DEFAULT NULL,
  `size_l` int(11) DEFAULT '0',
  `size_xl` int(11) DEFAULT '0',
  `size_xxl` int(11) DEFAULT '0',
  `design_amt` int(11) DEFAULT '0',
  `order_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`item_id`, `design_no`, `size_l`, `size_xl`, `size_xxl`, `design_amt`, `order_id`) VALUES
(1, 2, 2, 0, 0, 1450, 1),
(2, 1, 2, 0, 0, 1050, 2),
(3, 2, 2, 0, 0, 1450, 2),
(4, 3, 2, 0, 0, 1150, 2),
(5, 4, 2, 0, 0, 950, 2),
(6, 1, 0, 0, 2, 1050, 3),
(7, 2, 0, 0, 2, 1450, 3),
(8, 4, 0, 0, 2, 950, 3),
(9, 3, 0, 0, 2, 1150, 3),
(10, 5, 0, 0, 2, 1100, 3),
(11, 6, 0, 0, 2, 1550, 3),
(12, 8, 0, 0, 2, 1250, 3),
(13, 7, 0, 0, 2, 1600, 3),
(14, 10, 0, 0, 2, 750, 3),
(15, 9, 0, 0, 2, 1350, 3),
(16, 1, 0, 2, 2, 2100, 4),
(17, 2, 2, 2, 0, 2900, 4),
(18, 4, 0, 2, 0, 950, 4),
(19, 3, 2, 2, 0, 2300, 4),
(20, 6, 2, 2, 2, 4650, 5),
(21, 7, 0, 2, 2, 3200, 5),
(22, 10, 2, 2, 0, 1500, 5),
(23, 9, 0, 2, 0, 1350, 5),
(24, 1, 0, 2, 2, 2100, 6),
(25, 2, 0, 2, 0, 1450, 6),
(26, 4, 2, 2, 0, 1900, 6),
(27, 3, 0, 2, 2, 2300, 6),
(28, 7, 0, 2, 2, 3200, 6),
(29, 9, 0, 2, 2, 2700, 6),
(30, 2, 2, 2, 2, 4350, 7),
(31, 4, 2, 2, 2, 2850, 7),
(32, 3, 2, 2, 2, 3450, 7),
(33, 5, 0, 2, 2, 2200, 7),
(34, 8, 2, 2, 0, 2500, 7),
(35, 10, 2, 2, 0, 1500, 7),
(36, 1, 0, 0, 2, 1050, 8),
(37, 2, 2, 2, 0, 2900, 8),
(38, 3, 0, 2, 2, 2300, 8),
(39, 6, 2, 2, 0, 3100, 8),
(40, 9, 0, 2, 2, 2700, 9),
(41, 10, 2, 2, 0, 1500, 9),
(42, 8, 2, 2, 0, 2500, 9),
(43, 1, 0, 2, 2, 2100, 10),
(44, 2, 2, 2, 0, 2900, 10),
(45, 4, 2, 2, 0, 1900, 10),
(46, 3, 0, 2, 2, 2300, 10),
(47, 4, 20, 2, 2, 11400, 11);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL,
  `customer_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_total` int(11) DEFAULT NULL,
  `n_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`n_id`, `customer_name`, `order_id`, `order_total`, `n_status`) VALUES
(1, 'Vishal Narvani', 1, 1450, 1),
(2, 'Vishal Narvani', 2, 4600, 1),
(3, 'Vishal Narvani', 3, 12200, 1),
(4, 'Vishal Narvani', 4, 8250, 1),
(5, 'Vishal Narvani', 5, 10700, 1),
(6, 'Vishal Narvani', 6, 13650, 1),
(7, 'Vishal Narvani', 7, 16850, 1),
(8, 'Vishal Narvani', 8, 9350, 1),
(9, 'Vishal Narvani', 9, 6700, 1),
(10, 'Vishal Narvani', 10, 9200, 1),
(11, 'Vihar Contractor', 11, 11400, 1),
(12, '', 12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(10) NOT NULL,
  `order_price` varchar(10) DEFAULT NULL,
  `order_datetime` varchar(20) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `admin_id` int(5) DEFAULT NULL,
  `order_status` int(5) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `order_price`, `order_datetime`, `customer_id`, `admin_id`, `order_status`) VALUES
(1, '1450', '21/4/2019  7:54:41 P', 1, 1, 1),
(2, '4600', '21/4/2019  7:55:53 P', 1, 1, 2),
(3, '12200', '21/4/2019  7:57:3 PM', 1, NULL, 0),
(4, '8250', '21/4/2019  7:57:36 P', 1, 1, 2),
(5, '10700', '21/4/2019  7:57:49 P', 1, 1, 1),
(6, '13650', '21/4/2019  7:58:13 P', 1, NULL, 0),
(7, '16850', '21/4/2019  7:58:35 P', 1, 1, 1),
(8, '9350', '21/4/2019  7:58:49 P', 1, NULL, 0),
(9, '6700', '21/4/2019  7:59:9 PM', 1, 1, 2),
(10, '9200', '21/4/2019  7:59:25 P', 1, NULL, 0),
(11, '11400', '22/4/2019  10:48:10 ', 1, 1, 1),
(12, '', '', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `otp_details`
--

CREATE TABLE `otp_details` (
  `otp` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `otp_details`
--

INSERT INTO `otp_details` (`otp`, `phone`) VALUES
('2065865', '8866725957'),
('9294457', '8866725957'),
('2347600', '8866725957'),
('9844586', '8866725957'),
('2701382', '8866725957'),
('9715810', '8866725957');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` int(11) NOT NULL,
  `design_no` int(11) DEFAULT NULL,
  `product_images` varchar(250) DEFAULT NULL,
  `l_qty` int(11) DEFAULT '100',
  `xl_qty` int(11) DEFAULT '50',
  `xxl_qty` int(11) DEFAULT '25',
  `category` varchar(100) DEFAULT NULL,
  `total_piece` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `design_no`, `product_images`, `l_qty`, `xl_qty`, `xxl_qty`, `category`, `total_piece`, `total_amount`) VALUES
(1, 1, 'http://maalde.activemedia.in/dress_images/1/', 100, 50, 25, 'P', 2, 1050),
(2, 2, 'http://maalde.activemedia.in/dress_images/2/', 100, 50, 25, 'P', 3, 1450),
(3, 3, 'http://maalde.activemedia.in/dress_images/3/', 100, 50, 25, 'P', 2, 1150),
(4, 4, 'http://maalde.activemedia.in/dress_images/4/', 100, 50, 25, 'S', 3, 950),
(5, 5, 'http://maalde.activemedia.in/dress_images/5/', 100, 50, 25, 'S', 2, 1100),
(6, 6, 'http://maalde.activemedia.in/dress_images/6/', 100, 50, 25, 'L', 2, 1550),
(7, 7, 'http://maalde.activemedia.in/dress_images/7/', 100, 50, 25, 'L', 2, 1600),
(8, 8, 'http://maalde.activemedia.in/dress_images/8/', 100, 50, 25, 'G', 2, 1250),
(9, 9, 'http://maalde.activemedia.in/dress_images/9/', 100, 50, 25, 'G', 2, 1350),
(10, 10, 'http://maalde.activemedia.in/dress_images/10/', 100, 50, 25, 'N', 2, 750);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `purchase_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_qty` int(10) NOT NULL,
  `product_size` varchar(15) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_deliverdate` varchar(20) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `admin_id` int(5) NOT NULL,
  `purchase_status` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size_details`
--

CREATE TABLE `size_details` (
  `size_id` int(2) NOT NULL,
  `size` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size_details`
--

INSERT INTO `size_details` (`size_id`, `size`) VALUES
(1, 'L'),
(2, 'XL'),
(3, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `subadmin_details`
--

CREATE TABLE `subadmin_details` (
  `subadmin_id` int(3) NOT NULL,
  `subadmin_name` varchar(30) NOT NULL,
  `subadmin_phone` varchar(15) NOT NULL,
  `subadmin_pass` varchar(50) DEFAULT '12345678',
  `subadmin_active` int(1) NOT NULL DEFAULT '0',
  `subadmin_isonline` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subadmin_details`
--

INSERT INTO `subadmin_details` (`subadmin_id`, `subadmin_name`, `subadmin_phone`, `subadmin_pass`, `subadmin_active`, `subadmin_isonline`) VALUES
(1, 'Sahil', '9327056032', '12345', 1, 0),
(2, 'Maulesh', '9111111111', '12345', 1, 0),
(3, 'Vihar', '9211111111', '12345', 1, 0),
(4, 'Nidhi Vyas', '9311111111', '12345', 1, 0),
(5, 'Kuntal', '9411111111', '12345', 1, 0),
(6, 'Driti ', '8128610312', '123456', 1, 0),
(7, 'Arpit', '9811111111', '12345', 0, 0),
(8, 'Aditi', '9974341549', '12345678', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `supplier_id` int(10) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `supplier_firmname` varchar(50) NOT NULL,
  `supplier_phone` varchar(15) NOT NULL,
  `supplier_address` varchar(200) DEFAULT NULL,
  `supplier_pass` varchar(50) NOT NULL,
  `supplier_products` int(10) NOT NULL DEFAULT '0',
  `supplier_active` int(1) NOT NULL DEFAULT '0',
  `supplier_isonline` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`supplier_id`, `supplier_name`, `supplier_firmname`, `supplier_phone`, `supplier_address`, `supplier_pass`, `supplier_products`, `supplier_active`, `supplier_isonline`) VALUES
(1, 'Harshal Arolkar', 'GLS', '9611111111', 'Law Garden, Ellisbridge', '12345', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `token_details`
--

CREATE TABLE `token_details` (
  `token` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token_details`
--

INSERT INTO `token_details` (`token`, `user`) VALUES
('9596079', '9711111111'),
('3899106', '9711111111'),
('2074648', '9711111111'),
('4995729', '9711111111'),
('3111965', '9711111111'),
('4953058', '9711111111'),
('7290667', '9711111111'),
('8458797', '9611111111'),
('5453843', '9711111111'),
('4092660', '9711111111'),
('6699790', '9711111111'),
('3933974', '9711111111'),
('8804061', '9711111111'),
('4511213', '9711111111'),
('3839892', '9711111111'),
('1734912', '9711111111'),
('2297195', '9711111111'),
('5688593', '9711111111'),
('2538463', '9711111111'),
('7880964', '9711111111'),
('1371658', '9711111111'),
('2070533', '9711111111'),
('7519533', '9711111111'),
('9843423', '9711111111'),
('3137041', '9711111111'),
('9265950', '9711111111'),
('7329467', '9711111111'),
('1812059', '9711111111'),
('5659203', '9711111111'),
('2622035', '9711111111'),
('5235320', '9711111111'),
('4402978', '9711111111'),
('4146715', '9711111111'),
('8285943', '9711111111'),
('4162193', '9711111111'),
('6228466', '9711111111'),
('8701628', '9711111111'),
('4115530', '9711111111'),
('1657312', '9711111111'),
('1205575', '9711111111'),
('4529424', '9711111111'),
('1290957', '9711111111'),
('8833700', '9711111111'),
('1234223', '9711111111'),
('6177823', '9711111111'),
('1613345', '9711111111'),
('7951783', '9711111111'),
('6734347', '9711111111'),
('1980311', '9711111111'),
('2464811', '9711111111'),
('6870922', '9711111111'),
('4144897', '9711111111'),
('5939555', '9711111111'),
('4675644', '9711111111'),
('2043369', '9711111111'),
('8914884', '9711111111'),
('8090962', '9711111111'),
('9239702', '9711111111'),
('6143234', '9711111111'),
('1032411', '9711111111'),
('5707837', '9711111111'),
('9332228', '9711111111'),
('6209908', '9711111111'),
('3323708', '9711111111'),
('7778355', '9711111111'),
('8331039', '9711111111'),
('2421321', '9711111111'),
('7642882', '9711111111'),
('1924536', '9711111111'),
('8273467', '9711111111'),
('4050207', '9711111111'),
('3110847', '9711111111'),
('4414701', '9711111111'),
('8026686', '9711111111'),
('9116575', '9711111111'),
('2714419', '9711111111'),
('5278540', '9711111111'),
('4383675', '9711111111'),
('2705652', '9711111111'),
('1472332', '9711111111'),
('2800405', '9711111111'),
('9110802', '9711111111'),
('4266421', '9711111111'),
('8219312', '9711111111'),
('5011575', '9711111111'),
('3511468', '9711111111'),
('4677726', '9711111111'),
('1981321', '9711111111'),
('6100380', '9711111111'),
('4508433', '9711111111'),
('6482566', '9711111111'),
('3594212', '9711111111'),
('2387909', '9711111111'),
('1817434', '9711111111'),
('8259276', '9711111111'),
('3250808', '9711111111'),
('7011844', '9711111111'),
('4979617', '9711111111'),
('2132020', '9711111111'),
('6155943', '9711111111'),
('3614385', '9711111111'),
('5099443', '9711111111'),
('9092230', '9711111111'),
('2679406', '9711111111'),
('5534630', '9711111111'),
('2869443', '9711111111'),
('6271058', '9711111111'),
('5266291', '9711111111'),
('5682041', '9711111111'),
('5702176', '9711111111'),
('1286709', '9711111111'),
('2818329', '9711111111'),
('1843964', '9711111111'),
('2012433', '9711111111'),
('8694197', '9711111111'),
('8458595', '9711111111'),
('8745815', '9711111111'),
('1302329', '9711111111'),
('3478153', '9711111111'),
('3280492', '9711111111'),
('8882722', '9711111111'),
('2864694', '9711111111'),
('7034216', '9711111111'),
('9264530', '9711111111'),
('9110406', '9711111111'),
('4650079', '9711111111'),
('5740281', '9711111111'),
('8404764', '9711111111'),
('3398098', '9711111111'),
('9464600', '9711111111'),
('9954721', '9711111111'),
('2096686', '9711111111'),
('5339728', '9711111111'),
('8958113', '9711111111'),
('4153261', '9711111111'),
('5884001', '9711111111'),
('8516899', '9711111111'),
('3867357', '9711111111'),
('3519381', '9711111111'),
('3224248', '9711111111'),
('4473052', '9711111111'),
('4646230', '9711111111'),
('1700242', '9711111111'),
('5731803', '9711111111'),
('1501560', '9711111111'),
('4278370', '9711111111'),
('2107886', '9711111111'),
('4202093', '9711111111'),
('2890601', '9711111111'),
('8500234', '9711111111'),
('6835872', '9711111111'),
('4263260', '9711111111'),
('1736701', '9711111111'),
('1841261', '9711111111'),
('8216393', '9711111111'),
('5266783', '9711111111'),
('9691733', '9711111111'),
('6555646', '9711111111'),
('8011581', '9711111111'),
('2680580', '9711111111'),
('7760918', '9711111111'),
('7239594', '9711111111'),
('4148778', '9711111111'),
('3110204', '9711111111'),
('6221625', '9711111111'),
('7896359', '9711111111'),
('2266275', '9711111111'),
('8981473', '9711111111'),
('5806604', '9711111111'),
('9413662', '9711111111'),
('7823093', '9711111111'),
('6050464', '9711111111'),
('4994607', '9711111111'),
('7017306', '9711111111'),
('5215157', '8866725957'),
('4839604', '8866725957'),
('6416806', '8866725957'),
('8237065', '8866725957'),
('1071882', '8866725957'),
('8628749', '8866725957'),
('9817003', '8866725957'),
('6650516', '8866725957'),
('3083294', '8866725957'),
('4641526', '8866725957'),
('6072605', '8866725957'),
('7347668', '8866725957'),
('4793244', '8866725957'),
('5385013', '8866725957'),
('9186137', '8866725957'),
('9508693', '8866725957'),
('6501475', '8866725957'),
('2933009', '8866725957'),
('3593230', '8866725957'),
('7986553', '8866725957'),
('7474549', '8866725957'),
('5392282', '8866725957'),
('9902831', '8866725957'),
('9756236', '8866725957'),
('9876556', '8866725957'),
('2005173', '8866725957'),
('1244382', '8866725957'),
('2510811', '9611111111'),
('6278384', '9611111111'),
('3111174', '9611111111'),
('9603041', '9611111111'),
('8683488', '9611111111'),
('1647531', '9611111111'),
('2621269', '9611111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category_details`
--
ALTER TABLE `category_details`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `dropbox_details`
--
ALTER TABLE `dropbox_details`
  ADD PRIMARY KEY (`dropbox_id`);

--
-- Indexes for table `image_details`
--
ALTER TABLE `image_details`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `item_details`
--
ALTER TABLE `item_details`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `size_details`
--
ALTER TABLE `size_details`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `subadmin_details`
--
ALTER TABLE `subadmin_details`
  ADD PRIMARY KEY (`subadmin_id`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_details`
--
ALTER TABLE `category_details`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dropbox_details`
--
ALTER TABLE `dropbox_details`
  MODIFY `dropbox_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_details`
--
ALTER TABLE `image_details`
  MODIFY `image_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `item_details`
--
ALTER TABLE `item_details`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `purchase_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size_details`
--
ALTER TABLE `size_details`
  MODIFY `size_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subadmin_details`
--
ALTER TABLE `subadmin_details`
  MODIFY `subadmin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `supplier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
