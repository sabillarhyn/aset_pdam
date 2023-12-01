<?
    include '../koneksi/koneksi.php';
    $nama_unit = $_POST['nama_unit'];
    $id_cabang = $_POST['id_cabang'];

    $sql = "INSERT INTO unit (nama_unit, id_cabang) VALUES ('$nama_unit', '$id_cabang')";
    if (mysqli_query($koneksi, $sql)) {
        echo '
        <script>
        alert("Data Unit BERHASIL ditambahkan !");
        document.location.href = "../unit_a.php";
        </script>';
    } else {
        echo '<script>
				alert("Data Unit GAGAL ditambahkan!");
				document.location.href = "../unit_a.php;
                </script>
                
                ';
    }
$koneksi->close();

// mysqli_close($koneksi);

?>