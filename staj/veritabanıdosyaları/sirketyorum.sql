-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 14 Mar 2021, 13:40:14
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
-- Tablo için tablo yapısı `sirketyorum`
--

CREATE TABLE `sirketyorum` (
  `sirketyorum_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kullanici_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sirketyorum_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sirketyorum_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `sirketyorum_il` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `sirketyorum_ilce` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `sirketyorum_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `sirketyorum_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sirketyorum`
--

INSERT INTO `sirketyorum` (`sirketyorum_id`, `kullanici_id`, `kullanici_mail`, `sirketyorum_zaman`, `sirketyorum_ad`, `sirketyorum_il`, `sirketyorum_ilce`, `sirketyorum_detay`, `sirketyorum_durum`) VALUES
(16, 23, 'bunyamingoksu@hotmail.com', '2021-03-12 18:35:06', 'Namık Kemal Üniversitesi', 'Tekirdağ', 'Çorlu', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '1'),
(17, 24, 'goksu-bunyamin@hotmail.com', '2021-03-14 12:19:44', 'Türk Hava Yollarıı', 'İstanbul', 'Florya ', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '1'),
(18, 25, 'y.goksu@outlook.com', '2021-03-14 12:21:25', 'Yapıkredi', 'İstanbul', 'Şişli', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `sirketyorum`
--
ALTER TABLE `sirketyorum`
  ADD PRIMARY KEY (`sirketyorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sirketyorum`
--
ALTER TABLE `sirketyorum`
  MODIFY `sirketyorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
