<?php
    include 'sql.php';
        
    if(isset($_POST['idKaryawan']))
    {
        $cekKomisi = 0;
        $idKaryawan = $_POST['idKaryawan'];
        while($row = mysqli_fetch_object($resultJasaSaja)){
            echo "<input type='text' id='namaBarang' name='namaBarang' value='".$row->namaBarang."' style='background:transparent;border:none;width:100%' disabled='true'/> ^";
            $sql = "SELECT * FROM barang_has_karyawan WHERE Barang_kodeBarang = ".$row->kodeBarang;
            $resultBarang2 = mysqli_query($link, $sql);
            while($rowBarang2 = mysqli_fetch_object($resultBarang2)){
                if($rowBarang2->Karyawan_idKaryawan==$idKaryawan){
                    $cekKomisi = 1;
                    echo "Rp. <input type='text' id='komisi' name='komisi' value='".$rowBarang2->bonus."' style='width:90%'/> ^";
                }
            }
            if($cekKomisi==0){
                echo "Rp. <input type='text' id='komisi' name='komisi' style='background:transparent;border:none;width:90%'/> ^";
            }
            echo "<a href='#' class='edit' data-toggle='modal' id='tekan' ide=" . $idKaryawan . " data-target='#exampleModal'><center><i class='fa fa-eye'></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                    <a href='#'><i class='fa fa-edit'></i> </a>&nbsp&nbsp&nbsp&nbsp&nbsp
                    <a href='proses.php?cmd=hapusSupplier&i=".$idKaryawan."'><i class='fa fa-ban'></i>";
            echo "@";
            $cekKomisi = 0;
        }
        /*while($row = mysqli_fetch_object($resultBarangHasKaryawan)) { 
            if($row->Karyawan_idKaryawan == $_POST['idKaryawan'])
            {   
                $sql = "SELECT * FROM barang WHERE kodeBarang = ".$row->Barang_kodeBarang;
                $resultBarang2 = mysqli_query($link, $sql);
                while($rowBarang = mysqli_fetch_object($resultBarang2)){
                    echo "<input type='text' id='namaBarang' name='namaBarang' value='".$rowBarang->namaBarang."' style='background:transparent;border:none;width:100%' disabled='true'/> #";
                    echo "Rp. <input type='text' id='komisi' name='komisi' value='".$row->bonus."' style='background:transparent;border:none;width:90%'/> #";
                    echo "<a href='#' class='edit' data-toggle='modal' id='tekan' ide=" . $idKaryawan . " data-target='#exampleModal'><center><i class='fa fa-eye'></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href='#'><i class='fa fa-edit'></i> </a>&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href='proses.php?cmd=hapusSupplier&i=".$idKaryawan."'><i class='fa fa-ban'></i>";
                    echo "@";
                }
            }
        }*/
    }
    else{
        echo "dsa #"; 
        echo '=';
    }
?>