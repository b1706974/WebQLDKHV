-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 05:43 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qltt4`
--

-- --------------------------------------------------------

--
-- Table structure for table `detai`
--

CREATE TABLE `detai` (
  `MaDT` int(11) NOT NULL,
  `TenDT` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MaSV` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MaGV` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MaNH` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Diem` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detai`
--

INSERT INTO `detai` (`MaDT`, `TenDT`, `MaSV`, `MaGV`, `MaNH`, `TrangThai`, `Diem`) VALUES
(1, 'Xây dựng hệ thống bán hàng online trên Wp', 'SV3', 'GV2', '1', 'Chờ phê duyệt', '9.5'),
(3, 'xây dưng website bán hàn trực tuyến', 'SV1', 'GV1', '1', 'Chờ phê duyệt', ''),
(5, 'tìm hiểu về 3Ds max mô phỏng toàn nhà C2', 'SV5', 'GV1', '1', 'Chờ phê duyệt', ''),
(6, 'giao thức định tuyến OISL ', 'SV1', 'GV1', '1', 'Chấp nhận', '5'),
(7, 'tìm hiểu C# xây dựng game cờ caro', 'SV2', 'GV2', '2', 'Chấp nhận', '7'),
(9, 'Xây dựng giao thức định tuyến', 'SV3', 'GV3', '2', 'Chờ phê duyệt', ''),
(10, 'Tìm hiểu wordpress xây dựng web tin tức', 'SV4', 'GV1', '1', 'Chờ phê duyệt', ''),
(11, 'Điều phối CPU cho các tiến trình', 'SV6', 'GV1', '1', 'Chấp nhận', '6'),
(12, 'xây dựng web quản lý ktx', 'SV6', 'GV1', '1', 'Chờ phê duyệt', ''),
(13, 'xây dựng web qldt', 'SV3', 'GV3', '1', 'Chờ phê duyệt', '');

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `MaGV` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TenGV` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`MaGV`, `TenGV`, `MatKhau`) VALUES
('GV1', 'Nguyễn Văn Thắng', '123'),
('GV2', 'Nguyễn Thị Oanh', '123'),
('GV3', 'Nguyễn Văn Nam', '123');

-- --------------------------------------------------------

--
-- Table structure for table `namhoc`
--

CREATE TABLE `namhoc` (
  `MaNH` int(11) NOT NULL,
  `TenNH` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `namhoc`
--

INSERT INTO `namhoc` (`MaNH`, `TenNH`) VALUES
(1, 'Thực tập chuyên ngành_kỳ 1_năm2016-2017'),
(2, 'Thực tập tốt nghiệp_kỳ 1_ năm 2017-2018'),
(3, 'thực tập tốt nghiệp');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TenSV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `TenSV`, `MatKhau`) VALUES
('SV1', 'Hoàng Thị Hạnh', '123'),
('SV2', 'Ngô Thị Vân', '123'),
('SV3', 'Trần Văn Bình', '123'),
('SV4', 'Hà Hải Quỳnh', '123'),
('SV5', 'Lê Anh Nam', '123'),
('SV6', 'Nguyễn Thị Thảo', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detai`
--
ALTER TABLE `detai`
  ADD PRIMARY KEY (`MaDT`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MaGV`);

--
-- Indexes for table `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`MaNH`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detai`
--
ALTER TABLE `detai`
  MODIFY `MaDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `namhoc`
--
ALTER TABLE `namhoc`
  MODIFY `MaNH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
