-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2023 pada 06.13
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indekosdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `book_id` bigint(250) NOT NULL,
  `room_label` varchar(250) NOT NULL,
  `tenant_name` varchar(250) NOT NULL,
  `book_start_date` date NOT NULL,
  `book_end_date` date NOT NULL,
  `book_tr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`book_id`, `room_label`, `tenant_name`, `book_start_date`, `book_end_date`, `book_tr_date`) VALUES
(20134462, 'LW-02', 'Chandre', '2000-01-01', '2001-01-01', '2019-04-23'),
(20893391, 'LM-03', 'Muhammad Budi', '2023-01-01', '2024-01-01', '2022-12-13'),
(27723401, 'LM-07', 'Ricky Chandrean', '2023-01-01', '2024-01-01', '2022-12-20'),
(73543848, 'MM-06', 'Nicholas', '2023-01-01', '2024-01-01', '2022-12-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `invoiceid` varchar(250) NOT NULL,
  `bookingid` varchar(8) NOT NULL,
  `tenant_name` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `tenant_address` varchar(250) NOT NULL,
  `Zip_code` varchar(250) NOT NULL,
  `tenant_phone` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `date` date NOT NULL,
  `room_size` varchar(250) NOT NULL,
  `room_label` varchar(10) NOT NULL,
  `month` int(250) NOT NULL,
  `price` int(250) NOT NULL,
  `paymentStat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`invoiceid`, `bookingid`, `tenant_name`, `company`, `tenant_address`, `Zip_code`, `tenant_phone`, `date`, `room_size`, `room_label`, `month`, `price`, `paymentStat`) VALUES
('KB004', '-', 'Aulia Medinah', '-', '-', '-', 000000000000, '2022-12-12', ' Small', 'SM-04', 1, 10000000, 'unpaid'),
('KB005', '51049861', 'Hilmy Firdaus', '-', 'Jl. Pramuka Sari', '-', 082347548377, '2022-12-13', 'Large', 'LM-09', 12, 1000000, 'unpaid'),
('KB006', '81120189', 'Imelda Dahlia', '-', 'Jl. Cikini', '-', 088279900030, '2022-12-13', 'Large', 'LM-01', 12, 1000000, 'unpaid'),
('KB007', '20893391', 'Muhammad Budi', '-', 'Jl. Cipinang Utara', '-', 084361459908, '2022-12-13', 'Large', 'LM-03', 12, 1000000, 'Paid'),
('KB008', '38487111', 'Rocky Amaral', '-', 'Jl. Kramat Jaya', '-', 082234515677, '2022-12-14', 'Medium', 'MM-08', 12, 1000000, 'unpaid'),
('KB011', '19577188', 'Satria Gucci', '-', 'Warsun', '-', 081546798236, '2022-12-19', 'Large', 'LW-02', 12, 1000000, 'unpaid'),
('KB012', '27723401', 'Ricky Chandrean', '-', 'Pandawa Kost', '-', 081521515366, '2022-12-20', 'Large', 'LM-07', 12, 1000000, 'Paid'),
('KB013', '18541949', 'Nicholas', '-', 'Haji', '-', 008456157958, '2022-12-20', 'Large', 'LW-02', 12, 1000000, 'unpaid'),
('KB014', '81751683', 'Chandrean', '-', 'Pandawa', '-', 082564835648, '2022-12-20', 'Large', 'LM-01', 13, 1000000, 'unpaid'),
('KB015', '-', 'Adam Bima', 'none', 'Pandawa', '123', 081521515366, '2022-12-23', ' Small', 'SM-04', 12, 1000000, 'unpaid'),
('KB016', '21845643', 'Alghi', '-', 'Hj dayat', '-', 008123456789, '2023-03-16', 'Medium', 'MM-02', 1, 1000000, 'unpaid'),
('KB017', '20134462', 'Chandre', '-', 'Pandawa', '-', 005617091299, '2023-04-19', 'Large', 'LW-02', 12, 1000000, 'unpaid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `room_id` bigint(250) NOT NULL,
  `room_gender` varchar(10) NOT NULL,
  `room_size` varchar(10) NOT NULL,
  `room_label` varchar(250) NOT NULL,
  `room_location` varchar(250) NOT NULL,
  `room_window` varchar(250) NOT NULL,
  `room_monthly_cost` varchar(250) NOT NULL,
  `room_availabality` varchar(250) NOT NULL,
  `room_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`room_id`, `room_gender`, `room_size`, `room_label`, `room_location`, `room_window`, `room_monthly_cost`, `room_availabality`, `room_description`) VALUES
(2203270001, 'Men', 'Large', 'LM-01', '1st Floor', 'Garden', '1000000', 'Booked', '-'),
(2203270002, 'Men', 'Medium', 'MM-02', '1st Floor', 'Hallway', '1000000', 'Unoccupied', '-'),
(2203270003, 'Men', 'Large', 'LM-03', '1st Floor', 'Garden', '1000000', 'Booked', '-'),
(2203270004, 'Men', 'Small', 'SM-04', '1st Floor', 'Hallway', '1000000', 'Unoccupied', '-'),
(2203270005, 'Men', 'Small', 'SM-05', '1st Floor', 'Hallway', '1000000', 'Unoccupied', '-'),
(2203270006, 'Men', 'Medium', 'MM-06', '1st Floor', 'Hallway', '1000000', 'Booked', '-'),
(2203270007, 'Men', 'Large', 'LM-07', '1st Floor', 'Hallway', '1000000', 'Booked', '-'),
(2203270008, 'Men', 'Medium', 'MM-08', '1st Floor', 'Hallway', '1000000', 'Unoccupied', '-'),
(2203270009, 'Men', 'Large', 'LM-09', '1st Floor', 'Hallway', '1000000', 'Booked', '-'),
(2203270010, 'Men', 'Small', 'SM-10', '1st Floor', 'Hallway', '1000000', 'Unoccupied', '-'),
(2203270011, 'Women', 'Medium', 'MW-01', '2nd Floor', 'Garden', '1000000', 'Unoccupied', '-'),
(2203270012, 'Women', 'Large', 'LW-02', '2nd Floor', 'Hallway', '1000000', 'Booked', '-'),
(2203270013, 'Women', 'Small', 'SW-03', '2nd Floor', 'Hallway', '1000000', 'Unoccupied', '-'),
(2203270014, 'Women', 'Medium', 'MW-04', '2nd Floor', 'Kitchen', '1000000', 'Unoccupied', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenant`
--

CREATE TABLE `tenant` (
  `userid` int(11) NOT NULL,
  `tenant_id` bigint(250) NOT NULL,
  `tenant_name` varchar(250) NOT NULL,
  `tenant_gender` varchar(10) NOT NULL,
  `tenant_address` varchar(250) NOT NULL,
  `tenant_ktp_no` bigint(16) NOT NULL,
  `tenant_phone` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `tenant_email` varchar(250) NOT NULL,
  `tenant_bankaccount` varchar(250) NOT NULL,
  `tenant_bankaccount_no` bigint(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tenant`
--

INSERT INTO `tenant` (`userid`, `tenant_id`, `tenant_name`, `tenant_gender`, `tenant_address`, `tenant_ktp_no`, `tenant_phone`, `tenant_email`, `tenant_bankaccount`, `tenant_bankaccount_no`) VALUES
(0, 13432455, 'Muhammad Budi', 'Male', 'Jl. Cipinang Utara', 56835877858, 084361459908, 'hanif112@gmail.com', 'BCA', 12354162),
(0, 13453489, 'Aulia Medinah', 'Female', 'Jl. Balap Sepeda', 63255484636, 086774485549, 'aulmedina@gmail.com', 'BCA', 25425351),
(10, 21910249, 'Ricky Chandrean', 'Male', 'Pandawa Kost', 123456789, 081521515366, 'rickychandream@gmail.com', 'BCA', 5125206350),
(0, 23487284, 'Farhan Andika', 'Male', 'Jl.Pemuda', 31435664562, 081355789821, 'farhanandika31@gmail.com', 'BRI', 36837493),
(0, 24425434, 'Imelda Dahlia', 'Female', 'Jl. Cikini', 25245245624, 088279900030, 'imeldadahlia@gmail.com', 'BNI', 12312434),
(0, 24534363, 'Raihan Wibisana', 'Male', 'Jl. Mutiara', 64364646425, 083299083233, 'wibisanaraihan2@gmail.com', 'BCA', 45245425),
(0, 29755229, 'Juan Marko ', '', 'Jl.Anggrek Muda', 35872457856, 081387329655, 'juanmarko07@gmail.com', 'BNI', 95623390),
(0, 34232474, 'Estella Berkamp', '', 'Jl. Tegalan', 46335665653, 082134548679, 'estellaberkg@gmail.com', 'BRI', 25254252),
(0, 34553523, 'Dewi Wanda', '', 'Jl. Mekarsari', 47435675426, 086576567543, 'dewanda@gmail.com', 'BNI', 34665432),
(0, 35677783, 'Bima Rizky', '', 'Jl. Gondangdia', 37846587465, 083321345666, 'bimarizky@gmail.com', 'BCA', 34252525),
(0, 42423872, 'Noviarti Putri', '', 'Jl. Rawamangun', 37567346767, 081334548790, 'noviati2311@gmail.com', 'BRI', 27346541),
(0, 42525452, 'Rocky Amaral', '', 'Jl. Kramat Jaya', 37657367365, 082234515677, 'rockyamaral21@gmail.com', 'BNI', 34757712),
(0, 43567452, 'Tifanny Putri', '', 'Jl. Kuningan Indah', 52454552324, 089923442344, 'tifannyput3444@gmail.com', 'BCA', 23234234),
(0, 45634554, 'Naura Firdha', '', 'Jl. Perak ', 47365746531, 082188438909, 'naurafirdha@gmail.com', 'BRI', 24552334),
(0, 45654992, 'Nicholas Ali', '', 'Jl. Kerawang', 23542254542, 081378347572, 'nicholasali@gmail.com', 'BCA', 24525242),
(15, 46966262, 'Claine', 'Male', 'kowandi', 1564879795, 046497954664, 'claine@gmail.com', 'BCA', 156498792546),
(17, 48572509, 'Satria Gucci', 'Male', 'Warsun', 15648791645, 081546798236, 'Satria@gmail.com', 'BCA', 16489785926),
(0, 53454335, 'Adam Rusla', '', 'Jl .Pulomas Jaya', 34535345352, 082195895098, 'adamrusla@gmail.com', 'BNI', 42675671),
(0, 53454335, 'Dimas Rizky A', '', 'Jl.Pulomas Jaya', 3584375648768643, 082195895098, 'adaad@gmail.com', 'BRIa', 34545321),
(0, 58768998, 'Maryam Hamir', '', 'Jl. Soekarno Hatta', 14234234231, 082387874451, 'maryamhamir@gmail.com', 'BRI', 12313123),
(12, 66429557, 'Chandre', 'Male', 'Pandawa', 561748953, 005617091299, 'chan@gmail.com', 'BCA', 5125206350),
(0, 67856390, 'Asyrullah Ikbar', '', 'Jl. Haji Muhidin', 13123213142, 083487421232, 'asyrullahikbar@gmail.com', 'BNI', 56333356),
(0, 78906851, 'Ayu Dina', '', 'Jl. Haruwangi', 74657346534, 082148747434, 'ayudinaa@gmail.com', 'BCA', 23423423),
(21, 83497775, 'Chandrean', 'Male', 'Pandawa', 4652948765, 082564835648, 'chan@gmail.com', 'BCA', 468592635486748),
(0, 89895678, 'Hilmy Firdaus', '', 'Jl. Pramuka Sari', 65766345643, 082347548377, 'hilmyfirdaus@gmail.com', 'BNI', 32423421),
(16, 98680079, 'Alghi', 'Male', 'Hj dayat', 123456789, 008123456789, 'algi@gmail.com', 'Mandiri', 12645987564),
(0, 98984553, 'Nur Izzah', '', 'Jl. Budi Utomo', 23742374411, 082172348367, 'nurizzah@gmail.com', 'BRI', 23743654),
(0, 23746732478, 'Adam Bima', '', 'Jl.Pulomas Jaya 11', 3584375648768648, 082195895093, 'adambima@gmail.com', 'BRI', 34545321);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'admin1', '$2y$10$dtMOSon1a6fM4BixVG3EgOqxZxDQsC6kBXM97tOdRIEBDutkNrvGO'),
(5, 'admin2', '$2y$10$E9OO1QwEI.YELDqD30nCRe8HM/2OchTTL8DVsO4fulArxk3rXyRna'),
(13, 'deyo', '$2y$10$kyNu4dIyU3lnXRCgBzH2Hub7DIxkqTplAmJW6tgiASSNLwCbPIPB.'),
(14, 'deyo1', '$2y$10$vFhYFQmWpRDUzdzXNBhGN.pi2ZbxAgaiqwlkg/dI5.jOE7Ky5Dari'),
(18, 'cky', '$2y$10$7Fdi9v/WOVx/L2s0c0.VGe8xbSEpPjqKDKAwTb2Dy5H2IKRHa/nOO'),
(19, 'rick', '$2y$10$D5WpIGVnuBknOldgnYY6mu2m57vIeaLAVsAbrkhRj7jSGbjrMaf16'),
(20, 'chan', '$2y$10$CdG7JKWB71L0Fvn0eBHnfufYAvhrutjjxUj3f3PtAcY/Lhpk2fhCe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regist` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `regist`) VALUES
(3, 'adamr', '$2y$10$FzSqADZyIEL.zKQGVLLfVekMx2GpfZGnCAoA9n6ObDBJrqeIy0pkm', 'yes'),
(4, 'rafi', '$2y$10$kZnf.aPnDN/1.5nc4NISs.Tf6D5S9./3W/Sg9tTM9RVCIECp8EIza', 'yes'),
(5, 'rafiatha', '$2y$10$OYQY21.PJnnqgghUm7At/..RF2IrAgJkzd.g/jTsWxjLJbPoaXXR2', 'yes'),
(6, 'rafiathafahero', '$2y$10$NVifXM9IYhvdVRCm2Jr.l.S21yKDV03tKrfV4F4i.Spu9DqkSlhxe', 'yes'),
(10, 'ricky', '$2y$10$eSgfQSdTB4LSTMzyBXqnzuIdh2Z65OpFBDilu6QP4M/CHhA82hZfC', ''),
(12, 'chan', '$2y$10$/Sur2NM67pOPnaAp42VzTeeIGsDgGYuK/AUb5LhdUwhj.rqxGCmXO', 'yes'),
(15, 'claine', '$2y$10$giSAodDuMKIzGdmvTzbQbupYFUAqV6giteRrwbBZKCSkzSCurPKJm', ''),
(16, 'alghi', '$2y$10$2TmQy5ttzX7T0tMmtlbkpuJTu0MNA/JRkJBk8MmFOwBCvm4jTcNli', 'yes'),
(17, 'satria', '$2y$10$UtFanKZY3LI6qLpv4WiBteyqF0.PAJff//CLSbvsbqb.s3ssVgY2y', ''),
(21, 'chandrean', '$2y$10$nAHHD4VgJHuSiQ7uZmjxLOUSrIGTbfgP2a7.sRJFcDgsUBzIZexIu', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`,`room_label`) USING BTREE;

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceid`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`) USING BTREE;

--
-- Indeks untuk tabel `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`,`tenant_name`,`tenant_phone`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98532631;

--
-- AUTO_INCREMENT untuk tabel `room`
--
ALTER TABLE `room`
  MODIFY `room_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2203273457;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
