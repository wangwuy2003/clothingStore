-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2023 at 11:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 0),
(2, 'Super Admin', 'sadmin@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `token`) VALUES
(1, 'Nguyễn Quang Huy', 'huyncf2003@gmail.com', '123', '0967708250', 'thôn huỳnh cung, xã tam hiệp, huyện thanh trì, hà nội', 'user_6507464d0b73b9.68729274'),
(2, '', '', '', '', '', NULL),
(3, 'Minh Nguyet', 'nhookzam1@gmail.com', '123', '0967708250', 'thôn huỳnh cung, xã tam hiệp, huyện thanh trì, hà nội', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone` char(50) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `address`, `phone`, `photo`) VALUES
(1, 'Á Đông', '123 tựu liệt', '0967708250', 'https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg'),
(2, 'Hoa Phượng', 'Cửu Long 1, Hà Nội', '0967708250', 'https://marketplace.canva.com/EAE85VgPq3E/1/0/1600w/canva-v%E1%BA%BD-tay-h%C3%ACnh-tr%C3%B2n-logo-c3Jw1yOiXJw.jpg'),
(9, 'Chim Ưng', 'Sóc Sơn, Hà Nội', '0958395718', 'https://www.adobe.com/content/dam/cc/us/en/creativecloud/design/discover/mascot-logo-design/mascot-logo-design_fb-img_1200x800.jpg'),
(10, 'Phương Đông', 'Hà Đông, Hà Nội ', '0967708250', 'https://thietkelogo.vn/wp-content/uploads/2016/02/logo-dep.png'),
(17, 'Áo dài Hoa Sữa', 'thôn huỳnh cung, xã tam hiệp, huyện thanh trì, hà nội', '0967708250', 'https://pos.nvncdn.net/af3c03-152482/ps/20230818_8fbyIhAq3y.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `name_receiver` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_receiver` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address_receiver` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `status`, `created_at`, `total_price`) VALUES
(1, 1, 'Nguyễn Quang Huy', '0967708250', 'thôn huỳnh cung, xã tam hiệp, huyện thanh trì, hà nội', '1', '2023-09-07 02:47:51', 520000),
(2, 1, 'Nguyễn Quang Huy', '0967708250', 'thôn huỳnh cung, xã tam hiệp, huyện thanh trì, hà nội', '2', '2023-09-12 07:09:47', 310000),
(3, 1, 'Nguyễn Quang Huy', '0967708250', 'thôn huỳnh cung, xã tam hiệp, huyện thanh trì, hà nội', '1', '2023-09-13 05:22:14', 110000),
(4, 1, 'Nguyễn Quang Huy', '0967708250', 'thôn huỳnh cung, xã tam hiệp, huyện thanh trì, hà nội', '2', '2023-09-14 16:59:36', 370000),
(5, 1, 'Nguyễn Quang ', '0967708250', 'thôn huỳnh cung, xã tam hiệp, huyện thanh trì, hà nội', '1', '2023-09-14 17:02:30', 110000);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`) VALUES
(1, 5, 1),
(1, 6, 1),
(1, 8, 1),
(2, 1, 1),
(2, 9, 1),
(3, 1, 1),
(4, 1, 2),
(4, 5, 1),
(5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `manufacturer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `photo`, `price`, `description`, `manufacturer_id`) VALUES
(1, 'Quần Jogger Nam Túi Hộp Phối Dây Rút Trơn ', 'photos/1693459756.jpg', 100000, 'Quần jeans thể thao, khỏe khoắn, năng động', 1),
(5, 'Quần Kaki Nam Ống Rộng Lưng Thun Cotton', 'photos/1693474643.jpg', 150000, 'Quần Kaki Nam Ống Rộng Lưng Thun Cotton siêu mát siêu đàn hồi, siêu co dãn', 1),
(6, 'Áo Sơ Mi Nam Tay Dài Cổ V Túi Đắp Trơn Form Boxy', 'photos/1693474745.jpg', 200000, 'Áo Sơ Mi Nam Tay Dài Cổ V Túi Đắp Trơn Form Boxy siêu mát, không nóng, dễ chịu', 2),
(7, 'Áo Thun Nam Tay Ngắn Cổ Tròn Họa Tiết In Form Regular ', 'photos/1693475018.jpg', 150000, 'Áo Thun Nam Tay Ngắn Cổ Tròn Họa Tiết In Form Regular siêu xinh mặc lên 100đ', 2),
(8, 'Áo Thun Nam Tay Ngắn Cổ Tròn Nhãn Trang Trí Form Regular', 'photos/1693475055.jpg', 170000, 'Áo Thun Nam Tay Ngắn Cổ Tròn Nhãn Trang Trí Form Regular siêu xinh, siêu bền, siêu co dãn', 2),
(9, 'Áo Thun Tanktop Nam 3 Lỗ Họa Tiết In Form Regular ', 'photos/1693502384.jpg', 200000, 'Áo Thun Tanktop Nam 3 Lỗ Họa Tiết In Form Regular siêu bên siêu mát', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
