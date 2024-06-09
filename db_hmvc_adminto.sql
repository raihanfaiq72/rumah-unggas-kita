-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2022 at 01:39 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hmvc_adminto`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'GJPwtlGJqsdGntC', 1, 0, 0, NULL, '2022-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `uri`, `method`, `params`, `api_key`, `ip_address`, `time`, `rtime`, `authorized`, `response_code`) VALUES
(1, 'api/example/users', 'get', 'a:18:{s:3:\"key\";s:15:\"GJPwtlGJqsdGntC\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:13:\"Authorization\";s:26:\"Basic YWRtaW46cGhiMTIzNDU2\";s:9:\"sec-ch-ua\";s:66:\"\".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"\";s:16:\"sec-ch-ua-mobile\";s:2:\"?0\";s:18:\"sec-ch-ua-platform\";s:9:\"\"Windows\"\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36\";s:6:\"Accept\";s:135:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:14:\"Sec-Fetch-Dest\";s:8:\"document\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:32:\"en-US,en;q=0.9,id;q=0.8,ms;q=0.7\";s:6:\"Cookie\";s:215:\"_pk_id.4.1fff=2389e656c3bb6bd2.1641777123.; _ga=GA1.1.1566882293.1642404144; _ga_1HE6FRTTHV=GS1.1.1652327489.11.0.1652327496.0; phb_token=c7c25969b293c704bba7c296ace0bbc2; ci_session=7t1e68itg7v81fbuv3rqld457fvcum9s\";}', 'GJPwtlGJqsdGntC', '::1', 1658194651, 0.0255351, '1', 200);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `user_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` text COLLATE utf8_unicode_ci NOT NULL,
  `user_namalengkap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(1) NOT NULL,
  `user_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_edited` datetime DEFAULT NULL,
  `user_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_password`, `user_namalengkap`, `user_level`, `user_created`, `user_edited`, `user_status`) VALUES
(1, 'hasta', '$2y$10$ZdZIpysS8TWn8cTr5Awao.nEY4RXnkUYijO1YWhqSUQGgfrRLzFyi', 'Hasta Dwi', 1, '2021-11-03 16:45:44', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_nama` (`user_nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
