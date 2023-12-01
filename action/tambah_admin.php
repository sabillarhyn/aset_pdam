<?
    include '../koneksi/koneksi.php';
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $bagian = $_POST['bagian'];

    $sql = "INSERT INTO admin (nama_admin, username, password, level, bagian) VALUES ('$nama_admin', '$username', '$password', '$level', '$bagian')";
    if (mysqli_query($koneksi, $sql)) {
        echo '
        <script>
        alert("Data Admin BERHASIL ditambahkan !");
        document.location.href = "../admin.php";
        </script>';
    } else {
        echo '<script>
				alert("Data Admin GAGAL ditambahkan!");
				document.location.href = "../admin.php;
                </script>
                
                ';
    }
$koneksi->close();

?>