-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2016 at 09:45 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(20) NULL,
  `username` varchar(50) NULL,
  `email` varchar(120) NULL,
  `password` varchar(200) NULL,
  `provider_id` varchar(400) NULL,
  `provider_name` varchar(400) NULL,
  `language` varchar(40) NULL,
  `activation_key` text NULL,
  `rest_key` text NULL,
  `rest_date` varchar(200) NULL,
  `logkey` text NULL,
  `status` int(20) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate`
--

CREATE TABLE IF NOT EXISTS `affiliate` (
  `id` int(20) NULL,
  `user_id` varchar(200) NULL,
  `fullname` varchar(600) NULL,
  `adresse` text NULL,
  `country` text NULL,
  `city` text NULL,
  `codepostal` text NULL,
  `paypal_email` text NULL,
  `payoneer_email` text NULL,
  `status` int(20) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

CREATE TABLE IF NOT EXISTS `exchange` (
  `id` int(20) NULL,
  `user_id` int(20) NULL,
  `lasturl_id` text NULL,
  `accepted_time` text NULL,
  `last_run` varchar(200) NULL,
  `ip` varchar(200) DEFAULT NULL,
  `closed` int(20) NULL,
  `status` int(20) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE IF NOT EXISTS `hits` (
  `id` int(20) NULL,
  `website_id` int(20) NULL,
  `user_id` int(20) NULL,
  `point` varchar(200) NULL,
  `ip` varchar(200) NULL,
  `browser` varchar(600) NULL,
  `os` varchar(600) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsletteres`
--

CREATE TABLE IF NOT EXISTS `newsletteres` (
  `id` int(20) NULL,
  `status` int(20) NULL,
  `name` varchar(200) NULL,
  `to_group` varchar(200) NULL,
  `subject` text NULL,
  `content` longtext NULL,
  `starton` varchar(200) NULL,
  `progress` varchar(200) NULL,
  `offset` varchar(200) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(20) NULL,
  `user_id` int(20) NULL,
  `plan_id` int(20) NULL,
  `kind` varchar(900) NULL,
  `payment_id` varchar(500) NULL,
  `amount` varchar(200) NULL,
  `currency` varchar(200) NULL,
  `ip` varchar(200) NULL,
  `confirmed` int(20) NULL,
  `payment_service` text NULL,
  `payment_info` longtext NULL,
  `status` int(20) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(20) NULL,
  `name` varchar(900) NULL,
  `type` text NULL,
  `website_slots` varchar(900) NULL,
  `session_slots` varchar(900) NULL,
  `traffic_ratio` varchar(900) NULL,
  `price` varchar(900) NULL,
  `currency` varchar(900) NULL,
  `duration` varchar(200) NULL,
  `points` varchar(900) NULL,
  `status` int(20) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE IF NOT EXISTS `referrals` (
  `id` int(20) NULL,
  `user_id` int(20) NULL,
  `new_id` int(20) NULL,
  `ip` varchar(200) NULL,
  `confirmed` int(20) NULL,
  `status` int(20) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(20) NULL,
  `option_name` varchar(500) NULL,
  `option_value` longtext NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'generale', 'a:8:{s:4:"name";s:6:"plusurf";s:4:"logo";s:0:"";s:8:"language";s:2:"en";s:8:"template";s:6:"plusurf";s:14:"admin_template";s:7:"default";s:8:"currency";s:3:"USD";s:22:"auto_confirm_referrals";s:1:"0";s:21:"auto_confirm_websites";s:1:"1";}', '', '1478725720'),
(2, 'mail', 'a:4:{s:4:"type";s:4:"mail";s:4:"from";s:18:"contact@plusurf.net";s:10:"activation";s:1:"0";s:4:"smtp";a:6:{s:4:"host";s:14:"smtp.gmail.com";s:4:"port";s:3:"587";s:6:"secure";s:3:"tls";s:4:"auth";s:1:"1";s:8:"username";s:0:"";s:8:"password";s:0:"";}}', '', '1478726052'),
(3, 'recaptcha', 'a:2:{s:9:"publickey";s:40:"6Ld_OhATAAAAAGgv5oyY4_P_8mTAYZQvOg6NaOcj";s:10:"privatekey";s:40:"6Ld_OhATAAAAAOSfHs0C-zjoTpNbrWkr9cqjr4NZ";}', '', ''),
(4, 'social', 'a:6:{s:8:"facebook";s:20:"http://facebook.com/";s:7:"twitter";s:19:"http://twitter.com/";s:11:"google_plus";s:19:"http://google.com/+";s:9:"pinterest";s:25:"https://www.pinterest.com";s:9:"instagram";s:25:"https://www.instagram.com";s:8:"dribbble";s:20:"https://dribbble.com";}', '', '1478725959'),
(5, 'currency', 'a:16:{s:3:"EUR";s:4:"Euro";s:3:"GBP";s:14:"Pound Sterling";s:3:"HKD";s:16:"Hong Kong Dollar";s:3:"PLN";s:12:"Polish Zloty";s:3:"SEK";s:13:"Swedish Krona";s:3:"HUF";s:16:"Hungarian Forint";s:3:"MYR";s:17:"Malaysian Ringgit";s:3:"NOK";s:15:"Norwegian Krone";s:3:"NZD";s:18:"New Zealand Dollar";s:3:"SGD";s:16:"Singapore Dollar";s:3:"CHF";s:11:"Swiss Franc";s:3:"USD";s:11:"U.S. Dollar";s:3:"AUD";s:17:"Australian Dollar";s:3:"CAD";s:15:"Canadian Dollar";s:3:"CZK";s:12:"Czech Koruna";s:3:"DKK";s:12:"Danish Krone";}', '', '1475787348'),
(6, 'earned', 'a:1:{s:6:"points";d:0;}', '', ''),
(7, 'nochange', 'a:1:{s:5:"point";i:1;}', '', ''),
(8, 'payments', 'a:4:{s:11:"twocheckout";a:4:{s:4:"mode";s:7:"sandbox";s:9:"seller_id";s:9:"901294338";s:10:"public_key";s:36:"D0E54E96-FBB9-4A9C-98F0-81359D3FE574";s:11:"private_key";s:36:"7EF672B0-9F5E-499E-B4AE-6CBEC67277E1";}s:6:"paypal";a:4:{s:4:"mode";s:7:"sandbox";s:8:"username";s:0:"";s:8:"password";s:0:"";s:9:"signature";s:0:"";}s:5:"payza";a:2:{s:4:"mode";s:7:"sandbox";s:5:"email";s:0:"";}s:6:"stripe";a:3:{s:4:"mode";s:2:"on";s:10:"public_key";s:0:"";s:10:"secret_key";s:0:"";}}', '', '1478725841'),
(9, 'defaults', 'a:8:{s:17:"withdrawal_status";s:3:"yes";s:18:"min_for_withdrawal";s:2:"50";s:13:"website_slots";s:1:"3";s:13:"session_slots";s:1:"3";s:13:"traffic_ratio";s:2:"60";s:6:"points";s:2:"10";s:16:"referrals_points";s:3:"0.1";s:7:"website";s:18:"http://example.com";}', '', '1478725888'),
(10, 'pages', 'a:3:{s:7:"privacy";s:12:"Test Content";s:8:"about-us";s:12:"Test Content";s:3:"tos";s:12:"Test Content";}', '', ''),
(11, 'usd_convert', 'a:17:{s:3:"OOO";s:1:"2";s:3:"EUR";s:3:"0.9";s:3:"GBP";s:4:"0.66";s:3:"HKD";s:4:"7.75";s:3:"PLN";s:4:"3.97";s:3:"SEK";s:3:"8.5";s:3:"HUF";s:3:"289";s:3:"MYR";s:4:"4.32";s:3:"NOK";s:4:"8.68";s:3:"NZD";s:4:"1.48";s:3:"SGD";s:4:"1.41";s:3:"CHF";s:4:"0.98";s:3:"USD";s:1:"1";s:3:"AUD";s:4:"1.40";s:3:"CAD";s:4:"1.38";s:3:"CZK";s:4:"24.5";s:3:"DKK";s:4:"6.78";}', '', '1475787348'),
(12, 'exchange', 'a:7:{s:8:"openmode";s:6:"newtab";s:5:"focus";s:2:"no";s:11:"minduration";s:2:"10";s:11:"maxduration";s:3:"300";s:6:"source";s:3:"yes";s:7:"ipcheck";s:3:"all";s:9:"pointcost";s:5:"0.001";}', '', '1478725822'),
(13, 'whitelist', 'a:1:{s:5:"lists";a:5:{i:0;s:11:"youtube.com";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}}', '', '1458020010'),
(14, 'blacklist', 'a:1:{s:5:"lists";a:9:{i:0;s:6:"adf.ly";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";}}', '', '1458020010'),
(15, 'windows', 'a:1:{s:3:"key";s:21:"MyPrivateKeyForplusurf";}', '', '1458181826'),
(16, 'newsletteres', 'a:5:{s:4:"type";s:4:"mail";s:4:"from";s:19:"contact@plusurf.info";s:7:"replyto";s:19:"contact@plusurf.info";s:3:"max";s:2:"30";s:4:"smtp";a:6:{s:4:"host";s:14:"smtp.gmail.com";s:4:"port";s:3:"587";s:6:"secure";s:3:"tls";s:4:"auth";s:1:"1";s:8:"username";s:0:"";s:8:"password";s:0:"";}}', '', '1478726056'),
(17, 'geotarget', 'a:2:{s:4:"list";a:16:{s:3:"ALL";s:13:"All Countries";s:2:"DZ";s:7:"Algeria";s:2:"AO";s:6:"Angola";s:2:"AU";s:9:"Australia";s:2:"BR";s:6:"Brazil";s:2:"CA";s:6:"Canada";s:2:"CL";s:5:"Chile";s:2:"CO";s:8:"Colombia";s:2:"FR";s:6:"France";s:2:"HK";s:9:"Hong Kong";s:2:"HU";s:7:"Hungary";s:2:"ID";s:9:"Indonesia";s:2:"IE";s:7:"Ireland";s:2:"MA";s:7:"Morocco";s:2:"GB";s:14:"United Kingdom";s:2:"US";s:13:"United States";}s:6:"access";s:4:"free";}', '', '1478725811'),
(18, 'ads', 'a:2:{s:6:"header";s:19:"<!--  your HTML -->";s:6:"footer";s:19:"<!--  your HTML -->";}', '', '1461029713'),
(19, 'seo', 'a:5:{s:5:"title";s:23:"plusurf Traffic Exchange";s:11:"description";s:92:"plusurf is a smart system for traffic exchange, using autosurf function and anonymous traffic";s:8:"keywords";s:42:"plusurf, traffic, alexa, rank, exchange, TE";s:7:"ogimage";s:28:"http://example.com/image.png";s:7:"favicon";s:12:"/favicon.ico";}', '', '1478725778'),
(20, 'analyse', 'a:1:{s:4:"code";s:21:"<!-- Analyse code -->";}', '', '1460610730'),
(21, 'socialauth', 'a:3:{s:8:"facebook";a:2:{s:2:"id";s:1:" ";s:6:"secret";s:1:" ";}s:7:"twitter";a:2:{s:3:"key";s:1:" ";s:6:"secret";s:1:" ";}s:6:"google";a:2:{s:2:"id";s:1:" ";s:6:"secret";s:1:" ";}}', '', '1478725750'),
(22, 'version', 'a:1:{s:6:"plusurf";s:3:"5.0";}', '', '1461029370'),
(23, 'extension', 'a:2:{s:6:"chrome";s:0:"";s:7:"firefox";s:0:"";}', '', '1478727528');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NULL,
  `username` varchar(50) NULL,
  `email` varchar(120) NULL,
  `password` varchar(200) NULL,
  `provider_id` varchar(400) NULL,
  `provider_name` varchar(400) NULL,
  `language` varchar(40) NULL,
  `website_slots` varchar(200) NULL,
  `session_slots` varchar(200) NULL,
  `traffic_ratio` varchar(200) NULL,
  `points` text NULL,
  `currency` varchar(200) NULL,
  `activation_key` text NULL,
  `type` text NULL,
  `last_run` varchar(250) DEFAULT NULL,
  `pro_exp` varchar(200) NULL,
  `rest_key` text NULL,
  `rest_date` varchar(200) NULL,
  `logkey` longtext NULL,
  `status` int(20) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(20) NULL,
  `user_id` varchar(200) NULL,
  `confirmed_sold` varchar(600) NULL,
  `pending_sold` varchar(600) NULL,
  `withdrawal_sold` varchar(600) NULL,
  `withdrawal_to` varchar(200) NULL,
  `status` int(20) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE IF NOT EXISTS `websites` (
  `id` int(20) NULL,
  `user_id` int(20) NULL,
  `user_points` varchar(40) NULL,
  `url` text NULL,
  `hits` varchar(900) NULL,
  `max_hits` varchar(900) NULL,
  `max_hour_hits` varchar(900) NULL,
  `last_run` varchar(900) NULL,
  `duration` varchar(900) NULL,
  `geolocation` varchar(500) NULL,
  `source` varchar(900) NULL,
  `useragent` varchar(500) NULL,
  `enabled` int(20) NULL,
  `activated` int(20) NULL,
  `reported` int(20) DEFAULT NULL,
  `status` int(20) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliate`
--
ALTER TABLE `affiliate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hits`
--
ALTER TABLE `hits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletteres`
--
ALTER TABLE `newsletteres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `affiliate`
--
ALTER TABLE `affiliate`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hits`
--
ALTER TABLE `hits`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newsletteres`
--
ALTER TABLE `newsletteres`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(20) NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(20) NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
