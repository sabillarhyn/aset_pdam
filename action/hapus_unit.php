<?php
extract ($_POST);
extract ($_GET);
include '../koneksi/koneksi.php';
$hapus_data="DELETE FROM unit WHERE id_unit ='$id'";
$jalan_hapus=mysqli_query($koneksi, $hapus_data);

if ($jalan_hapus) {
    echo '
    <script>
    alert("Data Unit BERHASIL dihapus !");
    document.location.href = "../unit_a.php";
    </script>';
} else {
    echo '<script>
            alert("Data Unit GAGAL dihapus!");
            document.location.href = "../unit_a.php;
            </script>
            
            ';
}
$koneksi->close();
?>