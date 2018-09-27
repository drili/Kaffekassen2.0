-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 27. 09 2018 kl. 11:28:12
-- Serverversion: 10.1.21-MariaDB
-- PHP-version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopcartsession1`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='products that can be added to cart';

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created`, `modified`, `category`) VALUES
(42, 'Lor\' Espresso |', 'Coffee plants are now cultivated in over 70 countries, primarily in the equatorial regions of the Americas, Southeast Asia, India, and Africa. The two most commonly grown are C. arabica and C. robusta. Once ripe, coffee berries are picked, processed, and dried. Dried coffee seeds (referred to as \"beans\") are roasted to varying degrees, depending on the desired flavor. Roasted beans are ground and then brewed with near-boiling water to produce the beverage known as coffee. ', '30.00', '2018-09-26 00:00:00', '2018-09-26 09:34:41', 'mocha'),
(41, 'Hummingbird Coffee |', 'Coffee is a brewed drink prepared from roasted coffee beans, the seeds of berries from certain Coffea species. The genus Coffea is native to tropical Africa (specifically having its origin in Ethiopia and Sudan) and Madagascar, the Comoros, Mauritius, and Reunion in the Indian Ocean.', '50.00', '2018-09-26 00:00:00', '2018-09-26 09:13:00', 'espresso'),
(43, 'Tazzetto Coffee |', 'The earliest credible evidence of coffee-drinking appears in Yemen in southern Arabia in the middle of the 15th century in Sufi shrines.[5] It was here in Arabia that coffee seeds were first roasted and brewed in a similar way to how it is now prepared. But the coffee seeds had to be first exported from East Africa to Yemen, as the Coffea arabica plant is thought to have been indigenous to the former.[6] ', '45.00', '2018-09-26 00:00:00', '2018-09-26 10:31:44', 'latte');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='image files related to a product';

--
-- Data dump for tabellen `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `created`, `modified`) VALUES
(112, 43, 'tazzetto2.jpg', '2018-09-26 00:00:00', '2018-09-26 10:33:09'),
(113, 43, 'tazzetto3.jpg', '2018-09-26 00:00:00', '2018-09-26 10:33:09'),
(111, 43, 'tazzetto1.jpg', '2018-09-26 00:00:00', '2018-09-26 10:33:09'),
(110, 42, 'lorespresso3.jpg', '2018-09-26 00:00:00', '2018-09-26 09:36:26'),
(109, 42, 'lorespresso2.jpg', '2018-09-26 00:00:00', '2018-09-26 09:35:58'),
(108, 42, 'lorespresso1.jpg', '2018-09-26 00:00:00', '2018-09-26 09:35:58'),
(105, 41, 'hummingbird3.jpg', '2018-09-26 00:00:00', '2018-09-26 09:29:07'),
(106, 41, 'hummingbird2.jpg', '2018-09-26 00:00:00', '2018-09-26 09:17:44'),
(107, 41, 'hummingbird1.jpg', '2018-09-26 00:00:00', '2018-09-26 09:29:32');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- Tilføj AUTO_INCREMENT i tabel `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
