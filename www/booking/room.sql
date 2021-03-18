-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 12:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_division`
--

CREATE TABLE `tb_division` (
  `id_division` int(1) NOT NULL,
  `name_division` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_division`
--

INSERT INTO `tb_division` (`id_division`, `name_division`) VALUES
(1, 'สำนักปลัด'),
(2, 'กองคลัง'),
(3, 'กองช่าง'),
(4, 'กองสาธารณสุขและสิ่งแวดล้อม'),
(5, 'กองการศึกษา ศาสนาและวัฒนธรรม');

-- --------------------------------------------------------

--
-- Table structure for table `tb_equipment`
--

CREATE TABLE `tb_equipment` (
  `id_equipment` int(2) NOT NULL,
  `name_equipment` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_equipment`
--

INSERT INTO `tb_equipment` (`id_equipment`, `name_equipment`) VALUES
(1, 'พนักงาน'),
(2, 'ลูกค้าทั่วไป'),
(3, 'สมาชิก');

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `id` int(11) NOT NULL,
  `id_member` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  `rooms` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start` varchar(30) NOT NULL,
  `end` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `division` varchar(50) NOT NULL,
  `people` int(3) NOT NULL,
  `style` varchar(50) NOT NULL,
  `equipment` varchar(250) NOT NULL,
  `member` varchar(200) CHARACTER SET utf32 NOT NULL,
  `etc` text NOT NULL,
  `img_event` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ทดสอบปฏิทิน';

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`id`, `id_member`, `status`, `rooms`, `title`, `start`, `end`, `color`, `division`, `people`, `style`, `equipment`, `member`, `etc`, `img_event`) VALUES
(43, 1, 1, 1, 'เพ้นเล็บ', '2021-03-22T09:00:00', '2021-03-22T11:00:00', '#e71dd6', '', 200, '', 'พนักงาน', 'แอดมิน  ระบบ', '', '4.jpg'),
(49, 1, 1, 2, 'ต่อขนตาเส้นต่อเส้น', '2021-03-19T10:00:00', '2021-03-19T13:00:00', '#229b12', '', 599, '', 'พนักงาน', 'แอดมิน  ระบบ', '', ''),
(50, 1, 1, 2, 'ต่อขนตาเส้นต่อเส้น', '2021-03-20T14:00:00', '2021-03-20T16:00:00', '#229b12', '', 599, '', 'พนักงาน', 'แอดมิน  ระบบ', '', ''),
(51, 1, 1, 3, 'สักคิ้ว 3 มิติ', '2021-03-18T20:00:00', '2021-03-18T22:00:00', '#d71d1d', '', 200, '', 'พนักงาน', 'แอดมิน  ระบบ', '', ''),
(52, 1, 1, 1, 'ต่อเล็บเจล', '2021-03-23T11:00:00', '2021-03-23T13:00:00', '#e71dd6', '', 200, '', 'พนักงาน', 'แอดมิน  ระบบ', '', 'w644.jpg'),
(53, 1, 1, 1, 'เพ้นเล็บเจล', '2021-03-31T14:00:00', '2021-03-31T16:00:00', '#e71dd6', '', 200, '', 'พนักงาน', 'แอดมิน  ระบบ', '', '158073946_3989461231110430_497106839776073624_n.jpg'),
(54, 1, 1, 2, 'ต่อขนตาเส้นต่อเส้น', '2021-03-24T14:00:00', '2021-03-24T17:00:00', '#229b12', '', 599, '', 'พนักงาน', 'แอดมิน  ระบบ', '', ''),
(55, 3, 1, 1, 'เพ้นเล็บเจล', '2021-03-24T09:00:00', '2021-03-24T12:00:00', '#e71dd6', '', 200, '', 'สมาชิก', 'กฤติยา  ชมเวียง', '', ''),
(48, 2, 1, 3, 'สักคิ้ว 3 มิติ', '2021-03-19T14:00:00', '2021-03-19T16:00:00', '#d71d1d', '', 599, '', 'สมาชิก', 'วรเวธน์  ศรีสุขา', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ntitle` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL,
  `position` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `active` int(1) NOT NULL,
  `login_date` datetime NOT NULL,
  `login_times` int(6) NOT NULL,
  `create_date` datetime NOT NULL,
  `FilesName` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `username`, `password`, `ntitle`, `firstname`, `surname`, `email`, `status`, `position`, `phone`, `active`, `login_date`, `login_times`, `create_date`, `FilesName`) VALUES
(1, 'admin', '123456', 'นาย', 'แอดมิน', 'ระบบ', 'admin@mail.com', 'admin', 'ผู้ดูแลระบบ', '0999999999', 1, '2021-03-17 20:33:16', 43, '2020-07-01 00:00:00', ''),
(2, 'member', '123456', 'นาย', 'วรเวธน์', 'ศรีสุขา', '999@hotmail.com', 'user', 'ลูกค้า', '0999999999', 1, '2021-03-17 09:38:06', 6, '2020-07-05 00:00:00', 'woravets.jpg'),
(3, 'kittiya', '123456', 'นางสาว', 'กฤติยา', 'ชมเวียง', 'ging@gmail.com', 'user', 'ลูกค้า', '0923928514', 1, '2021-03-17 20:35:55', 24, '2021-03-13 17:47:06', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rooms`
--

CREATE TABLE `tb_rooms` (
  `id_rooms` int(3) NOT NULL,
  `name_rooms` varchar(200) NOT NULL,
  `people_rooms` int(4) NOT NULL,
  `color_rooms` varchar(20) NOT NULL,
  `image_rooms` varchar(250) NOT NULL,
  `detail_rooms` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rooms`
--

INSERT INTO `tb_rooms` (`id_rooms`, `name_rooms`, `people_rooms`, `color_rooms`, `image_rooms`, `detail_rooms`) VALUES
(1, 'บริการเพ้นเล็บ', 200, '#e71dd6', '17.jpg', '- บริการทาสีเจล ไม่เกิน 3 สี\r\n- บริการทาสีเจลกลิตเตอร์\r\n- บริการเพ้นเล็บเจล\r\n- บริการล้างเล็บเจล'),
(2, 'บริการต่อขนตา', 499, '#229b12', 'D-FPmuCVAAAsrDW.jpg', '- ต่อแบบธรรมชาติ\r\n- ต่อแบบ 3D\r\n- ต่อแบบเส้นต่อเส้น\r\n- ต่อขนตาแบบช่อ'),
(3, 'บริการสักคิ้ว', 599, '#d71d1d', '8.jpg', '- คิ้วสไลค์เกาหลี\r\n- สักคิ้ว 3 มิติ\r\n- สักคิ้ว 6 มิติ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_style`
--

CREATE TABLE `tb_style` (
  `id_style` int(10) NOT NULL,
  `name_style` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_style`
--

INSERT INTO `tb_style` (`id_style`, `name_style`) VALUES
(1, '9:00'),
(2, '10:00'),
(3, '11:00'),
(4, '12:00'),
(5, '13:00'),
(6, '14:00'),
(7, '15:00'),
(8, '16:00'),
(9, '17:00'),
(10, '18:00'),
(11, '19:00'),
(12, '20:00'),
(13, '21:00'),
(14, '22:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_division`
--
ALTER TABLE `tb_division`
  ADD PRIMARY KEY (`id_division`);

--
-- Indexes for table `tb_equipment`
--
ALTER TABLE `tb_equipment`
  ADD PRIMARY KEY (`id_equipment`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  ADD PRIMARY KEY (`id_rooms`);

--
-- Indexes for table `tb_style`
--
ALTER TABLE `tb_style`
  ADD PRIMARY KEY (`id_style`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_division`
--
ALTER TABLE `tb_division`
  MODIFY `id_division` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_equipment`
--
ALTER TABLE `tb_equipment`
  MODIFY `id_equipment` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  MODIFY `id_rooms` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_style`
--
ALTER TABLE `tb_style`
  MODIFY `id_style` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
