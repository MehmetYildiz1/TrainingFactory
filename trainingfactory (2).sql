-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 dec 2019 om 12:53
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainingfactory`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `activiteit`
--

CREATE TABLE `activiteit` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `costs` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `activiteit`
--

INSERT INTO `activiteit` (`id`, `naam`, `description`, `duration`, `costs`) VALUES
(2, 'Kickboxen', 'Kickboksen komt uit Thailand. Het is daar de nationale sport, net zo \r\n        populair als hier het voetbal is. Het is een echte verdedigingskunst die daar Muay Thai genoemd \r\n        wordt. Het wordt daar ook door het leger gebruikt.\r\n        Vanaf de jaren zestig werd de sport ook in andere landen beoefend, ook in Japan. Zij bedachten er de naam \r\n        kickboksen voor. Niet veel later werd het kickboksen ook in Amerika en Europa bekend.\r\n        In Nederland werd deze sport in 1975 geïntroduceerd door Jan Plas, Jan van Looien en Peter van de Hemel. \r\n        Ze hadden in Tokio getraind.', 35, 60),
(3, 'Stootzak training', 'Het is een fantastische manier om kennis te maken met vechtsport, \r\n        verschillende technieken en een gezondere levensstijl. De training richt zich op techniek, kracht en conditie. \r\n        Hierdoor is de training een ware fatburner.', 40, 45),
(4, 'MMA', 'MMA combineert technieken uit verschillende vechtsporten, zoals \r\n        kickboksen, thaiboksen, judo, worstelen (grappling), boksen en jiujitsu. Het doel hiervan is het \r\n        vormen van de meest effectieve vechtsport voor een in theorie vrij gevecht. Ondanks het beeld wat\r\n         mensen hebben van MMA zijn echt niet alle technieken geoorloofd. Zo is het niet toegestaan om een \r\n         tegenstander die op de grond ligt tegen het hoofd te trappen of te knieën.', 60, 50),
(5, 'Voetbal', 'Het is een sport die door iedereen wordt gespeeld', 40, 45);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_persons` int(11) NOT NULL,
  `activiteit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `lesson`
--

INSERT INTO `lesson` (`id`, `time`, `date`, `location`, `max_persons`, `activiteit_id`) VALUES
(1, '16:30:00', '2019-12-18', 'Den Haag', 25, 2),
(2, '17:30:00', '2019-12-30', 'Den Haag', 25, 2),
(3, '15:30:00', '2019-12-04', 'Den Haag', 25, 4),
(4, '15:30:00', '2019-12-08', 'Den Haag', 25, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191122102154', '2019-11-22 10:23:23'),
('20191125082958', '2019-11-25 08:30:26'),
('20191125130353', '2019-11-25 13:04:11'),
('20191126075244', '2019-11-26 07:52:50'),
('20191203113055', '2019-12-03 11:31:34'),
('20191203113542', '2019-12-03 11:35:50'),
('20191206112659', '2019-12-06 11:27:07');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `activiteit`
--
ALTER TABLE `activiteit`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F87474F35A8A0A1` (`activiteit_id`);

--
-- Indexen voor tabel `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `activiteit`
--
ALTER TABLE `activiteit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `FK_F87474F35A8A0A1` FOREIGN KEY (`activiteit_id`) REFERENCES `activiteit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
