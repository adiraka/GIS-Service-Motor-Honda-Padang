-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 02:54 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bengkel`
--

CREATE TABLE `tb_bengkel` (
  `id` int(4) NOT NULL,
  `nm_bengkel` varchar(25) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bengkel`
--

INSERT INTO `tb_bengkel` (`id`, `nm_bengkel`, `alamat`, `no_telp`) VALUES
(2, 'OSAKA SERVICE', 'Jl. Kali Kecil Iii/86E', '0751-7055215'),
(4, 'MENARA AGUNG PONDOK', 'Jl.Pondok No.149', ' 0751-7055215');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kec`
--

CREATE TABLE `tb_kec` (
  `id` int(6) NOT NULL,
  `nm_kec` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kec`
--

INSERT INTO `tb_kec` (`id`, `nm_kec`) VALUES
(7, 'Koto Tangah'),
(9, 'Nanggalo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kel`
--

CREATE TABLE `tb_kel` (
  `id` int(6) NOT NULL,
  `id_kec` int(6) NOT NULL,
  `nm_kel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kel`
--

INSERT INTO `tb_kel` (`id`, `id_kec`, `nm_kel`) VALUES
(7, 7, 'Parupuk Tabing'),
(9, 7, 'Lubuk Buaya'),
(10, 9, 'Surau Gadang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id` int(3) NOT NULL,
  `id_bengkel` int(4) NOT NULL,
  `id_kel` int(6) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id`, `id_bengkel`, `id_kel`, `lat`, `lng`) VALUES
(1, 2, 7, '-0.945811', '100.362805'),
(2, 2, 10, '-0.939331', '100.360623'),
(3, 4, 9, '-0.926304', '100.352432');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(3) NOT NULL,
  `user` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin123'),
(2, 'menara_agung', 'menaraagung'),
(3, 'hayati', 'hayati123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bengkel`
--
ALTER TABLE `tb_bengkel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kec`
--
ALTER TABLE `tb_kec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kel`
--
ALTER TABLE `tb_kel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kec` (`id_kec`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bengkel` (`id_bengkel`),
  ADD KEY `id_kel` (`id_kel`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bengkel`
--
ALTER TABLE `tb_bengkel`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_kec`
--
ALTER TABLE `tb_kec`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_kel`
--
ALTER TABLE `tb_kel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kel`
--
ALTER TABLE `tb_kel`
  ADD CONSTRAINT `tb_kel_ibfk_1` FOREIGN KEY (`id_kec`) REFERENCES `tb_kec` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD CONSTRAINT `tb_lokasi_ibfk_1` FOREIGN KEY (`id_kel`) REFERENCES `tb_kel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_lokasi_ibfk_2` FOREIGN KEY (`id_bengkel`) REFERENCES `tb_bengkel` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
