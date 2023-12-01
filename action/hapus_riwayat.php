<?php
extract ($_POST);
extract ($_GET);
include '../koneksi/koneksi.php';
$hapus_data="DELETE FROM riwayat WHERE id_riwayat ='$id'";
$jalan_hapus=mysqli_query($koneksi, $hapus_data);

if ($jalan_hapus) {
    echo '
    <script>
    alert("Data Riwayat BERHASIL dihapus !");
    document.location.href = "../riwayat_a.php";
    </script>';
} else {
    echo '<script>
            alert("Data Riwayat GAGAL dihapus!");
            document.location.href = "../riwayat_a.php;
            </script>
            
            ';
}
$koneksi->close();
?>