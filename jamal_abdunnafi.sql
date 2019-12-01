-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 03:58 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jamal_abdunnafi`
--

-- --------------------------------------------------------

--
-- Table structure for table `jk`
--

CREATE TABLE `jk` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jk`
--

INSERT INTO `jk` (`id`, `deskripsi`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `no_hp_lama` char(13) NOT NULL,
  `no_hp_baru` char(13) NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `nim`, `no_hp_lama`, `no_hp_baru`, `tgl_ubah`) VALUES
(2, 101, '081081081081', '081234567890', '2019-11-09 06:43:49'),
(3, 102, '08123456789', '08123456780', '2019-11-09 07:56:36'),
(4, 102, '08123456780', '089671101091', '2019-11-10 15:19:18'),
(5, 103, '081546879321', '082678376542', '2019-11-10 15:19:18'),
(6, 104, '081564987123', '085673996558', '2019-11-10 15:19:18'),
(7, 105, '081325658987', '081245879995', '2019-11-10 15:19:18'),
(8, 106, '081325654987', '081325654887', '2019-11-10 15:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jk` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `alamat`, `no_hp`) VALUES
(2147483647, 'muhammad Jamal Abdunnafi', 1, 'Desa Gemiring Kidul Nalumsari Jepara', '089637692669');

--
-- Triggers `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `no_hp_trg` BEFORE UPDATE ON `mahasiswa` FOR EACH ROW BEGIN
	IF NEW.no_hp != OLD.no_hp THEN
		INSERT INTO log set
        nim = NEW.nim,
        no_hp_lama = OLD.no_hp,
        no_hp_baru = NEW.no_hp,
        tgl_ubah = NOW(); 
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_mahasiswa`
-- (See below for the actual view)
--
CREATE TABLE `view_mahasiswa` (
`nim` int(11)
,`nama` varchar(128)
,`jk` int(11)
,`alamat` text
,`no_hp` char(13)
,`id` int(11)
,`deskripsi` varchar(32)
);

-- --------------------------------------------------------

--
-- Structure for view `view_mahasiswa`
--
DROP TABLE IF EXISTS `view_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mahasiswa`  AS  select `a`.`nim` AS `nim`,`a`.`nama` AS `nama`,`a`.`jk` AS `jk`,`a`.`alamat` AS `alamat`,`a`.`no_hp` AS `no_hp`,`b`.`id` AS `id`,`b`.`deskripsi` AS `deskripsi` from (`mahasiswa` `a` left join `jk` `b` on((`a`.`jk` = `b`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
