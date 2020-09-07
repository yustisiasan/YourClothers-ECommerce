-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2016 at 08:02 AM
-- Server version: 5.7.10-log
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbyourclothes`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `bid` int(11) NOT NULL,
  `bnama` varchar(50) NOT NULL,
  `butama` int(11) DEFAULT NULL,
  `bharga` float DEFAULT NULL,
  `bimg` varchar(64) DEFAULT NULL,
  `bcatatan` varchar(1000) DEFAULT NULL,
  `bbes` int(11) DEFAULT NULL,
  `bukuran` varchar(5) DEFAULT NULL,
  `prnama` varchar(64) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`bid`, `bnama`, `butama`, `bharga`, `bimg`, `bcatatan`, `bbes`, `bukuran`, `prnama`, `parent_id`) VALUES
(32, 'Jersey Biru', 0, 250000, 'bb_1.jpg', 'Baju ini berbahan dasar lembut, menyerap keringat, dan anti bau', 1, 'S/M/L', 'jersey', 1),
(33, 'Jersey hijau', 0, 300000, 'bb_2.jpg', 'jersey ini mempunyai warna corak yang sangat menarik, cocok unutk jersey tim mu!!', 1, 'S/M/L', 'jersey', 1),
(34, 'Jersey Putih', 0, 350000, 'bb_3.jpg', 'jersey ini merupakan jersey dari tim Chelsea FC, dan merupkan jersey kedua dari tim ini', 1, 'S/M/L', 'jersey', 1),
(35, 'Jersey Merah', 0, 300000, 'bb_4.jpg', 'jersey ini merupakan jersey dari tim Manchester United, kualitas original, anti bau', 1, 'All S', 'jersey', 1),
(36, 'Jersey Merah Corak Hitam', 0, 200000, 'bb_5.jpg', 'jersey ini merupakan jersey dari tim liverpool fc. berkualitas original, cocok digunakan untuk berolahraga', 1, 'All S', 'jersey', 1),
(37, 'Jersey Biru Donker', 0, 250000, 'bb_6.jpg', 'jersey ini merupakan jersey dari tim Paris Saint Germany, berkualitas Original', 1, 'All S', 'jersey', 1),
(38, 'Jersey Putih Pure', 0, 250000, 'bb_7.png', 'jersey ini merupakan jersey dari tim real madrid', 1, '29-36', 'jersey', 1),
(39, 'Jerey Biru Muda', 0, 100000, 'bb_8.jpg', 'jersey ini sangat pas digunakan untuk berolahraga karena menyerap keringat dan anti bau', 1, '29-36', 'jersey\r\n', 1),
(40, 'Batik Merah Wanita', 0, 800000, 'bbc_1.jpg', 'baju batik ini berwarna menarik, nyaman dipakai untuk bekerja, dan acara formal lainnnya', 1, '29-36', 'batik', 1),
(41, 'Batik Biru Merah Wanita', 0, 650000, 'bbc_2.jpg', 'Batik dengan gaya casual bisa untuk acara formal maupun non formal', 1, 'S/M/L', 'batik', 1),
(42, 'Baju Batik Merah Maroon Wanita ', 0, 750000, 'bbc_3.jpg', 'baju batik ini memiliki corak yang sangat menarik, selain digunakan untuk bekerja, baju ini juga sangat trendy di kalangan masyarakat', 1, 'S/M/L', 'batik', 1),
(43, 'Baju Batik Pria Corak Merah', 0, 800000, 'bbp_1.jpg', 'baju pria ini sangat nyaman digunakan untuk kegiatan sehari hari', 1, 'S/M/L', 'batik pria', 1),
(44, 'Baju Batik Pria Corak Hitam Coklat', 0, 950000, 'bbp_2.jpg\r\n', 'baju batik ini sangat nyaman digunakan dan juga trendy', 1, 'S/M/L', 'batik pria', 1),
(45, 'Baju Batik Coklat', 0, 750000, 'bbp_6.jpg', 'Baju batik dengan model terkini cocok untuk acara forma ataupun non formal', 1, 'S/M/L', 'batik pria', 1),
(46, 'Batik couple hijau', 0, 1900000, 'bc_1.jpg', 'baju batik couple dengan mode terkini sangat cocok untuk anda dan pasangan anda', 2, 'S/M/L', 'batik couple', 1),
(47, 'Batik couple coklat', 0, 2000000, 'bc_2.jpg', 'baju batik couple dengan mode terkini sangat cocok untuk anda dengan pasangan anda', 1, 'S/M/L', 'batik couple', 1),
(48, 'Batik Couple Merah', 0, 2200000, 'bc_3.jpg', 'baju batik couple dengan mode terkini sangat cocok untuk anda dengan pasangan anda', 1, 'S/M/L', 'batik couple', 1),
(49, 'Baju lengan panjang donker', 0, 300000, 'blp_1.jpg', 'berbahan dasar kain katun sehinngga sagat nyaman digunakan', 1, 'S/M/L', 'lengan panjang', 1),
(50, 'Baju lengan panjang merah', 0, 250000, 'blp_2.jpg', 'berbahan dasar kain katun sehinngga sagat nyaman digunakan', 1, 'S/M/L', 'lengan panjang', 1),
(51, 'Baju lengan panjang biru', 0, 240000, 'blp_c1.jpeg', 'berbahan dasar kain katun sehinngga sagat nyaman digunakan', 1, 'S/M/L', 'lengan panjang', 1),
(52, 'Blazzer Wanita', 0, 600000, 'bz_2.jpg', 'blazzer dengan gaya terkini sangat praktis cocok untuk acara formal', 1, 'S/M/L', 'blazzer', 1),
(53, 'Blazzer wanita biru', 0, 550000, 'bz_1.jpg', 'blazzer dengan gaya terkini sangat praktis cocok untuk acara formal', 1, 'S/M/L', 'blazzer', 1),
(54, 'Blazzer wanita putih biru', 0, 450000, 'bz_3.jpg', 'blazzer dengan gaya terkini sangat praktis cocok untuk acara formal', 1, 'S/M/L', 'blazzer', 1),
(55, 'Kaos wanita adidas', 0, 80000, 'kc_1.jpg', 'kaos berbahan kain katun dan sangat trendy', 1, 'S/M/L', 'kaos wanita', 1),
(56, 'Kaos Wanita Putih', 0, 75000, 'kc_2.jpg', 'kaos berbahan kain katun dan sangat trendy', 1, 'S/M/L', 'kaos wanita', 1),
(57, 'Kaos Wanita Abu Abu', 0, 60000, 'kc_3.jpg', 'kaos berbahan kain katun dan sangat trendy', 1, 'S/M/L', 'kaos wanita', 1),
(58, 'Kemeja Wanita Pink', 0, 75000, 'kjc_1.jpg', 'kemeja keren dan anti kuno', 1, 'S/M/L', 'kemeja wanita', 1),
(59, 'Kemeja wanita merah', 0, 85000, 'kjc_2.jpg', 'kemeja keren dan anti kuno', 1, 'S/M/L', 'kemeja wanita', 1),
(60, 'Kemeja Wanita Kotak', 0, 90000, 'kjc_3.jpg', 'kemeja keren dan anti kuno', 1, 'S/M/L', 'kemeja wanita', 1),
(61, 'Kemeja Pria Abu abu', 0, 200000, 'klp_c2.png', 'kemeja keren dan anti kuno', 1, 'S/M/L', 'kemeja pria', 1),
(62, 'Kemeja Pria hitam', 0, 250000, 'klp_c3.jpg', 'kemeja keren dan anti kuno', 1, 'S/M/L', 'kemeja pria', 1),
(63, 'kemeja pria donker', 0, 350000, 'klp_c3.jpg', 'kemeja keren dan anti kuno', 1, 'S/M/L', 'kemeja pria', 1);

-- --------------------------------------------------------

--
-- Table structure for table `btamu`
--

CREATE TABLE `btamu` (
  `btid` int(11) NOT NULL,
  `btnama` varchar(32) DEFAULT NULL,
  `btemail` varchar(64) DEFAULT NULL,
  `btweb` varchar(64) DEFAULT NULL,
  `btcontent` varchar(100) DEFAULT NULL,
  `btdtime` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btamu`
--

INSERT INTO `btamu` (`btid`, `btnama`, `btemail`, `btweb`, `btcontent`, `btdtime`) VALUES
(11, 'Shinichi Kudo', 'kudo19@gmail.com', 'http://kudo19.blogspot.com', 'Keren, moga sukses penjulana...', '14 Juni 2011 14:19:56'),
(12, 'Ran Mouri', 'mouri.ran@gmail.com', 'ranmouri.blogspot.com', 'Selamat dan sukses selalu...', '14 Juni 2011 14:33:58'),
(15, 'Conan Edogawa', 'conan_kun@gmail.com', 'www.conan.com', 'Mantab mas bro...', '16 Maret 2014 14:41:59'),
(18, 'Ai Haibara', 'haibara@gmail.com', 'www.haibara.com', 'Mantab, dab!', '15 April 2014 19:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `konama` varchar(50) NOT NULL,
  `koongkos` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`konama`, `koongkos`) VALUES
('Bandung', 10000),
('Banten', 25000),
('Bogor', 20000),
('Demak', 22500),
('Jakarta', 20000),
('Pati', 21500),
('Semarang', 15000),
('Surabaya', 25000),
('Yogyakarta', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `krbelanja`
--

CREATE TABLE `krbelanja` (
  `krid` int(11) NOT NULL,
  `bid` int(11) DEFAULT NULL,
  `krqty` int(11) DEFAULT NULL,
  `krsbtotal` float DEFAULT NULL,
  `krip` varchar(20) DEFAULT NULL,
  `krstatus` int(11) DEFAULT NULL,
  `lapid` bigint(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krbelanja`
--

INSERT INTO `krbelanja` (`krid`, `bid`, `krqty`, `krsbtotal`, `krip`, `krstatus`, `lapid`, `uid`) VALUES
(2, 33, 2, 7598000, '::1', 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lapbelanja`
--

CREATE TABLE `lapbelanja` (
  `lapid` bigint(20) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `konama` varchar(50) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `lapip` varchar(20) DEFAULT NULL,
  `lapdate` varchar(32) DEFAULT NULL,
  `laptime` varchar(15) DEFAULT NULL,
  `lapstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapbelanja`
--

INSERT INTO `lapbelanja` (`lapid`, `uid`, `konama`, `alamat`, `lapip`, `lapdate`, `laptime`, `lapstatus`) VALUES
(1, 2, 'Semarang', 'Gunung Pati RT.06 RW.05, Semarang', '::1', '30 Maret 2014', '16:34:00', 'OK'),
(2, 2, 'Yogyakarta', 'Demak Ijo, Sleman, Yogyakarta', '::1', '13 April 2014', '18:31:23', 'Tunggu'),
(3, 2, 'Yogyakarta', 'Demak Ijo, Sleman, Yogyakarta', '::1', '13 April 2014', '18:35:55', 'Tunggu'),
(4, 21, 'Pati', 'bengkulu', '::1', '2 Maret 2015', '10:50:35', 'Tunggu'),
(5, 21, 'Bandung', 'bengkulu', '::1', '2 Maret 2015', '10:52:37', 'Tunggu');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `mid` int(11) NOT NULL,
  `mclass` varchar(20) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `mtitel` varchar(64) DEFAULT NULL,
  `murl` varchar(64) DEFAULT NULL,
  `morder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`mid`, `mclass`, `parent_id`, `mtitel`, `murl`, `morder`) VALUES
(1, 'h', 0, 'GSM Phone', 'gsm phone', 2),
(2, 'h', 0, 'CDMA Phone', 'cdma phone', 3),
(3, 'h', 1, 'Nokia', 'nokia', 1),
(4, 'h', 2, 'Nokia', 'nokia', 1),
(5, 'h', 0, 'Beranda', 'home', 1),
(6, 'v', 0, 'Beranda', 'home', 1),
(7, 'h', 1, 'BlackBerry', 'blackberry', 2),
(8, 'h', 1, 'Samsung', 'samsung', 3),
(9, 'h', 1, 'Sony Ericson', 'sony_ericson', 4),
(10, 'h', 2, 'Samsung', 'samsung', 2),
(11, 'h', 2, 'Beyond', 'beyond', 3),
(12, 'v', 0, 'Tentang Kami', 'about_us!', 2),
(24, 'v', 0, 'Kontak Kami', 'kontak_kami', 3),
(25, 'h', 0, 'Notebook & PC', 'notebook & pc', 4),
(26, 'h', 25, 'Toshiba', 'toshiba', 1);

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE `node` (
  `nid` varchar(64) NOT NULL,
  `ntitel` varchar(64) DEFAULT NULL,
  `nkonten` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`nid`, `ntitel`, `nkonten`) VALUES
('about_us!', 'Tentang Kami', 'Kami adalah <b>YOUR CLOTHES</b>, perusahaan IT yang bergerak di bidang <span style="font-style: italic;">e-commerce </span>dan <span style="font-style: italic;">software</span>. Cakupan bidang <span style="font-style: italic;">e-commerce </span>meliputi: Jual beli (pakaian  <span style="font-style: italic;">branded</span>) yang meliputi, pakaian wanita, pria, dan anak-anak. Sedangkan, cakupan bidang <span style="font-style: italic;">software</span>, hanya meliputi bidang e-commerce.<br>'),
('home', 'Home', '<br>'),
('kontak_kami', 'Kontak Kami', '<b><font size="5">YOUR CLOTHES</font></b><br><b><br>Kantor Pusat:</b><div>Jln. Telekomunikasi Terusan Buah Batu 1,</div><div>Bandung 40257. Telp. (0274) 66 33 xxx</div><div><b>Kantor Cabang (Semarang):</b><br><div>Sambilawang RT. 06 RW. 02, Ungaran, Semarang,&nbsp;</div><div>Jawa Tengah 59153. Telp. (0295) 66 33 xxx</div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `prid` int(11) NOT NULL,
  `prnama` varchar(64) DEFAULT NULL,
  `prket` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`prid`, `prnama`, `prket`) VALUES
(1, 'parka', 'Jaket Parka'),
(2, 'kulit', 'Jaket Kulit');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rid` int(11) NOT NULL,
  `rnama` char(10) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rid`, `rnama`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `rotor`
--

CREATE TABLE `rotor` (
  `roid` int(11) NOT NULL,
  `roimg` varchar(64) DEFAULT NULL,
  `rotitel` varchar(64) DEFAULT NULL,
  `rokonten` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rotor`
--

INSERT INTO `rotor` (`roid`, `roimg`, `rotitel`, `rokonten`) VALUES
(3, 'r_1.jpg', 'Gratis Belt', 'Gratis Belt'),
(4, 'r_2.jpg', 'Ongkir Gratis', 'Ongkir Gratis'),
(5, 'r_3.jpg', 'Ongkir Gratis', 'Ongkir Gratis');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `unama` varchar(20) NOT NULL,
  `upasswd` varchar(64) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `uimg` varchar(64) DEFAULT NULL,
  `konama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `rid`, `unama`, `upasswd`, `nama`, `email`, `alamat`, `phone`, `uimg`, `konama`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Riyanto', 'genx.java@gmail.com', 'Karangmalang A.45, Yogyakarta 55281', '0810000002', 'u_genx.jpg', 'Yogyakarta'),
(2, 2, 'sholihuna', 'ba4e586503b7cb15e2b54b9729c066ed', 'Sholihun Ahmad', 'sholihuna@telkom.net', 'Demak Ijo, Sleman, Yogyakarta', '081328185489', 'u_91.jpg', 'Yogyakarta'),
(3, 2, 'sudiro', '21232f297a57a5a743894a0e4a801fc3', 'Sudiro', 'sudiro@gmail.com', 'Sambilawang RT.06, RW.03, Trangkil 59153', '081328185489', 'u_genx.jpg', 'Jakarta'),
(15, 2, 'wagiyo', '21232f297a57a5a743894a0e4a801fc3', 'Wagiyo', 'wagiyo@gmail.com', 'Jepat', '085147147155', 'u_Koala.jpg', 'Yogyakarta'),
(17, 2, 'ngatio', '21232f297a57a5a743894a0e4a801fc3', 'Ngatio', 'ngatio@gmail.com', 'Serang No. 10A', '085229922333', 'u_artikel-kucing.jpg', 'Banten'),
(20, 2, 'sugiharti', '21232f297a57a5a743894a0e4a801fc3', 'Sugiharti', 'sugiharti@facebook.com', 'Guyangan RT.05 RW.01, Trangkil, Pati, Jateng 59153', '0818269777', NULL, 'Pati'),
(21, 2, 'root', '63a9f0ea7bb98050796b649e85481845', 'redo', 'gudug@mail.com', 'bengkulu', '08976', NULL, 'Bandung'),
(22, 2, 'maulana', 'aff4b352312d5569903d88e0e68d3fbb', 'maulana', 'farid@k.com', 'w', '08126791131', NULL, 'Bandung');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vbarang_laris`
--
CREATE TABLE `vbarang_laris` (
`bid` int(11)
,`bnama` varchar(50)
,`bimg` varchar(64)
,`krqty` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vdetail_lapblj`
--
CREATE TABLE `vdetail_lapblj` (
`lapid` bigint(20)
,`uid` int(11)
,`rid` int(11)
,`unama` varchar(20)
,`nama` varchar(50)
,`email` varchar(64)
,`konama` varchar(50)
,`alamat` varchar(250)
,`phone` varchar(30)
,`lapip` varchar(20)
,`krqty` decimal(32,0)
,`krsbtotal` double
,`lapdate` varchar(32)
,`laptime` varchar(15)
,`lapstatus` varchar(20)
,`koongkos` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vkrblj_barang`
--
CREATE TABLE `vkrblj_barang` (
`krid` int(11)
,`bid` int(11)
,`bnama` varchar(50)
,`bharga` float
,`bimg` varchar(64)
,`bukuran` varchar(5)
,`krqty` int(11)
,`krsbtotal` float
,`krip` varchar(20)
,`krstatus` int(11)
,`lapid` bigint(20)
,`uid` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vlapblj_user`
--
CREATE TABLE `vlapblj_user` (
`lapid` bigint(20)
,`uid` int(11)
,`rid` int(11)
,`unama` varchar(20)
,`nama` varchar(50)
,`email` varchar(64)
,`konama` varchar(50)
,`alamat` varchar(250)
,`phone` varchar(30)
,`lapip` varchar(20)
,`lapdate` varchar(32)
,`laptime` varchar(15)
,`lapstatus` varchar(20)
,`koongkos` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vrekap_krblj`
--
CREATE TABLE `vrekap_krblj` (
`krqty` decimal(32,0)
,`krsbtotal` double
,`lapid` bigint(20)
,`uid` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vrekap_ok`
--
CREATE TABLE `vrekap_ok` (
`lapid` bigint(20)
,`uid` int(11)
,`rid` int(11)
,`unama` varchar(20)
,`nama` varchar(50)
,`email` varchar(64)
,`konama` varchar(50)
,`alamat` varchar(250)
,`phone` varchar(30)
,`lapip` varchar(20)
,`krqty` decimal(32,0)
,`krsbtotal` double
,`lapdate` varchar(32)
,`laptime` varchar(15)
,`lapstatus` varchar(20)
,`koongkos` float
,`total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vuser`
--
CREATE TABLE `vuser` (
`uid` int(11)
,`unama` varchar(20)
,`upasswd` varchar(64)
,`nama` varchar(50)
,`email` varchar(64)
,`alamat` varchar(128)
,`phone` varchar(30)
,`uimg` varchar(64)
,`konama` varchar(50)
,`rid` int(11)
,`rnama` char(10)
);

-- --------------------------------------------------------

--
-- Structure for view `vbarang_laris`
--
DROP TABLE IF EXISTS `vbarang_laris`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbarang_laris`  AS  (select `vkrblj_barang`.`bid` AS `bid`,`vkrblj_barang`.`bnama` AS `bnama`,`vkrblj_barang`.`bimg` AS `bimg`,sum(`vkrblj_barang`.`krqty`) AS `krqty` from `vkrblj_barang` where `vkrblj_barang`.`lapid` in (select `lapbelanja`.`lapid` from `lapbelanja` where (`lapbelanja`.`lapstatus` = 'OK')) group by `vkrblj_barang`.`bid`,`vkrblj_barang`.`bnama`,`vkrblj_barang`.`bimg`) ;

-- --------------------------------------------------------

--
-- Structure for view `vdetail_lapblj`
--
DROP TABLE IF EXISTS `vdetail_lapblj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdetail_lapblj`  AS  (select `vlapblj_user`.`lapid` AS `lapid`,`vlapblj_user`.`uid` AS `uid`,`vlapblj_user`.`rid` AS `rid`,`vlapblj_user`.`unama` AS `unama`,`vlapblj_user`.`nama` AS `nama`,`vlapblj_user`.`email` AS `email`,`vlapblj_user`.`konama` AS `konama`,`vlapblj_user`.`alamat` AS `alamat`,`vlapblj_user`.`phone` AS `phone`,`vlapblj_user`.`lapip` AS `lapip`,`vrekap_krblj`.`krqty` AS `krqty`,`vrekap_krblj`.`krsbtotal` AS `krsbtotal`,`vlapblj_user`.`lapdate` AS `lapdate`,`vlapblj_user`.`laptime` AS `laptime`,`vlapblj_user`.`lapstatus` AS `lapstatus`,`vlapblj_user`.`koongkos` AS `koongkos` from (`vlapblj_user` join `vrekap_krblj` on(((`vlapblj_user`.`lapid` = `vrekap_krblj`.`lapid`) and (`vlapblj_user`.`uid` = `vrekap_krblj`.`uid`))))) ;

-- --------------------------------------------------------

--
-- Structure for view `vkrblj_barang`
--
DROP TABLE IF EXISTS `vkrblj_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vkrblj_barang`  AS  (select `krbelanja`.`krid` AS `krid`,`krbelanja`.`bid` AS `bid`,`barang`.`bnama` AS `bnama`,`barang`.`bharga` AS `bharga`,`barang`.`bimg` AS `bimg`,`barang`.`bukuran` AS `bukuran`,`krbelanja`.`krqty` AS `krqty`,`krbelanja`.`krsbtotal` AS `krsbtotal`,`krbelanja`.`krip` AS `krip`,`krbelanja`.`krstatus` AS `krstatus`,`krbelanja`.`lapid` AS `lapid`,`krbelanja`.`uid` AS `uid` from (`krbelanja` join `barang` on((`krbelanja`.`bid` = `barang`.`bid`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `vlapblj_user`
--
DROP TABLE IF EXISTS `vlapblj_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vlapblj_user`  AS  (select `lapbelanja`.`lapid` AS `lapid`,`lapbelanja`.`uid` AS `uid`,`users`.`rid` AS `rid`,`users`.`unama` AS `unama`,`users`.`nama` AS `nama`,`users`.`email` AS `email`,`lapbelanja`.`konama` AS `konama`,`lapbelanja`.`alamat` AS `alamat`,`users`.`phone` AS `phone`,`lapbelanja`.`lapip` AS `lapip`,`lapbelanja`.`lapdate` AS `lapdate`,`lapbelanja`.`laptime` AS `laptime`,`lapbelanja`.`lapstatus` AS `lapstatus`,`kota`.`koongkos` AS `koongkos` from ((`lapbelanja` join `users` on((`lapbelanja`.`uid` = `users`.`uid`))) join `kota` on((`lapbelanja`.`konama` = `kota`.`konama`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `vrekap_krblj`
--
DROP TABLE IF EXISTS `vrekap_krblj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vrekap_krblj`  AS  (select ifnull(sum(`krbelanja`.`krqty`),0) AS `krqty`,ifnull(sum(`krbelanja`.`krsbtotal`),0) AS `krsbtotal`,`krbelanja`.`lapid` AS `lapid`,`krbelanja`.`uid` AS `uid` from `krbelanja` group by `krbelanja`.`lapid`,`krbelanja`.`uid`) ;

-- --------------------------------------------------------

--
-- Structure for view `vrekap_ok`
--
DROP TABLE IF EXISTS `vrekap_ok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vrekap_ok`  AS  (select `vdetail_lapblj`.`lapid` AS `lapid`,`vdetail_lapblj`.`uid` AS `uid`,`vdetail_lapblj`.`rid` AS `rid`,`vdetail_lapblj`.`unama` AS `unama`,`vdetail_lapblj`.`nama` AS `nama`,`vdetail_lapblj`.`email` AS `email`,`vdetail_lapblj`.`konama` AS `konama`,`vdetail_lapblj`.`alamat` AS `alamat`,`vdetail_lapblj`.`phone` AS `phone`,`vdetail_lapblj`.`lapip` AS `lapip`,`vdetail_lapblj`.`krqty` AS `krqty`,`vdetail_lapblj`.`krsbtotal` AS `krsbtotal`,`vdetail_lapblj`.`lapdate` AS `lapdate`,`vdetail_lapblj`.`laptime` AS `laptime`,`vdetail_lapblj`.`lapstatus` AS `lapstatus`,`vdetail_lapblj`.`koongkos` AS `koongkos`,(`vdetail_lapblj`.`krsbtotal` + `vdetail_lapblj`.`koongkos`) AS `total` from `vdetail_lapblj` where (`vdetail_lapblj`.`lapstatus` = 'OK')) ;

-- --------------------------------------------------------

--
-- Structure for view `vuser`
--
DROP TABLE IF EXISTS `vuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vuser`  AS  (select `users`.`uid` AS `uid`,`users`.`unama` AS `unama`,`users`.`upasswd` AS `upasswd`,`users`.`nama` AS `nama`,`users`.`email` AS `email`,`users`.`alamat` AS `alamat`,`users`.`phone` AS `phone`,`users`.`uimg` AS `uimg`,`users`.`konama` AS `konama`,`users`.`rid` AS `rid`,`roles`.`rnama` AS `rnama` from (`users` join `roles` on((`users`.`rid` = `roles`.`rid`)))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `barang2produk` (`parent_id`);

--
-- Indexes for table `btamu`
--
ALTER TABLE `btamu`
  ADD PRIMARY KEY (`btid`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`konama`);

--
-- Indexes for table `krbelanja`
--
ALTER TABLE `krbelanja`
  ADD PRIMARY KEY (`krid`),
  ADD KEY `krbelanja2barang` (`bid`),
  ADD KEY `kr2lapbelanja` (`lapid`);

--
-- Indexes for table `lapbelanja`
--
ALTER TABLE `lapbelanja`
  ADD PRIMARY KEY (`lapid`),
  ADD KEY `lapbelanja@kota` (`konama`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `node`
--
ALTER TABLE `node`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`prid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `rotor`
--
ALTER TABLE `rotor`
  ADD PRIMARY KEY (`roid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `unama` (`unama`),
  ADD KEY `user2kota` (`konama`),
  ADD KEY `user2roles` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `btamu`
--
ALTER TABLE `btamu`
  MODIFY `btid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `krbelanja`
--
ALTER TABLE `krbelanja`
  MODIFY `krid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lapbelanja`
--
ALTER TABLE `lapbelanja`
  MODIFY `lapid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `prid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rotor`
--
ALTER TABLE `rotor`
  MODIFY `roid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang2produk` FOREIGN KEY (`parent_id`) REFERENCES `produk` (`prid`);

--
-- Constraints for table `krbelanja`
--
ALTER TABLE `krbelanja`
  ADD CONSTRAINT `kr2lapbelanja` FOREIGN KEY (`lapid`) REFERENCES `lapbelanja` (`lapid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krbelanja2barang` FOREIGN KEY (`bid`) REFERENCES `barang` (`bid`);

--
-- Constraints for table `lapbelanja`
--
ALTER TABLE `lapbelanja`
  ADD CONSTRAINT `lapbelanja@kota` FOREIGN KEY (`konama`) REFERENCES `kota` (`konama`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user2kota` FOREIGN KEY (`konama`) REFERENCES `kota` (`konama`),
  ADD CONSTRAINT `user2roles` FOREIGN KEY (`rid`) REFERENCES `roles` (`rid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
