-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2018 at 01:16 PM
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

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`noAkun`, `nama`, `saldoNormal`) VALUES
('101', 'Kas', 1),
('102', 'Bank BCA', 1),
('401', 'Pendapatan Barang', 2),
('402', 'Pendapatan Jasa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `idAset` int(11) NOT NULL,
  `perkiraanUmur` double NOT NULL,
  `lokasi` varchar(45) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  `Barang_kodeBarang` int(11) NOT NULL
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
(1, 'default'),
(2, 'BCA');

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
(10001, 'Barang 1', 5000, NULL, 10, 5, 1, 1),
(10002, 'Barang 2', 3000, NULL, 5, 5, 1, 1),
(20001, 'Jasa 1', 60000, NULL, NULL, NULL, 1, 2),
(20002, 'Jasa 2', 80000, NULL, NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `barang_has_karyawan`
--

CREATE TABLE `barang_has_karyawan` (
  `Barang_kodeBarang` int(11) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  `bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `noTelp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `noTelp`) VALUES
(1, '081939856000'),
(2, '0897665233');

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
(1, 'default', '100', 1),
(2, 'Hadiah 1', '5', 1);

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
  `username` varchar(45) DEFAULT NULL,
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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2018-07-01', NULL, 1000000, 'P', 1),
(2, 'kapster', '21232f297a57a5a743894a0e4a801fc3', 'Kapster 1', '2018-07-01', NULL, 500000, 'K', 1);

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
  `tanggalJatuhTempo` date DEFAULT NULL,
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
  `tanggal` date NOT NULL,
  `nominalBayar` int(11) NOT NULL,
  `caraBayar` enum('T','TR') NOT NULL,
  `noRekening` varchar(45) DEFAULT NULL,
  `namaPemilikRekening` varchar(45) DEFAULT NULL,
  `Customer_idCustomer` int(11) NOT NULL,
  `Bank_idBank` int(11) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  `Karyawan_idKaryawan1` int(11) NOT NULL,
  `Hadiah_idHadiah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `tanggalAkhir` date DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`idPeriode`, `tanggalAwal`, `tanggalAkhir`, `aktif`) VALUES
('201806', '2018-06-01', '2018-06-30', 1),
('201807', '2018-07-01', '2018-07-31', 0);

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
(1, 'Supplier 1', '081939856000', NULL, 1),
(2, 'Supplier 2', '081939856002', NULL, 1);

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
(1, 10001),
(2, 10001);

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
  ADD PRIMARY KEY (`idAset`,`Barang_kodeBarang`),
  ADD KEY `fk_Aset_Barang1_idx` (`Barang_kodeBarang`);

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
  MODIFY `kodeBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20003;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hadiah`
--
ALTER TABLE `hadiah`
  MODIFY `idHadiah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `idJurnal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `poin`
--
ALTER TABLE `poin`
  MODIFY `idPoin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `fk_Aset_Barang1` FOREIGN KEY (`Barang_kodeBarang`) REFERENCES `barang` (`kodeBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
