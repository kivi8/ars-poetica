-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Stř 19. srp 2015, 13:04
-- Verze serveru: 5.6.25-0ubuntu0.15.04.1
-- Verze PHP: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `ars-poetica`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL,
  `byUser` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `organizersId` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `byUser` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `keyWords` varchar(200) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `serialId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `lastChange` datetime NOT NULL,
  `commentsAllow` tinyint(1) NOT NULL,
  `voteAllow` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `voteCount` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `artTeam`
--

CREATE TABLE IF NOT EXISTS `artTeam` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `byUser` int(11) NOT NULL,
  `forId` int(11) NOT NULL,
  `forWhat` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `vote` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `commentUnder`
--

CREATE TABLE IF NOT EXISTS `commentUnder` (
  `id` int(11) NOT NULL,
  `byUser` int(11) NOT NULL,
  `forComment` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `vote` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `byUser` int(11) NOT NULL,
  `forUser` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `readed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `id` int(11) NOT NULL,
  `byUser` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `url` varchar(200) NOT NULL,
  `used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `byUser` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `keyWords` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `newWriter`
--

CREATE TABLE IF NOT EXISTS `newWriter` (
  `id` int(11) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `aboutUser` text NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `serial`
--

CREATE TABLE IF NOT EXISTS `serial` (
  `id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `name` int(11) NOT NULL,
  `description` text NOT NULL,
  `articleOrder` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nickName` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `born` date NOT NULL,
  `registerTime` datetime NOT NULL,
  `checkCode` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blockedUsersId` varchar(300) NOT NULL,
  `wall` tinyint(1) NOT NULL,
  `permissions` varchar(30) NOT NULL,
  `mailList` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `byUser` (`byUser`);

--
-- Klíče pro tabulku `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `byUser` (`byUser`),
  ADD KEY `sectionId` (`sectionId`),
  ADD KEY `serialId` (`serialId`);

--
-- Klíče pro tabulku `artTeam`
--
ALTER TABLE `artTeam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Klíče pro tabulku `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `byUser` (`byUser`);

--
-- Klíče pro tabulku `commentUnder`
--
ALTER TABLE `commentUnder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `byUser` (`byUser`),
  ADD KEY `forComment` (`forComment`);

--
-- Klíče pro tabulku `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `byUser` (`byUser`),
  ADD KEY `forUser` (`forUser`);

--
-- Klíče pro tabulku `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `byUser` (`byUser`),
  ADD KEY `used` (`used`);

--
-- Klíče pro tabulku `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `byUser` (`byUser`);

--
-- Klíče pro tabulku `newWriter`
--
ALTER TABLE `newWriter`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Klíče pro tabulku `serial`
--
ALTER TABLE `serial`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Klíče pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickName` (`nickName`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `artTeam`
--
ALTER TABLE `artTeam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `commentUnder`
--
ALTER TABLE `commentUnder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `newWriter`
--
ALTER TABLE `newWriter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `serial`
--
ALTER TABLE `serial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`sectionId`) REFERENCES `section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`serialId`) REFERENCES `serial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `artTeam`
--
ALTER TABLE `artTeam`
  ADD CONSTRAINT `artTeam_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `commentUnder`
--
ALTER TABLE `commentUnder`
  ADD CONSTRAINT `commentUnder_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `commentUnder_ibfk_2` FOREIGN KEY (`forComment`) REFERENCES `comment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`forUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `multimedia_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `multimedia_ibfk_3` FOREIGN KEY (`used`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
