-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 05:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbukuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idBuku` int(15) NOT NULL,
  `jdl` varchar(100) NOT NULL,
  `pngrng` varchar(35) NOT NULL,
  `terbit` int(5) NOT NULL,
  `cover` varchar(35) NOT NULL,
  `fileBuku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idBuku`, `jdl`, `pngrng`, `terbit`, `cover`, `fileBuku`) VALUES
(1, 'Pendidikan dan Pelatihan', 'RS GRAHA SEHAT MEDIKA', 2018, 'gambar1.png', 'pendidikan-dan-pelatihan.pdf'),
(2, 'Garis Waktu', 'Fiersa Besari', 2016, 'novel1.png', 'Garis Waktu.pdf'),
(3, 'Senja, Hujan, & Cerita yang Telah Usai', 'Boy Candra', 2015, 'senja_hujan.jpg', 'Senja, Hujan, Cerita yang Telah Usai.pdf'),
(4, 'Sepasang Kaos Kaki Hitam', 'ari g.', 2017, 'gambar3.jpg', 'sepasang-kaos-kaki-hitam.pdf'),
(5, 'Filosofi Teras', 'Henry Manampiring', 2018, 'gambar5.jpg', 'filosofi-teras.pdf'),
(6, 'The Amber Spyglass', 'Philip Pullman', 2000, 'gambar4.jpg', 'The Amber Spyglass (Teropong Cahaya).pdf'),
(7, 'RESPATI', 'Ragiel J P', 2021, 'gambar6.jpg', 'Respati.pdf'),
(8, 'Amor Fati', 'Syahid Muhammad', 2017, 'gambar7.jpg', 'amor-fati.pdf'),
(9, 'EGOSENTRIS', 'Syahid Muhammad', 2018, 'gambar10.jpg', 'egosentris.pdf'),
(10, 'KALA', 'Syahid Muhammad', 2017, 'gambar11.jpg', 'kala.pdf'),
(11, 'Sejarah Dunia yang diSembunyikan', ' Jonatan Black', 2017, 'gambar8.jpg', 'sejarah-dunia-yang-disembunyikan.pdf'),
(12, 'The Subtle Art Of Not Giving A Fuck', 'Mark Manson', 2016, 'gambar9.png', 'the-subtle-art-of-not-giving-a-fck.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idMember` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `namaMember` varchar(35) NOT NULL,
  `jnsKlmn` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noWa` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idMember`, `nim`, `namaMember`, `jnsKlmn`, `alamat`, `noWa`, `email`, `pass`, `prodi`, `status`) VALUES
(1, '201080200001', 'Mokhamad Diki Armanda', 'L', 'Trowulan, Mojokerto', '085646231475', 'diki.armada5@gmail.com', '$2y$10$86eI3//5O8tpz037Enf96OV5HzwZMObI9tyXpATOT63Ina5Cuo7te', 'Informatika', 1),
(2, '201080200057', 'Ayu Setya Ningrum', 'P', 'Sedowayah, Sidoarjo', '089636756034', 'ayusetya2017@gmail.com', 'Ayusetya23', 'Informatika', 1),
(3, '201080200041', 'Dian Anjani ', 'P', 'sedayu lawas, Lamongan', '085671234821', 'anjani01@gmail.com', 'miumiu', 'Informatika', 0),
(4, '201080200132', 'Niko Ardiansyah', 'L', 'Lemah Putro, Sidoarjo', '082213421892', 'nikoardi@gmail.com', 'nikoardi111234', 'Informatika', 0),
(5, '201080200021', 'Syahrul Gunawan', 'L', 'Ketegan, Tanggulangin, Sidoarjo', '08943212312', 'syahrul299@gmail.com', 'syahruligun21', 'Teknik Elektro', 0),
(6, '201080200034', 'Risa Syaraswati', 'P', 'Kludan, Tanggulangin, Sidoarjo', '085672231234', 'risa45678@gmail.com', 'risaasir.', 'Agroteknologi', 0),
(7, '201080200022', 'Ajeng dwi marini', 'P', 'Brondong, Brondong, Lamongan', '082164537289', '12ajeng@gmail.com', 'ajengajengajeng', 'PGPAUD', 0),
(8, '201080200091', 'Mas rofi nur faisal', 'L', 'Tulangan, Sidoarjo', '089342231723', 'masrofi@gmail.com', 'masmasmasrofi2', 'Informatika', 0),
(9, '201080200134', 'Didit Purwanto', 'L', 'Porong, Sidoarjo', '081123423478', 'diditdit34@gmail.com', 'Purwanto98', 'Teknik Industri', 0),
(10, '201080200019', 'Nia kanzaya', 'P', 'Sidowayah, Sidoarjo', '0895633328990', 'nia34@gmail.com', 'nayana23457', 'PGSD', 0),
(11, '201080200043', 'cahyo dwi angga', 'L', 'Kerek, Tuban', '085632671253', 'cahyomaulana@gmail.com', '123456789.', 'Teknik Elektro', 0),
(12, '201080200037', 'Dyah Putri Ayu', 'P', 'Porong, Sidoarjo', '081167438290', 'dyahayu@gmail.com', '09876546238', 'PGPAUD', 0),
(13, '2010802000123', 'Ryanza Nugraha', 'L', 'Celep, Sidoarjo', '0884362176', 'Ryan221@gmail.com', 'Ryanza223', 'Teknik Industri', 0),
(14, '201080200101', 'Mulia Zakia', 'P', 'Sidowayah, Sidoarjo', '089567321892', 'muliazakia3@gmal.com', 'GIGIH234', 'PGSD', 0),
(15, '201080200042', 'Mandala Saka', 'L', 'Drajat, Paciran, Lamongan', '085632178923', 'mandalasaka1@gmail.com', 'dalamandala', 'Teknik Industri', 0),
(16, '201080200056', 'Nana Tatiana', 'P', 'Gempol, Sidoarjo', '085218790364', 'nana32@gmail.com', 'nananananana', 'Agroteknologi', 0),
(17, '201080200029', 'Agung Pujonggo', 'L', 'Pucuk, Lamongan', '089636231823', 'agungpujonggo@gmail.com', 'Agung098765', 'Agroteknologi', 0),
(18, '201080200112', 'Syafa Anjanika', 'P', 'Sidowayah, Sidoarjo', '081123672819', 'syafaanjani@gmail.com', 'janianjani32', 'Teknik Industri', 0),
(19, '201080200045', 'Atmaja Surapto', 'L', 'Kludan, Tanggulangin, Lamongan', '088436217623', 'atmojo78@gmail.com', 'kiankian', 'Agroteknologi', 0),
(20, '201080200003', 'Hendi Taulani', 'L', 'Sidokare, Sidoarjo', '082186473281', 'Henditaulani@gmail.com', 'hendihendi34', 'Teknik Industri', 0),
(21, '201080200032', 'Dwi Anjaeni', 'P', 'Kadengan, Sidoarjo', '0893422314567', 'dwianjaeni2@gmail.com', 'dwidwi567438', 'PGPAUD', 0),
(22, '201080200057', 'Dio Aji Mahmud', 'L', 'Jenu, Tuban', '089632189000', 'Dioaji@gmail.com', 'DDDIIIOOO', 'Informatika', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idBuku`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idMember`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `idBuku` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
