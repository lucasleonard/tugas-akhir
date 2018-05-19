<?php
    include 'sql.php';
    if(isset($_POST['kodeBarang']))
    {
        while($row = mysqli_fetch_object($resultBarang)) { 
            if($row->kodeBarang == $_POST['kodeBarang'])
            {
                echo  $row->hargaJual;
            }
        }
    }
    else{
        echo 0;
    }
?>