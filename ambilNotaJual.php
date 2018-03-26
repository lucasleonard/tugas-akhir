<?php
    include 'sql.php';
    if(isset($_POST['noNota'])) {
        $noNota = $_POST['noNota'];
        $sql = "SELECT nb.DiskonPelunasan AS id, SUM((n.harga*n.jumlah) * (100 - nb.diskonlangsung) / 100) AS total FROM notabeli_has_barang n, notabeli nb WHERE n.NotaBeli_noNota = nb.noNota AND n.NotaBeli_noNota = '" . $noNota . "' GROUP BY n.NotaBeli_noNota";
        $result = mysqli_query($link,$sql);
        if($row = mysqli_fetch_object($result)){
            $total = 1;
            $diskon = 1;
            if(isset($row->id))
                $diskon = $row->id;
            if(isset($row->total))
                $total = $row->total;
            echo $diskon . ";" . $total;
        }
    }
?>