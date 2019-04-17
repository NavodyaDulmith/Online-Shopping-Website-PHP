-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 01:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w1673657_0`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNo` int(4) NOT NULL,
  `userId` int(4) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `orderTotal` decimal(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNo`, `userId`, `orderDateTime`, `orderTotal`) VALUES
(5, 8, '2019-03-24 12:58:18', '1.00'),
(6, 8, '2019-03-24 13:07:59', '1.00'),
(7, 8, '2019-03-24 13:08:02', '1.00'),
(8, 8, '2019-03-24 13:08:06', '1.00'),
(9, 8, '2019-03-24 17:40:06', '1.00'),
(10, 8, '2019-03-24 17:40:41', '1.00'),
(11, 8, '2019-03-24 17:45:04', '1.00'),
(12, 8, '2019-03-24 17:45:22', '1.00'),
(13, 8, '2019-03-24 17:46:02', '1.00'),
(14, 8, '2019-03-24 17:46:32', '1.00'),
(15, 8, '2019-03-24 18:28:03', '1.00'),
(16, 8, '2019-03-24 18:32:50', '1.00'),
(17, 8, '2019-03-24 18:33:14', '1686.00'),
(18, 8, '2019-03-24 18:34:56', '1915.00'),
(19, 8, '2019-03-24 18:36:08', '1915.00'),
(20, 8, '2019-03-24 18:36:10', '1915.00'),
(21, 8, '2019-03-24 18:37:44', '1.00'),
(22, 8, '2019-03-24 18:38:16', '1.00'),
(23, 8, '2019-03-24 18:38:25', '1.00'),
(24, 8, '2019-03-24 18:39:33', '1915.00'),
(25, 12, '2019-04-04 19:39:35', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `orderLineId` int(4) NOT NULL,
  `orderNo` int(4) NOT NULL,
  `prodId` int(4) NOT NULL,
  `quantityOrdered` int(4) NOT NULL,
  `subTotal` decimal(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`orderLineId`, `orderNo`, `prodId`, `quantityOrdered`, `subTotal`) VALUES
(1, 17, 1, 1, '399.00'),
(2, 24, 1, 1, '399.00'),
(3, 24, 2, 3, '1287.00'),
(4, 24, 3, 1, '229.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proId` int(4) NOT NULL,
  `prodName` varchar(30) NOT NULL,
  `prodPicNameSmall` varchar(100) NOT NULL,
  `prodPicNameLarge` varchar(100) NOT NULL,
  `prodDescripShort` varchar(1000) DEFAULT NULL,
  `prodDescripLong` varchar(3000) DEFAULT NULL,
  `prodPrice` decimal(6,2) NOT NULL,
  `prodQuantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proId`, `prodName`, `prodPicNameSmall`, `prodPicNameLarge`, `prodDescripShort`, `prodDescripLong`, `prodPrice`, `prodQuantity`) VALUES
(1, 'HP 14-ck0517sa 14', 'prod1_s.jpg', 'prod1_l.jpg', 'HP 14-ck0517sa 14\" Intel® Core™ i5 Laptop - 256 GB SSD, Silver', 'Achieve: Fast computing with the latest tech\r\nWindows 10\r\nIntel® Core™ i5-7200U Processor\r\nRAM: 4 GB / Storage: 256 GB SSD\r\nFull HD display', '399.00', 17),
(2, 'LENOVO Ideapad 330S-14IKB 14', 'prod2_s.jpg', 'prod2_l.jpg', 'LENOVO Ideapad 330S-14IKB 14\" Intel® Core™ i3 Laptop - 256 GB SSD, Blue', 'Lenovo is one of the major players in the laptop domain. Today we are going to inspect one of the pillars in the budget notebook market – the Lenovo IdeaPad 330s (14?). This device is aimed straight at students and offers a wide variety of configurations. By having such a device, Lenovo satisfies the needs of pretty much every market share you can think of.\r\n\r\nBasically, the Lenovo IdeaPad 330s (14?) is one of the cheapest notebooks that can offer relatively good CPU in combination with an IPS display. At the same time, the build quality is kept on point as well. However, without further ado, let’s check if the students are going to love this notebook.', '450.00', 8),
(3, 'HUAWEI P20 Lite', 'prod3_s.jpg', 'prod3_l.jpg', 'HUAWEI P20 Lite - 64 GB, Blue', 'Android 8.0 (Oreo)\r\n5.8\" Full HD touchscreen\r\nDual 16 MP / 2 MP main cameras\r\n16 MP front camera\r\nBattery capacity: 3000 mAh', '250.00', 15),
(4, 'APPLE iPhone X', 'prod4_s.jpg', 'prod4_l.jpg', 'APPLE iPhone X - 64 GB, Space Grey', 'iOS 11\r\n5.8\" Super Retina Display\r\nDual 12 MP main cameras\r\n7 MP front camera\r\nApple A11 processor', '799.00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(4) NOT NULL,
  `userType` varchar(1) NOT NULL,
  `userFName` varchar(50) NOT NULL,
  `userSName` varchar(50) NOT NULL,
  `userAddress` varchar(50) NOT NULL,
  `userPostcode` varchar(50) NOT NULL,
  `userTelNo` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userType`, `userFName`, `userSName`, `userAddress`, `userPostcode`, `userTelNo`, `userEmail`, `userPassword`) VALUES
(8, 'C', 'Sahan ', 'Dilshan', 'No:149', '11020', '0763960868', 'sahandilshan222@gmail.com', '1234'),
(12, 'A', 'Sahan ', 'Dilshan', 'No:149', '11020', '0763960868', 'sahandilshan@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNo`),
  ADD KEY `fk_user` (`userId`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`orderLineId`),
  ADD KEY `orderNo` (`orderNo`),
  ADD KEY `prodId` (`prodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `orderLineId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderNo`),
  ADD CONSTRAINT `order_line_ibfk_2` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderNo`),
  ADD CONSTRAINT `order_line_ibfk_3` FOREIGN KEY (`prodId`) REFERENCES `product` (`proId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
