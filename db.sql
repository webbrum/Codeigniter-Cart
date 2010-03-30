-- phpMyAdmin SQL Dump
-- version 2.9.2-Debian-1.one.com1
-- http://www.phpmyadmin.net
-- 
-- Värd: MySQL Server
-- Skapad: 30 mars 2010 kl 17:27
-- Serverversion: 5.0.32
-- PHP-version: 5.2.0-8+etch16
-- 
-- Databas: `smartprodukt_se`
-- 

-- --------------------------------------------------------

-- 
-- Struktur för tabell `blog`
-- 

CREATE TABLE `blog` (
  `id` int(11) NOT NULL auto_increment,
  `header` varchar(55) NOT NULL,
  `datetime` datetime NOT NULL,
  `text` text NOT NULL,
  `show_date` varchar(55) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Data i tabell `blog`
-- 

INSERT INTO `blog` VALUES (1, 'Öppnar portarna!', '2010-03-20 13:54:08', 'Sådär, nu lanseras Smartprodukt.se! Allt på webbutiken är inte riktigt klart ännu men alla grundfunktioner ska fungera i alla fall. Välkommen!\r\n<br /><br />\r\n<img src="/assets/graphics/blog/lanseringPrt.gif" style="border: 1px solid #ccc; text-align: center;" alt="" />', 'Mars 20, 2010');
INSERT INTO `blog` VALUES (3, 'Kortbetalning!', '2010-03-22 05:17:03', 'Hej! Nu har jag fixat så alla kunder kan betala sina beställningar med betalkort (VISA, MasterCard, etc) via PayPal betalsystem.<br /><br />\r\n<img src="/assets/graphics/blog/paypal.gif" style="border: 1px solid #ccc; text-align: center;" alt="" />', 'Mars 22, 2010');

-- --------------------------------------------------------

-- 
-- Struktur för tabell `blog_comments`
-- 

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL auto_increment,
  `entry_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `website` varchar(55) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Data i tabell `blog_comments`
-- 


-- --------------------------------------------------------

-- 
-- Struktur för tabell `ci_sessions`
-- 

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Data i tabell `ci_sessions`
-- 

-- --------------------------------------------------------

-- 
-- Struktur för tabell `customers`
-- 

CREATE TABLE `customers` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` varchar(55) NOT NULL,
  `city` varchar(100) NOT NULL,
  `number_advice` varchar(55) NOT NULL,
  `company` varchar(55) NOT NULL,
  `order_id` int(11) NOT NULL,
  `ip` varchar(55) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Data i tabell `customers`
-- 
-- --------------------------------------------------------

-- 
-- Struktur för tabell `newsletter`
-- 

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(55) NOT NULL,
  `ip` varchar(55) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Data i tabell `newsletter`
-- 


-- --------------------------------------------------------

-- 
-- Struktur för tabell `order_products`
-- 

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Data i tabell `order_products`
-- 


-- --------------------------------------------------------

-- 
-- Struktur för tabell `orders`
-- 

CREATE TABLE `orders` (
  `id` int(11) NOT NULL auto_increment,
  `complete` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Data i tabell `orders`
-- 

-- --------------------------------------------------------

-- 
-- Struktur för tabell `products`
-- 

CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `price` decimal(10,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `short_description` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- 
-- Data i tabell `products`
-- 

INSERT INTO `products` VALUES (6, '490.00', 'Trådlös multifunktionell mus', 'En trådlös multifunktionell mus som ger dig möjligheten att både hålla musen i handen och enkelt styra musen via laserklotet eller lägga den flata sidan mot skrivbordet och använda den som en vanlig lasermus. Fungerar på ett avstånd på upp till 10 meter med 2.4GHz inbyggt.Batteritiden är upp till 20 timmar, bara stoppa in i USB uttag och köra!', 'En trådlös multifunktionell mus som kan användas som en vanlig mus eller som en handmus.', 'handMus.gif');
INSERT INTO `products` VALUES (2, '145.00', 'Ergonomisk finger mus', 'En smidig finger mus som du enkelt bara stoppar in i USB uttaget och använder. Väger cirka 75% lättare än en vanlig mus. Finger musen ger dig möjligheten att kontrollera din mus samtidigt som du skriver. Perfekt mus i trånga utrymmen, såsom flygplan och tåg.', 'Smidig mus för trånga utrymmen, ger dit kontroll att styra musen samtidigt som du skriver.', 'fingerMus.gif');
INSERT INTO `products` VALUES (7, '245.00', 'USB-minne med fingeravtryck', 'Ett USB-minne som skyddar dina filer med ditt fingeravtryck. Operativsystem som stöds: Windows 98SE/ME/2000/XP. Bara att stoppa in i USB-ingång. Detta USB-minne har en lagringskapacitet på 1 GB. Perfekt för att skydda dina dokument och filer!', 'USB-minne som håller dina filer säkra med hjälp av ditt fingeravtryck', 'usbFinger.gif');
INSERT INTO `products` VALUES (8, '1290.00', 'GPS spårare', 'Med hjälp av våran GPS spårare kan du alltid övervaka dina båtar, bilar, djur eller andra personliga tillbehör.\r\n\r\nDenna GPS spårare skickar ett SMS till valda nummer så fort den t.ex beger sig utanför angivet område. Du får en väldigt exakt koordination som gör att du också kan följa den på en karta via t.ex Google Maps.\r\n\r\nDu kan även ringa upp enheten för att höra vad som sägs runt om kring. Med magneten som ingår kan du enkelt fästa enheten på ställen som inte syns.\r\n\r\nMedföljer:\r\nGPS-enheten med magnetisk baksida\r\nVattentätt plastfodral\r\n2st uppladdningsbarabatterier\r\n220V Väggladdare\r\nDockningsenhet för batteri\r\nCD-skiva med programvara för att se spårning live i datorn\r\nInstruktionsbok på Engelska', 'GPS spårare som gör att du alltid kan hålla koll på dina personliga tillbehör.', 'gpsTracker.gif');
INSERT INTO `products` VALUES (9, '590.00', 'Digitalt upprullningsbart piano', 'Ett extremt smidigt upprullningsbart piano med 64 tangenter, 128 olika ton funktioner, 100 olika rytmen inställningar och 40 olika demo sånger och musik inspelning. Ljudet uppspelas i MIDI. USB, vanliga AA batterier och laddare går att använda för att ge ström till enheten.', 'Smidigt piano som du enkelt kan bära med dig.', 'rollPiano.gif');
INSERT INTO `products` VALUES (10, '90.00', 'USB batteriladdare', 'En USB batteriladdare som används för att ladda upp dina AA/AAA batterier.', 'Ladda upp dina AA/AAA batterier.', 'usbBatteri.gif');
INSERT INTO `products` VALUES (11, '125.00', 'Kläds renare', 'Med våran kläds renare kan du snabbt och smidigt ta bort ditt ludd från kläderna. Kläds renaren drivas av två stycken AA batterier.', 'Kläds renare som hjälper dig hålla kläderna rena.', 'kladRenare.gif');
INSERT INTO `products` VALUES (12, '55.00', 'Nyckelthittare', 'Nyckelhittaren hjälper att alltid hålla koll på dina nycklar. Genom att vissla högt så börjar nyckelhittaren blinka och tjuta.', 'Med våran nyckelhittare kan du nu alltid hålla koll på dina nycklar.', 'nyckelHittare.gif');
INSERT INTO `products` VALUES (13, '55.00', 'Smart kabelsamlare', 'Med denna kabelsamlare slipper du all överflödes kablar och kan enkelt justera hur långt du vill dra ut sladden. Kabelsamlaren är gjord av återvinningsbar gummi.', 'Med våran kabelsamlare kan du nu glömma dina överflödes kablar.', 'cableCollector.gif');
INSERT INTO `products` VALUES (14, '95.00', 'Svart trådlös lasermus', 'Liten och enkel trådlös mus. Drivs av 2 stycken vanliga AAA batterier som medföljer. 2.4GHz radio trådlös radiofrekvens. inbygd 800DPI optisk spårning motor. Engelsk användarmanual och cd medföljer.', 'En enkel och billig trådlös mus, perfekt för mindre utrymmen.', 'tradlosMus.gif');
INSERT INTO `products` VALUES (15, '95.00', 'USB driven dammsugare', 'Tangentbordet brukar dra till sig mycket skräp som gör att knapparna blir sämre. Med våran USB drivna mini dammsugare kan du suga upp allt skräp som finns och hålla en längre livstid på dina tangenter!', 'Låt dina tangenter få en längre livstid med våran USB dammsugare!', 'usbDammsugare.gif');
INSERT INTO `products` VALUES (16, '1250.00', 'PS2 Keylogger', 'Behöver du hålla koll på dina anställda?\r\nBehöver du spara backup på dina anteckningar?\r\nEller kanske hålla koll på dina barns nätaktivitet? \r\n\r\nMed våran PS2 Keylogger sparar du varenda tangentryck som görs på datorn. Med minnet på 2 MB kan du spara över 1000 sidor av text (ca 6 månader av skrivning). PS2 Keyloggern blir inte upptäckt av något antivirusprogram eller av datorn. Kräver ingen installation, bara att enkelt plugga in mellan tangentbordet och datorn. För att ta del av all sparad information tycker du bara in en hemlig tangentkombination och får skriva in lösenordet som medföljer. Enheten är kompatibel med Windows, Linux och MacOS. ', 'Spara alla tangenttryck, plugga bara in enheten mellan tangentbordet och datorn!', 'ps2Keylogger.gif');
INSERT INTO `products` VALUES (17, '1450.00', 'USB Keylogger', 'Behöver du hålla koll på dina anställda?\r\nBehöver du spara backup på dina anteckningar?\r\nEller kanske hålla koll på dina barns nätaktivitet? \r\n\r\nMed våran USB Keylogger sparar du varenda tangentryck som görs på datorn. Med minnet på 2 MB kan du spara över 1000 sidor av text (ca 6 månader av skrivning). USB Keyloggern blir inte upptäckt av något antivirusprogram eller av datorn. Kräver ingen installation, bara att enkelt plugga in mellan tangentbordet och datorn. För att ta del av all sparad information tycker du bara in en hemlig tangentkombination och får skriva in lösenordet som medföljer. Enheten är kompatibel med Windows, Linux och MacOS.', 'Spara alla tangenttryck, plugga bara in enheten mellan tangentbordet och datorn!', 'usbKeylogger.gif');
INSERT INTO `products` VALUES (19, '105.00', 'USB Hub', 'Behöver du fler USB uttag? Med våran USB 2.0 Hub får du fler USB ingångar och slipper allt krångel med att koppla in och ut. Enheten har fyra stycken ingångar och kan föra över data med en hastighet upp till 480 Mbps. ', 'Få plats för fler USB ingångar och slipp krångel med att koppla in och ut.', 'usbHub.gif');
INSERT INTO `products` VALUES (20, '445.00', 'Spionkamera i nyckelring 4 GB', 'Extremt liten HD-kamera med grym bildkvalitet. Kan även spela in ljud och ta stillbilder. Med hela 4 GB så kan du även använda enheten som USB minne. Ingen installation krävs, bara Plug and Play.\r\n\r\nVideoupplösning: 640x480\r\nBildupplösning: 1280x960\r\nInspelningsformat: AVI\r\nBildsformat: JPEG\r\nBildfrekvens: 30/sekund\r\nInspelningstid max (batteri): ca 1 timma\r\nBatteri: uppladdningsbartbatteri 3.7V 280mAh, laddas via USB-kabeln (ca 2 timmar)\r\nAnslutning: USB\r\nMedföljer:\r\n* USB kabel\r\n* Nyckelring\r\n* Manual', 'Spela snabbt in trafiksituationer eller i skidbacken, bara din fantasi sätter stopp.', 'nyckelringKamera.gif');
