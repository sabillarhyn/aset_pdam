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
        $id_admin = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id_admin'");
        $dataadmin = mysqli_fetch_assoc($result);
        $nama_admin = $dataadmin['nama_admin'];
        $username = $dataadmin['username'];
        $level = $dataadmin['level'];
        $bagian = $dataadmin['bagian'];

?>

        <div class="form-add">
            <div class="form-content">
                <a href="../admin.php"><i class='bx bx-x-circle' title="kembali"></i></a>
                <p>Edit Admin</p>
                <hr>
                <br>
                    <div class="form-input">
                        <form action="" method="post">
                    <label for="id_admin">ID Admin</label><br>
                    <input type="text" name="id_admin" readonly value="<?php echo $dataadmin['id_admin']; ?>">
                    <br>
                    <label for="nama_admin">Nama Admin</label><br>
                    <input type="text" name="nama_admin" value="<?php echo $dataadmin['nama_admin']; ?>" required>
                    <br>
                    <label for="username">Username</label><br>
                    <input type="text" name="username" value="<?php echo $dataadmin['username']; ?>" required>
                    
                    <label for="level">Level Admin</label><br>
                    <select id="level" name="level" value="<?php echo $dataadmin['level']; ?>" required>
                        <option value="admin1">Admin 1</option>
                        <option value="admin2">Admin 2</option>
                    </select>

                    <br>
                    <label for="bagian">Bagian</label><br>
                    <input type="text" name="bagian" value="<?php echo $dataadmin['bagian']; ?>" required>
                    <br><br>
                    </div>
                <input type="submit" value="SIMPAN" name="submit">
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $id_admin = $_POST['id_admin'];
            $nama_admin = $_POST['nama_admin'];
            $username = $_POST['username'];
            $level = $_POST['level'];
            $bagian = $_POST['bagian'];

            $result = mysqli_query($koneksi, "UPDATE admin SET
                                            nama_admin='$nama_admin', username='$username', level='$username', bagian='$bagian'
                                            WHERE id_admin='$id_admin'");

            if ($result) {
                echo '
                <script>
                alert("Data Admin BERHASIL diedit !");
                document.location.href = "../admin.php";
                </script>';
            } else {
                echo '<script>
                        alert("Data Admin GAGAL diedit!");
                        document.location.href = "../admin.php;
                        </script>
                        
                        ';
            }
        $koneksi->close();
        mysqli_close($koneksi);
        }
    ?>

</body>
</html>