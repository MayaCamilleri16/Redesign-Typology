-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 16, 2024 at 03:07 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Maya`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL COMMENT 'key',
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image_url`, `created_at`, `updated_at`) VALUES
(1, 'Makeup Remover', '14.00', 'https://i.pinimg.com/564x/f3/a6/6a/f3a66ac5fc104e9c961eadf9a702bf56.jpg', '2024-01-15 13:34:59', '2024-01-24 13:34:59'),
(2, 'Makeup Remover', '14.00', 'https://i.pinimg.com/564x/f3/a6/6a/f3a66ac5fc104e9c961eadf9a702bf56.jpg', '2024-01-15 13:34:59', '2024-01-24 13:34:59'),
(3, 'Tinted concealer', '23.00', 'https://i.pinimg.com/736x/ad/48/80/ad4880805b5fc1bc934b3daa89a038af.jpg', '2024-01-15 13:34:59', '2024-01-24 13:34:59'),
(4, 'Hydrolate ', '18.00', 'https://i.pinimg.com/564x/91/d6/be/91d6be3acccc2f1c5d66ec527159fccc.jpg', '2024-01-15 13:34:59', '2024-01-24 13:34:59'),
(5, 'Radiance Face Scrub', '24.00', 'https://i.pinimg.com/564x/fd/e8/5e/fde85e8884b822ca9eb2241ed4124c44.jpg', '2024-01-15 13:34:59', '2024-01-24 13:34:59'),
(6, 'Makeup Remover', '14.00', 'https://i.pinimg.com/564x/f3/a6/6a/f3a66ac5fc104e9c961eadf9a702bf56.jpg', '2024-01-15 13:55:04', '2024-01-15 13:55:04'),
(7, 'Tinted concealer', '23.00', 'https://i.pinimg.com/736x/ad/48/80/ad4880805b5fc1bc934b3daa89a038af.jpg', '2024-01-15 13:55:04', '2024-01-15 13:55:04'),
(8, 'Hydrolate', '18.00', 'https://i.pinimg.com/564x/91/d6/be/91d6be3acccc2f1c5d66ec527159fccc.jpg', '2024-01-15 13:55:04', '2024-01-15 13:55:04'),
(9, 'Radiance Face Scrub', '24.00', 'https://i.pinimg.com/564x/fd/e8/5e/fde85e8884b822ca9eb2241ed4124c44.jpg', '2024-01-15 13:55:04', '2024-01-15 13:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`user_id`, `username`, `password`) VALUES
(1, 'maya', '$2y$10$94SYISqw4Bg0mcl6OXIA.emLgw8mRev5PuF7.GPjqApceZejRHwRG'),
(3, 'mum ', '$2y$10$xdBRgz.yGuSKR5CT8iCIdO/.izqercRw0aps4G8514tW1WrnZPxMi'),
(5, 'mummum', '$2y$10$uEL9lIZ/.BUrU4yxdDYfwOQYGeWMIHR8j3a6yhyno.unvNtZ1Q0Ri'),
(7, 'mayayayayyaya001', '$2y$10$VjWSOCKHU7kdryeH8W.p6u3nEAQQEWUjQ8JIVAw3S9wYhWmh5GXqa'),
(8, 'mayayayayya', '$2y$10$dlKvHIwcSkq0Asbc/Ptore.WKAITQfDR1HQ1u11TnEqKElQL.Q.mG'),
(9, 'mayayayya', '$2y$10$kGk1R8CkIB2QYh0kESFujO2H7n7kDlE7mPky202awbjhVdmWjSM1i'),
(10, 'maya02020mmmM', '$2y$10$fQmMCGlv9hMsYleICKvMOetfkeU2wSE1LrgiQ5Pl1r35jWuBeyPRm'),
(11, 'mayayayayayM', '$2y$10$Soo4vLukPakt/9YpQvVBmuZcqUf7AJork3zEw6C.uz9lKFeFmYJl6'),
(12, '2000', '$2y$10$RnCdp4e3BOsz7GXPrv8W1eB80Ks5yG6bKGafC8b10f4WaTaa5kFRi'),
(13, 'mayaayayya', '$2y$10$ctnnbqQceRoBe7AWTI8BIOBfvLUu5Z2A4w766zqvnbSweDoee/oGC'),
(14, 'mayyayaa', '$2y$10$4BPLaBWIwfQ5LCYCTOUoJ.ZKRQwFPGONZ3C07njC31wqK3oow6VTG'),
(15, 'mayayyaya', '$2y$10$kNqTMkonRiCA6JJtGxmcVOQJDEMXBVciTKGWWkj7eX2S3Vf7CSA2C'),
(16, 'Camilleri', '$2y$10$xPrpXzqVBdQxxeRnbIlzcehtbb0hL1pulsBf3LPfAeo7NBw7Sbm6i'),
(17, 'maya camilleri', '$2y$10$EGCb8YrHDA6QN5TeAMJidu5AbwnNfJxaG5ekiPbtnhKU4wqCcCwTa'),
(18, 'maya00d0dcamilleri', '$2y$10$bXmsYhFo5dwOExEjOi.K2.FTu0p.U5s0ajlUBqMq3RPu8W5grcm1m'),
(19, 'ahlahahahhahahauauajsj', '$2y$10$m4E8V3bgadgShnND5R0XkO5CpNJhlwxmXJiefP3HnnwEYrnGidR5C'),
(20, 'ajkjajjsjhss', '$2y$10$DGxuVmz4O8d6bhMjsIDoOum4IQnbvJn1fBBD4et6MPmG1rLMxReEy'),
(21, 'mjedjdkidid', '$2y$10$sJx2sOjdiKu/5gajI1tki.Bv2xQgIW6Q8/ziMBcIgIsGWGnVbn0pe'),
(22, 'maaauyayyaya', '$2y$10$69t7MNQHQwNgH9ao9repyuA74urVU18u7rivQtc4wUlTZEoPm8EKC'),
(23, 'nnhuhhj', '$2y$10$mmMIOJL/3kKHkyog/BNmDON1w0vQCm2U0nNLtMJCIkFRtc1mghP02'),
(24, 'mdmmdmd', '$2y$10$k5xwwlHcqZAFp5oKzDWkK.CQITH5qFvaD8chxORfWkRyae5Oms7Iy'),
(25, 'msmsmms', '$2y$10$vrhT67t5eJCLKFkao2BL9uSHxFJF/v0yBp8k21/HNPpwoC13az/Km'),
(26, 'mayavam', '$2y$10$Eim8ulZj4gS5pLkefE4i/er5b.DErR4aY9R53AU06jR43e8nMRevy'),
(27, 'msyacam', '$2y$10$jozJswYv6NUTIoBqfB2aLOOSa6cfcqo1vEmVTn1iqeRhilx5uGu.e'),
(28, 'mayaaaaocococo', '$2y$10$wj8xSh6X5yRzP6JWnmoVwe5IIKP.yPlcBI8JdpL3t1JGa.GOYBq1e'),
(29, 'm snsnsdx', '$2y$10$hi/1fK9zE2hL1rnR/c8rouACu4QYyTIlLbSzsWj5KkKxj1fq0VIh.'),
(30, 'majjahauaua', '$2y$10$SRLsXiyrsOBUfkf230zZy.Dn7qznP1jmvym511C2OoXnslw0Dg3pe'),
(31, 'cmmcmcmmc', '$2y$10$miQuzUi87kHWAn/hBoizSuAdHX7A0OdOJYPbKxEiEJA3fu7bBzCiS');

-- --------------------------------------------------------

--
-- Table structure for table `UserFavourites`
--

CREATE TABLE `UserFavourites` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `UserFavourites`
--
ALTER TABLE `UserFavourites`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'key', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `UserFavourites`
--
ALTER TABLE `UserFavourites`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `UserFavourites`
--
ALTER TABLE `UserFavourites`
  ADD CONSTRAINT `userfavourites_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user1` (`user_id`),
  ADD CONSTRAINT `userfavourites_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
