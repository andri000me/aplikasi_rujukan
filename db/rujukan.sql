-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2020 pada 08.36
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rujukan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_diagnosa`
--

CREATE TABLE `detail_diagnosa` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `diagnosa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_diagnosa`
--

INSERT INTO `detail_diagnosa` (`id`, `no_surat`, `diagnosa`) VALUES
(7, 'RUBPJS-17042020001', 'Kanker'),
(8, 'RU-UMUM-202004001', 'Kanker');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_obat`
--

CREATE TABLE `detail_obat` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `obat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_obat`
--

INSERT INTO `detail_obat` (`id`, `no_surat`, `obat`) VALUES
(4, 'RUBPJS-17042020001', 'Paramex'),
(5, 'RU-UMUM-202004001', 'Paramex');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemeriksaan`
--

CREATE TABLE `detail_pemeriksaan` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `pemeriksaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemeriksaan`
--

INSERT INTO `detail_pemeriksaan` (`id`, `no_surat`, `pemeriksaan`) VALUES
(5, 'RUBPJS-17042020001', 'Tensi'),
(6, 'RU-UMUM-202004001', 'Tensi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `penyakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penyakit`
--

INSERT INTO `detail_penyakit` (`id`, `no_surat`, `penyakit`) VALUES
(7, 'RUBPJS-17042020001', 'Jantung'),
(8, 'RU-UMUM-202004001', 'Jantung'),
(9, 'RU-UMUM-202004001', 'Jantung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_umum`
--

CREATE TABLE `detail_umum` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `kode_penyakit` varchar(50) NOT NULL,
  `kode_diagnosa` varchar(50) NOT NULL,
  `kode_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(11) NOT NULL,
  `diagnosa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `diagnosa`) VALUES
(1, 'Kanker'),
(2, 'Tumor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `kode_jabatan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `kode_jabatan`, `jabatan`) VALUES
(1, 'J-001', 'Perawat'),
(2, 'J-002', 'Pimpinan'),
(3, 'J-003', 'Administrasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `obat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `obat`) VALUES
(1, 'Paramex'),
(2, 'Bodrex'),
(3, 'Kalpanak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `kode_pasien` varchar(50) NOT NULL,
  `no_identitas` varchar(30) NOT NULL,
  `kategori_pasien` varchar(100) DEFAULT NULL,
  `no_bpjs` varchar(50) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `usia` double NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `kode_pasien`, `no_identitas`, `kategori_pasien`, `no_bpjs`, `nama_pasien`, `jenis_kelamin`, `usia`, `alamat`, `no_hp`, `tanggal_daftar`) VALUES
(4, 'PSN-002', '15710202020900514', 'BPJS', '1234567891021', 'Ridho', 'Pria', 10, '<p>Jambi</p>', '085522523366', '2020-04-14'),
(5, 'PSN-003', '222', 'BPJS', '5555', 'Siska', 'Wanita', 15, '<p>Jakarta</p>', '085296072649', '2020-04-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien_bpjs`
--

CREATE TABLE `pasien_bpjs` (
  `id` int(11) NOT NULL,
  `kode_pasien` varchar(50) NOT NULL,
  `no_identitas` varchar(30) NOT NULL,
  `no_bpjs` varchar(50) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `usia` double NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jabatan`) VALUES
(1, '123', 'Eko Kurniadi', 'Laki-Laki', '1995-02-02', 'Islam', '<p>Jambi</p>', '085296072649', 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_fisik`
--

CREATE TABLE `pemeriksaan_fisik` (
  `id` int(11) NOT NULL,
  `pemeriksaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeriksaan_fisik`
--

INSERT INTO `pemeriksaan_fisik` (`id`, `pemeriksaan`) VALUES
(1, 'Tensi'),
(2, 'bla bla bla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(50) NOT NULL,
  `penyakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode_penyakit`, `penyakit`) VALUES
(1, 'P-001', 'Jantung'),
(2, 'P-002', 'Ginjal'),
(3, 'P-003', 'Gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `kode_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `kode_poli`, `nama_poli`) VALUES
(1, 'POLI-001', 'Poli Gigi'),
(2, 'POLI-002', 'Poli THT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah_sakit_rujukan`
--

CREATE TABLE `rumah_sakit_rujukan` (
  `id` int(11) NOT NULL,
  `kode_rumah_sakit` varchar(50) NOT NULL,
  `nama_rumah_sakit` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `terima_bpjs` enum('YA','TIDAK') NOT NULL DEFAULT 'TIDAK'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumah_sakit_rujukan`
--

INSERT INTO `rumah_sakit_rujukan` (`id`, `kode_rumah_sakit`, `nama_rumah_sakit`, `alamat`, `terima_bpjs`) VALUES
(1, 'RS-001', 'RS Baiturahim', '<p>Lebak Bandung</p>', 'YA'),
(2, 'RS-002', 'RS Siloam Hospital', '<p>Thehok</p>', 'TIDAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_bpjs`
--

CREATE TABLE `surat_bpjs` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `kode_pasien` varchar(50) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `umur` int(5) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_kartu` varchar(50) NOT NULL,
  `kode_rumah_sakit` varchar(50) NOT NULL,
  `nama_rumah_sakit` varchar(50) NOT NULL,
  `poli` varchar(50) NOT NULL,
  `kode_pegawai` varchar(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_bpjs`
--

INSERT INTO `surat_bpjs` (`id`, `no_surat`, `tanggal_surat`, `kode_pasien`, `nama_pasien`, `umur`, `jenis_kelamin`, `alamat`, `no_kartu`, `kode_rumah_sakit`, `nama_rumah_sakit`, `poli`, `kode_pegawai`, `nama_pegawai`) VALUES
(2, 'RUBPJS-17042020001', '2020-04-17', 'PSN-003', 'Siska', 15, 'Wanita', '<p>Jakarta</p>', '5555', 'RS-002', 'RS Siloam Hospital', 'Poli Gigi', '123', 'Eko Kurniadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_umum`
--

CREATE TABLE `surat_umum` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `kode_pasien` varchar(50) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `umur` int(5) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kode_rumah_sakit` varchar(50) NOT NULL,
  `nama_rumah_sakit` varchar(50) NOT NULL,
  `poli` varchar(50) NOT NULL,
  `kode_pegawai` varchar(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_umum`
--

INSERT INTO `surat_umum` (`id`, `no_surat`, `tanggal_surat`, `kode_pasien`, `nama_pasien`, `umur`, `jenis_kelamin`, `alamat`, `kode_rumah_sakit`, `nama_rumah_sakit`, `poli`, `kode_pegawai`, `nama_pegawai`) VALUES
(1, 'RU-UMUM-202004001', '2020-04-17', 'PSN-003', 'Siska', 15, 'Wanita', '<p>Jakarta</p>', 'RS-001', 'RS Baiturahim', 'Poli Gigi', '123', 'Eko Kurniadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','Kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', '12345', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pemeriksaan`
--
ALTER TABLE `detail_pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_penyakit`
--
ALTER TABLE `detail_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_umum`
--
ALTER TABLE `detail_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien_bpjs`
--
ALTER TABLE `pasien_bpjs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemeriksaan_fisik`
--
ALTER TABLE `pemeriksaan_fisik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rumah_sakit_rujukan`
--
ALTER TABLE `rumah_sakit_rujukan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_bpjs`
--
ALTER TABLE `surat_bpjs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_umum`
--
ALTER TABLE `surat_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_pemeriksaan`
--
ALTER TABLE `detail_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `detail_penyakit`
--
ALTER TABLE `detail_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `detail_umum`
--
ALTER TABLE `detail_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pasien_bpjs`
--
ALTER TABLE `pasien_bpjs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaan_fisik`
--
ALTER TABLE `pemeriksaan_fisik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rumah_sakit_rujukan`
--
ALTER TABLE `rumah_sakit_rujukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_bpjs`
--
ALTER TABLE `surat_bpjs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_umum`
--
ALTER TABLE `surat_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
