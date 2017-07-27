-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 30. Desember 2013 jam 09:46
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marlboro_inorout_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `events_gallery`
--

CREATE TABLE IF NOT EXISTS `events_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventid` int(11) DEFAULT NULL,
  `img` text,
  `cityid` int(11) DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `events_gallery`
--

INSERT INTO `events_gallery` (`id`, `eventid`, `img`, `cityid`, `n_status`) VALUES
(1, 3, 'popupflashplayer.jpg', 163, 1),
(2, 3, 'map_yellowcab.jpg', 204, 1),
(3, 1, 'popupflashplayer.jpg', 0, 1),
(4, 4, 'map_yellowcab.jpg', 163, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
