<?php
  require './db.php';

  //Menampilkan Laporan Jurnal
  $sql = "SELECT * FROM vlaporanjurnal";
  $laporanJurnal = mysqli_query($link, $sql);
  if(!$laporanJurnal){
    echo "SQL ERROR: ". $sql;
  }

  //Menampilkan Buku Besar
  $sql = "SELECT * FROM vBukuBesar ORDER BY Akun_noAkun ASC, Tanggal ASC, urutan ASC";
  $laporanBukuBesar = mysqli_query($link, $sql);
  if(!$laporanBukuBesar){
    echo "SQL ERROR: ". $sql;
  }

  //Menampilkan Laporan Laba Rugi
  //Menampilkan isi keseluruhan
  $sql = "SELECT * FROM vLabaRugi";
  $laporanLabaRugi = mysqli_query($link, $sql);
  if(!$laporanLabaRugi){
    echo "SQL ERROR: ". $sql;
  }
  //Menampilkan Pendapatan
  $sql = "SELECT * FROM vLabaRugi WHERE noAkun LIKE '4%'";
  $pendapatanLabaRugi = mysqli_query($link, $sql);
  if(!$pendapatanLabaRugi){
    echo "SQL ERROR: ". $sql;
  }
  //Menghitung Total Pendapatan
  $sql = "SELECT SUM(V.SaldoAkhir*A.SaldoNormal)*-1 AS TotalPendapatan FROM vlabarugi V INNER JOIN akun A ON V.NoAkun = A.NoAkun WHERE V.NoAkun LIKE '4%'";
  $totalPendapatanLabaRugi = mysqli_query($link, $sql);
  if(!$totalPendapatanLabaRugi){
    echo "SQL ERROR: ". $sql;
  }
  //Menampilkan Biaya
  $sql = "SELECT * FROM vLabaRugi WHERE noAkun LIKE '5%'";
  $biayaLabaRugi = mysqli_query($link, $sql);
  if(!$biayaLabaRugi){
    echo "SQL ERROR: ". $sql;
  }
  //Menghitung Total Biaya
  $sql = "SELECT SUM(V.SaldoAkhir*A.SaldoNormal) AS TotalBiaya FROM vlabarugi V INNER JOIN akun A ON V.NoAkun = A.NoAkun WHERE V.NoAkun LIKE '5%'";
  $totalBiayaLabaRugi = mysqli_query($link, $sql);
  if(!$totalBiayaLabaRugi){
    echo "SQL ERROR: ". $sql;
  }

  //Menampilkan Laporan Perubahan Ekuitas
  //Menampilkan isi keseluruhan
  $sql = "SELECT * FROM vPerubahanEkuitas";
  $laporanPerubahanEkuitas = mysqli_query($link, $sql);
  if(!$laporanPerubahanEkuitas){
    echo "SQL ERROR: ". $sql;
  }
  //Menghitung Modal Akhir dari Perubahan Ekuitas
  $sql = "SELECT SUM(V.SaldoAkhir*A.SaldoNormal) *-1 AS ModalAkhirPemilik FROM vperubahanekuitas V INNER JOIN akun A ON V.NoAkun = A.NoAkun";
  $modalAkhirEkuitas = mysqli_query($link, $sql);
  if(!$modalAkhirEkuitas){
    echo "SQL ERROR: ". $sql;
  }

  //Menampilkan Laporan Neraca
  //Menampilkan isi keseluruhan
  $sql = "SELECT * FROM vLaporanNeraca";
  $laporanNeraca = mysqli_query($link, $sql);
  if(!$laporanNeraca){
    echo "SQL ERROR: ". $sql;
  }
  //Menampilkan Aktiva
  $sql = "SELECT * FROM vLaporanNeraca WHERE noAkun LIKE '1%'";
  $listAktiva = mysqli_query($link, $sql);
  if(!$listAktiva){
    echo "SQL ERROR: ". $sql;
  }
  //Menghitung Total Aktiva
  $sql = "SELECT SUM(V.SaldoAkhir*A.SaldoNormal) AS TotalAktiva FROM vlaporanneraca V INNER JOIN akun A ON V.NoAkun = A.NoAkun WHERE V.NoAkun LIKE '1%'";
  $totalAktiva = mysqli_query($link, $sql);
  if(!$totalAktiva){
    echo "SQL ERROR: ". $sql;
  }
  //Menampilkan Passiva
  $sql = "SELECT * FROM vLaporanNeraca WHERE noAkun LIKE '2%'";
  $listPassiva = mysqli_query($link, $sql);
  if(!$listPassiva){
    echo "SQL ERROR: ". $sql;
  }
  //Menghitung Total Passiva
  $sql = "SELECT SUM(V.SaldoAkhir*A.SaldoNormal) *-1 AS Passiva FROM vlaporanneraca V INNER JOIN akun A ON V.NoAkun = A.NoAkun WHERE V.NoAkun LIKE '2%'";
  $passivaSelect = mysqli_query($link, $sql);
  if($passivaSelect){
    $sql = "SELECT SUM(V.SaldoAkhir*A.SaldoNormal) *-1 AS ModalPassiva FROM vperubahanekuitas V INNER JOIN akun A ON V.NoAkun = A.NoAkun";
    $modalAkhirPassiva = mysqli_query($link, $sql);
    if($modalAkhirPassiva){
      $p = 0; $m = 0;
      if($row = mysqli_fetch_object($passivaSelect)) {
        $p = $row->Passiva;
      }
      if($row = mysqli_fetch_object($modalAkhirPassiva)) {
        $m = $row->ModalPassiva;
      }
      $totalPassiva = $p + $m;
    }
    else {
      echo "SQL ERROR: ". $sql;
    }
  }
  else {
    echo "SQL ERROR: ". $sql;
  }
  
?>