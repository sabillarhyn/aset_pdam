<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Aset PDAM</title>
    <link href="asset/pdam-logo.png" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">

    <!--Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body class="bgform">

<?
        require '../koneksi/koneksi.php';
        $id_rekanan = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM rekanan WHERE id_rekanan='$id_rekanan'");
        $datarekanan = mysqli_fetch_assoc($result);
        $nama_rekanan = $datarekanan['nama_rekanan'];
        $alamat_rekanan = $datarekanan['alamat_rekanan'];
        $nama_pimpinan = $datarekanan['nama_pimpinan'];
        $no_hp = $datarekanan['no_hp'];
?>

        <div class="form-add">
            <div class="form-content">
                <a href="../rekanan.php"><i class='bx bx-x-circle' title="kembali"></i></a>
                <p>Edit Rekanan</p>
                <hr>
                <br>
                    <div class="form-input" >
                    <form action="" method="post">
                    <br>
                    <label for="id_rekanan">ID Rekanan</label><br>
                    <input type="text" name="id_rekanan" readonly value="<?php echo $datarekanan['id_rekanan']; ?>">
                    <br>
                    <label for="nama_rekanan">Nama Rekanan</label><br>
                    <input type="text" name="nama_rekanan" value="<?php echo $datarekanan['nama_rekanan']; ?>">
                    <br>
                    <label for="alamat_rekanan">Alamat Rekanan</label><br>
                    <input type="text" name="alamat_rekanan" value="<?php echo $datarekanan['alamat_rekanan']; ?>">
                    <br>
                    <label for="nama_pimpinan">Nama Pimpinan</label><br>
                    <input type="text" name="nama_pimpinan" value="<?php echo $datarekanan['nama_pimpinan']; ?>">
                    <br>
                    <label for="no_hp">Nomor Telepon</label><br>
                    <input type="text" name="no_hp" value="<?php echo $datarekanan['no_hp']; ?>">
                    <br>
<br>
                    </div>
                    <input type="submit" value="KIRIM" name="submit">
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $id_rekanan = $_POST['id_rekanan'];
            $nama_rekanan = $_POST['nama_rekanan'];
            $alamat_rekanan = $_POST['alamat_rekanan'];
            $nama_pimpinan = $_POST['nama_pimpinan'];
            $no_hp = $_POST['no_hp'];

            $result = mysqli_query($koneksi, "UPDATE rekanan SET
                                            nama_rekanan='$nama_rekanan', alamat_rekanan='$alamat_rekanan', nama_pimpinan='$nama_pimpinan', no_hp='$no_hp'
                                            WHERE id_rekanan='$id_rekanan'");

            if ($result) {
                echo '
                <script>
                alert("Data Rekanan BERHASIL diedit !");
                document.location.href = "../rekanan.php";
                </script>';
            } else {
                echo '<script>
                        alert("Data Rekanan GAGAL diedit!");
                        document.location.href = "../rekanan.php;
                        </script>
                        
                        ';
            }
        $koneksi->close();
        mysqli_close($koneksi);
        }
    ?>

</body>
</html>