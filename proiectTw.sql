-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 12, 2019 la 07:21 PM
-- Versiune server: 10.1.40-MariaDB
-- Versiune PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `proiect`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `mese`
--

CREATE TABLE `mese` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `masa` varchar(20) DEFAULT NULL,
  `data` varchar(50) DEFAULT NULL,
  `calorii` int(200) NOT NULL,
  `proteine` int(100) NOT NULL,
  `grasimi` int(100) NOT NULL,
  `carbohidrati` int(200) NOT NULL,
  `fibre` int(200) NOT NULL,
  `zahar` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `mese`
--

INSERT INTO `mese` (`id`, `user_id`, `masa`, `data`, `calorii`, `proteine`, `grasimi`, `carbohidrati`, `fibre`, `zahar`) VALUES
(2, 3, 'Breakfast', '2019-12-06', 76, 154, 11, 12, 1, 0),
(3, 3, 'Lunch', '2019-06-10', 43, 276, 11, 11, 33, 2),
(7, 3, 'Lunch', '2019-06-09', 8, 479, 4, 27, 60, 5);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `birthdate` varchar(50) DEFAULT NULL,
  `activity` varchar(70) DEFAULT NULL,
  `purpose` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `gender`, `firstname`, `lastname`, `weight`, `height`, `birthdate`, `activity`, `purpose`) VALUES
(3, 'Alex', '4124bc0a9335c27f086f24ba207a4912', 'Male', 'Ionescu', 'Alex', 45, 172, '1999-08-28', 'moderate', 'more');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `mese`
--
ALTER TABLE `mese`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `mese`
--
ALTER TABLE `mese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `mese`
--
ALTER TABLE `mese`
  ADD CONSTRAINT `mese_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
