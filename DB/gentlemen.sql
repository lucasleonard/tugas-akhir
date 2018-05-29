-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 08:16 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gentlemen`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `noAkun` char(3) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `saldoNormal` smallint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `idAset` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tglBeli` date NOT NULL,
  `perkiraanUmur` double NOT NULL,
  `hargaBeli` int(11) NOT NULL,
  `hargaJual` int(11) DEFAULT NULL,
  `lokasi` varchar(45) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aset_has_notabeli`
--

CREATE TABLE `aset_has_notabeli` (
  `Aset_idAset` int(11) NOT NULL,
  `NotaBeli_noNota` char(11) NOT NULL,
  `hargaBeli` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aset_has_notajual`
--

CREATE TABLE `aset_has_notajual` (
  `Aset_idAset` int(11) NOT NULL,
  `NotaJual_noNota` char(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `idBank` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`idBank`, `nama`) VALUES
(1, 'BCA'),
(2, 'Bank Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kodeBarang` int(11) NOT NULL,
  `namaBarang` varchar(45) NOT NULL,
  `hargaJual` int(11) NOT NULL,
  `hargaBeliRata2` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `minStok` int(11) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  `Jenis_idJenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kodeBarang`, `namaBarang`, `hargaJual`, `hargaBeliRata2`, `stok`, `minStok`, `aktif`, `Jenis_idJenis`) VALUES
(1, 'Barang 1', 50000, NULL, 0, 10, NULL, 1),
(2, 'Barang 2', 60000, NULL, 0, 20, NULL, 1),
(3, 'Barang 3', 75000, NULL, 0, 20, NULL, 1),
(4, 'Jasa 1', 60000, NULL, 0, 1, NULL, 2),
(5, 'Jasa 2', 12345, NULL, 0, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `barang_has_karyawan`
--

CREATE TABLE `barang_has_karyawan` (
  `Barang_kodeBarang` int(11) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  `bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_has_karyawan`
--

INSERT INTO `barang_has_karyawan` (`Barang_kodeBarang`, `Karyawan_idKaryawan`, `bonus`) VALUES
(4, 1, 8000),
(4, 3, 10000),
(5, 1, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `noTelp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `nama`, `noTelp`) VALUES
(1, 'Geo', '031237123'),
(2, 'Vanni', '0897665233');

-- --------------------------------------------------------

--
-- Table structure for table `hadiah`
--

CREATE TABLE `hadiah` (
  `idHadiah` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jumlah` varchar(13) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hadiah`
--

INSERT INTO `hadiah` (`idHadiah`, `nama`, `jumlah`, `aktif`) VALUES
(1, 'Default', '0', 1),
(2, 'Hadiah 1', '5', 1),
(3, 'Hadiah 2', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `idJenis` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`idJenis`, `nama`) VALUES
(1, 'Barang'),
(2, 'Jasa');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `idJurnal` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keteranganTransaksi` varchar(150) DEFAULT NULL,
  `noBukti` varchar(5) DEFAULT NULL,
  `jenisJurnal` enum('JU','JK','JP') DEFAULT NULL,
  `Periode_idPeriode` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_has_akun`
--

CREATE TABLE `jurnal_has_akun` (
  `Jurnal_idJurnal` int(11) NOT NULL,
  `Akun_noAkun` char(3) NOT NULL,
  `urutan` smallint(1) NOT NULL,
  `nominalDebet` int(11) DEFAULT NULL,
  `nominalKredit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tanggalMasuk` date DEFAULT NULL,
  `noTelp` varchar(13) DEFAULT NULL,
  `gajiPokok` int(11) NOT NULL,
  `jabatan` enum('K','O','P') NOT NULL,
  `aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `username`, `password`, `nama`, `tanggalMasuk`, `noTelp`, `gajiPokok`, `jabatan`, `aktif`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Lucas', '2018-05-15', '081939856000', 1000000, 'P', 1),
(3, 'Leo', '', 'Leonard', '2018-05-15', '081939856001', 1050000, 'K', 1),
(4, 'Lenovo', '', 'Lenovo', '2018-05-08', '081939856002', 1500000, 'O', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `idLaporan` char(2) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_has_akun`
--

CREATE TABLE `laporan_has_akun` (
  `Laporan_idLaporan` char(2) NOT NULL,
  `Akun_noAkun` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notabeli`
--

CREATE TABLE `notabeli` (
  `noNota` char(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `caraBayar` enum('T','TR','K') DEFAULT NULL,
  `StatusKirim` tinyint(1) DEFAULT NULL,
  `biayaKirim` int(11) DEFAULT NULL,
  `caraBayarPengiriman` enum('T','TR','K') DEFAULT NULL,
  `noRekening` varchar(45) DEFAULT NULL,
  `namaPemilikRekening` varchar(45) DEFAULT NULL,
  `dibayarOleh` enum('gentlemen','penjual') DEFAULT NULL,
  `tanggalJatuhTempo` date NOT NULL,
  `Bank_idBank` int(11) NOT NULL,
  `Supplier_idSupplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notabeli_has_barang`
--

CREATE TABLE `notabeli_has_barang` (
  `NotaBeli_noNota` char(11) NOT NULL,
  `Barang_kodeBarang` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notajual`
--

CREATE TABLE `notajual` (
  `noNota` char(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nominalSeharusnya` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `nominalBayar` int(11) DEFAULT NULL,
  `caraBayar` enum('T','TR') DEFAULT NULL,
  `noRekening` varchar(45) DEFAULT NULL,
  `namaPemilikRekening` varchar(45) DEFAULT NULL,
  `Customer_idCustomer` int(11) NOT NULL,
  `Bank_idBank` int(11) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  `Karyawan_idKaryawan1` int(11) NOT NULL,
  `Hadiah_idHadiah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notajual`
--

INSERT INTO `notajual` (`noNota`, `tanggal`, `nominalSeharusnya`, `diskon`, `nominalBayar`, `caraBayar`, `noRekening`, `namaPemilikRekening`, `Customer_idCustomer`, `Bank_idBank`, `Karyawan_idKaryawan`, `Karyawan_idKaryawan1`, `Hadiah_idHadiah`) VALUES
('12345678901', '2018-05-01', NULL, NULL, 100000, 'T', NULL, NULL, 1, 1, 4, 1, 1),
('12345678902', '2018-04-30', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 4, 3, 1),
('12345678903', '2018-05-02', NULL, NULL, 100000, 'T', NULL, NULL, 1, 1, 4, 1, 1),
('12345678904', '2018-04-03', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notajual_has_barang`
--

CREATE TABLE `notajual_has_barang` (
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `Barang_kodeBarang` int(11) NOT NULL,
  `NotaJual_noNota` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notajual_has_barang`
--

INSERT INTO `notajual_has_barang` (`harga`, `jumlah`, `Barang_kodeBarang`, `NotaJual_noNota`) VALUES
(60000, 2, 4, '12345678901'),
(60000, 1, 4, '12345678902'),
(60000, 1, 4, '12345678903'),
(60000, 1, 4, '12345678904');

-- --------------------------------------------------------

--
-- Table structure for table `notajual_has_poin`
--

CREATE TABLE `notajual_has_poin` (
  `NotaJual_noNota` char(11) NOT NULL,
  `Poin_idPoin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notaterima`
--

CREATE TABLE `notaterima` (
  `noNota` char(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `NotaBeli_noNota` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `idPeriode` char(6) NOT NULL,
  `tanggalAwal` date DEFAULT NULL,
  `tanggalAkhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `periode_has_akun`
--

CREATE TABLE `periode_has_akun` (
  `Periode_idPeriode` char(6) NOT NULL,
  `Akun_noAkun` char(3) NOT NULL,
  `saldoAwal` int(11) DEFAULT NULL,
  `saldoAkhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poin`
--

CREATE TABLE `poin` (
  `idPoin` int(11) NOT NULL,
  `sudahTerpakai` tinyint(1) NOT NULL DEFAULT '1',
  `Customer_idCustomer` int(11) NOT NULL,
  `Hadiah_idHadiah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poin`
--

INSERT INTO `poin` (`idPoin`, `sudahTerpakai`, `Customer_idCustomer`, `Hadiah_idHadiah`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `noTelp` varchar(13) NOT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `nama`, `noTelp`, `alamat`, `aktif`) VALUES
(1, 'Supplier 1', '081939856000', 'Tenggilis Mejoyo', 1),
(2, 'Supplier 2', '081939856002', 'Alamatrtyu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_has_barang`
--

CREATE TABLE `supplier_has_barang` (
  `Supplier_idSupplier` int(11) NOT NULL,
  `Barang_kodeBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_has_barang`
--

INSERT INTO `supplier_has_barang` (`Supplier_idSupplier`, `Barang_kodeBarang`) VALUES
(1, 1),
(1, 2),
(2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`noAkun`);

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`idAset`);

--
-- Indexes for table `aset_has_notabeli`
--
ALTER TABLE `aset_has_notabeli`
  ADD PRIMARY KEY (`Aset_idAset`,`NotaBeli_noNota`),
  ADD KEY `fk_Aset_has_NotaBeli_NotaBeli1_idx` (`NotaBeli_noNota`),
  ADD KEY `fk_Aset_has_NotaBeli_Aset1_idx` (`Aset_idAset`);

--
-- Indexes for table `aset_has_notajual`
--
ALTER TABLE `aset_has_notajual`
  ADD PRIMARY KEY (`Aset_idAset`,`NotaJual_noNota`),
  ADD KEY `fk_Aset_has_NotaJual_NotaJual1_idx` (`NotaJual_noNota`),
  ADD KEY `fk_Aset_has_NotaJual_Aset1_idx` (`Aset_idAset`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`idBank`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodeBarang`),
  ADD KEY `fk_Barang_Jenis_idx` (`Jenis_idJenis`);

--
-- Indexes for table `barang_has_karyawan`
--
ALTER TABLE `barang_has_karyawan`
  ADD PRIMARY KEY (`Barang_kodeBarang`,`Karyawan_idKaryawan`),
  ADD KEY `fk_Barang_has_Karyawan_Karyawan1_idx` (`Karyawan_idKaryawan`),
  ADD KEY `fk_Barang_has_Karyawan_Barang1_idx` (`Barang_kodeBarang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `hadiah`
--
ALTER TABLE `hadiah`
  ADD PRIMARY KEY (`idHadiah`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`idJenis`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`idJurnal`),
  ADD KEY `fk_Jurnal_Periode1_idx` (`Periode_idPeriode`);

--
-- Indexes for table `jurnal_has_akun`
--
ALTER TABLE `jurnal_has_akun`
  ADD PRIMARY KEY (`Jurnal_idJurnal`,`Akun_noAkun`,`urutan`),
  ADD KEY `fk_Jurnal_has_Akun_Akun1_idx` (`Akun_noAkun`),
  ADD KEY `fk_Jurnal_has_Akun_Jurnal1_idx` (`Jurnal_idJurnal`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idKaryawan`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idLaporan`);

--
-- Indexes for table `laporan_has_akun`
--
ALTER TABLE `laporan_has_akun`
  ADD PRIMARY KEY (`Laporan_idLaporan`,`Akun_noAkun`),
  ADD KEY `fk_Laporan_has_Akun_Akun1_idx` (`Akun_noAkun`),
  ADD KEY `fk_Laporan_has_Akun_Laporan1_idx` (`Laporan_idLaporan`);

--
-- Indexes for table `notabeli`
--
ALTER TABLE `notabeli`
  ADD PRIMARY KEY (`noNota`),
  ADD KEY `fk_NotaBeli_Supplier1_idx` (`Supplier_idSupplier`),
  ADD KEY `fk_NotaBeli_Bank1_idx` (`Bank_idBank`);

--
-- Indexes for table `notabeli_has_barang`
--
ALTER TABLE `notabeli_has_barang`
  ADD PRIMARY KEY (`NotaBeli_noNota`,`Barang_kodeBarang`),
  ADD KEY `fk_NotaBeli_has_Barang_Barang1_idx` (`Barang_kodeBarang`),
  ADD KEY `fk_NotaBeli_has_Barang_NotaBeli1_idx` (`NotaBeli_noNota`);

--
-- Indexes for table `notajual`
--
ALTER TABLE `notajual`
  ADD PRIMARY KEY (`noNota`),
  ADD KEY `fk_NotaBayar_Bank1_idx` (`Bank_idBank`),
  ADD KEY `fk_NotaBayarJual_Costumer1_idx` (`Customer_idCustomer`),
  ADD KEY `fk_NotaJual_Karyawan1_idx` (`Karyawan_idKaryawan`),
  ADD KEY `fk_NotaJual_Karyawan2_idx` (`Karyawan_idKaryawan1`),
  ADD KEY `fk_NotaJual_Hadiah1_idx` (`Hadiah_idHadiah`);

--
-- Indexes for table `notajual_has_barang`
--
ALTER TABLE `notajual_has_barang`
  ADD PRIMARY KEY (`Barang_kodeBarang`,`NotaJual_noNota`),
  ADD KEY `fk_NotaJual_has_Barang_Barang1_idx` (`Barang_kodeBarang`),
  ADD KEY `fk_NotaJual_has_Barang_NotaBayarJual1_idx` (`NotaJual_noNota`);

--
-- Indexes for table `notajual_has_poin`
--
ALTER TABLE `notajual_has_poin`
  ADD PRIMARY KEY (`NotaJual_noNota`,`Poin_idPoin`),
  ADD KEY `fk_NotaJual_has_Poin_Poin1_idx` (`Poin_idPoin`),
  ADD KEY `fk_NotaJual_has_Poin_NotaJual1_idx` (`NotaJual_noNota`);

--
-- Indexes for table `notaterima`
--
ALTER TABLE `notaterima`
  ADD PRIMARY KEY (`noNota`),
  ADD KEY `fk_NotaTerima_NotaBeli1_idx` (`NotaBeli_noNota`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`idPeriode`);

--
-- Indexes for table `periode_has_akun`
--
ALTER TABLE `periode_has_akun`
  ADD PRIMARY KEY (`Periode_idPeriode`,`Akun_noAkun`),
  ADD KEY `fk_Periode_has_Akun_Akun1_idx` (`Akun_noAkun`),
  ADD KEY `fk_Periode_has_Akun_Periode1_idx` (`Periode_idPeriode`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`idPoin`),
  ADD KEY `fk_hadiah_Costumer1_idx` (`Customer_idCustomer`),
  ADD KEY `fk_poin_hadiah1_idx` (`Hadiah_idHadiah`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`);

--
-- Indexes for table `supplier_has_barang`
--
ALTER TABLE `supplier_has_barang`
  ADD PRIMARY KEY (`Supplier_idSupplier`,`Barang_kodeBarang`),
  ADD KEY `fk_Supplieri_has_Barang__Supplier1_idx` (`Supplier_idSupplier`),
  ADD KEY `fk_Supplier_has_Barang_Barang1_idx` (`Barang_kodeBarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `idAset` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `idBank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kodeBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hadiah`
--
ALTER TABLE `hadiah`
  MODIFY `idHadiah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `poin`
--
ALTER TABLE `poin`
  MODIFY `idPoin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aset_has_notabeli`
--
ALTER TABLE `aset_has_notabeli`
  ADD CONSTRAINT `fk_Aset_has_NotaBeli_Aset1` FOREIGN KEY (`Aset_idAset`) REFERENCES `aset` (`idAset`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Aset_has_NotaBeli_NotaBeli1` FOREIGN KEY (`NotaBeli_noNota`) REFERENCES `notabeli` (`noNota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `aset_has_notajual`
--
ALTER TABLE `aset_has_notajual`
  ADD CONSTRAINT `fk_Aset_has_NotaJual_Aset1` FOREIGN KEY (`Aset_idAset`) REFERENCES `aset` (`idAset`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Aset_has_NotaJual_NotaJual1` FOREIGN KEY (`NotaJual_noNota`) REFERENCES `notajual` (`noNota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_Barang_Jenis` FOREIGN KEY (`Jenis_idJenis`) REFERENCES `jenis` (`idJenis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `barang_has_karyawan`
--
ALTER TABLE `barang_has_karyawan`
  ADD CONSTRAINT `fk_Barang_has_Karyawan_Barang1` FOREIGN KEY (`Barang_kodeBarang`) REFERENCES `barang` (`kodeBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Barang_has_Karyawan_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `fk_Jurnal_Periode1` FOREIGN KEY (`Periode_idPeriode`) REFERENCES `periode` (`idPeriode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jurnal_has_akun`
--
ALTER TABLE `jurnal_has_akun`
  ADD CONSTRAINT `fk_Jurnal_has_Akun_Akun1` FOREIGN KEY (`Akun_noAkun`) REFERENCES `akun` (`noAkun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Jurnal_has_Akun_Jurnal1` FOREIGN KEY (`Jurnal_idJurnal`) REFERENCES `jurnal` (`idJurnal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `laporan_has_akun`
--
ALTER TABLE `laporan_has_akun`
  ADD CONSTRAINT `fk_Laporan_has_Akun_Akun1` FOREIGN KEY (`Akun_noAkun`) REFERENCES `akun` (`noAkun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Laporan_has_Akun_Laporan1` FOREIGN KEY (`Laporan_idLaporan`) REFERENCES `laporan` (`idLaporan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notabeli`
--
ALTER TABLE `notabeli`
  ADD CONSTRAINT `fk_NotaBeli_Bank1` FOREIGN KEY (`Bank_idBank`) REFERENCES `bank` (`idBank`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_NotaBeli_Supplier1` FOREIGN KEY (`Supplier_idSupplier`) REFERENCES `supplier` (`idSupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notabeli_has_barang`
--
ALTER TABLE `notabeli_has_barang`
  ADD CONSTRAINT `fk_NotaBeli_has_Barang_Barang1` FOREIGN KEY (`Barang_kodeBarang`) REFERENCES `barang` (`kodeBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_NotaBeli_has_Barang_NotaBeli1` FOREIGN KEY (`NotaBeli_noNota`) REFERENCES `notabeli` (`noNota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notajual`
--
ALTER TABLE `notajual`
  ADD CONSTRAINT `fk_NotaBayarJual_Costumer1` FOREIGN KEY (`Customer_idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_NotaBayar_Bank10` FOREIGN KEY (`Bank_idBank`) REFERENCES `bank` (`idBank`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_NotaJual_Hadiah1` FOREIGN KEY (`Hadiah_idHadiah`) REFERENCES `hadiah` (`idHadiah`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_NotaJual_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_NotaJual_Karyawan2` FOREIGN KEY (`Karyawan_idKaryawan1`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notajual_has_barang`
--
ALTER TABLE `notajual_has_barang`
  ADD CONSTRAINT `fk_NotaJual_has_Barang_Barang1` FOREIGN KEY (`Barang_kodeBarang`) REFERENCES `barang` (`kodeBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_NotaJual_has_Barang_NotaBayarJual1` FOREIGN KEY (`NotaJual_noNota`) REFERENCES `notajual` (`noNota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notajual_has_poin`
--
ALTER TABLE `notajual_has_poin`
  ADD CONSTRAINT `fk_NotaJual_has_Poin_NotaJual1` FOREIGN KEY (`NotaJual_noNota`) REFERENCES `notajual` (`noNota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_NotaJual_has_Poin_Poin1` FOREIGN KEY (`Poin_idPoin`) REFERENCES `poin` (`idPoin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notaterima`
--
ALTER TABLE `notaterima`
  ADD CONSTRAINT `fk_NotaTerima_NotaBeli1` FOREIGN KEY (`NotaBeli_noNota`) REFERENCES `notabeli` (`noNota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `periode_has_akun`
--
ALTER TABLE `periode_has_akun`
  ADD CONSTRAINT `fk_Periode_has_Akun_Akun1` FOREIGN KEY (`Akun_noAkun`) REFERENCES `akun` (`noAkun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Periode_has_Akun_Periode1` FOREIGN KEY (`Periode_idPeriode`) REFERENCES `periode` (`idPeriode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `fk_hadiah_Costumer10` FOREIGN KEY (`Customer_idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_poin_hadiah1` FOREIGN KEY (`Hadiah_idHadiah`) REFERENCES `hadiah` (`idHadiah`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supplier_has_barang`
--
ALTER TABLE `supplier_has_barang`
  ADD CONSTRAINT `fk_Supplier_has_Barang_Barang1` FOREIGN KEY (`Barang_kodeBarang`) REFERENCES `barang` (`kodeBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Supplieri_has_Barang__Supplier1` FOREIGN KEY (`Supplier_idSupplier`) REFERENCES `supplier` (`idSupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
