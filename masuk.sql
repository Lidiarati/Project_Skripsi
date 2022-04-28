-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2022 at 11:54 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `no_antrian` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam_buka` varchar(100) NOT NULL,
  `jam_tutup` varchar(100) NOT NULL,
  `lokasi_vaksin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `no_antrian`, `hari`, `jam_buka`, `jam_tutup`, `lokasi_vaksin`) VALUES
(1, '100', 'Jumaat', '10:00', '11:00', 'puskesmas'),
(8, '10', 'Selasa', '09:00', '12:00', 'postu'),
(9, '1', 'Rabu', '11:00', '12:00', 'puskesmas'),
(10, '0', 'Rabu', '09:00', '13:00', 'puskesmas'),
(11, '10', 'Jumaat', '09:00', '13:00', 'puskesmas'),
(13, '10', 'Jumaat', '09:00', '10:00', 'postu'),
(14, '1', 'Jumaat', '09:00', '10:00', 'postu');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Lidia Rati', 'lidiarati', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Hilarius', 'hilarius123', '8b097b8a86f9d6a991357d40d3d58634', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_daftar` char(30) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(50) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `tgl_vaksin` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `jenis_vaksin` varchar(30) NOT NULL,
  `vaksin_ke` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_daftar`, `tgl_daftar`, `nama_pasien`, `nik`, `alamat`, `tgl_lahir`, `jk`, `no_hp`, `tgl_vaksin`, `kategori`, `jenis_vaksin`, `vaksin_ke`) VALUES
('P202200002', '2022-04-22', 'Rati', '12362958684', 'jln sutami malang', '2019-01-22', 'laki-laki', '081231516', '03-10-2020', 'remaja', 'moderna', 'satu'),
('P202200003', '2022-04-22', 'Hilarius Hatu', '123421', 'jln bendungan raya', '2022-02-22', 'laki-laki', '068323', '03-05-2020', 'remaja', 'moderna', 'satu'),
('P202200004', '2022-04-22', 'Alina Simung 1', '531718927362', 'jln pisang agaung', '2016-04-22', 'laki-laki', '081234516270', '03-05-2020', 'remaja', 'moderna', 'dua'),
('P202200005', '2022-04-22', 'Resnawati', '12362958684', 'jln gunugng', '2018-12-20', 'laki-laki', '081231516', '03-05-2020', 'remaja', 'sinovac', 'satu'),
('P202200006', '2022-04-22', 'Resnawati', '531902378108476', 'jn ahsuns', '2019-04-22', 'perempuan', '068323', '03-05-2020', 'umum', 'moderna', 'satu'),
('P202200007', '2022-04-22', 'Rati', '381471695055', 'jln sedahdah', '2022-02-22', 'perempuan', '08121388379', '03-05-2020', 'umum', 'moderna', 'dua'),
('P202200008', '2022-04-22', 'rati nduet', '531902378108476', 'jln bedaa', '2018-04-22', 'perempuan', '081231516', '03-10-2020', 'ibu_hamil', 'astrazeneca', 'dua'),
('P202200009', '2022-04-22', 'Rival', '531718927362', 'jln saahd', '2019-02-22', 'laki-laki', '081231516', '03-05-2020', 'remaja', 'astrazeneca', 'satu'),
('P202200010', '2022-04-22', 'echa', '12362958684', 'jln simapng', '2018-02-22', 'perempuan', '081231516', '03-10-2020', 'remaja', 'sinovac', 'dua'),
('P202200011', '2022-04-22', 'Rati', '12362958684', 'dhaks', '2019-01-22', 'laki-laki', '08121388379', '03-10-2020', 'remaja', 'moderna', 'satu'),
('P202200012', '2022-04-27', 'rati nduet', '531902378108476', 'jln mega mendung', '2019-01-24', 'laki-laki', '08121388379', '03-10-2020', 'remaja', 'moderna', 'satu'),
('P202200013', '2022-04-28', 'Hilarius Hatu', '531902378108476', 'jln pisang agung', '2018-01-28', 'laki-laki', '08121388379', '03-05-2020', 'umum', 'sinovac', 'satu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(8, 'rati nduet', 'ratindeut99@gmail.com', '12345'),
(9, 'Admin1', 'Admin1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'Bayu', 'bayu@gmail.com', 'a430e06de5ce438d499c2e4063d60fd6'),
(11, 'lidia', 'lidia@gmail.com', 'f1bdab4e69b9c13a4b82c4b8645cc0b1'),
(12, 'lidiarati', 'ratinduet99@gmail.com', 'c885f6629596599e74d82ea3b5fdf234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
