-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 06:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nom_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `name`, `company_id`) VALUES
(1, 'Caltex Havoline', 6);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `name`) VALUES
(1, 'Automatic Transmission Oils'),
(5, 'Four Stroke Motor Cycle Engine Oils');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `supplier_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `supplier_id`) VALUES
(6, 'Chevron Sri Lanka', 1),
(7, 'abc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cstmr_id` int(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `gander` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cstmr_id`, `f_name`, `l_name`, `gander`, `phone`, `email`, `description`) VALUES
(5, 'Mafas', 'Ahmath', 'male', '0778325759', 'mafasahmath@gmail.com', 'owner'),
(12, 'mmb', 'mmb', 'female', '0776563', 'mmb@gmail.com', 'mmmb'),
(34, 'bb', 'cc', 'male', '0773868866', 'bb@gmail.com', 'bbb'),
(94, 'SC', 'SC', 'male', '077435', 'SC@gmail.com', 'SC'),
(95, 'rg', 'rg', 'female', '075455456', 'rg@gmail.com', 'rgr'),
(96, 'vj', 'vl', 'male', '07484651', 'vj@gmail.com', 'vj'),
(97, 'ggdrfg', 'gdsf', 'female', '0778325759', 'gdfg@gmail.com', 'g'),
(98, 'vgdf', 'fdf', 'female', '077652165', 'gdf', 'dfgdf'),
(99, 'hh', 'hh', 'female', '0757', 'hh@gmail.com', 'hh'),
(101, 'zz', 'zz', 'male', '0778325759', 'zz@gmail.com', 'zz'),
(104, 'cc', 'cc', 'male', '07489415', 'cc@gmail.com', 'cc'),
(105, 'rr', 'rr', 'male', '62569', 'rr@gmail.com', 'rr'),
(106, 'mm', 'mm', 'male', '07565165', 'mm@gmail.com', 'mm'),
(107, 'hgfd', 'hgf', 'male', '0757217', 'bgfh@gmail.com', 'bgbg'),
(108, 'fv', 'fv', 'male', '073524', 'fv@gmail.com', 'vf'),
(127, 'ww', 'ww', 'female', '0784256', 'ww@gmail.com', 'ww'),
(128, 'hn', 'hn', 'male', '071854', 'hn@gmail.com', 'hn'),
(129, 'test', 'test', 'female', '', '', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `id` int(100) NOT NULL,
  `date` datetime(6) NOT NULL,
  `total` decimal(60,0) NOT NULL,
  `credit` decimal(60,0) NOT NULL,
  `debit` decimal(60,0) NOT NULL,
  `cstmr_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`id`, `date`, `total`, `credit`, `debit`, `cstmr_id`) VALUES
(1, '2024-05-18 00:00:00.000000', 5000, 3000, 2000, 5),
(4, '2024-05-09 00:00:00.000000', 5500, 500, 5000, 94),
(5, '2024-05-24 00:00:00.000000', 2500, 500, 2000, 105);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ledgerview`
-- (See below for the actual view)
--
CREATE TABLE `ledgerview` (
`id` int(100)
,`date` datetime(6)
,`total` decimal(60,0)
,`credit` decimal(60,0)
,`debit` decimal(60,0)
,`full_name` varchar(304)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `barcode` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_id` int(100) NOT NULL,
  `brand_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `size` int(100) NOT NULL,
  `unit_cost` decimal(60,0) NOT NULL,
  `unit_prc` decimal(60,0) NOT NULL,
  `qty` int(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`barcode`, `name`, `company_id`, `brand_id`, `category_id`, `size`, `unit_cost`, `unit_prc`, `qty`, `description`) VALUES
('p01', 'Havoline Super 4T SAE 10W-30', 6, 1, 1, 1, 1500, 1650, 20, 'caltex - Havoline Super 4T SAE 10W-30'),
('p03', 'prd4', 7, 1, 1, 5, 1000, 1500, 15, 'prd4'),
('p04', 'prd5', 7, 1, 1, 4, 800, 1000, 0, 'prd5'),
('p082', 'ghdty', 6, 1, 1, 1000, 1500, 2000, 25, 'hdgftdgh');

-- --------------------------------------------------------

--
-- Stand-in structure for view `productview`
-- (See below for the actual view)
--
CREATE TABLE `productview` (
`barcode` varchar(100)
,`product_name` varchar(100)
,`company_name` varchar(100)
,`brand_name` varchar(100)
,`category_name` varchar(100)
,`size` int(100)
,`unit_cost` decimal(60,0)
,`unit_prc` decimal(60,0)
,`qty` int(100)
,`description` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `returndetails`
--

CREATE TABLE `returndetails` (
  `id` int(100) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `return_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returnproduct`
--

CREATE TABLE `returnproduct` (
  `return_id` int(100) NOT NULL,
  `date` int(6) NOT NULL,
  `qty` int(100) NOT NULL,
  `total` decimal(60,0) NOT NULL,
  `cstmt_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL,
  `qty` int(100) NOT NULL,
  `total` decimal(60,0) NOT NULL,
  `cstmr_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(100) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `sales_id` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `salesornot` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `s_id` int(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `gander` varchar(50) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`s_id`, `f_name`, `l_name`, `gander`, `phone_no`, `email`, `nic`) VALUES
(1, 'Mafaz', 'Ahamth', 'male', '0778325759', 'mafasahmath@gmail.com', '199916310336');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ur_id` int(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nic` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `ledgerview`
--
DROP TABLE IF EXISTS `ledgerview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ledgerview`  AS SELECT `ledger`.`id` AS `id`, `ledger`.`date` AS `date`, `ledger`.`total` AS `total`, `ledger`.`credit` AS `credit`, `ledger`.`debit` AS `debit`, concat(`ledger`.`cstmr_id`,' - ',`customer`.`f_name`,' ',`customer`.`l_name`) AS `full_name` FROM (`ledger` left join `customer` on(`ledger`.`cstmr_id` = `customer`.`cstmr_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `productview`
--
DROP TABLE IF EXISTS `productview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productview`  AS SELECT `product`.`barcode` AS `barcode`, `product`.`name` AS `product_name`, `company`.`name` AS `company_name`, `brand`.`name` AS `brand_name`, `category`.`name` AS `category_name`, `product`.`size` AS `size`, `product`.`unit_cost` AS `unit_cost`, `product`.`unit_prc` AS `unit_prc`, `product`.`qty` AS `qty`, `product`.`description` AS `description` FROM (((`product` left join `company` on(`product`.`company_id` = `company`.`company_id`)) left join `brand` on(`product`.`brand_id` = `brand`.`b_id`)) left join `category` on(`product`.`category_id` = `category`.`c_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `fk_b_company_id` (`company_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `fk_supplier_id` (`supplier_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cstmr_id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cstmr_id` (`cstmr_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`barcode`),
  ADD KEY `fk_category_id` (`category_id`),
  ADD KEY `fk_brand_id` (`brand_id`),
  ADD KEY `fk_company_id` (`company_id`);

--
-- Indexes for table `returndetails`
--
ALTER TABLE `returndetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_return_id` (`return_id`),
  ADD KEY `fk_rt_barcode` (`barcode`);

--
-- Indexes for table `returnproduct`
--
ALTER TABLE `returnproduct`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `fk_rt_cstmr_id` (`cstmt_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD UNIQUE KEY `cstmr_id` (`cstmr_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sales_id` (`sales_id`),
  ADD KEY `fk_sl_barcode` (`barcode`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cstmr_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `returndetails`
--
ALTER TABLE `returndetails`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returnproduct`
--
ALTER TABLE `returnproduct`
  MODIFY `return_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ur_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `fk_b_company_id` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_supplier_id` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ledger`
--
ALTER TABLE `ledger`
  ADD CONSTRAINT `fk_cstmr_id` FOREIGN KEY (`cstmr_id`) REFERENCES `customer` (`cstmr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_company_id` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `returndetails`
--
ALTER TABLE `returndetails`
  ADD CONSTRAINT `fk_return_id` FOREIGN KEY (`return_id`) REFERENCES `returnproduct` (`return_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rt_barcode` FOREIGN KEY (`barcode`) REFERENCES `product` (`barcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `returnproduct`
--
ALTER TABLE `returnproduct`
  ADD CONSTRAINT `fk_rt_cstmr_id` FOREIGN KEY (`cstmt_id`) REFERENCES `customer` (`cstmr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`cstmr_id`) REFERENCES `customer` (`cstmr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `fk_sales_id` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sl_barcode` FOREIGN KEY (`barcode`) REFERENCES `product` (`barcode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
