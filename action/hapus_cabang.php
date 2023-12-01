<?php
extract ($_POST);
extract ($_GET);
include '../koneksi/koneksi.php';
$hapus_data="DELETE FROM cabang WHERE id_cabang ='$id'";
$jalan_hapus=mysqli_query($koneksi, $hapus_data);

if ($jalan_hapus) {
    echo '
    <script>
    alert("Data Cabang BERHASIL dihapus !");
    document.location.href = "../cabang_a.php";
    </script>';
} else {
    echo '<script>
            alert("Data Cabang GAGAL dihapus!");
            document.location.href = "../cabang_a.php;
            </script>
            
            ';
}
$koneksi->close();
?>