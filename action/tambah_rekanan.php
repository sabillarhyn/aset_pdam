<?
    include '../koneksi/koneksi.php';
    $nama_rekanan = $_POST['nama_rekanan'];
    $alamat_rekanan = $_POST['alamat_rekanan'];
    $nama_pimpinan = $_POST['nama_pimpinan'];
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO rekanan (nama_rekanan, alamat_rekanan, nama_pimpinan, no_hp ) VALUES ('$nama_rekanan', '$alamat_rekanan', '$nama_pimpinan', '$no_hp')";
    if (mysqli_query($koneksi, $sql)) {
        echo '
        <script>
        alert("Data rekanan BERHASIL ditambahkan !");
        document.location.href = "../rekanan.php";
        </script>';
    } else {
        echo '<script>
				alert("Data rekanan GAGAL ditambahkan!");
				document.location.href = "../rekanan.php;
                </script>
                
                ';
    }
$koneksi->close();

?>