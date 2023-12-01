<?
    include '../koneksi/koneksi.php';
    $no_dokumen = $_POST['no_dokumen'];
    $tgl_beli = $_POST['tgl_beli'];

    $sql = "INSERT INTO pengadaan (no_dokumen, tgl_beli) VALUES ('$no_dokumen', '$tgl_beli')";
    if (mysqli_query($koneksi, $sql)) {
        echo '
        <script>
        alert("Data Pengadaan BERHASIL ditambahkan !");
        document.location.href = "../pengadaan.php";
        </script>';
    } else {
        echo '<script>
				alert("Data Pengadaan GAGAL ditambahkan!");
				document.location.href = "../pengadaan.php;
                </script>
                
                ';
    }
$koneksi->close();

?>