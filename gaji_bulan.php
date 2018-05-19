<?php
    include 'sql.php';
        
    if($_POST['bulan'] !=null && $_POST['tahun']!=null)
    {
        while($row = mysqli_fetch_object($resultKaryawan)){
            $totalKomisi = 0;
            $gajiPokok = 0;
            $totalGaji = 0;

            //cari gaji 1
            $sqlGajiPokok = "SELECT * FROM karyawan WHERE idKaryawan=".$row->idKaryawan;
            $resultGajiPokok = mysqli_query($link, $sqlGajiPokok);
            while($rowGaji = mysqli_fetch_object($resultGajiPokok)){
                $gajiPokok = $rowGaji->gajiPokok;
            }

            //komisi = nota jual ambil id -> id cari di notajual_has_barang -> cari dst
            $sqlKomisi = "SELECT sqq.jumlah, bk.bonus FROM 
                            (SELECT sq.idKaryawan as idKaryawan,jumlah, Barang_kodeBarang FROM 
                                (SELECT Karyawan_idKaryawan1 as idKaryawan,noNota FROM `notajual` 
                                WHERE Karyawan_idKaryawan1 = ".$row->idKaryawan." AND MONTH(tanggal) = ".$_POST['bulan']." AND YEAR(tanggal) = ".$_POST['tahun'].") as sq 
                                INNER JOIN notajual_has_barang as nb on nb.NotaJual_noNota=sq.noNota) as sqq, 
                                barang_has_karyawan as bk WHERE bk.Karyawan_idKaryawan=sqq.idKaryawan AND bk.Barang_kodeBarang=sqq.Barang_KodeBarang";
            $resultKomisi = mysqli_query($link, $sqlKomisi);
            while($rowKomisi = mysqli_fetch_object($resultKomisi)){
                $totalKomisi += $rowKomisi->bonus*$rowKomisi->jumlah;
            }
            $totalGaji = $totalKomisi + $gajiPokok;
            echo $row->nama."^";
            echo $gajiPokok."^";
            echo $totalKomisi."^";
            echo $totalGaji."@";
        }
    }
?>