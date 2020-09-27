-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 27, 2020 lúc 10:04 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demophp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `idfrom` int(11) NOT NULL,
  `idto` int(11) NOT NULL,
  `message` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `message`
--

INSERT INTO `message` (`id`, `idfrom`, `idto`, `message`) VALUES
(24, 84, 75, 'chao ban'),
(25, 75, 84, 'hihi ban'),
(26, 84, 75, 'chao ban'),
(27, 84, 75, 'bạn đến từ đâu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `chucvu` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `username`, `password`, `name`, `email`, `sdt`, `chucvu`) VALUES
(75, 'admin', '1', 'admin', 'huyen96mtc@gmail.comp', '11947', 'QL'),
(84, '1', '1', 'hung', 'hungbn@gmail.com', '0999999999999', 'SV'),
(87, '2', '1', 'hai', 'huyen96mtc@gmail.com', '03350381689', 'SV'),
(88, '3', '1', 'luan', 'hungcn8b@gmail.com', '0335037169', 'SV'),
(91, '4', '1', 'duong', 'huyen96mtc@gmail.com', '111', 'SV'),
(95, '5', '1', 'datanoname', 'hungcn8b@gmail.com', '0985264873', 'SV'),
(96, '6', '1', 'Nguyen Hoang Hung', 'hoang34@gmail.com', '19001001', 'SV');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subtask`
--

CREATE TABLE `subtask` (
  `id` int(11) NOT NULL,
  `idsv` int(11) NOT NULL,
  `idtask` int(11) NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subtask`
--

INSERT INTO `subtask` (`id`, `idsv`, `idtask`, `link`, `thoigian`) VALUES
(7, 87, 7, 'submittask/Book1.xlsx', '2020-09-25 16:32:42'),
(8, 84, 8, 'submittask/Challenge-5a.docx', '2020-09-27 14:47:42'),
(9, 84, 9, 'submittask/Training Program.xlsx', '2020-09-27 14:57:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `tieude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `task`
--

INSERT INTO `task` (`id`, `tieude`, `ngaybatdau`, `ngayketthuc`, `link`) VALUES
(6, 'home 1', '2020-09-25', '2020-09-27', 'upload/goi-y-chu-de-bai-tap-lon.pdf'),
(7, 'home 2', '2020-09-25', '2020-09-27', 'upload/Book1.xlsx'),
(8, 'home3', '2020-09-27', '2020-09-30', 'upload/Challenge-5a.docx'),
(9, 'home4', '2020-09-27', '2020-09-30', 'upload/Challenge-5a.docx');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idfrom` (`idfrom`),
  ADD KEY `idto` (`idto`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `subtask`
--
ALTER TABLE `subtask`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsv` (`idsv`);

--
-- Chỉ mục cho bảng `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `subtask`
--
ALTER TABLE `subtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idfrom`) REFERENCES `sinhvien` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`idto`) REFERENCES `sinhvien` (`id`);

--
-- Các ràng buộc cho bảng `subtask`
--
ALTER TABLE `subtask`
  ADD CONSTRAINT `subtask_ibfk_1` FOREIGN KEY (`idsv`) REFERENCES `sinhvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
