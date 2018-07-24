-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-03-23 13:17
-- 서버 버전: 10.1.30-MariaDB
-- PHP 버전: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `0320`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `files`
--

CREATE TABLE `files` (
  `idx` int(11) NOT NULL,
  `parent` int(11) UNSIGNED NOT NULL,
  `midx` int(11) NOT NULL,
  `size` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL,
  `change_name` varchar(255) NOT NULL DEFAULT '',
  `com_name` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `change_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `files`
--

INSERT INTO `files` (`idx`, `parent`, `midx`, `size`, `type`, `change_name`, `com_name`, `create_date`, `change_date`) VALUES
(1, 0, 1, 2817, 'file', '152170522866410.sql', '0320.jpg.sql', '2018-03-22', '2018-03-22'),
(2, 0, 1, 0, 'path', '', 'aaaaaa', '2018-03-22', '2018-03-22'),
(3, 2, 1, 0, 'path', '', 'zzz', '2018-03-22', '2018-03-22'),
(4, 2, 1, 0, 'path', '', 'sss', '2018-03-22', '2018-03-22'),
(5, 2, 1, 0, 'path', '', 'eeee', '2018-03-22', '2018-03-22'),
(6, 2, 1, 0, 'path', '', 'eeeee', '2018-03-22', '2018-03-22'),
(7, 3, 1, 0, 'path', '', '...', '2018-03-22', '2018-03-22'),
(9, 6, 1, 725, 'file', '152171665737656.php', 'index.php', '2018-03-22', '2018-03-22'),
(10, 0, 1, 725, 'file', '152171800538955.php', 'index.php', '2018-03-22', '2018-03-22'),
(11, 0, 1, 2817, 'file', '152171930611181.sql', '0320 - 복사본.sql', '2018-03-22', '2018-03-22'),
(12, 5, 1, 0, 'path', '', '000', '2018-03-23', '2018-03-23'),
(13, 5, 1, 0, 'path', '', 'fsfasfsd', '2018-03-23', '2018-03-23'),
(14, 5, 1, 0, 'path', '', '23.05', '2018-03-23', '2018-03-23'),
(15, 2, 1, 0, 'path', '', '이름', '2018-03-23', '2018-03-23'),
(16, 2, 1, 0, 'path', '', '이르미투', '2018-03-23', '2018-03-23');

-- --------------------------------------------------------

--
-- 테이블 구조 `infile_list`
--

CREATE TABLE `infile_list` (
  `idx` int(11) NOT NULL,
  `fidx` int(11) NOT NULL DEFAULT '0',
  `midx` int(11) NOT NULL DEFAULT '0',
  `regdate` datetime NOT NULL,
  `cnt` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `infile_list`
--

INSERT INTO `infile_list` (`idx`, `fidx`, `midx`, `regdate`, `cnt`) VALUES
(1, 1, 1, '2018-03-22 19:55:30', 3);

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `id`, `pw`, `name`, `level`) VALUES
(1, 'admin', 'DBE9787AAF4002C6662E490B3F1F7512807459B6DEE2E1C2E56738E1CBBD993C', '관리자', 10),
(2, 'user1', '2fc577149080578c983f969a6ce84146fb79b5e17c0447d4e0718e039d62da19', '일반회원', 1),
(3, 'user2', '7a9f58a002c9682fceda675a74759336805785d34c0f10ce1cee6e8315a17711', '일반회원', 1),
(4, 'user3', 'd9f593bb452232b6a85b46816ee33292a4776a22c09973cbc138e4e91242c96c', '일반회원', 1),
(5, 'user4', '3302651419baa544d89b4b2b35a204541cdccbabc47b57aa2565b3c3fbb58243', '일반회원', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `outfile_list`
--

CREATE TABLE `outfile_list` (
  `idx` int(11) NOT NULL,
  `fidx` int(11) NOT NULL,
  `midx` int(11) NOT NULL,
  `regdate` datetime NOT NULL,
  `cnt` int(11) NOT NULL DEFAULT '0',
  `ukey` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `outfile_list`
--

INSERT INTO `outfile_list` (`idx`, `fidx`, `midx`, `regdate`, `cnt`, `ukey`) VALUES
(1, 1, 1, '2018-03-22 19:55:55', 0, '9FCT'),
(2, 1, 1, '2018-03-22 19:56:31', 0, 'KI9j'),
(3, 1, 1, '2018-03-22 19:56:32', 1, 'Mjd4'),
(4, 1, 1, '2018-03-22 19:56:34', 4, 'hf9a'),
(5, 11, 1, '2018-03-22 20:48:30', 1, '3Z1c');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `infile_list`
--
ALTER TABLE `infile_list`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `outfile_list`
--
ALTER TABLE `outfile_list`
  ADD PRIMARY KEY (`idx`),
  ADD UNIQUE KEY `url` (`ukey`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `files`
--
ALTER TABLE `files`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `infile_list`
--
ALTER TABLE `infile_list`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `outfile_list`
--
ALTER TABLE `outfile_list`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
