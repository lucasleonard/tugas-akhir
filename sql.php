<?php
  require './db.php';


  // Mencari Jenis Produk
  $sql = "SELECT * FROM jenis";
  $resultJenis = mysqli_query($link, $sql);
  if(!$resultJenis){
    echo "SQL ERROR: ". $sql;
  }

  // Mencari Produk
  $sql = "SELECT * FROM barang";
  $resultBarang = mysqli_query($link, $sql);
  if(!$resultBarang){
    echo "SQL ERROR: ". $sql;
  }

  // Mencari Produk -> Barang
  $sql = "SELECT * FROM barang WHERE Jenis_idJenis = 1";
  $resultBarangSaja = mysqli_query($link, $sql);
  if(!$resultBarang){
    echo "SQL ERROR: ". $sql;
  }

  // Mencari Supplier
  $sql = "SELECT * FROM supplier";
  $resultSupplier = mysqli_query($link, $sql);
  if(!$resultSupplier){
    echo "SQL ERROR: ". $sql;
  }

  // Mencari Karyawan aktif
  $sql = "SELECT * FROM karyawan WHERE aktif=1";
  $resultKaryawan = mysqli_query($link, $sql);
  if(!$resultKaryawan){
    echo "SQL ERROR: ". $sql;
  }

  // Mencari Komisi Karyawan aktif
  $sql = "SELECT * FROM barang_has_karyawan";
  $resultBarangHasKaryawan = mysqli_query($link, $sql);
  if(!$resultBarangHasKaryawan){
    echo "SQL ERROR: ". $sql;
  }

  //Mencari data di Database "notabeli" untuk "nota_pembelian.php"
  $sql = "SELECT * FROM notabeli WHERE caraBayar = 'K' AND lunas = 0 GROUP BY noNota";
  $notabeli_kredit = mysqli_query($link, $sql);
  if(!$notabeli_kredit){
    echo "SQL ERROR: ". $sql;
  }

  // Mencari Kumpulan Periode
  $sql = "SELECT * FROM periode";
  $periode = mysqli_query($link, $sql);
  if(!$periode){
    echo "SQL ERROR: ". $sql;
  }

  // Mencari Daftar Akun berdasarkan Periode
  $sql = "SELECT pha.*, a.nama, a.saldoNormal FROM periode_has_akun pha, periode p, akun a WHERE pha.Periode_idPeriode = p.idPeriode and a.noAkun = pha.Akun_noAkun and a.noAkun <> '000'";
  $daftarakun = mysqli_query($link, $sql);
  if(!$daftarakun){
    echo "SQL ERROR: ". $sql;
  }

  //Mengecek Saldo Awal Aset
  $sql = "SELECT SUM(P.SaldoAwal*A.SaldoNormal) AS TotalAset
  FROM periode_has_akun P INNER JOIN akun A ON P.Akun_NoAkun = A.NoAkun 
  WHERE P.Akun_NoAkun LIKE '1%'";
  $saldoAwalAset = mysqli_query($link, $sql);
  if(!$saldoAwalAset){
    echo "SQL ERROR: ". $sql;
  }

  //Mengecek Saldo Awal Kewajiban + Ekuitas
  $sql = "SELECT SUM(P.SaldoAwal*A.SaldoNormal)*-1 AS TotalKewajibanEkuitas
  FROM periode_has_akun P INNER JOIN akun A ON P.Akun_NoAkun = A.NoAkun 
  WHERE P.Akun_NoAkun LIKE '2%' OR P.Akun_NoAkun LIKE '3%'";
  $saldoAwalKewajibanEkuitas = mysqli_query($link, $sql);
  if(!$saldoAwalKewajibanEkuitas){
    echo "SQL ERROR: ". $sql;
  }


  //Ambil Data di Database notabeli
  $sql = "SELECT * FROM notabeli";
  $notabeli = mysqli_query($link, $sql);
  if(!$notabeli){
    echo "SQL ERROR: ". $sql;
  }

  //Ambil Data di Database notajual
  $sql = "SELECT * FROM notajual";
  $notajual = mysqli_query($link, $sql);
  if(!$notajual){
    echo "SQL ERROR: ". $sql;
  }

  //Ambil Data di Database bank
  $sql = "SELECT * FROM bank";
  $bank = mysqli_query($link, $sql);
  if(!$bank){
    echo "SQL ERROR: ". $sql;
  }

  //Cek Nomor Nota Pembelian
  $cekNomorNota = "SELECT COUNT(*) as jumlah FROM notabeli WHERE tanggal = '".date("Y-m-d")."'";
  $resultCekNomorNota = mysqli_query($link, $cekNomorNota);

  //Cek Nomor Nota Penjualan
  $cekNomorNota = "SELECT COUNT(*) as jumlah FROM notajual WHERE tanggal = '".date("Y-m-d")."'";
  $resultCekNomorNotaJual = mysqli_query($link, $cekNomorNota);

?>