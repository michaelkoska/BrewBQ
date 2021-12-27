-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 08, 2021 at 01:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brewbbq`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `email_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`email_address`, `password`, `complete_name`, `address_line1`, `address_line2`, `city`, `state`, `zipcode`, `country`, `cellphone_no`) VALUES
('bob@gmail.com', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19', 'bobby bedhead', '44', '44th st', 'west fargo', 'nd', '58078', 'United States', '1231231323'),
('Bobby@aol.com', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19', 'Bobby bobberson', '123', '23rd st', 'west fargo', 'nd', '$zipcode', 'usa', '1231231234'),
('carllorenzo@gmail.com', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19', 'carl lorenzo', '123 123st s', '23', 'fargo', 'nd', '58104', 'United States', '');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `model_number` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature1` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature2` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature3` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature4` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature5` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature6` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`model_number`, `feature1`, `feature2`, `feature3`, `feature4`, `feature5`, `feature6`) VALUES
('0001', 'Five to seven pounds', 'Boneless', 'Point cut', 'All seasoning included', 'Woodchips included', 'USDA Choice or Better'),
('0002', 'High quality ingredients', 'Vacuum sealed', '100% of ingredients', 'Brew system (optional)', 'Bottles and caps (optional)', 'Labels (optional)'),
('0003', 'All brisket ingredients', 'All brewing ingredients', 'USDA Prime Cut', 'Discounted package', 'Discount for all additional add-ons', 'Express shipping'),
('0004', 'Shiny', 'Drip-proof', 'Valve', 'Chrome', 'Rust-proof', 'Flow control'),
('0005', '14 gallon', 'BPA Free', 'Stainless Steel Thermowell', 'Perfect Seal', 'Leak proof', 'Sturdy'),
('0006', '12 Bottles', '12 Reusable Caps', 'Caps clip on', 'Amber Colored', 'Individually Packaged', 'Airtight Seal');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weightlbs` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` smallint(6) NOT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `imagename` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_code`, `item_name`, `model_number`, `weightlbs`, `description`, `category`, `quantity`, `price`, `imagename`) VALUES
('BBrisket', 'Beef Brisket', '0001', '5', 'Delicious Meat', 'Meat Subscription', 100, '80.00', 'brisket.jpg'),
('BBKit', 'Brew Kit', '0002', '5', 'Delicious Beer', 'Beer Subscription', 100, '200.00', 'beer.jpg'),
('BBKit', 'Brew and Brisket', '0003', '10', 'Eat and Drink', 'Full Subscription', 100, '250.00', 'fullpackage.jpg'),
('Spigot', 'Spigot', '0004', '1', 'Brew spigot', 'brewing', 250, '25.00', 'spigot.jpg'),
('Fermenter', 'Carboy Fermenter', '0005', '22', 'Carboy', 'Brewing', 50, '150.00', 'fermenter.jpg'),
('Bottles', 'Bottles and Caps', '0006', '8', '12 Bottles and Reusable Caps', 'Brewing', 75, '36.00', 'bottles.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_sess` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_model_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_quantity` smallint(6) NOT NULL,
  `cart_item_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_price` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_sess`, `cart_model_number`, `cart_quantity`, `cart_item_name`, `cart_price`) VALUES
('6npb3sjjerbpou5nbs5kj9b60s', '0002', 5, 'Brew Kit', '200.00'),
('6npb3sjjerbpou5nbs5kj9b60s', '0001', 2, 'Beef Brisket', '80.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`email_address`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`model_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
