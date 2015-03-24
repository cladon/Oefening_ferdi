-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 09 jan 2015 om 16:34
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `tool`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
`id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Gegevens worden geëxporteerd voor tabel `companies`
--

INSERT INTO `companies` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Capgemini', '2014-11-12 14:51:44', '2014-11-12 14:51:44'),
(2, 'Defensie', '2014-11-12 14:51:53', '2014-11-12 14:51:53'),
(3, 'Lukoil', '2014-11-12 14:52:01', '2014-11-12 14:52:01'),
(4, 'FedPol', '2014-12-10 17:13:25', '2014-12-10 17:13:25'),
(5, 'Vlaamse Overheid', '2015-01-07 14:55:00', '2015-01-07 14:55:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
`id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `invoice_type_id` int(11) NOT NULL,
  `invoice_number_int` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `invoice_number_ext` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `amount_excl` double NOT NULL,
  `VAT` double NOT NULL,
  `amount_incl` double NOT NULL,
  `date` date NOT NULL,
  `date_exp` date NOT NULL,
  `paydate` date NOT NULL,
  `virtual` tinyint(1) DEFAULT '0',
  `paid` tinyint(1) DEFAULT '0',
  `workmonth` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `hourrate` double DEFAULT NULL,
  `hours` double DEFAULT NULL,
  `days` double DEFAULT NULL,
  `descr` text COLLATE utf8_bin,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1057 ;

--
-- Gegevens worden geëxporteerd voor tabel `invoices`
--

INSERT INTO `invoices` (`id`, `company_id`, `invoice_type_id`, `invoice_number_int`, `invoice_number_ext`, `amount_excl`, `VAT`, `amount_incl`, `date`, `date_exp`, `paydate`, `virtual`, `paid`, `workmonth`, `hourrate`, `hours`, `days`, `descr`, `created`, `modified`) VALUES
(1031, 1, 1, 'D00002', '', 204, 21, 2000, '2014-11-14', '2014-11-14', '2014-11-14', 1, 0, '', NULL, NULL, NULL, '', '2015-01-07 13:13:45', '2015-01-07 13:39:57'),
(1032, 1, 1, 'D00001', '', 204, 21, 2000, '2014-11-14', '2014-11-14', '2014-01-02', 1, 0, '', NULL, NULL, NULL, '', '2015-01-07 13:14:20', '2015-01-07 13:39:44'),
(1033, 1, 1, 'D00045', '', 204, 21, 3000, '2014-11-14', '2014-11-14', '2014-11-14', 1, 0, '', NULL, NULL, NULL, 'Deze factuur zal mss vroegtijdig betaald worden, mss ook weer niet..', '2015-01-07 14:03:42', '2015-01-07 14:04:56'),
(1034, 1, 1, '', '', 204, 21, 2000, '2014-11-14', '2014-11-14', '2014-11-14', 1, 0, '', NULL, NULL, NULL, 'testtesttest', '2015-01-07 14:03:48', '2015-01-07 14:03:48'),
(1035, 1, 1, '', '', 204, 21, 2000, '2014-11-14', '2014-11-14', '2014-11-14', 1, 0, '', NULL, NULL, NULL, '', '2015-01-09 16:22:52', '2015-01-09 16:22:52'),
(1036, 1, 1, '', '', 204, 21, 2000, '2014-11-14', '2014-11-14', '2014-11-14', 1, 0, '', NULL, NULL, NULL, '', '2015-01-09 16:25:34', '2015-01-09 16:25:34');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoice_types`
--

CREATE TABLE IF NOT EXISTS `invoice_types` (
`id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `invoice_types`
--

INSERT INTO `invoice_types` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Incoming Invoice', '2014-11-12 14:51:07', '2014-11-12 14:52:45'),
(2, 'Outgoing invoice', '2014-11-12 14:51:15', '2014-11-12 14:52:53');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `invoices`
--
ALTER TABLE `invoices`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `invoice_types`
--
ALTER TABLE `invoice_types`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `companies`
--
ALTER TABLE `companies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `invoices`
--
ALTER TABLE `invoices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1057;
--
-- AUTO_INCREMENT voor een tabel `invoice_types`
--
ALTER TABLE `invoice_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
