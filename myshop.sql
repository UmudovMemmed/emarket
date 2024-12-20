-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Kas 2024, 16:09:15
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `myshop`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `slug`) VALUES
(2, 0, 'planshetler'),
(3, 0, 'notbuklar'),
(4, 3, 'mac'),
(5, 3, 'windows'),
(6, 0, 'telefonlar'),
(7, 0, 'kameralar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_description`
--

CREATE TABLE `category_description` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `category_description`
--

INSERT INTO `category_description` (`category_id`, `lang_id`, `title`, `excerpt`, `description`, `keywords`) VALUES
(2, 1, 'Planşetlər', 'Burada Planşetlər haqqinda olacaq', 'Planşetlər', 'plansetler'),
(2, 2, 'Tablets', 'Here it will be about Tablets', 'Tablets', 'tablets'),
(3, 1, 'Notbuklar', 'Burada Notbuklar haqqinda olacaq', 'Notbuklar', 'notbuklar'),
(3, 2, 'Notebooks', 'Here it will be about Notebooks', 'Notebooks', 'notebooks'),
(4, 1, 'Mac', 'Burada Mac haqqinda olacaq', 'Mac', 'mac'),
(4, 2, 'Mac', 'Here it will be about Mac', 'Mac', 'mac'),
(5, 1, 'Windows', 'Burada Windows haqqinda olacaq', 'Windows', 'windows'),
(5, 2, 'Windows', 'Here it will be about Windows', 'Windows', 'windows'),
(6, 1, 'Telefonlar', 'Burada Telefonlar haqqinda olacaq', 'Telefonlar', 'telefonlar'),
(6, 2, 'Mobiles', 'Here it will be about Mobiles', 'Mobiles', 'mobiles'),
(7, 1, 'Kameralar', 'Burada Kameralar haqqinda olacaq', 'Kameralar', 'kameralar'),
(7, 2, 'Cameras', 'Here it will be about Cameras', 'Cameras', 'cameras');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `downloads`
--

CREATE TABLE `downloads` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `downloads`
--

INSERT INTO `downloads` (`id`, `product_id`, `filename`, `original_name`) VALUES
(1, 6, 'price.rar.RNv58WWAW1mF6Jy3gTPiq4gHA00tQQ2B', 'price.rar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `download_description`
--

CREATE TABLE `download_description` (
  `lang_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `download_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `download_description`
--

INSERT INTO `download_description` (`lang_id`, `name`, `download_id`) VALUES
(1, 'Fayl 1', 1),
(2, 'File 1', 1),
(1, 'Fayl 2', 2),
(2, 'File 2', 2),
(1, 'Ders 15', 3),
(2, 'Lesson 15', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(4) NOT NULL,
  `title` varchar(20) NOT NULL,
  `base` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `languages`
--

INSERT INTO `languages` (`id`, `code`, `title`, `base`) VALUES
(1, 'az', 'Azərbaycan', 1),
(2, 'en', 'English', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` double NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `note`, `created_at`, `updated_at`, `total`, `qty`) VALUES
(8, 2, 0, 'wedewf', '2024-09-10 10:12:22', '2024-09-10 10:12:22', 230.99, 1),
(9, 2, 0, 'egfr', '2024-09-10 10:13:16', '2024-09-10 10:13:16', 230.99, 1),
(10, 2, 0, 'wedewf', '2024-09-10 10:14:28', '2024-09-10 10:14:28', 230.99, 1),
(11, 2, 0, 'GRG', '2024-09-10 10:18:29', '2024-09-10 10:18:29', 230.99, 1),
(12, 2, 0, 'saam', '2024-09-11 10:16:48', '2024-09-11 10:16:48', 461.98, 2),
(13, 2, 0, 'werwet', '2024-09-11 10:19:32', '2024-09-11 10:19:32', 461.98, 2),
(14, 2, 0, 'dwef', '2024-09-11 10:22:45', '2024-09-11 10:22:45', 250.99, 1),
(15, 2, 0, 'fsgdgr', '2024-09-11 10:23:58', '2024-09-11 10:23:58', 250.99, 1),
(16, 2, 0, 'trtu', '2024-09-11 10:26:12', '2024-09-11 10:26:12', 230.99, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_downloads`
--

CREATE TABLE `order_downloads` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `download_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `order_downloads`
--

INSERT INTO `order_downloads` (`id`, `order_id`, `user_id`, `product_id`, `download_id`, `status`) VALUES
(1, 7, 2, 6, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `sum` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `title`, `slug`, `qty`, `price`, `sum`) VALUES
(8, 1, 'iPhone', 'iphone', 1, 230.99, 230.99),
(9, 1, 'iPhone', 'iphone', 1, 230.99, 230.99),
(10, 1, 'iPhone', 'iphone', 1, 230.99, 230.99),
(11, 1, 'iPhone', 'iphone', 1, 230.99, 230.99),
(12, 5, 'iMac', 'imac', 2, 230.99, 461.98),
(13, 4, 'Apple cinema 30', 'apple-cinema-30', 2, 230.99, 461.98),
(14, 3, 'HP', 'hp', 1, 250.99, 250.99),
(15, 3, 'HP', 'hp', 1, 250.99, 250.99),
(16, 1, 'iPhone', 'iphone', 1, 230.99, 230.99);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `slug`) VALUES
(3, 'bizimle-elaqe'),
(1, 'haqqimizda'),
(2, 'odenis-ve-catdirilma'),
(4, 'test-sehife');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages_description`
--

CREATE TABLE `pages_description` (
  `page_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `pages_description`
--

INSERT INTO `pages_description` (`page_id`, `lang_id`, `title`, `content`, `keywords`, `description`) VALUES
(1, 1, 'Haqımızda', 'burada Haqqımızda səhifə olacaq', 'haqqımızda', 'Haqımızda'),
(1, 2, 'About as', 'this about as page', 'about', 'About us'),
(2, 1, 'Odeniş ve çatdırılma', 'burada Odeniş ve çatdırılma səhifə olacaq', 'odenis ve catdirilma', 'Odeniş ve çatdırılma'),
(2, 2, 'Payment and delivery', 'this is Payment and delivery page', 'payment and delivery', 'Payment and delivery'),
(3, 1, 'Bizimlə əlaqə', 'burada Bizimlə əlaqə səhifə olacaq', 'bizimle elaqe', 'Bizimlə əlaqə'),
(3, 2, 'Contact us', 'this is Contact us page', 'contact us', 'Contact us'),
(4, 1, 'Test səhifə', 'burada Test səhifə olacaq', 'test sehfie', 'Test səhifə'),
(4, 2, 'Test page', 'this is Test page', 'test page', 'Test page');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `qty` double NOT NULL DEFAULT 1,
  `price` double NOT NULL DEFAULT 0,
  `old_price` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `hit` tinyint(4) NOT NULL DEFAULT 0,
  `img` varchar(255) NOT NULL DEFAULT '/public/uploads/no_image.jpg',
  `is_download` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `category_id`, `slug`, `qty`, `price`, `old_price`, `status`, `hit`, `img`, `is_download`) VALUES
(1, 2, 'iphone', 1, 250, 50, 1, 1, '/public/uploads/files/images.jpg', 0),
(2, 0, 'canon-eos-5d', 1, 300, 150, 1, 1, '/public/uploads/files/__thumbs/Nikon.jpg/Nikon__427x320.jpg', 0),
(3, 0, 'hp', 1, 500, 80, 1, 1, '/public/uploads/files/__thumbs/s-22e294c175e4d5d1be6a2e7114ecd7731be98e6e.jpg/s-22e294c175e4d5d1be6a2e7114ecd7731be98e6e__480x270.jpg', 0),
(4, 0, 'apple-cinema-30', 1, 230.99, 140, 1, 1, '/public/uploads/files/__thumbs/Nikon.jpg/Nikon__427x320.jpg', 0),
(5, 4, 'imac', 1, 230.99, 96, 1, 1, '/public/uploads/no_image.jpg', 0),
(6, 5, 'reqemsal-mehsul', 1, 230.99, 54, 1, 1, '/public/uploads/no_image.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_description`
--

CREATE TABLE `product_description` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `excerpt` text NOT NULL,
  `content` text NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `product_description`
--

INSERT INTO `product_description` (`product_id`, `lang_id`, `title`, `excerpt`, `content`, `description`, `keywords`) VALUES
(1, 1, 'iPhone', 'iPhone haqqinda olacaq', 'iPhone haqqinda olacaq', 'iPhone', 'iphone'),
(1, 2, 'iPhone', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'iPhone', 'iphone'),
(2, 1, 'Canon EOS 5D', 'Canon EOS 5D haqqinda olacaq', 'Canon EOS 5D haqqinda olacaq', 'Canon EOS 5D', 'canon'),
(2, 2, 'Canon EOS 5D', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!', 'Canon EOS 5D', 'canon'),
(3, 1, 'HP', 'Burada Hp haqqinda olacaq', 'Burada Hp haqqinda olacaq', 'Hp', 'hp'),
(3, 2, 'HP', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!', 'HP', 'hp'),
(4, 1, 'Apple Cinema 30', 'Apple Cinema 30', '', '', ''),
(4, 2, 'Apple Cinema 30', 'Apple Cinema 30', '', '', ''),
(5, 1, 'iMac', 'Burada iMac haqqinda olacaq', 'Burada iMac haqqinda olacaq', 'iMac', 'imac'),
(5, 2, 'iMac', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!', 'iMac', 'imac'),
(6, 1, 'Rəqəmsal məhsul', 'Burada Rəqəmsal məhsul haqqinda olacaq', 'Burada Rəqəmsal məhsul haqqinda olacaq', 'Rəqəmsal məhsul', 'reqemsal mehsul'),
(6, 2, 'Digital product', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!', 'Digital product', 'digital product');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_download`
--

CREATE TABLE `product_download` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `download_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `product_download`
--

INSERT INTO `product_download` (`product_id`, `download_id`) VALUES
(8, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `product_id`, `img`) VALUES
(11, 4, '/public/uploads/files/images.jpg'),
(12, 15, '/public/uploads/images/1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sellcategories`
--

CREATE TABLE `sellcategories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `sellcategories`
--

INSERT INTO `sellcategories` (`id`, `title`, `parent_id`) VALUES
(1, 'Telefonlar', 0),
(2, 'Planshetler', 0),
(3, 'Notbuklar', 0),
(4, 'Mac', 3),
(5, 'Windows', 3),
(6, 'Reqamsal', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sellproducts`
--

CREATE TABLE `sellproducts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pur_price` decimal(10,2) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `sel_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `sellproducts`
--

INSERT INTO `sellproducts` (`id`, `category_id`, `title`, `pur_price`, `barcode`, `sel_price`, `qty`) VALUES
(1, 1, 'iphone', 50.00, '1234567890123', 250.00, 1),
(2, 2, 'canon-eos-5d', 150.00, '1234567890124', 300.00, 1),
(3, 3, 'hp', 80.00, '1234567890125', 500.00, 1),
(4, 4, 'apple-cinema-30', 140.00, '1234567890126', 230.99, 1),
(5, 5, 'imac', 96.00, '1234567890127', 230.99, 1),
(6, 6, 'reqemsal-mehsul', 54.00, '1234567890128', 230.99, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `img`) VALUES
(1, '/public/uploads/slider/1.jpg'),
(2, '/public/uploads/slider/2.jpg'),
(3, '/public/uploads/slider/3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `address`, `role`) VALUES
(1, 'vahid33.00@mail.ru', '$2y$10$dnkw/KW/V2e8QuZjuiBuOu17lAVKGudFUaSgKpTOHnUNWSG1tw6Aq', 'Memmed', 'QAZAX', 'user'),
(2, 'nerac20936@touchend.com', '$2y$10$DY.Fs5CXr6jAwadZLv2YqOyhDaOU33MqzyATc/gxtLRnje7sdui/O', 'myshop', 'QAZAX', 'admin'),
(3, 'umudumud448@gmail.com', '$2y$10$cN6MtKKt6L8YXrQZd6SmoON1g8nsYGOtcFfok.holVMeJ3v./z3AC', 'Memmed', 'QAZAX', 'user'),
(4, 'mojoc75413@meogl.com', '$2y$10$ueS..CMKdpx5KeeRuBBmc.a3BvQvXFauw1Ugcw/g0hfhLlnaDlnDW', 'Memmed', 'QAZAX', 'user'),
(5, 'vahereereid33.00@mail.ru', '$2y$10$NRL3AdYN2gntQ1pMYwiM3OcuSOCZf6e2Lu1yf8J3Pl4Mh8i/Jf4p2', '6 sinif riyaziyyat', 'QAZAX', 'user');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_downloads`
--
ALTER TABLE `order_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Tablo için indeksler `pages_description`
--
ALTER TABLE `pages_description`
  ADD PRIMARY KEY (`page_id`,`lang_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_download`
--
ALTER TABLE `product_download`
  ADD PRIMARY KEY (`product_id`,`download_id`);

--
-- Tablo için indeksler `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sellcategories`
--
ALTER TABLE `sellcategories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sellproducts`
--
ALTER TABLE `sellproducts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `order_downloads`
--
ALTER TABLE `order_downloads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `sellcategories`
--
ALTER TABLE `sellcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `sellproducts`
--
ALTER TABLE `sellproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
