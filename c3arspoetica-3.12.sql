-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Čtv 03. pro 2015, 20:27
-- Verze serveru: 5.5.44-0+deb8u1
-- Verze PHP: 5.6.9-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `c3arspoetica`
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
  `description` text NOT NULL,
  `keyWords` varchar(200) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `underSection` int(11) DEFAULT NULL,
  `underSerial` int(11) DEFAULT NULL,
  `underSubSection` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `lastChange` datetime NOT NULL,
  `commentsAllow` tinyint(1) NOT NULL,
  `voteAllow` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `article`
--

INSERT INTO `article` (`id`, `byUser`, `url`, `title`, `text`, `description`, `keyWords`, `photo`, `underSection`, `underSerial`, `underSubSection`, `date`, `lastChange`, `commentsAllow`, `voteAllow`, `views`, `published`, `deleted`) VALUES
(28, 33, 'filipiny-jsme-si-zamilovali', 'Filipíny jsme si zamilovali', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Vedro. Radost. &Uacute;leva. Přijet&iacute;. A zase vedro. Konečně jsme tady. Cesta z maličk&eacute; Česk&eacute; republiky až na vzd&aacute;len&eacute; ostrovy v Asii byla n&aacute;ročn&aacute;. Pokud chcete zaž&iacute;t opravdov&eacute; dobrodružstv&iacute; na leti&scaron;ti, zkuste si v&aacute;&scaron; pas zapomenout, ztratit, nem&iacute;t platn&yacute; nebo si ho prostě jen na chv&iacute;li dejte do jin&eacute; kapsy, než jste zvykl&iacute;. Na&scaron;e &scaron;estičlenn&aacute; parta, kter&aacute; se vydala pomoci dětem bydl&iacute;c&iacute;ch ve slumech na Filip&iacute;n&aacute;ch, v&aacute;m to zcela jistě může potvrdit. &bdquo;Akce N&aacute;rtoun Filip&iacute;ny 2015&ldquo; je projekt, do něhož jsou zapojeny des&iacute;tky lid&iacute; a jde o zcela unik&aacute;tn&iacute; př&iacute;ležitost podělit se o na&scaron;e bohatstv&iacute; s těmi, kteř&iacute; takov&eacute; &scaron;těst&iacute; neměli.</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Po roce př&iacute;prav a pl&aacute;novan&iacute; jsme se na Filip&iacute;ny vypravili. Pět mlad&yacute;ch studentů z Plzně a jeden odv&aacute;žn&yacute; profesor ze ZČU. Jak jsem již zm&iacute;nila po na&scaron;&iacute; ne vždy lehk&eacute; cestě, jsme dorazili na m&iacute;sto. Vyčerpan&iacute;, se sp&aacute;nkov&yacute;m deficitem (přece jenom 8 hodin časov&eacute;ho posunu, to už chvilku trv&aacute;, než si tělo zvykne), ale plni nad&scaron;en&iacute; splnit &uacute;kol, kvůli němuž jsme sem přijeli. Měli jsme před sebou 14 dn&iacute; na to poznat m&iacute;stn&iacute; kulturu, sezn&aacute;mit se s obyvateli Filip&iacute;n, ale hlavně rozjet adopci na d&aacute;lku pro filip&iacute;nsk&eacute; děti v nouzi.</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; D&iacute;ky křesťansk&eacute; organizaci YWAM jsme hned v prvn&iacute;ch dnech mohli nav&scaron;t&iacute;vit slumy na okraji města Cagayan de Oro. Společně s na&scaron;imi překladateli jsme proch&aacute;zeli &uacute;zk&yacute;mi uličkami kolem provizorně postaven&yacute;ch bar&aacute;ků z desek a plechů, narychlo stlučen&yacute;ch dohromady. Tedy alespoň mně provizorn&iacute; připadaly. Pro rodiny ob&yacute;vaj&iacute;c&iacute; tyto př&iacute;bytky to v&scaron;ak byla celoživotn&iacute; realita. Dostalo se n&aacute;m př&iacute;ležitosti nahl&eacute;dnout př&iacute;mo dovnitř a velmi často i možnosti proniknout do života m&iacute;stn&iacute;ch. Sd&iacute;leli s n&aacute;mi sv&eacute; př&iacute;běhy, radosti, starosti. Člověk mohl jen žasnout nad t&iacute;m, jak m&aacute;lo maj&iacute; a st&aacute;le dok&aacute;žou b&yacute;t &scaron;ťastn&iacute;. Kolem n&aacute;s pob&iacute;haly děti jen bosky, hr&aacute;ly si s m&iacute;čem, zp&iacute;valy a tleskaly. Pr&aacute;vě těmto dětem nemohou rodiče zajistit dostatečn&eacute; vzděl&aacute;n&iacute; nebo i jen dostatek z&aacute;kladn&iacute;ch potřeb pro život, jako je j&iacute;dlo a voda.</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Jedn&iacute;m z nejlep&scaron;&iacute;ch z&aacute;žitků bylo, když jsme zrovna s nimi vyrazili do obchoď&aacute;ku nakoupit boty, ve kter&yacute;ch by mohly chodit do &scaron;koly. Jednalo se asi o osmdes&aacute;t dět&iacute;. Těchto osmdes&aacute;t dět&iacute;, plus n&aacute;s &scaron;est a je&scaron;tě několik dal&scaron;&iacute;ch pomocn&iacute;ků se naskl&aacute;dalo do tř&iacute; aut. Zn&iacute; to až neuvěřitelně, ale jak jsme zjistili, někter&eacute; věci tady funguj&iacute; prostě jinak. Tato auta nebo-li jeepney, jsou star&eacute; americk&eacute; jeepy z v&aacute;lky.<img style="display: block; margin-left: auto; margin-right: auto;" src="../../media/28/1.jpg" alt="" width="503" height="377" /></p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;M&iacute;stn&iacute; je přestavěli, pomalovali a nyn&iacute; je využ&iacute;vaj&iacute; jako prostředky MHD. Dovnitř se norm&aacute;lně vejde asi deset Evropanů nebo dvacet pět Filip&iacute;nců. Filip&iacute;nci jsou totiž drobněj&scaron;&iacute;ho vzrůstu a na rozd&iacute;l od n&aacute;s se neboj&iacute; kontaktu s ostatn&iacute;mi. Uvnitř pln&eacute;ho jeepneyho to pak vypad&aacute; jako u n&aacute;s v rann&iacute; tramvaji, kdyby do n&iacute; někdo nacpal je&scaron;tě o polovinu v&iacute;c lid&iacute;. Když takto naplněn&eacute; tři vozy zastavily před obchodem s botami, vysk&aacute;kali v&scaron;ichni ven a naběhli dovnitř. Kdo měl vybr&aacute;no, odevzdal svůj &uacute;lovek a &scaron;el domů. My jsme d&iacute;ky př&iacute;spěvkům a finančn&iacute;m darům v&scaron;echny p&aacute;ry bot zaplatili a večer jim je rozdali. To s jakou hrdost&iacute; si v nich dal&scaron;&iacute; den &scaron;kol&aacute;ci vykračovali, je nepopsateln&eacute;.</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;V dal&scaron;&iacute;ch dnech jsme pom&aacute;hali v jednom z Nehemi&aacute;&scaron;ov&yacute;ch domů, &uacute;stavu pro zneuž&iacute;van&eacute; d&iacute;vky. Opravili jsme střechu, vymalovali kuchyň a večery pak tr&aacute;vili s holkami, buď hran&iacute;m her, nebo třeba pom&aacute;h&aacute;n&iacute;m s dom&aacute;c&iacute;mi &uacute;koly.</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ty dva t&yacute;dny, kter&eacute; jsme na Filip&iacute;n&aacute;ch mohli str&aacute;vit, byly &uacute;žasn&eacute;. Poznali jsme jedny z nejmilej&scaron;&iacute;ch a nejusměvavěj&scaron;&iacute;ch lid&iacute; na světě. Z&aacute;roveň jsme ale viděli věci, kter&eacute; člověku vyraz&iacute; dech, nut&iacute; jej zamyslet se a přehodnotit svůj žebř&iacute;ček priorit. Př&iacute;rodn&iacute; katastrofy (zemětřesen&iacute; a čast&eacute; tajfuny) s nimiž se mus&iacute; Filip&iacute;nci pot&yacute;kat. Chudoba, hlad, nedostatek vzděl&aacute;n&iacute;. Děti žebraj&iacute;c&iacute; cel&yacute; den na ulici. Zřejmě se to zd&aacute; těžk&eacute;, ale něco prostě mus&iacute;me zaž&iacute;t a prož&iacute;t, abychom tomu dok&aacute;zali čelit. Abychom dok&aacute;zali zač&iacute;t měnit na&scaron;e životy a svět kolem n&aacute;s.</p>\n<p><img src="../../media/28/4.jpg" alt="" width="400" height="533" /></p>\n<p><img src="../../media/28/2.jpg" alt="" width="400" height="300" /></p>\n<p><img src="../../media/28/3.jpg" alt="" width="400" height="300" /></p>\n<p><img src="../../media/28/5.jpg" alt="" width="400" height="300" /></p>\n<p><img src="../../media/28/6.jpg" alt="" width="400" height="300" /></p>\n<p><img src="../../media/28/7.jpg" alt="" width="400" height="300" /></p>\n<p>Lucie Růžičkov&aacute;</p>', 'Vedro. Radost. Úleva. Přijetí. A zase vedro. Konečně jsme tady. Cesta z maličké České republiky až  na vzdálené ostrovy v Asii byla náročná.', '', 'FB_IMG_1447612731522-min.jpg', 4, NULL, NULL, '2015-12-01 01:17:44', '2015-12-01 20:32:10', 1, 1, 0, 1, 0),
(29, 31, 'blue-velvet-humans-to-humans', 'BLUE VELVET - HUMANS TO HUMANS', '<p><strong>Skvěl&aacute; akce, o kterou tolik z v&aacute;s při&scaron;lo. Litujte. M&aacute;te jedin&yacute; &scaron;těst&iacute;, že se pravděpodobně nekonala naposledy.</strong></p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; V sobotu 24. ř&iacute;jna 2015 se v nov&yacute;ch prostor&aacute;ch na adrese Vltav&iacute;nsk&aacute; 5, nedaleko obchodn&iacute;ho centra Olympie konala akce BLUE VELVET - HUMANS TO HUMANS. Akci poř&aacute;daly slečny Marie Mojseňukov&aacute; a Karol&iacute;na Kereste&scaron;ov&aacute;.</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mohli jste zde prod&aacute;vat sv&eacute; star&eacute; oblečen&iacute;, m&oacute;dn&iacute; doplňky, knihy nebo vlastnoručně vyroben&eacute; kousky či se na ně jen přij&iacute;t pod&iacute;vat, nakoupit, popov&iacute;dat si se spoustou zaj&iacute;mav&yacute;ch lid&iacute; nebo ochutnat v&yacute;born&eacute; dom&aacute;c&iacute; muffiny a limon&aacute;dy. Celkem se prod&aacute;valo u tř&iacute; stojanů. My (prod&aacute;vaj&iacute;c&iacute;) jsme nastoupili hned dopoledne, i když lid&eacute; chodili sp&iacute;&scaron;e až po obědě. Jak jsem zm&iacute;nila hned na zač&aacute;tku, &uacute;čast nebyla tak hojn&aacute;, ale odpoledne n&aacute;s při&scaron;li podpořit kamar&aacute;di a mysl&iacute;m, že jsme v&scaron;ichni ode&scaron;li spokojen&iacute;.</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Vyzdvihnout bych chtěla dvě věci. Za prv&eacute; organizaci pořadatelek, protože v&scaron;e zvl&aacute;dly opravdu na jedničku! A pak origin&aacute;ln&iacute; vlastnoručně vyroben&eacute; kousky Honzy Anděla, jehož dal&scaron;&iacute; tvorbu můžete sledovat na blogu andelsantinova.blogspot.cz, na kter&eacute;m spolupracuje, jak n&aacute;zev napov&iacute;d&aacute;, se svou kamar&aacute;dkou Denisou &Scaron;ant&iacute;novou. Hlavn&iacute; n&aacute;pln&iacute; blogu jsou, mimo jejich zm&iacute;něnou tvorbu, outfity, kav&aacute;rny, super m&iacute;sta a zaj&iacute;mav&eacute; ud&aacute;losti.</p>\n<p>O př&iacute;padn&eacute;m dal&scaron;&iacute;m kon&aacute;n&iacute; akce v&aacute;s budeme informovat.</p>\n<p>Veronika</p>\n<p>&nbsp;<img src="../../media/29/DSC_0288.JPG" alt="" width="576" height="382" /></p>\n<p><img src="../../media/29/DSCF7038.JPG" alt="DSCF7038.JPG" width="576" height="432" /></p>\n<p><img src="../../media/29/DSCF7004.JPG" alt="" width="576" height="381" /></p>\n<p><img src="../../media/29/DSC_0330.JPG" alt="" width="576" height="381" /></p>\n<p><img src="../../media/29/DSC_0302.JPG" alt="" width="576" height="381" /></p>\n<p>fotky: Barbora Doubkov&aacute;, Denisa &Scaron;ant&iacute;nov&aacute;, Jan Anděl a Kovy</p>', 'Skvělá akce, o kterou tolik z vás přišlo. Litujte. Máte jediný štěstí, že se pravděpodobně nekonala naposledy.\n', '', 'DSCF7048-min.JPG', 4, NULL, NULL, '2015-12-01 01:20:26', '2015-12-01 19:46:10', 1, 1, 0, 1, 0),
(30, 32, 'mezi-lidmi-se-pohybuji-kazdy-den-a-stale-objevuji', 'Mezi lidmi se pohybuji každý den a stále objevuji...', '<p>Ahoj, mil&iacute; čten&aacute;ři! <br /> M&eacute; jm&eacute;no je S&aacute;ra. Jsem studentka uměleck&eacute; &scaron;koly a připravila jsem si pro v&aacute;s rozhovory se zaj&iacute;mav&yacute;mi lidmi z Plzně. Zkr&aacute;tka si mysl&iacute;m, že stoj&iacute; za to v&aacute;m uk&aacute;zat rozmanitost pozoruhodn&yacute;ch lid&iacute;, kter&eacute; denně potk&aacute;v&aacute;te na ulic&iacute;ch a možn&aacute; i někter&eacute; z nich zn&aacute;te!</p>\n<p>M&eacute; rozhovory ponesou &scaron;t&iacute;tek "Mezi lidmi" a dnes se pod&iacute;v&aacute;me přesněji na p&aacute;r osobnost&iacute; z tanečn&iacute; skupiny &bdquo;BO&ldquo;, ve kter&eacute; sama tanč&iacute;m a moc dobře tuhle partičku zn&aacute;m. Takže se pojďme společně pod&iacute;vat, co n&aacute;m o sobě Kewin s Terkou prozradili...</p>\n<p>Hezk&eacute; čten&iacute;!</p>\n<p>&nbsp;</p>\n<p>&nbsp;<img style="float: left;" src="../../media/30/Kewin.jpg" alt="" width="681" height="431" /></p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p><strong>Kewin</strong></p>\n<p><strong>Ahoj Kewine, tak se nejdř&iacute;v představ na&scaron;im čten&aacute;řům. Někteř&iacute; tě možn&aacute; znaj&iacute; z mejdanů, ale přeci jen... Odkud jsi, kolik ti je, atd.?</strong></p>\n<p>No to nev&iacute;m, na takhle n&oacute;bl mejdany jen tak někoho nepou&scaron;těj&iacute;, takže&hellip; Neee, sranda samozřejmě! Jmenuji se Pavel Hranička a jsem hrd&yacute; Plzeň&aacute;k, kter&yacute; už m&aacute; na sv&eacute;m kontě 20 roků a z toho se už přes 12 let věnuji tanci.</p>\n<p><strong>Kdy jsi začal s tancov&aacute;n&iacute;m a co tě k tomu vedlo?</strong></p>\n<p>Tak s tancov&aacute;n&iacute;m sem začal po přistěhov&aacute;n&iacute; do Plzně a bylo to hned po m&yacute;ch osm&yacute;ch narozenin&aacute;ch a byli to asi moji rodiče, kteř&iacute; mě k tomu jakože vedli, protože od malička sem doma poslouchal p&iacute;sničky od Dj Tiesta a tak podobně, takže mě to k pohybu do hudby t&aacute;hlo samo.</p>\n<p><strong>Proč zrovna street dance?</strong></p>\n<p>Za těch 12 let jsem si vyzkou&scaron;el v&scaron;echno a to, od rock and rollu, latinu, klasiky, disco dance, moderny, ale street dance byl k m&eacute;mu srdci a du&scaron;i nejbl&iacute;ž.</p>\n<p><strong>Jak vznikla tvoje přezd&iacute;vka "Kewin"?</strong></p>\n<p>Na gymplu mi j&iacute; dala parta kamar&aacute;dů, kteř&iacute; už dř&iacute;v spolu chodili na &scaron;kolu a měli spoluž&aacute;ka, kter&yacute; mi pr&yacute; byl hrozně podobn&yacute; a ř&iacute;kali mu Kewin, ten kluk vypadal &uacute;plně jinak než j&aacute;, ale to už je vedlej&scaron;&iacute;, Kewin mi prostě zůstal.</p>\n<p><strong>Jak často do t&yacute;dne tancuje&scaron;? A kde? Jsi v nějak&eacute; skupině?</strong></p>\n<p>&nbsp;Tanč&iacute;m denně a to opravdu denně, protože si nemůžu dovolit "se zastavit", poř&aacute;d m&aacute;m je&scaron;tě před sebou v tanci hodně pr&aacute;ce, a proto mak&aacute;m, co to jde. Tancuji v tanečn&iacute; &scaron;kole B-Original, kde působ&iacute;m jako tanečn&iacute;k už &scaron;est&yacute;m rokem a teď od z&aacute;ř&iacute; jakožto lektor juniorsk&eacute; věkov&eacute; kategorie.</p>\n<p><strong>Jak&eacute; jsou tv&eacute; největ&scaron;&iacute; dosavadn&iacute; &uacute;spěchy v tanci i v životě?</strong></p>\n<p>V tanci je to asi každoročn&iacute; &uacute;čast na mistrovstv&iacute; republiky se složkou, ve kter&eacute; tancuji a v životě je to určitě pr&aacute;vě již zm&iacute;něn&yacute; tren&eacute;rsk&yacute; post. :)</p>\n<p><strong>Kromě tancov&aacute;n&iacute;, děl&aacute;&scaron; je&scaron;tě něco? Pracuje&scaron;?</strong></p>\n<p>Tanci d&aacute;v&aacute;m opravdu v&scaron;echno a je to vlastně i můj hlavn&iacute; př&iacute;jem co se t&yacute;če peněz, ale samozřejmě v&yacute;dajů je hodně, takže brig&aacute;dnič&iacute;m a přivyděl&aacute;v&aacute;m si v organizac&iacute;ch v&scaron;eho druhu, kde tak&eacute; vyučuji hip hop.</p>\n<p><strong>Pamatuje&scaron; si nějakou aktu&aacute;ln&iacute; hl&aacute;&scaron;ku, kterou použ&iacute;v&aacute;&scaron; ty a tvoje okol&iacute;?</strong></p>\n<p>Asi &uacute;plně nejv&iacute;c se teď uchytil "vě&scaron;&aacute;k" a "větr&aacute;k". Jelikož nad&scaron;en&iacute; z nově přidělan&yacute;ch vě&scaron;&aacute;ků v &scaron;atně se v primitivněj&scaron;&iacute;m světě vyj&aacute;dř&iacute; s pusou dokoř&aacute;n a neandrt&aacute;lsk&yacute;m t&oacute;nem jedině "vě&scaron;&aacute;k". A k tomu větr&aacute;ku? To si pov&iacute;me někdy jindy.</p>\n<p><strong>Vzkaz čten&aacute;řům?</strong></p>\n<p><br /> Jak řekl můj vousat&yacute; guru: ,,V zdrav&eacute;m těle, zdrav&yacute; duch&hellip; papaj pribiň&aacute;čka!"</p>\n<p>&nbsp;</p>\n<p>&nbsp;<img style="float: left;" src="../../media/30/Terka.jpg" alt="" width="651" height="431" /></p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;">&nbsp;</p>\n<p style="text-align: left;"><strong>Terka Susů</strong></p>\n<p><strong>Ahoj Terko, pros&iacute;m představ se na&scaron;im čten&aacute;řům, protože ne v&scaron;ichni tě možn&aacute; znaj&iacute;. Odkud jsi, kolik ti je? Řekni n&aacute;m něco o sobě.</strong></p>\n<p>Jmenuji se Tereza Susov&aacute;. Jsem z Plzně a je mi 17 let. Studuji grafick&yacute; design na Nerudovce a současně se snaž&iacute;m ze sebe vydat maximum, abych se dostala na uměleckou univerzitu Ladislava Sutnara, a tak si n&aacute;sledovně splnit můj největ&scaron;&iacute; sen - živit se v dospělosti uměn&iacute;m. M&yacute;m kon&iacute;čkem nen&iacute; jen uměn&iacute; na pl&aacute;tně, pap&iacute;ru či na čemkoliv jin&eacute;m, ale i na parketu - tanec.</p>\n<p><strong>Kdy jsi začala s tancov&aacute;n&iacute;m a co tě k tomu vedlo?</strong></p>\n<p>Do tanečn&iacute; komunity jsem se dostala před 3 roky, ale s prav&yacute;m tancov&aacute;n&iacute;m jsem začala až teprve tenhle rok, kdy jsem pochopila, co vlastně tanec pro tanečn&iacute;ky znamen&aacute;, i když tancuji jen pro radost a odreagov&aacute;n&iacute;. Upř&iacute;mně mě k tomu dovedla b&yacute;val&aacute; spolužačka a to jen kvůli tomu, že jsme nechtěly ztr&aacute;cet voln&yacute; čas v&aacute;len&iacute;m se na gauči, ale aby jsme se aspoň trochu h&yacute;baly.</p>\n<p><strong>Pověz n&aacute;m, co &nbsp;za druh tance vlastně děl&aacute;&scaron;?</strong></p>\n<p>Je to street dance. Na tr&eacute;ninku tancuji přev&aacute;žně hip hop. Hip hop je super, ale mus&iacute;m přiznat, že moje l&aacute;ska k waackin''u je přeci jen největ&scaron;&iacute; a převy&scaron;uje u mě v&scaron;echny ostatn&iacute; styly. Tento styl jsem se začala učit teprve toto l&eacute;to na BO Summer a nev&iacute;m jak, ale dopadlo to tak, že jsem byla v &ldquo;battlu&rdquo;. Tam jsem si uvědomila, jak tento styl miluji, a jak jsem d&iacute;ky tomuto stylu sama sebou.</p>\n<p><strong>Takže tancuje&scaron; v nějak&eacute; skupině? V jak&eacute; a jak často?</strong></p>\n<p>Tancuji ve skupině B - Original a na&scaron;im tren&eacute;rem je Michal Zvara a.k.a Maykl (sm&iacute;ch). Jak často? No snaž&iacute;m se chodit na každ&yacute; tr&eacute;nink, kter&yacute; m&aacute;me 2x t&yacute;dně, ale bohužel mi to teď moc nevych&aacute;z&iacute;, kvůli zdravotn&iacute;m probl&eacute;mům a &scaron;kole. Taky jezd&iacute;m na zimn&iacute; soustředěn&iacute;, kter&eacute; m&aacute;me vždy před soutěžn&iacute; sez&oacute;nou a v l&eacute;tě pak na B-O Summer, tedy na letn&iacute; tanečn&iacute; t&aacute;bor poř&aacute;dan&yacute; na&scaron;&iacute; tanečn&iacute; &scaron;kolou.</p>\n<p><strong>Zmiňovala si, že se věnuje&scaron; i uměn&iacute;? Co to obn&aacute;&scaron;&iacute;?</strong></p>\n<p>Věnovat se uměn&iacute; obn&aacute;&scaron;&iacute; mnoho věc&iacute;. Když pominu z&aacute;pory, jakožto m&aacute;lo sp&aacute;nku, časov&yacute; n&aacute;tlak a stres z toho, že zrovna nem&aacute;m inspiraci, či pen&iacute;ze na koupi nějak&eacute; kr&aacute;sn&eacute; akrylov&eacute; barvy, tak kladů je v&iacute;ce. M&aacute; snaha přin&aacute;&scaron;&iacute; ovoce a ne t&iacute;m, že by mě nejv&iacute;ce naplňovaly třeba dobr&eacute; zn&aacute;mky nebo pochvala od učitele, spoluž&aacute;ka. Sp&iacute;&scaron; mě naplňuje uměn&iacute; jako takov&eacute;. Naplňuje moji du&scaron;i a je vzduchem, kter&yacute; d&yacute;ch&aacute;m. Mohla bych ho tak&eacute; přirovnat k tlukotu srdce. Když v&aacute;m tluče srdce, v&iacute;te, že žijete. A pr&aacute;vě proto se uměn&iacute; stalo m&yacute;m zdrojem s&iacute;ly a životn&iacute;m stylem, protože v&iacute;m, že d&iacute;ky němu žiji.</p>\n<p><br /> <strong>To si napsala moc hezky! Řekni n&aacute;m teď pros&iacute;m, jestli m&aacute;&scaron; nějak&yacute; největ&scaron;&iacute; dosavadn&iacute; &uacute;spěchy v tanci i v životě?</strong></p>\n<p>Za m&eacute; největ&scaron;&iacute; dosavadn&iacute; &uacute;spěchy v tanci považuji za prv&eacute; to, že jsem se zlep&scaron;ila za 3 roky v tanci. Za druh&eacute; jsem se dostala do tanečn&iacute;ho battlu a z&iacute;skala pochvalu a obrovskou podporu, jak od sv&yacute;ch př&aacute;tel, tak i tanečn&iacute;ků a toho si neskutečně moc v&aacute;ž&iacute;m :). Tak&eacute; to, že jsem konečně na&scaron;la styl, d&iacute;ky kter&eacute;mu můžu uk&aacute;zat svoji osobnost, a kter&yacute; je mi přirozen&yacute; a c&iacute;t&iacute;m se v něm skvěle, že když ho tancuji před lidmi, tak stres odpadne a nav&iacute;c si je&scaron;tě ř&iacute;k&aacute;m: "Teď je show time, čas se předv&eacute;st a uk&aacute;zat co je ve mně!". Tyto &uacute;spěchy bych zařadila i do těch životn&iacute;ch. Tam je&scaron;tě patři asi i to, že jsem pomohla hodně lidem v životě chytit druh&yacute; dech. I to, že jsem se dostala na středn&iacute; uměleckou &scaron;kolu. A tak&eacute;, že um&iacute;m vykl&aacute;dat tarotov&eacute; karty, d&iacute;ky kter&yacute;m jsem mohla nasměrovat mnoho lid&iacute; spr&aacute;vnou cestou a pro skeptiky připom&iacute;n&aacute;m, že nekec&aacute;m a vždy jsem měla pravdu (sm&iacute;ch).</p>\n<p><strong>M&aacute;&scaron; nějakou aktu&aacute;ln&iacute; hl&aacute;&scaron;ku, kterou použ&iacute;v&aacute;&scaron; ty a tvoje okol&iacute;?</strong></p>\n<p>Těch je stra&scaron;ně moc. Např. když jsme my dvě spolu na tr&eacute;ninku a nejde n&aacute;m nic, tak ř&iacute;k&aacute;me, že dneska budou těžk&yacute; feestyles. Nebo z dnu otevřen&yacute;ch dveř&iacute; na fakultě, kde jsem byla s kamar&aacute;dy. To tam padala věta: "Jsi tady s&aacute;m za sebe!" A k t&eacute; n&aacute;s dovedl jeden z&aacute;jemce, kter&yacute; měl za sebou jako oc&aacute;sek svoj&iacute; maminku a od t&eacute; doby jsme si z toho dělali srandu. Vy se tomu nezasmějete, ale to nen&iacute; důležit&yacute;, hlavně, že se tomu směje tady S&aacute;ra a Rom&iacute;k. Taky moje čast&aacute; hl&aacute;&scaron;ka je, že když zdrav&iacute;m sv&eacute;ho př&iacute;tele, tak poř&aacute;d ř&iacute;k&aacute;m: "Čus, peace, čau!" A ukazuju na prstech znak peace, joo směju se tomu zase sama... (sm&iacute;ch)</p>\n<p><strong>Vzkaz čten&aacute;řům?</strong><br /> Jestli jste vydrželi a dostali jste se ve čten&iacute; m&yacute;ch keců až sem, tak d&iacute;ky. Mějte se pěkně a pamatujte si, že na konzultace na vysokou jdete sami za sebe. :D Takže peace, mějte se pěkně a přeji v&aacute;m hodně &uacute;spěchu ve va&scaron;em životě.</p>\n<p>&nbsp;</p>\n<p>fotky a rozhovor: S&aacute;ra Barto&scaron;kov&aacute;&nbsp;</p>', 'Ahoj, milí čtenáři!\nMé jméno je Sára. Jsem studentka umělecké školy a připravila jsem si pro vás rozhovory se zajímavými lidmi z Plzně. Zkrátka si myslím, že stojí za to vám ukázat rozmanitost pozoruhodných lidí, které denně potkáváte na ulicích a možná i některé z nich znáte!', '', 'Terka-min.jpg', 5, NULL, NULL, '2015-12-01 01:23:11', '2015-12-01 20:33:01', 1, 1, 0, 1, 0),
(31, 34, 'v-davu-ztracenych-dusi', 'V davu ztracených duší', '<p style="text-align: center;">Něco m&aacute;lo o mě: <br />"Umělkyně", kter&aacute; se zam&yacute;&scaron;l&iacute; nad smyslem v&scaron;eho, občas ale smysl postr&aacute;daj&iacute;c&iacute;. M&eacute; v&yacute;tvory jsou n&aacute;sledkem t&iacute;hy a sběru inspirace po v&scaron;ech koutech du&scaron;e. Děl&aacute; mě to svobodnou a nez&aacute;vislou.</p>\n<p style="text-align: center;">. . .</p>\n<p style="text-align: center;">Kdo jsi? Bloud&iacute;&scaron; v davu ztracen&yacute;ch du&scaron;&iacute; pohlcen lživ&yacute;mi tv&aacute;řemi ostatn&iacute;ch. Ztrh&aacute;vaj&iacute; tě z cesty a klamou na každ&eacute;m kroku kter&yacute; uděl&aacute;&scaron;. Nikde nejsou ž&aacute;dn&eacute; &scaron;ipky, ž&aacute;dn&yacute; směr. Přesto se nesm&iacute;&scaron; ztratit a zapomenout kdo jsi.</p>\n<p style="text-align: center;">Tak kdo jsi?</p>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../media/31/c.1.jpg" alt="" width="400" height="536" />&nbsp;</p>\n<p style="text-align: center;">Společnost od n&aacute;s každ&yacute; den něco oček&aacute;v&aacute; a vyžaduje. Když nespln&iacute;me jejich představy, st&aacute;v&aacute;me se bezcenn&yacute;mi. N&aacute;&scaron; nov&yacute; věrn&yacute; př&iacute;tel je frustrace , kter&aacute; s n&aacute;mi bloud&iacute; nekonečn&yacute;mi, st&aacute;le se opakuj&iacute;c&iacute;mi uličkami. Postavme se ale tomu v&scaron;emu tv&aacute;ř&iacute; a pojďme b&yacute;t svobodn&iacute;.</p>\n<p style="text-align: center;">&nbsp;</p>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../media/31/c.2.jpg" alt="" width="400" height="533" /></p>\n<p>&nbsp;</p>\n<p style="text-align: center;">Člověk se poř&aacute;d jen ohl&iacute;ž&iacute; a s něk&yacute;m se srovn&aacute;v&aacute;, takhle nemůže b&yacute;t nikdy voln&yacute;.</p>\n<p style="text-align: center;">&nbsp;</p>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../media/31/c.3.jpg" alt="" width="400" height="285" /></p>\n<p>&nbsp;</p>\n<p style="text-align: center;">Nejv&iacute;ce relaxačn&iacute; a uvolňuj&iacute;c&iacute; činnost&iacute; je malov&aacute;n&iacute; hudbou. Nech&aacute;te si pouze ty kr&aacute;sn&eacute; melodie proniknout do du&scaron;e a ony v&aacute;m už samy ruku povedou.</p>\n<p style="text-align: center;">&nbsp;</p>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../media/31/c.4.jpg" alt="" width="400" height="536" />&nbsp;</p>\n<p>Kateřina Vernerov&aacute;</p>', 'Něco málo o mě:  "Umělkyně", která se zamýšlí nad smyslem všeho, občas ale smysl postrádající. Mé výtvory jsou následkem tíhy a sběru inspirace po všech koutech duše. Dělá mě to svobodnou a nezávislou.', '', 'c.4-min.jpg', 3, NULL, NULL, '2015-12-01 19:21:10', '2015-12-01 20:06:20', 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `artTeam`
--

CREATE TABLE IF NOT EXISTS `artTeam` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `userId` int(11) NOT NULL,
  `description` text NOT NULL,
  `byUser` int(11) NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `news`
--

INSERT INTO `news` (`id`, `byUser`, `url`, `title`, `text`, `keyWords`, `date`, `deleted`) VALUES
(51, 17, 'zaciname', 'Začínáme !', 'Provoz našeho webu právě započal. Stále je ještě co dodělávat, ale makáme. :)', '', '2015-12-01 01:21:44', 0),
(52, 23, 'ahoj', 'Ahój!', 'začínáme!!!\n', '', '2015-12-01 09:54:01', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `newWriter`
--

CREATE TABLE IF NOT EXISTS `newWriter` (
`id` int(11) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `aboutUser` text NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `byUser` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `section`
--

CREATE TABLE IF NOT EXISTS `section` (
`id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `itemOrder` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `section`
--

INSERT INTO `section` (`id`, `url`, `name`, `description`, `itemOrder`) VALUES
(1, 'veda', 'Věda', 'Články z oblasti vědy', 1),
(3, 'umeni', 'Umění', 'Články z oblasti umění', 3),
(4, 'zajmy', 'Zájmy', 'Články o našich zájmech', 2),
(5, 'spolecnost', 'Společnost', 'Články z společnosti', 4);

-- --------------------------------------------------------

--
-- Struktura tabulky `serial`
--

CREATE TABLE IF NOT EXISTS `serial` (
`id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `byUser` int(11) NOT NULL,
  `articleOrder` varchar(200) NOT NULL,
  `underSection` int(11) NOT NULL,
  `underSubSection` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `subSection`
--

CREATE TABLE IF NOT EXISTS `subSection` (
`id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `underSection` int(11) NOT NULL,
  `itemOrder` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nickName` varchar(50) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `born` date NOT NULL,
  `registerTime` datetime NOT NULL,
  `checkCode` varchar(30) NOT NULL,
  `lostPasswordCode` varchar(30) DEFAULT NULL,
  `lostPasswordCodeTime` datetime DEFAULT NULL,
  `photo` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blockedUsersId` varchar(300) NOT NULL,
  `wall` tinyint(1) NOT NULL,
  `permissions` varchar(30) NOT NULL,
  `mailList` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `password`, `nickName`, `name`, `title`, `mail`, `born`, `registerTime`, `checkCode`, `lostPasswordCode`, `lostPasswordCodeTime`, `photo`, `about`, `gender`, `blockedUsersId`, `wall`, `permissions`, `mailList`, `deleted`) VALUES
(17, '$2y$10$3G5lza7H225RgrfxvurUMOeeJq9LOX71dI4wyNhruMOZJrOugNlJ.', 'k', 'Kryštof Trkovský', '', 'kivi8@seznam.cz', '2015-09-01', '2015-09-09 20:27:24', 'checked', NULL, NULL, '', '', 'no', '', 1, '11|11|111|11|1111|111|111|1', 0, 0),
(23, '$2y$10$fEd9l8pcy3m3Lr0vRv3HDu7x0jOb/.uVj0yChcNqhJrw4je.kbtJ.', 'jindra', 'Jindřich Čech', 'Šéfredaktor', 'arthardie@seznam.cz', '2015-09-01', '2015-12-01 09:45:44', 'checked', NULL, NULL, '', '', 'no', '', 0, '11|11|111|11|1111|111|111|1', 0, 0),
(25, '$2y$10$XlGyShxY2eJiBuUyHP0B5OwVzznm47glnN0GSHTawVU.mIVpSKgeO', NULL, '', '', 'vojtech@psenak.cz', '1970-01-01', '2015-12-01 20:47:19', 'checked', NULL, NULL, '', '', 'no', '', 0, '00|00|000|00|0000|000|000|0', 0, 0),
(26, '$2y$10$PrL0dMfmFKx7w/YYAzWTEu0iXAOYXw9CWK93WvOpFtOkTdMVqX2.i', 'Hana Komancová', '', '', 'hanakomancova@seznam.cz', '1970-01-01', '2015-12-01 21:38:32', 'qzj614iuzwiqnbn', NULL, NULL, '', '', 'no', '', 0, '00|00|000|00|0000|000|000|0', 0, 0),
(27, '$2y$10$k94IT38asHE/XeIk/ys0POfEoNNoes4RS8iw3HULtL/B4U4MlkEaK', 'Hanka', '', '', 'hanicka98m@seznam.cz', '1970-01-01', '2015-12-01 21:46:11', 'checked', NULL, NULL, '', '', 'no', '', 0, '00|00|000|00|0000|000|000|0', 0, 0),
(28, '$2y$10$UVN49gFe2wSMpTLQbJ9r6el16T8x7q2MT8NLJXEnG2D4rxA/6uOlC', 'Sára Piskunová', '', '', 'pisara@seznam.cz', '1970-01-01', '2015-12-02 11:54:49', 'checked', NULL, NULL, '', '', 'no', '', 0, '00|00|000|00|0000|000|000|0', 0, 0),
(29, '$2y$10$23wHIsZ1rQdguDlr7S5gL.6OyFcLLGwWFRQgp7iBpcf.9S3H1uOYe', 'Jindřich', '', '', 'liter5@seznam.cz', '1970-01-01', '2015-12-02 12:39:59', 'checked', NULL, NULL, '', '', 'no', '', 0, '00|00|000|00|0000|000|000|0', 0, 0),
(31, '$2y$10$zu/.KpN4m6qI5T2CifLyFOxsdBsM/yzqlV8SdTcpmDxQHBZa8B9Fq', 'veronika', 'Veronika Schöpferová', '', 'veronikaschopferova@seznam.cz', '2015-12-03', '2015-12-03 00:00:00', 'checked', NULL, NULL, '', '', 'fe', '', 0, '00|00|000|00|0000|000|000|0', 0, 0),
(32, '$2y$10$zu/.KpN4m6qI5T2CifLyFOxsdBsM/yzqlV8SdTcpmDxQHBZa8B9Fq', 'sarabartoskova', 'Sára Bartošková', '', 'sara.bartoskova@gmail.com', '2015-12-03', '2015-12-03 00:00:00', 'checked', NULL, NULL, '', '', 'fe', '', 0, '00|00|000|00|0000|000|000|0', 0, 0),
(33, '$2y$10$zu/.KpN4m6qI5T2CifLyFOxsdBsM/yzqlV8SdTcpmDxQHBZa8B9Fq', 'lucie', 'Lucie Růžičková', '', 'lucienka.ruzickova@gmail.com', '2015-12-03', '2015-12-03 00:00:00', 'checked', NULL, NULL, '', '', 'fe', '', 0, '00|00|000|00|0000|000|000|0', 0, 0),
(34, '$2y$10$zu/.KpN4m6qI5T2CifLyFOxsdBsM/yzqlV8SdTcpmDxQHBZa8B9Fq', 'katerina', 'Kateřina Vernerová', '', 'katharinna13@seznam.cz', '2015-12-03', '2015-12-03 00:00:00', 'checked', NULL, NULL, '', '', 'fe', '', 0, '00|00|000|00|0000|000|000|0', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
`id` int(11) NOT NULL,
  `voteForWhat` int(11) NOT NULL,
  `voteForId` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `byUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `action`
--
ALTER TABLE `action`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url`), ADD KEY `byUser` (`byUser`);

--
-- Klíče pro tabulku `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url`), ADD KEY `byUser` (`byUser`), ADD KEY `sectionId` (`underSection`), ADD KEY `serialId` (`underSerial`), ADD KEY `underSubSection` (`underSubSection`);

--
-- Klíče pro tabulku `artTeam`
--
ALTER TABLE `artTeam`
 ADD PRIMARY KEY (`id`), ADD KEY `userId` (`userId`);

--
-- Klíče pro tabulku `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`), ADD KEY `byUser` (`byUser`);

--
-- Klíče pro tabulku `commentUnder`
--
ALTER TABLE `commentUnder`
 ADD PRIMARY KEY (`id`), ADD KEY `byUser` (`byUser`), ADD KEY `forComment` (`forComment`);

--
-- Klíče pro tabulku `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`), ADD KEY `byUser` (`byUser`), ADD KEY `forUser` (`forUser`);

--
-- Klíče pro tabulku `multimedia`
--
ALTER TABLE `multimedia`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url`), ADD KEY `byUser` (`byUser`), ADD KEY `used` (`used`);

--
-- Klíče pro tabulku `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url`), ADD KEY `byUser` (`byUser`);

--
-- Klíče pro tabulku `newWriter`
--
ALTER TABLE `newWriter`
 ADD PRIMARY KEY (`id`), ADD KEY `byUser` (`byUser`);

--
-- Klíče pro tabulku `section`
--
ALTER TABLE `section`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url`);

--
-- Klíče pro tabulku `serial`
--
ALTER TABLE `serial`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url`), ADD KEY `underSection` (`underSection`), ADD KEY `underSubSection` (`underSubSection`), ADD KEY `byUser` (`byUser`);

--
-- Klíče pro tabulku `subSection`
--
ALTER TABLE `subSection`
 ADD PRIMARY KEY (`id`), ADD KEY `underSection` (`underSection`);

--
-- Klíče pro tabulku `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `mail` (`mail`), ADD UNIQUE KEY `lostPasswordCode` (`lostPasswordCode`), ADD UNIQUE KEY `nickName` (`nickName`);

--
-- Klíče pro tabulku `vote`
--
ALTER TABLE `vote`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pro tabulku `newWriter`
--
ALTER TABLE `newWriter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pro tabulku `section`
--
ALTER TABLE `section`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pro tabulku `serial`
--
ALTER TABLE `serial`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `subSection`
--
ALTER TABLE `subSection`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pro tabulku `vote`
--
ALTER TABLE `vote`
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
ADD CONSTRAINT `article_ibfk_5` FOREIGN KEY (`underSection`) REFERENCES `section` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `article_ibfk_6` FOREIGN KEY (`underSerial`) REFERENCES `serial` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `article_ibfk_7` FOREIGN KEY (`underSubSection`) REFERENCES `subSection` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

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

--
-- Omezení pro tabulku `newWriter`
--
ALTER TABLE `newWriter`
ADD CONSTRAINT `newWriter_ibfk_1` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `serial`
--
ALTER TABLE `serial`
ADD CONSTRAINT `serial_ibfk_1` FOREIGN KEY (`underSection`) REFERENCES `section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `serial_ibfk_2` FOREIGN KEY (`underSubSection`) REFERENCES `subSection` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `serial_ibfk_3` FOREIGN KEY (`byUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `subSection`
--
ALTER TABLE `subSection`
ADD CONSTRAINT `subSection_ibfk_1` FOREIGN KEY (`underSection`) REFERENCES `section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
