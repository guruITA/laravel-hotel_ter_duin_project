-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 apr 2023 om 16:46
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-ter_duin`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kamer`
--

CREATE TABLE `kamer` (
  `id_kamer` int(11) NOT NULL,
  `soort_kamer` varchar(20) NOT NULL,
  `omschrijving_kamer` text NOT NULL,
  `prijs` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `kamer`
--

INSERT INTO `kamer` (`id_kamer`, `soort_kamer`, `omschrijving_kamer`, `prijs`) VALUES
(1, 'Queen size', 'grote kamer', '100'),
(2, 'Twee personen', 'Voor 2 personen', '50'),
(3, 'bbbb', 'ww', '10000');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `id_klant` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefoon_nr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`id_klant`, `naam`, `email`, `telefoon_nr`) VALUES
(55, 'IIII', 'GGG@GGGGGG', '0686215941'),
(56, 'IIII', 'GGG@GGGGGG', '0686215941'),
(57, 'IIII', 'GGG@GGGGGG', '0686215941'),
(58, 'IIII', 'GGG@GGGGGG', '0686215941'),
(59, 'IIII', 'GGG@GGGGGG', '0686215941'),
(60, 'IIII', 'GGG@GGGGGG', '0686215941'),
(61, 'IIII', 'GGG@GGGGGG', '0686215941'),
(62, 'IIII', 'GGG@GGGGGG', '0686215941'),
(63, 'IIII', 'GGG@GGGGGG', '0686215941'),
(64, 'IIII', 'GGG@GGGGGG', '0686215941'),
(65, 'IIII', 'GGG@GGGGGG', '0686215941'),
(66, 'Gurpreet Singh', 'ggggs@dss', '55555'),
(67, 'Gurpreet Singh', 'hdhhdh@hdhdhdh', '6969'),
(68, 'Gurpreet Singh', 'hdhhdh@hdhdhdh', '6969'),
(69, 'assss', 'ssss@ddddd', '2222'),
(70, 'GGGGGGGGGG', 'GGGGGGGGGGGG@GGGGGG', '111'),
(71, 'gggg', 'sssss@dddd', '22222'),
(72, 'gdggd', 'ggdgd2ggdddg@gsgs', '77272'),
(73, 'vsvsv', 'sgsgsg!@bbxb', '222'),
(74, 'vsvsv', 'sgsgsg!@bbxb', '222'),
(75, 'fsfsf', 'sfsfsf@fssfsf', '1111'),
(76, 'fsfsf', 'sfsfsf@fssfsf', '1111'),
(77, 'Gurpreet', 'Singhgur@22222', '111111'),
(78, 'Ernest', 'ernest@gmail.com', '0686215941'),
(79, 'wwwwwww', 'wwwwwwwwwwww@wwwwwww', '222'),
(80, 'aaaaaaaaaa', 'aaaaaaaaaaaa@aaaa', '11111111'),
(81, 'aaaaaaaaaa', 'aaaaaaaaaaaa@aaaa', '11111111'),
(82, 'aaaaaaaaaa', 'aaaaaaaaaaaa@aaaa', '11111111'),
(83, 'aaaaa', 'aaaaaaaaa@aaaaaaaa', '11111'),
(84, 'aaaaa', 'aaaaaaaaa@aaaaaaaa', '11111'),
(85, 'aaaaa', 'aaaaaaaaa@aaaaaaaa', '11111'),
(86, 'aaaaa', 'aaaaaaaaa@aaaaaaaa', '11111'),
(87, 'nerfen@dnd', 'ewenewn@dndnds2222', '222'),
(88, 'nerfen@dnd', 'ewenewn@dndnds2222', '222'),
(89, 'nerfen@dnd', 'ewenewn@dndnds2222', '222'),
(90, 'QQQ', 'QQQQQ@AAA', '1111'),
(91, '11', '111@eee', '11111'),
(92, 'www', 'ww@jddhdh', '111'),
(93, 'Gurpreet Singh', 'Singhgurpreet14082002@gmail.com', '0686215941'),
(94, 'dd', 'dd@fgga', '555'),
(95, '1111', '2222@wwww', '1112'),
(96, 'wwwwwwwww', 'wwwwwwww@fffff', '2222'),
(97, '33ff3ff3@fefef', 'fefeef@fefeffe', '222'),
(98, '5555555555555', '555555555@gggaa', '000000000'),
(99, 'gggggggg@Ggggggg', 'gggggggg@Ggggggg', '22222222'),
(100, 'rwrwrwrr@ffwfwf', 'rwrwrwrr@ffwfwf', '25255225'),
(101, 'hqhwhwh', 'hqhwhwhhw@gagg', '1111'),
(102, 'DHDDG@GSGSG', 'DHDDG@GSGSG', '6'),
(103, 'hddhgh@ggh', 'hddhgh@ggh', '252'),
(104, 'fhfvhfgh@gdgh', 'gdghdgdg@ghddg', '2722'),
(105, 'fhfhfhh@hdhdhdh', 'hugdgfg@gdgdgdg', '4774'),
(106, 'bvghgh@udhdh', 'bvghgh@udhdh', '2662');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `registreren-medewerker`
--

CREATE TABLE `registreren-medewerker` (
  `id_medewerker` int(11) NOT NULL,
  `username_medewerker` varchar(20) NOT NULL,
  `password_medewerker` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `registreren-medewerker`
--

INSERT INTO `registreren-medewerker` (`id_medewerker`, `username_medewerker`, `password_medewerker`) VALUES
(1, 'Gurpreet', '$2y$10$6fifbqXOme2WbNqLTwARKeY85uVkeRMI1MoyjJde9I0cd3PuguARa'),
(2, 'Gurpreet1', '$2y$10$w1bY60b77WW6cohpFLGRZecwdQX0iOhHYfRnR0VGfCQUvKhTgHm7C');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservering`
--

CREATE TABLE `reservering` (
  `id_bestelling` int(11) NOT NULL,
  `klant` int(11) NOT NULL,
  `van` datetime NOT NULL,
  `tot` datetime NOT NULL,
  `kamer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reservering`
--

INSERT INTO `reservering` (`id_bestelling`, `klant`, `van`, `tot`, `kamer`) VALUES
(77, 104, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 2),
(78, 105, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 3),
(79, 106, '2023-04-19 15:48:00', '2023-04-27 15:48:00', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `kamer`
--
ALTER TABLE `kamer`
  ADD PRIMARY KEY (`id_kamer`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id_klant`);

--
-- Indexen voor tabel `registreren-medewerker`
--
ALTER TABLE `registreren-medewerker`
  ADD PRIMARY KEY (`id_medewerker`);

--
-- Indexen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`id_bestelling`),
  ADD KEY `kamer` (`kamer`),
  ADD KEY `klant` (`klant`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `kamer`
--
ALTER TABLE `kamer`
  MODIFY `id_kamer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id_klant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT voor een tabel `registreren-medewerker`
--
ALTER TABLE `registreren-medewerker`
  MODIFY `id_medewerker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `reservering`
--
ALTER TABLE `reservering`
  MODIFY `id_bestelling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD CONSTRAINT `reservering_ibfk_1` FOREIGN KEY (`kamer`) REFERENCES `kamer` (`id_kamer`),
  ADD CONSTRAINT `reservering_ibfk_2` FOREIGN KEY (`klant`) REFERENCES `klanten` (`id_klant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
