<?php
extract ($_POST);
extract ($_GET);
include '../koneksi/koneksi.php';
$hapus_data="DELETE FROM pengadaan WHERE id_pengadaan ='$id'";
$jalan_hapus=mysqli_query($koneksi, $hapus_data);

if ($jalan_hapus) {
    echo '
    <script>
    alert("Data Pengadaan BERHASIL dihapus !");
    document.location.href = "../pengadaan.php";
    </script>';
} else {
    echo '<script>
            alert("Data Pengadaan GAGAL dihapus!");
            document.location.href = "../pengadaan.php;
            </script>
            
            ';
}
$koneksi->close();
?>