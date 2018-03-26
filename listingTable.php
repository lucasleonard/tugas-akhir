<?php
    include 'sql.php';
    if(isset($_POST['periodeId']))
    {
        $urutan = 1;
        while($row = mysqli_fetch_object($daftarakun)) { 
            if($row->Periode_idPeriode == $_POST['periodeId'])
            {
                echo  $urutan.';'.
                $row->Akun_noAkun.';'.
                $row->nama.';'.
                number_format($row->saldoAwal).';';
                if($row->saldoNormal==1)
                  echo 'Debit';
                else 
                  echo 'Kredit'; 
                echo '=';
                $urutan = $urutan +1;
            }
        }
    }
?>