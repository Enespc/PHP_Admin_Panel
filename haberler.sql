-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Haz 2024, 10:36:18
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `haberler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE `haberler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `yazar` varchar(50) NOT NULL,
  `içerik` varchar(500) NOT NULL,
  `tarih` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `baslik`, `yazar`, `içerik`, `tarih`) VALUES
(1, 'Hoşgeldiniz', 'Enes Paçacı', 'Sınavda Herkese Başarılar Dilerim', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `haberler`
--
ALTER TABLE `haberler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
