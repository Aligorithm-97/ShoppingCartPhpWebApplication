-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Ara 2021, 15:17:33
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ise_project`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(2, 'Ali', 'Temurtas', 'ali@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Mobile'),
(2, 'Computer'),
(3, 'Tv');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `info_users`
--

CREATE TABLE `info_users` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `info_users`
--

INSERT INTO `info_users` (`id`, `uid`, `firstname`, `lastname`, `company`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `mobile`) VALUES
(4, 12, 'qdw', 'qdw', 'dqw', 'dqw', 'dqw', 'qdw', 'qdw', 'CH', '8', '5'),
(5, 19, 'qwe', 'asdf', 'asdf', 'asdfasf', 'dasfd', 'fdsa', 'fdsa', 'GR', '789', '555'),
(7, 22, 're', 'er', 're', 'er', 're', 'er', 're', 'UK', '4566', '8888'),
(8, 23, 'sdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'GR', '99', '22'),
(9, 21, 'ali', 'temurtas', 'dsf', 'adsf', 'asdf', 'fasd', 'fds', 'AU', '555', '11'),
(10, 26, 'asdf', 'asdf', 'asfd', 'asdfasffds', 'asdf', 'fads', 'fdsa', 'AT', '78', '98');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `numberoforder`
--

CREATE TABLE `numberoforder` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pquantity` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `numberoforder`
--

INSERT INTO `numberoforder` (`id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(13, 22, '1', 8, '14999'),
(14, 22, '1', 9, '14999'),
(15, 25, '1', 10, '18999'),
(16, 23, '1', 11, '3102'),
(17, 23, '1', 12, '3102'),
(18, 28, '1', 13, '5249'),
(19, 22, '1', 14, '14999'),
(20, 23, '1', 15, '3102'),
(21, 22, '1', 15, '14999'),
(22, 27, '1', 15, '17299'),
(23, 22, '1', 16, '14999'),
(24, 23, '1', 17, '3102'),
(25, 26, '1', 18, '18999'),
(26, 27, '1', 19, '17299'),
(27, 30, '1', 20, '5600'),
(28, 23, '1', 21, '3102'),
(29, 27, '1', 22, '17299'),
(30, 29, '1', 23, '15000'),
(31, 25, '1', 24, '18999'),
(32, 28, '1', 25, '5249');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `store_orders`
--

CREATE TABLE `store_orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `store_orders`
--

INSERT INTO `store_orders` (`id`, `uid`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(7, 12, '14999', 'Order Placed', 'cod', '2021-12-27 14:51:48'),
(8, 19, '14999', 'Order Placed', 'ccod', '2021-12-27 15:18:25'),
(10, 22, '18999', 'Order Placed', 'ccod', '2021-12-27 15:37:02'),
(13, 21, '5249', 'Order Placed', 'cod', '2021-12-27 21:20:08'),
(15, 21, '35400', 'Order Placed', 'cod', '2021-12-28 14:07:20'),
(16, 23, '14999', 'Order Placed', 'cod', '2021-12-28 15:39:42'),
(17, 21, '3102', 'Order Placed', 'ccod', '2021-12-28 19:09:46'),
(18, 21, '18999', 'Order Placed', 'ccod', '2021-12-28 20:17:59'),
(19, 21, '17299', 'Order Placed', 'cod', '2021-12-28 20:58:11'),
(20, 21, '5600', 'Order Placed', 'ccod', '2021-12-28 21:07:38'),
(21, 21, '3102', 'Order Placed', 'ccod', '2021-12-29 08:42:21'),
(22, 21, '17299', 'Order Placed', 'cod', '2021-12-29 08:59:11'),
(23, 21, '15000', 'Order Placed', 'cod', '2021-12-29 13:29:13'),
(24, 21, '18999', 'Order Placed', 'cod', '2021-12-29 16:58:33'),
(25, 26, '5249', 'Order Placed', 'ccod', '2021-12-29 17:03:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `store_products`
--

CREATE TABLE `store_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `store_products`
--

INSERT INTO `store_products` (`id`, `name`, `catid`, `price`, `thumb`, `description`) VALUES
(22, 'Iphone', 1, '14999', 'images/iphone.jpg', 'Iphone13 pro max'),
(23, 'Xiaomi', 1, '3102', 'images/xa.jpg', 'Xiaomi 9t'),
(24, 'Samsung', 1, '13999', 'images/samsung.jpg', 'Samsung z flip 3'),
(25, 'Apple', 2, '18999', 'images/macbook.jpg', 'Macbook pro'),
(26, 'Hp', 2, '18999', 'images/hp.jpg', 'HP Pavilion Gaming 15-DK1000NT'),
(27, 'Asus', 2, '17299', 'images/asus.jpg', 'Asus rog strix g'),
(28, 'Samsung Tv', 3, '5249', 'images/samsungtv.jpg', 'tv'),
(29, 'Xiaomitv', 3, '15000', 'images/Xiaomitv.jpg', 'tv'),
(30, 'Vestel', 3, '5600', 'images/vestel.jpg', 'tv');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `store_users`
--

CREATE TABLE `store_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `store_users`
--

INSERT INTO `store_users` (`id`, `email`, `password`, `timestamp`) VALUES
(7, 'alit@gmail.com', '$2y$10$xUK0kR5LxpNuUtW2eZtJDOsbzZPZVDHpa0lvEFqY4eiT.fuItL.7q', '2021-12-26 13:20:06'),
(8, 'x@gmail.com', '$2y$10$kmQBEMOTk8.IUr3H25DSguzpYUI.4LL84wCHCy/0C6sSbvZBZCO1W', '2021-12-26 17:07:01'),
(9, 'dene@gmail.com', '$2y$10$S1mnCzvZMitIc0wo4vZ1IexLiAPzF03yVs8Nuefq.gZiJVHZ2kjN6', '2021-12-26 17:08:35'),
(10, 'y@gmail.com', '$2y$10$IwHSTTg8DyYVpTC5Yr8bxOSEiDqrkE7IeaBXMwc.rRTFqlv5lWomK', '2021-12-27 09:30:28'),
(12, 't@gmail.com', '$2y$10$Bi54uZzzCxsul5EuJQM4z.74V9jx1D2NncbGKwQPm2excPl0isKaO', '2021-12-27 14:00:18'),
(19, 'g@gmail.com', '$2y$10$6cazXdPDu7Ni9dRakNjKpOOBGQUnA9oZokJzZqcs0OEU52WevxHVm', '2021-12-27 15:15:44'),
(20, 'r@gmail.com', '$2y$10$CSw8xUiu35vKbAfxCueGyOmHjpOUNCCKAgFYCWyFiQiHYBn5maquy', '2021-12-27 15:18:50'),
(21, 'alii@gmail.com', '$2y$10$BGZvoX2z9EN3pecHu3fqO.QFgWxBR6O1kWPoCapAw3xnjSUa3s7.q', '2021-12-27 15:30:08'),
(22, 'deneme@gmail.com', '$2y$10$BcMHskHZrJ9gqJDo/t/gm.KXk22GR5v/aUXP.WeNC8SDdpNJW6DU6', '2021-12-27 15:36:44'),
(23, 'ok@gmial.com', '$2y$10$vSooSiK6jpickJW.J.XbpezR.SG5RAW65W1.uZsT7ORNsBkV4zERG', '2021-12-28 15:39:20'),
(24, 'f@gmail.com', '$2y$10$Glcsfd6lB6uO.U1B.f7boO8Rn//Zif8IxOtajBTun/Dv55oz8qnTq', '2021-12-29 09:16:32'),
(25, 'den@gmail.com', '$2y$10$4ELFUjqJMgRo8jZaDrW8vekqlO4Es3LXDw8yNeaBz72.8r3QG/P2G', '2021-12-29 16:05:11'),
(26, 'yeni@gmail.com', '$2y$10$npENYIoidG/ls2I3z92f3OEkOH6qlMO9THUhSBpkIIlgd/GYDwPl2', '2021-12-29 17:03:29'),
(27, 'tr@gmail.com', '$2y$10$r7n5Kc7DKI0e836G/OstZ.ITcgXH7iqrYkOkIpxy0Vn3n6yfCe8BG', '2021-12-29 17:07:04');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `info_users`
--
ALTER TABLE `info_users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `numberoforder`
--
ALTER TABLE `numberoforder`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `store_orders`
--
ALTER TABLE `store_orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `store_products`
--
ALTER TABLE `store_products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `store_users`
--
ALTER TABLE `store_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `info_users`
--
ALTER TABLE `info_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `numberoforder`
--
ALTER TABLE `numberoforder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `store_orders`
--
ALTER TABLE `store_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tablo için AUTO_INCREMENT değeri `store_users`
--
ALTER TABLE `store_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
