/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.32-0ubuntu0.13.04.1 : Database - marlboro_inorout_web
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`marlboro_inorout_web` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `marlboro_inorout_web`;

/*Table structure for table `city_references` */

DROP TABLE IF EXISTS `city_references`;

CREATE TABLE `city_references` (
  `id` int(10) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `city_references` */

insert  into `city_references`(id,city) values (130,'(NOT SPECIFIED)'),(163,'BAYURIT'),(204,'GABAHAN'),(232,'KELUSA'),(263,'LONGKAI'),(267,'LUMTENG'),(280,'MALBUNGO'),(316,'PAIRI'),(322,'PANAKAN'),(327,'PANJER'),(339,'PEMATANG TEBIH'),(340,'PENGKOR'),(345,'POLMAS SEMARANG'),(380,'SIANTA'),(439,'TS MANDALA'),(452,'ACEH TIMUR'),(2186,'ACEH SINGKIL'),(2187,'ACEH TAMIANG'),(2216,'BLANG PIDIE'),(2245,'KUALA SIMPANG'),(2248,'KUTACANE'),(2273,'MEULABOH'),(2340,'TAKENGON'),(384,'SIGLI'),(342,'PIDIE'),(261,'LHOKSEUMAWE'),(257,'LANGSA'),(171,'BIREUN'),(131,'ACEH'),(138,'BANDA ACEH'),(145,'BANGLI'),(134,'AMLAPURA'),(136,'BADUNG'),(183,'BULELENG'),(199,'DENPASAR'),(240,'KLUNGKUNG'),(222,'JIMBARAN'),(206,'GIANYAR'),(219,'JEMBRANA'),(310,'NUSA DUA'),(303,'NEGARA'),(293,'MENGWI'),(385,'SINGARAJA'),(368,'SANUR'),(372,'SEMARA PURA'),(374,'SEMINYAK'),(379,'SESETAN'),(410,'TABANAN'),(2325,'SEMPIDI'),(473,'SEMARAPURA'),(466,'KARANG ASEM'),(453,'BANGKA SELATAN'),(2347,'TANJUNGPANDAN'),(324,'PANGKAL PINANG'),(141,'BANGKA BARAT'),(142,'BANGKA-BELITUNG'),(151,'BANTEN'),(193,'CILEDUG'),(194,'CILEGON'),(186,'CARITA'),(323,'PANDEGLANG'),(414,'TANGERANG'),(376,'SERANG'),(378,'SERPONG'),(356,'RANGKASBITUNG'),(2220,'CIPUTAT'),(2256,'LEBAK'),(359,'REJANG LEBONG'),(166,'BENGKULU'),(167,'BENGKULU SELATAN'),(208,'GORONTALO'),(2259,'LIMBOTO'),(394,'SORONG'),(287,'MANOKWARI BARAT'),(215,'JAKARTA'),(2228,'JAKARTA BARAT'),(2229,'JAKARTA PUSAT'),(2230,'JAKARTA SELATAN'),(2232,'JAKARTA UTARA'),(456,'JAKARTA TIMUR'),(2179,'(NOT SPECIFIED)'),(2204,'BANGKO'),(2349,'TELANAI PURA'),(2359,'TUNGKAL ILIR'),(2326,'SENGETI'),(2338,'SUNGAI PENUH'),(2318,'SAROLANGUN'),(2277,'MUARO JAMBI'),(2272,'MERANGIN'),(216,'JAMBI'),(236,'KERINCI'),(158,'BATANGHARI'),(148,'BANJAR NEGARA'),(140,'BANDUNG'),(146,'BANJAR'),(188,'CIAMIS'),(189,'CIANJUR'),(190,'CIBINONG'),(191,'CIBITUNG'),(195,'CIMAHI'),(196,'CIREBON'),(197,'DEBOTABEK'),(200,'DEPOK'),(164,'BEKASI'),(174,'BOGOR'),(235,'KERAWANG'),(227,'KARAWANG'),(213,'INDRAMAYU'),(214,'JABOTABEK'),(205,'GARUT'),(248,'KUNINGAN'),(260,'LEMBANG'),(275,'MAJALENGKA'),(398,'SUBANG'),(399,'SUKABUMI'),(393,'SOREANG'),(404,'SUMEDANG'),(352,'PURWAKARTA'),(369,'SAWANGAN'),(2288,'PAMANUKAN'),(2289,'PANGANDARAN'),(2296,'PELABUHAN RATU'),(2330,'SINGAPARNA'),(2218,'CICALENGKA'),(2219,'CIGUGUR'),(2180,'(NOT SPECIFIED)'),(475,'BAYURIT'),(469,'BADUNG'),(470,'JAKARTA'),(424,'TASIKMALAYA'),(426,'TEGAL'),(427,'TEMANGGUNG'),(448,'WONOGIRI'),(450,'WONOSOBO'),(443,'UNGARAN'),(468,'SOLO'),(476,'CIBINONG'),(474,'SLEMAN'),(472,'SANGGAU'),(479,'SEMINYAK'),(2208,'BANJARNEGARA'),(2236,'KARANGANYAR'),(2237,'KARTOSURO'),(2239,'KERTOSONO'),(2250,'KUTOARJO'),(373,'SEMARANG'),(353,'PURWODADI'),(354,'PURWOKERTO'),(355,'PURWOREJO'),(360,'REMBANG'),(363,'SALATIGA'),(401,'SUKOHARJO'),(396,'SRAGEN'),(389,'SLAWI'),(299,'MUNTILAN'),(331,'PATI'),(351,'PURBALINGGA'),(337,'PEMALANG'),(334,'PEKALONGAN'),(276,'MAJENANG'),(273,'MAGELANG'),(258,'LARANGAN'),(245,'KUDUS'),(207,'GOMBONG'),(211,'GROBOGAN'),(229,'KEBUMEN'),(221,'JEPARA'),(239,'KLATEN'),(233,'KENDAL'),(226,'KARANG ANYAR'),(231,'KEDUNG TURI'),(181,'BREBES'),(173,'BLORA'),(179,'BOYOLALI'),(198,'DEMAK'),(192,'CILACAP'),(187,'CEPU'),(132,'AMBARAWA'),(153,'BANYUMAS'),(157,'BATANG'),(159,'BATU'),(154,'BANYUWANGI'),(143,'BANGKALAN'),(175,'BOJONEGORO'),(176,'BONDOWOSO'),(172,'BLITAR'),(223,'JOMBANG'),(230,'KEDIRI'),(210,'GRESIK'),(218,'JEMBER'),(259,'LAWANG'),(254,'LAMONGAN'),(274,'MAGETAN'),(271,'MADIUN'),(272,'MADURA'),(330,'PASURUAN'),(350,'PROBOLINGGO'),(346,'PONOROGO'),(321,'PAMEKASAN'),(297,'MOJOKERTO'),(312,'PACITAN'),(305,'NGANJUK'),(306,'NGAWI'),(266,'LUMAJANG'),(279,'MALANG'),(388,'SITUBONDO'),(382,'SIDOARJO'),(400,'SUKODONO'),(405,'SUMENEP'),(407,'SURABAYA'),(365,'SAMPANG'),(446,'WARU'),(440,'TUBAN'),(441,'TULUNG AGUNG'),(438,'TRENGGALEK'),(2329,'SIDAYU'),(2302,'PORONG'),(2306,'PURWOSARI'),(2292,'PARE'),(2358,'TULUNGAGUNG'),(2297,'PEMANGKAT'),(2300,'PONTIANAK SELATAN'),(2301,'PONTIANAK TIMUR'),(2280,'NGABANG'),(2271,'MEMPAWAH'),(2307,'PUTUSSIBAU'),(2323,'SEKURA'),(2333,'SINTANG'),(2255,'LANDAK'),(367,'SANGGAU'),(386,'SINGKAWANG'),(347,'PONTIANAK'),(237,'KETAPANG'),(243,'KOTA BARU'),(147,'BANJAR BARU'),(149,'BANJARMASIN'),(289,'MARTAPURA'),(409,'TABALONG'),(2226,'HULU SUNGAI SELATAN'),(2205,'BANJAR'),(2206,'BANJARMASIN TIMUR'),(2207,'BANJARMASIN UTARA'),(2192,'AMUNTAI'),(2210,'BARABAI'),(2211,'BARITO KUALA'),(2212,'BARITO TIMUR'),(2181,'(NOT SPECIFIED)'),(2267,'MARABAHAN'),(2299,'PLEIHARI'),(2294,'PARINGIN'),(2285,'PAGATAN'),(2341,'TANAH BUMBU'),(2290,'PANGKALAN BUN'),(2313,'SAMBAS'),(477,'JEPARA'),(478,'KUDUS'),(2235,'KAPUAS'),(2244,'KUALA KAPUAS'),(366,'SAMPIT'),(317,'PALANGKARAYA'),(185,'BUNTOK'),(178,'BONTANG'),(168,'BERAU'),(137,'BALIKPAPAN'),(246,'KUKAR'),(250,'KUTAI BARAT'),(251,'KUTAI KARTANEGARA'),(212,'GROGOT'),(329,'PASIR PENGARAYAN'),(281,'MALINAU'),(309,'NUNUKAN'),(364,'SAMARINDA'),(413,'TANAH GROGOT'),(419,'TANJUNG REDEB'),(420,'TANJUNG SELOR'),(2262,'LOA JANAN'),(2263,'LOA KULU'),(2249,'KUTAI TIMUR'),(2213,'BARONGTONGKOK'),(2217,'BULUNGAN'),(2193,'ANGGANA'),(2199,'BALIKPAPAN SELATAN'),(2200,'BALIKPAPAN TIMUR'),(460,'PENAJAM PASER UTARA'),(430,'TENGGARONG'),(422,'TARAKAN'),(2314,'SANGA-SANGA'),(2315,'SANGATTA'),(2316,'SANGKULIRANG'),(2320,'SEBULU'),(2310,'SAMARINDA ILIR'),(2311,'SAMARINDA ULU'),(2312,'SAMARINDA UTARA'),(2270,'MELAK ULU'),(2274,'MUARA BADAK'),(2275,'MUARA JAWA'),(2276,'MUARA KAMAN'),(2354,'TG. REDEP'),(433,'TG UBAN'),(417,'TANJUNG PINANG'),(156,'BATAM'),(139,'BANDAR LAMPUNG'),(255,'LAMPUNG'),(295,'METRO'),(458,'LAMPUNG TIMUR'),(2182,'(NOT SPECIFIED)'),(2202,'BANDAR JAYA'),(2252,'LAMPUNG SELATAN'),(2253,'LAMPUNG TENGAH'),(2254,'LAMPUNG UTARA'),(2261,'LIWA'),(2240,'KOTA GAJAH'),(2241,'KOTABUMI'),(2242,'KRUI'),(2238,'KEDATON'),(2233,'KALIANDA'),(2234,'KALIREJO'),(2357,'TULANG BAWANG'),(2343,'TANGGAMUS'),(2344,'TANJUNG BINTANG'),(2345,'TANJUNG KARANG'),(2362,'WAY JEPARA'),(2363,'WAY KANAN'),(2364,'WAY TERUSAN NUNYAI'),(2279,'NATAR'),(2286,'PAGELARAN'),(2303,'PRINGSEWU'),(2335,'SUKADANA'),(133,'AMBON'),(2355,'TIDORE'),(2183,'(NOT SPECIFIED)'),(431,'TERNATE'),(432,'TERNATE UTAMA'),(2309,'SAKRA BARAT'),(2304,'PUJUT'),(169,'BIMA'),(201,'DOMPU'),(262,'LOMBOK'),(290,'MATARAM'),(403,'SUMBAWA'),(402,'SUMBA BARAT'),(291,'MAUMERE'),(249,'KUPANG'),(2336,'SUMBA'),(2281,'NGADA'),(2257,'LEMBATA'),(2224,'FLORES'),(2222,'ENDE'),(2194,'ATAMBUA'),(2197,'BAJAWA'),(2223,'FAKFAK'),(2266,'MANOKWARI'),(434,'TIMIKA'),(454,'BIAK NUMFOR'),(445,'WAMENA'),(217,'JAYAPURA'),(294,'MERAUKE'),(302,'NABIRE'),(335,'PEKANBARU'),(336,'PELALAWAN'),(285,'MANDAU'),(361,'RENGAT'),(362,'RIAU'),(225,'KAMPAR'),(202,'DUMAI'),(144,'BANGKINANG'),(462,'ROKAN HULU'),(463,'SIAK'),(428,'TEMBI LAHAN'),(429,'TEMBILAHAN'),(2260,'LIRIK'),(2227,'INDRAGIRI HILIR'),(2243,'KUALA ENOK'),(2246,'KUBU'),(2215,'BENGKALIS'),(2190,'AIR MOLEK'),(2191,'AIR TIRIS'),(2195,'BAGAN BATU'),(2196,'BAGAN SIAPIAPI'),(2337,'SUNGAI PAKNING'),(2334,'SOREK'),(2324,'SELAT PANJANG'),(2308,'ROKAN'),(2350,'TELUK KUATAN'),(2352,'TG. BALAI KARIMUN'),(2353,'TG. BATU'),(461,'POLEWALI MANDAR'),(277,'MAJENE'),(282,'MAMUJU'),(286,'MANGKUTANA'),(288,'MAROS'),(343,'PINRANG'),(344,'POLMAS'),(319,'PALOPO'),(325,'PANGKEJENE'),(326,'PANGKEP'),(328,'PARE-PARE'),(358,'RAPPANG'),(387,'SINJAI'),(371,'SELAYAR'),(375,'SENGKANG'),(395,'SOROWAKO'),(383,'SIDRAP'),(392,'SOPPENG'),(406,'SUNGGUMINASA'),(408,'SOROAKO'),(411,'TAKALAR'),(412,'TANA TORAJA'),(278,'MAKASAR'),(268,'LUWU'),(269,'LUWU TIMUR'),(270,'LUWU UTARA'),(220,'JENEPONTO'),(209,'GOWA'),(155,'BARRU'),(150,'BANTAENG'),(203,'ENREKANG'),(177,'BONE'),(184,'BULUKUMBA'),(2184,'(NOT SPECIFIED)'),(442,'UJUNG PANDANG'),(444,'WAJO'),(2265,'MAKASSAR'),(2332,'SINJAI UTARA'),(2360,'WATAMPONE'),(2321,'SEGERI'),(2339,'SUROAKO'),(2293,'PARIGI'),(2264,'LUWUK'),(436,'TOLI TOLI'),(320,'PALU'),(348,'POSO'),(162,'BAU-BAU'),(234,'KENDARI'),(241,'KOLAKA'),(242,'KONAWE'),(244,'KOTAMOBAGU'),(283,'MANADO'),(296,'MINAHASA'),(437,'TOMOHON'),(2258,'LIMA PULUH KOTA'),(2247,'KUOK'),(2284,'PADANG PANJANG'),(2331,'SINGKARAK'),(2319,'SAWAHLUNTO'),(313,'PADANG'),(333,'PAYAKUMBUH'),(391,'SOLOK'),(182,'BUKIT TINGGI'),(161,'BATUSANGKAR'),(160,'BATU RAJA'),(253,'LAHAT'),(264,'LUBUK LINGGAU'),(228,'KAYU AGUNG'),(418,'TANJUNG RAJA'),(370,'SEKAYU'),(349,'PRABUMULIH'),(315,'PAGAR ALAM'),(318,'PALEMBANG'),(311,'OKI'),(298,'MUARA ENIM'),(300,'MUNTOK'),(301,'MUSI BANYUASIN'),(2282,'OGAN KOMERING ILIR'),(2283,'OKU TIMUR'),(2278,'MUSI RAWAS'),(2209,'BANYUASIN'),(416,'TANJUNG ENIM'),(459,'OGAN ILIR'),(457,'KARO'),(464,'TAPANULI UTARA'),(465,'DELI SERDANG'),(2185,'(NOT SPECIFIED)'),(2188,'AEK NATAS'),(2189,'AEK NOPAN'),(435,'TOBA SAMOSIR'),(423,'TARUTUNG'),(425,'TEBING TINGGI'),(455,'DAIRI'),(2201,'BANDAR BARU'),(2198,'BALIGE'),(2251,'LAGU BOTI'),(2268,'MEDAN DELI'),(2269,'MEDAN PERJUANGAN'),(2295,'PASAR BARU'),(2298,'PEMATANGSIANTAR'),(2291,'PARAPAT'),(2322,'SEI RAMPAH'),(2317,'SARIBU DOLOK'),(2327,'SIBORONG-BORONG'),(2328,'SIDAMANIK'),(2356,'TIGARUNGGU'),(2346,'TANJUNG TIRAM'),(2342,'TANAH JAWA'),(2348,'TAPANULI SELATAN'),(314,'PADANG SIDEMPUAN'),(307,'NIAS'),(284,'MANDAILING NATAL'),(292,'MEDAN'),(332,'PATUMBAK'),(338,'PEMATANG SIANTAR'),(341,'PERBAUNGAN'),(377,'SERDAN BADAGAI'),(381,'SIBOLGA'),(357,'RANTAU PRAPAT'),(421,'TAPANULI'),(415,'TANJUNG BALAI'),(397,'STABAT'),(224,'KABAN JAHE'),(238,'KISARAN'),(265,'LUBUK PAKAM'),(256,'LANGKAT'),(252,'LABUHAN BATU'),(170,'BINJAI'),(135,'ASAHAN'),(180,'BRASTAGI'),(165,'BELAWAN'),(152,'BANTUL'),(247,'KULON PROGO'),(390,'SLEMAN'),(304,'NGAGLIK'),(2305,'PUNDONG'),(2287,'PAKEM'),(2221,'DI YOGYAKARTA'),(451,'YOGYAKARTA'),(449,'WONOSARI'),(447,'WATES'),(471,'MAGELANG');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;