-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 09 月 14 日 06:18
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shopping`
--
CREATE DATABASE `shopping` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shopping`;

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `username`, `passwd`, `email`) VALUES
(2, 'root', '63a9f0ea7bb98050796b649e85481845', 'root@gmail.com'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com'),
(4, 'yangxuejin', '8781d38371117298852b50adef30979a', 'yangxuejin@gmail.com'),
(5, 'liuting', 'a008b2bd7845de9d0ca787ccd93bf361', 'liuting@gmail.com'),
(6, 'yehongni', '078f81e2eb5ae66138ec825c7dcf636b', 'yehongni@gmail.com'),
(7, 'erchoc', 'b5a6fc9b37093a51d73328d609d79b5f', 'erchoc@gmail.com');

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `gtype` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `recommend` int(11) NOT NULL,
  `integrals` int(11) NOT NULL,
  `up_time` date NOT NULL,
  `old_price` float NOT NULL,
  `new_price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `order_time` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL COMMENT '1男0女',
  `phone` varchar(11) NOT NULL,
  `register` date NOT NULL,
  `grade` int(11) NOT NULL,
  `integrals` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `email`, `sex`, `phone`, `register`, `grade`, `integrals`) VALUES
(1, 'user_mock_1', 'dad018b73b14fcd10c72e75d65927382', 'user_mock_1@qq.com', '男', '13077926801', '0000-00-00', 2, 1300),
(2, 'user_mock_2', '4dddc868087e15e27ec6b19a6a00128b', 'user_mock_2@qq.com', '女', '18379622801', '0000-00-00', 1, 700),
(3, 'user_mock_3', '55eb751eb71b85ea748e933c40766ce1', 'user_mock_3@qq.com', '女', '13543622801', '0000-00-00', 2, 1700),
(4, 'user_mock_4', '0adbdfa71f7c2ee8ac49c3bb47620c60', 'user_mock_4@qq.com', '女', '13643662801', '0000-00-00', 2, 1140),
(5, 'user_mock_5', '77a4bf5da4dc34390a2524e078dc40b2', 'user_mock_5@qq.com', '男', '13643662801', '0000-00-00', 4, 13470),
(6, 'user_mock_6', '723acdd877648b0e86ad8120137e8b10', 'user_mock_6@qq.com', '男', '1503662452', '0000-00-00', 3, 3470),
(7, 'user_mock_7', '7e0101723cc7b20699f43e1f32a68be2', 'user_mock_7@qq.com', '男', '1384562452', '0000-00-00', 1, 430),
(8, 'user_mock_8', '88a40b80b79bd55fb547f73f6c930f03', 'user_mock_8@qq.com', '女', '1384562452', '0000-00-00', 3, 4430),
(9, 'user_mock_9', '5324b5f5d4a238e41f53278efbe7b100', 'user_mock_9@qq.com', '女', '15676562452', '0000-00-00', 2, 1980);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
