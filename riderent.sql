-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 01:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riderent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com'),
(8, 'abc888', '6d0361d5777656072438f6e314a852bc', 'abc@gmail.com'),
(9, 'admini', 'admini@123', 'admini@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(100) NOT NULL,
  `car_id` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pickup_loc` varchar(100) NOT NULL,
  `dropoff_loc` varchar(100) NOT NULL,
  `pickup_date` date NOT NULL,
  `dropoff_date` date NOT NULL,
  `pickup_time` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `car_id`, `email`, `pickup_loc`, `dropoff_loc`, `pickup_date`, `dropoff_date`, `pickup_time`, `status`) VALUES
(34, 8, 'raina@gmail.com', 'Indranagar', 'Indranagar', '2020-11-27', '2020-11-27', '06:40:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(20) NOT NULL,
  `car_name` varchar(20) NOT NULL,
  `car_img` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `car_priceperday` float NOT NULL,
  `car_priceperkm` int(20) NOT NULL,
  `car_availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_img`, `car_priceperday`, `car_priceperkm`, `car_availability`) VALUES
(1, 'Tata Nexon', 'images/nexon.jpg', 400, 15, 'yes'),
(2, 'Range Rover', 'images/rover.jpg', 500, 18, 'yes'),
(3, 'Alto-800', 'images/alto.png', 300, 13, 'yes'),
(4, 'Honda Amaze', 'images/amaze.png', 375, 17, 'yes'),
(5, 'Ford Figo', 'images/figo.png', 350, 16, 'yes'),
(6, 'Toyota Innova', 'images/Innova.png', 500, 17, 'yes'),
(7, 'Maruti Suzuki Ertiga', 'images/ertiga.jpg', 500, 16, 'yes'),
(8, 'Maruti Suzuki Ciaz', 'images/Ciaz.jpg', 300, 16, 'no'),
(9, 'Maruti Suzuki Dzire', 'images/dzire.png', 450, 16, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`f_name`, `l_name`, `email`, `phone`, `password`) VALUES
('Raina', 'Suresh', 'raina@gmail.com', 2147483647, 'Raina@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `email` (`email`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
