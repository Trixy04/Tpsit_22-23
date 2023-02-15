-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Feb 13, 2023 alle 20:42
-- Versione del server: 5.7.34
-- Versione PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cineteca_es_12`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Genere`
--

CREATE TABLE `Genere` (
  `id` int(11) NOT NULL,
  `descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `Genere`
--

INSERT INTO `Genere` (`id`, `descrizione`) VALUES
(1, 'Drammatico'),
(2, 'Commedia'),
(3, 'Cartoon'),
(4, 'Azione'),
(5, 'Amore');

-- --------------------------------------------------------

--
-- Struttura della tabella `Prestiti`
--

CREATE TABLE `Prestiti` (
  `idSocio` int(11) NOT NULL,
  `idVideo` int(11) NOT NULL,
  `dataPrestito` date NOT NULL,
  `dataRestituzione` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Soci`
--

CREATE TABLE `Soci` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Tipologia`
--

CREATE TABLE `Tipologia` (
  `id` int(11) NOT NULL,
  `tipologia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `Tipologia`
--

INSERT INTO `Tipologia` (`id`, `tipologia`) VALUES
(1, 'VHS'),
(2, 'DVD');

-- --------------------------------------------------------

--
-- Struttura della tabella `userData`
--

CREATE TABLE `userData` (
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `userData`
--

INSERT INTO `userData` (`nome`, `cognome`, `email`, `pass`) VALUES
('Rigers', 'Gjinaj', 'pippo@example.com', 'OttriaBuco!'),
('Mirko', 'Ragusa', 'ragusamirko@gmail.com', 'ProvaMirko!'),
('Alessia', 'Rocchini', 'rocchinialessia@gmail.com', 'AlessiaNonsaInformatica!'),
('Mattia', 'Teriaca', 'teriaca.mattia@gmail.com', 'ProvaMattia!');

-- --------------------------------------------------------

--
-- Struttura della tabella `Video`
--

CREATE TABLE `Video` (
  `id` int(11) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `regista` varchar(255) NOT NULL,
  `anno` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `genere` varchar(255) NOT NULL,
  `trama` varchar(3000) NOT NULL,
  `url_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `Video`
--

INSERT INTO `Video` (`id`, `titolo`, `regista`, `anno`, `tipo`, `genere`, `trama`, `url_img`) VALUES
(571, 'Sole a Catinelle', 'Gennaro Nunziante', '2013', '2', '2', 'Quando il figlio Nicolò riceve una pagella a pieni voti, Checco, il padre, si vede costretto a mantenere fede alla promessa fatta di regalargli una vacanza da sogno. Il problema è che lo uomo, venditore di aspirapolvere in piena crisi, non può permettersi nemmeno un giorno al mare. Partiti con la speranza di vendere qualche elettrodomestico in Molise, i due si ritrovano a casa di Zoe, una ricchissima ragazza che li fa entrare nel proprio mondo', 'img_00'),
(572, 'Top Gun: Maverik', 'Joseph Kosinski', '2022', '2', '4', 'Pete Mitchell, detto Maverick, continua a superare i suoi limiti dopo essere stato per anni uno dei migliori aviatori della Marina. Tuttavia, deve affrontare il suo passato mentre addestra un nuovo gruppo per una missione estremamente pericolosa.', 'img_01'),
(573, 'Escape Plan: Fuga dall inferno', 'Mikael Håfström', '2013', '2', '4', 'Ray Breslin, un esperto di sicurezza carceraria, affronta la sua più grande sfida: fuggire dalla prigione che ha progettato. In carcere incontra una figura enigmatica, un uomo che si è guadagnato il rispetto di tutti i detenuti.', 'img_02');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Genere`
--
ALTER TABLE `Genere`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `Soci`
--
ALTER TABLE `Soci`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `Tipologia`
--
ALTER TABLE `Tipologia`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `userData`
--
ALTER TABLE `userData`
  ADD PRIMARY KEY (`email`);

--
-- Indici per le tabelle `Video`
--
ALTER TABLE `Video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Genere`
--
ALTER TABLE `Genere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `Soci`
--
ALTER TABLE `Soci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Tipologia`
--
ALTER TABLE `Tipologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `Video`
--
ALTER TABLE `Video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
