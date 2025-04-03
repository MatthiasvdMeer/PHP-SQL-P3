-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 apr 2025 om 10:29
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gastenboek`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bezoekers`
--

CREATE TABLE `bezoekers` (
  `id` int(9) NOT NULL,
  `user_id` int(3) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `bericht` text NOT NULL,
  `datumtijd` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bezoekers`
--

INSERT INTO `bezoekers` (`id`, `naam`, `bericht`, `datumtijd`) VALUES
(1, 'Mark', 'Test1', '2025-03-20 12:19:42'),
(6, 'Steve', 'Deze opdracht was ingewikkeld', '2025-03-20 12:31:17'),
(7, 'Brian', 'Deze opdracht was geinig', '2025-03-20 12:33:27'),
(9, 'Gert', 'Test nummero 3', '2025-03-20 12:34:53'),
(10, 'Bert', 'Mijn broer Gert heeft al iets gezegd', '2025-03-20 12:35:22'),
(17, 'Rayvano', 'Traden is mijn specialty\r\n', '2025-03-21 09:20:42');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `optie`
--

CREATE TABLE `optie` (
  `id` int(3) NOT NULL,
  `poll` int(3) NOT NULL,
  `optie` varchar(255) NOT NULL,
  `stemmen` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `optie`
--

INSERT INTO `optie` (`id`, `poll`, `optie`, `stemmen`) VALUES
(1, 1, 'bakker joop is veel beter', 1),
(2, 1, 'bakker joop is ietsje beter', 0),
(3, 1, 'jumbo stroopwafels ietsje beter', 0),
(4, 1, 'jumbostroopwafels zijn heel veel beter', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `poll`
--

CREATE TABLE `poll` (
  `id` int(3) NOT NULL,
  `vraag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `poll`
--

INSERT INTO `poll` (`id`, `vraag`) VALUES
(1, 'Wat is beter? stroopwafels van bakker joop? of de stroopwafels van de jumbo?');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bezoekers`
--
ALTER TABLE `bezoekers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `optie`
--
ALTER TABLE `optie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bezoekers`
--
ALTER TABLE `bezoekers`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `optie`
--
ALTER TABLE `optie`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
