-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 21 Mar 2025, 16:06:33
-- Sunucu sürümü: 10.11.11-MariaDB-cll-lve
-- PHP Sürümü: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `siberac1_ps`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `staj_basvurulari`
--

CREATE TABLE `staj_basvurulari` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `universite` varchar(100) NOT NULL,
  `tc_no` varchar(11) NOT NULL,
  `anne_kizlik_soyadi` varchar(100) NOT NULL,
  `ozet` text NOT NULL,
  `basvuru_tarihi` datetime NOT NULL,
  `tel_no` varchar(20) NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `dogum_yeri` varchar(100) NOT NULL,
  `adres` text NOT NULL,
  `baba_adi` varchar(100) NOT NULL,
  `anne_adi` varchar(100) NOT NULL,
  `medeni_hal` varchar(20) NOT NULL,
  `banka_adi` varchar(100) NOT NULL,
  `iban` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ziyaretciler`
--

CREATE TABLE `ziyaretciler` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `visit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `staj_basvurulari`
--
ALTER TABLE `staj_basvurulari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ziyaretciler`
--
ALTER TABLE `ziyaretciler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `staj_basvurulari`
--
ALTER TABLE `staj_basvurulari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `ziyaretciler`
--
ALTER TABLE `ziyaretciler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=726;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
