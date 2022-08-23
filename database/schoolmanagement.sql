-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 10:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(255) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `employee_id` int(255) DEFAULT NULL,
  `mobile` int(255) DEFAULT NULL,
  `User_name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `employee_name`, `employee_id`, `mobile`, `User_name`, `Password`) VALUES
(1, NULL, NULL, NULL, 'ravindra', 'rk@123');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(255) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`) VALUES
(1, 'Ist'),
(2, '2nd'),
(3, '3rd\n'),
(4, '4th'),
(5, '5th'),
(6, '6th'),
(7, '7th'),
(8, '8th'),
(9, '9th'),
(10, '10th'),
(11, '11th'),
(12, '12th');

-- --------------------------------------------------------

--
-- Table structure for table `class_fees`
--

CREATE TABLE `class_fees` (
  `id` int(11) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `total_fees` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_fees`
--

INSERT INTO `class_fees` (`id`, `class`, `total_fees`) VALUES
(1, '1st', '15000'),
(2, '2nd', '15000'),
(3, '3rd', '15000'),
(4, '4th', '16000'),
(5, '5th', '16000'),
(6, '6th', '16000'),
(7, '7th', '17000'),
(8, '8th', '17000'),
(9, '9th', '17000'),
(10, '10th', '18000'),
(11, '11th', '18000'),
(12, '12th', '18000');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` int(10) NOT NULL,
  `schollar_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `mobile` int(15) NOT NULL,
  `total_fees` varchar(15) NOT NULL,
  `total_deposit` int(21) NOT NULL,
  `fees_remain` int(15) NOT NULL,
  `pay_date` varchar(255) NOT NULL,
  `last_transaction_amount` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `schollar_no`, `name`, `father_name`, `class`, `section`, `mobile`, `total_fees`, `total_deposit`, `fees_remain`, `pay_date`, `last_transaction_amount`) VALUES
(9, '1', 'hariom kushwaha', 'surendra kushwaha', '11th', 'A', 2147483647, '18000', 5000, 13000, '2022-04-10', 2000),
(10, '1', 'hariom kushwaha', 'surendra kushwaha', '11th', 'A', 2147483647, '18000', 6000, 12000, '2022-04-10', 1000),
(11, '1', 'hariom kushwaha', 'surendra kushwaha', '11th', 'A', 2147483647, '18000', 7000, 11000, '2022-04-10', 1000),
(12, '1', 'hariom kushwaha', 'surendra kushwaha', '11th', 'A', 2147483647, '18000', 8000, 10000, '2022-04-10', 1000),
(13, '3', 'niteesh kumar', 'raghvendra prakash', '5th', 'C', 2147483647, '16000', 1000, 15000, '2022-04-01', 1000),
(14, '1', 'hariom kushwaha', 'surendra kushwaha', '11th', 'A', 2147483647, '18000', 5000, 13000, '', 0),
(15, '1', 'hariom kushwaha', 'surendra kushwaha', '11th', 'A', 2147483647, '18000', 5000, 13000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_registraion`
--

CREATE TABLE `student_registraion` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `landline` varchar(255) DEFAULT NULL,
  `schollar_no` int(255) NOT NULL,
  `reg_no` int(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `mode` varchar(25) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `section` varchar(5) NOT NULL,
  `add_date` date NOT NULL,
  `medium` varchar(255) NOT NULL,
  `prev_school` varchar(255) NOT NULL,
  `prev_class` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `M_tongue` varchar(255) NOT NULL,
  `resi_area` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `income` int(255) NOT NULL,
  `vehicle` varchar(255) DEFAULT NULL,
  `bus_no` int(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bank_ac` int(255) NOT NULL,
  `ifsc` varchar(20) NOT NULL,
  `addhar` int(255) DEFAULT NULL,
  `samgra` int(255) NOT NULL,
  `stuimg` varchar(255) NOT NULL,
  `addharimg` varchar(255) NOT NULL,
  `passbookimg` varchar(255) NOT NULL,
  `tcimg` varchar(255) DEFAULT NULL,
  `marksheetimg` varchar(255) NOT NULL,
  `incomeimg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_registraion`
--

INSERT INTO `student_registraion` (`id`, `first_name`, `last_name`, `father_name`, `mother_name`, `dob`, `gender`, `country`, `state`, `city`, `address`, `mobile`, `landline`, `schollar_no`, `reg_no`, `class`, `mode`, `stream`, `section`, `add_date`, `medium`, `prev_school`, `prev_class`, `category`, `religion`, `M_tongue`, `resi_area`, `occupation`, `income`, `vehicle`, `bus_no`, `bank`, `bank_ac`, `ifsc`, `addhar`, `samgra`, `stuimg`, `addharimg`, `passbookimg`, `tcimg`, `marksheetimg`, `incomeimg`) VALUES
(1, 'hariom', 'kushwaha', 'surendra kushwaha', 'vandna devi', '2002-10-09', 'male', 'india', 'madhya predesh', 'niwari', 'vill.bhera niwari madhya predesh 472446', '2147483647', '222546895', 1, 1122, '11th', 'Regular', 'Math', 'A', '2021-07-01', 'Hindi', 'goverment inter college niwari', '10th', 'O.B.C.', 'HINDU', 'hindi', 'Rural', 'farmer', 20000, 'Yes', 2, 'state bank of india', 2147483647, 'SBIN210001', 2147483647, 2147483000, 'Screenshot (26).png', 'Screenshot (1).png', 'Screenshot (2).png', 'Screenshot (19).png', 'Screenshot (21).png', 'Screenshot (26).png'),
(2, 'rajni', 'kushwaha', 'jagdeesh kushwaha', 'geeta kushwaha', '2014-10-01', 'female', 'india', 'madhya predesh', 'jhansi', 'barwasagar jhansi', '7880517941', '88664455', 3, 112233, '6th', 'NA', 'NA', 'b', '2022-07-03', 'Hindi', 'pt jawaharlal nehru primary svhool', '5th', 'O.B.C.', 'Muslim', 'telgu', 'Rural', 'Doctor', 500000, NULL, NULL, ' Bank Of India', 2147483611, 'BOI210001', 2147483622, 150305199, 'Screenshot (25).png', 'Screenshot (30).png', 'Screenshot (21).png', 'Screenshot (27).png', 'Screenshot (43).png', 'Screenshot (26).png'),
(3, 'bharat', 'Bhusan', 'raghvendra praksh', 'rajkumari', '2013-12-16', 'male', 'india', 'uttar predesh', 'banda', 'jain dharamshala station road banda', '9918879553', '45454511', 2, 7618, '4th', 'NA', 'NA', 'A', '2022-07-15', 'Hindi', '', '3rd\r\n', 'General', 'HINDU', 'hindi', 'Urban', 'private job', 150000, NULL, NULL, 'AU Bank', 1147258963, 'au452010', 2147483647, 2147483647, 'Screenshot (39).png', 'Screenshot (24).png', 'Screenshot (42).png', 'Screenshot (38).png', 'Screenshot (49).png', 'Screenshot (43).png');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_reg`
--

CREATE TABLE `teacher_reg` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `fORh_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bank_ac` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `addhar` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `shift_time` varchar(255) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `empimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_reg`
--

INSERT INTO `teacher_reg` (`id`, `first_name`, `last_name`, `fORh_name`, `mother_name`, `dob`, `gender`, `country`, `state`, `city`, `address`, `bank_ac`, `ifsc`, `addhar`, `mobile`, `qualification`, `experience`, `shift_time`, `empid`, `empimg`) VALUES
(8, 'anamika', 'kasyap', 'raman kasyap', 'sharda devi', '1978-01-01', 'Female', 'india', 'punjab', 'jaladhar', '123/4 sector 16 gurdaspur', '1111111111111', 'boi2545', '120210201205', '2222222222', 'M.E.', 'Experiensed', 'Afternoon', '1576118', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_fees`
--
ALTER TABLE `class_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registraion`
--
ALTER TABLE `student_registraion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_reg`
--
ALTER TABLE `teacher_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class_fees`
--
ALTER TABLE `class_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_registraion`
--
ALTER TABLE `student_registraion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_reg`
--
ALTER TABLE `teacher_reg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
