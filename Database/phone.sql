-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 03:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `IDBV` int(11) NOT NULL,
  `TenBaiViet` varchar(50) NOT NULL,
  `NoiDung` text NOT NULL,
  `Ngay` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`) VALUES
(1, 9, '2024-02-27', 900000),
(2, 9, '2024-02-27', 2160000),
(3, 9, '2024-02-27', 2540000),
(4, 9, '2024-02-27', 850000),
(5, 9, '2024-02-27', 400000),
(6, 9, '2024-02-27', 820000),
(7, 9, '2024-02-27', 820000),
(8, 9, '2024-02-27', 820000),
(9, 9, '2024-02-27', 820000),
(10, 9, '2024-02-27', 820000),
(11, 9, '2024-02-27', 820000),
(12, 9, '2024-02-27', 2000000),
(13, 9, '2024-02-27', 26420000),
(14, 9, '2024-02-27', 52840000),
(15, 9, '2024-02-28', 51800000),
(16, 9, '2024-02-29', 21420000),
(17, 9, '2024-03-03', 59800000),
(18, 9, '2024-03-03', 50800000),
(19, 13, '2024-03-27', 69530000);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`) VALUES
(1, 11, 18, 1),
(2, 11, 17, 1),
(3, 12, 18, 5),
(4, 13, 17, 1),
(5, 14, 17, 2),
(6, 15, 17, 1),
(7, 15, 13, 1),
(8, 16, 10, 1),
(9, 17, 17, 1),
(10, 17, 7, 2),
(11, 18, 18, 1),
(12, 18, 11, 1),
(13, 19, 7, 1),
(14, 19, 17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `IDBL` int(11) NOT NULL,
  `IDSP` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `NoiDung` text NOT NULL,
  `Ngay` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `IDCTHD` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `IDHD` int(11) NOT NULL,
  `DiaChi` text NOT NULL,
  `TongTien` int(11) NOT NULL,
  `trangthai` set('dang-xu-ly','dang-giao-hang','giao-thanh-cong','huy') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `IDDM` int(11) NOT NULL,
  `TenDM` varchar(100) NOT NULL,
  `MotaDM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`IDDM`, `TenDM`, `MotaDM`) VALUES
(1, 'Iphone thường', 'Bh1 năm'),
(2, 'Iphone promax', 'Bh1 năm'),
(6, 'Iphone 11', 'Bh1 năm'),
(7, 'Iphone 12', 'Bh1 năm'),
(8, 'Iphone15', 'Bh1 năm');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `IDHD` int(11) NOT NULL,
  `IDCTHD` int(11) NOT NULL,
  `IDSP` int(11) NOT NULL,
  `HinhAnh` varchar(225) NOT NULL,
  `TenSP` varchar(225) NOT NULL,
  `GiaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTIen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSP` int(11) NOT NULL,
  `TenSP` varchar(225) NOT NULL,
  `HinhAnhSP` varchar(100) NOT NULL,
  `GiaSP` int(11) NOT NULL,
  `MotaSP` text NOT NULL,
  `ViewSP` int(11) NOT NULL,
  `BetSeller` int(11) NOT NULL,
  `HangSP` varchar(50) NOT NULL,
  `LoaiSP` set('new','hot','sale') DEFAULT '',
  `MaDM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`IDSP`, `TenSP`, `HinhAnhSP`, `GiaSP`, `MotaSP`, `ViewSP`, `BetSeller`, `HangSP`, `LoaiSP`, `MaDM`) VALUES
(1, 'Iphone 11', 'ip01.jpg', 11690000, 'Sản phẩm của Apple', 251, 7, 'Apple', '', 2),
(2, 'Iphone 12', 'ip02.jpg', 22450000, 'Sản phẩm của Apple', 132, 12, '23450000', 'sale', 2),
(3, 'Iphone 11 pro', 'ip03.jpg', 22900000, 'Sản phẩm của Apple', 343, 20, 'Apple', 'new', 6),
(4, 'Iphone 12 pro', 'ip05.jpg', 22750000, 'Sản phẩm của Apple', 3332, 734, 'Apple', 'hot', 6),
(5, 'Iphone 13 pro', 'ip05.jpg', 24750000, 'Sản phẩm của Apple', 45, 6, 'Apple', '', 6),
(6, 'Iphone 14 pro', 'ip06.jpg', 12850000, 'Sản phẩm của Apple', 66, 12, 'Apple', '', 6),
(7, 'Iphone 15 pro', 'ip07.jpg', 16690000, 'Sản phẩm của Apple', 5012, 523, 'Apple', '', 2),
(8, 'Iphone 12', 'ip08.jpg', 17850000, 'Sản phẩm của Apple', 86, 21, 'Apple', '', 6),
(9, 'Iphone 14 pro', 'ip10.jpg', 15400000, 'Sản phẩm của Apple', 123, 34, 'Apple', '', 1),
(10, 'Iphone 12 pro', 'ip11.jpg', 21420000, 'Sản phẩm của Apple', 4534, 324, 'Apple', '', 1),
(12, 'Iphone 15 thường', 'ip08.jpg', 22400000, 'Sản phẩm của Apple', 1231, 233, 'Apple', '', 1),
(13, 'Iphone 13 pro', 'ip01.jpg', 25380000, 'Sản phẩm của Apple', 563, 86, 'Apple', '', 1),
(14, 'Iphone 14 pro', 'ip02.jpg', 26400000, 'Sản phẩm của Apple', 123, 23, 'Apple', '', 1),
(15, 'Iphone 15 thường', 'ip03.jpg', 25450000, 'Sản phẩm của Apple', 443, 43, 'Apple', '', 1),
(16, 'Iphone 12 thường', 'ip05.jpg', 27450000, 'Sản phẩm của Apple', 564, 87, 'Apple', '', 1),
(17, 'Iphone 11', 'ip05.jpg', 26420000, 'Sản phẩm của Apple', 345, 54, 'Apple', '', 1),
(18, 'Iphone 12', 'ip06.jpg', 28400000, 'Sản phẩm của Apple', 23, 3, 'Apple', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `IDTK` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `HinhAnh` varchar(225) NOT NULL,
  `Role` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1KH 0ADmin',
  `Phone` int(20) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`IDTK`, `username`, `password`, `email`, `HinhAnh`, `Role`, `Phone`, `Address`) VALUES
(1, 'Duy Lam', '123123123', 'duylam@gmail.com', '', 1, NULL, NULL),
(2, '111', '123', 'lam@gmail.com', '', 1, NULL, NULL),
(3, 'Tho', '123123123', 'tho@gmail.com', 'default.png', 0, NULL, NULL),
(4, 'Nghiax', '123123123', 'congnghia0802@gmail.com', 'default.png', 1, NULL, NULL),
(5, 'lam', '123123123', 'lamnekiro445@gmail.com', 'default.png', 1, NULL, NULL),
(6, 'hotruongthinhkv147@gmail.com', '123456789', 'hotruongthinhkv147@gmail.com', 'default.png', 1, NULL, NULL),
(7, 'Trường Thịnh', 'b20dbce222a9137d682d91da8f31ccf5', 'hotruongthinh@gmail.com', 'default.png', 1, NULL, NULL),
(8, 'hotruongthinhkv147@gmail.com', 'b20dbce222a9137d682d91da8f31ccf5', 'hotruongthinh123@gmail.com', 'default.png', 1, 1234455666, 'chào em'),
(9, 'Trường Thịnh', 'b20dbce222a9137d682d91da8f31ccf5', 'hotruongthinh142@gmail.com', 'default.png', 1, 909090922, ' Đồng Tháp'),
(10, 'Trường Thịnh', 'b20dbce222a9137d682d91da8f31ccf5', 'hotruongthinh12345@gmail.com', 'default.png', 0, 12345, 'Đồng Tháp'),
(12, 'Trường Thịnh', 'b20dbce222a9137d682d91da8f31ccf5', 'hotruongthinhkv123@gmail.com', 'default.png', 0, 869845074, 'Đồng Tháp'),
(13, 'Trường Thịnh', 'b20dbce222a9137d682d91da8f31ccf5', 'hotruongthinh12@gmail.com', 'default.png', 1, 123456789, 'Đồng Tháp'),
(14, 'Trường Thịnh', '55be0b8d28b5f03e5c1cdf391b36f4dd', 'vercelwebsite@gmail.com', 'default.png', 1, 202002000, 'Đồng Tháp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`IDBV`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`IDBL`),
  ADD KEY `IDSP` (`IDSP`),
  ADD KEY `IDTK` (`IDTK`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`IDCTHD`),
  ADD KEY `IDTK` (`IDTK`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`IDDM`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IDHD`),
  ADD KEY `IDSP` (`IDSP`),
  ADD KEY `hoadon_ibfk_1` (`IDCTHD`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSP`),
  ADD KEY `MaDM` (`MaDM`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`IDTK`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `IDBV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `IDBL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `IDCTHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `IDDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `IDHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `IDTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`IDSP`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan` (`IDTK`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan` (`IDTK`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`IDCTHD`) REFERENCES `chitiethoadon` (`IDCTHD`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`IDSP`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`IDDM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
