<?php

$id = $_GET['id'];

include '../koneksi/koneksi.php';

$hapus_data = "DELETE FROM aset WHERE id_aset = '$id'";
$hapus_riwayat = "DELETE FROM riwayat WHERE id_aset = '$id'";


mysqli_query($koneksi, $hapus_data);
mysqli_query($koneksi, $hapus_riwayat);

header("Location: ../aset_a.php");

$koneksi->close();
exit;
?>