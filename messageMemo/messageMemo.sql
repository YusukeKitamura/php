-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 04 月 28 日 15:52
-- サーバのバージョン： 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `messageMemo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `clientId` int(11) NOT NULL,
  `messageTakerDepartment` varchar(20) NOT NULL,
  `messageTakerName` varchar(20) NOT NULL,
  `phoneCallerCompany` varchar(20) NOT NULL,
  `phoneCallerDepartment` varchar(20) NOT NULL,
  `phoneCallerName` varchar(20) NOT NULL,
  `complaintNum` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientId`);

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの構造 `memo`
--

CREATE TABLE IF NOT EXISTS `memo` (
  `memoId` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `date` varchar(22) NOT NULL,
  `messageType` varchar(20) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `phoneAnswererName` varchar(20) NOT NULL,
  foreign key(clientId) references client(clientId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`memoId`);

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `memoId` int(11) NOT NULL AUTO_INCREMENT;