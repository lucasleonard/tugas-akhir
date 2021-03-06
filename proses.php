<?php
session_start();
require './db.php';
include 'sql.php'; 
$cmd = $_GET['cmd'];

switch ($cmd) {
    case "login": //login.php
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $sql = "SELECT * FROM karyawan WHERE username = '".$username."' AND password = '".$password."'";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            die("SQL ERROR.".$sql);
        }
        if(mysqli_num_rows($result)<1){
            $_SESSION['notif'] = "loginSalah";
            header("Location: /gentlemen/login.php");
        }
        else if(mysqli_num_rows($result)>0){
            setcookie("idU", $username, time() + 7200); 
            setcookie("loginU", TRUE, time() + 7200);
            header("Location: /gentlemen/tambah_penjualan.php");
        }
        break;

    case "logout":
        setcookie("idU", null, time() -1);
        setcookie("loginU", FALSE, time() -1);
        header('location: login.php');
        break;

    case "insertAset": //tambah_aset.php
        $namaAset = $_POST['namaAset'];
        $hargaBeli = $_POST['hargaBeli'];
        $tanggalBeli = $_POST['tanggalBeli'];
        $perkiraanUmur = $_POST['perkiraanUmur'];
        $sql = "INSERT INTO `aset`(`nama`, `tglBeli`, `perkiraanUmur`, `hargaBeli`, `aktif`) VALUES ('".$namaAset."', '".$tanggalBeli."', ".$perkiraanUmur.", ".$hargaBeli." , 1)";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            die("SQL ERROR.".$sql);
            header("Location: /gentlemen/tambah_aset.php");
        }
        else {
            $_SESSION['notif'] = "sukses";
            header("Location: tambah_aset.php");
        }
        break;

    case "insertKaryawan": //tambah_karyawan.php
        $namaKaryawan = $_POST['namaKaryawan'];
        $jabatanKaryawan = $_POST['jabatanKaryawan'];
        $nomorTelepon = $_POST['nomorTelepon'];
        $tanggalMasuk = $_POST['tanggalMasuk'];
        $gajiPokok = $_POST['gajiPokok'];
        $sql = "INSERT INTO `karyawan`(`nama`, `noTelp`, `jabatan`, `tanggalMasuk`, `gajiPokok`, `aktif`) VALUES ('".$namaKaryawan."', '".$nomorTelepon."', '".$jabatanKaryawan."', '".$tanggalMasuk."', ".$gajiPokok." , 1)";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            header("Location: /gentlemen/tambah_karyawan.php");
        }
        else {
            $_SESSION['notif'] = "sukses";
            header("Location: tambah_karyawan.php");
        }
        break;

    case "editKaryawan": //data_karyawan.php
        $idKaryawan = $_POST['idKaryawan'];
        $namaKaryawan = $_POST['namaKaryawan'];
        $jabatanKaryawan = $_POST['jabatan'];
        $nomorTelepon = $_POST['noTelepon'];
        $tanggalMasuk = $_POST['tanggalMasuk'];
        $gajiPokok = $_POST['gajiPokok'];
        $sql = "UPDATE `karyawan` SET `nama` = '".$namaKaryawan."', `noTelp` = '".$nomorTelepon."', `jabatan` = '".$jabatanKaryawan."', `tanggalMasuk` = '".$tanggalMasuk."', `gajiPokok` = ".$gajiPokok. " WHERE idKaryawan = ".$idKaryawan;
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            header("Location: /gentlemen/data_karyawan.php");
        }
        else {
            $_SESSION['notif'] = "sukses";
            header("Location: data_karyawan.php");
        }
        break;

    case "insertKomisi": //tambah_komisi.php
        $idKaryawan = $_POST['idKaryawan'];
        $jasaKaryawan = $_POST['jasaKaryawan'];
        $komisi = $_POST['komisi'];
        $tanggalMasuk = $_POST['tanggalMasuk'];
        $gajiPokok = $_POST['gajiPokok'];
        $sql = "INSERT INTO `karyawan`(`nama`, `noTelp`, `jabatan`, `tanggalMasuk`, `gajiPokok`, `aktif`) VALUES ('".$namaKaryawan."', '".$nomorTelepon."', '".$jabatanKaryawan."', '".$tanggalMasuk."', ".$gajiPokok." , 1)";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            header("Location: /gentlemen/tambah_karyawan.php");
        }
        else {
            $_SESSION['notif'] = "sukses";
            header("Location: tambah_karyawan.php");
        }
        break;

    case "insertHadiah": //tambah_hadiah.php
        $namaHadiah = $_POST['namaHadiah'];
        $jumlahPoin = $_POST['jumlahPoin'];
        $sql = "INSERT INTO `hadiah`(`nama`, `jumlah`, `aktif`) VALUES ('".$namaHadiah."', ".$jumlahPoin.", 1)";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            header("Location: /gentlemen/tambah_hadiah.php");
        }
        else{
                $_SESSION['notif'] = "sukses";
                header("Location: tambah_hadiah.php");
        }
        break;

    case "editHadiah": //data_hadiah.php
        $idHadiah = $_POST['idHadiah'];
        $namaHadiah = $_POST['namaHadiah'];
        $jumlah = $_POST['jumlah'];
        $sql = "UPDATE `hadiah` SET `nama` = '".$namaHadiah."', `jumlah` = ".$jumlah." WHERE idHadiah = ".$idHadiah;
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            header("Location: /gentlemen/data_hadiah.php");
        }
        else {
            $_SESSION['notif'] = "sukses";
            header("Location: data_hadiah.php");
        }
        break;

    case "insertSupplier": //tambah_supplier.php
        $namaSupplier = $_GET['namaSupplier'];
        $alamatSupplier = $_GET['alamatSupplier'];
        $nomorTelepon = $_GET['nomorTelepon'];
        $sql = "INSERT INTO `supplier`(`nama`, `noTelp`, `alamat`, `aktif`) VALUES ('".$namaSupplier."', '".$nomorTelepon."', '".$alamatSupplier."', 1 )";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            die(header('location: tambah_supplier.php'));
        }
        else {
            $_SESSION['notif'] = "sukses";
            header("Location: tambah_supplier.php");
        }
        break;

    case "editSupplier": //data_supplier.php
        $idSupplier = $_POST['idSupplier'];
        $namaSupplier = $_POST['namaSupplier'];
        $noTelepon = $_POST['noTelepon'];
        $alamatSupplier = $_POST['alamatSupplier'];
        $sql = "UPDATE `supplier` SET `nama` = '".$namaSupplier."', `noTelp` = '".$noTelepon."', `alamat` = '".$alamatSupplier."' WHERE idSupplier = ".$idSupplier;
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            header("Location: /gentlemen/data_supplier.php");
        }
        else {
            $_SESSION['notif'] = "sukses";
            header("Location: data_supplier.php");
        }
        break;

    case "hapusSupplier":        
        $idSupplier = $_GET['i'];
        $sql = "DELETE FROM supplier WHERE idSupplier=" . $idSupplier;
        $result = mysqli_query($link, $sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            die(header('location: data_supplier.php'));
        }
        else {
            $_SESSION['notif'] = "sukses";
            header("Location: data_supplier.php");
        }
        break;

    case "insertSupplierHasBarang": //tambah_supplier.php 
        $kodeBarang = $_GET['namaBarang'];
        $sqlIdSupplier = "SELECT MAX(idSupplier) as topIdSupp FROM supplier";
        $resultIdSupplier = mysqli_query($link, $sqlIdSupplier);
        while($rowIdSupplier=mysqli_fetch_object($resultIdSupplier))
        {
            $sql = "INSERT INTO `supplier_has_barang`(`Supplier_idSupplier`, `Barang_kodeBarang`) VALUES (".$rowIdSupplier->topIdSupp.", ".$kodeBarang.")";
            $result = mysqli_query($link,$sql);
            if (!$result) {
                $_SESSION['notif']= "error2";
                die("SQL ERROR.".$sql);
            }
        }
        $_SESSION['notif']= "sukses";
        break;

    case "insertProduk": //tambah_produk.php
        $namaProduk = $_POST['namaProduk'];
        $hargaJual = $_POST['hargaJualProduk'];
        $minStokProduk = 1;
        if(isset($_POST['minStokProduk']))
            $minStokProduk = $_POST['minStokProduk'];
        $jenisProduk = $_POST['jenisProduk'];
        $sql = "INSERT INTO `barang`(`namaBarang`, `hargaJual`, `stok`, `minStok`, `Jenis_idJenis`) VALUES ('".$namaProduk."', ".$hargaJual.", 0, ".$minStokProduk.", ".$jenisProduk.")";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            die("SQL ERROR.".$sql);
            header("Location: /gentlemen/tambah_produk.php");
        }
        $_SESSION['notif'] = "sukses";
        header("Location: /gentlemen/tambah_produk.php");
        break;

    case "editProduk": //data_produk.php
        $kodeBarang = $_POST['kodeBarang'];
        $namaBarang = $_POST['namaProduk'];
        $hargaJual = $_POST['hargaJual'];
        $stok = $_POST['stok'];
        $minStok = $_POST['minStok'];
        $jenisProduk = $_POST['jenisProduk'];
        $sql = "UPDATE `barang` SET `namaBarang` = '".$namaBarang."', `hargaJual` = ".$hargaJual.", `stok` = ".$stok.", `minStok` = ".$minStok.", `Jenis_idJenis` = ".$jenisProduk. " WHERE kodeBarang = ".$kodeBarang;
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            die("SQL ERROR.".$sql);
            //header("Location: /gentlemen/data_produk.php");
        }
        else {
            $_SESSION['notif'] = "sukses";
            header("Location: data_produk.php");
        }
        break;

    case "insertNotaBeli": //tambah_pembelian.php
        $noNota = $_GET['noNota'];
        $tanggal = $_GET['tanggal'];
        $idSupplier = $_GET['idSupplier'];
        $caraBayar = $_GET['jenisBayar'];
        $statusKirim = $_GET['statusKirim'];
        $nominalBayar = str_replace(",", "", $_GET['totalHarga']);
        $nominalBayar = (int)$nominalBayar;
        if(isset($_GET['biayaKirim']))
            $biayaKirim = $_GET['biayaKirim'];
        else
            $biayaKirim = 0;
        if(isset($_GET['bank']))
            $bank = $_GET['bank'];
        else
            $bank = 1;
        if(isset($_GET['uangMuka']))
            $uangMuka = $_GET['uangMuka'];
        else
            $uangMuka = 0;
        if(isset($_GET['tanggalJatuhTempo']))
            $tanggalJatuhTempo = $_GET['tanggalJatuhTempo'];
        else
            $tanggalJatuhTempo = NULL;
        if(isset($_GET['namaPemilikRekening']))
            $namaPemilikRekening = $_GET['namaPemilikRekening'];
        else
            $namaPemilikRekening = NULL;
        if(isset($_GET['nomorRekening']))
            $nomorRekening = $_GET['nomorRekening'];
        else
            $nomorRekening = NULL;
        if($caraBayar=="T") 
            $sql = "INSERT INTO `notabeli`(`noNota`, `tanggal`, `nominalBayar`, `caraBayar`, `StatusKirim`, `biayaKirim`, `noRekening`, `namaPemilikRekening`, `tanggalJatuhTempo`, `Bank_idBank`, `Supplier_idSupplier`) VALUES  ('".$noNota."', '".$tanggal."', ".$nominalBayar.", '".$caraBayar."', ".$statusKirim.", ".$biayaKirim.", NULL, NULL, NULL, 1, ".$idSupplier.");";
        else if($caraBayar=="TR")
            $sql = "INSERT INTO `notabeli`(`noNota`, `tanggal`, `nominalBayar`, `caraBayar`, `StatusKirim`, `biayaKirim`, `noRekening`, `namaPemilikRekening`, `tanggalJatuhTempo`, `Bank_idBank`, `Supplier_idSupplier`) VALUES  ('".$noNota."', '".$tanggal."', ".$nominalBayar.", '".$caraBayar."', ".$statusKirim.", ".$biayaKirim.", '".$nomorRekening."', '".$namaPemilikRekening."', NULL, ".$bank.", ".$idSupplier.");";
        else if($caraBayar=="K")
            $sql = "INSERT INTO `notabeli`(`noNota`, `tanggal`, `nominalBayar`, `caraBayar`, `StatusKirim`, `biayaKirim`, `noRekening`, `namaPemilikRekening`, `tanggalJatuhTempo`, `Bank_idBank`, `Supplier_idSupplier`) VALUES  ('".$noNota."', '".$tanggal."', ".$nominalBayar.", '".$caraBayar."', ".$statusKirim.", ".$biayaKirim.", NULL, NULL, '".$tanggalJatuhTempo."', 1, ".$idSupplier.");";
        else
            $sql = "INSERT INTO `notabeli`(`noNota`, `tanggal`, `nominalBayar`, `caraBayar`, `StatusKirim`, `biayaKirim`, `noRekening`, `namaPemilikRekening`, `tanggalJatuhTempo`, `Bank_idBank`, `Supplier_idSupplier`) VALUES  ('".$noNota."', '".$tanggal."', ".$nominalBayar.", '".$caraBayar."', ".$statusKirim.", ".$biayaKirim.", '".$nomorRekening."', ".$namaPemilikRekening.", '".$tanggalJatuhTempo."', ".$bank.", ".$idSupplier.");";
        $result = mysqli_query($link,$sql);
        if(!$result){
            die ("SQL ERROR : ".$sql);
        }
        break;

    case "insertNotaBeliBarang": //tambah_pembelian.php
        $noNota = $_GET['noNota'];
        $kodeBarang = $_GET['kodeBarang'];
        $jumlah = $_GET['jumlah'];
        $harga = $_GET['harga'];
        $tanggal = $_GET['tanggal'];
        $caraBayar = $_GET['jenisBayar'];
        $sql = "INSERT INTO `notabeli_has_barang` (`NotaBeli_noNota`, `Barang_kodeBarang`, `harga`, `jumlah`) VALUES ('".$noNota."', '".$kodeBarang."', '".$harga."', '".$jumlah."');";
        $result = mysqli_query($link,$sql);
        if(!$result)
            die ("SQL ERROR : ".$sql);
        //update stok
        $sqlCekStok = "SELECT * FROM barang WHERE kodeBarang = ".$kodeBarang;
        $resultCekStok = mysqli_query($link, $sqlCekStok);
        while($row = mysqli_fetch_object($resultCekStok)){
            $jumlahstokLama = $row->stok;
            $jumlahStokBaru = $row->stok+$jumlah;
            if($row->Jenis_idJenis==1){
                $sqlUpdateStok = "UPDATE `barang` SET `stok`=".$jumlahStokBaru." WHERE kodeBarang = ".$kodeBarang;
                $resultUpdateStok = mysqli_query($link, $sqlUpdateStok);
                if(!$resultUpdateStok)
                    die ("SQL ERROR : ".$sqlUpdateStok);
            }
            //update harga beli (AVG)
            if($row->hargaBeliRata2==NULL){
                $sqlUpdateHargaBeli = "UPDATE `barang` SET `hargaBeliRata2`=".$harga." WHERE kodeBarang = ".$kodeBarang;
                $resultUpdateHargaBeli = mysqli_query($link, $sqlUpdateHargaBeli);
                if(!$resultUpdateHargaBeli)
                    die ("SQL ERROR : ".$sqlUpdateHargaBeli);                
            }
            else if($row->hargaBeliRata2!=NULL){
                $totalHargaSkrg = $row->hargaBeliRata2 * $jumlahstokLama;
                $totalHargaBaru = $harga * $jumlah;
                $hargaBaru = ($totalHargaSkrg+$totalHargaBaru)/$jumlahStokBaru;
                $sqlUpdateHargaBeli2 = "UPDATE `barang` SET `hargaBeliRata2`=".$hargaBaru." WHERE kodeBarang = ".$kodeBarang;
                $resultUpdateHargaBeli2 = mysqli_query($link, $sqlUpdateHargaBeli2);
                if(!$resultUpdateHargaBeli2)
                    die ("SQL ERROR : ".$sqlUpdateHargaBeli2);   
            }
        }
        //JURNAL
        while($row = mysqli_fetch_object($resultPeriodeAktif))
            $idPeriode = $row->idPeriode;
        $sql = "SELECT * FROM jenis WHERE idJenis IN (SELECT Jenis_idJenis FROM barang WHERE kodeBarang = ".$kodeBarang.")";
        $resultJenis = mysqli_query($link, $sql);
        while($row = mysqli_fetch_object($resultJenis)){
            $keterangan = "Transaksi Pembelian ".$row->nama;
            if($row->idJenis==1)
                $noAkun = 501;
            else if($row->idJenis==2)
                $noAkun = 502;
            else if($row->idJenis==3)
                $noAkun = 503;
            else if($row->idJenis==4)
                $noAkun = 504;
        }
        if($caraBayar=="T")
            $keterangan =  $keterangan." Tunai";
        else if($caraBayar == "TR")
            $keterangan =  $keterangan." Transfer";
        else if($caraBayar == "K")
            $keterangan =  $keterangan." Kredit";
        $sqlCariJurnal = "SELECT * FROM jurnal WHERE tanggal = '".$tanggal."' AND keteranganTransaksi = '".$keterangan."'";
        $resultCariJurnal = mysqli_query($link, $sqlCariJurnal);
        if(mysqli_num_rows($resultCariJurnal)==0){
            $sqlJurnal = "INSERT INTO `jurnal` (`tanggal`, `keteranganTransaksi`, `Periode_idPeriode`) VALUES ('".$tanggal."', '".$keterangan."', '".$idPeriode."')";
            $resultJurnal = mysqli_query($link,$sqlJurnal);
            if(!$resultJurnal){
                die ("SQL ERROR : ".$sqlJurnal);
            }
        }
        //DB jurnal_has_akun
        $resultCariJurnal = mysqli_query($link, $sqlCariJurnal);
        while($row = mysqli_fetch_object($resultCariJurnal)){
            $idJurnal = $row->idJurnal;
        }
        ////Pengeluaran 500
        $sqlJurnalPendapatan = "INSERT INTO `jurnal_has_akun` (`Jurnal_idJurnal`, `Akun_noAkun`, `urutan`, `nominalDebet`, `nominalKredit`) VALUES (".$idJurnal.",".$noAkun.",1,".$harga.", 0)";
        $resultJurnalPendapatan = mysqli_query($link, $sqlJurnalPendapatan);
        if(!$resultJurnalPendapatan)
            die("SQL ERROR :".$sqlJurnalPendapatan);
        ////Kas & Bank 100
        if($jenisBayar=="T")
            $noAkun = 101;
        else if($jenisBayar == "TR")
            $noAkun = 102;
        else if($jenisBayar == "K")
            $noAkun = 103;
        $sqlJurnalKnB = "INSERT INTO `jurnal_has_akun` (`Jurnal_idJurnal`, `Akun_noAkun`, `urutan`, `nominalDebet`, `nominalKredit`) VALUES (".$idJurnal.",".$noAkun.",1,".$hargaBarangXJumlah.",0)";
        $resultJurnalKnB = mysqli_query($link, $sqlJurnalKnB);
        if(!$resultJurnalKnB)
            die("SQL ERROR :".$sqlJurnalKnB);
        break;

    case "insertNotaJual": //tambah_penjualan.php
        $noNota = $_GET['noNota'];
        $tanggal = $_GET['tanggal'];
        $jenisBayar = $_GET['jenisBayar'];
        $totalHarga = str_replace(",", "", $_GET['totalHarga']);
        $totalHarga = (int)$totalHarga;
        $sql = "SELECT * FROM karyawan WHERE username = '".$_COOKIE['idU']."'";
        $result = mysqli_query($link, $sql);
        while($row = mysqli_fetch_object($result))
            $operator = $row->idKaryawan;
        if(isset($_GET['kapster'])){
            if($_GET['kapster']!= NULL)
                $kapster = $_GET['kapster'];
            else
                $kapster = 1;
        }
        else
            $kapster = 1;
        if(isset($_GET['hadiah'])){
            if($_GET['hadiah']!=NULL)
                $hadiah = $_GET['hadiah'];
            else
                $hadiah = 1;
        }
        else
            $hadiah = 1;
        if(isset($_GET['pelanggan'])){
            $sql = "SELECT * FROM customer WHERE noTelp = '".$_GET['pelanggan']."'";
            $resultIdPelanggan = mysqli_query($link, $sql);
            while($row = mysqli_fetch_object($resultIdPelanggan)){
                $idPelanggan = $row->idCustomer;
            }
        }
        else
            $idPelanggan = 1;
        if(isset($_GET['bank']))
            $bank = $_GET['bank'];
        else
            $bank = 1;
        $sql = "INSERT INTO `notajual` (`nominalBayar`, `noNota`, `tanggal`, `caraBayar`, `Karyawan_idKaryawan`, `Karyawan_idKaryawan1`, `Hadiah_idHadiah`, `Customer_idCustomer`, `Bank_idBank`) VALUES (".$totalHarga.", '".$noNota."', '".$tanggal."', '".$jenisBayar."', ".$operator.", ".$kapster.", ".$hadiah.", 1, ".$bank.")";
        $result = mysqli_query($link,$sql);
        if(!$result){
            die ("SQL ERROR : ".$sql);
        }
        break;  

    case "insertNotaJualBarang": //tambah_penjualan.php
        $noNota = $_GET['noNota'];
        $tanggal = $_GET['tanggal'];
        $jenisBayar = $_GET['jenisBayar'];
        $kodeBarang = $_GET['kodeBarang'];
        $jumlah = $_GET['jumlah'];
        $harga = str_replace(",", "", $_GET['harga']);
        $hargaBarangXJumlah = (int)$harga;
        $harga = (int)$harga/$jumlah; 
        $sql = "INSERT INTO `notajual_has_barang` (`NotaJual_noNota`, `Barang_kodeBarang`, `harga`, `jumlah`) VALUES ('".$noNota."', '".$kodeBarang."', '".$harga."', '".$jumlah."');";
        $result = mysqli_query($link,$sql);
        if(!$result){
            die ("SQL ERROR : ".$sql);
        }
        //update stok
        $sqlCekStok = "SELECT * FROM barang WHERE kodeBarang = ".$kodeBarang;
        $resultCekStok = mysqli_query($link, $sqlCekStok);
        while($row = mysqli_fetch_object($resultCekStok)){
            if($row->Jenis_idJenis==1){
                $sqlUpdateStok = "UPDATE `barang` SET `stok`=(stok-".$jumlah.") WHERE kodeBarang = ".$kodeBarang;
                $resultUpdateStok = mysqli_query($link, $sqlUpdateStok);
                if(($row->stok-$jumlah)<$row->minStok){
                    if(isset($_SESSION['notifStok']))
                        $_SESSION['notifStok'] = $_SESSION['notifStok'].", ".$row->namaBarang;
                    else
                        $_SESSION['notifStok'] = $row->namaBarang;
                }
            }
        }       
        //JURNAL
        while($row = mysqli_fetch_object($resultPeriodeAktif))
            $idPeriode = $row->idPeriode;
        $sql = "SELECT * FROM jenis WHERE idJenis IN (SELECT Jenis_idJenis FROM barang WHERE kodeBarang = ".$kodeBarang.")";
        $resultJenis = mysqli_query($link, $sql);
        while($row = mysqli_fetch_object($resultJenis)){
            $keterangan = "Transaksi Penjualan ".$row->nama;
            if($row->idJenis==1)
                $noAkun = 401;
            else if($row->idJenis==2)
                $noAkun = 402;
        }
        if($jenisBayar=="T")
            $keterangan =  $keterangan." Tunai";
        else if($jenisBayar == "TR")
            $keterangan =  $keterangan." Transfer ";
        $sqlCariJurnal = "SELECT * FROM jurnal WHERE tanggal = '".$tanggal."' AND keteranganTransaksi = '".$keterangan."'";
        $resultCariJurnal = mysqli_query($link, $sqlCariJurnal);
        if(mysqli_num_rows($resultCariJurnal)==0){
            $sqlJurnal = "INSERT INTO `jurnal` (`tanggal`, `keteranganTransaksi`, `Periode_idPeriode`) VALUES ('".$tanggal."', '".$keterangan."', '".$idPeriode."')";
            $resultJurnal = mysqli_query($link,$sqlJurnal);
            if(!$resultJurnal){
                die ("SQL ERROR : ".$sqlJurnal);
            }
        }
        //DB jurnal_has_akun
        $resultCariJurnal = mysqli_query($link, $sqlCariJurnal);
        while($row = mysqli_fetch_object($resultCariJurnal)){
            $idJurnal = $row->idJurnal;
        }
        ////Pendapatan 400
        $sqlJurnalPendapatan = "INSERT INTO `jurnal_has_akun` (`Jurnal_idJurnal`, `Akun_noAkun`, `urutan`, `nominalDebet`, `nominalKredit`) VALUES (".$idJurnal.",".$noAkun.",2,0,".$hargaBarangXJumlah.")";
        $resultJurnalPendapatan = mysqli_query($link, $sqlJurnalPendapatan);
        if(!$resultJurnalPendapatan)
            die("SQL ERROR :".$sqlJurnalPendapatan);
        ////Kas & Bank 100
        if($jenisBayar=="T")
            $noAkun = 101;
        else if($jenisBayar == "TR")
            $noAkun = 102;
        $sqlJurnalKnB = "INSERT INTO `jurnal_has_akun` (`Jurnal_idJurnal`, `Akun_noAkun`, `urutan`, `nominalDebet`, `nominalKredit`) VALUES (".$idJurnal.",".$noAkun.",1,".$hargaBarangXJumlah.",0)";
        $resultJurnalKnB = mysqli_query($link, $sqlJurnalKnB);
        if(!$resultJurnalKnB)
            die("SQL ERROR :".$sqlJurnalKnB);
        break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    

    

    case "insertNotaPelunasanPembelian": //nota_pembelian.php
        $nomorNota = $_POST['nomorNotaPelunasan'];
        $jenisBayar = $_POST['jenisBayar'];        
        $hargaNormal = $_POST['getHargaNormal'];
        $diskon = $_POST['getDiskon'];
        $totalHarga = $hargaNormal*(100-$diskon)/100;
        $tanggal = $_POST['tanggalInputNota'];
        $notaBeliNoNota = $_POST['nomorNotaPembelian'];

        if(isset($_POST['getBankId']) && isset($_POST['nomorRekening']) && isset($_POST['namaPemilikRekening'])){
            //SQL Transfer 
            $bankId = $_POST['getBankId'];
            $noRekening = $_POST['nomorRekening'];
            $pemilikRekening = $_POST['namaPemilikRekening'];
            $sql = 
            "INSERT INTO notabayarbeli (noNota, tanggal, nominalSeharusnya, DiskonPelunasan, nominalBayar, caraBayar, NotaBeli_noNota, Bank_idBank, noRekening, namaPemilikRekening, nomorCek) VALUES ('". $nomorNota ."','". $tanggal ."',". $hargaNormal .",". $diskon .",". $totalHarga .",'". $jenisBayar ."','". $notaBeliNoNota ."','". $bankId ."','". $noRekening ."','". $pemilikRekening ."',NULL);";
        }
        elseif(isset($_POST['nomorCek'])){
            //SQL CEK
            $nomorCek = $_POST['nomorCek'];
            $sql = 
            "INSERT INTO notabayarbeli (noNota, tanggal, nominalSeharusnya, DiskonPelunasan, nominalBayar, caraBayar, NotaBeli_noNota, Bank_idBank, noRekening, namaPemilikRekening, nomorCek) VALUES ('". $nomorNota ."','". $tanggal ."',". $hargaNormal .",". $diskon .",". $totalHarga .",'". $jenisBayar ."','". $notaBeliNoNota ."',NULL,NULL,NULL,". $nomorCek .");";
        }
        else{
            //sql Tunai
            $sql = 
            "INSERT INTO notabayarbeli (noNota, tanggal, nominalSeharusnya, DiskonPelunasan, nominalBayar, caraBayar, NotaBeli_noNota, Bank_idBank, noRekening, namaPemilikRekening, nomorCek) VALUES ('". $nomorNota ."','". $tanggal ."',". $hargaNormal .",". $diskon .",". $totalHarga .",'". $jenisBayar ."','". $notaBeliNoNota ."',NULL,NULL,NULL,NULL);";
        }
        $result = mysqli_query($link, $sql);
        if (!$result) {
            die("SQL ERROR.".$sql);
            header("Location: /gentlemen/nota_pembelian.php");
        }
        header("Location: /gentlemen/nota_pembelian.php");
        break;

    case "insertNotaPelunasanPenjualan": //nota_penjualan.php
        $nomorNota = $_POST['nomorNotaPelunasan'];
        $jenisBayar = $_POST['jenisBayar'];        
        $hargaNormal = $_POST['getHargaNormal'];
        $diskon = $_POST['getDiskon'];
        $totalHarga = $hargaNormal*(100-$diskon)/100;
        $tanggal = $_POST['tanggalInputNota'];
        $notaJualNoNota = $_POST['nomorNotaPenjualan'];

        if(isset($_POST['getBankId']) && isset($_POST['nomorRekening']) && isset($_POST['namaPemilikRekening'])){
            //SQL Transfer 
            $bankId = $_POST['getBankId'];
            $noRekening = $_POST['nomorRekening'];
            $pemilikRekening = $_POST['namaPemilikRekening'];
            $sql = 
            "INSERT INTO notabayarjual (noNota, tanggal, nominalSeharusnya, DiskonPelunasan, nominalBayar, caraBayar, NotaJual_noNota, Bank_idBank, noRekening, namaPemilikRekening, nomorCek) VALUES ('". $nomorNota ."','". $tanggal ."',". $hargaNormal .",". $diskon .",". $totalHarga .",'". $jenisBayar ."','". $notaJualNoNota ."','". $bankId ."','". $noRekening ."','". $pemilikRekening ."',NULL);";
        }
        elseif(isset($_POST['nomorCek'])){
            //SQL CEK
            $nomorCek = $_POST['nomorCek'];
            $sql = 
            "INSERT INTO notabayarjual (noNota, tanggal, nominalSeharusnya, DiskonPelunasan, nominalBayar, caraBayar, NotaJual_noNota, Bank_idBank, noRekening, namaPemilikRekening, nomorCek) VALUES ('". $nomorNota ."','". $tanggal ."',". $hargaNormal .",". $diskon .",". $totalHarga .",'". $jenisBayar ."','". $notaJualNoNota ."',NULL,NULL,NULL,". $nomorCek .");";
        }

        else{
            //sql Tunai
            $sql = 
            "INSERT INTO notabayarjual (noNota, tanggal, nominalSeharusnya, DiskonPelunasan, nominalBayar, caraBayar, NotaJual_noNota, Bank_idBank, noRekening, namaPemilikRekening, nomorCek) VALUES ('". $nomorNota ."','". $tanggal ."',". $hargaNormal .",". $diskon .",". $totalHarga .",'". $jenisBayar ."','". $notaJualNoNota ."',NULL,NULL,NULL,NULL);";
        }
        $result = mysqli_query($link, $sql);
        if (!$result) {
            die("SQL ERROR.".$sql);
            header("Location: /gentlemen/nota_penjualan.php");
        }
        header("Location: /gentlemen/nota_penjualan.php");
        break;    	
    
    default:
        die("UNKNOWN");

    }
?>