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
        $id_cabang = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM cabang WHERE id_cabang='$id_cabang'");
        $datacabang = mysqli_fetch_assoc($result);
        $nama_cabang = $datacabang['nama_cabang'];
?>

        <div class="form-add">
            <div class="form-content">
                <a href="../cabang_a.php"><i class='bx bx-x-circle' title="kembali"></i></a>
                <p>Edit Cabang</p>
                <hr>
                <br>
                    <div class="form-input" >
                    <form action="" method="post">
                    <label for="id_cabang">ID Cabang</label><br>
                    <input type="text" name="id_cabang" readonly value="<?php echo $datacabang['id_cabang']; ?>">
                    <br><br>
                    <label for="nama_cabang">Nama Cabang</label><br>
                    <input type="text" name="nama_cabang" value="<?php echo $datacabang['nama_cabang']; ?>">
                    <br>
                    </div>
                    <input type="submit" value="SIMPAN" name="submit">
                </form>
            </div>
        </div>


        <?php
        if (isset($_POST['submit'])) {
            $id_cabang = $_POST['id_cabang'];
            $nama_cabang = $_POST['nama_cabang'];

            $result = mysqli_query($koneksi, "UPDATE cabang SET
                                            nama_cabang='$nama_cabang'
                                            WHERE id_cabang='$id_cabang'");

            if ($result) {
                echo '
                <script>
                alert("Data Cabang BERHASIL diedit !");
                document.location.href = "../cabang_a.php";
                </script>';
            } else {
                echo '<script>
                        alert("Data Cabang GAGAL diedit!");
                        document.location.href = "../cabang_a.php;
                        </script>
                        
                        ';
            }
        $koneksi->close();
        mysqli_close($koneksi);
        }
    ?>

</body>
</html>