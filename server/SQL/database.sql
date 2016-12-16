-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 16. Dez 2016 um 05:09
-- Server Version: 5.5.38
-- PHP-Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `bewerbungsapp`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `app_applications`
--

CREATE TABLE `app_applications` (
`appid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `json` longtext CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `creationdate` int(11) NOT NULL,
  `lasteditdate` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `app_applications`
--

INSERT INTO `app_applications` (`appid`, `userid`, `json`, `creationdate`, `lasteditdate`) VALUES
(1, 6, '{  "PersonalCollectionData": {    "firstname": "Tim",    "lastname": "Koepsel",    "email": "tim.moritz.koepsel@gmail.com",    "phonenumber": "01754808186",    "street": "Vulkanstraße",    "zipcode": 53179,    "city": "Bonn",    "jobtitle": "Programmierer",    "streetnumber": "48",    "birthdate": "1984-04-20T22:00:00.000Z",    "picture": "data:undefined;base64,undefined",    "ausbildung": false,    "twitter": "https://twitter.com/xzessmedia/",    "facebook": "https://www.facebook.com/tim.koepsel.5",    "xing": "https://www.xing.com/profile/Tim_Koepsel",    "github": "https://github.com/xzessmedia/",    "website": "http://www.xzessmedia.de",    "geburtsort": "Herford",    "familienstand": {      "name": "verlobt"    },    "kinder": "0",    "bruttogehaltprojahr": "42000",    "showMoney": true,    "skilldata": [      {        "id": 2,        "title": "Sonstiges",        "nodes": [          {            "id": 20,            "title": "Führerschein Klasse B",            "nodes": []          }        ]      },      {        "id": 3,        "title": "Sprachen",        "nodes": [          {            "id": 30,            "title": "Deutsch",            "nodes": []          },          {            "id": 31,            "title": "Englisch",            "nodes": []          }        ]      },      {        "id": 5,        "title": "Programmiersprachen",        "nodes": [          {            "id": 52,            "title": "C', 1480575858, 1480575858);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `app_applicationsubmissions`
--

CREATE TABLE `app_applicationsubmissions` (
`submissionid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `applytimestamp` int(11) NOT NULL,
  `replytimestamp` int(11) NOT NULL,
  `state` int(255) NOT NULL,
  `applicationcontent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `app_bugs`
--

CREATE TABLE `app_bugs` (
`bugid` int(11) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `app_bugs`
--

INSERT INTO `app_bugs` (`bugid`, `description`, `email`, `timestamp`) VALUES
(1, 'test', '0', 1480547719),
(2, 'testo', 'tim@penga.de', 1480548692),
(3, 'asdadaGebe hier eine genaue Beschreibung an', 'furz@gesicht.de', 1480548846),
(4, 'asdadaGebe hier eine genaue Beschreibung an', 'furz@gesicht.de', 1480548848),
(5, 'Gebe hier eine genaue Beschreibung an', 'tina@minga.de', 1480548898),
(6, 'Gebe hier eine genaue Beschreibung an', 'tim.moritz.koepsel@gmail.com', 1480553042),
(7, 'es ist gut', 'fulu@pom.de', 1480571501),
(8, 'Gebe hier eine genaue Beschreibung an', 'max.mustermann@musterdomain.de', 1481022305);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `app_clients`
--

CREATE TABLE `app_clients` (
`clientid` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `lastping` int(11) NOT NULL,
  `firstping` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `app_clients`
--

INSERT INTO `app_clients` (`clientid`, `ip`, `lastping`, `firstping`) VALUES
(1, '100.168.0.9', 1480475421, 1480474308),
(6, '::1', 1481282247, 1480475473);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `app_ideas`
--

CREATE TABLE `app_ideas` (
`ideaid` int(11) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `app_ideas`
--

INSERT INTO `app_ideas` (`ideaid`, `description`, `email`, `timestamp`) VALUES
(2, 'Eine gute Idee ist zu kiffen!', 'tonga@benga.de', 1480549226);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `app_users`
--

CREATE TABLE `app_users` (
`id` int(11) NOT NULL,
  `registrationdate` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `invitationcode` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `streetnumber` varchar(5) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `userlevel` int(20) NOT NULL,
  `lastpaymentid` int(30) NOT NULL,
  `lastlogin` int(11) NOT NULL,
  `lastping` int(11) NOT NULL,
  `Stats_PDFCreated` int(11) NOT NULL,
  `Stats_eApp` int(11) NOT NULL,
  `Stats_BugsSubmitted` int(11) NOT NULL,
  `Stats_IdeasSubmitted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `app_users`
--

INSERT INTO `app_users` (`id`, `registrationdate`, `firstname`, `lastname`, `password`, `email`, `invitationcode`, `street`, `streetnumber`, `phonenumber`, `zipcode`, `city`, `birthdate`, `userlevel`, `lastpaymentid`, `lastlogin`, `lastping`, `Stats_PDFCreated`, `Stats_eApp`, `Stats_BugsSubmitted`, `Stats_IdeasSubmitted`) VALUES
(1, 1480541123, 'Thomas', 'Freyaldenhoven', 'fettsack', 'thomas@race-hearing.de', '', '', '', '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1480541177, 'Tim', 'Koepsel', 'xitram2k', 'tim.koepsel@me.com', '', '', '', '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(7, 1480541335, 'Derya', 'Kaygusuz', 'love', 'derya_san@live.com', '', '', '', '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `app_applications`
--
ALTER TABLE `app_applications`
 ADD PRIMARY KEY (`appid`);

--
-- Indizes für die Tabelle `app_applicationsubmissions`
--
ALTER TABLE `app_applicationsubmissions`
 ADD PRIMARY KEY (`submissionid`);

--
-- Indizes für die Tabelle `app_bugs`
--
ALTER TABLE `app_bugs`
 ADD PRIMARY KEY (`bugid`);

--
-- Indizes für die Tabelle `app_clients`
--
ALTER TABLE `app_clients`
 ADD PRIMARY KEY (`clientid`), ADD UNIQUE KEY `ip` (`ip`);

--
-- Indizes für die Tabelle `app_ideas`
--
ALTER TABLE `app_ideas`
 ADD PRIMARY KEY (`ideaid`);

--
-- Indizes für die Tabelle `app_users`
--
ALTER TABLE `app_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `app_applications`
--
ALTER TABLE `app_applications`
MODIFY `appid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `app_applicationsubmissions`
--
ALTER TABLE `app_applicationsubmissions`
MODIFY `submissionid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `app_bugs`
--
ALTER TABLE `app_bugs`
MODIFY `bugid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `app_clients`
--
ALTER TABLE `app_clients`
MODIFY `clientid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `app_ideas`
--
ALTER TABLE `app_ideas`
MODIFY `ideaid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `app_users`
--
ALTER TABLE `app_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;