<?
    include '../koneksi/koneksi.php';
    $nama_cabang = $_POST['nama_cabang'];

    $sql = "INSERT INTO cabang (nama_cabang) VALUES ('$nama_cabang')";
    if (mysqli_query($koneksi, $sql)) {
        echo '
        <script>
        alert("Data Cabang BERHASIL ditambahkan !");
        document.location.href = "../cabang_a.php";
        </script>';
    } else {
        echo '<script>
				alert("Data Cabang GAGAL ditambahkan!");
				document.location.href = "../cabang_a.php;
                </script>
                
                ';
    }
$koneksi->close();

mysqli_close($koneksi);

?>