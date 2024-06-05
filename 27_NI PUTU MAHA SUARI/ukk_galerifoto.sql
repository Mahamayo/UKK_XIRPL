-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 05:43 AM
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
-- Database: `ukk_galerifoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumID` int(11) NOT NULL,
  `namaAlbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumID`, `namaAlbum`, `deskripsi`, `tanggaldibuat`, `userID`) VALUES
(8, 'KARYASASTRA', '                            Foto Seputar karyamahasiswa                    ', '2024-05-03', 11),
(10, 'teknologi', 'seputar teknologi indonesia', '2024-05-03', 11),
(11, 'FLOWER', 'SEPUTAR JENIS BUNGA', '2024-05-04', 11),
(12, 'TEMPATWISATA', 'WISATABALI', '2024-05-08', 13);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `fotoID` int(11) NOT NULL,
  `judulfoto` varchar(255) DEFAULT NULL,
  `deskripsifoto` text DEFAULT NULL,
  `tanggalunggah` date DEFAULT NULL,
  `lokasiFile` varchar(255) DEFAULT NULL,
  `albumID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`fotoID`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasiFile`, `albumID`, `userID`) VALUES
(20, 'MAWAR', 'mawar indonesia', '2024-05-04', '1322716299-a8cc056aa191d749da57c85e81dda725cf17995d.jpg', 11, 11),
(23, 'PEONY', 'PEONY PINK', '2024-05-06', '829610502-WhatsApp Image 2021-04-29 at 16.16.20 (3)_HJX3FUz.jpeg', 11, 11),
(24, 'komputer', 'komputer 2024', '2024-05-06', '133272682-images.jpg', 10, 11),
(25, 'KITAB', 'KITAB WEDA', '2024-05-06', '883297652-menemukan-sintesis-dari-karya-sastra-24082023-222433.jpg', 8, 11),
(26, 'Teratai', 'Teratai Bali', '2024-05-06', '318412870-6016a2f9bed5d.jpg', 11, 11),
(27, 'SAKURA', 'SAKURA JEPANG', '2024-05-07', '871186745-sakura.jpg', 11, 11),
(28, 'LONTAR', 'AKSARA BALI', '2024-05-08', '1605030167-DSC_3955.webp', 8, 11),
(29, 'BEACHBALI', 'PANTAIBALI', '2024-05-08', '2060882700-5fb214bc2d6ee.jpg', 12, 13),
(30, 'monitor', 'monitor2012', '2024-05-08', '1516052769-images.jpg', 10, 11);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentarID` int(11) NOT NULL,
  `fotoID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentarID`, `fotoID`, `userID`, `isikomentar`, `tanggalkomentar`) VALUES
(1, 20, 11, 'saya sangat suka mawar merah', '2024-05-08'),
(2, 20, 11, 'indahhh sekali', '2024-05-08'),
(3, 23, 11, 'saya sangat suka!!!', '2024-05-08'),
(4, 30, 13, 'bagus sekali!!!!', '2024-05-11'),
(5, 29, 13, 'bagus bagus', '2024-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `likeID` int(11) NOT NULL,
  `fotoID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tanggalike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likefoto`
--

INSERT INTO `likefoto` (`likeID`, `fotoID`, `userID`, `tanggalike`) VALUES
(117, 23, 11, '2024-05-08'),
(118, 20, 11, '2024-05-08'),
(119, 29, 13, '2024-05-11'),
(120, 26, 13, '2024-05-11'),
(121, 20, 13, '2024-05-11'),
(122, 23, 13, '2024-05-11'),
(123, 24, 13, '2024-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(10, 'admin', 'admin', 'admin@gmail.com', 'admin', 'indonesia'),
(11, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'indonesia'),
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'aa@gmail.com', 'admin', 'semarang'),
(13, 'akun2', '9ce0ca3d09106a37842cfcbfbdf2f60d', 'akun2@gmail.com', 'akun2', 'indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoID`),
  ADD KEY `albumID` (`albumID`),
  ADD KEY `albumID_2` (`albumID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentarID`),
  ADD KEY `fotoID` (`fotoID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `fotoID` (`fotoID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`albumID`) REFERENCES `album` (`albumID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`fotoID`) REFERENCES `foto` (`fotoID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoID`) REFERENCES `foto` (`fotoID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
