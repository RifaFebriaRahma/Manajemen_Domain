-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2025 at 04:16 AM
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
-- Database: `domain`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_domain`
--

CREATE TABLE `data_domain` (
  `domId` int(11) NOT NULL,
  `domNama` varchar(100) DEFAULT NULL,
  `domJudul` varchar(255) NOT NULL,
  `domDeskripsi` tinytext DEFAULT NULL,
  `domTkdomId` int(11) NOT NULL,
  `domIpId` int(11) NOT NULL,
  `domIpAddress` varchar(100) NOT NULL,
  `domStatus` enum('active','suspend','remove','migrate') DEFAULT NULL,
  `domActiveDate` date DEFAULT NULL,
  `domExpireDate` date DEFAULT NULL,
  `domSuspendDate` date DEFAULT NULL,
  `domMigrateTo` int(11) DEFAULT NULL,
  `domCreateDate` datetime NOT NULL,
  `domCreateBy` varchar(100) NOT NULL,
  `domUpdateDate` datetime DEFAULT NULL,
  `domUpdateBy` varchar(100) DEFAULT NULL,
  `domDeleteDate` datetime DEFAULT NULL,
  `domDeleteBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_domain`
--

INSERT INTO `data_domain` (`domId`, `domNama`, `domJudul`, `domDeskripsi`, `domTkdomId`, `domIpId`, `domIpAddress`, `domStatus`, `domActiveDate`, `domExpireDate`, `domSuspendDate`, `domMigrateTo`, `domCreateDate`, `domCreateBy`, `domUpdateDate`, `domUpdateBy`, `domDeleteDate`, `domDeleteBy`) VALUES
(9, 'paska.unand.ac.id', 'Website Pascasarjana Unand', '-', 1, 0, '103.75.25.10', 'suspend', NULL, NULL, NULL, NULL, '2025-12-22 15:10:51', 'admin', '2025-12-22 15:17:30', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ip_address`
--

CREATE TABLE `ip_address` (
  `ipAddress` varchar(100) NOT NULL,
  `ipNama` varchar(100) NOT NULL,
  `ipServer` varchar(100) NOT NULL,
  `ipCreateDate` datetime NOT NULL,
  `ipCreateBy` varchar(100) NOT NULL,
  `ipUpdateDate` datetime DEFAULT NULL,
  `ipUpdateBy` varchar(100) DEFAULT NULL,
  `ipDeleteDate` datetime DEFAULT NULL,
  `ipDeleteBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ip_address`
--

INSERT INTO `ip_address` (`ipAddress`, `ipNama`, `ipServer`, `ipCreateDate`, `ipCreateBy`, `ipUpdateDate`, `ipUpdateBy`, `ipDeleteDate`, `ipDeleteBy`) VALUES
('103.75.25.10', 'Portal Akademik Universitas Andalas', 'Web Server ', '2025-12-15 00:00:00', 'Admin', NULL, '', NULL, ''),
('103.75.25.11', 'Single Sign On (SSO) Universitas Andalas', 'Authentication Server', '2025-12-15 00:00:00', 'Admin', NULL, '', NULL, ''),
('103.75.25.12', 'Website Resmi Universitas Andalas', 'Web Server', '2025-12-16 00:00:00', 'Admin', NULL, '', NULL, ''),
('103.75.25.13', 'Email Institusi Universitas Andalas', 'Mail Server', '2025-02-16 00:00:00', 'Admin', NULL, '', NULL, ''),
('103.75.25.14', 'API Sistem Akademik Universitas Andalas', 'Application Server', '2025-12-17 00:00:00', 'Admin', NULL, '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `orgId` int(11) NOT NULL,
  `orgParentId` int(11) DEFAULT NULL,
  `orgNama` varchar(100) NOT NULL,
  `orgType` enum('REKTORAT','DIREKTORAT','LEMBAGA','FAKULTAS','DEPARTEMEN','UKM','NON_ORG') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`orgId`, `orgParentId`, `orgNama`, `orgType`) VALUES
(3, 3, 'pendidikan', 'DIREKTORAT'),
(4, NULL, 'universitas', 'REKTORAT'),
(5, NULL, 'bidang 1', 'REKTORAT');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola_domain`
--

CREATE TABLE `pengelola_domain` (
  `pdId` int(11) NOT NULL,
  `pdIdentitasType` enum('NIM','NIP','NIK') NOT NULL,
  `pdIdentitasNo` varchar(50) NOT NULL,
  `pdNama` varchar(150) NOT NULL,
  `pdEmail` varchar(100) NOT NULL,
  `pdPhone` varchar(50) NOT NULL,
  `pdOrgId` int(11) NOT NULL,
  `pdSkNomor` varchar(50) NOT NULL,
  `pdSkTgl` date NOT NULL,
  `pdSkFile` varchar(100) NOT NULL,
  `pdCreateDate` datetime NOT NULL,
  `pdCreateBy` varchar(100) NOT NULL,
  `pdUpdateDate` datetime DEFAULT NULL,
  `pdUpdateBy` varchar(100) DEFAULT NULL,
  `pdDeleteDate` datetime DEFAULT NULL,
  `pdDeleteBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengelola_domain`
--

INSERT INTO `pengelola_domain` (`pdId`, `pdIdentitasType`, `pdIdentitasNo`, `pdNama`, `pdEmail`, `pdPhone`, `pdOrgId`, `pdSkNomor`, `pdSkTgl`, `pdSkFile`, `pdCreateDate`, `pdCreateBy`, `pdUpdateDate`, `pdUpdateBy`, `pdDeleteDate`, `pdDeleteBy`) VALUES
(1, 'NIP', '198512312009021001', 'Dr. Aisyah', 'aisyah@unand.ac.id', '081234567890', 1, '45/UN16.SK/2025', '2025-12-19', '1764565629_SK_Penetapan_Mahasiswa_Penerima_Bantuan_UKT_Semester_Ganjil_TA_2025.pdf', '2025-12-01 06:07:09', 'admin', NULL, NULL, NULL, NULL),
(2, 'NIM', '2211083012', 'Siti Rahmawati', 'siti.rahmawati@student.unand.ac.id', '082345678901', 3, '87/FT-UNAND/2025', '2025-03-15', '', '2025-12-22 15:58:31', 'admin', NULL, NULL, NULL, NULL),
(3, 'NIK', '3201015201980001', 'Anissa', 'anissa@unand.ac.id', '081298765432', 2, '102/LPN-UNAND/2025', '2025-06-02', '', '2025-12-22 16:01:01', 'admin', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_domain`
--

CREATE TABLE `tingkat_domain` (
  `tkdomId` int(11) NOT NULL,
  `tkdomNama` varchar(100) DEFAULT NULL,
  `tkdomTahun` enum('1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tingkat_domain`
--

INSERT INTO `tingkat_domain` (`tkdomId`, `tkdomNama`, `tkdomTahun`) VALUES
(1, '.id', '1'),
(2, 'unand.ac.id', '3'),
(3, '.ac.id', '2'),
(4, 'portal2.unand.ac.id', '4'),
(5, 'sso.unand.ac.id', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_domain`
--
ALTER TABLE `data_domain`
  ADD PRIMARY KEY (`domId`),
  ADD KEY `fk_data_domain_ip` (`domIpAddress`);

--
-- Indexes for table `ip_address`
--
ALTER TABLE `ip_address`
  ADD PRIMARY KEY (`ipAddress`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`orgId`),
  ADD KEY `fk_org_parent` (`orgParentId`);

--
-- Indexes for table `pengelola_domain`
--
ALTER TABLE `pengelola_domain`
  ADD PRIMARY KEY (`pdId`),
  ADD KEY `fk_pdOrgId` (`pdOrgId`);

--
-- Indexes for table `tingkat_domain`
--
ALTER TABLE `tingkat_domain`
  ADD PRIMARY KEY (`tkdomId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_domain`
--
ALTER TABLE `data_domain`
  MODIFY `domId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `orgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengelola_domain`
--
ALTER TABLE `pengelola_domain`
  MODIFY `pdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tingkat_domain`
--
ALTER TABLE `tingkat_domain`
  MODIFY `tkdomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_domain`
--
ALTER TABLE `data_domain`
  ADD CONSTRAINT `fk_data_domain_ip` FOREIGN KEY (`domIpAddress`) REFERENCES `ip_address` (`ipAddress`) ON UPDATE CASCADE;

--
-- Constraints for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD CONSTRAINT `fk_org_parent` FOREIGN KEY (`orgParentId`) REFERENCES `organisasi` (`orgId`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
