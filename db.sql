-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 07:04 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bewtyblog`
--
CREATE DATABASE IF NOT EXISTS `bewtyblog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bewtyblog`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL COMMENT 'id บทความ',
  `title` varchar(255) NOT NULL COMMENT 'ชื่อบทความ',
  `body` text DEFAULT NULL COMMENT 'เนื้อหาบทความ',
  `create_ts` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่เวลาที่สร้างบทความ (auto เมื่อ insert บทความใหม่)',
  `authors_id` int(11) NOT NULL COMMENT 'รหัสผู้แต่ง',
  `updatetime` datetime DEFAULT NULL COMMENT 'วันที่ เวลา ที่ปรับปรุงบทความล่าสุด\nphp function -- date(''YYYY-mm-dd H:i:s'')',
  `publish_sts` char(1) NOT NULL DEFAULT 'N' COMMENT 'N = draft\nY = publish'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `create_ts`, `authors_id`, `updatetime`, `publish_sts`) VALUES
(1, 'เรื่องของ \"Passion\"', 'ความคิดสร้างสรรค์ คือการแสดงความเป็นตัวเราออกมาทางความคิด แล้วถ้าเรานำความคิดสร้างสรรค์นั้นมาลงมือทำให้เกิดขึ้นจริง มันก็จะกลายเป็น Innovation\r\n\r\nPassion ก็เหมือนกัน เราก็แค่ทำสิ่งที่เราทำอยู่ทุกวันนี้ให้ดี เราแค่ตั้งใจทำงาน ใส่ใจในงานที่เราทำ ทุ่มเทให้กับมันเต็มที่ ทำให้มันออกมาดีที่สุด ดีจนคนอื่นๆ ไม่กล้ามองข้าม\r\n\r\nถ้าเราลงทุน ทำทุกอย่างเพื่อคนๆ หนึ่ง สุดท้ายเราก็จะพบว่าเรารักคนๆ นั้น ถ้าเราลงทุนเรียนรู้และทำงานหนักเพื่อให้งานสำเร็จ สุดท้ายเราก็จะรักงานนั้น', '2021-03-22 05:09:55', 2, '2021-03-23 01:23:33', 'Y'),
(2, 'จัดการความเครียด', 'ความเครียดไม่ใช่สิ่งที่ดีหรือร้าย ชีวิตเราต้องเจอกับความเครียดบ้าง เพราะความเครียดช่วยกระตุ้นให้เราลงมือทำงานให้เสร็จ ความเครียดไม่มีเลยก็ไม่ได้ แต่มีมากเกินไปก็ไม่ดี ความเครียดมันไม่หนีไปไหน มันจะอยู่กับเราตลอดไป และเราก็ควรใช้ความเครียดให้เกิดประโยชน์\r\n\r\nความเครียดในระยะสั้นๆ เป็นสิ่งที่ดี เพราะมันจะกระตุ้นและท้าทายเรา ให้เราทำสิ่งที่จำเป็นเพื่อตอบสนองความต้องการ แต่ความเครียดที่น่าเป็นห่วงคือความเครียดที่เกิดขึ้นในตอนที่เราไม่รู้ว่าจะทำยังไง ในตอนที่เราไม่มีตัวเลือกหรือหาทางออกไม่ได้\r\n\r\nถ้าเรารู้ตัวว่าเครียด ก็แสดงว่าร่างกายเรายังปกติ เราควรจะรู้สึกขอบคุณที่เรารู้ตัวว่าเครียด เพราะเวลาที่เราเครียด มันเกิดจากการที่เราแคร์ เพราะเรามีคนที่เป็นห่วง ไม่ว่าจะเป็นคนในครอบครัว เพื่อน ถ้าเราไม่แคร์ เราก็คงไม่เครียดหรอก\r\n\r\nรู้จักหยุดพักระหว่างงาน คิดทบทวน และกำหนดจังหวะการหายใจเข้าออกช้าๆ เป็นจังหวะ มันจะทำให้เราอารมณ์ดีขึ้น และขยายพลังงานบวกไปยังคนอื่นๆ', '2021-03-22 05:11:26', 2, '2021-03-22 12:11:28', 'Y'),
(3, 'ความสุข', 'เป้าหมายที่แท้จริงของเราคือคุณภาพชีวิต ความพึงพอใจในชีวิต ความสุขที่ยั่งยืน โดยการใช้ชีวิตที่ดีและชีวิตที่มีความหมาย\r\n\r\nแทนที่จะหาความสุขจากการทำเรื่องสนุกสนาน หรือความสะดวกสบาย เราควรเปลี่ยนไปให้ความสำคัญกับการพัฒนาตนเอง พัฒนาคนอื่น มีส่วนร่วมในการพัฒนาคุณภาพชีวิตของคนอื่นๆ\r\n\r\nปล่อยให้ความสุขเป็นผลพลอยได้จากการเห็นคุณค่าของตัวเอง จากความพอใจที่ทำงานสำเร็จ และการได้ทำสิ่งที่มีความหมาย\r\n\r\nความสุขคือ การใช้ชีวิตที่มีประโยชน์', '2021-03-22 05:14:19', 2, '2021-03-22 12:14:21', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL COMMENT 'id ผู้เขียน',
  `username` varchar(45) NOT NULL COMMENT 'username สำหรับล๊อกอิน',
  `passwd` varchar(45) NOT NULL COMMENT 'รหัสผ่าน ใช้ฟังก์ชั่น md5(********) เพื่อเข้ารหัส',
  `name` varchar(45) NOT NULL COMMENT 'ชื่อผู้เขียน',
  `penname` varchar(45) NOT NULL COMMENT 'นามปากกา',
  `email` varchar(45) NOT NULL COMMENT 'อีเมล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `username`, `passwd`, `name`, `penname`, `email`) VALUES
(1, 'bb', '050248cd2efad770e194ca0e12d44264', 'bb', 'bb', 'bb@gmail.com'),
(2, 'bbewty', '050248cd2efad770e194ca0e12d44264', 'บิว บิวตี้', 'bbewty', 'bbewty@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles_users_idx` (`authors_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `us_username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id บทความ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ผู้เขียน', AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_users` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
