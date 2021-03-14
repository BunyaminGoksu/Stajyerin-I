-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 14 Mar 2021, 13:40:20
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `sirketyorum_id` int(11) NOT NULL,
  `kullanici_adsoyad` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorum_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `kullanici_id`, `sirketyorum_id`, `kullanici_adsoyad`, `yorum_detay`, `yorum_zaman`) VALUES
(23, 23, 13, 'Bünyamin Göksu', 'sdgasgd', '2021-03-14 12:06:12'),
(24, 24, 13, 'Abdullah Daü', 'dsfasdfsdf', '2021-03-14 12:06:31'),
(25, 25, 16, 'Yusuf Göksu', 'Tebrikler...', '2021-03-14 12:21:49'),
(26, 25, 17, 'Yusuf Göksu', 'Çok iyiii', '2021-03-14 12:22:12'),
(27, 25, 18, 'Yusuf Göksu', 'HARİKA', '2021-03-14 12:22:22'),
(28, 24, 18, 'Abdullah Daü', 'Çok iyi olmuş', '2021-03-14 12:31:05'),
(29, 24, 17, 'Abdullah Daü', 'Mükooooo', '2021-03-14 12:31:26'),
(30, 24, 16, 'Abdullah Daü', 'Congratulations felan', '2021-03-14 12:37:07');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
