-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Nov 2018 um 10:01
-- Server-Version: 10.1.35-MariaDB
-- PHP-Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `sz-medien`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder`
--

CREATE TABLE `bilder` (
  `num` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bilder`
--

INSERT INTO `bilder` (`num`, `id`, `link`) VALUES
(1, 1, 'images/cam_pics/pic_osmo1.jpg'),
(2, 1, 'images/cam_pics/pic_osmo2.jpg'),
(4, 1, 'images/cam_pics/pic_osmo4.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cameras`
--

CREATE TABLE `cameras` (
  `id` int(11) NOT NULL,
  `inr` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `beschreibung` text NOT NULL,
  `marke` varchar(20) NOT NULL,
  `akkulaufzeit` int(11) NOT NULL,
  `Kameratyp` int(11) NOT NULL,
  `afl` int(11) NOT NULL,
  `Verschlusszeiten` int(11) NOT NULL,
  `iso` int(11) NOT NULL,
  `Gewicht` int(11) NOT NULL,
  `dim` int(11) NOT NULL,
  `Monitor` int(11) NOT NULL,
  `bildlink` text NOT NULL,
  `videolink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cameras`
--

INSERT INTO `cameras` (`id`, `inr`, `name`, `beschreibung`, `marke`, `akkulaufzeit`, `Kameratyp`, `afl`, `Verschlusszeiten`, `ISO`, `Gewicht`, `dim`, `Monitor`, `bildlink`, `videolink`) VALUES
(1, 'V20', 'DJI Osmo', 'Test Beschreibung', 'DJI', 0, 0, 0, 0, 10, 0, 0, 0, 'images/main-bild/test1.jpg', 'images/videos/1/test1.mp4'),
(2, 'V14', 'Fujifilm XT-20', 'Test Beschreibung 2', 'Fujifilm ', 0, 0, 0, 0, 0, 0, 0, 0, 'images/main-bild/test2.jpg', ''),
(3, 'V12', 'Fujifilm X-E2', 'Fujifilm', 'Fujifilm  ', 0, 0, 0, 0, 0, 0, 0, 0, 'images/main-bild/test3.jpg', ''),
(4, '', 'Fujifilm X-E2S', 'Fujifilm', 'Fujifilm ', 0, 0, 0, 0, 0, 0, 0, 0, 'images/main-bild/test4.jpg', ''),
(6, '', 'Canon XF 100', 'Canon', 'Canon', 0, 0, 0, 0, 0, 0, 0, 0, 'images/main-bild/test5.jpg', ''),
(7, '', 'GoPro Hero3', 'sdadasdsad', 'GoPro', 0, 0, 0, 0, 0, 0, 0, 0, 'images/main-bild/test6.jpg', ''),
(8, '', 'Black Magic BMCC 2,5k ', 'sdadasdsad', 'BlackMagic', 0, 0, 0, 0, 0, 0, 0, 0, 'images/main-bild/test7.jpg', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `datenblatt`
--

CREATE TABLE `datenblatt` (
  `num` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `pdf_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `datenblatt`
--

INSERT INTO `datenblatt` (`num`, `id`, `filename`, `pdf_link`) VALUES
(1, 1, '06VideokameraXF100_Anleitung.pdf', 'datenblatt/06VideokameraXF100_Anleitung.pdf'),
(2, 1, 'Canon_XF100-Bedienungsanleitung.pdf', 'datenblatt/Canon_XF100-Bedienungsanleitung.pdf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `group`
--

INSERT INTO `group` (`id`, `name`) VALUES
(1, 'Schüler'),
(2, 'Lehrer'),
(3, 'Andere');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gruppe` varchar(30) NOT NULL,
  `pw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `name`, `gruppe`, `pw`) VALUES
(1, 'Max', 'Schüler', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(6, 'Josef', 'Lehrer', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zusatz`
--

CREATE TABLE `zusatz` (
  `camera_id` int(11) NOT NULL,
  `Name` int(11) NOT NULL,
  `Beschreibung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`num`),
  ADD KEY `fk_bilder_cameras` (`id`);

--
-- Indizes für die Tabelle `cameras`
--
ALTER TABLE `cameras`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `datenblatt`
--
ALTER TABLE `datenblatt`
  ADD PRIMARY KEY (`num`),
  ADD KEY `fk_datenblatt_cameras2` (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `zusatz`
--
ALTER TABLE `zusatz`
  ADD KEY `fk_zusatz_cameras` (`camera_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `cameras`
--
ALTER TABLE `cameras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT für Tabelle `datenblatt`
--
ALTER TABLE `datenblatt`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD CONSTRAINT `fk_bilder_cameras` FOREIGN KEY (`id`) REFERENCES `cameras` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `datenblatt`
--
ALTER TABLE `datenblatt`
  ADD CONSTRAINT `fk_datenblatt_cameras` FOREIGN KEY (`id`) REFERENCES `cameras` (`id`),
  ADD CONSTRAINT `fk_datenblatt_cameras2` FOREIGN KEY (`id`) REFERENCES `cameras` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `zusatz`
--
ALTER TABLE `zusatz`
  ADD CONSTRAINT `fk_zusatz_cameras` FOREIGN KEY (`camera_id`) REFERENCES `cameras` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
