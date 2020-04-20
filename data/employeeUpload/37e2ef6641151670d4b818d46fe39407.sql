-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2020 at 01:30 PM
-- Server version: 5.6.47
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sourceItAssets`
--

-- --------------------------------------------------------

--
-- Table structure for table `failuer_book_product`
--

CREATE TABLE IF NOT EXISTS `failuer_book_product` (
  `id` int(11) NOT NULL,
  `product_id` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `booked_date` varchar(200) DEFAULT NULL,
  `margin_amount` bigint(20) DEFAULT NULL,
  `total_amount` int(11) NOT NULL,
  `payble_amount` bigint(20) DEFAULT NULL,
  `paid_amount` bigint(20) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `is_owner` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `failuer_book_product`
--

INSERT INTO `failuer_book_product` (`id`, `product_id`, `user_id`, `booked_date`, `margin_amount`, `total_amount`, `payble_amount`, `paid_amount`, `payment_id`, `is_owner`, `created_at`, `updated_at`) VALUES
(7, '6', '5e6886b7cabd4', '2020-03-23', 30, 363, 330, NULL, 'MOJO0314805D05213085', 0, '2020-03-14 13:04:36', '0000-00-00 00:00:00'),
(8, '6', '5e6886b7cabd4', '2020-03-16', 30, 363, 330, NULL, 'MOJO0314Q05W05214508', 0, '2020-03-14 13:35:34', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failuer_book_product`
--
ALTER TABLE `failuer_book_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failuer_book_product`
--
ALTER TABLE `failuer_book_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
