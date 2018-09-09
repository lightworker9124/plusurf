-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2018 at 03:57 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `provider_id` varchar(400) DEFAULT NULL,
  `provider_name` varchar(400) DEFAULT NULL,
  `language` varchar(40) DEFAULT NULL,
  `activation_key` text,
  `rest_key` text,
  `rest_date` varchar(200) DEFAULT NULL,
  `logkey` text,
  `status` int(20) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `provider_id`, `provider_name`, `language`, `activation_key`, `rest_key`, `rest_date`, `logkey`, `status`, `created_at`, `updated_at`) VALUES
(1, 'wesparklesolutions', 'wesparklesolutions@gmail.com', 'fxSDNeycZWu0P54x61Ay-wdTjXuWVIOzBt5TyjZn2yu2PRPUFQE', NULL, NULL, NULL, NULL, NULL, NULL, 'a:8:{i:0;s:51:\"gN6S9EvtVPLW4q1WVnKH2SpB9VSBV_dYQcFcjpAMQNKyB-Y8z9g\";i:1;s:51:\"zMhMhnbUbrEg7BtPSznxTsLaE_UtWVFyq4aUO-Mfpki6TdICUTg\";i:2;s:51:\"WHh2jveQ-sxjdM8c8HCAMMA8iD9ZzN542DJr4zVVcG_AqzptGnE\";i:3;s:51:\"KxPPC1XEZfFt4q-SOD0dWBtp3ovqMcD6uk3goj01A1g1WagYIfA\";i:4;s:51:\"s04V6AIkrx4nEyWOaTk9YNN5zursRxapH7LHgYRXUOMB3i970Bs\";i:5;s:51:\"G7zYYNHAT9WnAKpNNNTTlzQTQKO46vqMxs-ErhPR53pzGxUNOt8\";i:6;s:51:\"dIAYYA68WCau9hz-huoo4u16E1s6pDb7jb6lFasTV3fUYpVzCgo\";i:7;s:51:\"eSRcbxkag2YmoBQvleoUCUNHm3IyftajyC2t-dP3xTiscK-icL0\";}', 1, '1536009370', '1536369279');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate`
--

DROP TABLE IF EXISTS `affiliate`;
CREATE TABLE IF NOT EXISTS `affiliate` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) DEFAULT NULL,
  `fullname` varchar(600) DEFAULT NULL,
  `adresse` text,
  `country` text,
  `city` text,
  `codepostal` text,
  `paypal_email` text,
  `payoneer_email` text,
  `status` int(20) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

DROP TABLE IF EXISTS `exchange`;
CREATE TABLE IF NOT EXISTS `exchange` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) DEFAULT NULL,
  `lasturl_id` text,
  `accepted_time` text,
  `last_run` varchar(200) DEFAULT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `closed` int(20) DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exchange`
--

INSERT INTO `exchange` (`id`, `user_id`, `lasturl_id`, `accepted_time`, `last_run`, `ip`, `closed`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'noexchange', '1536016817', '1536016309', '::1', 0, 1, '1536016207', '1536016802'),
(2, 1, '17', '1536361671', '1536361168', '::1', 0, 1, '1536016811', '1536361661'),
(5, 2, 'noexchange', '1536380709', '1536380467', '::1', 0, 1, '1536017489', '1536380694'),
(6, 3, '10', '1536381330', '1536381101', '::1', 0, 1, '1536380916', '1536381324'),
(7, 2, 'noexchange', '1536456552', '1536456537', '::1', 0, 1, '1536456467', '1536456537');

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

DROP TABLE IF EXISTS `hits`;
CREATE TABLE IF NOT EXISTS `hits` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `website_id` int(20) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL,
  `point` varchar(200) DEFAULT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `browser` varchar(600) DEFAULT NULL,
  `os` varchar(600) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`id`, `website_id`, `user_id`, `point`, `ip`, `browser`, `os`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '0.21', '::1', 'Chrome', 'Windows', '1536024004', '1536024004'),
(2, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536024666', '1536024666'),
(3, 2, 2, '0.06', '::1', 'Chrome', 'Windows', '1536024673', '1536024673'),
(4, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030453', '1536030453'),
(5, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536030462', '1536030462'),
(6, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536030470', '1536030470'),
(7, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030501', '1536030501'),
(8, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030533', '1536030533'),
(9, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536030540', '1536030540'),
(10, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030572', '1536030572'),
(11, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536030579', '1536030579'),
(12, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536030587', '1536030587'),
(13, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030619', '1536030619'),
(14, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536030626', '1536030626'),
(15, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030658', '1536030658'),
(16, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030689', '1536030689'),
(17, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030721', '1536030721'),
(18, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030752', '1536030752'),
(19, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030784', '1536030784'),
(20, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030815', '1536030815'),
(21, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030847', '1536030847'),
(22, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536030854', '1536030854'),
(23, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030886', '1536030886'),
(24, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030917', '1536030917'),
(25, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536030924', '1536030924'),
(26, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030956', '1536030956'),
(27, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536030964', '1536030964'),
(28, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536030995', '1536030995'),
(29, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031026', '1536031026'),
(30, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031058', '1536031058'),
(31, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031089', '1536031089'),
(32, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031121', '1536031121'),
(33, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031128', '1536031128'),
(34, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031160', '1536031160'),
(35, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031191', '1536031191'),
(36, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031198', '1536031198'),
(37, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031230', '1536031230'),
(38, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031237', '1536031237'),
(39, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031269', '1536031269'),
(40, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031300', '1536031300'),
(41, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031332', '1536031332'),
(42, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031339', '1536031339'),
(43, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031347', '1536031347'),
(44, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031378', '1536031378'),
(45, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031409', '1536031409'),
(46, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031441', '1536031441'),
(47, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031472', '1536031472'),
(48, 5, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031503', '1536031503'),
(49, 9, 2, '0.3', '::1', 'Chrome', 'Windows', '1536031535', '1536031535'),
(50, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031542', '1536031542'),
(51, 9, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031619', '1536031619'),
(52, 5, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031626', '1536031626'),
(53, 9, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031634', '1536031634'),
(54, 9, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031641', '1536031641'),
(55, 5, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031648', '1536031648'),
(56, 5, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031656', '1536031656'),
(57, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031664', '1536031664'),
(58, 5, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031671', '1536031671'),
(59, 9, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031678', '1536031678'),
(60, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536031687', '1536031687'),
(61, 17, 1, '0.1', '::1', 'Chrome', 'Windows', '1536178354', '1536178354'),
(62, 17, 1, '0.1', '::1', 'Chrome', 'Windows', '1536182759', '1536182759'),
(63, 17, 1, '0.1', '::1', 'Chrome', 'Windows', '1536182771', '1536182771'),
(64, 5, 2, '0.06', '::1', 'Chrome', 'Windows', '1536355564', '1536355564'),
(65, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536355572', '1536355572'),
(66, 5, 2, '0.06', '::1', 'Chrome', 'Windows', '1536355580', '1536355580'),
(67, 5, 2, '0.06', '::1', 'Chrome', 'Windows', '1536355588', '1536355588'),
(68, 5, 2, '0.06', '::1', 'Chrome', 'Windows', '1536355596', '1536355596'),
(69, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536355604', '1536355604'),
(70, 5, 2, '0.06', '::1', 'Chrome', 'Windows', '1536355668', '1536355668'),
(71, 3, 2, '0.06', '::1', 'Chrome', 'Windows', '1536355676', '1536355676'),
(72, 5, 2, '0.06', '::1', 'Chrome', 'Windows', '1536355685', '1536355685'),
(73, 17, 1, '0.1', '::1', 'Chrome', 'Windows', '1536361278', '1536361278'),
(74, 17, 1, '0.1', '::1', 'Chrome', 'Windows', '1536361290', '1536361290'),
(75, 17, 1, '0.1', '::1', 'Chrome', 'Windows', '1536361650', '1536361650'),
(76, 17, 1, '0.1', '::1', 'Chrome', 'Windows', '1536361661', '1536361661'),
(77, 5, 2, '0.12', '::1', 'Chrome', 'Windows', '1536376602', '1536376602'),
(78, 5, 2, '0.12', '::1', 'Chrome', 'Windows', '1536376609', '1536376609'),
(79, 3, 2, '0.12', '::1', 'Chrome', 'Windows', '1536376618', '1536376618'),
(80, 10, 3, '1.2', '::1', 'Chrome', 'Windows', '1536381011', '1536381011'),
(81, 10, 3, '1.2', '::1', 'Chrome', 'Windows', '1536381043', '1536381043'),
(82, 11, 3, '1', '::1', 'Chrome', 'Windows', '1536381300', '1536381300'),
(83, 10, 3, '1', '::1', 'Chrome', 'Windows', '1536381308', '1536381308'),
(84, 11, 3, '1', '::1', 'Chrome', 'Windows', '1536381316', '1536381316'),
(85, 11, 3, '1', '::1', 'Chrome', 'Windows', '1536381324', '1536381324');

-- --------------------------------------------------------

--
-- Table structure for table `newsletteres`
--

DROP TABLE IF EXISTS `newsletteres`;
CREATE TABLE IF NOT EXISTS `newsletteres` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `status` int(20) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `to_group` varchar(200) DEFAULT NULL,
  `subject` text,
  `content` longtext,
  `starton` varchar(200) DEFAULT NULL,
  `progress` varchar(200) DEFAULT NULL,
  `offset` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) DEFAULT NULL,
  `plan_id` int(20) DEFAULT NULL,
  `kind` varchar(900) DEFAULT NULL,
  `payment_id` varchar(500) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `currency` varchar(200) DEFAULT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `confirmed` int(20) DEFAULT NULL,
  `payment_service` text,
  `payment_info` longtext,
  `status` int(20) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `plan_id`, `kind`, `payment_id`, `amount`, `currency`, `ip`, `confirmed`, `payment_service`, `payment_info`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Silver', '59fa3d9dd70d06b148a5989879ea307e', '9.00', 'EUR', '::1', 2, '2checkout', 'NDY2MTBiMjEtYWYxMC00ZmNjLWFlZmQtYWQ1MGEzMWFkYWIy', 1, '1536372921', '1536372921'),
(2, 2, 2, 'Silver', '1125a17d97ef2733c68ec4b228174e9c', '9.00', 'EUR', '::1', 2, '2checkout', 'ODJkOTlmZmYtOTNjMC00ZDc5LWExZjEtNjIwYTg1YWM5NmY1', 1, '1536373637', '1536373637'),
(3, 2, 2, 'Silver', '7de381549508b86d85174ab6b2c7faed', '9.00', 'EUR', '::1', 2, '2checkout', 'ODhmODVlNjktMzdiYy00NTExLWE3ZmEtMjc0NGFmZTkwNTFm', 1, '1536453958', '1536453958'),
(4, 2, 2, 'Silver', 'af82e29c970d3cac14af57ea2a0aab7e', '9.00', 'EUR', '::1', 2, '2checkout', 'YzBlYmZmMTktZGYyOS00MDIyLThiOTgtOWU4ZGUxY2Y5YTRm', 1, '1536454428', '1536454428'),
(5, 2, 2, 'Silver', '9f6e41cc8ab18012435c95c0ccdd4661', '9.00', 'EUR', '::1', 2, '2checkout', 'ZDgwZDUwYjUtNzVmNC00ODU4LTkwOTItMmJlZjBiZTdiYWQw', 1, '1536459877', '1536459877'),
(6, 2, 2, 'Silver', 'e278a649d16230064a6d4cb80d8534b7', '9.00', 'EUR', '::1', 2, '2checkout', 'YmJkMjVmNDQtMGE2Ni00NDFhLWE0MWMtYzBhNzJhNWRkNTRl', 1, '1536460116', '1536460116'),
(7, 2, 3, 'Gold', '242c26556ef9bdb04d47dda9181fa887', '9.00', 'EUR', '::1', 2, '2checkout', 'ZjhlNTg3YzItYWFmYi00MTUzLWJiOTQtNDQyMjYwOGU1MmIw', 1, '1536460727', '1536460727'),
(8, 2, 3, 'Gold', 'b2c96db39a19acd44961d72d86ae081a', '9.00', 'EUR', '::1', 2, '2checkout', 'YjM0NTcxZmUtMTUzYy00N2M0LThmYWYtNzA3ZmVjZjY4ZGJl', 1, '1536461858', '1536461858'),
(9, 2, 4, '10,000 autosurf points', 'bfc40f674c7b0630f8af5636b53edc5f', '9.00', 'EUR', '::1', 2, '2checkout', 'YTc3ZWU0YWUtZThiMS00NTBlLWJiOTgtMzEwMDRiM2Y2MWQx', 1, '1536465411', '1536465411');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(900) DEFAULT NULL,
  `type` text,
  `website_slots` varchar(900) DEFAULT NULL,
  `session_slots` varchar(900) DEFAULT NULL,
  `traffic_ratio` varchar(900) DEFAULT NULL,
  `price` varchar(900) DEFAULT NULL,
  `currency` varchar(900) DEFAULT NULL,
  `duration` varchar(200) DEFAULT NULL,
  `points` varchar(900) DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `type`, `website_slots`, `session_slots`, `traffic_ratio`, `price`, `currency`, `duration`, `points`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bronze', 'upgrade', '5', '1', '100', '0.00', 'EUR', '1-y', '', 1, '1536193112', '1536193112'),
(2, 'Silver', 'upgrade', '10', '1', '120', '9.00', 'EUR', '1-m', '', 1, '1536193162', '1536193162'),
(3, 'Gold', 'upgrade', '50', '1', '200', '9.00', 'EUR', '1-m', '', 1, '1536193240', '1536193240'),
(4, '10,000 autosurf points', 'traffic', '', '', '', '9.00', 'EUR', '', '10000', 1, '1536196580', '1536196580'),
(5, '20,000 autosurf points', 'traffic', '', '', NULL, '10', 'EUR', '', '20000', 1, NULL, NULL),
(6, '40,000 autosurf points', 'traffic', NULL, NULL, NULL, '17', 'EUR', NULL, '40000', 1, NULL, NULL),
(7, '80,000 autosurf points', 'traffic', NULL, NULL, NULL, '29', 'EUR', NULL, '80000', 1, NULL, NULL),
(8, '160,000 autosurf points', 'traffic', NULL, NULL, NULL, '50', 'EUR', NULL, '160000', 1, NULL, NULL),
(9, '320,000 autosurf points', 'traffic', NULL, NULL, NULL, '85', 'EUR', NULL, '360000', 1, NULL, NULL),
(10, '640,000 autosurf points', 'traffic', NULL, NULL, NULL, '145', 'EUR', NULL, '640000', 1, NULL, NULL),
(11, '1,280,000 autosurf points', 'traffic', NULL, NULL, NULL, '246', 'EUR', NULL, '1280000', 1, NULL, NULL),
(12, '2,560,000 autosurf points', 'traffic', NULL, NULL, NULL, '419', 'EUR', NULL, '2560000', 1, NULL, NULL),
(13, '5,120,000 autosurf points', 'traffic', NULL, NULL, NULL, '712', 'EUR', NULL, '5120000', 1, NULL, NULL),
(14, '10 Extra', 'websites', '10', '', '', '6.00', 'EUR', '', '', 1, '1536197386', '1536197386'),
(15, '20 Extra', 'websites', '20', '', '', '10.00', 'EUR', '', '', 1, '1536197419', '1536197419'),
(16, '40 Extra', 'websites', '40', '', '', '17.00', 'EUR', '', '', 1, '1536197443', '1536197443'),
(17, '10 Extra viewer slots', 'sessions', '', '10', '', '6.00', 'EUR', '', '', 1, '1536197520', '1536197520'),
(18, '20 Extra viewer slots', 'sessions', '', '20', '', '10.00', 'EUR', '', '', 1, '1536197544', '1536197544'),
(19, '40 Extra viewer slots', 'sessions', '', '40', '', '17.00', 'EUR', '', '', 1, '1536197568', '1536197568');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

DROP TABLE IF EXISTS `referrals`;
CREATE TABLE IF NOT EXISTS `referrals` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) DEFAULT NULL,
  `new_id` int(20) DEFAULT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `confirmed` int(20) DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(500) DEFAULT NULL,
  `option_value` longtext,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'generale', 'a:8:{s:4:\"name\";s:7:\"Plusurf\";s:4:\"logo\";s:40:\"https://image.ibb.co/e8KkQU/white_BG.jpg\";s:8:\"language\";s:2:\"en\";s:8:\"template\";s:6:\"surfow\";s:14:\"admin_template\";s:7:\"default\";s:8:\"currency\";s:3:\"EUR\";s:22:\"auto_confirm_referrals\";s:1:\"0\";s:21:\"auto_confirm_websites\";s:1:\"1\";}', '', '1536374009'),
(2, 'mail', 'a:4:{s:4:\"type\";s:4:\"smtp\";s:4:\"from\";s:28:\"wesparklesolutions@gmail.com\";s:10:\"activation\";s:1:\"1\";s:4:\"smtp\";a:6:{s:4:\"host\";s:14:\"smtp.gmail.com\";s:4:\"port\";s:3:\"587\";s:6:\"secure\";s:3:\"tls\";s:4:\"auth\";s:1:\"1\";s:8:\"username\";s:0:\"\";s:8:\"password\";s:0:\"\";}}', '', '1536448810'),
(3, 'recaptcha', 'a:2:{s:9:\"publickey\";s:40:\"6LcLCG8UAAAAANQHUcG671dM5gIflAqQ4Xv5yBAO\";s:10:\"privatekey\";s:40:\"6LcLCG8UAAAAAOBlg-uLsF9dG0DwcXP1m97_Pl67\";}', '', '1536378477'),
(4, 'social', 'a:6:{s:8:\"facebook\";s:20:\"http://facebook.com/\";s:7:\"twitter\";s:19:\"http://twitter.com/\";s:11:\"google_plus\";s:19:\"http://google.com/+\";s:9:\"pinterest\";s:25:\"https://www.pinterest.com\";s:9:\"instagram\";s:25:\"https://www.instagram.com\";s:8:\"dribbble\";s:20:\"https://dribbble.com\";}', '', '1478725959'),
(5, 'currency', 'a:16:{s:3:\"EUR\";s:4:\"Euro\";s:3:\"GBP\";s:14:\"Pound Sterling\";s:3:\"HKD\";s:16:\"Hong Kong Dollar\";s:3:\"PLN\";s:12:\"Polish Zloty\";s:3:\"SEK\";s:13:\"Swedish Krona\";s:3:\"HUF\";s:16:\"Hungarian Forint\";s:3:\"MYR\";s:17:\"Malaysian Ringgit\";s:3:\"NOK\";s:15:\"Norwegian Krone\";s:3:\"NZD\";s:18:\"New Zealand Dollar\";s:3:\"SGD\";s:16:\"Singapore Dollar\";s:3:\"CHF\";s:11:\"Swiss Franc\";s:3:\"USD\";s:11:\"U.S. Dollar\";s:3:\"AUD\";s:17:\"Australian Dollar\";s:3:\"CAD\";s:15:\"Canadian Dollar\";s:3:\"CZK\";s:12:\"Czech Koruna\";s:3:\"DKK\";s:12:\"Danish Krone\";}', '', '1475787348'),
(6, 'earned', 'a:1:{s:6:\"points\";d:-45.993333333333176;}', '', ''),
(7, 'nochange', 'a:1:{s:5:\"point\";i:10;}', '', ''),
(8, 'payments', 'a:4:{s:11:\"twocheckout\";a:4:{s:4:\"mode\";s:7:\"sandbox\";s:9:\"seller_id\";s:9:\"901391523\";s:10:\"public_key\";s:36:\"716DDEFB-D797-4922-9593-0BA47FB010C7\";s:11:\"private_key\";s:36:\"14143E75-A759-4512-8539-90EDB6E19656\";}s:6:\"paypal\";a:4:{s:4:\"mode\";s:7:\"sandbox\";s:8:\"username\";s:28:\"SellerAshref_api1.paypal.com\";s:8:\"password\";s:16:\"5JKVAWD7SQ735FTQ\";s:9:\"signature\";s:56:\"AiPC9BjkCyDFQXbSkoZcgqH3hpacAsUBeMV09.ZkKp0mJGsotPamd.D0\";}s:5:\"payza\";a:2:{s:4:\"mode\";s:7:\"sandbox\";s:5:\"email\";s:0:\"\";}s:6:\"stripe\";a:3:{s:4:\"mode\";s:2:\"on\";s:10:\"public_key\";s:32:\"pk_test_EXVt6C3oeaQL2Abg9riT5m0p\";s:10:\"secret_key\";s:32:\"sk_test_ID6MaWPJg24kVKM90qvNGzOG\";}}', '', '1536464772'),
(9, 'defaults', 'a:8:{s:17:\"withdrawal_status\";s:3:\"yes\";s:18:\"min_for_withdrawal\";s:2:\"50\";s:13:\"website_slots\";s:1:\"5\";s:13:\"session_slots\";s:1:\"5\";s:13:\"traffic_ratio\";s:3:\"100\";s:6:\"points\";b:0;s:16:\"referrals_points\";s:1:\"1\";s:7:\"website\";s:18:\"http://example.com\";}', '', '1536379022'),
(10, 'pages', 'a:3:{s:7:\"privacy\";s:12:\"Test Content\";s:8:\"about-us\";s:12:\"Test Content\";s:3:\"tos\";s:12:\"Test Content\";}', '', ''),
(11, 'usd_convert', 'a:17:{s:3:\"OOO\";s:1:\"2\";s:3:\"EUR\";s:3:\"0.9\";s:3:\"GBP\";s:4:\"0.66\";s:3:\"HKD\";s:4:\"7.75\";s:3:\"PLN\";s:4:\"3.97\";s:3:\"SEK\";s:3:\"8.5\";s:3:\"HUF\";s:3:\"289\";s:3:\"MYR\";s:4:\"4.32\";s:3:\"NOK\";s:4:\"8.68\";s:3:\"NZD\";s:4:\"1.48\";s:3:\"SGD\";s:4:\"1.41\";s:3:\"CHF\";s:4:\"0.98\";s:3:\"USD\";s:1:\"1\";s:3:\"AUD\";s:4:\"1.40\";s:3:\"CAD\";s:4:\"1.38\";s:3:\"CZK\";s:4:\"24.5\";s:3:\"DKK\";s:4:\"6.78\";}', '', '1475787348'),
(12, 'exchange', 'a:7:{s:8:\"openmode\";s:6:\"newtab\";s:5:\"focus\";s:2:\"no\";s:11:\"minduration\";s:1:\"6\";s:11:\"maxduration\";s:2:\"30\";s:6:\"source\";s:3:\"yes\";s:7:\"ipcheck\";s:3:\"all\";s:9:\"pointcost\";s:5:\"0.001\";}', '', '1536379722'),
(13, 'whitelist', 'a:1:{s:5:\"lists\";a:5:{i:0;s:11:\"youtube.com\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";}}', '', '1458020010'),
(14, 'blacklist', 'a:1:{s:5:\"lists\";a:9:{i:0;s:6:\"adf.ly\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";i:7;s:0:\"\";i:8;s:0:\"\";}}', '', '1458020010'),
(15, 'windows', 'a:1:{s:3:\"key\";s:21:\"MyPrivateKeyForPlusurf\";}', '', '1458181826'),
(16, 'newsletteres', 'a:5:{s:4:\"type\";s:4:\"mail\";s:4:\"from\";s:19:\"contact@surfow.info\";s:7:\"replyto\";s:19:\"contact@surfow.info\";s:3:\"max\";s:2:\"30\";s:4:\"smtp\";a:6:{s:4:\"host\";s:14:\"smtp.gmail.com\";s:4:\"port\";s:3:\"587\";s:6:\"secure\";s:3:\"tls\";s:4:\"auth\";s:1:\"1\";s:8:\"username\";s:0:\"\";s:8:\"password\";s:0:\"\";}}', '', '1478726056'),
(17, 'geotarget', 'a:2:{s:4:\"list\";a:16:{s:3:\"ALL\";s:13:\"All Countries\";s:2:\"DZ\";s:7:\"Algeria\";s:2:\"AO\";s:6:\"Angola\";s:2:\"AU\";s:9:\"Australia\";s:2:\"BR\";s:6:\"Brazil\";s:2:\"CA\";s:6:\"Canada\";s:2:\"CL\";s:5:\"Chile\";s:2:\"CO\";s:8:\"Colombia\";s:2:\"FR\";s:6:\"France\";s:2:\"HK\";s:9:\"Hong Kong\";s:2:\"HU\";s:7:\"Hungary\";s:2:\"ID\";s:9:\"Indonesia\";s:2:\"IE\";s:7:\"Ireland\";s:2:\"MA\";s:7:\"Morocco\";s:2:\"GB\";s:14:\"United Kingdom\";s:2:\"US\";s:13:\"United States\";}s:6:\"access\";s:3:\"pro\";}', '', '1536377288'),
(18, 'ads', 'a:2:{s:6:\"header\";s:19:\"<!--  your HTML -->\";s:6:\"footer\";s:19:\"<!--  your HTML -->\";}', '', '1461029713'),
(19, 'seo', 'a:5:{s:5:\"title\";s:23:\"plusurf Traffic Exchange\";s:11:\"description\";s:92:\"Surfow is a smart system for traffic exchange, using autosurf function and anonymous traffic\";s:8:\"keywords\";s:42:\"surfow, traffic, alexa, rank, exchange, TE\";s:7:\"ogimage\";s:28:\"http://example.com/image.png\";s:7:\"favicon\";s:12:\"/favicon.ico\";}', '', '1536194797'),
(20, 'analyse', 'a:1:{s:4:\"code\";s:21:\"<!-- Analyse code -->\";}', '', '1460610730'),
(21, 'socialauth', 'a:3:{s:8:\"facebook\";a:2:{s:2:\"id\";s:16:\" 325521738213945\";s:6:\"secret\";s:33:\" 923b3b53168da61b1f27479f3c79ee28\";}s:7:\"twitter\";a:2:{s:3:\"key\";s:1:\" \";s:6:\"secret\";s:1:\" \";}s:6:\"google\";a:2:{s:2:\"id\";s:1:\" \";s:6:\"secret\";s:1:\" \";}}', '', '1536194169'),
(22, 'version', 'a:1:{s:6:\"plusurf\";s:3:\"5.0\";}', '', '1461029370'),
(23, 'extension', 'a:2:{s:6:\"chrome\";s:0:\"\";s:7:\"firefox\";s:0:\"\";}', '', '1478727528');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `provider_id` varchar(400) DEFAULT NULL,
  `provider_name` varchar(400) DEFAULT NULL,
  `language` varchar(40) DEFAULT NULL,
  `website_slots` varchar(200) DEFAULT NULL,
  `session_slots` varchar(200) DEFAULT NULL,
  `traffic_ratio` varchar(200) DEFAULT NULL,
  `points` text,
  `currency` varchar(200) DEFAULT NULL,
  `activation_key` text,
  `type` text,
  `last_run` varchar(250) DEFAULT NULL,
  `pro_exp` varchar(200) DEFAULT NULL,
  `rest_key` text,
  `rest_date` varchar(200) DEFAULT NULL,
  `logkey` longtext,
  `status` int(20) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `provider_id`, `provider_name`, `language`, `website_slots`, `session_slots`, `traffic_ratio`, `points`, `currency`, `activation_key`, `type`, `last_run`, `pro_exp`, `rest_key`, `rest_date`, `logkey`, `status`, `created_at`, `updated_at`) VALUES
(1, 'lightworker9124', 'lightworker9124@gmail.com', 'immOD8pTUmJvvA34ChX3b0rX1Cx5E1x40exlTxWwZd4wJb_CAyM', NULL, NULL, NULL, '3', '3', '60', '-1', NULL, '', 'free', NULL, '1536193764', NULL, NULL, 'a:12:{i:0;s:51:\"zmapbhNZK7injZExRzIE2_Hna6a25q96fd4KdyV9GbE-7RsU7JM\";i:1;s:51:\"HPB7jsos8W6VmbFtFz_WhB8WKuuQedi3iFgYBUw2wQYLwKMNL9I\";i:2;s:51:\"26vRsBYrj1vDU_6VFidk6eg3FSqxdshbCTCqCvsAOTIqJn-dSM0\";i:3;s:51:\"dSt6HgwLwf8UWlbwlWNCtBKYx_Fh5DycDMFxVfpXjIE86BhhDNk\";i:4;s:51:\"oVttZQ73dvYZoI_CJ9a6erNt94q51wn0M1_8wji2qVvdw2XI9RA\";i:5;s:51:\"UOslDXOI42WdjV7Harrn4HkjuZaPK1LipzhorXrrYgNq4iV8ptQ\";i:6;s:51:\"APNBwP8zMO8PbUNlBfoW0vY_O0_erewnP60HuPOOhdBO5-MyGLQ\";i:7;s:51:\"3fMBx2J1MLCxVeLEX3gsi8MaPkg4UynaavZz8rDszfq_CENLTKE\";i:8;s:51:\"7NoVMPXZIC9mGdgBaIr-9svymBcJj-5mTG8kVZpspZ2r8EZDfwk\";i:9;s:51:\"FDQLA2HBvHoI-uoZBOQhagcEWvvszslBwdpY2kACzKcas30BxQ4\";i:10;s:51:\"dunDrs7CrlqQsu45ayxLtxeL-KLDYbdFsIURYJHeOGTR76dvPyc\";i:11;s:51:\"512TpRJQ9Ffp7aIexQ-x1luxRiltsyVr5o5f36-_RR_jYvLpN3U\";}', 1, '1536011240', '1536011240'),
(2, 'user2', 'user2@gmail.com', 'Ci61JkQhziyrKd9j5kNQKqCSE6b2_OXN_qdgoGprDxy3lhJEPc8', NULL, NULL, NULL, '50', '1', '200', '10057.6', NULL, '', 'free', NULL, '1539140258', NULL, NULL, 'a:11:{i:0;s:51:\"596DkvBkSou1cplvcpapamRV-hmfTmXi8w8qDZBOVHqh-vESuZQ\";i:1;s:51:\"ZS8WXC7CnmqSZRmrLbZFihKCqpoSRi9p6TQhPHkQoyWkULm0qi4\";i:2;s:51:\"ALshiDAxSYQcO-1oylSVmktk94pqPgebUjJHEVG43b7MGvBOvlk\";i:3;s:51:\"inz0oninLEh4au7YgB9zjhupxmR6hTAPM0d3BCTvtrOZ0d9BK0s\";i:4;s:51:\"Rh79MRasuqcKwq_GURLLu8aLMb_pyt8S655Skpe2VMISC0ObxpM\";i:5;s:51:\"S5px4raszP9_xdknzZMW8LzpJqWgoZs04SKyweqpo3xBUFeWewU\";i:6;s:51:\"yAAzLRbFGjTD9l4cNd9CUn4sqNMzR0gGR24QNFyXithEcS06Brk\";i:7;s:51:\"m9OS3iiqlcAbUKSBF695XOzXNWiDBvl6lt2yL5mJt7Docx5s-lQ\";i:8;s:51:\"Yf8nbdRmVq_K1-zX7IN5gsCpnAfc9_7-EsdBVKbD3BNnVjYcB04\";i:9;s:51:\"rYgDIi8lCwGK9qYzqhp4vCVmlL7GVNmbUXxt4SKY_z8PYFHnZs4\";i:10;s:51:\"M3mWHh2jMZk_-KjzecXdt1urZwnPUKwWgcf7hitZ8eDAdyYwr54\";}', 1, '1536017023', '1536017023'),
(3, 'user3', 'user3@gmail.com', '6xABMmjcQhYMeba0zv4hxqsGRb_6f9S51XebCaNcs8Z5SCxJHVU', NULL, NULL, NULL, '10', '3', '100', '7', NULL, '', 'free', NULL, '1539051321', NULL, NULL, 'a:2:{i:0;s:51:\"IHxaNmvAq3h0tKfhRzEdyXxRn_m5MdjVZDmMakz59CKaCpLJFVk\";i:1;s:51:\"EIZAMYP1ix68TWeqQV0-2ZGJgdAjTgReQBWs6Zx9yjgyXILW6Ew\";}', 1, '1536372531', '1536372531');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

DROP TABLE IF EXISTS `wallet`;
CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) DEFAULT NULL,
  `confirmed_sold` varchar(600) DEFAULT NULL,
  `pending_sold` varchar(600) DEFAULT NULL,
  `withdrawal_sold` varchar(600) DEFAULT NULL,
  `withdrawal_to` varchar(200) DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `confirmed_sold`, `pending_sold`, `withdrawal_sold`, `withdrawal_to`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '0', '0', '0', NULL, 1, '1536195103', '1536195103'),
(2, '2', '0', '0', '0', NULL, 1, '1536373408', '1536373408');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

DROP TABLE IF EXISTS `websites`;
CREATE TABLE IF NOT EXISTS `websites` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) DEFAULT NULL,
  `user_points` varchar(40) DEFAULT NULL,
  `url` text,
  `hits` varchar(900) DEFAULT NULL,
  `max_hits` varchar(900) DEFAULT NULL,
  `max_hour_hits` varchar(900) DEFAULT NULL,
  `last_run` varchar(900) DEFAULT NULL,
  `duration` varchar(900) DEFAULT NULL,
  `geolocation` varchar(500) DEFAULT NULL,
  `source` varchar(900) DEFAULT NULL,
  `useragent` varchar(500) DEFAULT NULL,
  `enabled` int(20) DEFAULT NULL,
  `activated` int(20) DEFAULT NULL,
  `reported` int(20) DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `user_id`, `user_points`, `url`, `hits`, `max_hits`, `max_hour_hits`, `last_run`, `duration`, `geolocation`, `source`, `useragent`, `enabled`, `activated`, `reported`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'expired', 'http://www.facebook.com', '22', '0', '200', '1536023927', '6', '[ALL]', '', 'all', 1, 1, NULL, 1, '1536023927', '1536023927'),
(5, 1, 'expired', 'http://www.wesparklesolutions.com', '27', '0', '200', '1536355482', '6', '[ALL]', '', 'all', 1, 1, NULL, 1, '1536028223', '1536355482'),
(10, 2, 'working', 'http://www.sample2.com', '3', '0', '200', '1536380874', '6', '[ALL]', '', 'all', 1, 1, NULL, 1, '1536034357', '1536380874'),
(11, 2, 'working', 'http://www.sample.com', '3', '0', '200', '1536380864', '6', '[ALL]', '', 'all', 1, 1, NULL, 1, '1536035199', '1536380864');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
