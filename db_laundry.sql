-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2024 pada 21.42
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_londry`
--

CREATE TABLE `data_londry` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `pembayaran` enum('Belum Lunas','Lunas') NOT NULL,
  `status` varchar(100) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_londry`
--

INSERT INTO `data_londry` (`id`, `nama`, `alamat`, `telepon`, `paket`, `pembayaran`, `status`, `berat`, `harga`, `gambar`) VALUES
(6, 'Muhammad Ikhsan', 'Jambi', '087372973', 'Cuci Baju', 'Lunas', 'Baru', '12 Kg', 'Rp 12.000', '659716c53106c.jpeg'),
(7, 'Suci Saputri', 'Aceh', '0826772811', 'Cuci Levis', 'Belum Lunas', 'Baru', '17 Kg', 'Rp 20.000', '6597174abd884.jpg'),
(11, 'Gigi Bintaro', 'Jakarta', 'Lama', 'Cuci Selimut', 'Lunas', 'Lama', '1 Kg', 'Rp 6.000', '659717d5be812.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registeration`
--

CREATE TABLE `registeration` (
  `Reg_ID` int(11) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Passowrd` varchar(40) DEFAULT NULL,
  `Role_ID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `registeration`
--

INSERT INTO `registeration` (`Reg_ID`, `Name`, `Email`, `Passowrd`, `Role_ID_FK`) VALUES
(2, 'Admin', 'admin@gmail.com', '123', 1),
(6, 'Pimpinan', 'ketua@gmail.com', '123', 2),
(7, 'Staf', 'staf@gmail.com', '123', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `Roles` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`ID`, `Roles`) VALUES
(1, 'Admin'),
(2, 'Pimpinan'),
(3, 'Staf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_londry`
--
ALTER TABLE `data_londry`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `registeration`
--
ALTER TABLE `registeration`
  ADD PRIMARY KEY (`Reg_ID`),
  ADD UNIQUE KEY `email_id` (`Email`),
  ADD KEY `Role_ID_FK` (`Role_ID_FK`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_londry`
--
ALTER TABLE `data_londry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `registeration`
--
ALTER TABLE `registeration`
  MODIFY `Reg_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `registeration`
--
ALTER TABLE `registeration`
  ADD CONSTRAINT `registeration_ibfk_1` FOREIGN KEY (`Role_ID_FK`) REFERENCES `roles` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
