-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 17, 2024 at 05:45 PM
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
-- Table structure for table `Byedit`
--

CREATE TABLE `Byedit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Byedit`
--

INSERT INTO `Byedit` (`id`, `name`, `image_url`, `description`, `price`) VALUES
(5, 'Sensitive skin Serum', 'https://i.pinimg.com/564x/99/fe/eb/99feeb5c37b611490995ec59041b4125.jpg', 'Discover the nourishing Eyelashes & Brows Serum paired with the best-selling 5% Caffeine Eye Serum for bright, revitalised eyes.', '20.00'),
(6, 'Lip oil', 'https://i.pinimg.com/564x/44/aa/14/44aa14703b6631fc764b82018309dcdc.jpg', 'Enriched with squalane, jojoba oil ,and vitamin E, this tinted oil subtly colours the lips, delivering nutrition and suppleness with a glossy, non-sticky finish.\r\nFormulated without mineral oils and silicones.\r\n98% naturally derived. Vegan. Made in France.', '12.00'),
(7, 'Vitamin C ', 'https://i.pinimg.com/564x/f9/84/67/f984679de1b62382bcda5383aab23071.jpg', 'Enriched with antioxidant vitamin C and soothing aloe vera, this illuminating concentrate delivers radiance to the complexion instantly and over time.\r\nMix with your moisturiser or tinted serum for a natural, luminous finish.\r\nFormulated without silicones.\r\nSuitable for all skin tones.\r\n98% naturally derived. Vegan. Made in France.', '12.00'),
(8, 'Serum Caffeine', 'https://i.pinimg.com/564x/91/6e/b7/916eb71796439cbcd86956d1851394d6.jpg', 'Our caffeine eye serum and tinted concealer work together to reduce dark circles and puffiness while unifying and brightening the eye area.', '12.00');

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
(3, 'Tinted concealer', '23.00', 'https://i.pinimg.com/736x/ad/48/80/ad4880805b5fc1bc934b3daa89a038af.jpg', '2024-01-15 13:34:59', '2024-01-24 13:34:59'),
(4, 'Hydrolate ', '18.00', 'https://i.pinimg.com/564x/91/d6/be/91d6be3acccc2f1c5d66ec527159fccc.jpg', '2024-01-15 13:34:59', '2024-01-24 13:34:59'),
(5, 'Radiance Face Scrub', '24.00', 'https://i.pinimg.com/564x/fd/e8/5e/fde85e8884b822ca9eb2241ed4124c44.jpg', '2024-01-15 13:34:59', '2024-01-24 13:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `reviewer_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `reviewer_name`, `rating`, `comment`, `created_at`) VALUES
(3, 1, 'Jessica Farrugia ', 5, 'Positive points: -very natural effect, invisible on the skin -does not mark dry patches -unifies, luminous complexion (I advise against oily skins, or else it is necessary to powder) Negative points: -I\'m afraid it\'s going to be difficult in the end to get all the material back... -the outfit isn\' it\' it\' is not incredible (without powdering, really average, powdering it lasts all day) In conclusion I love it, very luminous and suitable for my needs (low and natural coverage for everyday use and good for dry skin with the care effect). In the picture I wear the lightest shade. ', '2024-01-17 14:57:48'),
(4, 2, 'Michael Smith ', 3, 'I use it in the morning and at bedtime to moisturize. The color is very subtle. No smell. The main concern is the container. The glass container is perfect BUT after a while it was impossible to get the product out with the tip. So big mess, what a shame!', '2024-01-17 14:57:48');

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
(31, 'cmmcmcmmc', '$2y$10$miQuzUi87kHWAn/hBoizSuAdHX7A0OdOJYPbKxEiEJA3fu7bBzCiS'),
(32, 'mamamamma', '$2y$10$24RbRwc8qM5UucwY5cUZ1Op7rP4bcRuNF9Ap9Cxyc.W6ohrYeOJsK'),
(33, 'msmsmsmsms', '$2y$10$jzOHuGrL8awM.OMd8zCBvOA2YrbWPOZ/FPXmaNo3fbin20FGw95UC'),
(34, ' mmnmmmhmh', '$2y$10$2P92IYk6laMYV9d7UfheMOkk82shMjDyIu43.EShSmEX9.rKVB.re'),
(35, ' mayayayyaya', '$2y$10$WG1IfVsCPrztZp.Nm0MZRO8nz7Ier8f8/93cIbYYGtq.rCtL9W.TW'),
(36, 'ddjmkdkeememmem e', '$2y$10$yZ6HssJ.Ox.7xs/T4un.vO28qsi79iHQ4AAEdehSLw9OHjH35Uukm'),
(37, 'mayacamilleri9999', '$2y$10$8n.ZCZkCGYLNGHxvCehFTeni0SfYE7M.Rnd.jFxWajwDjTqZsp2Su'),
(38, 'mmamamammamaa', '$2y$10$TEavIaFtlylhr32jGYhDR.rgq8WAn9FJV1aYW3FaIGwFHvycDNZq.'),
(39, 'mayaayaya', '$2y$10$63jlSeIGUOM.w4/IZGj3I.Gs8BoViKTQIO19VjCatNU/OznPGjfoa'),
(40, 'mayaayaya23k3k33', '$2y$10$uO8Lll3bZwBb51Ys8akYPep8bjAAuvuoLjIV2Jtn1uou4C4ZRhZLC'),
(41, 'mamammmamama', '$2y$10$B5M2tHUOjCwP4w7f2gTBwOqhOHZ8pRnX2QYX40OXItUJMb0ryBaqe'),
(42, 'maayhahshs', '$2y$10$LCYvPF3WJ.BxWdpjtQlA5Ors2ASZscrTfdlnrlVAa6S/UprDzoTD6'),
(43, 'mayacam2004', '$2y$10$LSPQHVg9bKE9Z8xYnQWkYOeTXK2tOkM2FYyYw0.Smk6Yd.tO1s90.'),
(44, 'maya4000maya', '$2y$10$l.9wO.iESv.9T94dN78lcO1Yoq9KTDsrCNmPDdtwzeL5ji2zvwJPS'),
(45, 'maycam2994', '$2y$10$jL/cyFbk62ilsp.GJ5HpiuYQQ4JO7hGOfl10gxhuGDXk9lyrfItLO'),
(46, 'mayacam999', '$2y$10$VwBusQr.pzIIE0rw0mAeHerGkKLcpEwGqVR1VCHpSakCafeY1Rphm');

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
-- Indexes for table `Byedit`
--
ALTER TABLE `Byedit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `Byedit`
--
ALTER TABLE `Byedit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'key', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
