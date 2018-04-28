<?php
    include 'sql.php';
        
    if(isset($_POST['idKaryawan']))
    {
        $idKaryawan = $_POST['idKaryawan'];
        while($row = mysqli_fetch_object($resultBarangHasKaryawan)) { 
            if($row->Karyawan_idKaryawan == $_POST['idKaryawan'])
            {   
                $sql = "SELECT * FROM barang WHERE kodeBarang = ".$row->Barang_kodeBarang;
                $resultBarang2 = mysqli_query($link, $sql);
                while($rowBarang = mysqli_fetch_object($resultBarang2)){
                    echo $rowBarang->namaBarang.";";
                    echo number_format($row->bonus).";";
                    echo "<a href='#' class='edit' data-toggle='modal' id='tekan' ide=" . $idKaryawan . " data-target='#exampleModal'><center><i class='fa fa-eye'></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <a href='#'><i class='fa fa-edit'></i> </a>&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <a href='proses.php?cmd=hapusSupplier&i=".$idKaryawan."'><i class='fa fa-ban'></i>";
                    echo "@";
                }
            }
        }
        
    }
    else{
        echo "dsa ;"; 
        echo '=';
    }
?>