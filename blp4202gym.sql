-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 27 Haz 2021, 09:19:24
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blp4202gym`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alinanrandevu`
--

DROP TABLE IF EXISTS `alinanrandevu`;
CREATE TABLE IF NOT EXISTS `alinanrandevu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_id` int(11) NOT NULL,
  `randevu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uye_id` (`uye_id`),
  KEY `randevu_id` (`randevu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `alinanrandevu`
--

INSERT INTO `alinanrandevu` (`id`, `uye_id`, `randevu_id`) VALUES
(8, 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cinsiyetler`
--

DROP TABLE IF EXISTS `cinsiyetler`;
CREATE TABLE IF NOT EXISTS `cinsiyetler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cinsiyet` varchar(5) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `cinsiyetler`
--

INSERT INTO `cinsiyetler` (`id`, `cinsiyet`) VALUES
(1, 'Erkek'),
(2, 'Kadın');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `frmbilgi`
--

DROP TABLE IF EXISTS `frmbilgi`;
CREATE TABLE IF NOT EXISTS `frmbilgi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_id` int(11) NOT NULL,
  `cinsiyet_id` int(11) NOT NULL,
  `boy` int(11) NOT NULL,
  `kilo` int(11) NOT NULL,
  `yas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uye_id` (`uye_id`),
  KEY `cinsiyet_id` (`cinsiyet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `frmbilgi`
--

INSERT INTO `frmbilgi` (`id`, `uye_id`, `cinsiyet_id`, `boy`, `kilo`, `yas`) VALUES
(1, 3, 1, 178, 76, 26),
(3, 30, 1, 187, 85, 26);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `frmtakip`
--

DROP TABLE IF EXISTS `frmtakip`;
CREATE TABLE IF NOT EXISTS `frmtakip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_id` int(11) NOT NULL,
  `kilo` int(11) NOT NULL,
  `bel` int(11) NOT NULL,
  `kol` int(11) NOT NULL,
  `tarih` varchar(35) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uye_id` (`uye_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `frmtakip`
--

INSERT INTO `frmtakip` (`id`, `uye_id`, `kilo`, `bel`, `kol`, `tarih`) VALUES
(1, 3, 85, 90, 35, '07/06/2021'),
(2, 3, 87, 96, 37, '07/07/2021'),
(3, 3, 92, 100, 42, '07/08/2021');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hedefler`
--

DROP TABLE IF EXISTS `hedefler`;
CREATE TABLE IF NOT EXISTS `hedefler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hedef_ad` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hedefler`
--

INSERT INTO `hedefler` (`id`, `hedef_ad`) VALUES
(1, 'Kilo vermek'),
(2, 'Kas kütlesi kazanmak'),
(3, 'Form korumak'),
(4, 'Kilo almak');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

DROP TABLE IF EXISTS `mesajlar`;
CREATE TABLE IF NOT EXISTS `mesajlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atan_id` int(11) NOT NULL,
  `alan_id` int(11) NOT NULL,
  `mesaj` varchar(350) COLLATE utf8mb4_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `tarih` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `atan_id` (`atan_id`),
  KEY `alan_id` (`alan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`id`, `atan_id`, `alan_id`, `mesaj`, `durum`, `tarih`) VALUES
(2, 3, 1, 'Yönetici bey şikayetim var.', 0, '31/05/2021 16:04:46'),
(3, 1, 2, 'Güzel çalışın', 0, '31/05/2021 16:09:25'),
(4, 1, 3, 'Sayın üyemiz ilgileniyoruz.', 0, '31/05/2021 16:17:39'),
(5, 1, 3, 'ahmet bey', 0, '31/05/2021 16:21:46'),
(6, 2, 3, 'ahmet bey hg', 0, '31/05/2021 16:25:24'),
(7, 1, 1, 'Kendine mesaj denemesi.', 0, '31/05/2021 17:41:02'),
(8, 3, 1, 'Merhaba', 0, '24/06/2021 14:44:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `programlar`
--

DROP TABLE IF EXISTS `programlar`;
CREATE TABLE IF NOT EXISTS `programlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_id` int(11) NOT NULL,
  `program` varchar(350) COLLATE utf8mb4_turkish_ci NOT NULL,
  `trainer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uye_id` (`uye_id`),
  KEY `trainer_id` (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `programlar`
--

INSERT INTO `programlar` (`id`, `uye_id`, `program`, `trainer_id`) VALUES
(10, 3, 'Bench Press 4x10.\r\nSquad 4x15.\r\nShoulder Press 4x15 Max rep', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `progtalep`
--

DROP TABLE IF EXISTS `progtalep`;
CREATE TABLE IF NOT EXISTS `progtalep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_id` int(11) NOT NULL,
  `hedef_id` int(11) NOT NULL,
  `uye_notu` varchar(350) COLLATE utf8mb4_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uye_id` (`uye_id`),
  KEY `hedef_id` (`hedef_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `progtalep`
--

INSERT INTO `progtalep` (`id`, `uye_id`, `hedef_id`, `uye_notu`, `durum`) VALUES
(14, 3, 1, '123', 1),
(15, 30, 4, '123312', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

DROP TABLE IF EXISTS `randevu`;
CREATE TABLE IF NOT EXISTS `randevu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarih` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `saat` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `kota` int(11) NOT NULL,
  `alan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`id`, `tarih`, `saat`, `durum`, `kota`, `alan`) VALUES
(1, '10/06/2021', '10:00-12:00', 1, 1, 1),
(2, '10/06/2021', '12:00-14:00', 0, 1, 0),
(3, '10/06/2021', '14:00-16:00', 0, 1, 0),
(4, '10/06/2021', '16:00-18:00', 0, 1, 0),
(5, '10/06/2021', '18:00-20:00', 0, 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satinalinan`
--

DROP TABLE IF EXISTS `satinalinan`;
CREATE TABLE IF NOT EXISTS `satinalinan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alan_uye_id` int(11) NOT NULL,
  `alinan_urun_id` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `tarih` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alan_uye_id` (`alan_uye_id`),
  KEY `alinan_urun_id` (`alinan_urun_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `satinalinan`
--

INSERT INTO `satinalinan` (`id`, `alan_uye_id`, `alinan_urun_id`, `adet`, `tarih`) VALUES
(5, 3, 1, 1, '04/06/2021 14:13:42'),
(6, 3, 2, 1, '04/06/2021 14:13:42'),
(7, 3, 3, 2, '04/06/2021 14:13:42'),
(8, 3, 9, 1, '04/06/2021 14:14:31'),
(9, 3, 10, 1, '04/06/2021 14:14:31'),
(10, 3, 8, 1, '04/06/2021 14:14:31'),
(11, 3, 3, 1, '09/06/2021 16:23:36'),
(12, 3, 1, 1, '09/06/2021 16:30:41'),
(13, 3, 1, 1, '09/06/2021 17:10:24'),
(14, 3, 4, 1, '20/06/2021 18:50:41'),
(15, 3, 1, 1, '24/06/2021 14:47:51'),
(16, 3, 1, 1, '24/06/2021 14:49:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

DROP TABLE IF EXISTS `urunler`;
CREATE TABLE IF NOT EXISTS `urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `price` double NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `name`, `price`, `stok`) VALUES
(1, 'Protein Tozu', 200, 46),
(2, 'BCAA-Glutamine 4:1:1 ', 150, 350),
(3, 'Creatine', 180, 244),
(4, 'Arginine', 175, 357),
(5, 'L-Carnitine', 100, 148),
(6, 'Whey - Isolate', 450, 346),
(7, 'Sporcu Eldiven', 75, 245),
(8, 'Havlu', 20, 147),
(9, 'Su', 2, 344),
(10, 'Protein Bar', 8, 254);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

DROP TABLE IF EXISTS `uye`;
CREATE TABLE IF NOT EXISTS `uye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre` varchar(12) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ad` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyad` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tel` varchar(11) COLLATE utf8mb4_turkish_ci NOT NULL,
  `bakiye` varchar(5) COLLATE utf8mb4_turkish_ci NOT NULL,
  `gun` varchar(3) COLLATE utf8mb4_turkish_ci NOT NULL,
  `yetki_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `yetki_id` (`yetki_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`id`, `mail`, `sifre`, `ad`, `soyad`, `tel`, `bakiye`, `gun`, `yetki_id`) VALUES
(1, 'ad@min', '123', 'Uğurcan', 'Çıtak', '05555555555', '0', '360', 1),
(2, 'ali@trainer', '123', 'Ali', 'Can', '05444444444', '3', '0', 2),
(3, 'ahmet@mail.com', '123', 'Ahmet', 'Öz', '532532', '5633', '460', 3),
(30, 'blp4202deneme@outlook.com', '123', 'Uğurcan', 'Çıtak', '534', '0', '0', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetki`
--

DROP TABLE IF EXISTS `yetki`;
CREATE TABLE IF NOT EXISTS `yetki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yetki_ad` varchar(18) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yetki`
--

INSERT INTO `yetki` (`id`, `yetki_ad`) VALUES
(1, 'admin'),
(2, 'trainer'),
(3, 'member');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `puan` int(11) NOT NULL,
  `yorum_yapan_id` int(11) NOT NULL,
  `tarih` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `yorum_yapan_id` (`yorum_yapan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `yorum`, `puan`, `yorum_yapan_id`, `tarih`) VALUES
(1, 'Admin Yorumu Denemesi.', 5, 1, '31/05/2021 12:15:36'),
(2, 'Trainer yorum denemesi.', 3, 2, '31/05/2021 14:58:01'),
(3, 'asdasd', 4, 3, '02/06/2021 17:09:31'),
(4, 'Beğendim', 3, 3, '24/06/2021 15:09:39');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `alinanrandevu`
--
ALTER TABLE `alinanrandevu`
  ADD CONSTRAINT `alinanrandevu_ibfk_1` FOREIGN KEY (`uye_id`) REFERENCES `uye` (`id`),
  ADD CONSTRAINT `alinanrandevu_ibfk_2` FOREIGN KEY (`randevu_id`) REFERENCES `randevu` (`id`);

--
-- Tablo kısıtlamaları `frmbilgi`
--
ALTER TABLE `frmbilgi`
  ADD CONSTRAINT `frmbilgi_ibfk_1` FOREIGN KEY (`uye_id`) REFERENCES `uye` (`id`),
  ADD CONSTRAINT `frmbilgi_ibfk_2` FOREIGN KEY (`cinsiyet_id`) REFERENCES `cinsiyetler` (`id`);

--
-- Tablo kısıtlamaları `frmtakip`
--
ALTER TABLE `frmtakip`
  ADD CONSTRAINT `frmtakip_ibfk_1` FOREIGN KEY (`uye_id`) REFERENCES `uye` (`id`);

--
-- Tablo kısıtlamaları `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD CONSTRAINT `mesajlar_ibfk_1` FOREIGN KEY (`alan_id`) REFERENCES `uye` (`id`),
  ADD CONSTRAINT `mesajlar_ibfk_2` FOREIGN KEY (`atan_id`) REFERENCES `uye` (`id`);

--
-- Tablo kısıtlamaları `programlar`
--
ALTER TABLE `programlar`
  ADD CONSTRAINT `programlar_ibfk_1` FOREIGN KEY (`uye_id`) REFERENCES `uye` (`id`),
  ADD CONSTRAINT `programlar_ibfk_2` FOREIGN KEY (`trainer_id`) REFERENCES `uye` (`id`);

--
-- Tablo kısıtlamaları `progtalep`
--
ALTER TABLE `progtalep`
  ADD CONSTRAINT `progtalep_ibfk_1` FOREIGN KEY (`uye_id`) REFERENCES `uye` (`id`),
  ADD CONSTRAINT `progtalep_ibfk_2` FOREIGN KEY (`hedef_id`) REFERENCES `hedefler` (`id`);

--
-- Tablo kısıtlamaları `satinalinan`
--
ALTER TABLE `satinalinan`
  ADD CONSTRAINT `satinalinan_ibfk_1` FOREIGN KEY (`alan_uye_id`) REFERENCES `uye` (`id`),
  ADD CONSTRAINT `satinalinan_ibfk_2` FOREIGN KEY (`alinan_urun_id`) REFERENCES `urunler` (`id`);

--
-- Tablo kısıtlamaları `uye`
--
ALTER TABLE `uye`
  ADD CONSTRAINT `uye_ibfk_1` FOREIGN KEY (`yetki_id`) REFERENCES `yetki` (`id`);

--
-- Tablo kısıtlamaları `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD CONSTRAINT `yorumlar_ibfk_1` FOREIGN KEY (`yorum_yapan_id`) REFERENCES `uye` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
