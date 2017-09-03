-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-09-03 16:07:50
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `price` int(255) NOT NULL,
  `number` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `number`) VALUES
(1, '苹果', 20, 1000),
(2, '香蕉', 10, 3000),
(3, '橘子', 5, 2000),
(4, '火龙果', 20, 800);

-- --------------------------------------------------------

--
-- 表的结构 `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `grade` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `grades`
--

INSERT INTO `grades` (`id`, `name`, `subject`, `grade`) VALUES
(1, '张三', '数学', 100),
(2, '张三', '语文', 90),
(3, '李四', '数学', 88),
(4, '李四', '语文', 70);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `name`, `age`, `sex`) VALUES
(1, '张三', 17, '男'),
(9, '王郑毅', 22, '男'),
(10, '张', 16, '女'),
(12, '123', 25, '男'),
(17, '12123', 20, '男'),
(20, '', 0, ''),
(21, '', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `todolist`
--

CREATE TABLE IF NOT EXISTS `todolist` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `val` varchar(255) NOT NULL COMMENT '文本内容',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  `isDone` varchar(255) NOT NULL COMMENT '是否完成',
  `isStar` varchar(255) NOT NULL COMMENT '是否为星标',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `todolist`
--

INSERT INTO `todolist` (`id`, `user`, `val`, `time`, `isDone`, `isStar`) VALUES
(45, 'xiaoyi', '1', '2017-08-31 01:35:21', 'false', 'true'),
(47, 'xiaoyi', '3', '2017-08-31 01:35:26', 'false', 'true'),
(49, 'xiaoyi', '5', '2017-08-31 01:35:30', 'false', 'true'),
(51, '1234', '这是1234', '2017-08-31 01:37:51', 'false', 'false'),
(54, '1234', '3456', '2017-08-31 01:39:15', 'false', 'false'),
(64, '1234', '2\n', '2017-08-31 01:44:34', 'false', 'true'),
(65, '1234', '123', '2017-08-31 07:11:30', 'false', 'false'),
(66, '1234', '1', '2017-08-31 07:14:18', 'true', 'false'),
(67, '12345', '1111111', '2017-08-31 10:06:16', 'false', 'true'),
(68, '', '11111111', '2017-08-31 10:06:30', 'false', 'false'),
(69, '12345', '111123123123', '2017-08-31 10:06:53', 'false', 'true');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(14, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(15, 'admin1', 'e10adc3949ba59abbe56e057f20f883e'),
(16, '123', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'admin2', '202cb962ac59075b964b07152d234b70'),
(18, 'xiaoyi', 'e10adc3949ba59abbe56e057f20f883e'),
(19, 'xiaoyi', 'e10adc3949ba59abbe56e057f20f883e'),
(20, '1234', '81dc9bdb52d04dc20036dbd8313ed055'),
(21, '12345', '827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
