-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2019 pada 09.58
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mpk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `anggota_id` int(11) NOT NULL,
  `angkatan_id` int(11) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `jabatan_id` int(11) NOT NULL DEFAULT '16',
  `kelas` varchar(10) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kontak` text NOT NULL,
  `catatan_sikap_baik` text NOT NULL,
  `catatan_sikap_buruk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`anggota_id`, `angkatan_id`, `nama`, `jabatan_id`, `kelas`, `jenis_kelamin`, `alamat`, `kontak`, `catatan_sikap_baik`, `catatan_sikap_buruk`) VALUES
(3, 2, 'Nathieq Sah', 1, '', 'Laki-laki', '', '', '', ''),
(4, 2, 'Farid', 1, '', 'Laki-laki', '', '', '', ''),
(5, 3, 'Sella', 16, '', 'Perempuan', '', '', '', ''),
(6, 2, 'Alief', 1, 'XII RPL A', 'Laki-laki', '', '', '', ''),
(7, 2, 'Alfie', 1, 'XII RPL A', 'Laki-laki', '', '', '', ''),
(8, 2, 'Nadine', 1, 'XII RPL A', 'Laki-laki', '', '', '', ''),
(9, 2, 'Fauzul', 1, 'XII RPL A', 'Laki-laki', '', '', '', ''),
(10, 2, 'Abdul', 1, 'XII RPL A', 'Laki-laki', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_angkatan`
--

CREATE TABLE `tb_angkatan` (
  `angkatan_id` int(11) NOT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `masa_jabatan` varchar(4) NOT NULL,
  `visi_angkatan` text NOT NULL,
  `misi_angkatan` text NOT NULL,
  `active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_angkatan`
--

INSERT INTO `tb_angkatan` (`angkatan_id`, `angkatan`, `masa_jabatan`, `visi_angkatan`, `misi_angkatan`, `active`) VALUES
(1, 43, '2018', 'Tidak diketahui', 'Tidak diketahui', 0),
(2, 44, '2019', 'Tidak diketahui', 'Tidak diketahui', 1),
(3, 45, '2020', 'Tidak diketahui', 'Tidak diketahui', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aspirasi`
--

CREATE TABLE `tb_aspirasi` (
  `aspirasi_id` int(11) NOT NULL,
  `nama_pengirim` varchar(40) NOT NULL,
  `kontak` text NOT NULL,
  `subject` text NOT NULL,
  `isi_aspirasi` text NOT NULL,
  `tgl_kirim` date NOT NULL,
  `status` varchar(40) DEFAULT '"Unchecked"'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_aspirasi`
--

INSERT INTO `tb_aspirasi` (`aspirasi_id`, `nama_pengirim`, `kontak`, `subject`, `isi_aspirasi`, `tgl_kirim`, `status`) VALUES
(6, 'Nathieq', '@rinths46', 'This is sample text', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.', '2019-08-13', '\"Unchecked\"'),
(7, 'Farid', 'mfarid', 'This is Spartaa', 'This is one of the better text generators with 10 different languages (or language styles) to generate. They also include the CSS parameters in case you are interested in styling everything correctly. Of course, the features are pretty standard with options like define the amount of words or characters and the amount of paragraphs.', '2019-07-25', '\"Unchecked\"'),
(8, 'Farid', 'mfarid', 'This is Sample Aspiration', 'This is one of the simpler, no-frills text generators based only on Lorem Ipsum. You basically are only able to adjust the amount of paragraphs or words. You can also create bulleted lists or generate your text based on how many bytes it should be. A nice addition here, is that it offers you some background information on the use and history of ‘Lorem Ipsum.’', '2019-08-16', '\"Unchecked\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`jabatan_id`, `jabatan`) VALUES
(1, 'Ketua'),
(2, 'Wakil Ketua'),
(3, 'Sekretaris'),
(4, 'Bendahara'),
(5, 'Komisi 1'),
(6, 'Komisi 2'),
(7, 'Komisi 3'),
(8, 'Komisi 4'),
(9, 'Komisi 5'),
(10, 'Komisi 6'),
(11, 'Komisi 7'),
(12, 'Komisi 8'),
(13, 'Komisi 9'),
(14, 'Komisi 10'),
(15, 'Komisi 11'),
(16, 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `pesan_id` int(11) NOT NULL,
  `nama_pengirim` varchar(40) NOT NULL,
  `kontak` text NOT NULL,
  `penerima` varchar(40) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tgl_kirim` date NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`pesan_id`, `nama_pengirim`, `kontak`, `penerima`, `isi_pesan`, `tgl_kirim`, `status`) VALUES
(2, 'Farid', 'mfarid', 'Nathieq', 'This is again your standard text generator, but what’s different here is it’s available in more than 10 different languages (including Morse Code). You are also able to download or just copy and paste the HTML code or just the words.', '2019-08-01', '\"Unchecked\"'),
(3, 'Nathieq', 'nathieqs', 'Farid', 'What I liked about this one was the English option. It’s pretty similar with most of these generators in their function and features—but this one simply asks whether you want the ‘lorem ipsum’ gibberish or do you want your gibberish in English words. You are also able to insert random styling, which is extremely useful.', '2019-07-10', '\"Unchecked\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_proker`
--

CREATE TABLE `tb_proker` (
  `proker_id` int(11) NOT NULL,
  `nama_proker` varchar(200) NOT NULL,
  `desc_proker` text NOT NULL,
  `tgl_kegiatan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_proker`
--

INSERT INTO `tb_proker` (`proker_id`, `nama_proker`, `desc_proker`, `tgl_kegiatan`) VALUES
(1, 'Sidang 3 Bulanan', 'Wafer donut candy. Gummies tootsie roll marshmallow. Sweet roll tootsie roll tart. Chocolate bar marzipan gummies jelly dessert macaroon lollipop topping gingerbread. Donut sugar plum halvah gummies muffin pudding.Chocolate cake biscuit candy canes carrot cake. Bear claw wafer jujubes bear claw candy biscuit. Jelly-o pudding topping. Muffin soufflé cotton candy topping candy muffin biscuit. Lemon drops lemon drops powder gingerbread pastry cake.', '2019-08-19'),
(2, 'Sidang Proker', 'Topping jelly-o muffin pie. Apple pie dessert oat cake liquorice marshmallow danish gummies tart. Fruitcake toffee tiramisu. Candy canes candy canes biscuit gummies jujubes souffle caramels. Lollipop bonbon danish gingerbread sesame snaps dragee.Pudding ice cream macaroon caramels oat cake gummies jelly-o wafer macaroon. Gingerbread cheesecake pudding donut halvah pastry cheesecake. Tootsie roll lemon drops brownie ice cream jelly jelly fruitcake. Muffin tiramisu cake ice cream.', '2019-08-01'),
(3, 'LDKM dan LDKO', 'Cotton candy cheesecake sweet roll. Gummi bears tiramisu jelly powder. Dessert pie apple pie chocolate bar carrot cake donut chupa chups. Cookie marzipan sweet roll chocolate topping candy canes. Carrot cake croissant jujubes chupa chups cupcake apple pie caramels cake icing.Pie soufflé gummies danish cake pudding tart lollipop. Donut apple pie marzipan. Cupcake pastry gingerbread chocolate cake ice cream icing muffin. Lemon drops cotton candy liquorice candy icing ice cream bear claw. Candy gummies gummies macaroon jujubes biscuit lemon drops.', '2019-10-17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`anggota_id`),
  ADD KEY `angkatan_id` (`angkatan_id`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indeks untuk tabel `tb_angkatan`
--
ALTER TABLE `tb_angkatan`
  ADD PRIMARY KEY (`angkatan_id`),
  ADD UNIQUE KEY `angkatan` (`angkatan`);

--
-- Indeks untuk tabel `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  ADD PRIMARY KEY (`aspirasi_id`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`pesan_id`);

--
-- Indeks untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  ADD PRIMARY KEY (`proker_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_angkatan`
--
ALTER TABLE `tb_angkatan`
  MODIFY `angkatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  MODIFY `aspirasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `pesan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  MODIFY `proker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`angkatan_id`) REFERENCES `tb_angkatan` (`angkatan_id`),
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `tb_jabatan` (`jabatan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
