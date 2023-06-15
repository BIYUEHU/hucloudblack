-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-03-19 11:19:54
-- 服务器版本： 5.6.50-log
-- PHP 版本： 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `hcb`
--

-- --------------------------------------------------------

--
-- 表的结构 `hcb_account`
--

CREATE TABLE `hcb_account` (
  `id` int(6) UNSIGNED NOT NULL,
  `uuid` varchar(100) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `opgroup` int(1) NOT NULL DEFAULT '1',
  `ip` varchar(40) DEFAULT NULL,
  `isdelete` varchar(10) NOT NULL DEFAULT 'no',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `hcb_account`
--

INSERT INTO `hcb_account` (`id`, `uuid`, `name`, `password`, `email`, `phone`, `qq`, `opgroup`, `ip`, `isdelete`, `reg_date`) VALUES
(1, '333f8a45-1356-4e81-802c-5ba078a6d8e6', 'admin', '123456', '123456@gmail.com', '123456', '123456', 4, '36.62.64.38', 'no', '2023-01-01 10:10:10');

-- --------------------------------------------------------

--
-- 表的结构 `hcb_chat`
--

CREATE TABLE `hcb_chat` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `opgroup` int(1) NOT NULL DEFAULT '1',
  `chat` text,
  `isdelete` varchar(10) NOT NULL DEFAULT 'no',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `hcb_record`
--

CREATE TABLE `hcb_record` (
  `id` int(6) UNSIGNED NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `plate` varchar(10) NOT NULL DEFAULT 'qq',
  `idkey` varchar(40) NOT NULL,
  `descr` text NOT NULL,
  `level` int(1) NOT NULL DEFAULT '1',
  `phone` varchar(20) DEFAULT NULL,
  `imgs` text,
  `release_account` varchar(20) NOT NULL,
  `examine_account` varchar(20) DEFAULT NULL,
  `state` varchar(10) NOT NULL DEFAULT 'unknown',
  `isdelete` varchar(10) NOT NULL DEFAULT 'no',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `hcb_set`
--

CREATE TABLE `hcb_set` (
  `id` int(6) UNSIGNED NOT NULL,
  `set_key` varchar(256) NOT NULL,
  `set_val` text,
  `set_type` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `hcb_set`
--

INSERT INTO `hcb_set` (`id`, `set_key`, `set_val`, `set_type`) VALUES
(1, 'weburl', '', 'webinfo'),
(2, 'webtitle', '糊云黑', 'webinfo'),
(3, 'webdescr', '你说得对,云黑是一个...', 'webinfo'),
(4, 'keywords', '云黑,数据库,API', 'webinfo'),
(5, 'favicon', '/favicon.ico', 'webinfo'),
(6, 'author', 'HULI', 'webinfo'),
(7, 'codeHead', '', 'webinfo'),
(8, 'codeFoot', '', 'webinfo'),
(9, 'open', '公告', 'webinfo'),
(10, 'contact', '关于', 'webinfo'),
(11, 'sponsor', '赞助', 'webinfo');

--
-- 转储表的索引
--

--
-- 表的索引 `hcb_account`
--
ALTER TABLE `hcb_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 表的索引 `hcb_chat`
--
ALTER TABLE `hcb_chat`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `hcb_record`
--
ALTER TABLE `hcb_record`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `hcb_set`
--
ALTER TABLE `hcb_set`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `hcb_account`
--
ALTER TABLE `hcb_account`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `hcb_chat`
--
ALTER TABLE `hcb_chat`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- 使用表AUTO_INCREMENT `hcb_record`
--
ALTER TABLE `hcb_record`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- 使用表AUTO_INCREMENT `hcb_set`
--
ALTER TABLE `hcb_set`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
