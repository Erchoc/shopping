SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE `shopping` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shopping`;

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

INSERT INTO `admins` (`id`, `username`, `passwd`, `email`) VALUES
(6, 'yehongni', '078f81e2eb5ae66138ec825c7dcf636b', 'yehongni@gmail.com'),
(7, 'erchoc', 'b5a6fc9b37093a51d73328d609d79b5f', 'erchoc@gmail.com');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `goods` (`id`, `gname`, `number`, `gtype`, `intro`, `recommend`, `integrals`, `up_time`, `old_price`, `new_price`) VALUES
(1, '豪华全真牛皮U型沙发 极简风格', 300, '客厅家具', '牛皮', 0, 300, '2016-09-01', 8080, 7000),
(2, '田园风格 组合沙发 棉麻可拆卸机洗 小清新', 300, '客厅家具', '棉麻', 0, 100, '2016-09-02', 1599, 1199),
(3, '阳台藤条编织吊篮 双人摇篮', 500, '户外家具', '藤条', 0, 100, '2016-09-03', 425, 400),
(4, '欧式实木双人床 优质工艺 主卧', 600, '卧室家具', '实木', 0, 100, '2016-09-03', 12000, 10000);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `orders` (`id`, `uid`, `gid`, `username`, `order_time`, `address`, `phone`, `remarks`) VALUES
(1, 4, 1, 'user_mock_1', '2017-06-12', '北京市朝阳区122号', '13077926801', ''),
(2, 3, 2, 'user_mock_2', '2017-01-06', '上海市浦东新区1号', '18379622801', '快点发货'),
(3, 2, 3, 'user_mock_3', '2017-01-07', '江西省南昌市188号', '13543622801', '快点发货'),
(4, 5, 4, 'user_mock_7', '2016-05-02', '江西省南昌市18号', '13532428401', '快点发货啊'),
(5, 7, 6, 'user_mock_7', '2016-05-02', '江西省南昌市18号', '13532428401', '快点发货啊'),
(6, 4, 6, 'user_mock_4', '2016-08-02', '江西省南昌市182号', '1353238401', '快点发货啊');

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

INSERT INTO `users` (`id`, `username`, `passwd`, `email`, `sex`, `phone`, `register`, `grade`, `integrals`) VALUES
(1, 'user_mock_1', 'dad018b73b14fcd10c72e75d65927382', 'user_mock_1@qq.com', '男', '13077926801', '0000-00-00', 2, 1300),
(2, 'user_mock_2', '4dddc868087e15e27ec6b19a6a00128b', 'user_mock_2@qq.com', '女', '18379622801', '0000-00-00', 1, 700),
(3, 'user_mock_3', '55eb751eb71b85ea748e933c40766ce1', 'user_mock_3@qq.com', '女', '13543622801', '0000-00-00', 2, 1700),
(4, 'user_mock_4', '0adbdfa71f7c2ee8ac49c3bb47620c60', 'user_mock_4@qq.com', '女', '13643662801', '0000-00-00', 2, 1140),
(6, 'user_mock_6', '723acdd877648b0e86ad8120137e8b10', 'user_mock_6@qq.com', '男', '1503662452', '0000-00-00', 3, 3470),
(7, 'user_mock_7', '7e0101723cc7b20699f43e1f32a68be2', 'user_mock_7@qq.com', '男', '1384562452', '0000-00-00', 1, 430),
(8, 'user_mock_8', '88a40b80b79bd55fb547f73f6c930f03', 'user_mock_8@qq.com', '女', '1384562452', '0000-00-00', 3, 4430),
(9, 'user_mock_9', '5324b5f5d4a238e41f53278efbe7b100', 'user_mock_9@qq.com', '女', '15676562452', '0000-00-00', 2, 1980);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
