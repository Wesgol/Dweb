-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Már 23. 12:28
-- Kiszolgáló verziója: 10.1.30-MariaDB
-- PHP verzió: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `fusz`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 NOT NULL,
  `jelszo` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `felhasznalonev` varchar(250) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `email`, `jelszo`, `felhasznalonev`) VALUES
(1, 'teszt@gmail.com', '34228a532093278fcdc65c3a1338482e8bdc44f6', 'teszt'),
(2, 'fefe@gmail.com', '544eeb5905ea1b24566b1c39a2f31e2b466895a6', 'fefe'),
(3, 'pogiff@gmail.com', '67e49267340d065a10fdae690f925f28fa1ddb3d', 'pogiff'),
(4, 'gereb@gmail.com', 'e10b5dd2dfccbf4c18b31d2306e715ccfc169afd', 'geréb'),
(5, 'fefe@gmail.com', '3f7b1e2a98dea15069fdc2542560c21bf5fd8234', 'fefe5');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `referencia_forditas`
--

CREATE TABLE `referencia_forditas` (
  `id` int(11) NOT NULL,
  `ref_ford_szoveg` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `referencia_forditas`
--

INSERT INTO `referencia_forditas` (`id`, `ref_ford_szoveg`) VALUES
(1, 'Könyv: Katona Krisztina (szerk.): A forrás magam vagyok – Tapasztalatok börtönben való személyiség- és közösségfejlesztő munkáról\r\n<p>Webes felület: <a class=\"linkcolor\" href=\"http://bibliobus.csgyk.hu/en/\" target=\"_blank\">http://bibliobus.csgyk.hu/en/</a></p>');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `referencia_infokt`
--

CREATE TABLE `referencia_infokt` (
  `id` int(11) NOT NULL,
  `ref_infokt_szoveg` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `referencia_infokt`
--

INSERT INTO `referencia_infokt` (`id`, `ref_infokt_szoveg`) VALUES
(1, '\"Köszönet azért a fiatalos lendülettel átadott kiváló szakmai munkáért, amellyel bevezetett az internethasználat szövevényes rejtelmeibe, ezáltal lehetőséget biztosítva a sikeres jövőbeni alkalmazáshoz.\" Joli');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `referencia_lektoralas`
--

CREATE TABLE `referencia_lektoralas` (
  `id` int(11) NOT NULL,
  `ref_lekt_szoveg` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `referencia_lektoralas`
--

INSERT INTO `referencia_lektoralas` (`id`, `ref_lekt_szoveg`) VALUES
(1, '<p>KönyvtárMozi füzetek: <a class=\"linkcolor\" href=\"http://filmpakk.csgyk.hu\" target=\"_blank\">http://filmpakk.csgyk.hu</a></p>');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rolam`
--

CREATE TABLE `rolam` (
  `id` int(8) NOT NULL,
  `bekezdes` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `rolam`
--

INSERT INTO `rolam` (`id`, `bekezdes`) VALUES
(1, 'Németh Luca vagyok, végzettségem szerint klasszika-filológus. Egyetemi tanulmányaim során rengeteg szöveggel foglalkoztam, megtanultam azt, hogy hogyan lehet hatékonyan fordításokat készíteni, illetve hogy a modern eszközöket hogyan használhatom fel céljaim elérése érdekében.\r\n'),
(2, 'A <i>Figyelem, új szó!</i> oldalon kétféle szolgáltatást kínálok.\r\n'),
(3, 'Az egyik a fordítói és lektor tevékenység, amelyekhez sok éves tapasztalat áll rendelkezésemre. Az antik, ógörög és latin nyelvű szövegekkel való foglalatoskodás mellett szaknyelvi ismeretre tettem szert angol és német nyelven is a témával kapcsolatban. Modern szövegek fordítását angol nyelvből vállalom.'),
(4, 'Másik tevékenységem az informatikai oktatás, amelyet 4 éve gyakorlok. Kezdő szinttől kezdve a mindennapi gördülékeny internethasználatig készítem fel tanítványaimat, hogy magabiztosan tudják használni informatikai eszközeiket. Csoportos órák mellett egyéni tanácsadásra is van lehetőség. A tapasztalat azt mutatja, hogy a legfontosabb és leghatékonyabb az egyéni gyakorlás, viszont a felmerülő akadályok kapcsán hasznos, ha valaki segítséget tud nyújtani a problémákkal kapcsolatban. Foglalkozásaimon nem a szaknyelv használatával, hanem mindennapi kifejezésekkel, tisztán és világosan tekintjük át a lehetőségeket.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szolgaltatasok_forditas`
--

CREATE TABLE `szolgaltatasok_forditas` (
  `id` int(11) NOT NULL,
  `forditas_szoveg` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szolgaltatasok_forditas`
--

INSERT INTO `szolgaltatasok_forditas` (`id`, `forditas_szoveg`) VALUES
(1, 'Hosszabb és rövidebb szövegek fordítását egyaránt vállalom, elsődleges profilom az angolról magyarra, illetve magyarról angolra történő fordítás. Munkám során fontosnak tartom a formai és tartalmi jellemzők megtartását is, amennyire a nyelvi sajátosságok engedik.'),
(2, 'Díjszabás: 1,7 Forint/leütés.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szolgaltatasok_infokt`
--

CREATE TABLE `szolgaltatasok_infokt` (
  `id` int(11) NOT NULL,
  `infokt_szoveg` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szolgaltatasok_infokt`
--

INSERT INTO `szolgaltatasok_infokt` (`id`, `infokt_szoveg`) VALUES
(1, '2014 óta foglalkozom informatikai oktatással, először családon belül szereztem tapasztalatot, majd könyvtári órák keretében vezettem csoportokat kezdő szintről indulva, így jutottunk el az e-mail küldésig. Csoportos foglalkozások mellett egyéni, személyre szabott tanácsadást is vállalok, haladóbb szinten ezt tartom célravezetőbbnek is. A szaknyelv túlzott használata nélkül, a mindennapi problémákra fókuszálva adok segítséget a hatékony, magabiztos számítógép-használathoz.'),
(2, 'Díjszabás: 1000 Forint/óra.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szolgaltatasok_lektoralas`
--

CREATE TABLE `szolgaltatasok_lektoralas` (
  `id` int(11) NOT NULL,
  `lektoralas_szoveg` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szolgaltatasok_lektoralas`
--

INSERT INTO `szolgaltatasok_lektoralas` (`id`, `lektoralas_szoveg`) VALUES
(1, 'Filológusként különösen ügyelek arra, hogy a szövegek, amelyekkel foglalkozom, igényesen legyenek megformálva. Úgy gondolom, hogy magánemberek és cégek számára egyaránt fontos, hogy mondanivalójuk pontosan és hibamentesen kerüljön megjelenítésre. Az igényeknek megfelelő szinten (mondatszerkesztés, tartalmi kritika vagy csupán központozás) javítok a rám bízott szövegeken.'),
(2, 'Díjszabás: 1,5 Forint/leütés.');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `referencia_forditas`
--
ALTER TABLE `referencia_forditas`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `referencia_infokt`
--
ALTER TABLE `referencia_infokt`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `referencia_lektoralas`
--
ALTER TABLE `referencia_lektoralas`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `rolam`
--
ALTER TABLE `rolam`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `szolgaltatasok_forditas`
--
ALTER TABLE `szolgaltatasok_forditas`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `szolgaltatasok_infokt`
--
ALTER TABLE `szolgaltatasok_infokt`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `szolgaltatasok_lektoralas`
--
ALTER TABLE `szolgaltatasok_lektoralas`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `referencia_forditas`
--
ALTER TABLE `referencia_forditas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `referencia_infokt`
--
ALTER TABLE `referencia_infokt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `referencia_lektoralas`
--
ALTER TABLE `referencia_lektoralas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `rolam`
--
ALTER TABLE `rolam`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `szolgaltatasok_forditas`
--
ALTER TABLE `szolgaltatasok_forditas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `szolgaltatasok_infokt`
--
ALTER TABLE `szolgaltatasok_infokt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `szolgaltatasok_lektoralas`
--
ALTER TABLE `szolgaltatasok_lektoralas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
