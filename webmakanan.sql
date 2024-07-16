-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 07:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmakanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Email`, `Password`) VALUES
('Aura_Amylia', 'auraamyliaa7@gmail.com', 'http.amyliaa');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `penjelasan` text NOT NULL,
  `porsi` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `kategori` enum('sarapan','makan_siang','makan_malam','') NOT NULL,
  `bahan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`bahan`)),
  `langkah` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`langkah`)),
  `user_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id`, `instagram`, `foto`, `nama_masakan`, `penjelasan`, `porsi`, `waktu`, `kategori`, `bahan`, `langkah`, `user_id`, `created_at`) VALUES
(1, '@http.amyliaa', 'NasiKecombrang.jpg', 'Nasi goreng bunga kecombrang', 'Nasi kecombrang adalah hidangan nasi yang dimasak dengan bunga kecombrang (Etlingera elatior), yang memberikan aroma dan rasa unik. Kecombrang ini dikenal karena memberikan cita rasa segar dan sedikit pedas, serta aroma harum yang khas.', '2', '15 menit', 'sarapan', '[\"2 porsi Nasi putih\",\"sesuai selera Bakso sapi\",\"1 bunga kecombrang ukuran kecil rajang halus\",\"3 bawang putih rajang\",\"5 bawang merah rajang\",\"1/4 st trasi\",\"1 sm saus tiram\",\"1 sm kaldu bubuk jamur\",\"Garam (sesuai selera)\",\"Gula (sesuai selera)\",\"Daun bawang iris halus\",\"iris Lombok rawit galak\",\"Wortel potong cantik (bila suka)\"]', '[\" 1. Tumis bawang putih dan bawang merah,bunga kecombrang, trasi, bakso,wortel, hingga harum\",\"2. Masukkan nasi putih, aduk rata, masukkan garam,gula, saus tiram, daun bawang.\",\"3. Terakhir masukkan rajangan cabenya. Matikan api sajikan.\"]', 'Aura_Amylia', '2024-07-13 11:01:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `UNIQUE` (`Email`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
