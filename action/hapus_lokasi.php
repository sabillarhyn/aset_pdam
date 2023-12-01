<?php
extract ($_POST);
extract ($_GET);
include '../koneksi/koneksi.php';
$hapus_data="DELETE FROM lokasi WHERE id_lokasi ='$id'";
$jalan_hapus=mysqli_query($koneksi, $hapus_data);

if ($jalan_hapus) {
    echo '
    <script>
    alert("Data Lokasi BERHASIL dihapus !");
    document.location.href = "../lokasi_a.php";
    </script>';
} else {
    echo '<script>
            alert("Data Lokasi GAGAL dihapus!");
            document.location.href = "../lokasi_a.php;
            </script>
            
            ';
}
$koneksi->close();
?>