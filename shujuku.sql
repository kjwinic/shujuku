-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-05-30 12:21:38
-- 服务器版本： 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shujuku`
--

-- --------------------------------------------------------

--
-- 表的结构 `form1`
--

CREATE TABLE `form1` (
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL DEFAULT '123456',
  `name` varchar(20) NOT NULL,
  `maipiao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息表';

--
-- 转存表中的数据 `form1`
--

INSERT INTO `form1` (`username`, `password`, `name`, `maipiao`) VALUES
('18061758517', '123456', 'gaorongbo', 0),
('18014835159', '123456', 'jikaicheng', 0),
('18014835587', '123456', 'chenyao', 0),
('18014851805', '123456', 'shenshuhao', 0),
('15910786676', '123456', 'dongzhenhao', 0),
('18014835802', '123456', 'gejunshuang', 0),
('18061758689', '123456', 'guanhuai', 0),
('18170066066', '123456', 'guozhenyu', 0),
('18801587339', '123456', 'haomengqi', 0),
('18014830896', '123456', 'huxiaoxue', 0),
('18235782857', '123456', 'heyi', 0),
('18803540299', '123456', 'huxinyue', 0),
('18260077707', '123456', 'huangchengmin', 0),
('18014835786', '123456', 'jianghaoming', 0),
('18252009500', '123456', 'kangxinyu', 0),
('18061750152', '123456', 'kexueting', 0),
('15951971878', '123456', 'lisihui', 0),
('13770787819', '123456', 'mayuhan', 0),
('18014835169', '123456', 'qiyinghan', 0),
('18061758517', '123456', 'gaorongbo', 0),
('18014835159', '123456', 'jikaicheng', 0),
('18014835587', '123456', 'chenyao', 0),
('18014851805', '123456', 'shenshuhao', 0),
('15910786676', '123456', 'dongzhenhao', 0),
('18014835802', '123456', 'gejunshuang', 0),
('18061758689', '123456', 'guanhuai', 0),
('18170066066', '123456', 'guozhenyu', 0),
('18801587339', '123456', 'haomengqi', 0),
('18014830896', '123456', 'huxiaoxue', 0),
('18235782857', '123456', 'heyi', 0),
('18803540299', '123456', 'huxinyue', 0),
('18260077707', '123456', 'huangchengmin', 0),
('18014835786', '123456', 'jianghaoming', 0),
('18252009500', '123456', 'kangxinyu', 0),
('18061750152', '123456', 'kexueting', 0),
('15951971878', '123456', 'lisihui', 0),
('13770787819', '123456', 'mayuhan', 0),
('18014835169', '123456', 'qiyinghan', 0),
('17361701071', '3cqscbrtxws', 'root', 0),
('17761701071', '3cqscbrtxws', 'xumengqi', 1);

-- --------------------------------------------------------

--
-- 表的结构 `guoshanche`
--

CREATE TABLE `guoshanche` (
  `usename` varchar(20) NOT NULL,
  `shunxu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `motianlun`
--

CREATE TABLE `motianlun` (
  `usename` varchar(20) NOT NULL,
  `shunxu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `motianlun`
--

INSERT INTO `motianlun` (`usename`, `shunxu`) VALUES
('17761701071', 2);

-- --------------------------------------------------------

--
-- 表的结构 `tuoluo`
--

CREATE TABLE `tuoluo` (
  `usename` varchar(20) NOT NULL,
  `shunxu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tuoluo`
--

INSERT INTO `tuoluo` (`usename`, `shunxu`) VALUES
('17761701071', 3);

-- --------------------------------------------------------

--
-- 表的结构 `xuanzhuanmuma`
--

CREATE TABLE `xuanzhuanmuma` (
  `usename` varchar(20) NOT NULL,
  `shunxu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
