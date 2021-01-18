-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 18, 2021 lúc 11:40 AM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tlushop_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dtb_billdetail`
--

CREATE TABLE `dtb_billdetail` (
  `id` int(6) NOT NULL,
  `id_bill` int(6) NOT NULL,
  `id_product` int(6) NOT NULL,
  `quantity` int(11) NOT NULL,
  `promotion_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dtb_billdetail`
--

INSERT INTO `dtb_billdetail` (`id`, `id_bill`, `id_product`, `quantity`, `promotion_price`) VALUES
(87, 44, 1, 1, 45900000),
(88, 44, 3, 1, 31500000),
(89, 44, 6, 1, 20490000),
(90, 45, 1, 1, 45900000),
(91, 45, 3, 1, 31500000),
(92, 45, 6, 1, 20490000),
(93, 46, 3, 1, 31500000),
(94, 46, 6, 1, 20490000),
(95, 46, 7, 1, 17790000),
(96, 47, 12, 1, 37000000),
(97, 47, 4, 1, 24500000),
(98, 48, 1, 1, 45900000),
(99, 48, 3, 1, 31500000),
(100, 48, 6, 1, 20490000),
(101, 48, 7, 1, 17790000),
(102, 49, 3, 1, 31500000),
(103, 49, 6, 1, 20490000),
(104, 50, 1, 1, 45900000),
(105, 51, 3, 1, 31500000),
(106, 52, 3, 1, 31500000),
(107, 52, 7, 1, 17790000),
(108, 53, 1, 1, 45900000),
(109, 53, 6, 1, 20490000),
(110, 54, 12, 1, 37000000),
(111, 55, 16, 1, 23000000),
(112, 56, 7, 1, 17790000),
(113, 57, 1, 1, 45900000),
(114, 58, 6, 1, 20490000),
(115, 59, 7, 1, 17790000),
(116, 60, 1, 1, 45900000),
(117, 61, 3, 1, 31500000),
(118, 61, 4, 1, 24500000),
(119, 62, 6, 1, 20490000),
(120, 63, 8, 1, 24500000),
(121, 64, 18, 1, 71990000),
(122, 65, 6, 1, 20490000),
(123, 66, 11, 1, 22500000),
(124, 67, 12, 2, 37000000),
(125, 68, 3, 3, 31500000),
(126, 68, 21, 1, 18690000),
(127, 68, 24, 2, 30090000),
(128, 68, 25, 2, 20790000),
(129, 69, 6, 1, 20490000),
(130, 70, 6, 7, 20490000),
(131, 70, 7, 1, 17790000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dtb_bills`
--

CREATE TABLE `dtb_bills` (
  `id` int(6) NOT NULL,
  `id_customer` int(6) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `payment` int(11) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `name_recipient` varchar(50) NOT NULL,
  `phone` char(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dtb_bills`
--

INSERT INTO `dtb_bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `name_recipient`, `phone`, `address`) VALUES
(44, NULL, '2021-01-11', 3, 97940000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Mễ Trì Hạ-Mễ Trì-Nam Từ Liêm-Hà Nội'),
(45, 11, '2021-01-11', 3, 97940000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Mễ Trì Hạ-Mễ Trì-Nam Từ Liêm-Hà Nội'),
(46, 11, '2021-01-11', 3, 69830000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Mễ Trì Hạ-Mễ Trì-Nam Từ Liêm-Hà Nội'),
(47, 11, '2021-01-11', 2, 61550000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Mễ Trì Hạ-Nam Từ Liêm-Hà Nội'),
(48, NULL, '2021-01-11', 4, 115730000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Mễ Trì Hạ-Nam Từ Liêm-Hà Nội'),
(49, NULL, '2021-01-11', 2, 52040000, 'test', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(50, NULL, '2021-01-11', 1, 45950000, 'giao nhanh', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(51, NULL, '2021-01-11', 1, 31550000, 'giao nhanh', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(52, NULL, '2021-01-11', 2, 49340000, 'giao nhanh', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(53, NULL, '2021-01-11', 2, 66440000, 'giao nhanh', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(54, NULL, '2021-01-11', 1, 37050000, 'giao nhanh', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(55, NULL, '2021-01-11', 1, 23050000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(56, NULL, '2021-01-11', 1, 17840000, 'test', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(57, NULL, '2021-01-11', 1, 45950000, 'test', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(58, NULL, '2021-01-11', 1, 20540000, 'test', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(59, NULL, '2021-01-11', 1, 17840000, 'giao nhanh', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(60, NULL, '2021-01-11', 1, 45950000, 'test', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(61, NULL, '2021-01-11', 2, 56050000, 'giao nhanh', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(62, NULL, '2021-01-11', 1, 20540000, 'test', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(63, NULL, '2021-01-11', 1, 24550000, 'giao nhanh', 'Nguyễn Thành Long', '0212221346', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(64, NULL, '2021-01-11', 1, 72040000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(65, NULL, '2021-01-12', 1, 20540000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(66, NULL, '2021-01-13', 1, 22550000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(67, NULL, '2021-01-15', 2, 74050000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(68, NULL, '2021-01-16', 8, 215000000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Nam Từ Niêm -Hà Nội-Việt Nam'),
(69, 18, '2021-01-17', 1, 20540000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Mễ Trì Hạ-Nam Từ Liêm-Hà Nội'),
(70, NULL, '2021-01-18', 8, 161270000, 'giao nhanh', 'Nguyễn Thành Long', '0964627305', 'Mễ Trì Hạ-Nam Từ Liêm-Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dtb_config`
--

CREATE TABLE `dtb_config` (
  `id` int(6) NOT NULL,
  `cpu` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `hard_disk` varchar(50) DEFAULT NULL,
  `cart_graphic` varchar(50) DEFAULT NULL,
  `display` varchar(50) DEFAULT NULL,
  `connect` varchar(50) DEFAULT NULL,
  `pin` varchar(50) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `size` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dtb_config`
--

INSERT INTO `dtb_config` (`id`, `cpu`, `ram`, `hard_disk`, `cart_graphic`, `display`, `connect`, `pin`, `weight`, `size`) VALUES
(1, 'Intel® Core™ i7-10750H (6-Core 12 Threads 12MB Cac', '16GB DDR4-2933MHz', '512GB M.2 PCIe NVMe SSD', 'NVIDIA® GeForce® GTX 1650 Ti 4GB GDDR6 with Max-Q', '15.6″ FHD (1920×1080)', 'Wifi 802.11 AC + Bluetooth® 5.0', '68 Whr, 6-cell Battery (Integrated)', 2.05, 'max'),
(2, 'Intel Core i7-8750H (2.2GHz up to 4.1GHz)', '8GB DDR4', 'HDD 1TB + SSD 128GB', 'NVIDIA GeForce GTX 1050Ti 4GB GDDR5', '15.6″ FHD', 'Wifi 802.11 AC + Bluetooth® 5.0', '68 Whr, 6-cell Battery (Integrated)', 2.53, '22.7 x 380 x 258 (mm)'),
(3, 'Core i7- 8750H', 'RAM 16GB', 'SSD 512GB', 'Nvidia Quadro P1000', 'FHD', '802.11ac 2x2 + Bluetooth 4.2', '4 Cells', 2.53, '22.7 x 380 x 258 (mm)'),
(4, '10th Generation Intel® Core™i5-1035G1 Processor', '8 GB LPDDR4 - 3733 MHz', '256 GB M.2 PCIe NVME X4 SSD', ' Intel® UHD Graphics', '13.4 inches , 16:10 FHD + WLED Touch Display (1920', 'Wifi 802.11 AC + Bluetooth® 5.0', '4 Cells', 2.53, '22.7 x 380 x 258 (mm)'),
(5, 'Intel Core i7-8565U ', '8GB LPDDR3 2133MHz', 'SSD 256GB', 'Intel UHD Graphics 620', 'FHD (1920 x 1080) (4k cảm ứng + 1.500.000đ)', 'Wireless Intel 802.11', '4 Cell  52Whz', 1, '22.7 x 380 x 258 (mm)'),
(6, 'i7-8565U', 'RAM 8GB', 'SSD 256GB', 'Nvidia Quadro P1000', 'FHD IPS', 'Wifi 802.11 AC + Bluetooth® 5.0', '4 Cells', 2.05, '22.7 x 380 x 258 (mm)'),
(7, 'Intel Core i5-9300HF 2.4GHz up to 4.1GHz', '8GB DDR4 2666MHz', '512GB SSD M.2 2242 NVMe', 'NVIDIA GeForce GTX 1650 4GB GDDR5', '1920 x 1080 pixels', '802.11AC (2x2)', '3 Cell 45 WHr', 2.19, '363 x 254.6 x 23.9 (mm)'),
(8, 'CPU Intel Core i7-6820HQ 2.7GHz', 'Ram 8GB DDR4 2133MHz', 'SSD 256GB', 'Card màn hình: Nvidia Quadro M1000M 2GB', 'Màn hình 15.6 inch FHD (1920 x 1080)', 'Wifi 802.11 AC + Bluetooth® 5.0', '6 cell', 2.67, '377.4mm x 252.3mm'),
(9, 'Intel Core i5-10210U', '8GB PC4-19200 DDR4', '256GB M.2 PCIe NVMe SSD', 'Intel UHD Graphics 620', '13.3 inch FHD (1920 x 1080)', 'Intel® Dual-Band Wireless-AC', '17.6 giờ với pin 48 Whr', 1.22, '22.7 x 380 x 258 (mm)'),
(10, 'Intel Core i5-10210U', '8GB DDR4 3200MHz', '256GB M.2 PCIe', 'Intel UHD Graphics', '14 inch FHD (1920 x 1080)', 'Wi-Fi 6 AX201 802.11AX', '50Wh', 2.05, '22.7 x 380 x 258 (mm)'),
(11, 'Core I7 1.2Ghz', '16GB 3733MHz', '256GB SSD storage', 'Intel Iris Plus Graphics', 'Retina display with True Tone', '2 cổng USB Type C', '6 cell', 1, NULL),
(12, 'chip M1', 'RAM 16GB', '512GB', 'Intel Iris Plus Graphics 645', 'IPS LED-backlit 13,3 inch', 'Wi-Fi 6 802.11ax', '58,2 watt-giờ', 1, '22.7 x 380 x 258 (mm)'),
(13, '1.3GHz dual-core', 'RAM 16GB', '256GB', '8GB of 1866MHz LPDDR3', '* 1440 by 900 * 1280 by 800 * 1024 by 640', 'Wi-Fi: 802.11ac Wi-Fi wireless networking', '6 cell', 1, '22.7 x 380 x 258 (mm)'),
(14, '2.6GHz 6-core i7-9750H ', '16GB 2666MHz DDR4 memory', '512GB On-board SSD', 'AMD Radeon Pro 5300M', '16-inch Retina with True Tone', 'Wireless Intel 802.11', '6 cell', 2, '22.7 x 380 x 258 (mm)'),
(15, 'i7-8750H', 'RAM 16GB ', 'SSD 512GB', 'GA Nvidia P1000', '15.6 FHD IPS', 'Wireless Intel 802.11', '6 cell', 2.05, '22.7 x 380 x 258 (mm)'),
(16, 'Core i7-8750H', 'RAM 8GB', 'HDD 1TB + SSD 128GB', 'VGA 4GB NVIDIA GTX 1050Ti', '15.6 inch, FHD', '802.11AC (2x2)', '6 cell', 2.05, '22.7 x 380 x 258 (mm)'),
(17, 'Intel® Core™ i5-1135G7', '8GB Onboard LPDDR4X', '512GB PCIe NVMe SSD', 'Intel® Iris® Xe Graphics', '14.0 inch display with IPS', 'Wireless Intel 802.11', '6 cell', 2.05, '22.7 x 380 x 258 (mm)'),
(18, 'Intel® Core™ i7-10875H', '16GB DDR4 3200MHz on board', '1TB M.2 NVMe PCIe 3.0 x4', 'nVidia Geforce RTX 2070', '15.6 inch, Non-glare Full HD', 'Wireless Intel 802.11', '6 cell', 2.05, '22.7 x 380 x 258 (mm)'),
(21, 'core i9', '32GB', 'ssd 5TB', 'GTX-1080-TI', '8k', 'wifi', '9Cell', 2.25, 'max'),
(22, 'core i9', '32GB', 'ssd 5TB', 'GTX-1080-TI', '8k', 'wifi', '9Cell', 2, 'max');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dtb_customer`
--

CREATE TABLE `dtb_customer` (
  `id` int(6) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `birth` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  `email` char(50) NOT NULL,
  `password` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dtb_customer`
--

INSERT INTO `dtb_customer` (`id`, `full_name`, `birth`, `address`, `gender`, `phone`, `email`, `password`) VALUES
(10, 'Nguyễn Thành Long', NULL, NULL, NULL, '0212221346', 'timhieu12345678@gmail.com', '$2y$10$.NxI5yuCJvluVNJe1354wO3AzhL1R3NDtKp0xOEaE7TyzAqChY6Mi'),
(11, 'Nguyễn Thành Long', NULL, NULL, NULL, '0212221346', 'nguyenlong3172000@gmail.com', '$2y$10$UkEsiO4zYH2hTLgV/VFio.tyeaX/q/4BCOTpcWpMhEObsDLeQ1/Ve'),
(12, 'Longdzai', NULL, NULL, NULL, '0964627305', '1851061978@e.tlu.edu.vn', '$2y$10$df.vSV9V4mn4G0DAzb1DvOKQT8OEXQVUjKxuri0qM/eBdjmdsh2G6'),
(13, 'Kenny Sang', NULL, NULL, NULL, '12345678', 'sangkenny@gmail.com', '$2y$10$CNrKAgmm5/kJiqUqdltLa.f/mSWznFpeialMxnTm2pn7GrRaXiiUK'),
(14, 'anh Long', NULL, NULL, NULL, '0212221346', 'longdzai@gmail.com', '$2y$10$DZGNwj.Ovs68DDO1pIpTSu2pigzzjtQkDAnX3KLH0/OErcwlt2Rhi'),
(15, 'Thành Long', NULL, NULL, NULL, '0212221346', 'ThanhLong@gmail.com', '$2y$10$noQt.qrfDH0QJB7V5kRFSOOoQaf04bpx2GGDy6Ayy2.YbNzBpRjXG'),
(16, 'Long', NULL, NULL, NULL, '0212221346', 'abc@gmail.com', '$2y$10$rLWRYXVPT8E1yzVY.20hdOC.SGfnIHyv53LqkJAL31io/J5UgbZ7C'),
(17, 'Nguyễn Thành Long', NULL, NULL, NULL, '0964627305', 'ntl@gmail.com', '$2y$10$hcojvOC2ibdrDKCWUXVf1e73PflQtT2gmsxckeHlGkV5.IOu56pCe'),
(18, 'Nguyễn Thành Long', NULL, NULL, NULL, '0964627305', 'nguyenthanhlong@gmail.com', '$2y$10$gtQLoKKD3.c02R2d/UJfxuNnrUmCIKGtNKZfm5iwvqHOpilhowa9q'),
(19, 'Thành Long', NULL, NULL, NULL, '012345678', 'long@gmail.com', '$2y$10$Psk5AKgP7rWgCN.ponfGXOQ1enISAnpBCIsa6Tp6dGZow6SQGgYwG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dtb_employee`
--

CREATE TABLE `dtb_employee` (
  `id` int(6) UNSIGNED NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `birth` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  `email` char(50) NOT NULL,
  `password` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dtb_employee`
--

INSERT INTO `dtb_employee` (`id`, `full_name`, `birth`, `address`, `gender`, `phone`, `email`, `password`) VALUES
(1, 'Nguyễn Thành Long', '2000-07-31', 'Nam Từ Niêm -Hà Nội-Việt Nam', 'Nam', '0964627305', 'nguyenlong3172000@gmail.com', '$2y$10$.sXqnZV6YLq2y0GP1HPSxOFMsPyCtd89mr6vr6jRqs2Vs/AmxyIM2'),
(2, 'Long Dzai', '2000-06-13', 'Nam Từ Niêm -Hà Nội-Việt Nam', 'Nam', '0964627305', 'timhieu12345678@gmail.com', '$2y$10$92kEJOjjfvnvtunKH9MknOZlNwYgLWm4DGqvfQ.yqkjZfGpDNlXx.'),
(3, 'Amin', '2000-03-29', 'Nam Từ Niêm -Hà Nội-Việt Nam', 'Nu', '0212221346', '1851061978@e.tlu.edu.vn', '$2y$10$TQ9tI8D2qLitGhiKmw0maOOI37gJjlqn2zKHwqM0/BbGU1Nsototq'),
(4, 'Trần Ngọc Diệp', '2002-05-22', 'Nam Từ Niêm -Hà Nội-Việt Nam', 'Nu', '0210125112', 'tranngocdiep@gmail.com', '$2y$10$r9PHhPmxUqFowQiMiWSUU.2ihJz1e/LV4kcaHDcBOQoPOJu0lV59.'),
(6, 'Nguyễn Ngọc Ánh', '2001-06-12', 'Kiến Xương-Thái Bình', 'Nu', '0923576342', 'anhnguyen@gmail.com', '$2y$10$X8e5yUddYo6CPrhCJgNNT.DW6BCGycw23mJ3XgSDAThoMynYO1c0G');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dtb_notify`
--

CREATE TABLE `dtb_notify` (
  `id` int(6) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dtb_notify`
--

INSERT INTO `dtb_notify` (`id`, `image`, `title`, `content`) VALUES
(1, 'mockup/images/notify/notify__img.png', 'Hot! Đón giáng sinh với voucher 100k', 'Duy nhất một đêm...');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dtb_product`
--

CREATE TABLE `dtb_product` (
  `id` int(6) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `id_type` int(6) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `unit_price` int(11) NOT NULL,
  `promotion_price` int(11) NOT NULL,
  `image` mediumtext DEFAULT NULL,
  `id_configuration` int(6) NOT NULL,
  `top` int(1) DEFAULT NULL,
  `popular` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dtb_product`
--

INSERT INTO `dtb_product` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `id_configuration`, `top`, `popular`) VALUES
(1, 'DELL XPS 15 9500 Core I9', 1, '<p>Giá Dell XPS 15 9500 chính hãng Bên trong, CPU và GPU đã được cập nhật lên dòng Comet Lake-H thế hệ thứ 10 của Intel và GeForce GTX 1650 Ti tùy chọn, cùng với RAM DDR4-2933 nhanh hơn và các tùy chọn hiển thị mới. Giá khởi điểm dao động từ 30 triệu cho đến tận 53 triệu trở lên chưa VAT. Hệ thống chúng tôi sẽ kiểm tra hôm nay là cấu hình ít tốn kém nhất với CPU Core i5-10300H, RAM 8 GB, SSD NVMe 256 GB và màn hình 1200p. Yêu cầu đánh giá thứ hai về cấu hình Core i7 và GeForce cao cấp hơn vào một ngày trong tương lai để chúng tôi có thể so sánh chính xác hai SKU sẽ khác nhau như thế nào. Các đối thủ cạnh tranh trực tiếp với XPS 15 bao gồm các Ultrabook 15,6 inch khác như HP Spectre x360 15 , Asus ZenBook 15 , MSI Prestige 15 , Lenovo Yoga C940-15 , Microsoft Surface Laptop 3 15 và Apple MacBook Pro series. Đánh giá Dell XPS 15 9500 Vỏ Bên ngoài, Dell đã thực hiện một số thay đổi đối với khung XPS 15 với nhiều thay đổi tương tự như bước nhảy từ XPS 13 7390 sang XPS 13 9300 . Ví dụ, tấm kim loại dưới cùng, bây giờ tăng lên để che các cạnh và góc trong khi mô hình năm ngoái có sợi carbon đen thay thế. Dell cho biết điều này sẽ tạo ra một khung gầm mạnh mẽ hơn có khả năng chống va đập và bầm tím mà không đi quá xa so với thiết kế trực quan của thế hệ trước. Từ những gì chúng ta có thể nói, việc cố gắng vặn chân đế hoặc nắp không cho thấy sự uốn cong nhiều hay ít hơn so với trên XPS 15 7590</p>', 61000000, 45900000, 'mockup/images/chitietsanpham/Dell/DELL XPS 15 9500 Core I9/a1.jpg||mockup/images/chitietsanpham/Dell/DELL XPS 15 9500 Core I9/a2.jpg||mockup/images/chitietsanpham/Dell/DELL XPS 15 9500 Core I9/a3.jpg||mockup/images/chitietsanpham/Dell/DELL XPS 15 9500 Core I9/a4.jpg', 1, 1, 0),
(2, 'Dell Inspiron G3 3579 core i9', 1, '<p>Đánh giá Dell G3 3579 – Hiệu năng cao với thiết kế mỏng nhẹ Mới đây, Dell đã chính thức tung ra dòng sản phẩm laptop gaming G-Series mới tới người dùng, với các mẫu sản phẩm là G3 – G5 và G7. Đây là dòng sản phẩm mà Dell muốn nhắm đến người dùng với phân khúc giá phổ thông. Và G3 3579 là dòng laptop gaming rẻ nhất của Dell với mức giá chỉ từ 22.590.000đ với cấu hình là i5 8300H, 8Gb RAM và sử dụng card đồ họa rời GTX1050Ti 4Gb. Nhiều bạn đang thắc mắc rằng, liệu nó có thực sự đáng đồng tiền bát gạo để bạn bỏ ra mua hay không? Hay so với tầm giá này liệu nó thực sự tốt? Hãy cùng mình đi tìm hiểu kĩ hơn về chiếc máy này nhé</p>', 21000000, 19890000, 'mockup/images/chitietsanpham/Dell/Dell Inspiron G3 3579 core i9/a1.jpg||mockup/images/chitietsanpham/Dell/Dell Inspiron G3 3579 core i9/a2.jpg||mockup/images/chitietsanpham/Dell/Dell Inspiron G3 3579 core i9/a3.jpg||mockup/images/chitietsanpham/Dell/Dell Inspiron G3 3579 core i9/a4.jpg', 2, 1, 0),
(3, 'Dell Precision 5530', 1, 'Dell Precision 5530 Cỗ Máy Trạm Với Sức Mạnh Vượt Lớn Hơn Trí Tưởng Tượng Của Bạn\r\n    Dell đã kết hợp DNA của dòng XPS 15 với dòng máy trạm di động Precision của mình để tạo ra 5530, một cỗ máy mạnh mẽ nhẹ cân với sự hỗ trợ của Xeon sáu lõi, Nvidia Quadro và màn hình cảm ứng 4K sắc nét. Nói một cách ẩn dụ thì, nếu Dell XPS 15 là sinh viên năm nhất, thì Precision 5530 chính là phiên bản cử nhân.\r\nKích thước là điểm nổi bật cần phải nói đến tiếp theo cho sản phẩm này. Bởi vì hãng Dell đã tuyên bố đây là cỗ máy trạm nhỏ nhất họ từng sản xuất từ trước tới nay.', 31500000, 31500000, 'mockup/images/chitietsanpham/Dell/Dell Precision 5530/a1.jpg||mockup/images/chitietsanpham/Dell/Dell Precision 5530/a2.jpg||mockup/images/chitietsanpham/Dell/Dell Precision 5530/a3.jpg||mockup/images/chitietsanpham/Dell/Dell Precision 5530/a4.jpg', 3, 1, NULL),
(4, 'Dell XPS 13 7390', 1, 'Với định hướng sản phẩm dành cho doanh nhân với thiết kế mỏng nhẹ, sang trọng, Dell XPS 13 sẽ là đối thủ nặng ký với các dòng sản phẩm như Lenovo ThinkPad, Macbook Air hay HP Spectre.\r\nGiới thiệu vào cuối tháng 8, Dell XPS 13 7390 chính thức được bán ra tại thị trường Việt Nam với mức giá từ 36 triệu đồng. Với định hướng sản phẩm dành cho doanh nhân với thiết kế mỏng nhẹ, sang trọng, Dell XPS 13 sẽ là đối thủ nặng ký với các dòng sản phẩm như Lenovo ThinkPad, Macbook Air hay HP Spectre. Về ngoại hình, gần như phiên bản nâng cấp này không có sự thay đổi, vẫn sử dụng lớp khung nhôm CNC, kèm theo đó là chiếu nghỉ tay dùng chất liệu sợi carbon vốn quá quen thuộc trên dòng sản phẩm này.\r\nĐặc điểm của chiếc máy này không chỉ bắt mắt bởi lớp khung nhôm và carbon kia, mà bên cạnh đó còn là độ mỏng của thân máy chỉ ở mức 7,8mm (điểm dày nhất 11,6mm) cũng như trọng lượng chỉ từ 1,16 kg.\r\nMàn hình XPS 13 sử dụng tấm nền IPS với kích thước 13,3 inch và nhờ viền mỏng nên kích thước tổng thể của máy khá gọn gàng, tương đương với laptop 11-12 inch.\r\n', 30900000, 24500000, 'mockup/images/chitietsanpham/Dell/Dell XPS 13 7390/a1.jpg||mockup/images/chitietsanpham/Dell/Dell XPS 13 7390/a2.jpg||mockup/images/chitietsanpham/Dell/Dell XPS 13 7390/a3.jpg||mockup/images/chitietsanpham/Dell/Dell XPS 13 7390/a4.jpg', 4, NULL, 1),
(5, 'DELL XPS 13 9380', 1, 'Sau thành công vang dội của Dell XPS 9370 phiên bản năm 2018, Dell tiếp tục xây dựng thương hiệu đẳng cấp của mình khi tung ra thị trường phiên bản mới nhất năm 2019 có tên đầy đủ là Laptop Dell XPS 13 9380.\r\n1. Hoàn thiện hơn về vị trí camera và màu sắc\r\nTrong phiên bản XPS 9370 (năm 2018), Webcam được đặt ngay bên dưới logo Dell ở đáy màn hình, tuy tiết kiệm được khá nhiều diện tích nhưng rõ ràng khá bất tiện khi sử dụng. Nhận thấy được điểm hạn chế này, Laptop Dell XPS 13 9380  đã đưa webcam (camera) trở về vị trí đắc địa nhất. Đây được xem là một trong những cải tiến vượt bậc nhất của Dell trong phiên bản này khi  đưa webcam trở lại vị trí cạnh trên mà vẫn được được độ mỏng viền ấn tượng. Vậy nên, từ nay bạn sẽ không còn lo lắng việc webcam chĩa thẳng vào mũi bạn một cách kỳ quặc như trước nữa!\r\n\r\nNgoài ra nếu để ý các bạn sẽ có thể thấy  XPS 9380 có một webcam khá là khác so với XPS 9370 ở phía trên màn hình. Vẫn là 720p, nhưng Dell tuyên bố đây là chiếc máy ảnh nhỏ nhất và tốt nhất từ trước đến nay. Chiếc webcam này không còn được tích hợp camera IR Hello có sẵn trên 9370, điều đó có nghĩa là bạn sẽ chỉ sử dụng được cảm biến vân tay tích hợp trong nút nguồn để nhận dạng.\r\n\r\nNếu như ở các phiên bản trước Dell chỉ hạn chế mình trong những màu đen, bạc, trắng và vàng thì lần này Laptop Dell XPS 13 9380 bung mình hơn nữa khi khoác thêm những màu khá đặc biệt và mới lạ như  màu trắng (Frost white )- Băng giá. Đó là màu trắng nhẹ nhàng với kiểu hoàn thiện bề mặt khá giống với MacBook Pro, kết hợp với màu trắng tinh khiết bên trong giúp cho XPS 13 9380 có một ngoại hình cực kỳ nổi bật.', 22500000, 22500000, 'mockup/images/chitietsanpham/Dell/DELL XPS 13 9380/a1.jpg||mockup/images/chitietsanpham/Dell/DELL XPS 13 9380/a2.jpg||mockup/images/chitietsanpham/Dell/DELL XPS 13 9380/a3.jpg||mockup/images/chitietsanpham/Dell/DELL XPS 13 9380/a4.jpg', 5, NULL, NULL),
(6, 'Dell Latitude 7400', 1, '1. Hoàn thiện tốt\r\nDell Latitude 7400 đã chuyển sang kiểu thiết kế phổ thông hơn, khiến chiếc máy mỏng hơn trong khi vẫn đảm bảo được độ bền theo tiêu chuẩn MIL-STD 810G. Cấu hình máy cân bằng giữa hiệu năng và thời lượng sử dụng pin. Trang bị cổng Thunderbolt 3 sẽ mở ra nhiều khả năng hơn cho dòng máy này. Latitude 7400 mới dù có bản lề thiết kế khác nhưng vẫn cho góc mở này, rất đáng khen trong khi nhiều chiếc máy có bản lề ẩn chỉ cho góc mở tối đa khoảng 120 – 140 độ.\r\n2. Màn hình đẹp, bảo mật tuyệt đối\r\nDell Latitude 7400 mang tới chất lượng hiện thị FHD IPS cho phép người dùng có thể làm việc xem phim một cách thoải mái, điểm khiến cho Dell Latitude 7400 đặc biệt chính là màu sắc vô cùng sống động, màu sắc chân thực. Ngoài ra Dell Latitude 7400 còn trang bị cho mình vân tay giúp cho máy luôn bảo mật tuyệt đối.', 20490000, 20490000, 'mockup/images/chitietsanpham/Dell/Dell Latitude 7400/a1.jpg||mockup/images/chitietsanpham/Dell/Dell Latitude 7400/a2.jpg||mockup/images/chitietsanpham/Dell/Dell Latitude 7400/a3.jpg||mockup/images/chitietsanpham/Dell/Dell Latitude 7400/a4.jpg', 6, 1, NULL),
(7, 'Laptop Lenovo Gaming L340-15IRH 81LK01J3VN', 2, 'Laptop Lenovo IdeaPad L340-15IRH 81LK01GLVN\r\nThiết kế trang nhã cùng cấu hình và hiệu suất mạnh mẽ, bàn phím kích thước đầy đủ với đèn nền chạy xung quanh Lenovo IdeaPad  là mẫu laptop gaming lý tưởng trong mức giá tầm trung dành cho các game thủ.\r\nThiết kế\r\nLaptop được thiết kế khá gọn nhẹ giúp bạn dễ dàng đặt máy vào balo và thuận tiện cho việc di chuyển. Toàn bộ thân máy được làm từ chất liệu nhựa cao cấp, nhưng mang lại cảm giác sang trọng, chắc chắn. \r\nLogo Lenovo không đơn thuần in ở trung tâm nắp lưng nữa, thay vào đó là tông màu xanh được đặt ở cạnh phía tay phải lưng máy và ngay tại nơi chiếu nghỉ làm nổi bật nên sự tinh tế và đầy điệu nghệ. ', 17790000, 17790000, 'mockup/images/chitietsanpham/Lenovo/Laptop Lenovo Gaming L340-15IRH 81LK01J3VN/a1.jpg||mockup/images/chitietsanpham/Lenovo/Laptop Lenovo Gaming L340-15IRH 81LK01J3VN/a2.jpg||mockup/images/chitietsanpham/Lenovo/Laptop Lenovo Gaming L340-15IRH 81LK01J3VN/a3.jpg||mockup/images/chitietsanpham/Lenovo/Laptop Lenovo Gaming L340-15IRH 81LK01J3VN/a4.jpg', 7, 1, 1),
(8, 'Lenovo ThinkPad P50', 2, 'ThinkPad P50 là sản phẩm máy trạm mới nhất của Lenovo mang thương hiệu nổi tiếng ThinkPad. Kế tiếp cho dòng W Series có từ lâu. Lần này, dòng máy trạm được Lenovo gọi là dòng P. Với sự thay đổi đáng kế là xuất hiện CPU Xeon trên những chiếc laptop này. Cùng với đó là những thay đổi khác.\r\nThiết kế không có quá nhiều thay đổi so với thế hệ W540, W550 năm trước. Máy có thiết kế màu đen, vuông vắn. Mặt trên được phủ lớp sơn nhung đặc trưng dùng ThinkPad, lớp nhung này nhìn nghiêng vẫn có ánh kim tuyến như trước nhưng được làm mịn hơn. Đỡ bám vân tay và bụi bẩn hơn. Logo Lenovo được khắc chìm ở góc phía gần bản lề thay vì logo mạ crom ở mép.', 24500000, 24500000, 'mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad P50/a1.jpg||mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad P50/a2.jpg||mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad P50/a3.jpg||mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad P50/a4.jpg', 8, NULL, NULL),
(9, 'Lenovo ThinkPad X390', 2, 'Cùng bạn đi muôn phương, mang bạn đi xa hơn\r\nX390 là một người bạn đồng mỏng, nhẹ hành tuyệt vời với tuổi thọ pin dài. Dòng máy tính xách tay 13″ trước đó vốn được thiết kế với kích thước chỉ 12″ để dễ dàng mang theo vì trọng lượng chỉ 1.22kg (2.7lbs). Pin có thời lượng kéo dài đến 17.6 tiếng, có thể sạc đầy 80% chỉ trong vòng 60 phút, vì thế bạn chỉ cần cắm sạc trong lúc nghỉ giữa các chặng trong hành trình cộng với với tùy chọn WWAN LTE-A toàn cầu để bạn có thể kết nối mọi lúc mọi nơi.', 22800000, 20500000, 'mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad X390/a1.jpg||mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad X390/a2.jpg||mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad X390/a3.jpg||mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad X390/a4.jpg', 9, 1, 1),
(10, 'Lenovo ThinkPad T14', 2, 'Lenovo ThinkPad T14 14 inch (i5-10210U/ 8GB/ 256GB/ FHD)\r\nĐược thiết kế cho giới doanh nhân chuyên nghiệp năng động, Lenovo ThinkPad T14 14 inch mang đến hiệu suất và bảo mật bạn cần để luôn năng suất trong lúc di chuyển. Trang bị chip xử lý Intel Core thế hệ thứ 10 lõi tứ mới nhất, 8GB RAM DDR4 và dung lượng ổ cứng SSD M.2 NVMe PCIe 256GB, laptop này có thể tải nhanh chóng và xử lý đa tác vụ đa dạng ứng dụng. Laptop này còn sử dụng màn hình 14 inch 1366 x 768 HD TN cho hình ảnh trong rõ, bất kể bạn làm việc với văn bản, lướt internet hay xem video với loa tăng cường Dolby.', 22490000, 22490000, 'mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad T14/a1.jpg||mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad T14/a2.jpg||mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad T14/a3.jpg||mockup/images/chitietsanpham/Lenovo/Lenovo ThinkPad T14/a4.jpg', 10, NULL, 1),
(11, 'Macbook Air 2020 13 inch', 3, 'Đánh giá chi tiết Macbook Air 13 2020 1.1GHz Core i3/8GB/256GB\r\nMacBook Air 2020 siêu mỏng nhẹ giờ đây còn mạnh mẽ hơn bao giờ hết. Màn hình Retina tuyệt hảo, bàn phím Magic Keyboard mới cùng thời lượng pin cả ngày, Macbook Air 13 2020 256GB xứng đáng là chiếc laptop di động nhất hiện nay.\r\nMàn hình Retina ấn tượng với 4 triệu điểm ảnh\r\nVới độ phân giải siêu cao 2560 x 1600 pixels, tương đương hơn 4 triệu điểm ảnh trên màn hình kích thước 13,3 inch, bạn sẽ được tận hưởng những hình ảnh vô cùng sắc nét. Chất lượng hình ảnh được nâng lên một tầm cao mới trong khi văn bản hiển thị cực kỳ rõ ràng. Màn hình MacBook Air 2020 hỗ trợ công nghệ True Tone, tự động điều chỉnh màu để phù hợp với môi trường, giúp cho hình ảnh luôn luôn chân thực và tự nhiên. Hình ảnh tràn viền, màu sắc chính xác và độ nét đáng kinh ngạc, tất cả tạo nên một màn hình laptop ấn tượng bậc nhất hiện nay.', 22500000, 22500000, 'mockup/images/chitietsanpham/Macbook/Macbook Air 2020 13 inch/a1.jpg||mockup/images/chitietsanpham/Macbook/Macbook Air 2020 13 inch/a2.jpg||mockup/images/chitietsanpham/Macbook/Macbook Air 2020 13 inch/a3.jpg||mockup/images/chitietsanpham/Macbook/Macbook Air 2020 13 inch/a4.jpg', 11, 1, 1),
(12, 'MACBOOK PRO 13-INCH 2020', 3, 'Với sự trợ lực từ chip M1, MacBook Pro 13 inch có sức mạnh đứng đầu phân khúc laptop.\r\nMacBook Pro 13 inch mới với chip Silicon M1 là một dòng sản phẩm quan trọng, được so sánh với MacBook hiện có về mặt hiệu suất. Apple đang “chạy nước rút” để chuyển tất cả các máy Mac của mình từ bộ vi xử lý dựa trên Intel sang Apple Silicon.\r\nCùng so sánh MacBook Pro 13 inch phiên bản chip M1 và bản Intel có gì khác nhau.\r\nSo sánh về thiết kế\r\nMacBook Pro 13 inch là một thiết kế rất nổi tiếng của “Nhà Táo”. Được đặt trong vỏ nhôm và có logo Apple trên nắp, MacBook Pro không thể nhầm lẫn với các sản phẩm khác.', 37000000, 37000000, 'mockup/images/chitietsanpham/Macbook/MACBOOK PRO 13-INCH 2020/a1.jpg||mockup/images/chitietsanpham/Macbook/MACBOOK PRO 13-INCH 2020/a2.jpg||mockup/images/chitietsanpham/Macbook/MACBOOK PRO 13-INCH 2020/a3.jpg||mockup/images/chitietsanpham/Macbook/MACBOOK PRO 13-INCH 2020/a4.jpg', 12, NULL, NULL),
(13, 'Macbook 12-inch Retina 2017', 3, 'Apple cập nhật toàn bộ dòng MacBook của hãng lên hệ phần cứng sử dụng chip Kaby Lake của Intel. MacBook 12 (2017) cũng không là ngoại lệ khi được thiết kế bộ vi xử lý Intel Core m3, i5 và i7 thế hệ thứ 7 với công nghệ xử lý 14 nanomet. Điều này cho phép MacBook kết hợp hiệu quả năng lượng với hiệu suất cần thiết để thực hiện tất cả các loại nhiệm vụ.\r\nMàn hình Retina 12 inch tuyệt đẹp trên MacBook thực sự là điều cần quan tâm. Với hơn 3 triệu điểm ảnh và không viền màn hình, mỗi bức ảnh đều nhảy ra khỏi màn hình với chi tiết phong phú, rực rỡ. Tất cả trên một màn hình Retina mỏng đáng kinh ngạc.', 24480000, 24480000, 'mockup/images/chitietsanpham/Macbook/Macbook 12-inch Retina 2017/a1.jpg||mockup/images/chitietsanpham/Macbook/Macbook 12-inch Retina 2017/a2.jpg||mockup/images/chitietsanpham/Macbook/Macbook 12-inch Retina 2017/a3.jpg||mockup/images/chitietsanpham/Macbook/Macbook 12-inch Retina 2017/a4.jpg', 13, NULL, 1),
(14, 'Macbook Pro 16 inch 2019', 3, 'Apple cập nhật toàn bộ dòng MacBook của hãng lên hệ phần cứng sử dụng chip Kaby Lake của Intel. MacBook 12 (2017) cũng không là ngoại lệ khi được thiết kế bộ vi xử lý Intel Core m3, i5 và i7 thế hệ thứ 7 với công nghệ xử lý 14 nanomet. Điều này cho phép MacBook kết hợp hiệu quả năng lượng với hiệu suất cần thiết để thực hiện tất cả các loại nhiệm vụ.\r\nMàn hình Retina 12 inch tuyệt đẹp trên MacBook thực sự là điều cần quan tâm. Với hơn 3 triệu điểm ảnh và không viền màn hình, mỗi bức ảnh đều nhảy ra khỏi màn hình với chi tiết phong phú, rực rỡ. Tất cả trên một màn hình Retina mỏng đáng kinh ngạc.', 51000000, 51000000, 'mockup/images/chitietsanpham/Macbook/Macbook Pro 16 inch 2019/a1.jpg||mockup/images/chitietsanpham/Macbook/Macbook Pro 16 inch 2019/a2.jpg||mockup/images/chitietsanpham/Macbook/Macbook Pro 16 inch 2019/a3.jpg||mockup/images/chitietsanpham/Macbook/Macbook Pro 16 inch 2019/a4.jpg', 14, 1, NULL),
(15, 'HP ZBook 15 G5', 4, 'Với tông màu xám bạc toát lên vẻ sang trọng cùng với logo HP được thiết kế hoàn toàn mới để phân biệt phân khúc cao cấp mà HP đã hướng đến từ lâu cho dòng sản phẩm này. Nắp máy HP Zbook 15 G5 là nhôm nguyên khối sơn màu xám bạc, với vẻ ngoài vuông vắn và cắt vát xéo hai cạnh tại vị trí gần bản lề. Tại đỉnh nắp là phần viền ăng ten được ráp nối một cách rất tinh tế, tạo thêm điểm nhấn cho phần ngoại hình.\r\nBản lề trung tâm liền mạch, được sơn màu xám bạc như tổng thể máy, tạo cảm giác gập mở màn hình một cách chắc chắn, góc mở của bản lề lên đến 150 độ. Thân máy là nhôm nguyên khối kết hợp với các đường cắt vát kim bao xung quanh rất sang trọng, vị trí cổng kết nối được cắt CNC tinh xảo. Phủ bên trong là phần khung (body-frame) hợp kim Nhôm – Magie vô cùng chắc chắn.', 33500000, 31500000, 'mockup/images/chitietsanpham/Khac/HP ZBook 15 G5/a1.jpg||mockup/images/chitietsanpham/Khac/HP ZBook 15 G5/a2.jpg||mockup/images/chitietsanpham/Khac/HP ZBook 15 G5/a3.jpg||mockup/images/chitietsanpham/Khac/HP ZBook 15 G5/a4.jpg', 15, NULL, 1),
(16, 'Gaming Asus ROG Strix SCAR GL503', 4, 'Nhìn bề ngoài, Strix GL503 gây chú ý với một đường chéo vát trên lưng máy cùng logo ROG nổi bật ở một bên. Điểm nhấn là khi sử dụng, logo sẽ sáng rực lên màu đỏ.\r\nTổng thể của Strix GL503 làm hoàn toàn bằng nhựa, thế nhưng khi cầm cho cảm giác rất chắc chắn.\r\nNgay cả khay dưới bàn phím cũng thiết kế tương tự mặt lưng, một đường chéo ấn tượng.\r\nCó lẽ Asus đã chọn vật liệu này để làm giảm trọng lượng cho máy. Cụ thể thì Strix GL503 chỉ nặng khoảng 2.3 kg, rất là tiện cho những người hay di chuyển.\r\nCác cổng kết nối bên trái gồm có: cổng sạc, ethernet, thunderbolt, micro HDMI, 2 cổng USB 3.0 và còn lại là cổng tai nghe có kèm mic.', 23000000, 23000000, 'mockup/images/chitietsanpham/Khac/Gaming Asus ROG Strix SCAR GL503/a1.jpg||mockup/images/chitietsanpham/Khac/Gaming Asus ROG Strix SCAR GL503/a2.jpg||mockup/images/chitietsanpham/Khac/Gaming Asus ROG Strix SCAR GL503/a3.jpg||mockup/images/chitietsanpham/Khac/Gaming Asus ROG Strix SCAR GL503/a4.jpg', 16, 1, NULL),
(17, 'Laptop Acer Swift 5', 4, 'Laptop Acer Swift 5 SF514-55T-51NZ NX.HX9SV.002\r\nVỏ máy được làm từ hợp kim  giúp trọng lượng máy chỉ 1.04kg. Khung máy bằng kim loại nguyên khối với góc cạnh được gia công tỉ mỉ và chắc chắn, đem lại sự sang trọng tối đa cho người dùng. Swift 5 mới năm nay được nâng cấp bản lề mới, giúp nâng nhẹ máy lên khi mở màn hình, cho phép trải nghiệm gõ văn bản tiện dụng hơn, khả năng tản nhiệt tốt hơn và đáng chú ý nhất là làm màn hình của máy được nổi bật hơn.\r\nMáy được trang bị bên trong đó là vi xử lý  Intel® Core™ i5-1135G7 thế hệ 11 mới nhất và RAM 8GB Onboard LPDDR4X 2666Mhz có hiệu năng nhanh hơn trong khi mức tiêu thụ điện năng ít hơn, giúp kéo dài thời gian sử dụng của laptop. 512GB SSD cũng là linh kiện đặc điểm quan trọng, cho phép máy xử lý đa nhiệm mượt mà, vận hành mạnh mẽ và mở/tắt máy trong nháy mắt.', 25990000, 24990000, 'mockup/images/chitietsanpham/Khac/Laptop Acer Swift 5/a1.jpg||mockup/images/chitietsanpham/Khac/Laptop Acer Swift 5/a2.jpg||mockup/images/chitietsanpham/Khac/Laptop Acer Swift 5/a3.jpg||mockup/images/chitietsanpham/Khac/Laptop Acer Swift 5/a4.jpg', 17, NULL, 1),
(18, 'Asus Gaming ROG Zephyrus Duo GX550LWS-HF102T', 4, 'Laptop Asus ROG Zephyrus Duo 15 GX550LWS-HF102T\r\nLaptop gaming siêu mỏng được trang bị màn hình cảm ứng phụ 14.1”, giúp hỗ trợ đa nhiệm, chơi game, sáng tạo nội dung và hơn thế nữa\r\nTất cả những công nghệ đỉnh cao đó đều được gói gọn trong một thân máy hợp kim sang trọng, chỉ mỏng 20,9 mm và chỉ nặng 2,4 kg.\r\nThiết kế bản lề độc nhất vô nhị có thể nghiêng màn hình phụ lên trong cùng chuyển động khi nhấc nắp, dễ dàng mang lại cho bạn góc thoải mái hơn để tương tác và xem màn hình cảm ứng, đồng thời mở ra một khe hút gió lớn hơn để hoàn toàn cải thiện khả năng làm mát thông qua khung kim loại nhẹ.', 84990000, 71990000, 'mockup/images/chitietsanpham/Khac/Asus Gaming ROG Zephyrus Duo GX550LWS-HF102T/a1.jpg||mockup/images/chitietsanpham/Khac/Asus Gaming ROG Zephyrus Duo GX550LWS-HF102T/a2.jpg||mockup/images/chitietsanpham/Khac/Asus Gaming ROG Zephyrus Duo GX550LWS-HF102T/a3.jpg||mockup/images/chitietsanpham/Khac/Asus Gaming ROG Zephyrus Duo GX550LWS-HF102T/a4.jpg', 18, 1, 1),
(21, 'Laptop MSI Bravo 15 A4DCR 270VN', 27, '<p style=\"text-align:justify\"><span style=\"font-family:arial,helvetica,sans-serif; font-size:12pt\">TRANG BỊ CÔNG NGHỆ TỐI TÂN NHẤT</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:arial,helvetica,sans-serif; font-size:12pt\"><span style=\"color:rgb(255, 102, 0)\"><a href=\"https://www.anphatpc.com.vn/may-tinh-xach-tay-laptop_dm395.html\" style=\"box-sizing: border-box; color: rgb(255, 102, 0); text-decoration-line: none; background-color: transparent; transition: all 0.3s ease 0s; outline: none;\" target=\"_blank\">Laptop</a></span>&nbsp;sử dụng công nghệ 7nm hiện đại, trang bị tối đa tới vi xử lí&nbsp;AMD Ryzen 5 4600H&nbsp;và card đồ họa&nbsp;</span><span style=\"font-size:12pt\"><span style=\"font-family:arial,helvetica,sans-serif\">Radeon™ RX5300M 3GB</span><span style=\"font-family:arial,helvetica,sans-serif\">, đem tới cho chiếc laptop khi chơi game có hiệu năng ngang tầm máy desktop. Hãy tận hưởng trải nghiệm chơi game và giải trí đa phương tiện tuyệt hảo.&nbsp;</span>Sử dụng RAM 8G DDR4 3200&nbsp;cho&nbsp;tốc&nbsp;độ&nbsp;tải&nbsp;dữ&nbsp;liệu&nbsp;nhanh&nbsp;vượt&nbsp;trội.&nbsp;Hiệu&nbsp;năng&nbsp;được&nbsp;cải&nbsp;thiện&nbsp;khoảng&nbsp;10%&nbsp;so&nbsp;với&nbsp;DDR4-2400.</span></p>', 19690000, 18690000, 'mockup/images/chitietsanpham/Gaming/Laptop MSI Bravo 15 A4DCR 270VN/a1.jpg||mockup/images/chitietsanpham/Gaming/Laptop MSI Bravo 15 A4DCR 270VN/a2.jpg||mockup/images/chitietsanpham/Gaming/Laptop MSI Bravo 15 A4DCR 270VN/a3.jpg||mockup/images/chitietsanpham/Gaming/Laptop MSI Bravo 15 A4DCR 270VN/a4.jpg', 1, 1, 0),
(24, 'MSI GL65 Leopard 10SDK', 27, '<p><span style=\"font-family:arial,helvetica,sans-serif; font-size:10pt\">MSI Leopard GL65 sở hữu cấu hình ấn tượng với chip Intel&nbsp;Core i7&nbsp;thế hệ 10 dòng H 6 nhân 12 luồng, cho xung nhịp tối đa lên đến 5.0 GHz.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-family:arial,helvetica,sans-serif; font-size:10pt\">RAM 16 GB&nbsp;cho khả năng đa nhiệm mượt mà, sử dụng được nhiều ứng dụng cùng lúc, sử dụng Photoshop chuyên nghiệp hoặc dựng video, làm vlog trơn tru.</span></p>\r\n\r\n<p><span style=\"font-family:arial,helvetica,sans-serif; font-size:10pt\">Ổ cứng SSD&nbsp;512GB&nbsp;không chỉ đem đến tốc độ vận hành nhanh, mở máy, vào game chỉ trong vài giây mà còn cho bạn không gian lưu trữ lớn, đủ để lưu trữ hàng trăm tựa game.</span></p>', 33490000, 30090000, 'mockup/images/chitietsanpham/Gaming/MSI GL65 Leopard 10SDK/a1.jpg||mockup/images/chitietsanpham/Gaming/MSI GL65 Leopard 10SDK/a2.jpg||mockup/images/chitietsanpham/Gaming/MSI GL65 Leopard 10SDK/a3.jpg||mockup/images/chitietsanpham/Gaming/MSI GL65 Leopard 10SDK/a4.jpg', 1, 1, 0),
(25, 'MSI Modern 14 B10MW-214VN', 27, '<p><span style=\"font-size:10pt\">Thế hệ 10 được Intel chính thức giới thiệu cách đây không lâu với hai dòng CPU&nbsp;Ice Lake và Comet Lake. Trong khi Ice Lake tập trung cải thiện khả năng đồ họa với GPU Iris tích hợp thì Comet Lake lại tập trung cải thiện hiệu năng.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:10pt\">Con chip được trang bị trên chiếc MSI Modern 14 là i5-10210U / &nbsp;i7-10510U thuộc dòng comet Lake.&nbsp;</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"font-size:10pt\">&nbsp;MSI cũng trang bị cho sản phẩm ổ cứng SSD PCIe tốc độ cao với dung lượng 512GB. Ổ SSD mang lại ưu điểm vượt trội về tốc độ. Với một chiếc máy tính được trang bị SSD PCIe thì tốc độ khởi động chỉ tính bằng giây, tốc độ load ứng dụng, mở file cũng nhanh hơn rất nhiều.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"font-size:10pt\">Với phiên bản cấu hình này bạn có thể tự tin xử lý mượt những file Photoshop, AI hay blend màu trên Lightroom một cách mượt mà.&nbsp;</span></p>', 21490000, 20790000, 'mockup/images/chitietsanpham/Gaming/MSI Modern 14 B10MW-214VN/a1.jpg||mockup/images/chitietsanpham/Gaming/MSI Modern 14 B10MW-214VN/a2.jpg||mockup/images/chitietsanpham/Gaming/MSI Modern 14 B10MW-214VN/a3.jpg||mockup/images/chitietsanpham/Gaming/MSI Modern 14 B10MW-214VN/a4.jpg', 1, 1, 1),
(26, 'ASUS ROG Strix G G531GT', 27, '<p style=\"text-align:center\"><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:14pt\"><strong>ASUS&nbsp;ROG STRIX&nbsp;G G531/G731</strong></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"color:rgb(0, 0, 0)\">&nbsp;<img alt=\"\" src=\"https://laptopworld.vn/media/lib/4421_ROGStrixG-13.JPG\" style=\"border-style:none; box-sizing:border-box; height:auto; max-width:100%; vertical-align:middle\" /></span></p>\r\n\r\n<p style=\"text-align:left\"><strong><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:10pt\">1. THIẾT KẾ - TRIẾT LÝ THIẾT KẾ MỚI – HÌNH THỨC PHỤC VỤ CHỨC NĂNG</span></strong></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"color:rgb(0, 0, 0)\"><img alt=\"\" src=\"https://laptopworld.vn/media/lib/4421_ROGStrixG-02.JPG\" style=\"border-style:none; box-sizing:border-box; height:auto; max-width:100%; vertical-align:middle\" /></span></p>\r\n\r\n<p style=\"text-align:left\"><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:10pt\">Được truyền cảm hứng bởi Nhóm BMW Designworks, Strix G hòa hợp giữa hình thức và chức năng với Vùng lưu thông khí 3D để tạo nên một hệ thống làm mát hiện đại nhất mà bạn từng thấy. Đường cắt chéo nắp lưng tương phản trên mặt hoàn thiện bằng nhôm phay xước, ô khoét bất đối xứng nổi bật đảm bảo luồng khí lưu thông không giới hạn quanh mặt lưng, tại đó bản lề kiểu cửa cắt kéo tạo thêm không gian thông khí. Hình khối chạm khắc và các bề mặt giấu khéo léo cộng hưởng với phong cách trầm tĩnh mà bạn có thể tạo điểm nhấn bằng dải đèn tùy chọn tỏa ánh sáng RGB quanh các cạnh máy.</span></p>', 24990000, 22590000, 'mockup/images/chitietsanpham/Gaming/ASUS ROG Strix G G531GT/a1.jpg||mockup/images/chitietsanpham/Gaming/ASUS ROG Strix G G531GT/a2.jpg||mockup/images/chitietsanpham/Gaming/ASUS ROG Strix G G531GT/a3.jpg||mockup/images/chitietsanpham/Gaming/ASUS ROG Strix G G531GT/a4.jpg', 1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dtb_slide`
--

CREATE TABLE `dtb_slide` (
  `id` int(6) NOT NULL,
  `name_slide` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dtb_slide`
--

INSERT INTO `dtb_slide` (`id`, `name_slide`, `image`, `position`) VALUES
(1, 'carousel_1', 'mockup/images/silde/anh1.png', 'carousel_active'),
(2, 'carousel_2', 'mockup/images/silde/anh2.png', 'carousel'),
(3, 'carousel_3', 'mockup/images/silde/anh3.jpg', 'carousel'),
(4, 'banner_1', 'mockup/images/home/hinh1.png', 'banner_index'),
(5, 'banner_2', 'mockup/images/home/hinh2.jpg', 'banner_index'),
(6, 'banner_3', 'mockup/images/home/hinh3.jpg', 'banner_index'),
(7, 'separate_line1-left', 'mockup/images/home/giamtoiben.jfif', 'separate_line1'),
(8, 'separate_line1-right', 'mockup/images/home/hinhbu.png', 'separate_line1'),
(9, 'separate_line2', 'mockup/images/home/hinhbu.jfif', 'separate_line2'),
(10, 'image_foot1', 'mockup/images/home/cuoi1.jpg', 'image_foot'),
(11, 'image_foot2', 'mockup/images/home/cuoi2.jpg', 'image_foot'),
(12, 'image_foot3', 'mockup/images/home/cuoi3.png', 'image_foot');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dtb_typeproduct`
--

CREATE TABLE `dtb_typeproduct` (
  `id` int(6) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dtb_typeproduct`
--

INSERT INTO `dtb_typeproduct` (`id`, `name`, `description`) VALUES
(1, 'Dell', '<p>Dell Inc. là một công ty đa quốc gia của Hoa Kỳ về phát triển và thương mại hóa công nghệ máy tính có trụ sở tại Round Rock, Texas, Hoa Kỳ. Dell được thành lập năm 1984 do chủ quản gia Michael Dell đồng sáng lập. Đây là công ty có thu nhập lớn thứ 28 tại Hoa Kỳ.</p>'),
(2, 'Lenovo', '<p>Lenovo Group Ltd. /lɛnˈoʊvoʊ/ là tập đoàn đa quốc gia về công nghệ máy tính có trụ sở chính ở Bắc Kinh, Trung Quốc và Morrisville, Bắc Carolina, Mỹ.[3] Tập đoàn thiết kế, phát triển, sản xuất và bán các sản phẩm như máy tính cá nhân, máy tính bảng, smartphone, các trạm máy tính, server, thiết bị lưu trữ điện tử, phần mềm quản trị IT và ti vi thông minh.</p>'),
(3, 'Macbook', '<p>MacBook là dòng máy tính xách tay Macintosh được Apple Inc. thiết kế, sản xuất và bán từ tháng 5 năm 2006 đến tháng 2 năm 2012. Một dòng máy tính mới cùng tên đã được phát hành vào năm 2015, phục vụ cho mục đích tương tự như một máy tính xách tay. Nó đã thay thế dòng máy tính xách tay iBook và dòng PowerBook 12 inch như một phần trong quá trình chuyển đổi của Apple từ PowerPC sang bộ xử lý Intel. Được định vị là cấp thấp của gia đình MacBook, dưới MacBook Air và MacBook Pro,[1] MacBook nhắm đến thị trường tiêu dùng và giáo dục.[2] Đó là chiếc Macintosh bán chạy nhất từ trước đến nay. Trong năm tháng năm 2008, nó là máy tính xách tay bán chạy nhất của bất kỳ thương hiệu nào trong các cửa hàng bán lẻ ở Mỹ.[3] Nói chung, thương hiệu MacBook là \"dòng máy tính xách tay cao cấp bán chạy nhất thế giới\"</p>'),
(4, 'Khac', '<p>Laptop của các hãng khác như Acer,Asus,HP,...</p>'),
(27, 'Gaming', '<p>Laptop gaming vipro</p>');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dtb_billdetail`
--
ALTER TABLE `dtb_billdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `dtb_bills`
--
ALTER TABLE `dtb_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `dtb_config`
--
ALTER TABLE `dtb_config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dtb_customer`
--
ALTER TABLE `dtb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dtb_employee`
--
ALTER TABLE `dtb_employee`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dtb_notify`
--
ALTER TABLE `dtb_notify`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dtb_product`
--
ALTER TABLE `dtb_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_configuration` (`id_configuration`);

--
-- Chỉ mục cho bảng `dtb_slide`
--
ALTER TABLE `dtb_slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dtb_typeproduct`
--
ALTER TABLE `dtb_typeproduct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dtb_billdetail`
--
ALTER TABLE `dtb_billdetail`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `dtb_bills`
--
ALTER TABLE `dtb_bills`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `dtb_config`
--
ALTER TABLE `dtb_config`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `dtb_customer`
--
ALTER TABLE `dtb_customer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `dtb_employee`
--
ALTER TABLE `dtb_employee`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dtb_notify`
--
ALTER TABLE `dtb_notify`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dtb_product`
--
ALTER TABLE `dtb_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `dtb_slide`
--
ALTER TABLE `dtb_slide`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `dtb_typeproduct`
--
ALTER TABLE `dtb_typeproduct`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dtb_billdetail`
--
ALTER TABLE `dtb_billdetail`
  ADD CONSTRAINT `dtb_billdetail_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `dtb_bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dtb_billdetail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `dtb_product` (`id`);

--
-- Các ràng buộc cho bảng `dtb_bills`
--
ALTER TABLE `dtb_bills`
  ADD CONSTRAINT `dtb_bills_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `dtb_customer` (`id`);

--
-- Các ràng buộc cho bảng `dtb_product`
--
ALTER TABLE `dtb_product`
  ADD CONSTRAINT `dtb_product_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `dtb_typeproduct` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dtb_product_ibfk_2` FOREIGN KEY (`id_configuration`) REFERENCES `dtb_config` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
