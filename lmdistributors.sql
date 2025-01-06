-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 09:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmdistributors`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reqDate` date NOT NULL,
  `wantedDate` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `ourPrice` decimal(10,2) DEFAULT NULL,
  `theirPrice` decimal(10,2) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `comments` text DEFAULT NULL,
  `status` enum('Not Selected','Accepted','Rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyID`, `name`, `reqDate`, `wantedDate`, `quantity`, `ourPrice`, `theirPrice`, `phone`, `comments`, `status`) VALUES
(2, 'Amal Perera', '2024-12-01', '2024-12-05', 3500, 54.00, 55.00, '0771122334', 'Urgent delivery needed.', 'Accepted'),
(3, 'Nimal Jayawardena', '2024-12-02', '2024-12-06', 500, 54.00, 53.50, '0762233445', 'Regular order.', 'Rejected'),
(4, 'Kamal Silva', '2024-12-03', '2024-12-07', 25000, 53.00, 52.00, '0713344556', 'Requesting bulk discount.', 'Not Selected'),
(5, 'Anuradha Wickramasinghe', '2024-12-04', '2024-12-08', 2000, 52.00, 51.50, '0784455667', 'Please deliver early morning.', 'Accepted'),
(6, 'Ishara Wijesinghe', '2024-12-05', '2024-12-09', 350, 54.00, 54.00, '0725566778', '', 'Rejected'),
(7, 'Priyanthi Perera', '2024-12-06', '2024-12-10', 4000, 50.00, 53.00, '0776677889', 'Add packaging instructions.', 'Accepted'),
(9, 'Nadeesha Fernando', '2024-12-08', '2024-12-12', 4500, 58.00, 55.50, '0718899001', 'Need an invoice.', 'Accepted'),
(10, 'Madhawa Jayasinghe', '2024-12-09', '2024-12-13', 3000, 52.50, 52.50, '0789901122', 'Urgent order.', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `buyerprice`
--

CREATE TABLE `buyerprice` (
  `bPID` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyerprice`
--

INSERT INTO `buyerprice` (`bPID`, `price`, `date`) VALUES
(1, 45.50, '2025-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read','replied') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageID`, `name`, `email`, `message`, `status`) VALUES
(2, 'Kasun Perera', 'kasun@example.com', 'I have a query about product availability.', 'replied'),
(3, 'Chamari Fernando', 'chamari@example.com', 'Can I change my order details?', 'read'),
(4, 'Lalith Wijesinghe', 'lalith@example.com', 'Please share the updated price list.', 'unread'),
(5, 'Dulani Silva', 'dulani@example.com', 'How can I become a supplier?', 'replied'),
(6, 'Suresh Bandara', 'suresh@example.com', 'Need help with login issues.', 'unread'),
(7, 'Amali Rathnayake', 'amali@example.com', 'Please confirm my last order status.', 'read'),
(8, 'Ruwan Jayasinghe', 'ruwan@example.com', 'Is bulk discount available?', 'unread'),
(9, 'Nimali Samarasinghe', 'nimali@example.com', 'Can I update my profile information?', 'replied'),
(10, 'Nuwan Fernando', 'nuwan@example.com', 'Requesting a copy of my invoice.', 'read'),
(11, 'Nirmala De Silva', 'nirmala@example.com', 'Need assistance with payment options.', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `address` text NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `itemPrice` decimal(10,2) DEFAULT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `date`, `name`, `phone1`, `phone2`, `address`, `productName`, `productid`, `quantity`, `itemPrice`, `totalPrice`, `status`) VALUES
(2, '2024-12-10', 'Amali Rathnayake', '0777896543', '0771233218', 'Jaffna, Sri Lanka', 'Coconut A', 1, 10, 50.00, 500.00, 'completed'),
(6, '2024-12-16', 'Nuwan Fernando', '0786781234', NULL, 'Anuradhapura, Sri Lanka', 'Coconut Oil', 5, 5, 100.00, 500.00, 'pending'),
(10, '2024-12-21', 'Ruwan Jayasinghe', '0712345678', NULL, 'Nuwara Eliya, Sri Lanka', 'Coconut Shells', 9, 40, 10.00, 400.00, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `name`, `description`, `price`, `image`, `category`, `quantity`) VALUES
(1, 'Coconut A', 'High-quality coconuts.', 50.00, NULL, 'Fresh', 200),
(2, 'Coconut B', 'Medium-quality coconuts.', 40.00, NULL, 'Fresh', 150),
(5, 'Coconut C', 'Low-quality coconuts.', 30.00, NULL, 'Fresh', 300),
(6, 'Coconut Husk', 'Quality coconut husks.', 15.00, NULL, 'Husk', 500),
(7, 'Coconut Oil', 'Pure coconut oil.', 100.00, NULL, 'Oil', 10),
(8, 'Coconut Milk', 'Fresh coconut milk packs.', 80.00, NULL, 'Milk', 100),
(9, 'Coconut Powder', 'Desiccated coconut powder.', 60.00, NULL, 'Powder', 75),
(10, 'King Coconut', 'Fresh king coconuts.', 20.00, NULL, 'Fresh', 9),
(11, 'Coconut Shells', 'Polished coconut shells.', 10.00, NULL, 'Shell', 400),
(12, 'Coconut Charcoal', 'Charcoal made from coconut shells.', 25.00, NULL, 'Charcoal', 150);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplyID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reqDate` date NOT NULL,
  `supplyDate` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `ourPrice` decimal(10,2) DEFAULT NULL,
  `theirPrice` decimal(10,2) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `comments` text DEFAULT NULL,
  `status` enum('Not Selected','Accepted','Rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplyID`, `name`, `reqDate`, `supplyDate`, `quantity`, `ourPrice`, `theirPrice`, `phone`, `comments`, `status`) VALUES
(2, 'Ranjith Silva', '2024-12-01', '2024-12-03', 800, 29.00, 28.50, '0711234567', 'Need early payment.', 'Rejected'),
(3, 'Chandana Perera', '2024-12-02', '2024-12-04', 600, 50.00, 49.00, '0762345678', 'First-time supplier.', 'Accepted'),
(4, 'Jayani Fernando', '2024-12-03', '2024-12-05', 10000, 51.00, 50.50, '0773456789', 'Offering a discount.', 'Not Selected'),
(5, 'Samitha Bandara', '2024-12-04', '2024-12-06', 5000, 48.00, 39.00, '0724567890', 'Delivery by own vehicle.', 'Accepted'),
(6, 'Nishantha Wijesinghe', '2024-12-05', '2024-12-07', 700, 55.00, 54.50, '0755678901', '', 'Rejected'),
(7, 'Amali Jayawardena', '2024-12-06', '2024-12-08', 4000, 46.00, 38.00, '0716789012', 'New supply route.', 'Accepted'),
(8, 'Ravindra Rathnayake', '2024-12-07', '2024-12-09', 9800, 47.00, 43.50, '0787890123', 'Bulk supply offer.', 'Accepted'),
(9, 'Sumudu Liyanage', '2024-12-08', '2024-12-10', 6500, 38.00, 37.00, '0768901234', 'Need transport assistance.', 'Rejected'),
(10, 'Kusal Dissanayake', '2024-12-09', '2024-12-11', 5500, 39.00, 35.00, '0779012345', 'Please confirm quantity.', 'Accepted'),
(11, 'Sarath Rathnayake', '2024-12-10', '2024-12-12', 7500, 51.00, 48.50, '0720123456', 'Offer valid for next week.', 'Not Selected');

-- --------------------------------------------------------

--
-- Table structure for table `supplyerprice`
--

CREATE TABLE `supplyerprice` (
  `sPID` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplyerprice`
--

INSERT INTO `supplyerprice` (`sPID`, `price`, `date`) VALUES
(1, 38.00, '2025-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `address` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` enum('admin','manager','customer','supplier','buyer') NOT NULL,
  `assignType` varchar(50) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `last_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`userID`, `email`, `password`, `fName`, `lName`, `dob`, `phone1`, `phone2`, `address`, `image`, `type`, `assignType`, `status`, `last_logout`) VALUES
(1, 'admin@lm.com', 'hashedpassword', 'Admin', 'User', '1985-05-10', '0771234567', NULL, 'Colombo 01, Sri Lanka', './images/default-profile.png', 'admin', NULL, 'active', NULL),
(4, 'admin1@lm.com', 'adminkasun3@', 'Kasun', 'Perera', '1985-06-15', '0771234567', '', 'Colombo 01, Sri Lanka', './images/profiles/6776e2c90845b-admin1.jpg', 'admin', NULL, 'active', '2025-01-06 13:00:29'),
(5, 'admin2@lm.com', 'hashedpassword2', 'Chamari', 'Fernando', '1986-08-25', '0769876543', NULL, 'Kandy, Sri Lanka', './images/default-profile.png', 'admin', NULL, 'active', NULL),
(6, 'manager1@lm.com', 'hashedpassword3', 'Lalith', 'Wijesinghe', '1990-03-10', '0713456789', NULL, 'Galle, Sri Lanka', './images/default-profile.png', 'manager', 'Logistics', 'active', '2025-01-06 13:31:36'),
(7, 'manager2@lm.com', 'hashedpassword4', 'Dulani', 'Silva', '1991-04-18', '0726543210', '0701293218', 'Nattandiya, Sri Lanka', './images/default-profile.png', 'manager', 'Sales Manager', 'inactive', NULL),
(8, 'customer1@lm.com', 'hashedpassword5', 'Suresh', 'Bandara', '1995-07-12', '0756784321', NULL, 'Kurunegala, Sri Lanka', './images/default-profile.png', 'customer', NULL, 'active', NULL),
(9, 'customer2@lm.com', 'hashedpassword6', 'Amali', 'Rathnayake', '1994-11-22', '0777896543', NULL, 'Jaffna, Sri Lanka', './images/default-profile.png', 'customer', NULL, 'active', NULL),
(10, 'supplier1@lm.com', 'hashedpassword7', 'Ruwan', 'Jayasinghe', '1992-02-25', '0712345676', NULL, 'Nuwara Eliya, Sri Lanka', './images/default-profile.png', 'supplier', NULL, 'active', NULL),
(11, 'supplier2@lm.com', 'hashedpassword8', 'Nimali', 'Samarasinghe', '1989-12-10', '0765432178', NULL, 'Batticaloa, Sri Lanka', './images/default-profile.png', 'supplier', NULL, 'active', NULL),
(12, 'buyer1@lm.com', 'hashedpassword9', 'Nuwan', 'Fernando', '1996-01-15', '0786781234', NULL, 'Anuradhapura, Sri Lanka', './images/default-profile.png', 'buyer', NULL, 'active', NULL),
(13, 'buyer2@lm.com', 'hashedpassword10', 'Nirmala', 'De Silva', '1993-05-05', '0729871234', NULL, 'Ratnapura, Sri Lanka', './images/default-profile.png', 'buyer', NULL, 'active', NULL),
(14, 'nimmimanager@gmail.com', 'nimmi@32321', 'Nimmi', 'Swetha', '0000-00-00', '0772131210', NULL, '', './images/default-profile.png', 'manager', 'Order Manager', 'inactive', NULL),
(15, 'hojijo4160@iteradev.com', 'hira1221', 'Hiranya', 'Fernando', '2002-09-03', '0771234599', '0756784778', 'Mahabage, Ja-Ela', 'images/default-profile.png', 'customer', NULL, 'active', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyID`),
  ADD KEY `ourPrice` (`ourPrice`);

--
-- Indexes for table `buyerprice`
--
ALTER TABLE `buyerprice`
  ADD PRIMARY KEY (`bPID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `order_ibfk_1` (`productid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplyID`),
  ADD KEY `ourPrice` (`ourPrice`);

--
-- Indexes for table `supplyerprice`
--
ALTER TABLE `supplyerprice`
  ADD PRIMARY KEY (`sPID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `buyerprice`
--
ALTER TABLE `buyerprice`
  MODIFY `bPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplyerprice`
--
ALTER TABLE `supplyerprice`
  MODIFY `sPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
