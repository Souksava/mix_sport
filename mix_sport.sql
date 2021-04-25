-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2021 at 05:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mix_sport`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `check_brand` (IN `brand_ids` VARCHAR(11))  NO SQL
BEGIN
SELECT * FROM product WHERE brand_id=brand_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_category` (IN `cate_ids` VARCHAR(11))  NO SQL
BEGIN
SELECT * FROM product WHERE cate_id=cate_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_unit` (IN `unit_ids` VARCHAR(11))  NO SQL
BEGIN
SELECT * FROM product WHERE unit_id=unit_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_brand` (IN `ids` VARCHAR(11))  NO SQL
BEGIN
DELETE FROM brand WHERE brand_id=ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_category` (IN `ids` VARCHAR(11))  NO SQL
BEGIN
DELETE FROM category WHERE cate_id=ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_unit` (IN `ids` VARCHAR(11))  NO SQL
BEGIN
DELETE FROM unit WHERE unit_id=ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_brand` (IN `brand_names` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO brand(brand_name) VALUES(brand_names);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_category` (IN `cate_names` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO category(cate_name) VALUES(cate_names);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_unit` (IN `unit_names` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO unit(unit_name) VALUES(unit_names);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_brand` (IN `name` VARCHAR(50))  NO SQL
BEGIN
SELECT * FROM brand WHERE brand_id LIKE name or brand_name LIKE name ORDER BY brand_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_brand_limit` (IN `name` VARCHAR(50), IN `page` INT(5))  NO SQL
BEGIN
SELECT * FROM brand WHERE brand_id LIKE name or brand_name LIKE name ORDER BY brand_name ASC LIMIT page,15;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_category` (IN `name` VARCHAR(50))  NO SQL
BEGIN
SELECT * FROM category WHERE cate_id LIKE name or cate_name LIKE name ORDER BY cate_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_category_limit` (IN `name` VARCHAR(50), IN `page` INT(5))  NO SQL
BEGIN
SELECT * FROM category WHERE cate_id LIKE name or cate_name LIKE name ORDER BY cate_name ASC LIMIT page,15;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_unit` (IN `name` VARCHAR(50))  NO SQL
BEGIN
SELECT * FROM unit WHERE unit_id LIKE name or unit_name LIKE name ORDER BY unit_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_unit_limit` (IN `name` VARCHAR(50), IN `page` INT(5))  NO SQL
BEGIN
SELECT * FROM unit WHERE unit_id LIKE name or unit_name LIKE name ORDER BY unit_name ASC LIMIT page,15;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_brand` (IN `brand_ids` VARCHAR(11), IN `brand_names` VARCHAR(50))  NO SQL
BEGIN
UPDATE brand SET brand_name=brand_names WHERE brand_id=brand_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_category` (IN `cate_ids` VARCHAR(11), IN `cate_names` VARCHAR(50))  NO SQL
BEGIN
UPDATE category SET cate_name=cate_names WHERE cate_id=cate_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_unit` (IN `unit_ids` VARCHAR(11), IN `unit_names` VARCHAR(50))  NO SQL
BEGIN
UPDATE unit SET unit_name=unit_names WHERE unit_id=unit_ids;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `bank` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `account_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qr_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Adidas');

-- --------------------------------------------------------

--
-- Table structure for table `broke`
--

CREATE TABLE `broke` (
  `boke_id` int(11) NOT NULL,
  `pro_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `remark` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'ເສື້ອກິລາ');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cus_surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `imp_id` int(11) NOT NULL,
  `imp_bill` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `sup_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `pro_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `remark` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `detail_id` int(11) NOT NULL,
  `pro_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `order_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pro_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `qty_alert` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `qty`, `price`, `cate_id`, `unit_id`, `brand_id`, `size_id`, `qty_alert`, `img`) VALUES
('', 'Fuji Flim', 1, '200.00', 1, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rate_buy` decimal(11,2) DEFAULT NULL,
  `rate_sell` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `sell_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `stt_id` int(3) NOT NULL,
  `type_pay` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deli_place` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `seen1` int(2) NOT NULL,
  `seen2` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selldetail`
--

CREATE TABLE `selldetail` (
  `id` int(11) NOT NULL,
  `pro_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `sell_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `vanranty` int(5) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(1, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'ຜືນ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `broke`
--
ALTER TABLE `broke`
  ADD PRIMARY KEY (`boke_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`imp_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sell_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `selldetail`
--
ALTER TABLE `selldetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `sell_id` (`sell_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `broke`
--
ALTER TABLE `broke`
  MODIFY `boke_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `imp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selldetail`
--
ALTER TABLE `selldetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `import_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `import_ibfk_2` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`),
  ADD CONSTRAINT `import_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `import_ibfk_4` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`),
  ADD CONSTRAINT `sell_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `selldetail`
--
ALTER TABLE `selldetail`
  ADD CONSTRAINT `selldetail_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`),
  ADD CONSTRAINT `selldetail_ibfk_2` FOREIGN KEY (`sell_id`) REFERENCES `sell` (`sell_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
