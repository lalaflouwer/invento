-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 02:01 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invento`
--
CREATE DATABASE IF NOT EXISTS `invento` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `invento`;

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `car_id` int(11) NOT NULL,
  `car_fullname` varchar(255) DEFAULT NULL,
  `car_gender` varchar(255) DEFAULT NULL,
  `car_age` int(11) DEFAULT NULL,
  `car_nationality` varchar(255) DEFAULT NULL,
  `car_position` varchar(255) DEFAULT NULL,
  `car_email` varchar(255) DEFAULT NULL,
  `car_salary` float DEFAULT NULL,
  `car_number` int(255) DEFAULT NULL,
  `car_resume` blob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`car_id`, `car_fullname`, `car_gender`, `car_age`, `car_nationality`, `car_position`, `car_email`, `car_salary`, `car_number`, `car_resume`) VALUES
(6, 'test1', 'M', 34, 'Barbados', 'HR/ACC', NULL, 342, 54, 0x706f73746167655765696768742e706466),
(7, 'test1', 'M', 1, 'Barbados', 'Admin', NULL, 12, 87622112, 0x526573756d655f4b696d6265726c65792050616e672e646f63),
(8, 'kimberley pang', 'M', 12, 'Bangladesh', 'Staff', 'imkimberlays@gmail.com', 321, 312, 0x456e67696e656572496e666f2e646f6378),
(9, 'kimberley pangtewfd', 'F', 32, 'Barbados', 'StockManager', 'imkimberlays@gmail.com', 342, 432, 0x706f73746167655765696768742e706466);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_fname` varchar(255) NOT NULL,
  `cust_lname` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_number` int(11) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_postal` varchar(255) NOT NULL,
  `cust_pass` varchar(255) NOT NULL,
  `cust_repass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(255) NOT NULL,
  `emp_id` varchar(5) DEFAULT NULL,
  `emp_fullname` varchar(255) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_pass` varchar(255) DEFAULT NULL,
  `emp_contact` int(255) DEFAULT NULL,
  `emp_homeContact` varchar(255) DEFAULT NULL,
  `emp_dob` varchar(255) DEFAULT NULL,
  `emp_nationality` varchar(255) DEFAULT NULL,
  `emp_race` varchar(500) DEFAULT NULL,
  `emp_nric` varchar(255) DEFAULT NULL,
  `emp_fin` varchar(255) DEFAULT NULL,
  `emp_permitNo` varchar(500) DEFAULT NULL,
  `emp_permitExpiry` varchar(200) DEFAULT NULL,
  `emp_passportNo` varchar(200) DEFAULT NULL,
  `emp_passportExpiry` varchar(255) DEFAULT NULL,
  `emp_resid` varchar(255) DEFAULT NULL,
  `emp_address` varchar(255) DEFAULT NULL,
  `emp_postal` varchar(255) DEFAULT NULL,
  `emp_faddress` varchar(500) DEFAULT NULL,
  `emp_fpostal` varchar(255) DEFAULT NULL,
  `emp_dept` varchar(255) DEFAULT NULL,
  `emp_designation` varchar(500) DEFAULT NULL,
  `emp_type` varchar(255) DEFAULT NULL,
  `emp_img` blob,
  `emp_joined` varchar(255) DEFAULT NULL,
  `emp_status` varchar(500) DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_id`, `emp_fullname`, `emp_email`, `emp_pass`, `emp_contact`, `emp_homeContact`, `emp_dob`, `emp_nationality`, `emp_race`, `emp_nric`, `emp_fin`, `emp_permitNo`, `emp_permitExpiry`, `emp_passportNo`, `emp_passportExpiry`, `emp_resid`, `emp_address`, `emp_postal`, `emp_faddress`, `emp_fpostal`, `emp_dept`, `emp_designation`, `emp_type`, `emp_img`, `emp_joined`, `emp_status`) VALUES
(3, 'LCH', 'Charles Lee', 'charleslee@invento.com', '123', 8834352, '', '2017-07-19', 'Singapore', '', '', '', '', '', '', '', 'Citizen', 'Toh Guan', '645323', '', NULL, 'Director', '', 'Admin', '', '2017-07-26', 'Active'),
(39, 'CJK', 'Chong Jing Keong', 'jackchong@inventogroup.com', '123', 83521563, '', '1985-12-23', 'Malaysia', 'Chinese', '', 'G8312024Q', '4 02906375', '17-12-2017', 'A27961073', '17-01-2018', 'Foreigner', '', '', '29 Jalan Harimau Belang Taman Century, Johor Bahru Malaysia 80250', NULL, 'Site Operation', 'Electrician', 'Employee', 0x434a4b2e6a7067, '2014-03-11', 'Active'),
(34, 'LHH', 'Lim Hin Hoong', 'hellvin@inventogroup.com', '123', 90455480, '', '1993-10-05', 'Malaysia', 'Chinese', '', 'G2798260W', '4 05592894', '21-03-2018', 'A36995736', '20-01-2021', 'Foreigner', 'Blk 943, Hougang Street 92 #10-129  Singapore 530943', '530943', '', NULL, 'Site Operation', 'Electrician', 'Employee', 0x4c48482e6a7067, '2016-03-23', 'Active'),
(35, 'LKC', 'Loo Kee Choy', ' johnny@inventogroup.com', '123', 84811176, '', '1976-04-12', 'Malaysia', 'Chinese', '', ' F7591989K', ' 5 33548733', '11-07-2018', 'A35594760', '19-08-2020', 'Foreigner', '', '', 'No.71 Jalan Jaya Putra 8/6  Bandar Jaya Putra, Johor Bahru Malaysia 81100', NULL, 'Site Operation', 'Site Supervisor', 'Employee', 0x4c4b432e6a7067, '2000-03-31', 'Active'),
(36, 'MBD', 'Mabud Mohammed Abdul ', 'mabud@inventogroup.com', '123', 91013853, '', '1973-08-04', 'Bangladesh', 'Others', NULL, 'F8411480N', '0 61711309', '16-03-2018', 'AF9920384', '16-04-2018', 'Foreigner', '47 Woodlands Park  Industrial E2 Nordix Singapore 757470', '757470', '', NULL, 'Site Operation', 'Electrician', 'Employee', 0x4d616275642e6a7067, '2010-01-25', 'Active'),
(37, 'NKW', 'Ng Keng Wah', 'poul@inventogroup.com', '123', 93637378, '', '1978-03-05', 'Malaysia', 'Chinese', '', '', '', '', '', '', 'PR', '', '', 'No. 46 Jalan Utama 19 Taman Utama, Pekan Nanas  Johor, Malaysia 81500', NULL, 'Site Operation', 'Site Supervisor', 'Employee', 0x4e4b572e6a7067, '2016-05-25', 'Active'),
(57, 'SMKLY', 'Shirley Magdalene Kong Lai Yoke', 'shirley@inventogroup.com', '123', 91831428, '62658829', '1964-12-15', 'Singapore', 'Chinese', 'S1627714B', '', '', '', '', '', 'Singapore Citizen', 'Block 346 Kang Ching Road  #09-111 Singapore 610346', '610346', '', NULL, 'Management', 'Manager', 'Employee', '', '2012-11-01', 'Active'),
(38, 'SWX', 'Sam Wei Xuan', 'SWX@gmail.com', '123', 85694436, '', '1995-11-21', 'Malaysia', 'Chinese', '', '', '4 04665146 ', '08-05-2018', 'A35027687', '', 'Foreigner', 'Blk 244 Bukit Batok East Avenue 5 #09-08 Singapore 650244', '650244', 'No. 47 Jalan Kota 9 Taman Mutiara 83700  Yong Peng, Johor, Malaysia ', NULL, 'Admin', 'Admin cum Account Assistant', 'Employee', 0x5357582e6a7067, '2016-05-03', ''),
(56, 'LSY', 'Lee Sui Yiu', 'LSY@gmail.com', '123', 97429819, '', '1958-10-05', 'Singapore', 'Chinese', 'S1287211I', '', '', '', '', '', 'Singapore Citizen', 'Blk 352 Kang Ching Rd #09-71 Singapore 610352', '610352', '', NULL, 'Site Operation', 'Driver', 'Employee', '', '2007-04-01', 'Active'),
(58, 'KLY', 'Kimberley Pang', 'e412e@gmail.com', '123', 3213, '123', '21-AUG-2014', 'Algeria', 'Chinese', '123', '', '', '', '123', '21-22-2131', 'PR', '123', '213', '', NULL, 'Admin', 'fewf', 'Employee', 0x43686f62792e6a7067, '21-ufh-2312', 'Active'),
(59, 'HUW', 'eww', '322w@gmail.com', '123', 231, '1232', '12-cia-2131', 'Andorra', '123', 'Fw', '', '', '', '', '', 'PR', '221', '213', '', NULL, 'Design', '123', 'Employee', '', '12-12-1231', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `med_id` int(11) NOT NULL,
  `emp_id` varchar(3) DEFAULT NULL,
  `emp_fullname` varchar(255) DEFAULT NULL,
  `med_entitlement` int(255) DEFAULT NULL,
  `med_date` date DEFAULT NULL,
  `med_clinic` varchar(255) DEFAULT NULL,
  `med_receipt` blob,
  `med_days` int(11) DEFAULT NULL,
  `med_paid` float DEFAULT NULL,
  `med_currency` varchar(255) DEFAULT NULL,
  `med_rate` float DEFAULT NULL,
  `med_claimed` float DEFAULT NULL,
  `med_balance` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`med_id`, `emp_id`, `emp_fullname`, `med_entitlement`, `med_date`, `med_clinic`, `med_receipt`, `med_days`, `med_paid`, `med_currency`, `med_rate`, `med_claimed`, `med_balance`) VALUES
(46, 'SWX', 'Sam Wei Xuan', 200, '2017-08-15', 'test', 0x576861747341707020496d61676520323031372d30382d30322061742031302e35312e323620414d2e6a706567, 2, 20, 'sgd', 3, 23, 198);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `tool_id` int(11) NOT NULL,
  `emp_id` varchar(3) DEFAULT NULL,
  `emp_fullname` varchar(255) DEFAULT NULL,
  `tool_entitlement` varchar(255) DEFAULT NULL,
  `tool_prevbal` float DEFAULT NULL,
  `tool_date` date DEFAULT NULL,
  `tool_supplier` varchar(255) DEFAULT NULL,
  `tool_itemdesc` varchar(255) DEFAULT NULL,
  `tool_invoice` varchar(255) DEFAULT NULL,
  `tool_paid` float DEFAULT NULL,
  `tool_GST` tinyint(1) DEFAULT NULL,
  `tool_claimed` float DEFAULT NULL,
  `tool_balance` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tool_id`, `emp_id`, `emp_fullname`, `tool_entitlement`, `tool_prevbal`, `tool_date`, `tool_supplier`, `tool_itemdesc`, `tool_invoice`, `tool_paid`, `tool_GST`, `tool_claimed`, `tool_balance`) VALUES
(1, 'kim', 'Kimberley Pang', 'test', 241, '2017-08-15', 'test', 'test', '341', 123, 21, 21, 21),
(3, 'SWX', 'Sam Wei Xuan', '123', 12, '2017-08-16', 'test', 'test', 'test', 3232, 32, 32, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_email` (`cust_email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`),
  ADD UNIQUE KEY `emp_email` (`emp_email`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `FK_emp_id` (`emp_id`),
  ADD KEY `FK_emp_fullname` (`emp_fullname`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`tool_id`),
  ADD KEY `FK_emp_id` (`emp_id`),
  ADD KEY `FK_emp_name` (`emp_fullname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
