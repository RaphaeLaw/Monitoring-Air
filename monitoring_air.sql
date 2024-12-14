-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 03:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_air`
--

-- --------------------------------------------------------

--
-- Table structure for table `masalah_notifikasi`
--

CREATE TABLE `masalah_notifikasi` (
  `masalah_id` int(11) NOT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `sensor_id` int(11) DEFAULT NULL,
  `aksi_pengendalian` varchar(255) DEFAULT NULL,
  `waktu_masalah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masalah_notifikasi`
--

INSERT INTO `masalah_notifikasi` (`masalah_id`, `petugas_id`, `sensor_id`, `aksi_pengendalian`, `waktu_masalah`) VALUES
(1, 1, 1, 'Kalibrasi ulang sensor pH', '2024-11-20 03:30:00'),
(2, 2, 2, 'Perbaikan pada sensor suhu', '2024-11-20 04:00:00'),
(3, 3, 3, 'Membersihkan sensor oksigen', '2024-11-20 05:15:00'),
(4, 4, 4, 'Penggantian sensor turbidity', '2024-11-20 06:45:00'),
(5, 5, 5, 'Kalibrasi ulang sensor salinitas', '2024-11-20 07:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_kualitas`
--

CREATE TABLE `parameter_kualitas` (
  `parameter_id` int(11) NOT NULL,
  `nama_parameter` varchar(50) NOT NULL,
  `batas_aman_min` float NOT NULL,
  `batas_aman_maks` float NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parameter_kualitas`
--

INSERT INTO `parameter_kualitas` (`parameter_id`, `nama_parameter`, `batas_aman_min`, `batas_aman_maks`, `satuan`) VALUES
(1, 'pH', 6.5, 8.5, 'pH'),
(2, 'Suhu', 20, 30, 'Celsius'),
(3, 'Oksigen', 5, 8, 'mg/L'),
(4, 'Turbidity', 0, 5, 'NTU'),
(5, 'Salinitas', 0, 35, 'ppt');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `spesialis` varchar(50) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status_aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `nama`, `spesialis`, `kontak`, `email`, `status_aktif`) VALUES
(1, 'Ahmad Fauzan', 'Perbaikan Sensor pH', '081234567890', 'ahmad.fauzan@example.com', 1),
(2, 'Budi Santoso', 'Perbaikan Sensor Suhu', '081234567891', 'budi.santoso@example.com', 1),
(3, 'Citra Dewi', 'Monitoring Data', '081234567892', 'citra.dewi@example.com', 1),
(4, 'Dian Saputra', 'Kalibrasi Sensor', '081234567893', 'dian.saputra@example.com', 1),
(5, 'Erwin Ramadhan', 'Perbaikan Sensor Turbidity', '081234567894', 'erwin.ramadhan@example.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `sensor_id` int(11) NOT NULL,
  `tipe_sensor` varchar(50) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `status_sensor` tinyint(1) DEFAULT NULL,
  `tanggal_instalasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`sensor_id`, `tipe_sensor`, `lokasi`, `status_sensor`, `tanggal_instalasi`) VALUES
(1, 'pH Sensor', 'Kolam 1', 1, '2024-01-01'),
(2, 'Suhu Sensor', 'Kolam 2', 1, '2024-01-05'),
(3, 'pH Sensor', 'Kolam 3', 1, '2024-02-01'),
(4, 'Oksigen Sensor', 'Kolam 1', 0, '2024-03-01'),
(5, 'Turbidity Sensor', 'Kolam 4', 1, '2024-03-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masalah_notifikasi`
--
ALTER TABLE `masalah_notifikasi`
  ADD PRIMARY KEY (`masalah_id`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `sensor_id` (`sensor_id`);

--
-- Indexes for table `parameter_kualitas`
--
ALTER TABLE `parameter_kualitas`
  ADD PRIMARY KEY (`parameter_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`sensor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parameter_kualitas`
--
ALTER TABLE `parameter_kualitas`
  MODIFY `parameter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `masalah_notifikasi`
--
ALTER TABLE `masalah_notifikasi`
  ADD CONSTRAINT `masalah_notifikasi_ibfk_1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`petugas_id`),
  ADD CONSTRAINT `masalah_notifikasi_ibfk_2` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`sensor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
