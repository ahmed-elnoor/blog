-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2015 at 01:24 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `name`, `d_name`, `created_at`, `updated_at`) VALUES
(3, 'islamic', 'iiiiiiiiii', '2015-05-04 10:08:07', '2015-05-04 10:08:07'),
(5, 'sport', 'This is sport category', '2015-05-04 11:08:04', '2015-05-04 11:08:04'),
(6, 'health', 'hhhhhh', '2015-05-04 11:19:41', '2015-05-04 11:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_05_02_113109_create_users_table', 1),
('2015_05_02_113413_create_news_table', 1),
('2015_05_02_113647_create_cat_table', 1),
('2015_05_02_114028_create_sub_cat_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `long_news` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE IF NOT EXISTS `sub_cat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_sub` varchar(255) NOT NULL,
  `d_name_sub` varchar(255) NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sub_cat_cid_foreign` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`id`, `name_sub`, `d_name_sub`, `cid`, `created_at`, `updated_at`) VALUES
(5, 'quraan', 'qqqqq', 3, '2015-05-04 10:10:36', '2015-05-04 10:10:36'),
(6, 'hadees', 'ccccc', 3, '2015-05-04 11:09:26', '2015-05-04 11:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'ahmed@yahoo.com', '$2y$10$9YeVypTLc3ggYXj8wZUko.r3SUsgs845yruFtuCwUbHldrBH/udP6', NULL, '2015-05-04 09:52:52', '2015-05-04 09:52:52');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD CONSTRAINT `sub_cat_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `cat` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
