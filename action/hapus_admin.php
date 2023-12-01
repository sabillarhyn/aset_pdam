<?php
extract ($_POST);
extract ($_GET);
include '../koneksi/koneksi.php';
$hapus_data="DELETE FROM admin WHERE id_admin ='$id'";
$jalan_hapus=mysqli_query($koneksi, $hapus_data);

if ($jalan_hapus) {
    echo '
    <script>
    alert("Data Admin BERHASIL dihapus !");
    document.location.href = "../admin.php";
    </script>';
} else {
    echo '<script>
            alert("Data Admin GAGAL dihapus!");
            document.location.href = "../admin.php;
            </script>
            
            ';
}
$koneksi->close();
?>