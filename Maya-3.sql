-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 22, 2024 at 09:34 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(2, 'maya', 'dd6ad2fbee41af6a3df0c976af0d09f22f09a9aab2f0bf9ca7724ad0d0843144'),
(3, 'maya1', '$2y$10$c4qO4gDe4H0.7cRULA6gBuK2DrDemqA5ZahFQITJJAd405Nf91Qey'),
(4, 'maya2', '$2y$10$vIsfQgSopop5h69Pgn3CMuQttBiOyXM8QxzKZTP/ExKyeoNcaEyce'),
(5, 'new_admin_username', '$2y$10$zVpjjjOrsyZMV3qIcHc7SOS2A5HbL.CMFJnVD5TFeOt.c8RmDJSw2'),
(6, 'maya', '$2y$10$EaMFK8amqzZDr69wtxPy3eIsMKS8C1VFNbg1yZYCvh2sx3VazhGOu');

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
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_reply` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `admin_reply`) VALUES
(1, 'maya', 'mayacam2004@gmail.com', 'checkout', 'I can\'t shop', '2024-01-21 14:12:57', ''),
(2, 'maya', 'maya@gmail.com', 'mcmcm', 'mammas', '2024-01-21 14:13:10', ''),
(3, 'maya', 'maya@gmail.com', 'mcmcm', 'mammas', '2024-01-21 14:13:25', ''),
(4, 'maya', 'mayacam@gmail.com', 'swims', 'mdm', '2024-01-21 14:13:49', ''),
(5, 'maya', 'mayacam@gmail.com', 'swims', 'mdm', '2024-01-21 14:18:42', ''),
(6, 'maya', 'maya@gmail.com', 'products', 'products', '2024-01-22 08:48:03', NULL),
(7, 'maya', 'maya@gmail.com', 'products', 'products', '2024-01-22 08:48:09', NULL),
(8, 'maya', 'maya@gmail.com', 'products', 'products', '2024-01-22 08:49:37', ''),
(9, 'nmaya', 'maya@gmail.com', 'products', 'private', '2024-01-22 08:49:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `FaceCare`
--

CREATE TABLE `FaceCare` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FaceCare`
--

INSERT INTO `FaceCare` (`id`, `name`, `image_url`, `description`, `price`, `category`) VALUES
(1, 'Tinted serum', 'https://i.pinimg.com/474x/2c/89/71/2c89714756fe886bb8550d4e647c45f7.jpg', 'A silicon-free, non-clogging tinted serum for light coverage and a natural no-makeup finish.\r\nFormulated with vitamin C for radiance and squalane & aloe vera for deep, long-lasting hydration.\r\n99% naturally-derived formula.', '30.00', '1'),
(2, '9-Ingredient Face Moisturiser', 'https://i.pinimg.com/474x/e7/79/1e/e7791e5c88ab19c1031316596e41d1c9.jpg', 'Give your skin daily hydration and nourishment with our iconic minimalist moisturiser made from only 9 ingredients. Lightweight, non-greasy, fragrance-free formula.\r\n\r\nDermatologist tested and suitable for all skin types, including sensitive.\r\n\r\n99% naturally derived. Vegan. Made in France.', '20.00', '1'),
(3, 'Look rested', 'https://i.pinimg.com/474x/3c/3d/36/3c3d3672c0dbd7b50dd6e9bd31110308.jpg', 'Our caffeine eye serum and tinted concealer work together to reduce dark circles and puffiness while unifying and brightening the eye area.', '40.00', '1'),
(4, 'The TEN Essentials Trio\r\nTEN essentials', 'https://i.pinimg.com/474x/8b/6c/01/8b6c01ec0626bc2fd5b4705c8b7a5d50.jpg', 'A moisturiser, lip and hand balm to nourish the face, lips and hands throughout the day.', '52.00', '1'),
(5, 'Eyebrow & Eyelash Serum\r\nwith 2% Pea Peptides + Castor Oil', 'https://i.pinimg.com/474x/f2/c3/ae/f2c3aeed12e610915ad703f6d9c62a68.jpg', 'Nourish and strengthen lashes and brows with this untinted serum concentrated with active ingredients.\r\n96% naturally derived. Vegan. Made in France.', '20.00', '1'),
(6, 'Mattifying Serum\r\nwith 10% Azelaic Acid', 'https://i.pinimg.com/474x/13/60/af/1360af7d5e2244ee5e81e7dcf5ccd05e.jpg', 'Mattify your complexion and reduce the production of excess sebum with an active-rich serum suitable for oily and blemish-prone skin typologies.\r\n\r\n97% naturally derived. Vegan. Made in France.', '15.00', '1'),
(7, 'Blemish Serum\r\nwith 1% Bakuchiol', 'https://i.pinimg.com/474x/bb/bf/b2/bbbfb292ce468c684c1e6dac12658ec5.jpg', '\r\nThis blemish serum is enriched with bakuchiol, a natural, gentler alternative to retinol. It is suitable for oily skin typologies prone to breakouts and blemishes.\r\n\r\n100% naturally derived. Vegan. Made in France.', '15.00', '1');

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
(4, 2, 'Michael Smith ', 3, 'I use it in the morning and at bedtime to moisturize. The color is very subtle. No smell. The main concern is the container. The glass container is perfect BUT after a while it was impossible to get the product out with the tip. So big mess, what a shame!', '2024-01-17 14:57:48'),
(5, 5, 'Maya', 5, '0', '2024-01-20 14:26:26'),
(6, 5, 'Maya', 5, '0', '2024-01-20 14:26:46'),
(7, 2, 'Maya', 5, '0', '2024-01-20 14:37:41'),
(8, 5, 'Maya', 5, '0', '2024-01-20 14:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `Shipping`
--

CREATE TABLE `Shipping` (
  `shipping_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `shipping_method` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SupportRequestReplies`
--

CREATE TABLE `SupportRequestReplies` (
  `ID` int(11) NOT NULL,
  `SupportRequestID` int(11) NOT NULL,
  `AdminReply` text NOT NULL,
  `ReplyTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SupportRequests`
--

CREATE TABLE `SupportRequests` (
  `ID` int(11) NOT NULL,
  `User` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `DateSubmitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(46, 'mayacam999', '$2y$10$VwBusQr.pzIIE0rw0mAeHerGkKLcpEwGqVR1VCHpSakCafeY1Rphm'),
(47, 'mayadesign', '$2y$10$QjDV5pT2B0xA0YX1n6aJX.kKNtNIZV8idKC5DqKuSQZI7vfNtk8Pe'),
(48, 'maya01', '$2y$10$QGheUMCfKxtnc1OPFOBAKeuIr96LaPZYVjGkEaVRG1.Z..Lo5uCT.');

-- --------------------------------------------------------

--
-- Table structure for table `UserFavourites`
--

CREATE TABLE `UserFavourites` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserFavourites`
--

INSERT INTO `UserFavourites` (`ID`, `UserID`, `ProductID`) VALUES
(1, 47, 4),
(2, 47, 4),
(3, 47, 4),
(4, 47, 1),
(5, 47, 1),
(6, 47, 1),
(7, 47, 1),
(8, 47, 1),
(9, 47, 3),
(10, 47, 3),
(11, 47, 3),
(12, 47, 1),
(13, 47, 3),
(14, 47, 1),
(15, 47, 1),
(16, 47, 1),
(17, 47, 1),
(18, 47, 1),
(19, 47, 1),
(20, 47, 1),
(21, 47, 1),
(22, 47, 1),
(23, 47, 1),
(24, 47, 1),
(25, 47, 3),
(26, 47, 1),
(27, 47, 3),
(28, 47, 1),
(29, 47, 1),
(30, 47, 4),
(31, 47, 4),
(32, 47, 4),
(33, 47, 4),
(34, 47, 4),
(35, 47, 1),
(36, 47, 1),
(37, 47, 1),
(38, 47, 1),
(39, 47, 1),
(40, 47, 1),
(41, 47, 1),
(42, 47, 1),
(43, 47, 1),
(44, 47, 1),
(45, 47, 1),
(46, 47, 1),
(47, 47, 1);

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `Byedit`
--
ALTER TABLE `Byedit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `FaceCare`
--
ALTER TABLE `FaceCare`
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
-- Indexes for table `Shipping`
--
ALTER TABLE `Shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `SupportRequestReplies`
--
ALTER TABLE `SupportRequestReplies`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SupportRequestID` (`SupportRequestID`);

--
-- Indexes for table `SupportRequests`
--
ALTER TABLE `SupportRequests`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Byedit`
--
ALTER TABLE `Byedit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `FaceCare`
--
ALTER TABLE `FaceCare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'key', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Shipping`
--
ALTER TABLE `Shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SupportRequestReplies`
--
ALTER TABLE `SupportRequestReplies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SupportRequests`
--
ALTER TABLE `SupportRequests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `UserFavourites`
--
ALTER TABLE `UserFavourites`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `SupportRequestReplies`
--
ALTER TABLE `SupportRequestReplies`
  ADD CONSTRAINT `supportrequestreplies_ibfk_1` FOREIGN KEY (`SupportRequestID`) REFERENCES `SupportRequests` (`ID`);

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
