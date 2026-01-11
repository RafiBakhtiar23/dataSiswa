-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2026 at 04:26 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud_jquery`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` varchar(8) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `whatsapp` varchar(13) NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `tanggal_daftar`, `kelas`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `email`, `whatsapp`, `foto_profil`) VALUES
('ID-00005', '2023-10-11', 'Web Development', 'Kyojuro Rengoku', 'Laki-laki', 'Desa Rengoku, Prefektur Kyojuro, Jepang', 'kyojuro@gmail.com', '0831728715262', 'a5b0f2ccd7c63902eec90ee4bfd84de77f4de62d.jpg'),
('ID-00006', '2023-10-13', 'Web Development', 'Uzui Tengen', 'Laki-laki', 'Desa Uzui, Prefektur Tengen, Jepang', 'uzuitengen@gmail.com', '0822718735271', '30b84e02389b807635f6cdb994fa7c0e90be1bef.jpg'),
('ID-00007', '2023-10-15', 'Digital Marketing', 'Inosuke Hashibira', 'Laki-laki', 'Hutan pegunungan', 'inosuke@gmail.com', '0831271238721', 'bee02ae369e6a30916aede54d313a9bf72d74470.jpg'),
('ID-00008', '2023-10-15', 'Web Development', 'Zenitsu Agatsuma', 'Laki-laki', 'Desa Agatsuma, Prefektur Gunma, Jepang', 'zenitsu@gmail.com', '0822891723106', '1a4879e77d6ddd383c7a7a95254f245a37e66b05.jpg'),
('ID-00009', '2023-10-17', 'Data Analysis', 'Kamado Tanjiro', 'Laki-laki', 'Desa Kamado, Gunung Dewa, Jepang', 'kamadotanjiro@gmail.com', '082282173510', 'afb3cb6d7250446b389f25dd2fe44ebe898c8d6c.jpg'),
('ID-00010', '2023-10-17', 'Data Analysis', 'Rui', 'Laki-laki', 'Gunung Natagumo, Prefektur Gunung Jepang', 'ruii@gmail.com', '0832182166217', 'c158744b2b8b95c92a33934018f35e0267354d04.jpg'),
('ID-00011', '2023-10-21', 'Web Design', 'Nakime', 'Perempuan', 'Ruang Musik Dimensi, Markas Iblis, Jepang', 'nakimeorochi@gmail.com', '083218262934', 'a5ee7f923bfbef4c6f4b096a3dc47a8436c258ec.jpg'),
('ID-00012', '2023-10-23', 'Mobile Development', 'Gyutaro', 'Laki-laki', 'Kanal bawah tanah, Distrik Yoshiwara, Jepang', 'gyutaro@gmail.com', '082273318192', 'b64078dcab1b7b18fb7328b13c11f4709b700d68.jpg'),
('ID-00013', '2023-10-23', 'Web Design', 'Kaigaku', 'Laki-laki', 'Markas Api, Gunung Sagiri, Jepang', 'kaigaku123@gmail.com', '083123272192', '399f8492151658d629d480f1a7f0566e8f07fa38.jpg'),
('ID-00014', '2023-10-23', 'Game Development', 'Hantengu', 'Laki-laki', 'Gunung Kegelapan, Distrik Misteri, Jepang', 'hantengu@gmail.com', '08228317625', 'e70ca8fb917f34e8f5c307e4a78380159d36a7e9.jpg'),
('ID-00015', '2024-11-08', 'Digital Marketing', 'Doma', 'Laki-laki', 'Kuil Salju Abadi, Pegunungan Misterius, Jepang', 'doma@gmail.com', '085752672167', '67cf6c15453e6dd214b752bd5b31d5acc5916d9c.jpg'),
('ID-00016', '2023-08-10', 'Web Design', 'Akaza', 'Laki-laki', 'Jepang, Kota Kecil Hakuji', 'akazaa@gmail.com', '082160263712', '1a7f0d8503f5c449591b387ca375bb6fae51a6c8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
