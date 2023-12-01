<?php
extract ($_POST);
extract ($_GET);
include '../koneksi/koneksi.php';
$hapus_data="DELETE FROM rekanan WHERE id_rekanan ='$id'";
$jalan_hapus=mysqli_query($koneksi, $hapus_data);

if ($jalan_hapus) {
    echo '
    <script>
    alert("Data Rekanan BERHASIL dihapus !");
    document.location.href = "../rekanan.php";
    </script>';
} else {
    echo '<script>
            alert("Data Rekanan GAGAL dihapus!");
            document.location.href = "../rekanan.php;
            </script>
            
            ';
}
$koneksi->close();
?>