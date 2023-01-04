-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Oca 2023, 14:53:00
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `internetp`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `kim` text NOT NULL,
  `begeni` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `galery`
--

INSERT INTO `galery` (`id`, `image`, `kim`, `begeni`) VALUES
(39, 'WhatsApp GÃ¶rsel 2022-12-31 saat 16.43.59.jpg', '13', 0),
(44, 'WhatsApp 2023-01-03 saat 22.35.59.jpg', '14', 0),
(45, 'WhatsApp 2023-01-03 saat 225.58.jpg', '14', 0),
(46, 'WhatsApp2023-01-03 saat 22.35.jpg', '14', 0),
(47, 'WhatsApp l 2022-12-31 saat 16.3.54.jpg', '13', 0),
(48, 'WhatsApp 2022-12-31 saat 16.43.53.jpg', '13', 0),
(49, 'ekran g.png', '15', 1),
(50, 'ekr.png', '15', 0),
(51, 'ekran.png', '15', 0),
(52, '150710-yamato-got-tease_athvdr.jpg', '16', 0),
(53, '1497643651_jon cover.jpg', '16', 1),
(54, '0379205.jpg-r_654_368-f_jpg-q_x-xxyxx.jpg', '16', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `biyografi` varchar(255) NOT NULL DEFAULT 'Kisinin Biyografisi Bos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `image`, `biyografi`) VALUES
(13, 'OuzOguz', 'ouz@gmail.com', '202cb962ac59075b964b07152d234b70', 'profil.jpg', 'YalnÄ±zca KÄ±zlar Eklesin'),
(14, 'kadir_haslar', 'kadir@gmail.com', '202cb962ac59075b964b07152d234b70', 'kadirprofil.jpg', ' YÃ¼rÃ¼ bre ehli deve, EndamÄ±nÄ± gÃ¶reyim '),
(15, 'muelkan_cile', 'mulkan@gmail.com', '202cb962ac59075b964b07152d234b70', 'ekra.png', 'Muelkan Cile\r\nYazÄ±lÄ±m\r\nGraphic Designer / Game Developer\r\nWebsite => webnedio\r\nPlayStore => pub: ky yazÄ±lÄ±m\r\n& pub: AVESTA Game Studio'),
(16, 'jhon_Snow', 'jhonsnow@gmail.com', '202cb962ac59075b964b07152d234b70', 'Screenshot_5.png', ' krallÄ±ktakileri koruyan kalkanÄ±m. bu gece ve gelen tÃ¼m gecelerde yaÅŸamÄ±mÄ± ve onurum gece gÃ¶zcÃ¼leriâ€™ne adÄ±yorum');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_2` (`image`),
  ADD KEY `image` (`image`);

--
-- Tablo için indeksler `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
