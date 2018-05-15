<?php
  session_start();
  include 'sql.php';

	// Mengubah Komisi Karyawan aktif
	$sql = $db->prepare("UPDATE barang_has_karyawan SET bonus = ? WHERE Karyawan_idKaryawan = ?");
	//$resultUpdateKomisi = mysqli_query($link, $sql);
	
    foreach ($_POST('table'] as $row) {
        $sql->execute($row); // the columns are passed to the prepared statement.
    }
    // All went well: commit the changes.
    $db->commit();
    echo "Table saved successfully";
?>