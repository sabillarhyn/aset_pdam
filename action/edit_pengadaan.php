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
        $id_pengadaan = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM pengadaan WHERE id_pengadaan='$id_pengadaan'");
        $datapengadaan = mysqli_fetch_assoc($result);
        $no_dokumen = $datapengadaan['no_dokumen'];
        $tgl_beli = $datapengadaan['tgl_beli'];
?>

        <div class="form-add">
            <div class="form-content">
                <a href="../pengadaan.php"><i class='bx bx-x-circle' title="kembali"></i></a>
                <p>Edit Pengadaan</p>
                <hr>
                <br>
                    <div class="form-input" >
                    <form action="" method="post">
                        <br>
                    <label for="id_pengadaan">ID pengadaan</label><br>
                    <input type="text" name="id_pengadaan" readonly value="<?php echo $datapengadaan['id_pengadaan']; ?>">
                    <br>
                    <label for="no_dokumen">Nomor Dokumen</label><br>
                    <input type="text" name="no_dokumen" value="<?php echo $datapengadaan['no_dokumen']; ?>">
                    <br>
                    <label for="tgl_beli">Tanggal Pembelian</label><br>
                    <input type="date" name="tgl_beli" value="<?php echo $datapengadaan['tgl_beli']; ?>">
                    <br><br>
                    </div>
                    <input type="submit" value="SIMPAN" name="submit">
                </form>
            </div>
        </div>


        <?php
        if (isset($_POST['submit'])) {
            $id_pengadaan = $_POST['id_pengadaan'];
            $no_dokumen = $_POST['no_dokumen'];
            $tgl_beli = $_POST['tgl_beli'];

            $result = mysqli_query($koneksi, "UPDATE pengadaan SET
                                             no_dokumen='$no_dokumen', tgl_beli='$tgl_beli'
                                            WHERE id_pengadaan='$id_pengadaan'");

            if ($result) {
                echo '
                <script>
                alert("Data Pengadaan BERHASIL diedit !");
                document.location.href = "../pengadaan.php";
                </script>';
            } else {
                echo '<script>
                        alert("Data Pengadaan GAGAL diedit!");
                        document.location.href = "../pengadaan.php;
                        </script>
                        
                        ';
            }
        $koneksi->close();
        mysqli_close($koneksi);
        }
    ?>

</body>
</html>