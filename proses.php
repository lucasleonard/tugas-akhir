<?php
session_start();
require './db.php';
$cmd = $_GET['cmd'];

switch ($cmd) {
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

    case "insertHadiah": //tambah_karyawan.php
        $namaHadiah = $_POST['namaHadiah'];
        $jumlahPoin = $_POST['jumlahPoin'];
        $sql = "INSERT INTO `hadiah`(`nama`, `jumlah`, `aktif`) VALUES ('".$namaHadiah."', ".$jumlahPoin.", 1)";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            header("Location: /gentlemen/tambah_hadiah.php");
        }
        $_SESSION['notif'] = "sukses";
        header("Location: tambah_hadiah.php");
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

    case "insertSupplier": //tambah_supplier.php
        $namaSupplier = $_GET['namaSupplier'];
        $alamatSupplier = $_GET['alamatSupplier'];
        $nomorTelepon = $_GET['nomorTelepon'];
        $sql = "INSERT INTO `supplier`(`nama`, `noTelp`, `alamat`, `aktif`) VALUES ('".$namaSupplier."', '".$nomorTelepon."', '".$alamatSupplier."', 1 )";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            die("SQL ERROR.".$sql);
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
        $sql = "INSERT INTO `barang`(`namaBarang`, `hargaJual`, `minStok`, `Jenis_idJenis`) VALUES ('".$namaProduk."', ".$hargaJual.", ".$minStokProduk.", ".$jenisProduk.")";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            $_SESSION['notif'] = "error";
            die("SQL ERROR.".$sql);
            header("Location: /gentlemen/tambah_produk.php");
        }
        $_SESSION['notif'] = "sukses";
        header("Location: /gentlemen/tambah_produk.php");
        break;

    case "insertNotaJual": //tambah_penjualan.php
        $noNota = $_GET['noNota'];
        $idPelanggan = $_GET['pelanggan'];
        $tanggal = $_GET['tanggal'];
        $diskonPelunasan = $_GET['diskonPelunasan'];
        $tanggalBatasDiskon = $_GET['tanggalBatasDiskon'];
        $biayaKirim = $_GET['biayaKirim'];
        $dibayarOleh = $_GET['dibayarOleh'];
        $sql = "INSERT INTO `notajual` (`noNota`, `tanggal`, `DiskonPelunasan`, `tanggalBatasDiskon`, `biayaKirim`, `dibayarOleh`, `Costumer_idCostumer`) VALUES ('".$noNota."', '".$tanggal."', '".$diskonPelunasan."', '".$tanggalBatasDiskon."', '".$biayaKirim."', '".$dibayarOleh."','".$idPelanggan."');";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "LOL";
        }
        break;  

    case "insertNotaJualBarang": //tambah_penjualan.php
        $noNota = $_GET['noNota'];
        $kodeBarang = $_GET['kodeBarang'];
        $jumlah = $_GET['jumlah'];
        $harga = $_GET['harga'];
        $sql = "INSERT INTO `notajual_has_barang` (`NotaJual_noNota`, `Barang_kodeBarang`, `harga`, `jumlah`) VALUES ('".$noNota."', '".$kodeBarang."', '".$harga."', '".$jumlah."');";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "LOL";
        }
        break;

    case "insertNotaBeli": //tambah_pembelian.php
        $noNota = $_GET['noNota'];
        $tanggal = $_GET['tanggal'];
        $caraBayar = $_GET['jenisBayar'];
        $statusKirim = $_GET['statusKirim'];
        $diskonPelunasan = $_GET['diskonPelunasan'];
        $diskonLangsung = $_GET['diskonLangsung'];
        $idSupplier = $_GET['idSupplier'];
        $tanggalBatasDiskon = $_GET['tanggalBatasDiskon'];
        $biayaKirim = $_GET['biayaKirim'];
        $dibayarOleh = $_GET['dibayarOleh'];
        $tanggalJatuhTempo = NULL;
        $nomorCek = NULL;
        $namaPemilikRekening = NULL;
        $nomorRekening = NULL;
        $idBank = NULL;
        if(isset($_GET['tanggalJatuhTempo'])){
            $tanggalJatuhTempo = $_GET['tanggalJatuhTempo'];
        }
        if(isset($_GET['nomorCek'])){
            $nomorCek = $_GET['nomorCek'];
        }
        if(isset($_GET['namaPemilikRekening'])){
            $namaPemilikRekening = $_GET['namaPemilikRekening'];
        }
        if(isset($_GET['nomorRekening'])){
            $nomorRekening = $_GET['nomorRekening'];
        }
        if(isset($_GET['idBank'])){
            $idBank = $_GET['idBank'];
        }
                
        
        $sql = "INSERT INTO `notabeli`(`noNota`, `tanggal`, `caraBayar`, `StatusKirim`, `tanggalJatuhTempo`, `diskonLangsung`, `DiskonPelunasan`, `tanggalBatasDiskon`, `biayaKirim`, `dibayarOleh`, `Supplier_idSupplier`, `lunas`, `jenisPengiriman`, `caraBayarPengiriman`)

            VALUES ('".$noNota."', '".$tanggal."', '".$caraBayar."', '".$statusKirim."', '".$tanggalJatuhTempo."', '".$diskonLangsung."', '".$diskonPelunasan."', '".$tanggalBatasDiskon."', '".$biayaKirim."', '".$dibayarOleh."','".$idSupplier."', 0, 0, 0);";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "LOL";
        }
    	break;

    case "insertNotaBeliBarang": //tambah_pembelian.php
        $noNota = $_GET['noNota'];
        $kodeBarang = $_GET['kodeBarang'];
        $jumlah = $_GET['jumlah'];
        $harga = $_GET['harga'];
        $sql = "INSERT INTO `notabeli_has_barang` (`NotaBeli_noNota`, `Barang_kodeBarang`, `harga`, `jumlah`) VALUES ('".$noNota."', '".$kodeBarang."', '".$harga."', '".$jumlah."');";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "LOL";
        }
        break;

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


    case "insertNotaPelunasanPenjualan": //nota_pembelian.php
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