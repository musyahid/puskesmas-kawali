-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2021 pada 16.18
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cigenerator`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bidang`
--

CREATE TABLE `tbl_bidang` (
  `id_bidang` int(50) NOT NULL,
  `nama_bidang` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bidang`
--

INSERT INTO `tbl_bidang` (`id_bidang`, `nama_bidang`) VALUES
(3, 'BIDANG PENANGGULANGAN UKM ESEN'),
(4, 'BIDANG PENANGGULANGAN UKM PENG'),
(5, 'BIDANG PENANGGULANGAN KEFARMAS'),
(6, 'BIDANG PENANGGULANGAN JARINGAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_departemen`
--

CREATE TABLE `tbl_departemen` (
  `id_departemen` int(50) NOT NULL,
  `nama_departemen` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_departemen`
--

INSERT INTO `tbl_departemen` (`id_departemen`, `nama_departemen`) VALUES
(4, 'KEUANGAN'),
(5, 'PELAYANAN'),
(6, 'ADMINISTRASI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_diagnosa_penyakit`
--

CREATE TABLE `tbl_diagnosa_penyakit` (
  `id_diagnosa_penyakit` varchar(30) NOT NULL,
  `nama_penyakit` varchar(30) DEFAULT NULL,
  `ciri_ciri_penyakit` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `ciri_ciri_umum` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_diagnosa_penyakit`
--

INSERT INTO `tbl_diagnosa_penyakit` (`id_diagnosa_penyakit`, `nama_penyakit`, `ciri_ciri_penyakit`, `keterangan`, `ciri_ciri_umum`) VALUES
('P1', 'Jantung', 'Darah Tinggi', 'Penyakit Masa Tua', 'Sering pusing'),
('P2', 'Pilek', 'Bersin dan radang tenggorokan', 'Penyakit Umum', 'Panas'),
('P3', 'cacar', 'merah merah', 'kulit', 'benjolan merah'),
('P4', 'Corona', 'Demam, hilang indra penciuman', 'Virus Berbahaya', 'Sakit kepala, demam, hilang indra penciuman'),
('P6', 'Asma', 'Sesak nafas', 'Kasih obat', 'Sesak nafas dan sakit dada'),
('P7', 'Typus', 'Demam', 'Harus di rawat', 'Demam, ga nasfu makan'),
('P8', 'Gigi Berlubang', 'Sakit gigi, demam', 'Harus ditambal atau dicabut', 'Demam dan sakit kepala'),
('P9', 'Plak pada sela gigi', 'Gusi merah dan bengkak', 'Harus Scalling', 'Gusi merah dan bengkak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `kode_dokter` int(50) NOT NULL,
  `nama_dokter` varchar(30) DEFAULT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `alamat_tinggal` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `status_menikah` varchar(30) DEFAULT NULL,
  `id_spesialis` int(11) DEFAULT NULL,
  `id_poliklinik` int(11) DEFAULT NULL,
  `no_izin_praktek` varchar(100) DEFAULT NULL,
  `golongan_darah` varchar(30) DEFAULT NULL,
  `alumni` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`kode_dokter`, `nama_dokter`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat_tinggal`, `no_hp`, `status_menikah`, `id_spesialis`, `id_poliklinik`, `no_izin_praktek`, `golongan_darah`, `alumni`) VALUES
(3, 'Dr Putri', 'P', 'CIAMIS', '2021-02-28', 'ISLAM', 'KAWALI', '097654567413', 'BELUM MENIKAH', 4, 1, '456789123abc', 'A', 'UNES'),
(15, 'dr Azada Quarty Rowya', 'L', 'Bandung', '2011-02-01', 'ISLAM', 'Bandung', '085322749697', 'BELUM MENIKAH', 1, 6, '789456123abcd', 'A', 'POLITEKNIK BANDUNG'),
(16, 'dr Irma Muliana', 'L', 'Surabaya', '2021-03-11', 'ISLAM', 'Bandung', '085322749697', 'BELUM MENIKAH', 5, 10, '12346789', 'B', 'POLITEKNIK BANDUNG'),
(19, 'dr Dorhot', 'P', 'Surabaya', '2021-06-10', 'KRISTEN', 'Bandung', '085322749697', 'BELUM MENIKAH', 2, 8, '123456789', 'O', 'Akper TNI AL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gedung`
--

CREATE TABLE `tbl_gedung` (
  `id_gedung` int(30) NOT NULL,
  `nama_gedung` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gedung`
--

INSERT INTO `tbl_gedung` (`id_gedung`, `nama_gedung`) VALUES
(3, 'GEDUNG 1 (KAWALI)'),
(4, 'GEDUNG 2 (BOJONG)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(15, 1, 1),
(19, 1, 3),
(20, 1, 2),
(21, 2, 1),
(24, 1, 9),
(28, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(50) NOT NULL,
  `nama_jabatan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(2, 'DOKTER PUSKESMAS'),
(3, 'PERAWAT'),
(4, 'BIDAN'),
(5, 'ANALIS'),
(6, 'ADMIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal_prakter_dokter`
--

CREATE TABLE `tbl_jadwal_prakter_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `kode_dokter` int(50) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `ja_selesai` time DEFAULT NULL,
  `id_poliklinik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal_prakter_dokter`
--

INSERT INTO `tbl_jadwal_prakter_dokter` (`id_jadwal`, `kode_dokter`, `hari`, `jam_mulai`, `ja_selesai`, `id_poliklinik`) VALUES
(6, 3, 'SABTU', '08:45:10', '15:45:10', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_bayar`
--

CREATE TABLE `tbl_jenis_bayar` (
  `id_jenis_bayar` int(11) NOT NULL,
  `jenis_bayar` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenis_bayar`
--

INSERT INTO `tbl_jenis_bayar` (`id_jenis_bayar`, `jenis_bayar`) VALUES
(1, 'SENDIRI'),
(2, 'KELUARGA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenjang_pendidikan`
--

CREATE TABLE `tbl_jenjang_pendidikan` (
  `id_jenjang_pendidikan` int(50) NOT NULL,
  `nama_jenjang_pendidikan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenjang_pendidikan`
--

INSERT INTO `tbl_jenjang_pendidikan` (`id_jenjang_pendidikan`, `nama_jenjang_pendidikan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'D4'),
(8, 'S1'),
(9, 'S2'),
(10, 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_barang`
--

CREATE TABLE `tbl_kategori_barang` (
  `id_kategori_barang` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori_barang`
--

INSERT INTO `tbl_kategori_barang` (`id_kategori_barang`, `nama_kategori`) VALUES
(1, 'OBAT TIDUR'),
(2, 'OBAT PENENANG'),
(3, 'OBAT PEREDA NYERI'),
(4, 'ANTIBIOTIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_tindakan`
--

CREATE TABLE `tbl_kategori_tindakan` (
  `id_kategori_tindakan` varchar(30) NOT NULL,
  `kategori_tindakan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori_tindakan`
--

INSERT INTO `tbl_kategori_tindakan` (`id_kategori_tindakan`, `kategori_tindakan`) VALUES
('P1', 'Suntik'),
('P2', 'Gigi'),
('P3', 'Oksigen'),
('P4', 'Perban');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'n'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'n'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'n'),
(14, 'DATA DOKTER', 'dokter', 'fa fa-graduation-cap', 0, 'y'),
(15, 'DATA POLIKLINIK', 'poliklinik', 'fa fa-university', 32, 'y'),
(16, 'DATA SPESIALIS', 'spesialis', 'fa fa-heartbeat', 32, 'y'),
(19, 'DATA BIDANG', 'bidang', 'fa fa-binoculars', 32, 'y'),
(20, 'DATA DEPARTEMEN', 'departemen', 'fa fa-building', 32, 'y'),
(21, 'DATA JABATAN', 'jabatan', 'fa fa-briefcase', 32, 'y'),
(23, 'DATA JENJANG PENDIDIKAN', 'jenjangpendidikan', 'fa fa-graduation-cap', 32, 'y'),
(25, 'DATA GEDUNG', 'gedung', 'fa fa-building-o', 32, 'y'),
(28, 'DATA RUANG RAWAT INAP', 'ruanginap', 'fa fa-bed', 32, 'y'),
(32, 'DATA MASTER', 'datamaster', 'fa fa-id-card', 0, 'y'),
(34, 'DATA PASIEN', 'pasienpuskesmas', 'fa fa-id-card-o', 0, 'y'),
(39, 'FORM PENDAFTARAN', 'form/create', 'fa fa-sticky-note-o', 0, 'y'),
(40, 'INPUT REKA RAWAT JALAN', 'form/index/walan', 'fa fa-bed', 0, 'y'),
(42, 'MODUL APOTEK', 'modulapotek', 'fa fa-bed', 0, 'y'),
(43, 'DATA KATEGORI BARANG', 'kategoribarang', 'fa fa-graduation-cap', 42, 'y'),
(44, 'DATA SATUAN BARANG', 'satuanbarang', 'fa fa-graduation-cap', 42, 'y'),
(45, 'DATA OBAT DAN ALAT KESEHATAN BARANG', 'obatdanalkes', 'fa fa-graduation-cap', 42, 'y'),
(46, 'DATA SUPPLIER', 'supplier', 'fa fa-graduation-cap', 42, 'y'),
(47, 'LAPORAN PENGADAAN BARANG', 'pengadaanbarang', 'fa fa-graduation-cap', 42, 'y'),
(48, 'MODUL TINDAKAN', 'modultindakan', 'fa fa-graduation-cap', 0, 'y'),
(49, 'DATA PEMERIKSAAN LABORATORIUM', 'laboratorium', 'fa fa-bar-chart', 48, 'y'),
(52, 'DATA DIAGNOSA PENYAKIT', 'pemeriksaan', 'fa fa-bed', 48, 'y'),
(53, 'DATA TINDAKAN', 'tindakan', 'fa fa-graduation-cap', 48, 'y'),
(54, 'DATA PEGAWAI', 'pegawaipuskesmas', 'fa fa-users', 0, 'y'),
(60, 'LAPORAN', 'laporan', 'fa fa-address-book', 0, 'y'),
(61, 'INPUT REKA RAWAT INAP', 'form', 'fa fa-graduation-cap', 0, 'y'),
(62, 'JADWAL PRAKTEK DOKTER', 'praktekdokter', 'fa fa-graduation-cap', 0, 'y'),
(63, 'REKAM MEDIS', 'RekamMedis', 'fa fa-bed', 0, 'y'),
(64, 'RAWAT INAP', 'RekamMedis', 'fa fa-bed', 63, 'y'),
(65, 'RAWAT JALAN', 'RekamMedis/index/walan', 'fa fa-bed', 63, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat_alkes_bhp`
--

CREATE TABLE `tbl_obat_alkes_bhp` (
  `id_obat_alkes_bhp` varchar(30) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `id_kategori_barang` int(11) DEFAULT NULL,
  `id_satuan_barang` int(11) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_obat_alkes_bhp`
--

INSERT INTO `tbl_obat_alkes_bhp` (`id_obat_alkes_bhp`, `nama_barang`, `id_kategori_barang`, `id_satuan_barang`, `harga`, `stok`) VALUES
('001', 'BETADIN', 1, 2, 2000, 94),
('002', 'Dexamethasone', 3, 4, 10000, 83),
('003', 'Asam mefenamat', 3, 4, 70000, NULL),
('004', 'Amoxicillin', 4, 4, 50000, -14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `no_rekamedis` varchar(30) NOT NULL,
  `nama_pasien` varchar(30) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `golongan_darah` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nama_ibu` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `status_menikah` varchar(30) DEFAULT NULL,
  `no_hp` int(20) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`no_rekamedis`, `nama_pasien`, `jenis_kelamin`, `golongan_darah`, `tempat_lahir`, `tanggal_lahir`, `nama_ibu`, `alamat`, `agama`, `status_menikah`, `no_hp`, `pekerjaan`) VALUES
('000001', 'Norisa', 'P', 'O', 'Ciamis', '2015-07-09', 'Sri', 'Kawali', 'ISLAM', 'BELUM MENIKAH', 2147483647, 'BELUM/TIDAK BEKERJA'),
('000004', 'Reza Putri', 'L', 'A', 'Bandung', '2021-03-04', 'Wati', 'Bandung', 'ISLAM', 'BELUM MENIKAH', 82772272, 'BELUM BEKERJA'),
('000005', 'IRWAN', 'L', 'A', 'RAJADESA', '1999-06-15', 'FATIMAH', 'RAJADESA', 'ISLAM', 'BELUM MENIKAH', 2147483647, 'BELUM BEKERJA'),
('000006', 'ANISA', 'P', 'AB', 'CITEUREUP', '1982-10-19', 'AAH', 'CITEUREUP', 'ISLAM', 'BELUM MENIKAH', 2147483647, 'BELUM BEKERJA'),
('000007', 'TIAN', 'L', 'A', 'CIAMIS', '2012-06-12', 'IBU AAH', 'CITEUREUP', 'BUDHA', 'BELUM MENIKAH', 2147483647, 'BELUM BEKERJA'),
('000008', 'JAJA', 'L', 'A', 'BANDUNG', '2021-03-31', 'IBU AAH', 'KAWALI', 'ISLAM', 'BELUM MENIKAH', 2147483647, 'BELUM BEKERJA'),
('000009', 'Erliana', 'P', 'A', 'Bandung', '2015-06-08', 'IBU AAH', 'kawali', 'ISLAM', 'BELUM MENIKAH', 876686, 'BELUM BEKERJA'),
('000010', 'Dorhot', 'P', 'O', 'Surabaya', '2021-06-02', 'Cici', 'Jonggol', 'KRISTEN', 'BELUM MENIKAH', 2147483647, 'BELUM BEKERJA'),
('000011', 'Amelati', 'P', 'O', 'Jakarta', '2020-03-09', 'Mimi', 'Bandung', 'KRISTEN', 'BELUM MENIKAH', 2147483647, 'BELUM BEKERJA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nik` int(11) NOT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `jenis_kemalin` enum('P','L') DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `id_jenjang_pendidikan` int(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_jabatan` int(50) DEFAULT NULL,
  `id_departemen` int(50) DEFAULT NULL,
  `id_bidang` int(50) DEFAULT NULL,
  `is_aktif` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nik`, `nama_pegawai`, `jenis_kemalin`, `npwp`, `id_jenjang_pendidikan`, `tempat_lahir`, `tanggal_lahir`, `id_jabatan`, `id_departemen`, `id_bidang`, `is_aktif`) VALUES
(127, 'NORISA', 'L', '2333', 7, 'Kawali', '2021-04-16', 6, 4, 3, 'TIDAK AKTIF'),
(128, 'PUTRI', 'P', '7777262', 9, 'Kawali', '2021-04-14', 5, 4, 3, 'AKTIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemeriksa`
--

CREATE TABLE `tbl_pemeriksa` (
  `id_periksa` varchar(30) NOT NULL,
  `no_rawat` varchar(30) DEFAULT NULL,
  `no_rekamedis` varchar(30) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `id_tindakan` varchar(30) DEFAULT NULL,
  `id_pemeriksaan_laboratorium` varchar(30) DEFAULT NULL,
  `id_diagnosa_penyakit` varchar(30) DEFAULT NULL,
  `keluhan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pemeriksa`
--

INSERT INTO `tbl_pemeriksa` (`id_periksa`, `no_rawat`, `no_rekamedis`, `tanggal_daftar`, `id_tindakan`, `id_pemeriksaan_laboratorium`, `id_diagnosa_penyakit`, `keluhan`) VALUES
('000001', '2021/04/28/0001', '000001', '2021-05-03', 'T1', 'L1', 'P1', 'sakit pisan'),
('000002', '2021/03/23/0001', '000001', '2021-05-08', 'T1', 'L1', 'P1', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemeriksaan_laboratorium`
--

CREATE TABLE `tbl_pemeriksaan_laboratorium` (
  `id_pemeriksaan_laboratorium` varchar(30) NOT NULL,
  `nama_periksa` varchar(30) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pemeriksaan_laboratorium`
--

INSERT INTO `tbl_pemeriksaan_laboratorium` (`id_pemeriksaan_laboratorium`, `nama_periksa`, `tarif`) VALUES
('L1', 'Jantung', 1000),
('L2', 'Paru-Paru', 2000),
('L3', 'Telinga', 500000),
('L4', 'Cek Darah', 150000),
('L5', 'USG', 500000),
('L6', 'Periksa Urine', 500000),
('L7', 'X-Ray Dental', 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemeriksaan_rawat_inap`
--

CREATE TABLE `tbl_pemeriksaan_rawat_inap` (
  `id_periksa` varchar(30) NOT NULL,
  `no_rawat` varchar(30) DEFAULT NULL,
  `no_rekamedis` varchar(30) DEFAULT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `id_tempat_tidur` varchar(30) DEFAULT NULL,
  `id_obat` varchar(30) DEFAULT NULL,
  `id_tindakan` varchar(30) DEFAULT NULL,
  `id_pemeriksaan_laboratorium` varchar(30) DEFAULT NULL,
  `id_diagnosa_penyakit` varchar(30) DEFAULT NULL,
  `Hasil_pemeriksaan_fisik` varchar(30) DEFAULT NULL,
  `riwayat_penyakit` text DEFAULT NULL,
  `keluhan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pemeriksaan_rawat_inap`
--

INSERT INTO `tbl_pemeriksaan_rawat_inap` (`id_periksa`, `no_rawat`, `no_rekamedis`, `nama_pasien`, `tanggal_daftar`, `id_tempat_tidur`, `id_obat`, `id_tindakan`, `id_pemeriksaan_laboratorium`, `id_diagnosa_penyakit`, `Hasil_pemeriksaan_fisik`, `riwayat_penyakit`, `keluhan`) VALUES
('000001', '2021/05/04/0001', '000005', 'IRWAN', '2021-05-05', 'KWLIM1', 'OBAT TIDUR', 'T1', 'L1', 'P1', 'baik', 'magg', 'demam'),
('000003', '2021/05/04/0005', '000005', 'IRWAN', '2021-05-05', 'KWLIM1', 'OBAT TIDUR', 'T1', 'L1', 'P1', 'Baik', 'magg', 'demam'),
('000004', '2021/05/04/0005', '000005', 'IRWAN', '2021-05-04', 'KWLIM1', 'OBAT TIDUR', 'T1', 'L1', 'P1', 'Baik', 'maag', 'Demam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `no_registrasi` varchar(30) DEFAULT NULL,
  `no_rawat` varchar(30) NOT NULL,
  `no_rekamedis` varchar(30) DEFAULT NULL,
  `cara_masuk` varchar(30) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `kode_dokter_penanggung_jawab` int(11) DEFAULT NULL,
  `id_poliklinik` int(11) DEFAULT NULL,
  `nama_penanggung_jawab` varchar(30) DEFAULT NULL,
  `hubungan_dengan_penanggung_jawab` varchar(30) DEFAULT NULL,
  `alamat_penanggung_jawab` text DEFAULT NULL,
  `id_jenis_bayar` int(11) DEFAULT NULL,
  `no_hp_penanggung_jawab` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`no_registrasi`, `no_rawat`, `no_rekamedis`, `cara_masuk`, `tanggal_daftar`, `kode_dokter_penanggung_jawab`, `id_poliklinik`, `nama_penanggung_jawab`, `hubungan_dengan_penanggung_jawab`, `alamat_penanggung_jawab`, `id_jenis_bayar`, `no_hp_penanggung_jawab`) VALUES
('0001', '2021/03/23/0001', '000001', 'RAWAT JALAN', '2021-03-23', 1, 1, 'Ibu Rara', 'ORANG TUA', 'Kawali', 1, 2147483647),
('0001', '2021/04/28/0001', '000008', 'RAWAT JALAN', '2021-04-28', 2, 1, 'Ibu Rara', 'ORANG TUA', 'ha', 1, 444),
('0001', '2021/05/04/0001', '000007', 'RAWAT JALAN', '2021-05-04', 1, 7, 'Ibu Rara', 'ORANG TUA', 'bj', 1, 997),
('0005', '2021/05/04/0005', '000005', 'RAWAT JALAN', '2021-05-04', 3, 1, 'Ibu Rara', 'ORANG TUA', 'jajaj', 1, 2147483647),
('0002', '2021/05/05/0002', '000004', 'RAWAT JALAN', '2021-05-05', 1, 7, 'Ibu Saroh', 'ORANG TUA', 'Riau', 1, 2147483647),
('0002', '2021/05/06/0002', '000006', 'RAWAT JALAN', '2021-05-06', 2, 1, 'Ibu Rara', 'ORANG TUA', 'kawali', 1, 2147483647),
('0003', '2021/05/06/0003', '000006', 'RAWAT INAP', '2021-05-06', 1, 1, 'Ibu Rara', 'ORANG TUA', 'jjhjh', 1, 2147483647),
('0004', '2021/05/06/0004', '000006', 'RAWAT INAP', '2021-05-06', 1, 1, 'Ibu Rara', 'ORANG TUA', 'KAKA', 1, 2147483647),
('0001', '2021/05/10/0001', '000006', 'RAWAT INAP', '2021-05-10', 2, 1, 'Ibu Rara', 'ORANG TUA', 'kakka', 1, 4444),
('0002', '2021/05/10/0002', '000006', 'RAWAT INAP', '2021-05-10', 3, 1, 'Ibu Rara', 'ORANG TUA', 'kakka', 1, 444),
('0001', '2021/05/11/0001', '000007', 'RAWAT INAP', '2021-05-11', 3, 1, 'Ibu Rara', 'ORANG TUA', 'kakkaa', 1, 2147483647),
('0002', '2021/05/11/0002', '000001', 'RAWAT INAP', '2021-05-11', 3, 1, 'Ibu Rara', 'ORANG TUA', 'kawali', 1, 4444),
('0001', '2021/05/17/0001', '000008', 'RAWAT INAP', '2021-05-17', 2, 1, 'Ibu Rara', 'ORANG TUA', 'KAKA', 1, 2147483647),
('0001', '2021/06/28/0001', '000009', 'RAWAT JALAN', '2021-06-28', 5, 8, 'Amel', 'SAUDARA', 'Bandung', 1, 2147483647),
('0002', '2021/06/28/0002', '000009', 'RAWAT JALAN', '2021-06-28', 5, 8, 'Ana', 'ORANG TUA', 'bandung', 1, 2147483647),
('0001', '2021/07/03/0001', '000010', 'RAWAT JALAN', '2021-07-03', 7, 7, 'Amel', 'SAUDARA KANDUNG', 'Jonggol', 2, 2147483647),
('0001', '2021/07/05/0001', '000011', 'RAWAT JALAN', '2021-07-05', 5, 8, 'Mian', 'ORANG TUA', 'Jonggol', 2, 2147483647),
('0002', '2021/07/05/0002', '000011', 'RAWAT JALAN', '2021-07-05', 3, 1, 'Mian', 'ORANG TUA', 'Jonggol', 1, 2147483647),
('0003', '2021/07/05/0003', '000004', 'RAWAT JALAN', '2021-07-05', 14, 8, 'Yuyi', 'SAUDARA KANDUNG', 'Bandung', 1, 2147483647),
('0004', '2021/07/05/0004', '000004', 'RAWAT JALAN', '2021-07-05', 17, 8, 'Yuyi', 'SAUDARA KANDUNG', 'Bandung', 1, 2147483647),
('0001', '2021/07/06/0001', '000004', 'RAWAT JALAN', '2021-07-06', 18, 8, 'Yuyi', 'SAUDARA KANDUNG', 'Bandung', 1, 2147483647),
('0001', '2021/07/07/0001', '000009', 'RAWAT JALAN', '2021-07-07', 16, 10, 'Ibu', 'ORANG TUA', 'bdg', 1, 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengadaan_detail`
--

CREATE TABLE `tbl_pengadaan_detail` (
  `id_pengadaan_detail` int(30) NOT NULL,
  `id_obat_alkes_bhp` varchar(30) DEFAULT NULL,
  `qyt` int(30) DEFAULT NULL,
  `id_pengadaan_obat_alkes_bhp` varchar(30) DEFAULT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengadaan_obat_alkes_bhp`
--

CREATE TABLE `tbl_pengadaan_obat_alkes_bhp` (
  `id_pengadaan_obat_alkes_bhp` varchar(30) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_supplier` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_detail`
--

CREATE TABLE `tbl_penjualan_detail` (
  `id_penjualan_detail` int(20) NOT NULL,
  `id_obat_alkes_bhp` varchar(30) DEFAULT NULL,
  `qyt` int(30) DEFAULT NULL,
  `id_penjualan_obat_alkes_bhp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_obat_alkes_bhp`
--

CREATE TABLE `tbl_penjualan_obat_alkes_bhp` (
  `id_penjualan_obat_alkes_bhp` varchar(30) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_pembeli` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pj_riwayat_tindakan`
--

CREATE TABLE `tbl_pj_riwayat_tindakan` (
  `id_pj_riwayat_tindakan` int(11) NOT NULL,
  `id_riwayat_tindakan` int(11) DEFAULT NULL,
  `kode_pj_riwayat_tindakan` varchar(20) DEFAULT NULL,
  `keterangan` enum('dokter','petugas','dokter_dan_petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pj_riwayat_tindakan`
--

INSERT INTO `tbl_pj_riwayat_tindakan` (`id_pj_riwayat_tindakan`, `id_riwayat_tindakan`, `kode_pj_riwayat_tindakan`, `keterangan`) VALUES
(53, 48, '1', 'dokter'),
(54, 48, '127', 'petugas'),
(55, 49, '127', 'petugas'),
(56, 50, '127', 'petugas'),
(57, 51, '1', 'dokter'),
(58, 52, '2', 'dokter'),
(59, 52, '128', 'petugas'),
(60, 53, '1', 'dokter'),
(61, 53, '127', 'petugas'),
(62, 54, '127', 'petugas'),
(63, 55, '1', 'dokter'),
(64, 56, '1', 'dokter'),
(65, 57, '1', 'dokter'),
(66, 58, '1', 'dokter'),
(67, 59, '5', 'dokter'),
(68, 60, '17', 'dokter'),
(69, 60, '127', 'petugas'),
(70, 61, '18', 'dokter'),
(71, 62, '19', 'dokter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poliklinik`
--

CREATE TABLE `tbl_poliklinik` (
  `id_poliklinik` int(11) NOT NULL,
  `nama_poliklinik` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_poliklinik`
--

INSERT INTO `tbl_poliklinik` (`id_poliklinik`, `nama_poliklinik`) VALUES
(1, 'POLI KULIT DAN KELAMIN'),
(6, 'POLI KIA'),
(7, 'POLI ANAK'),
(8, 'POLI GIGI DAN MULUT'),
(10, 'POLI TELINGA HIDUNG TENGGOROKAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rawat_inap`
--

CREATE TABLE `tbl_rawat_inap` (
  `no_rawat` varchar(30) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `id_ruang_rawat_inap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rawat_inap`
--

INSERT INTO `tbl_rawat_inap` (`no_rawat`, `tanggal_masuk`, `tanggal_keluar`, `id_ruang_rawat_inap`) VALUES
('2021/05/06/0003', '2021-05-06', '0000-00-00', 'ANGGREK 1'),
('2021/05/06/0004', '2021-05-06', '0000-00-00', 'MELATI 1'),
('2021/05/06/0007', '2021-05-06', '0000-00-00', 'ANGGREK 1'),
('2021/05/10/0001', '2021-05-10', '0000-00-00', 'ANGGREK 1'),
('2021/05/10/0002', '2021-05-10', '0000-00-00', 'ANGGREK 1'),
('2021/05/10/0005', '2021-05-10', '0000-00-00', 'ANGGREK 1'),
('2021/05/10/0006', '2021-05-10', '0000-00-00', 'KWLIONE'),
('2021/05/11/0001', '2021-05-11', '0000-00-00', 'ANGGREK 2'),
('2021/05/11/0002', '2021-05-11', '0000-00-00', 'ANGGREK 3'),
('2021/05/17/0001', '2021-05-17', '0000-00-00', 'MELATI 2'),
('2021/06/15/0001', '2021-06-15', '0000-00-00', 'MELATI 3'),
('2021/06/15/0002', '2021-06-15', '0000-00-00', 'MELATI 3'),
('2021/06/15/0003', '2021-06-15', '0000-00-00', 'MELATI 2'),
('2021/06/15/0004', '2021-06-15', '0000-00-00', 'MELATI 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_diagnosa_penyakit`
--

CREATE TABLE `tbl_riwayat_diagnosa_penyakit` (
  `id_riwayat_diagnosa_penyakit` int(11) NOT NULL,
  `id_diagnosa_penyakit` varchar(30) DEFAULT NULL,
  `no_rawat` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ciri_ciri_umum` varchar(100) DEFAULT NULL,
  `ciri_ciri_penyakit` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_riwayat_diagnosa_penyakit`
--

INSERT INTO `tbl_riwayat_diagnosa_penyakit` (`id_riwayat_diagnosa_penyakit`, `id_diagnosa_penyakit`, `no_rawat`, `tanggal`, `ciri_ciri_umum`, `ciri_ciri_penyakit`, `keterangan`) VALUES
(15, 'P1', '2021/05/11/0002', '2021-06-16', 'ergerbre', 'sdffer', 'efgergr'),
(16, 'P1', '2021/05/06/0002', '2021-07-01', 'Sakit dada', 'Dada sakit', 'Resiko serangan jantung'),
(17, 'P2', '2021/07/05/0001', '2021-07-05', 'Hidung tersumbat', 'Hidung tersumbat', 'Flu ringan'),
(18, 'P3', '2021/07/05/0003', '2021-07-05', 'Gatal dan merah', 'Bintik bintik merah', 'Cacar air'),
(19, 'P8', '2021/07/05/0004', '2021-07-05', 'Gusi bengkak', 'Gigi terasa ngilu', 'harus ditambal'),
(20, 'P8', '2021/07/06/0001', '2021-07-06', 'Gusi bengkak', 'Gigi terasa ngilu', 'harus ditambal'),
(21, 'P8', '2021/07/07/0001', '2021-07-07', 'Gusi bengkak', 'Gigi terasa ngilu', 'harus ditambal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_pemberian_obat`
--

CREATE TABLE `tbl_riwayat_pemberian_obat` (
  `id_riwayat_pemberian_obat` int(11) NOT NULL,
  `no_rawat` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `id_obat_alkes_bhp` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_riwayat_pemberian_obat`
--

INSERT INTO `tbl_riwayat_pemberian_obat` (`id_riwayat_pemberian_obat`, `no_rawat`, `tanggal`, `id_obat_alkes_bhp`, `jumlah`) VALUES
(1, '2021/05/17/0001', '2021-06-04', '001', 1),
(2, '2021/05/17/0001', '2021-06-04', '001', 4),
(3, '2021/05/17/0001', '2021-06-04', '001', 0),
(4, '2021/05/17/0001', '2021-06-04', '002', 4),
(5, '2021/05/10/0002', '2021-06-05', '001', 1),
(6, '2021/05/10/0002', '2021-06-05', '002', 1),
(7, '2021/05/06/0004', '2021-06-06', '002', 4),
(8, '2021/05/06/0004', '2021-06-06', '001', 4),
(9, '2021/05/17/0001', '2021-06-15', '001', 2),
(10, '2021/05/06/0002', '2021-06-16', '001', 4),
(11, '2021/07/05/0004', '2021-07-05', '004', 2),
(12, '2021/07/05/0004', '2021-07-05', '002', 5),
(13, '2021/07/06/0001', '2021-07-06', '004', 10),
(14, '2021/07/06/0001', '2021-07-06', '002', 10),
(15, '2021/05/10/0002', '2021-07-07', '004', 2),
(16, '2021/07/07/0001', '2021-07-07', '002', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_pemeriksaan_laboratorium`
--

CREATE TABLE `tbl_riwayat_pemeriksaan_laboratorium` (
  `id_riwayat_pemeriksaan_laboratorium` int(11) NOT NULL,
  `no_rawat` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pemeriksaan_laboratorium` varchar(30) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_riwayat_pemeriksaan_laboratorium`
--

INSERT INTO `tbl_riwayat_pemeriksaan_laboratorium` (`id_riwayat_pemeriksaan_laboratorium`, `no_rawat`, `tanggal`, `id_pemeriksaan_laboratorium`, `hasil`, `keterangan`) VALUES
(4, '2021/05/11/0002', '2021-06-05', 'L2', 'Bagus', 'Penyakit Umum'),
(5, '2021/05/17/0001', '2021-06-05', 'L3', 'Bagus', 'asa'),
(6, '2021/05/10/0002', '2021-06-05', 'L2', 'Bagus', 'asas'),
(7, '2021/05/10/0002', '2021-06-05', 'L2', 'Bagus', 'Penyakit Umum'),
(8, '2021/05/06/0004', '2021-06-06', 'L2', 'Bagus', 'Penyakit Umum'),
(9, '2021/05/06/0002', '2021-07-01', 'L1', 'Kurang bagus', 'ada masalah'),
(10, '2021/07/05/0004', '2021-07-05', 'L7', 'Kurang bagus', 'harus ditambal'),
(11, '2021/07/06/0001', '2021-07-06', 'L7', 'Kurang bagus', 'harus ditambal'),
(12, '2021/07/07/0001', '2021-07-07', 'L7', 'Kurang bagus', 'harus ditambal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_pemeriksaan_pasien`
--

CREATE TABLE `tbl_riwayat_pemeriksaan_pasien` (
  `id` int(11) NOT NULL,
  `no_rawat` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `berat_badan` int(11) DEFAULT 0,
  `tensi_darah` int(11) DEFAULT 0,
  `suhu_badan` int(11) DEFAULT 0,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_riwayat_pemeriksaan_pasien`
--

INSERT INTO `tbl_riwayat_pemeriksaan_pasien` (`id`, `no_rawat`, `berat_badan`, `tensi_darah`, `suhu_badan`, `tanggal`) VALUES
(3, '2021/05/10/0002', 70, 120, 100, '2021-07-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_tindakan`
--

CREATE TABLE `tbl_riwayat_tindakan` (
  `id_riwayat_tindakan` int(11) NOT NULL,
  `id_tindakan` varchar(30) DEFAULT NULL,
  `no_rawat` varchar(30) DEFAULT NULL,
  `hasil_periksa` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_riwayat_tindakan`
--

INSERT INTO `tbl_riwayat_tindakan` (`id_riwayat_tindakan`, `id_tindakan`, `no_rawat`, `hasil_periksa`, `perkembangan`, `tanggal`) VALUES
(48, 'T1', '2021/05/06/0003', 'asas', 'sdsdsd', '2021-06-07'),
(49, 'T1', '2021/05/06/0003', 'asas', 'asasa', '2021-06-07'),
(50, 'T2', '2021/05/06/0003', 'asas', 'asasa', '2021-06-07'),
(51, 'T2', '2021/05/06/0003', 'aa', 'asasa', '2021-06-07'),
(52, 'T1', '2021/05/06/0003', 'asas', 'asasa', '2021-06-07'),
(53, 'T1', '2021/05/06/0004', 'asas', 'sasa', '2021-06-07'),
(54, 'T2', '2021/05/17/0001', 'asas', 'asasa', '2021-06-15'),
(55, 'T1', '2021/05/06/0002', 'asas', 'asasas', '2021-06-16'),
(56, 'T3', '2021/05/06/0002', 'Lumayan baik', 'Lumayan sehat ', '2021-07-01'),
(57, 'T3', '2021/03/23/0001', 'bagus', 'bagus', '2021-07-01'),
(58, 'T2', '2021/03/23/0001', 'Ada luka', 'sudah diobati', '2021-07-04'),
(59, 'T1', '2021/07/05/0001', 'Lumayan baik', 'Lumayan sehat ', '2021-07-05'),
(60, 'T6', '2021/07/05/0004', 'Gigi bolong', 'Udah ditambal', '2021-07-05'),
(61, 'T6', '2021/07/06/0001', 'Gigi bolong', 'Udah ditambal', '2021-07-06'),
(62, 'T6', '2021/07/07/0001', 'Gigi bolong', 'Udah ditambal', '2021-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruang_rawat_inap`
--

CREATE TABLE `tbl_ruang_rawat_inap` (
  `id_ruang_rawat_inap` varchar(30) NOT NULL,
  `id_gedung` int(30) DEFAULT NULL,
  `nama_ruangan` varchar(30) DEFAULT NULL,
  `kelas` varchar(30) DEFAULT NULL,
  `tarif` int(30) DEFAULT NULL,
  `status` enum('diisi','kosong') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ruang_rawat_inap`
--

INSERT INTO `tbl_ruang_rawat_inap` (`id_ruang_rawat_inap`, `id_gedung`, `nama_ruangan`, `kelas`, `tarif`, `status`) VALUES
('ANGGREK 1', 3, 'RUANGAN ANGGREK', 'KELAS 1', 50000, 'diisi'),
('ANGGREK 2', 3, 'RUANGAN ANGGREK', 'KELAS 2', 50000, 'diisi'),
('ANGGREK 3', 3, 'RUANGAN ANGGREK', 'KELAS 1', 250000, 'diisi'),
('KWLIONE', 3, 'RUANGAN MAWAR', 'KELAS 1', 10000000, 'diisi'),
('MELATI 1', 3, 'RUANGAN MELATI', 'KELAS 1', 50000, 'diisi'),
('MELATI 2', 3, 'RUANGAN MELATI', 'KELAS 2', 50000, 'diisi'),
('MELATI 3', 3, 'RUANGAN MELATI', 'KELAS 3', 25000, 'diisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_satuan_barang`
--

CREATE TABLE `tbl_satuan_barang` (
  `id_satuan_barang` int(11) NOT NULL,
  `nama_satuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_satuan_barang`
--

INSERT INTO `tbl_satuan_barang` (`id_satuan_barang`, `nama_satuan`) VALUES
(2, 'SIRUP'),
(3, 'KAPSUL'),
(4, 'TABLET');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_spesialis`
--

CREATE TABLE `tbl_spesialis` (
  `id_spesialis` int(11) NOT NULL,
  `nama_spesialis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_spesialis`
--

INSERT INTO `tbl_spesialis` (`id_spesialis`, `nama_spesialis`) VALUES
(1, 'OBGYN'),
(2, 'GIGI'),
(3, 'ANAK'),
(4, 'KULIT'),
(5, 'TELINGA HIDUNG TENGGOROKAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` varchar(30) NOT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telpon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telpon`) VALUES
('0001', 'NORISA', 'KAWALI', '098765343129');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tempat_tidur`
--

CREATE TABLE `tbl_tempat_tidur` (
  `id_tempat_tidur` varchar(30) NOT NULL,
  `id_ruang_rawat_inap` varchar(30) DEFAULT NULL,
  `status` enum('KOSONG','DIISI') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tempat_tidur`
--

INSERT INTO `tbl_tempat_tidur` (`id_tempat_tidur`, `id_ruang_rawat_inap`, `status`) VALUES
('KWLIM1', 'KWLIONE', 'DIISI'),
('KWLIM2', 'KWLIONE', 'DIISI'),
('KWLIM3', 'KWLIONE', 'DIISI'),
('MKWL1', 'KWLITREE', 'DIISI'),
('MKWL2', 'KWLITREE', 'DIISI'),
('MKWL3', 'KWLITREE', 'DIISI'),
('RAKWLI1', 'KWLITWO', 'DIISI'),
('RAKWLI2', 'KWLITWO', 'KOSONG'),
('RAKWLI3', 'KWLITWO', 'DIISI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tindakan`
--

CREATE TABLE `tbl_tindakan` (
  `id_tindakan` varchar(30) NOT NULL,
  `jenis_tindakan` enum('RAWAT_JALAN','RAWAT_INAP') DEFAULT NULL,
  `nama_tindakan` varchar(30) DEFAULT NULL,
  `id_kategori_tindakan` varchar(3) DEFAULT NULL,
  `tarif` int(100) DEFAULT NULL,
  `tindakan_oleh` enum('dokter','petugas','dokter_dan_petugas') DEFAULT NULL,
  `id_poliklinik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tindakan`
--

INSERT INTO `tbl_tindakan` (`id_tindakan`, `jenis_tindakan`, `nama_tindakan`, `id_kategori_tindakan`, `tarif`, `tindakan_oleh`, `id_poliklinik`) VALUES
('T1', 'RAWAT_JALAN', 'Oksigen', 'P3', 1000, 'petugas', 7),
('T2', 'RAWAT_INAP', 'Lepas Perban', 'P4', 50000, 'dokter_dan_petugas', 6),
('T3', 'RAWAT_INAP', 'OKSIGEN', 'P3', 50000, 'dokter', 1),
('T4', 'RAWAT_JALAN', 'Cabut Gigi', 'P2', 200000, 'dokter', 8),
('T5', 'RAWAT_JALAN', 'Scalling Gigi', 'P2', 200000, 'dokter_dan_petugas', 8),
('T6', 'RAWAT_JALAN', 'Tambal Gigi', 'P2', 500000, 'dokter_dan_petugas', 8),
('T7', 'RAWAT_JALAN', 'Suntik', 'P1', 500000, 'dokter', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(3, 'Muhammad hafidz Muzaki', 'hafid@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '7.png', 2, 'y'),
(4, 'Norisa Erliana Verdian Putri', 'norisa.erlin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1.PNG', 1, 'y'),
(5, 'Puskesmas Kawali', 'puskesmas.kawali@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'download.png', 1, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indeks untuk tabel `tbl_diagnosa_penyakit`
--
ALTER TABLE `tbl_diagnosa_penyakit`
  ADD PRIMARY KEY (`id_diagnosa_penyakit`);

--
-- Indeks untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`kode_dokter`),
  ADD KEY `id_spesialis` (`id_spesialis`),
  ADD KEY `id_poliklinik` (`id_poliklinik`);

--
-- Indeks untuk tabel `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indeks untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tbl_jadwal_prakter_dokter`
--
ALTER TABLE `tbl_jadwal_prakter_dokter`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kode_dokter` (`kode_dokter`),
  ADD KEY `id_poliklinik` (`id_poliklinik`);

--
-- Indeks untuk tabel `tbl_jenis_bayar`
--
ALTER TABLE `tbl_jenis_bayar`
  ADD PRIMARY KEY (`id_jenis_bayar`);

--
-- Indeks untuk tabel `tbl_jenjang_pendidikan`
--
ALTER TABLE `tbl_jenjang_pendidikan`
  ADD PRIMARY KEY (`id_jenjang_pendidikan`);

--
-- Indeks untuk tabel `tbl_kategori_barang`
--
ALTER TABLE `tbl_kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indeks untuk tabel `tbl_kategori_tindakan`
--
ALTER TABLE `tbl_kategori_tindakan`
  ADD PRIMARY KEY (`id_kategori_tindakan`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_obat_alkes_bhp`
--
ALTER TABLE `tbl_obat_alkes_bhp`
  ADD PRIMARY KEY (`id_obat_alkes_bhp`),
  ADD KEY `id_kategori_barang` (`id_kategori_barang`),
  ADD KEY `id_satuan_barang` (`id_satuan_barang`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`no_rekamedis`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_bidang` (`id_bidang`),
  ADD KEY `id_departemen` (`id_departemen`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_jenjang_pendidikan` (`id_jenjang_pendidikan`);

--
-- Indeks untuk tabel `tbl_pemeriksa`
--
ALTER TABLE `tbl_pemeriksa`
  ADD PRIMARY KEY (`id_periksa`),
  ADD KEY `no_rawat` (`no_rawat`),
  ADD KEY `no_rekamedis` (`no_rekamedis`),
  ADD KEY `id_tindakan` (`id_tindakan`),
  ADD KEY `id_diagnosa_penyakit` (`id_diagnosa_penyakit`),
  ADD KEY `id_pemeriksaan_laboratorium` (`id_pemeriksaan_laboratorium`);

--
-- Indeks untuk tabel `tbl_pemeriksaan_laboratorium`
--
ALTER TABLE `tbl_pemeriksaan_laboratorium`
  ADD PRIMARY KEY (`id_pemeriksaan_laboratorium`);

--
-- Indeks untuk tabel `tbl_pemeriksaan_rawat_inap`
--
ALTER TABLE `tbl_pemeriksaan_rawat_inap`
  ADD PRIMARY KEY (`id_periksa`),
  ADD KEY `no_rawat` (`no_rawat`),
  ADD KEY `no_rekamedis` (`no_rekamedis`),
  ADD KEY `id_diagnosa_penyakit` (`id_diagnosa_penyakit`),
  ADD KEY `id_pemeriksaan_laboratorium` (`id_pemeriksaan_laboratorium`),
  ADD KEY `id_tindakan` (`id_tindakan`),
  ADD KEY `tbl_pemeriksaan_rawat_inap_ibfk_6` (`id_tempat_tidur`);

--
-- Indeks untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`no_rawat`),
  ADD KEY `no_rekamedis` (`no_rekamedis`),
  ADD KEY `id_poliklinik` (`id_poliklinik`),
  ADD KEY `id_jenis_bayar` (`id_jenis_bayar`);

--
-- Indeks untuk tabel `tbl_pengadaan_detail`
--
ALTER TABLE `tbl_pengadaan_detail`
  ADD PRIMARY KEY (`id_pengadaan_detail`),
  ADD KEY `id_obat_alkes_bhp` (`id_obat_alkes_bhp`),
  ADD KEY `id_pengadaan_obat_alkes_bhp` (`id_pengadaan_obat_alkes_bhp`);

--
-- Indeks untuk tabel `tbl_pengadaan_obat_alkes_bhp`
--
ALTER TABLE `tbl_pengadaan_obat_alkes_bhp`
  ADD PRIMARY KEY (`id_pengadaan_obat_alkes_bhp`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`),
  ADD KEY `id_obat_alkes_bhp` (`id_obat_alkes_bhp`),
  ADD KEY `id_penjualan_obat_alkes_bhp` (`id_penjualan_obat_alkes_bhp`);

--
-- Indeks untuk tabel `tbl_penjualan_obat_alkes_bhp`
--
ALTER TABLE `tbl_penjualan_obat_alkes_bhp`
  ADD PRIMARY KEY (`id_penjualan_obat_alkes_bhp`);

--
-- Indeks untuk tabel `tbl_pj_riwayat_tindakan`
--
ALTER TABLE `tbl_pj_riwayat_tindakan`
  ADD PRIMARY KEY (`id_pj_riwayat_tindakan`),
  ADD KEY `id_riwayat_tindakan` (`id_riwayat_tindakan`);

--
-- Indeks untuk tabel `tbl_poliklinik`
--
ALTER TABLE `tbl_poliklinik`
  ADD PRIMARY KEY (`id_poliklinik`);

--
-- Indeks untuk tabel `tbl_rawat_inap`
--
ALTER TABLE `tbl_rawat_inap`
  ADD PRIMARY KEY (`no_rawat`),
  ADD KEY `id_ruang_rawat_inap` (`id_ruang_rawat_inap`);

--
-- Indeks untuk tabel `tbl_riwayat_diagnosa_penyakit`
--
ALTER TABLE `tbl_riwayat_diagnosa_penyakit`
  ADD PRIMARY KEY (`id_riwayat_diagnosa_penyakit`);

--
-- Indeks untuk tabel `tbl_riwayat_pemberian_obat`
--
ALTER TABLE `tbl_riwayat_pemberian_obat`
  ADD PRIMARY KEY (`id_riwayat_pemberian_obat`),
  ADD KEY `no_rawat` (`no_rawat`),
  ADD KEY `id_obat_alkes_bhp` (`id_obat_alkes_bhp`);

--
-- Indeks untuk tabel `tbl_riwayat_pemeriksaan_laboratorium`
--
ALTER TABLE `tbl_riwayat_pemeriksaan_laboratorium`
  ADD PRIMARY KEY (`id_riwayat_pemeriksaan_laboratorium`),
  ADD KEY `id_pemeriksaan_laboratorium` (`id_pemeriksaan_laboratorium`),
  ADD KEY `no_rawat` (`no_rawat`);

--
-- Indeks untuk tabel `tbl_riwayat_pemeriksaan_pasien`
--
ALTER TABLE `tbl_riwayat_pemeriksaan_pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tbl_riwayat_pemeriksaan_pasien_tbl_pendaftaran` (`no_rawat`);

--
-- Indeks untuk tabel `tbl_riwayat_tindakan`
--
ALTER TABLE `tbl_riwayat_tindakan`
  ADD PRIMARY KEY (`id_riwayat_tindakan`),
  ADD KEY `id_tindakan` (`id_tindakan`),
  ADD KEY `no_rawat` (`no_rawat`);

--
-- Indeks untuk tabel `tbl_ruang_rawat_inap`
--
ALTER TABLE `tbl_ruang_rawat_inap`
  ADD PRIMARY KEY (`id_ruang_rawat_inap`),
  ADD KEY `id_gedung` (`id_gedung`);

--
-- Indeks untuk tabel `tbl_satuan_barang`
--
ALTER TABLE `tbl_satuan_barang`
  ADD PRIMARY KEY (`id_satuan_barang`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_spesialis`
--
ALTER TABLE `tbl_spesialis`
  ADD PRIMARY KEY (`id_spesialis`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tbl_tempat_tidur`
--
ALTER TABLE `tbl_tempat_tidur`
  ADD PRIMARY KEY (`id_tempat_tidur`),
  ADD KEY `id_ruang_rawat_inap` (`id_ruang_rawat_inap`);

--
-- Indeks untuk tabel `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  ADD PRIMARY KEY (`id_tindakan`),
  ADD KEY `id_poliklinik` (`id_poliklinik`),
  ADD KEY `id_kategori_tindakan` (`id_kategori_tindakan`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `id_bidang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  MODIFY `id_departemen` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `kode_dokter` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  MODIFY `id_gedung` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal_prakter_dokter`
--
ALTER TABLE `tbl_jadwal_prakter_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_bayar`
--
ALTER TABLE `tbl_jenis_bayar`
  MODIFY `id_jenis_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenjang_pendidikan`
--
ALTER TABLE `tbl_jenjang_pendidikan`
  MODIFY `id_jenjang_pendidikan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_barang`
--
ALTER TABLE `tbl_kategori_barang`
  MODIFY `id_kategori_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengadaan_detail`
--
ALTER TABLE `tbl_pengadaan_detail`
  MODIFY `id_pengadaan_detail` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
  MODIFY `id_penjualan_detail` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pj_riwayat_tindakan`
--
ALTER TABLE `tbl_pj_riwayat_tindakan`
  MODIFY `id_pj_riwayat_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `tbl_poliklinik`
--
ALTER TABLE `tbl_poliklinik`
  MODIFY `id_poliklinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_diagnosa_penyakit`
--
ALTER TABLE `tbl_riwayat_diagnosa_penyakit`
  MODIFY `id_riwayat_diagnosa_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_pemberian_obat`
--
ALTER TABLE `tbl_riwayat_pemberian_obat`
  MODIFY `id_riwayat_pemberian_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_pemeriksaan_laboratorium`
--
ALTER TABLE `tbl_riwayat_pemeriksaan_laboratorium`
  MODIFY `id_riwayat_pemeriksaan_laboratorium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_pemeriksaan_pasien`
--
ALTER TABLE `tbl_riwayat_pemeriksaan_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_tindakan`
--
ALTER TABLE `tbl_riwayat_tindakan`
  MODIFY `id_riwayat_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `tbl_satuan_barang`
--
ALTER TABLE `tbl_satuan_barang`
  MODIFY `id_satuan_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_spesialis`
--
ALTER TABLE `tbl_spesialis`
  MODIFY `id_spesialis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD CONSTRAINT `tbl_dokter_ibfk_1` FOREIGN KEY (`id_spesialis`) REFERENCES `tbl_spesialis` (`id_spesialis`),
  ADD CONSTRAINT `tbl_dokter_ibfk_2` FOREIGN KEY (`id_poliklinik`) REFERENCES `tbl_poliklinik` (`id_poliklinik`);

--
-- Ketidakleluasaan untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD CONSTRAINT `tbl_hak_akses_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id_menu`),
  ADD CONSTRAINT `tbl_hak_akses_ibfk_2` FOREIGN KEY (`id_user_level`) REFERENCES `tbl_user_level` (`id_user_level`);

--
-- Ketidakleluasaan untuk tabel `tbl_jadwal_prakter_dokter`
--
ALTER TABLE `tbl_jadwal_prakter_dokter`
  ADD CONSTRAINT `tbl_jadwal_prakter_dokter_ibfk_1` FOREIGN KEY (`kode_dokter`) REFERENCES `tbl_dokter` (`kode_dokter`),
  ADD CONSTRAINT `tbl_jadwal_prakter_dokter_ibfk_2` FOREIGN KEY (`id_poliklinik`) REFERENCES `tbl_poliklinik` (`id_poliklinik`);

--
-- Ketidakleluasaan untuk tabel `tbl_obat_alkes_bhp`
--
ALTER TABLE `tbl_obat_alkes_bhp`
  ADD CONSTRAINT `tbl_obat_alkes_bhp_ibfk_1` FOREIGN KEY (`id_kategori_barang`) REFERENCES `tbl_kategori_barang` (`id_kategori_barang`),
  ADD CONSTRAINT `tbl_obat_alkes_bhp_ibfk_2` FOREIGN KEY (`id_satuan_barang`) REFERENCES `tbl_satuan_barang` (`id_satuan_barang`);

--
-- Ketidakleluasaan untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `tbl_bidang` (`id_bidang`),
  ADD CONSTRAINT `tbl_pegawai_ibfk_2` FOREIGN KEY (`id_departemen`) REFERENCES `tbl_departemen` (`id_departemen`),
  ADD CONSTRAINT `tbl_pegawai_ibfk_3` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_jabatan` (`id_jabatan`),
  ADD CONSTRAINT `tbl_pegawai_ibfk_5` FOREIGN KEY (`id_jenjang_pendidikan`) REFERENCES `tbl_jenjang_pendidikan` (`id_jenjang_pendidikan`);

--
-- Ketidakleluasaan untuk tabel `tbl_pemeriksa`
--
ALTER TABLE `tbl_pemeriksa`
  ADD CONSTRAINT `tbl_pemeriksa_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `tbl_pendaftaran` (`no_rawat`),
  ADD CONSTRAINT `tbl_pemeriksa_ibfk_2` FOREIGN KEY (`no_rekamedis`) REFERENCES `tbl_pasien` (`no_rekamedis`),
  ADD CONSTRAINT `tbl_pemeriksa_ibfk_3` FOREIGN KEY (`id_tindakan`) REFERENCES `tbl_tindakan` (`id_tindakan`),
  ADD CONSTRAINT `tbl_pemeriksa_ibfk_4` FOREIGN KEY (`id_diagnosa_penyakit`) REFERENCES `tbl_diagnosa_penyakit` (`id_diagnosa_penyakit`),
  ADD CONSTRAINT `tbl_pemeriksa_ibfk_5` FOREIGN KEY (`id_pemeriksaan_laboratorium`) REFERENCES `tbl_pemeriksaan_laboratorium` (`id_pemeriksaan_laboratorium`);

--
-- Ketidakleluasaan untuk tabel `tbl_pemeriksaan_rawat_inap`
--
ALTER TABLE `tbl_pemeriksaan_rawat_inap`
  ADD CONSTRAINT `tbl_pemeriksaan_rawat_inap_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `tbl_pendaftaran` (`no_rawat`),
  ADD CONSTRAINT `tbl_pemeriksaan_rawat_inap_ibfk_2` FOREIGN KEY (`no_rekamedis`) REFERENCES `tbl_pasien` (`no_rekamedis`),
  ADD CONSTRAINT `tbl_pemeriksaan_rawat_inap_ibfk_3` FOREIGN KEY (`id_diagnosa_penyakit`) REFERENCES `tbl_diagnosa_penyakit` (`id_diagnosa_penyakit`),
  ADD CONSTRAINT `tbl_pemeriksaan_rawat_inap_ibfk_4` FOREIGN KEY (`id_pemeriksaan_laboratorium`) REFERENCES `tbl_pemeriksaan_laboratorium` (`id_pemeriksaan_laboratorium`),
  ADD CONSTRAINT `tbl_pemeriksaan_rawat_inap_ibfk_5` FOREIGN KEY (`id_tindakan`) REFERENCES `tbl_tindakan` (`id_tindakan`),
  ADD CONSTRAINT `tbl_pemeriksaan_rawat_inap_ibfk_6` FOREIGN KEY (`id_tempat_tidur`) REFERENCES `tbl_tempat_tidur` (`id_tempat_tidur`);

--
-- Ketidakleluasaan untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_1` FOREIGN KEY (`no_rekamedis`) REFERENCES `tbl_pasien` (`no_rekamedis`),
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_2` FOREIGN KEY (`id_poliklinik`) REFERENCES `tbl_poliklinik` (`id_poliklinik`),
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_3` FOREIGN KEY (`id_jenis_bayar`) REFERENCES `tbl_jenis_bayar` (`id_jenis_bayar`);

--
-- Ketidakleluasaan untuk tabel `tbl_pengadaan_detail`
--
ALTER TABLE `tbl_pengadaan_detail`
  ADD CONSTRAINT `tbl_pengadaan_detail_ibfk_1` FOREIGN KEY (`id_obat_alkes_bhp`) REFERENCES `tbl_obat_alkes_bhp` (`id_obat_alkes_bhp`),
  ADD CONSTRAINT `tbl_pengadaan_detail_ibfk_2` FOREIGN KEY (`id_pengadaan_obat_alkes_bhp`) REFERENCES `tbl_pengadaan_obat_alkes_bhp` (`id_pengadaan_obat_alkes_bhp`);

--
-- Ketidakleluasaan untuk tabel `tbl_pengadaan_obat_alkes_bhp`
--
ALTER TABLE `tbl_pengadaan_obat_alkes_bhp`
  ADD CONSTRAINT `tbl_pengadaan_obat_alkes_bhp_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
  ADD CONSTRAINT `tbl_penjualan_detail_ibfk_1` FOREIGN KEY (`id_obat_alkes_bhp`) REFERENCES `tbl_obat_alkes_bhp` (`id_obat_alkes_bhp`),
  ADD CONSTRAINT `tbl_penjualan_detail_ibfk_2` FOREIGN KEY (`id_penjualan_obat_alkes_bhp`) REFERENCES `tbl_penjualan_obat_alkes_bhp` (`id_penjualan_obat_alkes_bhp`);

--
-- Ketidakleluasaan untuk tabel `tbl_rawat_inap`
--
ALTER TABLE `tbl_rawat_inap`
  ADD CONSTRAINT `tbl_rawat_inap_ibfk_1` FOREIGN KEY (`id_ruang_rawat_inap`) REFERENCES `tbl_ruang_rawat_inap` (`id_ruang_rawat_inap`);

--
-- Ketidakleluasaan untuk tabel `tbl_riwayat_pemberian_obat`
--
ALTER TABLE `tbl_riwayat_pemberian_obat`
  ADD CONSTRAINT `tbl_riwayat_pemberian_obat_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `tbl_pendaftaran` (`no_rawat`),
  ADD CONSTRAINT `tbl_riwayat_pemberian_obat_ibfk_2` FOREIGN KEY (`id_obat_alkes_bhp`) REFERENCES `tbl_obat_alkes_bhp` (`id_obat_alkes_bhp`);

--
-- Ketidakleluasaan untuk tabel `tbl_riwayat_pemeriksaan_laboratorium`
--
ALTER TABLE `tbl_riwayat_pemeriksaan_laboratorium`
  ADD CONSTRAINT `tbl_riwayat_pemeriksaan_laboratorium_ibfk_1` FOREIGN KEY (`id_pemeriksaan_laboratorium`) REFERENCES `tbl_pemeriksaan_laboratorium` (`id_pemeriksaan_laboratorium`),
  ADD CONSTRAINT `tbl_riwayat_pemeriksaan_laboratorium_ibfk_2` FOREIGN KEY (`no_rawat`) REFERENCES `tbl_pendaftaran` (`no_rawat`);

--
-- Ketidakleluasaan untuk tabel `tbl_riwayat_pemeriksaan_pasien`
--
ALTER TABLE `tbl_riwayat_pemeriksaan_pasien`
  ADD CONSTRAINT `FK_tbl_riwayat_pemeriksaan_pasien_tbl_pendaftaran` FOREIGN KEY (`no_rawat`) REFERENCES `tbl_pendaftaran` (`no_rawat`);

--
-- Ketidakleluasaan untuk tabel `tbl_riwayat_tindakan`
--
ALTER TABLE `tbl_riwayat_tindakan`
  ADD CONSTRAINT `tbl_riwayat_tindakan_ibfk_1` FOREIGN KEY (`id_tindakan`) REFERENCES `tbl_tindakan` (`id_tindakan`),
  ADD CONSTRAINT `tbl_riwayat_tindakan_ibfk_2` FOREIGN KEY (`no_rawat`) REFERENCES `tbl_pendaftaran` (`no_rawat`);

--
-- Ketidakleluasaan untuk tabel `tbl_ruang_rawat_inap`
--
ALTER TABLE `tbl_ruang_rawat_inap`
  ADD CONSTRAINT `tbl_ruang_rawat_inap_ibfk_1` FOREIGN KEY (`id_gedung`) REFERENCES `tbl_gedung` (`id_gedung`);

--
-- Ketidakleluasaan untuk tabel `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  ADD CONSTRAINT `tbl_tindakan_ibfk_1` FOREIGN KEY (`id_poliklinik`) REFERENCES `tbl_poliklinik` (`id_poliklinik`),
  ADD CONSTRAINT `tbl_tindakan_ibfk_2` FOREIGN KEY (`id_kategori_tindakan`) REFERENCES `tbl_kategori_tindakan` (`id_kategori_tindakan`);

--
-- Ketidakleluasaan untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `tbl_user_level` (`id_user_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
