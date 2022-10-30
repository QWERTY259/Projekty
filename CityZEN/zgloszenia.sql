-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Paź 2022, 20:09
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zgloszenia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `id` int(11) NOT NULL,
  `tytul` text COLLATE utf8mb4_polish_ci NOT NULL,
  `data` date NOT NULL,
  `ulica` text COLLATE utf8mb4_polish_ci NOT NULL,
  `typ` text COLLATE utf8mb4_polish_ci NOT NULL,
  `zdjęcie` text COLLATE utf8mb4_polish_ci NOT NULL,
  `status` text COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` text COLLATE utf8mb4_polish_ci NOT NULL,
  `pozycja_x` float NOT NULL,
  `pozycja_y` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zgloszenia`
--

INSERT INTO `zgloszenia` (`id`, `tytul`, `data`, `ulica`, `typ`, `zdjęcie`, `status`, `opis`, `pozycja_x`, `pozycja_y`) VALUES
(36, '', '2022-10-17', 'nie mam lokalizacji', 'Przyroda', 'zdjecia/', 'aktywny', '', 0, 0),
(37, 'widzisz mnie', '2022-10-17', 'nie mam lokalizacji', 'Inne', 'zdjecia/download.jpg', 'aktywny', 'cały łeb', 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
